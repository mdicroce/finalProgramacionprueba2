<?php

if (!isset($message)) {
    $message = "";
}

?>
<h1>LOGIN</h1>
<form action="<?php echo (FRONT_ROOT) ?>Technician/login" method="post">
    <label for="username">Insert your username</label>
    <input type="text" name="username" id="login-username" placeholder="username">
    <label for="password">Insert your password</label>
    <input type="password" name="password" id="login-password">
    <button type="submit">LOGIN</button>
</form>
<a href="<?php echo (FRONT_ROOT) ?> Home/showRegister">You don't have an account yet? Please reggister</a>
<div>
    <p style="color:red"><?php echo ($message); ?></p>
</div>
</body>

</html>