<?php
/*
 * @package WordPress
 * @subpackage HRBC株式会社

 */
?>
<!DOCTYPE html>
<html>
<head>
<title>ACCESS</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="HRBC,HRBC株式会社,コンサルティング,人財開発,エイチアールビーシー株式会社">
<meta name="discription" content="私たちは人財開発のプロフェッショナルチームです">
<meta name="revisit-after" content="2 days">
<meta name="mssmarttagspreventparsing" content="true">
<meta name="jajah" content="disable firefox extension">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta property="og:title" content="HRBC株式会社（エイチアールビーシー株式会社）">
<meta property="og:type" content="website">
<meta property="og:description" content="私たちは人財開発のプロフェッショナルチームです">
<meta property="og:url" content="http://hrbc.jp">
<meta property="og:image" content="http://hrbc.jp/wordpress/wp-content/themes/hrbc/img/1.jpg">
<meta property="og:site_name" content="HRBC株式会社（エイチアールビーシー株式会社）">
<link rel="stylesheet" type="text/css" href="http://hrbc.jp/wordpress/wp-content/themes/hrbc/css/common.css"/>
<style type="text/css">
.contents {
min-height: 100%;
height: 100%;
margin: 10px 0;
padding: 0 0 40px 0;
font-size: 0.8em;
line-height: 150%;
overflow: hidden;
}
p{color: rgb(6,57,104);}
.pdf{text-align:center;}
</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49442955-1', 'hrbc.jp');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>
</head>
<body>
<div class="contents">
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">  
function initialize() {
var latlng = new google.maps.LatLng(35.648974, 139.705324);
var myOptions = {
  zoom: 17,/*拡大比率*/
  center: latlng,/*表示枠内の中心点*/
  mapTypeControlOptions: { mapTypeIds: ['map', google.maps.MapTypeId.ROADMAP] }/*表示タイプの指定*/
};
var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);

/*アイコン設定▼*/
var icon = new google.maps.MarkerImage('http://hrbc.jp/wordpress/wp-content/themes/hrbc/img/ico.png',
  new google.maps.Size(131,70),/*アイコンサイズ設定*/
  new google.maps.Point(0,0)/*アイコン位置設定*/
  );
var markerOptions = {
  position: latlng,
  map: map,
  icon: icon,
  title: 'HRBC株式会社'
};
var marker = new google.maps.Marker(markerOptions);

/*
var styleOptions = [
{
  "stylers": [
  { "hue": "#004cff" },

  { "visibility": "simplified" },
  
  ]
}
];
*/
var styledMapOptions = { name: 'HRBC株式会社' }
var mapType = new google.maps.StyledMapType(styleOptions, styledMapOptions);
map.mapTypes.set('map', mapType);
map.setMapTypeId('map');
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>           
<div id="map_canvas" style="width:100%;height:400px;"></div>
<p>
HRBC株式会社<br>
〒150－0021 東京都渋谷区恵比寿西2-17-12 ENA代官山 201<br>
TEL 03−6416−4333
</p>
<p>東急東横線 代官山駅 北口より徒歩3分／東口より徒歩4分<br>
東京メトロ 日比谷線 恵比寿駅 4番出口より徒歩5分<br>
JR山手線 恵比寿駅 西口より徒歩8分</p>
<div class="pdf">
<a href="http://hrbc.jp/wordpress/wp-content/themes/hrbc/img/map.pdf" target="_blank"><img src="http://hrbc.jp/wordpress/wp-content/themes/hrbc/img/btn-map.png"></a>
</div>
</div>
</body>
</html>