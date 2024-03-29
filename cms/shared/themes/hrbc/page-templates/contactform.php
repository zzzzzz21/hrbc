<?php
/**
 * Template Name: Contact Form Template
 * @package WordPress
 * @subpackage HRBC株式会社
 */
session_name('cf_hrbc');
session_start();

function cf_val($key) {
    if( isset($_SESSION['cf_hrbc'][$key]) ) {
        echo $_SESSION['cf_hrbc'][$key];
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
            $str .= '<option value="'.$item.'" selected="selected">'.$item.'</option>';
        } else {
            $str .= '<option value="'.$item.'">'.$item.'</option>';
        }
    }
    $str .= '</select>';

    echo $str;
}

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
			<h1 class="section__title">お問い合わせフォーム</h1>
			<div class="unit">
				<div class="unit__lead">
					<ul class="list list--disc">
						<li class="list--disc__item"><span class="is--required">※</span>必須項目となります。</li>
						<li class="list--disc__item">メールアドレスには、受信可能なアドレスをご入力ください</li>
						<li class="list--disc__item">各項目に入力後、[内容を確認する]ボタンを押してください</li>
					</ul>
				</div>
				<div class="unit__body">
					<div class="form">
						<form class="form--contact" action="<?php echo esc_url( home_url( '/' ) ); ?>contact_check" method="post" enctype="multipart/form-data">
							<dl class="form__unit required">
								<dt class="form__label">
									<label for="form-field-01">貴社名　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<input type="text" title="貴社名を記入してください" value="<?php cf_val('form-field-01'); ?>" name="form-field-01" class="form__input input--text" id="form-field-01">
									<span class="input--example">例）HRBC株式会社</span>
									<p id="form-field-01__error" class="input__error form-field-01"></p>
								</dd>
							</dl>
							<dl class="form__unit required">
								<dt class="form__label">
									<label for="form-field-02">部署名　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<input type="text" title="部署名を記入してください" value="<?php cf_val('form-field-02'); ?>" name="form-field-02" class="form__input input--text" id="form-field-02">
									<span class="input--example">例）人事部　※なければ「なし」</span>
									<p id="form-field-02__error" class="input__error form-field-02"></p>
								</dd>
							</dl>
							<dl class="form__unit required">
								<dt class="form__label">
									<label for="form-field-04">お名前　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<ul class="item__multiple">
										<li>
											<label for="form-field-04" class="label--name">姓</label>
											<input type="text" title="お名前（姓）を記入してください" value="<?php cf_val('form-field-04'); ?>" name="form-field-04" class="form__input input--name" id="form-field-04">
										</li>
										<li>
											<label for="form-field-05" class="label--name">名</label>
											<input type="text" title="お名前（名）を記入してください" value="<?php cf_val('form-field-05'); ?>" name="form-field-05" class="form__input input--name" id="form-field-05">
										</li>
									</ul>
									<p id="form-field-04__error" class="input__error form-field-04"></p>
									<p id="form-field-05__error" class="input__error form-field-05"></p>
								</dd>
							</dl>
							<dl class="form__unit required">
								<dt class="form__label">
									<label for="form-field-06">フリガナ　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<ul class="item__multiple">
										<li>
											<label for="form-field-06" class="label--name">セイ</label>
											<input type="text" title="フリガナ（セイ）を記入してください" value="<?php cf_val('form-field-06'); ?>" name="form-field-06" class="form__input input--name" id="form-field-06">
										</li>
										<li>
											<label for="form-field-07" class="label--name">メイ</label>
											<input type="text" title="フリガナ（メイ）を記入してください" value="<?php cf_val('form-field-07'); ?>" name="form-field-07" class="form__input input--name" id="form-field-07">
										</li>
									</ul>
									<p id="form-field-06__error" class="input__error form-field-06"></p>
									<p id="form-field-07__error" class="input__error form-field-07"></p>
								</dd>
							</dl>
							<dl class="form__unit">
								<dt class="form__label">
									<label for="form-field-08">郵便番号</label>
								</dt>
								<dd class="form__item">
									<ul class="zipcode item__multiple">
										<li>
											<input type="text" title="郵便番号（上3ケタ）を記入してください" value="<?php cf_val('form-field-08'); ?>" name="form-field-08" class="form__input input--zip validation validation--num" id="form-field-08">
										</li>
										<li>
											<input type="text" title="郵便番号（下4ケタ）を記入してください" value="<?php cf_val('form-field-09'); ?>" name="form-field-09" class="form__input input--zip validation validation--num" id="form-field-09">
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
									<input type="text" title="市区町村を記入してください" value="<?php cf_val('form-field-11'); ?>" name="form-field-11" class="form__input input--text" id="form-field-11">
									<span class="input--example">例）渋谷区</span>
									<p id="form-field-11__error" class="input__error form-field-11"></p>
								</dd>
							</dl>
							<dl class="form__unit">
								<dt class="form__label">
									<label for="form-field-12">町名・番地</label>
								</dt>
								<dd class="form__item">
									<input type="text" title="町名・番地を記入してください" value="<?php cf_val('form-field-12'); ?>" name="form-field-12" class="form__input input--text" id="form-field-12">
									<span class="input--example">例）恵比寿西2-17-12</span>
									<p id="form-field-12__error" class="input__error form-field-12"></p>
								</dd>
							</dl>
							<dl class="form__unit">
								<dt class="form__label">
									<label for="form-field-13">ビル名など</label>
								</dt>
								<dd class="form__item">
									<input type="text" title="ビル名などを記入してください" value="<?php cf_val('form-field-13'); ?>" name="form-field-13" class="form__input input--text" id="form-field-13">
									<span class="input--example">例）ENA代官山201</span>
									<p id="form-field-13__error" class="input__error form-field-13"></p>
								</dd>
							</dl>
							<dl class="form__unit required">
								<dt class="form__label">
									<label for="form-field-14">電話番号　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<input type="text" title="電話番号を記入してください" value="<?php cf_val('form-field-14'); ?>" name="form-field-14" class="form__input input--tel validation validation--num" id="form-field-14">
									<span class="input--example">例）03-6416-4333　※半角英数</span>
									<p id="form-field-14__error" class="input__error form-field-14"></p>
								</dd>
							</dl>
							<dl class="form__unit required">
								<dt class="form__label">
									<label for="form-field-15">メールアドレス　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<input type="text" title="メールアドレス（半角英数のみ）を記入してください" value="<?php cf_val('form-field-15'); ?>" name="form-field-15" class="form__input input--email validation validation--email" id="form-field-15">
									<span class="input--example">例）youraccount@yourdomain.com</span>

									<label for="form-field-16" class="label__confirm">確認のためにもう一度入力してください。</label>
									<input type="text" title="メールアドレス（半角英数のみ）を記入してください" value="<?php cf_val('form-field-16'); ?>" name="form-field-16" class="form__input input--email validation validation--email" id="form-field-16">

									<p id="form-field-15__error" class="input__error form-field-15"></p>
								</dd>
							</dl>
							<dl class="form__unit required">
								<dt class="form__label">
									<label for="form-field-17">お問い合わせ内容　<span class="label__required">※必須</span></label>
								</dt>
								<dd class="form__item">
									<textarea title="お問い合わせ内容を記入してください" name="form-field-17" class="form__input form__textarea input--text" id="form-field-17"><?php cf_val('form-field-17'); ?></textarea>
									<p id="form-field-17__error" class="input__error form-field-17"></p>
								</dd>
							</dl>
							<div class="btn btn-02">
								<a href="#" onclick="document.getElementsByTagName('form')[0].submit();">内容を確認する</a>
							</div>
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
