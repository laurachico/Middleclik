<?php


function readcompanydir($company){

	if(is_dir('uploadFiles/'.$company)){
		//Search the directory
		$search_dir = 'uploadFiles/'.$company;
		//scandir returns an array with the contents of the directory
		$contents = scandir($search_dir);
		
		//Then, we have to read the array
		$html="";

		if(is_file('uploadFiles/'.$company.'/marketing.csv')){
 			$datum = readcsv('uploadFiles/'.$company.'/marketing.csv');
 			$html.= '<table class="table table-striped">';
			foreach($datum as $row => $dataInRow)
				{
				$columType = "td";
					if ($row == 0)
						$columType = "th";
	
						$html.="<tr>";
							foreach($dataInRow as $columnValue)
						{	
							$html.="<$columType>".$columnValue."</$columType>";
						}
						$html.="</tr>";
					}
					$html.= "</table>";
 		}

		foreach ($contents as $item) {

			if ( (is_file($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.') ) {
 				//First, we have to see the original extension
 				$extension=pathinfo($search_dir. '/' . $item,PATHINFO_EXTENSION);
 				//If it is an html, we have just to print it

				if($extension=='html'){

 					$html.=file_get_contents($search_dir. '/' . $item);

 				}elseif ($extension != 'csv'){ //If it is not an html (image), show it
 					$html.="<img src=\"".$search_dir. "/" . $item."\" />";
 				}
 				

 			}//if is_file
 		}//foreach

	}//if
	
return $html;

}//function

?>