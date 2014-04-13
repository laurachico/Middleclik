<?php

//This is the form to upload html snippets

function uploadhtmlsnippet(){


$html='<h1>Save an html snippet</h1>';
$html.='<form enctype="multipart/form-data" action="admin.php" method="POST">';
$html.='<p>Company:<input type="text" name="company"/></p>';
$html.='<p>Campaign:<input type="text" name="campaign"/></p>';
$html.='Write the html snippet: <textarea name="userfile"></textarea>';
$html.='<input type="submit" value="Upload" />';
$html.='</form>';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//If we have all completed, we can continue
	if((empty($_POST['company'])==false)&&(empty($_POST['campaign'])==false)){
		$allOk=true;

	}else{ //if we don't have all completed
    $allOK =false; 
		$html.='<p style="color: red;">Please complete the saving form</p>';
		
		}
  
  	if($allOk==true){
  		//We upload the file

      //Check out if there is a directory for this company
      $company=$_POST['company'];
      $campaign=$_POST['campaign'];
      //To get the original extension of the file
      $extension='.html';

      if(!is_dir('../uploadFiles/'.$company)){
        mkdir('../uploadFiles/'.$company);
      }

  		$uploadfile = '../uploadFiles/'.$company.'/'.$campaign.'.'.$extension;

  		if (file_put_contents($uploadfile, $_POST['userfile'])) {

    		
    		$html.='HTML is valid, and was successfully saved.';
    		$html.='<br>';

  		}
  		else{
		    $html.= 'Saving failed';
  	}	

  }
}//server		

return $html;
}//function


?>