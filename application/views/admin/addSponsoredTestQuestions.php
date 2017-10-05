<?php echo $top; ?>



    <!-- Page Content -->


        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <?php echo $left; ?>
            <!-- Content Column -->
            <div class="col-md-9">

                    <h2>Add New Question</h2>
                    <form action="<?php echo base_url('/SponsoredTestAdmin/addQuestion'); ?>" method="post">
                      <div class = "row">
                      <div class="col-sm-4">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Test Name</label>
                                <select name="test" class="form-control" id = "test" required>
                                  <option>--Select--</option>
                                  <?php foreach ($sponsoredTest as $key => $value) {?>
                                      <option value="<?= $value['testID']?>"><?= $value['name']?></option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                      </div>
                    </div>
                      <div class = "question-details">
                      <div class="col-sm-4">
                        <div class="control-group form-group" id = "type-div" style="display: none" >
                            <div class="controls">
                                <label>Question Type</label>
                                <select name="type" class="form-control" id = "type" required>
                                  <option>--Select--</option>
                                  <option value="1">Objective</option>
                                  <option value="2">Subjective</option>
                                  <option value="3">Opinion</option>
                                </select>
                            </div>
                        </div>
                      </div> 
                      <div class="col-sm-12" id = "question-div" style = "display: none">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Question</label>
                                <textarea class="form-control" name="question" id="question" required></textarea>
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-12" id = "option-wrap" style="display:none">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Option 1</label>
                                <textarea class="form-control" name="option[]" id="option1" class ="option-area" required></textarea>
                            </div>
                        </div>
                      </div>
                    </div>
                    <a href = "javascript:" id = "deleteOption" class = "btn btn-primary col-sm-2" style="float:left; display: none">Delete Option</a> 
                    <a href = "javascript:" id = "addAnswers" class = "btn btn-primary col-sm-2" style="margin-left: 26%; display: none">Add Answer</a>
                    <a href = "javascript:" id = "done" class = "btn btn-primary col-sm-2" style="margin-left: 26%; display: none">Done</a>
                    <a href = "javascript:" id = "addOptions" class = "btn btn-primary col-sm-2" style="float:right; display: none">Add Options</a>
                      <div class="col-sm-12" id = "answer-div" style = "display: none">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Answer</label>
                                <select name="answer" class="form-control" id = "answer" required>
                                  <option>--Select--</option> 
                                </select>
                            </div>
                        </div>
                      </div>
                     
                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <input type="hidden" name="<?php echo $csrf_token_name?>" value="<?php echo $csrf_token?>">
                        <button type="submit" class="btn btn-primary"  id = "add_question" style="float:right; display: none">Add Question</button>
                    </form>             
            </div>
        </div>
          <!-- /.row -->
        <hr>

        <!-- Footer -->
<?php echo $bottom; ?>
<script>
  </script>
    <script src="<?php echo base_url('assets/admin/ckeditor/ckeditor.js'); ?>"></script>
    <script type="text/javascript">
      var i =1, val;
      $('#test').change(function(){
        $('#question-div').hide();
        $('#option-wrap').hide();
        $("#addOptions").hide();
          $('#deleteOption').hide();
          $('#addAnswers').hide();
          $('#answer-div').hide();
          $('#add_question').hide();
          $('#done').hide();
           for(j = i; j> 1; j--,i--){
            $("#addOptionWrap"+j).remove();
          }
        $('#type-div').show();
      });
      $('#type').change(function(){
        val = $('#type').val();
        if(val == 1){
          $('#question-div').show();
          $('#option-wrap').show();
          $("#addOptions").show();
          $('#deleteOption').hide();
           $('#add_question').hide();
           $('#addAnswers').hide();
           $('#answer-div').hide();
           $('#done').hide();
           $('#option1').attr('required','true');
          for(j = i; j> 1; j--,i--){
            $("#addOptionWrap"+j).remove();
          }
          CKEDITOR.replace('option1');
          CKEDITOR.replace('question');
        }
        if(val == 2){
          $('#question-div').show();
          $('#option-wrap').hide();
          $('#add_question').show();
          $("#addOptions").hide();
          $('#deleteOption').hide();
          $('#addAnswers').hide();
          $('#answer-div').hide();
          $('#done').hide();
          $('#option1').removeAttr('required');
          for(j = i; j> 1; j--,i--){
            $("#addOptionWrap"+j).remove();
          }
          CKEDITOR.replace('question');    
        }
        if(val == 3){
          $('#question-div').show();
          $('#option-wrap').show();
          $("#addOptions").show();
          $('#deleteOption').hide();
           $('#add_question').hide();
           $('#addAnswers').hide();
           $('#answer-div').hide();
           $('#done').hide();
           $('#option1').attr('required','true');
          for(j = i; j> 1; j--,i--){
            $("#addOptionWrap"+j).remove();
          }
          // $('#add_question').show();
          CKEDITOR.replace('option1');
          CKEDITOR.replace('question');
        }
      });
      $('#addOptions').click(function(){
        i++;
        $('#deleteOption').show(); 
        if(val == 1){ 
          $('#addAnswers').show();
        }     
        if(val == 3){
          $('#done').show();
        }  
        $('.question-details').append('<div class="col-sm-12" id = "addOptionWrap' + i +'"><div class="control-group form-group"><div class="controls"><label>Option ' + i+ '</label><textarea class="form-control" name="option[]" id="option' + i +'" class ="option-area" required></textarea></div></div></div>');
        CKEDITOR.replace('option'+i);
      });
      $('#deleteOption').click(function(){
        if(i>1){
          $("#addOptionWrap"+i).remove();
          i--;
        }
        if(i==1){
          $('#deleteOption').hide();
          $('#addAnswers').hide();
          $('#done').hide();
        }
      });
      $('#addAnswers').click(function(){
        if(val == 1){
        $("#addOptions").hide();
        $('.addedOptions').remove();
        $('#deleteOption').hide();
        for(opt = 1; opt<=i; opt++){
          $('#answer').append('<option value="'+ opt +'" class = "addedOptions"> Option '+ opt +'</option>')
        }
        $('#answer-div').show();
        $('#addAnswers').hide();
        $('#add_question').show();
      }
      });
      $('#done').click(function(){
        if(val == 3){
        $("#addOptions").hide();
        $('#deleteOption').hide();
        $('#done').hide();
        $('#add_question').show();
      }
      });
    </script>>

</body>

</html>