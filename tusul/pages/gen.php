<?php 
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
echo $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);
$registred_date = "2017b";
$content_code = $registred_date.substr(str_shuffle("0123456789"), 0, 4);
echo $content_code;
?>