<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>同人ボイドラ本協力者募集｜同人音楽.info</title>
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
</style>
</head>
<body>
<div id="box">
	<div id="header">
		<h1><a href="http://www.dojin-music.info/"><img src="http://www.dojin-music.info/img/rogo.gif" alt="同人音楽.info" style="float: left; border: 0px none;" height="33" width="140"></a></h1>
	</div>
	<div style="width:600px; margin:auto; text-align:left;">

	<h2 class="subTitle">企画協力とか興味あるよご連絡フォーム</h2>
<?php if (empty($_GET['name']) || empty($_GET['mail']) || empty($_GET['interests'])) {
	if (! empty($_GET['mode'])) {
		$error = '色々と足りていません';
	}
	$_GET['mode'] = '';
}
?>
<?php if ($_GET['mode'] !== 'confirm' && ! ($_GET['mode'] === 'commit' && $_GET['a'] === '送信')) : ?>
<?php foreach ($_GET AS $key => $value) {
	if (! is_array($value)) {
		$params[$key] = htmlspecialchars($value);
	}
}
if (empty($_GET['interests'])) $_GET['interests'] = array();
?>

<?php echo empty($error) ? '': "<div style=\"color:red;\">{$error}</div>"; ?>
	<form action="contact.php" method="get">
	<input type="hidden" name="mode" value="confirm">
	<table border width="600">
	<tr>
	<td>お名前</td><td><input type="text" name="name" value="<?php echo isset($params['name']) ? $params['name'] : ''; ?>"></td>
	</tr>
	<tr>
	<td>ご連絡先</td><td><input type="text" name="mail" value="<?php echo isset($params['mail']) ? $params['mail'] : ''; ?>" size="50"><br>メールとかtwitterとか連絡が取れる方法</td>
	</tr>
	<tr>
	<td>ご興味内容</td><td style="line-height:20px;">
	<label><input type="checkbox" name="interests[]" value="なんとなく" <?php echo array_search('なんとなく', $_GET['interests']) !== false ? 'checked': ''; ?>>なんとなく</label><br>
	本：<label><input type="checkbox" name="interests[]" value="本：絵（挿絵/表紙絵）" <?php echo array_search('本：絵（挿絵/表紙絵）', $_GET['interests']) !== false ? 'checked': ''; ?>>絵（挿絵/表紙絵）</label>　<label><input type="checkbox" name="interests[]" value="本：文章" <?php echo array_search('本：文章', $_GET['interests']) !== false ? 'checked': ''; ?>>文章</label>　<label><input type="checkbox" name="interests[]" value="本：その他" <?php echo array_search('本：その他', $_GET['interests']) !== false ? 'checked': ''; ?>>その他</label><br>
	ＣＤ：<label><input type="checkbox" name="interests[]" value="ＣＤ：試聴作品参加" <?php echo array_search('ＣＤ：試聴作品参加', $_GET['interests']) !== false ? 'checked': ''; ?>>試聴作品参加</label>　<label><input type="checkbox" name="interests[]" value="ＣＤ：盤面デザイン" <?php echo array_search('ＣＤ：盤面デザイン', $_GET['interests']) !== false ? 'checked': ''; ?>>盤面デザイン</label>　<label><input type="checkbox" name="interests[]" value="ＣＤ：HTMLデザイン" <?php echo array_search('ＣＤ：HTMLデザイン', $_GET['interests']) !== false ? 'checked': ''; ?>>HTMLデザイン</label>　<label><input type="checkbox" name="interests[]" value="ＣＤ：その他" <?php echo array_search('ＣＤ：その他', $_GET['interests']) !== false ? 'checked': ''; ?>>その他</label><br>
	カウントダウンボイス：<label><input type="checkbox" name="interests[]" value="カウントダウン：個人参加" <?php echo array_search('カウントダウン：個人参加', $_GET['interests']) !== false ? 'checked': ''; ?>>個人参加</label>　<label><input type="checkbox" name="interests[]" value="カウントダウンボイス：団体/企画参加" <?php echo array_search('カウントダウンボイス：団体/企画参加', $_GET['interests']) !== false ? 'checked': ''; ?>>団体/企画参加</label>　<label><input type="checkbox" name="interests[]" value="カウントダウン：その他" <?php echo array_search('カウントダウン：その他', $_GET['interests']) !== false ? 'checked': ''; ?>>その他</label><br>
	その他：<label><input type="checkbox" name="interests[]" value="サイトデザイン" <?php echo array_search('サイトデザイン', $_GET['interests']) !== false ? 'checked': ''; ?>>サイトデザイン</label>　<label><input type="checkbox" name="interests[]" value="その他" <?php echo array_search('その他', $_GET['interests']) !== false ? 'checked': ''; ?>>その他</label><br>
	自由記述：<br>
	<textarea name="free" cols="30" rows="4"><?php echo isset($params['free']) ? $params['free'] : ''; ?></textarea>
	</td></tr>
	<tr><td colspan="2" style="text-align:center;"><input type="submit" name="a" value="確認"></a></td></tr>
	</table>
	</form>

<?php elseif ($_GET['mode'] === 'confirm' && $_GET['a'] === '確認') : ?>
<?php foreach ($_GET AS $key => $value) {
	$params[$key] = htmlspecialchars($value);
}
?>

	<form action="contact.php?mode=commit" method="get">
	<input type="hidden" name="mode" value="commit">
	<table width="600" border>
	<tr>
	<td>お名前</td><td><?echo $params['name']; ?><input type="hidden" name="name" value="<?php echo $params['name']; ?>"></td>
	</tr>
	<tr>
	<td>ご連絡先</td><td><?echo $params['mail']; ?><input type="hidden" name="mail" value="<?php echo $params['mail']; ?>"></td>
	</tr>
	<tr>
	<td>ご興味内容</td><td>
<?php foreach($_GET['interests'] AS $val) : ?>
<?php $val = htmlspecialchars($val); ?>
	・<?php echo $val; ?><input type="hidden" name="interests[]" value="<?php echo $val; ?>"><br>
<?php endforeach; ?>
	<?php echo ! empty($params['free']) ? '自由記述：' . nl2br($params['free']) : ''; ?>
<input type="hidden" name="free" value="<?echo isset($params['free']) ? $params['free'] : ''; ?>">
	</td></tr>
	<tr><td colspan="2" style="text-align:center;"><input type="submit" name="a" value="送信"></a></td></tr>
	</table>
	ごめんなさい、間違っていたらブラウザの戻るで戻って下さい＞＜
	</form>


<?php elseif ($_GET['mode'] === 'commit' && $_GET['a'] === '送信') : ?>
<?php
require_once '/home/dojin-music/lib/sendMail.php';
$mail = new sendMail;

$title = 'ボイドラ本興味あるよメール';
$message = "
名前：{$_GET['name']}
連絡先：{$_GET['mail']}
興味：\n";
foreach($_GET['interests'] AS $val) {
	$message .= "・{$val}\n";
}
$message = $message . htmlspecialchars($_GET['free']);

$ret = $mail->sendMessage($title, $message);

if (! $ret) {
 print 'error';
} else {
 print '送信完了しました！ありがとうございます。近々ご連絡致します。<br><br><a href="/">戻る</a>';

}
?>

<?php endif; ?>
	</div>
	<div id="footer"><img src="http://www.dojin-music.info/img/footer.gif" alt="" height="20"></div>
</div>
</body></html>
