    <{include file="../Elements/sub_title.tpl"}>

    <div class="cardArea">
        <{if empty($tutoEnd)}>
            <img src="<{$smarty.const.IMG_URL}>tutorial/card_l_31.jpg">
        <{else}>
            <img src="<{$smarty.const.IMG_URL}><{$smarty.const.CARD_L_DIR}>/card_l_<{$data.card_id}>.jpg" width="640px">
        <{/if}>
    </div>

    <div class="cardTalkArea">
        <img src="<{$smarty.const.IMG_URL}>textarea.png" width="640px" height="158px">
        <div class="cardText">
                <{$data['card_words']}>
        </div>
    </div>
    <{if !empty($voice)}>
        <div class="spaceLow"></div>
        <div id="play" src="<{$smarty.const.BASE_URL}>voice/card/card_<{$data.card_id}>.mp3" style="height:50px;">
            <div style="text-align:center;">
                <img src="<{$smarty.const.IMG_URL}>btn_play.png" width="420px">
            </div>
        </div>
    <{/if}>
    <div class="cardTextArea">
        <img src="<{$smarty.const.IMG_URL}>textarea_to.png" height="280px">
        <div class="cardText">
                身長:<{$data.height}>センチ&nbsp;体重:<{$data.weight}>キロ<br />
                <{$data['size']}><br />
                血液型:<{$data.blood}><br />
                <{$data['card_detail']}>
        </div>
    </div>
