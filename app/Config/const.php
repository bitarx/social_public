<?php
/** 全体定数設定 */

/**
 * サービス基本情報
 */
define("DOMAIN","asns.jp");
define("BASE_URL","http://" . DOMAIN . "/");
define("IMG_URL", BASE_URL . "img/");
define("FILEOUT_URL", BASE_URL . "File/outimage");
define("ROOT_DIR", '/var/www/social/');
define("PRIVATE_DIR", ROOT_DIR . 'app/Private/');

// カード最大所有枚数
define("CARD_MAX_NUM", 100);

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
 * ページング
 */
// 1ページの表示数
define("PAGE_LIMIT", 10);
// キーの名前
define("KEY_PAGING", 'p');


/**
 * 文言
 */
define("MONEY_NAME","ゴールド");

/**
 * 基本的な情報
 */
define("NOW_DATE",  date("Y-m-d H:i:s") );
define("NOW_DATE_DB", "'" . NOW_DATE . "'");

