<div class="quest">
    <div style="left:-41px;">
        <img src="<{$smarty.const.IMG_URL}>quest/start.jpg">
    </div>
    <div class="spaceLow">
    </div>
    <{foreach from=$list item=val}> 
        <div>
            <div class="space">
            </div>
            <div style="font-size:30px;text-align:center;">
                <span style="color:#EE82EE">鎮激<{$val['quest_id']}></span>. <{$val['quest_title']}>
            </div>
                <div class="spaceLow">
                </div>
                 <div class="questText">
                    <input type="image" src="<{$smarty.const.IMG_URL}>textarea.png" class="textAreaStageImg">
                    <div class="strQuestList">
                        <{$val['detail_before1']}> 
                    </div>
                  </div>
                  <div class="parent">
                      <a href="<{$linkStage}>?quest_id=<{$val['quest_id']}> "> 
                          <input type="image" src="<{$smarty.const.IMG_URL}>btn_st_l.png">
                          <div class="child">
                              鎮激ミッション開始
                          </div>
                      </a>
                  </div>
        </div>
        <div class="spaceLow">
        </div>
    <{/foreach}> 
    <div class="space">
    </div>
</div>
