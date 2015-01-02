<div class="commonDisplay">
    <{include file="../Elements/title.tpl"}>

    <{if !empty($plus)}>
        <div class="space"></div>
            <div style="text-align:center">
                <span style="color:#00FF00">おまけは受取ボックスへ振込みました。</span>
            </div>
        <div class="space"></div>
    <{/if}>

    <{if !empty($hasMaxFlg)}>
        <div class="space"></div>
            <div style="text-align:center">
                <span style="color:#FFA500">カードは受取ボックスへ振込みました。</span>
            </div>
        <div class="space"></div>
    <{/if}>

    <{foreach from=$list item=data key=key}>
      <div class="listBlock">
        <{include file="../Elements/card_get.tpl"}>
      </div>
      <div style="position:relative; top:12px;">
        <{include file="../Elements/line.tpl"}>
      </div>
    <{/foreach}>

            <div class="btnGacha">
                <a href="<{$smarty.const.BASE_URL}>Gachas/index">
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_m.png" alt="ガチャ一覧へ" name="submit">
                <div class="strGacha">
                    ガチャ選択
                </div>
                </a>
            </div>
            <br />
    
</div>
