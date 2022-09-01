<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}
if($CompanyId==1 OR $CompanyId==2){$YYear=$Y;}elseif($CompanyId==3){$YYear=$Y2;}
//****************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center; background-color:#7a6189;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdr{ font-family:Times New Roman;font-size:12px;text-align:right; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:400px;overflow-y:auto;width:auto;}
.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}.recCls{font-family:Georgia; font-size:12px;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height': '400px' }); })</script>
<Script type="text/javascript" language="javascript">
function SelectYear(v){window.location='AppsalPmseHodIncDept.php?YI='+v;}
function SelectEInc(v,yi,e)
{ if(e=='d' && document.getElementById("Dept").checked==true)
  {var ee='Dept'; document.getElementById("Hod").checked=false; window.location='AppsalPmseHodIncDept.php?action=EmpIncOal&ee='+ee+'&value='+v+'&YI='+yi;}
  else if(e=='h' && document.getElementById("Hod").checked==true)
  {var ee='Hod'; document.getElementById("Dept").checked=false; window.location='AppsalPmseHodIncDept.php?action=EmpIncOal&ee='+ee+'&value='+v+'&YI='+yi;} 
  else if(document.getElementById("Dept").checked==false && document.getElementById("Hod").checked==false){window.location='AppsalPmseHodIncDept.php?YI='+yi;} 
}
    
function PrintEmpIncOal(yi,ee)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
  window.open("PrintPMSIncOal.php?action=Score&value=v&c="+ComId+"&YI="+yi+"&ee="+ee,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=50,height=50");
 }

function ExportEmpIncOal(yi,ee)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;   
  window.open("ExportPmsIncOal.php?action=IncoalExport&value=v&c="+ComId+"&YI="+yi+"&ee="+ee,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
 
function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }

  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

//    
</Script>
</head>
<body class="body" bgcolor="">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //***************************************************************************?>
<?php //**************START*****START*****START******START******START*********************************?>
<?php //*********************************************************************************?>
<table border="0" style="margin-top:0px;width:100%;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true AND ($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1)) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">HOD Overall Increment &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>
				    <table border="0">
                    <tr>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
<td class="td1" style="font-size:14px;width:120px;font-family:Times New Roman;" ><select class="tdsel" style="background-color:#DDFFBB;width:120px;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['YI']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>

<td class="td1" style="font-size:12px;" align="center"><input type="checkbox" id="Dept" <?php if($_REQUEST['ee']=='Dept'){ echo 'checked'; } ?> onClick="SelectEInc(this.value,<?php echo $_REQUEST['YI']; ?>,'d')" />&nbsp;Department Wise</td>
<td class="td1" style="font-size:12px;" align="center"><input type="checkbox" id="Hod" <?php if($_REQUEST['ee']=='Hod'){ echo 'checked'; } ?> onClick="SelectEInc(this.value,<?php echo $_REQUEST['YI']; ?>,'h')" />&nbsp;HOD Wise</td>
                     </tr>
				   </table>					
				   </td>                           
<?php } ?>					 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //----------------Display Record------------------------------------- ?>
<?php if($_REQUEST['action']=='EmpIncOal') { ?>
<?php 
if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
}
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD Wise';
}
?>

<tr>
 <td>
   <table border="1" id="table1" cellspacing="0" style="width:1100px;">
   <div class="thead">
	 <thead>
     <tr>
  <td colspan="14" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;HOD Overall Increment : &nbsp;&nbsp;(&nbsp;<?php echo $name.'-'.$PRD; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
<a href="#" onClick="ExportEmpIncOal(<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	  
	  <?php /*?><a href="#" onClick="PrintEmpIncOal(<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Print</a>&nbsp;&nbsp;<?php */?>
	  
	 </tr>
	 <tr bgcolor="#7a6189">
	    <td style="width:30px;">&nbsp;</td>
		<td class="th" style="width:50px;">SNo</td>
<?php if($_REQUEST['ee']=='Dept'){?><td class="th" style="width:200px;">DEPARTMENT</td><?php } ?>
<?php if($_REQUEST['ee']=='Hod'){?><td class="th" style="width:200px;">HOD</td><?php } ?>
        <td class="th" style="width:50px;">NOE</td>
		<td class="th" style="width:100px;">PREV. GROSS</td>
		<td class="th" style="width:50px;">PIS</td>
		<td class="th" style="width:50px;">% PIS</td>	
		<td class="th" style="width:100px;">PSC</td>	
		<td class="th" style="width:50px;">% PSC</td>
		<td class="th" style="width:100px;">TISPM</td>
		<td class="th" style="width:50px;">% TISPM</td>
		<td class="th" style="width:100px;">TPGSPM</td>
		
		<?php /*
		
		<td class="th" style="width:100px;">Inc</td>	
		<td class="th" style="width:50px;">% Inc</td>
		
		*/ ?>
		
	</tr>
	</thead>
	</div>
<?php 
if($_REQUEST['ee']=='Dept')
{  
  $sql=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, DepartmentId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0 group by DepartmentId", $con); 
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0 group by HOD_EmployeeID", $con); 
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 //$TotEGross=$res['E_GROSS']+$res['EINC_GROSS']; $TotHIS=$res['H_IS']+$res['H_Inc']; $TotHSC=$res['H_SC'];  
 //$Diff=$res['H_IS']-$res['E_GROSS']; $TotHInC=$Diff+$res['H_SC']; $TotHMonthGS=$TotHIS+$TotHSC;
 //$One=($TotEGross*1)/100; $ISPer=$Diff/$One; $SCPer=$TotHSC/$One; $TotIncPer=$TotHInC/$One;

 //$TotEGross=$res['E_GROSS']+$res['EINC_GROSS']; $TotHIS=$res['H_IS']; $TotHSC=$res['H_SC']+$res['H_Inc'];  
 //$Diff=$res['H_IS']-$TotEGross; $TotHInC=$Diff+$res['H_SC']+$res['H_Inc']; $TotHMonthGS=$TotHIS+$TotHSC;
 //$One=($TotEGross*1)/100; $ISPer=$Diff/$One; $SCPer=$TotHSC/$One; $TotIncPer=$TotHInC/$One;
 
 $TotEGross=$res['E_GROSS']+$res['EINC_GROSS']; $TotHIS=$res['H_IS']+$res['H_Inc']; $TotHSC=$res['H_SC'];
 $Diff=$TotHIS-$TotEGross; $TotHInC=$Diff+$res['H_SC']; $TotHMonthGS=$TotHIS+$res['H_SC'];
 $One=($TotEGross*1)/100; 
 if($One>0)
 {
 $TotIncPer=$TotHInC/$One;
 $ISPer=$Diff/$One; $SCPer=$res['H_SC']/$One; $INCPer=$res['H_Inc']/$One; 
 }
?>	   
<div class="tbody">
	 <tbody>
	 <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
	    <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td class="tdc"><?php echo $Sno; ?></td>
<?php if($_REQUEST['ee']=='Dept'){ $sqlE=mysql_query("select * from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".date($FD.'-06-30')."' AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $rowNOE=mysql_num_rows($sqlE); $sD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $rD=mysql_fetch_assoc($sD); } ?>
<?php if($_REQUEST['ee']=='Hod'){ $sqlE=mysql_query("select * from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".date($FD.'-06-30')."' AND hrm_employee_pms.HOD_EmployeeID=".$res['HOD_EmployeeID']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $rowNOE=mysql_num_rows($sqlE); $sH=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $rH=mysql_fetch_assoc($sH); } ?>			
<?php if($_REQUEST['ee']=='Dept'){ ?><td class="tdl">&nbsp;<?php echo $rD['DepartmentName']; ?></td><?php } ?>
<?php if($_REQUEST['ee']=='Hod'){?>	<td class="tdl">&nbsp;<?php echo $rH['Fname'].' '.$rH['Sname'].' '.$rH['Lname'] ?></td><?php } ?>
        <td class="tdc"><?php echo $rowNOE; ?>&nbsp;</td>
		<td class="tdr"><?php echo $TotEGross; ?>&nbsp;</td>
		<td class="tdr"><?php echo $TotHIS; ?>&nbsp;</td>
		<td class="tdc"><?php echo number_format($ISPer, 2, '.', ''); ?></td>
	    <td class="tdr"><?php echo $TotHSC; ?>&nbsp;</td>
		<td class="tdc"><?php echo number_format($SCPer, 2, '.', ''); ?></td>
        <td class="tdr"><?php echo $TotHInC; ?>&nbsp;</td> 		
		<td class="tdc"><?php echo number_format($TotIncPer, 2, '.', ''); ?></td>
		<td class="tdr"><?php echo $TotHMonthGS; ?>&nbsp;</td> 
		<?php /*
		<td class="tdr"><?php echo $res['H_Inc']; ?>&nbsp;</td>
		<td class="tdc"><?php echo number_format($INCPer, 2, '.', ''); ?></td>
		 */ ?>
	 </tr>
	 </tbody>
	 </div>
	 <?php $Sno++; } ?>
<?php 
if($_REQUEST['ee']=='Dept')
{  
  $sqlT=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, DepartmentId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); 
}
elseif($_REQUEST['ee']=='Hod')
{ $sqlT=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); 
}
 while($resT=mysql_fetch_array($sqlT)){ 
 //$TotEGross=$resT['E_GROSS']+$resT['EINC_GROSS']; $TotHIS=$resT['H_IS']+$resT['H_Inc']; $TotHSC=$resT['H_SC'];  
 //$Diff=$resT['H_IS']-$resT['E_GROSS']; $TotHInC=$Diff+$resT['H_SC']; $TotHMonthGS=$TotHIS+$TotHSC;
 //$One=($TotEGross*1)/100; $ISPer=$Diff/$One; $SCPer=$TotHSC/$One; $TotIncPer=$TotHInC/$One; }

 //$TotEGross=$resT['E_GROSS']+$resT['EINC_GROSS']; $TotHIS=$resT['H_IS']; $TotHSC=$resT['H_SC']+$resT['H_Inc']; 
 //$Diff=$resT['H_IS']-$TotEGross; $TotHInC=$Diff+$resT['H_SC']+$resT['H_Inc']; $TotHMonthGS=$TotHIS+$TotHSC;
 //$One=($TotEGross*1)/100; $ISPer=$Diff/$One; $SCPer=$TotHSC/$One; $TotIncPer=$TotHInC/$One; }
 
 $TotEGross=$resT['E_GROSS']+$resT['EINC_GROSS']; $TotHIS=$resT['H_IS']+$resT['H_Inc']; $TotHSC=$resT['H_SC'];
 $Diff=$TotHIS-$TotEGross; $TotHInC=$Diff+$resT['H_SC']; $TotHMonthGS=$TotHIS+$resT['H_SC'];
 $One=($TotEGross*1)/100; $TotIncPer=$TotHInC/$One;
 $ISPer=$Diff/$One; $SCPer=$resT['H_SC']/$One; $INCPer=$resT['H_Inc']/$One;  }

?>	 
     <div class="tbody">
	 <tbody>
	 <tr style="height:20px; background-color:#FF6CB6;"align="middle">
	  <td colspan="3" class="tdr">Total :&nbsp;&nbsp;</td>
<?php $sqlTE=mysql_query("select * from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".date($FD.'-06-30')."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $rowTNOE=mysql_num_rows($sqlTE); ?>
      <td class="tdc" style="background-color:#97FF97;"><?php echo $rowTNOE; ?></td>	  
	  <td class="tdr" style="background-color:#97FF97;"><?php echo $TotEGross; ?></td>
      <td class="tdr" style="background-color:#97FF97;"><?php echo $TotHIS; ?></td>
	  <td class="tdc" style="background-color:#97FF97;"><?php echo number_format($ISPer, 2, '.', ''); ?></td>
      <td class="tdr" style="background-color:#97FF97;"><?php echo $TotHSC; ?></td>
	  <td class="tdc" style="background-color:#97FF97;"><?php echo number_format($SCPer, 2, '.', ''); ?></td>
      <td class="tdr" style="background-color:#97FF97;"><?php echo $TotHInC; ?></td>
	  <td class="tdc" style="background-color:#97FF97;"><?php echo number_format($TotIncPer, 2, '.', ''); ?></td>
      <td class="tdr" style="background-color:#97FF97;"><?php echo $TotHMonthGS; ?></td>
    </tr>
	</tbody>
	</div>
   </table>
 </td>
</tr> 
<?php } ?>		
<?php //-------------------------------------------------------------------------------------------------------- ?>












<?php //----------------Display Record------------------------------------- ?>
<?php if($_REQUEST['action']=='EmpIncOal') { ?>
<?php 
if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
}
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD Wise';
}
?>

<tr>
 <td>
   <table border="1" id="table1" cellspacing="0" style="width:1100px;">
   <div class="thead">
	 <thead>
     <tr>
  <td colspan="14" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;HOD Overall Increment : &nbsp;&nbsp;(&nbsp;<?php echo $name.'-'.$PRD; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
Without Management
	  </td>
	  
	  <?php /*?><a href="#" onClick="PrintEmpIncOal(<?php echo $_REQUEST['YI']; ?>,'<?php echo $_REQUEST['ee']; ?>')" style="color:#F9F900; font-size:12px;">Print</a>&nbsp;&nbsp;<?php */?>
	  
	 </tr>
	 <tr bgcolor="#7a6189">
	    <td style="width:30px;">&nbsp;</td>
		<td class="th" style="width:50px;">SNo</td>
<?php if($_REQUEST['ee']=='Dept'){?><td class="th" style="width:200px;">DEPARTMENT</td><?php } ?>
<?php if($_REQUEST['ee']=='Hod'){?><td class="th" style="width:200px;">HOD</td><?php } ?>
        <td class="th" style="width:50px;">NOE</td>
		<td class="th" style="width:100px;">PREV. GROSS</td>
		<td class="th" style="width:50px;">PIS</td>
		<td class="th" style="width:50px;">% PIS</td>	
		<td class="th" style="width:100px;">PSC</td>	
		<td class="th" style="width:50px;">% PSC</td>
		<td class="th" style="width:100px;">TISPM</td>
		<td class="th" style="width:50px;">% TISPM</td>
		<td class="th" style="width:100px;">TPGSPM</td>
		
		<?php /*
		
		<td class="th" style="width:100px;">Inc</td>	
		<td class="th" style="width:50px;">% Inc</td>
		
		*/ ?>
		
	</tr>
	</thead>
	</div>
<?php 
if($_REQUEST['ee']=='Dept')
{  
  $sql=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, DepartmentId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.EmployeeID!=6 AND hrm_employee_pms.EmployeeID!=7 AND hrm_employee_pms.EmployeeID!=51 AND hrm_employee_pms.EmployeeID!=223 AND hrm_employee_pms.EmployeeID!=224 AND hrm_employee_pms.EmployeeID!=461 AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0 group by DepartmentId", $con); 
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.EmployeeID!=6 AND hrm_employee_pms.EmployeeID!=7 AND hrm_employee_pms.EmployeeID!=51 AND hrm_employee_pms.EmployeeID!=223 AND hrm_employee_pms.EmployeeID!=224 AND hrm_employee_pms.EmployeeID!=461 AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0 group by HOD_EmployeeID", $con); 
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 //$TotEGross=$res['E_GROSS']+$res['EINC_GROSS']; $TotHIS=$res['H_IS']+$res['H_Inc']; $TotHSC=$res['H_SC'];  
 //$Diff=$res['H_IS']-$res['E_GROSS']; $TotHInC=$Diff+$res['H_SC']; $TotHMonthGS=$TotHIS+$TotHSC;
 //$One=($TotEGross*1)/100; $ISPer=$Diff/$One; $SCPer=$TotHSC/$One; $TotIncPer=$TotHInC/$One;

 //$TotEGross=$res['E_GROSS']+$res['EINC_GROSS']; $TotHIS=$res['H_IS']; $TotHSC=$res['H_SC']+$res['H_Inc'];  
 //$Diff=$res['H_IS']-$TotEGross; $TotHInC=$Diff+$res['H_SC']+$res['H_Inc']; $TotHMonthGS=$TotHIS+$TotHSC;
 //$One=($TotEGross*1)/100; $ISPer=$Diff/$One; $SCPer=$TotHSC/$One; $TotIncPer=$TotHInC/$One;
 
 $TotEGross=$res['E_GROSS']+$res['EINC_GROSS']; $TotHIS=$res['H_IS']+$res['H_Inc']; $TotHSC=$res['H_SC'];
 $Diff=$TotHIS-$TotEGross; $TotHInC=$Diff+$res['H_SC']; $TotHMonthGS=$TotHIS+$res['H_SC'];
 $One=($TotEGross*1)/100; 
 if($One>0)
 {
 $TotIncPer=$TotHInC/$One;
 $ISPer=$Diff/$One; $SCPer=$res['H_SC']/$One; $INCPer=$res['H_Inc']/$One; 
 }
?>	   
<div class="tbody">
	 <tbody>
	 <tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
	    <td class="tdc"><input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" /></td>
		<td class="tdc"><?php echo $Sno; ?></td>
<?php if($_REQUEST['ee']=='Dept'){ $sqlE=mysql_query("select * from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.EmployeeID!=6 AND hrm_employee_pms.EmployeeID!=7 AND hrm_employee_pms.EmployeeID!=51 AND hrm_employee_pms.EmployeeID!=223 AND hrm_employee_pms.EmployeeID!=224 AND hrm_employee_pms.EmployeeID!=461 AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".date($FD.'-06-30')."' AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $rowNOE=mysql_num_rows($sqlE); $sD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $rD=mysql_fetch_assoc($sD); } ?>
<?php if($_REQUEST['ee']=='Hod'){ $sqlE=mysql_query("select * from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.EmployeeID!=6 AND hrm_employee_pms.EmployeeID!=7 AND hrm_employee_pms.EmployeeID!=51 AND hrm_employee_pms.EmployeeID!=223 AND hrm_employee_pms.EmployeeID!=224 AND hrm_employee_pms.EmployeeID!=461 AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".date($FD.'-06-30')."' AND hrm_employee_pms.HOD_EmployeeID=".$res['HOD_EmployeeID']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $rowNOE=mysql_num_rows($sqlE); $sH=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $rH=mysql_fetch_assoc($sH); } ?>			
<?php if($_REQUEST['ee']=='Dept'){ ?><td class="tdl">&nbsp;<?php echo $rD['DepartmentName']; ?></td><?php } ?>
<?php if($_REQUEST['ee']=='Hod'){?>	<td class="tdl">&nbsp;<?php echo $rH['Fname'].' '.$rH['Sname'].' '.$rH['Lname'] ?></td><?php } ?>
        <td class="tdc"><?php echo $rowNOE; ?>&nbsp;</td>
		<td class="tdr"><?php echo $TotEGross; ?>&nbsp;</td>
		<td class="tdr"><?php echo $TotHIS; ?>&nbsp;</td>
		<td class="tdc"><?php echo number_format($ISPer, 2, '.', ''); ?></td>
	    <td class="tdr"><?php echo $TotHSC; ?>&nbsp;</td>
		<td class="tdc"><?php echo number_format($SCPer, 2, '.', ''); ?></td>
        <td class="tdr"><?php echo $TotHInC; ?>&nbsp;</td> 		
		<td class="tdc"><?php echo number_format($TotIncPer, 2, '.', ''); ?></td>
		<td class="tdr"><?php echo $TotHMonthGS; ?>&nbsp;</td> 
		<?php /*
		<td class="tdr"><?php echo $res['H_Inc']; ?>&nbsp;</td>
		<td class="tdc"><?php echo number_format($INCPer, 2, '.', ''); ?></td>
		 */ ?>
	 </tr>
	 </tbody>
	 </div>
	 <?php $Sno++; } ?>
<?php 
if($_REQUEST['ee']=='Dept')
{  
  $sqlT=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, DepartmentId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.EmployeeID!=6 AND hrm_employee_pms.EmployeeID!=7 AND hrm_employee_pms.EmployeeID!=51 AND hrm_employee_pms.EmployeeID!=223 AND hrm_employee_pms.EmployeeID!=224 AND hrm_employee_pms.EmployeeID!=461 AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); 
}
elseif($_REQUEST['ee']=='Hod')
{ $sqlT=mysql_query("select SUM(EmpCurrGrossPM) as E_GROSS, SUM(EmpCurrIncentivePM) as EINC_GROSS, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.EmployeeID!=6 AND hrm_employee_pms.EmployeeID!=7 AND hrm_employee_pms.EmployeeID!=51 AND hrm_employee_pms.EmployeeID!=223 AND hrm_employee_pms.EmployeeID!=224 AND hrm_employee_pms.EmployeeID!=461 AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); 
}
 while($resT=mysql_fetch_array($sqlT)){ 
 //$TotEGross=$resT['E_GROSS']+$resT['EINC_GROSS']; $TotHIS=$resT['H_IS']+$resT['H_Inc']; $TotHSC=$resT['H_SC'];  
 //$Diff=$resT['H_IS']-$resT['E_GROSS']; $TotHInC=$Diff+$resT['H_SC']; $TotHMonthGS=$TotHIS+$TotHSC;
 //$One=($TotEGross*1)/100; $ISPer=$Diff/$One; $SCPer=$TotHSC/$One; $TotIncPer=$TotHInC/$One; }

 //$TotEGross=$resT['E_GROSS']+$resT['EINC_GROSS']; $TotHIS=$resT['H_IS']; $TotHSC=$resT['H_SC']+$resT['H_Inc']; 
 //$Diff=$resT['H_IS']-$TotEGross; $TotHInC=$Diff+$resT['H_SC']+$resT['H_Inc']; $TotHMonthGS=$TotHIS+$TotHSC;
 //$One=($TotEGross*1)/100; $ISPer=$Diff/$One; $SCPer=$TotHSC/$One; $TotIncPer=$TotHInC/$One; }
 
 $TotEGross=$resT['E_GROSS']+$resT['EINC_GROSS']; $TotHIS=$resT['H_IS']+$resT['H_Inc']; $TotHSC=$resT['H_SC'];
 $Diff=$TotHIS-$TotEGross; $TotHInC=$Diff+$resT['H_SC']; $TotHMonthGS=$TotHIS+$resT['H_SC'];
 $One=($TotEGross*1)/100; $TotIncPer=$TotHInC/$One;
 $ISPer=$Diff/$One; $SCPer=$resT['H_SC']/$One; $INCPer=$resT['H_Inc']/$One;  }

?>	 
     <div class="tbody">
	 <tbody>
	 <tr style="height:20px; background-color:#FF6CB6;"align="middle">
	  <td colspan="3" class="tdr">Total :&nbsp;&nbsp;</td>
<?php $sqlTE=mysql_query("select * from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.EmployeeID!=6 AND hrm_employee_pms.EmployeeID!=7 AND hrm_employee_pms.EmployeeID!=51 AND hrm_employee_pms.EmployeeID!=223 AND hrm_employee_pms.EmployeeID!=224 AND hrm_employee_pms.EmployeeID!=461 AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".date($FD.'-06-30')."' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0", $con); $rowTNOE=mysql_num_rows($sqlTE); ?>
      <td class="tdc" style="background-color:#97FF97;"><?php echo $rowTNOE; ?></td>	  
	  <td class="tdr" style="background-color:#97FF97;"><?php echo $TotEGross; ?></td>
      <td class="tdr" style="background-color:#97FF97;"><?php echo $TotHIS; ?></td>
	  <td class="tdc" style="background-color:#97FF97;"><?php echo number_format($ISPer, 2, '.', ''); ?></td>
      <td class="tdr" style="background-color:#97FF97;"><?php echo $TotHSC; ?></td>
	  <td class="tdc" style="background-color:#97FF97;"><?php echo number_format($SCPer, 2, '.', ''); ?></td>
      <td class="tdr" style="background-color:#97FF97;"><?php echo $TotHInC; ?></td>
	  <td class="tdc" style="background-color:#97FF97;"><?php echo number_format($TotIncPer, 2, '.', ''); ?></td>
      <td class="tdr" style="background-color:#97FF97;"><?php echo $TotHMonthGS; ?></td>
    </tr>
	</tbody>
	</div>
   </table>
 </td>
</tr> 
<?php } ?>		
<?php //-------------------------------------------------------------------------------------------------------- ?>

























	
	</tr>
</table>
<?php //************************************************************************?>
<?php //*************END*****END*****END******END******END******************************?>
<?php //***************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>