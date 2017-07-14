<?php echo $top; ?>



        <div class="row">
            <!-- Sidebar Column -->
            <?php echo $left; ?>
            <!-- Content Column -->
            <div class="col-md-9">

                    <h2>Edit Question</h2>

                    <form action="<?php echo base_url('/admin_functions/update_question'); ?>" method="post">
                      <div class="col-sm-4">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Skill Name</label>
                                <select name="skill_id" class="form-control" required>
                                  <?php foreach ($skills as $key => $value) { ?>
                                  <option value="<?php echo $value['skill_id']; ?>" <?php if($value['skill_id']===$questionData['skill_id']) echo "selected"; ?>><?php echo $value['skill']; ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Answer</label>
                                <select name="answer" class="form-control" required>
                                  <option value="1" <?php if($questionData['answer']==='1') echo "selected"; ?>>Option 1</option>
                                  <option value="2" <?php if($questionData['answer']==='2') echo "selected"; ?>>Option 2</option>
                                  <option value="3" <?php if($questionData['answer']==='3') echo "selected"; ?>>Option 3</option>
                                  <option value="4" <?php if($questionData['answer']==='4') echo "selected"; ?>>Option 4</option>
                                </select>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Difficulty Level</label>
                                <select name="difficulty_level" class="form-control" required>
                                  <option value="1.0" <?php if($questionData['difficulty_level']==='1.0') echo "selected"; ?>>1.0</option>
                                  <option value="2.0" <?php if($questionData['difficulty_level']==='2.0') echo "selected"; ?>>2.0</option>
                                  <option value="3.0" <?php if($questionData['difficulty_level']==='3.0') echo "selected"; ?>>3.0</option>
                                  <option value="4.0" <?php if($questionData['difficulty_level']==='4.0') echo "selected"; ?>>4.0</option>
                                  <option value="5.0" <?php if($questionData['difficulty_level']==='5.0') echo "selected"; ?>>5.0</option>
                                  <option value="6.0" <?php if($questionData['difficulty_level']==='6.0') echo "selected"; ?>>6.0</option>
                                  <option value="7.0" <?php if($questionData['difficulty_level']==='7.0') echo "selected"; ?>>7.0</option>
                                  <option value="8.0" <?php if($questionData['difficulty_level']==='8.0') echo "selected"; ?>>8.0</option>
                                </select>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Expert Time</label>
                                <input type="text" name="expert_time" class="form-control" value="<?php echo $questionData['expert_time']; ?>" required>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Question</label>
                                <textarea class="form-control" name="question" id="question" required><?php echo $questionData['question']; ?></textarea>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Option 1</label>
                                <textarea class="form-control" name="option1" id="option1" required><?php echo $questionData['option1']; ?></textarea>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Option 2</label>
                                <textarea class="form-control" name="option2" id="option2" required><?php echo $questionData['option2']; ?></textarea>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Option 3</label>
                                <textarea class="form-control" name="option3" id="option3" required><?php echo $questionData['option3']; ?></textarea>
                            </div>
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Option 4</label>
                                <textarea class="form-control" name="option4" id="option4" required><?php echo $questionData['option4']; ?></textarea>
                            </div>
                      </div>
                      </div>

                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <input type="hidden" name="question_id" value="<?php echo $questionData['question_id']; ?>">
                        <input type="hidden" name="<?php echo $csrf_token_name?>" value="<?php echo $csrf_token?>">
                        <button type="submit" class="btn btn-primary" style="float:right;">Update Question</button>
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
