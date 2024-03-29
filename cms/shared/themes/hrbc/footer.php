<?php
/*
 * @package WordPress
 * @subpackage HRBC株式会社

 */
?>
<footer id="footer">
<div class="footer__inner fixHeight">
<div class="footer__col">
<p><a href="/">HRBC TOP</a></p>
</div>
<div class="footer__col">
<dl>
<dt><a href="/#message">Message</a></dt>
<dd>
<ul>
<li><a href="/#message">メッセージ</a></li>
</ul>
</dd>
</dl>
<dl>
<dt><a href="/#program">Program</a></dt>
<dd>
<ul>
<li><a href="/#program">プログラム</a></li>
<li><a href="/#pg-01">リーダーシップ開発</a></li>
<li><a href="/#pg-02">階層別研修</a></li>
<li><a href="/#pg-03">武者修行(異業種交流)研修</a></li>
<?php /*<li><a href="/#pg-04">オープンセミナー</a></li>*/ ?>
<li><a href="/#pg-04">企画・開発</a></li>
<li><a href="/#pg-05">コンサルティング</a></li>
</ul>
</dd>
</dl>
</div>
<div class="footer__col">
<dl>
<dt><a href="/#consultants">Consultants</a></dt>
<dd>
<ul>
<li><a href="/#consultants">講師紹介</a><br><br></li>
<li><a href="/#cs-01">迫川 史康</a></li>
<li><a href="/#cs-02">小田 正信</a></li>
<li><a href="/#cs-03">増田 元長</a></li>
<li><a href="/#cs-04">山田 智大</a></li>
<li><a href="/#cs-05">夛田 素子</a></li>
<li><a href="/#cs-06">石井 敏史</a></li>
</ul>
</dd>
</dl>
</div>
<div class="footer__col">
<dl>
<dt><a href="/#company">Company</a></dt>
<dd>
<ul>
<li><a href="/#" target="_blank">会社概要（PDF）</a></li>
<li><a href="/contact/">問い合わせ</a></li>
</ul>
</dd>
</dl>
<dl>
<dt><?php /*<a href="/good-new/">Good &amp; New</a>*/ ?></dt>
<dd>
<ul>
<li><a href="/good-new/">Good &amp; New</a></li>
</ul>
</dd>
</dl>
<dl>
<dt><?php /*<a href="/dolphin/">Dolphin</a>*/ ?></dt>
<dd>
<ul>
<li><a href="/dolphin/">ちょっとイルカの話</a></li>
</ul>
</dd>
</dl>
</div>
<small>Copyright &copy; 2015 HRBC co.,ltd. All Rights Reserved.</small>
</div>
</footer>
<!-- /#footer -->


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="/common/js/css3-animate-it.js"></script>
<script src="/common/js/jquery.matchHeight-min.js"></script>
<script src="/common/js/jquery.bxslider.min.js"></script>
<script src="/common/js/common.js"></script>
<?php if(is_home() || is_front_page()): ?>
<script src="/common/js/top.js"></script>
<?php endif; ?>
<?php if(is_page(array('contact_form', 'contact_check'))): ?>
<script type="text/javascript" src="//jpostal-1006.appspot.com/jquery.jpostal.js"></script>
<script>
$(function() {
    $("#form-field-08").jpostal({
        postcode: ["#form-field-08", "#form-field-09"],
        address: {
            "#form-field-10": "%3",
            "#form-field-11": "%4",
            "#form-field-12": "%5"
        }
    });
});
</script>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
