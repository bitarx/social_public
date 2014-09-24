<?php

$ownerId  = isset($_REQUEST['oid']) ? $_REQUEST['oid'] : '';
$viewerId = isset($_REQUEST['vid']) ? $_REQUEST['vid'] : '';

$time = time() + (60 * 60 * 24 * 365 * 10);
// 初回アクセスが正常に行われている場合はIDをCookieにセット
setcookie('opensocial_owner_id', $ownerId,  $time );
setcookie('opensocial_viewer_id', $viewerId, $time );
header("Location: " . $_GET['callback_url']);
