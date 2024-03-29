<?php
/**
 * @package WordPress
 * @subpackage HRBC株式会社
 */
get_header(); ?>

<?php //include_once 'header.php'; ?>
<?php //include_once 'nav.php'; ?>
		<!-- Start Service -->
		<div class="contents">
			<div class="area_contact">
				<h1>Contact</h1>
				<p>こちらからお気軽にご相談ください。<span style="color:red; font-size:0.8em;">※ 必須項目</p>
				<!-- Start Form -->
				<div class="form_area">
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>contact_check" method="post" id="contactForm">

						<dl>
							<dt><label for="kisya">貴社名 <span class="mf_red">※</span></label></dt>
							<dd>例：HRBC株式会社<br><input class="required" type="text" name="kisya" size="50" /></dd>
						</dl>
						<dl>
							<dt><label for="busyo">部署名 <span class="mf_red">※</span></label></dt>
							<dd>例：人事部<br><input class="required" type="text" name="busyo" size="50" /></dd>
						</dl>
						<dl>
							<dt><label for="namae">お名前 <span class="mf_red">※</span></label></dt>
							<dd>姓：<input class="required" type="text" name="namae_sei" size="20" /> 名：<input class="required" type="text" name="namae_mei" size="20" /></dd>
						</dl>
						<dl>
							<dt><label for="hurigana">フリガナ <span class="mf_red">※</span></label></dt>
							<dd>セイ：<input class="required" type="text" name="hurigana_sei" size="20" /> メイ：<input class="required" type="text" name="hurigana_mei" size="20" /></dd>
						</dl>
						<dl>
							<dt><label for="yubin">郵便番号</label></dt>
							<dd>例：150-0021<br><input id="yubin" type="text" name="yubin" /></dd>
						</dl>
						<dl>
							<dt>都道府県</dt>
							<dd>
								<label for="state"></label>
								<select name="state" id="state">
									<option value="" selected>▼都道府県を選択してください</option>
									<optgroup label="北海道・東北地方">
										<option value="北海道">北海道</option>
										<option value="青森県">青森県</option>
										<option value="岩手県">岩手県</option>
										<option value="秋田県">秋田県</option>
										<option value="宮城県">宮城県</option>
										<option value="山形県">山形県</option>
										<option value="福島県">福島県</option>
									</optgroup>

									<optgroup label="関東地方">
										<option value="東京都">東京都</option>
										<option value="神奈川県">神奈川県</option>
										<option value="埼玉県">埼玉県</option>
										<option value="千葉県">千葉県</option>
										<option value="茨城県">茨城県</option>
										<option value="栃木県">栃木県</option>
										<option value="群馬県">群馬県</option>
									</optgroup>

									<optgroup label="甲信越地方">
										<option value="山梨県">山梨県</option>
										<option value="長野県">長野県</option>
										<option value="新潟県">新潟県</option>
									</optgroup>

									<optgroup label="東海地方">
										<option value="静岡県">静岡県</option>
										<option value="愛知県">愛知県</option>
										<option value="岐阜県">岐阜県</option>
										<option value="三重県">三重県</option>
									</optgroup>

									<optgroup label="北陸地方">
										<option value="富山県">富山県</option>
										<option value="石川県">石川県</option>
										<option value="福井県">福井県</option>
									</optgroup>

									<optgroup label="近畿地方">
										<option value="大阪府">大阪府</option>
										<option value="京都府">京都府</option>
										<option value="奈良県">奈良県</option>
										<option value="滋賀県">滋賀県</option>
										<option value="和歌山県">和歌山県</option>
										<option value="兵庫県">兵庫県</option>
									</optgroup>

									<optgroup label="中国地方">
										<option value="岡山県">岡山県</option>
										<option value="広島県">広島県</option>
										<option value="鳥取県">鳥取県</option>
										<option value="島根県">島根県</option>
										<option value="山口県">山口県</option>
									</optgroup>

									<optgroup label="四国地方">
										<option value="香川県">香川県</option>
										<option value="徳島県">徳島県</option>
										<option value="愛媛県">愛媛県</option>
										<option value="高知県">高知県</option>
									</optgroup>

									<optgroup label="九州・沖縄地方">
										<option value="福岡県">福岡県</option>
										<option value="佐賀県">佐賀県</option>
										<option value="長崎県">長崎県</option>
										<option value="大分県">大分県</option>
										<option value="熊本県">熊本県</option>
										<option value="宮崎県">宮崎県</option>
										<option value="鹿児島県">鹿児島県</option>
										<option value="沖縄県">沖縄県</option>
									</optgroup>
								</select>
						</dl>
						<dl>
							<dt><label for="address1">市区町村・番地</label></dt>
							<dd>例：渋谷区恵比寿西2-17-12<br><input id="address1" name="address1" type="text" size="50" /></dd>
						</dl>
						<dl>
							<dt><label for="address2">マンション・ビル名など</label></dt>
							<dd>例：ENA代官山 201<br><input id="address2" name="address2" type="text" size="50" /></dd>
						</dl>
						<dl>
							<dt><label for="phone_nm">電話番号 <span class="mf_red">※</span></label></dt>
							<dd>例：03-1234-5678<br><input class="required" name="phone_nm" type="text" size="50" /></dd>
						</dl>
						<dl>
							<dt><label for="mail1">メールアドレス <span class="mf_red">※</span></label></dt>
							<dd><input class="required email" name="mail1" type="text" size="50" /></dd>
						</dl>
						<dl>
							<dt><label for="mail2">メールアドレス 確認用 <span class="mf_red">※</span></label></dt>
							<dd><input class="required email" name="mail2" type="text" size="50" /></dd>
						</dl>
						<dl>
							<dt class="heightLine">お問い合わせ内容 <span class="mf_red">※</span></dt>
							<dd class="heightLine"><textarea class="required" name="naiyou" rows="10" cols="50"></textarea></dd>
						</dl>
						<div class="mf_btn">
							<input type="submit" value="内容を確認する" /><input type="reset" value="内容をリセットする" />
						</div>
					</form>
				</div>
				<!-- End Form -->
			</div>
		</div>

</div>
</div>
</div>
<?php get_footer(); ?>
