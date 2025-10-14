<!DOCTYPE html>
<html lang="ar" dir="rtl">
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>رمز التحقق</title>
    <meta charset="UTF-8">
    <title>رمز التحقق</title>
</head>

<body
    style="margin: 0; padding: 0; background-color: #ffffff; font-family: 'Cairo', Arial, sans-serif; color: #1e293b; line-height: 1.4;">

    <table width="100%" cellpadding="0" cellspacing="0"
        style="max-width: 480px; margin: 20px auto; background: #f8fafc; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <tr>
            <td style="padding: 24px 20px; text-align: center; color: #1e293b;">

                <!-- Logo -->
                <div style="margin-bottom: 12px;">
                    <img src="{{ asset('images/wajha.png') }}" alt="تطبيق وجهة"
                        style="max-width: 100%; border-radius: 8px;">

                </div>

                <!-- Title -->
                <h1 style="font-size: 20px; font-weight: 700; margin: 0 0 12px;">تحقق من بريدك الإلكتروني</h1>
                <p style="font-size: 14px; margin: 0 0 6px;">أكمل عملية التسجيل الخاصة بك</p>

                <!-- Greeting -->
                <p style="font-size: 15px; margin: 0 0 6px;">مرحباً {{ $email }}</p>

                <!-- Message -->
                <p style="font-size: 14px; margin: 0 0 16px;">
                    شكرًا لانضمامك إلى <strong>وجهة</strong>! الرجاء استخدام رمز التحقق أدناه لإتمام عملية التسجيل.
                </p>

                <!-- Verification Code Box -->
                <div
                    style="margin: 20px 0; background-color: #e0f2fe; border: 2px dashed #0284c7; border-radius: 10px; padding: 16px;">
                    <p style="margin: 0 0 6px; font-size: 13px;">رمز التحقق الخاص بك هو:</p>
                    <div style="font-size: 28px; font-weight: bold; color: #0284c7; letter-spacing: 6px;">
                        {{ $code }}</div>
                </div>

                <!-- Expiry Box -->
                <div
                    style="background-color: #fff7ed; border: 1px solid #fdba74; border-radius: 6px; padding: 12px; margin: 16px 0;">
                    <p style="margin: 0; color: #ea580c; font-weight: 500; font-size: 13px;">⏰ هذا الرمز سينتهي خلال 10
                        دقائق</p>
                </div>

                <!-- Instructions -->
                <div style="text-align: right; margin-top: 16px;">
                    <h3 style="font-size: 14px; margin: 0 0 8px;">📌 طريقة الاستخدام:</h3>
                    <ul style="padding: 0; margin: 0; list-style: none; text-align: right;">
                        <li style="margin-bottom: 4px; position: relative; padding-right: 16px; font-size: 13px;">
                            <span style="position: absolute; right: 0; color: #2563eb;">•</span> انسخ رمز التحقق أعلاه.
                        </li>
                        <li style="margin-bottom: 4px; position: relative; padding-right: 16px; font-size: 13px;">
                            <span style="position: absolute; right: 0; color: #2563eb;">•</span> افتح تطبيق
                            <strong>وجهة</strong>.
                        </li>
                        <li style="margin-bottom: 4px; position: relative; padding-right: 16px; font-size: 13px;">
                            <span style="position: absolute; right: 0; color: #2563eb;">•</span> أدخل الرمز في خانة
                            التحقق.
                        </li>
                        <li style="position: relative; padding-right: 16px; font-size: 13px;">
                            <span style="position: absolute; right: 0; color: #2563eb;">•</span> أكمل عملية التسجيل.
                        </li>
                    </ul>
                </div>

            </td>
        </tr>
    </table>

</body>

</html>

