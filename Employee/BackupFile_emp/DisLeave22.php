<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}

if($_REQUEST['ac']=='CloseLeave' AND $_REQUEST['LCid']!='')
{$sqlDel=mysql_query("update hrm_employee_applyleave set LeaveActionApp=1 where ApplyLeaveId=".$_REQUEST['LCid'], $con); }
if($_REQUEST['action']=='DelClose' AND $_REQUEST['L']!='')
{$sqlDel=mysql_query("update hrm_employee_applyleave set LeaveActionApp=2 where ApplyLeaveId=".$_REQUEST['L'], $con); }
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

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function OpenWindow(LId)
{window.open("LeaveDetails.php?id="+LId,"leaveForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=350,height=350");}

function OpenBalWin(EId)
{window.open("LeaveBalDetails.php?id="+EId,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=200");}

function CloseL(i)
{window.location="DisLeave.php?ac=CloseLeave&LCid="+i;}
function DeleteLC(LId)
{var agree=confirm("Are you sure you want to delete this leave...?"); if (agree) { var x="DisLeave.php?action=DelClose&ac=CloseLeave&L="+LId; window.location=x; }}
</script>
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
  <table width="100%" style="margin-top:0px;">
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
						    <td align="left" valign="top" width="125">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				  <td align="left" width="950" valign="top">
	     <table border="0" width="950">
		    <tr>
			 <td colspan="10"><table border="0"><tr>
<?php if($rowApp>0) { ?><td align="center"><a href="DisLeave.php"><img id="Img_manager1" style="display:none;" src="images/RepMgr1.png" border="0"/></a>
		     <img id="Img_manager" style="display:block;" src="images/RepMgr.png" border="0"/></td><?php } ?>
<?php if($rowHod>0) { ?><td align="center"><a href="DisLeaveToHOD.php"><img id="Img_hod1" style="display:block;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_hod" style="display:none;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 <td width="800" class="TableHead">
			   <font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Dis-approved Leave</b></i></font>
			   <?php if($_REQUEST['ac']=='CloseLeave') { ?><font color="#000000"><b>(Trush)</b></font><?php } ?>
			   &nbsp;&nbsp;&nbsp;&nbsp;
			   <font color="#FB0000" style='font-family:Times New Roman;' size="4"><i><b><?php echo $msg; ?></b></i></font>
			 </td>
			 <td align="center" style="font-family:Times New Roman; color:#004A00;width:82px; font-size:15px;">
		     <?php $CFromDate='2013-04-01'; $CToDate=date("Y").'-12-31';
		           $sqlLC=mysql_query("select * from hrm_employee_applyleave where Apply_SentToApp=".$EmployeeId." AND LeaveStatus=3 AND LeaveActionApp=1 AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') order by Apply_Date ASC", $con); $rowLC=mysql_num_rows($sqlLC);?>
		<td valign="top" style="width:150px;" align="right"><?php if($rowLC>0){?>			
             <?php if($_REQUEST['ac']=='CloseLeave') { ?>
		     <a href="#" onClick="javascript:window.location='DisLeave.php'"><font color="#464600" style='font-family:Times New Roman;' size="3"><b>Refresh</b></font></a>		             <?php } else { ?>
		     <a href="#" onClick="CloseL()"><font color="#464600" style='font-family:Times New Roman;' size="3"><b>Trush Leave</b></font></a>
		     <?php } } ?></td>
			 </tr></table></td>
			</tr>
			<tr>
			 <td>
			   <table border="1">
            <tr bgcolor="#7a6189" style="height:22px;">
		     <td width="40" class="TableHead" align="center"><b>Sno</b></td>
		     <td width="50" class="TableHead" align="center"><b>EC</b></td>
		     <td width="250" class="TableHead" align="center"><b>Name</b></td>
			 <td width="100" class="TableHead" align="center"><b>Apply Date</b></td>
		     <td width="100" class="TableHead" align="center"><b>Leave</b></td>
		     <td width="70" class="TableHead" align="center"><b>From</b></td>
		     <td width="70" class="TableHead" align="center"><b>To</b></td>
			 <td width="40" class="TableHead" align="center"><b>Day</b></td>
		     <td width="60" class="TableHead" align="center"><b>Details</b></td>
			 <td width="60" class="TableHead" align="center"><b>Balance</b></td>
			 <td width="80" class="TableHead" align="center"><b>Status</b></td>
		     <td width="80" class="TableHead" align="center"><b>Action</b></td>
		   </tr>
<?php $CFromDate='2013-04-01'; $CToDate=date("Y").'-12-31'; 
	  $sqlCheck=mysql_query("select * from hrm_employee_applyleave where Apply_SentToApp=".$EmployeeId." AND LeaveStatus=3 AND LeaveActionApp!=1 AND LeaveActionApp!=2 AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') order by Apply_Date ASC", $con); 
	  $rowCheck=mysql_num_rows($sqlCheck); if($rowCheck>0 AND $_REQUEST['ac']!='CloseLeave'){ $sno=1; while($resL=mysql_fetch_array($sqlCheck)){	  
	  $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, DesigId, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resL['EmployeeID'], $con); 
      $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>								  					
		   <tr>
		    <td width="40" class="TableHead1" align="center"><?php echo $sno; ?></td>
		    <td width="50" class="TableHead1" align="center"><?php echo $resE['EmpCode']; ?></td>
		    <td width="250" class="TableHead1" align="left"><?php echo $EmpName; ?></td>
			<td width="100" class="TableHead1" align="center"><?php echo date("d-m-y", strtotime($resL['Apply_Date'])); ?></td>
		    <td width="100" class="TableHead1" align="center"><?php if($resL['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resL['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resL['Leave_Type'];} ?></td>
		    <td width="70" class="TableHead1" align="center"><?php echo date("d-m-y",strtotime($resL['Apply_FromDate'])); ?></td>
		    <td width="70" class="TableHead1" align="center"><?php echo date("d-m-y",strtotime($resL['Apply_ToDate'])); ?></td>
			<td width="70" class="TableHead1" align="center"  style="background-color:#B9FFB9;"><?php echo $resL['Apply_TotalDay']; ?></td>
		    <td width="60" class="TableHead1" align="center"><a href="javascript:OpenWindow(<?php echo $resL['ApplyLeaveId']; ?>)">Details</a></td>
			<td width="60" class="TableHead1" align="center"><a href="javascript:OpenBalWin(<?php echo $resL['EmployeeID']; ?>)">Balance</a></td>
			<td width="80" class="TableHead1" align="center">Cancel</td>	
		    <td width="80" class="TableHead1" align="center"> 
            <a href="#" onClick="CloseL(<?php echo $resL['ApplyLeaveId']; ?>)"><img src="images/Trash-can-icon.png" border="0" /></a></td>
		  </tr>  
<?php $sno++; } } ?>
<?php if($_REQUEST['ac']=='CloseLeave') { $snoC=1; while($resLC=mysql_fetch_array($sqlLC)) {
 $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, DesigId, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resLC['EmployeeID'], $con); 
      $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>								  					
		   <tr>
		    <td width="40" class="TableHead1" align="center"><?php echo $snoC; ?></td>
		    <td width="50" class="TableHead1" align="center"><?php echo $resE['EmpCode']; ?></td>
		    <td width="250" class="TableHead1" align="left"><?php echo $EmpName; ?></td>
			<td width="100" class="TableHead1" align="center"><?php echo date("d-m-y", strtotime($resLC['Apply_Date'])); ?></td>
		    <td width="100" class="TableHead1" align="center"><?php if($resLC['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resLC['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resLC['Leave_Type'];} ?></td>
		    <td width="70" class="TableHead1" align="center"><?php echo date("d-m-y",strtotime($resLC['Apply_FromDate'])); ?></td>
		    <td width="70" class="TableHead1" align="center"><?php echo date("d-m-y",strtotime($resLC['Apply_ToDate'])); ?></td>
			<td width="70" class="TableHead1" align="center"  style="background-color:#B9FFB9;"><?php echo $resLC['Apply_TotalDay']; ?></td>
		    <td width="60" class="TableHead1" align="center"><a href="javascript:OpenWindow(<?php echo $resLC['ApplyLeaveId']; ?>)">Details</a></td>
			<td width="60" class="TableHead1" align="center"><a href="javascript:OpenBalWin(<?php echo $resLC['EmployeeID']; ?>)">Balance</a></td>
			<td width="80" class="TableHead1" align="center">Cancel</td>	
		    <td width="80" class="TableHead1" align="center">
			<a href="#" onClick="DeleteLC(<?php echo $resLC['ApplyLeaveId']; ?>)"><img src="images/delete.png" border="0"/></a> </td>
		  </tr>  
<?php $snoC++; } } ?>					  
	
              </table>
			 </td>
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

