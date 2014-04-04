<div class="userBaseCards index">
    <{include file="../Elements/title.tpl"}>
    <{foreach from=$list item=data}>
        <div class="cardListImg">
           <img src="<{$smarty.const.FILEOUT_URL}>?size=m&dir=card&target=<{$data.card_id}>" width="160px">
        </div>
        <div class="cardList">
            <div class="cardListName">
                <{$data.card_title}><{$data.card_name}> 
            </div>
            <div class="cardListAtk">
                攻撃:<{$data.atk}>
            </div>
            <div class="cardListDef">
                防御:<{$data.def}>
            </div>
            <div class="cardListExp">
                経験値:
            </div>
            <div class="cardListExpInt">
                <{$data.exp}> / 100
            </div>
        </div>
        <div style="clear:both;">
            <img src="<{$smarty.const.IMG_URL}>line.png"> 
        </div>
    <{/foreach}>
</div>
