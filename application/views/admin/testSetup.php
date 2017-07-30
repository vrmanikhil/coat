<?php echo $top; ?>
        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <?php echo $left; ?>
            <!-- Content Column -->
            <div class="col-md-9">

                    <h2>Test Settings</h2>
                    <form action="<?php echo base_url('/admin_functions/setupTest'); ?>" method="post">



                      <div class="col-sm-6">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Number of User Driven Skills Allowed</label>
                                <input type="text" class="form-control" name="numberOfSkills" value="<?php echo $testSetup['skillsAllowed']; ?>" required>
                            </div>
                      </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Time Allowed for Each Skill (in minutes)</label>
                                <input type="text" class="form-control" name="time" value="<?php echo $testSetup['timeAllowed']; ?>" required placeholder="in minutes">
                            </div>
                      </div>
                      </div>

                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <input type="hidden" name="<?php echo $csrf_token_name?>" value="<?php echo $csrf_token?>">
                        <button type="submit" class="btn btn-primary" style="float:right;">Save Changes</button>
                    </form>
                      <p style="margin-top: 100px;"><b>Compulsory Skills</b></p>
                      <div class="panel panel-default">
                              <div class="panel-heading">
                                  Compulsory Skills
                              </div>
                              <!-- /.panel-heading -->
                              <div class="panel-body">
                                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                      <thead>
                                          <tr>
                                              <th>S.No</th>
                                              <th>Skill</th>
                                              <th>Delete</th>
                                              <th>Login</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php $i=1; foreach ($compulsorySkills as $key => $value) {  ?>
                                          <tr class="odd gradeX">
                                              <td><?php echo $i; $i++; ?></td>
                                              <td><?php echo $value['skill'] ?></td>
                                              <td class="center"><a data-toggle="modal" data-id="<?php echo $value['skill_id']; ?>" data-target="#myModal1" class="open-AddBookDialog btn btn-danger">Delete</a></td>
                                              <td class  = "center singleLogin" ><button class = '<?php if($testSetup["singleLogin"] == 1){ echo "btn btn-danger"; }else{ echo "btn btn-success"; }?> loginType' value = "<?= $testSetup['singleLogin']?>"><?php if($testSetup['singleLogin'] == 1){ echo "Single"; }else{ echo "Multiple"; }?></Button></td>
                                          </tr>
                                          <?php } ?>
                                      </tbody>
                                  </table>
                                  <!-- /.table-responsive -->

                              </div>

                              <!-- /.panel-body -->
                          </div>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="float:right;">Add a Compulsory Skill</button>

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


      <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Delete Compulsory Skill</h4>
            </div>
            <div class="modal-body">
              Are you sure you want to delete the compulsory skill?
            </div>
            <div class="modal-footer">
              <form action="<?php echo base_url('/admin_functions/deleteCompulsorySkill'); ?>" method="post">
              <input type="hidden" name="bookId" id="bookId" value=""/>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
        <hr>

        <!-- Footer -->
<?php echo $bottom; ?>

<script src="<?php echo base_url('/assets/admin/js/jquery.dataTables.min.js'); ?>"></script>
 <script src="<?php echo base_url('/assets/admin/js/dataTables.bootstrap.min.js'); ?>"></script>

 <script>
 $(document).ready(function() {
     $('#dataTables-example').DataTable({
         responsive: true
     });
 });
 </script>

 <script>
 $(document).on("click", ".open-AddBookDialog", function () {
    var myBookId = $(this).data('id');
    $(".modal-footer #bookId").val( myBookId );
});

 $(document).on("click", ".loginType", function(){
  data = $(this).val();
  if(data == 0){
     data = 1;
  }else{
    data = 0;
  }
    $.get('<?= base_url('admin_functions/changeLoginType')?>', {singleLogin:data}).done(function(res){
      res = JSON.parse(res);
      if(res.singleLogin == 1){
        $(".loginType").removeClass('btn btn-success');
        $(".loginType").addClass('btn btn-danger');
        $(".loginType").html('Single');
        $(".loginType").val('1');
      }else{
        $(".loginType").removeClass('btn btn-danger');
        $(".loginType").addClass('btn btn-success');
        $(".loginType").html('Multiple');
        $(".loginType").val('0');
      }
    });
 });
 </script>

</body>

</html>
