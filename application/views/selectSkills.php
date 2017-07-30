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
    						<p class="mcq-title">Compulsory Skill Tests</p>
    					</div>
              <table class="table">
                <thead class="thead-inverse">
                  <tr>
                    <th>#</th>
                    <th>Skill Name</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($compulsorySkills as $key => $value) { ?>
                  <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $value['skill']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div style="text-align: center; margin-top: 25px;">
    						<p class="mcq-title">User-Driven Skill Tests</p>
    					</div>
              <div class="col-sm-6">
                <table class="table">
                  <thead class="thead-inverse">
                    <tr>
                      <th>#</th>
                      <th>Skill Name</th>
                      <th>Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($userSkillsSelected as $key => $value) { ?>
                    <tr>
                      <th scope="row"><?php echo $i++; ?></th>
                      <td><?php echo $value['skill']; ?></td>
                      <td><a href="<?php echo base_url('homeFunctions/removeUserDrivenSkill/').$value['skillID']; ?>" class="btn" style="background-color:#c0392b; color: #fff;">Remove</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="col-sm-6">
                <p style="float:right;">User Driven Skills Allowed: <b><?php echo $testSetup['skillsAllowed']; ?></b></p>
                <br><br>
                <p class="mcq"><strong>Choose skills you want to attempt test for<strong></p>
              <form class="form-inline" action="<?php echo base_url('homeFunctions/addUserDrivenSkill'); ?>" method="post">
                <div class="form-group">
                  <label>Skill Name</label>
                  <select type="text" class="form-control" name="skillID">
                    <?php foreach ($availableUserDrivenSkills as $key => $value) { ?>
                      <option value="<?php echo $value['skill_id']; ?>"><?php echo $value['skill']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <center><button type="submit" class="btn btn-primary" style="background-color: #3d464d; color: #fff; margin-top: 20px;">Add Skill</button></center>
              </form>
            </div>
          </div>
          <div class="col-sm-12">
            <center><a href="<?php echo base_url('homeFunctions/goAhead'); ?>" class="btn btn-primary btn-lg">Go Ahead</a></center>
          </div>
			</div>
		</div>
	</div>
</body>
<?php echo $foot; ?>
<?php if($singleLogin == 1){ ?>
<script type="text/javascript" src = "<?php echo base_url('/assets/website/js/updateSession.js'); ?>"></script>
<?php } ?>
</html>
