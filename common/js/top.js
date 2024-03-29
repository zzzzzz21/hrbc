$(function () {
    var ua = navigator.userAgent.toLowerCase(), $scrTarget = "html", $doc = $(document);
    var mousewheel = "onwheel" in document ? "wheel" : "onmousewheel" in document ? "mousewheel" : "DOMMouseScroll";

    if(/(webkit)/.test(ua)) {
        $scrTarget = "body";
    }

    var v_slider, visualOptions = {
        mode: "fade", auto: false, pager: false, controls: false,
        onSliderLoad: function() {
            $("#visual ul > li").hide();
        }
    };
    v_slider = $('#visual ul').bxSlider(visualOptions);
    $(window).on("load resize", function(e) {
        var h = $(this).height();
        $("#visual ul li").height(h);
    });

    var tid;
    setTimeout(function() {
        var d = new Date();
        var hour = d.getHours();
        var min = d.getMinutes();

        var id = 0;
        if(hour >= 8) {
           id = 0;
        }
        if(hour >= 0 && hour < 8) {
            id = 2;
        }
        if(hour >= 12 && min >= 30) {
            id = 1;
        }
        if(hour >= 17 && hour <= 23) {
            id = 2;
        }
        v_slider.goToSlide(id);

/*
      var def = $.ajax({url: "/image.php"});
      def.done(function(a) {
          var id = a.id - 1;
          v_slider.goToSlide(id);
          console.log(id);
      });
*/
      tid = setTimeout(arguments.callee, 1000);
    }, 100);


  var cs_slider = $('#__consultants .consultants-slide').bxSlider({
    speed: 600,
    infiniteLoop: true,
    preloadImages: 'visible',
    onSliderLoad : function(currentIndex) {
      $('#__consultants .consultants-slide .slide').removeClass('active');
      $('#__consultants .consultants-slide .slide').eq(currentIndex+1).addClass('active');
    },
    onSlideBefore : function($element, oldIndex, newIndex){
      //$('#__consultants .consultants-slide .slide').removeClass('active');
      $('#__consultants .consultants-slide .slide').eq(oldIndex+1).removeClass("active");
      $('#__consultants .consultants-slide .slide').eq(newIndex+1).addClass("active");
      //$element.addClass('active');
    }
  });


  $("#header .gnav a").off("click").on("click", function(e) {
      var url = $(this).attr("href");
      if(/^(http)/.test(url) || /^(\/)$/.test(url)) { return true; }
      e.preventDefault();
      var target = url.substring(2);
      var item = $("#__"+target);
      $($scrTarget).stop(true,true).animate({scrollTop: item.offset().top}, {duration: 1000, easing: "easeOutQuint", complete: function() {
          window.location.href = url;
      }});
  });
  $("#footer .footer__col a").off("click").on("click", function(e) {
      var url = $(this).attr("href");
      if(/^(\/.*\/)$/.test(url) || /^(\/)$/.test(url)) { return true; }
      e.preventDefault();
      var target = url.substring(2);
      var item = $("#__"+target);
      var index = $(this).parent().index(), pos = index - 1;
      if($(item).length > 0) {
          $($scrTarget).stop(true,true).animate({scrollTop: item.offset().top}, {duration: 1000, easing: "easeOutQuint", complete: function() {
              window.location.href = url;
          }});
      } else {
          var tp = 0, cat = "", active, tab;
          if(/^\/#pg\-/.test(url)) {
              cat = "pg";
              tp = 100;
              item = $("#__program .sec-contents");
              tab = item.find(".tabs");
              if(index > 0) {
                  active = tab.find("li").eq(index - 1).find("a");
                  item = tab;
              } else {
                  item = $("#__program .sec-title");
              }
          } else if(/^\/#cs\-/.test(url)) {
              cat = "cs";
              tp = 70;
              item = $("#__consultants .sec-contents");
          }
          $($scrTarget).stop(true,true).animate({scrollTop: item.offset().top - tp}, {duration: 1000, easing: "easeOutQuint", complete: function() {
              switch(cat) {
              case "pg":
                  if(!active || active.hasClass("active")) return;
                  $doc.on(mousewheel, function(e) { e.preventDefault(); });
                  tab.find("a").removeClass("active");
                  active.addClass("active");
                  active.parents(".sec-contents__inner").find(".tab-contents").hide();
                  var actTab = active.attr("href");
                  $(actTab).fadeIn(400, function() {
                      $doc.off(mousewheel);
                  });
                break;
              case "cs":
                  if(pos >= 0) {
                      cs_slider.goToSlide(pos);
                  }
                break;
              }
              window.location.href = url;
          }});
      }
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
          item = $('#__consultants .sec-contents');
          pos = pid - 1;
      }
      var active = item.find("li").eq(pid - 1).find("a");
      $(window).on("load", function() {
          $(window).off("load", arguments.callee);
          //
          $($scrTarget).stop(true,true).delay(1000).animate({scrollTop: item.offset().top - tp}, {duration: 1000, easing: "easeOutQuint", complete: function() {
              if( name === "#cs" && pos >= 0 ) {
                  cs_slider.goToSlide(pos);
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
      var h = loc_hash.substring(1);
      var item = $("#__"+h).find(".sec-title");
      var tp = 70;
      //$($scrTarget).stop(true,true).delay(1000).animate({scrollTop: item.offset().top - tp}, {duration: 1000, easing: "easeOutQuint"});
      $(window).on("load", function() {
          $(window).off("load", arguments.callee);
          //var item = $(loc_hash).find(".sec-title");
          var tp = 70;
          $($scrTarget).stop(true,true).delay(1000).animate({scrollTop: item.offset().top - tp}, {duration: 1000, easing: "easeOutQuint"});
      });
  }
});
