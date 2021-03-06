<?php 
class ÂfSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $battle_logs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'æ»æå´'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'é²å¾¡å´(æµID)'),
		'result' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:æ»æå´åå© 2:æ»æå´æå'),
		'log' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_battle_logs_users' => array('column' => 'user_id', 'unique' => 0),
			'FK_battle_logs_users_2' => array('column' => 'target', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $card_groups = array(
		'card_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'evol_group' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'key' => 'index'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'prev' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'åã®é²åã®card_group_id'),
		'next' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'æ¬¡ã®é²åã®card_group_id'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'card_group_id', 'unique' => 1),
			'group_id' => array('column' => 'evol_group', 'unique' => 0),
			'FK_card_groups_cards' => array('column' => 'card_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $cards = array(
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'card_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'card_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'è©æ¸ã', 'charset' => 'utf8'),
		'height' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => 'èº«é·'),
		'weight' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => 'ä½é'),
		'size' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '3ãµã¤ãº', 'charset' => 'utf8'),
		'blood' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'è¡æ¶²å', 'charset' => 'utf8'),
		'rare_level' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 3, 'comment' => 'ã¬ã¢ãªãã£ 1:N 2:HN 3:R 4:HR 5:SR'),
		'card_cost' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 5, 'comment' => 'ããã­è¨­ç½®ã«å¿è¦ãªã³ã¹ã'),
		'attr' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:æ 2:è 3:é­'),
		'card_hp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'card_atk' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'card_def' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'card_level' => array('type' => 'integer', 'null' => false, 'default' => '20', 'length' => 8, 'comment' => 'ã«ã¼ãæå¤§ã¬ãã«'),
		'skill_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'card_words' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'comment' => 'ã»ãªã', 'charset' => 'utf8'),
		'card_detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'comment' => 'è§£èª¬', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'card_id', 'unique' => 1),
			'FK_mst_cards_mst_skill' => array('column' => 'skill_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $enemys = array(
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'card_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'hp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'atk' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'def' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'skill_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'ã¹ã­ã«ID'),
		'skill_level' => array('type' => 'integer', 'null' => false, 'default' => '20', 'length' => 10),
		'before_words' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'æ¦éåã»ãªã', 'charset' => 'utf8'),
		'after_win_words' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ãã¬ã¤ã¤ã¼ãåã£ãã¨ã', 'charset' => 'utf8'),
		'after_lose_words' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ãã¬ã¤ã¤ã¼ãè² ããã¨ã', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'enemy_id', 'unique' => 1),
			'FK_enemys_skills' => array('column' => 'skill_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $errors = array(
		'error_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'message' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'error_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $ev_item_probs = array(
		'ev_item_prob_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'ev_stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'åä¸item_idã®åç®ãåæ¯'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '1:card 2:item 3:money'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ev_item_prob_id', 'unique' => 1),
			'FK_ev_item_probs_items' => array('column' => 'item_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $ev_quests = array(
		'ev_quest_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'ev_quest_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ev_quest_detail' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail_before1' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail_before2' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail_after' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'start_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ev_quest_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $ev_stage_probs = array(
		'ev_stage_prob_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'ev_stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'key' => 'index'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:card 2:item 3:money 4:enemy'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'å¯¾è±¡ã®ID'),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'æ°é'),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ev_stage_prob_id', 'unique' => 1),
			'FK_ev_stage_probs_ev_stages' => array('column' => 'ev_stage_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $ev_stages = array(
		'ev_stage_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'ev_quest_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'ev_stage_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'use_act' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'æ¶è²»è¡åå'),
		'prob_get' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'ä½ããåå¾ããç¢ºç'),
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'ã¹ãã¼ã¸ã®ãã¹'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ev_stage_id', 'unique' => 1),
			'FK_ev_stages_enemys' => array('column' => 'enemy_id', 'unique' => 0),
			'FK_ev_stages_ev_quests' => array('column' => 'ev_quest_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $ev_user_cur_stages = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'ev_stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'key' => 'index'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1),
			'FK_user_cur_stages_stages' => array('column' => 'ev_stage_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $friends = array(
		'friend_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary', 'comment' => 'user_id2äººãçµã¶'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'state' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:ç³è« 2:ç³è«åä¸ 3:æå¦ 4:æ¿èªæ¸'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('friend_id', 'user_id'), 'unique' => 1),
			'FK_friends_users' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $gacha_probs = array(
		'gacha_prob_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'gacha_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'åç®ããå¤ãåæ¯ã«ãªã'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'gacha_prob_id', 'unique' => 1),
			'FK_mst_gacha_probs_mst_gachas' => array('column' => 'gacha_id', 'unique' => 0),
			'FK_mst_gacha_probs_mst_cards' => array('column' => 'card_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $gachas = array(
		'gacha_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'gacha_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'gacha_detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'start_time' => array('type' => 'datetime', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'end_time' => array('type' => 'datetime', 'null' => false, 'default' => '3000-01-01 00:00:00'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'gacha_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $item_effects = array(
		'item_effect_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'item_effect_detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'comment' => 'ä½¿ç¨åã®èª¬æ', 'charset' => 'utf8'),
		'detail_after' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'comment' => 'ä½¿ç¨å¾ã®èª¬æ', 'charset' => 'utf8'),
		'effect' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:act 2:bp 3.ã«ã¼ãåºç¾çã¢ãã 4.éåº«åºç¾çã¢ãã 5.ã¯ã¨ã¹ãã®å¨åé²è¡ã¢ãã'),
		'percent' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => 'åå¾©ã®å²å'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'item_effect_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $item_probs = array(
		'item_prob_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'åä¸item_idã®åç®ãåæ¯'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '1:card 2:item 3:money'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'item_prob_id', 'unique' => 1),
			'FK_mst_item_probs_mst_items' => array('column' => 'item_id', 'unique' => 0),
			'FK_item_probs_stages' => array('column' => 'stage_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $items = array(
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'item_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'item_detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'point' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'money' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'item_effect_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'box_num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => '0ä»¥ä¸ã§ããã¯ã¹ã¢ã¤ãã ã®å½é¸åæ°'),
		'item' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index', 'comment' => 'ããã¯ã¹ã¢ã¤ãã ã®å ´åéããçºã«å¿è¦ãªã¢ã¤ãã '),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'item_id', 'unique' => 1),
			'FK_items_items' => array('column' => 'item_effect_id', 'unique' => 0),
			'FK_items' => array('column' => 'item', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $messages = array(
		'message_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'target_user' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => 'ï¼:åéç³è« 2:åéæ¿èª 3:æ¨æ¶'),
		'message' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'message_id', 'unique' => 1),
			'user_user_target' => array('column' => array('user_id', 'target_user'), 'unique' => 0),
			'FK_messages_users_2' => array('column' => 'target_user', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $news = array(
		'news_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'news_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'news_detail' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'start_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'news_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $quests = array(
		'quest_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'quest_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'quest_detail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 400, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail_before1' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail_before2' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail_after' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'quest_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $raids = array(
		'raid_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'raid_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => 'ã¬ã¤ãã¤ãã³ãå', 'charset' => 'utf8'),
		'start_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'raid_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $rank_ev_battle = array(
		'rank_ev_battle_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'rank' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'é ä½'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'point' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'unit' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'ãã¤ã³ãã®åä½', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'rank_ev_battle_id', 'unique' => 1),
			'FK_rank_ev_battle_users' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $rank_ev_raid = array(
		'rank_ev_raid_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'rank' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'é ä½'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'point' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'unit' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'ãã¤ã³ãã®åä½', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'rank_ev_raid_id', 'unique' => 1),
			'FK_rank_raid_event_users' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $skills = array(
		'skill_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'skill_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'effect' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:def 2:atk'),
		'updown' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'comment' => '1:up 2:down'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'comment' => '1:èªå 2:ç¸æã3.å³æ¹ 4.ç¸æå¨ä½'),
		'percent' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'ç¸æã®atkãä½ï¼ä¸ãããªã©'),
		'skill_words' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'skill_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $sns_users = array(
		'sns_user_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'comment' => 'opensocial_owner_id', 'charset' => 'utf8'),
		'viewer' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'opensocial_viewer_id', 'charset' => 'utf8'),
		'sns_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'SNSå´ã®åå', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'sns_user_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $stage_probs = array(
		'stage_prob_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'raid_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 5, 'comment' => '1:éå¸¸ã¯ã¨ã¹ã 2:ã¬ã¤ãã¤ãã³ãID'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:card 2:item 3:money 4:enemy 5:å¨åé²è¡ 6:åºä¼ã'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'å¯¾è±¡ã®ID'),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'æ°é'),
		'prob' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'stage_prob_id', 'unique' => 1),
			'stage_id' => array('column' => 'stage_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $stages = array(
		'stage_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'quest_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'stage_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'use_act' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'æ¶è²»è¡åå'),
		'prob_get' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'ä½ããåå¾ããç¢ºç'),
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'ã¹ãã¼ã¸ã®ãã¹'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'stage_id', 'unique' => 1),
			'FK_mst_stages_mst_enemy' => array('column' => 'enemy_id', 'unique' => 0),
			'FK_stages_quests' => array('column' => 'quest_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $static_pages = array(
		'static_page_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'page' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'static_page_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'static_page_detail' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'static_page_id', 'unique' => 1),
			'page' => array('column' => 'page', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $tutorials = array(
		'tutorial_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'tutorial_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tutorial_words' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'comment' => 'æ¡åã­ã£ã©ã®ã»ãªã', 'charset' => 'utf8'),
		'tutorial_words2' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tutorial_words3' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tutorial_next' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'æ¬¡ã®ID'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'tutorial_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_base_cards = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'user_card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1),
			'FK__user_cards' => array('column' => 'user_card_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_boxs = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'user_item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary', 'comment' => 'ã¦ã¼ã¶ã¼ã®ã©ã®éåº«ã'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'key' => 'primary'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'primary'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('user_id', 'user_item_id', 'kind', 'target'), 'unique' => 1),
			'FK_user_boxs_user_items' => array('column' => 'user_item_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_cards = array(
		'user_card_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'hp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'hp_max' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'atk' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'def' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'level' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 5),
		'exp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'skill_level' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 5),
		'skill_exp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_card_id', 'unique' => 1),
			'card_id' => array('column' => 'card_id', 'unique' => 0),
			'user_card_id' => array('column' => array('user_id', 'card_id'), 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_collects = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'new_flg' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 3, 'comment' => 'é²è¦§ããã°0'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('user_id', 'card_id'), 'unique' => 1),
			'FK_user_collects_cards' => array('column' => 'card_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_cur_stages = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1),
			'FK_user_cur_stages_stages' => array('column' => 'stage_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_deck_cards = array(
		'user_deck_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'deck_number' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'key' => 'primary', 'comment' => '1ãã5ã¾ã§'),
		'user_card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('user_deck_id', 'deck_number'), 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_decks = array(
		'user_deck_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:æ»æããã­ 2:é²å¾¡ããã­'),
		'user_deck_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_deck_id', 'unique' => 1),
			'FK_user_decks_users' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_ev_stages = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'ev_stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'key' => 'index'),
		'progress' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'æå¤§100'),
		'state' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:é²è¡ä¸­ 2:éæ 3:ãã¹åå©'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1),
			'user_ev_stage_id' => array('column' => array('user_id', 'ev_stage_id'), 'unique' => 0),
			'FK_user_ev_stages_ev_stages' => array('column' => 'ev_stage_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_gacha_days = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'gacha_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1),
			'FK_user_gacha_days_gachas' => array('column' => 'gacha_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_gacha_logs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'gacha_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'card_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'end_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_user_gacha_logs_gachas' => array('column' => 'gacha_id', 'unique' => 0),
			'FK_user_gacha_logs_cards' => array('column' => 'card_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_items = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'ææåæ°'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => array('user_id', 'item_id'), 'unique' => 1),
			'FK_user_items_items' => array('column' => 'item_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_last_act_times = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'delete_flg' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 3),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_login_all_logs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:card 2:item 3:money 4:enemy'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_user_login_all_log_users' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_login_days = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_login_logs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:card 2:item 3:money 4:enemy'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_user_login_log_users' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_params = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary', 'comment' => 'usersã®id'),
		'money' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'ã²ã¼ã åéè²¨'),
		'act' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'è¡åå'),
		'act_max' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'è¡ååæå¤§å¤'),
		'cost_atk' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6, 'comment' => 'æ»æããã­ã³ã¹ã'),
		'cost_def' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'é²å¾¡ããã­ã³ã¹ã'),
		'level' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'ã¬ãã«'),
		'exp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'çµé¨å¤'),
		'win' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'ããã«åå©æ°'),
		'lose' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'ããã«æåæ°'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_present_boxs = array(
		'user_present_box_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'kind' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:card 2:item 3:money 4:enemy'),
		'target' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'num' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 10, 'comment' => 'ãéã®å ´åã¯éé¡'),
		'message' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_present_box_id', 'unique' => 1),
			'index_1' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_profs = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'prof' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_raid_logs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'æ»æè'),
		'user_raid_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'å¯¾è±¡ã®ã¬ã¤ããã¹'),
		'damage' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'ä¸ãããã¡ã¼ã¸åè¨'),
		'win_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:ã¨ã©ãããããå ´å'),
		'log' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK_user_raid_logs_users' => array('column' => 'user_id', 'unique' => 0),
			'FK_user_raid_logs_user_raids' => array('column' => 'user_raid_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_raids = array(
		'user_raid_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index', 'comment' => 'çºè¦è'),
		'raid_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index', 'comment' => 'ã¬ã¤ãã¤ãã³ãID'),
		'enemy_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'index'),
		'hp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'comment' => 'å¯¾è±¡ã®æ®ãHP'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_raid_id', 'unique' => 1),
			'user_raid_id' => array('column' => array('user_id', 'raid_id'), 'unique' => 0),
			'FK_user_raids_raids' => array('column' => 'raid_id', 'unique' => 0),
			'FK_user_raids_enemys' => array('column' => 'enemy_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_stages = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'stage_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'primary'),
		'progress' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'æå¤§100'),
		'state' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'comment' => '1:é²è¡ä¸­ 2:éæ 3:ãã¹åå©'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('user_id', 'stage_id'), 'unique' => 1),
			'FK_user_stages_stages' => array('column' => 'stage_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $user_tutorials = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'key' => 'primary'),
		'tutorial_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'key' => 'index'),
		'end_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1),
			'FK_user_tutorials_tutorials' => array('column' => 'tutorial_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $users = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sns_user_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'carrer' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'comment' => '1.android 2.iphone'),
		'delete_flg' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1),
			'sns_user_id' => array('column' => 'sns_user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

}
