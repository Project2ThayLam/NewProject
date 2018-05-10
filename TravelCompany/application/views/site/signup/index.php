<div class="signup">
	<div class="form-signup">
		<form  action="<?php echo base_url('site/signup/signup');?>" method="post">
			<div class="header-signup">
				<p style="font-size: 17px; color: black;">ĐĂNG KÍ THÀNH VIÊN</p>
				<hr width="400px" style="float: left;">
			</div>
			<div class="body-signup">
				<div class="name-signup">
					<input type="text" id="name" name="name" placeholder="Họ tên" 
          				value="<?php echo $this->input->post('name');?>" class="radius" />
          			<div class="form-signup-error">
          				<?php echo form_error('name');?>
          			</div>
				</div>
				<div class="username-signup">
					<input type="text" id="username" name="username" placeholder="Tên đăng nhập" class="radius" value = "<?php echo $this->input->post('username');?>" />
					<div class="form-signup-error">
          				<?php echo form_error('username');?>
          			</div>
				</div>
				<div class="password-signup">
					<input type="password" id="password" name="password" placeholder="Mật khẩu" class="radius" value = "<?php echo $this->input->post('password');?>" />
					<div class="form-signup-error">
          				<?php echo form_error('password');?>
          			</div>
				</div>
				<div class="repassword-signup">
					<input type="password" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu" class="radius" value= "<?php echo $this->input->post('repassword');?>" />
					<div class="form-signup-error">
          				<?php echo form_error('repassword');?>
          			</div>
				</div>
				<div class="submit-signup">
					<button class="radius title" name="signup">Đăng kí</button>
				</div>
			</div>
		</form>
	</div>
</div>