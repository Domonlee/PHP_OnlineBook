<?php

function Upload($file_name,$path,$pub,$size=1048576){
	$type        = implode(",",$pub);
	$root        = $_SERVER['DOCUMENT_ROOT'];                //查找站点根路径
	$image       = $_FILES[$file_name];                      //接收文件域的值（一个数组）
	if($image['name']=="")
	{
		return "";
	}
	$upload_path = $root.$path;                              //设置上传文件位置
	//echo "alert($upload_path);";
	$leixing     = strtolower(strrchr($image['name'],"."));  //把上传的文件名“.”以后的部分全部小写（取得文件的扩展名）
	$suijishu    = rand(100,999);                            //取一个100--999的随机数；
	$server_file = time().$suijishu.$leixing;                //取得上传文件名(时间戳加随机数加扩展名)
	if (in_array($leixing,$pub))
	{                           //判断扩展名，（设置上传类型）
		 if ($image['size'] > $size){                            //比较上传文件大小和甚至的大小
			echo "<script language='javascript'>";
			echo "alert(\"你上传得文件太大，请不要超过50K\");";
			echo "window.history.go(-1);";
			echo "</script>";
			exit;
		 }
		$wenjia = 0;               
		 if (file_exists($upload_path.$server_file) && !$wenjia){  //判断文件名是否存在
			echo "<script language='javascript'>";
			echo "alert(\"存在相同文件名的文件\");";
			echo "window.history.go(-1);";
			echo "</script>";
			exit; 
		 }
		 if (!move_uploaded_file($image['tmp_name'],$upload_path.$server_file)){//上传文件
			echo "<script language='javascript'>";
			echo "alert('上传文件失败，请从新上传');";
			echo "window.history.go(-1);";
			echo "</script>";
			exit; 
		 }
	}else{
		echo "<script language='javascript'>";
		echo "alert(\"上传文件类型不支持，请上传'".$type."'类型的文件\");";
		echo "window.history.go(-1);";
		echo "</script>";
		exit; 
	}
	return  $path.$server_file;                 //返回文件名(含路径)
}

?>
