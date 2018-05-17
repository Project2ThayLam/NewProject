<div id="central">                                                                                                                                   
            <div class="welcome">
                <p>WELCOME to 
                    <br>
                    <span style="margin-left: 50px;">Our Company</span></p>                                         
            </div>
            <div class="search">
                <form action="<?php echo base_url('home/search');?>" method="POST">
                    <table>
                        <tr>
                            <td>Từ ngày <input type="date" name="from-date" required value="<?php echo $this->input->post('from-date');?>"></td>
                            <td>Đến ngày <input type="date" name="to-date" required value="<?php echo $this->input->post('to-date');?>"></td>
                            <td><input style="margin-left: 5px;" type="submit" name="search" value="Tìm kiếm"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php 
                if(empty($list)) 
                {
                    echo "<p style='color:red;font-size:18px;'>
                    Không có kết quả theo yêu cầu</p>";
                } 
            ?>
            <?php foreach($list as $row):?>
            <div class="block">
                <div class="block-img">
                    <a href="<?php echo base_url('site/Event?id='.$row->id_sukien);?>"><img src="<?php echo public_url('site/template/img-event/'.$row->link_img);?>" alt="" width="180" height="150"></a>
                </div>
                <div class="block-content">
                    <div class="block-content-title">
                        <h4><?php echo html_entity_decode($row->ten);?></h4>
                    </div>
                    <div class="block-content-address">
                        <p><?php echo html_entity_decode($row->dia_chi);?></p>
                    </div>
                    <div class="block-content-place">
                        <span class="price"><?php echo html_entity_decode($row->dia_diem);?></span>
                    <a href="<?php echo base_url('site/event/index?id='.$row->id_sukien);?>" class="more">xem chi tiết</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
            
 </div>
 <?php $this->load->view('site/right.php');?>
