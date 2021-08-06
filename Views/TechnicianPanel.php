<?php
require_once VIEWS_PATH . 'Nav.php';
?>
<div style="padding-top: 70px">
    <table>
        <thead>
            <tr>
                <th>Name of the Phone</th>
                <th>State</th>
                <th>Client Name</th>
                <th>Client Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($jobs as $job) {
                echo ('<tr>');
                echo ('<th>' . $job->getName() . '</th>');
                echo ('<th>' . $job->getState() . '</th>');
                echo ('<th>' . $job->getClient()->getName() . '</th>');
                echo ('<th>' . $job->getClient()->getPhone() . '</th>');
                echo ('</tr>');
            }
            ?>
        </tbody>
    </table>
</div>

</body>

</html>