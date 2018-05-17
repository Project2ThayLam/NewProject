<?php
	//defined('BASEPATH') OR exit('No direct script access allowed');
	function public_url($url='')
	{
		return base_url('public/'.$url);
	}

	function get_month($m=""){
		$thang = "";
		switch ($m) {
				case 'Jan':
					$thang = "Tháng 1";
					break;
				case 'Feb':
					$thang = "Tháng 2";
					break;
				case 'Mar':
					$thang = "Tháng 3";
					break;
				case 'Apr':
					$thang = "Tháng 4";
					break;
				case 'May':
					$thang = "Tháng 5";
					break;
				case 'Jun':
					$thang = "Tháng 6";
					break;
				case 'Jul':
					$thang = "Tháng 7";
					break;
				case 'Aug':
					$thang = "Tháng 8";
					break;
				case 'Sep':
					$thang = "Tháng 9";
					break;
				case 'Oct':
					$thang = "Tháng 10";
					break;
				case 'Nov':
					$thang = "Tháng 11";
					break;
				case 'Dec':
					$thang = "Tháng 12";
					break;
				default:
					$thang= "";
					break;
			}
		return $thang;
	}
	function get_thu($D="")
	{
		$thu = '';
		switch ($D) {
			case 'Mon':
				$thu= "Thứ Hai";
				break;
			case 'Tue':
				$thu= "Thứ Ba";
				break;
			case 'Wed':
				$thu= "Thứ Tư";
				break;
			case 'Thu':
				$thu= "Thứ Năm";
				break;
			case 'Fri':
				$thu= "Thứ Sáu";
				break;
			case 'Sat':
				$thu= "Thứ Bảy";
				break;
			case 'Sun':
				$thu= "Chủ nhật";
				break;
			default:
				$thu= '';
				break;
		}
		return $thu;
	}
?>