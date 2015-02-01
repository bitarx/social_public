<div class="raidStage">
    <div>
        <img src="<{$smarty.const.IMG_URL}>raid_quest/main_<{$list[0]['raid_quest_id']}>.jpg"> 
    </div>
    <div class="guide">
        <div class="guideImg">
           <img src="<{$smarty.const.IMG_URL}>guide/guide_<{$guideId}>.png" width="160px">
        </div>
        <div class="guideFukidashi">
            <div class="guideFukiMiddle">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_middle.png" width="420px" height="155px">
            </div>
            <div class="guideFukiLeft">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_left_side.png" width="20px">
            </div>
            <div class="guideFukiUpper">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_upper.png" width="420px">
            </div>
            <div class="guideFukiUnder">
               <img src="<{$smarty.const.IMG_URL}>fukidashi_under.png" width="420px">
            </div>
            <div class="guideFukiText">
               <{$list[0]['quest_detail']}> 
            </div>
        </div>
    </div>

    <div class="stageList">
    <{foreach from=$list item=val}>
        <a href="<{$smarty.const.BASE_URL}>RaidStages/initStage?stage_id=<{$val['raid_stage_id']}>">
        <{if 3 == $val['state']}>
            <div class="strStageListEnd">
        <{else}>
            <div class="strStageList">
        <{/if}>

            <{$val['stage_title']}>
        </div>
        </a>
        <div class="spaceHigh"></div>
    <{/foreach}>
    </div>
    <{include file="../Elements/sub_title.tpl"}>

    <div class="raidPList">
        <div class="child">
            <{foreach from=$pList item=val key=key}>
              <{foreach from=$val item=data key=k}>
                <{if $k === 'enemy'}> 
                  <div class="parent">
                      <img src="<{$smarty.const.IMG_URL}>textarea_gd.png"  height="64px" width="680px">
                      <div class="child">
                          <{$data.card_name}>討伐時報酬
                      </div>
                  </div>
                  <div class="parent">
                      <img src="<{$smarty.const.IMG_URL}>enemy/enemy_<{$data.enemy_id}>.jpg">
                  </div>
                <{else}>
                  <div class="listBlock">
                    <{include file="../Elements/raid_present.tpl"}>
                  </div>
                <{/if}>
              <{/foreach}>
            <{/foreach}>
            <div class="space">
            </div>
            <div class="parent">
              <a href="<{$smarty.const.BASE_URL}>RaidStages/index?quest_id=<{$questId}>">
              <input type="image" src="<{$smarty.const.IMG_URL}>btn_cm_l.png">
              <div class="child">
                  ステージ一覧へ
              </div>
              </a>
            </div>
        </div>
    </div>
</div>
