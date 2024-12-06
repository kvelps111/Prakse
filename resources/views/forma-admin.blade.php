<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            text-align: center
        }input, button{
            font-size: 2em
        } 


    </style>
</head>
<body>
    
    <form action="/Apost" method="POST">
        @csrf
        <h1>Admin panel register</h1><br>

     <input type="email" name="email" id="email" placeholder="Email" ><br>
     <label for="password">Password min char:6</label><br>
     <input type="password" name="password" id="password" placeholder="Password"><br><br>

        <button type="submit">Submit</button><br>
        <a href="login.blade.php">Back to Login</a>


    </form>
</body>
</html>