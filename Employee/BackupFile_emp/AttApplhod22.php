<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function ActClick(Id,m,y,a)
{
 var win = window.open("AttApplReqhAct.php?id="+Id,"AttForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=550");  
}

function FunChang(a,m,y)
{ window.location="AttApplhod.php?m="+m+"&Y="+y+"&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a="+a; }


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
			 <td><table border="0"><tr>
			 <td class="TableHead"><font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Application For Attendance Authorisation</b></i></font>&nbsp;&nbsp;</td>
			 <?php if($rowApp>0) { ?><td align="center"><a href="AttApplRep.php?m=<?php echo $_REQUEST['m']; ?>&Y=<?php echo $_REQUEST['Y'];?>&e=4e&w=234&tt=10234&aa=f&e=4e2&e=4e&retd=ee&wwrew=t%T@sed818&d=101&a=0"><img style="display:block;" src="images/RepMgr1.png" border="0"/></a></td><?php } ?>
<?php if($rowHod>0) { ?><td align="center"><a href="#"><img id="Img_hod1" style="display:block;" src="images/Revhod.png" border="0"/></a>
		     </td><?php } ?>
<?php if($_REQUEST['a']==0){$a='All Status';}elseif($_REQUEST['a']==1){$a='Peding';}elseif($_REQUEST['a']==2){$a='Submitted';} ?>			 
			 <td><select style="width:100px;font-size:14px;font-family:Times New Roman;" onChange="FunChang(this.value,<?php echo $_REQUEST['m'].','.$_REQUEST['Y'];?>)"><option value="<?php echo $_REQUEST['a']; ?>" selected><?php echo $a; ?></option>
			 <option value="1">Pending</option>
			 <option value="2">Submitted</option>
			 <option value="0">All</option>
			 </select></td>
			 
			 
			 </tr></table></td>
			</tr>
			<tr>
			 <td>
			   <table border="1">
            <tr bgcolor="#7a6189" style="height:22px;">
		     <td width="30" class="TableHead" align="center"><b>Sno</b></td>
		     <td width="50" class="TableHead" align="center"><b>EC</b></td>
		     <td width="250" class="TableHead" align="center"><b>Name</b></td>
			 <td width="80" class="TableHead" align="center"><b>Date</b></td>
			 <td width="80" class="TableHead" align="center"><b>In Time</b></td>
			 <td width="80" class="TableHead" align="center"><b>Out Time</b></td>
		     <td width="100" class="TableHead" align="center"><b>Status</b></td>
			 <td width="100" class="TableHead" align="center"><b>Details</b></td>
		   </tr>
<?php  if($_REQUEST['a']==0){$query="select * from hrm_employee_attendance_req where (HId=".$EmployeeId." OR HtId=".$EmployeeId.")"; }elseif($_REQUEST['a']==1){$query="select * from hrm_employee_attendance_req where Status=0 AND (HId=".$EmployeeId." OR HtId=".$EmployeeId.")"; }elseif($_REQUEST['a']==2){$query="select * from hrm_employee_attendance_req where Status=1 AND HId=".$EmployeeId;}
$sql_statement = mysql_query($query,$con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}

if($_REQUEST['a']==0){$query2="select * from hrm_employee_attendance_req where HId=".$EmployeeId." order by AttDate DESC LIMIT " . $from . "," . $offset; }elseif($_REQUEST['a']==1){$query2="select * from hrm_employee_attendance_req where Status=0 AND HId=".$EmployeeId." order by AttDate DESC LIMIT " . $from . "," . $offset; }elseif($_REQUEST['a']==2){$query2="select * from hrm_employee_attendance_req where Status=1 AND HId=".$EmployeeId." order by AttDate DESC LIMIT " . $from . "," . $offset; }
$sql = mysql_query($query2,$con);

$row=mysql_num_rows($sql_statement); if($row>0){ 
if($_REQUEST['page']==1){$sno=1;} elseif($_REQUEST['page']==2){$sno=11;} elseif($_REQUEST['page']==3){$sno=21;}
elseif($_REQUEST['page']==4){$sno=31;} elseif($_REQUEST['page']==5){$sno=41;} elseif($_REQUEST['page']==6){$sno=51;} elseif($_REQUEST['page']==7){$sno=61;} elseif($_REQUEST['page']==8){$sno=71;} elseif($_REQUEST['page']==9){$sno=81;}elseif($_REQUEST['page']==10){$sno=91;} else{$sno=1;}
	  while($res=mysql_fetch_array($sql)){	

$sqla = mysql_query("select Inn,Outt,InnLate,OuttLate from hrm_employee_attendance where EmployeeID=".$res['EmployeeID']." AND AttDate='".$res['AttDate']."'", $con); $resa=mysql_fetch_array($sqla);  
	    
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmployeeID=".$res['EmployeeID'], $con); 
$resE=mysql_fetch_assoc($sqlE); ?>	

		<tr>
<td class="TableHead1" align="center"><?php echo $sno; ?></td>
<td class="TableHead1" align="center"><?php echo $resE['EmpCode']; ?></td>
<td class="TableHead1" align="left"><?php echo ucfirst(strtolower($resE['Fname'])).' '.ucfirst(strtolower($resE['Sname'])).' '.ucfirst(strtolower($resE['Lname'])); ?></td>
<td class="TableHead1" align="center"><?php echo date("d-m-Y", strtotime($res['AttDate'])); ?></td>
<td class="TableHead1" align="center"><font style="color:<?php //if($resa['InnLate']==1){echo '#FF0000';}?>;"><?php if($resa['Inn']!='00:00:00' AND $resa['Inn']!=''){ echo date("h:i",strtotime($resa['Inn'])); } ?></font></td>
<td class="TableHead1" align="center"><font style="color:<?php //if($resa['OuttLate']==1){echo '#FF0000';}?>;"><?php if($resa['Outt']!='00:00:00' AND $resa['Outt']!=''){ echo date("h:i",strtotime($resa['Outt'])); } ?></font></td>
<td class="TableHead1" align="center"><?php if($res['Status']==0){echo 'Pending';}elseif($res['Status']==1){echo '<font color="#009500">Submitted</font>';} ?></td>	
<td class="TableHead1" align="center"><span style="cursor:pointer;color:#0061C1;" onClick="ActClick(<?php echo $res['AttRqId'].','.$_REQUEST['m'].','.$_REQUEST['Y'].','.$_REQUEST['a']; ?>)"><u>Click</u></span></td>

		</tr>  
<?php $sno++; } } ?>					  
	
              </table>
			 </td>
			</tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold; ">
<?PHP doPages($offset, 'AttApplHod.php', '', $total_records); ?>
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
echo '<a href="'.$thepage.'?page='.$i.$query.'&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a='.$_REQUEST['a'].'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a='.$_REQUEST['a'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a='.$_REQUEST['a'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a='.$_REQUEST['a'].'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101&a='.$_REQUEST['a'].'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h4></font></div>';
}
}
?>
