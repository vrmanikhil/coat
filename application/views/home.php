<!doctype html>
<html class="no-js" lang="">



<?php echo $head; ?>


<body>

	<div class="container-fluid header">




		<div class="row">

			<div class="col-md-5" style="margin-top:18px;">

				<h3 class="main-header" style="margin-left:10px;">CAMPUS PUPPY ONLINE ASSESMENT TEST</h3>
				<h5 class="sub-header" style="margin-left:10px;">powered by  <a href="http://www.campuspuppy.com" target="_blank" class="link">CAMPUSPUPPY</a></h5>

			</div>

			<div class=" col-md-offset-2 col-md-5">
				<div class="row">
				<form method="post" action="web/login">
						<div class="col-md-5">
							<input type="email" placeholder="E-MAIL ADDRESS" class="main-form main-form-2" style="width:100%;" id="login-form" name="data[email]">
						</div>

						<div class="col-md-5">
							<input type="password" placeholder="PASSWORD" class="main-form main-form-2" style="width:100%;" id="login-form" name="data[password]">
							<input type="hidden" name="<?= $csrf_token_name?>" value="<?= $csrf_token?>">
							<a href="#" class="forgot" id="forgot_password">Forgot Password?</a>
						</div>

						<div class="col-md-2" id="margin-add">
							<button type="submit" href="#" class="button"/>

						</div>
					</form>
				</div>
			</div>
		</div>



		<div class="container">

			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

					<div class="modal-content" style="height:450px;">

						<div style="padding:12px;background-color: #0b99cd;text-align:center;">
							<h4 style="font-size:1.7em;color:white;">FORGOT YOUR PASSWORD?</h4>
						</div>

						<div style="padding-left:50px;padding-top:40px;">
							<p style="font-size:1.2em;font-family:'quick-b';margin-bottom:40px;">Don't worry! Just fill in your email and we'll help
								<br> you reset your password. </p>
								<input type="email" placeholder="E-MAIL ADDRESS" class="main-form" style="width:60%;margin-bottom:50px;margin-right:15px;border-bottom:2px solid #ccc;">
								<a href="#" class="button button-2 modal-button">SEND E-MAIL</a>
							</div>

							<div style="padding-left:50px;padding-right:50px;">
								<hr>
								<a href="#" id="back" data-dismiss="modal">BACK TO LOGIN</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="container-fluid">
			<div class="row">

				<div class="col-md-12 content">

					<div class="col-md-2" style="padding-right:0px;">
						<img src="<?php echo base_url('assets/website/images/coat.gif'); ?>" class="logo">
					</div>

					<div class="col-md-5" style="padding-left:0px;">
						<h4 style="margin-top:120px;text-align:justify;">
							Coat is Campus Puppy Online Assessment Test aims at testing knowledge of a person in specific skills. This test will help people to get recognised among their colleagues and brightening their chances of getting filtered by the top leading companies. The test has a threshold marks value below which the skill will not be added to the person’s profile. This test helps people to not only get through companies but to test their skills and improve their knowledge. Skills vary from technical, aptitude, logical to managerial skills etc. This test is for people from all domains.
						</h4>
						<h1 style="font-family:'quick-b';stext-align:left;color:#333333;font-size:1.5em;">HAVE YOU TAKEN YOUR <span style=""> COAT </span> YET?</h1></div>

						<div class="col-md-1">
						</div>



						<div class="col-md-4 signup-form">
							<h3 style="text-align:center; font-family:'quick-b';margin-bottom:30px;">NEW TO COAT? REGISTER NOW!</h3>
							<form action="web/signup" method="post">
								<div class="row">

									<div class="col-md-6">
										<input type="text" placeholder="FIRST NAME" class="main-form" name="data[first_name]">
									</div>

									<div class="col-md-6">
										<input type="text" placeholder="LAST NAME" class="main-form" name="data[last_name]">
									</div>

								</div>
								<div class="row">

									<div class="col-md-12">
										<input type="email" placeholder="E-MAIL ADDRESS" class="main-form" style="width:100%;"  name="data[email]">

									</div>

								</div>
								<div class="row">

									<div class="col-md-2" style="padding-right:2px;">
										<input placeholder="+91" class="main-form dis-2" disabled style="width:100%;">
									</div>

									<div class="col-md-10">
										<input type="number" placeholder="MOBILE NUMBER" class="main-form" style="width:100%;" name="data[mobile]">
									</div>

								</div>

								<div class="row">

									<div class="col-md-8">
										<input type="password" placeholder="PASSWORD" class="main-form" style="width:100%;" name="data[password]">
									</div>

									<div class="col-md-4 dropdown" style="padding-left: 0px;padding-right: 15px;" name="">
										<select style="width:100%;">
											<option value="0">GENDER</option>
											<option value="1">MALE</option>
											<option value="2">FEMALE</option>
										</select>
									</div>

								</div>


								<div class="row">

									<div class="col-md-12">
										<input type="text" placeholder="COLLEGE NAME" disabled class="main-form dis" style="width:100%;" >
										<input type="hidden" value="0" name="data[college]">
									</div>

								</div>

								<div class="row">

									<div class="col-md-7 dropdown">
										<select name="data[course_id]">
											<option value="0">CHOOSE COURSE</option>
											<option value="0">B.TECH- COMPUTER SCIENCE</option>
											<option value="1">B.TECH- COMPUTER SCIENCE</option>
											<option value="2">B.TECH- COMPUTER SCIENCE</option>
										</select>
									</div>

									<div class="col-md-5 dropdown">
										<select type="text" name="data[batch_id]">
											<option value="0">CHOOSE BATCH</option>
											<option value="1">2013-2017</option>
											<option value="2">2014-2018</option>
										</select>
									</div>

								</div>


								<div class="row">

									<div class="col-md-12" style="text-align:center;">
										<h4 id="terms">By registering, you agree to our <a href="#">Terms and Conditions</a></h4>
										<button type="submit" class="button button-2"/>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="container">
				<div class="modal fade" id="myModal-2" role="dialog">
					<div class="modal-dialog">


						<div class="modal-content" style="height:450px;margin-top:105px;">
							<div style="padding:12px;background-color:  #0b99cd;text-align:center;">
								<h4 style="font-size:1.7em;color:white;">TERMS AND CONDITIONS</h4>
							</div>
							<div style="padding-left:30px;padding-top:40px;padding-right:30px;">
								<p style="font-size:1.2em;font-family:'quick-b';margin-bottom:40px;">The following terms and conditions (the “Terms and Conditions”) govern your use of this Web Site, and any content made available from or through this Web Site, including any subdomains thereof (the “Web Site”). The Web Site is made available by Variety Media, LLC (“Variety”).
								</div>
								<div style="padding-left:30px;padding-right:30px;">
									<hr>
									<a href="#" id="back" data-dismiss="modal">BACK TO LOGIN</a>
								</div>
							</div>
						</div>

					</div>
				</div>



				<div class="container-fluid" id="why-section">
					<div class="row">

						<div>
							<h2 style="text-align:center; font-size:30px;margin-bottom:5px;margin-top:40px;">WHY COAT ?</h2>
							<img src="<?php echo base_url('assets/website/images/down-arrow.png'); ?>" height="30px;" id="indicator">
						</div>

						<div class="col-md-4" id="icon">
							<img src="<?php echo base_url('assets/website/images/1.PNG'); ?>" height="70px;">
							<h3 style="margin-bottom:0px;text-transform:uppercase;font-family:'quick-b';font-size:1.35em;">Self Improvement</h3>
							<h5 style="margin-top:0px;font-size:0.9em;">Testing one’s knowledge in specific skills.</h5>
						</div>

						<div class="col-md-4" id="icon">
							<img src="<?php echo base_url('assets/website/images/2.PNG'); ?>" height="70px;">
							<h3 style="margin-bottom:0px;text-transform:uppercase;font-family:'quick-b';font-size:1.35em;">Recognition</h3>
							<h5 style="margin-top:0px;font-size:0.9em;">Getting recognised for the specific skill among their colleagues.</h5>
						</div>

						<div class="col-md-4" id="icon">
							<img src="<?php echo base_url('assets/website/images/3.PNG'); ?>" height="70px;">
							<h3 style="margin-bottom:0px;text-transform:uppercase;font-family: 'quick-b';font-size:1.35em;">Job Application</h3>
							<h5 style="margin-top:0px;font-size:0.9em;">Getting filtered by leading companies for interviews.</h5>
						</div>

					</div>
				</div>


				<div class="container-fluid" id="footer">
					<div class="row">
						<div class="col-md-12" style="text-align:center; margin-top:30px;">
							<a href="http://www.campuspuppy.com" class="forgot footer" target="_blank">&copy; Campus Puppy Private Limited 2016</a>
						</div>
					</div>
				</div>

				<?php echo $foot; ?>

				<script>
					$(document).ready(function () {
						$("#forgot_password").click(function () {
							$("#myModal").modal();
						});
					});

					$(document).ready(function () {
						$("#terms").click(function () {
							$("#myModal-2").modal();
						});
					});
				</script>
			</body>

			</html>
