<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
$EmployeeId=$_REQUEST['e'];
/******************************************************************************/
if(isset($_POST['SentRes']))
{ $AfterFiveDay=date("Y-m-d",strtotime('+5 day')); $After30Day=date("Y-m-d",strtotime('+30 day'));
  $sqlE=mysql_query("select AppraiserId,HodId from hrm_employee_reporting where EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE);
  $sqlEmp=mysql_query("select Fname,Sname,Lname,DepartmentId,EmailId_Vnr,CostCenter from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$EmployeeId, $con); $resEmp=mysql_fetch_assoc($sqlEmp); $Ename=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
  if($resEmp['DepartmentId']==6)
  {
   $sEI=mysql_query("select * from hrm_employee_state where StateId=".$resEmp['CostCenter']." AND CompanyId=".$CompanyId, $con); $rEI=mysql_fetch_array($sEI);
   if($rEI['LOGISTICS_EId']!=0 OR $rEI['LOGISTICS_EId']!=''){$logEmp=$rEI['LOGISTICS_EId'];}else{$logEmp=0;}
  }
  else
  {
   $logEmp=0;
  } 
  $sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$EmployeeId, $con); 
  $rowch=mysql_num_rows($sqlch);
  $Extend=''; $P1=''; $P2='';
  if($_POST['extv']=='Y')
  { 
   $Extend='Y'; $P1=date("Y-m-d",strtotime($_POST['Period1'])); $P2=date("Y-m-d",strtotime($_POST['Period2'])); 
   if($rowch==0){ $sqlIns=mysql_query("insert into hrm_employee_separation(EmployeeID, ResigSubmit_HR, Emp_ResignationDate, Extend, Period1, Period2, Emp_Reason, Emp_SaveDate, Rep_EmployeeID, Hod_EmployeeID, Hod_SaveDate, HR_Date, HR_UserId, HR_SaveDate, YearId) values(".$EmployeeId.", 'Y', '".date("Y-m-d", strtotime($_POST['ResDate']))."', '".$Extend."', '".$P1."', '".$P2."', '".$_POST['Reason']."', '".date("Y-m-d")."', ".$resE['AppraiserId'].", ".$resE['HodId'].", '".date("Y-m-d", strtotime($_POST['ResDate']))."', '".date("Y-m-d", strtotime($_POST['ResDate']))."',  ".$UserId.", '".date("Y-m-d")."', ".$YearId.")", $con); }
  }
  else
  {
   $Extend='N'; $P1=date("Y-m-d", strtotime($_POST['ResDate'])); $P2=date("Y-m-d", strtotime($_POST['ResDate']));
   if($rowch==0){ $sqlIns=mysql_query("insert into hrm_employee_separation(EmployeeID, ResigSubmit_HR, Emp_ResignationDate, Extend, Period1, Period2, Emp_Reason, Emp_Resignation_Status, Emp_SaveDate, Rep_EmployeeID, Rep_Approved, Rep_RelievingDate, Rep_SaveDate, Log_EmployeeID, HOD_Date, Hod_EmployeeID, Hod_Approved, Hod_RelievingDate, Hod_SaveDate, HR_Date, HR_UserId, HR_Approved, HR_RelievingDate, HR_Resignation_Status, HR_SaveDate, ResignationStatus, YearId) values(".$EmployeeId.", 'Y', '".date("Y-m-d", strtotime($_POST['ResDate']))."', '".$Extend."', '".$P1."', '".$P2."', '".$_POST['Reason']."', 'Y', '".date("Y-m-d")."', ".$resE['AppraiserId'].", 'Y', '".date("Y-m-d", strtotime($_POST['ResDate']))."', '".date("Y-m-d")."', ".$logEmp.", '".$AfterFiveDay."', ".$resE['HodId'].", 'Y', '".date("Y-m-d", strtotime($_POST['ResDate']))."', '".date("Y-m-d")."', '".$After30Day."', ".$UserId.", 'Y', '".date("Y-m-d", strtotime($_POST['ResDate']))."', 2, '".date("Y-m-d")."', 4, ".$YearId.")", $con); }
  
  }
  
  
  
  if($sqlIns)
  { 
   $sqlRep=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resE['AppraiserId'], $con);  
   $sqlHod=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resE['HodId'], $con); 
   $resRep=mysql_fetch_assoc($sqlRep); $resHod=mysql_fetch_assoc($sqlHod);
   
/************************************************ Employee ***********************************************/ 
if($_POST['extv']=='Y'){ $Betwmsg='Extend'; }else{ $Betwmsg='approved'; }

if($resEmp['EmailId_Vnr']!='')
{
$email_toE = $resEmp['EmailId_Vnr'];
$email_fromE = 'admin@vnrseeds.co.in';
$email_subjectE = "Your separation due to superannuation is ".$Betwmsg." by HR.";
$headersE = "From: ".$email_fromE."\r\n"; 
$semi_randE = md5(time()); 
$headersE .= "MIME-Version: 1.0\r\n";
$headersE .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$email_messageE .="Your separation due to superannuation is ".$Betwmsg." by HR. \n\n";
$email_messageE .="Thanks & Regards\n";
$email_messageE .="HR\n\n";
$ok = @mail($email_toE, $email_subjectE, $email_messageE, $headersE);
}   
      
	  
/************************************************ HR ***********************************************/ 
$email_to3 = 'vspl.hr@vnrseeds.com';
$email_from = 'admin@vnrseeds.co.in';
$email_subject3 = "The separation due to superannuation of ".$Ename." has been ".$Betwmsg;
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$email_message3 .="The separation due to superannuation of ".$Ename." has been ".$Betwmsg.". \n\n";
$email_message3 .="Thanks & Regards\n";
$email_message3 .="HR\n\n";
$ok = @mail($email_to3, $email_subject3, $email_message3, $headers);


/************************************************ App ***********************************************/ 
if($resRep['EmailId_Vnr']!='')
{
$email_to2 = $resRep['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject2 = "The separation due to superannuation of ".$Ename." has been ".$Betwmsg;
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers2.= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if($_POST['extv']=='Y'){ $email_message2 .="The separation due to superannuation of ".$Ename." has been ".$Betwmsg.".\n\n"; }
else
{
$email_message2 .="The separation due to superannuation of ".$Ename." has been ".$Betwmsg.". Kindly fill supervisor comment in exit interview form & provide department clearance form(NOC) in ESS for further processing. For details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
}
$email_message2 .="The separation due to superannuation of ".$Ename." has been ".$Betwmsg.". Kindly fill supervisor comment in exit interview form & provide department clearance form(NOC) in ESS for further processing. For details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$email_message2 .="Thanks & Regards\n";
$email_message2 .="HR\n\n";
$ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
}    

if($_POST['extv']=='N')
{
/******** 9-IT ************/
$sqlNoc2=mysql_query("select EmployeeID from hrm_employee_separation_nocdept_emp where DepartmentId=9 AND Status='A'", $con); $rowNoc2=mysql_num_rows($sqlNoc2); 
if($rowNoc2>0)
{ $resNoc2=mysql_fetch_assoc($sqlNoc2);
  $sqlE2=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resNoc2['EmployeeID'], $con); $resE2=mysql_fetch_assoc($sqlE2); 
  if($resE2['EmailId_Vnr']!='')
  {
  $email_to4 = $resE2['EmailId_Vnr'];
  $email_from = 'admin@vnrseeds.co.in';
  $email_subject4 = "The separation due to superannuation of ".$Ename." has been approved";
 $headers = "From: ".$email_from."\r\n"; 
  $semi_rand = md5(time()); 
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
if($_POST['extv']=='Y'){ $email_message2 .="The separation due to superannuation of ".$Ename." has been ".$Betwmsg.".\n\n"; }
else
{
  $email_message4 .="The separation due to superannuation of ".$Ename." has been ".$Betwmsg.". Kindly provide IT clearance (NOC) in ESS for further processing. For details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
}  
  $email_message4 .="Thanks & Regards\n";
  $email_message4 .="HR\n\n";
  $ok = @mail($email_to4, $email_subject4, $email_message4, $headers);
  }     
}

}	

if($_POST['extv']=='N')
{
/*************************************************Account 2 ********************************************/
$sqlNoc5=mysql_query("select EmployeeID2 from hrm_employee_separation_nocdept_emp where DepartmentId=8 AND Status='A'", $con); $rowNoc5=mysql_num_rows($sqlNoc5); 
if($rowNoc5>0)
{ $resNoc5=mysql_fetch_assoc($sqlNoc5);
  $sqlE5=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resNoc5['EmployeeID2'], $con); $resE5=mysql_fetch_assoc($sqlE5); 
  if($resE5['EmailId_Vnr']!='')
  {
  $email_to5 = $resE5['EmailId_Vnr'];
  $email_from = 'admin@vnrseeds.co.in';
  $email_subject5 = "The separation due to superannuation of ".$Ename." has been ".$Betwmsg."";
  $headers = "From: ".$email_from."\r\n"; 
  $semi_rand = md5(time()); 
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $email_message5 .="The separation due to superannuation of ".$Ename." has been ".$Betwmsg.". \n\n";
  $email_message5 .="Thanks & Regards\n";
  $email_message5 .="HR\n\n";
$ok = @mail($email_to5, $email_subject5, $email_message5, $headers);
  }     
}

}	

  $msg="Retirement form save successfully.";
 }
 
}   

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> .font { color:#ffffff; font-family:Georgia; font-size:12px;} .font5 { color:#000066; font-family:Georgia; font-size:16px;}
.font2 { color:#thrthr; font-family:Georgia; font-size:13px;}.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.input { background-color:#F9F2FF; width:90px;text-align:center;height:20px;vertical-align:middle;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.All{font-size:11px; height:20px;} .All_30{font-size:14px;height:20px;width:30px;font-family:Times New Roman;}.All_40{font-size:14px;height:20px;width:40px;font-family:Times New Roman;} .All_60{font-size:14px;height:20px;width:50px;font-family:Times New Roman;} .All_50{font-size:14px;height:20px;width:70px;font-family:Times New Roman;} .All_500{font-size:15px;height:20px;width:500px;font-family:Times New Roman;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function Resedit()
{ document.getElementById("editRes").style.display='none'; document.getElementById("SentRes").style.display='block';
  document.getElementById("ext1").disabled=false; document.getElementById("ext2").disabled=false;  
  //document.getElementById("Reason").disabled=false; document.getElementById("Reason").style.background='#FFFFFF';
}

function FunExt(v)
{ document.getElementById("extv").value=v; 
  if(v=='Y')
  { document.getElementById("Reason").disabled=false; document.getElementById("Reason").style.background='#FFFFFF';
    document.getElementById("Period1").disabled=false; document.getElementById("Period1").style.background='#FFFFFF';
	document.getElementById("Period2").disabled=false; document.getElementById("Period2").style.background='#FFFFFF';
  }
  else
  {
   document.getElementById("Reason").disabled=true; document.getElementById("Reason").value='';
   document.getElementById("Reason").style.background='#E0DBE3';
   document.getElementById("Period1").disabled=true; document.getElementById("Period1").style.background='#E0DBE3';
   document.getElementById("Period2").disabled=true; document.getElementById("Period2").style.background='#E0DBE3';
  }
}

function validate(formname)
{ 
  var extv=document.getElementById("extv").value;
  if(extv=='Y' && document.getElementById("Reason").value.length === 0){ alert("Please type reason.");  return false; }
  var agree=confirm("Are you sure you want to submit retirement form?");
  if(agree){ return true; }else{ return false; }
}


function validate2(form2name)
{ 
  var FRI = form2name.FRI.value; var HP = form2name.HP.value; var OB = form2name.OB.value; var PGR = form2name.PGR.value; 
  var LOC = form2name.LOC.value; var LPO = form2name.LPO.value; var JANM = form2name.JANM.value; 
  var BJBP = form2name.BJBP.value; var HS = form2name.HS.value; var LOCOP = form2name.LOCOP.value;
  var IAU = form2name.IAU.value; var LOCOM = form2name.LOCOM.value; var DIDM = form2name.DIDM.value; 
  var UTP = form2name.UTP.value; var US = form2name.US.value;
  var HJ = form2name.HJ.value; var WH = form2name.WH.value; var JITM = form2name.JITM.value; var NFOC = form2name.NFOC.value;  var IPI = form2name.IPI.value; 
  var IIAB = form2name.IIAB.value; var AR = form2name.AR.value; var NCIR = form2name.NCIR.value; 
  if(FRI==0){ alert("Please assign number for reason Rank I(a)."); return false;} if(HP==0){ alert("Please assign number for reason Rank I(b)."); return false; } if(OB==0){ alert("Please assign number for reason Rank I(c)."); return false; } if(PGR==0){ alert("Please assign number for reason Rank II(a)."); return false;} if(LOC==0){ alert("Please assign number for reason Rank II(b)."); return false;} if(LPO==0){ alert("Please assign number for reason Rank II(c)."); return false;} if(JANM==0){ alert("Please assign number for reason Rank II(d)."); return false;} if(BJBP==0){ alert("Please assign number for reason Rank II(e)."); return false;} if(HS==0){ alert("Please assign number for reason Rank II(f)."); return false;} if(LOCOP==0){ alert("Please assign number for reason Rank III(a)."); return false;} if(IAU==0){ alert("Please assign number for reason Rank III(b)."); return false;} if(LOCOM==0){ alert("Please assign number for reason Rank III(c)."); return false;} if(DIDM==0){ alert("Please assign number for reason Rank III(d)."); return false;} if(UTP==0){ alert("Please assign number for reason Rank III(e)."); return false;} if(US==0){ alert("Please assign number for reason Rank IV(a)."); return false;} if(HJ==0){ alert("Please assign number for reason Rank IV(b)."); return false;} if(WH==0){ alert("Please assign number for reason Rank IV(c)."); return false;} if(JITM==0){ alert("Please assign number for reason Rank IV(d)."); return false;} if(NFOC==0){ alert("Please assign number for reason Rank IV(e)."); return false;} if(IPI==0){ alert("Please assign number for reason Rank V(a)."); return false;} if(IIAB==0){ alert("Please assign number for reason Rank V(b)."); return false;} if(AR==0){ alert("Please assign number for reason Rank VI(a)."); return false;} if(NCIR==0){ alert("Please assign number for reason Rank VI(b)."); return false;}

  var Q1_1 = form2name.Q1_1.value;  var Q1_2 = form2name.Q1_2.value; var Q2_1 = form2name.Q2_1.value;  var Q2_2 = form2name.Q2_2.value;
  var Q3_1 = form2name.Q3_1.value;  var Q3_2 = form2name.Q3_2.value; var Q4_1 = form2name.Q4_1.value;  var Q4_2 = form2name.Q4_2.value;
  var Q5_1 = form2name.Q5_1.value;  var Q5_2 = form2name.Q5_2.value; var Q6 = form2name.Q6_Ans.value; var Q7 = form2name.Q7_Ans.value;
  if(Q1_1.length === 0 && Q1_2.length === 0){ alert("Please type answer in Q1.");  return false; }
  if(Q2_1.length === 0 && Q2_2.length === 0){ alert("Please type answer in Q2.");  return false; }
  if(Q3_1.length === 0 && Q3_2.length === 0){ alert("Please type answer in Q3.");  return false; }
  if(Q4_1.length === 0 && Q4_2.length === 0){ alert("Please type answer in Q4.");  return false; }
  if(Q5_1.length === 0 && Q5_2.length === 0){ alert("Please type answer in Q5.");  return false; }
  if(Q6==''){ alert("Please select option in Q6.");  return false; }
  if(Q7==''){ alert("Please select option in Q7.");  return false; }
  
  var ComName = form2name.ComName.value; var Location = form2name.Location.value; var Designation = form2name.Designation.value; 
  var hike = form2name.hike.value; var OthBefit = form2name.OthBefit.value; 
  
  if(ComName.length === 0){ alert("Please type company name.");  return false; }
  if(Location.length === 0){ alert("Please type location name.");  return false; }  
  if(Designation.length === 0){ alert("Please type designation name.");  return false; }
  if(hike.length === 0){ alert("Please type hike in compensation .");  return false; }  
  //if(OthBefit.length === 0){ alert("Please type other benifit.");  return false; }  

  var agree=confirm("Are you sure you ?");
  if(agree){ return true; }else{ return false; }
  
}

//function HelpDocSep(value){ window.open("HelpFile.php?a=SepOpen&v="+value,"HelpFile","width=800,height=650"); }


function Vvalidate3(form3name)
{ var Emp_CanReason = form3name.Emp_CanReason.value; 
  if(Emp_CanReason.length === 0){ alert("Please type reason for cancel resignation.");  return false; }
  var agree=confirm("Are you sure you want to submit cancel resignation application?");
  if(agree){ return true; }else{ return false; }
}

function OpenFFSetmnt(SId)
{ 
  window.open("SepFFSetmntformPrint.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+SId,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=100,height=100");
}

<!--
function doBlink() {
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink() {
	if (document.all)
		setInterval("doBlink()",1000)
}
window.onload = startBlink;
// -->
</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
 <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table> 
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	 
<?php $sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$EmployeeId, $con); $rowch=mysql_num_rows($sqlch); $resch=mysql_fetch_assoc($sqlch);
      //$sqlch2=mysql_query("select Resig_Permission from hrm_employee where EmployeeID=".$EmployeeId, $con); $resch2=mysql_fetch_assoc($sqlch2);
?>   
<table border="0" id="Activity"> 
 <tr>
  <td id="Anni" valign="top">
	<table border="0">
	  <tr height="20"><td align="left" valign="top" width="120"><?php echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td></td></tr>
	</table>
  </td>
  <td width="1000" valign="top">
<form enctype="multipart/form-data" name="formname" method="post" onSubmit="return validate(this)">
<table border="0" cellspacing="5">
 <tr>
  <td colspan="2" class="heading">&nbsp;Retirement Form&nbsp;(Retired Employee)&nbsp;
   <input type="button" value="Resignation form" style="background-color:<?php if($_REQUEST['a']=='f'){echo '#FFFFFF';}else{echo '#2D96FF';}?>;color:<?php if($_REQUEST['a']=='f'){echo '#C7C7C7';}else{echo '#FFFFFF';}?>;font-weight:bold;font-family:Geneva, Arial, Helvetica, sans-serif;" <?php if($_REQUEST['a']=='f'){echo 'disabled';} ?> onClick="javascript:window.location='FillEmpResignation.php?ee=4e&w=234&y=10234&a=f&ee=4e2&e=4e&w=234&y=110022344&retd=ee&wwrew=t%T@sed818&d=101&e=<?php echo $_REQUEST['e']; ?>&DI=<?php echo $_REQUEST['DI']; ?>'"/>
   
   &nbsp;&nbsp;
   <?php if($resch['HR_FullFinal_Submit']=='Y' AND $resch['Allow_FF_Settle']=='Y'){ ?>
   <a href="javascript:OpenFFSetmnt(<?php echo $resch['EmpSepId'];?>)"><font color="#008000" size="3"><b>Print F&F Settlement</b></font></a>
   <?php } ?>
   </blink></font>  
   
  </td>
 </tr>
 
 <tr>
<td style="display:<?php if($_REQUEST['a']=='f'){echo 'block';}elseif($_REQUEST['a']=='e' OR $_REQUEST['a']=='c'){echo 'none';}?>;">
 <table border="0">
 <tr><td colspan="7" valign="top" style='font-family:Times New Roman; font-size:17px; color:#008800' align="right">
	 <font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td>
 </tr>
 <tr>
  <td align="left" class="font2" style="width:150px;">&nbsp;&nbsp;Retirement Date</td><td style="width:10px;"><b>&nbsp;:&nbsp;</b></td>
  <td colspan="5"><input class="input" name="ResDate" id="ResDate" value="<?php if($rowch>0){echo date("d-m-Y", strtotime($resch['Emp_ResignationDate']));}else{echo date("d-m-Y"); } ?>" style="width:100px;height:22px;" readonly></td>
 </tr>
 <tr>
  <td align="left" class="font2" style="width:120px;">&nbsp;&nbsp;Do you want to Extend?</td>
  <td style="width:10px;"><b>&nbsp;:&nbsp;</b></td>
  <td colspan="5" class="font2">&nbsp;Yes<input type="radio" name="extend" id="ext1" onClick="FunExt('Y')" <?php if($resch['Extend']=='Y'){ echo 'checked';}?> disabled/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No<input type="radio" name="extend" id="ext2" onClick="FunExt('N')" <?php if($resch['Extend']=='N'){ echo 'checked';}?> disabled/><input type="hidden" id="extv" name="extv" value="<?php echo $resch['Extend']; ?>"</td>  
 </tr>
  
 <tr>
  <td align="left" class="font2" style="width:120px;" valign="top">&nbsp;&nbsp;Reason</td><td style="width:10px;" valign="top"><b>&nbsp;:&nbsp;</b></td>
  <td colspan="5" valign="top"><textarea name="Reason" id="Reason" style="width:400px;border-bottom-color:#000000;background-color:#E0DBE3;" cols="47" rows="6" disabled><?php if($rowch>0){echo $resch['Emp_Reason'];}else{echo ''; } ?></textarea></td>
 </tr>

 <tr>
  <td align="left" class="font2" style="width:150px;">&nbsp;&nbsp;Period</td><td style="width:10px;"><b>&nbsp;:&nbsp;</b></td>
  <td colspan="5" class="font2">From&nbsp;<input class="input" name="Period1" id="Period1" value="<?php if($rowch>0){echo date("d-m-Y", strtotime($resch['Period1']));}else{echo date("d-m-Y"); } ?>" style="width:100px;height:22px;background-color:#E0DBE3;" disabled readonly>
      &nbsp;&nbsp;&nbsp;&nbsp;<?php $ExpYDate=date('d-m-Y', strtotime("+2 years", strtotime(date("Y-m-d"))));  ?>
	  To&nbsp;<input class="input" name="Period2" id="Period2" value="<?php if($rowch>0){echo date("d-m-Y", strtotime($resch['Period2']));}else{echo $ExpYDate; } ?>" style="width:100px;height:22px;background-color:#E0DBE3;" readonly disabled>
	  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
      cal.manageFields("ResDate", "ResDate", "%d-%m-%Y"); cal.manageFields("Period1", "Period1", "%d-%m-%Y"); cal.manageFields("Period2", "Period2", "%d-%m-%Y");</script>
	  
	  
	  </td>
 </tr>
 
 
  <td colspan="7" align="Right" class="fontButton">
   <table>
	<tr> 
	 <td>
	 <input type="button" id="editRes" name="editRes" value="edit" style="display:block;" onClick="Resedit()" <?php if($rowch>0){echo 'disabled';} ?>/>
	 <input type="submit" id="SentRes" name="SentRes" value="send" style="display:none;"/>
	 </td>
	 <td>
	 <input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='FillRetiEmpResignation.php?ee=4e&w=234&y=10234&a=f&ee=4e2&e=4e&w=234&y=110022344&retd=ee&wwrew=t%T@sed818&d=101&e=<?php echo $_REQUEST['e']; ?>&DI=<?php echo $_REQUEST['DI']; ?>'" <?php if($rowch>0){echo 'disabled';} ?>/>
     </td>
	</tr>
   </table>
  </td>
 </tr>
   </table>
  </td>
</form>
<form name="form3name" method="post" onSubmit="return Vvalidate3(this)">
<td style="display:<?php if($_REQUEST['a']=='c'){echo 'block';}elseif($_REQUEST['a']=='e' OR $_REQUEST['a']=='f'){echo 'none';}?>;">
 <table border="0">
 <tr><td colspan="7" valign="top" style='font-family:Times New Roman; font-size:17px; color:#008800' align="right">
	 <font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td>
 </tr>
  <tr>
  <td align="left" class="font2" style="width:120px;">&nbsp;&nbsp; Date</td><td style="width:10px;"><b>&nbsp;:&nbsp;</b></td>
  <td><input class="input" name="Emp_CanDate" id="Emp_CanDate" value="<?php if($resch['Emp_CancelResig']==1 OR $resch['Emp_CancelResig']==2){echo date("d-m-Y", strtotime($resch['Emp_CanDate']));}else{echo date("d-m-Y"); } ?>" readonly>&nbsp;<button id="f_btnCan" class="CalenderButton" disabled></button>
      <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
      cal.manageFields("f_btnCan", "CanDate", "%d-%m-%Y");</script></td>
  <td align="left" class="font2" style="width:120px;" colspan="3"><input type="hidden" name="EmpSepId" value=<?php echo $resch['EmpSepId']; ?> /></td>
	
 </tr>
 <tr>
  <td align="left" class="font2" style="width:120px;" valign="top">&nbsp;&nbsp;Cancel Reason</td><td style="width:10px;" valign="top"><b>&nbsp;:&nbsp;</b></td>
  <td colspan="5" valign="top"><textarea name="Emp_CanReason" id="Emp_CanReason" style="width:400px;border-bottom-color:#000000;" cols="47" rows="6" <?php if($resch['Emp_CancelResig']==2){ echo 'disabled'; }?>><?php if($rowch>0){echo $resch['Emp_CanReason'];}else{echo ''; } ?></textarea></td>
 </tr>
  <td colspan="7" align="Right" class="fontButton">
   <table>
 <tr>
  <td colspan="7" align="Right" class="fontButton">
   <?php if($resch['HR_Approved']=='Y' AND $resch['Emp_CancelResig']==1){ ?><input type="submit" id="SubmitCan" name="SubmitCan" value="submit"/><?php } ?>
   <?php if($resch['HR_Approved']=='Y' AND $resch['Emp_CancelResig']==0){ ?><input type="submit" id="SaveCan" name="SaveCan" value="save"/><?php } ?>
  </td>
 </tr>
   </table>
  </td>
 </tr>
   </table>
  </td>
</form>
<?php //*************************************************************************************************************************************************** ?>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

