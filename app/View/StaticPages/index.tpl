<div class="commonDisplay">
    <{include file="../Elements/title.tpl"}>

    <div class="guide">

        <div class="guideImg">
           <img src="<{$smarty.const.IMG_URL}>guide/guide_<{$guideId}>.png" width="160px">
        </div>
        <div class="guideFukidashi">
            <div class="guideFukiMiddle">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_middle.png" width="420px" height="145px">
            </div>
            <div class="guideFukiLeft">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_left_side.png" width="20px">
            </div>
            <div class="guideFukiUpper">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_upper.png" width="420px">
            </div>
            <div class="guideFukiUnder">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_under.png" width="420px">
            </div>
            <div class="guideFukiText">
               わからない項目をタップすると<br />詳しい説明が見られます
            </div>
        </div>
    </div>

    <h4 class="cardh">カード</h4>
    <div class="cardh_sub">
        ▼<span style="color:#00FF7F">レアリティ</span><br />
        レアリティが高いほど希少価値が高くなります。<br />
        <span style="color:#FFA500">N→HN→R→HR→SR→SR</span>の５種類となります。
        レアリティが高くなるほど脱衣していき、Hなカードとなります。<br /><br />
        ▼<span style="color:#00FF7F">Lv</span><br />
        美女の成長を表す値です。<span style="color:#FFA500">Lvの最大値は20</span>です。<br /><br />
        ▼<span style="color:#00FF7F">スキルLv</span><br />
        美女のスキル熟練度を表す値です。バトル時のスキル発動率に影響します。<span style="color:#FFA500">スキルLvの最大値は30</span>です。<br /><br />
    </div>
    <div style="height:15px;"></div>
    <h4 class="param">パラメータ</h4>
    <div class="param_sub">
        ▼<span style="color:#00FF7F">Lv</span><br />
        鎮激ミッションで一定の経験値をためるとLvが上昇します。<br />
        Lvがアップすると<span style="color:#FFA500">最大行動力</span>と<span style="color:#FFA500">デッキコスト</span>が上昇します。<br />
        またLvアップ時には、<span style="color:#FFA500">行動力</span>が全回復します。<br /><br />
        ▼<span style="color:#00FF7F">経験値</span><br />
        鎮激ミッションなどを行うと経験値を獲得します。<br />
        Lvが一定値を超えると同じステージでも<span style="color:#FFA500">獲得値が減少、もしくは獲得出来なくなります</span>。<br /><br />
        ▼<span style="color:#00FF7F">行動力</span><br />
        鎮激ミッションを行うと減少します。<br />
        行動力は<span style="color:#FFA500">３分</span>で<span style="color:#FFA500">約1%回復</span>します。<br />
        アイテムで回復させることもできます。<br /><br />

        ▼<span style="color:#00FF7F">バトルポイント（BP）</span><br />
        レイドボスで敵と戦と減少します。<br />
        BPは<span style="color:#FFA500">３分</span>で<span style="color:#FFA500">約1%回復</span>します。<br />
        アイテムで回復させることもできます。<br /><br />

        ▼<span style="color:#00FF7F">ペニー</span><br />
        鎮激ミッションなどで取得できる通貨です。<br />
        <span style="color:#FFA500">強化or進化</span>を行う時や<span style="color:#FFA500">ペニーガチャ</span>を回す時に使用します。<br /><br />
    </div>
    <div style="height:15px;"></div>
    <h4 class="synth">強化進化</h4>
    <div class="synth_sub">
        ▼<span style="color:#00FF7F">強化</span><br />
        ベースの美女カードに他の美女カードを合わせることで強化（Lvアップ）ができます。ベースと素材が同じ属性であるとカード獲得経験値が多くなります。<span style="color:#FFA500">強化の素材として使用した美女カードはなくなります</span>。<br /><br />

        ▼<span style="color:#00FF7F">強化素材</span><br />
        美女ではない動物のカードは強化素材になります。<br />
        強化素材として美女カードと合わせると<span style="color:#FFA500">Lvが大きくアップします</span>。<br />
        <span style="color:#FFA500">戦うことはできません</span>。<br /><br />

        ▼<span style="color:#00FF7F">進化</span><br />
        Lv最大(Max)に到達した美女カードに同種（同じ名前）の美女カードを合わせることで進化します。<br />
        進化することで美女は脱衣しますが、進化した地点で必ずしも強くなるとは限りません。<br />
        <span style="color:#FFA500">進化の素材として使用したカードはなくなります</span>。<br /><br />

        ▼<span style="color:#00FF7F">進化素材</span><br />
        美女ではない動物のカードでオールマイティのカードが存在します。<br />
        進化素材としてレベルMaxの美女カードと合わせると<span style="color:#FFA500">どの美女カードと合せても進化します</span>。<br />
        <span style="color:#FFA500">戦うことはできません</span>。<br /><br />

        ▼<span style="color:#00FF7F">スキルLvのアップ</span><br />
        <span style="color:#FFA500">同じ属性</span>の美女カード同士で強化を行うとアップします。<br />
        スキルLvは<span style="color:#FFA500">最大30</span>です。<br /><br />

        ▼<span style="color:#00FF7F"><{$smarty.const.MONEY_NAME}></span><br />
        鎮激ミッションなどで取得できる通貨です。<br />
        <span style="color:#FFA500">強化or進化</span>を行う時や<span style="color:#FFA500"><{$smarty.const.MONEY_NAME}>ガチャ</span>を行う時に使用します。<br /><br />
    </div>
    <div style="height:15px;"></div>
    <h4 class="shop">ショップ</h4>
    <div class="shop_sub">
        ▼<span style="color:#00FF7F"><{$smarty.const.POINT_NAME}></span><br />
        <span style="color:#FFA500"><{$smarty.const.POINT_NAME}></span>を使ってアイテムを購入することが出来ます。<br /><br />
    </div>
    <div style="height:15px;"></div>
    <h4 class="gacha">ガチャ</h4>
    <div class="gacha_sub">
        ▼<span style="color:#00FF7F">プレミアムガチャ</span><br />
        <span style="color:#FFA500"><{$smarty.const.POINT_NAME}></span>を使ってガチャを行えます。レアリティがR以上のものが獲得できます。<span style="color:#FFA500">ガチャチケット</span>を使うと<{$smarty.const.POINT_NAME}>を使わずに行うことが出来ます。<br /><br />
        ▼<span style="color:#00FF7F">プレミアム10連ガチャ</span><br />
        <span style="color:#FFA500"><{$smarty.const.POINT_NAME}></span>を使ってガチャを行えます。プレミアムガチャ10回分に相当します。<br /><br />

        ▼<span style="color:#00FF7F"><{$smarty.const.MONEY_NAME}>ガチャ</span><br />
        <span style="color:#FFA500"><{$smarty.const.MONEY_NAME}></span>を使ってガチャを行えます。<br /><br />

        ▼<span style="color:#00FF7F">強化素材ガチャ</span><br />
        <span style="color:#FFA500"><{$smarty.const.POINT_NAME}></span>を使ってガチャを行えます。強化素材カードが入手できます。<br /><br />
    </div>
    <div class="space"></div>
</div>
<script><!--
$(".param_sub").hide();
$(".cardh_sub").hide();
$(".synth_sub").hide();
$(".shop_sub").hide();
$(".gacha_sub").hide();
$(document).ready(function(){
  $('.cardh').click(function(){
    $(".cardh_sub").slideToggle('fast');
  });
  $('.param').click(function(){
    $(".param_sub").slideToggle('fast');
  });
  $('.synth').click(function(){
    $(".synth_sub").slideToggle('fast');
  });
  $('.shop').click(function(){
    $(".shop_sub").slideToggle('fast');
  });
  $('.gacha').click(function(){
    $(".gacha_sub").slideToggle('fast');
  });
});
//-->
</script>
