<?php
/* functions.php *
	テーマにさまざまな付加機能を設定するためのファイル。
 */
// カスタム投稿タイプの設定
function mypace_custom_post_type() {
	register_post_type( 'goods', array( // 'goods'・・・このカスタム投稿タイプのスラッグ。お好きな名前（英数字）に変更を。
		'label' => '商品紹介', 	//カスタム投稿タイプの表示名（ダッシュボードのボタン）
		'labels' => array(
					'add_new_item' => '新しい商品の追加',//「新規投稿」の代わりに表示させる、ダッシュボードのボタン下の言葉
					'add_new' => '商品を追加',//「新規投稿を追加」の代わりに表示させる、新規投稿画面の左上に表示される言葉
					'view_item' => 'この商品のページを確認',//「投稿を表示」の代わりに表示される、記事編集画面の上に表示されるボタンの言葉
					'search_items' => '商品を検索',//「投稿を検索」の代わりに表示させる、記事一覧画面の右上検索BOX横に表示されるボタンの言葉
					),
		'public' => true,//publicly_queriable, show_ui, show_in_nav_menus, exclude_from_search の値をまとめてtrueに
		'exclude_from_search' => false, //検索結果からこの投稿タイプを除外しない
		'hierarchical' => false,//投稿っぽく記事を積み上げていくならfalse, ページっぽく階層を認めるならtrue
		'supports' => array(  //このカスタム投稿の編集ページで表示させる項目
						//title/タイトル　editor/本文　author/作成者　thumbnail/アイキャッチ画像　excerpt/抜粋　comments/コメント
						//trackbacks/トラックバック　custom-fields/カスタムフィールド　revisions/リビジョン　page-attributes/属性
					'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ,'comments'
					),
		'menu_position' => 5, //このカスタム投稿のボタンをダッシュボード上からの何番目に表示させるか。
							 //0-3:「ダッシュボード」の下　4-9：「投稿」の下　10-14:「メディア」の下　15-19:「リンク」の下　…以下は自分で確かめて！
		'has_archive' => true,//アーカイブページを生成するかどうか。 true またはスラッグを指定で生成
		'rewrite' => true //このフォーマットでパーマリンクをリライト。trueならカスタム投稿タイプのスラッグを使う。'hoge'と指定すると、パーマリンクはhogeが使われる
		)
	);
}
add_action( 'init', 'mypace_custom_post_type' );

// 「商品分類」カスタムタクソノミーを作成
function mypace_goods_taxonomies() {
	register_taxonomy(
		'goodscategory', //タクソノミー（分類）の名前
		'goods', //紐付ける投稿タイプ名（カスタム投稿タイプのスラッグの他、post,pageも設定可）
		array(
			'hierarchical' => true, //タグっぽくするならfalse, カテゴリーっぽく階層を認めるならtrue
			'label' => '商品分類', //カスタムタクソノミーの表示名（ダッシュボード表示）
			'query_var' => true,
			'rewrite' => true //このフォーマットでパーマリンクをリライト。trueならカスタムタクソノミーのスラッグを使う。'hoge'と指定すると、パーマリンクはhogeが使われる
		)
	);
}
add_action( 'init', 'mypace_goods_taxonomies', 0 );

//子テーマ用style.cssの出力（親テーマのstyle.cssの後に読み込む）
function add_mypace_plus_stylesheet() {
	wp_enqueue_style( 'plus-style', //cssのID名（任意に指定）
		get_stylesheet_directory_uri() . '/style.css', //CSSファイルへのパス
		array('bace-style'), //もし、依存CSSファイル（ここで指定したCSSより先に読みこまないといけないもの）があるなら、そのIDをarray内に記述。ファイルが1枚しかないなら空でOK
		date('Ymd'), //付与されるバージョン番号。ここでは日付をバージョン番号として使用。必要ないなら空でもOK
		'all' //CSSのmedia type（printとかscreenとか）。空だとallになる。
	);
}
add_action( 'wp_enqueue_scripts', 'add_mypace_plus_stylesheet' );


// カスタム投稿タイプGOODSのときは10件表示に変更する
function goods_queries ( $query ) {
	if ( $query->is_main_query() && is_singular('goods') ) {
		$query->set( 'posts_per_page', 10 );
	}
}
add_action( 'pre_get_posts', 'goods_queries' );