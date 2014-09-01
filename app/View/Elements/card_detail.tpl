    <div class="cardDetailName">
        <div class="cardDetailNameUpper" >
            <img src="<{$smarty.const.IMG_URL}>line_upper.png">
        </div>
        <div class="strCardDetailName" >
            <{$data['card_title']}>
            <{$data['card_name']}>
        </div>
        <div class="cardDetailNameUnder" >
            <img src="<{$smarty.const.IMG_URL}>line_under.png">
        </div>
    </div>
    <div class="cardArea">
        <{if empty($tutoEnd)}>
            <img src="<{$smarty.const.IMG_URL}>tutorial/card_l_31.jpg">
        <{else}>
        <{/if}>
    </div>
    <div class="cardTextArea">
        <img src="<{$smarty.const.IMG_URL}>textarea_to.png" height="180px">
        <div class="cardText">
                <{$data['card_words']}>
        </div>
    </div>
