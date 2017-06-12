
<?php

function checkIfLoginThenHide(){
	if(isset($_SESSION['logged_in'])){
	if($_SESSION['logged_in'] == true && $_SESSION['active']==1){
		return "hidden";
	}
	else{
		return "";
	}
	}
}


function checkIfNotLoginThenHide(){
	
	if(!isset($_SESSION['logged_in']) ||$_SESSION['logged_in'] == false || $_SESSION['active']==0){
		return "hidden";
	}
	else{
		return "";
	}
}	
	
	
function checkIfNotSellerThenHide(){
	
	if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false || $_SESSION['active']==0 ||  $_SESSION['seller']==0 ){
		return "hidden";
	}
	else{
		return "";
	}
	
}
?>