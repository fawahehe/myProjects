<!DOCTYpe html>
<html>
<head>
<title>Login</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow:0 0 10px rgbz(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }
    h2 { 
        text-align:center;
        margin-bottom: 20px;
        color: #333;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5PX;
        font-weight: bold;
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius; 5px;
        box-sizzing: border-box;
    }
    .btn-login {
        width: 100%;
        padding: 10x;
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-login:hover {
        background-color: #45a049;
    }
    .error {
        color: red;
        font-size: 12px;
        margin-top; 5px;
    }
    .success {
        color: green;
        font-size 12px;
        margin-top; 5px;
    }
    .footer {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }
</style>
<body>
<div class="login-container">
<h2>Login</h2>
<form method="POST" action="login_process.php">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" required>
    </div>
    <button type="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" required>
    </div>
    <button type="submit" class="btn-login">Login</button>
</form>
<div class="footer">
    <p> Dont have an account? <a href="register.php">Register</a><p>
</div>
</div>
</body>
</html>
