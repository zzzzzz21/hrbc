<?php
/**
 * Template Name: Entry dl_online Template
 * @package WordPress
 * @subpackage HRBC株式会社
 */
get_header(); ?>


<style>
  .section__title--sub { font-size: 13px; font-weight: normal; }
</style>
<main id="main" class="page">
	<header class="page__head">
		<div class="page__wrapper">
			<h1 class="page__title" title="Good & New">お申込み</h1>
		</div>
	</header>
	<div class="breadcrumb">
		<div class="page__wrapper">
<?php if(function_exists('bcn_display')) { bcn_display();} ?>
		</div>
	</div>

	<div class="page__body">
		<section class="page__wrapper">
       <h1 class="section__title">
        2020年度 第一生命オンライン研修（HRBC主催）<br>
        <span class="section__title--sub">お申込みに際する個人情報の取扱い及び特定商取引法に関する表記について</span>
      </h1>
			<div class="unit">
				<div class="unit__foot">
					<div class="unit__foot--inner">
            <p class="unit__foot__lead">下記の「個人情報の取扱いについて」および「特定商取引法に関する表記について」に記載の事項に関して、ご同意される方は「同意してお申込みフォームへ」を押していただき、必要事項をご記入ください。</p>
						<div class="btn__unit">
							<div class="btn btn-02">
								<a href="/">同意しない</a>
							</div>
							<div class="btn btn-02">
								<a href="<?php echo esc_url(home_url('dl_online_form')); ?>">同意してお申込みフォームへ</a>
							</div>
						</div>
					</div>
				</div>
				<h2 class="unit__title">［個人情報の取り扱いについて］</h2>
				<p class="unit__lead">HRBC株式会社 (以下、当社)では、個人情報の収集に関し、その利用方法について事前に本人に同意をとることとし、またその利用について適切かつ厳格な管理に努めております。お申込み・ご質問にあたって、個人情報を下記のように取扱います。</p>
				<ol class="list list--num unit__body">
					<li class="list--num__item">個人情報の名称または種類<br>
					貴社名、お名前、連絡先、メールアドレス等、当社ホームページで入力された情報</li>
					<li class="list--num__item">事業者の氏名または名称<br>
					HRBC株式会社　代表取締役	迫川史康</li>
					<li class="list--num__item">個人情報保護管理者<br>
					HRBC株式会社　代表取締役	迫川史康</li>
					<li class="list--num__item">個人情報の利用目的<br>
					お問合せ・ご相談への対応のため。</li>
					<li class="list--num__item">個人情報の第三者提供について<br>
					法令等に基づく場合は除き、第三者への提供はいたしません。</li>
					<li class="list--num__item">個人情報の取扱いの委託について<br>
					外部へ委託することはありません。</li>
					<li class="list--num__item">開示対象個人情報の開示等および申込み窓口について<br>
					ご本人からの求めにより、当社が保有する開示対象個人情報の利用目的の通知・開示・内容の訂正・追加または削除・利用の停止・消去(｢開示等｣といいます。)に応じます。
					開示等に応ずる窓口は、以下の｢お申込み先｣をご覧ください。</li>
					<li class="list--num__item">個人情報の共同利用について<br>
					共同利用はありません。</li>
					<li class="list--num__item">個人情報の任意性について<br>
					個人情報の提出はあくまでも任意のものですが、いただけない情報がある場合、ご要望におこたえできない場合がございます。</li>
					<li class="list--num__item">本人が容易に認識できない方法による個人情報の取得<br>
					クッキー(cookie)やWebビーコン(クリアGIF)等を用いるなどして、本人が容易に認識できない方法による個人情報の取得は行っていません。</li>
					<li class="list--num__item">個人情報の安全管理措置について<br>
					取得した個人情報については、漏洩、減失またはき損の防止と是正、その他個人情報の安全管理のために必要かつ適切な措置を講じます。
					お申込みへの回答後、取得した個人情報は当社内において削除いたします。
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
							<p>※電話受付時間：平日(月～金) 10：00～18：00 (土・日・祝・年末年始ほか、当社休業日にいただくお申込みについては、翌営業日以降の回答となりますので、ご了承ください。）</p>
						</dd>
					</dl>
					</li>
				</ol>
        <br>
        <br>
        <h2 class="unit__title">［特定商取引法に関する表記について］</h2>
        <div class="list list--num unit__body">
          <p class="" style="padding-left: 2em;"><label>事業者：</label>ＨＲＢＣ株式会社<br>
            <br>
            代表者：代表取締役　迫川史康<br>
            <br>
            ホームページ：<a href="https://hrbc.jp/" target="_blank">https://hrbc.jp/</a><br>
            <br>
            メールアドレス：info@hrbc.jp<br>
            <br>
            所在地：〒150－0021 東京都渋谷区恵比寿西2-17-12 ENA代官山 201<br>
            <br>
            電話番号：03 - 6416 - 4333<br>
            <br>
            役務提供時期：<br>
            　テーマ１：部下・後輩の強みを活かすコーチング研修<br>
            　　　　　　2020年9月26日（土）　9：00～12：00<br>
            　　　　　　オンライン開催（Zoom）<br>
            　テーマ２：オンライン会議を活性化させる、効果的な進めかた<br>
            　　　　　　2020年10月10日（土）　9：00～12：00<br>
            　　　　　　オンライン開催（Zoom）<br>
            　テーマ３：合意を築く交渉・折衝力強化研修<br>
            　　　　　　2020年11月7日（土）　9：00～12：00<br>
            　　　　　　オンライン開催（Zoom）<br>
            　テーマ４：今こそ聞きたい上司とのコミュニケーション強化研修<br>
            　　　　　　2020年12月12日（土）　9：00～12：00<br>
            　　　　　　オンライン開催（Zoom）<br>
            　なお、<br>
            　　　・最少催行人数が6名未満の場合<br>
            　　　・定員が30名を超えた場合<br>
            　　　・費用支払期限までにお振込みがない場合<br>
            　には受講をお断りさせていただく場合がございます。<br>
            <br>
            申込方法：別途指定のＵＲＬより申込<br>
            <br>
            申込期限：各回の１週間前まで<br>
            <br>
            費用：各回1名あたり22,000円（税込）<br>
            <br>
            費用の支払方法：銀行振込<br>
            　　　　　　　　※恐れ入りますが、振込手数料はご自身にてご負担ください。<br>
            <br>
            費用の支払時期：振込先のご案内から2週間以内（最終支払期限は申込回実施の５営業日前）<br>
            <br>
            費用以外に必要な費用：オンラインで受講する環境に関する費用（通信費など）は、ご自身にてご負担ください。<br>
            <br>
            受講者からのキャンセル申込：各回実施日の前日午前10時までにメール(info@hrbc.jp宛て)にてご連絡願います。<br>
            <br>
            受講者からのキャンセル申込による返金：各回実施日の前日午前10時までにメールにてキャンセルのご連絡いただいた場合は費用（税込）から振込手数料を差し引いた金額をご返金します。それ以降のキャンセルの場合、キャンセル料金として研修プログラム料金の全額をご負担いただきます。<br>
            <br>
            弊社都合による非開催の場合の返金：最少催行人数に満たなかった場合やその他弊社都合により非開催となった場合は、非開催回分の費用（税込）をご返金します。<br>
            <br>
            ソフトウェアを使用するための動作環境：<br>
            Zoomによる研修となりますので、Zoom動作環境をご確認ください。
          </p>
        </div>


			</div>
		</section>
	</div>
	<!-- /.page__body -->
	<div class="pagetop"><a href="#top">TOP</a></div>
</main>

<?php get_footer(); ?>
