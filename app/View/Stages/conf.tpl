<div class="stages">
    <div>
        <img src="<{$smarty.const.IMG_URL}>enemy/enemy_<{$data.enemy_id}>.jpg" >
    </div>
    <{include file="../Elements/before_words.tpl"}>
        <a href="act?target_id=<{$data.enemy_id}>">
            <div  class="btnQuestBossBattle">
                <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                <div class="strQuestBossBattle">
                    鎮激開始！
                </div>
            </div>
        </a>
</div>
