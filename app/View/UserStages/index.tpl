<div class="commonDisplay">
    <{include file="../Elements/title.tpl"}>

    
    <{include file="../Elements/paging.tpl"}>

    <{if !empty($list)}>
        <{include file="../Elements/line.tpl"}>
    <{/if}>

    <{foreach from=$list item=data key=key}>
      <div class="commonName">
          <{$data.stage_title}>
      </div>
      <div class="btnCommonRight">
          <a href="<{$smarty.const.BASE_URL}>Stages/scene/?enemy_id=<{$data.enemy_id}>&<{$smarty.const.KEY_PAGING}>=<{$page}>">
              <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_s.png">
              <div class="strCcommonName">
                  鑑賞
              </div>
          </a>
      </div>
        <{include file="../Elements/line.tpl"}>
    <{foreachelse}>
      <div class="commonName">
          鑑賞できるシーンはありません
      </div>
    <{/foreach}>
    <{include file="../Elements/paging.tpl"}>
    
    <div class="spaceHigh">
    </div>
</div>
