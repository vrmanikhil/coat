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
                <h2>Users</h2>
                <div class="panel panel-default">
                        <div class="panel-heading">
                            View Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>E-Mail</th>
                                        <th>Download Report</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php $i=1; foreach ($users as $key => $value) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; $i++; ?></td>
                                        <td><?php echo $value['firstName']." ".$value['lastName']; ?></td>
                                        <td><?php echo $value['email']; ?></td>
                                        <td class="center"><a href="#" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i></a></td>
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
                <h4 class="modal-title" id="myModalLabel">Delete Question</h4>
              </div>
              <div class="modal-body">
                Are you sure you want to delete the question?
              </div>
              <div class="modal-footer">
                <form action="<?php echo base_url('/admin_functions/deleteQuestion'); ?>" method="post">
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
<script src="/assets/admin/js/jquery.dataTables.min.js"></script>
 <script src="/assets/admin/js/dataTables.bootstrap.min.js"></script>

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
