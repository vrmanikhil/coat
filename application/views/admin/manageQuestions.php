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
                <h2>Questions</h2>
                <div class="panel panel-default">
                        <div class="panel-heading">
                            View Questions
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Question</th>
                                        <th>Skill</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php $i=1; foreach ($questions as $key => $value) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; $i++; ?></td>
                                        <td><?php echo $value['question']; ?></td>
                                        <td><?php echo $value['skill']; ?></td>
                                        <td class="center"><a href="<?php echo base_url('/admin/editQuestion/'); echo $value['question_id']; ?>" class="btn btn-success">Edit</a></td>
                                        <td class="center"><a data-toggle="modal" data-target="#myModal1" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>

            </div>
        </div>
        <!-- /.row -->

        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Edition</h4>
              </div>
              <div class="modal-body">
                Are you sure you want to delete the edition <b>August 2016</b>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
              </div>
            </div>
          </div>
        </div>
        <hr>

        <!-- Footer -->
<?php echo $bottom; ?>
<script src="/assets/js/jquery.dataTables.min.js"></script>
 <script src="/assets/js/dataTables.bootstrap.min.js"></script>

 <script>
 $(document).ready(function() {
     $('#dataTables-example').DataTable({
         responsive: true
     });
 });
 </script>


</body>

</html>
