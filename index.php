<?php

$typeids=array(34,35);
$url="http://api.eve-central.com/api/marketstat?regionlimit=10000002&typeid=".join('&typeid=',$typeids);
$pricexml=file_get_contents($url);
$xml=new SimpleXMLElement($pricexml);
echo "<table><tr><td>Item ID</td><td>Price</td></tr>\n";
foreach($typeids as $typeid)
{
    $item=$xml->xpath('/evec_api/marketstat/type[@id='.$typeid.']');
    $price= (float) $item[0]->sell->percentile;
    $price=round($price,2);
    echo "<tr><td>$typeid</td><td>$price</td></tr>\n";
}
echo "</table>\n";

?>
