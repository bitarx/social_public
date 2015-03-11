<div class="stages">
    <{include file="../Elements/title.tpl"}>

    <div class="raidText">
       <img src="<{$smarty.const.IMG_URL}>textarea_to.png" height="190px">
       <div class="childTop">
           <div style="text-align:center">
               <span style="color:#00FF00;"><イベント報酬></span><br />
           </div>
           ■上位１０％&nbsp;<span style="color:#FFA500;">[進化素材]ビビ × 5</span><br />
           ■上位５０％&nbsp;<span style="color:#FFA500;">[進化素材]ビビ × 2</span><br />
           ■上位９０％&nbsp;<span style="color:#FFA500;">[進化素材]ビビ  × 1</span><br />
           ※報酬は各期間終了後受取BOXに送られます
       </div>
    </div>

    <div style="text-align:center">
        ※ランキングは１時間に１回の更新となります
    </div>

    <div class="spaceLow"></div>
    <{if !empty($topPercent)}>
        <div style="text-align:center;font-size:32px;">
            <span style="color:#EE82EE"><{$termName}></span> : <span style="color:#00FF00;"><{$snsName}></span>は上位<span style="color:#FFA500;"><{$topPercent}>％</span>
        </div>
    <{/if}>

    <div class="selectSynthKind">
      <ul class="tabs">
        <li>
            <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?kind=1">
            <{if 1 == $kind}>
                <label class="labelOn">前半</label>
            <{else}>
                <label class="labelOff">前半</label>
            <{/if}>
            </a>
        </li>
        <li>
            <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?kind=2">
            <{if 2 == $kind}>
                <label class="labelOn">後半</div>
            <{else}>
                <label class="labelOff">後半</label>
            <{/if}>
            </a>
        </li>
      </ul>
    </div>

    <div class="raidBtList">
        <{if !empty($list)}>
            <div class="space"></div>
            <{foreach from=$list item=data}>
                <{include file="../Elements/rank.tpl"}>
                <div class="spaceHigh"></div>
            <{/foreach}>
        <{else}>
            <div class="spaceHigh"></div>
            <{include file="../Elements/guide.tpl"}>   
        <{/if}>
        <div class="space"></div>
        <div class="parent">
            <a href="<{$linkRaid}>">
            <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
            <div class="child">
                レイドボスへ
            </div>
            </a>
        </div>
        <div class="spaceHigh"></div>
    </div>
</div>
