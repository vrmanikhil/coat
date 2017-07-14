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
    <div class="container">

    <?php
	if($message['content']!=''){?>
          <div class="row">
                     <div class="col-lg-12">

                         <ol class="breadcrumb" style="margin-top: 20px;">
                             <font color="<?=$message['color']?>"><?=$message['content']?></font>
                         </ol>
                     </div>
                 </div>
            <br><br>
	<?php }?>
