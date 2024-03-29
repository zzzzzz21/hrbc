<?php
/**
 * Template Name: Company Template
 * @package WordPress
 * @subpackage HRBC株式会社
 */

get_header(); ?>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
			<script type="text/javascript">  
			function initialize() {
			  var latlng = new google.maps.LatLng(35.648974, 139.705324);
			  var myOptions = {
				zoom: 17,/*拡大比率*/
				center: latlng,/*表示枠内の中心点*/
				mapTypeControlOptions: { mapTypeIds: ['sample', google.maps.MapTypeId.ROADMAP] }/*表示タイプの指定*/
			  };
			  var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
			 
			  /*アイコン設定▼*/
			  var icon = new google.maps.MarkerImage('<?php echo get_template_directory_uri(); ?>/img/ico.png',
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
			  var sampleType = new google.maps.StyledMapType(styleOptions, styledMapOptions);
			  map.mapTypes.set('sample', sampleType);
			  map.setMapTypeId('sample');
			}
			google.maps.event.addDomListener(window, 'load', initialize);
			</script>
<!-- Start Contents -->
<div class="contents">
<div class="area_comp">
<h1>Company</h1>
<div class="area_comp_left">
<h2>会社概要</h2>
<div class="comp_left_in">
<h3>会社名</h3>
<p class="comp_txt_left">HRBC株式会社（エイチアールビーシー株式会社）</p>
</div>


<div class="company_2colums_left">
<div class="comp_left_in">
<h3>設立日</h3>
<p class="comp_txt_left">2008年10月2日</p>
</div>
</div>

<div class="company_2colums_right">
<div class="comp_left_in">
<h3>資本金</h3>
<p class="">1,000万円</p>
</div>
</div>




<div class="comp_left_in">
<h3>所在地</h3>
<p class="comp_txt_left">〒150－0021 東京都渋谷区恵比寿西2-17-12 ENA代官山 201<br>
TEL 03&minus;6416&minus;4333<br>
FAX 03&minus;6416&minus;4300<br>
<br>
海外拠点<br>
Business Brain Consulting LLC<br>
307 Lewers Street Suite 208 Honolulu HI 96815</p>
</div>
<div class="comp_left_in">
<h3>役員</h3>
<p class="comp_txt_left">
<table border="0">
  <tr>
    <td width="80">代表取締役</td>
    <td>松下純也</td>
  </tr>
  <tr>
    <td>取締役</td>
    <td>迫川史康</td>
  </tr>
</table>

<!--相談役　藤井義彦--></p>
</div>
<div class="comp_left_in">
<h3>事業内容</h3>
<ol>

<li>人財開発に関する研修の企画および実施</li>
<li>人事・人財開発に関するコンサルティング</li>

</ol>
</div>
<div class="comp_left_in">
<h3>お取引先</h3>
<p class="comp_txt_left"> 国内・外資製薬会社、建設会社、住宅設備・建材メーカー、<br />

事務機器メーカー、食品・飲料メーカー、国内化学品メーカー、<br />

国内電機メーカー、IT企業、銀行・保険・金融機関、運輸会社、<br />

その他　公開セミナーなど　多数</p>
</div>
</div>
<div class="area_comp_right">
<h2>受講者数</h2>
<h3>『  毎年“1万人以上”のお客さまと響きあう会社  』</h3>
<div class="aligncenter">
<img src="<?php echo get_template_directory_uri(); ?>/img/graph.png" width="400"> </div>
<h2>MAP</h2>
<div id="map_canvas" style="width:100%;height:250px;"></div>
<p><a href="<?php echo get_template_directory_uri(); ?>/img/map.pdf" target="_blank">地図を印刷する</a></p>
<p>東急東横線 代官山駅 北口より徒歩3分／東口より徒歩4分<br>
東京メトロ 日比谷線 恵比寿駅 4番出口より徒歩5分<br>
JR山手線 恵比寿駅 西口より徒歩8分 </p>
</div>

<div class="etc_area">
<h2>ご留意事項</h2>


<p>
わたしたちは人財開発のプロフェッショナルのみの限られた人数で運営しております。<br /><br />

 

そのため<br /><br />

 

<span class="bold">・社員一人ひとりの行動変容に強い関心をお持ちのお客様</span><br />
<span class="bold">・組織における人財開発の仕組みづくりに熱心なお客様</span><br />
<span class="bold">・『この講師、この会社と一緒に仕事がしたい！』 と思っていただいたお客様</span><br /><br />

 

とご一緒に取り組んでいきたいと考えております。<br /><br />

 

したがいまして、すべてのお客様のご期待に沿えない場合がございますので、

あらかじめご了承願います。

</p>








</div>

</div>
</div>
</div>
<!-- End Contents-->
<?php get_footer(); ?>