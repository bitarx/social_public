<?php
setcookie('PHPSESSID', time(), time() + 2592000);

$ownerParam  = isset($_REQUEST['oid']) ? $_REQUEST['oid'] : '';

$ids = explode('|', $ownerParam);

$time = time() + (60 * 60 * 24 * 365 * 10);
// 初回アクセスが正常に行われている場合はIDをCookieにセット
setcookie('opensocial_owner_id', $ids[0],  $time );
setcookie('opensocial_viewer_id', $ids[1], $time );

header("Location: " . $_GET['callback_url']);
