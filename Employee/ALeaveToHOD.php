<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}

if($_REQUEST['ac']=='CloseLeave' AND $_REQUEST['LCid']!='')
{$sqlDel=mysql_query("update hrm_employee_applyleave set LeaveActionHod=1 where ApplyLeaveId=".$_REQUEST['LCid'], $con); }
if($_REQUEST['action']=='DelClose' AND $_REQUEST['L']!='')
{$sqlDel=mysql_query("update hrm_employee_applyleave set LeaveActionHod=2 where ApplyLeaveId=".$_REQUEST['L'], $con); }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>

<style>
.th{color:#ffffff;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;height:24px;} 
.tdl{color:#000000;font-family:Times New Roman;font-size:12px;height:20px;} 
.tdc{color:#000000;font-family:Times New Roman;font-size:12px;text-align:center;height:20px;}
.tdr{color:#000000;font-family:Times New Roman;font-size:12px;text-align:right;height:20px;} 
.inpl{color:#000000;font-family:Times New Roman;font-size:11px;width:99%;height:20px;} 
.inpc{color:#000000;font-family:Times New Roman;font-size:11px;text-align:center;width:99%;height:20px;}
.inpr{color:#000000;font-family:Times New Roman;font-size:11px;text-align:right;width:99%;height:20px;} 
.TableHead { font-family:Times New Roman;color:#000000;font-size:15px;font-weight:bold; }
.CBtn {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>

<script type="text/javascript" language="javascript">
function OpenWindow(LId)
{window.open("LeaveDetails.php?id="+LId,"leaveForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=350,height=350");}

function OpenBalWin(EId)
{window.open("LeaveBalDetails.php?id="+EId,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=200");}

function CloseL(i)
{window.location="ALeaveToHOD.php?ac=CloseLeave&LCid="+i;}
function DeleteLC(LId)
{var agree=confirm("Are you sure you want to delete this leave...?"); if (agree) { var x="ALeaveToHOD.php?action=DelClose&ac=CloseLeave&L="+LId; window.location=x; }}
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
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top">
	<table border="0" style="width:100%;float:none;" cellpadding="0">
     <tr>
	  <td valign="top">    
<?php //********************************************************************************** ?>	   
<table border="0" id="Activity">
 <tr>
  <td id="Anni" valign="top">
	<table border="0">
	  <tr height="20">
	   <td align="left" valign="top" width="150">
       <?php include("EmpImgEmp.php"); ?>
       <?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?>
	   </td>
	  </tr>
	</table>
  </td>
  <td style="width:100%;">
  
	     <table border="0" style="width:90%;">
		    <tr>
			 <td colspan="10"><table border="0"><tr>
<?php if($rowApp>0) { ?><td align="center"><a href="ALeave.php"><img id="Img_manager1" style="display:block;" src="images/RepMgr1.png" border="0"/></a>
		     <img id="Img_manager" style="display:none;" src="images/RepMgr.png" border="0"/></td><?php } ?>
<?php if($rowHod>0 OR $rowRev>0) { ?><td align="center"><a href="ALeaveToHOD.php"><img id="Img_hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_hod" style="display:block;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 
			 <td width="800" class="TableHead">
			   <font color="#106809" style='font-family:Times New Roman;'><i><b>Approved Leave</b></i></font>
			   <?php if($_REQUEST['ac']=='CloseLeave') { ?><font color="#000000"><b>(Trush)</b></font><?php } ?>
			   &nbsp;&nbsp;&nbsp;&nbsp;
			   <font color="#FB0000" style='font-family:Times New Roman;' size="4"><i><b><?php echo $msg; ?></b></i></font>
			 </td>
			 <td align="center" style="font-family:Times New Roman; color:#004A00;width:82px; font-size:15px;">
		     <?php $CFromDate='2013-04-01'; $CToDate=date("Y").'-12-31';
		           $sqlLC=mysql_query("select * from hrm_employee_applyleave where Apply_SentToHOD=".$EmployeeId." AND LeaveHodStatus=2 AND LeaveEmpCancelStatus='N' AND LeaveActionHod=1 AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') order by Apply_Date DESC", $con); $rowLC=mysql_num_rows($sqlLC);?>
		<td valign="top" style="width:150px;" align="right"><?php if($rowLC>0){?>			
             <?php if($_REQUEST['ac']=='CloseLeave') { ?>
		     <a href="#" onClick="javascript:window.location='ALeaveToHOD.php'"><font color="#464600" style='font-family:Times New Roman;' size="3"><b>Refresh</b></font></a>		             <?php } else { ?>
		     <a href="#" onClick="CloseL()"><font color="#464600" style='font-family:Times New Roman;' size="3"><b>Trush Leave</b></font></a>
		     <?php } } ?></td>
			 </tr></table></td>
			</tr>
			<tr>
	<td style="width:100%;">
	 <table border="1" style="width:100%;" cellspacing="1">
            <tr bgcolor="#7a6189">
		     <td class="th" style="width:40px;">Sno</td>
		     <td class="th" style="width:50px;">EC</td>
		     <td class="th" style="width:250px;">Name</td>
			 <td class="th" style="width:100px;">Apply Date</td>
		     <td class="th" style="width:100px;">Leave</td>
		     <td class="th" style="width:70px;">From</td>
		     <td class="th" style="width:70px;">To</td>
			 <td class="th" style="width:40px;">Day</td>
		     <td class="th" style="width:60px;">Details</td>
			 <td class="th" style="width:60px;">Balance</td>
			 <td class="th" style="width:80px;">Status</td> 
			 <?php /* <td class="th" style="width:80px;">Action</td> */ ?>
		   </tr>
<?php $CFromDate=date("Y-01-01"); $CToDate=date("Y").'-12-31'; 

if($rowHod>0 OR $rowRev>0)
{
$sql_statement = mysql_query("select * from hrm_employee_applyleave where (Leave_Type='PL' OR (Leave_Type='SL' AND SLHodApp='Y')) AND (Apply_SentToHOD=".$EmployeeId." OR Apply_SentToRev=".$EmployeeId.") AND LeaveHodStatus=2 AND LeaveEmpCancelStatus='N' AND LeaveActionApp!=1 AND LeaveActionApp!=2 AND Apply_FromDate>='".$CFromDate."' order by Apply_Date DESC", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}
$sql_statement = mysql_query("select * from hrm_employee_applyleave where (Leave_Type='PL' OR (Leave_Type='SL' AND SLHodApp='Y')) AND (Apply_SentToHOD=".$EmployeeId." OR Apply_SentToRev=".$EmployeeId.") AND LeaveHodStatus=2 AND LeaveEmpCancelStatus='N' AND LeaveActionApp!=1 AND LeaveActionApp!=2 AND Apply_FromDate>='".$CFromDate."' order by Apply_Date DESC LIMIT " . $from . "," . $offset, $con);
}
elseif($rowRev>0)
{
$sql_statement = mysql_query("select * from hrm_employee_applyleave where Leave_Type='PL' AND Apply_SentToRev=".$EmployeeId." AND LeaveHodStatus=2 AND LeaveEmpCancelStatus='N' AND LeaveActionApp!=1 AND LeaveActionApp!=2 AND Apply_FromDate>='".$CFromDate."' order by Apply_Date DESC", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}
$sql_statement = mysql_query("select * from hrm_employee_applyleave where Leave_Type='PL' AND Apply_SentToRev=".$EmployeeId." AND LeaveHodStatus=2 AND LeaveEmpCancelStatus='N' AND LeaveActionApp!=1 AND LeaveActionApp!=2 AND Apply_FromDate>='".$CFromDate."' order by Apply_Date DESC LIMIT " . $from . "," . $offset, $con);
}


//$sqlCheck=mysql_query("select * from hrm_employee_applyleave where Apply_SentToHOD=".$EmployeeId." AND LeaveHodStatus=2 AND LeaveEmpCancelStatus='N' AND LeaveActionHod!=1 AND LeaveActionHod!=2 AND Apply_FromDate>='".$CFromDate."' order by Apply_Date DESC", $con); 
	  $rowCheck=mysql_num_rows($sql_statement); if($rowCheck>0 AND $_REQUEST['ac']!='CloseLeave'){ 
	  if($_REQUEST['page']==1){$sno=1;} elseif($_REQUEST['page']==2){$sno=11;} elseif($_REQUEST['page']==3){$sno=21;}
	  elseif($_REQUEST['page']==4){$sno=31;} elseif($_REQUEST['page']==5){$sno=41;} elseif($_REQUEST['page']==6){$sno=51;} 
	  elseif($_REQUEST['page']==7){$sno=61;} elseif($_REQUEST['page']==8){$sno=71;} elseif($_REQUEST['page']==9){$sno=81;} 
	  elseif($_REQUEST['page']==10){$sno=91;} else{$sno=1;} 
	  while($resL=mysql_fetch_array($sql_statement)){	  
	  $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, DesigId, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resL['EmployeeID'], $con); 
      $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  
	  $sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$resL['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);
	  
	  ?>								  					
		   <tr style="background-color:<?php if($rowch>0){echo '#FFFF6C';}elseif($resL['Leave_Type']=='PL'){echo '#71B8FF';}else{echo '#FFFFFF';} ?>;">
		    <td class="tdc"><?php echo $sno; ?></td>
		    <td class="tdc"><?php echo $resE['EmpCode']; ?></td>
		    <td class="tdl"><?php echo $EmpName; ?></td>
			<td class="tdc"><?php echo date("d-m-y", strtotime($resL['Apply_Date'])); ?></td>
		    <td class="tdc"><?php if($resL['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resL['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resL['Leave_Type'];} ?></td>
		    <td class="tdc"><?php echo date("d-m-y",strtotime($resL['Apply_FromDate'])); ?></td>
		    <td class="tdc"><?php echo date("d-m-y",strtotime($resL['Apply_ToDate'])); ?></td>
			<td class="tdc" style="background-color:#B9FFB9;"><?php echo $resL['Apply_TotalDay']; ?></td>
		    <tdclass="tdc"><a href="javascript:OpenWindow(<?php echo $resL['ApplyLeaveId']; ?>)">Details</a></td>
			<td class="tdc"><a href="javascript:OpenBalWin(<?php echo $resL['EmployeeID']; ?>)">Balance</a></td>
			<td class="tdc">Approved</td>
			<?php /*
		    <td width="80" class="TableHead1" align="center">
			 <a href="#" onClick="CloseL(<?php echo $resL['ApplyLeaveId']; ?>)"><img src="images/Trash-can-icon.png" border="0" /></a></td>
			 */ ?>
		  </tr>  
<?php $sno++; } } ?>	
<?php if($_REQUEST['ac']=='CloseLeave') { $snoC=1; while($resLC=mysql_fetch_array($sqlLC)) {
 $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, DesigId, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resLC['EmployeeID'], $con); 
      $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  
	  $sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$resLC['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);
	  ?>								  					
		   <tr style="background-color:<?php if($rowch>0){echo '#FFFF6C';}elseif($resLC['Leave_Type']=='PL'){echo '#71B8FF';}else{echo '#FFFFFF';} ?>;">
		    <td class="tdc"><?php echo $snoC; ?></td>
		    <td class="tdc"><?php echo $resE['EmpCode']; ?></td>
		    <td class="tdl"><?php echo $EmpName; ?></td>
			<td class="tdc"><?php echo date("d-m-y", strtotime($resLC['Apply_Date'])); ?></td>
		    <td class="tdc"><?php if($resLC['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resLC['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resLC['Leave_Type'];} ?></td>
		    <td class="tdc"><?php echo date("d-m-y",strtotime($resLC['Apply_FromDate'])); ?></td>
		    <td class="tdc"><?php echo date("d-m-y",strtotime($resLC['Apply_ToDate'])); ?></td>
			<td class="tdc" style="background-color:#B9FFB9;"><?php echo $resLC['Apply_TotalDay']; ?></td>
		    <td class="tdc"><a href="javascript:OpenWindow(<?php echo $resLC['ApplyLeaveId']; ?>)">Details</a></td>
			<td class="tdc"><a href="javascript:OpenBalWin(<?php echo $resLC['EmployeeID']; ?>)">Balance</a></td>
			<td class="tdc">Approved</td>	
			<?php /*
		    <td class="tdc">&nbsp;</td>
			<?php /* <a href="#" onClick="DeleteLC(<?php echo $resLC['ApplyLeaveId']; ?>)"><img src="images/delete.png" border="0"/></a>  */ ?>
		  </tr>  
<?php $snoC++; } } ?>					  
              </table>
			 </td>
			</tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold; ">
<?PHP doPages($offset, 'AleaveToHOD.php', '', $total_records); ?>
</td>
</tr>				
		 </table>
	           </td>
    </tr>
</table>

			
<?php //***************************************************************************************** ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>	
	<tr><td valign="top" align="center">&nbsp;</td></tr>
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


<?php
function check_integer($which) {
if(isset($_REQUEST[$which])){
if (intval($_REQUEST[$which])>0) {
return intval($_REQUEST[$which]);
} else {
return false;
}
}
return false;
}
function get_current_page() {
if(($var=check_integer('page'))) {
return $var;
} else {
//return 1, if it wasnt set before, page=1
return 1;
}
}
function doPages($page_size, $thepage, $query_string, $total=0) {
$index_limit = 4;
$query='';
if(strlen($query_string)>0){
$query = "&amp;".$query_string;
}
$current = get_current_page();
$total_pages=ceil($total/$page_size);
$start=max($current-intval($index_limit/2), 1);
$end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1) {
echo '<span class="prn">&lt; Previous</span>&nbsp;';
} else {
$i = $current-1;
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h4></font></div>';
}
}
?>

