<?php
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '95086670');
	define('BASE', 'projetoweb');

	$conn = new MySQLi(HOST,USER,PASS,BASE);

	//função para converter data em pt Brasil
	function ExibeData($data){
		return  date("d/m/Y", strtotime($data));
	}
	