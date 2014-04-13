<?php
session_start();
ob_start();
include ('Include/common.php');
include('loginformindex.php');
include('readcompanydir.php');

mydoctype();
myheader();

$html='<div id="wrap">';
$html.='<div class="jumbotron">';
$html.='<h1>MiddleClik- User page</h1>';
$html.='</div>';
$html.='<div class="container marketing">';
$html.='<div class="page-header">';


if((isset($_SESSION['login']))&&($_SESSION['login']==true)) {
	$company=$_SESSION['company'];
	$html.=readcompanydir($company);

	$html.='<a href="logoutindex.php">Log out</a>';

}else{
	
	$html.=loginformindex();
}

$html.='</div>';
$html.='</div>';  
$html.='</div>';
$html.='<hr class="featurette-divider">';
mybody($html);
myfooter();
ob_end_flush();
?>