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
        'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=samauto',
        'username' => 'root',
        'password' => '=Cbd#2auT32t[R~P',
        'charset' => 'utf8',
        'attributes' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));",
        ],
        //'tablePrefix' => '',
    ];
}