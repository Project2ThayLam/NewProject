<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Travel Company</title>

<meta name="keywords" content="">

<meta name="description" content="">

<link href="<?php echo public_url('site/template/style.css');?>" rel="stylesheet" type="text/css">

<link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css">

<link href="<?php echo public_url('site/stylelogin.css');?>" rel="stylesheet" type="text/css">
<?php 
    if($this->session->flashdata('message') != NULL)
    {
        $mes = $this->session->flashdata('message');
        echo "<script>alert('".$mes."')</script>";
    }
?>
