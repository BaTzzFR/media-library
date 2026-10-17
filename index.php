<?php
require __DIR__ . '/utils/config.php';
require __DIR__ . '/utils/database.php';

use Utils\Config;
use Utils\Database;

$database = new Database(
    Config::get('db_host'),
    Config::get('db_port'),
    Config::get('db_name'),
    Config::get('db_username'),
    Config::get('db_password')
)->getConnection();

$database->query('SELECT 1')->fetchColumn();
echo 'Connexion à la base de données réussie.';
