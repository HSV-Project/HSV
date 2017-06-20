<?php
function get_products_byDepartment($department){
    include 'Database.php';
    $query="SELECT productID, productName, productDescShort, productDescLong, productPrice, productQuantityAvail, productAddedDate, productCategory, "
            . "productImage, productCategory, productSellerId from Inventory where productCategory='$department'";
    
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
function get_products_bySeller($seller){
    include 'Database.php';
    $query="SELECT productID, productName, productDescShort, productDescLong, productPrice, productQuantityAvail, productAddedDate, productCategory, "
            . "productImage, productCategory, productSellerId from Inventory where productSellerId='$seller'";
    
    /* @var $result type */
    $result = $mysqli->query($query);
    $res_array=array();
    if ($result->num_rows > 0) {
        for($count =0; $row = $result->fetch_assoc(); $count++) {
            $res_array[$count]=$row;
        }
    }
    
return $res_array;
$mysqli->close();
}
function get_products_bySearch($search)
{
    include 'Database.php';
    /*$searchTerms = explode(' ', $search);
    $searchTermBits = array();
    foreach ($searchTerms as $term) {
        $term = trim($term);
        //error_log($term);
        
        if (!empty($term) && ($term!='a' && $term!='and' && $term!='are' && $term!='as' && $term!='at' && $term!='by' && $term!='be' && $term!='for' && $term!='from' && $term!='had' 
                && $term!='he' && $term!='in' && $term!='is' && $term!='it' && $term!='its' && $term!='of' && $term!='on' && $term!='that' && $term!='the' && $term!='to' 
                && $term!='was' && $term!='were' && $term!='will')) 
        {
            //error_log("here1: ".$term);
            $searchTermBits[] = "productName LIKE '%$term%' OR productDescShort LIKE '%$term%' OR productCategory LIKE '%$term%'";
        }
    }
    if(count($searchTermBits)>0){
        $query="SELECT productID, productName, productDescShort, productDescLong, productPrice, productQuantityAvail, productAddedDate, productCategory, "
                . "productImage, productCategory, productSellerId, productCategory FROM Inventory WHERE ".implode(' OR ', $searchTermBits);
        //Below query for fulltext index
        
    }
    else
    {
        $query="SELECT productID, productName, productDescShort, productDescLong, productPrice, productQuantityAvail, productAddedDate, productCategory, "
                . "productImage, productCategory, productSellerId, productCategory FROM Inventory WHERE productName LIKE '' AND productDescShort LIKE '' AND productCategory LIKE ''";
    }*/
    $searchTerms = explode(' ', $search);
    $newSearchString=implode('* ', $searchTerms)."*";
    $query="SELECT productID, productName, productDescShort, productDescLong, productPrice, productQuantityAvail, productAddedDate, productCategory, "
                . "productImage, productCategory, productSellerId, productCategory from Inventory where match(productName, productDescShort, "
                . "productDescLong, productCategory) against ('$newSearchString' in boolean mode);";
    
    $result=$mysqli->query($query);
    $res_array=array();
    if($result->num_rows > 0){
        for($count=0; $row=$result->fetch_assoc(); $count++)
        {
            $res_array[$count]=$row;
        }
    }
    return $res_array;
    $mysqli->close();
}
?>