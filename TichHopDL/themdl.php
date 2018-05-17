<?php
ini_set('max_execution_time', 300);
include "simple_html_dom.php";
include "toado.php";
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "project2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$html = file_get_html("http://ticketbox.vn/events/ha-noi");

$sukien = $html->find("div[class=table-cell event-title] a");

foreach ($sukien as $sk) {
	//$sk = $sukien;
	$url = $sk->href;
	$skhtml = file_get_html($url);
	if ($skhtml != False){
		$name = $skhtml->find('h1[class=title grey-dark-color]', 0);
	}else $name = NULL;

	if (isset($name)) {
		$name1 = htmlentities($name->plaintext, ENT_QUOTES, 'UTF-8');
		$sql = "SELECT id_sukien from su_kien where ten = '$name1'";
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			echo "Exist event!";
			$row = $result->fetch_assoc();
			$id_sukien = $row["id_sukien"];

			$place = $skhtml->find('div[class=event-venue border-top-grey col-sm-12 pd-hor-15] p[class=grey-dark-color text-bold text-indent txt-16]', 0);
			$address = $skhtml->find('div[class=event-venue border-top-grey col-sm-12 pd-hor-15] p[class=grey-white-color note]', 0);
			$detail = $skhtml->find('div[class=col-xs-12 box detail-box]', 0);
			$link_clip = $skhtml->find('iframe',0)->src;
	
			$name1 = htmlentities($name->plaintext, ENT_QUOTES, 'UTF-8');
			$place1 = htmlentities($place->plaintext, ENT_QUOTES, 'UTF-8');
			$address1 = htmlentities($address->plaintext, ENT_QUOTES, 'UTF-8');
			$detail1 = htmlentities($detail->plaintext, ENT_QUOTES, 'UTF-8');
			$addr= get_infor_from_address($address);
			//vi do
  			$lat = $addr->results[0]->geometry->location->lat;
  			//kinh do
  			$lng = $addr->results[0]->geometry->location->lng;
			$sql = "UPDATE su_kien SET dia_diem = '$place1', dia_chi = '$address1', gioi_thieu = '$detail1', kinh_do = '$lng', vi_do = '$lat', link_clip = '$link_clip' WHERE id_sukien = '$id_sukien'";

			if ($conn->query($sql) === TRUE) {
			    echo "Exist event updated successfully"."<br>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$time = $skhtml->find('p[class=grey-dark-color text-bold text-indent txt-16]', 0);
			$bad_time = $skhtml->find('p[class=grey-dark-color text-bold text-indent txt-16] a', 0);
			if (isset($bad_time)) {
				$time->plaintext = str_replace($bad_time->plaintext, " ", $time->plaintext);
				$schedule_date = $skhtml->find('p[class=date text-bold]');
				$schedule_time = $skhtml->find('p[class=time]');
				for ($i = 0; $i < count($schedule_date); $i++) {
					$time_array = explode(" ", $schedule_date[$i]->plaintext);
					$ngay = $time_array[5].'/'.$time_array[4].'/'.$time_array[2];
					$gio = $schedule_time[$i]->plaintext ;
					$sql = "INSERT INTO thoi_gian (id_sukien, ngay, gio) VALUES ('$id_sukien', '$ngay', '$gio')";
					$conn->query($sql);
				}
				
			}
			
			$time_array = explode(" ", trim($time->plaintext));
			$ngay = $time_array[5].'/'.$time_array[4].'/'.$time_array[2];
			$gio = chop(trim(explode("(", $time->plaintext)[1]), ')') ;
			$sql = "INSERT INTO thoi_gian (id_sukien, ngay, gio) VALUES ('$id_sukien', '$ngay', '$gio')";
			if ($conn->query($sql) === TRUE) {
			    echo "New time record created successfully"."<br>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		} else {
			echo "New event!";	
			$time = $skhtml->find('p[class=grey-dark-color text-bold text-indent txt-16]', 0);
			$bad_time = $skhtml->find('p[class=grey-dark-color text-bold text-indent txt-16] a', 0);
			
			$place = $skhtml->find('div[class=event-venue border-top-grey col-sm-12 pd-hor-15] p[class=grey-dark-color text-bold text-indent txt-16]', 0);
			$address = $skhtml->find('div[class=event-venue border-top-grey col-sm-12 pd-hor-15] p[class=grey-white-color note]', 0);
			$detail = $skhtml->find('div[class=col-xs-12 box detail-box]', 0);
			$link_clip = $skhtml->find('iframe',0)->src;
	
			$name1 = htmlentities($name->plaintext, ENT_QUOTES, 'UTF-8');
			$place1 = htmlentities($place->plaintext, ENT_QUOTES, 'UTF-8');
			$address1 = htmlentities($address->plaintext, ENT_QUOTES, 'UTF-8');
			$detail1 = htmlentities($detail->plaintext, ENT_QUOTES, 'UTF-8');
			$addr= get_infor_from_address($address);
			//vi do
  			$lat = $addr->results[0]->geometry->location->lat;
  			//kinh do
  			$lng = $addr->results[0]->geometry->location->lng;

			$sql = "INSERT INTO su_kien (ten, dia_diem, dia_chi, gioi_thieu, kinh_do, vi_do, link_clip) VALUES ('$name1', '$place1', '$address1', '$detail1', '$lng', '$lat', '$link_clip')";

			if ($conn->query($sql) === TRUE) {
			    echo "New event record created successfully"."<br>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$last_id = $conn->insert_id;
			
			if (isset($bad_time)) {
				$time->plaintext = str_replace($bad_time->plaintext, " ", $time->plaintext);
				$schedule_date = $skhtml->find('p[class=date text-bold]');
				$schedule_time = $skhtml->find('p[class=time]');
				for ($i = 0; $i < count($schedule_date); $i++) {
					$time_array = explode(" ", $schedule_date[$i]->plaintext);
					$ngay = $time_array[5].'/'.$time_array[4].'/'.$time_array[2];
					$gio = $schedule_time[$i]->plaintext ;
					$sql = "INSERT INTO thoi_gian (id_sukien, ngay, gio) VALUES ('$last_id', '$ngay', '$gio')";
					$conn->query($sql);
				}
				
			}
			
			$time_array = explode(" ", trim($time->plaintext));
			$ngay = $time_array[5].'/'.$time_array[4].'/'.$time_array[2];
			$gio = chop(trim(explode("(", $time->plaintext)[1]), ')') ;
			$sql = "INSERT INTO thoi_gian (id_sukien, ngay, gio) VALUES ('$last_id', '$ngay', '$gio')";
			if ($conn->query($sql) === TRUE) {
			    echo "New time record created successfully"."<br>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
}
?>