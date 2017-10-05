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
                                        <th>Test</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php $i=1; foreach ($questions as $key => $value) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; $i++; ?></td>
                                        <td><?php echo $value['question']; ?></td>
                                        <td><?php echo $value['name']; ?></td>
                                        <td class="center"><a href="<?php echo base_url('/admin/editSponsoredTestQuestion/'); echo $value['questionID']; ?>" class="btn btn-success">Edit</a></td>
                                        <td class="center"><a data-toggle="modal" data-id="<?php echo $value['questionID']; ?>" data-target="#myModal1" class="open-AddBookDialog btn btn-danger">Delete</a></td>
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
                <form action="<?php echo base_url('/sponsoredTestAdmin/deleteQuestion'); ?>" method="post">
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
