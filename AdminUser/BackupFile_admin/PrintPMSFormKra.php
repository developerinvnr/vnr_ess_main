<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}
//****************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
.recCls{font-family:Georgia; font-size:12px;}.All_500{font-size:11px; height:20px; width:500px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
window.print(); window.close();
</Script>
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
   	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:95%;">
	<tr>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">KRA List &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>			
				   </td>                           			 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>					 					 
<?php 
if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }
  else{$name2='All Department';}
}
?>

<tr>
 <td>
   <table border="1" width="1350">
     <tr> 
  <td colspan="<?php if($_REQUEST['a']==0){echo 7;}else{echo 11;} ?>" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;KRA List <?php echo $name; ?> : &nbsp;&nbsp;(&nbsp;<?php echo $name2; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
<a href="#" onClick="PrintScore(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Print</a>&nbsp;&nbsp;<a href="#" onClick="ExportScore(<?php echo $_REQUEST['value']; ?>,<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	    <td>&nbsp;</td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
<?php if($_REQUEST['a']==1){ ?>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>Designation</b></td>	
<?php } ?>
		<td align="center" style="color:#FFFFFF;" class="All_450"><b>KRA</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_500"><b>Description</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_100"><b>Measure</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_100"><b>Unit</b></td>	
  	</tr>
<?php 
if($_REQUEST['ee']=='Dept' AND $_REQUEST['a']==0)
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("SELECT * from hrm_pms_kra WHERE (KRAStatus='A' OR KRAStatus='R') AND CompanyId=".$_REQUEST['c']." AND YearId=".$_REQUEST['YI'], $con); }
  else{ $sql=mysql_query("SELECT * from hrm_pms_kra WHERE (KRAStatus='A' OR KRAStatus='R') AND CompanyId=".$_REQUEST['c']." AND YearId=".$_REQUEST['YI']." AND DepartmentId=".$_REQUEST['value'], $con); }
}
if($_REQUEST['ee']=='Dept' AND $_REQUEST['a']==1)
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("SELECT EmpCode,Fname,Sname,Lname,DesigId,hrm_employee_general.DepartmentId,KRA,KRA_Description,Measure,Unit,Weightage,Target FROM hrm_pms_kra INNER JOIN hrm_employee ON hrm_pms_kra.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_pms_kra.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_pms_kra.YearId=".$_REQUEST['YI']."  AND hrm_pms_kra.CompanyId=".$_REQUEST['c']." AND (hrm_pms_kra.KRAStatus='A' OR hrm_pms_kra.KRAStatus='R') AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee.EmpCode<=11000 order by hrm_employee.EmpCode ASC, hrm_pms_kra.KRAId ASC", $con); }
  else{ $sql=mysql_query("SELECT EmpCode,Fname,Sname,Lname,DesigId,hrm_employee_general.DepartmentId,KRA,KRA_Description,Measure,Unit,Weightage,Target FROM hrm_pms_kra INNER JOIN hrm_employee ON hrm_pms_kra.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_pms_kra.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_pms_kra.DepartmentId=".$_REQUEST['value']." AND hrm_pms_kra.YearId=".$_REQUEST['YI']."  AND hrm_pms_kra.CompanyId=".$_REQUEST['c']." AND (hrm_pms_kra.KRAStatus='A' OR hrm_pms_kra.KRAStatus='R') AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee.EmpCode<=11000 order by hrm_employee.EmpCode ASC, hrm_pms_kra.KRAId ASC", $con); }
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 if($_REQUEST['a']==1){
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
 //$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);
 }
?>	   
	 <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
	    <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td align="center" class="recCls" valign="top"><?php echo $Sno; ?></td>
<?php if($_REQUEST['a']==1){?>
		<td align="center" class="recCls" valign="top"><?php echo $res['EmpCode']; ?></td>
		<td class="recCls" valign="top"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
		<td class="recCls" valign="top"><?php echo $resDept['DepartmentCode']; ?></td>
		<td class="recCls" valign="top"><?php echo $resDesig['DesigName']; ?></td>	
<?php } ?>		
		<td class="recCls" valign="top"><?php echo $res['KRA']; ?></td>	
		<td class="recCls" valign="top"><?php echo $res['KRA_Description']; ?></td>
		<td class="recCls" valign="top"><?php echo $res['Measure']; ?></td>		
		<td class="recCls" valign="top"><?php echo $res['Unit']; ?></td>		
	 </tr>
	 <?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>