// 背景、登場人物の画像を定義する
背景画像 = {
  '学校': IMG_URL + 'bg/school.png',
  'エントランス': IMG_URL + 'bg/entrance.png',
  '教室1': IMG_URL + 'bg/classroom.png',
  '廊下': IMG_URL + 'bg/passage.png',
  'トイレ': IMG_URL + 'bg/toilet.png',
  'ゲームオーバー': IMG_URL + 'end.png'
}

登場人物 = {
  'まゆ通常': IMG_URL + 'chara/chara1_Normal.png',
  'まゆ好き': IMG_URL + 'chara/chara1_Like.png',
  'まゆ嫌悪': IMG_URL + 'chara/chara1_Dislike.png',
  'しぐれ通常': IMG_URL + 'chara/chara2_Normal.png',
  'しぐれ好き': IMG_URL + 'chara/chara2_Like.png',
  'しぐれ嫌悪': IMG_URL + 'chara/chara2_Dislike.png',
  'しぐれ怒り': IMG_URL + 'chara/chara2_angry.png',
  '丈太郎': IMG_URL + 'chara/chara3.png',
}


// セーブ用のゲームIDを設定する
// 9leapのデータベースに保存する場合は、
// 9leapの「ゲームID」(9leapにアップロードしたゲームのURLの末尾の数字)を設定する
GAME_ID = 'adv002';

// シナリオ

start = {
  'シーン': 'start',
  '背景画像': ['学校', 426, 320],
  '選択肢': ['どうしようかな？','入る', 'エントランス', '帰る', 'ゲームオーバー'],
}

ゲームオーバー  = {
  '背景画像': ['ゲームオーバー', 189, 97, 70, 110],
}

// ルート分岐

エントランス  = {
  'シーン': 'エントランス',
  '背景画像': ['エントランス', 426, 320],	
  '選択肢': ['どうしようかな？','教室に行く', 'まゆルート1 ', '走ってトイレにいく', 'しぐれルート1'],
}


// まゆルート

まゆルート1 = {
  'シーン': 'まゆルート1',
  '背景画像': ['教室1', 426, 320],
  'キャラ1': ['まゆ通常', 160, 480, 180, 50],
  'セリフ': ['[まゆ]', 'おはよう'],
  'ジャンプ': 'まゆルート行動選択1' 
}

まゆルート行動選択1 = {
  '式': 'まゆ好感度 = 10',
  '選択肢': ['どうしようかな?', 'おはよう', 'まゆ好感度アップ1', '・・・・・・' , 'まゆ好感度ダウン1']
}

まゆ好感度アップ1 = {
  '式': 'まゆ好感度 += 5',
  '退場': 'まゆ通常',
  'オートジャンプ': 'まゆルート行動選択2'
}

まゆ好感度ダウン1 = {
  '式': 'まゆ好感度 -= 5',
  '退場': 'まゆ通常',
  'オートジャンプ': 'まゆルート行動選択2 '
}

まゆルート行動選択2 = {
  '選択肢': ['休み時間だ。', '教室でくつろぐ', 'まゆルート分岐1', 'トイレに行く', 'まゆルートトイレ']
}

まゆルートトイレ = {
  'シーン': 'トイレ',
  '背景画像': ['トイレ', 426, 320],
  'キャラ1': ['丈太郎', 160, 480, 180, 50],
  'セリフ': ['[丈太郎]', 'うぃっす！'],
  'ジャンプ': 'まゆルート教室2'
}

まゆルート教室2 = {
  'シーン': 'まゆルート教室2',
  '背景画像': ['教室1', 426, 320],
  'オートジャンプ': 'まゆルート行動選択4'
}

まゆルート分岐1 = {
  '条件分岐': ['まゆ好感度 >= 10', 'まゆルート会話イベント1', 'まゆルート行動選択4']
}

まゆルート会話イベント1　= {
  'キャラ1': ['まゆ通常', 160, 480, 180, 50],
  'セリフ': ['[まゆ]', 'ねぇねぇ、このプリント配るの手伝っくれないかなぁ？'],	
  'ジャンプ': 'まゆルート行動選択3'
}

まゆルート行動選択3 = {
  '選択肢': ['めんどくさいなぁ・・', 'でも手伝う', 'まゆ好感度アップ2', '手伝わない', 'まゆ好感度ダウン2']
}

まゆ好感度アップ2 = {
  '式': 'まゆ好感度 += 5',
  '退場': 'まゆ通常',
  'オートジャンプ': 'まゆルート行動選択4'
}

まゆ好感度ダウン2 = {
  '式': 'まゆ好感度 -= 5',
  '退場': 'まゆ通常',
  'オートジャンプ': 'まゆルート行動選択4'
}

まゆルート行動選択4 = {
  '選択肢': ['放課後だ。', '帰る', 'まゆルート分岐2', 'まだ帰らない', 'まゆルート行動選択4']
}

まゆルート分岐2 = {
  '条件分岐': ['まゆ好感度 >= 20', 'まゆルートend', 'まゆルートbadend']
}


まゆルートend = {
  'シーン': 'まゆルートend',
  '背景画像': ['エントランス', 426, 320],
  'キャラ1': ['まゆ好き', 160, 480, 180, 50],
  'セリフ': ['[まゆ]', 'ねぇ、いっしょに帰ろう'],
}

まゆルートbadend = {
  'シーン': 'まゆルートbadend',
  '背景画像': ['エントランス', 426, 320],
  'キャラ1': ['まゆ嫌悪', 160, 480, 180, 50],
  'セリフ': ['[まゆ]', '・・・・・・・'],
}

// しぐれルート

しぐれルート1 = {
  'シーン': 'しぐれルート1',
  '背景画像': ['廊下', 426, 320],
  'キャラ1': ['しぐれ怒り', 160, 480],
  'セリフ': ['[しぐれ]', 'こら！、そこのバカ、廊下は走らない！！'],
  'ジャンプ': 'しぐれルート行動選択1'
}

しぐれルート行動選択1 = {
  '式': 'しぐれ好感度 = 10',
  '選択肢': ['うるさいのに見つかったな・・','とりあえず謝っておく', 'しぐれ好感度アップ1', '漏れそうなので無視する', 'しぐれ好感度ダウン1'],
}

しぐれ好感度アップ1 = {
  '式': 'しぐれ好感度 += 5',
  'オートジャンプ': 'しぐれルートトイレ'
}

しぐれ好感度ダウン1 = {
  '式': 'しぐれ好感度 -= 5',
  'オートジャンプ': 'しぐれルートトイレ'
}

しぐれルートトイレ = {
  'シーン': 'しぐれルートトイレ',
  '背景画像': ['トイレ', 426, 320],
  'キャラ1': ['丈太郎', 160, 480, 180, 50],
  'セリフ': ['[丈太郎]', 'うぃっす！'],
  'ジャンプ': 'しぐれルート教室 '
}

しぐれルート教室 = {
  'シーン': 'しぐれルート教室',
  '背景画像': ['教室1', 426, 320],
  'オートジャンプ': 'しぐれルート行動選択2' 
}

しぐれルート行動選択2 = {
  '選択肢': ['休み時間だ。', '教室でくつろぐ', 'しぐれルート行動選択4', '走ってトイレに行く', 'しぐれルート2']
}

しぐれルート2 = {
  'シーン': 'しぐれルート2',
  '背景画像': ['廊下', 426, 320],
  'キャラ1': ['しぐれ怒り', 160, 480],
  'セリフ': ['[しぐれ]', 'ちょっと！、そこのタコ、廊下は走らない！！'],
  'ジャンプ': 'しぐれルート行動選択3'	
}

しぐれルート行動選択3 = {
  '選択肢': ['こんどはタコか・・','でも謝る', 'しぐれ好感度アップ2', 'ムカツイタので無視する', 'しぐれ好感度ダウン2'],
}

しぐれ好感度アップ2 = {
  '式': 'しぐれ好感度 += 5',
  'オートジャンプ': 'しぐれルートトイレ2'
}

しぐれ好感度ダウン2 = {
  '式': 'しぐれ好感度 -= 5',
  'オートジャンプ': 'しぐれルートトイレ2'
}

しぐれルートトイレ2 = {
  'シーン': 'しぐれルートトイレ2',
  '背景画像': ['トイレ', 426, 320],
  'キャラ1': ['丈太郎', 160, 480, 180, 50],
  'セリフ': ['[丈太郎]', 'よく会うな。'],
  'ジャンプ': 'しぐれルート教室2'
}

しぐれルート教室2 = {
  'シーン': 'しぐれルート教室2',
  '背景画像': ['教室1', 426, 320],
  'オートジャンプ': 'しぐれルート行動選択4'
}


しぐれルート行動選択4 = {
  '選択肢': ['放課後だ。', '帰る', 'しぐれルート分岐2', 'まだ帰らない', 'しぐれルート行動選択4']
}

しぐれルート分岐2 = {
  '条件分岐': ['しぐれ好感度 >= 20', 'しぐれルートend', 'しぐれルートbadend']
}


しぐれルートend = {
  'シーン': 'しぐれルートend',
  '背景画像': ['エントランス', 426, 320],	
  'キャラ1': ['しぐれ好き', 160, 480, 180, 50],
  'セリフ': ['[しぐれ]', 'い。。いっしょに帰るわよ！'],	
}

しぐれルートbadend = {
  'シーン': 'しぐれルートbadend',
  '背景画像': ['エントランス', 426, 320],
  'キャラ1': ['しぐれ嫌悪', 160, 480, 180, 50],
  'セリフ': ['[しぐれ]', '・・・・・・・'],
}


