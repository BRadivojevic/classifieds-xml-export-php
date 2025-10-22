<?php
require __DIR__.'/../vendor/autoload.php';
use App\Export\WillhabenXml;
use App\Transfer\FtpsUpload;

$cars = [
	['make'=>'Škoda','model'=>'Octavia','price'=>15500],
	['make'=>'VW','model'=>'Golf','price'=>12900]
];
$xml = WillhabenXml::build($cars);
[$code, $body, $err] = FtpsUpload::upload($xml, 'incoming/willhaben_export.xml');
echo "HTTP $code\n$err\n$body\n";
