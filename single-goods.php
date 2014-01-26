<?php
/* single-goods.php*
	カスタム投稿タイプ用の個別ページ。single-***.php（***はカスタム投稿のスラッグ）という名前を付ければOK
 */
?>
<?php get_header(); ?>

<div id="main">

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<div class="post">
<h2 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="postdate">Posted on <?php the_time('Y年n月j日(D) H:i'); ?></div>

<?php the_post_thumbnail( array(480,320), array('class' => 'aligncenter') ); 
	//アイキャッチ画像の出力。出力サイズと、出力した画像に付けるclass名を指定できる。
	//画像サイズのみ指定しclass名指定を消すと、画像のclass名はattachment-480x320（画像サイズ） wp-post-image　の2つが付く
	//the_post_thumbnail()　とすると、画像のclass名はattachment-post-thumbnail wp-post-image　の2つが付く
?>

<?php the_content();
	//投稿本文の出力 ?>
	
<?php //ページ分割<!--nextpage-->を使った場合に、ページャーを出力
	wp_link_pages('before=<ul class="pager"><li>ページ</li>&after=</ul>&next_or_number=number&pagelink=<li>%</li>'); ?>

<div class="postinfo">
商品カテゴリー: <?php echo get_the_term_list( $post->ID, 'goodscategory', '', ', ', '' ); ?>
</div>

</div><!-- /.post -->

<?php //comments_template(); 
	//コメント欄の出力…商品紹介には不要なことが多いのでコメントアウトしておきます
?>

<?php endwhile; endif; ?>

<!-- ここからは、次のページ／前のページへのテキストリンクを出力するためのタグ -->
<p class="pagelink">
<span class="pageprev"><?php previous_post_link('&laquo; %link') ?></span>
<span class="pagenext"><?php next_post_link('%link &raquo;') ?></span>
</p>
<!-- /ページ送りのリンクここまで -->

</div><!-- /#main -->

<?php get_sidebar();?>
<?php get_footer(); ?>
<!-- /single-goods.php -->