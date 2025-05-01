<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Super Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #cfd6e0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .login-box img {
            width: 100px;
            margin-bottom: 10px;
        }

        .login-box h2 {
            margin-bottom: 20px;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .login-box button {
            width: 100%;
            background-color: #0d47a1;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .top-bar {
            position: fixed;
            top: 0;
            width: 100%;
            background: white;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .top-bar span {
            margin-right: 10px;
            font-weight: bold;
        }

        .top-bar i {
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <span id="role">Admin</span>
        <i class="fas fa-user-circle" onclick="toggleRole()"></i>
    </div>

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="login-box">
            <img src="{{ asset('logo.png') }}" alt="Logo STMIK">
            <h2>Sign in</h2>

            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Sign in</button>

            @if(session('error'))
                <p style="color:red; margin-top:10px;">{{ session('error') }}</p>
            @endif
        </div>
    </form>

    <script>
        function toggleRole() {
            const roleElement = document.getElementById('role');
            roleElement.textContent = roleElement.textContent === 'Admin' ? 'Super Admin' : 'Admin';
        }
    </script>

</body>
</html>