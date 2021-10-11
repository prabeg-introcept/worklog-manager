<?php
define('PORT', '8080');

?>

<div class="top-menu">
    <div class="menu-options">
        <?php
            if(App\Core\Session::get('user_id')):
        ?>
            <a href="http://localhost:<?= PORT?>/main">Home</a>
            |
            <a href="http://localhost:<?= PORT?>/worklogs">New Task</a>
            |
            <?= "Welcome ". htmlspecialchars(\App\Core\Session::get('username')); ?>
            <a href="http://localhost:<?= PORT?>/logout">Logout</a>
        <?php else: ?>
            <a href="http://localhost:<?= PORT?>/login">Login</a>
        <?php endif; ?>
    </div>
</div>
