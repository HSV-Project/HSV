function recalculate(rowId,product_id){
	//console.log(rowId);
	document.getElementById(rowId).addEventListener('change', doThing(rowId,product_id));;
}
function doThing(rowId, product_id){
	//console.log(rowId);
	var priceToDiaplay = document.getElementById(rowId).getElementsByClassName("priceToCalculate")[0];
	
	var qty = document.getElementById(rowId).getElementsByClassName("qty")[0].value;
	
	var unitPrice = document.getElementById(rowId).getElementsByClassName("unitPrice")[0].innerHTML;
	
	var newPrice = unitPrice * qty;
	
	priceToDiaplay.innerHTML = newPrice;
	
	
	
	var displayTotal = document.getElementById("tableTotal");
	var displayTotalanother = document.getElementById("anotherTotal");
	var subTotal = document.getElementById("subTotal");
	var pricesArray = document.getElementsByClassName("priceToCalculate");
	var total = 0;
	
	for (i = 0; i < pricesArray.length; i++) { 
		
		total+=parseFloat(pricesArray[i].innerHTML);
	}
	
	//console.log(total.toFixed(2));
	
	displayTotal.innerHTML = total.toFixed(2);
	subTotal.innerHTML = total.toFixed(2);
	displayTotalanother.innerHTML = (total + parseInt(10)).toFixed(2);
	
	
	
	
	
	
	
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("test").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "cookieModificationOnMovingToCheckout.php?pID=" +product_id +"&qty="+ qty, true);
        xmlhttp.send();
	
}