<div class="lich-trinh-container">
<?php if(empty($list)): ?>
	<p style="color: red; font-size: 19px;">Không có sự kiện nào trong lịch trình.</p>
<?php else:?>
	<div class="tieu-de">
		<h3>
			LỊCH TRÌNH CỦA BẠN
		</h3>
	</div>
	<div class="cac-su-kien">
		<div class="heading-su-kien">
			<div class="tong-so-su-kien">
				<h4>
				Có <span><?php echo count($list);?></span> sự kiện trong lịch trình
				</h4>
			</div>
			<div class="heading-ten-su-kien">
				<h4>Sự kiện</h4>
			</div>
			<div class="heading-ngay-gio">
				<h4>
				Thời gian
				</h4>
			</div>
		</div>
		<form>
		<?php foreach($list as $row):?>
		<div class="su-kien">
			<div class="img-su-kien">
				<a href="<?php echo base_url('site/event/index?id='.$row->id_sukien);?>" target = "_blank" title ="Xem chi tiết sự kiện"><img src="<?php echo public_url('site/template/img-event/'.$row->link_img); ?>" width= "200" height="120"></a>
			</div>
			<div class="ten-dia-diem">
				<h4>
					<?php echo html_entity_decode($row->ten);?>
				</h4>
				<p style="margin-top: 10px; color: red;">
					<?php echo html_entity_decode($row->dia_diem);?>
				</p>
				<p>
					<?php echo html_entity_decode($row->dia_chi);?>
				</p>
			</div>
			<div class="ngay-gio">
				<table style="font-size: 15px;">
					<tr>
						<td colspan="3"><b>Ngày</b></td>
						<td>
							<p style="color: blue;"><?php echo $row->ngay; ?></p>
						</td>
					</tr>
					<tr>
						<td colspan="3"><b>Thời gian</b></td>
						<td>
							<p style="color: red;"><?php echo $row->gio; ?></p>
						</td>
					</tr>

					<tr>
						<td>
							<a href="<?php echo base_url('site/event/view_map?id_sukien='.$row->id_sukien);?>" title="Tìm nhà hàng, quán ăn xung quanh" target="_blank"><img src="<?php echo public_url('site/template/images/restaurant.png');?>" height="35" width="30"></a>
						</td>	
						<td>
							<a href="<?php echo base_url('site/event/view_map1?id_sukien='.$row->id_sukien);?>" title="Tìm khách sạn xung quanh" target="_blank"><img src="<?php echo public_url('site/template/images/hotel.png');?>" height="35" width="30"></a>
						</td>
						<td>
							<a href="<?php echo base_url('site/event/view_map2?id_sukien='.$row->id_sukien);?>" title="Tìm quán cafe xung quanh" target="_blank"><img src="<?php echo public_url('site/template/images/cafe.png');?>" height="35" width="30"></a>
						</td>				
						<td style="text-align: right;">
							<a href="<?php echo base_url('site/schedule/delete?id='.$row->id_lichtrinh);?>" title="Xóa khỏi lịch trình"><img src="<?php echo public_url('site/template/images/delete.png');?>" height="35" width="35"></a>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<?php endforeach;?>
		</form>
	</div>
	<div class="cac-thao-tac">
		<button style="border-radius: 4px; width: 200px; height: 40px; float: right; margin-top: 5px;" onclick="window.location.href='<?php echo base_url("site/schedule/delete");?>' ">
			XÓA TẤT CẢ
		</button>
	</div>
<?php endif;?>
</div>