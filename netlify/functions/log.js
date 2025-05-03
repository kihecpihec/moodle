exports.handler = async (event) => {
    const ipHeader = event.headers['x-forwarded-for'] || '';
    const ip = ipHeader.split(',')[0].trim() || 'Unknown IP';
    const userAgent = event.headers['user-agent'] || 'Unknown User-Agent';
    const timestamp = new Date().toISOString();
  
    const body = event.body ? JSON.parse(event.body) : {};
    const username = body.username || null;
    const formStatus = body.formSubmitted; // Expecting string: 'form submitted', 'empty submission', etc.
  
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
          form_submitted: formStatus,
          email: username  // Add this field
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