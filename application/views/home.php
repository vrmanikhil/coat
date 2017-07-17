<!DOCTYPE html>
<html lang="en">
<?php echo $head; ?>
<body>
  <?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>
  <div class="container-fluid">
		<div class="row">
			<div class="col-md-2" id="sidebar-wrapper" style="background-color: #d3d3d3;">
				<div class="row">
          <h3 class="main-header" style="font-size:3em;text-align:center; color: #000;">COAT</h3>
					<h5 class="sub-header" style="text-align:center; color: #000;">powered by  <a href="http://www.campuspuppy.com" target="_blank" class="link" style="color:#000;"><b>CAMPUSPUPPY</b></a></h5>
				</div>
				<div class="row image" style="">
					<img src="<?php echo base_url('assets/website/images/coat.gif'); ?>" height="150px;" id="avatar">
				</div>
				<div class="row" style="text-align:center;">
          <p class="mcq-title" style="text-transform: none;">Student Login</p>
          <form action="<?php echo base_url('homeFunctions/doLogin'); ?>" method="post">
            <div class="form-group">
              <label style="float: left; margin-left: 10px;">E-Mail Address</label>
              <input type="email" name="email" class="form-control" placeholder="E-Mail Address" style="width: 90%; margin-left: 10px;">
            </div>
            <div class="form-group">
              <label style="float: left; margin-left: 10px;">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password" style="width: 90%; margin-left: 10px;">
            </div>
            <center>
              <p class="mcq" style="text-align: center;"><b><a data-toggle="modal" data-target="#forgotPassword">Forgot Password?</a></b></p>
            </center>
            <button type="submit" class="btn btn-primary" style="background-color: #3d464d; color: #fff;">LOGIN</button>
          </form>
				</div>
        <div class="row" style="margin-top:50px;">
          <p class="mcq" style="color: #fff; font-size: 11px; color: #000;"><b>&copy; Campus Puppy Private Limited 2017</b></p>
        </div>
			</div>
      <div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"><b>Forgot Password?<b></h4>
          </div>
          <div class="modal-body">
            <p class="mcq"><b>Contact the COAT representative on your Campus.</b></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
			<div class="col-md-9" id="main-wrapper">
          <div class="col-sm-12">
            <div class="col-sm-6">
              <div style="text-align: center; margin-top: 25px;">
                <p class="mcq-title">CAMPUSPUPPY ONLINE ASSESSMENT TEST</p>
              </div>
              <p class="mcq" style="margin-top: 10px; text-align: justify;">Coat is Campus Puppy Online Assessment Test aims at testing knowledge of a person in specific skills. This test will help people to get recognised among their colleagues and brightening their chances of getting filtered by the top leading companies. The test has a threshold marks value below which the skill will not be added to the person’s profile. This test helps people to not only get through companies but to test their skills and improve their knowledge. Skills vary from technical, aptitude, logical to managerial skills etc. This test is for people from all domains.
              <h4><b>HAVE YOU TAKEN YOUR COAT YET?</b></h4>
              </p>
              <div style="text-align: center; margin-top: 25px;">
                <p class="mcq-title">ABOUT CAMPUSPUPPY</p>
              </div>
              <p class="mcq" style="margin-top: 10px;">
              <center><img src="<?php echo base_url('assets/website/images/cp.PNG'); ?>" width="80%"></center>
              <p style="text-align: justify;"><b>Hellooo, Some text will go here, some text about campuspuppy.com will go here. Now we will give the link to visit the website. <a>Visit Website</a></b></p>
            </p>
            </div>
            <div class="col-sm-6">
    					<div style="text-align: center; margin-top: 25px;">
    						<p class="mcq-title">REGISTER FOR COAT</p>
    				  </div>
            <form action="<?php echo base_url('homeFunctions/register'); ?>" method="post">
                <div class="col-xs-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="firstName" class="form-control" placeholder="First Name" required>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="lastName" class="form-control" placeholder="Last Name" required>
                </div>
              </div>
              <div class="col-xs-12">
                <div class="form-group">
                  <label>E-Mail Address</label>
                  <input type="email" name="email" class="form-control" placeholder="E-Mail Address" required>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group">
                  <label style="color: #fff;">#</label>
                  <input type="text" class="form-control" value="+91" disabled>
                </div>
              </div>
              <div class="col-xs-9">
                <div class="form-group">
                  <label>Mobile</label>
                  <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" maxlength="10" required>
                </div>
              </div>
              <div class="col-xs-7">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
              </div>
              <div class="col-xs-5">
                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control" name="gender" required>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-12">
                <div class="form-group">
                  <label>College</label>
                  <select class="form-control" name="collegeID" required>
                    <option value="1">JSS Academy of Technical Education, Noida</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-7">
                <div class="form-group">
                  <label>Course</label>
                  <select class="form-control" name="courseID" required>
                    <option value="1">B.Tech-CSE</option>
                    <option value="2">B.Tech-IT</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-5">
                <div class="form-group">
                  <label>Batch</label>
                  <input class="form-control" name="batch" placeholder="Batch" required>
                </div>
              </div>

              <center>
                <p class="mcq" style="text-align: center;"><b>By registering you agree to our <a data-toggle="modal" data-target="#termsConditions">Terms and Conditions</a></b></p>
                <button type="submit" class="btn btn-primary" style="background-color: #3d464d; color: #fff;">REGISTER</button>
              </center>
              </form>

              </div>
          </div>


			</div>

		</div>
	</div>

  <div class="modal fade" id="termsConditions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><b>Terms and Conditions<b></h4>
      </div>
      <div class="modal-body">
        <p class="mcq"><b>Terms and Conditions will go here</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>


</body>
<?php echo $foot; ?>
</html>
