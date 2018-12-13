<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<meta charset="utf-8">
<style type="text/css">
    .login {
        margin: 250px auto;
        width: 400px;
        padding: 10px;
        border: 1px solid #ccc;
        background: lightblue;
    }
    input[type=text], input[type=password] {
        margin: 5px auto;
        width: 100%;
        padding: 10px;
    }
    input[type=submit] {
        margin 5px auto;
        float: right;
        padding: 5px;
        width: 90px;
        border: 1px solid #fff;
        color: #fff;
        background: red;
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="login">
<form method="post" action="proses_login.php">
    <input type="text" name="username" placeholder="Masukan username Anda"><br>
    <input type="password" name="password" placeholder="Masukan Password"><br>
    <input type="checkbox">Ingat Saya
    <input type="submit" name="kirim" value="Kirim">
</form>
</div>
</body>
</html>