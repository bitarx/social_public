    <{include file="../Elements/sub_title.tpl"}>

    <div class="cardArea">
        <{if empty($tutoEnd)}>
            <img src="<{$smarty.const.IMG_URL}>tutorial/card_l_31.jpg">
        <{else}>
            <img src="<{$smarty.const.FILEOUT_URL}>?size=l&dir=card&target=<{$data.card_id}>" width="640px">
        <{/if}>
    </div>
    <div class="cardTalkArea">
        <img src="<{$smarty.const.IMG_URL}>textarea.png" width="640px" height="158px">
        <div class="cardText">
                <{$data['card_words']}>
        </div>
    </div>
    <div class="cardTextArea">
        <img src="<{$smarty.const.IMG_URL}>textarea_to.png" height="280px">
        <div class="cardText">
                身長:<{$data.height}>センチ&nbsp;体重:<{$data.weight}>キロ<br />
                <{$data['size']}><br />
                血液型:<{$data.blood}><br />
                <{$data['card_detail']}>
        </div>
    </div>
