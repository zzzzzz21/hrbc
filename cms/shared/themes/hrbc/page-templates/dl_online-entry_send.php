<?php
/**
 * Template Name: Entry Send dl_online Template
 * @package WordPress
 * @subpackage HRBC株式会社
 */
session_name('cf_hrbc');
session_start();
session_regenerate_id(true);
$referer = $_SERVER['HTTP_REFERER'];
$ref_url = parse_url($referer);
$ref_host = $ref_url['host'];
$host = $_SERVER['SERVER_NAME'];
/**
 * メール振り分け。
 * @return string - 送信先のメールアドレス
 */
function get_send_list() {
  $conf = __DIR__.'/../mail.conf.json';
  $host = $_SERVER['HTTP_HOST'];
  if (!file_exists($conf)) { throw new Exception('Not found configuration file. at '. $conf); }
  $content = file_get_contents($conf);
  $arr = json_decode($content, true);
  $result = null;
  if ($host === 'hrbc.jp') {
    $result = implode(',', $arr['pub']['to']);
  } else {
    $result = implode(',', $arr['stg']['to']);
  }
  return $result;
}

if(!isset($_SESSION['cf_hrbc']['form-field-15']) || empty($_SESSION['cf_hrbc']['form-field-15'])) {
    wp_redirect(home_url('/dl_online/'), 302);
    exit;
}
if($ref_host !== $host) {
    wp_redirect(home_url('/dl_online/'), 302);
    exit;
}
get_header();

function cf_val($key) {
    $result = '';
    if( isset($_SESSION['cf_hrbc'][$key]) ) {
        $result = $_SESSION['cf_hrbc'][$key];
    }
    return $result;
}

function get_pref() {
    $result = "";
    if( isset($_SESSION['cf_hrbc']['form-field-10']) && !empty($_SESSION['cf_hrbc']['form-field-10']) ) {
        $result = $_SESSION['cf_hrbc']['form-field-10'];
    }
    return $result;
/*
    $list = array("選択して下さい", "北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県","茨城県","栃木県","群馬県","埼玉県","千葉県","東京都","神奈川県","新潟県","富山県","石川県","福井県","山梨県","長野県","岐阜県","静岡県","愛知県","三重県","滋賀県","京都府","大阪府","兵庫県","奈良県","和歌山県","鳥取県","島根県","岡山県","広島県","山口県","徳島県","香川県","愛媛県","高知県","福岡県","佐賀県","長崎県","熊本県","大分県","宮崎県","鹿児島県","沖縄県");
    $str = '';
    $sel = 0;
    if( isset($_SESSION['cf_hrbc']['form-field-10']) && !empty($_SESSION['cf_hrbc']['form-field-10']) ) {
        $sel = (int)$_SESSION['cf_hrbc']['form-field-10'];
    }
    foreach($list as $index => $item) {
        if($index === $sel) {
            $str = $item;
        }
    }

    return $str;
*/
}

function qq($str) {
    return $str ."\r\n";
}

function change_phone($str) {
    //全角を半角に
    $str = mb_convert_kana($str,"a", "utf-8");
    //半角または全角のハイフンは取り除く
    //$str = mb_ereg_replace("-", "", $str);
    //$str = mb_ereg_replace("ー", "", $str);
    //$str = mb_ereg_replace("－", "", $str);

    return $str;
}


mb_internal_encoding('UTF-8');
//すべて受信
#extract($_POST);
//宛先作成自分のメールアドレスを$toに入れる
$to = get_send_list();
$mail1 = cf_val('form-field-15');

$from  = "From: HRBC株式会社<info@hrbc.jp>\r\n";
$from .= "Return-Path: ".$mail1;
$return = "-f ".$mail1;
//タイトル作成
$title="お申込みを受け付けました";
//本文を作成
$all = '';
$all .= qq("\r\n");
$all .= qq( "貴社名：". cf_val('form-field-01') );
$all .= qq( "部署名：". cf_val('form-field-02') );
$all .= qq( "役職：". cf_val('form-field-18') );
$all .= qq( "お名前：". cf_val('form-field-04'). ' ' .cf_val('form-field-05') );
$all .= qq( "フリガナ：". cf_val('form-field-06'). ' ' .cf_val('form-field-07') );
$all .= qq( "電話番号：". change_phone(cf_val('form-field-14')) );
$all .= qq( "メールアドレス：". cf_val('form-field-15') );

$form_field_19 = cf_val('form-field-19');
$all .= qq( "受講テーマ：");
if ($form_field_19[1]):
    $all .= qq( "　1）2020年9月26日（土） 　9：00～12：00");
    $all .= qq( "　　「部下・後輩の強みを活かすコーチング研修」");
endif;
if ($form_field_19[2]):
    $all .= qq( "　2）2020年10月10日（土）　9：00～12：00");
    $all .= qq( "　　「オンライン会議を活性化させる、効果的な進めかた」");
endif;
if ($form_field_19[3]):
    $all .= qq( "　3）2020年11月7日（土）　9：00～12：00");
    $all .= qq( "　　「合意を築く交渉・折衝力強化研修」");
endif;
if ($form_field_19[4]):
    $all .= qq( "　4）2020年12月12日（土）　9：00～12：00");
    $all .= qq( "　　「今こそ聞きたい上司とのコミュニケーション強化研修」");
endif;

$all .= qq( "合計金額（税込）：". number_format(cf_val('total')). "円" );

$all .= qq( "その他ご要望・ご質問：" );
$all .= qq( cf_val('form-field-17') );

	$title=mb_convert_encoding($title, "UTF-8", "auto");
	$all=mb_convert_encoding($all, "UTF-8", "auto");
	$sub_title = 'お申込みを受け付けました。';
	$str = '';
	//メール送信
	if(mb_send_mail($to,$title,$all,$from."\r\nBcc: iwai@hrbc.jp,chiba@hrbc.jp")){
  //if(mb_send_mail($to,$title,$all,$from."\r\nBcc: shimizu@hakarai.co.jp", $return)){
	//if(mb_send_mail($to,$title,$all,"FROM:$mail1")){
		$str .= "ご記入頂いた情報は送信されました。<br>";
        $str .= "お申込みいただき、ありがとうございました。";
	}
	else{
    	$sub_title = 'メールの送信に失敗しました。';
		$str .= "再度お申込みいただくか、お電話にてご連絡ください。<br><br>";
	}

//返信用作成
//タイトル作成
$title2="お申込みありがとうございます。";

//本文を作成
$all2 = '';
$all2 .= qq(cf_val('form-field-04'). ' ' .cf_val('form-field-05'). ' 様');
$all2 .= qq("\r\n");
$all2 .= qq('この度は2020年度 第一生命オンライン研修（HRBC主催）に');
$all2 .= qq('お申込みをいただきまして誠にありがとうございます。');
$all2 .= qq("\r\n");
$all2 .= qq('下記の通り、お申込みを受け付けました。 ');
$all2 .= qq("\r\n");
$all2 .= qq('近日中に担当者より、お支払いおよび研修の受講に関するご案内を差し上げます。');
$all2 .= qq('当日オンラインでお目にかかるのを心より楽しみにしております。');
$all2 .= qq("\r\n");
$all2 .= qq("===");
$all2 .= qq("\r\n");
$all2 .= qq( "貴社名：". cf_val('form-field-01') );
$all2 .= qq( "部署名：". cf_val('form-field-02') );
$all2 .= qq( "役職：". cf_val('form-field-18') );
$all2 .= qq( "お名前：". cf_val('form-field-04'). ' ' .cf_val('form-field-05') );
$all2 .= qq( "フリガナ：". cf_val('form-field-06'). ' ' .cf_val('form-field-07') );
$all2 .= qq( "電話番号：". change_phone(cf_val('form-field-14')) );
$all2 .= qq( "メールアドレス：". cf_val('form-field-15') );

$form_field_19 = cf_val('form-field-19');
$all2 .= qq( "受講テーマ：");
if ($form_field_19[1]):
    $all2 .= qq( "　1）2020年9月26日（土） 　9：00～12：00");
    $all2 .= qq( "　　「部下・後輩の強みを活かすコーチング研修」");
endif;
if ($form_field_19[2]):
    $all2 .= qq( "　2）2020年10月10日（土）　9：00～12：00");
    $all2 .= qq( "　　「オンライン会議を活性化させる、効果的な進めかた」");
endif;
if ($form_field_19[3]):
    $all2 .= qq( "　3）2020年11月7日（土）　9：00～12：00");
    $all2 .= qq( "　　「合意を築く交渉・折衝力強化研修」");
endif;
if ($form_field_19[4]):
    $all2 .= qq( "　4）2020年12月12日（土）　9：00～12：00");
    $all2 .= qq( "　　「今こそ聞きたい上司とのコミュニケーション強化研修」");
endif;

$all2 .= qq( "合計金額（税込）：". number_format(cf_val('total')). "円" );

$all2 .= qq( "その他ご要望・ご質問：" );
$all2 .= qq( cf_val('form-field-17') );
$all2 .= qq("\r\n");
$all2 .= qq("===");
$all2 .= qq("\r\n");

$all2 .= qq('お申込みキャンセルについて：');
$all2 .= qq('各回実施日の前日午前10時までにメール(info@hrbc.jp宛て)にてご連絡願います。');
$all2 .= qq("\r\n");
$all2 .= qq("\r\n");
$all2 .= qq('ご不明点やご要望などありました際はお気軽にお問い合わせくださいませ。');
$all2 .= qq("\r\n");
$all2 .= qq('本メールにお心あたりのない場合は、お手数ですが破棄してください。');

$sign=<<<_T

---------------------------------------------------------------
研修運営事務局
HRBC株式会社 https://hrbc.jp/
info@hrbc.jp
〒150-0021
東京都渋谷区恵比寿西2-17-12 ENA代官山201
Tel: 03-6416-4333  Fax: 03-6416-4300
---------------------------------------------------------------
_T;

$all2 .= qq($sign);


$title2=mb_convert_encoding($title2, "UTF-8", "auto");
$all2=mb_convert_encoding($all2, "UTF-8", "auto");
//送信
mb_send_mail($mail1,$title2,$all2,$from);
?>

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
		<div class="page__wrapper">
			<div class="unit complete complete--contact">
				<div class="unit__head">
					<h1 class="complete__title"><?php echo $title; ?></h1>
				</div>
				<div class="unit__body complete__body">
					<p class="img"><img src="/common/img/img_complete.png" alt=""></p>
					<p class="text"><?php echo $str; ?></p>
				</div>
				<div class="unit__foot">
					<div class="btn btn-02">
						<a href="/">Topページに戻る</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.page__body -->
	<div class="pagetop"><a href="#top">TOP</a></div>
</main><!-- /main -->

<?php
session_destroy();
$_SESSION = array();
get_footer();
?>