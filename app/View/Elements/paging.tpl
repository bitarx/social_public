    <div class="line">
        <img src="<{$smarty.const.IMG_URL}>line.png">
        <div class="paging">
            <{if $page <= 1}> 
               <div class="btnPagingPrev">
                 <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_off.png" height="32px" width="55px">
                 <div class="strPagingPrev">
                   前 
            <{else}>
               <div class="btnPagingPrev">
                   <{if $ctl == 'UserCards'}>
                     <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$prev}>&kind=<{$kind}>&rare_level=<{$rareLevelSelect}>&sort_item=<{$sortItemSelect}><{if isset($addParam)}><{$addParam}><{/if}>"><img src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" class="btnPaging"></a> 

                   <{else}>
                     <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$prev}><{if isset($addParam)}><{$addParam}><{/if}>"><img src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" class="btnPaging"></a> 

                   <{/if}>
                 <div class="strPagingPrev">
                   前
             <{/if}> 
               </div>
             </div>
             <div class="strPaging">
                 <{$page}>  /  <{$pageAll}>
             </div> 
            <{if $pageAll <= $page}> 
               <div class="btnPagingNext">
                 <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_off.png" height="30px" width="50px">
                 <div class="strPagingNext">
                    次
            <{else}>
               <div class="btnPagingNext">
                   <{if $ctl == 'UserCards'}>
                     <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$next}>&kind=<{$kind}>&rare_level=<{$rareLevelSelect}>&sort_item=<{$sortItemSelect}><{if isset($addParam)}><{$addParam}><{/if}>"><img src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" class="btnPaging"></a>
                   <{else}>
                     <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$next}><{if isset($addParam)}><{$addParam}><{/if}>"><img src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" class="btnPaging"></a>
                   <{/if}>
                 <div class="strPagingNext">
                   次
             <{/if}> 
             </div>
           </div>
        </div>
    </div>
    <div class="line">
        <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>
