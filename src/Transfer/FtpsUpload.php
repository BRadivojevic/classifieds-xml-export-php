<?php
namespace App\Transfer;

final class FtpsUpload {
	public static function upload(string $xml, string $remotePath): array {
		$host = getenv('FTPS_HOST'); $user = getenv('FTPS_USER'); $pass = getenv('FTPS_PASS');
		$tmp = tempnam(sys_get_temp_dir(), 'xml_');
		file_put_contents($tmp, $xml);

		$fp = fopen($tmp, 'r');
		$conn = curl_init("ftps://{$host}/{$remotePath}");
		curl_setopt_array($conn, [
			CURLOPT_USERPWD => "{$user}:{$pass}",
			CURLOPT_UPLOAD => true,
			CURLOPT_INFILE => $fp,
			CURLOPT_INFILESIZE => filesize($tmp),
			CURLOPT_RETURNTRANSFER => true
		]);
		$body = curl_exec($conn);
		$err  = curl_error($conn);
		$code = (int)curl_getinfo($conn, CURLINFO_RESPONSE_CODE);
		curl_close($conn);
		fclose($fp);
		unlink($tmp);
		return [$code, $body, $err];
	}
}
