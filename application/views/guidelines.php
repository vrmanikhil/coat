<!DOCTYPE html>
<html lang="en">
<?php echo $head; ?>
<body>
  <?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>
	<div class="container-fluid">
		<div class="row">
			<?php echo $left; ?>
			<div class="col-md-9" id="main-wrapper">
          <div class="col-sm-12">
    					<div style="text-align: center; margin-top: 25px;">
    						<p class="mcq-title">SKILL TEST GUIDELINES</p>
    					</div>
    					<div class="col-sm-12">
    						<p class="mcq">
                <ol>
                  <li>The Skill Selected is <b><?php echo $skillStatus[0]['skill']; ?></b>.</li>
                	<li>There are No Fixed Number of Questions in the Test.</li>
                	<li>The Test will be of maximum <b><?php echo $timeAllowed; ?></b> minutes.</li>
                </ol>
              </p>
    					</div>
    					<center><a href="<?php echo base_url('homeFunctions/beginTest?skillID=').$skillID; ?>" class="btn btn-lg btn-default" style="background-color: #3d464d; color: #fff; margin-top: 10px;">START TEST</a>
              </center>
          </div>
			</div>
		</div>
	</div>
</body>
<?php echo $foot; ?>
<script type="text/javascript" src = "<?php echo base_url('/assets/website/js/updateSession.js'); ?>"></script>
</html>
