<div class="pagingNum">

        <{section name=pageNum start=1 loop=$pageAll+1 step=1}>
        <div class="btnPagingNum">
          <{if $page == $smarty.section.pageNum.index}>
            <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_off.png" height="30px">

            <div class="strPagingNum">
            <{$smarty.section.pageNum.index}>&nbsp;
          <{else}>
            <img src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" height="30px">
            <div class="strPagingNum">
            <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$smarty.section.pageNum.index}>&kind=<{$kind}>&rare_level=<{$rareLevelSelect}>&sort_item=<{$sortItemSelect}>"><{$smarty.section.pageNum.index}></a>&nbsp;
          <{/if}>
          </div>
        </div>
        <{/section}>

</div>
