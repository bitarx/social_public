<?php
/** 全体定数設定 */

/**
 * サービス基本情報
 */
if ( false !== strpos( $_SERVER['SERVER_NAME'], 'nomadoworks')) {
    // 開発環境
    define("DOMAIN","nomadoworks.com");
    define("ROOT_DIR", '/var/www/dev_social/');

    // OAuth
    define("DEV_IS_SANDBOX", true);
} elseif ( false !== strpos($_SERVER['SERVER_NAME'], 'asns') ) {
    // ステージング環境
    define("DOMAIN","asns.jp");
    define("ROOT_DIR", '/var/www/social/');

    // OAuth
    define("AH_IS_SANDBOX", true);
} else {
    // 本番環境
    define("DOMAIN","eres.xyz");
    define("ROOT_DIR", '/var/www/social/');

    // OAuth
    define("AH_IS_SANDBOX", false);
}

define("BASE_URL","http://" . DOMAIN . "/");
define("IMG_URL", BASE_URL . "img/");
define("FILEOUT_URL", BASE_URL . "File/outimage");
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
define("SITE_TITLE", '鎮激のエロイーズ');    // サイトタイトル
define("MONEY_NAME","ゴールド");             // サイト内通貨の呼称
define("POINT_NAME","ポイント");             // プラットフォーム通貨の呼称

// デッキにカードがない
define("DECK_NOCARD", "デッキにカードをセットしないとボスと戦うことはできません！");

/**
 * 基本的な情報
 */
define("NOW_DATE",  date("Y-m-d H:i:s") );
define("NOW_DATE_DB", "'" . NOW_DATE . "'");

/**
 * アイテム関連
 */
// 初回限定アイテムID
define("FIRST_ITEM_ID", 1 );

// プレミアムガチャチケットID
define("PGACHA_ITEM_ID", 9 );


/**
 * ガチャ関連
 */
// プレミアムガチャID
define("GACHA_PREMIUM_ID", 1 );
// 10連ガチャID
define("GACHA_10_ID", 2 );
// 無課金ガチャID
define("GACHA_MONEY_ID", 3 );

