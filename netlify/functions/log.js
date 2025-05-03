exports.handler = async (event) => {
    const ip = event.headers['x-forwarded-for'] || 'Unknown IP';
    const userAgent = event.headers['user-agent'] || 'Unknown User-Agent';
    const timestamp = new Date().toISOString();
  
    const body = event.body ? JSON.parse(event.body) : {};
  
    let formSubmittedStatus = 'site visited';
    if ('formSubmitted' in body) {
      if (body.formSubmitted === true) {
        formSubmittedStatus = 'form submitted';
      } else if (body.formSubmitted === false && (!body.username || !body.password)) {
        formSubmittedStatus = 'empty submission';
      }
    }
  
    const SUPABASE_URL = process.env.SUPABASE_URL;
    const SUPABASE_KEY = process.env.SUPABASE_ANON_KEY;
  
    try {
      const response = await fetch(`${SUPABASE_URL}/rest/v1/logs`, {
        method: 'POST',
        headers: {
          'apikey': SUPABASE_KEY,
          'Authorization': `Bearer ${SUPABASE_KEY}`,
          'Content-Type': 'application/json',
          'Prefer': 'return=representation'
        },
        body: JSON.stringify({
          ip,
          user_agent: userAgent,
          timestamp,
          form_submitted: formSubmittedStatus
        })
      });
  
      if (!response.ok) {
        const error = await response.text();
        console.error("Supabase Error:", error);
        return {
          statusCode: 500,
          body: JSON.stringify({ error: "Database error", detail: error })
        };
      }
  
      return {
        statusCode: 200,
        body: JSON.stringify({ message: "Logged successfully" })
      };
    } catch (err) {
      console.error("Unexpected error:", err);
      return {
        statusCode: 500,
        body: JSON.stringify({ error: "Unexpected error" })
      };
    }
  };