$(function() {

  // スライドショー
  $('.slides').each(function () {

      var $roundBtns = $('.round-btn').find('span'),  //すべての丸ボタン
          $slides = $(this).find('img'),              // すべてのスライド
          slideCount = $slides.length,                // スライドの点数
          currentIndex = 0,                           // 現在のスライドを示すインデックス
          timer;                                      // タイマー用の変数

      // 最初のスライドをフェードインで表示してズーム
      $slides.eq(currentIndex).fadeIn();
      $slides.eq(currentIndex).addClass('zoom-in');

      // 7500 ミリ秒ごとに showNextSlide 関数を実行
      timer = setInterval(showNextSlide, 7500);

      // 自動で次のスライドを表示する
      function showNextSlide () {
        goToSlide('auto');
      }



      // ボタンに応じたスライドを表示する
      $roundBtns.on('click', function() {
        if(!$(this).hasClass('active')) {
          // タイマーをリセット&セット
          clearInterval(timer);
          timer = setInterval(showNextSlide, 7500);
          goToSlide('btn', $(this).index());
        }
      });



      // スライドを切り替える処理
      function goToSlide(mean, index) {
        // 現在のスライドをフェードアウトしてクラスを外す
        $slides.eq(currentIndex).fadeOut();
        $slides.eq(currentIndex).removeClass('zoom-in');
        // 丸ボタンのクラスを外す
        $roundBtns.eq(currentIndex).removeClass('active');

        // 次に表示するスライドの番号取得
        if(mean === 'auto') {
          var nextIndex = (currentIndex + 1) % slideCount;
        } else if(mean === 'btn') {
          var nextIndex = index;
        }
        // 現在のスライドのインデックスを更新
        currentIndex = nextIndex;

        // 次のスライドをフェードイン
        $slides.eq(currentIndex).fadeIn();
        // 丸ボタンを黒くする
        $roundBtns.eq(currentIndex).addClass('active');
        // 現スライドにクラスを付与（7.5秒かけてズームする）
        $slides.eq(currentIndex).addClass('zoom-in');
      }

  });


  // 商品画像のスライド
  var $square = $('.square-padding'),
      $productImg = $('.product-slide-views img');
  $square.first().addClass('active');
  $productImg.first().addClass('active');
  $('.square-padding').on('click', function() {
    $square.removeClass('active');
    $(this).addClass('active');
    slideIndex = $(this).index();
    $productImg.removeClass('active');
    $productImg.eq(slideIndex).addClass('active');
  });



  // スムーススクロール
  var $smoothScr = $('#smooth-scr');
  $(window).on('scroll', $.throttle(1000 / 15, function() {
    if($(window).scrollTop() > 500) {
      $smoothScr.addClass('active');
    } else {
      $smoothScr.removeClass('active');
    }
  }));

  $smoothScr.on('click', function() {
    $('html, body').animate({scrollTop: 0}, 500);
  });



  // ハンバーガーメニュー
  $('.hamb-btn').on('click', function() {
    $(this).toggleClass('active');
    $('.hamb-list').slideToggle(300);
    $('.hamb-blind').fadeToggle(300);
  });

  $('.hamb-blind').on('click', function() {
    $('.hamb-btn').toggleClass('active');
    $('.hamb-list').slideToggle(300);
    $(this).fadeToggle(300);
  });
});
