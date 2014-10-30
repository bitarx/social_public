enchant();

 // コンストラクタ
function interpreter() {
  // プロパティ
  this.images = 背景画像;
  this.bg = null;         // バックグラウンド
  this.chara =[];         // キャラ
  this.name = null;       // 名前
  this.text = null;       // テキスト
  this.selectText = null; // 選択肢のテキスト
  this.select1 = null;    // 選択肢1
  this.select2 = null;    // 選択肢2
  this.next = null;       // 次のシーン名
  this.variables = [];    // 変数
  this.scene = null;      // シーン
};

interpreter.prototype.背景画像 = function(args) {
  var bg = new Sprite(args[1], args[2]);
  bg.image = coer.assets[this.images[args[0]]];
  bg.x = args[3] ? args[3] : 0;
  bg.y = args[4] ? args[4] : 0;
  imageLayer.addChild(bg);
  this.bg = bg;
}


interpreter.prototype.選択肢 = function(args) {

  var str = args[0];
  var text = new Label();
  text.font  = "18px monospace";
  text.color = "rgb(255,255,255)";
  text.backgroundColor = "rgba(0,0,0,0.6)";
  text.y     = 692;
  text.x     = 4;
  text.width = 632;
  text.height = 106;

  textLayer.addChild(text);


  var select1 = new Label(args[1]);
  select1.font  = "38px monospace";
  select1.color = "rgb(200,125,0)";
  select1.y     = 800 + 16*3;
  select1.x     = 195;
  select1.width    = 500;
  select1.height   = 100;

  var i = 0;
  var addSel = 0;
  text.onenterframe= function()
  {
      if (undefined != str[i]) {
          if (0 == i) {
              //text.text += "<br />";
          }
          text.text += str[i];
          if (1 < i && 0 == i % 33) {
              text.text += "<br />";
          }
          i++;
      }
      if (undefined == str[i] && 0 == addSel) {
          addSel = 1; 
          textLayer.addChild(select1);

          imageLayer.addEventListener(Event.TOUCH_START, function(e) {
            location.href = BASE_URL + args[2];
          });
          textLayer.addEventListener(Event.TOUCH_START, function(e) {
            location.href = BASE_URL + args[2];
          });
          text.addEventListener(Event.TOUCH_START, function(e) {
            location.href = BASE_URL + args[2];
          });
      }
  }

  text.dispatch('enterframe');
}


interpreter.prototype.イベント = function(args) {
  this.chara[args[0]].addEventListener(args[1], eval(args[2]));
}

interpreter.prototype.式 = function(args){
  var val = args.split(" ");
  this.variables[val[0]] = eval(args);
}


interpreter.prototype.シーン = function(arg) {
  this.scene = arg;
}

function exec(scenario) {
  for (var command in scenario) {
    var s = (interpreter[command])(scenario[command]);
  }
}

window.onload = function() {

  // 使用する画像を格納する配列
  images = Array();
  
  // 使用する背景画像を配列にプッシュ
  for (var key in 背景画像) {
    images.push(背景画像[key]);
  }

  // 「interpreter」オブジェクトを生成する
  interpreter = new interpreter();

  coer = new Core(640, 300);
  coer.fps = 16;
  coer.preload(images);

  // ブラウザのLocalStorageにデータを保存するデバック機能を有効にする
  // 9leapのデータベースに保存する場合は、「false」
  enchant.nineleap.memory.LocalStorage.DEBUG_MODE = true;

  // 自分のデータを読み込む
  coer.memory.player.preload();

  coer.onload = function() {

    // メモリの初期化
    var save = coer.memory.player.data;
    if (save.scene == null) save.scene = 'start';
    if (save.variables == null) save.variables = [];
    
    // データ復元
    for (var i in save.variables) {
      interpreter.variables[save.variables[i][0]] = save.variables[i][1] 
    }

    // 画像表示用のグループを作成する    
    imageLayer = new Group();
    coer.rootScene.addChild(imageLayer);

    // テキスト表示用のグループを作成する
    textLayer = new Group();
    coer.rootScene.addChild(textLayer);

    // セーブしたシーン(最初は「start」)からを実行する
    exec(eval(save.scene));
 
    // セーブラベルの「touchstart」イベントリスナ
    savelabel.addEventListener('touchstart', function(e) {
      this.backgroundColor = '#F0F0F0';
    });
    // セーブラベルの「touchend」イベントリスナ
    savelabel.addEventListener('touchend', function(e) {
      this.backgroundColor = '';
      var save = coer.memory.player.data;
      // シーン名をメモリに書き込む
      save.scene = interpreter.scene;
      // シナリオ中で定義した変数やフラグをメモリに書き込む
      var count =0;
      for (var i in interpreter.variables) {
        save.variables[count] = [i,interpreter.variables[i]];
        count++;
      }
      // 保存を実行する
      coer.memory.update();
    });
 
  }

  coer.start();

}
