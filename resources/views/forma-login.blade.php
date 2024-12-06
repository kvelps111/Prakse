<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body {
            text-align: center;
        }
        input, button {
            font-size: 2em;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" id="email" placeholder="Email" required><br>
        <input type="password" name="password" id="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button><br>
    </form>
    <a href="forma.admin.blade.php">Admin register</a>
</body>
</html>




