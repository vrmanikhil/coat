<?php echo $top; ?>



    <!-- Page Content -->
    <div class="container">
      <div class="row">
                 <div class="col-lg-12">

                     <ol class="breadcrumb" style="margin-top: 20px;">
                         <font color="green">This is some text!</font>
                     </ol>
                 </div>
             </div>
        <br><br>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <?php echo $left; ?>
            <!-- Content Column -->
            <div class="col-md-9">
                    <a class="btn btn-danger" style="float:right;">Flush Test Settings</a>
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
                                  <option value="1">JSS Academy of Technical Education, Noida</option>
                                  <option value="2">Krishna Institute of Technology, Ghaziabad</option>
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
                                              <th>Edit</th>
                                              <th>Delete</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                          <tr class="odd gradeX">
                                              <td>1</td>
                                              <td>PHP</td>
                                              <td>10</td>
                                              <td>2</td>
                                              <td>25% - 50% - 25%</td>
                                              <td class="center"><a data-toggle="modal" data-target="#myModal" class="btn btn-success">Edit</a></td>
                                              <td class="center"><a data-toggle="modal" data-target="#myModal1" class="btn btn-danger">Delete</a></td>
                                          </tr>

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
              <form action="<?php echo base_url('/admin_functions/add_question'); ?>" method="post">

                <div class="col-sm-6">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Skill</label>
                          <select name="collegeName" class="form-control" required>
                            <option value="1">PHP</option>
                            <option value="2">HTML</option>
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
                          <input type="text" class="form-control" name="easy" value="25" required>
                      </div>
                </div>
                </div>
                <div class="col-sm-4">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Percentage of Medium Question</label>
                          <input type="text" class="form-control" name="medium" value="50" required>
                      </div>
                </div>
                </div>
                <div class="col-sm-4">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Percentage of Hard Question</label>
                          <input type="text" class="form-control" name="hard" value="25" required>
                      </div>
                </div>
                </div>
                  <center><button type="button" class="btn btn-primary btn-lg">Save changes</button></center>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


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

</body>

</html>
