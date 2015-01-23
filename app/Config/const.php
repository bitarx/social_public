<?php
/** 全体定数設定 */
if (!defined('PRIVATE_DIR')) {
    define("PRIVATE_DIR", ROOT . DS . 'app' . DS . 'Private' . DS);
}

/**
 * URL基本設定
 */
if (!defined('DOMAIN')) {
    define("DOMAIN", $_SERVER['SERVER_NAME']);
}


/**
 * プラットフォーム識別
 */

$platformDomain = "";

// 独自JSライブラリ
define("NIJI_JSLIB_DOMAIN", 'gm.nijiyome.jp');

if ( false !== strpos( DOMAIN, 'hills')) {

    /** アプリヒルズ */
    define("PLATFORM_ENV", 'hills');
    $platformDomain = 'appli-hills.com';

    // APIのパス
    define("PLATFORM_INVITE_PATH", '/sp/application/invite/');

    // 文言等
    define("SNS_FRIEND_NAME", 'フレンド');
    define("POINT_NAME","ゴールド");             // プラットフォーム通貨の呼称


} elseif ( false !== strpos( DOMAIN, 'waku')) {

    /** waku+ */
    define("PLATFORM_ENV", 'waku');
    $platformDomain = 'pf.wakupl.com';

    // APIのパス
    define("PLATFORM_INVITE_PATH", '/sp/application/invite/');

    define("SNS_FRIEND_NAME", '友達');
    define("POINT_NAME","コイン");             // プラットフォーム通貨の呼称


} elseif ( false !== strpos( DOMAIN, 'niji') ) {

    /** にじよめ */
    define("PLATFORM_ENV", 'niji');
    $platformDomain = 'nijiyome.com';

    // APIのパス
    define("PLATFORM_INVITE_PATH", '/sp/application/invite/');

    define("SNS_FRIEND_NAME", 'フレンド');
    define("POINT_NAME","にじコイン");             // プラットフォーム通貨の呼称

} else {
    // プラットフォーム外
    define("PLATFORM_ENV", 'out');

    define("SNS_FRIEND_NAME", '友達');
}

// waku+対応
if ('waku' == PLATFORM_ENV) {
    define("URL_PRE", '?url=');
} else {
    define("URL_PRE", '');
}


if (!defined('BASE_URL')) {
    define("BASE_URL","http://" . DOMAIN . DS);
}
if (!defined('IMG_URL')) {
    define("IMG_URL", BASE_URL . "img" . DS);
}
if (!defined('FILEOUT_URL')) {
    define("FILEOUT_URL", BASE_URL . "File" . DS . "outimage");
}


define("BASE_URL_PRE", URL_PRE . BASE_URL);


/**
 * SNSAPI基本設定
 */
if ( false !== strpos( DOMAIN, 'eres')) {
    /*  本番環境 */
    define("APP_ENV", 'com');

    define("PLATFORM_DOMAIN",  $platformDomain);

    // OAuth
    define("AH_IS_SANDBOX", false);

    // 独自JSライブラリ
    define("NIJI_JSLIB_URL", 'http://'. NIJI_JSLIB_DOMAIN . '/');

    // Lサイズカード保存ディレクトリ
    define("CARD_L_DIR", '9KegdFdW' );
    define("SCENE_DIR", 'xD7ywE4p' );

    if ('hills' == PLATFORM_ENV) {
        define("PLATFORM_APP_ID", 155);
    } elseif ('waku' == PLATFORM_ENV) {
        define("PLATFORM_APP_ID", 100388);
    } else {
        define("PLATFORM_APP_ID", 218);
    }

} elseif ( false !== strpos( DOMAIN, 'asns') ) {
    /* ステージング環境 */
    define("APP_ENV", 'stg');
    Configure::write('debug', 2);

    define("PLATFORM_DOMAIN", 'sb.'. $platformDomain);

    // OAuth
    define("AH_IS_SANDBOX", true);

    // 独自JSライブラリ
    define("NIJI_JSLIB_URL", 'http://sp'. NIJI_JSLIB_DOMAIN . '/');

    // Lサイズカード保存ディレクトリ
    define("CARD_L_DIR", '9KegdFdW' );
    define("SCENE_DIR", 'xD7ywE4p' );

    if ('hills' == PLATFORM_ENV) {
        define("PLATFORM_APP_ID", 178);
    } elseif ('waku' == PLATFORM_ENV) {
        define("PLATFORM_APP_ID", 100388);
    } else {
        define("PLATFORM_APP_ID", 265);
    }
} else {
    /* 開発環境 */
    define("APP_ENV", 'dev');
    Configure::write('debug', 2);

    define("PLATFORM_DOMAIN", 'sb.'. $platformDomain);

    // 独自JSライブラリ
    define("NIJI_JSLIB_URL", 'http://sp'. NIJI_JSLIB_DOMAIN . '/');

    // Lサイズカード保存ディレクトリ
    define("CARD_L_DIR", '9KegdFdW' );
    define("SCENE_DIR", 'xD7ywE4p' );

    if ('hills' == PLATFORM_ENV) {
        define("PLATFORM_APP_ID", 190);
    } elseif ('waku' == PLATFORM_ENV) {
        define("PLATFORM_APP_ID", 100388);
    } else {
        define("PLATFORM_APP_ID", 264);
    }

    // OAuth
    define("DEV_IS_SANDBOX", true);
}


// プラットフォームURL
define("PLATFORM_URL", 'http://'. PLATFORM_DOMAIN);

/** エラーID */
// 不正な操作
define("ERROR_ID_BAD_OPERATION", 1 );
// システムエラー
define("ERROR_ID_SYSTEM", 2 );
// イベント終了
define("END_EVENT", 3 );



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
// ペニー
define("KIND_GOLD","3");
// 敵
define("KIND_ENEMY","4");
//  全力進行
define("KIND_PROG_HIGHT","5");
//  他のプレイヤーとの出会い
define("KIND_NEW_FRIEND","6");


// クエスト効果アイテム有効時間（分 ）
define("ITEM_EFFECT_MINUTES", 20);

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
define("MONEY_NAME","ペニー");               // サイト内通貨の呼称

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
// 強化素材ガチャID
define("GACHA_SOZAI_ID", 4 );


/**
 * クエスト関連
 */
// 最大ステージID
define("MAX_STAGE_ID", 30 );
// クエストアイテム出現率プラス値(%)
define("QUEST_ITEM_EFFECT", 5 );


/**
 * カード関連
 */
// 強化素材カードID
define("SYNTH_AI_CARD_ID", 64 );
define("SYNTH_MAI_CARD_ID", 65 );
define("SYNTH_MI_CARD_ID", 66 );

