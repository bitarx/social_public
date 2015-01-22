<div id="div_menu">
    <div class="menu_base">
        <img src="<{$smarty.const.BASE_URL}>img/menu_base.png"> 
    </div>
    <div class="menu_head">
        <div class="head_child">
            <img src="<{$smarty.const.BASE_URL}>img/menu_head.png"> 
        </div>
        <div class="menu_close">
            <img src="<{$smarty.const.BASE_URL}>img/clear.png"> 
        </div>
        <div class="icon_top">
            <a href="<{$linkSnsUser}> "><img src="<{$smarty.const.BASE_URL}>img/icon_top.png" ></a> 
        </div>
        <div class="icon_mypage">
            <a href="<{$linkUser}> "><img src="<{$smarty.const.BASE_URL}>img/icon_mypage.png" ></a>
        </div>
        <div class="icon_quest">
            <a href="<{$linkQuest}> "><img src="<{$smarty.const.BASE_URL}>img/icon_quest.png" ></a>
        </div>

        <div class="icon_synth">
            <a href="<{$linkUserCard}> "><img src="<{$smarty.const.BASE_URL}>img/icon_synth.png" ></a> 
        </div>
        <div class="icon_deck">
            <a href="<{$linkDeck}> "><img src="<{$smarty.const.BASE_URL}>img/icon_deck.png" ></a>
        </div>
        <div class="icon_gacha">
            <a href="<{$linkGacha}> "><img src="<{$smarty.const.BASE_URL}>img/icon_gacha.png" ></a>
        </div>

        <div class="icon_pbox">
            <a href="<{$linkPbox}> "><img src="<{$smarty.const.BASE_URL}>img/icon_pbox.png" ></a> 
        </div>
        <div class="icon_item">
            <a href="<{$linkUserItem}> "><img src="<{$smarty.const.BASE_URL}>img/icon_item.png" ></a>
        </div>
        <div class="icon_shop">
            <a href="<{$linkItem}> "><img src="<{$smarty.const.BASE_URL}>img/icon_shop.png" ></a>
        </div>

        <div class="icon_scene">
            <a href="<{$linkScene}> "><img src="<{$smarty.const.BASE_URL}>img/icon_scene.png" ></a>
        </div>
        <div class="icon_help">
            <a href="<{$linkStaticPage}> "><img src="<{$smarty.const.BASE_URL}>img/icon_help.png" ></a>
        </div>
        <div class="icon_card_list">
            <a href="<{$linkCollect}> "><img src="<{$smarty.const.BASE_URL}>img/icon_collect.png" ></a> 
        </div>

        <div class="icon_raid">
            <a href="<{$linkRaid}> "><img src="<{$smarty.const.BASE_URL}>img/icon_raid.png" ></a>
        </div>
        <div class="icon_card">
            <a href="<{$linkStaticPage}> "><img src="<{$smarty.const.BASE_URL}>img/icon_help.png" ></a>
        </div>

            <div class="bn_menu">
                <{if !empty($event)}>
                    <{include file="../Elements/event.tpl"}>
                <{/if}>
                <{include file="../Elements/friend_invite.tpl"}>
            </div>
    </div>
</div>
