<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <style>
        /* Code By Alireza Derakhshan */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body {
            width: 100vm;
            height: 100vh;
            background-color: #080710;
        }
        #contener {
            width: 200px;
            height: 250px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #circle_1, #circle_2 {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position: absolute;
        }
        #circle_1 {
            background: linear-gradient(blue, #bf23f6);
            top: -45px;
            left: -40px;
        }
        #circle_2 {
            background: linear-gradient(to right, #ff512f, yellow);
            top: 190px;
            left: 140px;
        }
        form {
            width: 400px;
            height: 450px;
            background-color: rgba(255, 255, 255, 0.07);
            border: 1.5px solid rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            backdrop-filter:blur(10px);
            box-shadow: 0 0 40px rgba(8, 7, 6, 0.6);
        }
        span {
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 22px;
            font-weight: bold;
            line-height: 35px;
            display: block;
        }
        label {
            color: #fff;
            margin: 10%;
        }
        input {
            background-color: rgba(255, 255, 255, 0.07);
            color: #fff;
            border: none;
            border-radius: 2px;
            height: 45px;
            width: 80%;
            margin: 5px 10% 20px 10%;
            outline: none;
            padding-left: 5px;
        }
        input[type=submit] {
            background: #fff;
            color: #000;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div id="contener">
    <div id="circle_1"></div>
    <div id="circle_2"></div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <span>Welcome</span>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <input type="submit">
    </form>
</div>

</body>

</html>
