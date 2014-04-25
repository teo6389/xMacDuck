<?php
$sku = $_GET["sku"];
include "functions.php";
$con = connect();
$result = mysqli_query($con,"SELECT * FROM bridge WHERE sku = '".$sku."' ");
while($row = mysqli_fetch_array($result)) {
    $res['name'] = $row['name'];
    $res['link'] = $row['link'];
    $res['imglink'] = $row['imglink'];
    $res['catid'] = $row['catid'];
    $res['category'] = $row['category'];
    $res['instock'] = $row['instock'];
    $res['availability'] = $row['availability'];
    $res['price'] = $row['price'];
    $res['description'] = $row['description'];
    $res['shipping'] = $row['shipping'];
    $res['manufacturer'] = $row['manufacturer'];
}
if(mysqli_num_rows($result)==0){
    echo "empty";
}
else{
	echo json_encode($res);
}
?>