<?php
if($_FILES['file']['error']>0){
  exit("檔案上傳失敗！");//如果出現錯誤則停止程式
}

move_uploaded_file($_FILES['file']['tmp_name'],'file/'.$_POST['account'].'-'.$_POST['date']);//複製檔案
echo '<a href="file/'.$_FILES['file']['name'].'">file/'.$_POST['account'].'-'.$_POST['date'].'</a>';//顯示檔案路徑
echo $_FILES['file']['type'];
?>