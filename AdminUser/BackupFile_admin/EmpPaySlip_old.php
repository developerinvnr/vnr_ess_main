prin<?php require_once('config/config.php'); ?>
<html>
<head>
<title>Employee PaySlip</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">
function printp(EI,M,Y,YI,CI)
{ window.location="PrintPaySlip.php?action=Print&EI="+EI+"&m="+M+"&Y="+Y+"&YI="+YI+"&CI="+CI; }
</Script>
</head>
<body class="body">
&nbsp;&nbsp;<a href="#" onClick="printp(<?php echo $_REQUEST['E'].','.$_REQUEST['M'].','.$_REQUEST['Y'].','.$_REQUEST['YI'].','.$_REQUEST['C'] ?>)">Print</a>
<center>
<?php //*********************************************************************************************** ?>	   
<?php 

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y")){ $PayTable='hrm_employee_monthlypayslip'; $LeaveTable='hrm_employee_monthlyleave_balance'; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['M']==12)
{ $PayTable='hrm_employee_monthlypayslip'; $LeaveTable='hrm_employee_monthlyleave_balance'; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['M']<12)
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y']; $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; }
else
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y']; $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y'];  }

$sqlE=mysql_query("select Fname,Sname,Lname,EmpCode,DesigId,DepartmentId,GradeId,Gender,PanNo,CostCenter,AccountNo,BankName,PfAccountNo,HqId,DOB,DateJoining,DR,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$_REQUEST['E'], $con); $resE=mysql_fetch_assoc($sqlE); 
//$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
//$sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
//$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resE['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG);
$SqlCC=mysql_query("select StateName from hrm_state where StateId=".$resE['CostCenter'], $con); $resCC=mysql_fetch_assoc($SqlCC);
$sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$resE['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  
$Ename=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; $LEC=strlen($resE['EmpCode']); 
if($LEC==1){$EC='000'.$resE['EmpCode'];} if($LEC==2){$EC='00'.$resE['EmpCode'];} if($LEC==3){$EC='0'.$resE['EmpCode'];} if($LEC>=4){$EC=$resE['EmpCode'];}


$SqlPay=mysql_query("SELECT * FROM ".$PayTable." WHERE EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND YEAR=".$_REQUEST['Y']."", $con); 
$ResPay=mysql_fetch_assoc($SqlPay); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResPay['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$ResPay['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResPay['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG);
/*
$SqlBas=mysql_query("select SUM(Basic)as Bas from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResBas=mysql_fetch_array($SqlBas);
$SqlSti=mysql_query("select SUM(Stipend)as Sti from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResSti=mysql_fetch_array($SqlSti);
$SqlHra=mysql_query("select SUM(Hra)as Hra from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResHra=mysql_fetch_array($SqlHra);
$SqlCon=mysql_query("select SUM(Convance)as Con from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResCon=mysql_fetch_array($SqlCon);
$SqlSpe=mysql_query("select SUM(Special)as Spe from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResSpe=mysql_fetch_array($SqlSpe);
$SqlPf=mysql_query("select SUM(Tot_Pf_Employee)as Pf from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResPf=mysql_fetch_array($SqlPf);
$SqlGross=mysql_query("select SUM(Tot_Gross)as Gross from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResGross=mysql_fetch_array($SqlGross);
$SqlDed=mysql_query("select SUM(Tot_Deduct)as Ded from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResDed=mysql_fetch_array($SqlDed);
$SqlTds=mysql_query("select SUM(TDS)as Tds from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResTds=mysql_fetch_array($SqlTds);
$SqlNet=mysql_query("select SUM(Tot_NetAmount)as Net from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResNet=mysql_fetch_array($SqlNet);
$SqlBon=mysql_query("select SUM(Bonus)as Bon from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResBon=mysql_fetch_array($SqlBon);
$SqlDa=mysql_query("select SUM(DA)as Da from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResDa=mysql_fetch_array($SqlDa);
$SqlArr=mysql_query("select SUM(Arreares)as Arr from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResArr=mysql_fetch_array($SqlArr);
$SqlLeEn=mysql_query("select SUM(LeaveEncash)as LeEn from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResLeEn=mysql_fetch_array($SqlLeEn);
$SqlInc=mysql_query("select SUM(Incentive)as Inc from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResInc=mysql_fetch_array($SqlInc);
$SqlVarA=mysql_query("select SUM(VariableAdjustment)as VarA from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResVarA=mysql_fetch_array($SqlVarA);
$SqlPerP=mysql_query("select SUM(PerformancePay)as PerP from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResPerP=mysql_fetch_array($SqlPerP);
$SqlCcA=mysql_query("select SUM(CCA)as CcA from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResCcA=mysql_fetch_array($SqlCcA);
$SqlRaS=mysql_query("select SUM(RA)as RaS from hrm_employee_monthlypayslip where PaySlipYearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['E']." AND Month<=".$_REQUEST['M']); $ResRaS=mysql_fetch_array($SqlRaS);
*/

if($_REQUEST['M']==1){$SelM='January';} if($_REQUEST['M']==2){$SelM='February';} if($_REQUEST['M']==3){$SelM='March';}if($_REQUEST['M']==4){$SelM='April';} 
if($_REQUEST['M']==5){$SelM='May';} if($_REQUEST['M']==6){$SelM='June';} if($_REQUEST['M']==7){$SelM='July';} if($_REQUEST['M']==8){$SelM='August';} 
if($_REQUEST['M']==9){$SelM='September';} if($_REQUEST['M']==10){$SelM='October';} if($_REQUEST['M']==11){$SelM='November';} if($_REQUEST['M']==12){$SelM='December';}

?> 
 <table border="1" bgcolor="#FFFFFF">
 <tr>
 <td style="width:800px;" align="center" valign="top">
  <table style="width:800px;" border="0" bgcolor="#FFFFFF" align="center">
<?php $SqlCom=mysql_query("select * from hrm_company_basic where CompanyId=".$_REQUEST['C'], $con); $resCom=mysql_fetch_assoc($SqlCom); 
      $SqlS=mysql_query("select StateName from hrm_state where StateId=".$resCom['StateId'], $con); $resS=mysql_fetch_assoc($SqlS);  
?>   
<tr>
 <td style="width:100px;" align="center" valign="middle">
  <table style="width:100px;">
   <tr><td align="center" style="width:100px;"><img src="../images/VNRLogo3.png" border="0" style="width:90px;height:100px; "/></td></tr>
  </table>
 </td>
 <td style="width:580px;" align="center">
  <table style="width:580px;">
   <tr><td align="center" style='font-family:Times New Roman;width:600px; font-size:14px; color:#005500;'><b><?php echo strtoupper($resCom['CompanyName']); ?></b></td></tr>
   <tr><td align="center" style='font-family:Times New Roman;width:600px; font-size:14px;'><b><?php echo $resCom['AdminOffice_Address']; ?></b></td></tr>
   <tr><td align="center" style='font-family:Times New Roman;width:600px; font-size:14px;'>
   <b><?php echo $resCom['AdminOffice'].' ('.$resCom['PinNo'].') ['.$resS['StateName'].']'; ?></b></td></tr>
   <tr><td align="center" style='font-family:Times New Roman;width:600px; font-size:14px;'>
   <b>PAYSLIP FOR THE MONTH OF <font color="#930000"><u><?php echo strtoupper($SelM).'-'.$_REQUEST['Y']; ?></u></b></font></td></tr>
  </table>
 </td>
 <td style="width:100px;" align="center" valign="middle">
  <table style="width:100px;">
   <tr><td align="center" style="width:100px;"><?php /*<img src="../images/VNRLogo3.png" border="0" style="width:78px; height:100px; "/> */ ?></td></tr>
  </table>
 </td>
<tr>
  </table>
 </td>
 </tr>
 
 <tr>
  <td>
  <table style="width:800px;" border="1" cellspacing="1">
  <tr>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7">&nbsp;EC</td>
  <td align="" style='font-family:Times New Roman; width:150px;font-size:13px;'>&nbsp;<?php echo $EC; ?></td>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7">&nbsp;NAME</td>
  <td align="" colspan="3" style='font-family:Times New Roman; width:410px;font-size:13px;'>&nbsp;<?php echo $Ename; ?></td>
  </tr>
  <tr>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7" valign="top">&nbsp;DEPARTMENT</td>
  <td align="" style='font-family:Times New Roman; width:150px;font-size:13px;' valign="top">&nbsp;<?php echo strtoupper($resD['DepartmentName']); ?></td>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7" valign="top">&nbsp;COSTCENTER</td>
  <td align="" style='font-family:Times New Roman; width:190px;font-size:13px;' valign="top">&nbsp;<?php echo strtoupper($resCC['StateName']); ?></td>
  <td align="" style='font-family:Times New Roman; width:100px;font-size:13px;' bgcolor="#D9D1E7" valign="top">&nbsp;GRADE</td>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' valign="top">&nbsp;<?php echo strtoupper($resG['GradeValue']); ?></td>
  </tr>
  <tr>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7" valign="top">&nbsp;HEADQUARTER</td>
  <td align="" style='font-family:Times New Roman; width:150px;font-size:13px;' valign="top">&nbsp;<?php echo strtoupper($resHq['HqName']); ?></td>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7" valign="top">&nbsp;DESIGNATION</td>
  <td align="" style='font-family:Times New Roman; width:190px;font-size:13px;' valign="top">&nbsp;<?php echo strtoupper($resDesig['DesigName']); ?></td>
  <td align="" style='font-family:Times New Roman; width:100px;font-size:13px;' bgcolor="#D9D1E7" valign="top">&nbsp;GENDER</td>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' valign="top">&nbsp;<?php if($resE['Gender']=='M'){echo 'MALE';}else {echo 'FEMALE'; } ?></td>
  </tr>
  <tr>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7">&nbsp;DATE-OF-BIRTH</td>
  <td align="" style='font-family:Times New Roman; width:150px;font-size:14px;'>&nbsp;<?php echo date("d-m-Y", strtotime($resE['DOB'])); ?></td>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7">&nbsp;DATE-OF-JOINING</td>
  <td align="" style='font-family:Times New Roman; width:190px;font-size:14px;'>&nbsp;<?php echo date("d-m-Y", strtotime($resE['DateJoining'])); ?></td>
  <td align="" style='font-family:Times New Roman; width:100px;font-size:13px;' bgcolor="#D9D1E7">&nbsp;PF NO.</td>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:14px;'>&nbsp;<?php echo strtoupper($resE['PfAccountNo']); ?></td>
  </tr>
  <tr>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7">&nbsp;BANK A/C NO.</td>
  <td align="" style='font-family:Times New Roman; width:150px;font-size:14px;'>&nbsp;<?php echo $resE['AccountNo']; ?></td>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7">&nbsp;BANK NAME</td>
  <td align="" style='font-family:Times New Roman; width:190px;font-size:14px;'>&nbsp;<?php echo $resE['BankName']; ?></td>
  <td align="" style='font-family:Times New Roman; width:100px;font-size:13px;' bgcolor="#D9D1E7">&nbsp;PAN NO.</td>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:14px;'>&nbsp;<?php echo $resE['PanNo']; ?></td>
  </tr>
  <tr>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7">&nbsp;TOTAL DAYS</td>
  <td align="" style='font-family:Times New Roman; width:150px;font-size:14px;'>&nbsp;<?php echo $ResPay['TotalDay']; ?></td>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:13px;' bgcolor="#D9D1E7">&nbsp;PAID DAYS</td>
  <td align="" style='font-family:Times New Roman; width:190px;font-size:14px;'>&nbsp;<?php echo $ResPay['PaidDay']; ?></td>
  <td align="" style='font-family:Times New Roman; width:100px;font-size:13px;' bgcolor="#D9D1E7">&nbsp;ABSENT</td>
  <td align="" style='font-family:Times New Roman; width:120px;font-size:14px;'>&nbsp;<?php echo $ResPay['Absent']; ?></td>
  </tr>
  </tr>
  </table>
  </td>
 </tr>
 
 <tr>
  <td>
  <table style="width:800px;" border="1" cellspacing="1">
  <tr bgcolor="#D9D1E7">
  <td align="center" style='font-family:Times New Roman; width:250px;font-size:14px;'><b>Earnings</b></td>
  <td align="center" style='font-family:Times New Roman; width:100px;font-size:14px;'><b>Amount</b></td>
  <td align="center" style='font-family:Times New Roman; width:250px;font-size:14px;'><b>Deductions</b></td>
  <td align="center" style='font-family:Times New Roman; width:100px;font-size:14px;'><b>Amount</b></td>
  </tr>
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;BASIC</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Basic']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;PROVIDENT FUND</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['EPF_Employee']); ?>&nbsp;</td>
  </tr>   
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;CONVEYANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Convance']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;<?php if($ResPay['TDS']>0 OR $ResTds['Tds']>0){ ?>TDS<?php } ?></td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php if($ResPay['TDS']>0 OR $ResTds['Tds']>0){echo intval($ResPay['TDS']);} ?>&nbsp;</td>
  </tr>
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;HOUSE RENT ALLOWANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Hra']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;<?php if($ResPay['ESCI_Employee']>0) { ?>ESIC<?php } ?></td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php if($ResPay['ESCI_Employee']>0){echo intval($ResPay['ESCI_Employee']); } ?>&nbsp;</td>
  </tr>
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;SPECIAL ALLOWANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Special']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;<?php if($ResPay['Arr_Pf']>0){ ?>ARREAR PF<?php } ?></td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php if($ResPay['Arr_Pf']>0){echo intval($ResPay['Arr_Pf']); } ?>&nbsp;</td> 
  </tr>   
<?php if($ResPay['Bonus']>0 OR $ResPay['Arr_Esic']>0){ ?>   
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;<?php if($ResPay['Bonus']>0 OR $ResBon['Bon']>0){ ?>BONUS<?php } ?></td>
<td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php if($ResPay['Bonus']>0 OR $ResBon['Bon']>0){ echo intval($ResPay['Bonus']); }?>&nbsp;</td> 
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp; <?php if($ResPay['Arr_Esic']>0) { ?>ARREAR ESIC<?php } ?></td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php if($ResPay['Arr_Esic']>0) { echo intval($ResPay['Arr_Esic']); } ?>&nbsp;</td>
  </tr>
<?php } if($ResPay['DA']>0 OR $ResDa['Da']>0 OR $ResPay['VolContrib']>0){ ?>  
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;<?php if($ResPay['DA']>0 OR $ResDa['Da']>0) { ?>DA<?php } ?></td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php if($ResPay['DA']>0 OR $ResDa['Da']>0){ echo intval($ResPay['DA']); } ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;<?php if($ResPay['VolContrib']>0){ ?>VOLUNTARY CONTRIBUTION<?php } ?></td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php if($ResPay['VolContrib']>0){ echo intval($ResPay['VolContrib']);} ?>&nbsp;</td>  
  </tr>
<?php } if($ResPay['LeaveEncash']>0 OR $ResLeEn['LeEn']>0 OR $ResPay['DeductAdjmt']>0) { ?>  
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;<?php if($ResPay['LeaveEncash']>0 OR $ResLeEn['LeEn']>0){ ?>LEAVE ENCASH<?php } ?></td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php if($ResPay['LeaveEncash']>0 OR $ResLeEn['LeEn']>0){echo intval($ResPay['LeaveEncash']); } ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;<?php if($ResPay['DeductAdjmt']>0){ ?>DEDUCTION ADJUSTMENT<?php } ?></td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php if($ResPay['DeductAdjmt']>0){ echo intval($ResPay['DeductAdjmt']); } ?>&nbsp;</td>
  </tr>
<?php } if($ResPay['Arreares']>0 OR $ResArr['Arr']>0 OR $ResPay['RecConAllow']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;ARREARS</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Arreares']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;<?php if($ResPay['RecConAllow']>0){ ?>RECOVERY CONVENYANCE ALLOWANCE<?php } ?></td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php if($ResPay['RecConAllow']>0){ echo intval($ResPay['RecConAllow']); } ?>&nbsp;</td>
  </tr>
<?php } if($ResPay['Incentive']>0 OR $ResInc['Inc']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;INCENTIVE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Incentive']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['TA']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;TRANSPORT ALLOWANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['TA']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['VariableAdjustment']>0 OR $ResVarA['VarA']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;VARIABLE ADJUSTMENT</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['VariableAdjustment']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['PerformancePay']>0 OR $ResPerP['PerP']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;PERFORMANCE PAY</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['PerformancePay']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['CCA']>0 OR $ResPerP['CcA']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;CITY COMPENSATORY ALLOWANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['CCA']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['RA']>0 OR $ResPerP['RaS']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;RELOCATION ALLOWANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['RA']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['VarRemburmnt']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;VARIABLE REIMBURSEMENT</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['VarRemburmnt']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['Car_Allowance']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;CAR ALLOWANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Car_Allowance']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr> 
<?php } if($ResPay['Car_Allowance_Arr']>0) { ?>    
  <tr>
  <td style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;ARREAR FOR CAR ALLOWANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Car_Allowance_Arr']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>   
<?php } if($ResPay['Arr_Basic']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;ARREAR FOR BASIC</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Arr_Basic']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['Arr_Hra']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;ARREAR FOR HOUSE RENT ALLOWANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Arr_Hra']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['Arr_Spl']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;ARREAR FOR SPECIAL ALLOWANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Arr_Spl']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['Arr_Conv']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;ARREAR FOR CONVEYANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Arr_Conv']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['Arr_LvEnCash']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;ARREAR FOR LV-ENCASH</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['Arr_LvEnCash']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['YCea']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;CHILD EDUCATION ALLOWANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['YCea']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['YMr']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;MEDICAL REIMBURSEMENT</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['YMr']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } if($ResPay['YLta']>0) { ?>    
  <tr>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;LEAVE TRAVEL ALLOWANCE</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><?php echo intval($ResPay['YLta']); ?>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:13px;'>&nbsp;</td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'>&nbsp;</td>
  </tr>
<?php } ?>


<?php 
$TotGross=$ResPay['Tot_Gross']+$ResPay['Bonus']+$ResPay['DA']+$ResPay['Arreares']+$ResPay['LeaveEncash']+$ResPay['Incentive']+$ResPay['VariableAdjustment']+$ResPay['PerformancePay']+$ResPay['CCA']+$ResPay['RA']+$ResPay['Arr_Basic']+$ResPay['Arr_Hra']+$ResPay['Arr_Spl']+$ResPay['Arr_Conv']+$ResPay['YCea']+$ResPay['YMr']+$ResPay['YLta']+$ResPay['Car_Allowance']+$ResPay['Car_Allowance_Arr']+$ResPay['VarRemburmnt']+$ResPay['TA']+$ResPay['Arr_LvEnCash'];
$TotDeduct=$ResPay['TDS']+$ResPay['Tot_Deduct']+$ResPay['Arr_Pf']+$ResPay['VolContrib']+$ResPay['Arr_Esic']+$ResPay['DeductAdjmt']+$ResPay['RecConAllow'];
$TotNetAmount=$TotGross-$TotDeduct; 
$TotAnnGross=$ResGross['Gross']+$ResBon['Bon']+$ResDa['Da']+$ResArr['Arr']+$ResLeEn['LeEn']+$ResInc['Inc']+$ResVarA['VarA']+$ResPerP['PerP']+$ResCcA['CcA']+$ResRaS['RaS'];
$TotAnnDeduct=$ResTds['Tds']+$ResDed['Ded'];
?>  
  <tr bgcolor="#B0FFB0">
  <td align="" style='font-family:Times New Roman; width:200px;font-size:14px;'>&nbsp;<b>Total Earnings :</b></td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><b><?php echo intval($TotGross); ?></b>&nbsp;</td>
  <td align="" style='font-family:Times New Roman; width:200px;font-size:14px;'>&nbsp;<b>Total Deductions :</b></td>
  <td align="right" style='font-family:Times New Roman; width:100px;font-size:14px;'><b><?php echo intval($TotDeduct); ?></b>&nbsp;</td>
  </tr>
  </table>
  </td>
 </tr>
<?php
    function no_to_words($no)
    {
    $words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred &','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
    if($no == 0)
    return ' ';
    else { $novalue=''; $highno=$no; $remainno=0; $value=100;  $value1=1000;  
	while($no>=100) 
	{
     if(($value <= $no) &&($no < $value1)) {
     $novalue=$words["$value"];
     $highno = (int)($no/$value);
     $remainno = $no % $value;
     break;
    }
    $value= $value1;  $value1 = $value * 100;
    }
    if(array_key_exists("$highno",$words))
    return $words["$highno"]." ".$novalue." ".no_to_words($remainno);
    else {
    $unit=$highno%10;
    $ten =(int)($highno/10)*10;
    return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);
    }
    }
    }
	$InWorld=no_to_words($TotNetAmount);
    //echo no_to_words(123);
?>
 <tr>
  <td>
  <table style="width:800px;" border="1" cellspacing="1">
  <tr><td align="" style='font-family:Times New Roman;width:800px;font-size:14px;border:hidden;'>
  <b style="color:#B70000;">Net Pay :</b><b>&nbsp;Rs. <?php echo intval($TotNetAmount).'/-'; ?></b></td></tr>
  <tr><td align="" style='font-family:Times New Roman; width:800px;font-size:14px; border-bottom:hidden; border-left:hidden;border-right:hidden;'>
  <b style="color:#B70000;">In Words :</b><b>&nbsp; <?php echo strtoupper($InWorld).' RUPEES ONLY'; ?></b></td></tr>
  </table>
  </td>
 </tr>
<?php /************************************* Leave **********************************/ ?>
<tr><td style="font-family:Times New Roman; font-size:14px; font-weight:bold; color:#0000CC;" align="right"><b>LEAVE DETAILS</b>
<?php if($_REQUEST['m']==1) { ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php } else { ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php } ?>
</td></tr>
<?php $sqlLV=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND Year='".$_REQUEST['Y']."'", $con); 
      $resLV=mysql_fetch_array($sqlLV); ?>
 <tr>
  <td align="right">
<?php if($_REQUEST['m']==1) { ?>  
 <table style="width:500px;" border="1" cellspacing="1">
 <tr bgcolor="#7a6189">
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" valign="top" align="center"><b>LV</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" valign="top" align="center"><b>Opening</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:70px;" valign="top" align="center"><b>Credit</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:70px;" valign="top" align="center"><b>Total</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:70px;" valign="top" align="center"><b>EnCash</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:70px;" valign="top" align="center"><b>Availed</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:70px;" valign="top" align="center"><b>Balance</b></td>
 </tr>
 <tr>
 <td class="font1" align="center">CL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningCL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['CreditedCL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['TotCL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['EnCashCL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedCL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceCL']; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">SL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningSL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['CreditedSL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['TotSL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['EnCashSL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedSL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceSL']; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">PL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningPL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['CreditedPL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['TotPL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['EnCashPL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedPL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalancePL']; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">EL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningEL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['CreditedEL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['TotEL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['EnCashEL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedEL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceEL']; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">FL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningOL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['CreditedOL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['TotOL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['EnCashOL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedOL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceOL']; ?></b></td>
</tr>
</table>
<?php } else {?>
<table border="1" cellspacing="1">
<tr bgcolor="#7a6189">
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" valign="top" align="center"><b>Leave</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" valign="top" align="center"><b>Opening</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" valign="top" align="center"><b>Availed</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" valign="top" align="center"><b>Balance</b></td>
</tr>
<tr>
 <td class="font1" align="center">CL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningCL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedCL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceCL']; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">SL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningSL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedSL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceSL']; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">PL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningPL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedPL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalancePL']; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">EL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningEL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedEL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceEL']; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">FL</td>
 <td class="font1" align="center"><?php echo $resLV['OpeningOL']; ?></td>
 <td class="font1" align="center"><?php echo $resLV['AvailedOL']; ?></td>
 <td class="font1" align="center" bgcolor="#FFE1E1"><b><?php echo $resLV['BalanceOL']; ?></b></td>
</tr>
</table>
<?php } ?>
  </td>
 </tr>
<?php /************************************* Leave **********************************/ ?> 
 </table>
</td>
<?php //********************** // ?> 
</tr>
</table>
<?php //*************************************************************************************************************************************************** ?>
</center>
</body>
</html>

