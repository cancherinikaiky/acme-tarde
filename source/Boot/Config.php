<?php
// Definição de todas as constantes do sistema
// Esse script consta no composer.json para ser incluido automaticamente
/**
 * DATABASE
 */

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "bd-acme-tarde",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

//define("CONF_DB_HOST", "localhost");
//define("CONF_DB_USER", "root");
//define("CONF_DB_PASS", "");
//define("CONF_DB_NAME", "bd-acme"); // aqui deve ser alterado para o nome do banco de dados

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "https://www.localhost/acme-tarde"); // depois da / deve vir o nome da pasta do trabalho
define("CONF_URL_TEST", "https://www.localhost/acme-tarde"); // depois da / deve vir o nome da pasta do trabalho