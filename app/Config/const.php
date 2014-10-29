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

// スキルレベル最大
define("SKILL_LEVEL_MAX", 30);

// SNS情報更新期間(秒)
define("SNS_DATA_UPDATE_TARM", 60*60*24);

// キャリア（Android）
define("CARRER_ANDROID", 1);
// キャリア（iPhone）
define("CARRER_IPHONE", 2);
// キャリア（WindowsPhone）
define("CARRER_WINPHONE", 3);
// キャリア（PC）
define("CARRER_PC", 9);


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


// クエスト効果アイテム有効時間（分 ）
define("ITEM_EFFECT_MINUTES", 30);

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
define("MONEY_NAME","ゴールド");  // サイト内通貨の呼称
define("POINT_NAME","ポイント");  // プラットフォーム通貨の呼称

/**
 * 基本的な情報
 */
define("NOW_DATE",  date("Y-m-d H:i:s") );
define("NOW_DATE_DB", "'" . NOW_DATE . "'");



/**
 * OAuth認証関連
 */
// 商用環境の場合
//define("AH_IS_SANDBOX", false);

// サンドボックスの場合
define("AH_IS_SANDBOX", true);
