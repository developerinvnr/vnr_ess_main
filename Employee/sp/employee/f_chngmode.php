<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; $s=$_REQUEST['s']; $md=$_REQUEST['md'];
$rsts=$_REQUEST['rsts'];

if($_REQUEST['action'] && $_REQUEST['action']=='cModeFA')
{ 

 $sn=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$EmployeeId,$con); 
 $rn=mysql_fetch_assoc($sn);  $Ename=$rn['Fname']." ".$rn['Sname']." ".$rn['Lname'];
 
 $sqlR=mysql_query("select * from hrm_employee_reporting where EmployeeID=".$EmployeeId,$con); 
 $resR=mysql_fetch_assoc($sqlR); $AppId=$resR['AppraiserId']; $RevId=$resR['ReviewerId']; $HodId=$resR['HodId']; 
 
 $sqlU=mysql_query("update fa_details set MdChngSts=1, MdChng2Sts=1, MdChng3Sts=1, Md_Prev=".$_REQUEST['modeo'].", Md_Curr=".$_REQUEST['modec'].", MdChngReqDate='".date("Y-m-d")."', MdChngRmk='".$_REQUEST['rmk']."', MdChngReqBy=".$EmployeeId.", MdChng_Reporting=".$AppId.", MdChng_Rev=".$RevId.", MdChng_Hod=".$HodId." where FaId=".$_REQUEST['fid'],$con);
 if($sqlU)
 {    
   $sqlRep=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$AppId,$con); $resRep=mysql_fetch_assoc($sqlRep);
   
   if($resRep['EmailId_Vnr']!='')
   {
    $eto3   =$resRep['EmailId_Vnr'];
    $efrom3 ='admin@vnrseeds.co.in';
    $esub3  ="Request for FA mode change";
    $ehead3 ="From: ".$efrom3."\r\n";  
    $ehead3.="MIME-Version: 1.0\r\n";
    $ehead3.="Content-Type: text/html; charset=ISO-8859-1\r\n";
    $emsg3 .="<html><head></head><body>";
    $emsg3 .="Dear <b>".$resRep['Fname'].' '.$resRep['Sname'].' '.$resRep['Lname']."</b> <br><br>\n\n\n";
    $emsg3 .="Your team member ".$Ename." has requested for FA mode change, for any action please go to FA portal.<br>\n\n";
    $emsg3 .="From <br><b>ADMIN ESS</b><br>";
    $emsg3 .="</body></html>";
    $ok3    = @mail($eto3,$esub3,$emsg3,$ehead3);
   } 
  echo '<script>alert("Mode change request send successfully..");</script>';
 } //if($sqlU)
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.cell {color:#000;font-family:Times New Roman;font-size:14px;font-weight:bold;}
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:12px;background-color:#97FFFF;height:22px;}
.htf2{font-family:Georgia;color:#FF80FF;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Georgia;font-size:12px;height:20px;color:#fff;}
.tdf2{font-family:Georgia;font-size:12px;height:20px;color:#000000;}
.InputSel {font-family:Georgia;font-size:12px;text-align:left; }
.InputSelAtt {font-family:Times New Roman;font-size:12px;text-align:left; }
.InputType {font-family:Georgia;font-size:12px;text-align:left; height:20px; border:hidden; }
.InputType2 {font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton {background-image:url(images/save.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">
function FunRef(m,y,s,hq,md,rsts){ window.location="f_chngmode.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }

function funstate(s,m,y,md,rsts)
{ window.location="f_chngmode.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq=0&dis=0&md="+md+"&rsts="+rsts; }
function funhq(hq,m,y,s,md,rsts)
{ window.location="f_chngmode.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }
function funmd(md,m,y,hq,s,rsts)
{ window.location="f_chngmode.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }

function funrsts(rsts,m,y,hq,s,md)
{ window.location="f_chngmode.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&rsts="+rsts; }


function ChangeFAMode(fid,m,y,hq,s,md,sn,rsts)
{ //alert(fid+"-"+m+"-"+y+"-"+hq+"-"+s+"-"+md+"-"+sn+"-"+rsts);
 var sourceString=document.getElementById("Rmk"+sn).value; 
 //var r = sourceString.replace(/[`~!@#$%^&*()_|+\-=???;:'",.<>\{\}\[\]\\\/]/gi,'');
 var rmk = sourceString.replace(/[`~!@#$^&*()|+\'",.<>\{\}\[\]\\\/]/gi,''); 
 //var gm=document.getElementById("gm").value;
 var modeo=document.getElementById("modeo"+sn).value; var modec=document.getElementById("modec"+sn).value;
 if(modec==0){alert("please select change mode type!"); return false;}  
 else if(rmk==''){alert("please type Reason/ Remark!"); return false;}
 else { var agree=confirm("Are you sure?"); if(agree){ window.location="f_chngmode.php?action=cModeFA&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&md="+md+"&fid="+fid+"&rmk="+rmk+"&rsts="+rsts+"&modeo="+modeo+"&modec="+modec+"&page="+document.getElementById('pg').value; } else {return false;} }
}

</Script>
</head>
<body class="body">
<span id="AttMsgSpan"></span>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login']=true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" width="100%" id="MainWindow">
<!DOCTYPE html>
<html>
<?php //***************START*****START*****START******START******START***************************?>

<input type="hidden" id="month" name="month" value="<?php echo $m; ?>" />
<input type="hidden" id="year" name="year" value="<?php echo $y; ?>" />
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr>
 <td valign="top" style="width:100%;">
 <table border="0" style="width:100%;">
 <tr>
<td style="width:100%;">
 <table border="0" style="width:100%;">
  <td style="width:100%;" valign="top">  
   <table border="0" cellpadding="0" cellspacing="1">
    <tr>
	 <td colspan="35">
	  <table border="0">
   <tr>
	<td>
	 <table border="0">
		<tr>
	    <td class="htf2" align="left"><u>Change FA-Mode Request</u>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	    <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px; width:60px;"><span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$md.','.$rsts; ?>)"><u>refresh</u></span></td>
		
	    <td class="tdf" align="center">&nbsp;</td>
		<input type="hidden" value="0" id="state" name="state"/>
		<input type="hidden" value="0" id="hq" name="hq"/>
		
		<td class="tdf">&nbsp;Mode</td>
	    <td style="width:120px;"><select style="width:120px;" class="InputSel" id="mode" name="mode" onChange="funmd(this.value,<?php echo $m.','.$y.','.$_REQUEST['hq'].','.$_REQUEST['s']; ?>,'<?php echo $rsts; ?>')">
	    <option value="0" <?php if($_REQUEST['md']==0){echo 'selected';}?>>select</option>
	    <option value="1" <?php if($_REQUEST['md']==1){echo 'selected';}?>>Direct(Sales Executive)</option>
	    <option value="2" <?php if($_REQUEST['md']==2){echo 'selected';}?>>Teamlease</option>
	    <option value="3" <?php if($_REQUEST['md']==3){echo 'selected';}?>>Distributor</option>
	    <option value="4" <?php if($_REQUEST['md']==4){echo 'selected';}?>>All</option></select></td>
	 
	    <td class="tdf">&nbsp;Status</td>
	    <td style="width:150px;"><select style="width:120px;" class="InputSel" id="rsts" name="rsts" onChange="funrsts(this.value,<?php echo $m.','.$y.','.$_REQUEST['hq'].','.$_REQUEST['s'].','.$_REQUEST['md']; ?>)">
        <option value="1" <?php if($_REQUEST['rsts']==1){echo 'selected';}?>>Request Sent/Draft</option>
        <option value="2" <?php if($_REQUEST['rsts']==2){echo 'selected';}?>>Pending</option>
        <option value="3" <?php if($_REQUEST['rsts']==3){echo 'selected';}?>>Approved</option>
        <option value="4" <?php if($_REQUEST['rsts']==4){echo 'selected';}?>>Reject</option>
        <option value="0" <?php if($_REQUEST['rsts']==0){echo 'selected';}?>>Without Request</option>
        <option value="All" <?php if($_REQUEST['rsts']=='All'){echo 'selected';}?>>All</option>
        </select></td>
	   </tr>
	  </table>
	 </td>
	</tr>
<?php if($_REQUEST['md']>0 OR $_REQUEST['rsts']>0){ ?>	
	<tr>
	 <td>
	  <table>
	  <tr style="height:22px;">
      <td colspan="7" class="htf">&nbsp;General Details</td>
      <td colspan="5" class="htf">Change Mode Request</td>
	  </tr>
	  <tr style="height:22px;">
      <td style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td style="width:120px;" class="htf">Name</td>
	  <td style="width:100px;" class="htf">Old Mode</td>
	  <td style="width:100px;" class="htf">Mode</td>
	  <td style="width:100px;" class="htf">HQ</td>
	  <td style="width:60px;" class="htf">Expense</td>
	  <td style="width:200px;" class="htf">Reporting</td>
	  <td style="width:100px;" class="htf">Change Mode</td>
	  <td style="width:150px;" class="htf">Reason/Remark</td>
	  <td style="width:50px;" class="htf">Action</td>
	  
	  <td style="width:70px;" class="htf">Date</td>
	  <td style="width:80px;" class="htf">Status</td>
	  </tr>
		
<?php 
if($_REQUEST['rsts']=='All')
{ 
 if($_REQUEST['md']==4){ $qry="1=1"; }
 elseif($_REQUEST['md']!=4){ $qry="Mode=".$_REQUEST['md'];}
}
else
{ 
 if($_REQUEST['md']==4){ $qry="RemoveSts=".$_REQUEST['rsts'].""; }
 elseif($_REQUEST['md']!=4){ $qry="RemoveSts=".$_REQUEST['rsts']." AND Mode=".$_REQUEST['md']; }
}

$result=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND ".$qry." AND (FaStatus='A' OR (FaStatus='D' AND MdChngSts=3)) order by FaId ASC",$con);

$total_records=mysql_num_rows($result);
if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
$offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; }
echo '<input type="hidden" id="pg" value='.$page.'/>';

$sql=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND ".$qry." AND (FaStatus='A' OR (FaStatus='D' AND MdChngSts=3)) order by FaId ASC LIMIT ".$from.",".$offset,$con);

      $sn=1; while($res=mysql_fetch_array($sql)){ $shq=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con);
	  $rhq=mysql_fetch_assoc($shq); ?>	 
<tr style="height:22px;" bgcolor="#FFFFFF" id="TR<?php echo $sn; ?>">
<td class="tdf2" align="center"><?php echo $sn; ?></td>
<td class="tdf2"><input class="InputType" style="width:120px;" id="name<?php echo $sn; ?>" value="<?php echo $res['FaName']; ?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:100px;" value="<?php if($res['MdChngSts']==3){ if($res['Md_Prev']==1){echo 'Direct(Sales Executive)';}elseif($res['Md_Prev']==2){echo 'Teamlease';}elseif($res['Md_Prev']==3){echo 'Distributor';} }?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:100px;" id="mode<?php echo $sn; ?>" value="<?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:100px;" id="Hq<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rhq['HqName'])); ?>" readonly/></td>

	 <td class="tdf2" align="right"><?php echo floatval($res['Salary']+$res['Expences']); ?>&nbsp;</td>
	 <td class="tdf2"><input class="InputType" style="width:200px;" id="rep<?php echo $sn; ?>" value="<?php $e=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); echo ucfirst(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])); ?>" readonly/></td>
	 	 	
	<td class="tdf2"><select style="width:100px;" class="InputSel" id="modec<?php echo $sn; ?>"><?php if($res['MdChngSts']>0){ if($res['Md_Curr']==1){$mode='Direct(Sales Executive)';}elseif($res['Md_Curr']==2){$mode='Teamlease';}elseif($res['Md_Curr']==3){$mode='Distributor';} ?><option value='<?php echo $res['Md_Curr'];?>' selected><?php echo $mode;?></option><?php } else { ?><option value='0' selected>Select</option><?php } ?>
<?php if($res['Mode']!=1){?><option value='1'>Direct(Sales Executive)</option><?php } ?>
<?php if($res['Mode']!=2){?><option value='2'>Teamlease</option><?php } ?>
<?php if($res['Mode']!=3){?><option value='3'>Distributor</option><?php } ?>
</select><input type="hidden" id="modeo<?php echo $sn; ?>" value="<?php echo $res['Mode']; ?>"/></td>		
     
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="Rmk<?php echo $sn; ?>" value="<?php echo $res['MdChngRmk']; ?>"/></td>
	
	 <td class="tdf2" align="center"><?php if($res['MdChngSts']==0){ ?><span style="cursor:pointer;color:#0B51F4;" onClick="ChangeFAMode(<?php echo $res['FaId'].','.$_REQUEST['m'].','.$_REQUEST['y'].','.$_REQUEST['hq'].','.$_REQUEST['s'].','.$_REQUEST['md'].','.$sn;?>,'<?php echo $_REQUEST['rsts']; ?>')"><u>Send</u></span><?php } ?></td> 
	 
	 <td class="tdf2" align="center"><?php if($res['MdChngSts']>0){ echo date("d-m-Y",strtotime($res['MdChngReqDate'])); } ?></td>
	 <td class="tdf2" align="center"><?php if($res['MdChngSts']==1){echo 'Req. Sent';}elseif($res['MdChngSts']==2){echo '<font color="#FF8040">Pending</font>';}elseif($res['MdChngSts']==3){echo '<font color="#1C951F">Approved</font>';}elseif($res['MdChngSts']==4){echo '<font color="#FF0000">Reject</font>';} ?></td>	 
	</tr> 
<?php $sn++; } ?>
   <tr>
    <td colspan="2"></td>
    <td colspan="11" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
     <?php doPages($offset, 'f_chngmode.php', '', $total_records,$_REQUEST['hq'],$_REQUEST['s'],$_REQUEST['m'],$_REQUEST['y'],$_REQUEST['md'],$_REQUEST['rsts']); ?>
    </td>
   </tr>
<?php } ?> 


<?php /******************************** TeamLease Open **********************/ ?>
<?php /******************************** TeamLease Open **********************/ ?>
 <?php $sql=mysql_query("select * from fa_details fd inner join hrm_sales_tlemp tle on fd.Reporting=tle.TLEId where tle.TLRepId=".$EmployeeId." AND (FaStatus='A' OR (FaStatus='D' AND RemoveSts=3)) order by FaId ASC",$con); $row=mysql_num_rows($sql); if($row>0){ ?>

<tr style="height:22px;"><td colspan="12" class="htf"></td></tr> 
<?php $sn2=101; $no2=1; while($res=mysql_fetch_array($sql)){ $shq=mysql_query("select CountryName,StateName,HqName,s.CountryId,h.StateId from hrm_headquater h inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where h.HqId=".$res['HqId'], $con);
	  $rhq=mysql_fetch_assoc($shq); ?>	 
<tr style="height:22px;" bgcolor="#FFFFFF" id="TR<?php echo $sn2; ?>">
<td class="tdf2" align="center"><?php echo $no2; ?></td>
<td class="tdf2"><input class="InputType" style="width:120px;" id="name<?php echo $sn2; ?>" value="<?php echo $res['FaName']; ?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:100px;" value="<?php if($res['MdChngSts']==3){ if($res['Md_Prev']==1){echo 'Direct(Sales Executive)';}elseif($res['Md_Prev']==2){echo 'Teamlease';}elseif($res['Md_Prev']==3){echo 'Distributor';} }?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:100px;" id="mode<?php echo $sn2; ?>" value="<?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?>" readonly/></td>
<td class="tdf2"><input class="InputType" style="width:100px;" id="Hq<?php echo $sn2; ?>" value="<?php echo ucfirst(strtolower($rhq['HqName'])); ?>" readonly/></td>

	 <td class="tdf2" align="right"><?php echo floatval($res['Salary']+$res['Expences']); ?>&nbsp;</td>
	 <td class="tdf2"><input class="InputType" style="width:200px;" id="rep<?php echo $sn2; ?>" value="<?php $e=mysql_query("select TLName from hrm_sales_tlemp where TLEId=".$res['Reporting'],$con); $re=mysql_fetch_assoc($e); echo ucfirst(strtolower($re['TLName'])); ?>" readonly/></td>
	 	 	
	<td class="tdf2"><select style="width:100px;" class="InputSel" id="modec<?php echo $sn2; ?>"><?php if($res['MdChngSts']>0){ if($res['Md_Curr']==1){$mode='Direct(Sales Executive)';}elseif($res['Md_Curr']==2){$mode='Teamlease';}elseif($res['Md_Curr']==3){$mode='Distributor';} ?><option value='<?php echo $res['Md_Curr'];?>' selected><?php echo $mode;?></option><?php } else { ?><option value='0' selected>Select</option><?php } ?>
<?php if($res['Mode']!=1){?><option value='1'>Direct(Sales Executive)</option><?php } ?>
<?php if($res['Mode']!=2){?><option value='2'>Teamlease</option><?php } ?>
<?php if($res['Mode']!=3){?><option value='3'>Distributor</option><?php } ?>
</select><input type="hidden" id="modeo<?php echo $sn2; ?>" value="<?php echo $res['Mode']; ?>"/></td>		
     
	 <td class="tdf2"><input class="InputType" style="width:150px;" id="Rmk<?php echo $sn2; ?>" value="<?php echo $res['MdChngRmk']; ?>"/></td>
	
	 <td class="tdf2" align="center"><?php if($res['MdChngSts']==0){ ?><span style="cursor:pointer;color:#0B51F4;" onClick="ChangeFAMode(<?php echo $res['FaId'].','.$_REQUEST['m'].','.$_REQUEST['y'].','.$_REQUEST['hq'].','.$_REQUEST['s'].','.$_REQUEST['md'].','.$sn2;?>,'<?php echo $_REQUEST['rsts']; ?>')"><u>Send</u></span><?php } ?></td> 
	 
	 <td class="tdf2" align="center"><?php if($res['MdChngSts']>0){ echo date("d-m-Y",strtotime($res['MdChngReqDate'])); } ?></td>
	 <td class="tdf2" align="center"><?php if($res['MdChngSts']==1){echo 'Req. Sent';}elseif($res['MdChngSts']==2){echo '<font color="#FF8040">Pending</font>';}elseif($res['MdChngSts']==3){echo '<font color="#1C951F">Approved</font>';}elseif($res['MdChngSts']==4){echo '<font color="#FF0000">Reject</font>';} ?></td>	 
	</tr> 
<?php $sn2++; $no2++; } } ?>
<?php /**************************** Teamlease Close **************************/ ?>
<?php /**************************** Teamlease Close **************************/ ?>


    
    
	  </table>
	 </td>
	</tr>
	
 </table>
</td>
</tr>
	   
   </table>
  </td>
 </table>
</td>  
  </tr>
  
 </table>
 </td>
</tr>
</table>	

<?php //*****************END*****END*****END******END******END**************************?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
<?php function check_integer($which){ if(isset($_REQUEST[$which])){ if (intval($_REQUEST[$which])>0){ return intval($_REQUEST[$which]); } else { return false; } } return false; }
function get_current_page(){ if(($var=check_integer('page'))) { return $var; } else { return 1; } }
function doPages($page_size, $thepage, $query_string, $total=0,$hq,$s,$m,$y,$md,$rsts){ $index_limit = 5; $query=''; if(strlen($query_string)>0){ $query = "&amp;".$query_string; }
$current = get_current_page(); $total_pages=ceil($total/$page_size); $start=max($current-intval($index_limit/2), 1); $end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1){ echo '<span class="prn">&lt; Previous</span>&nbsp;';}else{ $i = $current-1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$rsts.'&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;">&lt; Previous</a>&nbsp;'; echo '<span class="prn">...</span>&nbsp;';}
if($start > 1){ $i = 1; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$rsts.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; }
for($i = $start; $i <= $end && $i <= $total_pages; $i++)
{ if($i==$current){ echo '<span>'.$i.'</span>&nbsp;';} else { echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$rsts.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } }
if($total_pages > $end){ $i = $total_pages; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$rsts.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } if($current < $total_pages) { $i = $current+1; echo '<span class="prn">...</span>&nbsp;'; echo '<a href="'.$thepage.'?page='.$i.$query.'&hq='.$hq.'&s='.$s.'&m='.$m.'&y='.$y.'&md='.$md.'&rsts='.$rsts.'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;" style="color:#A6D2FF;">Next &gt;</a>&nbsp;'; } else { echo '<span class="prn">Next &gt;</span>&nbsp;'; } if ($total != 0){ echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#A6D2FF"<h4>[Total '.$total.' Records]</h></div>'; }
}
?>