<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if($_REQUEST['act']=='save_edit')
{
 $sqlUp=mysql_query("update hrm_api_notification set Notification='".addslashes($_REQUEST['Tn'])."', Tital='".addslashes($_REQUEST['Tital'])."', Fdate='".date("Y-m-d",strtotime($_REQUEST['Tf']))."', Tdate='".date("Y-m-d",strtotime($_REQUEST['Tt']))."', Sts='".$_REQUEST['Ts']."', CrBy=".$UserId.", CrDate='".date("Y-m-d")."' where NotiId=".$_REQUEST['id'],$con);
 
 
 
 if($sqlUp){ echo '<script>alert("Data updated successfully!"); window.location="Apps_notification.php";</script>'; }
 else{ echo '<script>alert("Error!");</script>';}
}
elseif($_REQUEST['act']=='save_new')
{
 $sqlUp=mysql_query("insert into hrm_api_notification(Notification, Tital, Fdate, Tdate, Sts, CompanyId, CrBy, CrDate, SysDate) values('".addslashes($_REQUEST['Tn'])."', '".addslashes($_REQUEST['Tital'])."', '".date("Y-m-d",strtotime($_REQUEST['Tf']))."', '".date("Y-m-d",strtotime($_REQUEST['Tt']))."', '".$_REQUEST['Ts']."', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."', '".date("Y-m-d")."')",$con);
 if($sqlUp){ echo '<script>alert("Data inserted successfully!"); window.location="Apps_notification.php"; </script>'; }
 else{ echo '<script>alert("Error!");</script>';}
}

elseif($_REQUEST['act']=='UpdateNoti')
{

 $sqlU=mysql_query("update hrm_api_notification_push set Noti_Msg='".addslashes($_REQUEST['msg'])."', Sts='".$_REQUEST['sts']."', crby=".$UserId.", crdate='".date("Y-m-d")."' where Nid=".$_REQUEST['n'],$con);
 if($sqlU)
 {
  echo '<script>alert("Notification updated successfully"); window.location="Apps_notification.php";</script>';
 } 
}

?>


<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:18px;} .All_80{font-size:11px; height:18px; width:80px;} .All_50{font-size:11px; height:18px; width:50px;} .All_100{font-size:11px; height:18px; width:100px;} .All_120{font-size:11px; height:18px; width:120px;} .All_150{font-size:11px; height:18px; width:150px;}.All_200{font-size:11px; height:18px; width:200px;} .All_350{font-size:11px; height:18px; width:350px;} .th{font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;color:#FFFFFF; background-color:#376A9D;height:26px;} 
.tdl{font-family:Times New Roman;font-size:14px;color:#000000;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;color:#000000;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.selecti{font-family:Times New Roman;font-size:12px;background-color:#DDFFBB;}
.inner_table{height:550px;overflow-y:auto;width:auto;}
.inp{ font-family:Times New Roman;font-size:12px;color:#000000;width:100%; border:hidden; height:22px;}
.inpc{ font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;width:100%; border:hidden;height:22px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">
//$(document).ready(function () { $("#table1").freezeHeader({ 'height': '480px' }); })
</Script>     
</head>

<body class="body">
<table class="table">
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
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //*******************************************************************************************?>
<?php //****************START*****START*****START******START******START*************************************?>
<?php //*******************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%;">
	<tr>
     <td colspan="5" style="width:100%;" class="heading">
      Ess-Mobile Apps Notification
     </td>
	</tr>
	
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
<?php /*********** One OneOne OneOne OneOne OneOne OneOne OneOne OneOne OneOne One ***/ ?>
<tr>	
 <td width="100%" valign="top">
 <table border="0" width="80%">
  
  <tr>
   <td>
   <table border="0">
	<tr>
     <td style="width:350px; font-size:18px;color:#006F00;font-family:Times New Roman;">
	 Popup - Notification in Apps &nbsp;&nbsp;&nbsp;&nbsp;
	 <a href="#" onClick="FunClick('A',0)" style="font-size:12px;">Add New</a>
	 </td>
	</tr>
   </table>
   </td>
  </tr>
  <tr>
   <td valign="top" style="width:60%;"> 
   <table border="1" id="table1" cellspacing="1" style="width:100%;">
    <div class="thead">
    <thead>
    <tr bgcolor="#7a6189">
     <td class="th" style="width:5%;">Sn</td>
     <td class="th" style="width:8%;">Title</td>
     <td class="th" style="width:20%;">Notification Details</td>
     <td class="th" style="width:10%;">From Date</td>
     <td class="th" style="width:10%;">To Date</td>
     <td class="th" style="width:5%;">Status</td>
     <td class="th" style="width:8%;">Action</td>
    </tr>
    </thead>
    </div>
    <?php if($_REQUEST['act']=="new"){ ?>
    <tr style="background-color:#FFFFFF;"> 
     <td class="tdc">=></td>
     <td class="tdc"><input class="inp" id="STital" value="<?=$resD['Tital']?>" style="background-color:#FFFFB0;" /></td>
     <td class="tdc"><input class="inp" id="STn" value="<?=$resD['Notification']?>" style="background-color:#FFFFB0;" /></td>
     <td class="tdc"><input class="inpc" id="STf" value="<?=$resD['Fdate']?>" style="background-color:#FFFFB0;"/></td>
     <td class="tdc"><input class="inpc" id="STt" value="<?=$resD['Tdate']?>" style="background-color:#FFFFB0;"/></td>
     <script type="text/javascript" language="javascript">var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("STf", "STf", "%d-%m-%Y");  cal.manageFields("STt", "STt", "%d-%m-%Y");</script>
     <td class="tdc"><select class="inpc" id="STs" style="background-color:#FFFFB0;"><option value="Y" <?php if($resD['Sts']=='Y'){echo 'selected';}?>>Active</option><option value="N" <?php if($resD['Sts']=='N'){echo 'selected';}?>>Deactive</option></td>
     <td align="center"><img src="images/save.gif" onClick="FunClick('Sn',0)" /></td>
    </tr>
    <?php } ?>
    <?php $sqlD=mysql_query("select * from hrm_api_notification where CompanyId=".$CompanyId." order by Fdate DESC",$con); 
          $Sno=1; while($resD=mysql_fetch_assoc($sqlD)){ ?>
    <div class="tbody">
    <tbody>
    <tr style="background-color:#FFFFFF;"> 
     <td class="tdc"><?php echo $Sno;?></td>
     <td class="tdc"><input class="inp" id="Tital<?=$resD['NotiId']?>" value="<?=$resD['Tital']?>" <?php if($_REQUEST['id']!=$resD['NotiId']){echo 'readonly';}else{ echo "style=background-color:#FFFFB0;";} ?>/></td>
     <td class="tdc"><input class="inp" id="Tn<?=$resD['NotiId']?>" value="<?=$resD['Notification']?>" <?php if($_REQUEST['id']!=$resD['NotiId']){echo 'readonly';}else{ echo "style='background-color:#FFFFB0;'";} ?>/></td>
     <td class="tdc"><input class="inpc" id="Tf<?=$resD['NotiId']?>" value="<?=date("d-m-Y",strtotime($resD['Fdate']))?>" <?php if($_REQUEST['id']!=$resD['NotiId']){echo 'readonly';}else{ echo "style='background-color:#FFFFB0;'";}?> maxlength="10"/></td>
     <td class="tdc"><input class="inpc" id="Tt<?=$resD['NotiId']?>" value="<?=date("d-m-Y",strtotime($resD['Tdate']))?>" <?php if($_REQUEST['id']!=$resD['NotiId']){echo 'readonly';}else{ echo "style='background-color:#FFFFB0;'";}?>/></td>
  <script type="text/javascript" language="javascript">var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("Tf<?=$resD['NotiId']?>", "Tf<?=$resD['NotiId']?>", "%d-%m-%Y");  cal.manageFields("Tt<?=$resD['NotiId']?>", "Tt<?=$resD['NotiId']?>", "%d-%m-%Y");</script>
     <td class="tdc"><select class="inpc" id="Ts<?=$resD['NotiId']?>" <?php if($_REQUEST['id']!=$resD['NotiId']){echo 'disabled';}else{ echo "style='background-color:#FFFFB0;'";}?>><option value="Y" <?php if($resD['Sts']=='Y'){echo 'selected';}?>>Active</option><option value="N" <?php if($resD['Sts']=='N'){echo 'selected';}?>>Deactive</option></select></td>  
     <td align="center" id="On3TDL_<?=$resD['NotiId']?>" style="cursor:pointer;"><img src="images/edit.png" id="Edit_<?=$resD['NotiId']?>" onClick="FunClick('E',<?=$resD['NotiId']?>)" style="display:<?php if($_REQUEST['id']!=$resD['NotiId']){echo 'block';}else{echo 'none';}?>;"/><img src="images/save.gif"  id="Save_<?=$resD['NotiId']?>" onClick="FunClick('S',<?=$resD['NotiId']?>)" style="display:<?php if($_REQUEST['id']!=$resD['NotiId']){echo 'none';}else{echo 'block';}?>;"/></td>
    </tr>
   </tbody>
   </div>
   <?php $Sno++; } ?>
   <span id="SpnaChkDL"></span>
   </table>
   </td>	
  </tr>
  
  </table>  		
 </td>
</tr>	
<?php /*********** One OneOne OneOne OneOne OneOne OneOne OneOne OneOne OneOne One close ***/ ?>

<tr><td>&nbsp;</td></tr>

<?php /*********** Two TwoTwo TwoTwo TwoTwo TwoTwo TwoTwo TwoTwo TwoTwo TwoTwo Two ***/ ?>
<tr>	
 <td width="100%" valign="top">
 <table border="0" width="80%">
  
  <tr>
   <td>
   <table border="0">
	<tr>
     <td style="width:350px;font-size:18px;color:#006F00;font-family:Times New Roman;">
	  Push - Notification in Mobile &nbsp;&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="FunClick('A',0)" style="font-size:12px;"></a>
	 </td>
	</tr>
   </table>
   </td>
  </tr>
  
  <tr>
   <td valign="top" style="width:60%;"> 
   <table border="1" id="table1" cellspacing="1" style="width:100%;">
    <div class="thead">
    <thead>
    <tr bgcolor="#7a6189">
     <td class="th" style="width:5%;">Sn</td>
	 <td class="th" style="width:15%;">Subject/Title</td>
     <td class="th" style="width:50%;">Notification Msg</td>
     <td class="th" style="width:8%;">Status</td>
	 <td class="th" style="width:8%;">Action</td>
     <td class="th" style="width:8%;">Send</td>
    </tr>
	<?php $sql=mysql_query("select * from hrm_api_notification_push order by Nid ASC", $con);
	      $sn=1; while($res=mysql_fetch_assoc($sql)){ ?>
	<tr bgcolor="#FFFFFF">
     <td class="tdc"><?=$sn?></td>
     <td class="tdc"><textarea class="inp" id="Title_<?=$res['Nid']?>" rows="2" style="height:40px;" disabled><?=$res['Noti_Title']?></textarea></td>
	 <td class="tdc"><textarea class="inp" id="Msg_<?=$res['Nid']?>" rows="2" style="height:40px;" disabled><?=$res['Noti_Msg']?></textarea></td>
     <td class="tdc"><select class="inpc" id="Sts_<?=$res['Nid']?>" disabled><option value="A" <?php if($res['Sts']=='A'){echo 'selected';}?>>Active</option><option value="D" <?php if($res['Sts']=='D'){echo 'selected';}?>>Deactive</option></select></td>
	 <td align="center" style="cursor:pointer;"><img src="images/edit.png" id="ActE_<?=$res['Nid']?>" onClick="FunAct(<?=$res['Nid']?>,'E')" style="display:block;"/><img src="images/save.gif"  id="ActS_<?=$res['Nid']?>" onClick="FunAct(<?=$res['Nid']?>,'S')" style="display:none;"/></td>
     <td class="tdc" style="cursor:pointer;"><?php if($res['Sts']=='A'){?><img src="images/select.png" onClick="FunNotiMsg(<?=$res['Nid']?>)"/><?php } ?></td>
    </tr>
	<?php $sn++; } ?>
    </thead>
    </div>
    
    <div class="tbody">
    <tbody>
    </tbody>
    </div>
   </table>
   </td>	
  </tr>
  
  </table>  		
 </td>
</tr>	
<?php /*********** Two TwoTwo TwoTwo TwoTwo TwoTwo TwoTwo TwoTwo TwoTwo TwoTwo Two close ***/ ?>

<?php } ?>

</table>

		
<?php //****************************************************************************************?>
<?php //*************END*****END*****END******END******END**********************?>
<?php //******************************************************************************************?>
		
	  </td>
	</tr>
	
  </table>
 </td>
</tr>
</table>
</body>
</html>
<script type="text/javascript" language="javascript">
var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("STf", "STf", "%d-%m-%Y");  cal.manageFields("STt", "STt", "%d-%m-%Y");
cal.manageFields("Tf", "Tf", "%d-%m-%Y");  cal.manageFields("Tt", "Tt", "%d-%m-%Y");

function FunClick(v,id)
{  
  if(v=='A'){ window.location="Apps_notification.php?act=new&id=0"; }
  else if(v=='E'){ window.location="Apps_notification.php?act=edit&id="+id; }
  else if(v=='S')
  {
   var Tital = document.getElementById("Tital"+id).value;
   var Tn = document.getElementById("Tn"+id).value; var Tf = document.getElementById("Tf"+id).value;
   var Tt = document.getElementById("Tt"+id).value; var Ts = document.getElementById("Ts"+id).value;
   window.location="Apps_notification.php?act=save_edit&id="+id+"&Tn="+Tn+"&Tf="+Tf+"&Tt="+Tt+"&Ts="+Ts+"&Tital="+Tital;
  }
  else if(v=='Sn')
  {
   var Tital = document.getElementById("STital").value;
   var Tn = document.getElementById("STn").value; var Tf = document.getElementById("STf").value;
   var Tt = document.getElementById("STt").value; var Ts = document.getElementById("STs").value;
   window.location="Apps_notification.php?act=save_new&id="+id+"&Tn="+Tn+"&Tf="+Tf+"&Tt="+Tt+"&Ts="+Ts+"&Tital="+Tital;
  }
}

function FunAct(n,s)
{
 if(s=='E')
 {
  document.getElementById("ActE_"+n).style.display='none'; document.getElementById("ActS_"+n).style.display='block';
  //document.getElementById("Title_"+n).disabled=false; document.getElementById("Title_"+n).style.background='#FFFF9D'; 
  document.getElementById("Msg_"+n).disabled=false; document.getElementById("Msg_"+n).style.background='#FFFF9D';
  document.getElementById("Sts_"+n).disabled=false; document.getElementById("Sts_"+n).style.background='#FFFF9D';
 }
 else if(s=='S')
 {
  var agree = confirm("Are you sure?");
  if(agree)
  {
   var msg=document.getElementById("Msg_"+n).value; var sts=document.getElementById("Sts_"+n).value; 
   window.location="Apps_notification.php?act=UpdateNoti&n="+n+"&msg="+msg+"&sts="+sts;
  }
 }
}


function FunNotiMsg(id)
{
  var agree = confirm("Are you sure? you want to send this notification for all apps user.");
  if(agree)
  {  
    window.open("Apps_notification_push.php?act=SentNoti&id="+id,"NotiForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=400"); 
  }
  else { return false; }
}
</script>