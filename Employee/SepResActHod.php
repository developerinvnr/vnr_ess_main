<?php require_once('../AdminUser/config/config.php'); 
if($_POST['SentRes'])
{
  
  $sqlU=mysql_query("update hrm_employee_separation set NoticeDay=".$_POST['NoticeDay'].", Hod_Approved='".$_POST['SepValue']."', Hod_RelievingDate='".date("Y-m-d",strtotime($_POST['HodDate']))."', Hod_SysDate='".date("Y-m-d")."', Hod_Remark='".$_POST['HodRemark']."', TypeOfExit='".$_POST['TypeOfExit']."', Hod_SaveDate='".date("Y-m-d")."', ResignationStatus=3 where EmpSepId=".$_POST['SepId'], $con);
  
  if($sqlU)
  {
   
   $sqlEmp=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,DepartmentCode,DesigCode from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId where g.EmployeeID=".$_POST['EmpId'], $con); $resEmp=mysql_fetch_assoc($sqlEmp); $Ename=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'].', Dept: '.$resEmp['DepartmentCode'].' ('.$resEmp['DesigCode'].')';
   
   /*$sqlEmp=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['EmpId'], $con); $resEmp=mysql_fetch_assoc($sqlEmp); $Ename=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];*/
   
   $sqlRep=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['RepId'], $con); $resRep=mysql_fetch_assoc($sqlRep); $Aname=$resRep['Fname'].' '.$resRep['Sname'].' '.$resRep['Lname'];
   $sqlHod=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['HodId'], $con); $resHod=mysql_fetch_assoc($sqlHod); $Hname=$resHod['Fname'].' '.$resHod['Sname'].' '.$resHod['Lname'];
   $sqlR2=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['RTRId'], $con); $resR2=mysql_fetch_assoc($sqlR2); $R2name=$resR2['Fname'].' '.$resR2['Sname'].' '.$resR2['Lname'];
   $sqlR3=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['RTR2Id'], $con); $resR3=mysql_fetch_assoc($sqlR3); $R3name=$resR3['Fname'].' '.$resR3['Sname'].' '.$resR3['Lname'];
   
   if($_POST['SepValue']=='Y'){$action='accepted';}elseif($_POST['SepValue']=='C'){$action='rejected';}
                                      //being processed    
/************************************************ Employee ***********************************************/   
/*
if($resEmp['EmailId_Vnr']!='')
{
$email_to6 = $resEmp['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Resignation ".$action;
$email_txt = "Resignation ".$action;
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$email_message6 .="Your resignation application is ".$action." by HOD. \n\n";
$email_message6 .="Thanks & Regards\n";
$email_message6 .="HR\n\n";
$ok = @mail($email_to6, $email_subject, $email_message6, $headers);
} 
*/

/************************************************ Reporting ***********************************************/   
if($resRep['EmailId_Vnr']!='')
{
//$email_to = $resRep['EmailId_Vnr'];
//$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Resignation ".$action;
//$email_txt = "Resignation ".$action;
//$headers = "From: ".$email_from."\r\n"; 
//$semi_rand = md5(time()); 
//$headers .= "MIME-Version: 1.0\r\n";
//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$email_message .=$Ename." resignation application is ".$action." by HOD, for details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$email_message .="Thanks & Regards\n";
$email_message .="HR\n\n";
//$ok = @mail($email_to, $email_subject, $email_message, $headers);

$subject=$email_subject;
$body=$email_message;
$email_to=$resRep['EmailId_Vnr'];
require 'vendor/mail_admin.php';

} 

/************************************************ HR ***********************************************/ 
//$email_to2 = 'vspl.hr@vnrseeds.com';
//$email_from = 'admin@vnrseeds.co.in';
$email_subject2 = "Resignation ".$action;
//$email_txt = "Resignation ".$action;
//$headers = "From: ".$email_from."\r\n"; 
//$semi_rand = md5(time()); 
//$headers .= "MIME-Version: 1.0\r\n";
//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$email_message2 .=$Hname." has ".$action." ".$Ename." resignation application, for more details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$email_message2 .="Thanks & Regards\n";
$email_message2 .="HR\n\n";
//$ok = @mail($email_to2, $email_subject2, $email_message2, $headers);

$subject=$email_subject2;
$body=$email_message2;
$email_to='vspl.hr@vnrseeds.com';
require 'vendor/mail_admin.php';

/************************************************ Rep-2 ***********************************************/   
if($resR2['EmailId_Vnr']!='')
{
//$email_to4 = $resR2['EmailId_Vnr'];
//$email_from = 'admin@vnrseeds.co.in';
$email_subject4 = "Resignation is ".$action." by HOD";
//$email_txt = "Resignation ".$action;
//$headers = "From: ".$email_from."\r\n"; 
//$semi_rand = md5(time()); 
//$headers .= "MIME-Version: 1.0\r\n";
//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$email_message4 .="Resignation application of ".$Ename." is ".$action." at the level of HOD.\n\n";
$email_message4 .="Thanks & Regards\n";
$email_message4 .="HR\n\n";
//$ok = @mail($email_to4, $email_subject4, $email_message4, $headers);

$subject=$email_subject4;
$body=$email_message4;
$email_to=$resR2['EmailId_Vnr'];
require 'vendor/mail_admin.php';    
    
} 

/************************************************ Rep-3 ***********************************************/   
if($resR3['EmailId_Vnr']!='')
{
//$email_to5 = $resR3['EmailId_Vnr'];
//$email_from = 'admin@vnrseeds.co.in';
$email_subject5 = "Resignation is ".$action." by HOD";
//$email_txt = "Resignation ".$action;
//$headers = "From: ".$email_from."\r\n";  
//$semi_rand = md5(time()); 
//$headers .= "MIME-Version: 1.0\r\n";
//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$email_message5 .="Resignation application of ".$Ename." is ".$action." at the level of HOD.\n\n";
$email_message5 .="Thanks & Regards\n";
$email_message5 .="HR\n\n";
//$ok = @mail($email_to5, $email_subject5, $email_message5, $headers);

$subject=$email_subject5;
$body=$email_message5;
$email_to=$resR3['EmailId_Vnr'];
require 'vendor/mail_admin.php';    
    
} 




  if($_POST['SepValue']=='Y'){echo '<script>alert("Resignation request accepted successfully"); window.close();</script>'; }
  elseif($_POST['SepValue']=='C'){echo '<script>alert("Resignation request rejected successfully"); window.close();</script>';}   
  }
  
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Action for Resignation</title>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .InputText {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;background-color:#FFFFD9;}
.InputText2 {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;background-color:#E1FFE1;border-style:groove;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<script language="javascript" type="text/javascript">
function validate(formname)
{ 

  var d1 = formname.ResDate.value; var d2 = formname.HodDate.value;
  var DMY=d1.split('-');     //splits the date string by '-' and stores in a array.
  var DMY2=d2.split('-');
  var day=DMY[0];  var month=DMY[1];  var year=DMY[2];
  var day1=DMY2[0];  var month1=DMY2[1];  var year1=DMY2[2];
  var dateTemp1=month+'/'+day+'/'+year;  
  var dateTemp2=month1+'/'+day1+'/'+year1;
  var date1 = new Date(dateTemp1);//mm/dd/yy 
  var date2 = new Date(dateTemp2); //mm/dd/yy
  var Timed1=date1.getTime(); var Timed2=date2.getTime();
  
  var timeDiff = Math.abs(date2.getTime() - date1.getTime());
  var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
  var TotDay = diffDays; // var TotDay = diffDays+1;
  document.getElementById("NoticeDay").value=TotDay;
  //if(TotDay<30){ var RecoveryDate=30-TotDay; alert("Please note, you are not serving the required notice period of 30 days. Shortfall shall be recovered in full and final settlement");  }
  if(TotDay>90){ alert("Kindly note! the notice period to be served cannot exceed more than 90 days.");  return false;  }
  
  var HodRemark = formname.HodRemark.value; var SepValue = formname.SepValue.value;  
  if(HodRemark.length === 0){ alert("Please type remark.");  return false; }
  if(SepValue=='Y'){$sep='Accept';}else if(SepValue=='C'){$sep='Reject';}
  var agree=confirm("Are you sure you want to "+$sep+" resignation?");
  if(agree){ return true; } else{ return false; } 
  
}
</script>
</head>
<body bgcolor="#E0DBE3">
<center>
<table border="0" style="width:590px;">
<tr>
   <td style="width:590px;" valign="top" align="center">
<?php if($_REQUEST['act']!='' AND $_REQUEST['act']=='acthod')  { ?>	
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['i'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
?>	
<form enctype="multipart/form-data" name="formname" method="post"  onSubmit="return validate(this)">
<input type="hidden" name="SepId" id="SepId" value="<?php echo $_REQUEST['i']; ?>" />  
<input type="hidden" name="SepValue" id="SepValue" value="<?php if($_REQUEST['v']=='A'){echo 'Y';}elseif($_REQUEST['v']=='C'){echo 'C';} ?>" />
<input type="hidden" name="SepAct" id="SepAct" value="<?php echo $_REQUEST['act']; ?>" />  
<input type="hidden" name="EmpId" id="EmpId" value="<?php echo $resSE['EmployeeID']; ?>" />  
<input type="hidden" name="RepId" id="RepId" value="<?php echo $resSE['Rep_EmployeeID']; ?>" /> 
<input type="hidden" name="HodId" id="HodId" value="<?php echo $resSE['Hod_EmployeeID']; ?>" /> 
<?php 
$sqlRTR=mysql_query("select AppraiserId from hrm_employee_reporting where EmployeeID=".$resSE['Rep_EmployeeID'], $con); $resRTR=mysql_fetch_assoc($sqlRTR);
$sqlRTR2=mysql_query("select AppraiserId from hrm_employee_reporting where EmployeeID=".$resRTR['AppraiserId'], $con); $resRTR2=mysql_fetch_assoc($sqlRTR2);
?>
<input type="hidden" name="RTRId" id="RTRId" value="<?php echo $resRTR['AppraiserId']; ?>" /> 
<input type="hidden" name="RTR2Id" id="RTR2Id" value="<?php echo $resRTR2['AppraiserId']; ?>" />   
<table border="0">
<tr>
  <td colspan="5" style="font-family:Geneva, Arial, Helvetica, sans-serif;color:#400000;font-size:16px;width:590px;" align="center">
  <b><?php if($_REQUEST['v']=='A'){echo 'RESIGNATION APPROVAL';}elseif($_REQUEST['v']=='C'){echo 'RESIGNATION REJECT';} ?></b>
  </td> 
</tr>
<tr>
 <td>
  <table style="width:580px;" border="1">
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>EmpCode</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resE['EmpCode']; ?></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:150px;">&nbsp;<b>Name</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;">&nbsp;<?php echo $NameE; ?></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>Department</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:150px;">&nbsp;<b>Approve</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;background-color:#51A8FF;color:#FFFFFF;">&nbsp;<b><?php if($_REQUEST['v']=='A'){echo 'Resignation Approval';}elseif($_REQUEST['v']=='C'){echo 'Resignation Reject';} ?></b></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;">&nbsp;<b>Resignation</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo date("d-m-Y",strtotime($resSE['Emp_ResignationDate'])); ?></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:150px;">&nbsp;<b>Emp Relieving Date</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;">&nbsp;<b><?php echo date("d-m-Y",strtotime($resSE['Emp_RelievingDate'])); ?></b>
	<input type="hidden" name="ResDate" id="ResDate" value="<?php echo date("d-m-Y",strtotime($resSE['Emp_ResignationDate'])); ?>">
	<input type="hidden" id="NoticeDay" name="NoticeDay" value="<?php echo $resSE['NoticeDay']; ?>" />
	
	
	
	
	</td>
   </tr>
   <tr>
    <td colspan="4">
    <table>
	 <tr bgcolor="#FFFFFF">
      <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:180px;">&nbsp;<b>Reporting Relieving Date</b></td>
	  <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;"><input style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;background-color:#EAF4FF;border-style:groove;" readonly value="<?php if($resSE['Rep_RelievingDate']!='' AND $resSE['Rep_RelievingDate']!='0000-00-00' AND $resSE['Rep_RelievingDate']!='1970-01-01'){echo date("d-m-Y",strtotime($resSE['Rep_RelievingDate']));}else{echo date("d-m-Y",strtotime($resSE['Emp_RelievingDate']));} ?>"></td>
     </tr>
	 <tr bgcolor="#FFFFFF">
      <td valign="top" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:180px;">&nbsp;<b>Reporting Remark</b></td>
	  <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;"><?php echo $resSE['Rep_Remark']; ?></td>
     </tr>
	 <?php if($_REQUEST['v']=='A'){ ?>
	 <tr bgcolor="#FFFFFF">
      <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:180px;">&nbsp;<b>Hod Relieving Date</b></td>
	  <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;"><input name="HodDate" id="HodDate" class="InputText2" readonly value="<?php if($resSE['ResignationStatus']>=3){echo date("d-m-Y",strtotime($resSE['Hod_RelievingDate']));}else{echo date("d-m-Y",strtotime($resSE['Rep_RelievingDate']));} ?>">&nbsp;<button id="f_btn1" class="CalenderButton"></button>
<script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn1", "HodDate", "%d-%m-%Y");</script></td>
     </tr>
	 <tr bgcolor="#FFFFFF">
      <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:180px;">&nbsp;<b>Type of Exit</b></td>
	  <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;">Voluntary by Employee<input type="radio" id="Vrdo" name="VDrdo" <?php if($resSE['TypeOfExit']=='' OR $resSE['TypeOfExit']=='V'){echo 'checked';} ?> onClick="FunRdoCheck('V')"/>
	  &nbsp;&nbsp;&nbsp;
	  Desired by Company<input type="radio" id="Drdo" name="VDrdo" <?php if($resSE['TypeOfExit']=='D'){echo 'checked';}?> onClick="FunRdoCheck('D')"/>
	  <input type="hidden" name="TypeOfExit" id="TypeOfExit" value="<?php if($resSE['TypeOfExit']==''){echo 'V';}else{echo $resSE['TypeOfExit'];} ?>" />
	  <script type="text/javascript">
	  function FunRdoCheck(v){ document.getElementById("TypeOfExit").value=v; }
	  </script>
	  </td>
     </tr>
   <?php }else{ echo '<input type="hidden" name="TypeOfExit" id="TypeOfExit" value="" />'; } ?>
	 
	 
	  <tr bgcolor="#FFFFFF">
      <td valign="top" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:200px;">&nbsp;<b>HOD Remark For <?php if($_REQUEST['v']=='A'){echo 'Approval';}elseif($_REQUEST['v']=='C'){echo 'Reject';} ?></b></td>
	  <td valign="top" colspan="3" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;"><textarea name="HodRemark" id="HodRemark" cols="43" rows="4" style="background-color:#E1FFE1;border-style:groove;"><?php echo $resSE['Hod_Remark']; ?></textarea></td>
     </tr>
	</table>
	</td>
   </tr>
	</table>
	</td>
   </tr>
   <tr bgcolor="#FFFFFF">
        <td colspan="4" align="Right" class="fontButton">
         <table><tr>
	      <td><input type="submit" id="SentRes" name="SentRes" value="submit" style="display:block;"/></td>
	      <td><input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SepResActHod.php?act=<?php echo $_REQUEST['act']; ?>&e=44e&w=254&y=10234&a=e&e=5e2&e=4e&v=<?php echo $_REQUEST['v']; ?>&i=<?php echo $_REQUEST['i']; ?>&w=234&y=1022344&retd=ee&wwrew=t%T@#+aa+sed818&d=101'"/></td>
	     </tr></table>
        </td>
      </tr> 
  </table>
 </td>
</tr>



</table>
</form>
<?php } ?>	  
     </td>
</tr>
</table>
</center>
</body>
</html>
