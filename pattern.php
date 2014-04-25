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

$product = $doc->createElement('product');
$product = $products->appendChild($product);
//id
$id = $doc->createElement('id','322233');
$id = $product->appendChild($id);
//name
$name = $doc->createElement('name');
$name = $product->appendChild($name);
$name->appendChild($doc->createCDATASection( 'onoma_proion' ));
//link
$link = $doc->createElement('link');
$link = $product->appendChild($link);
$link->appendChild($doc->createCDATASection( 'http://www.mywebstore.gr/product/322233' ));
//image
$image = $doc->createElement('image');
$image = $product->appendChild($image);
$image->appendChild($doc->createCDATASection( 'http://www.mywebstore.gr/product/322233.jpg' ));
//category
$category = $doc->createElement('category');
$idattribute = $doc->createAttribute('id');
$idattribute->value = '23';
$category->appendChild($idattribute);
$category = $product->appendChild($category);
$category->appendChild($doc->createCDATASection( 'Αθλητικά > Extreme Sports' ));
//id
$price_with_vat = $doc->createElement('price_with_vat','322.33');
$price_with_vat = $product->appendChild($price_with_vat);
//manufacturer
$manufacturer = $doc->createElement('manufacturer');
$manufacturer = $product->appendChild($manufacturer);
$manufacturer->appendChild($doc->createCDATASection( 'SuperGlasses' ));
//description
$description = $doc->createElement('description');
$description = $product->appendChild($description);
$description->appendChild($doc->createCDATASection( 'Πρωτοποριακά γυαλιά με .....' ));
//weight
//$weight = $doc->createElement('weight','350');
//$weight = $product->appendChild($weight);
//mpn
$mpn = $doc->createElement('mpn','ZHD332');
$mpn = $product->appendChild($mpn);
//instock Y or N
$instock = $doc->createElement('instock','N');
$instock = $product->appendChild($instock);
//availability
$availability = $doc->createElement('availability','Κατόπιν Παραγγελίας');
$availability = $product->appendChild($availability);

header("Content-Type: text/xml");
print $doc->saveXML() . "\n";
?>
