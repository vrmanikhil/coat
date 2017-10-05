<!DOCTYPE html>
<html lang="en">
<?php echo $head; ?>

<style>
.svg-hexagonal-counter {
    position: relative;
    float: left;
}

.svg-hexagonal-counter h2 {
    text-align:center;
    position: absolute;
    line-height: 200px;
    width: 100%;
}

.svg-hexagonal-counter .counter{
    width: 200px;
    height: 240px;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: default;
}
.svg-hexagonal-counter .counter .track,
.svg-hexagonal-counter .counter .fill {
    fill: rgba(0, 0, 0, 0);
    stroke-width: 30;
    transform: translate(290px, 800px)rotate(-120deg);
}

.svg-hexagonal-counter .counter .fill {
    stroke: rgb(255, 255, 255);
    stroke-linecap: round;
    stroke-dasharray: 2160;
    stroke-dashoffset: 2160;
}
</style>

<body>


	<div class="container-fluid">
		<div class="row">
			<?php echo $left; ?>

			<div class="col-md-9" id="main-wrapper">

          <div class="col-sm-9">
    					<div style="text-align: center; margin-top: 25px;">
    						<p class="mcq-title">TEST: <?= $testData['testName']?></p>
    					</div>
    					<div class="col-sm-12">
                           
    						<p class="mcq"><strong>Question</strong></p>
    						<div class="mcq" id = "question"><?=$questionData[0]['question']?></div>
                            <div class="options">
                                <?php
                                if($questionData[0]['type'] != 2 ) { 
                                $i = 0;
                                $options = json_decode($questionData[0]['options']); 
                                foreach ($options as $key => $value) { $i++;?>
    							<div class = 'option'>
    								<span class="opt"><?= chr($i+64)?></span>
    								<input type="radio" name="answer" id="option<?= chr($i+64) ?>" value="<?= $i?>" />
    								<label for="option<?= chr($i+64)?>" id = 'option<?= $i ?>'><?=$value?></label>
    							</div>
                               <?php } ?>
                            <?php } ?>
                            <?php if($questionData[0]['type'] == 2) {?>
                                <input type = "text" name = "answer" id = "input">
                                <?php } ?>
                            </div>
                            
    					</div>
                       
    					<center>
                            <button id="reset" class="btn btn-default" style="background-color: #3d464d; color: #fff; margin-top: 10px;">RESET</button>
                            <button class="btn btn-default submitAns" style="background-color: #3d464d; color: #fff; margin-top: 10px;">SUBMIT</button>
                        </center>

          </div>

          
          <div class="col-sm-3">
            <?php if($timeBound == 1){?>
                <div class="col-sm-12 well" style="margin-top: 25px;">
                  <center><b>Test Time</b></center>
                  <div><b><center id = 'timer' style= "font-size: 2em"></center></b></div>
                </div>
            <?php } ?>
            <div class="col-sm-12 well">
              <center><button class="btn btn-lg finishTest" style="background-color: #3d464d; color: #fff;">FINISH TEST</button></center>
            </div>
          </div>

			</div>

		</div>
	</div>
</body>
<?php echo $foot; ?>

<script src="<?php echo base_url('/assets/website/js/jquery-min.js'); ?>"></script>
<?php if($singleLogin == 1){ ?>
<script type="text/javascript" src = "<?php echo base_url('/assets/website/js/updateSession.js'); ?>"></script>
<?php } ?>
<script>
var timePassed= 0;
<?php if($timeBound == 1){ ?>
    var totalTime = <?= $totalTime?>;
<?php }else{ ?>
    var totalTime = 0;
    var tmp = 0;
<?php } ?>
var interval = null;

<?php if($timeBound == 1){ ?>
var time = totalTime,r=document.getElementById('timer'),tmp=time;
setInterval(function () {
    var c = tmp--,h = (c/3600)>>0,m=((c-h*3600)/60)>>0,s=(c-m*60-h*3600)+'';
    if(h>0){
        timer.textContent= h+' : '+m+' : '+(s.length>1?'':'0')+s
    }else{
        timer.textContent= m+' : '+(s.length>1?'':'0')+s
    }
    if (c<1) {
        finishTest();
    }

},1000);
<?php } ?>

var ans = 0;
var selected = null;


$('body').on('click','.option', function(){
    selected = $(this).find("input[name = answer]").attr('id');
    ans = $("#"+selected).val();
    console.log(ans);
});    
 
$('body').on('change','#input',function(){
    ans = $('#input').val();
 }) ;  

$('#reset').on('click', function() {
   $('input[type=radio]').prop('checked', function () {
       return this.getAttribute('checked') == 'checked';
   });
})

$('.submitAns').on('click', function(){
    $(this).hide();
    $('#reset').hide();
    submitAnswers(ans, tmp);
});

$('.finishTest').on('click', function(){
    finishTest();
});

function submitAnswers(ans, tmp){   
   data = {answer: ans, totalTime:tmp};
   console.log(data);
   $.post('<?= base_url('sponsoredTestFunctions/nextQuestion')?>', data).done(function(res){
        if(res == 'false'){
            window.location = "<?= base_url('skill-tests')?>";
        }
        res = JSON.parse(res);
        populate(res);
   })
}

function finishTest(){
    clearInterval(interval);
    window.location = "<?= base_url('sponsoredTestFunctions/endTest')?>";
}

function populate(res){
    if(res.questionData == null){
        finishTest();
    }else{
    $('.submitAns').hide()
    $('#reset').hide();
    $('#question').empty();
    $("#"+selected).prop("checked", false);
    $('#question').html(res.questionData.question);
    $('.options').empty();
    if(res.questionData.type != 2){
        options = JSON.parse(res.questionData.options);
        j=1;
        for(i = 0; i<options.length;i++){
            $('.options').append('<div class = "option"><span class="opt">'+ String.fromCharCode(65 + i) +'</span><input type="radio" name="answer" id="option'+ String.fromCharCode(65 + i) +'" value="'+ j++ +'" /><label for="option'+ String.fromCharCode(65 + i) +'" id = "option'+i+'">'+ options[i] +'</label></div>');
        }
    }else{
         $('.options').append('<input type = "text" name = "answer" id = "input">');    
     }
    totalTime = res.totalTime;
        var hey = setInterval(function () {
            var nc = 0;
            if (nc<=0) {
                clearInterval(hey);
                $('.submitAns').show()
                $('#reset').show()   
                }
        },1000);
} 
}

</script>
<!-- <script type="text/javascript" src = "<?php echo base_url('/assets/website/js/disable.js'); ?>"></script> -->
</html>
