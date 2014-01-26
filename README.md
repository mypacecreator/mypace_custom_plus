#カスタム投稿タイプを練習する為のWordPress子テーマ『mypace custom plus』
* by Kei Nomura(@mypacecreator) / ozone notes
* http://mypacecreator.net/theme/category/mypace-custom-plus/


##お約束事


* ライセンスは、WorePress本体と同じGPLライセンスを適用します。その範囲内で商用・非商用にかかわらず無償で自由に改変・複製してご利用いただけます。
（WordPressのテーマライセンスについては、作者ブログ『自作WordPressテーマのライセンスについて調べてみた | マイペースクリエイターの覚え書き』をご一読ください。
　http://mypacecreator.net/blog/archives/169）
* 著作権表記はstyle.cssとfooter.phpに記載してあります。どちらも残していただければ幸いですが、上記のルールをしっかり理解したうえで、ちゃんと自分で手を加えたものに対して私の名前をそっと消していただく分には、構わないかと思います。最悪style.cssの表記くらい残してもらえればOKです。
* うまくカスタマイズできた成功例や、逆にここつまづいたけどこうやったら出来た、等の情報はできるだけブログやソーシャルメディア等にUPしてみんなで共有しましょう。
* 質問があれば受けたいと思いますが、仕事の合間に有志で行っていますので、出来る範囲での対応となります。
* でも、ぐーぐるさんや書籍などを駆使してなるべく自分で調べてください。自分で苦労しながら調べることが上達への近道です。
* 一刻も早い回答や手厚いサポートをお求めの方は、有償サポート（ozone notes http://www.ozonenotes.jp/ )までご連絡ください。

##動作確認Ver

WordPress日本語版 3.4～3.5.1


##ファイル構成（XHTML版mypace custom plus 1.5）
* style.css
* single-goods.php（個別ページ用）
* archive-goods.php（カスタム投稿タイプの一覧表示用）
* taxonomy-goodscategory.php（カスタムタクソノミーの一覧表示用）※v1.4にて追加
* functions.php
* screenshot.png

###このテーマには親テーマが必要です
拙作の”mypace custom”テーマの子テーマです。
mypace custom(verticalも可)とmypace custom plusの両方がないと動きません。

* mypace customテーマのダウンロードはこちら
http://mypacecreator.net/theme/category/mypace-custom/


##当バージョンでの変更箇所（XHTML版mypace custom plus 1.5）
* page-goods.phpを廃止（query_postsを使った実装方法は今後おすすめできなくなるため）


##過去の変更履歴（XHTML版：mypace custom シリーズ）

* 2010.11.12　「鉄は熱いうちに打て」とばかりに、カスタム投稿タイプ用のテンプレ作成。また勢いだけで公開。
* 2010.12.12　Ver1.1に変更。投稿数が増えた時のページ送りが表示されないという点を修正。カスタム投稿表示用のコードを書き換えました。
* 2011.01.27　IEでの後方互換スイッチに関する記述を追加しました。
* 2011.04.07　単数形の指定をする項目‘singular_name’ => ”の記述を削除しました。日本語ではなくても問題ないので。
* 2011.06.26　functions.php内に不要な全角スペースが混じっておりPHPエラーが出ていた点を修正
* 2012.02.11　Ver1.2配布開始。カスタム投稿表示用のコードを、new WP_Queryではなくquery_postsを使ったものに書き換えました。
* 2012.11.02　Ver1.3配布開始。archive-goods.phpを追加。ページテンプレートgoods.phpのファイル名をpage-goods.phpに変更。functions.phpの記述を変更。
* 2013.03.12　Ver1.4配布開始。CSSファイルの読み込み方法をwp_enqueue_styleを使用した方法に変更。taxonomy-goodscategory.phpを追加。
* 2014.01.27　Ver1.5配布開始。page-goods.phpファイルを廃止。


では！良いWordPressライフを★