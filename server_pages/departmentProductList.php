<?php
function get_products($department){
    include 'Database.php';
    $query="SELECT productID, productName, productDescShort, productDescLong, productPrice, productQuantityAvail, productAddedDate, productCategory, "
            . "productImage, productSellerId from Inventory where productCategory='$department'";
    
    /* @var $result type */
    $result = $mysqli->query($query);
    $res_array=array();
    if ($result->num_rows > 0) {
        for($count =0; $row = $result->fetch_assoc(); $count++) {
            $res_array[$count]=$row;
            /*$productList=array('productID'=>$row["productID"],
                           'productName'=>$row["productName"],
                           'productDescShort'=>$row["productDescShort"],
                           'productDescLong'=>$row["productDescLong"],
                           'productPrice'=>$row["productPrice"],
                           'productQuantityAvail'=>$row["productQuantityAvail"],
                           'productAddedDate'=>$row["productAddedDate"],
                           'productCategory'=>$row["productCategory"],
                           'productImage'=>$row["productImage"],
                           'productSellerId'=>$row["productSellerId"]);*/

            //return json_encode($product);
        }
    }
    
return $res_array;
$mysqli->close();
}

?>