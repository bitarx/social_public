    <{section name=pageNum start=1 loop=$pageAll+1 step=1}>
        <{if $smarty.section.pageNum.index == 1 || $smarty.section.pageNum.index == 6}>
             <div class="pagingNum">
        <{/if}>
          <div class="btnPagingNum">
              <{if $page == $smarty.section.pageNum.index}>
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_ss_off.png" height="30px" width="45px">

                <div class="strPagingNum">
                <{$smarty.section.pageNum.index}>&nbsp;
                </div>
              <{else}>
                <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_ss_on.png" height="30px" width="45px">
                <a href="<{$smarty.const.BASE_URL}><{$ctlAction}>?<{$smarty.const.KEY_PAGING}>=<{$smarty.section.pageNum.index}>&kind=<{$kind}>&rare_level=<{$rareLevelSelect}>&sort_item=<{$sortItemSelect}><{if isset($addParam)}><{$addParam}><{/if}>">
                <div class="strPagingNum">
                <{$smarty.section.pageNum.index}>&nbsp;
                </div>
                </a>
              <{/if}>
          </div>
        <{if $smarty.section.pageNum.index == 5 || $smarty.section.pageNum.index == $pageAll}>
            </div>
        <{/if}>
    <{/section}>

