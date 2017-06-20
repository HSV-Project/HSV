<?php
function get_products_byDepartment($department,$thispage){
    include 'Database.php';
    $recordsperpage=7;
    /*$query="SELECT count(productID) FROM Inventory WHERE productCategory='$department'";
    $result=$mysqli->query($query);
    $row=  mysqli_fetch_array($result);
    $recordsperpage=7;
    $totalpages=  ceil($row[0]/$recordsperpage);*/
    $offset=($thispage-1)*$recordsperpage;
    $query="SELECT productID, productName, productDescShort, productDescLong, productPrice, productQuantityAvail, productAddedDate, productCategory, "
            . "productImage, productCategory, productSellerId from Inventory where productCategory='$department' ORDER BY productID DESC LIMIT $offset,$recordsperpage";
    
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
function get_products_bySeller($seller,$thispage){
    include 'Database.php';
    $recordsperpage=7;
    //$thispage=$_GET['thispage'];
    /*$query="SELECT count(productID) FROM Inventory WHERE productSellerId='$seller'";
    $result=$mysqli->query($query);
    $row=  mysqli_fetch_array($result);
    $recordsperpage=7;
    $totalpages=  ceil($row[0]/$recordsperpage);*/
    $offset=($thispage-1)*$recordsperpage;
    $query="SELECT productID, productName, productDescShort, productDescLong, productPrice, productQuantityAvail, productAddedDate, productCategory, productImage,"
            . " productCategory, productSellerId from Inventory where productSellerId='$seller' ORDER BY productID DESC LIMIT $offset,$recordsperpage";
    
    error_log($query);
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
function get_products_bySearch($search,$thispage)
{
    include 'Database.php';
    $recordsperpage=7;
    $searchTerms = explode(' ', $search);
    $newSearchString=implode('* ', $searchTerms)."*";
    /*$query="SELECT count(productID) FROM Inventory WHERE match(productName, productDescShort, "
                . "productDescLong, productCategory) against ('$newSearchString' in boolean mode)";
    //error_log($query);
    $result=$mysqli->query($query);
    $row=  mysqli_fetch_array($result);
    $recordsperpage=7;
    $totalpages=  ceil($row[0]/$recordsperpage);*/
    $offset=($thispage-1)*$recordsperpage;
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
    
    $query="SELECT productID, productName, productDescShort, productDescLong, productPrice, productQuantityAvail, productAddedDate, productCategory, "
                . "productImage, productCategory, productSellerId, productCategory from Inventory where match(productName, productDescShort, "
                . "productDescLong, productCategory) against ('$newSearchString' in boolean mode) ORDER BY productID DESC LIMIT $offset,$recordsperpage;";
    
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