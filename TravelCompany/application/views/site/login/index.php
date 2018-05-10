<div class="signup">
	<div class="form-signup" style="height: 350px;">
		<form  action="<?php echo base_url('site/login/check_login'); ?>" method="POST">
			<div class="header-signup">
				<p style="font-size: 17px; color: black;">ĐĂNG NHẬP</p>
				<hr width="400px" style="float: left;">
			</div>
			<div class="body-signup">	
				<div class="username-signup">
					<input type="text" id="username" name="username" placeholder="Tên đăng nhập" class="radius" required />
				</div>
				<div class="password-signup">
					<input type="password" id="password" name="password" placeholder="Mật khẩu" class="radius"  required />
				</div>
				<div class="submit-signup">
					<input type="submit" name="submit" value="Đăng nhập" style="width: 150px;float: right;margin-right: 25px;">
				</div>
				<div class="login-error" align="center" style="font-size: 20px;">
					<?php
						if(isset($error) && $error)
						{
							echo "<p>".$error."</p>";
						}
					?>
				</div>
			</div>
		</form>
	</div>
</div>