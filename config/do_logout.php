<?php

require_once 'boot.php';

$_SESSION['user_id'] = null;
header('Location: main-page.php');