<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');} 

$sqlEm=mysql_query("select Fname,Sname,Lname,EmpPer_Status,EmpCon_Status,EmpFam_Status from hrm_employee where EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlEm);
$EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];

$sqlps2=mysql_query("select * from hrm_employee_procertify_setting where CompanyId=".$CompanyId, $con); $resps2=mysql_fetch_array($sqlps2);
if($resps2['Open']=='Y'){ $sqlpse=mysql_query("select * from hrm_employee_procertify_noc where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); $rowpse=mysql_num_rows($sqlpse); $respse=mysql_fetch_array($sqlpse); }

if($_REQUEST['GR_Reason'] AND $_REQUEST['GR_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpGen_Status='N', EmpGen_Reason='".$_REQUEST['GR_Reason']."', EmpGen_Noc='Y' where EmployeeID=".$EmployeeId, $con); }

//if($_REQUEST['ER_Reason'] AND $_REQUEST['ER_Reason']!='')
//{ $sqlIns=mysql_query("update hrm_employee set EmpEdu_Status='N', EmpEdu_Reason='".$_REQUEST['ER_Reason']."', EmpEdu_Noc='Y' where EmployeeID=".$EmployeeId, $con); }

if($_REQUEST['ExR_Reason'] AND $_REQUEST['ExR_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpExp_Status='N', EmpExp_Reason='".$_REQUEST['ExR_Reason']."', EmpExp_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['LR_Reason'] AND $_REQUEST['LR_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpLang_Status='N', EmpLang_Reason='".$_REQUEST['LR_Reason']."', EmpLang_Noc='Y' where EmployeeID=".$EmployeeId, $con); }

if($_REQUEST['PR_Reason'] AND $_REQUEST['PR_Reason']!='')  /******************************* Personal Personal */
{ 
  $search =  '!"#$%/\'-:_' ; $search = str_split($search);
  $PRRes=str_replace($search, "", $_REQUEST['PR_Reason']);
  if($resE['EmpPer_Status']!='YY'){ $sqlIns=mysql_query("update hrm_employee set EmpPer_Status='N', EmpPer_Reason='".$PRRes."', EmpPer_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
  
  if($rowpse>0){ $sqlI=mysql_query("update hrm_employee_procertify_noc set EmpPer_Status='N', EmpPer_Reason='".$PRRes."', EmpPer_Noc='Y' where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); }
  elseif($rowpse==0)
  {
   $sqlI=mysql_query("insert into hrm_employee_procertify_noc(EmployeeID, Month, Year, EmpPer_Status, EmpPer_Reason, EmpPer_Noc) values(".$EmployeeId.", ".$resps2['Month'].", ".$resps2['Year'].", 'N', '".$PRRes."', 'Y')", $con); 
  $sqlpschk=mysql_query("select * from hrm_employee_procertify_noc INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_procertify_noc.EmployeeID where Month=".$resps2['Month']." AND Year=".$resps2['Year']." AND CompanyId=".$CompanyId, $con); $rowpschk=mysql_num_rows($sqlpschk);
  if($rowpschk==1){mysql_query("insert into hrm_employee_procertify_ym(CompanyId, Year, Month) values(".$CompanyId.", ".$resps2['Year'].", ".$resps2['Month'].")", $con);}
  } 
  
   //$email_to = 'vspl.hr@vnrseeds.com';
   //$email_from='admin@vnrseeds.co.in';
   $email_subject = $EmpName." have dis-agree in personal profile.";
   //$email_txt = $EmpName." have dis-agree in personal profile."; 
   //$headers = "From: $email_from ". "\r\n";
   $email_message .= $EmpName." have dis-agree in personal profile, please check reason in ESS.\n\n";
   //$ok = @mail($email_to, $email_subject, $email_message, $headers);
   
$subject=$email_subject;
$body=$email_message;
$email_to='vspl.hr@vnrseeds.com';
require 'vendor/mail_admin.php';   
  
}
if($_REQUEST['CR_Reason'] AND $_REQUEST['CR_Reason']!='')  /******************************* Contact Contact */
{ 
  $search =  '!"#$%/\'-:_' ; $search = str_split($search);
  $CRRes=str_replace($search, "", $_REQUEST['CR_Reason']);
  if($resE['EmpCon_Status']!='YY'){$sqlIns=mysql_query("update hrm_employee set EmpCon_Status='N', EmpCon_Reason='".$CRRes."', EmpCon_Noc='Y' where EmployeeID=".$EmployeeId, $con); }

  if($rowpse>0){ $sqlI=mysql_query("update hrm_employee_procertify_noc set EmpCon_Status='N', EmpCon_Reason='".$CRRes."', EmpCon_Noc='Y' where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); }
  elseif($rowpse==0)
  {
   $sqlI=mysql_query("insert into hrm_employee_procertify_noc(EmployeeID, Month, Year, EmpCon_Status, EmpCon_Reason, EmpCon_Noc) values(".$EmployeeId.", ".$resps2['Month'].", ".$resps2['Year'].", 'N', '".$CRRes."', 'Y')", $con); 
   $sqlpschk=mysql_query("select * from hrm_employee_procertify_noc INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_procertify_noc.EmployeeID where Month=".$resps2['Month']." AND Year=".$resps2['Year']." AND CompanyId=".$CompanyId, $con); $rowpschk=mysql_num_rows($sqlpschk);
  if($rowpschk==1){mysql_query("insert into hrm_employee_procertify_ym(CompanyId, Year, Month) values(".$CompanyId.", ".$resps2['Year'].", ".$resps2['Month'].")", $con);}
  }
  
   //$email_to = 'vspl.hr@vnrseeds.com';
   //$email_from='admin@vnrseeds.co.in';
   $email_subject = $EmpName." have dis-agree in contact profile.";
   //$email_txt = $EmpName." have dis-agree in contact profile."; 
   //$headers = "From: $email_from ". "\r\n";
   $email_message .= $EmpName." have dis-agree in contact profile, please check reason in ESS.\n\n";
   //$ok = @mail($email_to, $email_subject, $email_message, $headers);

$subject=$email_subject;
$body=$email_message;
$email_to='vspl.hr@vnrseeds.com';
require 'vendor/mail_admin.php';    
  
}
if($_REQUEST['FR_Reason'] AND $_REQUEST['FR_Reason']!='')  /******************************* Family Family */
{ 
 $search =  '!"#$%/\'-:_' ; $search = str_split($search);
 $FRRes=str_replace($search, "", $_REQUEST['FR_Reason']);
 if($resE['EmpFam_Status']!='YY'){$sqlIns=mysql_query("update hrm_employee set EmpFam_Status='N', EmpFam_Reason='".$FRRes."', EmpFam_Noc='Y' where EmployeeID=".$EmployeeId, $con); }

  if($rowpse>0){ $sqlI=mysql_query("update hrm_employee_procertify_noc set EmpFam_Status='N', EmpFam_Reason='".$FRRes."', EmpFam_Noc='Y' where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); }
  elseif($rowpse==0)
  { 
   $sqlI=mysql_query("insert into hrm_employee_procertify_noc(EmployeeID, Month, Year, EmpFam_Status, EmpFam_Reason, EmpFam_Noc) values(".$EmployeeId.", ".$resps2['Month'].", ".$resps2['Year'].", 'N', '".$FRRes."', 'Y')", $con); 
   $sqlpschk=mysql_query("select * from hrm_employee_procertify_noc INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_procertify_noc.EmployeeID where Month=".$resps2['Month']." AND Year=".$resps2['Year']." AND CompanyId=".$CompanyId, $con); $rowpschk=mysql_num_rows($sqlpschk);
  if($rowpschk==1){mysql_query("insert into hrm_employee_procertify_ym(CompanyId, Year, Month) values(".$CompanyId.", ".$resps2['Year'].", ".$resps2['Month'].")", $con);}
  }
  
   //$email_to = 'vspl.hr@vnrseeds.com';
   //$email_from='admin@vnrseeds.co.in';
   $email_subject = $EmpName." have dis-agree in family profile.";
   //$email_txt = $EmpName." have dis-agree in family profile."; 
   //$headers = "From: $email_from ". "\r\n";
   $email_message .= $EmpName." have dis-agree in family profile, please check reason in ESS.\n\n";
   //$ok = @mail($email_to, $email_subject, $email_message, $headers);
   
$subject=$email_subject;
$body=$email_message;
$email_to='vspl.hr@vnrseeds.com';
require 'vendor/mail_admin.php';   
  
}


if($_REQUEST['ER_Reason'] AND $_REQUEST['ER_Reason']!='')  /******************* Education Education */
{ 
 $search =  '!"#$%/\'-:_' ; $search = str_split($search);
 $ERRes=str_replace($search, "", $_REQUEST['ER_Reason']);
 if($resE['EmpEdu_Status']!='YY'){$sqlIns=mysql_query("update hrm_employee set EmpEdu_Status='N', EmpEdu_Reason='".$ERRes."', EmpEdu_Noc='Y' where EmployeeID=".$EmployeeId, $con); }

  if($rowpse>0){ $sqlI=mysql_query("update hrm_employee_procertify_noc set EmpEdu_Status='N', EmpEdu_Reason='".$ERRes."', EmpEdu_Noc='Y' where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); }
  elseif($rowpse==0)
  { 
   $sqlI=mysql_query("insert into hrm_employee_procertify_noc(EmployeeID, Month, Year, EmpEdu_Status, EmpEdu_Reason, EmpEdu_Noc) values(".$EmployeeId.", ".$resps2['Month'].", ".$resps2['Year'].", 'N', '".$ERRes."', 'Y')", $con); 
   $sqlpschk=mysql_query("select * from hrm_employee_procertify_noc INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_procertify_noc.EmployeeID where Month=".$resps2['Month']." AND Year=".$resps2['Year']." AND CompanyId=".$CompanyId, $con); $rowpschk=mysql_num_rows($sqlpschk);
  if($rowpschk==1){mysql_query("insert into hrm_employee_procertify_ym(CompanyId, Year, Month) values(".$CompanyId.", ".$resps2['Year'].", ".$resps2['Month'].")", $con);}
  }
  
   //$email_to = 'vspl.hr@vnrseeds.com';
   //$email_from='admin@vnrseeds.co.in';
   $email_subject = $EmpName." have dis-agree in education profile.";
   //$email_txt = $EmpName." have dis-agree in education profile."; 
   //$headers = "From: $email_from ". "\r\n";
   $email_message .= $EmpName." have dis-agree in education profile, please check reason in ESS.\n\n";
   //$ok = @mail($email_to, $email_subject, $email_message, $headers);
   
$subject=$email_subject;
$body=$email_message;
$email_to='vspl.hr@vnrseeds.com';
require 'vendor/mail_admin.php';   
  
}


if($_REQUEST['GR_Agree'] AND $_REQUEST['GR_Agree']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpGen_Status='YY', EmpGen_Noc='Y' where EmployeeID=".$EmployeeId, $con); }

//if($_REQUEST['ER_Agree'] AND $_REQUEST['ER_Agree']!='')
//{ $sqlIns=mysql_query("update hrm_employee set EmpEdu_Status='YY', EmpEdu_Noc='Y' where EmployeeID=".$EmployeeId, $con); }

if($_REQUEST['ExR_Agree'] AND $_REQUEST['ExR_Agree']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpExp_Status='YY', EmpExp_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['LR_Agree'] AND $_REQUEST['LR_Agree']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpLang_Status='YY', EmpLang_Noc='Y' where EmployeeID=".$EmployeeId, $con); }


if($_REQUEST['PR_Agree'] AND $_REQUEST['PR_Agree']!='')   /**************************** Personal Personal */
{ $sqlIns=mysql_query("update hrm_employee set EmpPer_Status='YY', EmpPer_Noc='Y' where EmployeeID=".$EmployeeId, $con); 
  
  if($rowpse>0){ $sqlI=mysql_query("update hrm_employee_procertify_noc set EmpPer_Status='YY', EmpPer_Noc='Y' where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); }
  elseif($rowpse==0)
  {
   $sqlI=mysql_query("insert into hrm_employee_procertify_noc(EmployeeID, Month, Year, EmpPer_Status, EmpPer_Noc) values(".$EmployeeId.", ".$resps2['Month'].", ".$resps2['Year'].", 'YY', 'Y')", $con); 
  $sqlpschk=mysql_query("select * from hrm_employee_procertify_noc INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_procertify_noc.EmployeeID where Month=".$resps2['Month']." AND Year=".$resps2['Year']." AND CompanyId=".$CompanyId, $con); $rowpschk=mysql_num_rows($sqlpschk);
  if($rowpschk==1){mysql_query("insert into hrm_employee_procertify_ym(CompanyId, Year, Month) values(".$CompanyId.", ".$resps2['Year'].", ".$resps2['Month'].")", $con);}
  }  
}
if($_REQUEST['CR_Agree'] AND $_REQUEST['CR_Agree']!='')  /**************************** Contact Contact */
{ $sqlIns=mysql_query("update hrm_employee set EmpCon_Status='YY', EmpCon_Noc='Y' where EmployeeID=".$EmployeeId, $con); 

  if($rowpse>0){ $sqlI=mysql_query("update hrm_employee_procertify_noc set EmpCon_Status='YY', EmpCon_Noc='Y' where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); }
  elseif($rowpse==0)
  {
   $sqlI=mysql_query("insert into hrm_employee_procertify_noc(EmployeeID, Month, Year, EmpCon_Status, EmpCon_Noc) values(".$EmployeeId.", ".$resps2['Month'].", ".$resps2['Year'].", 'YY', 'Y')", $con); 
   $sqlpschk=mysql_query("select * from hrm_employee_procertify_noc INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_procertify_noc.EmployeeID where Month=".$resps2['Month']." AND Year=".$resps2['Year']." AND CompanyId=".$CompanyId, $con); $rowpschk=mysql_num_rows($sqlpschk);
  if($rowpschk==1){mysql_query("insert into hrm_employee_procertify_ym(CompanyId, Year, Month) values(".$CompanyId.", ".$resps2['Year'].", ".$resps2['Month'].")", $con);}
  }

}
if($_REQUEST['FR_Agree'] AND $_REQUEST['FR_Agree']!='')  /*************************** Family Family */
{ $sqlIns=mysql_query("update hrm_employee set EmpFam_Status='YY', EmpFam_Noc='Y' where EmployeeID=".$EmployeeId, $con); 
 
  if($rowpse>0){ $sqlI=mysql_query("update hrm_employee_procertify_noc set EmpFam_Status='YY', EmpFam_Noc='Y' where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); }
  elseif($rowpse==0)
  { 
   $sqlI=mysql_query("insert into hrm_employee_procertify_noc(EmployeeID, Month, Year, EmpFam_Status, EmpFam_Noc) values(".$EmployeeId.", ".$resps2['Month'].", ".$resps2['Year'].", 'YY', 'Y')", $con); 
   $sqlpschk=mysql_query("select * from hrm_employee_procertify_noc INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_procertify_noc.EmployeeID where Month=".$resps2['Month']." AND Year=".$resps2['Year']." AND CompanyId=".$CompanyId, $con); $rowpschk=mysql_num_rows($sqlpschk);
  if($rowpschk==1){mysql_query("insert into hrm_employee_procertify_ym(CompanyId, Year, Month) values(".$CompanyId.", ".$resps2['Year'].", ".$resps2['Month'].")", $con);}
  }

}


if($_REQUEST['ER_Agree'] AND $_REQUEST['ER_Agree']!='')  /************ Education Education */
{ $sqlIns=mysql_query("update hrm_employee set EmpEdu_Status='YY', EmpEdu_Noc='Y' where EmployeeID=".$EmployeeId, $con); 
 
  if($rowpse>0){ $sqlI=mysql_query("update hrm_employee_procertify_noc set EmpEdu_Status='YY', EmpEdu_Noc='Y' where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); }
  elseif($rowpse==0)
  { 
   $sqlI=mysql_query("insert into hrm_employee_procertify_noc(EmployeeID, Month, Year, EmpEdu_Status, EmpEdu_Noc) values(".$EmployeeId.", ".$resps2['Month'].", ".$resps2['Year'].", 'YY', 'Y')", $con); 
   $sqlpschk=mysql_query("select * from hrm_employee_procertify_noc INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_procertify_noc.EmployeeID where Month=".$resps2['Month']." AND Year=".$resps2['Year']." AND CompanyId=".$CompanyId, $con); $rowpschk=mysql_num_rows($sqlpschk);
  if($rowpschk==1){mysql_query("insert into hrm_employee_procertify_ym(CompanyId, Year, Month) values(".$CompanyId.", ".$resps2['Year'].", ".$resps2['Month'].")", $con);}
  }

}


if($_REQUEST['Extra_Reason'] AND $_REQUEST['Extra_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set ExtraChangeStatus='Y', ExtraChange='".$_REQUEST['Extra_Reason']."' where EmployeeID=".$EmployeeId, $con); 
  if($sqlIns){echo '<script>alert("Successfully sent....")</script>';}
}

if($_REQUEST['action']=='Certify')
{ $sqlUp=mysql_query("update hrm_employee set ProfileCertify='Y' where EmployeeID=".$EmployeeId, $con); 
  $sqlUp=mysql_query("update hrm_employee_procertify_noc set ProfileCertify='Y' where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); 
  if($sqlUp)
  { 
    //$email_to = 'vspl.hr@vnrseeds.com';
    //$email_from='admin@vnrseeds.co.in';
    $email_subject = $EmpName." have successfully certifed in profile.";
   //$email_txt = $EmpName." have successfully certifed in profile."; 
    //$headers = "From: $email_from ". "\r\n";
    $email_message .= $EmpName." have successfully certifed in profile.\n\n";
    //$ok = @mail($email_to, $email_subject, $email_message, $headers);
    
$subject=$email_subject;
$body=$email_message;
$email_to='vspl.hr@vnrseeds.com';
require 'vendor/mail_admin.php';    
	
    echo '<script>alert("Done....!")</script>';
  }
}

if($_POST['ContSubmit'])
{
 if($_POST['PRel1']=='OTHER'){$Rel_1=$_POST['POth1'];}else{$Rel_1=$_POST['PRel1'];}
 if($_POST['PRel2']=='OTHER'){$Rel_2=$_POST['POth2'];}else{$Rel_2=$_POST['PRel2'];}
$sqlUp=mysql_query("update hrm_employee_contact set Emg_Contact1='".$_POST['Cont1']."', Emg_Person1='".$_POST['PName1']."', Emp_Relation1='".$Rel_1."', Emg_Location1='".$_POST['PLoc1']."', Emg_Contact2='".$_POST['Cont2']."', Emg_Person2='".$_POST['PName2']."', Emp_Relation2='".$Rel_2."', Emg_Location2='".$_POST['PLoc2']."', Emg_Date='".date("Y-m-d")."', SubValue=1 where EmployeeID=".$EmployeeId, $con);
if($sqlUp)
{
    //$email_to = 'vspl.hr@vnrseeds.com';
    //$email_from='admin@vnrseeds.co.in';
    $email_subject = "Update Emergency Contact No.";
    //$email_txt = "Update Emergency Contact No."; 
    //$headers = "From: $email_from ". "\r\n";
    $email_message .=$_POST['EmpName']." has submitted emergency contact details, for details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve.\n\n";
    //$ok = @mail($email_to, $email_subject, $email_message, $headers);
    
$subject=$email_subject;
$body=$email_message;
$email_to='vspl.hr@vnrseeds.com';
require 'vendor/mail_admin.php';

    $msgCont="data saved successfully..."; 
}



}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.fontButton { background-color:#FFFFFF; color:#009393; font-family:Georgia; font-size:13px;}

.blink_me { animation: blinker 1s linear infinite; }
@keyframes blinker {  50% { opacity: 0; } }

</style>


<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script type="text/javascript">
function GeneralBtn()
{var x = "Profile.php?ee=321&e=we%rr%trt&pqg=wwwe&ret=343&yt=true&gg=salfase&yy=rer&rr=yY%Y%F%F&bb=123321123321&ytr=5456&C=G&rer=rer"; window.location=x;}
function PersonalBtn()
{var x = "Profile.php?ee=321&e=we%rr%trt&pqg=wwwe&ret=343&yt=true&gg=salfase&yy=rer&rr=yY%Y%F%F&bb=123321123321&ytr=5456&C=P&rer=rer"; window.location=x;}
function ContactBtn()
{var x = "Profile.php?ee=321&e=we%rr%trt&pqg=wwwe&ret=343&yt=true&gg=salfase&yy=rer&rr=yY%Y%F%F&bb=123321123321&ytr=5456&C=C&rer=rer"; window.location=x;}
function EducationBtn()
{var x = "Profile.php?ee=321&e=we%rr%trt&pqg=wwwe&ret=343&yt=true&gg=salfase&yy=rer&rr=yY%Y%F%F&bb=123321123321&ytr=5456&C=E&rer=rer"; window.location=x;}
function FamilyBtn()
{var x = "Profile.php?ee=321&e=we%rr%trt&pqg=wwwe&ret=343&yt=true&gg=salfase&yy=rer&rr=yY%Y%F%F&bb=123321123321&ytr=5456&C=F&rer=rer"; window.location=x;}
function ExperienceBtn()
{var x = "Profile.php?ee=321&e=we%rr%trt&pqg=wwwe&ret=343&yt=true&gg=salfase&yy=rer&rr=yY%Y%F%F&bb=123321123321&ytr=5456&C=Ex&rer=rer"; window.location=x;}
function LangBtn()
{var x = "Profile.php?ee=321&e=we%rr%trt&pqg=wwwe&ret=343&yt=true&gg=salfase&yy=rer&rr=yY%Y%F%F&bb=123321123321&ytr=5456&C=L&rer=rer"; window.location=x;}
function TrainingBtn()
{var x = "Profile.php?ee=321&e=we%rr%trt&pqg=wwwe&ret=343&yt=true&gg=salfase&yy=rer&rr=yY%Y%F%F&bb=123321123321&ytr=5456&C=T&rer=rer"; window.location=x;}

function ProfileHelpDoc()
{window.open("ProfileHelpDoc.php?action=help","HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=720,height=600");}

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
</Script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				 <td width="900" height="400" valign="top">
<?php //*****************************************Profile Open****************************************************?>		
<?php $sqlPS=mysql_query("select * from hrm_employee where CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId, $con); $resPS=mysql_fetch_assoc($sqlPS); ?>		 
<table border="0">
 <tr>
   <td valign="top">
    <table border="0">
	  <tr>
        <td valign="top">
		 <font style="font-family:Times New Roman; font-size:20px; color:#005B00; font-weight:bold; width:100px;" align="">My Profile</font>	
		 &nbsp;&nbsp;
		 <a href="#" onClick="ProfileHelpDoc()"><font color="#000099" style="width:200px;font-family:Times New Roman;" size="3" ><b>Help Document</b></font></font></a>
		 <?php if($resPS['ProfileCertify']=='N') { ?>
         <table border="0"><tr><td style="font-family:Times New Roman;font-size:16px; color:#800000; font-weight:bold; width:880px; display:<?php if($_REQUEST['C']=='G'){echo 'block';} else {echo 'none';} ?>;" align="justify">Certify your data by viewing on each page, providing details of blank field, if applicable, by notifying incorrect data to HR. Provide supporting documents wherever required.....</td></tr></table><?php } ?>
       </td>	 
     </tr>
	 <?php if($_REQUEST['C']==''){$_REQUEST['C']='G';} ?>
	  <tr>
	    <td valign="top"><input type="hidden" id="ClickValue" value="<?php echo $_REQUEST['C']; ?>" />
		  <table border="0">
		    <tr>		
<td align="center"><a href="#"><img id="Img_general1" style="display:<?php if($_REQUEST['C']=='G'){echo 'none';} else {echo 'block';} ?>;" src="images/Egeneral1.png" border="0" onClick="GeneralBtn()"/></a><img id="Img_general" src="images/Egeneral.png" border="0" style="display:<?php if($_REQUEST['C']=='G'){echo 'block';} else {echo 'none';} ?>;"/></td>

<td align="center"><a href="#"><img id="Img_personal1" style="display:<?php if($_REQUEST['C']=='P'){echo 'none';} else {echo 'block';} ?>;" src="images/Epersonal1.png" border="0" onClick="PersonalBtn()"/></a><img src="images/Epersonal.png" id="Img_personal" border="0" style="display:<?php if($_REQUEST['C']=='P'){echo 'block';} else {echo 'none';} ?>;"/></td>	
				  
<td align="center"><a href="#"><img id="Img_contact1" style="display:<?php if($_REQUEST['C']=='C'){echo 'none';} else {echo 'block';} ?>;" src="images/Econtact1.png" border="0" onClick="ContactBtn()"/></a><img src="images/Econtact.png" id="Img_contact" border="0" style="display:<?php if($_REQUEST['C']=='C'){echo 'block';} else {echo 'none';} ?>;"/></td>
				  
<td align="center"><a href="#"><img id="Img_education1" style="display:<?php if($_REQUEST['C']=='E'){echo 'none';} else {echo 'block';} ?>;" src="images/Eeducation1.png" border="0" onClick="EducationBtn()"/></a><img src="images/Eeducation.png" border="0" style="display:<?php if($_REQUEST['C']=='E'){echo 'block';} else {echo 'none';} ?>;" id="Img_education"/></td>

<td align="center"><a href="#"><img id="Img_experience1" style="display:<?php if($_REQUEST['C']=='Ex'){echo 'none';} else {echo 'block';} ?>;" src="images/Experience1.png" border="0" onClick="ExperienceBtn()"/></a><img src="images/Experience.png" border="0" style="display:<?php if($_REQUEST['C']=='Ex'){echo 'block';} else {echo 'none';} ?>;" id="Img_experience"/></td>				
				  		
<td align="center"><a href="#"><img id="Img_family1" style="display:<?php if($_REQUEST['C']=='F'){echo 'none';} else {echo 'block';} ?>;" src="images/Efamily1.png" border="0" onClick="FamilyBtn()"/></a><img src="images/Efamily.png" border="0" style="display:<?php if($_REQUEST['C']=='F'){echo 'block';} else {echo 'none';} ?>;" id="Img_family"/></td>

<td align="center"><a href="#"><img id="Img_lang1" style="display:<?php if($_REQUEST['C']=='L'){echo 'none';} else {echo 'block';} ?>;" src="images/Elanguage1.png" border="0" onClick="LangBtn()"/></a><img src="images/Elanguage.png" border="0" style="display:<?php if($_REQUEST['C']=='L'){echo 'block';} else {echo 'none';} ?>;" id="Img_lang"/></td>

<td align="center"><a href="#"><img id="Img_training1" style="display:<?php if($_REQUEST['C']=='T'){echo 'none';} else {echo 'block';} ?>;" src="images/Etraining1.png" border="0" onClick="TrainingBtn()"/></a><img id="Img_training" src="images/Etraining.png" border="0" style="display:<?php if($_REQUEST['C']=='T'){echo 'block';} else {echo 'none';} ?>;"/></td>
		   </tr>		 		
	     </table>
		</td>
	  </tr>
	   
	   <tr>
<?php $LEC=strlen($EmpCode); 
      if($LEC==1){$EC='000'.$EmpCode;} if($LEC==2){$EC='00'.$EmpCode;} if($LEC==3){$EC='0'.$EmpCode;} if($LEC>=4){$EC=$EmpCode;} 
?>	   
<?php //---------------------------------------------------------General-----------------------------------------------------------------------------------?>
<?php $sqlE=mysql_query("select DateJoining,DOB,EmailId_Vnr,MobileNo_Vnr,InsuCardNo,PfAccountNo,PF_UAN,EsicNo,BankName,BranchName,AccountNo,RepEmployeeID,ReportingName,ReportingDesigId,ReportingContactNo,VNRExpYear,PreviousExpYear from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); ?>	  	  
	     <td valign="top" id="DTGen" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='G'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;" cellspacing="1">	
		   
<?php $sqlSetH=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS' ", $con);  
      $resSetH=mysql_fetch_array($sqlSetH); ?>		   
		   
<tr style="background-color:#FFFFFF;"> 
<td valign="top" style="width:100px;color:#FFFFFF; background-color:#7a6189;">Name :</td>
<td valign="top" style="width:265px;color:#000;font-size:12px;" align="justify"><?php echo $NameE; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Code :</td>
<td valign="top" style="width:80px;color:#000;"><?php echo $EC; ?></td>
<?php $sqlD=mysql_query("select DepartmentCode,FunName from hrm_department where DepartmentId=".$DepartmentId, $con); $resD=mysql_fetch_assoc($sqlD); ?>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;"><?php if($resD['FunName']==''){echo 'Department';}else{echo 'Function';}?> :</td>
<td valign="top" style="width:240px;color:#000;font-size:12px;" align="justify"><?php if($resD['FunName']==''){ echo strtoupper($resD['DepartmentCode']); }else{ echo strtoupper($resD['FunName']); } //if($DepartmentId!=4 AND $DepartmentId!=25){} ?></td>
</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;">Designation :</td>
<?php if($DesigId>0){ $sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$DesigId, $con); $resDe=mysql_fetch_assoc($sqlDe); } ?>		
<td valign="top" style="width:0px;color:#000;font-size:12px;" align="justify"><?php if($resSetH['Show_GradeDesig']=='Y'){ echo strtoupper($resDe['DesigName']); } //if($DepartmentId!=4 AND $DepartmentId!=25){} ?></td>
<td valign="top" style="width:65px;color:#FFFFFF;background-color:#7a6189;">Grade :</td>
<?php if($GradeId>0){$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$GradeId, $con); $resG=mysql_fetch_assoc($sqlG);} ?>			
<td valign="top" style="width:80px;color:#000;">
<?php if($resSetH['Show_GradeDesig']=='Y'){ echo $resG['GradeValue']; } //if($DepartmentId!=4 AND $DepartmentId!=25){ } ?>
</td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">HQ:</td>
<?php if($HqId>0){ $sqlH=mysql_query("select HqName from hrm_headquater where HqId=".$HqId, $con); $resH=mysql_fetch_assoc($sqlH); } ?>
<td valign="top" style="width:240px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resH['HqName']); ?></td>
</tr>	
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;">Email-Id :</td>	
<td valign="top" style="width:0px;color:#000;" align="justify"><?php echo $resE['EmailId_Vnr']; ?></td>
<td valign="top" style="width:65px;color:#FFFFFF;background-color:#7a6189;">Official Mobile No :</td>		
<td valign="top" style="width:100px;color:#000;"><?php echo $resE['MobileNo_Vnr']; ?></td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">DOJ :</td>
<td valign="top" style="width:240px;color:#000;" align="justify"><?php echo date("d-m-Y",strtotime($resE['DateJoining'])); ?></td>
</tr>	
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;">Bank :</td>	
<td valign="top" style="width:0px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resE['BankName']); ?></td>	
<td valign="top" style="width:65px;color:#FFFFFF;background-color:#7a6189;">A/C No :</td>
<td valign="top" style="width:100px;color:#000;" align=""><?php echo '00'.$resE['AccountNo']; ?></td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">Branch :</td>
<td valign="top" style="width:240px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resE['BranchName']); ?></td>
</tr>
<?php //$SqlReG=mysql_query("select Gender from hrm_employee_general where EmployeeID=".$resE['RepEmployeeID'], $con); $resReG=mysql_fetch_assoc($SqlReG);
      $SqlReP=mysql_query("select Gender,Married,DR from hrm_employee_personal where EmployeeID=".$resE['RepEmployeeID'], $con); $resReP=mysql_fetch_assoc($SqlReP);
 if($resReP['DR']=='Y'){$M='Dr.';}elseif($resReP['Gender']=='M'){$M='Mr.';} elseif($resReP['Gender']=='F' AND $resReP['Married']=='Y'){$M='Mrs.';} elseif($resReP['Gender']=='F' AND $resReP['Married']=='N'){$M='Miss.';} 
 ?>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;">Reporting :</td>	
<td valign="top" style="width:0px;color:#000;font-size:12px;" align="justify"><?php echo $M.' '.strtoupper($resE['ReportingName']); ?></td>
<td valign="top" style="width:65px;color:#FFFFFF;background-color:#7a6189;">Designation :</td>
<?php $sqlRn=mysql_query("select DesigId from hrm_employee_general where EmployeeID=".$resE['RepEmployeeID'], $con); $resRn=mysql_fetch_assoc($sqlRn);
      if($resRn['DesigId']>0){ $sqlDe2=mysql_query("select DesigName from hrm_designation where DesigId=".$resRn['DesigId'], $con); $resDe2=mysql_fetch_assoc($sqlDe2); } ?>				
<td valign="top" style="width:240px;color:#000;font-size:12px;"><?php if($resSetH['Show_GradeDesig']=='Y'){ echo strtoupper($resDe2['DesigName']); } ?></td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">Contact No. :</td>
<td valign="top" style="width:240px;color:#000;"><?php //echo strtoupper($resE['ReportingContactNo']); ?></td>
</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;"><?php if($resReti['RetiStatus']=='N'){ ?>PF No. :<?php } ?></td>	
<td valign="top" style="width:0px;color:#000;" align="justify"><?php if($resReti['RetiStatus']=='N'){ ?><?php echo strtoupper($resE['PfAccountNo']); ?><?php } ?></td>
<td valign="top" style="width:65px;color:#FFFFFF;background-color:#7a6189;">PF UAN :</td>			
<td valign="top" style="width:240px;color:#000;"><?php echo strtoupper($resE['PF_UAN']); ?></td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">&nbsp;</td>
<td valign="top" style="width:240px;color:#000;"><?php echo ''; ?></td>
</tr>

<?php //$timestamp_start = strtotime($resE['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d")); 
      //$difference = abs($timestamp_end - $timestamp_start); 
//$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years2 = $difference/(60*60*24*365); //$Y2=$years2*12; $M22=$months-$Y2;
//$ExpVNRMain=number_format($years2, 1); 

if($resReti['RetiStatus']=='N'){$StratDate=$resE['DateJoining'];}elseif($resReti['RetiStatus']=='Y'){$StratDate=$resReti['RetiDate'];}	

$date1 = $StratDate;
$date2 = date("Y-m-d");
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff/(365*60*60*24));
$months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$ExpVNRMain=$years.'.'.$months;	


$dos=date("d-m-Y",strtotime($StratDate));
$localtime = getdate();
$today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
$dob_a = explode("-", $dos);
$today_a = explode("-", $today);
$dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
$today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
$years = $today_y - $dob_y;
$months = $today_m - $dob_m;
if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
if ($today_d < $dob_d){ $months--; }
$firstMonths=array(1,3,5,7,8,10,12);
$secondMonths=array(4,6,9,11);
$thirdMonths=array(2);
if($today_m - $dob_m == 1) 
{
if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
}
//$ExpVNRMain=$years.' Year - '.$months.' Month'; 
  
$len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
//$ExpVNRMain=$years.'.'.$mnt;
if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; } 
//if($months<12){ $mnt='0.'.$str[1]; }  
elseif($months>=12 AND $months<24){ $m1=$months-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($months>=24 AND $months<36){$m1=$months-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($months>=36 AND $months<48){$m1=$months-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($months>=48 AND $months<60){$m1=$months-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($months>=60 AND $months<72){$m1=$months-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($months>=72 AND $months<84){$m1=$months-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($months>=84 AND $months<96){$m1=$months-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($months>=96 AND $months<108){$m1=$months-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$ExpVNRMain=($years+$str_a[0]).'.'.$str_a[1].' Year';  
 
?> 
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;">Mediclaim PolicyNo :</td>	
<td valign="top" style="width:0px;color:#000;" align=""><?php echo strtoupper($resE['InsuCardNo']); ?></td>
<td valign="top" style="width:65px;color:#FFFFFF;background-color:#7a6189;"><?php if($resReti['RetiStatus']=='N'){echo 'VNR Experience';}elseif($resReti['RetiStatus']=='Y'){echo 'Consultant Exp';}?> :</td>				
<td valign="top" style="width:240px;color:#000;"><?php echo $ExpVNRMain; ?></td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">Previous Experience :</td>
<td valign="top" style="width:240px;color:#000;"><?php echo $resE['PreviousExpYear'].'&nbsp;Year'; ?></td>
</tr>
		   </table>
         </td>
<?php //---------------------------------------------------------Personal-----------------------------------------------------------------------------------?>
<?php $sqlEP=mysql_query("select * from hrm_employee_personal where EmployeeID=".$EmployeeId, $con); $resEP=mysql_fetch_assoc($sqlEP);   ?>
<?php //if($resEP['BloodGroup']=='O+'){$BG='O Positive';} if($resEP['BloodGroup']=='A+'){$BG='A Positive';} if($resEP['BloodGroup']=='B+'){$BG='B Positive';} 
//if($resEP['BloodGroup']=='AB+'){$BG='AB Positive';} if($resEP['BloodGroup']=='O-'){$BG='O Negative';} if($resEP['BloodGroup']=='A-'){$BG='A Negative';}
//if($resEP['BloodGroup']=='B-'){$BG='B Negative';}if($resEP['BloodGroup']=='AB-'){$BG='AB Negative';}?>		 
		  <td valign="top" id="DTPer" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='P'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;" cellspacing="1">
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:120px;color:#FFFFFF;background-color:#7a6189;">DOB :</td>
<td valign="top" style="width:250px;color:#000;" align="justify"><?php if($resE['DOB']!='0000-00-00' AND $resE['DOB']!='1970-01-01'){ echo date("d-m-Y",strtotime($resE['DOB'])); } else {echo '';}?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Gender :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;"><?php if($resEP['Gender']=='M') {echo 'MALE';} else {echo 'FEMALE';} ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Blood Group :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEP['BloodGroup']); ?></td>
</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Email-Id :</td>
<td valign="top" style="width:250px;color:#000;" align="justify"><?php echo $resEP['EmailId_Self']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Mobile :</td>
<td valign="top" style="width:150px;color:#000;"><?php echo $resEP['MobileNo']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Qualification :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEP['Qualification']); ?></td>
</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Pancard No :</td>
<td valign="top" style="width:250px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEP['PanNo']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Marital Status :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;"><?php if($resEP['Married']=='N'){echo 'UNMARRIED'; } else {echo 'MARRIED';} ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Anniversary :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="justify"><?php if($resEP['Married']=='N'){echo '';} if($resEP['Married']=='Y') { echo date("d-F", strtotime($resEP['MarriageDate']));}; ?></td>
</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Passport No :</td>
<td valign="top" style="width:250px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEP['PassportNo']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Valid From :</td>
<td valign="top" style="width:150px;color:#000;"><?php if($resEP['PassportNo']=='NA' OR $resEP['PassportNo']==''){echo '';} else {echo date("d-m-Y", strtotime($resEP['Passport_ExpiryDateFrom']));}; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Valid To :</td>
<td valign="top" style="width:150px;color:#000;" align="justify"><?php if($resEP['PassportNo']=='NA' OR $resEP['PassportNo']==''){echo '';} else {echo date("d-m-Y", strtotime($resEP['Passport_ExpiryDateTo']));}; ?></td>
</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Dri. Lic. No :</td>
<td valign="top" style="width:250px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEP['DrivingLicNo']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Valid From :</td>
<td valign="top" style="width:150px;color:#000;"><?php if($resEP['DrivingLicNo']=='NA' OR $resEP['DrivingLicNo']==''){echo '';} else {echo date("d-m-Y", strtotime($resEP['Driv_ExpiryDateFrom']));}; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Valid To :</td>
<td valign="top" style="width:150px;color:#000;" align="justify"><?php if($resEP['DrivingLicNo']=='NA' OR $resEP['DrivingLicNo']==''){echo '';} else {echo date("d-m-Y", strtotime($resEP['Driv_ExpiryDateTo']));}; ?></td>
</tr>	  	   
		   </table>
         </td>
<?php //---------------------------------------------------------Contact-----------------------------------------------------------------------------------?>
<?php $sqlEC=mysql_query("select * from hrm_employee_contact where EmployeeID=".$EmployeeId, $con); $resEC=mysql_fetch_assoc($sqlEC);   ?>		 
		 <td valign="top" id="DTCon" style="font-family:Times New Roman;size:12px;display:<?php if($_REQUEST['C']=='C'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;" cellspacing="1">
<tr style="background-color:#FFFFFF;">
<td valign="top" colspan="2" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Current Address:</td>		
<td colspan="5" valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['CurrAdd']); ?></td>
</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:110px;color:#000;font-size:14px;"></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">State :</td>
<?php $sqlS=mysql_query("select StateName from hrm_state where StateId=".$resEC['CurrAdd_State'], $con); $resS=mysql_fetch_assoc($sqlS);   ?>	
<td valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resS['StateName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">City :</td>
<?php $sqlC=mysql_query("select CityName from hrm_city where CityId=".$resEC['CurrAdd_City'], $con); $resC=mysql_fetch_assoc($sqlC);   ?>
<td valign="top" style="width:150px;color:#000;font-size:12px;"><?php echo strtoupper($resC['CityName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Pin no. : </td>
<td valign="top" style="width:150px;color:#000;" align="justify"><?php echo $resEC['CurrAdd_PinNo']; ?></td>
</tr>
<tr style="background-color:#FFFFFF;">	
<td valign="top" colspan="2" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Permanent Address:</td>		
<td colspan="5" valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['ParAdd']); ?></td>
</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:110px;color:#000;font-size:14px;"></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">State :</td>
<?php $sqlS2=mysql_query("select StateName from hrm_state where StateId=".$resEC['ParAdd_State'], $con); $resS2=mysql_fetch_assoc($sqlS2);   ?>
<td valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resS2['StateName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">City :</td>
<?php $sqlC2=mysql_query("select CityName from hrm_city where CityId=".$resEC['ParAdd_City'], $con); $resC2=mysql_fetch_assoc($sqlC2); ?>	
<td valign="top" style="width:150px;color:#000;font-size:12px;"><?php echo strtoupper($resC2['CityName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Pin no. : </td>
<td valign="top" style="width:150px;color:#000;" align="justify"><?php echo $resEC['ParAdd_PinNo']; ?></td>
</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:140px;color:#FFFFFF;font-size:14px;background-color:#7a6189;"><b>Reference Per </b></td>	
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Email-Id :</td>
<td valign="top" style="width:300px;color:#000;" align="justify"><?php echo $resEC['Personal_RefEmailId']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Name :</td>
<td valign="top" style="width:250px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['Personal_RefName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Contact :</td>	
<td valign="top" style="width:150px;color:#000;"><?php echo $resEC['Personal_RefContactNo']; ?></td>
</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:140px;color:#FFFFFF;font-size:14px;background-color:#7a6189;"><b>Reference Prof </b></td>	
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Name</td>
<td valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['Prof_RefName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Contact :</td>	
<td valign="top" style="width:150px;color:#000;"><?php echo strtolower($resEC['Prof_RefContactNo']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Designation : </td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['Prof_RefDesig']); ?></td>
</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:110px;color:#000;font-size:14px;"></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Email-Id :</td>
<td valign="top" style="width:300px;color:#000;" align="justify"><?php echo $resEC['Prof_RefEmailId']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Company : </td>	
<td colspan="3" valign="top" style="width:400px;color:#000;font-size:12px;"><?php echo strtoupper($resEC['Prof_RefCompany']); ?></td>
</tr>	
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:140px;color:#FFFFFF;font-size:14px;background-color:#7a6189;"><b>Emergency </b></td>	
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Name :</td>
<td valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['EmgName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Contact :</td>	
<td valign="top" style="width:150px;color:#000;"><?php echo $resEC['EmgContactNo']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Relation :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['EmgRelation']); ?></td>
</tr>
<?php /*
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:110px;color:#000;font-size:14px;"></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Email-Id :</td>
<td valign="top" style="width:300px;color:#000;" align="justify"><?php echo $resEC['EmgEmailId']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Address :</td>	
<td valign="top" colspan="3" style="width:400px;color:#000;font-size:12px;"><?php echo strtoupper($resEC['CurrAdd']); ?></td>
</tr>		
*/ ?>  
		   </table>
         </td>

<?php //---------------------------------------------------------Education-----------------------------------------------------------------------------------?>	
<?php 
$sqlEQ=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EmployeeId." order by QualificationId ASC", $con); $rowEQ=mysql_num_rows($sqlEQ); ?>		 
		 <td valign="top" id="DTEdu" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='E'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;" cellspacing="1">
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:120px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Qualification</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Specialization</b></td>
<td valign="top" style="width:350px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Institute/ University</b></td>
<td valign="top" style="width:250px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Subject</b></td>
<td valign="top" style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Grade/ Per.</b></td>
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>PassOut</b></td>
</tr>
<?php if($rowEQ>0) { while($resEQ=mysql_fetch_array($sqlEQ)) { ?>	  	  	
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:120px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEQ['Qualification']); ?></td>
<td valign="top" style="width:100px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEQ['Specialization']); ?></td>
<td valign="top" style="width:350px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEQ['Institute']); ?></td>
<td valign="top" style="width:250px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEQ['Subject']); ?></td>
<td valign="top" style="width:80px;color:#000;font-size:12px;" align="center"><?php echo strtoupper($resEQ['Grade_Per']); ?></td>
<td valign="top" style="width:90px;color:#000;" align="center"><?php echo $resEQ['PassOut']; ?></td>
</tr>	
<?php } }?>	    
		   </table>
         </td>

<?php //---------------------------------------------------------Exeperience-----------------------------------------------------------------------------------?>	
<?php $sqlEx=mysql_query("select * from hrm_employee_experience where EmployeeID=".$EmployeeId." order by ExpFromDate ASC", $con); $rowEx=mysql_num_rows($sqlEx); ?>		 
		 <td valign="top" id="DTEdu" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='Ex'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;" cellspacing="1">
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>From</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>To</b></td>
<td valign="top" style="width:280px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Company</b></td>
<td valign="top" style="width:260px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Designation</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Duration</b></td>
</tr>
<?php if($rowEx>0) { while($resEx=mysql_fetch_array($sqlEx)) { ?>	  	  	
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:100px;color:#000;" align="center"><?php if($resEx['ExpFromDate']!='0000-00-00' AND $resEx['ExpFromDate']!='1970-01-01'){echo date("M-Y",strtotime($resEx['ExpFromDate'])); } ?></td>
<td valign="top" style="width:100px;color:#000;" align="center"><?php if($resEx['ExpToDate']!='0000-00-00' AND $resEx['ExpToDate']!='1970-01-01'){ echo date("M-Y",strtotime($resEx['ExpToDate'])); } ?></td>
<td valign="top" style="width:280px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEx['ExpComName']); ?></td>
<td valign="top" style="width:260px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEx['ExpDesignation']); ?></td>
<td valign="top" style="width:100px;color:#000;" align="center"><?php echo floatval($resEx['ExpTotalYear']).'&nbsp; Year'; ?></td>
</tr>	
<?php } }?>	    
		   </table>
         </td>


<?php //---------------------------------------------------------Family-----------------------------------------------------------------------------------?>		 
<?php $sqlEF=mysql_query("select * from hrm_employee_family where EmployeeID=".$EmployeeId, $con); $rowEF=mysql_num_rows($sqlEF); $resEF=mysql_fetch_assoc($sqlEF);?>		 
		 <td valign="top" id="DTFam" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='F'){echo 'block';} else {echo 'none';} ?>;">
		 
<script type="text/javascript">
function FunCovid(t,E,P,N,ID)
{ //alert(t+"-"+E+"-"+P+"-"+N+"-"+ID);
 if(document.getElementById(N).checked==true){var vv='Y';}else{var vv='N';}
 var url = 'EmpFamily_Act.php';	var pars = 'For=CovidVaccine&E='+E+'&P='+P+'&N='+N+'&ID='+ID+'&vv='+vv+'&t='+t;	
 var myAjax = new Ajax.Request(
 url, { method: 'post', parameters: pars, onComplete: show_CovidV });
}
function show_CovidV(originalRequest)
{ document.getElementById('SpanIDForView').innerHTML = originalRequest.responseText; 
  var N=document.getElementById('ChkVN').value; var P=document.getElementById('ChkVP').value;
  var ID=document.getElementById('ChkVID').value; 
   if(document.getElementById('ChkV').value==1)
   { 
     if(document.getElementById('ChkVvv').value=='Y')
	 { document.getElementById("Td"+"_"+P+"_"+ID).style.background='#00FF00'; 
	   if(P!='O' && P!='O2'){ document.getElementById("Covid"+P+"_btn").style.display='block'; }
	   else{ document.getElementById(N+"_btn").style.display='block'; }
	 } 
     else{ document.getElementById("Td"+"_"+P+"_"+ID).style.background='#FFFFFF'; 
	   if(P!='O' && P!='O2'){ document.getElementById("Covid"+P+"_btn").style.display='none'; }
	   else { document.getElementById(N+"_btn").style.display='none'; } 
	 }
   }
   else{ alert("Error!"); }
}

function FunCovidFile(t,E,P,N,ID,R) 
{ 
 if(P!='S' && P!='S2' && P!='S3'){ if(document.getElementById(N).checked==true){var vv='Y';}else{var vv='N';} }else{vv='Y';} 
 var win = window.open("EmpFamily_Act.php?For=CovidVaccineFile&E="+E+"&P="+P+"&N="+N+"&ID="+ID+"&vv="+vv+"&t="+t+"&R="+R,"EForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=550,height=300"); 
 var timer = setInterval( function() { if(win.closed){ clearInterval(timer); window.location="Profile.php?ee=321&e=we%rr%trt&pqg=wwwe&ret=343&yt=true&gg=salfase&yy=rer&rr=yY%Y%F%F&bb=123321123321&ytr=5456&C=F&rer=rer"; } }, 1000);
}

</script>	
<span id="SpanIDForView"></span>

<?php $Before18y=date('Y-m-d',strtotime("-18 years", strtotime(date("Y-m-d")))); ?>	 
		   <table border="1" style="background-color:#7a6189;" cellspacing="1">
<tr style="background-color:#FFFFFF;">
<td rowspan="2" valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Relation</b></td>
<td rowspan="2" valign="top" style="width:350px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Name</b></td>
<td rowspan="2" valign="top" style="width:150px;color:#FFFFFF;background-color:#7a6189;" colspan="2" align="center"><b>Qualification</b></td>
<td rowspan="2" valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>DOB</b></td>
<td rowspan="2" valign="top" style="width:150px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Occupation</b></td>
<td colspan="2" valign="top" style="color:#FFFFFF;background-color:#7a6189;" align="center"><b>Covid - 19 Vaccination</b></td>
</tr> 	

<tr style="background-color:#FFFFFF;">
 <td valign="top" style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Dose-1</b></td>
 <td valign="top" style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Dose-2</b></td>
 <?php /*
 <td valign="top" style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Dose-1 Cerificate</b></td>
 <td valign="top" style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Dose-2 Cerificate</b></td>
 */ ?>
</tr> 	

<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:100px;color:#000;font-size:12px;" align=""><?php echo 'FATHER'; ?></td>
<td valign="top" style="width:350px;color:#000;font-size:12px;" align=""><?php echo $resEF['Fa_SN'].'. '.strtoupper($resEF['FatherName']); ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" colspan="2" align=""><?php echo strtoupper($resEF['FatherQuali']); ?></td>
<td valign="top" style="width:90px;color:#000;" align="center"><?php if(($resEF['FatherDOB']!='0000-00-00' AND $resEF['FatherDOB']!='1970-01-01') OR ($EmployeeId==1431 AND $resEF['FatherDOB']!='0000-00-00')){echo date("d-m-Y", strtotime($resEF['FatherDOB'])); } else {echo '';} ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEF['FatherOccupation']); ?></td>
<?php if($resEF['Fa_SN']!='Late' && $resEF['FatherDOB']<=$Before18y){ ?>
<td valign="top" style="width:80px;color:#000;font-size:12px;background-color:<?php if($resEF['Covid_VaccinF']=='Y'){echo '#00FF00';} ?>" id="Td_F_<?=$resEF['FamilyId']?>" align="center"><input type="checkbox" id="CovidF" name="CovidF" <?php if($resEF['Covid_VaccinF']=='Y'){echo 'checked';} ?> onClick="FunCovid(1,<?=$EmployeeId?>,'F','CovidF',<?=$resEF['FamilyId']?>)"/></td>
<td valign="top" style="width:80px;color:#000;font-size:12px;background-color:<?php if($resEF['Covid_VaccinF2']=='Y'){echo '#00FF00';} ?>" id="Td_F2_<?=$resEF['FamilyId']?>" align="center"><input type="checkbox" id="CovidF2" name="CovidF2" <?php if($resEF['Covid_VaccinF2']=='Y'){echo 'checked';} ?> onClick="FunCovid(2,<?=$EmployeeId?>,'F2','CovidF2',<?=$resEF['FamilyId']?>)"/></td>
<?php /*
<td valign="top" style="vertical-align:middle;width:80px;color:#000;font-size:12px;" id="Td_FBtn_<?=$resEF['FamilyId']?>" align="center"><?php if($resEF['Covid_VaccinF_file']!=''){echo '<a href="CovidCert/'.$resEF['Covid_VaccinF_file'].'" target="_blank">Uploaded</a>';}else{?><input type="button" id="CovidF_btn" onClick="FunCovidFile(1,<?=$EmployeeId?>,'F','CovidF',<?=$resEF['FamilyId']?>,'R')" value="upload" <?php if($resEF['Covid_VaccinF']=='N'){ echo 'style="display:none;"'; } ?>/> <?php } ?></td>
<td valign="top" style="vertical-align:middle;width:80px;color:#000;font-size:12px;" id="Td_F2Btn_<?=$resEF['FamilyId']?>" align="center"><?php if($resEF['Covid_VaccinF2_file']!=''){echo '<a href="CovidCert/'.$resEF['Covid_VaccinF2_file'].'" target="_blank">Uploaded</a>';}else{?><input type="button" id="CovidF2_btn" onClick="FunCovidFile(2,<?=$EmployeeId?>,'F2','CovidF2',<?=$resEF['FamilyId']?>,'R')" value="upload" <?php if($resEF['Covid_VaccinF2']=='N'){ echo 'style="display:none;"'; } ?>/> <?php } ?></td>
*/ ?>
<?php } ?>


</tr>
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:100px;color:#000;font-size:12px;" align=""><?php echo 'MOTHER'; ?></td>
<td valign="top" style="width:350px;color:#000;font-size:12px;" align=""><?php echo $resEF['Mo_SN'].'. '.strtoupper($resEF['MotherName']); ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" colspan="2" align=""><?php echo strtoupper($resEF['MotherQuali']); ?></td>
<td valign="top" style="width:90px;color:#000;" align="center"><?php if($resEF['MotherDOB']!='0000-00-00' AND $resEF['MotherDOB']!='1970-01-01'){echo date("d-m-Y", strtotime($resEF['MotherDOB'])); } else {echo '';} ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEF['MotherOccupation']); ?></td>
<?php if($resEF['Mo_SN']!='Late' && $resEF['MotherDOB']<=$Before18y){?>
<td valign="top" style="width:80px;color:#000;font-size:12px;background-color:<?php if($resEF['Covid_VaccinM']=='Y'){echo '#00FF00';} ?>;" id="Td_M_<?=$resEF['FamilyId']?>" align="center"><input type="checkbox" id="CovidM" name="CovidM" <?php if($resEF['Covid_VaccinM']=='Y'){echo 'checked';} ?> onClick="FunCovid(1,<?=$EmployeeId?>,'M','CovidM',<?=$resEF['FamilyId']?>)"/> </td>
<td valign="top" style="width:80px;color:#000;font-size:12px;background-color:<?php if($resEF['Covid_VaccinM2']=='Y'){echo '#00FF00';} ?>;" id="Td_M2_<?=$resEF['FamilyId']?>" align="center"><input type="checkbox" id="CovidM2" name="CovidM2" <?php if($resEF['Covid_VaccinM2']=='Y'){echo 'checked';} ?> onClick="FunCovid(2,<?=$EmployeeId?>,'M2','CovidM2',<?=$resEF['FamilyId']?>)"/> </td>
<?php /*
<td valign="top" style="vertical-align:middle;width:80px;color:#000;font-size:12px;" id="Td_MBtn_<?=$resEF['FamilyId']?>" align="center"><?php if($resEF['Covid_VaccinM_file']!=''){echo '<a href="CovidCert/'.$resEF['Covid_VaccinM_file'].'" target="_blank">Uploaded</a>';}else{?><input type="button" id="CovidM_btn" onClick="FunCovidFile(1,<?=$EmployeeId?>,'M','CovidM',<?=$resEF['FamilyId']?>,'R')" value="upload" <?php if($resEF['Covid_VaccinM']=='N'){ echo 'style="display:none;"'; } ?>/> <?php } ?></td>
<td valign="top" style="vertical-align:middle;width:80px;color:#000;font-size:12px;" id="Td_M2Btn_<?=$resEF['FamilyId']?>" align="center"><?php if($resEF['Covid_VaccinM2_file']!=''){echo '<a href="CovidCert/'.$resEF['Covid_VaccinM2_file'].'" target="_blank">Uploaded</a>';}else{?><input type="button" id="CovidM2_btn" onClick="FunCovidFile(2,<?=$EmployeeId?>,'M2','CovidM2',<?=$resEF['FamilyId']?>,'R')" value="upload" <?php if($resEF['Covid_VaccinM2']=='N'){ echo 'style="display:none;"'; } ?>/> <?php } ?></td>
*/ ?>
<?php } ?>
</tr>
<?php if($resEP['Married']=='Y') { ?> 	
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:100px;color:#000;font-size:12px;" align=""><?php if($resEP['Gender']=='M'){echo 'WIFE';} else{echo 'HUSBAND';} ?></td>
<td valign="top" style="width:350px;color:#000;font-size:12px;" align=""><?php echo $resEF['HW_SN'].'. '.strtoupper($resEF['HusWifeName']); ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" colspan="2" align=""><?php echo strtoupper($resEF['HusWifeQuali']); ?></td>
<td valign="top" style="width:90px;color:#000;" align="center"><?php if($resEF['HusWifeDOB']!='0000-00-00' AND $resEF['HusWifeDOB']!='1970-01-01'){echo date("d-m-Y", strtotime($resEF['HusWifeDOB'])); } else {echo '';} ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEF['HusWifeOccupation']); ?></td>
<?php if($resEF['HW_SN']!='Late' && $resEF['HusWifeDOB']<=$Before18y){?>
<td valign="top" style="width:80px;color:#000;font-size:12px;background-color:<?php if($resEF['Covid_VaccinW']=='Y'){echo '#00FF00';} ?>;" id="Td_W_<?=$resEF['FamilyId']?>" align="center"><input type="checkbox" id="CovidW" name="CovidW" <?php if($resEF['Covid_VaccinW']=='Y'){echo 'checked';} ?> onClick="FunCovid(1,<?=$EmployeeId?>,'W','CovidW',<?=$resEF['FamilyId']?>)"/> </td>
<td valign="top" style="width:80px;color:#000;font-size:12px;background-color:<?php if($resEF['Covid_VaccinW2']=='Y'){echo '#00FF00';} ?>;" id="Td_W2_<?=$resEF['FamilyId']?>" align="center"><input type="checkbox" id="CovidW2" name="CovidW2" <?php if($resEF['Covid_VaccinW2']=='Y'){echo 'checked';} ?> onClick="FunCovid(2,<?=$EmployeeId?>,'W2','CovidW2',<?=$resEF['FamilyId']?>)"/> </td>
<?php /*
<td valign="top" style="vertical-align:middle;width:80px;color:#000;font-size:12px;" id="Td_WBtn_<?=$resEF['FamilyId']?>" align="center"><?php if($resEF['Covid_VaccinW_file']!=''){echo '<a href="CovidCert/'.$resEF['Covid_VaccinW_file'].'" target="_blank">Uploaded</a>';}else{?><input type="button" id="CovidW_btn" onClick="FunCovidFile(1,<?=$EmployeeId?>,'W','CovidW',<?=$resEF['FamilyId']?>,'R')" value="upload" <?php if($resEF['Covid_VaccinW']=='N'){ echo 'style="display:none;"'; } ?>/> <?php } ?></td>
<td valign="top" style="vertical-align:middle;width:80px;color:#000;font-size:12px;" id="Td_W2Btn_<?=$resEF['FamilyId']?>" align="center"><?php if($resEF['Covid_VaccinW2_file']!=''){echo '<a href="CovidCert/'.$resEF['Covid_VaccinW2_file'].'" target="_blank">Uploaded</a>';}else{?><input type="button" id="CovidW2_btn" onClick="FunCovidFile(2,<?=$EmployeeId?>,'W2','CovidW2',<?=$resEF['FamilyId']?>,'R')" value="upload" <?php if($resEF['Covid_VaccinW2']=='N'){ echo 'style="display:none;"'; } ?> /> <?php } ?></td>
*/ ?>
<?php } ?>
</tr>			
<?php } $sqlEF2=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$EmployeeId, $con); 
$rowEF2=mysql_num_rows($sqlEF2); if($rowEF2>0) { $i=1; while($resEF2=mysql_fetch_array($sqlEF2)) {?> 
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:100px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEF2['FamilyRelation']); ?></td>
<td valign="top" style="width:350px;color:#000;font-size:12px;" align=""><?php echo $resEF2['Fa2_SN'].'. '.strtoupper($resEF2['FamilyName']); ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" colspan="2" align=""><?php echo strtoupper($resEF2['FamilyQualification']); ?></td>
<td valign="top" style="width:90px;color:#000;" align="center"><?php if($resEF2['FamilyDOB']!='0000-00-00' AND $resEF2['FamilyDOB']!='1970-01-01'){echo date("d-m-Y", strtotime($resEF2['FamilyDOB'])); } else {echo '';} ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEF2['FamilyOccupation']); ?></td>
<?php if($resEF2['Fa2_SN']!='Late'){ 
//&& $resEF2['FamilyDOB']<=$Before18y
?>
<td valign="top" style="width:80px;color:#000;font-size:12px;background-color:<?php if($resEF2['Covid_Vaccin']=='Y'){echo '#00FF00';} ?>;" id="Td_O_<?=$resEF2['Family2Id']?>" align="center"><input type="checkbox" id="CovidO<?=$i?>" name="CovidO<?=$i?>" <?php if($resEF2['Covid_Vaccin']=='Y'){echo 'checked';} ?> onClick="FunCovid(1,<?=$EmployeeId?>,'O','CovidO<?=$i?>',<?=$resEF2['Family2Id']?>)"/> </td>
<td valign="top" style="width:80px;color:#000;font-size:12px;background-color:<?php if($resEF2['Covid_Vaccin2']=='Y'){echo '#00FF00';} ?>;" id="Td_O2_<?=$resEF2['Family2Id']?>" align="center"><input type="checkbox" id="CovidO<?=$i?>2" name="CovidO<?=$i?>2" <?php if($resEF2['Covid_Vaccin2']=='Y'){echo 'checked';} ?> onClick="FunCovid(2,<?=$EmployeeId?>,'O2','CovidO<?=$i?>2',<?=$resEF2['Family2Id']?>)"/> </td>
<?php /*
<td valign="top" style="vertical-align:middle;width:80px;color:#000;font-size:12px;" id="Td_OBtn_<?=$resEF2['Family2Id']?>" align="center"><?php if($resEF2['Covid_Vaccin_file']!=''){echo '<a href="CovidCert/'.$resEF2['Covid_Vaccin_file'].'" target="_blank">Uploaded</a>';}else{?><input type="button" id="CovidO<?=$i?>_btn" onClick="FunCovidFile(1,<?=$EmployeeId?>,'O','CovidO<?=$i?>',<?=$resEF2['Family2Id']?>,'<?=$resEF2['FamilyRelation']?>')" value="upload" <?php if($resEF2['Covid_Vaccin']=='N'){ echo 'style="display:none;"'; } ?>/> <?php } ?></td>
<td valign="top" style="vertical-align:middle;width:80px;color:#000;font-size:12px;" id="Td_O2Btn_<?=$resEF2['Family2Id']?>" align="center"><?php if($resEF2['Covid_Vaccin2_file']!=''){echo '<a href="CovidCert/'.$resEF2['Covid_Vaccin2_file'].'" target="_blank">Uploaded</a>';}else{?><input type="button" id="CovidO<?=$i?>2_btn" onClick="FunCovidFile(2,<?=$EmployeeId?>,'O2','CovidO<?=$i?>2',<?=$resEF2['Family2Id']?>,'<?=$resEF2['FamilyRelation']?>')" value="upload" <?php if($resEF2['Covid_Vaccin2']=='N'){ echo 'style="display:none;"'; } ?> /> <?php } ?></td>
*/ ?>
<?php } ?>
</tr>		
<?php $i++;} }?>		   
		   </table>
         </td>
		 
<?php //---------------------------------------------------------Language-----------------------------------------------------------------------------------?>	
<?php $sqlL=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EmployeeId." order by LangProficiencyId ASC", $con); $rowL=mysql_num_rows($sqlL); ?>		 
		 <td valign="top" id="DTLang" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='L'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;" cellspacing="1">
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:150px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Language</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Write</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Read</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Speak</b></td>
</tr>
<?php if($rowL>0) { while($resL=mysql_fetch_array($sqlL)) { ?>	  	  	
<tr style="background-color:#FFFFFF;">
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="">&nbsp;<b><?php echo $resL['Language']; ?></b></td>
<td valign="top" style="width:100px;color:#000;font-size:12px;" align="center"><?php if($resL['Write_lang']=='Y'){echo 'YES';} else {echo 'NO';} ?></td>
<td valign="top" style="width:100px;color:#000;font-size:12px;" align="center"><?php if($resL['Read_lang']=='Y'){echo 'YES';} else {echo 'NO';} ?></td>
<td valign="top" style="width:100px;color:#000;font-size:12px;" align="center"><?php if($resL['Speak_lang']=='Y'){echo 'YES';} else {echo 'NO';} ?></td>
</tr>	
<?php } }?>	    
		   </table>
         </td>	

<?php //---------------------------------------------------------Training/ Conferance-----------------------------------------------------------------------------------?>	
<?php $sqlTr=mysql_query("select * from hrm_company_training_participant INNER JOIN hrm_company_training ON hrm_company_training_participant.TrainingId=hrm_company_training.TrainingId where hrm_company_training_participant.EmployeeID=".$EmployeeId." order by TraFrom DESC", $con); $rowTr=mysql_num_rows($sqlTr);
$sqlCo=mysql_query("select * from hrm_company_conference_participant INNER JOIN hrm_company_conference ON hrm_company_conference_participant.ConferenceId=hrm_company_conference.ConferenceId where hrm_company_conference_participant.EmployeeID=".$EmployeeId." order by ConfFrom DESC", $con); $rowCo=mysql_num_rows($sqlCo); ?>		 
		 <td valign="top" id="DTEdu" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='T'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;" cellspacing="1">
<tr><td colspan="9" style="width:40px;color:#FFFFFF;background-color:#7a6189;" align=""><b>&nbsp;TRAINING</b></td></tr>		   
<tr style="background-color:#FFFFFF;">
<td style="width:40px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>SN</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Subject</b></td>
<td style="width:60px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Year</b></td>
<td style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Date From</b></td>
<td style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Date To</b></td>
<td style="width:50px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Day</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Location</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Institute</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Trainer</b></td>
</tr>
<?php if($rowTr>0) { $SN=1; while($resTr=mysql_fetch_array($sqlTr)) { ?>	  	  	
<tr style="background-color:#FFFFFF;">
<td valign="top" style="color:#000;" align="center"><?php echo $SN; ?></td>
<td valign="top" style="color:#000;" align=""><?php echo $resTr['TraTitle']; ?></td>
<td valign="top" style="color:#000;" align="center"><?php echo $resTr['TraYear']; ?></td>
<td valign="top" style="color:#000;font-size:12px;" align="center"><?php echo date("d-M-y",strtotime($resTr['TraFrom'])); ?></td>
<td valign="top" style="color:#000;font-size:12px;" align="center"><?php echo date("d-M-y",strtotime($resTr['TraTo'])); ?></td>
<td valign="top" style="color:#000;" align="center"><?php echo $resTr['Duration']; ?></td>
<td valign="top" style="color:#000;" align=""><?php echo $resTr['Location']; ?></td>
<td valign="top" style="color:#000;" align=""><?php echo $resTr['Institute']; ?></td>
<td valign="top" style="color:#000;font-size:12px;" align=""><?php echo $resTr['TrainerName']; ?></td>
</tr>	
<?php $SN++; } } if($rowCo>0){ ?>	
<tr><td colspan="9" style="width:40px;color:#FFFFFF;background-color:#7a6189;" align=""><b>&nbsp;CONFERENCE</b></td></tr>		   
<tr style="background-color:#FFFFFF;">
<td style="width:40px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>SN</b></td>
<td colspan="2" style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Subject</b></td>
<td style="width:60px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Year</b></td>
<td style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Date From</b></td>
<td style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Date To</b></td>
<td style="width:50px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Day</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Location</b></td>
<td style="width:200px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Conducted By</b></td>
</tr>  	
<?php $SN=1; while($resCo=mysql_fetch_array($sqlCo)) { ?>  	
<tr style="background-color:#FFFFFF;">
<td valign="top" style="color:#000;" align="center"><?php echo $SN; ?></td>
<td colspan="2" valign="top" style="color:#000;" align=""><?php echo $resCo['ConfTitle']; ?></td>
<td valign="top" style="color:#000;" align="center"><?php echo $resCo['ConfYear']; ?></td>
<td valign="top" style="color:#000;font-size:12px;" align="center"><?php echo date("d-M-y",strtotime($resCo['ConfFrom'])); ?></td>
<td valign="top" style="color:#000;font-size:12px;" align="center"><?php echo date("d-M-y",strtotime($resCo['ConfTo'])); ?></td>
<td valign="top" style="color:#000;" align="center"><?php echo $resCo['Duration']; ?></td>
<td valign="top" style="color:#000;" align=""><?php echo $resCo['Location']; ?></td>
<td valign="top" style="color:#000;" align=""><?php echo $resCo['ConductedBy']; ?></td>
</tr>	
<?php $SN++; } }?>	
		   </table>
         </td>	
	 
		 
	   </tr> 
	</table>
   </td>
 </tr>
<script type="text/javascript">
function GenAgree() {var agree=confirm("Are you sure, your general details are correct?");  
if (agree) { var x = "Profile.php?C=G&GR_Agree=Y"; window.location=x; }}
function GenNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your general profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_GR").style.display='block'; }}
function SaveGR()
{ var Reason = document.getElementById("TextAreaGR"); 
  if(Reason==''){alert("Please type specific reason for disagree."); return false; }
 var GR_TextReason = document.getElementById("TextAreaGR").value; var textLength = Reason.value.length;
 var temp = GR_TextReason.replace(/[^a-zA-Z 0-9.,]+/g,'');
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=G&GR_Reason="+temp; window.location=x;
}

function PerAgree() {var agree=confirm("Are you sure, your personal details are correct?");  
if (agree) { var x = "Profile.php?C=P&PR_Agree=Y"; window.location=x; }}
function PerNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your personal profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_PR").style.display='block'; }}
function SavePR()
{ var Reason = document.getElementById("TextAreaPR"); 
  if(Reason==''){alert("Please type specific reason for disagree."); return false; } 
 var PR_TextReason = document.getElementById("TextAreaPR").value; var textLength = Reason.value.length;
 var temp = PR_TextReason.replace(/[^a-zA-Z 0-9.,]+/g,'');
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=P&PR_Reason="+temp; window.location=x;
}

function ConAgree() {var agree=confirm("Are you sure, your contact details are correct?");  
if (agree) { var x = "Profile.php?C=C&CR_Agree=Y"; window.location=x; }}
function ConNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your contact profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_CR").style.display='block'; }}
function SaveCR()
{ var Reason = document.getElementById("TextAreaCR"); 
  if(Reason==''){alert("Please type specific reason for disagree."); return false; }
 var CR_TextReason = document.getElementById("TextAreaCR").value; var textLength = Reason.value.length;
 var temp = CR_TextReason.replace(/[^a-zA-Z 0-9.,]+/g,'');
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=C&CR_Reason="+temp; window.location=x;
}

function EduAgree() {var agree=confirm("Are you sure, your education details are correct?");  
if (agree) { var x = "Profile.php?C=E&ER_Agree=Y"; window.location=x; }}
function EduNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your education profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_FR").style.display='block'; }}
function SaveER()
{ var Reason = document.getElementById("TextAreaER"); 
  if(Reason==''){alert("Please type specific reason for disagree."); return false; }
 var ER_TextReason = document.getElementById("TextAreaER").value; var textLength = Reason.value.length;
 var temp = ER_TextReason.replace(/[^a-zA-Z 0-9.,]+/g,'');
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=E&ER_Reason="+temp; window.location=x;
}

function ExpAgree() {var agree=confirm("Are you sure, your experience details are correct?");  
if (agree) { var x = "Profile.php?C=Ex&ExR_Agree=Y"; window.location=x; }}
function ExpNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your experience profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_ExR").style.display='block'; }}
function SaveExR()
{ var Reason = document.getElementById("TextAreaExR"); 
  if(Reason==''){alert("Please type specific reason for disagree."); return false; }
 var ExR_TextReason = document.getElementById("TextAreaExR").value; var textLength = Reason.value.length;
 var temp = ExR_TextReason.replace(/[^a-zA-Z 0-9.,]+/g,'');
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=Ex&ExR_Reason="+temp; window.location=x;
}

function FamAgree() {var agree=confirm("Are you sure, your family details are correct?");  
if (agree) { var x = "Profile.php?C=F&FR_Agree=Y"; window.location=x; }}
function FamNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your family profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_FR").style.display='block'; }}
function SaveFR()
{ var Reason = document.getElementById("TextAreaFR"); 
  if(Reason==''){alert("Please type specific reason for disagree."); return false; }
 var FR_TextReason = document.getElementById("TextAreaFR").value; var textLength = Reason.value.length;
 var temp = FR_TextReason.replace(/[^a-zA-Z 0-9.,]+/g,'');
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=F&FR_Reason="+temp; window.location=x;
}

function LangAgree() {var agree=confirm("Are you sure, your language proficiency details are correct?");  
if (agree) { var x = "Profile.php?C=L&LR_Agree=Y"; window.location=x; }}
function LangNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your language proficiency profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_LR").style.display='block'; }}
function SaveLR()
{ var Reason = document.getElementById("TextAreaLR"); 
  if(Reason==''){alert("Please type specific reason for disagree."); return false; }
 var LR_TextReason = document.getElementById("TextAreaLR").value; var textLength = Reason.value.length;
 var temp = LR_TextReason.replace(/[^a-zA-Z 0-9.,]+/g,'');
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=L&LR_Reason="+temp; window.location=x;
}


function Certify(C)
{ var agree=confirm("Are you sure...?");  
  if (agree) { var x = "Profile.php?action=Certify&C="+C; window.location=x; }}

function ChangeExtra()
{document.getElementById("Changebtn").style.display='none'; document.getElementById("SubChange").style.display='block';
 document.getElementById("TD_ExtraTextArea").style.display='block';}
function Change(C)
{var Reason = document.getElementById("ExtraChange"); 
 var ExtraChange = document.getElementById("ExtraChange").value; var textLength = Reason.value.length;
 var temp = ExtraChange.replace(/[^a-zA-Z 0-9.,]+/g,'');
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C="+C+"&Extra_Reason="+temp; window.location=x;
}
</script> 
   <tr>
<?php //General ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='G'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpGen_Status']!='YY') { ?>
<?php if($resPS['EmpGen_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your general profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpGen_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given general details are correct :<input type="button" style="width:80px;" onClick="GenAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="GenNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_GR" style="display:none;"><form name="GR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaGR" cols="61" rows="3" style=""></textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileGR" value="submit" onClick="return SaveGR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpGen_Status']=='YY'  AND $resPS['ProfileCertify']=='N') /* {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 General details certified....</td></tr></table><?php } */ ?>
</td>


<?php //Personal ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='P'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpPer_Status']!='YY') { ?>
<?php if($resPS['EmpPer_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your personal profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpPer_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given personal details are correct :<input type="button" style="width:80px;" onClick="PerAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="PerNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_PR" style="display:none;"><form name="PR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaPR" cols="61" rows="3" style=""></textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfilePR" value="submit" onClick="return SavePR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpPer_Status']=='YY' AND $resPS['ProfileCertify']=='N') /* {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Personal details certified....</td></tr></table><?php } */ ?>

<?php /*222222222222222*/ if($resPS['ProfileCertify']=='Y' AND $resps2['Open']=='Y'){ ?>
<?php if($respse['EmpPer_Status']!='YY') { ?>
<?php if($respse['EmpPer_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your personal profile correction will be done shortly.</td></tr></table>
<?php } if($respse['EmpPer_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given personal details are correct :<input type="button" style="width:80px;" onClick="PerAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="PerNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_PR" style="display:none;"><form name="PR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaPR" cols="61" rows="3" style=""></textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfilePR" value="submit" onClick="return SavePR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } ?>
<?php } ?>	 
</td>


<?php //Contact ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='C'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpCon_Status']!='YY') { ?>
<?php if($resPS['EmpCon_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your contact profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpCon_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given contact details are correct :<input type="button" style="width:80px;" onClick="ConAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="ConNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_CR" style="display:none;"><form name="CR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaCR" cols="61" rows="3" style=""></textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileCR" value="submit" onClick="return SaveCR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpCon_Status']=='YY' AND $resPS['ProfileCertify']=='N') /* { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Contact details certified....</td></tr></table><?php } */ ?>

<?php /*222222222222*/ if($resPS['ProfileCertify']=='Y' AND $resps2['Open']=='Y'){ ?>
<?php if($respse['EmpCon_Status']!='YY') { ?>
<?php if($respse['EmpCon_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your contact profile correction will be done shortly.</td></tr></table>
<?php } if($respse['EmpCon_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given contact details are correct :<input type="button" style="width:80px;" onClick="ConAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="ConNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_CR" style="display:none;"><form name="CR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaCR" cols="61" rows="3" style=""></textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileCR" value="submit" onClick="return SaveCR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } ?>
<?php } ?>

<?php if($resps2['EmgContOpen']=='Y'){ ?>	 
  <table border="0">
   <tr>
    <td style="font-family:Times New Roman;font-size:16px;color:#0080FF;font-weight:bold;width:900px;" align="center">Please update your emergency contact details :
	<font color="#009933"><?php echo $msgCont; ?></font></td>
   </tr>
<script type="text/javascript" language="javascript">
function ValidateCont(formEcontact) 
{ 
var Cont1 = formEcontact.Cont1.value; var Cont2 = formEcontact.Cont2.value; 
var PName1 = formEcontact.PName1.value; var PName2 = formEcontact.PName2.value;

var PRel1 = document.getElementById("PRel1").value; var PRel2 = document.getElementById("PRel2").value;;
var PLoc1 = formEcontact.PLoc1.value; var PLoc2 = formEcontact.PLoc2.value;
var POth1 = document.getElementById("POth1").value; var POth2 = document.getElementById("POth2").value;
if(Cont1.length===0 && Cont2.length===0) { alert("Please enter minimum one emg. contact no.");  return false; }
var Numfilter=/^[0-9 ]+$/; var test_num1 = Numfilter.test(Cont1); var test_num2 = Numfilter.test(Cont2);
var filter=/^[a-zA-Z. /]+$/; var test_bool1 = filter.test(PName1); var test_bool2 = filter.test(PName2);
 if(Cont1.length>0)
 { if(test_num1==false) { alert('Please enter only number in emergency(1) contact no. field'); return false; }
   if(Cont1.length<10){ alert("Please check emergency(1) contact no.");  return false; } 
   if(PName1.length===0){ alert("Please enter emergency(1) person name");  return false; }
   if(test_bool1==false) { alert('Please enter only alphabets in emergency(1) person name field'); return false; } 
   if(PRel1==''){alert('please select emergency(1) relation'); return false; }
   if(PLoc1.length===0){ alert("Please type emergency(1) location");  return false; }
   if(PRel1=='OTHER' && POth1==''){alert('please type emergency(1) other relation name'); return false; }
 } 	
 if(Cont2.length>0)
 { if(test_num2==false) { alert('Please enter only number in emergency(2) contact no. field'); return false; }
   if(Cont2.length<10){ alert("Please check emergency(2) contact no.");  return false; } 
   if(PName2.length===0){ alert("Please enter emergency(2) person name");  return false; }
   if(test_bool2==false) { alert('Please enter only alphabets in emergency(2) person name field'); return false; } 
   if(PRel2==''){alert('please select emergency(2) relation'); return false; } 
   if(PLoc2.length===0){ alert("Please type emergency(2) location");  return false; }
   if(PRel2=='OTHER' && POth2==''){alert('please type emergency(2) other relation name'); return false; }
 } 	
   
   var agree=confirm("Are you sure, all emergency contact details are correct.")
   if(agree){return true;}else{return false;}
}

function ClickR1(v)
{  if(v=='OTHER'){ document.getElementById("POth1").readOnly=false;document.getElementById("POth1").style.backgroundColor='#FFFFFF'; }
   else{document.getElementById("POth1").readOnly=true;document.getElementById("POth1").style.backgroundColor='#E0E0E0';}
}
function ClickR2(v)
{  if(v=='OTHER'){ document.getElementById("POth2").readOnly=false;document.getElementById("POth2").style.backgroundColor='#FFFFFF'; }
   else{document.getElementById("POth2").readOnly=true;document.getElementById("POth2").style.backgroundColor='#E0E0E0';}
}
</script> 
<?php //if($EmployeeId==142 OR $EmployeeId==169){ ?> 
<form name="formEcontact" method="post" onSubmit="return ValidateCont(this)">	
  <tr>
    <td style="width:900px;">
	 <table border="1">
	  <tr>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:180px;">&nbsp;(1) Emergency No. :</td>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;width:100px;">
	   <input name="Cont1" id="Cont1" value="<?php if($resEC['Emg_Contact1']!=0){echo $resEC['Emg_Contact1']; } ?>" style="width:98px;border-style:hidden;" maxlength="10"/></td>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:140px;">&nbsp;Person Name :</td>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;width:210px;">
	   <input name="PName1" id="PName1" style="width:208px;border-style:hidden;" value="<?php echo $resEC['Emg_Person1']; ?>" maxlength="50"/></td>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:100px;">&nbsp;Relation :</td>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;width:100px;">
	   <select style="text-transform:uppercase;width:100px;border-style:hidden;" name="PRel1" id="PRel1" onChange="ClickR1(this.value)">
	   <?php if($resEC['Emp_Relation1']!='') { ?><option value="<?php echo $resEC['Emp_Relation1']; ?>">&nbsp;<?php echo $resEC['Emp_Relation1']; ?></option>
       <?php } else { ?><option value="">&nbsp;SELECT</option><?php } ?>
       <option value="FATHER">&nbsp;FATHER</option><option value="MOTHER">&nbsp;MOTHER</option><option value="HUSBAND">&nbsp;HUSBAND</option><option value="WIFE">&nbsp;WIFE</option>
       <option value="BROTHER">&nbsp;BROTHER</option><option value="SISTER">&nbsp;SISTER</option><option value="OTHER">&nbsp;OTHER</option>
       </select></td>
	   <td bgcolor="#E0E0E0" style="font-family:Times New Roman;width:100px;">
	   <input name="POth1" id="POth1" style="text-transform:uppercase;width:98px;border-style:hidden;background-color:#E0E0E0;" value="" maxlength="30" readonly/></td>
	  </tr>
	  <tr>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location :</td>
	   <td bgcolor="#FFFFFF" colspan="3" style="font-family:Times New Roman;">
	   <input name="PLoc1" id="PLoc1" value="<?php echo $resEC['Emg_Location1']; ?>" style="width:400px;border-style:hidden;"/></td>
	  </tr>
	  <tr>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:180px;">&nbsp;(2) Emergency No. :</td>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;width:100px;">
	   <input name="Cont2" id="Cont2" value="<?php if($resEC['Emg_Contact2']!=0){echo $resEC['Emg_Contact2']; } ?>" style="width:98px;border-style:hidden;" maxlength="10"/></td>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:140px;">&nbsp;Person Name :</td>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;width:210px;">
	   <input name="PName2" id="PName2" style="width:208px;border-style:hidden;" value="<?php echo $resEC['Emg_Person2']; ?>" maxlength="50"/></td>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:100px;">&nbsp;Relation :</td>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;width:100px;">
	   <select style="text-transform:uppercase;width:100px;border-style:hidden;" name="PRel2" id="PRel2" onChange="ClickR2(this.value)">
	   <?php if($resEC['Emp_Relation2']!='') { ?><option value="<?php echo $resEC['Emp_Relation2']; ?>">&nbsp;<?php echo $resEC['Emp_Relation2']; ?></option>
       <?php } else { ?><option value="">&nbsp;SELECT</option><?php } ?>
       <option value="FATHER">&nbsp;FATHER</option><option value="MOTHER">&nbsp;MOTHER</option><option value="HUSBAND">&nbsp;HUSBAND</option><option value="WIFE">&nbsp;WIFE</option>
       <option value="BROTHER">&nbsp;BROTHER</option><option value="SISTER">&nbsp;SISTER</option><option value="OTHER">&nbsp;OTHER</option>
       </select></td>
	   <td bgcolor="#E0E0E0" style="font-family:Times New Roman;width:100px;"><input type="hidden" name="EmpName" value="<?php echo $NameE; ?>" />
	   <input name="POth2" id="POth2" style="text-transform:uppercase;width:98px;border-style:hidden;background-color:#E0E0E0;" value="" maxlength="30" readonly/></td>
	  </tr>
	  <tr>
	   <td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location :</td>
	   <td bgcolor="#FFFFFF" colspan="3" style="font-family:Times New Roman;">
	   <input name="PLoc2" id="PLoc2" value="<?php echo $resEC['Emg_Location2']; ?>" style="width:400px;border-style:hidden;"/></td>
	  </tr>
	  </table>
	 </td>
    </tr>	
    <tr>
     <td valign="bottom">
	 <?php if($resEC['SubValue']==0){ ?>
	 <input type="submit" name="ContSubmit" id="ContSubmit" value="save" style="width:90px;height:25px;background-color:#8080FF;color:#FFFFFF;font-weight:bold;"/>
	 <?php } ?>
	 </td>
    </tr>
</form>
<?php //} ?>   
  </table>	 
<?php } ?>	 
</td>


<?php //Education ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='E'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpEdu_Status']!='YY') { ?>
<?php if($resPS['EmpEdu_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your education profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpEdu_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given education details are correct :<input type="button" style="width:80px;" onClick="EduAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="EduNagree()" value="Disagree - 2" />
	 </td></tr><tr><td valign="top" id="TD_ER" style="display:none;"><form name="ER" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaER" cols="61" rows="3" style=""></textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileER" value="submit" onClick="return SaveER()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpEdu_Status']=='YY' AND $resPS['ProfileCertify']=='N') /* {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Education details certified....</td></tr></table><?php } */ ?>

<?php /*222222222222222*/ if($resPS['ProfileCertify']=='Y' AND $resps2['Open']=='Y'){ ?>
<?php if($respse['EmpEdu_Status']!='YY') { ?>
<?php if($respse['EmpEdu_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your education profile correction will be done shortly.</td></tr></table>
<?php } if($respse['EmpEdu_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given education details are correct :<input type="button" style="width:80px;" onClick="EduAgree()" value="Agree" />
	  , Click Disagree if education are required :<input type="button" style="width:80px;" onClick="EduNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_FR" style="display:none;"><form name="ER" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaER" cols="61" rows="3" style=""></textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileER" value="submit" onClick="return SaveER()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } ?>
<?php } ?> 	 
	 
</td>


<?php //Experience ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='Ex'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpExp_Status']!='YY') { ?>
<?php if($resPS['EmpExp_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your experience profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpExp_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given experience details are correct :<input type="button" style="width:80px;" onClick="ExpAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="ExpNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_ExR" style="display:none;"><form name="ExR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaExR" cols="61" rows="3" style=""></textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileExR" value="submit" onClick="return SaveExR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpExp_Status']=='YY' AND $resPS['ProfileCertify']=='N') /* {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Experience details certified....</td></tr></table><?php } */ ?>
</td>


<?php //Family ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='F'){echo 'block';} else {echo 'none';} ?>;">
    
    
<?php $sqlG=mysql_query("select Covid_Vaccin, Covid_Vaccin2, Covid_Vaccin_file, Covid_Vaccin2_file, Covid_Vaccin3, Covid_Vaccin3_file from hrm_employee_general where EmployeeID=".$EmployeeId,$con);
      $resG=mysql_fetch_assoc($sqlG); ?>
<table style="width:800px;">	  
<tr>
<td style="width:800px;">
<table style="width:100%;" border="1" cellspacing="1">
<tr bgcolor="#BCA9D3">
 <td rowspan="2" style="text-align:center;width:200px;font-family:Times New Roman; font-size:15px;"><b>Self <br> Vaccination</b></td>
 <td style="text-align:center;width:150px;font-family:Times New Roman; font-size:13px;"><b>Dose-1</b></td>
 <td style="text-align:center;width:150px;font-family:Times New Roman; font-size:13px;"><b>Dose-2</b></td>
 <td style="text-align:center;width:150px;font-family:Times New Roman; font-size:13px;"><b>Precaution Dose</b></td>
 <td valign="top" style="width:150px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Dose-1<br>Cerificate</b></td>
 <td valign="top" style="width:150px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Dose-2<br>Cerificate</b></td>
 <td valign="top" style="width:150px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Precaution Dose Cerificate</b></td>
</tr>
<tr style="background-color:#FFFFFF;">
  <td class="All_80" align="center" id="Td_S_1" style="background-color:<?php if($resG['Covid_Vaccin']=='Y'){echo '#00FF00';} ?>;"><input type="checkbox" id="CovidS1" name="CovidS1" <?php if($resG['Covid_Vaccin']=='Y'){echo 'checked';} ?> onClick="FunCovid(1,<?=$EmployeeId?>,'S','CovidS1',1)"/> </td>
  <td class="All_80" align="center" id="Td_S2_1" style="background-color:<?php if($resG['Covid_Vaccin2']=='Y'){echo '#00FF00';} ?>;"><input type="checkbox" id="CovidS12" name="CovidS12" <?php if($resG['Covid_Vaccin2']=='Y'){echo 'checked';} ?> onClick="FunCovid(2,<?=$EmployeeId?>,'S2','CovidS12',1)"/> </td>
  <td class="All_80" align="center" id="Td_S3_1" style="background-color:<?php if($resG['Covid_Vaccin3']=='Y'){echo '#00FF00';} ?>;"><input type="checkbox" id="CovidS13" name="CovidS13" <?php if($resG['Covid_Vaccin3']=='Y'){echo 'checked';} ?> onClick="FunCovid(3,<?=$EmployeeId?>,'S3','CovidS13',1)"/> </td>
  
<td align="center" id="Td_SBtn_1" style="vertical-align:middle;"><?php if($resG['Covid_Vaccin_file']!=''){echo '<a href="CovidCert/'.$resG['Covid_Vaccin_file'].'" target="_blank">Uploaded</a>'; ?> 
    /  <a href="#" onClick="FunCovidFile(1,<?=$EmployeeId?>,'S','CovidS',1,'R')">Edit</a>
<?php 
}else{?><input type="button" id="CovidS_btn" onClick="FunCovidFile(1,<?=$EmployeeId?>,'S','CovidS',1,'R')" value="upload" <?php if($resG['Covid_Vaccin']=='N'){ echo 'style="display:none;"'; } ?>/> <?php } ?></td>

<td align="center" id="Td_S2Btn_1" style="vertical-align:middle;"><?php if($resG['Covid_Vaccin2_file']!=''){echo '<a href="CovidCert/'.$resG['Covid_Vaccin2_file'].'" target="_blank">Uploaded</a>'; ?> 
    /  <a href="#" onClick="FunCovidFile(2,<?=$EmployeeId?>,'S2','CovidS2',1,'R')">Edit</a>
<?php 
}else{?><input type="button" id="CovidS2_btn" onClick="FunCovidFile(2,<?=$EmployeeId?>,'S2','CovidS2',1,'R')" value="upload" <?php if($resG['Covid_Vaccin2']=='N'){ echo 'style="display:none;"'; } ?> /> <?php } ?></td>


<td align="center" id="Td_S2Btn_1" style="vertical-align:middle;"><?php if($resG['Covid_Vaccin3_file']!=''){echo '<a href="CovidCert/'.$resG['Covid_Vaccin3_file'].'" target="_blank">Uploaded</a>'; ?> 
    /  <a href="#" onClick="FunCovidFile(3,<?=$EmployeeId?>,'S3','CovidS3',1,'R')">Edit</a>
<?php 
}else{?><input type="button" id="CovidS3_btn" onClick="FunCovidFile(3,<?=$EmployeeId?>,'S3','CovidS3',1,'R')" value="upload" <?php if($resG['Covid_Vaccin3']=='N'){ echo 'style="display:none;"'; } ?> /> <?php } ?></td> 

 
  
</tr>
</table>
</td>
</tr>
</table>    
    
    
    
<?php if($resPS['EmpFam_Status']!='YY') { ?>
<?php if($resPS['EmpFam_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your family profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpFam_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given family details are correct :<input type="button" style="width:80px;" onClick="FamAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="FamNagree()" value="Disagree" />
	  
	 </td></tr><tr><td valign="top" id="TD_FR" style="display:none;"><form name="FR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaFR" cols="61" rows="3" style=""></textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileFR" value="submit" onClick="return SaveFR()"/></td></tr> 
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpFam_Status']=='YY' AND $resPS['ProfileCertify']=='N') /* {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Family details certified....</td></tr></table><?php } */ ?>
	 
<?php /*222222222222222*/ if($resPS['ProfileCertify']=='Y' AND $resps2['Open']=='Y'){ ?>
<?php if($respse['EmpFam_Status']!='YY') { ?>
<?php if($respse['EmpFam_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your family profile correction will be done shortly.</td></tr></table>
<?php } if($respse['EmpFam_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given family details are correct :<input type="button" style="width:80px;" onClick="FamAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="FamNagree()" value="Disagree" />
	  
	  
	  <br><br>
	  
	  <b style="font-size:18px; color:#FF0000;" class="blink_me">"Certification of details is needed on Personal, Contact, Education and Family pages and final certification once all is certified"</b>
	  
	  
	  
	 </td></tr><tr><td valign="top" id="TD_FR" style="display:none;"><form name="FR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaFR" cols="61" rows="3" style=""></textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileFR" value="submit" onClick="return SaveFR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } ?>
<?php } ?> 
	 
</td>

<?php //Language ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='L'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpLang_Status']!='YY') { ?>
<?php if($resPS['EmpLang_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your language proficiency profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpLang_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:900px;" align="">
	  Click Agree if the given lang. proficiency details are correct :<input type="button" style="width:80px;" onClick="LangAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="LangNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_LR" style="display:none;"><form name="LR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaLR" cols="61" rows="3" style=""></textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileFR" value="submit" onClick="return SaveLR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpLang_Status']=='YY' AND $resPS['ProfileCertify']=='N') /* {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Language details certified....</td></tr></table><?php } */ ?>
</td>


   </tr>
   <tr>
        <td valign="top" style="font-family:Times New Roman;size:12px;">
		<?php if($resPS['ProfileCertify']=='N') { ?>
         <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
		 I here by certify this data to be correct <blink><b style="color:#0076EC;"><u>click</u></b></blink>&nbsp;<input type="button" style="width:80px;" onClick="Certify('<?php echo $_REQUEST['C']; ?>')" value="Certify" <?php if($resPS['EmpGen_Status']=='YY' AND $resPS['EmpPer_Status']=='YY' AND $resPS['EmpCon_Status']=='YY' AND $resPS['EmpEdu_Status']=='YY' AND $resPS['EmpFam_Status']=='YY' AND $resPS['EmpExp_Status']=='YY'){ echo ''; } else {echo 'disabled';} ?>/>
	     </td></tr></table>
		 <?php } if($resPS['ProfileCertify']=='Y') { // AND $resps2['Open']=='N'?>
         <table border="0">
             <tr>
                 <td style="font-family:Times New Roman; font-size:16px; color:#0076EC; font-weight:bold; width:880px;" align="">
                     
		 For any change in data, notify HR with supporting documents click <input id="Changebtn" type="button" style="width:80px;" onClick="ChangeExtra()" value="Change" /> 
		        </td>
		     </tr>
		 <tr><td id="TD_ExtraTextArea" style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px; display:none;" align="" valign="top">
		 <textarea id="ExtraChange" cols="62" rows="3" style="">Type Reason.....</textarea><br>
		 <input type="button" onClick="Change('<?php echo $_REQUEST['C']; ?>')" id="SubChange" style="width:80px; display:block;" value="Submit" /></td></tr> 
		 </table> 
		 <?php } if($resPS['ProfileCertify']=='Y' AND $resps2['Open']=='Y' AND $respse['ProfileCertify']=='N') { ?>
         <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
		 I here by certify this data to be correct <blink><b style="color:#0076EC;"><u>click</u></b></blink>&nbsp;<input type="button" style="width:80px;" onClick="Certify('<?php echo $_REQUEST['C']; ?>')" value="Certify" <?php if($respse['EmpPer_Status']=='YY' AND $respse['EmpCon_Status']=='YY' AND $respse['EmpFam_Status']=='YY' AND $respse['EmpEdu_Status']=='YY'){echo '';}else{echo 'disabled';} ?>/>
	     </td></tr></table>
		 <?php } ?>
       </td>
	  	 
   </tr>
   
   
 <?php //$sqljsy=mysql_query("select * from hrm_opinion where EmployeeID=".$EmployeeId." AND OpenionName='jsy' AND (Scheme1='' OR Scheme2='' OR Scheme3='' OR Scheme4='NDS')",$con); $rowjsy=mysql_num_rows($sqljsy); if($rowjsy>0){ ?>
<script type="text/javascript" language="javascript">
function OpenOpin(ei,ci)
{              
 var win=window.open("OpeninionForm2jsy.php?ss=2&rt=34&eei=345&frm=true&sts=fals&cont=true&value=fright&ei="+ei+"&tt=434&pp=345&ci="+ci+"&vv=123&pass=false&userright=false&chk=formate&assign=okrr=%343%ff&chk2=ok2","OForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
 var timer = setInterval( function() { if(win.closed){ clearInterval(timer);  window.location="Profile.php?mnt=89we&p=345&ok=tt&r=101&prp=false_res&oo=4e&p=g&ok=trt&rtr=002200&upt=12"; } }, 1000);
}
</script> 
<tr><td>&nbsp;</td></tr>
<tr>
 <td align="center" style="font-size:14px;font-family:Times New Roman; background-color:#FFFF53;width:50%;">
  
<legend class="bgc" style="color:#fff;padding-top:5px;padding-bottom:5px;border-top-left-radius:10px; border-top-right-radius:10px;vertical-align:middle;"><span style="font-size:20px;font-weight:bold;text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;">&nbsp;Government Social Security Schemes&nbsp; </span><span style="cursor:pointer;color:#0033CC;font-size:16px;" onClick="OpenOpin(<?php echo $EmployeeId.','.$CompanyId; ?>)"><u>Click</u></span></legend>
 
  
 </td>
</tr>  
 
<?php //} ?>
   
   
   
</table>
<?php //*****************************************Profile Close****************************************************?> 
				 </td>
				 
			  </tr>
			 
			  <tr>
			     <td>&nbsp;</td>
			     <td align="Right">
				   <table border="0" width="450">
		             <tr>
		              <td align="right"></td>
                      <td align="right" style="width:70px;"></td>
		      </tr>
			</table>
           </td>
			  </tr>
	        </table>
			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
	  </td>
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

