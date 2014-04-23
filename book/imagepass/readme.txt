第一步：把global.php所在文件夹拷贝到站点下，改名为imagepass。
第二步：在需要上传图片的页面包含此global.php文件.
例如：require_once("../../imagepass/global.php");
第三步：在上传图片的地方输入：<input type="file" name="images">
第四步：在向数据库写入的程序中调用global.php中的Upload($file_name,$path,$pub,$size=1048576)函数
第一个参数:文件域的名称
第二个参数：图片上传路径,从根目录开始匹配
第三个参数：上传图片的格式
第四个参数：上传文件大小：
例：$imagepath= Upload("images","/imagepass/images/",array(".gif",".jpg",".jpeg"),51200)  //它返回图片的路径;
 
注意：表单中要加上enctype="multipart/form-data"