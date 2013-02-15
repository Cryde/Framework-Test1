<?php

$infoLog = getLogAction();

render('view_logs.php', array(
	'infoLog' => $infoLog
));