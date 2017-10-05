<?php echo $top; ?>
        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <?php echo $left; ?>
            <!-- Content Column -->
            <div class="col-md-9">

                    <h2>Test Settings</h2>
                    <form action="<?php echo base_url('/sponsoredTestAdmin/setupSponsoredTest'); ?>" method="post">
                      <div class ="row">
                      <div class="col-sm-6">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Test ON/OFF</label>
                                <div class = "radio">
                                  <label><input type="radio" name="testStatus" value = 1 <?php if($testSetup['testOn'] == 1) echo "checked";?>> ON</label>
                                </div>
                                <div class = "radio">
                                  <label><input type="radio" name="testStatus" value = 2 <?php if($testSetup['testOn'] == 2) echo "checked";?>> OFF</label>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class ="row">
                      <div class="col-sm-6">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Type</label>
                                <div class = "radio">
                                  <label><input type="radio" name="type" value = 2 <?php if($testSetup['type'] == 2) echo "checked";?>> Only Sponsered Test Available</label>
                                </div>
                                <div class = "radio">
                                  <label><input type="radio" name="type" value = 1 <?php if($testSetup['type'] == 1) echo "checked";?>> All Tests Available</label>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>

                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <input type="hidden" name="<?php echo $csrf_token_name?>" value="<?php echo $csrf_token?>">
                        <button type="submit" class="btn btn-primary" style="float:right;">Save Changes</button>
                    </form>
            </div>
        </div>
        <!-- /.row -->


<!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add a Compulsory Skill</h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('/admin_functions/addCompulsorySkill'); ?>" method="post">

                <div class="col-sm-12">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Skill</label>
                          <select name="skill_id" class="form-control" required>
                            <?php foreach ($skills as $key => $value) {
                              ?>
                            <option value="<?php echo $value['skill_id']; ?>"><?php echo $value['skill']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                </div>
                </div>

                  <center><button type="submit" class="btn btn-primary btn-lg">Save changes</button></center>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


            </div>
          </div>
        </div>
      </div>

        <!-- Footer -->
<?php echo $bottom; ?>


</body>

</html>
