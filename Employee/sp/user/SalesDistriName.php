<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

//if(isset($_POST['SaveNew'])){ $sql = mysql_query("insert into hrm_sales_dealer(DealerName,DealerAdd,DealerCity,DealerPerson,DealerEmail,DealerCont,DealerCont2,HqId,DealerSts,CompanyId,CreatedBy,CreatedDate) values('".$_POST['DealerName']."', '".$_POST['DealerAdd']."', '".$_POST['DealerCity']."', '".$_POST['DealerPerson']."', '".$_POST['DealerEmail']."', '".$_POST['DealerCont']."', '".$_POST['DealerCont2']."', ".$_POST['hq'].", '".$_POST['DealerSts']."', ".$_POST['ci'].", ".$_POST['ui'].", '".date("Y-m-d")."')", $con); }

//if(isset($_POST['SaveEdit'])){ $sql = mysql_query("update hrm_sales_dealer set DealerName='".$_POST['DealerName']."', DealerAdd='".$_POST['DealerAdd']."', DealerCity='".$_POST['DealerCity']."', DealerPerson='".$_POST['DealerPerson']."', DealerEmail='".$_POST['DealerEmail']."', DealerCont='".$_POST['DealerCont']."', DealerCont2='".$_POST['DealerCont2']."', DealerSts='".$_POST['DealerSts']."', CreatedBy=".$_POST['ui'].", CreatedDate='".date("Y-m-d")."' where DealerId=".$_POST['DealerId'], $con); }
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{color:#FFFFFF;font-size:14px;font-family:Times New Roman;text-align:center;height:24px;}
.tdc{color:#000000;font-size:12px;font-family:Times New Roman;text-align:center;}
.td2{color:#000000;font-size:14px;font-family:Times New Roman;text-align:left;}
.EditInput{ font-family:Times New Roman;font-size:12px;height:20px;width:98%;border:hidden;}
.EditInputb{ font-family:Times New Roman;font-size:12px;height:20px;width:98%;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.tds{ font-size:11px;height:18px;color:#FFFFFF;font-weight:bold;text-align:right; }
.seli{font-size:12px;height:20px;width:95%; height:21px; }
.inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<!--<Script type="text/javascript">window.history.forward(1);</Script>-->

<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })</script>

<Script language="javascript">
function ClickLoc(l,v)
{ //alert(l+","+v);
  var c=document.getElementById('CC').value; var z=document.getElementById('ZZ').value;
  var s=document.getElementById('SS').value; var hq=document.getElementById('HH').value;
  var t=document.getElementById('TT').value; 
  
  var StT=document.getElementById('StT').value; var VcH=document.getElementById('VcH').value;
  var FcH=document.getElementById('FcH').value; var VcT=document.getElementById('VcT').value;
  var FcT=document.getElementById('FcT').value;
  
  if(l=='C' || l=='T'){ var z=0; var s=0; var hq=0; }
  else if(l=='Z'){ var s=0; var hq=0; StT=0; VcH=0; FcH=0; VcT=0; FcT=0; }
  else if(l=='S'){ var hq=0; StT=s; VcH=0; FcH=0; VcT=0; FcT=0; }
  else if(l=='StT'){ var hq=0; s=StT; VcH=0; FcH=0; VcT=0; FcT=0; }
  else if(l=='H'){ VcH=0; FcH=0; VcT=0; FcT=0; }
  else if(l=='VcH'){ FcH=0; VcT=0; FcT=0; }
  else if(l=='FcH'){ VcH=0; VcT=0; FcT=0; }
  else if(l=='VcT'){ VcH=0; FcH=0; FcT=0; }
  else if(l=='FcT'){ VcH=0; FcH=0; VcT=0; }
  
  var bp='N';
  if(document.getElementById('BPrtyCheck').checked==true){ var bp='Y'; }
  
  window.location="SalesDistriName.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&d=ee&c="+c+"&s="+s+"&hq="+hq+"&z="+z+"&t="+t+"&bp="+bp+"&StT="+StT+"&VcH="+VcH+"&FcH="+FcH+"&VcT="+VcT+"&FcT="+FcT; 
}

/*function edit(value)
{ 
 var agree=confirm("Are you sure you want to edit this record?"); 
 if(agree)
 { 
  var c=document.getElementById('CC').value; var z=document.getElementById('ZZ').value;
  var s=document.getElementById('SS').value; var hq=document.getElementById('HH').value;
  window.location="SalesDistriName.php?action=edit&eid="+value+"&c="+c+"&s="+s+"&hq="+hq+"&z="+z;
 } 
}*/

function edit(d)
{ 
 document.getElementById('E_'+d).style.display="none"; document.getElementById('TD_'+d).style.display="block";  
}

function fclose(d)
{ 
 document.getElementById('E_'+d).style.display="block"; document.getElementById('TD_'+d).style.display="none";  
}

function newsave(){ document.getElementById('TDD').style.display="block"; }
function newclose(){ document.getElementById('TDD').style.display="none"; }

function fsave()
{ 
 document.getElementById('SaveBtn').disabled=true;
 var Dn=document.getElementById("Dn").value; var Dp=document.getElementById("Dp").value; 
 var DCity =document.getElementById("DCity").value; var DHQ=document.getElementById("DHQ").value; 
 var DSts=document.getElementById("DSts").value; var DEmail=document.getElementById("DEmail").value; 
 var DCont=document.getElementById("DCont").value; var DCont2=document.getElementById("DCont2").value; 
 var DAdd=document.getElementById("DAdd").value; var Terr_vc=document.getElementById("Terr_vc").value; 
 var Terr_fc=document.getElementById("Terr_fc").value; var Hq_vc=document.getElementById("Hq_vc").value;  
 var Hq_fc=document.getElementById("Hq_fc").value; var ui=document.getElementById("UserId").value;
 var BulkParty=document.getElementById("BulkParty").value;
 
 var Dn2 = Dn.replace(/[`~!@#$%^*_|+\-=?;:'"<>\{\}\[\]\\\/]/gi, '');
 var DAdd2 = DAdd.replace(/[`~!@#$%^*_|+\-=?;:'"<>\{\}\[\]\\\/]/gi, '');
 
 var Dn2=Dn2.replace(/&/g, 'jj');
 
 if(Dn==''){ alert("Enter firm name"); document.getElementById('SaveBtn').disabled=false; return false; }
 else if(Dp==''){ alert("Enter contact person name"); document.getElementById('SaveBtn').disabled=false;  return false; }
 else if(DCity==''){ alert("Enter city name"); document.getElementById('SaveBtn').disabled=false; return false; }
 else if(DHQ=='' || DHQ==0){ alert("selct HQ name"); document.getElementById('SaveBtn').disabled=false; return false; }
 else if(DCont==''){ alert("enter contact no."); document.getElementById('SaveBtn').disabled=false; return false; }
 //else if(Terr_vc==0 && Terr_fc==0)
 //{ alert("please select any one territory"); document.getElementById('SaveBtn').disabled=false; return false; }
 else
 {
  var url = 'SalesDistriNameAjax.php'; var pars = 'action=NewD&Dn='+Dn2+'&Dp='+Dp+'&DCity='+DCity+'&DHQ='+DHQ+'&DSts='+DSts+'&DEmail='+DEmail+'&DCont='+DCont+'&DCont2='+DCont2+'&DAdd='+DAdd2+'&Terr_vc='+Terr_vc+'&Terr_fc='+Terr_fc+'&Hq_vc='+Hq_vc+'&Hq_fc='+Hq_fc+'&ui='+ui+'&BulkParty='+BulkParty; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_rstNew });
 }
 
}
function show_rstNew(originalRequest)
{ 
 document.getElementById('RstSpan').innerHTML = originalRequest.responseText; 
 var RstVal=document.getElementById("RstVal").value; var Dnn=document.getElementById("Dnn").value; 
 if(RstVal==1)
 { alert('Done! "'+Dnn+'" details inserted successfully.'); 
   document.getElementById('TDD').style.display="none";  
   var c=document.getElementById('CC').value; var z=document.getElementById('ZZ').value;
   var s=document.getElementById('SS').value; var hq=document.getElementById('HH').value;
   var t=document.getElementById('TT').value;
   window.location="SalesDistriName.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&d=ee&c="+c+"&s="+s+"&hq="+hq+"&z="+z+"&t="+t;
 }
 else{ alert('Error occur!'); }
}


function fupdate(id)
{ 
 document.getElementById('UpBtn_'+id).disabled=true;
 var Dn=document.getElementById("Dn_"+id).value; var Dp=document.getElementById("Dp_"+id).value; 
 var DCity =document.getElementById("DCity_"+id).value; var DHQ=document.getElementById("DHQ_"+id).value; 
 var DSts=document.getElementById("DSts_"+id).value; var DEmail=document.getElementById("DEmail_"+id).value; 
 var DCont=document.getElementById("DCont_"+id).value; var DCont2=document.getElementById("DCont2_"+id).value; 
 var DAdd=document.getElementById("DAdd_"+id).value; var Terr_vc=document.getElementById("Terr_vc_"+id).value; 
 var Terr_fc=document.getElementById("Terr_fc_"+id).value; var Hq_vc=document.getElementById("Hq_vc_"+id).value;  
 var Hq_fc=document.getElementById("Hq_fc_"+id).value; var ui=document.getElementById("UserId").value;
 var BulkParty=document.getElementById("BulkParty"+id).value;
 
 var Dn2 = Dn.replace(/[`~!@#$%^*_|+\-=?;:'"<>\{\}\[\]\\\/]/gi, '');
 var DAdd2 = DAdd.replace(/[`~!@#$%^*_|+\-=?;:'"<>\{\}\[\]\\\/]/gi, '');
 
 var Dn2=Dn2.replace(/&/g, 'jj');

 //if(Terr_vc==0 && Terr_fc==0)
 //{ alert("please select any one territory"); document.getElementById('UpBtn_'+id).disabled=false; return false; }
 //else
 //{
  var url = 'SalesDistriNameAjax.php'; var pars = 'action=UpdateD&did='+id+'&Dn='+Dn2+'&Dp='+Dp+'&DCity='+DCity+'&DHQ='+DHQ+'&DSts='+DSts+'&DEmail='+DEmail+'&DCont='+DCont+'&DCont2='+DCont2+'&DAdd='+DAdd2+'&Terr_vc='+Terr_vc+'&Terr_fc='+Terr_fc+'&Hq_vc='+Hq_vc+'&Hq_fc='+Hq_fc+'&ui='+ui+'&BulkParty='+BulkParty; //alert(pars);
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_rst });
 //}
}
function show_rst(originalRequest)
{ 
 document.getElementById('RstSpan').innerHTML = originalRequest.responseText; 
 var RstVal=document.getElementById("RstVal").value; var Dnn=document.getElementById("Dnn").value; 
 var did=document.getElementById("did").value;
 if(RstVal==1)
 { alert('Done! "'+Dnn+'" details update successfully.'); 
   document.getElementById('E_'+did).style.display="block"; document.getElementById('TD_'+did).style.display="none"; 
   document.getElementById('UpBtn_'+did).disabled=false; 
   document.getElementById('tdsn_'+did).style.background='#A7FF4F'; 
   //var c=document.getElementById('CC').value; var z=document.getElementById('ZZ').value;
   //var s=document.getElementById('SS').value; var hq=document.getElementById('HH').value;
   //window.location="SalesDistriName.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&d=ee&c="+c+"&s="+s+"&hq="+hq+"&z="+z;
 }
 else{ alert('Error occur!'); document.getElementById('UpBtn_'+did).disabled=false; }
}

function FunVCn(v)
{
 var url = 'SalesDistriNameAjax.php'; var pars = 'action=GetTerr_vc&hq='+v; 
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_TerrVC }); 
}
function show_TerrVC(originalRequest)
{ document.getElementById('RstSpan').innerHTML = originalRequest.responseText; 
  document.getElementById("Terr_vc").value = document.getElementById("TVcVal").value; 
}

function FunFCn(v)
{
 var url = 'SalesDistriNameAjax.php'; var pars = 'action=GetTerr_fc&hq='+v; 
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_TerrFC }); 
}
function show_TerrFC(originalRequest)
{ document.getElementById('RstSpan').innerHTML = originalRequest.responseText; 
  document.getElementById("Terr_fc").value = document.getElementById("TFcVal").value; 
}


function FUnBP(v){document.getElementById("BulkParty").value=v;}
function FUnBPI(v,id){document.getElementById("BulkParty"+id).value=v;}

function isNumberKey(evt)
{
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 //if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))  /* For floating*/
	return false;

 return true;
}
</Script>
</head> 
<body class="body">
<div id="RstSpan"></div>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table style="margin-top:0px;width:100%;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td id="MainWindow" valign="top" align="center" width="100%"><br>
<?php //*******************************************************************************?>
<?php //****************START*****START*****START******START******START***********************?>
<?php //***************************************************************************************?>
<?php if($_REQUEST['z']>0){$qs='ZoneId='.$_REQUEST['z'];}else{$qs='1=1';} 
if($_REQUEST['s']>0){$qh='StateId='.$_REQUEST['s'];}else{$qh='1=1';} ?>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />		  
<table style="margin-top:0px;width:100%;">
 <tr>
  <td align="left" valign="top">
   <table border="0" style="margin-top:0px;">
     <tr>
	  <td class="heading"><u>Distributor List</u>:-&nbsp;&nbsp;&nbsp;&nbsp;</td>
	  <!--<td class="tds" style="width:75px;">Country:&nbsp;</td>-->
	  <td style="width:100px;"><select class="seli" name="CC" id="CC" onChange="ClickLoc('C',this.value)">
	  <option value="0">COUNTRY</option><?php $sqlC=mysql_query("SELECT * FROM hrm_country order by CountryName ASC",$con); while($resC=mysql_fetch_array($sqlC)){ ?><option value="<?=$resC['CountryId'];?>" <?php if($_REQUEST['c']==$resC['CountryId']){echo 'selected';}?>><?=ucwords(strtoupper($resC['CountryName'])); ?></option><?php } ?></select></td>
	  
	   
       <!--<td class="tds" style="width:55px;">State:&nbsp;</td>-->
	   <td style="width:100px;"><select class="seli" name="SS" id="SS" onChange="ClickLoc('S',this.value)">
       <option value="0">STATE</option><?php $sqlS = mysql_query("SELECT * FROM hrm_state where ".$qs." order by StateName ASC",$con); while($resS = mysql_fetch_array($sqlS)){ ?><option value="<?=$resS['StateId'];?>" <?php if($_REQUEST['s']==$resS['StateId']){echo 'selected';}?>><?=ucwords(strtoupper($resS['StateName']));?><?php } ?></option>
</select></td>
	   
	   <!--<td class="tds" style="width:40px;">HQ:&nbsp;</td>-->
	   <td style="width:100px;text-align:center;" colspan="2"><select class="seli" name="HH" id="HH" onChange="ClickLoc('H',this.value)">
       <option value="0">HQ</option><?php $sqlH = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' AND ".$qh." group by HqName order by HqName ASC",$con); while($resH = mysql_fetch_array($sqlH)){ ?><option value="<?=$resH['HqId'];?>" <?php if($_REQUEST['hq']==$resH['HqId']){echo 'selected';}?>><?=ucwords(strtoupper($resH['HqName']));?></option><?php } ?></select></td>
	   
	   <!--<td class="tds" style="width:40px;">Terr:&nbsp;</td>-->
	   <input type="hidden" class="seli" name="StT" id="StT" value="0"/>
	  <?php /*?> <td style="width:150px;text-align:center;" colspan="2"><select class="seli" name="StT" id="StT" onChange="ClickLoc('StT',this.value)">
       <option value="0">TERITORRY</option><?php $sqlE = mysql_query("SELECT e.EmpCode,e.EmployeeID,Fname,Sname,Lname from hrm_sales_dealer d inner join hrm_headquater hq on (d.Hq_vc=hq.HqId OR d.Hq_fc=hq.HqId) inner join hrm_employee e on (d.Terr_vc=e.EmployeeID OR d.Terr_fc=e.EmployeeID) where ".$qh." AND e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND d.DealerSts='A' group by e.EmployeeID order by e.Fname ASC",$con); while($resE = mysql_fetch_array($sqlE)){ ?><option value="<?=$resE['EmployeeID'];?>" <?php if($_REQUEST['StT']==$resE['EmployeeID']){echo 'selected';}?>><?=ucwords(strtoupper($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])).'-'.$resE['EmpCode'];?></option><?php } ?></select></td><?php */?>
	   
	   <td style="width:150px;text-align:center;" colspan="2"><select class="seli" name="TT" id="TT" onChange="ClickLoc('T',this.value)" style="width:200px;">
       <option value="0">ALL TERITORRY</option><?php $sqlE = mysql_query("SELECT e.EmpCode,e.EmployeeID,Fname,Sname,Lname from hrm_sales_dealer d inner join hrm_employee e on (d.Terr_vc=e.EmployeeID OR d.Terr_fc=e.EmployeeID) where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND d.DealerSts='A' group by e.EmployeeID order by e.Fname ASC",$con); while($resE = mysql_fetch_array($sqlE)){ ?><option value="<?=$resE['EmployeeID'];?>" <?php if($_REQUEST['t']==$resE['EmployeeID']){echo 'selected';}?>><?=ucwords(strtoupper($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])).'-'.$resE['EmpCode'];?></option><?php } ?></select></td>
	   
	  </tr> 
	  
	  <tr>
	   <td colspan="1"></td>
	   <td style="width:100px;"><select class="seli" name="ZZ" id="ZZ" onChange="ClickLoc('Z',this.value)">
	  <option value="0">ZONE</option><?php $sqlZ = mysql_query("SELECT * FROM hrm_sales_zone order by ZoneName ASC",$con); while($resZ=mysql_fetch_array($sqlZ)) { ?><option value="<?=$resZ['ZoneId'];?>" <?php if($_REQUEST['z']==$resZ['ZoneId']){echo 'selected';}?>><?=ucwords(strtoupper($resZ['ZoneName']));?></option><?php } ?></select>
	   </td>
	   <td colspan="1"></td>
	   <td style="width:100px;"><select class="seli" name="VcH" id="VcH" onChange="ClickLoc('VcH',this.value)">
       <option value="0">VC HQ</option><?php $sqlVcH = mysql_query("SELECT Hq_vc,HqName FROM hrm_sales_dealer d inner join hrm_headquater hq on d.Hq_vc=hq.HqId where ".$qh." group by d.Hq_vc order by hq.HqName ASC",$con); while($resVcH = mysql_fetch_array($sqlVcH)){ ?><option value="<?=$resVcH['Hq_vc'];?>" <?php if($_REQUEST['VcH']==$resVcH['Hq_vc']){echo 'selected';}?>><?=ucwords(strtoupper($resVcH['HqName']));?></option><?php } ?></select></td>
	  
	   <td style="width:100px;"><select class="seli" name="FcH" id="FcH" onChange="ClickLoc('FcH',this.value)">
       <option value="0">FC HQ</option><?php $sqlFcH = mysql_query("SELECT Hq_fc,HqName FROM hrm_sales_dealer d inner join hrm_headquater hq on d.Hq_fc=hq.HqId where ".$qh." group by d.Hq_vc order by hq.HqName ASC",$con); while($resFcH = mysql_fetch_array($sqlFcH)){ ?><option value="<?=$resFcH['Hq_fc'];?>" <?php if($_REQUEST['FcH']==$resFcH['Hq_fc']){echo 'selected';}?>><?=ucwords(strtoupper($resFcH['HqName']));?></option><?php } ?></select></td>
	   
	    <td style="width:150px;"><select class="seli" name="VcT" id="VcT" onChange="ClickLoc('VcT',this.value)">
       <option value="0">VC TERITORRY</option><?php $sqlVcE = mysql_query("SELECT e.EmpCode,e.EmployeeID,Fname,Sname,Lname from hrm_sales_dealer d inner join hrm_headquater hq on d.Hq_vc=hq.HqId inner join hrm_employee e on d.Terr_vc=e.EmployeeID where ".$qh." AND e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND d.DealerSts='A' group by e.EmployeeID order by e.Fname ASC",$con); while($resVcE = mysql_fetch_array($sqlVcE)){ ?><option value="<?=$resVcE['EmployeeID'];?>" <?php if($_REQUEST['VcT']==$resVcE['EmployeeID']){echo 'selected';}?>><?=ucwords(strtoupper($resVcE['Fname'].' '.$resVcE['Sname'].' '.$resVcE['Lname'])).'-'.$resVcE['EmpCode'];?></option><?php } ?></select></td>
	   <td style="width:150px;"><select class="seli" name="FcT" id="FcT" onChange="ClickLoc('FcT',this.value)">
       <option value="0">FC TERITORRY</option><?php $sqlFcE = mysql_query("SELECT e.EmpCode,e.EmployeeID,Fname,Sname,Lname from hrm_sales_dealer d inner join hrm_headquater hq on d.Hq_fc=hq.HqId inner join hrm_employee e on d.Terr_fc=e.EmployeeID where ".$qh." AND e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND d.DealerSts='A' group by e.EmployeeID order by e.Fname ASC",$con); while($resFcE = mysql_fetch_array($sqlFcE)){ ?><option value="<?=$resFcE['EmployeeID'];?>" <?php if($_REQUEST['FcT']==$resFcE['EmployeeID']){echo 'selected';}?>><?=ucwords(strtoupper($resFcE['Fname'].' '.$resFcE['Sname'].' '.$resFcE['Lname'])).'-'.$resFcE['EmpCode'];?></option><?php } ?></select></td>
	   
	   <td class="tds" style="width:120px;text-align:center;">
	   <input type="checkbox" id="BPrtyCheck" <?php if($_REQUEST['bp']=='Y'){echo 'checked';}?>/>&nbsp;Bulk-Party
	   </td>
	   
	   <td><?php if($_REQUEST['s']>0 || $_REQUEST['hq']>0){ ?><input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/><?php } ?>
	   <input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SalesDistriName.php?ac=4441&ee=4421&der=t3&ccc=false&d=dreefoultVlue&u=UsuuerIo&trht=FTF%%FT&tt=valuased&desgn=Trern&c=<?php echo $_REQUEST['c'] ?>&s=<?php echo $_REQUEST['s'] ?>&hq=<?php echo $_REQUEST['hq'] ?>&z=<?php echo $_REQUEST['z'] ?>'"/></td>
	   
	  </tr>   
   </table>
  </td>
 </tr>	
</table>

  </td>
 </tr>	

<tr>
 <td valign="top">
  <table border="1" cellspacing="0" id="table1" style="width:100%;">
<?php if($_REQUEST['c']>0 OR $_REQUEST['hq']>0 OR $_REQUEST['s']>0 OR $_REQUEST['t']>0){ 

$sE = mysql_query("select e.EmpCode,e.EmployeeID,Fname,Sname,Lname,DesigName from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_designation d on g.DesigId=d.DesigId where g.DepartmentId=6 and e.CompanyId=".$CompanyId." AND e.EmpStatus='A' group by e.EmployeeID order by Fname asc",$con); 
while($rE=mysql_fetch_assoc($sE))
{ 
 $Earr[$rE['EmployeeID']]=ucwords(strtoupper($rE['Fname'].' '.$rE['Sname'].' '.$rE['Lname'].' - '.$rE['EmpCode'])); //$rE['DesigName']
}

if($_REQUEST['hq']>0){ $qry='(d.Hq_vc='.$_REQUEST['hq'].' OR d.Hq_fc='.$_REQUEST['hq'].')'; $qryy='StateId='.$_REQUEST['s']; }
elseif($_REQUEST['s']>0){ $qry='StateId='.$_REQUEST['s']; $qryy='StateId='.$_REQUEST['s']; }
elseif($_REQUEST['t']>0){ $qry="(d.Terr_vc=".$_REQUEST['t']." OR d.Terr_fc=".$_REQUEST['t'].")"; $qryy='StateId='.$_REQUEST['s']; }

$sHQ = mysql_query("SELECT HqId,HqName,StateName FROM hrm_headquater hq inner join hrm_state s on hq.StateId=s.StateId where hq.CompanyId=".$CompanyId." group by HqName ASC order by HqName ASC",$con); 
////$sHQ = mysql_query("SELECT HqId,HqName FROM hrm_headquater where ".$qryy." order by HqName ASC",$con); 
while($rHQ=mysql_fetch_assoc($sHQ))
{ 
 //$HQarr[$rHQ['HqId']]=ucwords(strtoupper($rHQ['HqName']));
 $HQarr[$rHQ['HqId']]=ucwords(strtoupper($rHQ['HqName'].' - '.$rHQ['StateName']));
} 
?>

<tr>
 <td colspan="12" style="width:100%;background-color:#FFFFB3;">
  <span id="TDD" style="display:none;">
  <table style="width:100%;text-align:center;">
   
   <tr>
    <td style="width:50px;text-align:center;"><b>=></b></td>
    <td class="td2" style="width:80px;"><b>Bulk-Party:</b></td><td>
	<td colspan="3" class="td2">&nbsp;<b>
	 No:<input type="radio" id="Bpn" name="name_Bp" checked="checked" onClick="FUnBP('N')"/>
	 &nbsp;&nbsp;&nbsp;
	 Yes:<input type="radio" id="Bpy" name="name_Bp" onClick="FUnBP('Y')"/></b> 
	 <input type="hidden" id="BulkParty" id="BulkParty" value="N" />
	</td>
   </tr>
   
   <tr>
    <td style="width:50px;text-align:center;"><img src="images/delete.png" style="cursor:pointer;" onClick="newclose()"></td>
    <td class="td2" style="width:80px;">Firm Name:</td><td>
	<td style="width:200px;"><input id="Dn" class="EditInputb" value=""/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:100px;">Contact Person:</td>
	<td style="width:200px;"><input id="Dp" class="EditInputb" value=""/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:80px;">Dealer City:</td>
	<td style="width:180px;"><input id="DCity" class="EditInputb" value=""/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:80px;">Dealer HQ:</td>
	<td style="width:180px;">
	 <?php if($_REQUEST['hq']>0){
	  $sHq = mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'],$con); 
	  $rHq=mysql_fetch_assoc($sHq);
	 ?>
	 <input type="hidden" id="DHQ" class="EditInputb" value="<?=$_REQUEST['hq'];?>" readonly/>
	 <input class="EditInputb" value="<?=$rHq['HqName'];?>" readonly/>
	 <?php }else{ ?> 
	 <select class="EditInputb" name="DHQ" id="DHQ"><?php $sqlHArr = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' AND StateId=".$_REQUEST['s']." order by HqName ASC",$con); while($resHArr = mysql_fetch_array($sqlHArr)){ ?><option value="<?=$resHArr['HqId'];?>" <?php if($res['HqId']==$resHArr['HqId']){echo 'selected';}?>><?=ucwords(strtoupper($resHArr['HqName']));?></option><?php } ?></select>
	 <?php } ?> 
	</td>
	<td>&nbsp;</td>
	<td class="td2" style="width:50px;">Status:</td>
	<td style="width:100px;"><select id="DSts" class="EditInputb"><option value="A" selected>Active</option><option value="D">Deactive</option></select></td>
	<td style="width:50px;">&nbsp;</td>
   </tr>
   <tr>
    <td style="width:50px;text-align:center;">&nbsp;</td>
    <td class="td2" style="width:80px;">Email:</td><td>
	<td style="width:200px;"><input id="DEmail" class="EditInputb" value=""/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:100px;">Contact:</td>
	<td style="width:200px;"><input id="DCont" class="EditInputb" onKeyPress="return isNumberKey(event)" maxlength="10"/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:80px;">Contact-2:</td>
	<td style="width:180px;"><input id="DCont2" class="EditInputb" value="" onKeyPress="return isNumberKey(event)" maxlength="12"/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:80px;">Address:</td>
	<td style="width:120px;" colspan="4">
	 <input id="DAdd" class="EditInputb" style="width:99%;" value=""/>
	</td>	
	<td style="width:50px;">&nbsp;</td>
   </tr>
   <tr>
    <td style="width:50px;text-align:center;">&nbsp;</td>
	<td class="td2" style="width:80px;">VC_HQ:</td><td>
	<td style="width:200px;"><select id="Hq_vc" class="EditInputb" onChange="FunVCn(this.value)"><option value="0">Select</option>
	  <?php foreach ($HQarr as $key => $value){ ?>
	  <option value="<?=$key?>" <?php if($res['Hq_vc']==$key){echo 'selected';}?>><?=$value?></option>
	  <?php } ?>
	  </select>
	</td>
	<td>&nbsp;</td>
    <td class="td2" style="width:80px;">VC_Territory:</td>
	<td style="width:180px;"><select id="Terr_vc" class="EditInputb"><option value="0">Select</option>
	  <?php foreach ($Earr as $key => $value){ ?>
	  <option value="<?=$key?>" <?php if($res['Terr_vc']==$key){echo 'selected';}?>><?=$value?></option>
	  <?php } ?>
	  </select>
	</td>
	<td>&nbsp;</td>
	<td class="td2" style="width:80px;">FC_HQ:</td>
	<td style="width:180px;"><select id="Hq_fc" class="EditInputb" onChange="FunFCn(this.value)"><option value="0">Select</option>
	  <?php foreach ($HQarr as $key => $value){ ?>
	  <option value="<?=$key?>" <?php if($res['Hq_fc']==$key){echo 'selected';}?>><?=$value?></option>
	  <?php } ?>
	  </select>
	</td>
	<td>&nbsp;</td>
	<td class="td2" style="width:100px;">FC_Territory:</td>
	<td style="width:200px;"><select id="Terr_fc" class="EditInputb"><option value="0">Select</option>
	  <?php foreach ($Earr as $key => $value){ ?>
	  <option value="<?=$key?>" <?php if($res['Terr_fc']==$key){echo 'selected';}?>><?=$value?></option>
	  <?php } ?>
	  </select>
	</td>
	<td>&nbsp;</td>
	
	<td align="center"><input type="button" id="SaveBtn" value="save" style="width:60px;" onClick="fsave()"/></td>	
	<td style="width:50px;">&nbsp;</td>
   </tr>
  </table>
  </span>
 </td>
</tr>
<div class="thead">
<thead>
<tr bgcolor="#7a6189">
  <td class="th" style="width:40px;"><b>Sn</b></td>
  <td class="th" style="width:40px;"><b>&nbsp;Act&nbsp;</b></td>
  <td class="th" style="width:200px;"><b>Firm Name</b></td>
  <td class="th" style="width:150px;"><b>Contact Person</b></td>
  <td class="th" style="width:50px;"><b>ID</b></td>
  <td class="th" style="width:150px;"><b>City-HQ</b></td>
  <td class="th" style="width:80px;"><b>Contact</b></td>
  <?php if($_REQUEST['VcH']>0 OR $_REQUEST['VcT']>0 OR ($_REQUEST['VcH']==0 AND $_REQUEST['FcH']==0 AND $_REQUEST['VcT']==0 AND $_REQUEST['FcT']==0)){ ?>
  <td class="th" style="width:100px;"><b>VC HQ</b></td>
  <?php } if($_REQUEST['FcH']>0 OR $_REQUEST['FcT']>0 OR ($_REQUEST['VcH']==0 AND $_REQUEST['FcH']==0 AND $_REQUEST['VcT']==0 AND $_REQUEST['FcT']==0)){ ?>
  <td class="th" style="width:100px;"><b>FC HQ</b></td>
  <?php } if($_REQUEST['VcH']>0 OR $_REQUEST['VcT']>0 OR ($_REQUEST['VcH']==0 AND $_REQUEST['FcH']==0 AND $_REQUEST['VcT']==0 AND $_REQUEST['FcT']==0)){ ?>
  <td class="th" style="width:150px;"><b>VC Territory</b></td>
  <?php } if($_REQUEST['FcH']>0 OR $_REQUEST['FcT']>0 OR ($_REQUEST['VcH']==0 AND $_REQUEST['FcH']==0 AND $_REQUEST['VcT']==0 AND $_REQUEST['FcT']==0)){ ?>
  <td class="th" style="width:150px;"><b>FC Territory</b></td>
  <?php } ?>
  <td class="th" style="width:50px;"><b>Sts</b></td>  
</tr> 
</thead>
</div>
<?php 
//$sql = mysql_query("SELECT d.*,HqName FROM hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId where ".$qry." order by DealerName ASC", $con); 

if($_REQUEST['bp']=='Y'){ $subQ="BulkParty='Y'"; }else{ $subQ='1=1'; }

if($_REQUEST['c']>0)
{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer d where ".$subQ." AND `Hq_vc`='' AND `Hq_fc`='' AND `Terr_vc`='' AND `Terr_fc`='' order by d.DealerName ASC", $con); }
elseif($_REQUEST['VcT']>0)
{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer d where ".$subQ." AND d.Terr_vc=".$_REQUEST['VcT']." order by d.DealerName ASC", $con); }
elseif($_REQUEST['FcT']>0)
{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer d where ".$subQ." AND d.Terr_fc=".$_REQUEST['FcT']." order by d.DealerName ASC", $con); }
elseif($_REQUEST['VcH']>0) 
{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer d where ".$subQ." AND d.Hq_vc=".$_REQUEST['VcH']." order by d.DealerName ASC", $con); }
elseif($_REQUEST['FcH']>0)
{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer d where ".$subQ." AND d.Hq_fc=".$_REQUEST['FcH']." order by d.DealerName ASC", $con); }
elseif($_REQUEST['hq']>0)
{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer d where ".$subQ." AND (d.Hq_vc=".$_REQUEST['hq']." OR d.Hq_fc=".$_REQUEST['hq'].") order by d.DealerName ASC", $con); }
elseif($_REQUEST['s']>0)
{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer d inner join hrm_headquater hq on (d.Hq_vc=hq.HqId OR d.Hq_fc=hq.HqId) where ".$subQ." AND hq.StateId=".$_REQUEST['s']." order by d.DealerName ASC", $con); }
elseif($_REQUEST['t']>0)
{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer d where ".$subQ." AND (d.Terr_vc=".$_REQUEST['t']." OR d.Terr_fc=".$_REQUEST['t'].")(d.Terr_vc=".$_REQUEST['t']." OR d.Terr_fc=".$_REQUEST['t'].") order by d.DealerName ASC", $con); }
elseif($_REQUEST['StT']>0)
{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer d where ".$subQ." AND (d.Terr_vc=".$_REQUEST['StT']." OR d.Terr_fc=".$_REQUEST['StT'].") order by d.DealerName ASC", $con); }

$sn=1; while($res = mysql_fetch_array($sql)){ 

$sHq = mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$res['HqId'],$con); $rHq=mysql_fetch_assoc($sHq);
$sHqvc = mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$res['Hq_vc'],$con); $rHqvc=mysql_fetch_assoc($sHqvc);
$sHqfc = mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$res['Hq_fc'],$con); $rHqfc=mysql_fetch_assoc($sHqfc);

$sTrvc = mysql_query("SELECT EmpCode,Fname,Sname,Lname FROM hrm_employee where EmployeeID=".$res['Terr_vc'],$con);
$sTrfc = mysql_query("SELECT EmpCode,Fname,Sname,Lname FROM hrm_employee where EmployeeID=".$res['Terr_fc'],$con); 
$rTrvc=mysql_fetch_assoc($sTrvc); $rTrfc=mysql_fetch_assoc($sTrfc);
?>	
<div class="tbody">
<tbody>
<tr bgcolor="#FFFFFF">
 <td class="tdc" id="tdsn_<?=$res['DealerId'];?>"><?php echo $sn; ?></td>
 <td class="tdc"><img src="images/edit.png" id="E_<?=$res['DealerId'];?>" style="cursor:pointer;" onClick="edit(<?php echo $res['DealerId'];?>)"></td>
 <td class="tdc"><input class="EditInput" style="background-color:<?php if($res['BulkParty']=='Y'){echo '#FF66CC';}?>;" value="<?=$res['DealerName'];?>" readonly/></td>
 <td class="tdc"><input class="EditInput" style="background-color:<?php if($res['BulkParty']=='Y'){echo '#FF66CC';}?>;" value="<?=$res['DealerPerson'];?>" readonly/></td>
 <td class="tdc"><input class="EditInput" style="background-color:<?php if($res['BulkParty']=='Y'){echo '#FF66CC';}?>;" style="text-align:center;" value="<?=$res['DealerId'];?>" readonly/></td>
 <td class="tdc"><input class="EditInput" value="<?=$res['DealerCity'].'-'.$rHq['HqName'];?>" readonly/></td>
 <td class="tdc"><input class="EditInput" value="<?=$res['DealerCont'];?>" readonly/></td>
 <?php if($_REQUEST['VcH']>0 OR $_REQUEST['VcT']>0 OR ($_REQUEST['VcH']==0 AND $_REQUEST['FcH']==0 AND $_REQUEST['VcT']==0 AND $_REQUEST['FcT']==0)){ ?>
 <td class="tdc"><input class="EditInput" value="<?=$rHqvc['HqName'];?>" readonly/></td>
 <?php } if($_REQUEST['FcH']>0 OR $_REQUEST['FcT']>0 OR ($_REQUEST['VcH']==0 AND $_REQUEST['FcH']==0 AND $_REQUEST['VcT']==0 AND $_REQUEST['FcT']==0)){ ?>
 <td class="tdc"><input class="EditInput" value="<?=$rHqfc['HqName'];?>" readonly/></td>
 <?php } if($_REQUEST['VcH']>0 OR $_REQUEST['VcT']>0 OR ($_REQUEST['VcH']==0 AND $_REQUEST['FcH']==0 AND $_REQUEST['VcT']==0 AND $_REQUEST['FcT']==0)){ ?>
 <td class="tdc"><input class="EditInput" value="<?=$rTrvc['Fname'].' '.$rTrvc['Sname'].' '.$rTrvc['Lname'].' - '.$rTrvc['EmpCode'];?>"/></td>
 <?php } if($_REQUEST['FcH']>0 OR $_REQUEST['FcT']>0 OR ($_REQUEST['VcH']==0 AND $_REQUEST['FcH']==0 AND $_REQUEST['VcT']==0 AND $_REQUEST['FcT']==0)){ ?>
 <td class="tdc"><input class="EditInput" value="<?=$rTrfc['Fname'].' '.$rTrfc['Sname'].' '.$rTrfc['Lname'].' - '.$rTrfc['EmpCode'];?>"/></td>
 <?php } ?>
 <td class="tdc"><input class="EditInput" style="text-align:center;" value="<?=$res['DealerSts'];?>" readonly/></td>
</tr>
<tr>
 <td colspan="12" style="width:100%;background-color:#FFFFB3;">
  <span id="TD_<?=$res['DealerId'];?>" style="display:none;">
  <table style="width:100%;text-align:center;">
  
   <tr>
    <td style="width:50px;text-align:center;"><b>=></b></td>
    <td class="td2" style="width:80px;"><b>Bulk-Party:</b></td><td>
	<td colspan="3" class="td2">&nbsp;<b>
	 No:<input type="radio" id="Bpn<?=$res['DealerId'];?>" name="name_Bp<?=$res['DealerId'];?>" <?php if($res['BulkParty']=='N'){echo 'checked';}?> onClick="FUnBPI('N',<?=$res['DealerId'];?>)" disabled/>
	 &nbsp;&nbsp;&nbsp;
	 Yes:<input type="radio" id="Bpy<?=$res['DealerId'];?>" name="name_Bp<?=$res['DealerId'];?>" <?php if($res['BulkParty']=='Y'){echo 'checked';}?> onClick="FUnBPI('Y',<?=$res['DealerId'];?>,)" disabled/></b> 
	 <input type="hidden" id="BulkParty<?=$res['DealerId'];?>" id="BulkParty<?=$res['DealerId'];?>" value="<?=$res['BulkParty']?>" />
	</td>
   </tr>
  
   <tr>
    <td style="width:50px;text-align:center;"><img src="images/delete.png" id="D_<?=$res['DealerId'];?>" style="cursor:pointer;" onClick="fclose(<?php echo $res['DealerId'];?>)"></td>
    <td class="td2" style="width:80px;">Firm Name:</td><td>
	<td style="width:200px;"><input id="Dn_<?=$res['DealerId'];?>" class="EditInputb" value="<?=$res['DealerName'];?>"/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:100px;">Contact Person:</td>
	<td style="width:200px;"><input id="Dp_<?=$res['DealerId'];?>" class="EditInputb" value="<?=$res['DealerPerson'];?>"/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:80px;">Dealer City:</td>
	<td style="width:180px;"><input id="DCity_<?=$res['DealerId'];?>" class="EditInputb" value="<?=$res['DealerCity'];?>"/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:80px;">Dealer HQ:</td>
	<td style="width:180px;">
	 <?php if($_REQUEST['hq']>0){?>
	 <input type="hidden" id="DHQ_<?=$res['DealerId'];?>" class="EditInputb" value="<?=$res['HqId'];?>" readonly/>
	 <input class="EditInputb" value="<?=$res['HqName'];?>" readonly/>
	 <?php }else{ ?> 
	 <select class="EditInputb" name="DHQ_<?=$res['DealerId'];?>" id="DHQ_<?=$res['DealerId'];?>">
	 <?php foreach ($HQarr as $key => $value){ ?>
	  <option value="<?=$key?>" <?php if($res['HqId']==$key){echo 'selected';}?>><?=$value?></option>
	 <?php } // foreach ?>
	 </select>
	 <?php } ?> 
	 
	
	</td>
	<td>&nbsp;</td>
	<td class="td2" style="width:50px;">Status:</td>
	<td style="width:100px;"><select id="DSts_<?=$res['DealerId'];?>" class="EditInputb"><option value="<?php echo $res['DealerSts']; ?>" selected><?php if($res['DealerSts']=='A'){echo 'Active';}else{echo 'Deactive';} ?></option><option value="<?php if($res['DealerSts']=='A'){echo 'D';}else{echo 'A';}?>"><?php if($res['DealerSts']=='A'){echo 'Deactive';}else{echo 'Active';}?></option></select></td>
	<td style="width:50px;">&nbsp;</td>
   </tr>
   <tr>
    <td style="width:50px;text-align:center;">&nbsp;</td>
    <td class="td2" style="width:80px;">Email:</td><td>
	<td style="width:200px;"><input id="DEmail_<?=$res['DealerId'];?>" class="EditInputb" value="<?php echo $res['DealerEmail']; ?>"/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:100px;">Contact:</td>
	<td style="width:200px;"><input id="DCont_<?=$res['DealerId'];?>" class="EditInputb" value="<?php echo $res['DealerCont'];?>" onKeyPress="return isNumberKey(event)"/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:80px;">Contact-2:</td>
	<td style="width:180px;"><input id="DCont2_<?=$res['DealerId'];?>" class="EditInputb" value="<?php echo $res['DealerCont2'];?>" onKeyPress="return isNumberKey(event)"/></td>
	<td>&nbsp;</td>
	<td class="td2" style="width:80px;">Address:</td>
	<td style="width:120px;" colspan="4">
	 <input id="DAdd_<?=$res['DealerId'];?>" class="EditInputb" style="width:99%;" value="<?php echo $res['DealerAdd']; ?>"/>
	</td>	
	<td style="width:50px;">&nbsp;</td>
   </tr>
   <tr>
    <td style="width:50px;text-align:center;">&nbsp;</td>
	<td class="td2" style="width:80px;">VC_HQ:</td><td>
	<td style="width:200px;"><select id="Hq_vc_<?=$res['DealerId'];?>" class="EditInputb" onChange="FunVCe(this.value,<?=$res['DealerId'];?>)"><option value="0">Select</option>
	  <?php foreach ($HQarr as $key => $value){ ?>
	  <option value="<?=$key?>" <?php if($res['Hq_vc']==$key){echo 'selected';}?>><?=$value?></option>
	  <?php } ?>
	  </select>
	</td>
	<td>&nbsp;</td>
	<td class="td2" style="width:100px;">VC_Territory:</td>
	<td style="width:180px;"><select id="Terr_vc_<?=$res['DealerId'];?>" class="EditInputb"><option value="0">Select</option>
	  <?php foreach ($Earr as $key => $value){ ?>
	  <option value="<?=$key?>" <?php if($res['Terr_vc']==$key){echo 'selected';}?>><?=$value?></option>
	  <?php } ?>
	  </select>
	</td>
	<td>&nbsp;</td>
	<td class="td2" style="width:80px;">FC_HQ:</td>
	<td style="width:180px;"><select id="Hq_fc_<?=$res['DealerId'];?>" class="EditInputb" onChange="FunFCe(this.value,<?=$res['DealerId'];?>)"><option value="0">Select</option>
	  <?php foreach ($HQarr as $key => $value){ ?>
	  <option value="<?=$key?>" <?php if($res['Hq_fc']==$key){echo 'selected';}?>><?=$value?></option>
	  <?php } ?>
	  </select>
	</td>
	<td>&nbsp;</td>
	<td class="td2" style="width:100px;">FC_Territory:</td>
	<td style="width:200px;"><select id="Terr_fc_<?=$res['DealerId'];?>" class="EditInputb"><option value="0">Select</option>
	  <?php foreach ($Earr as $key => $value){ ?>
	  <option value="<?=$key?>" <?php if($res['Terr_fc']==$key){echo 'selected';}?>><?=$value?></option>
	  <?php } ?>
	  </select>
	</td>
	<td>&nbsp;</td>
	<td align="center"><input type="button" id="UpBtn_<?=$res['DealerId'];?>" value="update" onClick="fupdate(<?=$res['DealerId'];?>)"/></td>	
	<td style="width:50px;">&nbsp;</td>
   </tr>
  </table>
  </span>
 </td>
</tr>
</tbody>
<div class="tbody">
<?php $sn++; } ?>
<?php } ?>
   </table>
    </td>
   </tr>
  </table>
 </td>
</tr>
</table>
		
<?php //**************************************************************************** ?>
<?php //*************END*****END*****END******END******END********************** ?>
<?php //******************************************************************************** ?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
