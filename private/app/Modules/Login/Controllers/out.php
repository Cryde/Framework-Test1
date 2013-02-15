<?php

$_SESSION = array();
session_destroy();

redirect('index.php');