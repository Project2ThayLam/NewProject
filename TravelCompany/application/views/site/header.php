<div id="templatemo_header_top"><a href="<?php echo base_url();?>"><img alt="Box Image 1" src="<?php echo public_url('site/template');?>/images/templatemo_header.jpg" /></a></div>

  <div id="templatemo_header_section">
  	<div class="templatemo_header_box">
		<img alt="Box Image 1" src="<?php echo public_url('site/template');?>/images/templatemo_box_image_1.jpg" />
        <img alt="Box Image 2" src="<?php echo public_url('site/template');?>/images/templatemo_box_image_2.jpg" />
    </div>

    <div class="templatemo_topmenu">

      <ul>

        <li><a href="#" class="current">PROFILE</a></li>

        <li><a href="#">CONTACT SHEET</a></li>
        <?php if($this->session->userdata('login') == NULL):?>
        <li><a href="<?php echo base_url('site/signup/index');?>">ĐĂNG KÝ</a></li>        
        
        <li><a href="<?php echo base_url('site/login/index');?>">ĐĂNG NHẬP</a></li>
        <?php else:?>
          <li><a href="">Hi, <?php echo $this->session->userdata('login');?></a></li>
          <li><a href="<?php echo base_url('site/logout/index');?>">ĐĂNG XUẤT</a></li>
        <?php endif;?>


      </ul>

    </div>

  </div>