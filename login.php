<?php
// print_r($conObj);
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
        }

        .banner {
            background-color: skyblue;
            padding: 0.75rem 1rem;
            margin-bottom: 2rem;
        }

        .banner>span {
            font-size: 1.5rem;
            font-weight: bold;
        }

        ._form {
            display: grid;
            width: 30%;
            grid-template-columns: 20% 70%;
            column-gap: 0.5rem;
            row-gap: 0.5rem;
            align-items: center;
            background-color: skyblue;
            padding: 1.5rem 3rem;
            border-radius: 0.25rem;
            box-shadow: 2px 1px 2px 5px #dedede;
            margin: 2rem auto 0 auto;
        }

        ._form>label {
            text-align: end;
        }

        ._form>input[type="button"] {
            margin: 0 auto;
            grid-column: span 2;
            background-color: beige;
            padding: 0.25rem 0.75rem;
            border-radius: 0.15rem;
        }

        ._form>input[type="text"] {
            /* width: 50%; */
            padding: 0.25rem 0.5rem;
        }

        #code {
            background-color: beige;
            color: purple;
            font-size: 17.5px;
            width: max-content;
            margin: 0 auto;
            display: flex;
            border: none;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="banner">
        <span>SQL Injection Demo</span>
    </div>
    <code id="code"></code>
    <form class="_form" method="POST">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="john.doe@gmail.com" oninput="onKeyPress()">
        <label for="password">Password:</label>
        <input type="text" name="password" id="password" value="Admin@123" oninput="onKeyPress()">
        <input type="button" value="Log in" onclick="return onLogin()">
    </form>
    <script>
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        document.getElementById("code").innerHTML = `Query: SELECT * FROM users WHERE email = '${email}' $email AND password = '${password}'`;

        function onLogin() {
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            console.log(email, password)
            fetch(`./routes/auth/login.php`, {
                method: "POST",
                'Content-Type': "application/x-www-form-urlencoded",
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            })
        }

        function onKeyPress() {
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            const query = `Query: SELECT * FROM users WHERE email = '${email}' $email AND password = '${password}'`;
            document.getElementById("code").innerHTML = query;

        }
    </script>
</body>

</html>