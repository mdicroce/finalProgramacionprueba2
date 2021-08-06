<?php
require_once VIEWS_PATH . 'Nav.php';
?>

<div>
    <form action="<?php echo (FRONT_ROOT) ?>ToRepair/addJob/" method="post">
        <label for="name">Name of the phone</label>
        <input type="text" name="name" id="">
        <label for="estado">State</label>
        <select name="estado">
            <option value="pendiente" selected>Pendiente</option>
            <option value="en reparacion">En Reparación</option>
            <option value="finalizado">Finalizado</option>
        </select>
        <select name="clientId">
            <?php
            if (!empty($clients)) {
                foreach ($clients as $client) {
                    echo ('<option value="' . $client->getId() . '" selected>' . $client->getName() . '</option>');
                }
            }
            ?>
        </select>
        <button type="submit">Submit new Job</button>
    </form>
</div>
<a href="<?php echo (FRONT_ROOT) ?>Technician/TechnicianPanelView">Go Back to Panel</a>
</body>

</html>