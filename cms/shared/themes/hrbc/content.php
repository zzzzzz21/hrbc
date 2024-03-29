<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage HRBC株式会社

 */
?>

<main id="main" class="page">
	<header class="page__head">
		<h1 class="page__title">ちょっとイルカの話</h1>
	</header>
	<div class="breadcrumb">
		<div class="page__wrapper">
<?php if(function_exists('bcn_display')) { bcn_display();} ?>
		</div>
	</div>
	<div class="page__body">
		<div class="page__wrapper">
			<section class="page__contents--full">
				<h1 class="section__title">私たちのコーポレート・シンボル、イルカについて。</h1>
				<div class="section__body">
<p>
知的で、ユーモアがあって、コミュニケーションが得意なイルカ。<br>
HRBCのシンボルは、そんなイルカをモチーフにしています。<br>
チーム一丸となってスピーディーに泳ぎ、空中高くジャンプする！<br>
また、超音波を使ってコミュニケーションしながら情報を共有する。<br>
こうしたイルカの優れた能力は、チームワークで動き、<br>
お客様のためにライブ感あふれる人財教育を展開する<br>
私たちの理想の姿と考えています。</p>
<p>
HRBCはイルカのようなチームワークと情報共有を駆使しながら、<br>
時にユーモアを感じられる自由な発想で、<br>
これからも皆様と一緒に成長し、高め合える<br>
人財開発のプロフェッショナル集団であり続けたいと願っています。
</p>
					<p class="alignR"><img src="/common/img/img_dolphin.png" alt=""></p>
				</div>
			</section>
		</div>
	</div>
	<!-- /.page__body -->
	<div class="pagetop"><a href="#top">TOP</a></div>
</main><!-- /main -->
