<div class="col-md-3">
    <img src="<?php echo base_url('assets/admin/images/administrator.png'); ?>" style="width: 100%;">
    <center>
      <b>Administrator</b>
      <br>
      <a href="<?php echo base_url('/admin_functions/logout') ?>">Sign Out</a>
    </center>
    <br>
    <div class="list-group">

        <center><label class="list-group-item">SKILLS</label></center>
        <a href="<?php echo base_url('/admin/manageSkills') ?>" class="list-group-item">Manage Skills</a>
        <a href="<?php echo base_url('/admin/manageQuestions') ?>" class="list-group-item">View Questions</a>
        <a href="<?php echo base_url('/admin/addQuestion') ?>" class="list-group-item">Add Question</a>

        <center><label class="list-group-item">USERS</label></center>
        <a href="<?php echo base_url('/add_author') ?>" class="list-group-item">Manage Users</a>

        <center><label class="list-group-item">TEST SETUP</label></center>
        <a href="<?php echo base_url('/admin/testSetup') ?>" class="list-group-item">Manage Test Settings</a>

        <center><label class="list-group-item">SETTINGS</label></center>
        <a href="<?php echo base_url('/change_password') ?>" class="list-group-item">Change Password</a>

    </div>
</div>
