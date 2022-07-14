<?php
	const DB_HOST = 'localhost'; //host do banco
	const DB_NAME = 'agen5566_flameiro'; //nome do banco
	const DB_USER = 'agen5566_admin';//usuário do banco
	const DB_PASS = 'flameiro@159753';//senha do usuário

	function connect() {
		try {
			return new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
		} catch (PDOExcpetion $erro) {
			return $erro->getMessage();
		}
	}

?>