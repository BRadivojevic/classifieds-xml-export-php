<?php
namespace App\Export;

final class WillhabenXml {
	public static function build(array $cars): string {
		$doc = new \DOMDocument('1.0','UTF-8');
		$root = $doc->createElement('Vehicles');
		$doc->appendChild($root);
		foreach ($cars as $c) {
			$v = $doc->createElement('Vehicle');
			$v->appendChild($doc->createElement('Make', htmlspecialchars($c['make'])));
			$v->appendChild($doc->createElement('Model', htmlspecialchars($c['model'])));
			$v->appendChild($doc->createElement('Price', (string)(int)$c['price']));
			$root->appendChild($v);
		}
		return $doc->saveXML();
	}
}
