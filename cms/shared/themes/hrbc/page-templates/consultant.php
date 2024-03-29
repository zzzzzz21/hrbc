<?php
/**
 * Template Name: consultant Template
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
  <div class="area_cons">
    <h1>Consultant</h1>
    <div class="cons_cont">
      <h2>「Enjoy the Challenge」</h2>
      <div class="pic_left">
        <div class="consultant-item">
          <div class="consultant-item-thum"> <img src="<?php echo get_template_directory_uri(); ?>/img/img-sakogawa_off.png" class="imagechange"> </div>
          <div class="consultant-item-name cf">
            <h4>迫川 史康</h4>
            <p>Fumiyasu Sakogawa<br>
              取締役</p>
          </div>
        </div>
      </div>
      <div class="cons_txt">
        <div class="consultant-description">
          <p> 外資系製薬会社 アストラゼネカの営業（MR）としてキャリアをスタートする。<br />
            福岡支店に配属後、クリニックから大学病院まで担当し、既存病院への提案営業、顧客開拓に力をいれる。<br />
            合併を機にチームリーダーとなり、チームを形成していくうえで数々の失敗を繰り返しながら、異なる価値観を<br />
            持つメンバーの士気を高め、先輩・後輩と共にチームとしての業績向上に大きく貢献する。<br />
            人事企画部門に異動後、主に人財開発・組織開発に従事し、教育体系、評価制度などを主担当として構築する。<br />
            本社と現場を繋ぐ役割を担いながら、その運用、浸透にも力を注ぐ。<br />
            笑顔を絶やさず、楽しく、ときには厳しく指導する理想の体験型ワークショップ（ライブ）を追求し続けている。<br />
            関西学院大学大学院 経営戦略研究科修了。<br />
            広島県出身、O型、しし座、右投げ両打ち、浜田省吾の奥深いサウンドと歌詞の世界観を愛してやまない。<br />
            いつの日か、広島東洋カープのユニフォームに袖を通すことを夢見ている。 </p>
        </div>
      </div>
    </div>
    <div class="cons_cont">
      <h2>「熱意と感動」</h2>
      <div class="pic_left">
        <div class="consultant-item">
          <div class="consultant-item-thum"> <img src="<?php echo get_template_directory_uri(); ?>/img/img-oda_off.png" class="imagechange"> </div>
          <div class="consultant-item-name cf">
            <h4>小田 正信</h4>
            <p>Masanobu Oda<br>
              シニアコンサルタント</p>
          </div>
        </div>
      </div>
      <div class="cons_txt">
        <p>住宅設備メーカー・トステム（ 現 LIXIL ） の現場管理担当者としてキャリアをスタート。<br />
          入社1年後、念願の営業に異動し、水回り機器販売網の新規立ち上げプロジェクトに参画する。<br/>
          日々起こる予測不能な課題に直面し、困惑するも、熱意をもってお客様に向き合う大切さを学ぶ。<br />
          その熱心な仕事ぶりが認められ、入社5年目にして最年少マネジャーに抜擢される。本社に異動後、<br />
          新たな人財育成体系、研修効果測定、システム開発、営業スキルマップの作成など、人財教育の基盤構築に携る。<br />
          部長昇格後は、異なる企業文化を持つ5社が事業統合した新会社の国内営業部門教育統括責任者として、<br />
			新たな教育体系の構築をリードする。 <br />
          受講者一人ひとりを支援し続け、感動を分かち合う、ライブでしか味わえないセッションを追い求めている。<br />
          法政大学文学部日本文学科卒業。<br />
          山口県出身、AB型、ふたご座、山下達郎の楽曲と職人気質な音づくりの姿勢をこよなく愛している。<br />
          ジェフ千葉のホームゲームには必ずスタンドに陣取り、12番目のプレーヤーとして活躍している。 </p>
      </div>
    </div>
    <div class="cons_cont">
      <h2>「チャレンジスピリットを鼓舞する」</h2>
      <div class="pic_left">
        <div class="consultant-item">
          <div class="consultant-item-thum"> <img src="<?php echo get_template_directory_uri(); ?>/img/img-masuda_off.png" class="imagechange"> </div>
          <div class="consultant-item-name cf">
            <h4>増田 元長</h4>
            <p>Motonaga Masuda<br>
              コンサルタント</p>
          </div>
        </div>
      </div>
      <div class="cons_txt">
        <p>野村證券に入社し、秋田支店の営業担当者としてキャリアをスタートする。そこで仕事に没頭するなか、<br />
          自分の心の奥底にあった10歳の頃の夢が甦り、心に葛藤を抱きながらも、プロゴルファーを目指して渡米。<br />
          挑戦後、スポーツにビジネスの側面から貢献したいという熱い想いを抱き、横浜ベイスターズに入社。<br />
          スポンサー・セールスなど法人営業部門を統括し、球団経営の一翼を担う。<br />
          その傍ら、専門性をさらに磨くため、大学院でビジネス経営論を学ぶ。組織マネジメントを専門とし、<br />
          一人ひとりの強みを伸ばす人財育成に使命感を持ち現在に至る。実体験から得たプロフェッショナルアスリートの<br />
          実像や専門性の高い組織・集団の実例をふんだんに盛り込んだ情熱あふれるセッションをモットーとしている。<br />
          慶應義塾大学大学院健康マネジメント研究科博士課程修了。<br />
          慶應義塾大学大学院健康マネジメント研究科非常勤講師。<br />
          神奈川県出身、A型、おうし座、松田聖子「青い珊瑚礁」のイントロ♪を聴くと今でも胸が高鳴る。<br />
          ベストスコア67のゴルフは完全に封印し、週に1度は必ずジムで汗を流す。 </p>
      </div>
    </div>
    <div class="cons_cont">
      <h2>「受講者の本音を引き出す」</h2>
      <div class="pic_left">
        <div class="consultant-item">
          <div class="consultant-item-thum"> <img src="<?php echo get_template_directory_uri(); ?>/img/img-yamada_off.png" class="imagechange"> </div>
          <div class="consultant-item-name cf">
            <h4>山田 智大</h4>
            <p>Tomohiro Yamada<br>
              コンサルタント</p>
          </div>
        </div>
      </div>
      <div class="cons_txt">
        <p>外資系コンサルティング会社アンダーセンコンサルティング（ 現 アクセンチュア ） に入社。<br />
          チェンジ・マネジメントグループに配属され、大手通信会社の意識改革プロジェクトに参画。プロジェクトの推進と<br />
          その効果測定に従事した。 様々な業界の企業風土改革に携るなか、徹夜して作った資料についてクライアントから<br />
          「やまちゃん、この資料ありがたいんだけど、現場は理屈じゃ動かないんだよな」 と指摘され、それが今でも忘れられない。<br />
          これを機に “ 人を動かす ” 人財育成の領域を深めたいという想いが高まり、研修講師としてのキャリアをスタート。<br />
          講師としての経験を重ねるなか、“ 人は論理で納得し、感情で動く ” ことをつくづく実感。<br />
          論理的で丁寧な説明と、本音をぶつけ合う双方向型のワークショップを信条としている。<br />
          慶應義塾大学大学院理工学研究科修了。<br />
          神奈川県出身、B型、しし座、週末の楽しみは愛車（アルファロメオ）を運転すること。<br />
          週1回、早朝には六本木の老師から太極拳の直接指導を受け、今年で6年目を迎える。 </p>
      </div>
    </div>



    <div class="cons_cont">
      <h2>「向き不向きより前向き」</h2>
      <div class="pic_left">
        <div class="consultant-item">
          <div class="consultant-item-thum"> <img src="<?php echo get_template_directory_uri(); ?>/img/img-tada_off.png" class="imagechange"> </div>
          <div class="consultant-item-name cf">
            <h4>夛田 素子</h4>
            <p>Motoko Tada<br>
              コンサルタント</p>
          </div>
        </div>
      </div>
      <div class="cons_txt">
        <p>サントリーグループのビール工場見学広報・PRスタッフとしてキャリアをスタートする。<br />
「モルツファン」を開拓するべく、一万人を超えるお客様とダイレクトに接してきた。<br />
マニュアル通りの対応に限界を感じ、思い悩み試行錯誤を繰り返すなか、お客さまから思いがけない一言をいただく。<br />
「私たちのペースに合わせてくれてありがとね。」 その時のとびっきりの笑顔が今でも忘れられない。<br />

広報・コミュニケーションスキルのさらなる向上を目指し、学校法人に転職。<br />
従来の入試広報が通じないなか、戦略構築のスキルをゼロから学び直すとともに実践。<br />

与えられた仕事をこなすだけでなく、問題解決にむけて周囲を巻き込みながら主体的に動くための<br />
考え方、知識、スキルをわかりやすく伝えることが得意分野。<br />
受講者一人ひとりが「明日からこれをやってみよう！」とイメージできるセッションを追い求めている。<br />

法政大学 社会学部 社会政策科学科 卒業。<br />
中学・高等学校 社会科教諭第一種免許取得。<br />
大阪府出身、A型、射手座、一児の母。三歳から現在も続けている書道で心の落ち着きを感じる。<br />
好きな言葉は“ 粘り“。ただ、納豆だけにはどうしても“ 後ろ向き ”になってしまう・・・。 </p>
      </div>
    </div>    
    
    
    
    <div class="cons_cont">
      <h2>「今を生きる」</h2>
      <div class="pic_left">
        <div class="consultant-item">
          <div class="consultant-item-thum"> <img src="<?php echo get_template_directory_uri(); ?>/img/img-ishii_off.png" class="imagechange"> </div>
          <div class="consultant-item-name cf">
            <h4>石井 敏史</h4>
            <p>Toshifumi Ishii<br>
              特別顧問</p>
          </div>
        </div>
      </div>
      <div class="cons_txt">
        <p>アサヒビールの苦難の時代、横浜・大阪エリアの営業として研鑽を積み、月間MVP等、チームとして<br />
成果を出すことの楽しさを実感。お客様の 「 うまい！」 のひと言が営業の原点となる。<br />
スーパードライ発売時には、大阪支社の基幹支店長として激変の時代を現場でリードし、管理職として<br />
部下育成・評価の難しさに奮闘しながらも、どうすれば組織としての一体感をつくりあげることができるかを模索した。<br />
そして、スーパードライの売上が踊り場に差し掛かった頃、本社営業部 副部長として、全国の販売促進・営業活動を<br />
サポート。その一環として、新たな営業研修を立ち上げ、社内講師として営業力アップに尽力する。大阪支社長時代には、<br />
アサヒビール初のM&amp;Aによる4社統合に直面し、新たな組織の融合に向けてユニークな施策を数多く実施した。<br />
その後、営業全体を統括する常務執行役員を経て、全国の地域卸の経営をコンサルティングするアサヒ流通研究所<br />
代表取締役社長に就任。<br />
受講者と対話を繰り返しながら本音を引き出し、自らの豊富な経験をもとに「今できること／すべきこと」に<br />
気づいてもらうことを大切にしている。<br />
慶應義塾大学経済学部卒業。<br />
大阪府出身、A型、みずがめ座、ビールと共に過ごす時間が何よりも生きがいである。
 </p>
      </div>
    </div>
 
  
  
    <div class="cons_cont">
      <h2>「持てる力を最大限に発揮する」</h2>
      <div class="pic_left">
        <div class="consultant-item">
          <div class="consultant-item-thum"> <img src="<?php echo get_template_directory_uri(); ?>/img/img-matsushita_off.png" class="imagechange"> </div>
          <div class="consultant-item-name cf">
            <h4>松下 純也</h4>
            <p>Junya Matsushita<br>
            代表取締役</p>
          </div>
        </div>
      </div>
      <div class="cons_txt">
        <p>アサヒビール人事戦略部、アストラゼネカ人事企画部を経て、2008年にHRBCの前身である<br />
GRI トレーニング&amp;コンサルティングを設立。起業前は札幌、大阪、東京の3つの拠点で勤務。<br />
少年時代を過ごした関西、製造現場で仕事の基礎を学んだ札幌、そして起業前の留学で “ 幸せ ” のヒントを<br />
得たホノルルがこころの故郷。自らの失敗体験から、<br />
『 人は持てる能力を最大限に発揮しようとするときに最も輝き 』<br />
『 能力を最大限に発揮できたときに大きな喜びを得る 』 ことをビジネスの信条にしている。<br />
慶應義塾大学大学院経営管理研究科修了、ハワイ州立大学大学院MBAコース単位取得留学<br />
多摩大学大学院客員教授（ ヒューマンリソースマネジメント ）<br />
兵庫県出身、O型、かに座、尊敬する落語家は名人古今亭志ん朝、“日本そば”がどうしても食べられない。<br />
大胆さと繊細さをあわせ持つ伝説のレスラー ブルーザー・ブロディをリスペクトしている。
</p>
      </div>
    </div>
  </div>
  
     </div>
  
</div>
</div>
<!-- End Contents-->
<?php get_footer(); ?>
