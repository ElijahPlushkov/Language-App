<?php

require_once CONFIG . '/boot.php';

$_SESSION['user_id'] = null;
header('Location: index.php');