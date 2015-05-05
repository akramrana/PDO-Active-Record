<?php

require_once 'controllers/UserController.php';

use controller\UserController;

$user = new controller\UserController();

echo '<pre>';
print_r($user->getInstance());
echo '</pre>';
