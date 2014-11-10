<div id="navi">
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
        <span style="color:#FFA500">N→HN→R→HR→SR→SR</span>の５種類となります。<br />
        レアリティが高くなるほど脱衣していき、Hなシーンとなります。
    </div>
    <div style="height:15px;"></div>
    <h4 class="param">パラメータ</h4>
    <div class="param_sub">
        ▼<span style="color:#00FF7F">Lv</span><br />
        ミッションで一定の経験値をためるとLvが上昇します。<br />
        Lvがアップすると<span style="color:#FFA500">最大行動力</span>と<span style="color:#FFA500">デッキコスト</span>が上昇します。<br />
        またLvアップ時には、<span style="color:#FFA500">行動力</span>が全回復します。
    </div>
</div>
<script><!--
$(".param_sub").hide();
$(".cardh_sub").hide();
$(document).ready(function(){
  $('.cardh').click(function(){
    $(".cardh_sub").slideToggle('fast');
  });
  $('.param').click(function(){
    $(".param_sub").slideToggle('fast');
  });
});
//-->
</script>
