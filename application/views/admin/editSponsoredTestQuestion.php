<?php echo $top; ?>



        <div class="row">
            <!-- Sidebar Column -->
            <?php echo $left; ?>
            <!-- Content Column -->
            <div class="col-md-9">

                    <h2>Edit Question</h2>

                    <form action="<?php echo base_url('/sponsoredTestAdmin/updateQuestion'); ?>" method="post">
                      <div class="col-sm-4">
                        <div class="control-group form-group" id = "type-div">
                            <div class="controls">
                                <label>Available</label>
                                <select name="available" class="form-control" id = "" required>
                                  <option>--Select--</option>
                                  <option value="1" <?php if($questionData['active'] == 1){ echo "selected";} ?>>Yes</option>
                                  <option value="2" <?php if($questionData['active'] == 2){ echo "selected";} ?>>No</option>
                                </select>
                            </div>
                        </div>
                      </div> 
                      <?php if($questionData['type'] == 1) { ?>
                      <div class="col-sm-2">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Answer</label>
                                <select name="answer" class="form-control" required>
                                  <?php for($i = 1; $i<=$optionNumber; $i++){ 
                                   ?>
                                    <option value="<?= $i ?>" <?php if($questionData['answer'] == $i){ echo "selected";} ?> >Option <?= $i ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                      </div>
                      </div>
                      <?php } ?>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Question</label>
                                <textarea class="form-control" name="question" id="question" required><?php echo $questionData['question']; ?></textarea>
                            </div>
                        </div>
                      </div>
                      <?php if($questionData['type'] != 2 ){ ?>
                      <div id = "question-details">
                        <?php for($i = 0; $i<$optionNumber; $i++){?>
                      <div class="col-sm-12">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Option <?= $i+1?></label>
                                <textarea class="form-control" name="option[]" id="option<?= $i+1?>" required><?php echo $questionData['options'][$i]; ?></textarea>
                            </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                      <?php } ?>
                      <a href = "javascript:" id = "deleteOption" class = "btn btn-primary col-sm-2" style="float:left">Delete Option</a> 
                      <a href = "javascript:" id = "addOptions" class = "btn btn-primary col-sm-2" style="float:right">Add Options</a>
                      <button type="submit" class="btn btn-primary col-sm-3" style="margin-left: 22%">Update Question</button>
                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <input type="hidden" name="question_id" value="<?php echo $questionData['questionID']; ?>">
                        <input type="hidden" name="<?php echo $csrf_token_name?>" value="<?php echo $csrf_token?>">
                        
                    </form>

            </div>
        </div>
        <!-- /.row -->


        <hr>

        <!-- Footer -->
<?php echo $bottom; ?>
<script>
  var optionNumber = <?= $optionNumber?>;
   $(document).ready(function() {
    CKEDITOR.replace('question');
    for(i = 1; i <= optionNumber; i++){
      CKEDITOR.replace('option'+i);
    }
  });
  </script>
    <script src="<?php echo base_url('assets/admin/ckeditor/ckeditor.js'); ?>"></script>
    <script>
        $('#addOptions').click(function(){
        optionNumber++;
        val = <?= $questionData['type']?>;
        if(val == 1){ 
          $('#addAnswers').show();
        }     
        if(val == 3){
          $('#done').show();
        }  
        $('#question-details').append('<div class="col-sm-12" id = "addOptionWrap' + optionNumber +'"><div class="control-group form-group"><div class="controls"><label>Option ' + optionNumber + '</label><textarea class="form-control" name="option[]" id="option' + optionNumber +'" class ="option-area" required></textarea></div></div></div>');
        CKEDITOR.replace('option' + optionNumber);
      });
      $('#deleteOption').click(function(){
        if(optionNumber>1){
          $("#addOptionWrap"+optionNumber).remove();
          optionNumber--;
        }
        if(optionNumber==1){
          alert('You cannot have less than 2 options');
          optionNumber++;
        }
      });
    </script>

</body>

</html>
