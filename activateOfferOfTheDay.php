<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(isset($_GET["offerID"])){
		$offerID = $_GET["offerID"];
		
		if($offerID == 1){
				$_SESSION["offer"] = "35%on$50";
		}
		else{
			//some other offer
		}
		
	}
}
?>