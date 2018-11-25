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
		sendMail();
		header("Location: http://voice-book.dojin-music.info/finish.html");
		exit;
	}
}

if (($mode !== 'confirm' && $mode !== 'commit') || ! empty($error)) {
	$mode = 'form';
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ボイドラ本・受け取り/打ち上げフォーム｜同人音楽.info</title>
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



<form method="post" action="/form.php">
<input type="hidden" name="mode" value="commit" />
<table border width="600">
<tr>
<th>お名前</th>
<td>
<?php echo $_POST['name']; ?>
<input type="hidden" name="name" value="<?php echo $_POST['name']; ?>" />
</td>
</tr>
<tr>
<th>本のお渡し方法</th>
<td>
<?php if ($_POST['watashi'] === 'S14') : ?>
<input type="hidden" name="watashi" value="S14">同人音楽.infoスペースにて(S14ab)
<?php elseif ($_POST['watashi'] === 'your_space') : ?>
<input type="hidden" name="watashi" value="your_space" />貴サークルスペースにて
<?php elseif ($_POST['watashi'] === 'post') : ?>
<input type="hidden" name="watashi" value="post" />郵送
<?php elseif ($_POST['watashi'] === 'no') : ?>
<input type="hidden" name="watashi" value="no" />不要もしくは関係無し
<?php endif; ?>
</td>
</tr>
<tr>
<th>打ち上げ</th>
<td>
<?php if ($_POST['uchiage'] === '0') : ?>
参加しない
<?php else : ?>
<?php echo $_POST['uchiage']; ?>人で参加予定
<?php endif; ?>
<input type="hidden" name="uchiage" value="<?php echo $_POST['uchiage']; ?>" />
</td>
</tr>
<tr>
<th>連絡事項</th>
<td>
<?php echo nl2br($_POST['comment']); ?>
<input type="hidden" name="comment" value="<?php echo $_POST['comment']; ?>" />
</td>
</tr>
</table>
<input type="submit" name="type" value="　修正　" />　　
<input type="submit" name="type" value="送信" />


</form>





<?php else : ?>


<?php if (! empty($error)) : ?>
<div style="color:red; border:1px solid red; width:600px; text-align:center; margin:auto;">
エラーがあります。
</div>
<?php endif; ?>


<h2 class="subTitle">お渡し・打ち上げ確認用フォーム</h2>

ボイドラ本にご協力頂いた方には完成品のお渡しを行っております。こちらの連絡先をみやわより直接ご連絡した方が対象者になります。<br/>
打ち上げの方は適当ですので、上記関係無くご連絡下さい。ある程度拡散しても構いません。<br/>
ある程度ボイドラ関係の方が多くなるというか現状その当たりにしか声をおかけしてない状態です。<br/>
場所は規模がわからないので未定ですが、浜松町かその近くを予定しております。予算は常識の範囲内。
時間も未定ですが17時か17時半か、片付けをしてゆっくり移動しても間に合う程度を考えています<br/>
是非お誘い合わせの上ご参加下さい。<br/>
打ち上げの方は4月5日を仮の締切と致します。人数等未確定でしたら意思表示と予想を書いて頂ければ幸いです。よろしくお願い致します。


<form method="post" action="/form.php">
<input type="hidden" name="mode" value="confirm" />
<table border>
<tr>
<th>お名前</th>
<td>
<?php echo empty($error['name']) ? '' : '<div class="error">' . $error['name'] . '</div>'; ?>
<input type="text" name="name" value="<?php echo empty($_POST['name']) ? '' : $_POST['name']; ?>" />
</td>
</tr>
<tr>
<th>本のお渡し方法</th>
<td>
<?php echo empty($error['watashi']) ? '' : '<div class="error">' . $error['watashi'] . '</div>'; ?>
<label><input type="radio" name="watashi" value="S14"  <?php echo ($_POST['watashi'] == 'S14') ? 'checked' : ''; ?>/>同人音楽.infoスペースにて(S14ab)</label>　
<label><input type="radio" name="watashi" value="your_space" <?php echo ($_POST['watashi'] == 'your_space') ? 'checked' : ''; ?> />貴サークルスペースにて</label><br/>
<label><input type="radio" name="watashi" value="post" <?php echo ($_POST['watashi'] == 'post') ? 'checked' : ''; ?> />郵送</label>　
<label><input type="radio" name="watashi" value="no" <?php echo ($_POST['watashi'] == 'no') ? 'checked' : ''; ?> />不要もしくは関係無し</label>
</td>
</tr>
<tr>
<th>打ち上げ</th>
<td>
<select name="uchiage">
<option value="0">参加しない</option>
<?php for ($i = 1; $i < 11; $i++) : ?>
<option value="<?php echo $i; ?>" <?php echo ($_POST['uchiage'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?>人</option>
<?php endfor; ?>
</select>
</td>
</tr>
<tr>
<th>連絡事項</th>
<td>
<?php echo empty($error['comment']) ? '' : '<div class="error">' . $error['comment'] . '</div>'; ?>
必要に応じて連絡先やコメントをお送りください。<br/>
<textarea cols="50" rows="6" name="comment"><?php echo empty($_POST['comment']) ? '' : $_POST['comment']; ?></textarea><br/>
入力内容はメールでみやわ宛に送られます。<br/>
名前書いても連絡先わからんだろうと思われたら連絡事項欄に記入お願いします。
</td>
</tr>
</table>
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
	$valid->checkDefault('watashi', $_POST['watashi'], Validator::REQUIRE_ON, $maxletter = 20);
	$error = $valid->getError();
	return $error;
}

function convert_post()
{
	require_once '/home/dojin-music/lib/Validator/Converter.php';

	$_POST['name'] = Converter::normal($_POST['name']);
	$_POST['uchiage'] = Converter::number($_POST['uchiage']);
	$_POST['comment'] = Converter::normal($_POST['comment']);
}

function sendMail()
{
		require_once '/home/dojin-music/lib/sendMail.php';
		$mail = new sendMail;

		$message = "
		ボイドラ本お渡し・打ち上げ

		--------------------------------------------------------------
		名前：{$_POST['name']}
		お渡し：";
		if ($_POST['watashi'] === 'S14') {
			$message .= '同人音楽.infoスペースにて(S14ab)';
		} elseif ($_POST['watashi'] === 'your_space') {
			$message .= '貴サークルスペースにて';
		} elseif ($_POST['watashi'] === 'post') {
			$message .= '郵送';
		} elseif ($_POST['watashi'] === 'no') {
			$message .= '不要もしくは関係無し';
		}

		$message .= "
		打ち上げ：{$_POST['uchiage']}名
		コメント：{$_POST['comment']}
	";
	$ret = $mail->sendOutMail('打ち上げとか渡す方法とかボイドラ本', $message, 'webmaster@dojin-music.info');

	if (! $ret) {

	}
}

?>