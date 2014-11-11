  window.addEventListener("load", function(e) {
    var target = (parent.postMessage ? parent : (parent.document.postMessage ? parent.document : undefined));

    var sendHeight = function(height) {
      height /= 2;
      target.postMessage('adjustHeight:' + height, '*')
    }

    var setHeight = function() {
      if (typeof target != 'undefined') {
        var height = window.innerHeight || 480;

        if (document.documentElement && document.documentElement.clientHeight) {
          height = Math.max(height, document.documentElement.clientHeight);
        }

        if (document.body) {
          height = Math.max(height, document.body.clientHeight, document.body.scrollHeight);
        }

        sendHeight(height);
      }
    }

    var times = [200, 1000, 2000, 5000];
    setTimeout(function() { sendHeight(10); }, times[0]-50);
    for (var i = 0; i < times.length; i++) {
      setTimeout(setHeight, times[i]);
    }
  }, false);
