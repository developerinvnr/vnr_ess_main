<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
$sqlSY=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); $resSY=mysql_fetch_array($sqlSY); 
$sqlSYP=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con); $resSYP=mysql_fetch_array($sqlSYP); 
//echo $resSY['OldY'].'-'.$resSY['CurrY'].'-'.$resSY['NewY'].'-'.$resSYP['OldY'].'-'.$resSYP['CurrY'].'-'.$resSYP['NewY'];
/******************************************************************************/
if($_REQUEST['action']=='r' && $_REQUEST['e']!="" && $_REQUEST['y']!=""){ 
$sqlR=mysql_query("update hrm_pms_kra set UseKRA='E', EmpStatus='P', AppStatus='R' where YearId=".$_REQUEST['y']." AND EmployeeID=".$_REQUEST['e'], $con);
if($sqlR){$msg='Employee Resend Successfully!';} }
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
<style>.font {color:#000; font-family:Times New Roman; font-size:15px; font-weight:bold;} 
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script language="javascript" type="text/javascript">
function ResentKRA(E)
{ var agree=confirm("Are you sure you want to resend KRA form to Employee?");
  if (agree) { window.location='AppCheckNewKRA.php?action=r&e='+E+'&y=3'; } 
  else {return false;}
}

function EmpKRA(CId,YId,EmpId) 
{ window.open ("EmpKraForm.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1100,height=500");}
</script>
</head>

<body class="body">
<table class="table">
 <input type="hidden" id="EmpId" value="" /> <input type="hidden" id="YearId" value="<?php echo $YearId; ?>" /> 
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
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 	   

<?php //*************************************************************************************************************************************************** ?>	   

		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">&nbsp;</td>
				 <td width="1200" valign="top">
				  <table border="0">


<?php //*************************************************************** Start ******************************************************************************** ?>					
<tr>
 <td colspan="5" width="1200" style="background-image:url(images/pmsback.png);">
<?php $sqlKey=mysql_query("select * from hrm_pms_key where Person='app' AND CompanyId=".$CompanyId, $con); $resKey=mysql_fetch_assoc($sqlKey);  
      $sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$resSYP['CurrY']." AND CompanyId=".$CompanyId, $con); 
      $resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d"); ?>
  <table>
<?php //******************************************** ?>  
   <tr>
    <td width="1200">
	  <table>
	    <tr>
        <?php if($_SESSION['EmpType']=='E') {?>
		 <td align="center"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img id="Img_emp1" style="display:block;" src="images/emp1.png" border="0"/></a>
		   <img id="Img_emp" style="display:none;" src="images/emp.png" border="0"/></td>        
<?php } $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 
      if($rowApp>0) { ?>   
		 <td align="center"><a href="ManagerPms.php"><img id="Img_manager1" style="display:none;" src="images/manager1.png" border="0"/></a>
		   <img id="Img_manager" style="display:block;" src="images/manager.png" border="0"/></td>
<?php }  $sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); 

      if($rowRev>0) { ?>		   
		 <td align="center"><a href="HodPms.php"><img id="Img_hod1" style="display:block;" src="images/hod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/hod.png" border="0"/></td>
<?php }  $sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where AssessmentYear=".$resSYP['CurrY']." AND HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); 
      if($rowHod>0) { ?>		   
		 <td align="center"><a href="RevHodPms.php"><img id="Img_hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/RevHod.png" border="0"/></td>		     
<?php }  ?>	
         <td style="width:50px;">&nbsp;</td>
		 <td style="width:300px;"><font color="#014E05" style='font-family:Times New Roman;' size="3"><b><i><span id="MsgSpan"></span></i><?php echo $msg; ?></b></font></td>	   
	  </table>
	</td>
   </tr>
    <tr>
    <td width="1200">
	  <table>
	    <tr>
         <?php if($resKey['Home']=='Y') { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:80px;">
		 <a href="Indexpms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img src="images/Home.png" border="0" /></a></td><?php } ?>    
		 <?php if($resKey['MyTeam']=='Y') { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
		 <a href="ManagerPms.php"><a href="ManagerPms.php"><img src="images/MyTeam1.png" border="0" /></a></td><?php } ?>    			   
		 <?php if($resKey['TeamStatus']=='Y') { ?><td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
<?php $sqlCh = mysql_query("select * from hrm_pms_allow where Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$resSYP['CurrY'], $con); 
	  $sqlCh2  = mysql_query("select EmpPmsId from hrm_employee_pms where Appraiser_PmsStatus=1 AND Reviewer_PmsStatus=3 AND Appraiser_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssessmentYear=".$resSYP['CurrY'], $con); $rowCh=mysql_num_rows($sqlCh); $rowCh2=mysql_num_rows($sqlCh2);
	  if(($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A') OR $rowCh>0 OR ($CuDate>$resSch['AppToDate'] AND $rowCh2>0)) { ?> 
         <a href="ManagerTeamStatus.php?action=teamS"><img src="images/TeamStatus1.png" border="0" /></a><?php } ?></td><?php } ?> 
		 <?php if($resKey['KRAForm']=='Y') { ?> 
         <td style="font-family:Times New Roman;width:180px; font-size:14px; font-weight:bold;" valign="middle">
         <a href="AppCheckNewKRA.php"/><img src="images/KraYearMyTeam.png" border="0"/></a> </td><?php } ?>
		 <td style="width:20px;">&nbsp;</td>
		 <td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:400px; color:#E10000;" >
		  <?php if($CuDate>=$resSch['AppFromDate'] AND $CuDate<=$resSch['AppToDate'] AND $resSch['AppDateStatus']=='A') { 
		  $LastDate=$resSch['AppToDate']; $CurrentDate=date("Y-m-d");
		  $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
          //$years = floor($diff / (365*60*60*24));
          //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>
		  <b><blink><?php echo $days; ?> Days Remaining! Last date : 
		  <font color="#5B0000"><?php echo date("d-F",strtotime($resSch['AppToDate'])); ?></font></blink></b><?php } ?>
		 </td> 	   			       
	  </table>
	</td>
   </tr>

   

   <tr>
    <td>
	  <table border="0">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<?php /****************************************** Form Start **************************/ ?>	 
<?php /***************** AppraisalForm **************************/ ?>
<form name="AppraisalForm" method="post" onSubmit="Validation(this)">	
		 <td id="AppraisalForm" style="width:1150px;display:block;">
		   		   <table border="0">
 <tr>
  <td>
    <table border="0">
	<tr>
 <td colspan="6" style="font-family:Times New Roman; font-size:18px; font-weight:bold;width:250px;"><font color="#00468C">(<i>My Team KRA Status</i>)</font><br></td>
 <td style="width:20px;"></td>
 <td style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:500px;" valign="top">
 <img src="images/edit.png" border="0"/>&nbsp;:&nbsp; Edit &nbsp;&nbsp;&nbsp;&nbsp;
 <img src="images/go-back-icon.png" border="0"/>&nbsp; Resent
 </td>
<?php /* <td class="td1" style="font-family:Times New Roman; font-size:15px; width:150px; font-weight:bold;" align="right">
 <span id="HQ">Head Quarter : </span></td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:200px; font-weight:bold;"> 
   <span id="HQSelect">
 <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="HQE" id="HQE" onChange="SelectHQEmp2(this.value,<?php echo $EmployeeId.','.$YearId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Head Quarter</option><?php $SqlHQ=mysql_query("select * from hrm_headquater where CompanyId=".$CompanyId." order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo '&nbsp;'.$ResHQ['HqName'];?></option><?php } ?>
   <option value="All">&nbsp;All</option>
   </select> 
   </span>
 </td>
 <td>&nbsp;</td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:50px; font-weight:bold;" align="right">State :</td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:200px; font-weight:bold;"> 
  <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="StE" id="StE" onChange="SelectStateEmp2(this.value,<?php echo $EmployeeId.','.$YearId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>State</option><?php $SqlSt=mysql_query("select * from hrm_state order by StateName ASC", $con); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo '&nbsp;'.$ResSt['StateName'];?></option><?php } ?>
   <option value="All">&nbsp;All</option>
   </select> 
 </td> */ ?>
   </tr>
  </table>
  </td>
 </tr>	   
 <tr>
   <td style="width:1150px;">
     <table border="0">
     <tr>
      <td id="ResendText" style="display:none;">

<table>
  <tr>
  <form method="post" name="formResend" />
    <td style="font-family:Times New Roman; color:#C10000; font-size:15px; font-weight:bold;width:150px;">Reason For Resend :</td>
    <td style="width:800px;"><input name="Resend" id="Resend" maxlength="200" style=" background-color:#FFFFFF; height:20px;font-size:11px;width:800px; border-style:hidden;"/></td>
    <td><input type="button" id="btnResend" name="btnResend" value="Send" style="width:90px; background-color:#B9DCFF;" onClick="return send()" /></td>
  </form>  
  </tr>
</table>
     </td>
    </tr>

     <tr>
	  <?php //************************************************ Start ******************************// ?>
	   <td style="width:1150px;" id="EmpkraStatus" style="display:block;">
       <span id="MyTeamStatusSpan"></span>	   
	   <span id="MyTeamStatus">
		<table border="">
		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:30px;"><b>SNo.</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>EmpCode</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Name</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>Department</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:250px;"><b>Designation</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>HQ</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>State</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Employee</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Appraiser</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>KRA</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>Action</b></td>
		 </tr>
<?php //$Y=$YearId+1;
$sql=mysql_query("select hrm_employee.*,EmpPmsId,DepartmentId,DesigId,DesigId2,HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$resSYP['CurrY']." AND hrm_employee_pms.Appraiser_EmployeeID=".$EmployeeId, $con); $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		
		<tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">
	        <td align="center" style="font:Georgia; font-size:11px; width:30px;"><?php echo $sno; ?></td>
	        <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $res['EmpCode']; ?></td>
	        <td align="" style="font:Georgia; font-size:11px; width:200px;">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
      $res2=mysql_fetch_assoc($sql2);?><td align="" style="font:Georgia; font-size:11px; width:150px;">&nbsp;<?php echo $res2['DepartmentCode'];?></td>
<?php $sql3=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId']." OR DesigId=".$res['DesigId2'], $con); 
      $res3=mysql_fetch_assoc($sql3);?>	  
	  <td align="" style="font:Georgia; font-size:11px; width:250px;">&nbsp;<?php echo $res3['DesigName'];?></td>
<?php $sql4=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); 
      $res4=mysql_fetch_assoc($sql4);?>				
			<td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $res4['HqName'];?></td>
<?php $sql5=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); 
      $res5=mysql_fetch_assoc($sql5);?>				
			<td align="" style="font:Georgia; font-size:11px; width:150px;">&nbsp;<?php echo $res5['StateName'];?></td>
<?php $sql3E=mysql_query("select EmpStatus from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $row3E=mysql_num_rows($sql3E); 
      if($row3E==0){ $stE='Draft'; $stA='Draft'; $stR='Draft';} 
	  if($row3E>0){ $res3E=mysql_fetch_assoc($sql3E);
	  if($res3E['EmpStatus']=='D'){$stE='Draft';} if($res3E['EmpStatus']=='P'){$stE='Pending';} if($res3E['EmpStatus']=='A'){$stE='Submitted';}
} ?>				
	  <td align="center" style="font:Georgia; font-size:11px; width:100px; color:<?php if($stE=='Draft') {echo '#A40000'; }if($stE=='Pending') {echo '#36006C'; }if($stE=='Submitted') {echo '#005300'; }?>;" ><?php echo $stE;?></td>
<?php $sql3A=mysql_query("select AppStatus from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con); $row3A=mysql_num_rows($sql3A); 
      if($row3A==0){ $stE='Draft'; $stA='Draft'; $stR='Draft';} 
	  if($row3A>0){ $res3A=mysql_fetch_assoc($sql3A);	   
if($res3A['AppStatus']=='D'){$stA='Draft';} if($res3A['AppStatus']=='P'){$stA='Pending';} if($res3A['AppStatus']=='A'){$stA='Approved';} if($res3A['AppStatus']=='R'){$stA='Resent';}  	
 } ?>	
        	<td align="center" style="font:Georgia; font-size:11px; width:100px;color:<?php if($stA=='Draft') {echo '#A40000'; }if($stA=='Pending') {echo '#36006C'; }if($stA=='Approved') {echo '#005300'; } ?>;"><?php echo $stA;?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px;">
<?php $sqlShow=mysql_query("select UseKRA from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con);  $resShow=mysql_fetch_assoc($sqlShow);	   	
      if($resShow['UseKRA']=='A' OR $resShow['UseKRA']=='H' OR $resShow['UseKRA']=='R') {?>
			<a href="#" onClick="EmpKRA(<?php echo $CompanyId.', '.$resSY['CurrY'].', '.$res['EmployeeID']; ?>)">Click</a>
			<?php } ?>
			</td>
			<td align="center" style="font:Georgia; font-size:11px; width:120px;">
<?php $sqlShow2=mysql_query("select UseKRA from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$res['EmployeeID'], $con);  $resShow2=mysql_fetch_assoc($sqlShow2);	   	
      if($resShow2['UseKRA']=='A') {?>
			<a href="#"><img src="images/edit.png" border="0" onClick="javascript:window.location='AppAddNewKRA.php?e=<?php echo $res['EmployeeID']?>'"/></a>
			&nbsp;&nbsp;&nbsp;
			<a href="#"><img src="images/go-back-icon.png" border="0" onClick="return ResentKRA(<?php echo $res['EmployeeID'];?>)"/></a>
			<?php } ?>
			</td>
		 </tr>
<?php $sno++;} ?>		
		</table>
		</span>
         <td id="ScoreEmpkra" style="display:block;">
	      <span id="ScoreEmpKraSpan"></span>
	     </td>
	   </td>
      <?php //************************************************ Close ******************************// ?>	  	     
	</tr>
  </table>
   </td>
 </tr>
     </table>
		 </td>

		 

		 

</form>		 

		</tr>
	  </table>
	</td>
   </tr>
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					

<?php //*************************************************************** Close ******************************************************************************** ?>					

				  </table>

				 </td>

			  </tr>

			 

			  <tr>

			     <td>&nbsp;</td>

			     <td align="Right" class="fontButton" width="550">

				   </td>

		      </tr>

			   </form>

			</table>

           </td>

			  </tr>

	        </table>

			

<?php //*************************************************************************************************************************************************** ?>

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



