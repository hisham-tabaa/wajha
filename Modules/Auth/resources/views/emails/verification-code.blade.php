<!DOCTYPE html>
<html>

<head>
    <title>Verification Code</title>
</head>

<body
    style="margin: 0; padding: 0; background-color: #f8fafc; font-family: Arial, sans-serif; line-height: 1.6; color: #334155;">
    <div
        style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;">
        <!-- Header -->
        <div
            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 30px; text-align: center; color: white;">
            <div style="font-size: 24px; font-weight: 700; color: white; margin-bottom: 16px;">Wajha</div>
            <h1 style="font-size: 28px; font-weight: 700; margin-bottom: 8px;">Verify Your Email</h1>
            <p style="font-size: 16px; font-weight: 300; opacity: 0.9;">Complete your registration process</p>
        </div>
        <div style="padding: 40px 30px;">
            <p style="font-size: 18px; color: #475569; margin-bottom: 24px; text-align: center;">Hello,</p>
            <p style="text-align: center; color: #64748b; margin-bottom: 30px;">
                Thank you for joining Wajha! Use the verification code below to complete your registration.
            </p>
            <div
                style="background: linear-gradient(135deg, #f0f4ff 0%, #f8faff 100%); border: 2px dashed #c7d2fe; border-radius: 12px; padding: 30px; text-align: center; margin: 30px 0;">
                <p style="color: #64748b; margin-bottom: 15px; font-size: 14px;">Your verification code:</p>
                <div
                    style="font-size: 42px; font-weight: 700; color: #4f46e5; letter-spacing: 8px; text-shadow: 0 2px 4px rgba(79, 70, 229, 0.1);">
                    {{ $code }}</div>
            </div>
            <div
                style="background: #fff7ed; border: 1px solid #fed7aa; border-radius: 8px; padding: 16px; text-align: center; margin: 20px 0;">
                <p style="color: #c2410c; font-weight: 500; margin: 0;">⏰ This code will expire in 10 minutes</p>
            </div>
            <div style="background: #f8fafc; border-radius: 8px; padding: 20px; margin: 25px 0;">
                <h3 style="color: #374151; margin-bottom: 12px; font-size: 16px;">📝 How to use this code:</h3>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 8px 0; padding-left: 24px; position: relative;">
                        <span style="color: #4f46e5; font-weight: bold; position: absolute; left: 8px;">•</span>
                        Copy the verification code above
                    </li>
                    <li style="padding: 8px 0; padding-left: 24px; position: relative;">
                        <span style="color: #4f46e5; font-weight: bold; position: absolute; left: 8px;">•</span>
                        Return to the Wajha application
                    </li>
                    <li style="padding: 8px 0; padding-left: 24px; position: relative;">
                        <span style="color: #4f46e5; font-weight: bold; position: absolute; left: 8px;">•</span>
                        Enter the code in the verification field
                    </li>
                    <li style="padding: 8px 0; padding-left: 24px; position: relative;">
                        <span style="color: #4f46e5; font-weight: bold; position: absolute; left: 8px;">•</span>
                        Complete your registration process
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>