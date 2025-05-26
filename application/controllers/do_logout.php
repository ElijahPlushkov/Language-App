<?php

require_once CONFIG . '/boot.php';

$_SESSION['user_id'] = null;
//require VIEWS . '/welcome_page.tpl.php';


header('Location: display_welcome-page.php');