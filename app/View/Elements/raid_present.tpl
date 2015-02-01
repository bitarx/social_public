<div class="presentBlock">
    <div class="presentImg">
       <{if $smarty.const.KIND_CARD == $data.kind }>
           <img src="<{$smarty.const.IMG_URL}>card/card_s_<{$data.target}>.jpg" width="120px">
       <{elseif $smarty.const.KIND_ITEM == $data.kind }>
           <img src="<{$smarty.const.IMG_URL}>item/item_<{$data.target}>.png" width="120px">
       <{elseif $smarty.const.KIND_GOLD == $data.kind }>
           <img src="<{$smarty.const.IMG_URL}>item/gold.png" width="120px">

       <{/if}>
    </div>
    <div class="presentName">
        <span style="color:#ffffff"><{if $data.target == 88}><span style="color:#FFA500">[万能の進化素材]</span><{/if}><{$data.name}><{if $smarty.const.KIND_MONEY != $data.kind}>×<{$data.num}><{/if}>
    </div>
    <div class="raidPresentMes">
        <{if $data.target == 88}>レベルMaxのカードであればどのカードでも進化させることが出来る<{/if}>
    </div>
    <div class="raidPresentMesSp">
        <{if $data.special_flg == 1}><span style="color:#FFD700">特別報酬</span>:敵レベルが上がるほど獲得率UP<{/if}>
    </div>
</div>
