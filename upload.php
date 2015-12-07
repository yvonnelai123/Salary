<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
if($_FILES['file']['error']>0){
  exit("檔案上傳失敗！");//如果出現錯誤則停止程式
}
if(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION) != 'xlsx'){
	exit("檔案格式錯誤！");//如果出現錯誤則停止程式
}
move_uploaded_file($_FILES['file']['tmp_name'],'file/'.$_POST['account'].'-'.$_POST['date'].'.'.pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));//複製檔案
?>