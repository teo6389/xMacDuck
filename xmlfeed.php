<?php
$doc = new DOMDocument('1.0','UTF-8');
$doc->formatOutput = true;

$root = $doc->createelement('mywebstore');
$root = $doc->appendChild($root);

$dattime = $doc->createElement('created_at');
$dattime = $root->appendChild($dattime);
$dattimev = $doc->createTextNode(date("Y-m-d")." ".date("H:i"));
$dattimev = $dattime->appendChild($dattimev);

$products = $doc->createElement('products');
$products = $root->appendChild($products);

include "functions.php";
$con = connect();
$result = mysqli_query($con,"SELECT * FROM bridge");
while($row = mysqli_fetch_array($result)) {
$product = $doc->createElement('product');
$product = $products->appendChild($product);
//id
$id = $doc->createElement('id',$row['sku']);
$id = $product->appendChild($id);
//name
$name = $doc->createElement('name');
$name = $product->appendChild($name);
$name->appendChild($doc->createCDATASection( $row['name'] ));
//link
$link = $doc->createElement('link');
$link = $product->appendChild($link);
$link->appendChild($doc->createCDATASection( $row['link'] ));
//image
$image = $doc->createElement('image');
$image = $product->appendChild($image);
$image->appendChild($doc->createCDATASection( $row['imglink'] ));
//category
$category = $doc->createElement('category');
$idattribute = $doc->createAttribute('id');
$idattribute->value = $row['catid'];
$category->appendChild($idattribute);
$category = $product->appendChild($category);
$category->appendChild($doc->createCDATASection( $row['category'] ));
//id
$price_with_vat = $doc->createElement('price_with_vat',$row['price']);
$price_with_vat = $product->appendChild($price_with_vat);
//manufacturer
$manufacturer = $doc->createElement('manufacturer');
$manufacturer = $product->appendChild($manufacturer);
$manufacturer->appendChild($doc->createCDATASection( $row['manufacturer'] ));
//description
$description = $doc->createElement('description');
$description = $product->appendChild($description);
$description->appendChild($doc->createCDATASection( $row['description'] ));

//weight
//$weight = $doc->createElement('weight','350');
//$weight = $product->appendChild($weight);

//mpn
//$mpn = $doc->createElement('mpn','ZHD332');
//$mpn = $product->appendChild($mpn);

//instock Y or N
$instock = $doc->createElement('instock',$row['instock']);
$instock = $product->appendChild($instock);
//availability
$availability = $doc->createElement('availability',$row['availability']);
$availability = $product->appendChild($availability);
}

mysqli_close($con);
header("Content-Type: text/xml");
print $doc->saveXML() . "\n";
?>