<?php require_once('../AdminUser/config/config.php');  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;My Query</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#CDDFF3">	
<table style="vertical-align:top;" width="480" align="center" border="0">
<?php $sql = mysql_query("SELECT * FROM hrm_employee_queryemp WHERE QueryId=".$_REQUEST['Qid'], $con) or die(mysql_error()); $res = mysql_fetch_array($sql); ?>
<tr><td><table border="0">
 <tr><td style="width:480px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top"><u><b>Subject</b></u> :-&nbsp; <?php if($res['QuerySubject']!='N'){ echo $res['QuerySubject']; } else { echo $res['OtherSubject']; } ?><br><br></td></tr>
 <tr><td style="width:480px; height:250px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
<?php if($res['QueryNoOfTime']==1){echo '(<b>Q1)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QueryDT'])).'</u></font>:</b>&nbsp;'.$res['QueryValue']; if($res['QueryReply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReplyDT'])).'</u></font>:</b>&nbsp;'.$res['QueryReply']; }}?>

<?php if($res['QueryNoOfTime']==2){echo '(<b>Q1)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QueryDT'])).'</u></font>:</b>&nbsp;'.$res['QueryValue']; if($res['QueryReply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReplyDT'])).'</u></font>:</b>&nbsp;'.$res['QueryReply']; } echo '<br><br>(<b>Q2)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['Query2DT'])).'</u></font>:</b>&nbsp;'.$res['Query2Value']; if($res['Query2Reply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReply2DT'])).'</u></font>:</b>&nbsp;'.$res['Query2Reply']; }}?>

<?php if($res['QueryNoOfTime']==3){echo '(<b>Q1)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QueryDT'])).'</u></font>:</b>&nbsp;'.$res['QueryValue']; if($res['QueryReply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReplyDT'])).'</u></font>:</b>&nbsp;'.$res['QueryReply']; } echo '<br><br>(<b>Q2)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['Query2DT'])).'</u></font>:</b>&nbsp;'.$res['Query2Value']; if($res['Query2Reply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReply2DT'])).'</u></font>:</b>&nbsp;'.$res['Query2Reply']; } echo '<br><br>(<b>Q3)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['Query3DT'])).'</u></font>:</b>&nbsp;'.$res['Query3Value']; if($res['Query3Reply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReply3DT'])).'</u></font>:</b>&nbsp;'.$res['Query3Reply']; }}?>

<?php if($res['QueryNoOfTime']==4){echo '(<b>Q1)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QueryDT'])).'</u></font>:</b>&nbsp;'.$res['QueryValue']; if($res['QueryReply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReplyDT'])).'</u></font>:</b>&nbsp;'.$res['QueryReply']; } echo '<br><br>(<b>Q2)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['Query2DT'])).'</u></font>:</b>&nbsp;'.$res['Query2Value']; if($res['Query2Reply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReply2DT'])).'</u></font>:</b>&nbsp;'.$res['Query2Reply']; } echo '<br><br>(<b>Q3)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['Query3DT'])).'</u></font>:</b>&nbsp;'.$res['Query3Value']; if($res['Query3Reply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReply3DT'])).'</u></font>:</b>&nbsp;'.$res['Query3Reply']; } echo '<br><br>(<b>Q4)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['Query4DT'])).'</u></font>:</b>&nbsp;'.$res['Query4Value']; if($res['Query4Reply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReply4DT'])).'</u></font>:</b>&nbsp;'.$res['Query4Reply']; }}?>

<?php if($res['QueryNoOfTime']==5){echo '(<b>Q1)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QueryDT'])).'</u></font>:</b>&nbsp;'.$res['QueryValue']; if($res['QueryReply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReplyDT'])).'</u></font>:</b>&nbsp;'.$res['QueryReply']; } echo '<br><br>(<b>Q2)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['Query2DT'])).'</u></font>:</b>&nbsp;'.$res['Query2Value']; if($res['Query2Reply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReply2DT'])).'</u></font>:</b>&nbsp;'.$res['Query2Reply']; } echo '<br><br>(<b>Q3)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['Query3DT'])).'</u></font>:</b>&nbsp;'.$res['Query3Value']; if($res['Query3Reply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReply3DT'])).'</u></font>:</b>&nbsp;'.$res['Query3Reply']; } echo '<br><br>(<b>Q4)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['Query4DT'])).'</u></font>:</b>&nbsp;'.$res['Query4Value']; if($res['Query4Reply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReply4DT'])).'</u></font>:</b>&nbsp;'.$res['Query4Reply']; } echo '<br><br>(<b>Q5)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['Query5DT'])).'</u></font>:</b>&nbsp;'.$res['Query5Value']; if($res['Query5Reply']!='') { echo '<br>(<b>Reply)&nbsp;<font style="color:#800000"><u>'.date("d-M-y",strtotime($res['QReply5DT'])).'</u></font>:</b>&nbsp;'.$res['Query5Reply'];}}?>
 </td></tr>
</table></td></tr>
</table>
</body>
</html>