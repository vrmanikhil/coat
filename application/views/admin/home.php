<?php echo $top; ?>

    <!-- Page Content -->
    <div class="container">

        <br><br>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->

            <!-- Content Column -->
            <div class="col-md-6 col-md-offset-3">
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
