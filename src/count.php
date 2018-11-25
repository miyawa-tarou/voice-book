<?php

	$list = array(
			1 => array(	'name' => '<a href="http://www.omunivours-alice.com/">久瀬優祈</a>',
					 	'file' => '',
				),
			2 => array(	'name' => '<a href="http://letharia.com/">Letharia</a>',
					 	'file' => '',
			),
		 	3 => array(	'name' => '<a href="http://akitolet.com/">霧依アキト</a>',
						'file' => '',
			),
			4 => array(	'name' => '<a href="http://kanatasino.blog25.fc2.com/">りゅうい</a>',
					'file' => '',
			),
			5 => array(	'name' => '<a href="http://overture.soragoto.net/">草芽睡</a>',
					'file' => '',
			),
			6 => array(	'name' => '<a href="http://onigiriwagon.kenkenpa.net/">みや。</a>',
					'file' => '',
			),
			7 => array(	'name' => '<a hreF="http://kingpanda.sakura.ne.jp/">笑兵衛</a>',
					'url'  => '',
					'file' => '',
			),
			8 => array(	'name' => '<a href="http://www.geocities.jp/trees_tone/">樹透音</a>',
					'file' => '',
			),
			9 => array(	'name' => '<a href="http://spiralspirit.net/">TAKERU(Spiral Spirit)</a>',
					'file' => '',
			),
			10 => array(	'name' => '<a href="http://piyodama0620.web.fc2.com/">七瀬未癒</a>',
					'file' => '',
			),
			11 => array(	'name' => '有夢蒼紗　藤村咲樹　ク ロノ野良　彗　藤村咲樹　ぬこ＠<br>　編集：<a href="http://www.geocities.jp/kuroki0102/">グリーン</a><br>　使用楽曲：<a href="http://slos.biz/">SLOS</a>様　曲名：Shooting Star',
					'file' => '',
			),
			12 => array(	'name' => '<a href="http://stray.raindrop.jp/crystalpalace/">霞月葵</a>',
					'url'  => '',
					'file' => '',
			),
			13 => array(	'name' => '<a href="http://hisaoh.wix.com/scumjapan">S.C.U.M.JAPAN</a>',
					'file' => '',
			),
			14 => array(	'name' => '<a href="http://hiyoritch.web.fc2.com/">琥遥ひより</a>',
					'file' => '',
			),
			15 => array(	'name' => '<a href="http://moonsymphony.web.fc2.com/">大宮水那瀬</a>',
					'file' => '',
			),
			16 => array(	'name' => 'ぬこ＠　藤村咲樹　水静　iza　ケイ　小野春彦<br>　編集：<a href="http://www.geocities.jp/kuroki0102/">グリーン</a><br>　使用楽曲：<a href="http://slos.biz/">SLOS</a>様　曲名：Shooting Star',
					'file' => '19_green',
			),
		);

	//header("Content-Type: audio/mpeg");

	$today = (int)date('Ymd');
	$rest = 20130429 - $today;
	$path = "count/{$list[$rest]['file']}.mp3";
	//$handle = readfile("count/{$rest['file']}.mp3");
	//$handle = readfile("count/{$rest['file']}.mp3");
	//$fp   = fopen($path,'rb');
	//$size = filesize($path);
	//$data  = fread($fp, $size);
	//fclose($fp);
	echo $path;
	exit;