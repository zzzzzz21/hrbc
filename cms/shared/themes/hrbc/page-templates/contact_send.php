<?php
/**
 * Template Name: Contactsend Template
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
    wp_redirect(home_url('/contact/'), 301);
    exit;
}
if($ref_host !== $host) {
    wp_redirect(home_url('/contact/'), 301);
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

mb_internal_encoding('UTF-8');
//すべて受信
#extract($_POST);
//宛先作成自分のメールアドレスを$toに入れる
$to = get_send_list();
$from  = "From: HRBC株式会社<info@hrbc.jp>\r\n";
$from .= "Return-Path: info@hrbc.jp";

$mail1 = cf_val('form-field-15');
//タイトル作成
$title="お問い合わせを受付けました";
//本文を作成
$all = '';
$all .= qq("\r\n");
$all .= qq( "貴社名：". cf_val('form-field-01') );
$all .= qq( "部署名：". cf_val('form-field-02') );
$all .= qq( "お名前：". cf_val('form-field-04'). ' ' .cf_val('form-field-05') );
$all .= qq( "フリガナ：". cf_val('form-field-06'). ' ' .cf_val('form-field-07') );
$all .= qq( "郵便番号：". cf_val('form-field-08'). '-' .cf_val('form-field-09') );
$all .= qq( "ご住所：". get_pref(). '' .cf_val('form-field-11'). ' ' .cf_val('form-field-12'). ' ' .cf_val('form-field-13') );
$all .= qq( "電話番号：". cf_val('form-field-14') );
$all .= qq( "メールアドレス：". $mail1 );
$all .= qq( "お問い合わせ内容：". cf_val('form-field-17') );

	$title=mb_convert_encoding($title, "UTF-8", "auto");
	$all=mb_convert_encoding($all, "UTF-8", "auto");
	$sub_title = 'お問い合せを受け付けました。';
	$str = '';
	//メール送信
	if(mb_send_mail($to,$title,$all,$from)){
	//if(mb_send_mail($to,$title,$all,"FROM:$mail1")){
		$str .= "ご記入頂いた情報は送信されました。<br>";
        $str .= "お問い合せいただき、ありがとうございました。";
	}
	else{
    	$sub_title = 'メールの送信に失敗しました。';
		$str .= "再度お問い合わせいただくか、お電話にてご連絡ください。<br><br>";
	}

//返信用作成
//タイトル作成
$title2="お問い合わせありがとうございます。";

//本文を作成
$all2 = '';
$all2 .= qq('このメールは自動送信です。');
$all2 .= qq('このたびはお問い合わせいただき、誠にありがとうございます。');
$all2 .= qq('今一度ご入力内容をご確認いただきますようよろしくお願いいたします。');
$all2 .= qq("\r\n");
$all2 .= qq(cf_val('form-field-04'). ' ' .cf_val('form-field-05'). ' 様');
$all2 .= qq("\r\n\r\n");
$all2 .= qq( "貴社名：". cf_val('form-field-01') );
$all2 .= qq( "部署名：". cf_val('form-field-02') );
$all2 .= qq( "郵便番号：". cf_val('form-field-08'). '-' .cf_val('form-field-09') );
$all2 .= qq( "ご住所：". get_pref(). '' .cf_val('form-field-11'). ' ' .cf_val('form-field-12'). ' ' .cf_val('form-field-13') );
$all2 .= qq( "電話番号：". cf_val('form-field-14') );
$all2 .= qq( "メールアドレス：". cf_val('form-field-15') );
$all2 .= qq( "お問い合わせ内容：". cf_val('form-field-17') );
$all2 .= qq("\r\n");
$all2 .= qq('担当者よりご連絡させていただきますので今しばらくお待ちいただきますようよろしくお願いいたします。');

$sign=<<<_T


--------------------
HRBC株式会社
http://hrbc.jp
--------------------
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
			<h1 class="page__title" title="Good & New">お問い合わせ</h1>
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