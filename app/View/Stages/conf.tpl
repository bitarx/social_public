<div class="stages index">
    <div>
        <img src="<{$smarty.const.BASE_URL}>File/outimage?size=bf&dir=scene&target=<{$data.enemy_id}>" >
    </div>
    <div>
        <{$data.before_words}> 
    </div>
        <a href="act?target_id=<{$data.enemy_id}>">
            <div  class="btnQuestBossBattle">
                <img src="<{$smarty.const.BASE_URL}>img/btn_st_l.png">
                <div class="strQuestBossBattle">
                    鎮激開始！
                </div>
            </div>
        </a>
</div>
