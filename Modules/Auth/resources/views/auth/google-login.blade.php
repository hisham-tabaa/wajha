<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Continue with Google</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Load Google Identity Services -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f3f4f6;
            font-family: sans-serif;
        }

        .container {
            text-align: center;
            background: #fff;
            padding: 50px 40px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .status {
            margin-top: 20px;
            font-size: 16px;
        }

        .g_id_signin {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Sign in with Google</h2>

        <div id="g_id_onload" data-client_id="{{ config('services.google.client_id') }}" data-context="signin"
            data-ux_mode="popup" data-callback="handleGoogleResponse" data-auto_prompt="false">
        </div>



        <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="outline"
            data-text="signin_with" data-size="large" data-logo_alignment="left">
        </div>

        <div class="status" id="status">Waiting for Google login...</div>
    </div>

    <script>
        async function handleGoogleResponse(response) {
            const statusEl = document.getElementById('status');

            if (!response.credential) {
                statusEl.innerText = 'Failed to get Google ID token.';
                return;
            }

            const idToken = response.credential;
            console.log('Google ID Token:', idToken);

            statusEl.innerText = 'Sending token to server...';

            try {
                const res = await fetch('/auth/google/token', { // تأكد من مسار API
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id_token: idToken
                    })
                });

                const data = await res.json();
                console.log('Laravel API response:', data);

                if (data.status) {
                    statusEl.innerText = `Welcome, ${data.user.name}! Login successful.`;
                    localStorage.setItem('auth_token', data.token);
                } else {
                    statusEl.innerText = 'Login failed: ' + data.message;
                }
            } catch (error) {
                console.error(error);
                statusEl.innerText = 'An error occurred while connecting to server.';
            }
        }
    </script>
</body>

</html>
