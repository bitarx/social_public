<?php
header('Content-Type: text/css; charaset=utf-8');
$url = 'http://' . $_SERVER['HTTP_HOST'];

echo "
/**
 *
 * Generic CSS for CakePHP
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.webroot.css
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

* {
	margin:0;
	padding:0;
}

/** General Style Info **/
body {
    zoom:50%;
    background-image: url('" . $url . "/img/bg.png');
	color: #fff;
    text-align: center;  
}


a {
	color: #fff;
	text-decoration: underline;
	font-weight: bold;
}
a:hover {
	color: #FFA500;
	text-decoration:none;
}

/** Layout **/
.contents{
    overflow:hidden;
    width:640px;
    font-size:24px;
    margin: 0 auto;  
    text-align: left;
}

#header{
	padding: 10px 20px;
}
.header{
    width:640px;
    position: relative;
}
.headerBar {
    width:640px;
    height:110px;
}
.btn_normal{
    position: relative;
    top: 10px;
    left: 100px;
}
.btn_my{
    position: absolute;
    top: 0px;
    left: 0px;
}
.btn_synth{
    position: absolute;
    top: 0px;
    left: 141px;
}
.btn_quest{
    position: absolute;
    top: 0px;
    left: 260px;
}
.btn_gacha{
    position: absolute;
    top: 0px;
    left: 379px;
}
.btn_menu{
    position: absolute;
    top: 0px;
    left: 499px;
}
.btn_my_off{
    position: absolute;
    top: 3px;
    left: 3px;
}
.btn_synth_off{
    position: absolute;
    top: 3px;
    left: 144px;
}
.btn_quest_off{
    position: absolute;
    top: 3px;
    left: 263px;
}
.btn_gacha_off{
    position: absolute;
    top: 3px;
    left: 382px;
}
.btn_menu_off{
    position: absolute;
    top: 3px;
    left: 500px;
}
#div_menu{
  display: none;
  padding: 0px;
}
.menu_base{
    top: 10px;
    position: relative;
}
.head_child {
    position: relative;
}
.menu_head {
    position: absolute;
    top: 18px;
    margin-left:12px;
}
.menu_close {
    position: absolute;
    top: 0px;
    margin-left:522px;
    margin-top:0px;
}
.icon_top {
    position: absolute;
    top: 60px;
    left: 0px;
}
.icon_mypage {
    position: absolute;
    top: 60px;
    left: 194px;
}
.icon_quest {
    position: absolute;
    top: 60px;
    left: 388px;
}
.icon_synth {
    position: absolute;
    top: 145px;
    left: 0px;
}
.icon_deck {
    position: absolute;
    top: 145px;
    left: 194px;
}
.icon_gacha {
    position: absolute;
    top: 145px;
    left: 388px;
}

.icon_pbox {
    position: absolute;
    top: 230px;
    left: 0px;
}
.icon_item {
    position: absolute;
    top: 230px;
    left: 194px;
}
.icon_shop {
    position: absolute;
    top: 230px;
    left: 388px;
}

.icon_scene {
    position: absolute;
    top: 315px;
    left: 0px;
}
.icon_help {
    position: absolute;
    top: 315px;
    left: 194px;
}
.icon_card_list {
    position: absolute;
    top: 315px;
    left: 388px;
}
.icon_raid {
    position: absolute;
    top: 400px;
    left: 0px;
}
.icon_card {
    position: absolute;
    top: 400px;
    left: 194px;
}
.icon_rank {
    position: absolute;
    top: 400px;
    left: 388px;
}
.bn_menu {
    position: absolute;
    top: 485px;
    left: 10px;
}
.bn_menu_raid {
    position: absolute;
    top: 595px;
    left: 10px;
}


/** ガチャ */
/** 選択 */
.selectGachaKind {
    top: -60px;
    height: 30px;
    position: relative;
}

.gachaImg {
    left:5px;
    top:10px;
    position: relative;
}
.gachaName {
    left: 180px;
    top:-140px;
    position: relative;
}
.gachaDetail {
    left: 180px;
    top:-120px;
    position: relative;
}
.gachaPrice {
    left: 180px;
    top:-70px;
    position: relative;
}
.btnGachaStart {
    position: relative;
    top: -30px;
    left: 180px;
    height:80px;
}
.gachaTextArea {
    position: relative;
    text-align:center;
    top:0px;
}

/** カード */
.card {
    top:8px;
    font-size: 24px;
    color: #FFA500;
    position: relative;
}
.cardImg {
    left:5px;
    top:0px;
    text-align:left;
    position: relative;
}
.cardName {
    left: 180px;
    top:12px;
    font-size: 24px;
    position: absolute;
}
.cardAtk {
    left: 180px;
    top: 45px;
    font-size: 24px;
    position: absolute;
}
.cardDef {
    left: 323px;
    top: 45px;
    font-size: 24px;
    position: absolute;
}
.cardHp {
    left: 455px;
    top: 45px;
    font-size: 24px;
    position: absolute;
}
.cardHpIos {
    left: 455px;
    top: 50px;
    font-size: 24px;
    position: absolute;
}
.cardExp {
    top: 78px;
    left: 180px;
    text-align:left;
    font-size: 24px;
    position: absolute;
}
.cardExpInt {
    top: 81px;
    left: 350px;
    font-size: 22px;
    position: absolute;
}
.cardExpIntIos {
    top: 83px;
    left: 350px;
    font-size: 22px;
    position: absolute;
}
.cardLv {
    top: 113px;
    left: 180px;
    font-size: 24px;
    position: absolute;
}
.cardLvIos {
    top: 114px;
    left: 180px;
    font-size: 24px;
    position: absolute;
}
.cardSkillLv {
    top: 114px;
    left: 350px;
    font-size: 24px;
    position: absolute;
}
.cardSkillLvIos {
    top: 110px;
    left: 350px;
    font-size: 24px;
    position: absolute;
}
.cardRareLevel {
    top: 145px;
    left: 180px;
    font-size: 24px;
    position: absolute;
}
.cardSkillName {
    top: 176px;
    left: 180px;
    font-size: 24px;
    position: absolute;
}
.cardSkillEft {
    top: 209px;
    left: 180px;
    font-size: 24px;
    position: absolute;
}
.cardComment {
    top: 245px;
    left: 180px;
    font-size: 25px;
    position: absolute;
}
.cardDeckCost {
    top: 144px;
    left: 365px;
    font-size: 24px;
    position: absolute;
}
.progCardExp {
    position: absolute;
    text-align:left;
    top: 81px;
    left: 265px;
    background: url(" . $url . "/img/progress_base.png) top repeat-x;
    border : 1px solid #d3d3d3;
    line-height: 0;
    height:18px;
    font-size: 22px;
    width: 240px;
}
.progCardExpIos {
    position: absolute;
    text-align:left;
    top: 86px;
    left: 265px;
    background: url(" . $url . "/img/progress_base.png) top repeat-x;
    border : 1px solid #d3d3d3;
    line-height: 0;
    height:18px;
    font-size: 22px;
    width: 240px;
}

/** 区切りライン */
.line {
    position:relative;
    top: 12px;
    bottom: 10px;
    text-align:center
}
.lineGacha {
    position:relative;
    top: -30px;
    left: 20px;
}

/** submitボタン */
input.btn_submit {
    cursor: pointer;
    display: block;
    width: 200px;
    height: 50px;
    border: none;
    text-indent: -9999px;
    background: url(" . $url . "/img/btn_st_s.png) no-repeat 0 0;
}
 


/** リスト表示 */
.listBlock {
    position:relative;
    text-align:center;
    top:30px;
    left:8px;
}


/** ベースカード変更 */
.strCardView {
    position: absolute;
    top: 12px;
    left: 135px;
}

/** 選択ボタン */
.btnSelectCard {
    top: 15px;
    left: 0px;
    height:90px;
    position: relative;
}
.strSelectCard {
    position: relative;
    top: -55px;
    left: 80px;
}
.strSelectCardCheckBox {
    position: relative;
    top: -15px;
    left: 460px;
    height:45px;
    width:200px;
}
.strSelectCardSozai {
    position: absolute;
    width:200px;
    top: 12px;
    left:78px;
}


/** クエストのプログレスバー */
.progQuest {
    position: relative;
    margin: 0 auto;
    top: -161px;
    left:-40px;
    height:120px;
    line-height: 0;
    width: 520px;
}
.progQuestUseStr {
    position: absolute;
    top: 0px;
    left:100px;
    height: 24px;
    width: 450px;
    font-size: 26px;
}
.progQuestMain {
    position: absolute;
    margin: 0 auto;
    top: 27px;
    left: 110px;
    background: url(" . $url . "/img/progress_base.png) top repeat-x;
    border : 1px solid #d3d3d3;
    line-height: 0;
    height: 40px;
    width: 480px;
}
.progQuestMainStr {
    position: absolute;
    top: 48px;
    height: 30px;
    width: 120px;
    font-size: 32px;
}
.progQuestAct {
    position: absolute;
    margin: 0 auto;
    top: 79px;
    left: 110px;
    background: url(" . $url . "/img/progress_base.png) top repeat-x;
    border : 1px solid #d3d3d3;
    line-height: 0;
    height: 40px;
    width: 480px;
}
.progQuestActStr {
    position: absolute;
    top: 99px;
    height: 30px;
    width: 120px;
    font-size: 32px;
}
.progQuestExp {
    position: absolute;
    margin: 0 auto;
    top: 130px;
    left: 110px;
    background: url(" . $url . "/img/progress_base.png) top repeat-x;
    border : 1px solid #d3d3d3;
    line-height: 0;
    height: 40px;
    width: 480px;
}
.progQuestExpStr {
    position: absolute;
    top: 151px;
    height: 30px;
    width: 120px;
    font-size: 32px;
}

/**
 * ページング
 */
.paging {
    position:relative;
    text-align:center;
    height:35px;
    top:10px;
}
.btnPagingImg {
    width:100px;
    height:50px;
}
.btnPagingPrev {
    position:relative;
    float:left;
    top:0px;
    left:50px;
    width:100px;
    height:50px;
    text-align: center
}
.strPagingPrev {
    position:absolute;
    top:0px;
    left:14px;
    font-size: 36px;
    margin: auto;
}
.strPaging {
    position:relative;
    float:left;
    top:4px;
    left:190px;
}
.btnPagingNext {
    position:relative;
    float:right;
    top:0px;
    right:70px;
    width:100px;
    height:50px;
    text-align:center;
}
.strPagingNext {
    position:absolute;
    top:0px;
    left:14px;
    font-size: 36px;
    margin: auto;
}
.pagingNum {
    position:relative;
    text-align:center;
    height:55px;
    top:35px;
    left:120px;
}
.btnPagingNum {
    position:relative;
    float:left;
    width:80px;
}
.strPagingNum {
    position:absolute;
    top:2px;
    left:32px;
    font-size: 26px;
}

/**
 * ソート
 */
.sort {
    position:relative;
    text-align:center;
    height:35px;
    left:-80px;
    top:45px;
}
.btnSortUpdate {
    position: relative;
    top: 15px;
    left: 450px;
    height:90px;
}
.strSortUpdate {
    position: absolute;
    top: 12px;
    left: 15px;
}

/**
 * イベント
 */
.eventTextArea {
    position: relative;
    width: 640px;
    left: 5px;
}
.eventStr {
    position: absolute;
    top:10px;
    left:5px;
    float:left;
    color:#fff;
    line-height: 1.5em;
}
.textAreaEvent {
    height:300px;
    width:635px;
}
.textAreaEventH {
    height:320px;
    width:635px;
}
.eventStrH {
    position: absolute;
    top:12px;
    left:5px;
    float:left;
    color:#000;
    line-height: 1.5em;
}

/**
 * クエスト関連
 */
/** クエスト基本 */
.quest {
    position: relative;
    width: 640px;
    left: 6px;
}
.questText {
    position: relative;
    width: 600px;
    left: 10px;
}
.strQuestList {
    position: absolute;
    top: 18px;
    left: 12px;
    width: 580px;
    color: #000;
}
.stages {
}
.stageMain {
    position: relative;
}
.stagesEnd {
    height:1180px;
}
.stageList {
    position: relative;
}
.strStageList {
    position: absolute;
    width: 600px;
    border-style: solid ; 
    border-width: 1px;
    padding: 10px 10px 10px 10px;
    background-color: #7B68EE;
}
.strStageListEnd {
    position: absolute;
    width: 600px;
    border-style: solid ; 
    border-width: 1px;
    padding: 10px 10px 10px 10px;
    background-color: #00008B;
}

.stageItemEffect {
    position:relative;
    top:47px;
    height:100px;
    text-align:center;
}
.stageItemEffectBoss {
    position:relative;
    top:127px;
    height:100px;
    text-align:center;
}

/** クエストの進行ボタン */
.btnQuestProg {
    left: 103px;
    top: 250px;
    height: 200px;
    position: relative;
}
.btnQuestNotProg {
    left: 0px;
    top: 270px;
    height: 200px;
    text-align:center;
    position: relative;
}
.btnQuestProgBoss {
    left: 103px;
    top: 250px;
    height: 130px;
    position: relative;
}
.btnQuestNotProgBoss {
    left: 103px;
    top: 252px;
    height: 130px;
    position: relative;
}
.btnQuestNotProgBossRaid {
    left: 0px;
    height: 130px;
    position: relative;
}
.strQuestProg {
    position: absolute;
    top: 12px;
    left: 190px;
}
.strQuestNotProg {
    position: absolute;
    top: 42px;
    left: 142px;
}
.strQuestNotProgBoss {
    position: absolute;
    top: 42px;
    left: 42px;
}
.btnQuestToStageList {
    left: 0px;
    top: 50px;
    text-align:center;
    position: relative;
}
.btnQuestToStageListBoss {
    left: 0px;
    top: 95px;
    text-align:center;
    position: relative;
}

/** クエストボス */
.btnQuestBoss {
    left: 103px;
    top: 242px;
    position: relative;
}
.btnQuestBossNotProg {
    left: 103px;
    top: 246px;
    position: relative;
}
.strQuestBoss {
    position: absolute;
    top: 12px;
    left: 160px;
}

/** クエストの抽選結果表示 */
.lotResultQuest {
    position: absolute;
    top: 40px;
    left: 240px;
    width: 150px;
}
.lotResultDataQuest {
    position: absolute;
    float:left;
    top: 130px;
    left: 15px;
}
.strLotResultDataQuest {
    position: absolute;
    top: 195px;
    left: 200px;
}
.textAreaStageImg {
    width:600px;
    height: 182px;
}
.goldImg {
    width:150px;
    left: 0px;
}
.stageImgArea {
    position : absolute;
    top: 10px;
    left: 5px;
}
.stageMesArea {
    position : absolute;
    top: 65px;
    left: 170px;
}
.levelUp {
    position: absolute;
    text-align:center;
    top: 5px;
}
.textAreaLevelUpImg {
    width:600px;
    height: 125px;
}
.levelUpMesArea {
    position : absolute;
    margin: auto;
    width:640px;
    top: 8px;
}

/** クエストボスバトル */
.btnQuestBossBattle {
    left: 103px;
    top: 70px;
    position: relative;
}
.strQuestBossBattle {
    position: absolute;
    top: 8px;
    left: 150px;
    width:400px;
    font-size:30px;
}

/**
 * 合成関連
 */
/** 強化進化選択 */
.selectSynthKind {
    top: -30px;
    height: 30px;
    position: relative;
}


/*　タブ　*/
.tabs input[type=radio] {
    position: absolute;
    top: -9999px;
    left: -9999px;
}

.tabs {
    max-width: 650px;
    height: 400px;
    float: none;
    list-style: none;
    position: relative;
    padding: 0;
    margin: 75px auto;
}

.tabs li { 
    text-align:center;
    float: left; 
    width:320px;    
    height:30px;
}

.tabs label.labelOff {
    display: block;
    padding: 10px 20px;
    border-radius: 2px 2px 0 0;
    color: #ffffff;
    font-weight: normal;
    font-family: ‘Lily Script One’, helveti;
    background: rgba(255,255,255,0.2);
    cursor: pointer;
    position: relative;
    top: 3px;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.tabs label:hover {
    background: rgba(255,255,255,0.5);
    top: 0;
}

.tabs label.labelOn {
    display: block;
    padding: 10px 20px;
    border-radius: 2px 2px 0 0;
    color: #ffffff;
    font-weight: normal;
    font-family: ‘Lily Script One’, helveti;
    background: rgba(255, 79, 25, 1);
    cursor: pointer;
    position: relative;
    top: 3px;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}
[id^=tab]:checked ~ [id^=tab-content] {
display: block;
}

.tab-content {
    z-index: 2;
    display: none;
    text-align: left;
    width: 100%;
    height: 300px;
    overflow-y: auto;
    line-height: 140%;
    padding-top: 10px;
    background: #08C;
    padding: 15px;
    color: white;
    position: absolute;
    top: 53px;
    left: 0;
    box-sizing: border-box;
    -webkit-animation-duration: 0.5s;
    -o-animation-duration: 0.5s;
    -moz-animation-duration: 0.5s;
    animation-duration: 0.5s;
}


/** 合成確認 */
.synthConfMsg {
    clear:both;
    text-align:center;
    top:30px;
    height: 100px;
    position: relative;
}

/** デッキ */
.strNoSetting {
    position:relative;
    left:50px;
    top:20px;
    height:50px;
    color:#FFA500
}
.btnSelectCardInUserDeckLeft {
    top: 15px;
    left: 185px;
    height:90px;
    float:left;
    position: relative;
}
.btnSelectCardInUserDeckRight {
    top: 15px;
    left: 240px;
    height:90px;
    width: 100px;
    position: relative;
}
.strSelectCardInUserDeck {
    position: relative;
    top: -40px;
    left: 41px;
    font-size: 30px;
    color:#fff;
}
.costOver {
    position: relative;
    text-align:center;
    top: 15px;
    height:35px;
    color:#FF1493;
}

/** トップページ */


/** マイページ */
.mypage {
    position: relative;
    width:640px;
}
.mypageEvent {
    text-align:center;
    top:12px;
    height:230px;
}
.mypageInvite {
    text-align:center;
    top:12px;
    height:120px;
}

/** マイページデッキ */
.deckCard1 {
    position: relative;
    float:left;
    top: 10px;
    left: 0px;
}
.deckCard2 {
    position: relative;
    float:left;
    top: 10px;
    left: 0px;
}
.deckCard3 {
    position: relative;
    float:left;
    top: 10px;
    left: 0px;
}
.deckCard4 {
    position: relative;
    float:left;
    top: 10px;
    left: 0px;
}
.deckCard5 {
    position: relative;
    top: 10px;
    left: 0px;
}

/** マイページステータス */
.status {
    position: relative;
    top: 20px;
    left: 0px;
    height:304px;
    color:#FFA500
}
.myLevel {
    position: absolute;
    top: 80px;
    left: 20px;
}
.myAct {
    top: 115px;
    left: 20px;
    position: absolute;
}
.myActInt {
    top: 118px;
    left: 380px;
    position: absolute;
}
.progMyAct {
    position: absolute;
    top: 120px;
    left: 110px;
    background: url(" . $url . "/img/progress_base.png) top repeat-x;
    border : 1px solid #d3d3d3;
    line-height: 0;
    height: 20px;
    width: 240px;
}
.cardCnt {
    top: 152px;
    left: 20px;
    position: absolute;
}
.myMoney {
    top: 186px;
    left: 20px;
    position: absolute;
}
.myBp {
    top: 220px;
    left: 20px;
    position: absolute;
}
.emojiComment {
    top: 254px;
    left: 20px;
    color:#fff;
    position: absolute;
}

/** プレゼント受取 */
.present {
    position:relative;
    width:640px;
}
.presentBlock {
    position:relative;
    width:640px;
    height:195px;
}
.presentImg {
    left:15px;
    top:0px;
    text-align:left;
    position: relative;
}
.presentName {
    left: 180px;
    top:2px;
    position: absolute;
}
.presentMes {
    left: 180px;
    top:40px;
    position: absolute;
}
.presentDate {
    left: 180px;
    top:106px;
    position: absolute;
}
.presentGet {
    left: 180px;
    top:145px;
    position: absolute;
}
.strPresentGet {
    left: 86px;
    top:10px;
    position: absolute;
}
.btnSelectPresent {
    top: 10px;
    left: 185px;
    height:90px;
    position: relative;
}
.strSelectPresent {
    position: relative;
    top: -45px;
    left: 80px;
}

/** イベントプレゼント */
.evPresentImg {
    left:25px;
    top:0px;
    position: absolute;
}
.evListBlock {
    position:relative;
    height:150px;
    top:0px;
}
.evPresentBlock {
    position:relative;
    top:-50px;
    width:640px;
    height:220px;
}


/** ガチャ */
.btnGacha {
    position: relative;
    top: 50px;
    left: 180px;
    height: 140px;
}
.strGacha {

    position: absolute;
    top: 12px;
    left: 80px;
}

/** チュートリアル */
.strTutoNext {
    position: absolute;
    top: 12px;
    left: 105px;
}
.strMisstionStart {
    position: absolute;
    top: 20px;
    left: 125px;
}
.tutoStartItemStr {
    text-align: center;
    color:#FF0000;
}
.tutoStartItemTextArea {
    position: relative;
    text-align: center;
    top: 10px;
    height: 225px;
}
.tutoStartItemTextStr {
    position: absolute;
    text-align: center;
    top: 10px;
    left: 80px;
}
.attrList {
    position: relative;
    height:60px;
}
.strAttrAi {
    position: absolute;
    width: 133px;
    left:74px;
    border-style: solid ; 
    border-width: 1px;
    padding: 10px 10px 10px 10px;
    text-align:center;
    background-color: #EE82EE;
}
.strAttrMai {
    position: absolute;
    width: 133px;
    left:242px;
    border-style: solid ; 
    border-width: 1px;
    padding: 10px 10px 10px 10px;
    text-align:center;
    background-color: #008000;
}
.strAttrMi {
    position: absolute;
    width: 133px;
    left:408px;
    border-style: solid ; 
    border-width: 1px;
    padding: 10px 10px 10px 10px;
    text-align:center;
    background-color: #8A2BE2;
}


/** ガイド */
.guide {
    position: relative;
    top: 10px;
    left: 1px;
}
.guideL {
    position: relative;
    top: 10px;
    left: 1px;
    height: 340px;
}
.guideXL {
    position: relative;
    top: 10px;
    left: 1px;
    height: 415px;
}
.guideImg {
    left:5px;
    top:3px;
    position: relative;
}
.guideFukidashi {
    position: relative;
    top: -152px;
    left: 180px;
    right: 20px;
    bottom: 10px;
    height: 60px;
    width: 420px;
}
.stageFukidashi {
    position: absolute;
    top: 12px;
    left: 180px;
    right: 20px;
    bottom: 10px;
    height: 100px;
    width: 420px;
}
.guideFukiLeft {
    position: absolute;
    left: 0px;
    top:60px;
}
.guideFukiUpper {
    position: absolute;
    left:18px;
    top:-10px;
}
.guideFukiUpperEnd {
    position: absolute;
    left:18px;
    top:-8px;
}
.guideFukiUpperEndIos {
    position: absolute;
    left:18px;
    top:-7px;
}
.guideFukiUnder {
    position: absolute;
    left:18px;
    top:127px;
}
.guideFukiUnderL {
    position: absolute;
    left:18px;
    top:152px;
}
.guideFukiUnderXL {
    position: absolute;
    left:18px;
    top:185px;
}
.guideFukiUnder3XL {
    position: absolute;
    left:18px;
    top:249px;
}
.guideFukiUnder4XL {
    position: absolute;
    left:18px;
    top:415px;
}
.guideFukiUnder4XLIos {
    position: absolute;
    left:18px;
    top:410px;
}
.guideFukiText {
    position: absolute;
    color: #000000;
    line-height: 1.3em;
    left: 30px;
    top: 8px;
}
.guideFukiTextEnd {
    position: absolute;
    color: #000000;
    line-height: 1.3em;
    left: 30px;
    width:400px;
    top: 10px;
}
.guideFukiMiddle {
    position: absolute;
    top: -9px;
    left: 18px;
}
.guideFukiMiddleEnd {
    position: absolute;
    top: -7px;
    left: 18px;
}


/** 敵  */
.enemy {
    position: relative;
    top: 20px;
    left: 1px;
    height: 120px;
}
.enemyFukidashi {
    position: relative;
    top: 0px;
    left: 10px;
    right: 20px;
    bottom: 10px;
    height: 60px;
    width: 600px;
}
.enemyFukiUpAndroid {
    position: absolute;
    left: 260px;
    top:-25px;
}
.enemyFukiUp {
    position: absolute;
    left: 260px;
    top:-27px;
}
.enemyFukiUpper {
    position: absolute;
    left:18px;
    top:-5px;
}
.enemyFukiUnder {
    position: absolute;
    left:18px;
    top:90px;
}
.enemyFukiUnderL {
    position: absolute;
    left:18px;
    top:154px;
}
.enemyFukiUnderXL {
    position: absolute;
    left:18px;
    top:190px;
}
.enemyFukiUnder3XL {
    position: absolute;
    left:18px;
    top:190px;
}
.enemyFukiText {
    position: absolute;
    color: #000000;
    line-height: 1.3em;
    left: 30px;
    top: 10px;
}
.enemyFukiMiddle {
    position: absolute;
    left: 18px;
}

/** トップページ */
.topImg {
    position:relative;
    width:640px;
    height:650px;
}
.topInfoList {
    position: relative;
    left: 30px;
    width: 600px;
}

/** カード詳細 */
.cardDetail {
    height:1780px;
}
.cardDetailName {
    position: relative;
    top: 10px;
    left: 1px;
}
.strCardDetailName {
    position: absolute;
    top: 25px;
    left: 50%;
    margin: 0 0 0 -140px;
    width:400px;
}
.cardTextArea {
    position: relative;
    top: 110px;
    height: 190px;
}
.cardTalkArea {
    position: relative;
    top: 15px;
    height: 180px;
    color: #000000;
}
.cardText {
    position: absolute;
    top: 18px;
    left: 20px;
    right: 20px;
    bottom: 10px;
    height: 160px;
    line-height: 1.5em;
}
.cardGachaText {
    position: absolute;
    top: 18px;
    left: 15px;
    right: 20px;
    bottom: 10px;
    float:left;
    height: 160px;
    line-height: 1.5em;
}
.cardArea {
    position: relative;
    top: 5px;
    bottom: 10px;
    height: 840px;
}
.cardTextArea {
    position: relative;
    top: 10px;
    height: 365px;
}


/** その他共通 */
.commonDisplay {
    position:relative;
    width:640px;
}
.commonDisplayH {
    position:relative;
    height:980px;
    width:640px;
}
.commonDisplayFree {
    position:relative;
    width:640px;
}
.parent {
    text-align: center;
    position: relative;
}
.commonBord {
    text-align: center;
    position: relative;
    left:1px;
    color:#000;
}
.strCommonBord {
    position: absolute;
    top: 15%;
    left:10px;
    margin : auto;
    width: 640px;
}
.strCommonBordIos {
    position: absolute;
    top: 5%;
    left:10px;
    margin : auto;
    width: 640px;
}
.allCheckL {
    text-align: center;
    position: relative;
}
.allCheckR {
    text-align: center;
    position: relative;
    left:150px;
    top:-60px;
}
.child {
    position: absolute;
    top: 21%;
    margin : auto;
    width: 640px;
}
.childIos {
    position: absolute;
    top: 7%;
    margin : auto;
    width: 640px;
}
.space {
    height: 30px;
}
.spaceLow {
    height: 10px;
}
.spaceHigh {
    height: 80px;
}
.subjectImg {
    width: 640px; 
    height: 64px; 
}

.subTitle {
    position: relative;
    width: 640px;
    height:105px;
    text-align:center;
}
.subLineUpper {
    position: absolute;
    top: 0;
    left: 1px;
}
.subLineStr {
    position: absolute;
    margin: auto;
    top: 34%;
    width: 640px;
    font-size:26px;
}
.subLineUnder {
    position: absolute;
    bottom: 0; 
    left: 1px;
}
.textareaGd {
    height:42px;
    width:640px;
}

.titleLine {
    width:635px;
}
.btnCommonRight {
    position:relative; 
    left:390px;
}
.commonName {
    position:relative; 
    top:40px; 

    left:80px;
    height: 35px;
}
.strCcommonName {
    position:absolute; 
    top:4px; 
    left:42px;
}
.strCommonButton {
    position:absolute; 
    top:15px; 
    left:160px;
}
.view {
    position: relative;
    top:10px;
    left:5px;
    float:left;
    color:#fff;
    line-height: 1.5em;
}
.strSozai {
    position:absolute;
    left:130px;
    top:30px;
    width:450px;
}
.ckbox {
    width:30px;
    height:30px;
    left:5px;
}
.center {
    position:relative;
    text-align:center;
    height:30px;
    top:8px;
}

input[type=checkbox] {
  -webkit-transform-origin: right bottom;
  -webkit-transform: scale( 1 , 1 );
}


/** ヘルプページ */
.help {
    position:relative;
    width:640px;
    height:1600px;
}
.cardh {
    border-style: solid ; 
    border-width: 1px;
    padding: 10px 10px 10px 10px;
    background-color: #7B68EE;
}
.param {
    border-style: solid ; 
    border-width: 1px;
    padding: 10px 10px 10px 10px;
    background-color: #7B68EE;
}
.synth {
    border-style: solid ; 
    border-width: 1px;
    padding: 10px 10px 10px 10px;
    background-color: #7B68EE;
}
.shop {
    border-style: solid ; 
    border-width: 1px;
    padding: 10px 10px 10px 10px;
    background-color: #7B68EE;
}
.gacha {
    border-style: solid ; 
    border-width: 1px;
    padding: 10px 10px 10px 10px;
    background-color: #7B68EE;
}

.btn_play{
    position: absolute;
    top: 450px;
    left: 400px;
}

/** レイドボス */
.btnRaidQuestProg {
    left: 103px;
    top: 20px;
    height: 200px;
    position: relative;
}
.btnRaidQuestProgBoss {
    left: 103px;
    top: 140px;
    height: 130px;
    position: relative;
}
.btnRaidList {
    left: 103px;
    top: -50px;
    height: 130px;
    position: relative;
}
.strRaidList {
    position: absolute;
    top: 12px;
    left: 150px;
}
.raidBtList {
    position: relative;
}
.raidBtAgain {
    top:0px;
    position: relative;
    text-align: center;
}
.btnAtk {
    text-align: center;
    height:160px;
    position: relative;
}
.btnAtk2 {
    position: absolute;
}
.strAtk2 {
    position: absolute;
    top:155px;
    left:105px;
}
.btnAtk6 {
    left:320px;
    position: absolute;
}
.strAtk6 {
    position: absolute;
    top:155px;
    left:425px;
}
.helpBlock {
    position:relative;
    width:640px;
    height:160px;
    color:#FFA500
}
.helpImg {
    left:18px;
    top:0px;
    position: relative;
}
.mainBp {
    position: absolute;
    top:35px;
    left: 240px;
}
.childTop {
    position: absolute;
    top: 2%;
    left: 1%;
    margin : auto;
    text-align:left;
    width: 635px;
}
.raidText {
    text-align: center;
    line-height: 1.5em;
    position: relative;
}
.progRaidQuest {
    position: relative;
    margin: 0 auto;
    top: 20px;
    left:-40px;
    height:80px;
    line-height: 0;
    width: 520px;
}
.raidPList {
    text-align: center;
    position: relative;
}
.raidPresentMes {
    left: 180px;
    top:40px;
    text-align:left;
    line-height: 1.2em;
    position: absolute;
}
.raidPresentMesSp {
    left: 180px;
    top:108px;
    text-align:left;
    position: absolute;
}
.raidStage {
    position:relative;
    width:640px;
    height:5400px;
}
.raidBanner {
    position:relative;
    text-align:center;
    height:170px;
}
.raidHelpWord {
    text-align: center;
    top:-240px;
    position: relative;
}
.raidBpLess {
    text-align: center;
    position: relative;
}
.raidEnemyHp {
    position: absolute;
    top: 87%;
    left:2%;
    text-align:left;
    width: 640px;
    font-size:32px;
}
.raidTime {
    position:absolute;
    top:15px;
    left:460px;
}
.helpSelfMes {
    left: 180px;
    top:40px;
    position: absolute;
}
.helpSelfDamage {
    left: 180px;
    top:72px;
    position: absolute;
}
.helpSelfDate {
    left: 180px;
    top:104px;
    position: absolute;
}

/** 図鑑 */
.collectHead {
    position: relative;
    text-align:right;
    height:40px;
    text-decoration:none;
    font-size:28px;
}

";
?>
