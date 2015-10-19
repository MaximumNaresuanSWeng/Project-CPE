<?php

class EncodeHash {

	public static function encode($password) {
		
		$iterationCount = 600;
		$secret = "<<<TOKENvT@sw6b7,GD#orY8iQG%CbHLyzeziWFNWGnew=X]QuFfUtc(vPTOKEN";
		$salt = "2a2kdfkdlelslsw";
		$hash	= $password;
		for ($i = 0; $i < $iterationCount; ++$i) {
			$hash	= strtolower(hash('sha256', $secret . $hash . $salt));
		}

		return $hash;
	}
}
?>