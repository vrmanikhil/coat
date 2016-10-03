<!doctype html>
<html class="no-js" lang="">

<?php echo $head; ?>

<body>


	<div class="container-fluid">
		<div class="row">
			<?php echo $left; ?>
			<div class="col-md-9" id="main-wrapper" style="text-align:center;">
				<div class="row" style="margin-top:100px;">
					<div class="col-md-12">
						<h2 class="dash-head" style="font-size:1.5em;"><span><img src="<?php echo base_url('assets/website/images/pass.PNG'); ?>" height="80px;"></span>CHANGE PASSWORD</h2>
					</div>
				</div>
				<form>
					<div class="row" style="margin-bottom:20px;margin-top:30px;">
						<div class="col-md-12">
							<input type="password" placeholder="CURRENT PASSWORD" class="main-form password">

						</div>
					</div>
					<div class="row" style="margin-bottom:20px;">
						<div class="col-md-12">
							<input type="password" placeholder="NEW PASSWORD" class="main-form password">

						</div>
					</div>
					<div class="row" style="margin-bottom:20px;">
						<div class="col-md-12">
							<input type="password" placeholder="CONFIRM NEW PASSWORD" class="main-form password">

						</div>
					</div>
					<div class="row" style="margin-top:40px;">
					<div class="col-md-12">
						<a href="#" class="button button-2" id="add-skill-button">CHANGE PASSWORD</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<?php echo $foot; ?>

</html>
