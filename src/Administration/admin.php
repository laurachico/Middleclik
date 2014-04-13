<?php
session_start();
ob_start();
include ('../Include/common.php');
include('loginformadmin.php');
include('uploadimage.php');
include('uploadhtmlsnippet.php');
mydoctype();
myheader();

$html='<div id="wrap">';
$html.='<div class="jumbotron">';
$html.='<h1>MiddleClik- Administration page</h1>';
$html.='</div>';
$html.='<div class="container marketing">';
$html.='<div class="page-header">';


if((isset($_SESSION['admin']))&&($_SESSION['admin']==true)) {

	$html.=uploadimage();
	$html.=uploadhtmlsnippet();
	$html.='<a href="logoutadmin.php">Log out</a>';
}else{
	$html.=loginformadmin();
}
$html.='</div>';
$html.='</div>';  
$html.='</div>';
$html.='<hr class="featurette-divider">';
mybody($html);
myfooter();
ob_end_flush();
?>