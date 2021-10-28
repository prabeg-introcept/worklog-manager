<?php
define('PORT', '9090');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost:<?= PORT?>/<?php if(\App\Core\Session::get('user_id') !== '10'):?><?= 'main'?><?php else: ?><?= 'admin-dashboard'?><?php endif?>">Worklog Manager</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if(\App\Core\Session::get('user_id') !== '10'): ?>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:<?= PORT?>/worklogs">Add Task</a>
          </li>
        <?php endif?>
        
        <li class="nav-item">
          <a class="nav-link disabled"><?= "Welcome ". htmlspecialchars(\App\Core\Session::get('username')); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:<?= PORT?>/logout">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>