<div class="pagingNum">
    <div class="paging">
            

        <{section name=pageNum start=1 loop=$pageAll+1 step=1}>
          <{if $page == $smarty.section.pageNum.index}>
            <{$smarty.section.pageNum.index}>
          <{else}>
            <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$smarty.section.pageNum.index}>&kind=<{$kind}>&rare_level=<{$rareLevelSelect}>&sort_item=<{$sortItemSelect}>"><{$smarty.section.pageNum.index}></a>
          <{/if}>
        <{/section}>

    </div>
</div>
