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
    						<p class="mcq-title">SKILL: <?= $skillData['skillName']?></p>
    					</div>
    					<div class="col-sm-12">
                            <p class="mcq skipQuestion" style="float: right;"><a>Skip Question</a></p>
    						<p class="mcq"><strong>Question</strong></p>
    						<p class="mcq"><?=$questionData[0]['question']?></p>
                            <div class="options">
    							<div class = 'option'>
    								<span class="opt">A</span>
    								<input type="radio" name="answer" id="optionA" value="1" />
    								<label for="optionA"><?=$questionData[0]['option1']?></label>
    							</div>
    							<div class = 'option'>
    								<span class="opt">B</span>
    								<input type="radio" name="answer" id="optionB" value="2" />
    								<label for="optionB"><?=$questionData[0]['option2']?></label>
    							</div>
    							<div class = 'option'>
    								<span class="opt">C</span>
    								<input type="radio" name="answer" id="optionC" value="3" />
    								<label for="optionC"><?=$questionData[0]['option3']?></label>
    							</div>
    							<div class = 'option'>
    								<span class="opt">D</span>
    								<input type="radio" name="answer" id="optionD" value="4" />
    								<label for="optionD"><?=$questionData[0]['option4']?></label>
    							</div>
    						</div>
    					</div>
    					<center><button class="btn btn-default submitAns" style="background-color: #3d464d; color: #fff; margin-top: 10px;">SUBMIT</button>
              </center>

          </div>






          <div class="col-sm-3">

            <div class="col-sm-12 well" style="margin-top: 25px;">
              <center><b>Test Time</b></center>
              <div><b><center id = 'timer' style= "font-size: 2em"></center></b></div>
            </div>

            <div class="col-sm-12 well">
              <center><b>Question Time </b>
                <div class="svg-test">

                </div>
              </center>
            </div>

            <div class="col-sm-12 well">
              <center><button class="btn btn-lg finishTest" style="background-color: #3d464d; color: #fff;">FINISH TEST</button></center>
            </div>



          </div>

			</div>

		</div>
	</div>


  <div class="modal fade" id="knowMore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><b>Skill Strength<b></h4>
      </div>
      <div class="modal-body">
        <p class="mcq"><b>Details will go here</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>

</body>
<?php echo $foot; ?>

<script src="http://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script>
var timePassed= 0;
(function ( $ ) {
    $.fn.svgTimer = function(options) {
        var opts = $.extend({}, $.fn.svgTimer.defaults, options);
        var template = "<div class='svg-hexagonal-counter'>"
            + "<h2>10</h2>"
            + "<svg class='counter' x='0px' y='0px' viewBox='0 0 776 628'>"
            + "<path class='track' d='M723 314L543 625.77 183 625.77 3 314 183 2.23 543 2.23 723 314z'></path>"
            + "<path class='fill' d='M723 314L543 625.77 183 625.77 3 314 183 2.23 543 2.23 723 314z'></path>"
            + "</svg>"
            + "</div>";

        return this.each(function() {
            // Build dom for svg countdown
            var parentEl = $(this);
            parentEl.append(template);

            //define dom elements
            var track = parentEl.find('.track');
            var fill = parentEl.find('.fill');
            var counterText = parentEl.find('h2');

            //set time and offset
            var time = opts.time; /* how long the timer runs for */
            var initialOffset = 2160;
            timePassed = 1;

            //draw initial hexagon
            track.css('stroke', opts.track);
            fill.css({
                'stroke': opts.fill,
                'stroke-dashoffset': initialOffset-(timePassed*(initialOffset/time)) + 'px',
                'transition': 'stroke-dashoffset 1s ' +  opts.transition
            });

            //run timer

            var r = 5;
            var g = 250;
            var interval = setInterval(function() {
                track.css('stroke', opts.track);
                fill.css({
                    'stroke': opts.fill,
                    'stroke-dashoffset': initialOffset-(timePassed*(initialOffset/time)) + 'px',
                    'transition': 'stroke-dashoffset 1s ' +  opts.transition
                }); 
                if(time/timePassed > 3){
                     opts.fill = "rgb(39,174,96)";
                }else if(time/timePassed <= 3 && time/timePassed > 1.5){
                     opts.fill = "rgb(241,152,12)";
                }else if(time/timePassed <= 1.5){
                     opts.fill = "rgb(204,0,0)";
                }
                if(opts.direction === 'forward'){
                    counterText.text(i);
                } else if (opts.direction === 'backward') {
                    var count = opts.time - timePassed;
                    counterText.text(count);
                }

                if (timePassed == time) {
                    submitAnswers();
                    clearInterval(interval);
                }
                timePassed++;
            }, opts.interval);
        });
    };

    $.fn.svgTimer.defaults = {
        time: 800,
        track: 'rgb(56, 71, 83)',
        fill: 'rgb(39,174,96)',
        transition: 'linear',
        direction: 'backward',
        interval: 1000
    }
}( jQuery ));

$(function () {
  $('.svg-test').svgTimer();
});
var time = 900,r=document.getElementById('timer'),tmp=time;
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
var ans = 0;

$('.option').on('click', function(){
    ans = $(this).find("input[name = answer]").val();
});    

$('.skipQuestion').on('click', function(){
    submitAnswers(0, tmp, timePassed);

});

$('.submitAns').on('click', function(){
    submitAnswers();
});

$('.finishTest').on('click', function(){
    finishTest();
});

function submitAnswers(ans, timePassed, tmp){
   // data:{answer: ans, timeConsumed: timePassed, totalTime:tmp}
}

function finishTest(){
    alert('finishTest');
}

function populate(){
    alert('populate');
}
</script>





</html>
