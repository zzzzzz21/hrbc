<?php
/**
 * Template Name: Entry Check dl_online Template
 * @package WordPress
 * @subpackage HRBC株式会社
 */
session_name('cf_hrbc');
session_start();
session_regenerate_id(true);

get_header();

function str_conv($str) {
    return filter_var($str, FILTER_SANITAIZE_FULL_SPECIAL_CHARS);
}

function filter_post($name) {
    return filter_input(INPUT_POST, $name);
}

function cf_val($key, $html = false) {
    if( isset($_SESSION['cf_hrbc'][$key]) ) {
        $str = $_SESSION['cf_hrbc'][$key];
        if($html) {
            $str = htmlspecialchars($str);
            $str = preg_replace('/(\r)\n/', '<br>', $str);
        }
        echo $str;
    }
}
function pref_list() {
    $list = array("選択して下さい", "北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県","茨城県","栃木県","群馬県","埼玉県","千葉県","東京都","神奈川県","新潟県","富山県","石川県","福井県","山梨県","長野県","岐阜県","静岡県","愛知県","三重県","滋賀県","京都府","大阪府","兵庫県","奈良県","和歌山県","鳥取県","島根県","岡山県","広島県","山口県","徳島県","香川県","愛媛県","高知県","福岡県","佐賀県","長崎県","熊本県","大分県","宮崎県","鹿児島県","沖縄県");
    $str = '';
    $str .= '<select title="選択してください" name="form-field-10" class="form__input input--pref" id="form-field-10">';
    $sel = 0;
    if( isset($_SESSION['cf_hrbc']['form-field-10']) && !empty($_SESSION['cf_hrbc']['form-field-10']) ) {
        $sel = (int)$_SESSION['cf_hrbc']['form-field-10'];
    }
    foreach($list as $index => $item) {
        if($index === $sel) {
            $str .= '<option value="'.$index.'" selected="selected">'.$item.'</option>';
        } else {
            $str .= '<option value="'.$index.'">'.$item.'</option>';
        }
    }
    $str .= '</select>';

    echo $str;
}
function get_pref() {
    $result = "";
    if( isset($_SESSION['cf_hrbc']['form-field-10']) && !empty($_SESSION['cf_hrbc']['form-field-10']) ) {
        $result = $_SESSION['cf_hrbc']['form-field-10'];
    }
    echo $result;
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

    echo $str;
*/
}


/**
 * フリガナチェック
 */
function is_valid_kana($str) {
    $result = false;
    if(preg_match('/^[ァ-ヶーぁ-ん]+$/u',$str)) { $result = $str; }

    return $result;
}

function is_valid_str($str) {
    $tmp = str_conv($str);
    return $tmp;
}

function is_valid_email($str) {
    return filter_var($str, FILTER_VALIDATE_EMAIL) && !preg_match('/@\[[^\]]++\]\z/', $str);
}

function is_valid_email_confirm($str) {
    return filter_var($str, FILTER_VALIDATE_EMAIL) && ($_POST['form-field-15'] === $str);
}

function is_valid_phone($str) {
//    $result = false;
//    if( preg_match('/\A\d{2,4}+-\d{2,4}+-\d{4}\z/', $str) ) { $result = $str; }
//
//    return $result;

    //全角を半角に
    $str = mb_convert_kana($str,"a", "utf-8");
    //半角または全角のハイフンは取り除く
    $str = mb_ereg_replace("-", "", $str);
    $str = mb_ereg_replace("ー", "", $str);
    $str = mb_ereg_replace("－", "", $str);

    //数字であり、かつ10桁もしくは9桁かチェック
    if(ctype_digit($str) AND (strlen($str) == 10 OR strlen($str)== 11)){
        return true;
    } else {
        return false;
    }
}

$error_list = array();
$result = null;

if($_SERVER['REQUEST_METHOD'] === "POST") {

    $options = array(
        'form-field-01' => FILTER_SANITIZE_ENCODED,     // 貴社名
        'form-field-02' => FILTER_SANITIZE_ENCODED,     // 部署名
        'form-field-04' => FILTER_SANITIZE_ENCODED,     // 性
        'form-field-05' => FILTER_SANITIZE_ENCODED,     // 名
        'form-field-06' => array(
            'filter' => FILTER_CALLBACK,
            'options' => 'is_valid_kana',
        ),     // セイ
        'form-field-07' => array(
            'filter' => FILTER_CALLBACK,
            'options' => 'is_valid_kana',
        ),     // メイ
/*
        'form-field-08' => FILTER_SANITIZE_ENCODED,     // 郵便番号1
        'form-field-09' => FILTER_SANITIZE_ENCODED,     // 郵便番号2
        'form-field-10' => FILTER_VALIDATE_INT,         // 都道府県
        'form-field-11' => FILTER_SANITIZE_ENCODED,     // 市区町村
        'form-field-12' => FILTER_SANITIZE_ENCODED,     // 町名・番地
        'form-field-13' => FILTER_SANITIZE_ENCODED,     // ビル名など
*/
        'form-field-14' => array(
            'filter' => FILTER_CALLBACK,
            'options' => 'is_valid_phone',
        ),     // 電話番号
        'form-field-15' => FILTER_VALIDATE_EMAIL,       // E-Mail
        'form-field-16' => array(
            'filter' => FILTER_CALLBACK,
            'options' => 'is_valid_email_confirm'
        ),       // E-Mail2
//        'form-field-17' => FILTER_SANITIZE_ENCODED,     // 内容
//        'form-field-18' => FILTER_DEFAULT,            // 役職
//        'form-field-19' => FILTER_REQUIRE_ARRAY,      // 受講テーマ
    );

    $result = filter_input_array(INPUT_POST, $options);
    $_SESSION['cf_hrbc'] = $_POST;

    foreach($result as $key => $item) {
        if(empty($item)) {
            $error_list[$key] = true;
        }
    }

    $error_19 = true;
    $error_list["form-field-19"] = true;
    if (isset($_SESSION['cf_hrbc']['form-field-19'])) {
        foreach ($_SESSION['cf_hrbc']['form-field-19'] as $val) {
            if ($val) {
              unset($error_list["form-field-19"]);
              $error_19 = false;
            }
        }
    }

}
/*
if(!isset($_SESSION['cf_hrbc']['form-field-15']) || empty($_SESSION['cf_hrbc']['form-field-15'])) {
    wp_redirect(home_url('/contact/'), 301);
    exit;
}
*/

function is_form_error($args, $msg = '') {
    global $error_list;
    if( is_array($args) ) {
        foreach($args as $name) {
            if( isset($error_list[$name]) ) {
                if(isset($msg) && !empty($msg)) {
                    echo '<p id="'.$name.'__error" class="input__error '.$name.'">'.$msg.'</p>';
                } else {
                    echo ' is--error';
                }
                break;
            }
        }
    } elseif( is_string($args) ) {
        if( isset($error_list[$args]) ) {
            if(isset($msg) && !empty($msg)) {
                echo '<p id="'.$args.'__error" class="input__error '.$args.'">'.$msg.'</p>';
            } else {
                echo ' is--error';
            }
        }
    }
}

function form_value($key, $conv = false) {
    global $result;
    if(!isset($result[$key]) || empty($result[$key])) return '';

    if($conv) {
        echo htmlspecialchars($_SESSION['cf_hrbc'][$key]);
    } else {
        echo $_SESSION['cf_hrbc'][$key];
    }
    #echo $result[$key];
}

function form_hidden() {
    global $result;
    if(!isset($result) || empty($result)) return false;

    foreach($result as $key => $item) {
        echo '<input type="hidden" name="cf-'.$key.'" value="'.$item.'">';
    }
}

function has_error() {
    global $error_list;
    return (count($error_list) > 0);
}

?>

<style>
  .form__item .form__order {
    height: 100px;
    overflow-y: scroll;
    display: block;
    border: 1px solid #a3a3a3;
    background: #f3f3f3;
    padding: 6px;
    margin-bottom: 10px;
  }
  .font-weight-bold {
    font-weight: bold;
    font-size: 1.1em;
  }
  .calc_result {
    margin-top: 10px;
    margin-bottom: 10px;
  }
  .calc_result > div {
    text-align: right;
    font-size: 1.2rem;
  }
  .btn-margin-top-10 {
    margin-top: 10px;
  }
  .calc__area > label {
    margin-bottom: 1em;
    display: inline-block;
  }
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
			<h1 class="section__title">お申込みフォーム</h1>
			<div class="unit">
				<div class="unit__lead">
					<ul class="list list--disc">
						<li class="list--disc__item"><span class="is--required">※</span>必須項目となります。</li>
						<li class="list--disc__item">メールアドレスには、受信可能なアドレスをご入力ください</li>
						<li class="list--disc__item">各項目に入力後、[内容を確認する]ボタンを押してください</li>
					</ul>
				</div>
				<pre>
				<?php #var_dump($result); ?>
				</pre>
				<div class="unit__body">
					<div class="form">
    					<?php
        				$action = esc_url( home_url('/') );
        				if(has_error()) {
            				$action .= 'dl_online_check';
        				} else {
            				$action .= 'dl_online_send';
        				}
        				?>
						<form class="form--contact" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    						<?php if(has_error()): ?>
							<dl class="form__unit required<?php is_form_error('form-field-01'); ?>">
								<dt class="form__label">
									<label for="form-field-01">貴社名　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<input type="text" title="貴社名を記入してください" value="<?php form_value('form-field-01'); ?>" name="form-field-01" class="form__input input--text" id="form-field-01">
									<span class="input--example">例）HRBC株式会社</span>
									<?php is_form_error('form-field-01', '入力エラー：貴社名を記入してください'); ?>
								</dd>
							</dl>
							<dl class="form__unit required<?php is_form_error('form-field-02'); ?>">
								<dt class="form__label">
									<label for="form-field-02">部署名　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<input type="text" title="部署名を記入してください" value="<?php form_value('form-field-02'); ?>" name="form-field-02" class="form__input input--text" id="form-field-02">
									<span class="input--example">例）人事部　※なければ「なし」</span>
									<?php is_form_error('form-field-02', '入力エラー：部署名を記入してください') ?>
								</dd>
							</dl>
              <dl class="form__unit<?php is_form_error('form-field-18'); ?>">
                <dt class="form__label">
                  <label for="form-field-18">役職</label>
                </dt>
                <dd class="form__item">
                  <input type="text" title="役職を記入してください" value="<?php cf_val('form-field-18'); ?>" name="form-field-18" class="form__input input--text" id="form-field-18">
                  <span class="input--example">例）部長</span>
                  <?php is_form_error('form-field-18', '入力エラー：役職を記入してください') ?>
                </dd>
              </dl>
							<dl class="form__unit required<?php is_form_error(array('form-field-04', 'form-field-05')); ?>">
								<dt class="form__label">
									<label for="form-field-04">お名前　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<ul class="item__multiple">
										<li>
											<label for="form-field-04" class="label--name">姓</label>
											<input type="text" title="お名前（姓）を記入してください" value="<?php form_value('form-field-04'); ?>" name="form-field-04" class="form__input input--name" id="form-field-04">
										</li>
										<li>
											<label for="form-field-05" class="label--name">名</label>
											<input type="text" title="お名前（名）を記入してください" value="<?php form_value('form-field-05'); ?>" name="form-field-05" class="form__input input--name" id="form-field-05">
										</li>
									</ul>
									<?php is_form_error('form-field-04', '入力エラー：お名前（姓）を記入してください'); ?>
									<?php is_form_error('form-field-05', '入力エラー：お名前（名）を記入してください'); ?>
								</dd>
							</dl>
							<dl class="form__unit required<?php is_form_error(array('form-field-06', 'form-field-07')); ?>">
								<dt class="form__label">
									<label for="form-field-06">フリガナ　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<ul class="item__multiple">
										<li>
											<label for="form-field-06" class="label--name">セイ</label>
											<input type="text" title="フリガナ（セイ）を記入してください" value="<?php form_value('form-field-06'); ?>" name="form-field-06" class="form__input input--name" id="form-field-06">
										</li>
										<li>
											<label for="form-field-07" class="label--name">メイ</label>
											<input type="text" title="フリガナ（メイ）を記入してください" value="<?php form_value('form-field-07'); ?>" name="form-field-07" class="form__input input--name" id="form-field-07">
										</li>
									</ul>
									<?php is_form_error('form-field-06', '入力エラー：フリガナ（セイ）を記入してください'); ?>
									<?php is_form_error('form-field-07', '入力エラー：フリガナ（メイ）を記入してください'); ?>
								</dd>
							</dl>
              <?php /* ?>
							<dl class="form__unit">
								<dt class="form__label">
									<label for="form-field-08">郵便番号</label>
								</dt>
								<dd class="form__item">
									<ul class="zipcode item__multiple">
										<li>
											<input type="text" title="郵便番号（上3ケタ）を記入してください" value="<?php form_value('form-field-08'); ?>" name="form-field-08" class="form__input input--zip validation validation--num" id="form-field-08">
										</li>
										<li>
											<input type="text" title="郵便番号（下4ケタ）を記入してください" value="<?php form_value('form-field-09'); ?>" name="form-field-09" class="form__input input--zip validation validation--num" id="form-field-09">
										</li>
									</ul>
								</dd>
							</dl>
							<dl class="form__unit">
								<dt class="form__label">
									<label for="form-field-10">都道府県</label>
								</dt>
								<dd class="form__item">
								<?php pref_list(); ?>
								</dd>
							</dl>
							<dl class="form__unit">
								<dt class="form__label">
									<label for="form-field-11">市区町村</label>
								</dt>
								<dd class="form__item">
									<input type="text" title="市区町村を記入してください" value="<?php form_value('form-field-11'); ?>" name="form-field-11" class="form__input input--text" id="form-field-11">
									<span class="input--example">例）渋谷区</span>
									<p id="form-field-11__error" class="input__error form-field-11"></p>
								</dd>
							</dl>
							<dl class="form__unit">
								<dt class="form__label">
									<label for="form-field-12">町名・番地</label>
								</dt>
								<dd class="form__item">
									<input type="text" title="町名・番地を記入してください" value="<?php form_value('form-field-12'); ?>" name="form-field-12" class="form__input input--text" id="form-field-12">
									<span class="input--example">例）恵比寿西2-17-12</span>
									<p id="form-field-12__error" class="input__error form-field-12"></p>
								</dd>
							</dl>
							<dl class="form__unit">
								<dt class="form__label">
									<label for="form-field-13">ビル名など</label>
								</dt>
								<dd class="form__item">
									<input type="text" title="ビル名などを記入してください" value="<?php form_value('form-field-13'); ?>" name="form-field-13" class="form__input input--text" id="form-field-13">
									<span class="input--example">例）ENA代官山201</span>
									<p id="form-field-13__error" class="input__error form-field-13"></p>
								</dd>
							</dl>
              <?php */ ?>
							<dl class="form__unit required<?php is_form_error('form-field-14'); ?>">
								<dt class="form__label">
									<label for="form-field-14">電話番号　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<input type="text" title="電話番号を記入してください" value="<?php form_value('form-field-14'); ?>" name="form-field-14" class="form__input input--tel validation validation--num" id="form-field-14">
									<span class="input--example">例）03-6416-4333　※半角英数</span>
									<?php is_form_error('form-field-14', '入力エラー：電話番号を半角数字で記入してください'); ?>
								</dd>
							</dl>
							<dl class="form__unit required<?php is_form_error(array('form-field-15', 'form-field-16')); ?>">
								<dt class="form__label">
									<label for="form-field-15">メールアドレス　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<input type="text" title="メールアドレス（半角英数のみ）を記入してください" value="<?php form_value('form-field-15'); ?>" name="form-field-15" class="form__input input--email validation validation--email" id="form-field-15">
									<span class="input--example">例）youraccount@yourdomain.com</span>

									<label for="form-field-16" class="label__confirm">確認のためにもう一度入力してください。</label>
									<input type="text" title="メールアドレス（半角英数のみ）を記入してください" value="<?php form_value('form-field-16'); ?>" name="form-field-16" class="form__input input--email validation validation--email" id="form-field-16">

                                    <?php is_form_error(array('form-field-15','form-field-16'), '入力エラー：メールアドレスを半角英数字で記入してください'); ?>
								</dd>
							</dl>

                  <dl class="form__unit required<?php is_form_error('form-field-19'); ?>">
                    <dt class="form__label">
                      <label for="form-field-19">受講テーマ　<span class="label__required">※必須</span></label>
                    </dt>
                    <dd class="form__item calc__area">
                      <input type="hidden" value="" name="form-field-19[1]">
                      <input type="hidden" value="" name="form-field-19[2]">
                      <input type="hidden" value="" name="form-field-19[3]">
                      <input type="hidden" value="" name="form-field-19[4]">
                      <label for="form-field-19_1" class="">
                        <input type="checkbox" value="1" name="form-field-19[1]" class="" data-price="20000" id="form-field-19_1" <?php echo ($_SESSION['cf_hrbc']['form-field-19'][1] ? 'checked' : ''); ?>>
                        1）2020年9月26日（土） 　9：00～12：00<br>
                        　　<span class="font-weight-bold">「部下・後輩の強みを活かすコーチング研修」</span><br>
                        　　　推奨層：中堅層 ～ 管理職層<br>
                        　　　費用　：20,000円（税抜）</label><br>
                      <label for="form-field-19_2" class="">
                        <input type="checkbox" value="2" name="form-field-19[2]" class="" data-price="20000" id="form-field-19_2" <?php echo ($_SESSION['cf_hrbc']['form-field-19'][2] ? 'checked' : ''); ?>>
                        2）2020年10月10日（土）　9：00～12：00<br>
                        　　<span class="font-weight-bold">「オンライン会議を活性化させる、効果的な進めかた」</span><br>
                        　　　推奨層：中堅層 ～ 管理職層<br>
                        　　　費用　：20,000円（税抜）</label><br>
                      <label for="form-field-19_3" class="">
                        <input type="checkbox" value="3" name="form-field-19[3]" class="" data-price="20000" id="form-field-19_3" <?php echo ($_SESSION['cf_hrbc']['form-field-19'][3] ? 'checked' : ''); ?>>
                        3）2020年11月7日（土）　9：00～12：00<br>
                        　　<span class="font-weight-bold">「合意を築く交渉・折衝力強化研修」</span><br>
                        　　　推奨層：若手層 ～ 管理職層<br>
                        　　　費用　：20,000円（税抜）</label><br>
                      <label for="form-field-19_4" class="">
                        <input type="checkbox" value="4" name="form-field-19[4]" class="" data-price="20000" id="form-field-19_4" <?php echo ($_SESSION['cf_hrbc']['form-field-19'][4] ? 'checked' : ''); ?>>
                        4）2020年12月12日（土）　9：00～12：00<br>
                        　　<span class="font-weight-bold">「今こそ聞きたい上司とのコミュニケーション強化研修」</span><br>
                        　　　推奨層：若手層 ～ 中堅層<br>
                        　　　費用　：20,000円（税抜）</label><br>
                      <div class="calc_result" style="margin-top:10px;margin-bottom:10px;">
                        <div style="text-align: right;font-size: 1.2rem;">
                          <label>費用：</label><span id="subtotal">0</span>円（税込：<span id="total">0</span>円）
                          <input type="hidden" name="total" value="">
                          <input type="hidden" name="subtotal" value="">
                        </div>
                      </div>
                      <div class="btn btn-01 btn-margin-top-10" style="margin-top: 10px;">
                        <a href="/common/files/2020_dl_online.pdf" target="_blank">プログラム概要を確認する</a>
                      </div>
                      <?php is_form_error('form-field-19', '入力エラー：受講テーマを１つ以上選択してください'); ?>
<!--                      --><?php //is_form_error('form-field-19', '入力エラー：受講テーマを１つ以上選択してください'); ?>
                    </dd>
                  </dl>

							<dl class="form__unit <?php is_form_error('form-field-17'); ?>">
								<dt class="form__label">
									<label for="form-field-17">その他ご要望・ご質問
								</dt>
								<dd class="form__item">
									<textarea title="その他ご要望・ご質問を記入してください" name="form-field-17" class="form__input form__textarea input--text" id="form-field-17"><?php cf_val('form-field-17'); ?></textarea>
									<?php is_form_error('form-field-17', '入力エラー：その他ご要望・ご質問を記入してください'); ?>
								</dd>
							</dl>

							<!-- button -->
							<div class="btn__unit">
								<div class="btn btn-02">
									<a href="/dl_online_form/">戻って修正する</a>
								</div>
    							<div class="btn btn-02">
    								<a href="#" onclick="document.getElementsByTagName('form')[0].submit();">内容を確認する</a>
    							</div>
							</div>
							<!-- /button -->
							<?php else: # else has_error() ?>

							<dl class="form__unit required">
								<dt class="form__label">
									貴社名　<span class="label__required">※必須</span>
								</dt>
								<dd class="form__item">
									<span class="input--confirm"><?php cf_val('form-field-01', true); ?></span>
							</dl>
							<dl class="form__unit required">
								<dt class="form__label">
									部署名　<span class="label__required">※必須</span>
								</dt>
								<dd class="form__item">
									<span class="input--confirm"><?php cf_val('form-field-02', true); ?></span>
								</dd>
							</dl>
              <dl class="form__unit">
                <dt class="form__label">
                  <label for="form-field-18">役職</label>
                </dt>
                <dd class="form__item">
                  <span class="input--confirm"><?php cf_val('form-field-18', true); ?></span>
                </dd>
              </dl>
							<dl class="form__unit required">
								<dt class="form__label">
									お名前　<span class="label__required">※必須</span>
								</dt>
								<dd class="form__item">
									<ul class="item__multiple">
										<li>
											<span class="input--confirm"><?php cf_val('form-field-04', true); ?></span>
										</li>
										<li>
											<span class="input--confirm"><?php cf_val('form-field-05', true); ?></span>
										</li>
									</ul>
								</dd>
							</dl>
							<dl class="form__unit required">
								<dt class="form__label">
									フリガナ　<span class="label__required">※必須</span>
								</dt>
								<dd class="form__item">
									<ul class="item__multiple">
										<li>
											<span class="input--confirm"><?php cf_val('form-field-06', true); ?></span>
										</li>
										<li>
											<span class="input--confirm"><?php cf_val('form-field-07', true); ?></span>
										</li>
									</ul>
								</dd>
							</dl>
              <?php /* ?>
							<dl class="form__unit">
								<dt class="form__label">
									郵便番号
								</dt>
								<dd class="form__item">
									<span class="input--confirm"><?php cf_val('form-field-08', true); ?>-<?php cf_val('form-field-09', true); ?></span>
								</dd>
							</dl>
							<dl class="form__unit">
								<dt class="form__label">
									都道府県
								</dt>
								<dd class="form__item">
									<span class="input--confirm"><?php get_pref(); ?></span>
								</dd>
							</dl>
							<dl class="form__unit">
								<dt class="form__label">
									市区町村
								</dt>
								<dd class="form__item">
									<span class="input--confirm"><?php cf_val('form-field-11', true); ?></span>
								</dd>
							</dl>
							<dl class="form__unit">
								<dt class="form__label">
									町名・番地
								</dt>
								<dd class="form__item">
									<span class="input--confirm"><?php cf_val('form-field-12', true); ?></span>
								</dd>
							</dl>
							<dl class="form__unit">
								<dt class="form__label">
									ビル名など
								</dt>
								<dd class="form__item">
									<span class="input--confirm"><?php cf_val('form-field-13', true); ?></span>
								</dd>
							</dl>
              <?php */ ?>
							<dl class="form__unit required">
								<dt class="form__label">
									電話番号　<span class="label__required">※必須</span>
								</dt>
								<dd class="form__item">
									<span class="input--confirm"><?php cf_val('form-field-14'); ?></span>
								</dd>
							</dl>
							<dl class="form__unit required">
								<dt class="form__label">
									メールアドレス　<span class="label__required">※必須</span>
								</dt>
								<dd class="form__item">
									<span class="input--confirm"><?php cf_val('form-field-15'); ?></span>
								</dd>
							</dl>

                  <dl class="form__unit required">
                    <dt class="form__label">
                      <label for="form-field-19">受講テーマ　<span class="label__required">※必須</span></label>
                    </dt>
                    <dd class="form__item calc__area">

                      <?php if ($_SESSION['cf_hrbc']['form-field-19'][1]): ?>
                      <label for="form-field-19_1" class="">1）2020年9月26日（土） 　9：00～12：00<br>
                        　　<span class="font-weight-bold">「部下・後輩の強みを活かすコーチング研修」</span><br>
                        　　　推奨層：中堅層 ～ 管理職層<br>
                        　　　費用　：20,000円（税抜）</label><br>
                      <?php endif; ?>
                      <?php if ($_SESSION['cf_hrbc']['form-field-19'][2]): ?>
                      <label for="form-field-19_2" class="">2）2020年10月10日（土）　9：00～12：00<br>
                        　　<span class="font-weight-bold">「オンライン会議を活性化させる、効果的な進めかた」</span><br>
                        　　　推奨層：中堅層 ～ 管理職層<br>
                        　　　費用　：20,000円（税抜）</label><br>
                      <?php endif; ?>
                      <?php if ($_SESSION['cf_hrbc']['form-field-19'][3]): ?>
                      <label for="form-field-19_3" class="">3）2020年11月7日（土）　9：00～12：00<br>
                        　　<span class="font-weight-bold">「合意を築く交渉・折衝力強化研修」</span><br>
                        　　　推奨層：若手層 ～ 管理職層<br>
                        　　　費用　：20,000円（税抜）</label><br>
                      <?php endif; ?>
                      <?php if ($_SESSION['cf_hrbc']['form-field-19'][4]): ?>
                      <label for="form-field-19_4" class="">4）2020年12月12日（土）　9：00～12：00<br>
                        　　<span class="font-weight-bold">「今こそ聞きたい上司とのコミュニケーション強化研修」</span><br>
                        　　　推奨層：若手層 ～ 中堅層<br>
                        　　　費用　：20,000円（税抜）</label><br>
                      <?php endif; ?>
                      <div class="calc_resulted" style="margin-top:10px;margin-bottom:10px;">
                        <div style="text-align: right;font-size: 1.2rem;">
                          <label>費用：</label><span><?php echo number_format($_SESSION['cf_hrbc']['subtotal']); ?></span>円（税込：<span><?php echo number_format($_SESSION['cf_hrbc']['total']); ?></span>円）
                        </div>
                      </div>
                      <div class="btn btn-01 btn-margin-top-10" style="margin-top: 10px;">
                        <a href="/common/files/2020_dl_online.pdf" target="_blank">プログラム概要を確認する</a>
                      </div>
                    </dd>
                  </dl>

							<dl class="form__unit">
								<dt class="form__label">
                  その他ご要望・ご質問
								</dt>
								<dd class="form__item">
									<span class="input--confirm"><?php cf_val('form-field-17', true); ?></span>
								</dd>
							</dl>

							<!-- button -->
							<div class="btn__unit">
								<div class="btn btn-02">
									<a href="/dl_online_form/">戻って修正する</a>
								</div>
								<div class="btn btn-02">
									<a href="#" onclick="document.getElementsByTagName('form')[0].submit();">この内容で送信する</a>
								</div>
							</div>
							<!-- /button -->
							<?php endif; # endif has_error() ?>

						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- /.page__body -->
	<div class="pagetop"><a href="#top">TOP</a></div>
</main><!-- /main -->

<?php get_footer(); ?>
