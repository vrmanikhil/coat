<?php echo $top; ?>
        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <?php echo $left; ?>
            <!-- Content Column -->
            <div class="col-md-9">
                    <a href="<?php echo base_url('/admin_functions/flushTest'); ?>" class="btn btn-danger" style="float:right;">Flush Test Settings</a>
                    <h2>Test Settings</h2>
                    <form action="<?php echo base_url('/admin_functions/setupTest'); ?>" method="post">
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Test Name</label>
                                <input type="text" class="form-control" name="testName" value="<?php echo $testSetup['testName']; ?>">
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>College Name</label>
                                <select name="college_id" class="form-control" required>
                                  <?php foreach ($colleges as $key => $value) {  ?>
                                  <option value="<?php echo $value['id']; ?>" <?php if ($value['id']===$testSetup['college_id']) echo "selected"; ?>><?php echo $value['collegeName']; ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                      </div>
                      </div>
                      <p><b>User Driven Skills</b></p>
                      <div class="col-sm-3">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Number of Skills</label>
                                <input type="text" class="form-control" name="numberOfSkills" value="<?php echo $testSetup['skillsAllowed']; ?>" required>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Positive Score</label>
                                <input type="text" class="form-control" name="positiveScore" value="<?php echo $testSetup['positiveScore']; ?>" required>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Negative Score</label>
                                <input type="text" class="form-control" name="negativeScore" value="<?php echo $testSetup['negativeScore'] ?>" required>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Number of Questions</label>
                                <input type="text" class="form-control" name="numberOfQuestions" value="<?php echo $testSetup['numberOfQuestions']; ?>" required>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Time</label>
                                <input type="text" class="form-control" name="time" value="<?php echo $testSetup['timeAllowed']; ?>" required placeholder="in minutes">
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Percentage of Easy Question</label>
                                <input type="text" class="form-control" name="easyPercentage" value="<?php echo $testSetup['easyPercentage']; ?>" required>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Percentage of Medium Question</label>
                                <input type="text" class="form-control" name="mediumPercentage" value="<?php echo $testSetup['mediumPercentage']; ?>" required>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Percentage of Hard Question</label>
                                <input type="text" class="form-control" name="hardPercentage" value="<?php echo $testSetup['hardPercentage']; ?>" required>
                            </div>
                      </div>
                      </div>

                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <input type="hidden" name="<?php echo $csrf_token_name?>" value="<?php echo $csrf_token?>">
                        <button type="submit" class="btn btn-primary" style="float:right;">Save Changes</button>
                    </form>
                      <p style="margin-top: 200px;"><b>Compulsory Skills</b></p>
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
                                              <th>Questions</th>
                                              <th>Time</th>
                                              <th>Easy-Medium-Hard</th>
                                              <th>Positive/Negative</th>
                                              <th>Edit</th>
                                              <th>Delete</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php $i=1; foreach ($compulsorySkills as $key => $value) {  ?>
                                          <tr class="odd gradeX">
                                              <td><?php echo $i; $i++; ?></td>
                                              <td><?php echo $value['skill'] ?></td>
                                              <td><?php echo $value['numberOfQuestions']; ?></td>
                                              <td><?php echo $value['time']; ?></td>
                                              <td><?php echo $value['easyPercentage']; ?>% - <?php echo $value['mediumPercentage']; ?>% - <?php echo $value['hardPercentage']; ?>%</td>
                                              <td><?php echo $value['positiveScore']; ?>/<?php echo $value['negativeScore']; ?></td>
                                              <td class="center"><a data-toggle="modal" data-target="#myModal" data-id="<?php echo $value['id']; ?>" class="edit-skill btn btn-success">Edit</a></td>
                                              <td class="center"><a data-toggle="modal" data-id="<?php echo $value['id']; ?>" data-target="#myModal1" class="open-AddBookDialog btn btn-danger">Delete</a></td>
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

                <div class="col-sm-6">
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


                <div class="col-sm-3">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Positive Score</label>
                          <input type="text" class="form-control" name="positiveScore" required>
                      </div>
                </div>
                </div>
                <div class="col-sm-3">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Negative Score</label>
                          <input type="text" class="form-control" name="negativeScore" required>
                      </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Number of Questions</label>
                          <input type="text" class="form-control" name="numberOfQuestions" required>
                      </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Time</label>
                          <input type="text" class="form-control" name="time" required placeholder="in minutes">
                      </div>
                </div>
                </div>
                <div class="col-sm-4">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Percentage of Easy Question</label>
                          <input type="text" class="form-control" name="easyPercentage" value="25" required>
                      </div>
                </div>
                </div>
                <div class="col-sm-4">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Percentage of Medium Question</label>
                          <input type="text" class="form-control" name="mediumPercentage" value="50" required>
                      </div>
                </div>
                </div>
                <div class="col-sm-4">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Percentage of Hard Question</label>
                          <input type="text" class="form-control" name="hardPercentage" value="25" required>
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
 </script>

</body>

</html>
