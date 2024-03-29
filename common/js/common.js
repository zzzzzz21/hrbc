$(window).on('load scroll', function(){
  if ($(window).scrollTop() > 120) {
    $('#header').addClass('mini-header');
    $('.pagetop').addClass('active');
  } else {
    $('#header').removeClass('mini-header');
    $('.pagetop').removeClass('active');
  }
});

$(function () {
    var ua = navigator.userAgent.toLowerCase(), $scrTarget = "html";
    if(/(webkit)/.test(ua)) {
        $scrTarget = "body";
    }
  //scroll
  function getFirstScrollable(selector){
    var $scrollable;
    $(selector).each(function(){
      var $this = $(this);
      if( $this.scrollTop() > 0 ){
        $scrollable = $this;
        return false;
      }else{
        $this.scrollTop(1);
        if( $this.scrollTop() > 0 ){
          $scrollable = $this;
          return false;
        }
        $this.scrollTop(0);
      }
    });
    return $scrollable;
  }
  // スクロールに使用する要素・イベントを設定
  var $win = $(window),
      $doc = $(document),
      $scrollElement = getFirstScrollable("html,body"),
      mousewheel = "onwheel" in document ? "wheel" : "onmousewheel" in document ? "mousewheel" : "DOMMouseScroll";
      $doc.on("click", "a[href^=#]", function(e){
    var $target = $(this.hash),
        top;
    if( $target.size() < 1 ) return false;
    top = $target.offset().top;
    top = Math.min(top, $doc.height() - $win.height());
    $doc.on(mousewheel, function(e){ e.preventDefault(); });
    $scrollElement.stop().animate({scrollTop: top}, 1000, "easeOutQuint", function(){
      $doc.off(mousewheel);
    });
    return false;
  });

  //tab
  $('.tabs a').click(function() {
    if ($(this).hasClass('active')) {
      return false;
    } else {
      var tp = $("#header").height() + 42;
      $($scrTarget).stop(true,true).animate({scrollTop: $(this).offset().top - tp}, {duration: 1000, easing: "easeOutQuint"});
      $doc.on(mousewheel, function(e){ e.preventDefault(); });
      $(this).parents('.tabs').find('a').removeClass('active');
      $(this).addClass('active');
      $(this).parents('.sec-contents__inner').find('.tab-contents').hide();
      var activeTab = $(this).attr('href');
      $(activeTab).fadeIn(400, function(){
        $doc.off(mousewheel);
      });
      return false;
    }
  });

  //rollover
  $('.rollover').each(function () {
    this.onImg = $(this).attr('src').replace(/^(.+)(\.[a-z]+)$/, "$1" + '_o' + "$2");
    this.rollOverImg = $('<img src="' + this.onImg + '" alt="" style="position:absolute; opacity:0;">');
    $(this).before(this.rollOverImg);
    $(this.rollOverImg).hover(function () {
      $(this).stop().animate({
        opacity: 1
      }, 200);
    }, function () {
      $(this).stop().animate({
        opacity: 0
      }, 200);
    });
  });

});
