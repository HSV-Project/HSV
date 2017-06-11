<?php

function checkIfLoginThenHide(){
	if(isset($_SESSION['logged_in'])){
	if($_SESSION['logged_in'] == true){
		return "hidden";
	}
	else{
		return "";
	}
	}
}


function checkIfNotLoginThenHide(){
	if(!isset($_SESSION['logged_in'])){
		return "hidden";
	}
	else{
		return "";
	}
}
?>