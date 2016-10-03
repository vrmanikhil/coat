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

                    <h2>Add New Question</h2>
                    <form action="<?php echo base_url('/admin_functions/add_question'); ?>" method="post">
                      <div class="col-sm-6">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Skill Name</label>
                                <select name="skill_id" class="form-control" required>
                                  <?php foreach ($skills as $key => $value) { ?>
                                  <option value="<?php echo $value['skill_id']; ?>"><?php echo $value['skill']; ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Answer</label>
                                <select name="answer" class="form-control" required>
                                  <option value="1">Option 1</option>
                                  <option value="2">Option 2</option>
                                  <option value="3">Option 3</option>
                                  <option value="4">Option 4</option>
                                </select>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Difficulty Level</label>
                                <select name="difficulty_level" class="form-control" required>
                                  <option value="1">Easy</option>
                                  <option value="2">Medium</option>
                                  <option value="3">Hard</option>
                                </select>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Question</label>
                                <textarea class="form-control" name="question" id="question" required></textarea>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Option 1</label>
                                <textarea class="form-control" name="option1" id="option1" required></textarea>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Option 2</label>
                                <textarea class="form-control" name="option2" id="option2" required></textarea>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Option 3</label>
                                <textarea class="form-control" name="option3" id="option3" required></textarea>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Option 4</label>
                                <textarea class="form-control" name="option4" id="option4" required></textarea>
                            </div>
                      </div>
                      </div>

                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <input type="hidden" name="<?php echo $csrf_token_name?>" value="<?php echo $csrf_token?>">
                        <button type="submit" class="btn btn-primary" style="float:right;">Add Question</button>
                    </form>

            </div>
        </div>
        <!-- /.row -->


        <hr>

        <!-- Footer -->
<?php echo $bottom; ?>
<script>
   $(document).ready(function() {
    CKEDITOR.replace('question');
    CKEDITOR.replace('option1');
    CKEDITOR.replace('option2');
    CKEDITOR.replace('option3');
    CKEDITOR.replace('option4');
  });
  </script>
    <script src="<?php echo base_url('assets/admin/ckeditor/ckeditor.js'); ?>"></script>


</body>

</html>
