<table width="999" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
  <tr>
    <td bgcolor="#FFFFFF"><img src="top.jpg" width="999" height="150" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="999" height="32" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" background="button1_bg.jpg"><a href="index.php" title="��ҳ">��ҳ</a></td>
        <td align="center" background="button1_bg.jpg"><a href="index.php?proid=<?php echo urlencode('��ҳ����');?>" title="��ҳ����">��ҳ����</a></td>
        <td align="center" background="button1_bg.jpg"><a href="index.php?proid=<?php echo urlencode('����Ӫ��');?>" title="����Ӫ��">����Ӫ��</a></td>
        <td align="center" background="button1_bg.jpg"><a href="index.php?proid=<?php echo urlencode('asp���');?>" title="asp���">asp���</a></td>
        <td align="center" background="button1_bg.jpg"><a href="index.php?proid=<?php echo urlencode('php���');?>" title="php���">php���</a></td>
        <td align="center" background="button1_bg.jpg"><a href="index.php?proid=<?php echo urlencode('�������');?>" title="�������">�������</a></td>
        <td align="center" background="button1_bg.jpg"><a href="landing.php"  title="��½ע��">�û���½</a>&nbsp;&nbsp;<?php 
		if ($_SESSION['id']){
			echo "<a href='landing.php?tj=out'  title='�˳�'>�˳�</a>";
		}
		?></td>
      </tr>
    </table></td>
  </tr>
</table>
