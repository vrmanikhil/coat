<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin|COAT</title>

    <link href="<?php echo base_url('/assets/admin/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/admin/css/modern-business.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/admin/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/admin/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">


</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">Admin- CampusPuppy Online Assessment Test</a>
            </div>
        </div>
    </nav>


    <!-- Page Content -->
    <div class="container">

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->

            <!-- Content Column -->
            <div class="col-md-6 col-md-offset-3">
              <?php
          	if($message['content']!=''){?>
                    <div class="row">
                               <div class="col-lg-12">

                                   <ol class="breadcrumb" style="margin-top: 10px;">
                                       <font color="<?=$message['color']?>"><?=$message['content']?></font>
                                   </ol>
                               </div>
                           </div>
          	<?php }?>
              <h2><center>Administrator Login</center></h2>
                <div class="col-sm-4">
                  <img src="<?php echo base_url('/assets/admin/images/administrator.png'); ?>" style="width: 100%;">
                </div>
                <div class="col-md-8">
                  <form role="form" action="<?php echo base_url('/admin_functions/doLogin'); ?>" method="post">
                      <div class="control-group form-group">
                          <div class="controls">
                              <label>User-Name</label>
                              <input type="text" class="form-control" name="username" required placeholder="User-Name">
                          </div>
                      </div>
                      <div class="control-group form-group">
                          <div class="controls">
                              <label>Password</label>
                              <input type="password" class="form-control" name="password" required placeholder="Password">
                          </div>
                      </div>

                      <div id="success"></div>
                      <!-- For success/fail messages -->
                      <input type="hidden" name="<?php echo $csrf_token_name?>" value="<?php echo $csrf_token?>">
                      <button type="submit" class="btn btn-success" style="width:100%;">LOGIN</button>
                  </form>
                </div>

            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php echo $bottom; ?>

</body>

</html>
