<?php session_start();
if($_SESSION['login'] = true){ require_once('../user/config/config.php'); }
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
$a=$_REQUEST['a']; $b=$_REQUEST['b']; $c=$_REQUEST['c']; $d=$_REQUEST['d']; 
$e=$_REQUEST['e']; $f=$_REQUEST['f']; 

if(isset($_POST['save']))
{ 
 $Max=mysql_query("select MAX(FareqId) as ID from fa_request",$con); $resMax=mysql_fetch_assoc($Max);
 $NextId=$resMax['ID']+1; 
 if($_POST['mode']==3){ $sd=$_POST['sdeal']; $s2d=$_POST['sdeal2']; $s3d=$_POST['sdeal3']; }else{ $sd=0; $s2d=0; $s3d=0; }
 
 $Ins=mysql_query("insert into fa_request(FareqId, Mode, Crop, Sal_DealerId, Sal2_DealerId, Sal3_DealerId, FC_Per, VC_Per, Plan_last, Plan_tgt, Plan_proj, HqId, Reporting, Lvl, Rev, gm, Salary, From_Date, Remark, Req_Date, RequestBy) values(".$NextId.", ".$_POST['mode'].", '".$_POST['Crop']."', ".$sd.", ".$s2d.", ".$s3d.", ".$_POST['FCPer'].", ".$_POST['VCPer'].", ".$_POST['ly'].", ".$_POST['ty'].", ".$_POST['py'].", ".$_POST['HeadQuarter'].", ".$_POST['rep'].", ".$_POST['lvl'].", ".$_POST['rev'].", ".$_POST['hod'].", ".$_POST['salary'].", '".date("Y-m-d",strtotime($_POST['edate']))."', '".$_POST['remark']."', '".date("Y-m-d")."', ".$EmployeeId.")", $con);
 
 
 if($Ins)
 { 
   //foreach($_POST['crops'] as $crop){ $Ins2=mysql_query("insert into fa_request_crop(FareqId,ItemId) values(".$NextId.",".$crop.")",$con); }
 
   for($i=0;$i<=100;$i++)
   { if($_POST['deal'.$i]>0){ $Ins3=mysql_query("insert into fa_request_dealer(FareqId, DealerId) values(".$NextId.", ".$_POST['deal'.$i].")",$con); }  
   }
 }
 if($Ins AND $Ins2 AND $Ins3){echo '<script>alert("FA request save successfully..");</script>';}
}


if($_REQUEST['act']=='delete' AND $_REQUEST['did']!='')
{$del=mysql_query("delete from fa_request where FareqId=".$_REQUEST['did'],$con);
 if($del){echo '<script>alert("FA request data deleted successfully..");</script>';}
}


if($_REQUEST['act']=='gosend' AND $_REQUEST['goid']!='')
{ 
 if($_REQUEST['lvl']==1)
 { $up=mysql_query("update fa_request set Status=1 where FareqId=".$_REQUEST['goid'],$con); }
 elseif($_REQUEST['lvl']==2)
 { $up=mysql_query("update fa_request set Status=2 where FareqId=".$_REQUEST['goid'],$con); }
 
 if($up)
 {
  
  $sE=mysql_query("select RequestBy,Reporting from fa_request fr inner join hrm_employee e on fr.RequestBy=e.EmployeeID where FareqId=".$_REQUEST['goid'],$con);  $rE=mysql_fetch_assoc($sE);
  
  $sn=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$rE['RequestBy'],$con); 
  $sqlRep=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$rE['Reporting'],$con);      
  $rn=mysql_fetch_assoc($sn); $resRep=mysql_fetch_assoc($sqlRep); 
  $Ename=$rn['Fname'].' '.$rn['Sname'].' '.$rn['Lname'];
    
  if($resRep['EmailId_Vnr']!='')
  {
   $eto   =$resRep['EmailId_Vnr'];
   $efrom ='admin@vnrseeds.co.in';
   $esub  ="Apply for new FA request";
   $ehead ="From: ".$efrom."\r\n";  
   $ehead.="MIME-Version: 1.0\r\n";
   $ehead.="Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg .="<html><head></head><body>";
   $emsg .="Dear <b>Sir/Mam</b> <br><br>\n\n\n";
   $emsg .=$Ename." has requested for new FA. For any action, log on to ESS-Salesplan.<br>\n\n";
   $emsg .="From <br><b>ADMIN</b><br>";
   $emsg .="</body></html>";
   $ok    = @mail($eto,$esub,$emsg,$ehead);
  }     
  
  //priyabrata.dash@vnrseeds.com , vspl.mkt@vnrseeds.com
  $eto2   ='jaiprakash.yadav@vnrseeds.com';
  $efrom2 ='admin@vnrseeds.co.in';
  $esub2  ="Apply for new FA request";
  $ehead2 ="From: ".$efrom2."\r\n";  
  $ehead2.="MIME-Version: 1.0\r\n";
  $ehead2.="Content-Type: text/html; charset=ISO-8859-1\r\n";
  $emsg2 .="<html><head></head><body>";
  $emsg2 .="Dear <b>Sir/Mam</b> <br><br>\n\n\n";
  $emsg2 .=$Ename." has requested for new FA. For details log on to ESS-Salesplan.<br>\n\n";
  $emsg2 .="From <br><b>ADMIN ESS</b><br>";
  $emsg2 .="</body></html>";
  $ok2    = @mail($eto2,$esub2,$emsg2,$ehead2); 
 
  
  echo '<script>alert("FA request sent successfully..");</script>';  
    
 } //if($up)

}


?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:12px;background-color:#97FFFF;}
.htf2{font-family:Georgia;color:#FF80FF;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Georgia;font-size:12px;height:20px;color:#fff;}
.tdf2{background-color:#FFFFFF;font-family:Georgia;font-size:12px;height:20px;color:#000000;}
.InputSel {font-family:Georgia;font-size:12px;text-align:left; }
.InputType {font-family:Georgia;font-size:12px;text-align:left; }
.InputType2 {font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton {background-image:url(images/save.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */?>

<Script language="javascript">
function FunRef(a,b,c,d,e,f){ window.location="f_request.php?ern1=r114&ern2w=234&ern3y=10234&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f+"&s=0"; }

function FunEdit()
{ document.getElementById("edit").style.display='none'; document.getElementById("save").style.display='block';
  document.getElementById("mode").disabled=false; document.getElementById("Crop").disabled=false;
  document.getElementById("country").disabled=false; document.getElementById("state").disabled=false;
  document.getElementById("hq").disabled=true; document.getElementById("dealer").disabled=false;
  document.getElementById("sdealer").disabled=false; document.getElementById("ly").disabled=false;
  document.getElementById("ty").disabled=false; document.getElementById("py").disabled=false;
  document.getElementById("salary").disabled=false; document.getElementById("f_btn1").disabled=false;
  document.getElementById("sdealer2").disabled=false;
  document.getElementById("sdealer3").disabled=false;
}

function funcountry(v,e){ var url = 'f_getvalues.php'; var pars = 'cid='+v+'&getv=country&e='+e; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: getcountry_show }); } 
function getcountry_show(originalRequest){ document.getElementById('spanstate').innerHTML = originalRequest.responseText; }

function funstate(v,e){ var url = 'f_getvalues.php'; var pars = 'sid='+v+'&getv=state&e='+e; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: getstate_show }); } 
function getstate_show(originalRequest){ document.getElementById('spanhq').innerHTML = originalRequest.responseText; }

function funhq(v){ document.getElementById("HeadQuarter").value=v;
var url = 'f_getvalues.php'; var pars = 'hqid='+v+'&getv=hq'; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: gethq_show }); } 
function gethq_show(originalRequest){ document.getElementById('spanDis').innerHTML = originalRequest.responseText; if(document.getElementById("mode").value==3){funhq2(document.getElementById("hq").value);} 
}

function funhq2(v){ var url = 'f_getvalues.php'; var pars = 'hqid2='+v+'&getv=hq2'; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: gethq2_show }); funhq3(v); } 
function gethq2_show(originalRequest){ document.getElementById('spanDis2').innerHTML = originalRequest.responseText; }

function funhq3(v){ var url = 'f_getvalues.php'; var pars = 'hqid3='+v+'&getv=hq3'; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: gethq3_show }); funhq4(v) } 
function gethq3_show(originalRequest){ document.getElementById('spanDis3').innerHTML = originalRequest.responseText; }

function funhq4(v){ var url = 'f_getvalues.php'; var pars = 'hqid4='+v+'&getv=hq4'; 
var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: gethq4_show }); } 
function gethq4_show(originalRequest){ document.getElementById('spanDis4').innerHTML = originalRequest.responseText; }

function funsdeal(v){document.getElementById("sdeal").value=v;}
function funs2deal(v){document.getElementById("sdeal2").value=v;}
function funs3deal(v){document.getElementById("sdeal3").value=v;}

function validate(reqform) 
{ 

 var FC=parseFloat(document.getElementById("FCPer").value);
 var VC=parseFloat(document.getElementById("VCPer").value);
 var tot=Math.round(FC+VC); 

 for(var k=0;k<=100;k++){document.getElementById("deal"+k).value=0;}
 var x=document.getElementById("dealer");
 for(var i=0; i < x.options.length; i++)
 { if(x.options[i].selected){document.getElementById("deal"+i).value=x.options[i].value;} }
  
 if(document.getElementById("mode").value==0){alert("Please select mode."); return false;}
 //else if(document.getElementById("crops").value==0){alert("Please select crops."); return false;}
 else if(document.getElementById("Crop").value==''){alert("Please select crops."); return false;}
 
 else if(document.getElementById("Crop").value=='Both' && (FC<20 || VC<20)){ alert("Minimum 20% allow FC OR VC value."); return false; }
 else if(document.getElementById("Crop").value=='Both' && tot!=100){ alert("Checked, (FC+VC) value=100%"); return false; }
 
 else if(document.getElementById("hq").value==0){alert("Please select head quarter."); return false;}
 else if(document.getElementById("dealer").value==0){alert("Please select distributor."); return false;}
 else if(document.getElementById("mode").value==3 && document.getElementById("sdeal").value==0)
 { alert("Please select salaries distributor."); return false; }
 else if(document.getElementById("ly").value==0 || document.getElementById("ly").value=='' || document.getElementById("ty").value==0 || document.getElementById("ty").value=='' || document.getElementById("py").value==0 || document.getElementById("py").value==''){alert("Please enter plan amount."); return false;}
 else if(document.getElementById("salary").value==0 || document.getElementById("salary").value==''){alert("Please enter expected expense."); return false;}
 else if(document.getElementById("edate").value==''){alert("Please enter expected joining date."); return false;}
 else { var agree=confirm("Are you sure.."); if(agree){return true;} }
}

function funDetail(id)
{ var win = window.open("f_request_details.php?id="+id,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=450");}

function fungo(value,lvl,a,b,c,d,e,f,crp)
{ var st=document.getElementById("st").value;  
  var agree=confirm("Are you sure you want to send FA request?"); 
if(agree){ var x="f_request.php?act=gosend&goid="+value+"&s="+st+"&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f+"&lvl="+lvl+"&crp="+crp; window.location=x;} }

function fundel(value,a,b,c,d,e,f)
{ var st=document.getElementById("st").value; var agree=confirm("Are you sure you want to delete this record?");
if(agree){ var x="f_request.php?act=delete&did="+value+"&s="+st+"&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f; window.location=x;} }

function FunCheck(v,a,b,c,d,e,f)
{ 
 if(v==0){ if(document.getElementById("v0").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_request.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+vk+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f; }
 else if(v==1){ if(document.getElementById("v1").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_request.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+a+"&b="+vk+"&c="+c+"&d="+d+"&e="+e+"&f="+f; }
 else if(v==2){ if(document.getElementById("v2").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_request.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+a+"&b="+b+"&c="+vk+"&d="+d+"&e="+e+"&f="+f; }
 else if(v==3){ if(document.getElementById("v3").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_request.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+a+"&b="+b+"&c="+c+"&d="+vk+"&e="+e+"&f="+f; }
 else if(v==4){ if(document.getElementById("v4").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_request.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+vk+"&f="+f; }
 else if(v==5){ if(document.getElementById("v5").checked==true){var vk=1;}else{var vk=0;} 
 var x="f_request.php?ern1=r114&ern2w=234&ern3y=10234&s="+st+"&a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+vk; }
 window.location=x;
}


function isNumberKey(evt)
{ var charCode = (evt.which) ? evt.which : event.keyCode
if(charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){  return false; }else{ return true; } /*floating*/
}
</Script>
</head>
<body class="body">
<input type="hidden" id="st" value="<?php echo $_REQUEST['s']; ?>" />
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
	  <td valign="top" width="100%" id="MainWindow"><br>
<!DOCTYPE html>
<html>
<?php //***************START*****START*****START******START******START***************************?>
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr>
 <td valign="top" style="width:100%;">
 <table border="0" style="width:100%;">
<tr>
<td style="width:100%;">
 <table border="0" style="width:100%;">
  <td style="width:25%;" valign="top">
   <table style="width:100%;" border="0">
    <tr><td colspan="3" align="center" class="htf2"><u>FA Request</u></td></tr>
<form method="post" name="reqform" enctype="multipart/form-data" onSubmit="return validate(this)">
<?php $sqlR=mysql_query("select * from hrm_employee_reporting where EmployeeID=".$EmployeeId,$con); 
      $resR=mysql_fetch_assoc($sqlR); 
	  
	  echo '<input type="hidden" name="lvl" id="lvl" value="1" />';
      echo '<input type="hidden" name="rep" id="rep" value="'.$resR['AppraiserId'].'" />';
	  echo '<input type="hidden" name="rev" id="rev" value="'.$resR['ReviewerId'].'" />';
	  echo '<input type="hidden" name="hod" id="hod" value="'.$resR['HodId'].'" />';
	  
      $sn=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$EmployeeId,$con); 
      $sqlRep=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resR['AppraiserId'], $con);      
      $rn=mysql_fetch_assoc($sn);  $resRep=mysql_fetch_assoc($sqlRep);
?>
      <input type="hidden" name="Ename" value="<?php echo $rn['Fname'].' '.$rn['Sname'].' '.$rn['Lname']; ?>" />	
      <input type="hidden" name="EmailRep" value="<?php echo $resRep['EmailId_Vnr']; ?>" />

<script>
function FunSelMode(v)
{
 if(v==3){ document.getElementById("salDisId").style.display='block'; }
 else{ document.getElementById("salDisId").style.display='none'; }
}
</script>
	<tr>
	 <td class="tdf" style="width:120px;">&nbsp;Mode <font color="#FF0000">*</font></td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:170px;"><select style="width:160px;" class="InputSel" id="mode" name="mode" onChange="FunSelMode(this.value)" disabled>
	 <option value='0' selected>Select</option><option value='1'>Direct(Sales Executive)</option>
	 <option value='2'>Teamlease</option><option value='3'>Distributor</option></select></td>
	</tr>
	<tr>
	 <?php /*?><td class="tdf">&nbsp;Crop</td><td class="tdf" align="center">:</td>
	 <td><select style="width:160px;" class="InputSel" id="crops" name="crops[]" required multiple disabled><?php $qi=mysql_query("select * from hrm_sales_seedsitem where ".$suq." order by ItemName ASC",$con); while($ri=mysql_fetch_array($qi)){echo"<option value='".$ri['ItemId']." '>".$ri['ItemName']."</option>";}?></select></td><?php */?>
	 
	 <td class="tdf">&nbsp;Crop <font color="#FF0000">*</font></td><td class="tdf" align="center">:</td>
	 <td><select style="width:160px;" class="InputSel" id="Crop" name="Crop" onChange="SelcrTyp(this.value)" required <?php if($_REQUEST['opt']==0){echo 'disabled';} ?>>
	 <option value="">Select</option>
	 <option value="Veg" <?php if($_REQUEST['opt']>0 && $res['Crop']=='veg'){ echo 'selected';}?>>Vegetable Crops</option>
	 <option value="Field" <?php if($_REQUEST['opt']>0 && $res['Crop']=='Field'){ echo 'selected';}?>>Field Crops</option>
	 <option value="Both" <?php if($_REQUEST['opt']>0 && $res['Crop']=='Both'){ echo 'selected';}?>>Both Crops</option>
	 </select>
	 </td>
	</tr>
	<script type="text/javascript">
	 function SelcrTyp(v)
	 {
	  if(v=='Both'){ document.getElementById("crtyp").style.display='block'; }
	  else{ document.getElementById("crtyp").style.display='none'; }
	 }
	</script>
	<tr>
	 <td colspan="3" style="text-align:right;">
	  <div id="crtyp" style="display:none;">
	  <table border="0">
	   <tr>  
	     <td class="tdf" style="text-align:right;color:#FF6215;width:120px;">(Minimum 20%)</td>
	     <td class="tdf" style="text-align:right;width:180px;">FC%&nbsp;<input style="width:45px;text-align:center;" class="InputType" id="FCPer" name="FCPer" value="0" maxlength="3" onKeyPress="return isNumberKey(event)"/>&nbsp;&nbsp;&nbsp;&nbsp;VC%&nbsp;<input style="width:45px;text-align:center;" class="InputType" id="VCPer" name="VCPer" maxlength="3" value="0" onKeyPress="return isNumberKey(event)"/></td>
	   </tr>
	  </table>
	  </div>
	 </td>
	</tr>
	
	<tr>
	 <td class="tdf">&nbsp;Country</td> 
	 <td class="tdf" align="center">:</td><td><select style="width:160px;" class="InputSel" id="country" name="country" onChange="funcountry(this.value,<?php echo $EmployeeId; ?>)" disabled><option value="0">Select</option><?php $sqlc=mysql_query("select * from hrm_country where CountryStatus='A' order by CountryName asc",$con); while($resc=mysql_fetch_assoc($sqlc)){ ?><option value="<?php echo $resc['CountryId']; ?>"><?php echo ucfirst(strtolower($resc['CountryName'])); ?></option><?php } ?></select></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;State</td>
	 <td class="tdf" align="center">:</td><td><span id="spanstate">
	 <select style="width:160px;" class="InputSel" id="state" name="state" onChange="funstate(this.value,<?php echo $EmployeeId; ?>)" disabled><option value="0">Select</option><?php $sqls=mysql_query("select st.StateId,StateName from hrm_state st inner join hrm_headquater hq on st.StateId=hq.StateId inner join hrm_sales_hq_temp hqtmp on hq.HqId=hqtmp.HqId inner join hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqtmp.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") group by StateId order by StateName ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ ?><option value="<?php echo $ress['StateId']; ?>"><?php echo ucfirst(strtolower($ress['StateName'])); ?></option><?php } ?></select></span></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;HeadQuarter <font color="#FF0000">*</font></td>
	 <td class="tdf" align="center">:</td><td><span id="spanhq"><select style="width:160px;" class="InputSel" id="hq" name="hq" onChange="funhq(this.value)" disabled><option value="0">Select</option><?php $sqlhq2=mysql_query("select * from hrm_headquater order by HqName asc",$con); while($reshq2=mysql_fetch_assoc($sqlhq2)){ ?><option value="<?php echo $reshq2['HqId']; ?>"><?php echo ucfirst(strtolower($reshq2['HqName'])); ?></option><?php } ?></select></span><input type="hidden" name="HeadQuarter" id="HeadQuarter" value="" /></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Distibutor <font color="#FF0000">*</font></td>
	 <td class="tdf" align="center">:</td><td><span id="spanDis"><select style="width:160px;" class="InputSel" id="dealer" required multiple disabled></select></span><?php for($i=0;$i<=100;$i++){ echo '<input type="hidden" name="deal'.$i.'" id="deal'.$i.'" value="0" style="width:50px;"/>'; } ?></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Exp. Distributor (1) <font color="#FF0000" id="salDisId" style="display:none;">*</font></td>
	 <td class="tdf" align="center">:</td> 
	 <td><span id="spanDis2"><select style="width:160px;" class="InputSel" id="sdealer" disabled><option value='0'>Select</option></select></span><input type="hidden" name="sdeal" id="sdeal" value="0" /></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Exp. Distributor (2)</td>
	 <td class="tdf" align="center">:</td> 
	 <td><span id="spanDis3"><select style="width:160px;" class="InputSel" id="sdealer2" disabled><option value='0'>Select</option></select></span><input type="hidden" name="sdeal2" id="sdeal2" value="0" /></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Exp. Distributor (3)</td>
	 <td class="tdf" align="center">:</td> 
	 <td><span id="spanDis4"><select style="width:160px;" class="InputSel" id="sdealer3" disabled><option value='0'>Select</option></select></span><input type="hidden" name="sdeal3" id="sdeal3" value="0" /></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Plan (Rs)/Last-Year <font color="#FF0000">*</font></td>
	 <td class="tdf" align="center">:</td><td><input style="width:100px;text-align:right;" class="InputType" id="ly" name="ly" maxlength="10" disabled/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Plan (Rs)/Tgt-Year <font color="#FF0000">*</font></td>
	 <td class="tdf" align="center">:</td><td><input style="width:100px;text-align:right;" class="InputType" id="ty" name="ty" maxlength="10" disabled/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Plan (Rs)/Proj-Year <font color="#FF0000">*</font></td>
	 <td class="tdf" align="center">:</td><td><input style="width:100px;text-align:right;" class="InputType" id="py" name="py" maxlength="10" disabled/></td>
	</tr>

	<tr>
	 <td class="tdf">&nbsp;Monthly Claim <font color="#FF0000">*</font></td>
	 <td class="tdf" align="center">:</td><td><input style="width:100px;text-align:right;" class="InputType" id="salary" name="salary" maxlength="10" disabled/></td>
	</tr>
	<tr>
	 <td class="tdf">&nbsp;Date Of Joining <font color="#FF0000">*</font></td>
	 <td class="tdf" align="center">:</td><td><input style="width:100px;text-align:center;" class="InputType" id="edate" name="edate" readonly/><button id="f_btn1" class="CalenderButton" disabled></button><script type="text/javascript">var cal = Calendar.setup({ onSelect: function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn1", "edate", "%d-%m-%Y");</script></td>
	</tr>
	<tr>
	 <td class="tdf" valign="top">&nbsp;Remark</td>
	 <td class="tdf" align="center">:</td><td><textarea cols="24" rows="2" class="InputType" id="remark" name="remark"></textarea></td>
	</tr>	
	<tr>
	 <td colspan="3" align="right">
	  <table cellspacing="0">
	   <tr>
	    <td style="background-color:#FFFF5E;width:250px;" align="right">	
	  <input type="button" style="width:100px;" value="refresh" onClick="FunRef(<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)"/>
		</td>
		<td style="background-color:#FFFF5E;width:90px;" align="right">
		 <input type="button" id="edit" style="width:90px;" value="edit" onClick="FunEdit()"/>
	     <input type="submit" id="save" name="save" style="width:90px;display:none;" value="save" />
		</td>
		<td style="width:12px;">&nbsp;</td>
	   </tr>
	  </table>
	 </td>
	</tr>
</form>	
   </table>
  </td>  
  <td style="width:70%;" valign="top">
   <table style="width:100%;">
    <tr>
	 <td colspan="2" class="htf2"><u>Status</u></td>
	 <td colspan="5" class="htf2"><font style="font-size:12px;color:#FFFF64;"><input type="checkbox" id="v0" <?php if($_REQUEST['a']==1){echo 'checked';} ?> onClick="FunCheck(0,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)">:Draft&nbsp;&nbsp;<input type="checkbox" id="v1" <?php if($_REQUEST['b']==1){echo 'checked';}?> onClick="FunCheck(1,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)">:Sent&nbsp;&nbsp;<input type="checkbox" id="v2" <?php if($_REQUEST['c']==1){echo 'checked';} ?> onClick="FunCheck(2,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)">:Pending&nbsp;&nbsp;<input type="checkbox" id="v3" <?php if($_REQUEST['d']==1){echo 'checked';} ?> onClick="FunCheck(3,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)">:Approved&nbsp;&nbsp;<input type="checkbox" id="v4" <?php if($_REQUEST['e']==1){echo 'checked';} ?> onClick="FunCheck(4,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)">:Closed&nbsp;&nbsp;<input type="checkbox" id="v5" <?php if($_REQUEST['f']==1){echo 'checked';} ?> onClick="FunCheck(5,<?php echo $a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)">:Rejected</font>
	 </td>
	 <td align="right" colspan="4" class="htf2">[&nbsp;<font style="font-size:14px; color:#FFFF64;"><img src="images/delete.png"/>:&nbsp;Delete record&nbsp;&nbsp;&nbsp;<img src="images/go.png"/>:&nbsp;Send record</font>&nbsp;]</td>
	</tr>
	<tr>
      <td rowspan="2" style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td rowspan="2" style="width:80px;" class="htf">Mode</td>
	  <td rowspan="2" style="width:170px;" class="htf">Crop</td>
	  <td rowspan="2" style="width:100px;" class="htf">Hq</td>
	  <td rowspan="2" style="width:50px;" class="htf">Detail</td>
	  <td colspan="3" style="width:150px;" class="htf">Plan (Year)</td>
	  <td rowspan="2" style="width:50px;" class="htf">Expense</td>
	  <td rowspan="2" style="width:60px;" class="htf">Request Date</td>
	  <td rowspan="2" style="width:60px;" class="htf">Status</td>
	</tr>
	<tr>
	  <td style="width:50px;" class="htf">Last</td>
	  <td style="width:50px;" class="htf">Achiv</td>
	  <td style="width:50px;" class="htf">Target</td>
	</tr>
<?php if($a==1){$aa=0;}else{$aa=10;} if($b==1){$bb=1;}else{$bb=20;} if($c==1){$cc=2;}else{$cc=30;} 
      if($d==1){$dd=3;}else{$dd=40;} if($e==1){$ee=4;}else{$ee=50;} if($f==1){$ff=5;}else{$ff=60;}

$stmt=mysql_query("select * from fa_request where RequestBy=".$EmployeeId." AND (Status=".$aa." OR Status=".$bb." OR Status=".$cc." OR Status=".$dd." OR Status=".$ee." OR Status=".$ff.")", $con); $total_records=mysql_num_rows($stmt);
if(isset($_GET['page'])){$page=$_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page'];}else{$page = 1; $no=1;} 
$offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; }
$sql=mysql_query("select * from fa_request where RequestBy=".$EmployeeId." AND (Status=".$aa." OR Status=".$bb." OR Status=".$cc." OR Status=".$dd." OR Status=".$ee." OR Status=".$ff.") order by Req_Date ASC LIMIT ".$from.",".$offset, $con); 	$sn=1; while($res=mysql_fetch_array($sql)){ ?>	
    <tr>
      <td class="tdf2" align="center"><?php echo $sn; ?></td>
      <td class="tdf2" valign="top"><?php if($res['Mode']==1){echo 'DIRECT(Sales)';}elseif($res['Mode']==2){echo 'TEAMLEASE';}elseif($res['Mode']==3){echo 'DISTRIBUTOR';}?></td>
      
	  <?php /*<td class="tdf2" valign="top"><?php $crp=mysql_query("select ItemName from fa_request_crop rc inner join hrm_sales_seedsitem si on rc.ItemId=si.ItemId where FareqId=".$res['FareqId']." order by ItemName ASC",$con); while($rcrp=mysql_fetch_assoc($crp)){ echo $rcrp['ItemName'].', '; } ?></td>*/?>
	  
	  <td class="tdf2" valign="top"><?php echo $res['Crop'];?></td>
	  
	  <td class="tdf2" valign="top"><?php $hq=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'],$con); $rhq=mysql_fetch_assoc($hq); echo $rhq['HqName']; ?></td>
	  <td class="tdf2" align="center"><span style="cursor:pointer;color:#0079F2;" onClick="funDetail(<?php echo $res['FareqId']; ?>)"><u>click</u></span></td>
	  <td class="tdf2" align="right"><?php echo floatval($res['Plan_last']); ?>&nbsp;</td>
	  <td class="tdf2" align="right"><?php echo floatval($res['Plan_tgt']); ?>&nbsp;</td>
	  <td class="tdf2" align="right"><?php echo floatval($res['Plan_proj']); ?>&nbsp;</td>
	  <td class="tdf2" align="right"><?php echo floatval($res['Salary']); ?>&nbsp;</td>
	  <td class="tdf2" align="center"><?php echo date("d M y",strtotime($res['Req_Date'])); ?></td>
	  <td class="tdf2" align="center"><?php if($res['Status']==0){ ?><span style="cursor:pointer;color:#0079F2;"><img src="images/delete.png" onClick="fundel(<?php echo $res['FareqId'].','.$a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>)" /></span>&nbsp;&nbsp;<span style="cursor:pointer;color:#0079F2;"><img src="images/go.png" onClick="fungo(<?php echo $res['FareqId'].','.$res['Lvl'].','.$a.','.$b.','.$c.','.$d.','.$e.','.$f; ?>,'<?=$res['Crop']?>')" /></span>
	  <?php } elseif($res['Status']==1){ ?><font color="#E800E8">Sent</font>
	  <?php } elseif($res['Status']==2){ ?><font color="#FF6B24">Pending</font>
	  <?php } elseif($res['Status']==3){ ?><font color="#008000">Approved</font>
	  <?php } elseif($res['Status']==4){ ?><font color="#000000">Closed</font>
	  <?php } elseif($res['Status']==5){ ?><font color="#000000">Rejected</font><?php } ?>
	  </td>
	</tr>
<?php $sn++; } ?>
    <tr>
    <td align="center" colspan="11" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
     <?php doPages($offset, 'f_request.php', '', $total_records,$a,$b,$c,$d,$e,$f); ?>
    </td>
 </tr> 
   </table>
  </td>
  <td style="width:5%;" valign="top"></td>
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
function doPages($page_size, $thepage, $query_string, $total=0,$a,$b,$c,$d,$e,$f){ $index_limit = 5; $query=''; if(strlen($query_string)>0){ $query = "&amp;".$query_string; }
$current = get_current_page(); $total_pages=ceil($total/$page_size); $start=max($current-intval($index_limit/2), 1); $end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1){ echo '<span class="prn">&lt; Previous</span>&nbsp;';}else{ $i = $current-1; echo '<a href="'.$thepage.'?page='.$i.$query.'&a='.$a.'&b='.$b.'&c='.$c.'&d='.$d.'&e='.$e.'&f='.$f.'&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;">&lt; Previous</a>&nbsp;'; echo '<span class="prn">...</span>&nbsp;';}
if($start > 1){ $i = 1; echo '<a href="'.$thepage.'?page='.$i.$query.'&a='.$a.'&b='.$b.'&c='.$c.'&d='.$d.'&e='.$e.'&f='.$f.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; }
for($i = $start; $i <= $end && $i <= $total_pages; $i++)
{ if($i==$current){ echo '<span>'.$i.'</span>&nbsp;';} else { echo '<a href="'.$thepage.'?page='.$i.$query.'&a='.$a.'&b='.$b.'&c='.$c.'&d='.$d.'&e='.$e.'&f='.$f.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } }
if($total_pages > $end){ $i = $total_pages; echo '<a href="'.$thepage.'?page='.$i.$query.'&a='.$a.'&b='.$b.'&c='.$c.'&d='.$d.'&e='.$e.'&f='.$f.'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } if($current < $total_pages) { $i = $current+1; echo '<span class="prn">...</span>&nbsp;'; echo '<a href="'.$thepage.'?page='.$i.$query.'&a='.$a.'&b='.$b.'&c='.$c.'&d='.$d.'&e='.$e.'&f='.$f.'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;" style="color:#A6D2FF;">Next &gt;</a>&nbsp;'; } else { echo '<span class="prn">Next &gt;</span>&nbsp;'; } if ($total != 0){ echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#A6D2FF"<h4>[Total '.$total.' Records]</h></div>'; }
}
?>	