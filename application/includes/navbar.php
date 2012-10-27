<div class="navbar-inner">
  <div class="container-fluid">
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <a class="brand" href="<?=ROOT?>"><?=$settings['site']['name']?></a>
    <div class="nav-collapse collapse">
    <?php
      include_once APP . 'users/login.php';
      include_once INC . 'menus/main.php';
    ?>
    </div>
  </div>
</div>