<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************

//Region
if(isset($_POST['SaveNew']))
{  
 $SqlInseart = mysql_query("INSERT INTO hrm_sales_region(RegionName, ZoneId, crby, crdate) VALUES('".$_POST['RegionName']."','".$_POST['ZoneId']."', ".$UserId.", '".date('Y-m-d')."')", $con);  
 if($SqlInseart){ $msg2 = "Data has been Inserted successfully..."; }
}

if(isset($_POST['SaveEdit']))
{ 

 $SqlUpdate = mysql_query("UPDATE hrm_sales_region SET RegionName='".$_POST['RegionName']."', ZoneId='".$_POST['ZoneId']."', crby=".$UserId.", crdate='".date("Y-m-d")."' WHERE RegionId=".$_POST['RegionId'], $con) or die(mysql_error());  
 if($SqlUpdate){$msg2="Data has been Updeted successfully...";}
}

if($_REQUEST['action']=='delete')
{ 

 $SqlDel = mysql_query("update hrm_sales_region set sts='D' WHERE RegionId=".$_REQUEST['eid'], $con);  
 if($SqlDel){$msg2="Data has been Deleted successfully...";}
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.th{ font-family:Times New Roman;font-size:14px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:14px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:14px;text-align:center; }
.thh{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdll{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdcc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; width:100px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>

<Script>
//HQ
 
function edit_Hq(sn,d)
{ 
 //var agree=confirm("Are you sure you want to edit this record?");
 //if(agree)
 //{
  document.getElementById('Edit_'+sn).style.display='none'; document.getElementById('Save_'+sn).style.display='block';
  document.getElementById('RegionId'+sn).disabled=false;
 //}
}  

function SaveVhqR(sn,u,c)
{ 
 var IId=document.getElementById('IId'+sn).value;var DepartmentId=document.getElementById('DepartmentId'+sn).value;
 var VerticalId=document.getElementById('VerticalId'+sn).value; var HqId=document.getElementById('HqId'+sn).value;
 var RegionId=document.getElementById('RegionId'+sn).value; 
 if(RegionId==0){ alert("please enter Region name field.");  return false; }
 var url = 'ZoneRegionAjax.php'; var pars = 'Sn='+sn+'&C='+c+'&U='+u+'&IId='+IId+'&DepartmentId='+DepartmentId+'&VerticalId='+VerticalId+'&HqId='+HqId+'&RegionId='+RegionId+'&act=UpdHqVDepReg'; var myAjax = new Ajax.Request(
	url, { method: 'post', parameters: pars, onComplete: show_NewRst });
} 
function show_NewRst(originalRequest)
{ document.getElementById('RstSpan').innerHTML = originalRequest.responseText; 
  var sn=document.getElementById('ActSn').value;
  if(document.getElementById('ActRest').value==1)
  { alert('success'); 
    document.getElementById('Edit_'+sn).style.display='block'; document.getElementById('Save_'+sn).style.display='none';
	document.getElementById('RegionId'+sn).disabled=true;
	document.getElementById('RegionId'+sn).style.background='#EAEAEA';
  }
  else{ alert('error'); }
}



//Region
function edit(value){ var agree=confirm("Are you sure you want to edit this record?");
if(agree){ var x = "ZoneRegion.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=edit&eid="+value+"&d=0";  window.location=x;}}

function del(value){ var agree=confirm("Are you sure you want to delete this record?");
if(agree){ var x = "ZoneRegion.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&action=delete&eid="+value+"&d=0";  window.location=x;}}

function newsave(){ var x = "ZoneRegion.php?action=newsave&act=checkdept&d=23&rr=false&rr=98&ff=23&dd=3&&d=0";  
window.location=x;}

function validateEdit(formEdit){
//   var RegionName = formEdit.RegionName.value; var filter=/^[a-zA-Z. /]+$/; var test_bool4 = filter.test(RegionName);
//   if (RegionName.length === 0) { alert("please enter region name field.");  return false; } 
//   if(test_bool4==false) { alert('Please enter only alphabets in the region name Field');  return false; } 
return true;
}   

function SelDept(v,t)
{
 window.location="ZoneRegion.php?actty=true&opt=false&vlu=45&vt_v="+v+"&vt_t="+t+"&sec=comback&ee=%rr%&ff=true&r2r=true&d=0";
}
                   
</SCRIPT> 
</head>
<body class="body">
<span id="RstSpan"></span>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************?>
<?php //****************START*****START*****START******START******START*************************?>
<?php //*****************************************************************************?>

<table style="width:100%;">
<tr>
 <td style="width:50%;vertical-align:top;">
<!-- 111111111111111111111111111111111111111111111111111111111 Open -->
<!-- 111111111111111111111111111111111111111111111111111111111 Open -->
<table border="0" style="margin-top:0px;width:100%;">
<?php if($_SESSION['login'] = true){ ?>	
 <tr>
  <td style="width:2px;">&nbsp;</td>
  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
 </tr>
  
<tr>
<td colspan="5" align="left" id="type" valign="top">             
 <table border="0" width="100%">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>	  
 <tr>
  <td>&nbsp;&nbsp;
<input type="button" name="NewSave" id="NewSave" style="width:80px;" value="new" onClick="newsave_Hq(<?php echo $_REQUEST['d'];?>)" <?php if($_REQUEST['action']=="newsave_Hq" OR $_REQUEST['action']=="edit_Hq"){ echo "style=display:none;"; }?> disabled="disabled"/>
<input type="button" name="back" id="back" style="width:80px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refresh" style="width:80px;" value="refresh" onClick="javascript:window.location='ZoneRegion.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&d=<?=$_REQUEST['d'];?>&ed=4'"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name="DepartmentId" id="DepartmentId" onChange="SelDept(this.value,'D')" style="width:150px; background-color:#CBFF97;">
<option value="">Select Department</option>
  <?php $sqlSt=mysql_query("select * from hrm_department where DeptStatus='A' AND CompanyId=".$CompanyId." order by DepartmentName ASC", $con); 
      while($resSt=mysql_fetch_array($sqlSt)){ ?><option value="<?=$resSt['DepartmentId']?>" <?php if($_REQUEST['vt_v']==$resSt['DepartmentId']){ echo 'selected';} ?>)>&nbsp;<?=$resSt['DepartmentName']?></option><?php } ?>
  </select>
  </td>
 </tr>
<?php } ?> 
  <tr>
   <td align="left" width="100%">
<table border="1" width="100%" bgcolor="#FFFFFF" cellspacing="1">
 
 <tr bgcolor="#7a6189" style="height:25px;">
  <td colspan="5" class="th"><b>Head Quarter</b></td>
 </tr>
 <tr bgcolor="#7a6189" style="height:25px;">
  <td class="th" style="width:5%;"><b>Sn</b></td>
  <td class="th" style="width:20%;"><b>Hq Name</b></td>
  <td class="th" style="width:20%;"><b>Vertical Name</b></td>
  <td class="th" style="width:20%;"><b>Region Name</b></td>
  <td class="th" style="width:5%;"><b>Action</b></td>
 </tr>

<?php 

if($_REQUEST['vt_v']!='')
{
 $subQ='g.DepartmentId='.$_REQUEST['vt_v'];  
}
else{ $subQ='1=1'; }


if($_REQUEST['vt_v']>0)
{

$sqlRat=mysql_query("select g.EmpVertical, g.HqId, g.DepartmentId, hq.HqName, v.VerticalName from hrm_employee_general g inner join hrm_headquater hq on g.HqId=hq.HqId inner join hrm_department_vertical v on g.EmpVertical=v.VerticalId where hq.HQStatus='A' AND hq.CompanyId=".$CompanyId." AND ".$subQ." group by g.HqId,g.EmpVertical order by HqName,VerticalName ", $con); 
      $SNo=1; while($resRat=mysql_fetch_array($sqlRat)) {
	  
	  $sqlRat2=mysql_query("select VHqId,rh.RegionId,RegionName from hrm_sales_verhq rh inner join hrm_sales_region r on rh.RegionId=r.RegionId where HqId=".$resRat['HqId']." AND Vertical=".$resRat['EmpVertical']." AND DeptId=".$resRat['DepartmentId']." AND CompanyId=".$CompanyId, $con); 
	  $resRat2=mysql_fetch_assoc($sqlRat2);
	  
?>
<form name="formEdit" method="post" onSubmit="return validate2Edit(this)">	
 <tr style="height:24px;">
  <td class="tdc"><?php echo $SNo; ?></td>
  <td class="tdl"><input name="Hq" id="Hq" class="EditInput" style="width:99%;border:hidden;" value="<?php echo $resRat['HqName']; ?>" /><input type="hidden" name="HqId<?=$SNo?>" id="HqId<?=$SNo?>" value="<?php echo $resRat['HqId']; ?>" /></td>
  <td class="tdc"><input name="Vertical" id="Vertical" class="EditInput" style="width:99%;border:hidden;" value="<?php echo $resRat['VerticalName']; ?>" /><input type="hidden" name="VerticalId<?=$SNo?>" id="VerticalId<?=$SNo?>" value="<?php echo $resRat['EmpVertical']; ?>" /></td>
  <td class="tdc"><select name="RegionId<?=$SNo?>" id="RegionId<?=$SNo?>" class="tdinput" style="width:99%;" disabled="disabled">
  <option value="0" <?php if($resRat['RegionId']==0){echo 'selected';}?>>&nbsp;Select</option>
  <?php $sqlReg=mysql_query("select r.*,ZoneName from hrm_sales_region r inner join hrm_sales_zone z on r.ZoneId=z.ZoneId where sts='A' order by RegionName ASC", $con); 
      while($resReg=mysql_fetch_array($sqlReg)){ ?><option value="<?=$resReg['RegionId']?>" <?php if($resRat2['RegionId']==$resReg['RegionId']){echo 'selected';}?>>&nbsp;<?=$resReg['RegionName'].' - '.$resReg['ZoneName']?></option><?php } ?>
  </select>
  
  <input type="hidden" name="Sn" id="Sn"  value="<?=$SNo?>" />
  <input type="hidden" name="DepartmentId<?=$SNo?>" id="DepartmentId<?=$SNo?>"  value="<?php echo $_REQUEST['vt_v']; ?>" />
  <input type="hidden" name="IId<?=$SNo?>" id="IId<?=$SNo?>" value="<?php if($resRat2['VHqId']>0){echo $resRat2['VHqId']; }else{ echo 0; }?>" /><input type="hidden" name="HqId" id="HqId" value="<?php echo $_REQUEST['eid_Hq']; ?>"/>
  </td>
  
  <td align="center" style="cursor:pointer;"><?php if($_SESSION['User_Permission']=='Edit'){ ?>
<img src="images/edit.png" border="0" id="Edit_<?=$SNo?>" alt="Edit" onClick="edit_Hq(<?php echo $SNo.','.$_REQUEST['vt_v']; ?>)"><img src="images/save.gif" border="0" alt="Save" id="Save_<?=$SNo?>" onClick="SaveVhqR(<?=$SNo.','.$UserId.','.$CompanyId?>)" style="display:none;"><?php } ?></td>
 </tr>
</form>

<?php $SNo++; } 

} //if($_REQUEST['vt_v']>0)
?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>

 </table>
 </td>
</tr>

  </table>  
</td>
 </tr>
<?php } ?> 
</table>
<!--111111111111111111111111111111111111111111111111111111111 Close -->
<!--111111111111111111111111111111111111111111111111111111111 Close --> 
 </td>
 
 <td style="width:2%;">&nbsp;</td>
 
 <td style="width:40%;vertical-align:top;">
<!--222222222222222222222222222222222222222222222222222222222 Open -->
<!--222222222222222222222222222222222222222222222222222222222 Open -->
<table border="0" style="margin-top:0px;width:100%;height:300px;">
<?php if($_SESSION['login'] = true){ ?>	
 <tr>
  <td style="width:2px;">&nbsp;</td>
  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg2; ?></b></td>
 </tr>
  
<tr>
<td colspan="5" align="left" id="type" valign="top">             
 <table border="0" width="100%">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>	  
<tr>
<td>&nbsp;&nbsp;
<input type="button" style="width:80px;" name="NewSave" id="NewSave" value="new" onClick="newsave(<?php echo $_REQUEST['d']; ?>)" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:80px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refresh" style="width:80px;" value="refresh" onClick="javascript:window.location='ZoneRegion.php?actty=true&opt=false&vlu=45&sec=comback&ee=%rr%&ff=true&r2r=true&d=<?=$_REQUEST['d'];?>&ed=4'"/>
</td>
</tr>
<?php } ?> 
  <tr>
   <td align="left" width="100%">
<table border="1" width="100%" bgcolor="#FFFFFF" cellspacing="1">
 <tr bgcolor="#7a6189" style="height:25px;">
  <td colspan="4" class="th"><b>Region</b></td>
 </tr>
 <tr bgcolor="#7a6189" style="height:25px;">
  <td class="th" style="width:5%;"><b>Sn</b></td>
  <td class="th" style="width:30%;"><b>Region Name</b></td>
  <td class="th" style="width:20%;"><b>Zone Name</b></td>
  <td class="th" style="width:5%;"><b>Action</b></td>
 </tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<input type="hidden" id="DeptId" name="DeptId" value="0" /> 
<tr>
 <td class="tdc"><?php //echo $SNo; ?></td>
 <td class="tdc"><input name="RegionName" id="RegionName" class="EditInput" style="width:99%;"/></td> 
  <td class="tdc"><select name="ZoneId" id="ZoneId" class="tdinputl" style="width:99%;">
  <?php $sqlZon=mysql_query("select * from hrm_sales_zone order by ZoneName ASC", $con); 
      while($resZon=mysql_fetch_array($sqlZon)){ ?>
	  <option value="<?=$resZon['ZoneId']?>">&nbsp;<?=$resZon['ZoneName']?></option><?php } ?>
  </select>
  </td>
 
 <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveNew"  value="" class="SaveButton">&nbsp;<?php } ?></td>
</tr>
</form>
<?php } ?>     
 
<?php $sqlRat=mysql_query("select r.*,z.ZoneName from hrm_sales_region r inner join hrm_sales_zone z on r.ZoneId=z.ZoneId where r.sts='A' order by r.RegionName ASC", $con); 
      $SNo=1; while($resRat=mysql_fetch_array($sqlRat)) {
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resRat['RegionId']){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
 <tr style="height:24px;">
  <td class="tdc"><?php echo $SNo; ?></td>
  <td class="tdl"><input name="RegionName" id="RegionName" class="EditInput" style="width:99%;border:hidden;" value="<?php echo $resRat['RegionName']; ?>" /></td>
  
  <td class="tdc"><select name="ZoneId" id="ZoneId" class="tdinput" style="width:99%;">
  <option value="0" <?php if($resRat['ZoneId']==0){echo 'selected';}?>>&nbsp;Select</option>
  <?php $sqlZon=mysql_query("select * from hrm_sales_zone order by ZoneName ASC", $con); 
      while($resZon=mysql_fetch_array($sqlZon)){ ?><option value="<?=$resZon['ZoneId']?>" <?php if($resRat['ZoneId']==$resZon['ZoneId']){echo 'selected';}?>>&nbsp;<?=$resZon['ZoneName']?></option><?php } ?>
  </select>
  </td>
  
  <td class="tdc"><input type="hidden" id="ed" name="ed" value="<?php echo $_REQUEST['d']; ?>" />  
<?php if($_SESSION['User_Permission']=='Edit'){ ?>&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="RegionId" id="RegionId" value="<?php echo $_REQUEST['eid']; ?>"/><?php } ?></td>
 </tr>
</form>

<?php } else { ?>	 
<tr style="height:24px;">
 <td class="tdc"><?php echo $SNo; ?></td>
 <td class="tdl">&nbsp;<?php echo $resRat['RegionName']; ?></td>
 <td class="tdl">&nbsp;<?php echo $resRat['ZoneName']; ?></td>
 <td class="tdc"><?php if($_SESSION['User_Permission']=='Edit'){ ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resRat['RegionId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resRat['RegionId']; ?>)"></a><?php } ?></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>



 </table>
 </td>
</tr>

  </table>  
</td>
 </tr>
<?php } ?> 
</table>
<!--222222222222222222222222222222222222222222222222222222222 Close -->
<!--222222222222222222222222222222222222222222222222222222222 Close --> 
</td> 
</tr>
</table>



<?php //***********************************************************************************************?>
<?php //*******************END*****END*****END******END******END************************?>
<?php //****************************************************************************?>
	  </td>
	</tr>  </table>
 </td>
</tr>
</table>
</body>
</html>


