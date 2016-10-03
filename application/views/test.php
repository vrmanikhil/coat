<!doctype html>
<html class="no-js" lang="">

<?php echo $head; ?>

<body>


	<div class="container-fluid">
		<div class="row">
			<?php echo $left; ?>
			<div class="col-md-9 col-md-offset-2" id="main-wrapper">
				<div class="row">
					<div class="col-md-12">
						<h2 class="dash-head" id="ques-title"><span style="margin-right:10px;"><img src="<?php echo base_url('assets/website/images/search.png'); ?>" height="40px;"></span> CSS- WEB DEVELOPMENT</h2>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8">
						<h2>QUESTION 1</h2>
						<hr id="separator">
						<div class="row question-container">


							<p class="question-paragraph">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fu</p>


						</div>

						<div class="row answer-container">
							<div class="options">



								<div class="paragraph-answer">
									<span class="opt">A</span>
									<input type="checkbox" id="option-1">
									<label for="option-1" class="selected">Choice 1</label>
								</div>

								<div class="paragraph-answer">
									<span class="opt">B</span>
									<input type="checkbox" id="option-2">
									<label for="option-2" class="selected">Choice 2</label>
								</div>

								<div class="paragraph-answer">
									<span class="opt">C</span>
									<input type="checkbox" id="option-3">
									<label for="option-3" class="selected">Choice 3</label>
								</div>

								<div class="paragraph-answer">
									<span class="opt">D</span>
									<input type="checkbox" id="option-4">
									<label for="option-4" class="selected">Choice 4</label>
								</div>


								<!--------------------------------Options are IMAGE ---------------------------------------------->



<!--
								<div class="selected image-answer">

									<input type="checkbox">
									<span class="opt">A</span>
									<div id="image-ans">
										<img src="assets/automne-1920-1080.JPG" class="question-image">
									</div>

									<input type="checkbox">
									<span class="opt" id="image-ans">B</span>
									<div id="image-ans">
										<img src="assets/automne-1920-1080.JPG" class="question-image">
									</div>

									<input type="checkbox">
									<span class="opt">C</span>
									<div id="image-ans">
										<img src="assets/automne-1920-1080.JPG" class="question-image">
									</div>

									<input type="checkbox">
									<span class="opt">D</span>
									<div id="image-ans">
										<img src="assets/automne-1920-1080.JPG" class="question-image">
									</div>
								</div>
-->





							</div>

							<div class="row" style="margin-top:20px;margin-bottom:30px;">
								<div class="col-md-2"><a href="#" class="button button-2"> Back</a></div>
								<div class="col-md-offset-8 col-md-2"><a href="#" class="button button-2"> Next</a></div>

							</div>

						</div>


					</div>










					<div class="col-md-4">

						<div id="clockdiv">

							<div class="inline">
								<span class="hours"></span>
								<div class="smalltext">Hours</div>
							</div>
							<div class="inline">
								<span class="minutes"></span>
								<div class="smalltext">Minutes</div>
							</div>
							<div class="inline">
								<span class="seconds"></span>
								<div class="smalltext">Seconds</div>
							</div>
						</div>

						<div class="row review">
							<h4>REVIEW QUESTIONS</h4>
							<div class="col-md-offset-1 col-md-12 check">

								<div>
									<input type="checkbox" id="1">
									<label for="1">1</label>
									<input type="checkbox" id="2">
									<label for="2">2</label>
									<input type="checkbox" id="3">
									<label for="3">3</label>
									<input type="checkbox" id="4">
									<label for="4">4</label>
								</div>

								<div>
									<input type="checkbox" id="5">
									<label for="5">5</label>
									<input type="checkbox" id="6">
									<label for="6">6</label>
									<input type="checkbox" id="7">
									<label for="7">7</label>
									<input type="checkbox" id="8">
									<label for="8">8</label>
								</div>
								<div>
									<input type="checkbox" id="9">
									<label for="9">9</label>
									<input type="checkbox" id="10">
									<label for="10">10</label>
									<input type="checkbox" id="11">
									<label for="11">11</label>
									<input type="checkbox" id="12">
									<label for="12">12</label>
								</div>


							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</body>
<?php echo $foot; ?>
<script>
	function getTimeRemaining(endtime) {
		var t = Date.parse(endtime) - Date.parse(new Date());
		var seconds = Math.floor((t / 1000) % 60);
		var minutes = Math.floor((t / 1000 / 60) % 60);
		var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
		var days = Math.floor(t / (1000 * 60 * 60 * 24));
		return {
			'total': t
			, 'days': days
			, 'hours': hours
			, 'minutes': minutes
			, 'seconds': seconds
		};
	}

	function initializeClock(id, endtime) {
		var clock = document.getElementById(id);
		var hoursSpan = clock.querySelector('.hours');
		var minutesSpan = clock.querySelector('.minutes');
		var secondsSpan = clock.querySelector('.seconds');

		function updateClock() {
			var t = getTimeRemaining(endtime);

			hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
			minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
			secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

			if (t.total <= 0) {
				clearInterval(timeinterval);
			}
		}

		updateClock();
		var timeinterval = setInterval(updateClock, 1000);
	}

	var deadline = new Date(Date.parse(new Date()) + 60 * 60 * 1000);
	initializeClock('clockdiv', deadline);

	$('.selected').click(function(){
		console.log($(this).parent().find('span'))

		$(this).parent().find('span').css('background-color','#16b48d')
		$(this).parent().find('span').css('transition','0.1s ease-in')
	});

	$('.question-image').click(function(){
		$(this).parent().find('span').css('background-color','#16b48d')
		$(this).parent().find('span').css('transition','0.1s ease-in')
	});


</script>

</html>
