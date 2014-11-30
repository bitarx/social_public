    <div class="line">
        <img src="<{$smarty.const.IMG_URL}>line.png">
        <div class="paging">
            <{if $page <= 1}> 
               <div class="btnPagingPrev">
                 <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_ss_off.png" class="btnPagingImg">
                 <div class="strPagingPrev">
                   前へ 
                 </div>
            <{else}>
               <div class="btnPagingPrev">
                   <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$prev}><{if isset($addParam)}><{$addParam}><{/if}>">
                       <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" class="btnPagingImg">
                       <div class="strPagingPrev">
                           前へ
                       </div>
                   </a>
             <{/if}> 
             </div>
             <div class="strPaging">
                 <{$page}>  /  <{$pageAll}>
             </div> 
            <{if $pageAll <= $page}> 
               <div class="btnPagingNext">
                 <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_ss_off.png" class="btnPagingImg">
                 <div class="strPagingNext">
                    次へ
                 </div>
            <{else}>
               <div class="btnPagingNext">
                   <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$next}><{if isset($addParam)}><{$addParam}><{/if}>">
                       <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" class="btnPagingImg">
                       <div class="strPagingNext">
                           次へ
                       </div>
                   </a>
             <{/if}> 
           </div>
        </div>
    </div>
    <div class="space"></div>
    <div class="line">
        <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>
