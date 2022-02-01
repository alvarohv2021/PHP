<?php
?>

<h1>Sign In</h1>
<form method="post" action="../controladores/c_SignIn.php">
    <label id="name">Name</label>
    <input type="text" name="name" required><br>
    <label id="Password">Password</label>
    <input type="password" name="password" required><br>
    <label id="email">Email</label>
    <input type="text" name="email" required><br>
    <button type="submit">Log In</button>
</form>
<a href="../controladores/c_LogIn.php">SignIn</a>