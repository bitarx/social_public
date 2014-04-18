    <div class="line">
        <img src="<{$smarty.const.IMG_URL}>line.png">
        <div class="paging">
            <{if $page <= 1}> 
               <div class="btnPagingPrev">
                 <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_off.png" height="30px" width="50px">
                 <div class="strPagingPrev">
                   前 
            <{else}>
               <div class="btnPagingPrev">
                 <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" height="30px" width="50px">
                 <div class="strPagingPrev">
                   <{if $ctl == 'UserCards'}>
                     <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$prev}>&kind=<{$kind}>&rare_level=<{$rareLevelSelect}>&sort_item=<{$sortItemSelect}><{if isset($addParam)}><{$addParam}><{/if}>">前</a> 

                   <{else}>
                     <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$prev}><{if isset($addParam)}><{$addParam}><{/if}>">前</a> 

                   <{/if}>
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
                 <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" height="30px" width="50px">
                 <div class="strPagingNext">
                   <{if $ctl == 'UserCards'}>
                     <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$next}>&kind=<{$kind}>&rare_level=<{$rareLevelSelect}>&sort_item=<{$sortItemSelect}><{if isset($addParam)}><{$addParam}><{/if}>">次</a>
                   <{else}>
                     <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$next}><{if isset($addParam)}><{$addParam}><{/if}>">次</a>
                   <{/if}>
             <{/if}> 
             </div>
           </div>
        </div>
    </div>
    <div class="line">
        <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>
