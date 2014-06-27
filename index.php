<?php

$typeids=array(34,35);
$url="http://api.eve-central.com/api/marketstat?regionlimit=10000002&typeid=".join('&typeid=',$typeids);
$pricexml=file_get_contents($url);
$xml=new SimpleXMLElement($pricexml);
foreach($typeids as $typeid)
{
    $item=$xml->xpath('/evec_api/marketstat/type[@id='.$typeid.']');
    $price= (float) $item[0]->sell->percentile;
    $price=round($price,2);
    echo $typeid." ".$price."\n";
}


?>
