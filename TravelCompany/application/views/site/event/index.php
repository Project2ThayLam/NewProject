<?php
	$first_time= $first[0]->ngay;
	$first_time1 = strtotime($first_time);
	$thang= date('M',$first_time1);
	$thu= date('D',$first_time1);
	$ngay= date('d',$first_time1);
	$nam= date('Y',$first_time1);
?>
<div class="event-content">
	<div class="event-content-image">
		<img src="<?php echo public_url('site/template/img-event/'.$info->link_img);?>" 
		width= "800" height = "250">
	</div>
	<div class="event-content-info">
		<div class="event-content-info-title">
			<div class="lich">
				<div class="anh-lich">
					<div class="thang">
						<?php echo get_month($thang);?>
					</div>
					<div class="ngay">
						<?php echo $ngay;?>
					</div>
					<div class="thu">
						<?php echo get_thu($thu);?>
					</div>
				</div>
			</div>
			<div class="tieu-de-su-kien">
				<div class="ten-su-kien">
					<h3>
						<?php echo html_entity_decode($info->ten);?>
					</h3>
				</div>
				<div class="thoi-gian">

					Thời gian: <span><?php echo get_thu($thu).", Ngày ".$ngay.", ".get_month($thang).", Năm ".$nam." (".$first[0]->gio.")"; ?></span>
				</div>
				<div class="dia-diem">
					<h4 style="font-size: 17px;">
						<?php echo html_entity_decode($info->dia_diem);?>
					</h4>
					<p style="color:#5B5B5B;">
						<?php echo html_entity_decode($info->dia_chi);?>
					</p>
				</div>
			</div>
		</div>
		<div class="them-lich-trinh">
			<button style="margin-top: 20px;width: 200px;height: 50px;background-color: red;color: white;font-size: 17px;border-radius: 6px;" onclick="window.location.href='<?php echo base_url('site/schedule/add?pick_time='.$first[0]->id_thoigian);?>' ">
				THÊM VÀO LỊCH TRÌNH
			</button>
			<p style="margin-top: 10px;text-align: center;font-size: 17px;">
				<a href="#danh-sach-thoi-gian">Chọn thời gian khác</a>
				<br> <br>
				<a href="<?php echo base_url('site/event/view_map3?id_sukien='.$info->id_sukien);?>" title="Xem bản đồ" target="_blank"><img src="<?php echo public_url('site/template/images/view-map.png');?>" height="60" width="100"></a>
			</p>
		</div>
	</div>
	<hr style="color: #EEEEEE;">
	<div class="gioi-thieu-su-kien">
		<h2>
			GIỚI THIỆU
		</h2>
		<br>
		<h3>
			<?php echo html_entity_decode($info->ten);?>
		</h3>
		<br>
		<?php if($info->link_clip != NULL):?>
		<p style="margin-left: 50px"><iframe allowfullscreen="" frameborder="0" height="360" width="640" src= <?php echo ($info->link_clip);?> ></iframe>
		</p>
		<?php endif;?>
		<br>
		<p style="font-family:Arial, Helvetica, sans-serif;">
			<?php echo html_entity_decode($info->gioi_thieu);?>
		</p>
	</div>
	<div id="danh-sach-thoi-gian">
		<h2 style="margin-top: 10px;">
			THỜI GIAN
		</h2>
		<br>
		<form action="<?php echo base_url('site/schedule/add');?>" method="post">

			<?php foreach($list_time as $row):?>
				<?php
				$thoi_gian= $row->ngay;
				$thoi_gian = strtotime($thoi_gian);
				$m= get_month(date('M',$thoi_gian));
				$D= get_thu(date('D',$thoi_gian));
				$d= date('d',$thoi_gian);
				$y= date('Y',$thoi_gian); 
				?>
				<input type="radio" name="pick_time" value="<?php echo $row->id_thoigian;?>" required>
			<?php echo "<span style='font-size:19px;'>".$D.", Ngày ".$d.", ".$m.", Năm ".$y." (".$row->gio.")</span>"; ?>
			<br>
		<?php endforeach;?>
		<input type="submit" name="them-lich-trinh" value="THÊM VÀO LỊCH TRÌNH" style="margin-top: 20px;border-radius: 6px;background-color: red; color: white;font-size:17px;width: 200px;height: 50px; ">
		</form>
	</div>
</div>
