<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage HRBC株式会社

 */
?>

<div class="page__sub">
	<div id="aside--recent" class="unit">
		<h2 class="aside__title">最近の投稿</h2>
		<ul class="cnt-list">
        <?php
   $newslist = get_posts( array(
    'category_name' => '', //特定のカテゴリースラッグを指定
    'posts_per_page' => 10 //取得記事件数
  ));
    foreach( $newslist as $post ):
    setup_postdata( $post );
?>
        <li class="cnt-list__item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php
  endforeach;
  wp_reset_postdata();
?>
		</ul>
	</div>
	<!-- /#aside- -recent.unit -->
	<div id="aside--category" class="unit">
		<h2 class="aside__title">カテゴリー</h2>
		<ul class="cnt-list">
        <?php
    $cat_all = get_terms( "category", "fields=all&get=all" );
    foreach($cat_all as $value):
 ?>
        <li><a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name;?></a></li>
        <?php endforeach; ?>
		</ul>
	</div>
	<!-- /#aside - -category.unit -->
	<div id="aside--archive" class="unit">
		<h2>アーカイブ</h2>
      <?php
//1. 年を抽出して配列に格納
$archives_year = strip_tags(wp_get_archives('type=yearly&show_count=0&format=custom&echo=0')); //wp_get_archivesに対してタグを除去して年数のみ抽出。
$archives_year_array = split("\n",$archives_year); //年数ごとに配列$archives_year_arrayに格納
array_pop($archives_year_array);//配列内の最後に空の配列ができてるので削除。
//$archives_year_array = array_merge(array_diff($archives_year_array, array(""))); で空の配列削除してもOKだった。

//2. アーカイブ一覧を取得して配列に格納
$archives = wp_get_archives('type=monthly&show_post_count=1&use_desc_for_title=0&echo=0'); //月別アーカイブを取得。
$archives_array = split("\n",$archives); //同様に改行ごとに配列に格納。

foreach ($archives_year_array as $year_value){ //1で抽出した年数分繰り返し
    echo '<dl class="aside__dl">';
	echo "<dt class=\"aside__title\">".ltrim($year_value)."</dt>\n";
	echo "<dd class=\"aside__dl--body\">\n<ul class=\"cnt-list\">";

	foreach ( $archives_array as $archives_value) { //月別アーカイブ数分繰り返し

		if ( intval(strip_tags($archives_value)) == intval($year_value) ) { //1で取得した年と、2の各月別アーカイブの文字列を比較
			echo  str_replace(intval($year_value)."年","",ltrim($archives_value))."\n";//2の月別アーカイブの各行のhtmlからYYYY年部分を除去して表示。
			array_shift($archives_array); //表示した配列を削除。なんとなくこのほうが次のforeachまわるとき処理早くなるかなと思って。
		}

	}
	echo "</ul></dd></dl>\n";
}

?>
	</div>
</div>
