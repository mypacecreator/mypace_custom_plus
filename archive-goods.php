<?php
/* archive-goods.php*
	カスタム投稿タイプのアーカイブページ。archive-****.php（****はカスタム投稿タイプのスラッグ）という名前を付ければOK
 */
?>
<?php get_header(); ?>

<div id="main" class="page">

<h1 class="pagetitle">
<?php
	$type = get_queried_object();
	echo esc_attr($type->label);
?>
</h1>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<!-- 投稿ここから -->
<div class="post">

<h2 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<?php // アイキャッチ画像が設定されている時は、その画像をサムネイルとして表示
if ( has_post_thumbnail() ): ?>
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(150,150), array('class' => 'alignleft') ); ?></a>
<?php // アイキャッチ画像が設定されていない時は、ダミー画像を表示
else: ?>
	<a href="<?php the_permalink(); ?>"><img src="http://dummyimage.com/150x150/000/fff&text=No+Image" alt="noimage" class="alignleft" /></a>
<?php endif; ?>

<?php the_excerpt();
	//投稿の「抜粋」を出力。抜粋が未入力の場合は本文の先頭の方の110文字が表示されます。
	//全文を出力したいときは、いつも通り'the_content'にすればOK
?>

<a href="<?php the_permalink(); ?>" class="readNext">詳しく見る</a>

</div><!-- /.post -->
<?php endwhile; endif; ?>
<!-- /投稿ここまで -->

<?php //　ページ送りリンクを表示（「前の○件へ」の数字は自分で設定した数字に変えることを忘れずに！）
	posts_nav_link('｜', '<< 前の5件へ', '次の5件へ >>'); ?>

</div><!-- /#main -->

<?php get_sidebar();?>
<?php get_footer(); ?>
<!-- /archive-goods.php -->