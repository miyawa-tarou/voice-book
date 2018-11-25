<?php

$mode = '';
if ($_POST['mode'] === 'confirm') {
	convert_post();
	$error = check_post();
	$mode = 'confirm';
}
if ($_POST['mode'] === 'commit' && $_POST['type'] === '送信') {
	convert_post();
	$error = check_post();
	$mode = 'commit';
	if (empty($error)) {
		registData();
		sendMail();
		header("Location: http://voice-book.dojin-music.info/finish.html");
		exit;
	}
}

if (($mode !== 'confirm' && $mode !== 'commit') || ! empty($error)) {
	$mode = 'form';
}

$tags = array('全編' => '全編', '一部掲載' => '一部掲載', 'PV' => 'PV');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ボイドラ試聴参加登録フォーム｜同人音楽.info</title>
<meta name="keywords" content="同人,ボイドラ,ボイスドラマ,音声劇">
<meta name="description" content="同人ボイドラの本">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<link rel="alternate" type="application/rss+xml" title="RSS" href="http://www.dojin-music.info/review_rss.php">
<link rel="stylesheet" href="http://www.dojin-music.info/base.css" type="text/css">
<style>
.subTitle{
	margin:10px 0 5px 0;
	width:600px;
	height:21px;
	background:url('/img/subtitle.png') repeat-x;
	text-indent:15px;
	font-size:16px;
}
p{
margin:2px 10px;
text-indent:10px;
}
.error {
color:red;
font-weight:bold;
}
</style>
</head>
<body>
<div id="box">
	<div id="header">
		<h1><a href="http://www.dojin-music.info/"><img src="http://www.dojin-music.info/img/rogo.gif" alt="同人音楽.info" style="float: left; border: 0px none;" height="33" width="140"></a></h1>
	</div>
	<img src="/img/top.png">
<h1 class="list_title" style="text-align:center;">応募フォーム</h1>
	<div style="width:600px; margin:auto; text-align:left;">



<?php if ($mode === 'commit') : ?>


<?php elseif ($mode === 'confirm') : ?>

<h2 class="subTitle">応募者情報とデータ</h2>

<form method="post" action="/cd_form.php">
<input type="hidden" name="mode" value="commit" />
<table border>
<tr>
<th>お名前</th>
<td><?php echo empty($_POST['name']) ? '' : $_POST['name']; ?><input type="hidden" name="name" value="<?php echo empty($_POST['name']) ? '' : $_POST['name']; ?>" /></td>
</tr>
<tr>
<th>ご連絡用アドレス</th>
<td><?php echo empty($_POST['mail']) ? '' : $_POST['mail']; ?><input type="hidden" name="mail" value="<?php echo empty($_POST['mail']) ? '' : $_POST['mail']; ?>" /></td>
</tr>
<tr>
<th>音源データURL</th>
<td><a href="<?php echo empty($_POST['data']) ? '' : $_POST['data']; ?>" target="_blank"><?php echo empty($_POST['data']) ? '' : $_POST['data']; ?></a><input type="hidden" name="data" value="<?php echo empty($_POST['data']) ? '' : $_POST['data']; ?>" />
</td>
</tr>
<tr>
<th>連絡事項</th>
<td><?php echo nl2br($_POST['comment']); ?></td>
</tr>
<tr>
<th>WEB掲載</th>
<td><?php echo empty($_POST['web_flag']) ? '掲載を希望しない' : '掲載しても構わない'; ?></td>
</tr>
</table>
<input type="hidden" name="web_flag" value="<?php echo empty($_POST['web_flag']) ? '' : $_POST['web_flag']; ?>" />
<input type="hidden" name="comment" value="<?php echo empty($_POST['comment']) ? '' : $_POST['comment']; ?>">

<h2 class="subTitle">サークル情報</h2>


<table border>
<tr>
<th>サークル名</th>
<td><?php echo empty($_POST['circle_name']) ? '' : $_POST['circle_name']; ?><input type="hidden" name="circle_name" value="<?php echo empty($_POST['circle_name']) ? '' : $_POST['circle_name']; ?>" /></td>
</tr>
<tr>
<th>サークル名読み（カタカナ）</th>
<td><?php echo empty($_POST['circle_kana']) ? '' : $_POST['circle_kana']; ?><input type="hidden" name="circle_kana" value="<?php echo empty($_POST['circle_kana']) ? '' : $_POST['circle_kana']; ?>" /></td>
</tr>
<tr>
<th>サークルURL</th>
<td><a href="<?php echo empty($_POST['url']) ? '' : $_POST['url']; ?>" target="_blank"><?php echo empty($_POST['url']) ? '' : $_POST['url']; ?></a><input type="hidden" name="url" value="<?php echo empty($_POST['url']) ? '' : $_POST['url']; ?>" /></td>
</tr>
<tr>
<th>サークルバナーURL</th>
<td><a href="<?php echo empty($_POST['banner_url']) ? '' : $_POST['banner_url']; ?>" target="_blank"><?php echo empty($_POST['banner_url']) ? '' : $_POST['banner_url']; ?></a><input type="hidden" name="banner_url" value="<?php echo empty($_POST['banner_url']) ? '' : $_POST['banner_url']; ?>" /></td>
</tr>
<tr>
<th>タグ</th>
<td>
<?php echo empty($_POST['genre1']) ? '' : $_POST['genre1']; ?>　
<?php echo empty($_POST['genre2']) ? '' : $_POST['genre2']; ?>　
<?php echo empty($_POST['genre3']) ? '' : $_POST['genre3']; ?>
<input type="hidden" name="genre1" value="<?php echo empty($_POST['genre1']) ? '' : $_POST['genre1']; ?>" />
<input type="hidden" name="genre2" value="<?php echo empty($_POST['genre2']) ? '' : $_POST['genre2']; ?>" />
<input type="hidden" name="genre3" value="<?php echo empty($_POST['genre3']) ? '' : $_POST['genre3']; ?>" />
</td>
</tr>
<tr>
<th>サークル紹介</th>
<td><?php echo empty($_POST['description']) ? '' : nl2br($_POST['description']); ?></td>
</tr>
</table>
<input type="hidden" name="description" value="<?php echo empty($_POST['description']) ? '' : $_POST['description']; ?>">


<?php for ($i = 1; $i < 11; $i++) : ?>
<? if (empty($_POST['prod'][$i]['name'])) { continue; } ?>
<h2 class="subTitle">作品内容[<?php echo $i; ?>]</h2>
<table border>
<tr>
<th>作品名</th>
<td>
<?php echo empty($_POST['prod'][$i]['name']) ? '' : $_POST['prod'][$i]['name']; ?>
<input type="hidden" name="prod[<?php echo $i; ?>][name]" value="<?php echo empty($_POST['prod'][$i]['name']) ? '' : $_POST['prod'][$i]['name']; ?>" /></td>
</tr>
<tr>
<th>作品名読み(カタカナ）</th>
<td>
<?php echo empty($_POST['prod'][$i]['kana']) ? '' : $_POST['prod'][$i]['kana']; ?>
<input type="hidden" name="prod[<?php echo $i; ?>][kana]" value="<?php echo empty($_POST['prod'][$i]['kana']) ? '' : $_POST['prod'][$i]['kana']; ?>" /></td>
</tr>
<tr>
<th>公開日</th>
<td>
<?php echo empty($_POST['prod'][$i]['open_y']) ? '' : $_POST['prod'][$i]['open_y']; ?>年
<?php echo empty($_POST['prod'][$i]['open_m']) ? '' : $_POST['prod'][$i]['open_m']; ?>月
<?php echo empty($_POST['prod'][$i]['open_d']) ? '' : $_POST['prod'][$i]['open_d']; ?>日
<input type="hidden" name="prod[<?php echo $i; ?>][open_y]" value="<?php echo empty($_POST['prod'][$i]['open_y']) ? '' : $_POST['prod'][$i]['open_y']; ?>" />
<input type="hidden" name="prod[<?php echo $i; ?>][open_m]" value="<?php echo empty($_POST['prod'][$i]['open_m']) ? '' : $_POST['prod'][$i]['open_m']; ?>" />
<input type="hidden" name="prod[<?php echo $i; ?>][open_d]" value="<?php echo empty($_POST['prod'][$i]['open_d']) ? '' : $_POST['prod'][$i]['open_d']; ?>" />
</td>
</tr>
<tr>
<th>作品URL</th>
<td>
<?php echo empty($_POST['prod'][$i]['url']) ? '' : $_POST['prod'][$i]['url']; ?>
<input type="hidden" name="prod[<?php echo $i; ?>][url]" value="<?php echo empty($_POST['prod'][$i]['url']) ? '' : $_POST['prod'][$i]['url']; ?>" /></td>
</tr>
<tr>
<th>作品バナーURL</th>
<td>
<?php echo empty($_POST['prod'][$i]['banner']) ? '' : $_POST['prod'][$i]['banner']; ?>
<input type="hidden" name="prod[<?php echo $i; ?>][banner]" value="<?php echo empty($_POST['prod'][$i]['banner']) ? '' : $_POST['prod'][$i]['banner']; ?>" /></td>
</tr>
<tr>
<th>タグ</th>
<td>
<?php echo empty($_POST['prod'][$i]['genre1']) ? '' : $_POST['prod'][$i]['genre1']; ?>　
<?php echo empty($_POST['prod'][$i]['genre2']) ? '' : $_POST['prod'][$i]['genre2']; ?>　
<?php echo empty($_POST['prod'][$i]['genre3']) ? '' : $_POST['prod'][$i]['genre3']; ?>
<input type="hidden" name="prod[<?php echo $i; ?>][genre1]" value="<?php echo empty($_POST['prod'][$i]['genre1']) ? '' : $_POST['prod'][$i]['genre1']; ?>" />
<input type="hidden" name="prod[<?php echo $i; ?>][genre2]" value="<?php echo empty($_POST['prod'][$i]['genre2']) ? '' : $_POST['prod'][$i]['genre2']; ?>" />
<input type="hidden" name="prod[<?php echo $i; ?>][genre3]" value="<?php echo empty($_POST['prod'][$i]['genre3']) ? '' : $_POST['prod'][$i]['genre3']; ?>" />
</td>
</tr>
<tr>
<th>紹介文</th>
<td><?php echo empty($_POST['prod'][$i]['description']) ? '' : $_POST['prod'][$i]['description']; ?></td>
</tr>
</table>
<input type="hidden" name="prod[<?php echo $i; ?>][description]" value="<?php echo empty($_POST['prod'][$i]['description']) ? '' : $_POST['prod'][$i]['description']; ?>">
<?php endfor; ?>

<input type="submit" name="type" value="　修正　" />　　
<input type="submit" name="type" value="送信" />

</form>




<?php else : ?>


<?php if (! empty($error)) : ?>
<div style="color:red; border:1px solid red; width:600px; text-align:center; margin:auto;">
エラーがあります。
</div>
<?php endif; ?>

<h2 class="subTitle">応募者情報とデータ</h2>

<form method="post" action="/cd_form.php">
<input type="hidden" name="mode" value="confirm" />
<table>
<tr>
<th>お名前</th>
<td>
<?php echo empty($error['name']) ? '' : '<div class="error">' . $error['name'] . '</div>'; ?>
<input type="text" name="name" value="<?php echo empty($_POST['name']) ? '' : $_POST['name']; ?>" />
</td>
</tr>
<tr>
<th>ご連絡用アドレス</th>
<td>
<?php echo empty($error['mail']) ? '' : '<div class="error">' . $error['mail'] . '</div>'; ?>
<input size="40" type="text" name="mail" value="<?php echo empty($_POST['mail']) ? '' : $_POST['mail']; ?>" />
</td>
</tr>
<tr>
<th>音源データURL</th>
<td>
<?php echo empty($error['data']) ? '' : '<div class="error">' . $error['data'] . '</div>'; ?>
<input size="60"  type="text" name="data" value="<?php echo empty($_POST['data']) ? '' : $_POST['data']; ?>" />
<br/>
音源とあれば関連する画像などを入れてzipなど１つのファイルにして下さい。<br>
<a href="http://firestorage.jp/">firestorage</a>、<a href="http://www.gigafile.nu/v3/">GigaFile便</a>のようなアップローダや<a href="/upload.php">こちらをご使用下さい</a>
</td>
</tr>
<tr>
<th>連絡事項</th>
<td>
<?php echo empty($error['comment']) ? '' : '<div class="error">' . $error['comment'] . '</div>'; ?>
<textarea cols="30" rows="4" name="comment"><?php echo empty($_POST['comment']) ? '' : $_POST['comment']; ?></textarea>
</td>
</tr>
<th>WEB掲載</th>
<td>掲載しても構わない <input type="checkbox" name="web_flag" value="1" <?php echo empty($_POST['web_flag']) ? '' : 'checked'; ?> /></td>
</tr>
</table>


<h2 class="subTitle">サークル情報</h2>

<table>
<tr>
<th>サークル名</th>
<td>
<?php echo empty($error['circle_name']) ? '' : '<div class="error">' . $error['circle_name'] . '</div>'; ?>
<input size="30" type="text" name="circle_name" value="<?php echo empty($_POST['circle_name']) ? '' : $_POST['circle_name']; ?>" />
</td>
</tr>
<tr>
<th>サークル名読み（カタカナ）</th>
<td>
<?php echo empty($error['circle_kana']) ? '' : '<div class="error">' . $error['circle_kana'] . '</div>'; ?>
<input size="30" type="text" name="circle_kana" value="<?php echo empty($_POST['circle_kana']) ? '' : $_POST['circle_kana']; ?>" />
</td>
</tr>
<tr>
<th>サークルURL</th>
<td>
<?php echo empty($error['url']) ? '' : '<div class="error">' . $error['url'] . '</div>'; ?>
<input size="60"  type="text" name="url" value="<?php echo empty($_POST['url']) ? '' : $_POST['url']; ?>" />
</td>
</tr>
<tr>
<th>サークルバナーURL</th>
<td>
<?php echo empty($error['banner_url']) ? '' : '<div class="error">' . $error['banner_url'] . '</div>'; ?>
<input size="60"  type="text" name="banner_url" value="<?php echo empty($_POST['banner_url']) ? '' : $_POST['banner_url']; ?>" />
</td>
</tr>
<tr>
<th>タグ</th>
<td>
<?php echo empty($error['genre1']) ? '' : '<div class="error">' . $error['genre1'] . '</div>'; ?><a></a>
<?php echo empty($error['genre2']) ? '' : '<div class="error">' . $error['genre2'] . '</div>'; ?>
<?php echo empty($error['genre3']) ? '' : '<div class="error">' . $error['genre3'] . '</div>'; ?>
<input size="15"  type="text" name="genre1" value="<?php echo empty($_POST['genre1']) ? '' : $_POST['genre1']; ?>" />
<input size="15"  type="text" name="genre2" value="<?php echo empty($_POST['genre2']) ? '' : $_POST['genre2']; ?>" />
<input size="15"  type="text" name="genre3" value="<?php echo empty($_POST['genre3']) ? '' : $_POST['genre3']; ?>" />
</td>
</tr>
<tr>
<th>サークル紹介</th>
<td>
<?php echo empty($error['description']) ? '' : '<div class="error">' . $error['description'] . '</div>'; ?>
<textarea cols="30" rows="4" name="description"><?php echo empty($_POST['description']) ? '' : $_POST['description']; ?></textarea>
</td>
</tr>
</table>


<?php for ($i = 1; $i < 11; $i++) : ?>

<h2 class="subTitle">作品内容[<?php echo $i; ?>]</h2>
<table>
<tr>
<th>作品名</th>
<td>
<?php echo empty($error['prod'][$i]['name']) ? '' : '<div class="error">' . $error['prod'][$i]['name'] . '</div>'; ?>
<input size="30" type="text" name="prod[<?php echo $i; ?>][name]" value="<?php echo empty($_POST['prod'][$i]['name']) ? '' : $_POST['prod'][$i]['name']; ?>" />
</td>
</tr>
<tr>
<th>作品名読み(カタカナ）</th>
<td>
<?php echo empty($error['prod'][$i]['kana']) ? '' : '<div class="error">' . $error['prod'][$i]['kana'] . '</div>'; ?>
<input size="30" type="text" name="prod[<?php echo $i; ?>][kana]" value="<?php echo empty($_POST['prod'][$i]['kana']) ? '' : $_POST['prod'][$i]['kana']; ?>" /></td>
</tr>
<tr>
<th>公開日</th>
<td>
<?php echo empty($error['prod'][$i]['open']) ? '' : '<div class="error">' . $error['prod'][$i]['open'] . '</div>'; ?>
<input size="4"  maxlength="4" type="text" name="prod[<?php echo $i; ?>][open_y]" value="<?php echo empty($_POST['prod'][$i]['open_y']) ? '' : $_POST['prod'][$i]['open_y']; ?>" />年
<input size="2"  maxlength="2" type="text" name="prod[<?php echo $i; ?>][open_m]" value="<?php echo empty($_POST['prod'][$i]['open_m']) ? '' : $_POST['prod'][$i]['open_m']; ?>" />月
<input size="2"  maxlength="2" type="text" name="prod[<?php echo $i; ?>][open_d]" value="<?php echo empty($_POST['prod'][$i]['open_d']) ? '' : $_POST['prod'][$i]['open_d']; ?>" />日
</td>
</tr>
<tr>
<th>作品URL</th>
<td>
<?php echo empty($error['prod'][$i]['url']) ? '' : '<div class="error">' . $error['prod'][$i]['url'] . '</div>'; ?>
<input size="60"  type="text" name="prod[<?php echo $i; ?>][url]" value="<?php echo empty($_POST['prod'][$i]['url']) ? '' : $_POST['prod'][$i]['url']; ?>" />
</td>
</tr>
<tr>
<th>作品バナーURL</th>
<td>
<?php echo empty($error['prod'][$i]['banner']) ? '' : '<div class="error">' . $error['prod'][$i]['banner'] . '</div>'; ?>
<input size="60"  type="text" name="prod[<?php echo $i; ?>][banner]" value="<?php echo empty($_POST['prod'][$i]['banner']) ? '' : $_POST['prod'][$i]['banner']; ?>" />
</td>
</tr>
<tr>
<th>タグ（ジャンルなど）</th>
<td>
<?php echo empty($error['prod'][$i]['genre1']) ? '' : '<div class="error">' . $error['prod'][$i]['genre1'] . '</div>'; ?>
<?php echo empty($error['prod'][$i]['genre2']) ? '' : '<div class="error">' . $error['prod'][$i]['genre2'] . '</div>'; ?>
<?php echo empty($error['prod'][$i]['genre3']) ? '' : '<div class="error">' . $error['prod'][$i]['genre3'] . '</div>'; ?>
<select name="prod[<?php echo $i; ?>][genre1]">
<?php foreach ($tags AS $key => $tag) : ?>
<option value="<?php echo $key; ?>" <?php echo $_POST['prod'][$i]['genre1'] == $key ? 'selected' : ''; ?>><?php echo $tag; ?></option>
<?php endforeach; ?>
</select>
<input size="15"  type="text" name="prod[<?php echo $i; ?>][genre2]" value="<?php echo empty($_POST['prod'][$i]['genre2']) ? '' : $_POST['prod'][$i]['genre2']; ?>" />
<input size="15"  type="text" name="prod[<?php echo $i; ?>][genre3]" value="<?php echo empty($_POST['prod'][$i]['genre3']) ? '' : $_POST['prod'][$i]['genre3']; ?>" />
</td>
</tr>
<tr>
<th>紹介文</th>
<td>
<?php echo empty($error['prod'][$i]['description']) ? '' : '<div class="error">' . $error['prod'][$i]['description'] . '</div>'; ?>
<textarea cols="40" rows="6" name="prod[<?php echo $i; ?>][description]"><?php echo empty($_POST['prod'][$i]['description']) ? '' : $_POST['prod'][$i]['description']; ?></textarea>
<br>割と自由です。トラック毎に分けて書いたり、スタッフ情報など自由にご記入頂けます。
</td>
</tr>
</table>
<?php endfor; ?>

<input type="submit" name="" value="　確認　" />

</form>


<?php endif; ?>




		<br style="clear:right;">
	</div>
	<div id="footer"><img src="http://www.dojin-music.info/img/footer.gif" alt="" height="20"></div>
</div>
</body></html>

<?php

function check_post()
{
	require_once '/home/dojin-music/lib/Validator/Validator.php';
	$valid = new Validator;

	$valid->checkDefault('name', $_POST['name'], Validator::REQUIRE_ON, $maxletter = 100);
	$valid->checkMail('mail', $_POST['mail'], $require = Validator::REQUIRE_ON);
	$valid->checkUrl('data', $_POST['data'], $require = Validator::REQUIRE_ON);
	$valid->checkDefault('comment', $_POST['comment'], Validator::REQUIRE_OFF, $maxletter = 1000);


	$valid->checkDefault('circle_name', $_POST['circle_name'], Validator::REQUIRE_ON, $maxletter = 100);
	$valid->checkDefault('circle_kana', $_POST['circle_kana'], $require = Validator::REQUIRE_ON, $maxletter = 100);
	$valid->checkUrl('url', $_POST['url'], $require = Validator::REQUIRE_OFF);
	$valid->checkUrl('banner_url', $_POST['banner_url'], $require = Validator::REQUIRE_OFF);
	$valid->checkDefault('genre1', $_POST['genre1'], Validator::REQUIRE_ON, $maxletter = 15);
	$valid->checkDefault('genre2', $_POST['genre2'], Validator::REQUIRE_OFF, $maxletter = 15);
	$valid->checkDefault('genre3', $_POST['genre3'], Validator::REQUIRE_OFF, $maxletter = 15);
	$valid->checkDefault('description', $_POST['description'], Validator::REQUIRE_OFF, $maxletter = 1000);

	$error = $valid->getError();

	$valid = new Validator;
	$valid->checkDefault('prod', $_POST['prod'][1]['name'], Validator::REQUIRE_ON, $maxletter = 100);
	$valid->checkDefault('kana', $_POST['prod'][1]['kana'], Validator::REQUIRE_ON, $maxletter = 100);
	$valid->checkYmd('open', $_POST['prod'][1]['open_y'], $_POST['prod'][1]['open_m'], $_POST['prod'][1]['open_d'], Validator::REQUIRE_ON);
	$valid->checkUrl('url', $_POST['prod'][1]['url'], $require = Validator::REQUIRE_OFF);
	$valid->checkUrl('banner', $_POST['prod'][1]['banner'], $require = Validator::REQUIRE_OFF);
	$valid->checkDefault('genre1', $_POST['prod'][1]['genre1'], Validator::REQUIRE_ON, $maxletter = 15);
	$valid->checkDefault('genre2', $_POST['prod'][1]['genre2'], Validator::REQUIRE_OFF, $maxletter = 15);
	$valid->checkDefault('genre3', $_POST['prod'][1]['genre3'], Validator::REQUIRE_OFF, $maxletter = 15);
	$valid->checkDefault('description', $_POST['prod'][1]['description'], Validator::REQUIRE_OFF, $maxletter = 1000);
	$error_tmp = $valid->getError();
	if (! empty($error_tmp)) {
		$error['prod'][1] = $error_tmp;
	}

	for ($i = 2; $i < 11; $i++) {
		if (empty($_POST['prod'][$i]['name'])) {
			continue;
		}

		$valid = new Validator;
		$valid->checkDefault('prod', $_POST['prod'][$i]['name'], Validator::REQUIRE_ON, $maxletter = 100);
		$valid->checkDefault('kana', $_POST['prod'][$i]['kana'], Validator::REQUIRE_ON, $maxletter = 100);
		$valid->checkYmd('open', $_POST['prod'][$i]['open_y'], $_POST['prod'][$i]['open_m'], $_POST['prod'][$i]['open_d'], Validator::REQUIRE_ON);
		$valid->checkUrl('url', $_POST['prod'][$i]['url'], $require = Validator::REQUIRE_OFF);
		$valid->checkUrl('banner', $_POST['prod'][$i]['banner'], $require = Validator::REQUIRE_OFF);
		$valid->checkDefault('genre1', $_POST['prod'][$i]['genre1'], Validator::REQUIRE_ON, $maxletter = 15);
		$valid->checkDefault('genre2', $_POST['prod'][$i]['genre2'], Validator::REQUIRE_OFF, $maxletter = 15);
		$valid->checkDefault('genre3', $_POST['prod'][$i]['genre3'], Validator::REQUIRE_OFF, $maxletter = 15);
		$valid->checkDefault('description', $_POST['prod'][$i]['description'], Validator::REQUIRE_OFF, $maxletter = 1000);
		$error_tmp = $valid->getError();
		if (! empty($error_tmp)) {
			$error['prod'][$i] = $error_tmp;
		}
	}

	return $error;
}


function convert_post()
{
	require_once '/home/dojin-music/lib/Validator/Converter.php';

	$_POST['name'] = Converter::normal($_POST['name']);
	$_POST['data'] = Converter::normal($_POST['data']);
	$_POST['comment'] = Converter::normal($_POST['comment']);

	$_POST['circle_name'] = Converter::normal($_POST['circle_name']);
	$_POST['circle_kana'] = Converter::normal($_POST['circle_kana']);
	$_POST['url'] = Converter::normal($_POST['url']);
	$_POST['banner_url'] = Converter::normal($_POST['banner_url']);
	$_POST['genre1'] = Converter::normal($_POST['genre1']);
	$_POST['genre2'] = Converter::normal($_POST['genre2']);
	$_POST['genre3'] = Converter::normal($_POST['genre3']);
	$_POST['description'] = Converter::normal($_POST['description']);

	for ($i = 1; $i < 11; $i++) {
		$_POST['prod'][$i]['name'] = Converter::normal($_POST['prod'][$i]['name']);
		$_POST['prod'][$i]['kana'] = Converter::normal($_POST['prod'][$i]['kana']);
		$_POST['prod'][$i]['open_y'] = Converter::number($_POST['prod'][$i]['open_y']);
		$_POST['prod'][$i]['open_m'] = Converter::number($_POST['prod'][$i]['open_m']);
		$_POST['prod'][$i]['open_d'] = Converter::number($_POST['prod'][$i]['open_d']);
		$_POST['prod'][$i]['url'] = Converter::normal($_POST['prod'][$i]['url']);
		$_POST['prod'][$i]['banner'] = Converter::normal($_POST['prod'][$i]['banner']);
		$_POST['prod'][$i]['genre1'] = Converter::normal($_POST['prod'][$i]['genre1']);
		$_POST['prod'][$i]['genre2'] = Converter::normal($_POST['prod'][$i]['genre2']);
		$_POST['prod'][$i]['genre3'] = Converter::normal($_POST['prod'][$i]['genre3']);
		$_POST['prod'][$i]['description'] = Converter::normal($_POST['prod'][$i]['description']);
	}
}

function registData()
{
	require_once '/home/dojin-music/lib/mysql.php';
	$mysql = new mysql;

	$mysql->query('START TRANSACTION');

 	$sql = "INSERT INTO `book_cd_circle` (`name`, `mail`, `data_url`, `comment`, `circle_name`, `circle_kana`, `circle_url`, `circle_banner`, `genre1`, `genre2`, `genre3`, `description`, `web_flag`)
            VALUES('{$_POST['name']}', '{$_POST['mail']}', '{$_POST['data']}', '{$_POST['comment']}', '{$_POST['circle_name']}', '{$_POST['circle_kana']}', '{$_POST['url']}',
 	               '{$_POST['banner_url']}', '{$_POST['genre1']}', '{$_POST['genre2']}', '{$_POST['genre3']}', '{$_POST['description']}', '{$_POST['web_flag']}')";
	$id = $mysql->query($sql);
	$id = $mysql->getInsertId();
	for ($i = 1; $i < 11; $i++) {
		if (empty($_POST['prod'][$i]['name'])) {
			continue;
		}
		$sql = "INSERT INTO `book_cd_prod` (`circle_id` , `name`, `kana`, `open_y`, `open_m`, `open_d`, `url`, `banner`, `genre1`, `genre2`, `genre3`, `description`)
		        VALUES($id, '{$_POST['prod'][$i]['name']}', '{$_POST['prod'][$i]['kana']}', '{$_POST['prod'][$i]['open_y']}', '{$_POST['prod'][$i]['open_m']}', '{$_POST['prod'][$i]['open_d']}',
		               '{$_POST['prod'][$i]['url']}', '{$_POST['prod'][$i]['banner']}', '{$_POST['prod'][$i]['genre1']}', '{$_POST['prod'][$i]['genre2']}', '{$_POST['prod'][$i]['genre3']}', '{$_POST['prod'][$i]['description']}')";
		$mysql->query($sql);
	}
	$mysql->query('COMMIT');
}

function sendMail()
{
	require_once '/home/dojin-music/lib/sendMail.php';
	$mail = new sendMail;

	$message = "
ボイドラ試聴CDにご応募頂きありがとうございます。
以下がご応募頂いた内容になります。

なにかお気づきの点がございましたら、
webmaster@dojin-music.info
までご連絡下さい。

--------------------------------------------------------------
お名前：{$_POST['name']}
データURL：{$_POST['data']}
コメント：{$_POST['comment']}

サークル名　：{$_POST['circle_name']}
サークル読み：{$_POST['circle_kana']}
URL：{$_POST['url']}
バナーURL：{$_POST['banner_url']}
タグ：{$_POST['genre1']}　{$_POST['genre2']}　{$_POST['genre3']}
サークル説明：{$_POST['description']}
";
	for ($i = 1; $i < 11; $i++) {
		if (empty($_POST['prod'][$i]['name'])) {
			continue;
		}
		$message .= "
--------------------------------------------------------------
作品名：{$_POST['prod'][$i]['name']}
作品名読み：{$_POST['prod'][$i]['kana']}
公開日：{$_POST['prod'][$i]['open_y']}/{$_POST['prod'][$i]['open_m']}/{$_POST['prod'][$i]['open_d']}
URL:{$_POST['prod'][$i]['url']}
バナー：{$_POST['prod'][$i]['banner']}
タグ：{$_POST['prod'][$i]['genre1']}　{$_POST['prod'][$i]['genre2']}　{$_POST['prod'][$i]['genre3']}
説明：{$_POST['prod'][$i]['description']}

";
	}

	$ret = $mail->sendOutMail('ボイドラ本試聴CD参加', $message, 'webmaster@dojin-music.info');
	$ret = $mail->sendOutMail('ボイドラ本試聴CD参加受理', $message, $_POST['mail']);
	if (! $ret) {
		error_log('mail send error');
	}
}
?>
