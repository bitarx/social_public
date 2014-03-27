<?php
/** 全体定数設定 */

/**
 * 基本情報
 */
define("DOMAIN","asns.jp");
define("BASE_URL","http://" . DOMAIN . "/");
define("ROOT_DIR", '/var/www/asns/');
define("IMG_DIR", ROOT_DIR . 'app/webroot/img/');

$config = array();

/**
 * サイト全体で使う種別
 */
// カード
define("KIND_CARD","1");
// アイテム
define("KIND_ITEM","2");
// ゴールド
define("KIND_GOLD","3");
// 敵
define("KIND_ENEMY","4");
//  全力進行
define("KIND_PROG_HIGHT","5");
//  他のプレイヤーとの出会い
define("KIND_NEW_FRIEND","6");
