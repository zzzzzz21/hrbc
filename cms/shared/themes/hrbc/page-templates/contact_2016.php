<?php
/**
 * Template Name: Contact Template
 * @package WordPress
 * @subpackage HRBC株式会社
 */
get_header(); ?>



<main id="main" class="page">
	<header class="page__head">
		<div class="page__wrapper">
			<h1 class="page__title" title="Good & New">お問い合わせ</h1>
		</div>
	</header>
	<div class="breadcrumb">
		<div class="page__wrapper">
<?php if(function_exists('bcn_display')) { bcn_display();} ?>
		</div>
	</div>

	<div class="page__body">
		<section class="page__wrapper">
			<h1 class="section__title">お問い合わせフォームご利用の際の個人情報の取扱いについて</h1>
			<div class="unit">
				<div class="unit__foot">
					<div class="unit__foot--inner">
						<p class="unit__foot__lead">下記の｢個人情報の取扱いについて｣に関する事項について、ご同意される方は｢同意して問い合わせフォームへ｣を押していただき、問い合わせフォームよりお問い合わせください。</p>
						<div class="btn__unit">
							<div class="btn btn-02">
								<a href="/">同意しない</a>
							</div>
							<div class="btn btn-02">
								<a href="/contact_form/">同意してお問い合わせフォームへ</a>
							</div>
						</div>
					</div>
				</div>
				<h2 class="unit__title">［個人情報の取り扱いについて］</h2>
				<p class="unit__lead">HRBC株式会社 (以下、当社)では、個人情報の収集に関し、その利用方法について事前に本人に同意をとることとし、またその利用について適切かつ厳格な管理に努めております。お問い合わせ・ご質問にあたって、個人情報を下記のように取扱います。</p>
				<ol class="list list--num unit__body">
					<li class="list--num__item">個人情報の名称または種類<br>
					貴社名、ご担当者名、連絡先、メールアドレス等、当社ホームページで入力された情報</li>
					<li class="list--num__item">事業者の氏名または名称<br>
					HRBC株式会社　代表取締役	松下純也</li>
					<li class="list--num__item">個人情報保護管理者<br>
					HRBC株式会社　代表取締役	松下純也</li>
					<li class="list--num__item">個人情報の利用目的<br>
					お問合せ・ご相談への対応のため。</li>
					<li class="list--num__item">個人情報の第三者提供について<br>
					法令等に基づく場合は除き、第三者への提供はいたしません。</li>
					<li class="list--num__item">個人情報の取扱いの委託について<br>
					外部へ委託することはありません。</li>
					<li class="list--num__item">開示対象個人情報の開示等および問い合わせ窓口について<br>
					ご本人からの求めにより、当社が保有する開示対象個人情報の利用目的の通知・開示・内容の訂正・追加または削除・利用の停止・消去(｢開示等｣といいます。)に応じます。
					開示等に応ずる窓口は、以下の｢お問い合わせ先｣をご覧ください。</li>
					<li class="list--num__item">個人情報の共同利用について<br>
					共同利用はありません。</li>
					<li class="list--num__item">個人情報の任意性について<br>
					個人情報の提出はあくまでも任意のものですが、いただけない情報がある場合、ご要望におこたえできない場合がございます。</li>
					<li class="list--num__item">本人が容易に認識できない方法による個人情報の取得<br>
					クッキー(cookie)やWebビーコン(クリアGIF)等を用いるなどして、本人が容易に認識できない方法による個人情報の取得は行っていません。</li>
					<li class="list--num__item">個人情報の安全管理措置について<br>
					取得した個人情報については、漏洩、減失またはき損の防止と是正、その他個人情報の安全管理のために必要かつ適切な措置を講じます。
					お問い合わせへの回答後、取得した個人情報は当社内において削除いたします。
					このサイトは、SSL(Secure Socket Layer)による暗号化措置を講じています。</li>
					<li class="list--num__item">個人情報保護方針<br>
					当社における個人情報の取扱いは、当ページの内容に基づいて行います。
					<dl>
						<dt>[個人情報の取扱いに関するお問合せ先]</dt>
						<dd>
							<p>HRBC株式会社<br>
							〒150－0021 東京都渋谷区恵比寿西2-17-12 ENA代官山 201</p>
							<p>窓口：電子メールアドレス：info@hrbc.jp
							電話：03−6416−4333　FAX：03−6416−4300
							担当：個人情報保護相談窓口</p>
							<p>※電話受付時間：平日(月～金) 10：00～18：00 (土・日・祝・年末年始ほか、当社休業日にいただくお問い合わせについては、翌営業日以降の回答となりますので、ご了承ください。）</p>
						</dd>
					</dl>
					</li>
				</ol>
			</div>
		</section>
	</div>
	<!-- /.page__body -->
	<div class="pagetop"><a href="#top">TOP</a></div>
</main>

<?php get_footer(); ?>
