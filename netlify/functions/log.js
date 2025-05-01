exports.handler = async function (event) {
    const ip = event.headers['x-forwarded-for'] || 'Unknown IP';
    const userAgent = event.headers['user-agent'] || 'Unknown User-Agent';
    const timestamp = new Date().toISOString();

    let eventType = "PAGE LOADED";

    if (event.httpMethod === "POST") {
        const body = JSON.parse(event.body || "{}");
        const username = body.username?.trim() || "";
        const password = body.password?.trim() || "";

        if (!username && !password) {
            eventType = "EMPTY SUBMISSION";
        } else {
            eventType = "FORM SUBMITTED";
        }
    }

    console.log(`${timestamp} - IP: ${ip} - User-Agent: ${userAgent} - ${eventType}`);

    return {
        statusCode: 200,
        body: JSON.stringify({ message: "Logged", status: eventType }),
    };
};