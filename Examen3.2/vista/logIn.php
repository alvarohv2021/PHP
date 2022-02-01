<?php
?>
<h1>Log In</h1>
<form method="post" action="../controladores/c_LogIn.php">
    <label id="email">Email</label>
    <input type="text" name="email" required><br>
    <label id="Password">Password</label>
    <input type="password" name="password" required><br>
    <button type="submit">Log In</button>
</form>
<a href="../controladores/c_SignIn.php">SignIn</a>
