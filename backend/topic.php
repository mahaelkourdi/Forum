<?php

require_once 'mysql/mysqlTopic.php';
require_once 'helper.php';

$res = getTopic();
sendMessage($res);
?>