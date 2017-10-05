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
                <?php
                  if($sponsoredTestSetup['testOn'] == 1){                    
                ?>
                <div style="text-align: center; margin-top: 25px;">
                  <p class="mcq-title">Sponsored Tests</p>
                </div>
                <table class="table">
                <thead class="thead-inverse">
                  <tr>
                    <th>#</th>
                    <th>Test Name</th>
                    <th>Time Required (in minutes)</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($sponsoredTest as $key => $value) { ?>
                  <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $value['name']; ?></td>
                    <?php if($value['timeBound'] == 1) { ?>
                      <td><?php echo $value['time']; ?></td>
                    <?php }else{ ?>
                    <td>Not Time Bounded</td>
                    <?php } ?>
                    <td>
                      <?php if($value['status']=='4'){ ?>
                      <a class="btn" style="background-color: #27ae60; color: #fff; width: 100%;">Completed</a>
                      <?php } if($value['status']=='1'){ ?>
                      <a href="<?php echo base_url('sponsoredTestFunctions/startTest?testID=').$value['testID']; ?>" class="btn" style="background-color: #3d464d; color: #fff; width: 100%;">Start Test</a>
                      <?php } if($value['status']=='2'){ ?>
                      <a href = "<?php echo base_url('sponsoredTestFunctions/resumeTest')?>" class="btn" style="background-color: #2980b9; color: #fff; width: 100%;">Resume Test</a>
                      <?php } if($value['status']=='3'){ ?>
                      <a class="btn" style="background-color: #c0392b; color: #fff; width: 100%;">Locked</a>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
                <?php } ?>
                <?php 
                 if($sponsoredTestSetup['testOn'] == 2 || $sponsoredTestSetup['type'] != 2){
                ?>
                <div style="text-align: center; margin-top: 25px;">
                  <p class="mcq-title">Skill Tests</p>
                </div>
              <table class="table">
                <thead class="thead-inverse">
                  <tr>
                    <th>#</th>
                    <th>Skill Name</th>
                    <th>Time Required (in minutes)</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($userSkillsSelected as $key => $value) { ?>
                  <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $value['skill']; ?></td>
                    <td><?php echo $timeAllowed; ?></td>
                    <td>
                      <?php if($value['status']=='4'){ ?>
                      <a class="btn" style="background-color: #27ae60; color: #fff; width: 100%;">Completed</a>
                      <?php } if($value['status']=='1'){ ?>
                      <a href="<?php echo base_url('homeFunctions/startTest?skillID=').$value['skill_id']; ?>" class="btn" style="background-color: #3d464d; color: #fff; width: 100%;">Start Test</a>
                      <?php } if($value['status']=='2'){ ?>
                      <a href = "<?php echo base_url('homeFunctions/resumeTest')?>" class="btn" style="background-color: #2980b9; color: #fff; width: 100%;">Resume Test</a>
                      <?php } if($value['status']=='3'){ ?>
                      <a class="btn" style="background-color: #c0392b; color: #fff; width: 100%;">Locked</a>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php } ?>
              <center><a href="<?php echo base_url('homeFunctions/submitTest'); ?>" class="btn btn-lg" style="background-color: #3d464d; color: #fff;">SUBMIT TEST</a></center>
          </div>
			</div>
		</div>
	</div>
</body>
<?php echo $foot; ?>
<?php if($singleLogin == 1){ ?>
<script type="text/javascript" src = "<?php echo base_url('/assets/website/js/updateSession.js'); ?>"></script>
<?php }  ?>
<script type="text/javascript" src = "<?php echo base_url('/assets/website/js/disable.js'); ?>"></script>
</html>