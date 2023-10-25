<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        ._form{
            display: grid;
            width: 50%;
            grid-template-columns: 30% 70%;
        }
        ._form > label{
            text-align: end;
        }
        ._form > input[type="submit"]{
            margin: 0 auto;
            grid-column: span 2;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <form class="_form">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <label for="password">Password:</label>
        <input type="text" name="password" id="password">
        <input type="button" value="Log in"  onclick="return onLogin()">
    </form>
    <script>
        function onLogin(){
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            console.log(email, password)
        }
    </script>
</body>
</html>