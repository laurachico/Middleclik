<?php

//We have to create the upload images form
function uploadimage(){

$html='<h1>Upload an image</h1>';
$html.='<form enctype="multipart/form-data" action="admin.php" method="POST">';
$html.='<p>Company:<input type="text" name="company"/></p>';
$html.='<p>Campaign:<input type="text" name="campaign"/></p>';          
$html.='Select the file: <input name="userfile" type="file" />';
$html.='<input type="submit" value="Upload" />';
$html.='</form>';


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//If we have all completed, we can continue
	if((empty($_POST['company'])==false)&&(empty($_POST['campaign'])==false)){
		$allOk=true;

	}else{ //if we don't have all completed
    $allOK =false; 
		$html.='<p style="color: red;">Please complete the login form</p>';
		
		}
  
  	if($allOk==true){
  		//We upload the file

      //Check out if there is a directory for this company
      $company=$_POST['company'];
      $campaign=$_POST['campaign'];
      //To get the original extension of the file
      $extension=pathinfo($_FILES['userfile']['name'],PATHINFO_EXTENSION);

      if(!is_dir('../uploadFiles/'.$company)){
        mkdir('../uploadFiles/'.$company);
      }

  		$uploadfile = '../uploadFiles/'.$company.'/'.$campaign.'.'.$extension;

  		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

    		$html.='<div>';
    		$html.='<img width="300px" src="'.$desiredPath.$_FILES['picture']['name'].'">';
    		$html.='</div>';
    		$html.='File is valid, and was successfully uploaded.';
    		

  		}
  		else{
		    $html.= 'Upload failed';
  	}	

  }
}//server		

return $html;
}//function

?>