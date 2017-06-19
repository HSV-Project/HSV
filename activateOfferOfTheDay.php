<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(isset($_GET["offerID"])){
		$offerID = $_GET["offerID"];
		
		if($offerID == 1){
				$_SESSION["offer"] = 1;
		}
		else{
			//some other offer
		}
		
	}
}
?>