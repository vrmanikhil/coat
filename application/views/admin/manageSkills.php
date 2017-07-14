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
                <h2>Manage Skills</h2>
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Added Skills
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Skill Name</th>
                                        <th>Available for User Driven Test</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1; foreach ($skills as $key => $value) {  ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; $i++; ?></td>
                                        <td><?php echo $value['skill']; ?></td>
                                        <td><?php if($value['availableForUserDriven']==='1') echo "Available"; else echo "Not Available";  ?></td>
                                        <td class="center"><a data-toggle="modal" data-id="<?php echo $value['skill_id']; ?>" data-available="<?php echo $value['availableForUserDriven']; ?>" data-skill="<?php echo $value['skill']; ?>" data-target="#myModal" class="open-Skill btn btn-success">Edit</a></td>
                                        <td class="center"><a data-toggle="modal" data-id="<?php echo $value['skill_id']; ?>" data-target="#myModal1" class="open-AddBookDialog btn btn-danger">Delete</a></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <h2>Add New Skill</h2>
                    <form action="<?php echo base_url('/admin_functions/addSkill'); ?>" method="post">
                      <div class="col-sm-12">
                        <div class="col-sm-7">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Skill Name</label>
                                <input type="text" class="form-control" name="skill" required placeholder="Skill Name">
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-5">
                      <div class="control-group form-group">
                          <div class="controls">
                              <label>Available for User Driven Test</label>
                              <select class="form-control" name="availableForUserDriven" required>
                                <option value="1">Yes</option>
                                <option value="-1">No</option>
                              </select>
                          </div>
                      </div>
                    </div>
                      </div>
                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <button type="submit" class="btn btn-primary" style="float:right;">Add Skill</button>
                    </form>

            </div>
        </div>
        <!-- /.row -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Skill</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url('/admin_functions/updateSkill'); ?>" method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Skill Name</label>
                            <input type="text" class="form-control" name="skill" id="skill" required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Available for User Driven Test</label>
                            <select type="text" class="form-control" id="available" value="" name="availableForUserDriven" required>
                              <option value="1">Yes</option>
                              <option value="-1">No</option>
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
                <h4 class="modal-title" id="myModalLabel">Delete Skill</h4>
              </div>
              <div class="modal-body">
                Are you sure you want to delete the skill?
              </div>
              <div class="modal-footer">
                <form action="<?php echo base_url('/admin_functions/deleteSkill'); ?>" method="post">
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
