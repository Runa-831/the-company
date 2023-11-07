<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="../actions/register.php" method="post" class="border rounded-2 p-3 w-50 mx-auto my-5">
        <h1 class="display-6 text-center text-uppercase">Register</h1>

        <label for="first-nmae" class="form-label">First Name</label>
        <input type="text" name="first_name" id="first_name" class="form-control mb-2">

        <label for="last-name" class="form-label">Last Name</label>
        <input type="text" name="last_name" id="last_name" class="form-control mb-2">

        <label for="usesrname" class="form-label">Usesrname</label>
        <input type="text" name="username" id="username" class="form-control mb-2">
        

        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control mb-4">

        <button type="submit" class="btn btn-success  w-100">Register</button>

        <div class="text-center">
            Register already? <a href="index.php">Log in</a>.
        </div>
        
    </form>
    
</body>
</html>