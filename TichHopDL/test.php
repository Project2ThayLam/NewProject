<?php
ini_set('max_execution_time', 300);
require "simple_html_dom.php";
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "project2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
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

	$name = $skhtml->find('h1[class=title grey-dark-color]', 0);

	if (isset($name)) {	
		$time = $skhtml->find('p[class=grey-dark-color text-bold text-indent txt-16]', 0);
		$bad_time = $skhtml->find('p[class=grey-dark-color text-bold text-indent txt-16] a', 0);
		
		$place = $skhtml->find('div[class=event-venue border-top-grey col-sm-12 pd-hor-15] p[class=grey-dark-color text-bold text-indent txt-16]', 0);
		$address = $skhtml->find('div[class=event-venue border-top-grey col-sm-12 pd-hor-15] p[class=grey-white-color note]', 0);
		//$name1 = htmlentities($name->plaintext, ENT_QUOTES, 'UTF-8');
		//$place1 = htmlentities($place->plaintext, ENT_QUOTES, 'UTF-8');
		//$address1 = htmlentities($address->plaintext, ENT_QUOTES, 'UTF-8');
		$name1 = $name->plaintext;
		$place1 = $place->plaintext;
		$address1 = $address->plaintext;
		$sql = "INSERT INTO su_kien (ten, dia_diem, dia_chi) VALUES ('$name1', '$place1', '$address1')";

		if ($conn->query($sql) === TRUE) {
		    echo "New event record created successfully \n";
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
				$sql = "INSERT INTO thoi_gian (id_su_kien, ngay, gio) VALUES ('$last_id', '$ngay', '$gio')";
				$conn->query($sql);
			}
			
		}
		
		$time_array = explode(" ", trim($time->plaintext));
		$ngay = $time_array[5].'/'.$time_array[4].'/'.$time_array[2];
		$gio = chop(trim(explode("(", $time->plaintext)[1]), ')') ;
		$sql = "INSERT INTO thoi_gian (id_su_kien, ngay, gio) VALUES ('$last_id', '$ngay', '$gio')";
		if ($conn->query($sql) === TRUE) {
		    echo "New time record created successfully \n";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
}
?>