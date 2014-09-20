<?php

$ownerId  = isset($_REQUEST['oid']) ? $_REQUEST['oid'] : '';
$viewerId = isset($_REQUEST['vid']) ? $_REQUEST['vid'] : '';

// 初回アクセスが正常に行われている場合はIDをCookieにセット
setcookie('owner_id', $ownerId, true, '+20 years');
setcookie('viewer_id', $viewerId, true, '+20 years');
header("Location: " . $_GET['callback_url']);
