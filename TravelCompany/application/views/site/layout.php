<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("site/head.php");?>
</head>
<body>
	<div id="templatemo_container">
			<?php $this->load->view("site/header.php");?>
		<div id="templatemo_content_section">
			<?php
				$this->load->view($temp);
			?>
			<?php $this->load->view('site/right.php');?>
		</div>
			<?php $this->load->view("site/footer.php");?>
	</div>
</body>
</html>