<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
include('../AdminUser/codeEncDec.php');
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
/******************************************************************************/
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px;} .font5 { color:#000066; font-family:Georgia; font-size:16px;}
.font2 { color:#thrthr; font-family:Georgia; font-size:13px;}.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.input { background-color:#F9F2FF; width:90px;text-align:center;height:20px;vertical-align:middle;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function OpenClearanceF(SId,ei,St)
{ 
  var win=window.open("SepRepMgrClearForm.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+SId+"&st="+St+"&ei="+ei,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=850,height=670");
  var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="EmpNOCSeparation.php?e=4e&w=234&y=10234&e=4e2&e=4e&w=234&y=110022344&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101"; } }, 1000);
}
 
function OpenExitIntF(SId,ei,St)
{
var win=window.open("SepRepMgrExitIntForm.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+SId+"&st="+St+"&ei="+ei,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=650,height=550");
  var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="EmpNOCSeparation.php?e=4e&w=234&y=10234&e=4e2&e=4e&w=234&y=110022344&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101"; } }, 1000);
  
} 
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
	  <tr height="20"><td align="left" valign="top" width="120">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td></td></tr>
	</table>
  </td>
  <td width="1000" valign="top">
<form enctype="multipart/form-data" name="form" method="post"  onSubmit="return validate(this)">
<table border="0" cellspacing="5">
 <tr>
  <td style="display:block;"> <?php //if($_REQUEST['a']=='hod'){echo 'block';}elseif($_REQUEST['a']=='app'){echo 'none';}?>
   <table>
      <tr><td height="30" colspan="7" valign="top" style="font-size:18px;font-family:Times New Roman;"><b>Departmental NOC Clearance(Reporting Mgr) </b>&nbsp;&nbsp;
	  <font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font>
	</td>
 </tr>
  <tr>
  <td>
   <table border="1">
     <tr bgcolor="#7a6189" style="height:22px;">
	  <td width="40" class="TableHead" align="center"><b>Sno</b></td>
	  <td width="50" class="TableHead" align="center"><b>EC</b></td>
	  <td width="250" class="TableHead" align="center"><b>Name</b></td>
	  <td width="150" class="TableHead" align="center"><b>Function</b></td>
	  <td width="100" class="TableHead" align="center"><b>Resignation Date</b></td>
	  <td width="100" class="TableHead" align="center"><b>Relieving Date</b></td>
	  <td width="80" class="TableHead" align="center"><b>Resignation Approved</b></td>
	  <td width="80" class="TableHead" align="center"><b>Clearance Status</b></td>
	  <td width="80" class="TableHead" align="center"><b>Clearance Form</b></td>
	  <td width="200" class="TableHead" align="center"><b>Exit Interview</b></td>
     </tr>
<?php $sql_statement = mysql_query("select * from hrm_employee_separation where Rep_EmployeeID =".$EmployeeId, $con); $total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  $offset = 10;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}
$sql_statement = mysql_query("select * from hrm_employee_separation where Rep_EmployeeID=".$EmployeeId." order by Emp_RelievingDate Desc, ResignationStatus ASC, Emp_ResignationDate DESC LIMIT " . $from . "," . $offset, $con);  $rowCheck=mysql_num_rows($sql_statement); if($rowCheck>0){ 
if($_REQUEST['page']==1){$sno=1;} elseif($_REQUEST['page']==2){$sno=11;} elseif($_REQUEST['page']==3){$sno=21;} elseif($_REQUEST['page']==4){$sno=31;} elseif($_REQUEST['page']==5){$sno=41;} elseif($_REQUEST['page']==6){$sno=51;} elseif($_REQUEST['page']==7){$sno=61;} elseif($_REQUEST['page']==8){$sno=71;} elseif($_REQUEST['page']==9){$sno=81;} elseif($_REQUEST['page']==10){$sno=91;} elseif($_REQUEST['page']==11){$sno=101;} elseif($_REQUEST['page']==12){$sno=111;} elseif($_REQUEST['page']==13){$sno=121;} else{$sno=1;}
while($res=mysql_fetch_array($sql_statement)){	  
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$res['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
$sqlDept=mysql_query("select DepartmentCode,FunName from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
?>	 
	 <tr bgcolor="#FFFFFF">
	  <td width="40" class="TableHead1" align="center" valign="top"><?php echo $sno; ?></td>
	  <td width="50" class="TableHead1" align="center"><?php echo $resE['EmpCode']; ?></td>
	  <td width="250" class="TableHead1">&nbsp;<?php echo $EmpName; ?></td>
	  <td width="150" class="TableHead1">&nbsp;<?php echo $resDept['FunName']; ?></td>
	  <td width="100" class="TableHead1" align="center"><?php echo $res['Emp_ResignationDate']; ?></td>
	  <td width="100" class="TableHead1" align="center"><?php echo $res['HR_RelievingDate']; ?></td>
	  <td width="80" class="TableHead1" align="center" style="color:<?php if($res['HR_Approved']=='N' OR $res['HR_Approved']=='P'){echo '#0080FF';}elseif($res['HR_Approved']=='Y'){echo '#006400';}elseif($res['HR_Approved']=='C'){echo '#804000';} ?>;">
	  <?php if($res['HR_Approved']=='N' OR $res['HR_Approved']=='P'){echo 'PENDING';}elseif($res['HR_Approved']=='Y'){ echo 'YES';}elseif($res['HR_Approved']=='C'){ echo 'NO';} ?></td>
	  <td width="80" class="TableHead1" align="center"><?php if($res['Rep_NOC']=='N'){echo '<font color="#F97C00">PENDING</font>';}elseif($res['Rep_NOC']=='Y'){ echo '<font color="#006F00">SUBMITTED</font>';}?></td>
	  <td width="80" class="TableHead1" align="center">
	  <?php if($res['HR_Approved']=='Y' AND ($res['Emp_CancelResig']==0 OR $res['Emp_CancelResig']==1)){ ?><a href="javascript:OpenClearanceF(<?php echo $res['EmpSepId'].', '.$EmployeeId;?>,'<?php echo $res['Rep_NOC'];?>')"><font color="#008000"><b>Click</b></font></a>
	  <?php } else { echo ''; }?>
	  </td>
	  <td width="200" class="TableHead1" align="center">
	  <?php if($res['HR_Approved']=='Y' AND ($res['Emp_CancelResig']==0 OR $res['Emp_CancelResig']==1)){ ?><?php if($res['Rep_ExitIntForm']=='Y'){echo '<font color="#000000"><b>Fill Ok /&nbsp;&nbsp;&nbsp;</b></font> ';}else{echo '<font color="#000000"><b>Not Fill /&nbsp;&nbsp;&nbsp;</b></font> ';} ?><a href="javascript:OpenExitIntF(<?php echo $res['EmpSepId'].', '.$EmployeeId;?>,'<?php echo $res['Rep_ExitIntForm'];?>')"><font color="#008000"><b>Click</b></font></a>
	  <?php } else { echo ''; }?>
	  </td>
     </tr>
<?php $sno++; } } ?>			  
   </table>
  </td>
 </tr>
  <tr>
 <td align="center" colspan="10" style="font-family:Times New Roman; font-size:15px; font-weight:bold;">
<?PHP doPages($offset, 'EmpNOCSeparation.php', '', $total_records); ?>
 </td>
</tr>  
   </table>
  </td>
  
 </tr>
</table>
</form>

		   </td>
		  </tr>
		</table>
<?php //*************************************************************************************************************************************************** ?>

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
$index_limit = 5;
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
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h></div>';
}
}
?>       
