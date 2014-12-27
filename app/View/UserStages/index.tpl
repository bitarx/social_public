<div class="commonDisplay">
    <{include file="../Elements/title.tpl"}>

    <div class="selectSynthKind">
      <ul class="tabs">
        <li>
            <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?kind=1">
            <{if 1 == $kind}> 
                <label class="labelOn">本編</label>
            <{else}> 
                <label class="labelOff">本編</label>
            <{/if}> 
            </a>
        </li>
        <li>
            <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?kind=2">
            <{if 2 == $kind}> 
                <label class="labelOn">イベント</div>
            <{else}> 
                <label class="labelOff">イベント</label>
            <{/if}> 
            </a>
        </li> 
      </ul>
    </div> 
    
    <{if !empty($list)}>
        <{include file="../Elements/paging.tpl"}>
    <{/if}>

    <{if !empty($list)}>
        <{include file="../Elements/line.tpl"}>
    <{/if}>

    <{foreach from=$list item=data key=key}>
      <div class="commonName">
          <{$data.stage_title}>
      </div>
      <div class="btnCommonRight">
          <a href="<{$smarty.const.BASE_URL}><{$targetCtl}>/scene/?enemy_id=<{$data.enemy_id}>&<{$smarty.const.KEY_PAGING}>=<{$page}>">
              <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_s.png">
              <div class="strCcommonName">
                  鑑賞
              </div>
          </a>
      </div>
        <{include file="../Elements/line.tpl"}>
    <{foreachelse}>
      <div style="text-align:center;top:10px;">
          鑑賞できるシーンはありません
      </div>
      <div class="spaceHigh"></div>
    <{/foreach}>

    <{if !empty($list)}>
        <{include file="../Elements/paging.tpl"}>
    <{/if}>
    
    <div class="spaceHigh">
    </div>
</div>
