<?php
  include "diadiem.php";
  /**
  * @author Tấn Việt
  * @copyright 2012
  * @website https://tanvietblog.com
  */
  function get_infor_from_address($address = null) {
    $prepAddr = str_replace(' ', '+', stripUnicode($address));
    $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyAQjNUuorBWOGnqKqweloJ3fzIQl7LgpP4');
    $output = json_decode($geocode);
    return $output;
  }

  // Loại bỏ dấu tiếng Việt để cho kết quả chính xác hơn
  function stripUnicode($str){
    if (!$str) return false;
    $unicode = array(
      'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|&#225;|&#224;|&#227;|&#193;|&#192;|&#195;',
      'd'=>'đ|Đ|&#273;|&#272;',
      'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|&#233;|&#232;|&#200;|&#201;',
      'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị|&#237;|&#236;|&#297;|&#296;',
      'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|&#243;|&#242;|&#245;|&#211;|&#210;|&#213;',
      'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|&#250;|&#249;|&#361;|&#360;|&#217;|&#218;',
      'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ|&#253;|&#221;'
    );
    foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
    return $str;
  }
  //echo $place;
  $add= get_infor_from_address($place);
  $lat = $add->results[0]->geometry->location->lat;
  $lng = $add->results[0]->geometry->location->lng;
  //echo 'Vĩ độ (latitude): ' . $lat;
  //echo 'Kinh độ (longitude): ' . $lng;
  /*echo "<pre>";
    print_r($add);
  echo "<pre>";*/
?>