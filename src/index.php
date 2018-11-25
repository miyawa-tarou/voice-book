<?php
	$rand = rand(1,3);
	$list = array(
			1 => array(	'name' => '<a href="http://www.omunivours-alice.com/">久瀬優祈</a>',
					 	'file' => '01_kuze',
				),
			2 => array(	'name' => '<a href="http://letharia.com/">Letharia</a>',
					 	'file' => '02_Letharia',
			),
		 	3 => array(	'name' => '<a href="http://akitolet.com/">霧依アキト</a>',
						'file' => '03_akito0' . $rand,
			),
			4 => array(	'name' => '<a href="http://kanatasino.blog25.fc2.com/">りゅうい</a>',
					'file' => '04_ryui',
			),
			5 => array(	'name' => '<a href="http://overture.soragoto.net/">草芽睡</a>',
					'file' => '05_kusamesui',
			),
			6 => array(	'name' => '<a href="http://onigiriwagon.kenkenpa.net/">みや。</a>',
					'file' => '06_miya',
			),
			7 => array(	'name' => '<a hreF="http://kingpanda.sakura.ne.jp/">笑兵衛</a>',
					'url'  => '',
					'file' => '07_syobe0' . $rand,
			),
			8 => array(	'name' => '<a href="http://www.geocities.jp/trees_tone/">樹透音</a>',
					'file' => '08_tone',
			),
			9 => array(	'name' => '<a href="http://spiralspirit.net/">TAKERU(Spiral Spirit)</a>',
					'file' => '09_spiralspirit',
			),
			10 => array(	'name' => '<a href="http://piyodama0620.web.fc2.com/">七瀬未癒</a>',
					'file' => '10_nanasemiyu',
			),
			11 => array(	'name' => '有夢蒼紗　藤村咲樹　ク ロノ野良　彗　藤村咲樹　ぬこ＠<br>　編集：<a href="http://www.geocities.jp/kuroki0102/">グリーン</a><br>　使用楽曲：<a href="http://slos.biz/">SLOS</a>様　曲名：Shooting Star',
					'file' => '11_green',
			),
			12 => array(	'name' => '<a href="http://stray.raindrop.jp/crystalpalace/">霞月葵</a>',
					'file' => '12_kaduki',
			),
			13 => array(	'name' => '<a href="http://scumjapan.wix.com/scumpark13">S.C.U.M.JAPAN</a>',
					'file' => '13_scum',
			),
			14 => array(	'name' => '<a href="http://hiyoritch.web.fc2.com/">琥遥ひより</a>',
					'file' => '14_hiyori',
			),
			15 => array(	'name' => '<a href="http://moonsymphony.web.fc2.com/">大宮水那瀬</a>',
					'file' => '15_omiya0' . $rand,
			),
			16 => array(	'name' => 'ぬこ＠　藤村咲樹　水静　iza　ケイ　小野春彦<br>　編集：<a href="http://www.geocities.jp/kuroki0102/">グリーン</a><br>　使用楽曲：<a href="http://slos.biz/">SLOS</a>様　曲名：Shooting Star',
					'file' => '16_green',
			),
		);
	$today = (int)date('Ymd');
	$rest = 20130429 - $today;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<base target="_self" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link rel="stylesheet" href="style.css" type="text/css" />

<meta name="description" content="同人ボイドラ.bookの情報ページ" />
<meta name="keywords" content="同人音楽,同人音楽同好会,同人音楽.book,ボイスドラマ,同人ボイドラ.book,ボイスコ,ボイスコーポレーター,ネット声優" />

<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="js/vdbook.js"></script>

<title>同人ボイドラを聴こう！</title>
</head>
<body>

<p id="social"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="ja" data-count="none" data-hashtags="M3春">ツイート</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>

<div id="container">

<div id="header" style="height:500px;">
<h1>同人ボイドラを聴こう！</h1>

	<!--div topにボイスと販促ボイドラまとめてます-->
    <div id="top">
    <h2>いよいよM3-2013春当日！</h2>
        <div id="countdown">
<!--
        <p><object type="application/x-shockwave-flash" data="player_mp3_mini.swf" width="300" height="30">
         <param name="movie" value="player_mp3_mini.swf" />
         <param name="buttoncolor" value="#ffffff" />
         <param name="slidercolor" value="#ffffff" />
         <param name="bgcolor" value="#333333" />
         <param name="FlashVars" value="mp3=<?php echo "count/{$list[$rest]['file']}.mp3"; ?>" />
        </object></p>
        <p>今日のカウントダウンボイス：<?php echo $list[$rest]['name']; ?></p>
<!--
        <p id="old"><a href="#">■ 過去のカウントダウンボイス</a></p>
//-->
        </div><!--/countdown-->


        <div id="promotion">
        <h2>合同企画ボイドラ</h2>
        <p><a href="http://hisaoh.wix.com/girlshigh"><img src="http://static.wix.com/media/e546df_77be356b86700319be008b13568bef97.png_srz_200_40_75_22_0.50_1.20_0.00_png_srz" width="200" height="40" /><br />
        同人音楽サークル共同企画「ガールズハイ！」</a></p>


        <p><a href="http://voice-book.dojin-music.info/vd.html"><img src="/img/d02c.png"><br />
        S-Scapeさんのボイドラとちなさん・あすがらさんによる楽曲</a></p>

        <p><a href="http://voice-book.dojin-music.info/vd1.html"><img src="/img/n02c.png"><br />
        花織すいらさんのボイドラと緑坂亜綾さん・あすがらさんによる楽曲</a></p>
        </div>
//-->
    </div><!--/top-->
</div><!--/header-->


<div id="contents">


<h2>ABOUT</h2>
<div id="section2">
<h3>頒布情報</h3>
<p>
2013年4月29日　M3-2013春<br>
東京流通センター（TRC）<br>
スペース：第一展示場　S-14ab<br>
　　　　　同人音楽.info/同人音楽同好会<br>
<br>
頒布価格：500円
</p>
</div>

<div id="section2">
<h3>内容</h3>
<p>
同人音楽.infoが送る、同人ボイスドラマに関する本です。同人ボイドラで活躍されている方々はもちろん、同人ボイスコ（ボイスコーポレーター/同人声優）出身で同人音楽で活躍されている方々のエッセイやQ&Aなど盛りだくさんです。
</p>
</div>


<h2>CONTENTS</h2>
<div id="section">
<h3>エッセイ</h3>
<p>８、グリーン、みや。</p>
</div>
<div id="section">
<h3>オススメボイスドラマ5選</h3>
<p>大宮水那瀬、彼方、墨染一夜、みや。、深山亜木</p>
</div>
<div id="section">
<h3>インタビュー</h3>
<p>Spiral Spirit</p>
</div>

<div id="section">
<h3>Q&A</h3>
<p>ヨッシ～バラン、笑兵衛、花織すいら、池田奨、霞月葵</p>
</div>

<div id="section">
<h3>座談会</h3>
<p>彼方、しーやん、みやわ</p>
</div>

<div id="section2">
<h3>試聴ＤＶＤ</h3>
<p>
 蟻部。 RMR E*Project S-Scape お月さま交響曲 壊転ラヂオ Greedian Spiral Spirit 0から始めよう! TEPS ハッカドロップ。 Heart Beat Caraway 人間カプリチオ Feel'd ふしぎの国ねこ横町さん番地 碧空プラネタリウム まるみふぁくとりぃ M∞USEION Lunatic*Mikaduki 我侭☆王子
</p>
</div>

<h2>STAFF</h2>
<div id="staff">
<a href="http://garasuegg.web.fc2.com/">飛鳥硝子さま</a>
<a href="http://showikeda.eek.jp/vo/">池田奨さま</a>
<a href="http://www.geocities.jp/trees_tone/">樹透音さま</a>
<a href="http://152hz.soragoto.net/">８さま</a>
<a href="http://moonsymphony.web.fc2.com/">大宮水那瀬さま</a>
<a href="http://stray.raindrop.jp/crystalpalace/">霞月葵さま</a>
<a href="http://kanatang.blog114.fc2.com/">彼方さま</a>
<a href="http://akitolet.com/">霧依アキトさま</a>
<a href="http://spicasui.6.ql.bz/">桐生しきさま</a>
<a href="http://arkadia.aisnet.jp/">くさなぎまことさま</a>
<a href="http://overture.soragoto.net/">草芽 睡さま</a>
<a href="http://www.omunivours-alice.com/">久瀬優祈さま</a>
<a href="http://www.geocities.jp/kuroki0102/">グリーンさま</a>
<a href="http://hiyoritch.web.fc2.com/">琥遥ひよりさま</a>
<a href="http://sakuyahitomi.suichu-ka.com/">朔夜仁美さま</a>
<a href="http://raffaello.doumeki.com/">佐倉アヤキさま</a>
<a href="http://logic-blog.jugem.jp/">紗智さま</a>
<a href="http://rp.flop.jp/rp/">さのやさま</a>
<a href="http://blank.sakura.ne.jp/top.html">椎菜みそらさま</a>
<a href="http://shioseyuuri.kakurezato.com/">汐瀬悠里さま</a>
<a href="http://kingpanda.sakura.ne.jp/">笑兵衛さま</a>
<a href="http://night-all.egoism.jp/">墨染一夜さま</a>
<a href="http://spiralspirit.net/">TAKERUさま</a>
<a href="http://www.hitotabikippu.com/">虎瀬くのさま</a>
<a href="http://arts.rdy.jp/apoc/">花織すいらさま</a>
<a href="http://www.moouseion.com/">登久生 翔さま</a>
<a href="http://o3asterisk.com/">雛瀬シズキさま</a>
<a href="http://www.geocities.co.jp/AnimeComic-Ink/2214/top.html">風香さま</a>
<a href="http://verlust.aikotoba.jp/">真白羽さま</a>
<a href="http://onigiriwagon.kenkenpa.net/">みや。さま</a>
<a href="http://kairadi.sumomo.ne.jp/">深山亜木さま</a>
<a href="https://twitter.com/hmkrlml">ももかれーさま</a>
<a href="http://kanatasino.blog25.fc2.com/">りゅういさま</a>
</div>


<h2>LINK</h2>
<div id="links">
<p>500&times;100サイズ<br />
  <img src="images/banner500x100.gif" width="500" height="100" /><br />
  <input type="text" value="&lt;a href=&quot;http://voice-book.dojin-music.info/&quot; title=&quot;同人ボイドラ.book&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;http://voice-book.dojin-music.info/images/banner500x100.gif&quot;&gt;&lt;/a&gt;" />
</p>
  <p>400&times;80サイズ<br />
    <img src="images/banner400x80.gif" width="400" height="80" /><br />
    <input type="text" value="&lt;a href=&quot;http://voice-book.dojin-music.info/&quot; title=&quot;同人ボイドラ.book&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;http://voice-book.dojin-music.info/images/banner400x80.gif&quot;&gt;&lt;/a&gt;" />
</p>
  <p> 200&times;40サイズ<br />
    <img src="images/banner200x40.gif" width="200" height="40" /><br />
    <input type="text" value="&lt;a href=&quot;http://voice-book.dojin-music.info/&quot; title=&quot;同人ボイドラ.book&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;http://voice-book.dojin-music.info/images/banner200x40.gif&quot;&gt;&lt;/a&gt;" />
  </p>
</div>



<address>Copyright &copy; <a href="http://dojin-music.info/">同人音楽.info</a> All Rights Reserved.</address>

</div><!--/contents-->

</div><!--/container-->
</body>
</html>
