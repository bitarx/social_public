<?php
/** 全体定数設定 */

/**
 * 基本情報
 */
define("DOMAIN","asns.jp");
define("BASE_URL","http://" . DOMAIN . "/");
define("IMG_URL", BASE_URL . "img/");
define("FILEOUT_URL", BASE_URL . "File/outimage");
define("ROOT_DIR", '/var/www/asns/');
define("PRIVATE_DIR", ROOT_DIR . 'app/Private/');

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


/**
 * 文言
 */
define("MONEY_NAME","ゴールド");
