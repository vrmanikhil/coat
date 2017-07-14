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
<<<<<<< HEAD
                <p class="mcq" style="float: right;"><a>Skip Question</a></p>
=======
                <p class="mcq" style="float: right;"><a href = "<?= base_url('homeFunctions/skipQuestion')?>">Skip Question</a></p>
>>>>>>> c5499360dd675632c85398b5d45c3a8ac5e7ee79
    						<p class="mcq"><strong>Question</strong></p>
    						<p class="mcq"><?=$questionData[0]['question']?></p>
                <div class="options">
    							<div>
    								<span class="opt">A</span>
    								<input type="radio" name="answer" id="optionA" value="1" />
    								<label for="optionA"><?=$questionData[0]['option1']?></label>
    							</div>
    							<div>
    								<span class="opt">B</span>
    								<input type="radio" name="answer" id="optionB" value="2" />
    								<label for="optionB"><?=$questionData[0]['option2']?></label>
    							</div>
    							<div>
    								<span class="opt">C</span>
    								<input type="radio" name="answer" id="optionC" value="3" />
    								<label for="optionC"><?=$questionData[0]['option3']?></label>
    							</div>
    							<div>
    								<span class="opt">D</span>
    								<input type="radio" name="answer" id="optionD" value="4" />
    								<label for="optionD"><?=$questionData[0]['option4']?></label>
    							</div>
    						</div>
    					</div>



    					<center><button class="btn btn-default" style="background-color: #3d464d; color: #fff; margin-top: 10px;">SUBMIT</button>
              </center>

          </div>






          <div class="col-sm-3">

            <div class="col-sm-12 well" style="margin-top: 25px;">
<<<<<<< HEAD
              <center><b>My Skill Strength: 15%</b></center>
              <div class="progress" style="margin-top: 10px;">
                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:10%"></div>
                <div class="progress-bar progress-bar-success" role="progressbar" style="width:15%"></div>
              </div>
              <a style="float:right;" data-toggle="modal" data-target="#knowMore">Know More</a>
=======
              <center><b>Test Time Remaining:</b></center>
              <div><center id = 'timer'></center></div>
>>>>>>> c5499360dd675632c85398b5d45c3a8ac5e7ee79
            </div>

            <div class="col-sm-12 well">
              <center><b>Time Consumed</b>
                <div class="svg-test">

                </div>
              </center>
            </div>

            <div class="col-sm-12 well">
              <center><button class="btn btn-lg" style="background-color: #3d464d; color: #fff;">FINISH TEST</button></center>
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
(function ( $ ) {
    $.fn.svgTimer = function(options) {
        var opts = $.extend({}, $.fn.svgTimer.defaults, options);

        var template = "<div class='svg-hexagonal-counter'>"
<<<<<<< HEAD
            + "<h2>0</h2>"
=======
            + "<h2>30</h2>"
>>>>>>> c5499360dd675632c85398b5d45c3a8ac5e7ee79
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
            var i = 1;

            //draw initial hexagon
            track.css('stroke', opts.track);
            fill.css({
                'stroke': opts.fill,
                'stroke-dashoffset': initialOffset-(i*(initialOffset/time)) + 'px',
                'transition': 'stroke-dashoffset 1s ' +  opts.transition
            });

            //run timer
<<<<<<< HEAD
=======
            var r = 5;
            var g = 250;
>>>>>>> c5499360dd675632c85398b5d45c3a8ac5e7ee79
            var interval = setInterval(function() {
                track.css('stroke', opts.track);
                fill.css({
                    'stroke': opts.fill,
                    'stroke-dashoffset': initialOffset-(i*(initialOffset/time)) + 'px',
                    'transition': 'stroke-dashoffset 1s ' +  opts.transition
<<<<<<< HEAD
                });
                if(opts.direction === 'forward'){
                    counterText.text(i);
                } else if (opts.direction === 'backward') {
                    var count = opts.time - i + 1;
=======
                }); 
                if(time/i > 3){
                     opts.fill = "rgb(0,153,0)";
                }else if(time/i <= 3 && time/i > 1.5){
                     opts.fill = "rgb(225,225,0)";
                }else if(time/i <= 1.5){
                     opts.fill = "rgb(204,0,0)";
                }
                if(opts.direction === 'forward'){
                    counterText.text(i);
                } else if (opts.direction === 'backward') {
                    var count = opts.time - i;
>>>>>>> c5499360dd675632c85398b5d45c3a8ac5e7ee79
                    counterText.text(count);
                }

                if (i == time) {
                    clearInterval(interval);
                }
                i++;
            }, opts.interval);
        });
    };

    $.fn.svgTimer.defaults = {
<<<<<<< HEAD
        time: 124,
        track: 'rgb(56, 71, 83)',
        fill: 'rgb(104, 214, 198)',
        transition: 'linear',
        direction: 'forward',
=======
        time: 30,
        track: 'rgb(56, 71, 83)',
        fill: 'rgb(0,153,0)',
        transition: 'linear',
        direction: 'backward',
>>>>>>> c5499360dd675632c85398b5d45c3a8ac5e7ee79
        interval: 1000
    }
}( jQuery ));
</script>
<script>
$(function () {
  $('.svg-test').svgTimer();
});
<<<<<<< HEAD
=======
        var time = 9000,r=document.getElementById('timer'),tmp=time;
        setInterval(function () {
            var c = tmp--,h = (c/3600)>>0,m=((c-h*3600)/60)>>0,s=(c-m*60-h*3600)+'';
            if(h>0){
                timer.textContent= h+' Hr : '+m+' Min : '+(s.length>1?'':'0')+s+ ' Sec'
            }else{
                timer.textContent= m+' Min : '+(s.length>1?'':'0')+s+ ' Sec'
            }
            if (c<1) {
                submitAnswers(eventKey);
            }

        },1000);
>>>>>>> c5499360dd675632c85398b5d45c3a8ac5e7ee79
</script>





</html>
