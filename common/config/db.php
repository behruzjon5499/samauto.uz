<?php
if($_SERVER['SERVER_NAME']=='samauto.loc'){
	return [
		'class' => 'yii\db\Connection',
		'dsn' => 'mysql:host=localhost;dbname=samauto',
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8',
		//'tablePrefix' => '',
	];
}else{
	return [
		'class' => 'yii\db\Connection',
		'dsn' => 'mysql:host=127.0.0.1;port=3310;dbname=samauto',
		'username' => 'root',
		'password' => 'cXzI4mzBA1',
		'charset' => 'utf8',
		//'tablePrefix' => '',
	];
}