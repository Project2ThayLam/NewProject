<html>
<head>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
</head>
<body>
<?php
ini_set('max_execution_time', 300);
require "simple_html_dom.php";
$html = file_get_html("http://ticketbox.vn/events/ha-noi");

$sukien = $html->find("div[class=table-cell event-title] a",1);

//foreach ($sukien as $sk) {
	//$url = $sk->href;
	$url = $sukien->href;
	$skhtml = file_get_html($url);
	// $name = $skhtml->find('h1[class=title grey-dark-color]', 0)->innertext;
	// $time = $skhtml->find('div[class=event-time col-sm-12 pd-hor-15]', 0)->innertext;
	//$place = $skhtml->find('div[class=event-venue border-top-grey col-sm-12 pd-hor-15] p[class=grey-dark-color text-bold text-indent txt-16]', 0)->innertext;
	$place = $skhtml->find('div[class=event-venue border-top-grey col-sm-12 pd-hor-15] p[class=grey-white-color note]', 0)->innertext;
	// echo $name;
	// echo $time;
	//echo $place;
	// echo $address;
	// echo "<hr/>";

?>
</body>
</html>