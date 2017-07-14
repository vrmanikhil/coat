<div class="col-md-2" id="sidebar-wrapper">

  <div class="row">
    <h3 class="main-header" style="font-size:3em;text-align:center;">COAT</h3>
    <h5 class="sub-header" style="text-align:center;">powered by  <a href="http://www.campuspuppy.com" target="_blank" class="link">CAMPUSPUPPY</a></h5>
  </div>

  <div class="row image" style="">
    <img src="<?php echo $_SESSION['userData']['profileImage']; ?>" height="100px;" id="avatar">

  </div>

  <div class="row" style="text-align:center;">
    <h3 id="welcome">WELCOME</h3>
    <div id="name"><?php echo $_SESSION['userData']['name']; ?></div>
  </div>

  <div class="row" style="margin-top:50px;text-align:center;">
    <a href="<?php echo base_url('homeFunctions/logout'); ?>" class="button" id="signup">LOGOUT</a>

  </div>
</div>
