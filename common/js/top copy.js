$(function () {
    var ua = navigator.userAgent.toLowerCase(), $scrTarget = "html", $doc = $(document);
    var mousewheel = "onwheel" in document ? "wheel" : "onmousewheel" in document ? "mousewheel" : "DOMMouseScroll";

    if(/(webkit)/.test(ua)) {
        $scrTarget = "body";
    }

  var slider = $('#consultants .consultants-slide').bxSlider({
    speed: 600,
    //randomStart: true,
    onSliderLoad : function(currentIndex){

      $('#consultants .consultants-slide .slide').removeClass('active');
      $('#consultants .consultants-slide .slide').eq(currentIndex+1).addClass('active');
    },
    onSlideBefore : function($element){
      $('#consultants .consultants-slide .slide').removeClass('active');
      $element.addClass('active');
    }
  });

  var $message = $("#footer .footer__col:eq(1) dl:eq(0) a");
  $message.off("click").on("click", function(e) {
      e.preventDefault();
      var index = $(this).parent().index();
      var item = $("#message .sec-title");
      $($scrTarget).stop(true,true).animate({scrollTop: $(item).offset().top - tp}, {duration: 1000, easing: "easeOutQuint"});
  });

  // footer Program
  var $program = $("#footer .footer__col:eq(1) dl:eq(1) a");
  $program.off("click").on("click", function(e) {
      e.preventDefault();
      var hash = location.hash, repl_hash = $(this).attr("href");
      var tab = $(".tabs"), item, active;
      var index = $(this).parent().index();
//      var tp = $("#header").height() + 12;
      //var tp = $("#header").height() + 20;
      //var tp = 100;
      var tp = $("#header").height() + 0;
      if(index > 0) {
          active = tab.find("li").eq(index - 1).find("a");
          item = tab;
      } else {
          item = $("#program .sec-title");
      }

      $($scrTarget).stop(true,true).animate({scrollTop: $(item).offset().top - tp}, {duration: 1000, easing: "easeOutQuint", complete: function() {
          if(!active || active.hasClass("active")) return;
          $doc.on(mousewheel, function(e) { e.preventDefault(); });
          tab.find("a").removeClass("active");
          active.addClass("active");
          active.parents(".sec-contents__inner").find(".tab-contents").hide();
          var actTab = active.attr("href");
          $(actTab).fadeIn(400, function() {
              $doc.off(mousewheel);
          });
      }});
  });



  // footer Consultants
  var $consultants = $("#footer .footer__col:eq(2) dl a");
  $consultants.off("click").on("click", function(e) {
      e.preventDefault();
      var index = $(this).parent().index(), pos = index - 1, item;
      var tp = 70;
      //var tp = $("#header").height() + 20;
      if(pos >= 0) {
          item = $('#consultants .sec-contents');
      } else {
          item = $("#consultants .sec-title");
      }
      $($scrTarget).stop(true,true).animate({scrollTop: $(item).offset().top - tp}, {duration: 1000, easing: "easeOutQuint", complete: function() {
          if(pos >= 0) {
              slider.goToSlide(pos);
          }
      }});
  });

  $("#header .gnav a").off("click").on("click", function(e) {
      var url = $(this).attr("href");
      if(/^(\/.*\/)$/.test(url)) { return true; }
      e.preventDefault();
      var target = url.substring(1);
      var item = $(target);
      $($scrTarget).stop(true,true).animate({scrollTop: item.offset().top}, {duration: 1000, easing: "easeOutQuint", complete: function() {
          window.location.href = url;
      }});
  });



  // 別ページから遷移
  var subpage = 0;
  var loc_hash = location.hash;
  if(/^#(.*)\-(.*)$/.test(loc_hash)) {
      var hashes = loc_hash.split("-");
      var name = hashes[0], pid = parseInt(hashes[1]), pos = -1;
      //var tp = $("#header").height() - 10;
      var tp = 98;
      var item;
      if(name === "#pg") {
          item = $(".tabs");
      } else {
          item = $('#consultants .sec-contents');
          pos = pid - 1;
      }
      var active = item.find("li").eq(pid - 1).find("a");
      $(window).on("load", function() {
          $(window).off("load", arguments.callee);
          //
          $($scrTarget).stop(true,true).delay(1000).animate({scrollTop: item.offset().top - tp}, {duration: 1000, easing: "easeOutQuint", complete: function() {
              if( name === "#cs" && pos >= 0 ) {
                  slider.goToSlide(pos);
                  return false;
              }
              $doc.on(mousewheel, function(e) { e.preventDefault(); });
              item.find("a").removeClass("active");
              active.addClass("active");
              active.parents(".sec-contents__inner").find(".tab-contents").hide();
              var actTab = active.attr("href");
              $(actTab).fadeIn(400, function() {
                  $doc.off(mousewheel);
              });
          }});
      });
  } else if(/^#(.*)$/.test(loc_hash)) {
      //subpage = 1;
      var item = $(loc_hash).find(".sec-title");
      var tp = 70;
      $(scrTarget).stop(true,true).animate({scrollTop: 0}, {duration: 0});
      //$($scrTarget).stop(true,true).delay(1000).animate({scrollTop: item.offset().top - tp}, {duration: 1000, easing: "easeOutQuint"});
      $(window).on("load", function() {
          $(window).off("load", arguments.callee);
          var item = $(loc_hash).find(".sec-title");
          var tp = 70;
          $($scrTarget).stop(true,true).delay(1000).animate({scrollTop: item.offset().top - tp}, {duration: 1000, easing: "easeOutQuint"});
      });
  }


});
