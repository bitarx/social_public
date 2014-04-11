    <div class="line">
        <img src="<{$smarty.const.IMG_URL}>line.png">
        <div class="paging">
            <{if $page <= 1}> 
                 prev 
            <{else}>
                 <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$prev}>">prev</a> 
             <{/if}> 
         <{$page}>  /  <{$pageAll}>
            <{if $pageAll <= $page}> 
                next
            <{else}>
                 <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$next}>">next</a>
             <{/if}> 
        </div>
    </div>
    <div class="line">
        <img src="<{$smarty.const.IMG_URL}>line.png">
    </div>
