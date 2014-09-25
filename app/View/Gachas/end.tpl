<div>
    <{include file="../Elements/title.tpl"}>

    <{foreach from=$list item=data key=key}>
      <div class="listBlock">
        <{include file="../Elements/card.tpl"}>
      </div>
      <div style="position:relative; top:12px;">
        <{include file="../Elements/line.tpl"}>
      </div>
    <{/foreach}>

            <div class="btnGacha">
                <a href="<{$smarty.const.BASE_URL}>Gachas/index">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png" alt="強化>確認" name="submit">
                <div class="strGacha">
                    ガチャ選択
                </div>
                </a>
            </div>
            <br />
    
</div>
