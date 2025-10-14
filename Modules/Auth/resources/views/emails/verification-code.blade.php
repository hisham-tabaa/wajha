<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>رمز التحقق</title>
</head>

<body
    style="margin: 0; padding: 0; background-color: #f8fafc; font-family: 'Cairo', Arial, sans-serif; line-height: 1.6; color: #334155;">
    <div
        style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;">
        <!-- Header -->
        <div style="background: #ffffff; padding: 40px 30px; text-align: center; color: black;">
            <div style="font-size: 24px; font-weight: 700; color: black; margin-bottom: 16px;">وجهة</div>
            <h1 style="font-size: 28px; font-weight: 700; margin-bottom: 8px;">تحقق من بريدك الإلكتروني</h1>
            <p style="font-size: 16px; font-weight: 300; opacity: 0.9;">أكمل عملية التسجيل الخاصة بك</p>
        </div>

        <!-- Body -->
        <div style="padding: 40px 30px;">
            <p style="font-size: 18px; color: #475569; margin-bottom: 24px; text-align: center;">مرحباً،</p>
            <p style="text-align: center; color: #64748b; margin-bottom: 30px;">
                شكرًا لانضمامك إلى <strong>وجهة</strong>! استخدم رمز التحقق أدناه لإتمام عملية التسجيل الخاصة بك.
            </p>

            <!-- Verification Code -->
            <div
                style="background: linear-gradient(135deg, #f0f4ff 0%, #f8faff 100%); border: 2px dashed #c7d2fe; border-radius: 12px; padding: 30px; text-align: center; margin: 30px 0;">
                <p style="color: #64748b; margin-bottom: 15px; font-size: 14px;">رمز التحقق الخاص بك هو:</p>
                <div
                    style="font-size: 42px; font-weight: 700; color: #cf3b00; letter-spacing: 8px; text-shadow: 0 2px 4px rgba(79, 70, 229, 0.1);">
                    {{ $code }}</div>
            </div>

            <!-- Expiry Notice -->
            <div
                style="background: #fff7ed; border: 1px solid #fed7aa; border-radius: 8px; padding: 16px; text-align: center; margin: 20px 0;">
                <p style="color: #c2410c; font-weight: 500; margin: 0;">⏰ هذا الرمز سينتهي خلال 10 دقائق</p>
            </div>

            <!-- Instructions -->
            <div style="background: #f8fafc; border-radius: 8px; padding: 20px; margin: 25px 0;">
                <h3 style="color: #374151; margin-bottom: 12px; font-size: 16px;">📝 طريقة استخدام الرمز:</h3>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 8px 0; padding-right: 24px; position: relative;">
                        <span style="color: #4f46e5; font-weight: bold; position: absolute; right: 8px;">•</span>
                        انسخ رمز التحقق أعلاه
                    </li>
                    <li style="padding: 8px 0; padding-right: 24px; position: relative;">
                        <span style="color: #4f46e5; font-weight: bold; position: absolute; right: 8px;">•</span>
                        عد إلى تطبيق وجهة
                    </li>
                    <li style="padding: 8px 0; padding-right: 24px; position: relative;">
                        <span style="color: #4f46e5; font-weight: bold; position: absolute; right: 8px;">•</span>
                        أدخل الرمز في خانة التحقق
                    </li>
                    <li style="padding: 8px 0; padding-right: 24px; position: relative;">
                        <span style="color: #4f46e5; font-weight: bold; position: absolute; right: 8px;">•</span>
                        أكمل عملية التسجيل
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
