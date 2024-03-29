<?php get_header('index');?>
  <main id="main">
    <ul class="language">
      <li><span>日本語</span></li>
      <li><a href="/en/">English</a></li>
    </ul>
    <section id="visual" class="sec-visual sectors" data-anchor="first">
      <h1><img src="/common/img/visual-text.png" alt="人を励ます、組織が動く。"></h1>
      <ul>
        <li class="visual-01" style="display: none;">
        <?php /*
          <dl class="color-w">
            <dt>ウユニ塩湖</dt>
            <dd>東山のふもと、左京区・若王子神社から法然院下を銀閣寺に至る疏水べりの小道。日本の道百選にも選ばれた。<br>
              哲学者西田幾多郎が散策、思索にふけったといい、この名がつく。春は関雪桜が川面に散り流れ風情を増す。</dd>
          </dl>*/ ?>
        </li>
        <li class="visual-02" style="display: none;">
        <?php /*
          <dl class="color-w">
            <dt>哲学の道</dt>
            <dd>東山のふもと、左京区・若王子神社から法然院下を銀閣寺に至る疏水べりの小道。日本の道百選にも選ばれた。<br>
              哲学者西田幾多郎が散策、思索にふけったといい、この名がつく。春は関雪桜が川面に散り流れ風情を増す。</dd>
          </dl>*/ ?>
        </li>
        <li class="visual-03" style="display: none;">
        <?php /*
          <dl class="color-w">
            <dt>哲学の道</dt>
            <dd>東山のふもと、左京区・若王子神社から法然院下を銀閣寺に至る疏水べりの小道。日本の道百選にも選ばれた。<br>
              哲学者西田幾多郎が散策、思索にふけったといい、この名がつく。春は関雪桜が川面に散り流れ風情を増す。</dd>
          </dl>*/ ?>
        </li>
      </ul>
      <div class="iruka"><a href="/dolphin/"><img src="/common/img/btn-iruka.png" alt="ちょっとイルカの話" class="rollover"></a></div>
      <div class="information"><a href="/#program">Programを更新しました。</a></div>
<?php
$info_query = new WP_Query(array('post_type' => 'info', 'post_status' => 'publish', 'posts_per_page' => 1));
if($info_query->have_posts()):
?>
      <div class="info">
<?php
    while($info_query->have_posts()): $info_query->the_post();
        the_content();
    endwhile;
?>
    </div>
<?php
endif;
wp_reset_postdata();
?>
      <div class="arrow"><a href="#__message"></a></div>
    </section><!-- /visual -->
    <section id="__message" class="sec-message sectors" data-anchor="message">
      <div class="sec-title animatedParent" data-sequence="300" data-appear-top-offset='-100'>
        <p class="animated fadeInLeft title" data-id="1">Message</p>
        <h1 class="animated fadeInRight" data-id="2">時間と空気を共有し、高め合うライブを</h1>
        <p class="animated fadeInUp" data-id="3">私たちは、一つひとつの研修、そこに集う一人ひとりの受講者と向きあいながら、共感し、励まし、高めあえるライブ＝研修を創り上げます。<br>そこで得た知識、経験、感動が、皆様に価値ある行動変容をもたらす助けになることを願っています。
</p>
      </div>
      <div class="sec-contents clearfix">
        <div class="sec-contents__inner">
          <p>「御社はうちの人事部なんですよ！」<br>
        	先日、大切なクライアント企業の人事部長様とのランチの際に、こんな言葉をいただきました。<br>
			<br>
			また、パートナー企業の代表の方からは、<br>
			「HRBCの講師からは、なぜこの仕事をやっているのか、という熱意が伝わってくるんですよね！」<br>
			<br>
			一部のお客様ではありますが、こんな言葉をいただいた時、私は感謝と感動で心がふるえます。<br>
			<br>
			人・組織にたずさわる方々のBrain （ブレイン・良き相談相手）でありたい。<br>
			HRBC（Human Resource Brain Consulting）の社名にはこんな思いが込められています。<br>
			<br>
			2008年の創業以来、おかげさまでHRBCは、のべ15万人を超える受講者、研修を企画される皆様に支えられてきました。<br>
			そんななか、私たちが自らに投げかけているのは<br>
			「人・組織にたずさわる皆様のお役に立つことができているのだろうか？」というシンプルな問いです。<br>
			<br>
			HRBCは複数のコンサルタントとサポートスタッフが所属するチームです。<br>
			これまで積み重ねてきた経験から、HRBCの講師は一つの研修内容だけではなく<br>
			複数のプログラムを複数の講師が同じレベルで実施することができます。<br>
			つまり、私たちは個の力だけに頼るのではなく、一つのチームになって知恵を出すことを大切にしています。<br>
			<br>
			これからも、私たちは人・組織にたずさわる方々のBrain （ブレイン・良き相談相手）でありたいという熱意を持ち、<span>チーム</span>一丸となって、人を励まし、組織の発展に貢献していくことに全力を尽くします。
          </p>
          <div class="profile clearfix">
            <div class="image"><img src="/common/img/img-message-sakogawa2019.jpg" alt=""></div>
            <div class="text">ＨＲＢＣ株式会社　代表取締役<br>
              <img src="/common/img/img-message-sign-sakogawa.png" alt="迫川 史康">
            </div>
          </div>
        </div>
      </div>
      <div class="arrow"><a href="#__mission"></a></div>
    </section><!-- /message -->
    <section id="__mission" class="mvv-sec mvv-sec-mission sec-mission sectors" data-anchor="mission">
      <div class="mvv-sec__title">
        <h2><span>MISSION</span>わたしたちのミッション</h2>
      </div>
      <div class="mvv-sec__contents mvv-sec-mission__contents">
        <h3>
          人を励ます、<br>組織が動く。
        </h3>
        <div class="mvv-sec__contents__text">
          <p>人は励まされることで一歩を踏み出し、<br class="sp-hide">その積み重ねが組織を動かす原動力になると私たちは信じています。<br>
            そのために私たちは、研修という “ ライブ ” を通じて、<br class="sp-hide">組織が動きだす瞬間を創っていきます。<br>
            HRBCは、人財開発に携わる方々、組織のリーダー、組織に貢献するメンバー、<br class="sp-hide">人・組織に関わる全てのみなさまの良き相談相手であり続けます。</p>
        </div>
      </div>
      <div class="arrow"><a href="#__vision"></a></div>
    </section>
    <section id="__vision" class="mvv-sec mvv-sec-vision sec-vision sectors" data-anchor="vision">
      <div class="mvv-sec__title">
        <h2><span>VISION</span>わたしたちのビジョン</h2>
      </div>
      <div class="mvv-sec__contents mvv-sec-vision__contents">
        <h3>
          お客さまと<br>響きあえる会社
        </h3>
        <div class="mvv-sec__contents__text">
          <p>私たちは人・組織にたずさわる全ての皆さまの良き相談相手（Brain Consultants）として、<br class="sp-hide">お客さまと響きあえる最高のライブを一緒になって創りだしていきます。</p>
          <p>私たちの目指す最高のライブとは、<br class="sp-hide">「あの日、あの場所、あの瞬間がわたしの背中を押してくれた」<br>
            と、ふと振りかえってもらえるような時間と空間です。</p>
          <p>HRBCはメンバー全員で<br class="sp-hide">“人を励ます、組織が動く”<br class="sp-hide">最高のライブを追及し続けていきます。</p>
        </div>
      </div>
      <div class="arrow"><a href="#__purpose"></a></div>
    </section>
    <section id="__purpose" class="mvv-sec mvv-sec-purpose sec-purpose sectors" data-anchor="purpose">
      <div class="mvv-sec__title">
        <h2><span>PURPOSE</span>わたしたちのパーパス</h2>
      </div>
      <div class="mvv-sec__contents mvv-sec-purpose__contents">
        <h3>
          働く喜び一杯の<br>社会をつくる 
        </h3>
        <div class="mvv-sec__contents__text">
          <p>月曜の朝が待ち遠しい人を増やしたい。<br>人生の大半を占める働く時間に、もっと楽しみと笑顔を。</p>
          <p>自身の成長や達成感をさらに感じ<br>チームみんながポジティブな影響力を発揮しあえるように<br>私たちはライブを通じて全力でサポートします。</p>
          <p>「明日、チームのみんなに早く会いたい」<br>
           「明日、早くあの仕事に取りかかりたい」<br>
           「明日、早く会社に行きたい」<br>
           そんな声あふれる社会をつくるために。
          </p>
        </div>
      </div>
      <div class="arrow"><a href="#__value"></a></div>
    </section>
    <section id="__value" class="mvv-sec mvv-sec-value sec-value sectors" data-anchor="value">
      <div class="mvv-sec__title">
        <h2><span>VALUE</span>わたしたちのバリュー</h2>
      </div>
      <div class="mvv-sec__contents mvv-sec-value__contents">
        <h3>
          Positive<br>
          Professional<br>
          Proactive
        </h3>
        <div class="mvv-sec__contents__text">
          <p>最高のライブを実現するために、<br class="sp-hide">私たちが大切にする行動や考え方として３つの「Ｐ」を掲げています。<br>
            "ポジティブな思考"　 "プロとしての意識" 　"自らが能動的に動く"<br class="sp-hide">これがHRBCの行動指針です。</p>
        </div>
      </div>
      <div class="arrow"><a href="#__consultants"></a></div>
    </section>
    <section id="__consultants" class="sec-consultants sectors" data-anchor="consultants">
      <div class="sec-title animatedParent" data-sequence="300" data-appear-top-offset='-100'>
        <p class="animated fadeInLeft title" data-id="1">Consultants</p>
        <h1 class="animated fadeInRight" data-id="2">一人ひとりと向き合い、気づきを分かち合う。</h1>
        <p class="animated fadeInUp" data-id="3">HRBCの講師は、ビジネスの最前線で成功も失敗も数多く体験してきました。<br>受講者の皆様と一緒に、明日から試してみたいと思える気づきのあるライブ＝研修を目指します。</p>
      </div>
      <div class="sec-contents clearfix">
        <div class="sec-contents__inner">

          <div class="consultants-slide">

            <div class="slide clearfix">
              <div class="image"><img src="/common/img/img-consultants-masuda2019.jpg" alt=""></div>
              <div class="text">
                <h2 class="name">増田 元長　<span>Motonaga Masuda</span></h2>
                <p class="position">取締役</p>
                <p class="copy">一度きりの人生を</p>
                <p class="content">
野村證券秋田支店での営業担当としてキャリアをスタート。そこで仕事に没頭するなか、自分の心の奥底にあった10歳の頃の夢が甦り、心に葛藤を抱きながらも、プロゴルファーを目指して渡米。<br>
挑戦後、スポーツにビジネスの側面から貢献したいと強く思いを抱いていたところ、当時勤務先のゴルフ場で横浜ベイスターズの球団社長に遭遇。直談判し、球団職員の座を勝ち取る。<br>
スポンサー・セールスなど法人営業部門を統括して球団経営に貢献。さらに、マネジメントの専門性を高めるために大学院でビジネス経営論を学ぶ。組織マネジメントを専門とし、一人ひとりの強みを伸ばす人財育成に使命感を持ち現在に至る。<br><br>
HRBC入社後は、実体験から得たプロフェッショナルアスリートの実像や専門性の高い組織・集団の実例をふんだんに盛り込んだ情熱あふれる小気味よいセッションをモットーとしている。<br><br>
慶應義塾大学大学院健康マネジメント研究科博士課程修了。<br>
慶應義塾大学大学院健康マネジメント研究科非常勤講師。<br>
<br>
神奈川県出身、A型、おうし座、ベストスコア67のゴルフは完全に封印し、<br>
ひとり下手なピアノに没頭する時間と、フランス語の学び直しが今の喜び。<br>
                </p>
              </div>
            </div><!-- /slide -->

            <div class="slide clearfix">
              <div class="image"><img src="/common/img/img-consultants-oda2019.jpg" alt=""></div>
              <div class="text">
                <h2 class="name">小田 正信　<span>Masanobu Oda</span></h2>
                <p class="position">シニアコンサルタント</p>
                <p class="copy">会えて良かったと言われる人であり続けたい</p>
                <p class="content">
住宅設備メーカー・トステム(現LIXIL)の営業として販売網の新規立ち上げプロジェクトに参画。<br>
日々起こる予測不能な課題に直面し、困惑するも、熱意をもってお客様に向き合う大切さを学び、入社5年目で最年少チームマネージャーに抜擢される。その後、工事・物流センター所長として、プロパー、出向者、協力会社など立場の異なるメンバーをまとめる難しさを体験する。<br>
本社に異動後、 新たな人財育成体系、研修効果測定、システム開発、営業スキルマップの作成など、人財教育の基盤構築に携わり部長に昇格。<br>
同業5社が事業統合したLIXILが誕生する際には、営業部門教育統括責任者として、企業文化の異なる各社のメンバーと全く新しい教育体系をつくり上げるプロジェクトリーダーとして奔走。統合成功の一翼を担った。<br><br>
受講者一人ひとりを支援し続け、気づきを分かち合う、ライブでしか味わえないセッションを追い求めている。<br><br>
法政大学文学部日本文学科卒業。<br>
<br>
山口県出身、AB型、ふたご座、山下達郎の楽曲と職人気質な音づくりの姿勢をこよなく愛している。<br>
ジェフ千葉のホームゲームには必ずスタンドに陣取り、12番目のプレーヤーとして活躍中。<br>
                  </p>
              </div>
            </div><!-- /slide -->

            <!-- div class="slide clearfix">
              <div class="image"><img src="/common/img/img-consultants-ejiri2019.jpg" alt=""></div>
              <div class="text">
                <h2 class="name">江尻 慎太郎　<span>Shintaro Ejiri</span></h2>
                <p class="position">コンサルタント</p>
                <p class="copy">ともに成長できる出会いと時間を大切に</p>
                <p class="content">
13年間のプロ野球選手生活、最後に得た気づきは「人とつながることの大切さ」だった。<br>
引退後即、大手IT系商社でデジタルマーケティングツールの流通事業、代理店育成事業に従事。大手外資系ITメーカーの担当営業として奮闘するも、時に周囲との考え方の違いを埋めることができず、社内外のチームビルディング、コミュニケーションの大切さを痛感。<br>
“プロ野球選手” から “ビジネスパーソン” という振れ幅の大きなキャリアチェンジに適応する過程で、ビジネスで成果を出すためのセルフリーダーシップの大切さを実感。自身の根幹を深く見つめなおし、学び、そして実践することでビジネスにおける確かな成果と手ごたえを得る。<br>
プロ野球選手、IT商社での営業、球団広報を経て、自ら立ち上げたベンチャー企業で戦略立案やアスリートのセカンドキャリア支援も行う変わり種。人生の幅だけ多くの出会いと経験があった。<br>
<br>
誰よりも貪欲に、そして前向きに、出会う人びとと “ともに成長する” ことを信条としている。<br>
<br>
早稲田大学社会科学部卒業<br><br>
宮城県出身、O型、おうし座、ここぞの場面での外角への決め球はどんな強打者でも手も足も出ない迫力を誇る。<br>
一方でゴルフでは無用な外角へのボールが多く、まさかのOBもしばしば。Max153キロ、ベストスコア83、背番号27<br>
                  </p>
              </div>
            </div -->
            	
            <div class="slide clearfix">
              <div class="image"><img src="/common/img/img-consultants-yasukawa2020.jpg" alt=""></div>
              <div class="text">
                <h2 class="name">安川 光　<span>Hikaru Yasukawa</span></h2>
                <p class="position">シニアコンサルタント</p>
                <p class="copy">誰かでなく「自分が」、いつかでなく「今」</p>
                <p class="content">
住宅メーカー製造、ウエディングプランナーと様々な経験を経た後に、飲料メーカー・クリクラ（株式会社ナック）の営業として新規出店を担当。お客さまと1対1で向き合う姿勢と対話を信念に、全国営業スタッフでの年間実績1位を獲得し社長賞を受賞。<br>
拠点管理者を経てエリアを統括するマネージャーに就任すると、100名を超える部下をまとめながら5期連続での予算達成を実現する。多彩なキャリアを持つメンバーをモチベートするむずかしさに直面し、悩むなかで、チームメンバーへ「感謝」の気持ちを持つことが成果に結びつくことを深く実感してきた。<br>
エリアの採用と教育の責任者を兼任することとなった後には「体験し、考え、感じる」ことをベースにした教育プログラム「GrowUp研修」の立ち上げを主導。自らも講師として研修をリードしながら、離職率の大幅な低下と社員の成長に貢献する。<br>
<br>
ひとりひとりの気持ちに深く向き合う、情熱溢れるセッションがモットー。<br>
<br>
グロービス経営大学院大学　経営研究科（MBA)修了<br><br>
埼玉県出身、O型、てんびん座。休日、一人キッチンでコスパの悪い料理を作りながらお酒をたしなむのが一番の楽しみ。子供と日本100名山を制覇する予定。<br>
                  </p>
              </div>
            </div><!-- /slide -->
            	
            <div class="slide clearfix">
              <div class="image"><img src="/common/img/img-consultants-baba2019.jpg" alt=""></div>
              <div class="text">
                <h2 class="name">馬場 舞子　<span>Maiko Baba</span></h2>
                <p class="position">コンサルタント</p>
                <p class="copy">柔和の中に一筋の芯を持つ</p>
                <p class="content">
研修会社、富士通ラーニングメディアに入社しシステムエンジニア向けの講師としてキャリアをスタート。<br>
社会人3年目の春、家族の都合でやむを得ずUターン。予期せぬ退職にどん底の気持ちを味わいつつも、“当たって砕けろ”の精神でフリーランスの講師として独立する。気づけば10年間の講師経験を積む。<br>
組織をもう一度経験し、仕事の幅を広げたいという思いから、アステラス総合教育研究所へ入社。アステラス製薬グループの社内講師のみならず、研修企画・運営の経験も重ねる。<br>
企画・運営の達成感を何度も味わう一方で、自身が最も輝ける場所は講師だと確信。<br>
これまでの経験すべてを繋げるべく、再び講師に専念する道を選び、HRBCへ。<br>
<br>
波乱万丈の経験を活かし、出会う方それぞれの仕事人生を後押しする講師であり続けたい。<br>
<br>
東北大学大学院 教育情報学専攻 博士前期課程 修了<br>
国家資格 キャリアコンサルタント<br><br>
長崎県出身、A型、うお座。No Music, No Life、休日はピアノ演奏に没頭し<br>
食事をとり損ねることもしばしば。仕事運だけは良いと信じている。<br>
                  </p>
              </div>
            </div><!-- /slide -->
            	
            <div class="slide clearfix">
              <div class="image"><img src="/common/img/img-consultants-iwai2019.jpg" alt=""></div>
              <div class="text">
                <h2 class="name">岩井 智広　<span>Tomohiro Iwai</span></h2>
                <p class="position">コンサルタント</p>
                <p class="copy">無駄なことなんてひとつもない</p>
                <p class="content">
ビジネストレーニングのコーディネーターとして年間500本を超える企画・開発をリード。<br>
お客さまの多岐にわたる課題と真剣に向き合う中で、解決の手立てとなる研修（ライブ）を自ら創り出すべく活躍の場をファシリテーターへと移す。<br>
キャリアの歩みは一貫してベンチャー企業。常に危機感と隣り合わせという環境において、「自ら動かなければ何も始まらない」ことを身をもって経験してきた。時に激しく意見がぶつかり合う場面もありながら、持ち前のバランス感覚を発揮し数多の新規プロジェクトを成功に誘う。<br><br>
誰もが異なる価値観を持つなかで、お互いがお互いを認め合い、かつ刺激し合えるワークショップを信条としている。<br><br>
慶應義塾大学経済学部卒業<br>
Gallup認定 ストレングスコーチ<br>
<br>
東京都出身、A型、うお座。平日はジムでクライミングに励み、週末は都会を離れて山と岩壁に登る。<br>
                </p>
              </div>
            </div><!-- /slide -->

            <div class="slide clearfix">
              <div class="image"><img src="/common/img/img-consultants-sakogawa2019.jpg" alt=""></div>
              <div class="text">
                <h2 class="name">迫川 史康　<span>Fumiyasu Sakogawa</span></h2>
                <p class="position">代表取締役</p>
                <p class="copy">Enjoy the Challenge</p>
                <p class="content">
外資系製薬会社 アストラゼネカの営業（MR）としてキャリアをスタート。<br>
九州を舞台に、クリニックから大学病院まで、提案営業と顧客開拓に力を入れる。<br>
会社の合併を機にチームリーダーとなり、数々の失敗を繰り返しながらも、異なる価値観を持つメンバーの士気を高め、先輩・後輩たちとともにチームの業績向上に大きく貢献する。<br>
本社人事企画部門へ異動後、人財開発・組織開発に従事し、教育体系、評価制度などを主担当として構築する。本社と現場をつなぐ役割を担い、その運用と浸透に力を尽くすべく、現場を飛び回り、様々なワークショップを進行する経験を積む。<br><br>
笑顔を絶やさず、楽しく、ときには厳しく指導する理想の体験型ワークショップ（ライブ）を追求し続けている。<br><br>
関西学院大学経営戦略研究科(MBA)修了。<br>
多摩大学大学院 経営情報研究科 客員教授。<br>
<br>
広島県出身、O型、しし座、右投げ両打ち、浜田省吾の奥深いサウンドと歌詞の世界観を愛してやまない。<br>
いつの日か、広島東洋カープのユニフォームに袖を通すことを夢見ている。<br>
                </p>
              </div>
            </div><!-- /slide -->

          </div>
        </div>
      </div>
      <div class="arrow"><a href="#__program"></a></div>
    </section><!-- /consultants -->
    <section id="__program" class="sec-program sectors" data-anchor="program">
      <div class="sec-title animatedParent" data-sequence="300" data-appear-top-offset='-100'>
        <p class="animated fadeInLeft title" data-id="1">Program</p>
        <h1 class="animated fadeInRight" data-id="2">一人ひとりの、行動変容のために。</h1>
        <p class="animated fadeInUp" data-id="3">HRBCの研修はパッケージされたプログラムではありません。<br>お客様の悩みやご要望をできる限り具体的に伺い、参加する受講者の課題に合わせたオリジナルプログラムを創ります。<br>そこから、担当する講師を中心にチーム全体でブラッシュアップして、ご納得いただけるまで何度もお客様と議論し、<br>時には耳が痛くなるような指摘もさせていただきながら、最適なプログラムへと高めていく、オーダーメイドの研修をお届けします。
</p>
      </div>
      <div class="sec-contents clearfix ">
        <div class="sec-contents__inner">
          <p class="lead">私たちの研修の大きな特長はワークショップ形式であること。<br>
            講師が話し、受講者が聞くという講義スタイルではなく、講師はファシリテーターとして全員の参加を促します。<br>
            時にはグループディスカッション、時にはフィールドワークなどもまじえたさまざまなアプローチを通じて、<br>
            一人ひとりが主役になることで、今後の大きな糧となる研修にしていきます。
</p>
          <ul class="tabs clearfix">
            <li><a href="#tab-01" class="active">研修／ワークショップ</a></li>
            <li><a href="#tab-02">異業種交流研修</a></li>
            <li><a href="#tab-03">人・組織にかかわるサポート</a></li>
          </ul>
		  <div id="tab-01" class="tab-contents l-workshop active">
            <div class="text clearfix">
              <p>階層別研修や選抜型、選択型研修など、新入社員から経営層までそれぞれの階層で必要とされている能力とスキル、そしてマインドを開発するための研修を実現いたします。求める人財像、組織風土、受講者の課題や悩みを具体的に伺いながら、あらゆる手段とリソースを活用してオーダーメイドのプログラムでお応えしてまいります。</p>
              <div class="l-columns">
                <div class="c-column c-workshop">
                  <h2 class="c-workshop-title">実施テーマ（例）</h2>
                  <div class="c-workshop-body">
                    <ul class="c-workshop-list">
                      <li class="c-workshop-list-item">リーダーシップ開発</li>
                      <li class="c-workshop-list-item">マネジメント能力開発</li>
                      <li class="c-workshop-list-item">相互理解と信頼関係の構築</li>
                      <li class="c-workshop-list-item">部下育成力強化</li>
                      <li class="c-workshop-list-item">1on1の進め方／受け方</li>
                      <li class="c-workshop-list-item">評価者トレーニング</li>
                      <li class="c-workshop-list-item">課題解決力強化</li>
                      <li class="c-workshop-list-item">論理的思考力強化</li>
                      <li class="c-workshop-list-item">ファシリテーションスキル強化</li>
                      <li class="c-workshop-list-item">プレゼンテーションスキル強化</li>
                      <li class="c-workshop-list-item">交渉力・合意形成力強化</li>
                      <li class="c-workshop-list-item">タイムマネジメント力強化</li>
                      <li class="c-workshop-list-item">意思決定力強化</li>
                      <li class="c-workshop-list-item">発想力強化</li>
                      <li class="c-workshop-list-item">マーケティング・経営戦略</li>
                      <li class="c-workshop-list-item">経営層 風土改革ワークショップ</li>
                      <li class="c-workshop-list-item">自己認識ワークショップ<span>（アセスメント）</span></li>
                      <li class="c-workshop-list-item">女性活躍推進ワークショップ</li>
                      <li class="c-workshop-list-item">キャリア開発ワークショップ</li>
                      <li class="c-workshop-list-item">次世代リーダー育成経営塾</li>
                      <li class="c-workshop-list-item">理念浸透ワークショップ</li>
                      <li class="c-workshop-list-item">オフサイトミーティング進行</li>
                    </ul>
                    <p class="c-workshop-note">などご要望に応じてカスタマイズ</p>
                  </div>
                </div>
                <div class="c-column c-workshop">
                  <h2 class="c-workshop-title">クライアント</h2>
                  <div class="c-workshop-body">
                    <ul class="c-workshop-list">
                      <li class="c-workshop-list-item">自動車メーカー</li>
                      <li class="c-workshop-list-item">住宅設備機器メーカー</li>
                      <li class="c-workshop-list-item">オフィス家具メーカー</li>
                      <li class="c-workshop-list-item">情報・通信機器メーカー</li>
                      <li class="c-workshop-list-item">光学機器・精密機器メーカー</li>
                      <li class="c-workshop-list-item">産業用ロボットメーカー</li>
                      <li class="c-workshop-list-item">非鉄金属メーカー</li>
                      <li class="c-workshop-list-item">化学品メーカー</li>
                      <li class="c-workshop-list-item">食品メーカー</li>
                      <li class="c-workshop-list-item">飲料メーカー</li>
                      <li class="c-workshop-list-item">総合電機メーカー</li>
                      <li class="c-workshop-list-item">小売り・流通業</li>
                      <li class="c-workshop-list-item">食品販売会社</li>
                      <li class="c-workshop-list-item">エネルギー事業会社</li>
                      <li class="c-workshop-list-item">銀行・金融機関</li>
                      <li class="c-workshop-list-item">生命保険会社</li>
                      <li class="c-workshop-list-item">損害保険会社</li>
                      <li class="c-workshop-list-item">IT企業</li>
                      <li class="c-workshop-list-item">製薬会社</li>
                      <li class="c-workshop-list-item">鉄道・輸送会社</li>
                      <li class="c-workshop-list-item">航空会社</li>
                      <li class="c-workshop-list-item">建設会社</li>
                      <li class="c-workshop-list-item">不動産販売会社</li>
                      <li class="c-workshop-list-item">ガス製造・販売会社</li>
                      <li class="c-workshop-list-item">総合商社</li>
                      <li class="c-workshop-list-item">放送局・出版社</li>
                      <li class="c-workshop-list-item">大学・教育機関</li>
                      <li class="c-workshop-list-item">スポーツ関連組織</li>
                      <li>病院・医療機関</li>
                    </ul>
                    <p class="c-workshop-note">など約500社</p>
                  </div>
                </div>
                <div class="c-column c-workshop">
                  <h2 class="c-workshop-title">対象層</h2>
                  <div class="c-workshop-body">
                    <p>
                      若手層、中堅層、課長層、部長層、経営層など受講者延べ1５万人
                    </p>
                  </div>
                </div>
              </div>
              <aside class="c-workshop-aside">
                <p><img src="/common/img/photo_workshop.jpg" alt=""></p>
                <p>皆さまと響きあえる瞬間を楽しみにしております<br>HRBC一同</p>
              </aside>
            </div>
          </div>
          <div id="tab-02" class="tab-contents l-mixing">
              <div class="text">
              	<p>お客さまからのご要望にお応えする形で、2011年より「武者修行研修」と銘打って異業種交流研修を開始いたしました。他社や他業界の受講者とともにひとつのテーマに対して真剣に考え、悩み、体感し、実践することで、一人ひとりの価値ある行動変容に繋げることを目的としております。<br>
              	外部環境が変化する中でも変わることのないリーダーとしての自身の軸は何か、その軸をもとにどのような決断と行動をするか、そしていかにしてリーダーシップを磨くか、価値観もバックグラウンドも異なる異業種の皆さまとともに時間をかけながら考えてまいります。異業種交流研修は毎年春頃に企画を行い、秋～冬にかけて実施しております。皆さまのご参加を、心よりお待ち申し上げます。</p>
              </div>
              <div class="c-mixing">
                <div class="text">
                	<h2 class="c-mixing-title">3つのポイント</h2>
                	<p class="c-mixing-figure"><img src="/common/img/figure_program.jpg" alt=""></p>
                	<dl class="c-mixing-body clearfix">
                	  <dt class="c-mixing-title-lv2">新たな価値観</dt>
                	  <dd class="c-mixing-detail">他社／他業界で活躍する同世代／同職位の受講者との議論やフィードバックを通じて、自社の中だけでは得ることが難しい新たな価値観や感性を養う</dd>
                	</dl>
                	<dl class="c-mixing-body clearfix">
                	  <dt class="c-mixing-title-lv2">内省</dt>
                	  <dd class="c-mixing-detail">自身が拠りどころとする信念とその背景を徹底的に内省し、また他者の考えに触れることで、自らの判断軸と目指すリーダー像を磨く</dd>
                	</dl>
                	<dl class="c-mixing-body clearfix">
                	  <dt class="c-mixing-title-lv2">実戦と経験</dt>
                	  <dd class="c-mixing-detail">研修ならびに職場での意識的な実践と影響力の発揮を通じて変化を体感するとともに、リーダーとしての行動変容の定着を図る</dd>
                	</dl>
                </div>
              </div>
            </div>
          <div id="tab-03" class="tab-contents l-support">
            <div class="text">
            	<div class="c-support">
            	  <div class="c-support-body">
            	    <h2 class="c-support-title">管理職適性アセスメント</h2>
            	    <div class="c-support-detail">管理職としての適性を測るアセスメントを実施しております。プレイヤーではなくマネージャーとしてのご本人の強みと課題を、定量／定性の両面から複数のアセッサーが見極めてまいります。また、その過程のなかでは“審査”だけではなく“育成”という観点を持って、マネージャーとしての成長に繋げられるようお一人おひとりへの適切なフィードバックを実施いたします。</div>
            	  </div>
            	  <div class="c-support-body">
            	    <h2 class="c-support-title">人財開発担当者向け勉強会</h2>
            	    <div class="c-support-detail">他部門からの異動で人財開発担当になって間もない方や、人事領域でさらに活躍したいと考えている意欲の高い方を対象として、HRBC主催でのHR勉強会を開催しております。人財開発の基礎からトレンドまでを学ぶと同時に、人財開発担当者同士の社外ネットワークを構築する場としてもぜひご活用ください。</div>
            	  </div>
            	  <div class="c-support-body">
                    <h2 class="c-support-title">トレーナーズトレーニング<span>（社内講師向けトレーニング）</span></h2>
            	    <div class="c-support-detail">社内で研修を実施する人事の方や、部門内あるいは社外で勉強会などを開催するトレーナーの方を対象として、トレーナーのためのトレーニングをご提供しております。HRBCの講師が実践している伝え方や進行の工夫、空気のつくり方を、社内でご活用いただけるよう惜しみなくお伝えいたします。</div>
            	  </div>
            	  <div class="c-support-body">
            	    <h2 class="c-support-title">個人／グループコーチング</h2>
            	    <div class="c-support-detail">主には管理職層や役員層を対象として、ご本人の課題解決や組織の課題解決に繋げるべく、信頼関係を築きながら個別のコーチングを実施しております。具体的なスキルやキャリアについて、あるいはストレングスファインダー®を用いたコーチングなど、ニーズに応じた打ち手をご提供いたします。</div>
            	  </div>
            	  <div class="c-support-body">
            	    <h2 class="c-support-title">各種コンサルティング</h2>
            	    <div class="c-support-detail">社員一人ひとりの能力の最大発揮に向けて、個別具体的なお悩みを一緒に考えるディスカッション・パートナーとして継続的なコンサルティングを実施しております。各種人事制度や教育体系・方針など誰かに何かを相談したいとき、お気軽にお声がけください。</div>
            	  </div>
            	  <div class="c-support-body">
            	    <h2 class="c-support-title">イルカの部屋</h2>
            	    <div class="c-support-detail">社内では決して話すことのできない人事の各種お悩みに、HRBC社員が傾聴・共感いたします。ご用命の際は代官山までお越しください。<br>※要予約、指名可、指名料応相談、シーズンチケット有</div>
            	  </div>
            	</div>
            </div>
          </div>
        </div>
      </div>
      <div class="arrow"><a href="#__company"></a></div>
    </section><!-- /program -->
    <section id="__company" class="sec-company sectors" data-anchor="company">
      <div class="sec-title animatedParent" data-sequence="300" data-appear-top-offset='-100'>
        <p class="animated fadeInLeft title" data-id="1">Company</p>
        <h1 class="animated fadeInRight" data-id="2">私たちは、人財開発のプロフェッショナルチームです。</h1>
        <p class="animated fadeInUp" data-id="3">私たちHRBCは、従来の研修に物足りなさを感じるという多くのHRDご担当者様の声にお応えして、2008年にスタートしました。<br>受講者数は年々増え続け、現在、年間1万3千名以上の方々と響き合い、<br>一人ひとりが行動変容を実現していくような研修プログラムを開発・実施しています。</p>
      </div>
      <div class="sec-contents clearfix">
        <div class="sec-contents__inner">
                    <div class="company-wrap clearfix">
            <dl class="company">
              <dt>会社名</dt>
              <dd>HRBC株式会社（エイチアールビーシー株式会社）</dd>
              <dt>設立日</dt>
              <dd>2008年10月2日</dd>
              <dt>資本金</dt>
              <dd>1,000万円</dd>
              <dt>所在地</dt>
              <dd>〒150－0021 東京都渋谷区恵比寿西2-17-12 ENA代官山 201<br>
                                TEL：<a href="tel:0364164333">03 - 6416 - 4333</a>　　<br class="pc-hide">FAX：03 - 6416 - 4300</dd>
                              <dt>役員</dt>
              <dd>代表取締役　迫川史康</dd>
              <dt>事業内容</dt>
              <dd>人財開発に関する研修の企画および実施<br>
                人事・人財開発に関するコンサルティング</dd>
            </dl>
            <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d810.534635937143!2d139.70477148815277!3d35.648958088542365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b44152939d5%3A0x96fffdab43eb416a!2z77yo77yy77yi77yj77yI5qCq77yJ!5e0!3m2!1sja!2sjp!4v1557684222284!5m2!1sja!2sjp" width="400" height="280" frameborder="0" style="border:0" allowfullscreen></iframe>
              <small><a href="https://goo.gl/maps/6hv3xLujCdWKFwgJ8" target="_blank">Google Mapで表示する</a></small>
              <p>東急東横線 代官山駅 北口より徒歩3分／東口より徒歩4分<br>
              東京メトロ 日比谷線 恵比寿駅 4番出口より徒歩5分<br>
                JR山手線 恵比寿駅 西口より徒歩8分</p>
              <div class="btn btn-02"><a href="/contact/">お問い合わせはこちら</a></div>
            </div>
          </div>

          <dl class="note">
            <dt>ご留意事項</dt>
            <dd>わたしたちは人財開発のプロフェッショナルのみの限られた人数で運営しております。そのため、「社員一人ひとりの行動変容に強い関心をお持ちのお客様」<br>「組織における人財開発の仕組みづくりに熱心なお客様」「この講師、この会社と一緒に仕事がしたい！ と思っていただいたお客様」と<br>ご一緒に取り組んでいきたいと考えております。<br>したがいまして、すべてのお客様のご期待に沿えない場合がございますので、 あらかじめご了承願います。</dd>
          </dl>
        </div>
      </div>
    </section><!-- /company -->
<?php get_footer('content'); ?>
  </main><!-- /main -->
  <div class="pagetop"><a href="#top">TOP</a></div>
<?php get_footer();?>