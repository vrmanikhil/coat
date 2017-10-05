<?php echo $top; ?>

    <!-- Page Content -->
    <div class="container">

        <br><br>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <?php echo $left; ?>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2>Manage Sponsored Test</h2>
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Added Tests
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Test Name</th>
                                        <th>Available</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1; foreach ($sponsoredTest as $key => $value) {  ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; $i++; ?></td>
                                        <td><?php echo $value['name']; ?></td>
                                        <td><?php if($value['active']==='1') echo "Available"; else echo "Not Available";  ?></td>
                                        <td class="center"><a data-toggle="modal" data-id="<?php echo $value['testID']; ?>" data-available="<?php echo $value['active']; ?>" data-skill="<?php echo $value['name']; ?>" data-target="#myModal" class="open-Skill btn btn-success">Edit</a></td>
                                        <td class="center"><a data-toggle="modal" data-id="<?php echo $value['testID']; ?>" data-target="#myModal1" class="open-AddBookDialog btn btn-danger">Delete</a></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <h2>Add New Test</h2>
                    <form action="<?php echo base_url('/sponsoredTestAdmin/addSponsoredTest'); ?>" method="post">
                      <div class="col-sm-12">
                        <div class="col-sm-6">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Test Name</label>
                                <input type="text" class="form-control" name="test" required placeholder="Test Name">
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                      <div class="control-group form-group">
                          <div class="controls">
                              <label>Available</label>
                              <select class="form-control" name="available" required>
                                <option>--Select--</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="control-group form-group">
                          <div class="controls">
                              <label>Time Bound</label>
                              <select class="form-control" name="timeBound" id = "timeBound" required>
                                <option>--Select--</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-6" id = 'time' style="display: none">
                      <div class="control-group form-group">
                          <div class="controls">
                              <label>Time (in minutes):</label>
                              <input type="text" name="time" class = "form-control" placeholder="Time" id= 'entertime'>
                          </div>
                      </div>
                    </div>
                      </div>
                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <button type="submit" class="btn btn-primary" style="float:right;">Add Test</button>
                    </form>

            </div>
        </div>
        <!-- /.row -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Test</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url('/sponsoredTestAdmin/updateSponsoredTest'); ?>" method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Test Name</label>
                            <input type="text" class="form-control" name="test" id="skill" required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Available </label>
                            <select type="text" class="form-control" id="available" value="" name="available" required>
                              <option>--Select--</option>>
                              <option value="1">Yes</option>
                              <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->

              </div>
              <div class="modal-footer">
                  <input type="hidden" name="bookId" id="bookId" value=""/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
                  </form>
              </div>

            </div>
          </div>
        </div>
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Test</h4>
              </div>
              <div class="modal-body">
                Are you sure you want to delete the Test?
              </div>
              <div class="modal-footer">
                <form action="<?php echo base_url('/sponsoredTestAdmin/deleteSponsoredTest'); ?>" method="post">
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
 <script src="<?php echo base_url('/assets/admin/js/dataTables.bootstrap.min.js') ?>"></script>

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

 $('#timeBound').change(function(){
  var val = $(this).val();
  if(val == 1){
    $('#time').show();
    $('#entertime').attr('required', 'true');
  }else{
    $('#time').hide();
    $('#entertime').removeAttr('required');
  }
 });
 </script>

 <script>
 $(document).on("click", ".open-Skill", function () {
   var myBookId = $(this).data('id');
   var skill = $(this).data('skill');
   var available = $(this).data('available');
   $(".modal-body #skill").val( skill );
   $(".modal-body #available").val( available );
    $(".modal-footer #bookId").val( myBookId );
});
 </script>


</body>

</html>
