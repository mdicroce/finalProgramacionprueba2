<?php
if (!isset($message)) {
    $message = "";
}
?>
<h1>REGISTER</h1>
<form action="<?php echo (FRONT_ROOT) ?>Technician/Register" method="post">
    <label for="name">Please, enter your name</label>
    <input type="text" name="name" id="register-name">
    <label for="username">Insert your username</label>
    <input type="text" name="username" id="register-username" placeholder="username">
    <label for="password">Insert your password</label>
    <input type="password" name="password" id="register-password">
    <button type="submit">REGISTER</button>
</form>
<div>
    <a href="<?php echo (FRONT_ROOT) ?> Home/showLogin">Already have an account? Login and use the system.</a>
    <p style="color:red"><?php echo ($message); ?></p>
</div>
</body>

</html>