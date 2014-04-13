<?php

function loginformindex (){

$host='lake13.rice.iit.edu:3306';
$user='iituser';
$password='-8iituser!';

$html='<h1>Login as a MiddleClik member</h1>';

$html.='<form action="index.php" method="post">';
$html.='<p>Username:<input type="text" name="username"/></p>';
$html.='<p>Password:<input type="text" name="password"/></p>';
$html.= '<input type="submit" name="submit" value="Login"/>';
$html.='</form>';


//If we have completed the form, we can handle it!

if($_SERVER['REQUEST_METHOD']=='POST'){

//First, we have to connect to mySQL

$dbc = mysql_connect($host,$user,$password);
if ($dbc) {
	$html.='<p>Successfully connected to MySQL</p>';	

	//Select the database

	$database='middleclik';

	if (mysql_select_db($database, $dbc)) {

		$html.='<p>The database has been selected!</p>';
		//We have to check if the form data is valid or not
		//We started suppossing that all is correct
		$isallOk=true;
		//If we have all completed, we can continue
		if((empty($_POST['username'])==false)&&(empty($_POST['password'])==false)){
			$username=$_POST['username'];
			$password=$_POST['password'];
			

		}else{ //if we don't have all completed
			$html.='<p style="color: red;">Please complete the login form</p>';
			$isallOK =false; 
			}
		//If all is OK, we insert the data into the database selected
		if($isallOk==true){
			//Define the query
			$query= "SELECT * FROM users WHERE username=\"$username\" and password=\"$password\"";
			//Execute the query
			if ($result=@mysql_query($query, $dbc)) {
				
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				$html.='The company is:'.$row['company'];
				$company=$row['company'];

				session_start();
				$_SESSION['login']=true;
				$_SESSION['company']=$company;
				
				$html.='<p>Your login was successful!</p>';
				$html.='<a href="index.php">Continue</a>';


			} else {
				$html.='<p style="color: red;">Your are not login in because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
			}
		}	
	}else { //Could not select it
		$html.='<p style="color: red;">Could not select the database because:<br />' . mysql_error($dbc) . '.</p>';
	}

	//Once we have finished, we have to close it
	mysql_close($dbc);
}else{	//We can not connect to mySQL
		$html.='<p>Could not connect to MySQL because:<br/>' . mysql_error($dbc) . '.</p>';
	}

}//Close the if that handle the form	

return $html;
}

?>