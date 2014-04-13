<?php

function mydoctype()
{
print '<!doctype html>';
}

function myheader($additionalHeaderContent = NULL)
{
print '<html>';
print '<head>';
print '<link href="/assignment2/Content/css/bootstrap.css" rel="stylesheet">';
print '<link href="/assignment2/Content/css/bootstrap-theme.css" rel="stylesheet">';
print '<link href="/assignment2/Content/css/bootstrap.min.css" rel="stylesheet">';
print '<link href="/assignment2/Content/css/bootstrap-theme.min.css" rel="stylesheet">';
print '<link href="/assignment2/Content/css/bootstrap-responsive.css" rel="stylesheet">';
print '<link href="/assignment2/Content/css/bootstrap-responsive.min.css" rel="stylesheet">';
print $additionalHeaderContent;
print '</head>';
}

function mybody($bodyContents = '', $asideContent = '')
{
print '<body>';
print '<div>';
print $bodyContents;
myaside($asideContent);
print '</div>';
print '</body>';
}

function myaside($asideContent)
{
print '<div id="aside">';
print $asideContent;
print '</div>';
}

function myfooter()
{
print '<footer>';
print '<div class="container">';
print '<p class="text-muted credit">Assignment 2. Laura Chico</p>';
print '</div>';
print '</footer>';	
print '</html>';
}

function readcsv($path)
{
$dataFile = file($path);
$datum = array();
foreach($dataFile as $line){

		$datum[] = str_getcsv($line);
		}
		
		return $datum;
}

?>