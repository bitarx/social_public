    <div class="line">
        <img src="<{$smarty.const.IMG_URL}>line.png">
        <div class="paging">
            <{if $page <= 1}> 
               <div class="btnPagingPrev">
                 <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_off.png" class="btnPagingImg">
                 <div class="strPagingPrev">
                   前へ 
                 </div>
            <{else}>
               <div class="btnPagingPrev">
                   <{if $ctl == 'UserCards'}>
                       <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" class="btnPagingImg">
                   <{else}>
                       <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" class="btnPagingImg">
                   <{/if}>
                   <div class="strPagingPrev">
                       <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$prev}><{if isset($addParam)}><{$addParam}><{/if}>">前へ</a>
                   </div>
             <{/if}> 
             </div>
             <div class="strPaging">
                 <{$page}>  /  <{$pageAll}>
             </div> 
            <{if $pageAll <= $page}> 
               <div class="btnPagingNext">
                 <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_off.png" class="btnPagingImg">
                 <div class="strPagingNext">
                    次へ
                 </div>
            <{else}>
               <div class="btnPagingNext">
                   <{if $ctl == 'UserCards'}>
                       <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" class="btnPagingImg">
                   <{else}>
                       <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" class="btnPagingImg">
                   <{/if}>
                   <div class="strPagingNext">
                       <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$next}><{if isset($addParam)}><{$addParam}><{/if}>">次へ</a>
                   </div>
             <{/if}> 
           </div>
        </div>
    </div>
    <div class="line">
        <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>
