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

        <center><label class="list-group-item">SPONSORED TEST</label></center>
        <a href="<?php echo base_url('/admin/sponsoredTestSettings') ?>" class="list-group-item">Sponsored Test Settings</a>
        <a href="<?php echo base_url('/admin/manageSponsoredTestQuestions') ?>" class="list-group-item">Manage Sponsored Test Questions</a>
         <a href="<?php echo base_url('/admin/manageSponsoredTest') ?>" class="list-group-item">Manage Sponsored Test</a>
        <a href="<?php echo base_url('/admin/addSponsoredTestQuestion') ?>" class="list-group-item">Add Sponsored Test Questions</a>


        <center><label class="list-group-item">USERS</label></center>
        <a href="<?php echo base_url('/admin/manageUsers') ?>" class="list-group-item">Manage Users</a>

        <center><label class="list-group-item">TEST SETUP</label></center>
        <a href="<?php echo base_url('/admin/testSetup') ?>" class="list-group-item">Manage Test Settings</a>

        <center><label class="list-group-item">SETTINGS</label></center>
        <a href="<?php echo base_url('/admin/changePassword') ?>" class="list-group-item">Change Password</a>

    </div>
</div>
