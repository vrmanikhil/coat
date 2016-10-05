<?php echo $top; ?>



    <!-- Page Content -->


        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <?php echo $left; ?>
            <!-- Content Column -->
            <div class="col-md-9">

                    <h2>Change Password</h2>
                    <form action="<?php echo base_url('/admin_functions/changePassword'); ?>" method="post">
                      <div class="col-sm-6 col-sm-offset-3">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Current Password</label>
                                <input type="password" class="form-control" name="currentPassword" required>
                            </div>
                      </div>
                      <div class="control-group form-group">
                          <div class="controls">
                              <label>New Password</label>
                              <input type="password" class="form-control" name="newPassword" required>
                          </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Confirm New Password</label>
                            <input type="password" class="form-control" name="confirmPassword" required>
                        </div>
                  </div>
                      <div id="success"></div>
                      <!-- For success/fail messages -->
                      <input type="hidden" name="<?php echo $csrf_token_name?>" value="<?php echo $csrf_token?>">
                      <button type="submit" class="btn btn-primary" style="float:right;">Change Password</button>
                      </div>




                    </form>

            </div>
        </div>
        <!-- /.row -->


        <hr>

        <!-- Footer -->
<?php echo $bottom; ?>

</body>

</html>
