<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register Form</h1>
    <form action="{{ route('register.submit') }}" method="POST">
        @csrf
        <label for="first_name">Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        <br><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
        <br><br>
        <p>Gender:</p>
        <input type="radio" name="gender" value="male"> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <input type="radio" name="gender" value="other"> Other
        
        <p>Nationality:</p>
        <select name="nationality">
            <option>Indonesian</option>
            <option>Malaysian</option>
            <option>Singaporean</option>
            <option>Other</option>
        </select>
        
        <p>Language Spoken:</p>
        <input type="checkbox" name="language" value="bahasa"> Bahasa Indonesia<br>
        <input type="checkbox" name="language" value="english"> English<br>
        <input type="checkbox" name="language" value="other"> Other
        
        <p>Bio:</p>
        <textarea name="bio" rows="10" cols="40"></textarea>
        
        <br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>