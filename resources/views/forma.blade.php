<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <style>
        body{
            text-align:  center
        }input, button,select{
            font-size: 2em}
            select{
                font-size: 1em}
                label{
                    font-size: 1.5em}
    </style>
</head>
<body>
    <h1>Kontaktforma</h1>
    @if(session('success'))
    <p>{{ session('success') }}</p>
@endif
   <form method="POST" action="/post">
    @csrf
    <input type="email" name="email" id="email" placeholder="Email" ><br>
    <input type="text" name="message" id="message" placeholder="Message"><br><br>
    <select name="option" id="option">
        <option value="techical support">Tehniskais atbalsts</option>
        <option value="sale">Pārdošana</option>
        <option value="else">Cits</option>

    </select>
    <h2>Priority level</h2>

    <input type="radio" name="priority" value="low">
    <label for="low">Low</label>

    <input type="radio" name="priority" value="medium">
    <label for="medium">Medium</label>

    <input type="radio" name="priority" value="high">
    <label for="medium">High</label><br><br>

    <button type="submit">Submit</button><br>


<br>
<a href="login.blade.php">Login</a>
</body>
</html>