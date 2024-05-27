<?php
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/SensitiveData.php';
require_once __DIR__ . '/../classes/User.php';


$db = new Database();
$user = new User($db);
$sensitivedata = new SensitiveData($db);


?>