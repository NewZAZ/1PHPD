<?php
define('DB_SERVER', getenv("HOST"));
define('DB_USERNAME', getenv("USER"));
define('DB_PASSWORD', getenv("PASSWORD"));
define('DB_DATABASE', getenv("DATABASE"));
$db = new PDO(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
