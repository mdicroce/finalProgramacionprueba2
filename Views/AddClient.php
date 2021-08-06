<?php
require_once VIEWS_PATH . 'Nav.php';
?>

<div>
    <form action="<?php echo (FRONT_ROOT) ?>Client/addClient/" method="post">
        <label for="name">Client Name</label>
        <input type="text" name="name" id="">
        <label for="phone">Client Phone</label>
        <input type="tel" name="phone" id="">
        <button type="submit">Submit new Client</button>
    </form>
</div>
<a href="<?php echo (FRONT_ROOT) ?>Technician/TechnicianPanelView">Go Back to Panel</a>
</body>

</html>