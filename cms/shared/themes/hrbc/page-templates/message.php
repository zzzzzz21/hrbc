<?php
/**
 * Template Name: Message Template
 * @package WordPress
 * @subpackage HRBC株式会社
 */

get_header(); ?>
<script type="text/javascript">
//$(function() {
//	var nav = $('.cons_cont');
//	nav.hover(
//		function(){
//			nav.not(this).stop().fadeTo(300,0.4);		
//		},
//		function () {
//			nav.not(this).stop().fadeTo(300,1);
//				
//		}
//	);
//});

function smartRollover() {
	if(document.getElementsByTagName) {
		var images = document.getElementsByTagName("img");
		for(var i=0; i < images.length; i++) {
			if(images[i].getAttribute("src").match("_off."))
			{
				images[i].onmouseover = function() {
					this.setAttribute("src", this.getAttribute("src").replace("_off.", "_on."));
				}
				images[i].onmouseout = function() {
					this.setAttribute("src", this.getAttribute("src").replace("_on.", "_off."));
				}
			}
		}
	}
}
if(window.addEventListener) {
	window.addEventListener("load", smartRollover, false);
}
else if(window.attachEvent) {
	window.attachEvent("onload", smartRollover);
}

</script>
<!-- Start Contents -->

<div class="contents">
  <h1>Message</h1>

<div class="area_m">

  <p>ホームページをご覧いただき、ありがとうございます。<br />
    日々の出会いを通じて、お客様一人ひとりとご縁を深められていることをたいへん嬉しく、<br/>そして有難く感じております。</p>
  <p>毎年多くの受講者の方々と出会いを重ね、2013年には年間受講者が<br />
    念願の1万人を超え、創業時に夢みていた『 一万人の受講者と響きあう会社 』を<br />
    単年ではありますが、実現することができました。</p>
  <p>たいへん嬉しく、社内で感動を共有する、忘れられない出来事となりました。</p>
  <p>今後も毎年1万人以上のご受講者と互いに影響を与えることのできる<br />
	そんな貴重な機会（ライブ ）を大切にしていく所存です。</p>
  <p>その一方で、2008年の創業以来、教育研修を企画されるお客様のご要望の範囲が広がり、<br />
	かつその内容も深さを増してきました。</p>
  <p>そこで、新たに社名変更することで、当社の取組内容や発するメッセージを明確にしていきたいと考えました。</p>
  <p>具体的には、
  <ol>
    <li>
      私たちの専門領域は人財開発である<br />
      お客様である企業の人財（Human Resource）部門に従事されている方々と<br/>一緒になって汗をかき、知恵を出しあえる存在でありたい</li>
    <li>
      私たちは人財開発のプロフェッショナル・チームである<br />
      メンバー一人ひとりが自己の専門領域を伸ばし、尊重し、サポートしあう<br/>知的センスとユーモア溢れるプロフェッショナル・チームでありたい</li>
    <li>
      私たちは『 能力の最大発揮 』を信念とする<br />
      能力を最大限に発揮することは万人の願いであることを信念に<br/>受講者が集う『ライブ』の価値を最大限に高めることで世の中に貢献したい</li>
  </ol>
  </p>
  <p>ホームページをご覧いただいた あなたと どこかで出会い、何かをスタートさせる<br />
そんな貴重な出会いやご縁があることを心より楽しみにしております。</p>
  <p class="alignright"><img src="<?php echo get_template_directory_uri(); ?>/img/sign.png" width="150"></p>
</div>
<br>
<br>

</div>
<!-- End Contents-->

<?php get_footer(); ?>
