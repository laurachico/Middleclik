<?php
session_start();
include ('../Include/common.php');
ob_start();

mydoctype();
myheader();
$html='<div id="wrap">';
$html.='<div class="jumbotron">';
$html.='<h1>MiddleClik- Administration page</h1>';
$html.='</div>';
$html.='<div class="container marketing">';
$html.='<div class="page-header">';

unset($_SESSION);
session_destroy();
$html.='<p>You are log out</p>';
$html.='</div>';
$html.='</div>';  
$html.='</div>';
$html.='<hr class="featurette-divider">';
mybody($html);
myfooter();
ob_end_flush();

?>