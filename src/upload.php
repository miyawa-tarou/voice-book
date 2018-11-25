<?php


$uploader = new Upload;
$uploader->header();
if($_GET['m'] == "upload"){
	$uploader->send();
}
$uploader->form();



class Upload{

	public function header(){
		print "<html><head><title>10選アップローダ</title></head><body>";
	}

	public function form($mes=""){

		print "<center>";
		print "<font color=\"red\">$mes</font><br />";
		print "アップローダ(zipのみ)";
		print "<form enctype=\"multipart/form-data\" action=\"upload.php?m=upload\" method=\"post\">";
		print "<input type=\"file\" name=\"upfile\" size=\"50\" />(40MBまで)<br />";

		print "<input type=\"submit\" value=\"送信\">";
		print "</form>";
		print "</center>";

		$this->footer();

	}

	public function send(){

		$upfile = $_FILES['upfile']['tmp_name'];
		$upfile_name = $_FILES['upfile']['name'];
		$upfile_type = $_FILES['upfile']['type'];
		$upfile_size = $_FILES['upfile']['size'];

		if(!is_uploaded_file($upfile)){
			$this->form("ファイルが指定されていません");
		}
		if(($upfile_size > 40960000 || $upfile_size == 0) AND $upfile != ""){
			$this->form("ファイルのサイズが大きいか不正です（40MBまでです）");
		}

		$str = substr($_FILES['upfile']['name'],-4,4);
		if($str != ".zip"){
			$this->form("ファイルの種類が不正です（zipのみ）");
		}

		$file = md5($upfile_name . time());
		if (!move_uploaded_file($upfile, "upload/" . $file . $str)) {
			$this->form("アップロードに失敗");
		}

		print "<center>アップロードしました<br />";
		print "以下のファイル名をコピーして、送信して下さい↓<br />";
		print "http://www.doujin-ongaku.org/2011au/upload/" . $file . $str;
		print "</center>";

		$this->footer();
	}

	public function footer(){
		print "</body></html>";
		exit;
	}

}

?>