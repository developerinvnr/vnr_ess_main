<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton { background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:13px;width:60px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:13px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:13px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Trh60{text-align:center;width:60px;font-weight:bold;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ClickCoutry(value)
{ var url = 'SlctSalesCouStaCit.php';	var pars = 'CouId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State });
}
function show_State(originalRequest)
{ document.getElementById('StateSpan').innerHTML = originalRequest.responseText; }

function ClickState(value)
{ var CId=document.getElementById('ComId').value; var url = 'SlctSalesCouStaCit.php';	var pars = 'AchiveStaId='+value+'&CId='+CId;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Hq });
}
function show_Hq(originalRequest)
{ document.getElementById('HqSpan').innerHTML = originalRequest.responseText;}


function ClickHq(value)
{ var url = 'SlctSalesCouStaCit.php';	var pars = 'AchiveHqId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Dealer });
}
function show_Dealer(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText;}


function ClickDealer(di)
{ 
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ii=document.getElementById("ItemV").value;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; //var QtrV=document.getElementById("QtrV").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  window.location="SalesPlanR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&ii="+ii; 
}


function FunATotal(v)
{ var A=parseFloat(v); var TotA=parseFloat(document.getElementById("TotVal_A").value);
  document.getElementById("TotVal_A").value=Math.round((A+TotA)*10000)/10000; 
}
function FunBTotal(v)
{ var B=parseFloat(v); var TotB=parseFloat(document.getElementById("TotVal_B").value);
  document.getElementById("TotVal_B").value=Math.round((B+TotB)*10000)/10000; 
}
function FunCTotal(v)
{ var C=parseFloat(v); var TotC=parseFloat(document.getElementById("TotVal_C").value);
  document.getElementById("TotVal_C").value=Math.round((C+TotC)*10000)/10000; 
}
function FunDTotal(v)
{ var D=parseFloat(v); var TotD=parseFloat(document.getElementById("TotVal_D").value);
  document.getElementById("TotVal_D").value=Math.round((D+TotD)*10000)/10000; 
}
function FunETotal(v)
{ var E=parseFloat(v); var TotE=parseFloat(document.getElementById("TotVal_E").value);
  document.getElementById("TotVal_E").value=Math.round((E+TotE)*10000)/10000; 
}



function ChangrYear(YearV)
{
  var di=document.getElementById("DealerD").value; var CropGrp=document.getElementById("CropGrp").value; var ii=document.getElementById("ItemV").value;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; //var QtrV=document.getElementById("QtrV").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  window.location="SalesPlanR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&ii="+ii; 
}
function ClickGrp(CropGrp)
{
  var di=document.getElementById("DealerD").value; var YearV=document.getElementById("YearV").value; var ii=0;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; //var QtrV=document.getElementById("QtrV").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  window.location="SalesPlanR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&ii="+ii; 
}
function ChangeII(ii)
{
  var di=document.getElementById("DealerD").value; var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; //var QtrV=document.getElementById("QtrV").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  window.location="SalesPlanR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&ii="+ii; 
}

function PrintSpR()
{ var di=document.getElementById("DealerD").value; var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; //var QtrV=document.getElementById("QtrV").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  var ii=document.getElementById("ItemV").value;  
  window.open("SalesPlanRPrint.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&ii="+ii,"PrintForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=100,height=100");
}
/*
function ChangeQtr(QtrV)
{
  var di=document.getElementById("DealerD").value; var YearV=document.getElementById("YearV").value; var ii=document.getElementById("ItemV").value;
  var CropGrp=document.getElementById("CropGrp").value; var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
        window.location="Achive.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&q="+QtrV+"&ii="+ii; 
}
*/
</Script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />			  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" style="width:1150px;" valign="top">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:200px;" class="heading2" align="center"><u>Reports</u></td>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Year :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
       </td>
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Crop :</b></td>
	    <td>
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
<?php if($_REQUEST['grp']==1){ ?><option value="1" selected>VEGETABLE CROP</option><option value="2">FIELD CROP</option><option value="3">All CROP</option>
<?php }elseif($_REQUEST['grp']==2){ ?><option value="2" selected>FIELD CROP</option><option value="1">VEGETABLE CROP</option><option value="3">All CROP</option>
<?php }elseif($_REQUEST['grp']==3){ ?><option value="3" selected>All CROP</option><option value="1">VEGETABLE CROP</option><option value="2">FIELD CROP</option><?php } ?>
        </select>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>Name :</b></td>
	     <td>
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
         <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option>
		 <?php }else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php if($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by GroupId ASC,ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?>
	     </select>	  
		 </td>
		 <td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:100px;color:#E6E6E6;" align="right"><?php /*<b>Quarter :</b>*/ ?></td>
	     <td><?php /*
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="QtrV" id="QtrV" onChange="ChangeQtr(this.value)">
         <option value="<?php echo $_REQUEST['q']; ?>" selected><?php echo 'QUARTER-0'.$_REQUEST['q']; ?></option> 
<?php if($_REQUEST['q']==1){ ?>	<option value="2">QUARTER-02</option><option value="3">QUARTER-03</option><option value="4">QUARTER-04</option>
<?php } elseif($_REQUEST['q']==2){ ?><option value="3">QUARTER-03</option><option value="4">QUARTER-04</option><option value="1">QUARTER-01</option>
<?php } elseif($_REQUEST['q']==3){ ?><option value="4">QUARTER-04</option><option value="1">QUARTER-01</option><option value="2">QUARTER-02</option>
<?php } elseif($_REQUEST['q']==4){ ?><option value="1">QUARTER-01</option><option value="2">QUARTER-02</option><option value="3">QUARTER-03</option><?php } ?></select>
		*/ ?></td>
	  </tr>
	  <tr>
	    <td style="margin-top:0px;width:200px;" class="heading2" align="center"><u>Dealer-Wise</u></td>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo strtoupper($resC['CountryName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>		
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo strtoupper($ResCountry['CountryName']); ?></option><?php } ?></select>
       </td>
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>State :</b></td>
	    <td>
		 <span id="StateSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<?php if($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?>
<option value="<?php echo $_REQUEST['s']; ?>"><?php echo strtoupper($resS['StateName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>		
        <?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } ?></select>
		 </span>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>HQ :</b></td>
	     <td>
		 <span id="HqSpan">
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?>
<option value="<?php echo $_REQUEST['hq']; ?>"><?php echo strtoupper($reshq['HqName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
         <option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res['HqName']); ?></option><?php } ?></select>
		 </span>
		 </td>
		 <td>&nbsp;</td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>Dealer :</b></td>
		 <td><input type="hidden" id="DealerId" value="" /><input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="Sno" value="" />
		     <input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" /><input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" />
		  <span id="TabResult">
<select style="font-size:12px;width:250px;height:20px;background-color:#DDFFBB;" name="DealerD" id="DealerD" onChange="ClickDealer(this.value)" <?php if($_REQUEST['dil']==0){echo '';} ?>><?php if($_REQUEST['dil']>0){ $sqldil=mysql_query("SELECT DealerName,DealerCity FROM hrm_sales_dealer where DealerId=".$_REQUEST['dil'], $con); $resdil=mysql_fetch_array($sqldil); ?><option value="<?php echo $_REQUEST['dil']; ?>"><?php echo strtoupper($resdil['DealerName'].'-'.$resdil['DealerCity']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php if($_REQUEST['hq']>0){ $sql=mysql_query("SELECT DealerId,DealerName,DealerCity FROM hrm_sales_dealer where HqId=".$_REQUEST['hq'], $con); while($res=mysql_fetch_array($sql)){ ?><option value="<?php echo $res['DealerId']; ?>"><?php echo strtoupper($res['DealerName'].'-'.$res['DealerCity']); ?></option><?php } } else{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['DealerId']; ?>"><?php echo $res['DealerName'].'-'.strtoupper($res['DealerCity']); ?></option><?php } } ?></select>
	      </span>
		 </td>
		 <td>&nbsp;</td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="center"><a href="#" onClick="PrintSpR()" style="color:#FFCE9D;"><b>PRINT</b></a></td>
	  </tr>
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
<?php if($_REQUEST['dil']>0){ 
$BeforeYId2=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1; 	
$sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId2, $con); $resY1=mysql_fetch_assoc($sqlY1); 
$sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con); $resY2=mysql_fetch_assoc($sqlY2); 
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$sqlY4=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); $resY4=mysql_fetch_assoc($sqlY4);
$y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); $y1T='<font color="#A60053">Ach.</font>';
$y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); $y2T='<font color="#A60053">Ach.</font>';
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Tgt.</font>';
$y4=date("y",strtotime($resY4['FromDate'])).'-'.date("y",strtotime($resY4['ToDate'])); $y4T='<font color="#A60053">Proj.</font>';
$y5=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y5T='<font color="#A60053">YTD.</font>';
$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; $my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';
$fy1=date("Y",strtotime($resY1['FromDate'])); $ty1=date("Y",strtotime($resY1['ToDate'])); 
$fy2=date("Y",strtotime($resY2['FromDate'])); $ty2=date("Y",strtotime($resY2['ToDate'])); 
$fy3=date("Y",strtotime($resY3['FromDate'])); $ty3=date("Y",strtotime($resY3['ToDate'])); 
$fy4=date("Y",strtotime($resY4['FromDate'])); $ty4=date("Y",strtotime($resY4['ToDate'])); 
$fy5=date("Y",strtotime($resY3['FromDate'])); $ty5=date("Y",strtotime($resY3['ToDate'])); 
?>  


<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:1530px; vertical-align:top;">	

<?php ///////////////////////////////////////////////////////////?>
 <tr style="height:22px;">
  <td bgcolor="#EEEEEE" colspan="5" align="right" style="font-size:20px;"></td>
  <td bgcolor="#FAD25A" colspan="3" align="center"><b>Q1</b></td>
  <td bgcolor="#FAD25A" colspan="3" align="center"><b>Q2</b></td>
  <td bgcolor="#FAD25A" colspan="3" align="center"><b>Q3</b></td>
  <td bgcolor="#FAD25A" colspan="3" align="center"><b>Q4</b></td>
  <td bgcolor="#EEEEEE" colspan="1" align="center" width="80"><b>Total KG</b></td>
  <td bgcolor="#EEEEEE" colspan="1" align="center" width="80"><b>Total Value</b></td>
 </tr>

<?php for($i=1; $i<=5; $i++){ ?>
  <tr bgcolor="#EEEEEE" style="height:22px;"> 
   <?php if($i==1){ ?>
     <td rowspan="5" colspan="3" bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="right" style="font-size:20px;">
	 <b><?php if($i==1){ ?>Overall Reports: <?php } ?></b>&nbsp;
	 </td>	 
   <?php } ?>
   	 	
	   
<?php /* 1 */ if($i==1){
if($_REQUEST['ii']>0){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId2." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$BeforeYId2.".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$BeforeYId2.".YearId=".$BeforeYId2." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_".$BeforeYId2.".DealerId=".$_REQUEST['dil'], $con); } 
else
{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId2." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$BeforeYId2.".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." AND hrm_sales_sal_details_".$BeforeYId2.".YearId=".$BeforeYId2." AND hrm_sales_sal_details_".$BeforeYId2.".DealerId=".$_REQUEST['dil'], $con); } if($_REQUEST['grp']==3){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId2." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$BeforeYId2.".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$BeforeYId2.".YearId=".$BeforeYId2." AND hrm_sales_sal_details_".$BeforeYId2.".DealerId=".$_REQUEST['dil'], $con); }
}
 
$res1=mysql_fetch_assoc($sqlP1d); 
$res1Tot=$res1['sM1']+$res1['sM2']+$res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12'];
$TotQ1=$res1['sM1']+$res1['sM2']+$res1['sM3']; $TotQ2=$res1['sM4']+$res1['sM5']+$res1['sM6'];
$TotQ3=$res1['sM7']+$res1['sM8']+$res1['sM9']; $TotQ4=$res1['sM10']+$res1['sM11']+$res1['sM12'];
 
//$sqlNrv=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND YearId=".$BeforeYId2, $con); $resNrv=mysql_fetch_assoc($sqlNrv); 
//$sqlNrva = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resNrva = mysql_fetch_assoc($sqlNrva);
//if($resNrv['NRV']!=''){$NRV=$resNrv['NRV'];}elseif($resNrva['NRV']!=''){$NRV=$resNrva['NRV'];}else{$NRV=0;} $NetNRV_1=$res1Tot*$NRV; $LakhNRV_1=$NetNRV_1/100000; ?>
	 <td style="width:50px;" align="center"><b><?php echo $y1T; ?></b></td><td style="width:50px;" align="center"><b><?php echo $y1; ?></b></td>
	
	 <td colspan="3" align="right" width="80"><?php if($TotQ1!=''){echo $TotQ1;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($TotQ2!=''){echo $TotQ2;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($TotQ3!=''){echo $TotQ3;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($TotQ4!=''){echo $TotQ4;} ?>&nbsp;</td>
	 <td align="right" width="80"><b><?php if($res1Tot>0){echo $res1Tot;} ?></b>&nbsp;</td> 
	 <td align="center" width="80"><input type="text" id="TotVal_A" style="width:80px;height:20px;text-align:right;" value="0" readonly/></td> 
	 
<?php } /* 2 */ if($i==2){ 
if($_REQUEST['ii']>0){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$BeforeYId.".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_REQUEST['dil'], $con); }
else
{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$BeforeYId.".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId." AND hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_REQUEST['dil'], $con); } if($_REQUEST['grp']==3){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$BeforeYId.".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId." AND hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_REQUEST['dil'], $con); }
}

 
$res2=mysql_fetch_assoc($sqlP2d);
$res2Tot=$res2['sM1']+$res2['sM2']+$res2['sM3']+$res2['sM4']+$res2['sM5']+$res2['sM6']+$res2['sM7']+$res2['sM8']+$res2['sM9']+$res2['sM10']+$res2['sM11']+$res2['sM12']; 
$Tot2Q1=$res2['sM1']+$res2['sM2']+$res2['sM3']; $Tot2Q2=$res2['sM4']+$res2['sM5']+$res2['sM6'];
$Tot2Q3=$res2['sM7']+$res2['sM8']+$res2['sM9']; $Tot2Q4=$res2['sM10']+$res2['sM11']+$res2['sM12'];
//$sqlNrv2=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND YearId=".$BeforeYId, $con); $resNrv2=mysql_fetch_assoc($sqlNrv2); 
//$sqlNrv2a = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resNrv2a = mysql_fetch_assoc($sqlNrv2a);
//if($resNrv2['NRV']!=''){$NRV2=$resNrv2['NRV'];}elseif($resNrv2a['NRV']!=''){$NRV2=$resNrv2a['NRV'];}else{$NRV2=0;} $NetNRV_2=$res2Tot*$NRV2; $LakhNRV_2=$NetNRV_2/100000; ?>
     <td style="width:50px;" align="center"><b><?php echo $y2T; ?></b></td><td style="width:50px;" align="center"><b><?php echo $y2; ?></b></td>
	 
	 <td colspan="3" align="right" width="80"><?php if($Tot2Q1!=''){echo $Tot2Q1;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot2Q2!=''){echo $Tot2Q2;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot2Q3!=''){echo $Tot2Q3;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot2Q4!=''){echo $Tot2Q4;} ?>&nbsp;</td>
	 <td align="right" width="80"><b><?php if($res2Tot>0){echo $res2Tot;} ?></b>&nbsp;</td> 
	 <td align="center" width="80"><input type="text" id="TotVal_B" style="width:80px;height:20px;text-align:right;" value="0" readonly/></td>
	   
<?php } /* 3 */ if($i==3){ 
if($_REQUEST['ii']>0){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=".$_REQUEST['dil'], $con); }
else
{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y']." AND hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=".$_REQUEST['dil'], $con); } if($_REQUEST['grp']==3){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y']." AND hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=".$_REQUEST['dil'], $con); }
}

$res3=mysql_fetch_assoc($sqlP3d); 
$res3Tot=$res3['sM1']+$res3['sM2']+$res3['sM3']+$res3['sM4']+$res3['sM5']+$res3['sM6']+$res3['sM7']+$res3['sM8']+$res3['sM9']+$res3['sM10']+$res3['sM11']+$res3['sM12']; 
$Tot3Q1=$res3['sM1']+$res3['sM2']+$res3['sM3']; $Tot3Q2=$res3['sM4']+$res3['sM5']+$res3['sM6'];
$Tot3Q3=$res3['sM7']+$res3['sM8']+$res3['sM9']; $Tot3Q4=$res3['sM10']+$res3['sM11']+$res3['sM12'];
//$sqlNrv3=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $resNrv3=mysql_fetch_assoc($sqlNrv3);
//$sqlNrv3a = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resNrv3a = mysql_fetch_assoc($sqlNrv3a);
//if($resNrv3['NRV']!=''){$NRV3=$resNrv3['NRV'];}elseif($resNrv3a['NRV']!=''){$NRV3=$resNrv3a['NRV'];}else{$NRV3=0;} $NetNRV_3=$res3Tot*$NRV3; $LakhNRV_3=$NetNRV_3/100000; ?>
	 <td style="width:50px;" align="center"><b><?php echo $y3T; ?></b></td><td style="width:50px;" align="center"><b><?php echo $y3; ?></b></td> 
	 
	 <td colspan="3" align="right" width="80"><?php if($Tot3Q1!=''){echo $Tot3Q1;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot3Q2!=''){echo $Tot3Q2;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot3Q3!=''){echo $Tot3Q3;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot3Q4!=''){echo $Tot3Q4;} ?>&nbsp;</td>
	 <td align="right" width="80"><b><?php if($res3Tot>0){echo $res3Tot;} ?></b>&nbsp;</td>
	 <td align="center" width="80"><input type="text" id="TotVal_C" style="width:80px;height:20px;text-align:right;" value="0" readonly/></td>  
	     
<?php } /* 4 */  if($i==4){ 
if($_REQUEST['ii']>0){ $sqlP4d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$AfterYId.".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$AfterYId.".YearId=".$AfterYId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_".$AfterYId.".DealerId=".$_REQUEST['dil'], $con); }
else
{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sqlP4d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$AfterYId.".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." AND hrm_sales_sal_details_".$AfterYId.".YearId=".$AfterYId." AND hrm_sales_sal_details_".$AfterYId.".DealerId=".$_REQUEST['dil'], $con); } if($_REQUEST['grp']==3){ $sqlP4d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$AfterYId.".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$AfterYId.".YearId=".$AfterYId." AND hrm_sales_sal_details_".$AfterYId.".DealerId=".$_REQUEST['dil'], $con); }
}
 
$res4=mysql_fetch_assoc($sqlP4d); 
$res4Tot=$res4['sM1']+$res4['sM2']+$res4['sM3']+$res4['sM4']+$res4['sM5']+$res4['sM6']+$res4['sM7']+$res4['sM8']+$res4['sM9']+$res4['sM10']+$res4['sM11']+$res4['sM12']; 
$Tot4Q1=$res4['sM1']+$res4['sM2']+$res4['sM3']; $Tot4Q2=$res4['sM4']+$res4['sM5']+$res4['sM6'];
$Tot4Q3=$res4['sM7']+$res4['sM8']+$res4['sM9']; $Tot4Q4=$res4['sM10']+$res4['sM11']+$res4['sM12'];
//$sqlNrv4=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resNrv4=mysql_fetch_assoc($sqlNrv4); 
//$sqlNrv4a = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resNrv4a = mysql_fetch_assoc($sqlNrv4a);
//if($resNrv4['NRV']!=''){$NRV4=$resNrv4['NRV'];}elseif($resNrv4a['NRV']!=''){$NRV4=$resNrv4a['NRV'];}else{$NRV4=0;} $NetNRV_4=$res4Tot*$NRV4; $LakhNRV_4=$NetNRV_4/100000; ?>
	 <td style="width:50px;" align="center"><b><?php echo $y4T; ?></b></td><td style="width:50px;" align="center"><b><?php echo $y4; ?></b></td> 
	 <td colspan="3" align="right" width="80"><?php if($Tot4Q1!=''){echo $Tot4Q1;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot4Q2!=''){echo $Tot4Q2;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot4Q3!=''){echo $Tot4Q3;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot4Q4!=''){echo $Tot4Q4;} ?>&nbsp;</td>
	 <td align="right" width="80"><b><?php if($res4Tot>0){echo $res4Tot;} ?></b>&nbsp;</td>
	 <td align="center" width="80"><input type="text" id="TotVal_D" style="width:80px;height:20px;text-align:right;" value="0" readonly/></td>
	 
<?php } /* 5 */  $sqlYe=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$YearId, $con); $resYe=mysql_fetch_assoc($sqlYe);
        $yeft=date("y",strtotime($resYe['FromDate'])).'-'.date("y",strtotime($resYe['ToDate'])); $yeT='<font color="#A60053">YTD</font>'; 
	    if($i==5){ 
if($_REQUEST['ii']>0){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$YearId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$YearId.".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$YearId.".YearId=".$YearId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_".$YearId.".DealerId=".$_REQUEST['dil'], $con); }
else
{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$YearId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$YearId.".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." AND hrm_sales_sal_details_".$YearId.".YearId=".$YearId." AND hrm_sales_sal_details_".$YearId.".DealerId=".$_REQUEST['dil'], $con); } if($_REQUEST['grp']==3){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$YearId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$YearId.".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_sal_details_".$YearId.".YearId=".$YearId." AND hrm_sales_sal_details_".$YearId.".DealerId=".$_REQUEST['dil'], $con); }
}		
 
 $res5=mysql_fetch_assoc($sqlP5d);  
 $res5Tot=$res5['sM1']+$res5['sM2']+$res5['sM3']+$res5['sM4']+$res5['sM5']+$res5['sM6']+$res5['sM7']+$res5['sM8']+$res5['sM9']+$res5['sM10']+$res5['sM11']+$res5['sM12'];
 $Tot5Q1=$res5['sM1']+$res5['sM2']+$res5['sM3']; $Tot5Q2=$res5['sM4']+$res5['sM5']+$res5['sM6'];
 $Tot5Q3=$res5['sM7']+$res5['sM8']+$res5['sM9']; $Tot5Q4=$res5['sM10']+$res5['sM11']+$res5['sM12']; 
 
//$sqlNrv5=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND YearId=".$YearId, $con); $resNrv5=mysql_fetch_assoc($sqlNrv5); 
//$sqlNrv5a = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resNrv5a = mysql_fetch_assoc($sqlNrv5a);
//if($resNrv5['NRV']!=''){$NRV5=$resNrv5['NRV'];}elseif($resNrv5a['NRV']!=''){$NRV5=$resNrv5a['NRV'];}else{$NRV5=0;} $NetNRV_5=$res5Tot*$NRV5; $LakhNRV_5=$NetNRV_5/100000; ?>
	 <td style="width:50px;" align="center"><b><?php echo $yeT; ?></b></td><td style="width:50px;" align="center"><b><?php echo $yeft; ?></b></td> 
	 <td colspan="3" align="right" width="80"><?php if($Tot5Q1!=''){echo $Tot5Q1;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot5Q2!=''){echo $Tot5Q2;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot5Q3!=''){echo $Tot5Q3;} ?>&nbsp;</td>
	 <td colspan="3" align="right" width="80"><?php if($Tot5Q4!=''){echo $Tot5Q4;} ?>&nbsp;</td>
	 <td align="right" width="80"><b><?php if($res5Tot>0){echo $res5Tot;} ?></b>&nbsp;</td>
	 <td align="center" width="80"><input type="text" id="TotVal_E" style="width:80px;height:20px;text-align:right;" value="0" readonly/></td>
<?php } ?>	   	   
  </tr>
<?php } ?>   

<?php ////////////////////////////////////////////////////////// ?>
  
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="5" style="font-size:16px;color:#FFFF00;background-color:#183E83;width:470px;">&nbsp;<b><?php echo ucfirst(strtolower($resdil['DealerName'])).'-<font color="#D7EBFF">'.$resdil['DealerCity'].'</font>'; ?></b></td>
<td align="center" width="80" rowspan="2"><b>APR-<?php echo $my1;?></b></td><td align="center" width="80" rowspan="2"><b>MAY-<?php echo $my1;?></b></td><td align="center" width="80" rowspan="2"><b>JUN-<?php echo $my1;?></b></td><td align="center" width="80" rowspan="2"><b>JUL-<?php echo $my1;?></b></td><td align="center" width="80" rowspan="2"><b>AUG-<?php echo $my1;?></b></td><td align="center" width="80" rowspan="2"><b>SEP-<?php echo $my1;?></b></td><td align="center" width="80" rowspan="2"><b>OCT-<?php echo $my1;?></b></td><td align="center" width="80" rowspan="2"><b>NOV-<?php echo $my1;?></b></td><td align="center" width="80" rowspan="2"><b>DEC-<?php echo $my1;?></b></td><td align="center" width="80" rowspan="2"><b>JAN-<?php echo $my2;?></b></td><td align="center" width="80" rowspan="2"><b>FEB-<?php echo $my2;?></b></td><td align="center" width="80" rowspan="2"><b>MAR-<?php echo $my2;?></b></td><td align="center" width="80" rowspan="2"><b>TOTAL<br><font color="#E67300">Kg</font></b></td><td align="center" width="80" rowspan="2"><b>VALUE<br><font color="#E67300">Lakh</font></b></td>	  
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">  
    <td align="center" style="width:120px;"><b>CROP</b></td>
	<td align="center" style="width:200px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td colspan="2" align="center" style="width:100px;"><b>YEAR</b></td>
  </tr>	
  <?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  } $Sn=1; while($res=mysql_fetch_array($sql)){ for($i=1; $i<=5; $i++){?>
  <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>">&nbsp;<?php if($i==1){echo $res['ItemName'];} ?></td>	 
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>">&nbsp;<?php if($i==1){echo $res['ProductName'];} ?></td>
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="center">&nbsp;<?php if($i==1){echo substr_replace($res['TypeName'],'',2);}?></td>	  
<?php /* 1 */ if($i==1){$sqlP1d=mysql_query("select * from hrm_sales_sal_details_".$BeforeYId2." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$BeforeYId2.".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$BeforeYId2.".YearId=".$BeforeYId2." AND hrm_sales_seedsproduct.ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$BeforeYId2.".DealerId=".$_REQUEST['dil'], $con); $res1=mysql_fetch_assoc($sqlP1d); 

$res1Tot=$res1['M1_Ach']+$res1['M2_Ach']+$res1['M3_Ach']+$res1['M4_Ach']+$res1['M5_Ach']+$res1['M6_Ach']+$res1['M7_Ach']+$res1['M8_Ach']+$res1['M9_Ach']+$res1['M10_Ach']+$res1['M11_Ach']+$res1['M12_Ach']; 
//$sqlNrv=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND YearId=".$BeforeYId2, $con); $resNrv=mysql_fetch_assoc($sqlNrv);
//$sqlNrva = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resNrva = mysql_fetch_assoc($sqlNrva);
//if($resNrv['NRV']!=''){$NRV=$resNrv['NRV'];}elseif($resNrva['NRV']!=''){$NRV=$resNrva['NRV'];}else{$NRV=0;} $NetNRV_1=$res1Tot*$NRV; $LakhNRV_1=$NetNRV_1/100000; ?>
<?php 
$sN4a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-04-01' AND Tdate<='".$fy1."-04-31'", $con); 
$rowN4a=mysql_num_rows($sN4a); if($rowN4a==0){$sN4b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-04-01' AND '".$fy1."-04-31'<=Tdate", $con); $rowN4b=mysql_num_rows($sN4b);if($rowN4b==0){ $sN4c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-04-01' AND PStatus='A'", $con); $rowN4c=mysql_num_rows($sN4c);if($rowN4c==0){ $sN4d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN4d=mysql_num_rows($sN4d); if($rowN4d==0){$Nrv4=0;}else{$resN4d=mysql_fetch_assoc($sN4d); $Nrv4=$resN4d['NRV'];} }else{$resN4c=mysql_fetch_assoc($sN4c); $Nrv4=$resN4c['NRV'];} }else{$resN4b=mysql_fetch_assoc($sN4b); $Nrv4=$resN4b['NRV'];} }else{$resN4a=mysql_fetch_assoc($sN4a); $Nrv4=$resN4a['NRV'];}
$sN5a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-05-01' AND Tdate<='".$fy1."-05-31'", $con); 
$rowN5a=mysql_num_rows($sN5a); if($rowN5a==0){$sN5b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-05-01' AND '".$fy1."-05-31'<=Tdate", $con); $rowN5b=mysql_num_rows($sN5b);if($rowN5b==0){ $sN5c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-05-01' AND PStatus='A'", $con); $rowN5c=mysql_num_rows($sN5c); if($rowN5c==0){ $sN5d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN5d=mysql_num_rows($sN5d); if($rowN5d==0){$Nrv5=0;}else{$resN5d=mysql_fetch_assoc($sN5d); $Nrv5=$resN5d['NRV'];} }else{$resN5c=mysql_fetch_assoc($sN5c); $Nrv5=$resN5c['NRV'];}	}else{$resN5b=mysql_fetch_assoc($sN5b); $Nrv5=$resN5b['NRV'];} }else{$resN5a=mysql_fetch_assoc($sN5a); $Nrv5=$resN5a['NRV'];}
$sN6a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-06-01' AND Tdate<='".$fy1."-06-31'", $con); 
$rowN6a=mysql_num_rows($sN6a); if($rowN6a==0){$sN6b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-06-01' AND '".$fy1."-06-31'<=Tdate", $con); $rowN6b=mysql_num_rows($sN6b);if($rowN6b==0){ $sN6c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-06-01' AND PStatus='A'", $con); $rowN6c=mysql_num_rows($sN6c); if($rowN6c==0){ $sN6d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN6d=mysql_num_rows($sN6d); if($rowN6d==0){$Nrv6=0;}else{$resN6d=mysql_fetch_assoc($sN6d); $Nrv6=$resN6d['NRV'];} }else{$resN6c=mysql_fetch_assoc($sN6c); $Nrv6=$resN6c['NRV'];}	}else{$resN6b=mysql_fetch_assoc($sN6b); $Nrv6=$resN6b['NRV'];} }else{$resN6a=mysql_fetch_assoc($sN6a); $Nrv6=$resN6a['NRV'];}
$sN7a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-07-01' AND Tdate<='".$fy1."-07-31'", $con); 
$rowN7a=mysql_num_rows($sN7a); if($rowN7a==0){$sN7b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-07-01' AND '".$fy1."-07-31'<=Tdate", $con); $rowN7b=mysql_num_rows($sN7b);if($rowN7b==0){ $sN7c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-07-01' AND PStatus='A'", $con); $rowN7c=mysql_num_rows($sN7c); if($rowN7c==0){ $sN7d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN7d=mysql_num_rows($sN7d); if($rowN7d==0){$Nrv7=0;}else{$resN7d=mysql_fetch_assoc($sN7d); $Nrv7=$resN7d['NRV'];} }else{$resN7c=mysql_fetch_assoc($sN7c); $Nrv7=$resN7c['NRV'];}	}else{$resN7b=mysql_fetch_assoc($sN7b); $Nrv7=$resN7b['NRV'];} }else{$resN7a=mysql_fetch_assoc($sN7a); $Nrv7=$resN7a['NRV'];}
$sN8a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-08-01' AND Tdate<='".$fy1."-08-31'", $con); 
$rowN8a=mysql_num_rows($sN8a); if($rowN8a==0){$sN8b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-08-01' AND '".$fy1."-08-31'<=Tdate", $con); $rowN8b=mysql_num_rows($sN8b);if($rowN8b==0){ $sN8c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-08-01' AND PStatus='A'", $con); $rowN8c=mysql_num_rows($sN8c); if($rowN8c==0){ $sN8d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN8d=mysql_num_rows($sN8d); if($rowN8d==0){$Nrv8=0;}else{$resN8d=mysql_fetch_assoc($sN8d); $Nrv8=$resN8d['NRV'];} }else{$resN8c=mysql_fetch_assoc($sN8c); $Nrv8=$resN8c['NRV'];}	}else{$resN8b=mysql_fetch_assoc($sN8b); $Nrv8=$resN8b['NRV'];} }else{$resN8a=mysql_fetch_assoc($sN8a); $Nrv8=$resN8a['NRV'];}
$sN9a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-09-01' AND Tdate<='".$fy1."-09-31'", $con); 
$rowN9a=mysql_num_rows($sN9a); if($rowN9a==0){$sN9b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-09-01' AND '".$fy1."-09-31'<=Tdate", $con); $rowN9b=mysql_num_rows($sN9b);if($rowN9b==0){ $sN9c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-09-01' AND PStatus='A'", $con); $rowN9c=mysql_num_rows($sN9c); if($rowN9c==0){ $sN9d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN9d=mysql_num_rows($sN9d); if($rowN9d==0){$Nrv9=0;}else{$resN9d=mysql_fetch_assoc($sN9d); $Nrv9=$resN9d['NRV'];} }else{$resN9c=mysql_fetch_assoc($sN9c); $Nrv9=$resN9c['NRV'];}	}else{$resN9b=mysql_fetch_assoc($sN9b); $Nrv9=$resN9b['NRV'];} }else{$resN9a=mysql_fetch_assoc($sN9a); $Nrv9=$resN9a['NRV'];}
$sN10a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-10-01' AND Tdate<='".$fy1."-10-31'", $con); 
$rowN10a=mysql_num_rows($sN10a); if($rowN10a==0){$sN10b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-10-01' AND '".$fy1."-10-31'<=Tdate", $con); $rowN10b=mysql_num_rows($sN10b);if($rowN10b==0){ $sN10c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-10-01' AND PStatus='A'", $con); $rowN10c=mysql_num_rows($sN10c); if($rowN10c==0){ $sN10d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN10d=mysql_num_rows($sN10d); if($rowN10d==0){$Nrv10=0;}else{$resN10d=mysql_fetch_assoc($sN10d); $Nrv10=$resN10d['NRV'];} }else{$resN10c=mysql_fetch_assoc($sN10c); $Nrv10=$resN10c['NRV'];}	}else{$resN10b=mysql_fetch_assoc($sN10b); $Nrv10=$resN10b['NRV'];} }else{$resN10a=mysql_fetch_assoc($sN10a); $Nrv10=$resN10a['NRV'];}
$sN11a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-11-01' AND Tdate<='".$fy1."-11-31'", $con); 
$rowN11a=mysql_num_rows($sN11a); if($rowN11a==0){$sN11b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-11-01' AND '".$fy1."-11-31'<=Tdate", $con); $rowN11b=mysql_num_rows($sN11b);if($rowN11b==0){ $sN11c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-11-01' AND PStatus='A'", $con); $rowN11c=mysql_num_rows($sN11c); if($rowN11c==0){ $sN11d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN11d=mysql_num_rows($sN11d); if($rowN11d==0){$Nrv11=0;}else{$resN11d=mysql_fetch_assoc($sN11d); $Nrv11=$resN11d['NRV'];} }else{$resN11c=mysql_fetch_assoc($sN11c); $Nrv11=$resN11c['NRV'];}	}else{$resN11b=mysql_fetch_assoc($sN11b); $Nrv11=$resN11b['NRV'];} }else{$resN11a=mysql_fetch_assoc($sN11a); $Nrv11=$resN11a['NRV'];}
$sN12a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-12-01' AND Tdate<='".$fy1."-12-31'", $con); 
$rowN12a=mysql_num_rows($sN12a); if($rowN12a==0){$sN12b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-12-01' AND '".$fy1."-12-31'<=Tdate", $con); $rowN12b=mysql_num_rows($sN12b);if($rowN12b==0){ $sN12c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy1."-12-01' AND PStatus='A'", $con); $rowN12c=mysql_num_rows($sN12c); if($rowN12c==0){ $sN12d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN12d=mysql_num_rows($sN12d); if($rowN12d==0){$Nrv12=0;}else{$resN12d=mysql_fetch_assoc($sN12d); $Nrv12=$resN12d['NRV'];} }else{$resN12c=mysql_fetch_assoc($sN12c); $Nrv12=$resN12c['NRV'];}	}else{$resN12b=mysql_fetch_assoc($sN12b); $Nrv12=$resN12b['NRV'];} }else{$resN12a=mysql_fetch_assoc($sN12a); $Nrv12=$resN12a['NRV'];}
$sN1a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty1."-01-01' AND Tdate<='".$ty1."-01-31'", $con); 
$rowN1a=mysql_num_rows($sN1a); if($rowN1a==0){$sN1b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty1."-01-01' AND '".$ty1."-01-31'<=Tdate", $con); $rowN1b=mysql_num_rows($sN1b);if($rowN1b==0){ $sN1c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty1."-01-01' AND PStatus='A'", $con); $rowN1c=mysql_num_rows($sN1c); if($rowN1c==0){ $sN1d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN1d=mysql_num_rows($sN1d); if($rowN1d==0){$Nrv1=0;}else{$resN1d=mysql_fetch_assoc($sN1d); $Nrv1=$resN1d['NRV'];} }else{$resN1c=mysql_fetch_assoc($sN1c); $Nrv1=$resN1c['NRV'];}	}else{$resN1b=mysql_fetch_assoc($sN1b); $Nrv1=$resN1b['NRV'];} }else{$resN1a=mysql_fetch_assoc($sN1a); $Nrv1=$resN1a['NRV'];}
$sN2a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty1."-02-01' AND Tdate<='".$ty1."-02-31'", $con); 
$rowN2a=mysql_num_rows($sN2a); if($rowN2a==0){$sN2b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty1."-02-01' AND '".$ty1."-02-31'<=Tdate", $con); $rowN2b=mysql_num_rows($sN2b);if($rowN2b==0){ $sN2c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty1."-02-01' AND PStatus='A'", $con); $rowN2c=mysql_num_rows($sN2c); if($rowN2c==0){ $sN2d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN2d=mysql_num_rows($sN2d); if($rowN2d==0){$Nrv2=0;}else{$resN2d=mysql_fetch_assoc($sN2d); $Nrv2=$resN2d['NRV'];} }else{$resN2c=mysql_fetch_assoc($sN2c); $Nrv2=$resN2c['NRV'];}	}else{$resN2b=mysql_fetch_assoc($sN2b); $Nrv2=$resN2b['NRV'];} }else{$resN2a=mysql_fetch_assoc($sN2a); $Nrv2=$resN2a['NRV'];}
$sN3a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty1."-03-01' AND Tdate<='".$ty1."-03-31'", $con); 
$rowN3a=mysql_num_rows($sN3a); if($rowN3a==0){$sN3b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty1."-03-01' AND '".$ty1."-03-31'<=Tdate", $con); $rowN3b=mysql_num_rows($sN3b);if($rowN3b==0){ $sN3c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty1."-03-01' AND PStatus='A'", $con); $rowN3c=mysql_num_rows($sN3c); if($rowN3c==0){ $sN3d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN3d=mysql_num_rows($sN3d); if($rowN3d==0){$Nrv3=0;}else{$resN3d=mysql_fetch_assoc($sN3d); $Nrv3=$resN3d['NRV'];} }else{$resN3c=mysql_fetch_assoc($sN3c); $Nrv3=$resN3c['NRV'];}	}else{$resN3b=mysql_fetch_assoc($sN3b); $Nrv3=$resN3b['NRV'];} }else{$resN3a=mysql_fetch_assoc($sN3a); $Nrv3=$resN3a['NRV'];}
$Net4=$res1['M1_Ach']*$Nrv4; $Net5=$res1['M2_Ach']*$Nrv5; $Net6=$res1['M3_Ach']*$Nrv6; $Net7=$res1['M4_Ach']*$Nrv7; $Net8=$res1['M5_Ach']*$Nrv8; 
$Net9=$res1['M6_Ach']*$Nrv9; $Net10=$res1['M7_Ach']*$Nrv10; $Net11=$res1['M8_Ach']*$Nrv11; $Net12=$res1['M9_Ach']*$Nrv12; $Net1=$res1['M10_Ach']*$Nrv1; 
$Net2=$res1['M11_Ach']*$Nrv2; $Net3=$res1['M12_Ach']*$Nrv3; $NetNRV_1=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_1=$NetNRV_1/100000;
?>



	 <td style="width:50px;" align="center"><b><?php echo $y1T; ?></b></td><td style="width:50px;" align="center"><b><?php echo $y1; ?></b></td>
	 <td align="right" width="80"><?php if($res1['M1_Ach']>0){echo $res1['M1_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['M2_Ach']>0){echo $res1['M2_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['M3_Ach']>0){echo $res1['M3_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['M4_Ach']>0){echo $res1['M4_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['M5_Ach']>0){echo $res1['M5_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['M6_Ach']>0){echo $res1['M6_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['M7_Ach']>0){echo $res1['M7_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['M8_Ach']>0){echo $res1['M8_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['M9_Ach']>0){echo $res1['M9_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['M10_Ach']>0){echo $res1['M10_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['M11_Ach']>0){echo $res1['M11_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['M12_Ach']>0){echo $res1['M12_Ach'];} ?>&nbsp;</td><td align="right" width="80"><b><?php if($res1Tot>0){echo $res1Tot;} ?></b>&nbsp;</td><td align="right" width="80"><b><?php if($LakhNRV_1>0){echo round($LakhNRV_1,4);} ?></b>&nbsp;
	 <input type="hidden" id="<?php echo 'A'.$Sn; ?>" value="<?php if($LakhNRV_1>0){echo round($LakhNRV_1,4);}else{echo 0;} ?>" />
	 <?php if($LakhNRV_1>0){$valA=$LakhNRV_1;}else{$valA=0;} echo '<script>FunATotal('.$valA.');</script>'; ?>
	 </td> 
	 
<?php } /* 2 */ if($i==2){ $sqlP2d=mysql_query("select * from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$BeforeYId.".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId." AND hrm_sales_seedsproduct.ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_REQUEST['dil'], $con); $res2=mysql_fetch_assoc($sqlP2d);
$res2Tot=$res2['M1_Ach']+$res2['M2_Ach']+$res2['M3_Ach']+$res2['M4_Ach']+$res2['M5_Ach']+$res2['M6_Ach']+$res2['M7_Ach']+$res2['M8_Ach']+$res2['M9_Ach']+$res2['M10_Ach']+$res2['M11_Ach']+$res2['M12_Ach']; 
//$sqlNrv2=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND YearId=".$BeforeYId, $con); $resNrv2=mysql_fetch_assoc($sqlNrv2); 
//$sqlNrv2a = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resNrv2a = mysql_fetch_assoc($sqlNrv2a);
//if($resNrv2['NRV']!=''){$NRV2=$resNrv2['NRV'];}elseif($resNrv2a['NRV']!=''){$NRV2=$resNrv2a['NRV'];}else{$NRV2=0;} $NetNRV_2=$res2Tot*$NRV2; $LakhNRV_2=$NetNRV_2/100000; ?>

<?php 
$sN4a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-04-01' AND Tdate<='".$fy2."-04-31'", $con); 
$rowN4a=mysql_num_rows($sN4a); if($rowN4a==0){$sN4b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-04-01' AND '".$fy2."-04-31'<=Tdate", $con); $rowN4b=mysql_num_rows($sN4b);if($rowN4b==0){ $sN4c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-04-01' AND PStatus='A'", $con); $rowN4c=mysql_num_rows($sN4c);if($rowN4c==0){ $sN4d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN4d=mysql_num_rows($sN4d); if($rowN4d==0){$Nrv4=0;}else{$resN4d=mysql_fetch_assoc($sN4d); $Nrv4=$resN4d['NRV'];} }else{$resN4c=mysql_fetch_assoc($sN4c); $Nrv4=$resN4c['NRV'];} }else{$resN4b=mysql_fetch_assoc($sN4b); $Nrv4=$resN4b['NRV'];} }else{$resN4a=mysql_fetch_assoc($sN4a); $Nrv4=$resN4a['NRV'];}
$sN5a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-05-01' AND Tdate<='".$fy2."-05-31'", $con); 
$rowN5a=mysql_num_rows($sN5a); if($rowN5a==0){$sN5b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-05-01' AND '".$fy2."-05-31'<=Tdate", $con); $rowN5b=mysql_num_rows($sN5b);if($rowN5b==0){ $sN5c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-05-01' AND PStatus='A'", $con); $rowN5c=mysql_num_rows($sN5c); if($rowN5c==0){ $sN5d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN5d=mysql_num_rows($sN5d); if($rowN5d==0){$Nrv5=0;}else{$resN5d=mysql_fetch_assoc($sN5d); $Nrv5=$resN5d['NRV'];} }else{$resN5c=mysql_fetch_assoc($sN5c); $Nrv5=$resN5c['NRV'];}	}else{$resN5b=mysql_fetch_assoc($sN5b); $Nrv5=$resN5b['NRV'];} }else{$resN5a=mysql_fetch_assoc($sN5a); $Nrv5=$resN5a['NRV'];}
$sN6a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-06-01' AND Tdate<='".$fy2."-06-31'", $con); 
$rowN6a=mysql_num_rows($sN6a); if($rowN6a==0){$sN6b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-06-01' AND '".$fy2."-06-31'<=Tdate", $con); $rowN6b=mysql_num_rows($sN6b);if($rowN6b==0){ $sN6c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-06-01' AND PStatus='A'", $con); $rowN6c=mysql_num_rows($sN6c); if($rowN6c==0){ $sN6d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN6d=mysql_num_rows($sN6d); if($rowN6d==0){$Nrv6=0;}else{$resN6d=mysql_fetch_assoc($sN6d); $Nrv6=$resN6d['NRV'];} }else{$resN6c=mysql_fetch_assoc($sN6c); $Nrv6=$resN6c['NRV'];}	}else{$resN6b=mysql_fetch_assoc($sN6b); $Nrv6=$resN6b['NRV'];} }else{$resN6a=mysql_fetch_assoc($sN6a); $Nrv6=$resN6a['NRV'];}
$sN7a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-07-01' AND Tdate<='".$fy2."-07-31'", $con); 
$rowN7a=mysql_num_rows($sN7a); if($rowN7a==0){$sN7b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-07-01' AND '".$fy2."-07-31'<=Tdate", $con); $rowN7b=mysql_num_rows($sN7b);if($rowN7b==0){ $sN7c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-07-01' AND PStatus='A'", $con); $rowN7c=mysql_num_rows($sN7c); if($rowN7c==0){ $sN7d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN7d=mysql_num_rows($sN7d); if($rowN7d==0){$Nrv7=0;}else{$resN7d=mysql_fetch_assoc($sN7d); $Nrv7=$resN7d['NRV'];} }else{$resN7c=mysql_fetch_assoc($sN7c); $Nrv7=$resN7c['NRV'];}	}else{$resN7b=mysql_fetch_assoc($sN7b); $Nrv7=$resN7b['NRV'];} }else{$resN7a=mysql_fetch_assoc($sN7a); $Nrv7=$resN7a['NRV'];}
$sN8a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-08-01' AND Tdate<='".$fy2."-08-31'", $con); 
$rowN8a=mysql_num_rows($sN8a); if($rowN8a==0){$sN8b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-08-01' AND '".$fy2."-08-31'<=Tdate", $con); $rowN8b=mysql_num_rows($sN8b);if($rowN8b==0){ $sN8c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-08-01' AND PStatus='A'", $con); $rowN8c=mysql_num_rows($sN8c); if($rowN8c==0){ $sN8d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN8d=mysql_num_rows($sN8d); if($rowN8d==0){$Nrv8=0;}else{$resN8d=mysql_fetch_assoc($sN8d); $Nrv8=$resN8d['NRV'];} }else{$resN8c=mysql_fetch_assoc($sN8c); $Nrv8=$resN8c['NRV'];}	}else{$resN8b=mysql_fetch_assoc($sN8b); $Nrv8=$resN8b['NRV'];} }else{$resN8a=mysql_fetch_assoc($sN8a); $Nrv8=$resN8a['NRV'];}
$sN9a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-09-01' AND Tdate<='".$fy2."-09-31'", $con); 
$rowN9a=mysql_num_rows($sN9a); if($rowN9a==0){$sN9b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-09-01' AND '".$fy2."-09-31'<=Tdate", $con); $rowN9b=mysql_num_rows($sN9b);if($rowN9b==0){ $sN9c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-09-01' AND PStatus='A'", $con); $rowN9c=mysql_num_rows($sN9c); if($rowN9c==0){ $sN9d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN9d=mysql_num_rows($sN9d); if($rowN9d==0){$Nrv9=0;}else{$resN9d=mysql_fetch_assoc($sN9d); $Nrv9=$resN9d['NRV'];} }else{$resN9c=mysql_fetch_assoc($sN9c); $Nrv9=$resN9c['NRV'];}	}else{$resN9b=mysql_fetch_assoc($sN9b); $Nrv9=$resN9b['NRV'];} }else{$resN9a=mysql_fetch_assoc($sN9a); $Nrv9=$resN9a['NRV'];}
$sN10a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-10-01' AND Tdate<='".$fy2."-10-31'", $con); 
$rowN10a=mysql_num_rows($sN10a); if($rowN10a==0){$sN10b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-10-01' AND '".$fy2."-10-31'<=Tdate", $con); $rowN10b=mysql_num_rows($sN10b);if($rowN10b==0){ $sN10c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-10-01' AND PStatus='A'", $con); $rowN10c=mysql_num_rows($sN10c); if($rowN10c==0){ $sN10d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN10d=mysql_num_rows($sN10d); if($rowN10d==0){$Nrv10=0;}else{$resN10d=mysql_fetch_assoc($sN10d); $Nrv10=$resN10d['NRV'];} }else{$resN10c=mysql_fetch_assoc($sN10c); $Nrv10=$resN10c['NRV'];}	}else{$resN10b=mysql_fetch_assoc($sN10b); $Nrv10=$resN10b['NRV'];} }else{$resN10a=mysql_fetch_assoc($sN10a); $Nrv10=$resN10a['NRV'];}
$sN11a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-11-01' AND Tdate<='".$fy2."-11-31'", $con); 
$rowN11a=mysql_num_rows($sN11a); if($rowN11a==0){$sN11b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-11-01' AND '".$fy2."-11-31'<=Tdate", $con); $rowN11b=mysql_num_rows($sN11b);if($rowN11b==0){ $sN11c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-11-01' AND PStatus='A'", $con); $rowN11c=mysql_num_rows($sN11c); if($rowN11c==0){ $sN11d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN11d=mysql_num_rows($sN11d); if($rowN11d==0){$Nrv11=0;}else{$resN11d=mysql_fetch_assoc($sN11d); $Nrv11=$resN11d['NRV'];} }else{$resN11c=mysql_fetch_assoc($sN11c); $Nrv11=$resN11c['NRV'];}	}else{$resN11b=mysql_fetch_assoc($sN11b); $Nrv11=$resN11b['NRV'];} }else{$resN11a=mysql_fetch_assoc($sN11a); $Nrv11=$resN11a['NRV'];}
$sN12a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-12-01' AND Tdate<='".$fy2."-12-31'", $con); 
$rowN12a=mysql_num_rows($sN12a); if($rowN12a==0){$sN12b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-12-01' AND '".$fy2."-12-31'<=Tdate", $con); $rowN12b=mysql_num_rows($sN12b);if($rowN12b==0){ $sN12c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy2."-12-01' AND PStatus='A'", $con); $rowN12c=mysql_num_rows($sN12c); if($rowN12c==0){ $sN12d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN12d=mysql_num_rows($sN12d); if($rowN12d==0){$Nrv12=0;}else{$resN12d=mysql_fetch_assoc($sN12d); $Nrv12=$resN12d['NRV'];} }else{$resN12c=mysql_fetch_assoc($sN12c); $Nrv12=$resN12c['NRV'];}	}else{$resN12b=mysql_fetch_assoc($sN12b); $Nrv12=$resN12b['NRV'];} }else{$resN12a=mysql_fetch_assoc($sN12a); $Nrv12=$resN12a['NRV'];}
$sN1a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty2."-01-01' AND Tdate<='".$ty2."-01-31'", $con); 
$rowN1a=mysql_num_rows($sN1a); if($rowN1a==0){$sN1b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty2."-01-01' AND '".$ty2."-01-31'<=Tdate", $con); $rowN1b=mysql_num_rows($sN1b);if($rowN1b==0){ $sN1c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty2."-01-01' AND PStatus='A'", $con); $rowN1c=mysql_num_rows($sN1c); if($rowN1c==0){ $sN1d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN1d=mysql_num_rows($sN1d); if($rowN1d==0){$Nrv1=0;}else{$resN1d=mysql_fetch_assoc($sN1d); $Nrv1=$resN1d['NRV'];} }else{$resN1c=mysql_fetch_assoc($sN1c); $Nrv1=$resN1c['NRV'];}	}else{$resN1b=mysql_fetch_assoc($sN1b); $Nrv1=$resN1b['NRV'];} }else{$resN1a=mysql_fetch_assoc($sN1a); $Nrv1=$resN1a['NRV'];}
$sN2a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty2."-02-01' AND Tdate<='".$ty2."-02-31'", $con); 
$rowN2a=mysql_num_rows($sN2a); if($rowN2a==0){$sN2b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty2."-02-01' AND '".$ty2."-02-31'<=Tdate", $con); $rowN2b=mysql_num_rows($sN2b);if($rowN2b==0){ $sN2c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty2."-02-01' AND PStatus='A'", $con); $rowN2c=mysql_num_rows($sN2c); if($rowN2c==0){ $sN2d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN2d=mysql_num_rows($sN2d); if($rowN2d==0){$Nrv2=0;}else{$resN2d=mysql_fetch_assoc($sN2d); $Nrv2=$resN2d['NRV'];} }else{$resN2c=mysql_fetch_assoc($sN2c); $Nrv2=$resN2c['NRV'];}	}else{$resN2b=mysql_fetch_assoc($sN2b); $Nrv2=$resN2b['NRV'];} }else{$resN2a=mysql_fetch_assoc($sN2a); $Nrv2=$resN2a['NRV'];}
$sN3a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty2."-03-01' AND Tdate<='".$ty2."-03-31'", $con); 
$rowN3a=mysql_num_rows($sN3a); if($rowN3a==0){$sN3b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty2."-03-01' AND '".$ty2."-03-31'<=Tdate", $con); $rowN3b=mysql_num_rows($sN3b);if($rowN3b==0){ $sN3c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty2."-03-01' AND PStatus='A'", $con); $rowN3c=mysql_num_rows($sN3c); if($rowN3c==0){ $sN3d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN3d=mysql_num_rows($sN3d); if($rowN3d==0){$Nrv3=0;}else{$resN3d=mysql_fetch_assoc($sN3d); $Nrv3=$resN3d['NRV'];} }else{$resN3c=mysql_fetch_assoc($sN3c); $Nrv3=$resN3c['NRV'];}	}else{$resN3b=mysql_fetch_assoc($sN3b); $Nrv3=$resN3b['NRV'];} }else{$resN3a=mysql_fetch_assoc($sN3a); $Nrv3=$resN3a['NRV'];}
$Net4=$res2['M1_Ach']*$Nrv4; $Net5=$res2['M2_Ach']*$Nrv5; $Net6=$res2['M3_Ach']*$Nrv6; $Net7=$res2['M4_Ach']*$Nrv7; $Net8=$res2['M5_Ach']*$Nrv8; 
$Net9=$res2['M6_Ach']*$Nrv9; $Net10=$res2['M7_Ach']*$Nrv10; $Net11=$res2['M8_Ach']*$Nrv11; $Net12=$res2['M9_Ach']*$Nrv12; $Net1=$res2['M10_Ach']*$Nrv1; 
$Net2=$res2['M11_Ach']*$Nrv2; $Net3=$res2['M12_Ach']*$Nrv3; $NetNRV_2=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_2=$NetNRV_2/100000;
?>


     <td style="width:50px;" align="center"><b><?php echo $y2T; ?></b></td><td style="width:50px;" align="center"><b><?php echo $y2; ?></b></td>
	 <td align="right" width="80"><?php if($res2['M1_Ach']!=''){echo $res2['M1_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['M2_Ach']!=''){echo $res2['M2_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['M3_Ach']!=''){echo $res2['M3_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['M4_Ach']!=''){echo $res2['M4_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['M5_Ach']!=''){echo $res2['M5_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['M6_Ach']!=''){echo $res2['M6_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['M7_Ach']!=''){echo $res2['M7_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['M8_Ach']!=''){echo $res2['M8_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['M9_Ach']!=''){echo $res2['M9_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['M10_Ach']!=''){echo $res2['M10_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['M11_Ach']!=''){echo $res2['M11_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['M12_Ach']!=''){echo $res2['M12_Ach'];} ?>&nbsp;</td><td align="right" width="80"><b><?php if($res2Tot>0){echo $res2Tot;} ?></b>&nbsp;</td><td align="right" width="80"><b><?php if($LakhNRV_2>0){echo round($LakhNRV_2,4);} ?></b>&nbsp;
	 <input type="hidden" id="id="<?php echo 'B'.$Sn; ?>"" value="<?php if($LakhNRV_2>0){echo round($LakhNRV_2,4);}else{echo 0;} ?>" />
	 <?php if($LakhNRV_2>0){$valB=$LakhNRV_2;}else{$valB=0;} echo '<script>FunBTotal('.$valB.');</script>'; ?>
	 </td>  
	   
<?php } /* 3 */ if($i==3){ $sqlP3d=mysql_query("select * from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y']." AND hrm_sales_seedsproduct.ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=".$_REQUEST['dil'], $con); $res3=mysql_fetch_assoc($sqlP3d); 
$res3Tot=$res3['M1']+$res3['M2']+$res3['M3']+$res3['M4']+$res3['M5']+$res3['M6']+$res3['M7']+$res3['M8']+$res3['M9']+$res3['M10']+$res3['M11']+$res3['M12']; 
//$sqlNrv3=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $resNrv3=mysql_fetch_assoc($sqlNrv3);
//$sqlNrv3a = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resNrv3a = mysql_fetch_assoc($sqlNrv3a);
//if($resNrv3['NRV']!=''){$NRV3=$resNrv3['NRV'];}elseif($resNrv3a['NRV']!=''){$NRV3=$resNrv3a['NRV'];}else{$NRV3=0;} $NetNRV_3=$res3Tot*$NRV3; $LakhNRV_3=$NetNRV_3/100000; ?>

<?php 
$sN4a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-04-01' AND Tdate<='".$fy3."-04-31'", $con); 
$rowN4a=mysql_num_rows($sN4a); if($rowN4a==0){$sN4b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-04-01' AND '".$fy3."-04-31'<=Tdate", $con); $rowN4b=mysql_num_rows($sN4b);if($rowN4b==0){ $sN4c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-04-01' AND PStatus='A'", $con); $rowN4c=mysql_num_rows($sN4c);if($rowN4c==0){ $sN4d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN4d=mysql_num_rows($sN4d); if($rowN4d==0){$Nrv4=0;}else{$resN4d=mysql_fetch_assoc($sN4d); $Nrv4=$resN4d['NRV'];} }else{$resN4c=mysql_fetch_assoc($sN4c); $Nrv4=$resN4c['NRV'];} }else{$resN4b=mysql_fetch_assoc($sN4b); $Nrv4=$resN4b['NRV'];} }else{$resN4a=mysql_fetch_assoc($sN4a); $Nrv4=$resN4a['NRV'];}
$sN5a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-05-01' AND Tdate<='".$fy3."-05-31'", $con); 
$rowN5a=mysql_num_rows($sN5a); if($rowN5a==0){$sN5b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-05-01' AND '".$fy3."-05-31'<=Tdate", $con); $rowN5b=mysql_num_rows($sN5b);if($rowN5b==0){ $sN5c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-05-01' AND PStatus='A'", $con); $rowN5c=mysql_num_rows($sN5c); if($rowN5c==0){ $sN5d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN5d=mysql_num_rows($sN5d); if($rowN5d==0){$Nrv5=0;}else{$resN5d=mysql_fetch_assoc($sN5d); $Nrv5=$resN5d['NRV'];} }else{$resN5c=mysql_fetch_assoc($sN5c); $Nrv5=$resN5c['NRV'];}	}else{$resN5b=mysql_fetch_assoc($sN5b); $Nrv5=$resN5b['NRV'];} }else{$resN5a=mysql_fetch_assoc($sN5a); $Nrv5=$resN5a['NRV'];}
$sN6a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-06-01' AND Tdate<='".$fy3."-06-31'", $con); 
$rowN6a=mysql_num_rows($sN6a); if($rowN6a==0){$sN6b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-06-01' AND '".$fy3."-06-31'<=Tdate", $con); $rowN6b=mysql_num_rows($sN6b);if($rowN6b==0){ $sN6c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-06-01' AND PStatus='A'", $con); $rowN6c=mysql_num_rows($sN6c); if($rowN6c==0){ $sN6d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN6d=mysql_num_rows($sN6d); if($rowN6d==0){$Nrv6=0;}else{$resN6d=mysql_fetch_assoc($sN6d); $Nrv6=$resN6d['NRV'];} }else{$resN6c=mysql_fetch_assoc($sN6c); $Nrv6=$resN6c['NRV'];}	}else{$resN6b=mysql_fetch_assoc($sN6b); $Nrv6=$resN6b['NRV'];} }else{$resN6a=mysql_fetch_assoc($sN6a); $Nrv6=$resN6a['NRV'];}
$sN7a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-07-01' AND Tdate<='".$fy3."-07-31'", $con); 
$rowN7a=mysql_num_rows($sN7a); if($rowN7a==0){$sN7b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-07-01' AND '".$fy3."-07-31'<=Tdate", $con); $rowN7b=mysql_num_rows($sN7b);if($rowN7b==0){ $sN7c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-07-01' AND PStatus='A'", $con); $rowN7c=mysql_num_rows($sN7c); if($rowN7c==0){ $sN7d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN7d=mysql_num_rows($sN7d); if($rowN7d==0){$Nrv7=0;}else{$resN7d=mysql_fetch_assoc($sN7d); $Nrv7=$resN7d['NRV'];} }else{$resN7c=mysql_fetch_assoc($sN7c); $Nrv7=$resN7c['NRV'];}	}else{$resN7b=mysql_fetch_assoc($sN7b); $Nrv7=$resN7b['NRV'];} }else{$resN7a=mysql_fetch_assoc($sN7a); $Nrv7=$resN7a['NRV'];}
$sN8a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-08-01' AND Tdate<='".$fy3."-08-31'", $con); 
$rowN8a=mysql_num_rows($sN8a); if($rowN8a==0){$sN8b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-08-01' AND '".$fy3."-08-31'<=Tdate", $con); $rowN8b=mysql_num_rows($sN8b);if($rowN8b==0){ $sN8c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-08-01' AND PStatus='A'", $con); $rowN8c=mysql_num_rows($sN8c); if($rowN8c==0){ $sN8d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN8d=mysql_num_rows($sN8d); if($rowN8d==0){$Nrv8=0;}else{$resN8d=mysql_fetch_assoc($sN8d); $Nrv8=$resN8d['NRV'];} }else{$resN8c=mysql_fetch_assoc($sN8c); $Nrv8=$resN8c['NRV'];}	}else{$resN8b=mysql_fetch_assoc($sN8b); $Nrv8=$resN8b['NRV'];} }else{$resN8a=mysql_fetch_assoc($sN8a); $Nrv8=$resN8a['NRV'];}
$sN9a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-09-01' AND Tdate<='".$fy3."-09-31'", $con); 
$rowN9a=mysql_num_rows($sN9a); if($rowN9a==0){$sN9b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-09-01' AND '".$fy3."-09-31'<=Tdate", $con); $rowN9b=mysql_num_rows($sN9b);if($rowN9b==0){ $sN9c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-09-01' AND PStatus='A'", $con); $rowN9c=mysql_num_rows($sN9c); if($rowN9c==0){ $sN9d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN9d=mysql_num_rows($sN9d); if($rowN9d==0){$Nrv9=0;}else{$resN9d=mysql_fetch_assoc($sN9d); $Nrv9=$resN9d['NRV'];} }else{$resN9c=mysql_fetch_assoc($sN9c); $Nrv9=$resN9c['NRV'];}	}else{$resN9b=mysql_fetch_assoc($sN9b); $Nrv9=$resN9b['NRV'];} }else{$resN9a=mysql_fetch_assoc($sN9a); $Nrv9=$resN9a['NRV'];}
$sN10a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-10-01' AND Tdate<='".$fy3."-10-31'", $con); 
$rowN10a=mysql_num_rows($sN10a); if($rowN10a==0){$sN10b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-10-01' AND '".$fy3."-10-31'<=Tdate", $con); $rowN10b=mysql_num_rows($sN10b);if($rowN10b==0){ $sN10c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-10-01' AND PStatus='A'", $con); $rowN10c=mysql_num_rows($sN10c); if($rowN10c==0){ $sN10d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN10d=mysql_num_rows($sN10d); if($rowN10d==0){$Nrv10=0;}else{$resN10d=mysql_fetch_assoc($sN10d); $Nrv10=$resN10d['NRV'];} }else{$resN10c=mysql_fetch_assoc($sN10c); $Nrv10=$resN10c['NRV'];}	}else{$resN10b=mysql_fetch_assoc($sN10b); $Nrv10=$resN10b['NRV'];} }else{$resN10a=mysql_fetch_assoc($sN10a); $Nrv10=$resN10a['NRV'];}
$sN11a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-11-01' AND Tdate<='".$fy3."-11-31'", $con); 
$rowN11a=mysql_num_rows($sN11a); if($rowN11a==0){$sN11b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-11-01' AND '".$fy3."-11-31'<=Tdate", $con); $rowN11b=mysql_num_rows($sN11b);if($rowN11b==0){ $sN11c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-11-01' AND PStatus='A'", $con); $rowN11c=mysql_num_rows($sN11c); if($rowN11c==0){ $sN11d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN11d=mysql_num_rows($sN11d); if($rowN11d==0){$Nrv11=0;}else{$resN11d=mysql_fetch_assoc($sN11d); $Nrv11=$resN11d['NRV'];} }else{$resN11c=mysql_fetch_assoc($sN11c); $Nrv11=$resN11c['NRV'];}	}else{$resN11b=mysql_fetch_assoc($sN11b); $Nrv11=$resN11b['NRV'];} }else{$resN11a=mysql_fetch_assoc($sN11a); $Nrv11=$resN11a['NRV'];}
$sN12a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-12-01' AND Tdate<='".$fy3."-12-31'", $con); 
$rowN12a=mysql_num_rows($sN12a); if($rowN12a==0){$sN12b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-12-01' AND '".$fy3."-12-31'<=Tdate", $con); $rowN12b=mysql_num_rows($sN12b);if($rowN12b==0){ $sN12c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy3."-12-01' AND PStatus='A'", $con); $rowN12c=mysql_num_rows($sN12c); if($rowN12c==0){ $sN12d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN12d=mysql_num_rows($sN12d); if($rowN12d==0){$Nrv12=0;}else{$resN12d=mysql_fetch_assoc($sN12d); $Nrv12=$resN12d['NRV'];} }else{$resN12c=mysql_fetch_assoc($sN12c); $Nrv12=$resN12c['NRV'];}	}else{$resN12b=mysql_fetch_assoc($sN12b); $Nrv12=$resN12b['NRV'];} }else{$resN12a=mysql_fetch_assoc($sN12a); $Nrv12=$resN12a['NRV'];}
$sN1a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty3."-01-01' AND Tdate<='".$ty3."-01-31'", $con); 
$rowN1a=mysql_num_rows($sN1a); if($rowN1a==0){$sN1b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty3."-01-01' AND '".$ty3."-01-31'<=Tdate", $con); $rowN1b=mysql_num_rows($sN1b);if($rowN1b==0){ $sN1c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty3."-01-01' AND PStatus='A'", $con); $rowN1c=mysql_num_rows($sN1c); if($rowN1c==0){ $sN1d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN1d=mysql_num_rows($sN1d); if($rowN1d==0){$Nrv1=0;}else{$resN1d=mysql_fetch_assoc($sN1d); $Nrv1=$resN1d['NRV'];} }else{$resN1c=mysql_fetch_assoc($sN1c); $Nrv1=$resN1c['NRV'];}	}else{$resN1b=mysql_fetch_assoc($sN1b); $Nrv1=$resN1b['NRV'];} }else{$resN1a=mysql_fetch_assoc($sN1a); $Nrv1=$resN1a['NRV'];}
$sN2a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty3."-02-01' AND Tdate<='".$ty3."-02-31'", $con); 
$rowN2a=mysql_num_rows($sN2a); if($rowN2a==0){$sN2b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty3."-02-01' AND '".$ty3."-02-31'<=Tdate", $con); $rowN2b=mysql_num_rows($sN2b);if($rowN2b==0){ $sN2c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty3."-02-01' AND PStatus='A'", $con); $rowN2c=mysql_num_rows($sN2c); if($rowN2c==0){ $sN2d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN2d=mysql_num_rows($sN2d); if($rowN2d==0){$Nrv2=0;}else{$resN2d=mysql_fetch_assoc($sN2d); $Nrv2=$resN2d['NRV'];} }else{$resN2c=mysql_fetch_assoc($sN2c); $Nrv2=$resN2c['NRV'];}	}else{$resN2b=mysql_fetch_assoc($sN2b); $Nrv2=$resN2b['NRV'];} }else{$resN2a=mysql_fetch_assoc($sN2a); $Nrv2=$resN2a['NRV'];}
$sN3a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty3."-03-01' AND Tdate<='".$ty3."-03-31'", $con); 
$rowN3a=mysql_num_rows($sN3a); if($rowN3a==0){$sN3b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty3."-03-01' AND '".$ty3."-03-31'<=Tdate", $con); $rowN3b=mysql_num_rows($sN3b);if($rowN3b==0){ $sN3c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty3."-03-01' AND PStatus='A'", $con); $rowN3c=mysql_num_rows($sN3c); if($rowN3c==0){ $sN3d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN3d=mysql_num_rows($sN3d); if($rowN3d==0){$Nrv3=0;}else{$resN3d=mysql_fetch_assoc($sN3d); $Nrv3=$resN3d['NRV'];} }else{$resN3c=mysql_fetch_assoc($sN3c); $Nrv3=$resN3c['NRV'];}	}else{$resN3b=mysql_fetch_assoc($sN3b); $Nrv3=$resN3b['NRV'];} }else{$resN3a=mysql_fetch_assoc($sN3a); $Nrv3=$resN3a['NRV'];}
$Net4=$res3['M1']*$Nrv4; $Net5=$res3['M2']*$Nrv5; $Net6=$res3['M3']*$Nrv6; $Net7=$res3['M4']*$Nrv7; $Net8=$res3['M5']*$Nrv8; 
$Net9=$res3['M6']*$Nrv9; $Net10=$res3['M7']*$Nrv10; $Net11=$res3['M8']*$Nrv11; $Net12=$res3['M9']*$Nrv12; $Net1=$res3['M10']*$Nrv1; 
$Net2=$res3['M11']*$Nrv2; $Net3=$res3['M12']*$Nrv3; $NetNRV_3=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_3=$NetNRV_3/100000;
?>


	 <td style="width:50px;" align="center"><b><?php echo $y3T; ?></b></td><td style="width:50px;" align="center"><b><?php echo $y3; ?></b></td> 
	 <td align="right" width="80"><?php if($res3['M1']>0){echo $res3['M1'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res3['M2']>0){echo $res3['M2'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res3['M3']>0){echo $res3['M3'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res3['M4']>0){echo $res3['M4'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res3['M5']>0){echo $res3['M5'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res3['M6']>0){echo $res3['M6'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res3['M7']>0){echo $res3['M7'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res3['M8']>0){echo $res3['M8'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res3['M9']>0){echo $res3['M9'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res3['M10']>0){echo $res3['M10'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res3['M11']>0){echo $res3['M11'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res3['M12']>0){echo $res3['M12'];} ?>&nbsp;</td><td align="right" width="80"><b><?php if($res3Tot>0){echo $res3Tot;} ?></b>&nbsp;</td><td align="right" width="80"><b><?php if($LakhNRV_3>0){echo round($LakhNRV_3,4);} ?></b>&nbsp;
	 <input type="hidden" id="<?php echo 'C'.$Sn; ?>" value="<?php if($LakhNRV_3>0){echo round($LakhNRV_3,4);}else{echo 0;} ?>" />
	 <?php if($LakhNRV_3>0){$valC=$LakhNRV_3;}else{$valC=0;} echo '<script>FunCTotal('.$valC.');</script>'; ?>
	 </td>    
	     
<?php } /* 4 */  if($i==4){ $sqlP4d=mysql_query("select * from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$AfterYId.".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$AfterYId.".YearId=".$AfterYId." AND hrm_sales_seedsproduct.ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$AfterYId.".DealerId=".$_REQUEST['dil'], $con); $res4=mysql_fetch_assoc($sqlP4d); 
$res4Tot=$res4['M1']+$res4['M2']+$res4['M3']+$res4['M4']+$res4['M5']+$res4['M6']+$res4['M7']+$res4['M8']+$res4['M9']+$res4['M10']+$res4['M11']+$res4['M12']; 
//$sqlNrv4=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resNrv4=mysql_fetch_assoc($sqlNrv4); 
//$sqlNrv4a = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resNrv4a = mysql_fetch_assoc($sqlNrv4a);
//if($resNrv4['NRV']!=''){$NRV4=$resNrv4['NRV'];}elseif($resNrv4a['NRV']!=''){$NRV4=$resNrv4a['NRV'];}else{$NRV4=0;} $NetNRV_4=$res4Tot*$NRV4; $LakhNRV_4=$NetNRV_4/100000; ?>


<?php 
$sN4a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-04-01' AND Tdate<='".$fy4."-04-31'", $con); 
$rowN4a=mysql_num_rows($sN4a); if($rowN4a==0){$sN4b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-04-01' AND '".$fy4."-04-31'<=Tdate", $con); $rowN4b=mysql_num_rows($sN4b);if($rowN4b==0){ $sN4c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-04-01' AND PStatus='A'", $con); $rowN4c=mysql_num_rows($sN4c);if($rowN4c==0){ $sN4d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN4d=mysql_num_rows($sN4d); if($rowN4d==0){$Nrv4=0;}else{$resN4d=mysql_fetch_assoc($sN4d); $Nrv4=$resN4d['NRV'];} }else{$resN4c=mysql_fetch_assoc($sN4c); $Nrv4=$resN4c['NRV'];} }else{$resN4b=mysql_fetch_assoc($sN4b); $Nrv4=$resN4b['NRV'];} }else{$resN4a=mysql_fetch_assoc($sN4a); $Nrv4=$resN4a['NRV'];}
$sN5a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-05-01' AND Tdate<='".$fy4."-05-31'", $con); 
$rowN5a=mysql_num_rows($sN5a); if($rowN5a==0){$sN5b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-05-01' AND '".$fy4."-05-31'<=Tdate", $con); $rowN5b=mysql_num_rows($sN5b);if($rowN5b==0){ $sN5c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-05-01' AND PStatus='A'", $con); $rowN5c=mysql_num_rows($sN5c); if($rowN5c==0){ $sN5d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN5d=mysql_num_rows($sN5d); if($rowN5d==0){$Nrv5=0;}else{$resN5d=mysql_fetch_assoc($sN5d); $Nrv5=$resN5d['NRV'];} }else{$resN5c=mysql_fetch_assoc($sN5c); $Nrv5=$resN5c['NRV'];}	}else{$resN5b=mysql_fetch_assoc($sN5b); $Nrv5=$resN5b['NRV'];} }else{$resN5a=mysql_fetch_assoc($sN5a); $Nrv5=$resN5a['NRV'];}
$sN6a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-06-01' AND Tdate<='".$fy4."-06-31'", $con); 
$rowN6a=mysql_num_rows($sN6a); if($rowN6a==0){$sN6b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-06-01' AND '".$fy4."-06-31'<=Tdate", $con); $rowN6b=mysql_num_rows($sN6b);if($rowN6b==0){ $sN6c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-06-01' AND PStatus='A'", $con); $rowN6c=mysql_num_rows($sN6c); if($rowN6c==0){ $sN6d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN6d=mysql_num_rows($sN6d); if($rowN6d==0){$Nrv6=0;}else{$resN6d=mysql_fetch_assoc($sN6d); $Nrv6=$resN6d['NRV'];} }else{$resN6c=mysql_fetch_assoc($sN6c); $Nrv6=$resN6c['NRV'];}	}else{$resN6b=mysql_fetch_assoc($sN6b); $Nrv6=$resN6b['NRV'];} }else{$resN6a=mysql_fetch_assoc($sN6a); $Nrv6=$resN6a['NRV'];}
$sN7a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-07-01' AND Tdate<='".$fy4."-07-31'", $con); 
$rowN7a=mysql_num_rows($sN7a); if($rowN7a==0){$sN7b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-07-01' AND '".$fy4."-07-31'<=Tdate", $con); $rowN7b=mysql_num_rows($sN7b);if($rowN7b==0){ $sN7c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-07-01' AND PStatus='A'", $con); $rowN7c=mysql_num_rows($sN7c); if($rowN7c==0){ $sN7d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN7d=mysql_num_rows($sN7d); if($rowN7d==0){$Nrv7=0;}else{$resN7d=mysql_fetch_assoc($sN7d); $Nrv7=$resN7d['NRV'];} }else{$resN7c=mysql_fetch_assoc($sN7c); $Nrv7=$resN7c['NRV'];}	}else{$resN7b=mysql_fetch_assoc($sN7b); $Nrv7=$resN7b['NRV'];} }else{$resN7a=mysql_fetch_assoc($sN7a); $Nrv7=$resN7a['NRV'];}
$sN8a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-08-01' AND Tdate<='".$fy4."-08-31'", $con); 
$rowN8a=mysql_num_rows($sN8a); if($rowN8a==0){$sN8b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-08-01' AND '".$fy4."-08-31'<=Tdate", $con); $rowN8b=mysql_num_rows($sN8b);if($rowN8b==0){ $sN8c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-08-01' AND PStatus='A'", $con); $rowN8c=mysql_num_rows($sN8c); if($rowN8c==0){ $sN8d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN8d=mysql_num_rows($sN8d); if($rowN8d==0){$Nrv8=0;}else{$resN8d=mysql_fetch_assoc($sN8d); $Nrv8=$resN8d['NRV'];} }else{$resN8c=mysql_fetch_assoc($sN8c); $Nrv8=$resN8c['NRV'];}	}else{$resN8b=mysql_fetch_assoc($sN8b); $Nrv8=$resN8b['NRV'];} }else{$resN8a=mysql_fetch_assoc($sN8a); $Nrv8=$resN8a['NRV'];}
$sN9a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-09-01' AND Tdate<='".$fy4."-09-31'", $con); 
$rowN9a=mysql_num_rows($sN9a); if($rowN9a==0){$sN9b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-09-01' AND '".$fy4."-09-31'<=Tdate", $con); $rowN9b=mysql_num_rows($sN9b);if($rowN9b==0){ $sN9c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-09-01' AND PStatus='A'", $con); $rowN9c=mysql_num_rows($sN9c); if($rowN9c==0){ $sN9d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN9d=mysql_num_rows($sN9d); if($rowN9d==0){$Nrv9=0;}else{$resN9d=mysql_fetch_assoc($sN9d); $Nrv9=$resN9d['NRV'];} }else{$resN9c=mysql_fetch_assoc($sN9c); $Nrv9=$resN9c['NRV'];}	}else{$resN9b=mysql_fetch_assoc($sN9b); $Nrv9=$resN9b['NRV'];} }else{$resN9a=mysql_fetch_assoc($sN9a); $Nrv9=$resN9a['NRV'];}
$sN10a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-10-01' AND Tdate<='".$fy4."-10-31'", $con); 
$rowN10a=mysql_num_rows($sN10a); if($rowN10a==0){$sN10b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-10-01' AND '".$fy4."-10-31'<=Tdate", $con); $rowN10b=mysql_num_rows($sN10b);if($rowN10b==0){ $sN10c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-10-01' AND PStatus='A'", $con); $rowN10c=mysql_num_rows($sN10c); if($rowN10c==0){ $sN10d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN10d=mysql_num_rows($sN10d); if($rowN10d==0){$Nrv10=0;}else{$resN10d=mysql_fetch_assoc($sN10d); $Nrv10=$resN10d['NRV'];} }else{$resN10c=mysql_fetch_assoc($sN10c); $Nrv10=$resN10c['NRV'];}	}else{$resN10b=mysql_fetch_assoc($sN10b); $Nrv10=$resN10b['NRV'];} }else{$resN10a=mysql_fetch_assoc($sN10a); $Nrv10=$resN10a['NRV'];}
$sN11a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-11-01' AND Tdate<='".$fy4."-11-31'", $con); 
$rowN11a=mysql_num_rows($sN11a); if($rowN11a==0){$sN11b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-11-01' AND '".$fy4."-11-31'<=Tdate", $con); $rowN11b=mysql_num_rows($sN11b);if($rowN11b==0){ $sN11c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-11-01' AND PStatus='A'", $con); $rowN11c=mysql_num_rows($sN11c); if($rowN11c==0){ $sN11d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN11d=mysql_num_rows($sN11d); if($rowN11d==0){$Nrv11=0;}else{$resN11d=mysql_fetch_assoc($sN11d); $Nrv11=$resN11d['NRV'];} }else{$resN11c=mysql_fetch_assoc($sN11c); $Nrv11=$resN11c['NRV'];}	}else{$resN11b=mysql_fetch_assoc($sN11b); $Nrv11=$resN11b['NRV'];} }else{$resN11a=mysql_fetch_assoc($sN11a); $Nrv11=$resN11a['NRV'];}
$sN12a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-12-01' AND Tdate<='".$fy4."-12-31'", $con); 
$rowN12a=mysql_num_rows($sN12a); if($rowN12a==0){$sN12b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-12-01' AND '".$fy4."-12-31'<=Tdate", $con); $rowN12b=mysql_num_rows($sN12b);if($rowN12b==0){ $sN12c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy4."-12-01' AND PStatus='A'", $con); $rowN12c=mysql_num_rows($sN12c); if($rowN12c==0){ $sN12d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN12d=mysql_num_rows($sN12d); if($rowN12d==0){$Nrv12=0;}else{$resN12d=mysql_fetch_assoc($sN12d); $Nrv12=$resN12d['NRV'];} }else{$resN12c=mysql_fetch_assoc($sN12c); $Nrv12=$resN12c['NRV'];}	}else{$resN12b=mysql_fetch_assoc($sN12b); $Nrv12=$resN12b['NRV'];} }else{$resN12a=mysql_fetch_assoc($sN12a); $Nrv12=$resN12a['NRV'];}
$sN1a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty4."-01-01' AND Tdate<='".$ty4."-01-31'", $con); 
$rowN1a=mysql_num_rows($sN1a); if($rowN1a==0){$sN1b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty4."-01-01' AND '".$ty4."-01-31'<=Tdate", $con); $rowN1b=mysql_num_rows($sN1b);if($rowN1b==0){ $sN1c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty4."-01-01' AND PStatus='A'", $con); $rowN1c=mysql_num_rows($sN1c); if($rowN1c==0){ $sN1d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN1d=mysql_num_rows($sN1d); if($rowN1d==0){$Nrv1=0;}else{$resN1d=mysql_fetch_assoc($sN1d); $Nrv1=$resN1d['NRV'];} }else{$resN1c=mysql_fetch_assoc($sN1c); $Nrv1=$resN1c['NRV'];}	}else{$resN1b=mysql_fetch_assoc($sN1b); $Nrv1=$resN1b['NRV'];} }else{$resN1a=mysql_fetch_assoc($sN1a); $Nrv1=$resN1a['NRV'];}
$sN2a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty4."-02-01' AND Tdate<='".$ty4."-02-31'", $con); 
$rowN2a=mysql_num_rows($sN2a); if($rowN2a==0){$sN2b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty4."-02-01' AND '".$ty4."-02-31'<=Tdate", $con); $rowN2b=mysql_num_rows($sN2b);if($rowN2b==0){ $sN2c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty4."-02-01' AND PStatus='A'", $con); $rowN2c=mysql_num_rows($sN2c); if($rowN2c==0){ $sN2d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN2d=mysql_num_rows($sN2d); if($rowN2d==0){$Nrv2=0;}else{$resN2d=mysql_fetch_assoc($sN2d); $Nrv2=$resN2d['NRV'];} }else{$resN2c=mysql_fetch_assoc($sN2c); $Nrv2=$resN2c['NRV'];}	}else{$resN2b=mysql_fetch_assoc($sN2b); $Nrv2=$resN2b['NRV'];} }else{$resN2a=mysql_fetch_assoc($sN2a); $Nrv2=$resN2a['NRV'];}
$sN3a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty4."-03-01' AND Tdate<='".$ty4."-03-31'", $con); 
$rowN3a=mysql_num_rows($sN3a); if($rowN3a==0){$sN3b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty4."-03-01' AND '".$ty4."-03-31'<=Tdate", $con); $rowN3b=mysql_num_rows($sN3b);if($rowN3b==0){ $sN3c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty4."-03-01' AND PStatus='A'", $con); $rowN3c=mysql_num_rows($sN3c); if($rowN3c==0){ $sN3d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN3d=mysql_num_rows($sN3d); if($rowN3d==0){$Nrv3=0;}else{$resN3d=mysql_fetch_assoc($sN3d); $Nrv3=$resN3d['NRV'];} }else{$resN3c=mysql_fetch_assoc($sN3c); $Nrv3=$resN3c['NRV'];}	}else{$resN3b=mysql_fetch_assoc($sN3b); $Nrv3=$resN3b['NRV'];} }else{$resN3a=mysql_fetch_assoc($sN3a); $Nrv3=$resN3a['NRV'];}
$Net4=$res4['M1']*$Nrv4; $Net5=$res4['M2']*$Nrv5; $Net6=$res4['M3']*$Nrv6; $Net7=$res4['M4']*$Nrv7; $Net8=$res4['M5']*$Nrv8; 
$Net9=$res4['M6']*$Nrv9; $Net10=$res4['M7']*$Nrv10; $Net11=$res4['M8']*$Nrv11; $Net12=$res4['M9']*$Nrv12; $Net1=$res4['M10']*$Nrv1; 
$Net2=$res4['M11']*$Nrv2; $Net3=$res4['M12']*$Nrv3; $NetNRV_4=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_4=$NetNRV_4/100000;

?>



	 <td style="width:50px;" align="center"><b><?php echo $y4T; ?></b></td><td style="width:50px;" align="center"><b><?php echo $y4; ?></b></td> 
	 <td align="right" width="80"><?php if($res4['M1']>0){echo $res4['M1'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res4['M2']>0){echo $res4['M2'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res4['M3']>0){echo $res4['M3'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res4['M4']>0){echo $res4['M4'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res4['M5']>0){echo $res4['M5'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res4['M6']>0){echo $res4['M6'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res4['M7']>0){echo $res4['M7'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res4['M8']>0){echo $res4['M8'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res4['M9']>0){echo $res4['M9'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res4['M10']>0){echo $res4['M10'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res4['M11']>0){echo $res4['M11'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res4['M12']>0){echo $res4['M12'];} ?>&nbsp;</td><td align="right" width="80"><b><?php if($res4Tot>0){echo $res4Tot;} ?></b>&nbsp;</td><td align="right" width="80"><b><?php if($LakhNRV_4>0){echo round($LakhNRV_4,4);} ?></b>&nbsp;
	 <input type="hidden" id="<?php echo 'D'.$Sn; ?>" value="<?php if($LakhNRV_4>0){echo round($LakhNRV_4,4);}else{echo 0;} ?>" />
	 <?php if($LakhNRV_4>0){$valD=$LakhNRV_4;}else{$valD=0;} echo '<script>FunDTotal('.$valD.');</script>'; ?>
	 </td>  
	 
<?php } /* 5 */  $sqlYe=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$YearId, $con); $resYe=mysql_fetch_assoc($sqlYe);
        $yeft=date("y",strtotime($resYe['FromDate'])).'-'.date("y",strtotime($resYe['ToDate'])); $yeT='<font color="#A60053">YTD</font>'; 
	    if($i==5){ $sqlP5d=mysql_query("select * from hrm_sales_sal_details_".$YearId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$YearId.".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$YearId.".YearId=".$YearId." AND hrm_sales_seedsproduct.ProductId=".$res['ProductId']." AND hrm_sales_sal_details_".$YearId.".DealerId=".$_REQUEST['dil'], $con); 
$res5=mysql_fetch_assoc($sqlP5d);  
$res5Tot=$res5['M1_Ach']+$res5['M2_Ach']+$res5['M3_Ach']+$res5['M4_Ach']+$res5['M5_Ach']+$res5['M6_Ach']+$res5['M7_Ach']+$res5['M8_Ach']+$res5['M9_Ach']+$res5['M10_Ach']+$res5['M11_Ach']+$res5['M12_Ach'];
//$sqlNrv5=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND YearId=".$YearId, $con); $resNrv5=mysql_fetch_assoc($sqlNrv5); 
//$sqlNrv5a = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resNrv5a = mysql_fetch_assoc($sqlNrv5a);
//if($resNrv5['NRV']!=''){$NRV5=$resNrv5['NRV'];}elseif($resNrv5a['NRV']!=''){$NRV5=$resNrv5a['NRV'];}else{$NRV5=0;} $NetNRV_5=$res5Tot*$NRV5; $LakhNRV_5=$NetNRV_5/100000; ?>

<?php 
$sN4a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-04-01' AND Tdate<='".$fy5."-04-31'", $con); 
$rowN4a=mysql_num_rows($sN4a); if($rowN4a==0){$sN4b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-04-01' AND '".$fy5."-04-31'<=Tdate", $con); $rowN4b=mysql_num_rows($sN4b);if($rowN4b==0){ $sN4c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-04-01' AND PStatus='A'", $con); $rowN4c=mysql_num_rows($sN4c);if($rowN4c==0){ $sN4d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN4d=mysql_num_rows($sN4d); if($rowN4d==0){$Nrv4=0;}else{$resN4d=mysql_fetch_assoc($sN4d); $Nrv4=$resN4d['NRV'];} }else{$resN4c=mysql_fetch_assoc($sN4c); $Nrv4=$resN4c['NRV'];} }else{$resN4b=mysql_fetch_assoc($sN4b); $Nrv4=$resN4b['NRV'];} }else{$resN4a=mysql_fetch_assoc($sN4a); $Nrv4=$resN4a['NRV'];}
$sN5a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-05-01' AND Tdate<='".$fy5."-05-31'", $con); 
$rowN5a=mysql_num_rows($sN5a); if($rowN5a==0){$sN5b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-05-01' AND '".$fy5."-05-31'<=Tdate", $con); $rowN5b=mysql_num_rows($sN5b);if($rowN5b==0){ $sN5c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-05-01' AND PStatus='A'", $con); $rowN5c=mysql_num_rows($sN5c); if($rowN5c==0){ $sN5d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN5d=mysql_num_rows($sN5d); if($rowN5d==0){$Nrv5=0;}else{$resN5d=mysql_fetch_assoc($sN5d); $Nrv5=$resN5d['NRV'];} }else{$resN5c=mysql_fetch_assoc($sN5c); $Nrv5=$resN5c['NRV'];}	}else{$resN5b=mysql_fetch_assoc($sN5b); $Nrv5=$resN5b['NRV'];} }else{$resN5a=mysql_fetch_assoc($sN5a); $Nrv5=$resN5a['NRV'];}
$sN6a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-06-01' AND Tdate<='".$fy5."-06-31'", $con); 
$rowN6a=mysql_num_rows($sN6a); if($rowN6a==0){$sN6b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-06-01' AND '".$fy5."-06-31'<=Tdate", $con); $rowN6b=mysql_num_rows($sN6b);if($rowN6b==0){ $sN6c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-06-01' AND PStatus='A'", $con); $rowN6c=mysql_num_rows($sN6c); if($rowN6c==0){ $sN6d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN6d=mysql_num_rows($sN6d); if($rowN6d==0){$Nrv6=0;}else{$resN6d=mysql_fetch_assoc($sN6d); $Nrv6=$resN6d['NRV'];} }else{$resN6c=mysql_fetch_assoc($sN6c); $Nrv6=$resN6c['NRV'];}	}else{$resN6b=mysql_fetch_assoc($sN6b); $Nrv6=$resN6b['NRV'];} }else{$resN6a=mysql_fetch_assoc($sN6a); $Nrv6=$resN6a['NRV'];}
$sN7a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-07-01' AND Tdate<='".$fy5."-07-31'", $con); 
$rowN7a=mysql_num_rows($sN7a); if($rowN7a==0){$sN7b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-07-01' AND '".$fy5."-07-31'<=Tdate", $con); $rowN7b=mysql_num_rows($sN7b);if($rowN7b==0){ $sN7c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-07-01' AND PStatus='A'", $con); $rowN7c=mysql_num_rows($sN7c); if($rowN7c==0){ $sN7d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN7d=mysql_num_rows($sN7d); if($rowN7d==0){$Nrv7=0;}else{$resN7d=mysql_fetch_assoc($sN7d); $Nrv7=$resN7d['NRV'];} }else{$resN7c=mysql_fetch_assoc($sN7c); $Nrv7=$resN7c['NRV'];}	}else{$resN7b=mysql_fetch_assoc($sN7b); $Nrv7=$resN7b['NRV'];} }else{$resN7a=mysql_fetch_assoc($sN7a); $Nrv7=$resN7a['NRV'];}
$sN8a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-08-01' AND Tdate<='".$fy5."-08-31'", $con); 
$rowN8a=mysql_num_rows($sN8a); if($rowN8a==0){$sN8b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-08-01' AND '".$fy5."-08-31'<=Tdate", $con); $rowN8b=mysql_num_rows($sN8b);if($rowN8b==0){ $sN8c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-08-01' AND PStatus='A'", $con); $rowN8c=mysql_num_rows($sN8c); if($rowN8c==0){ $sN8d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN8d=mysql_num_rows($sN8d); if($rowN8d==0){$Nrv8=0;}else{$resN8d=mysql_fetch_assoc($sN8d); $Nrv8=$resN8d['NRV'];} }else{$resN8c=mysql_fetch_assoc($sN8c); $Nrv8=$resN8c['NRV'];}	}else{$resN8b=mysql_fetch_assoc($sN8b); $Nrv8=$resN8b['NRV'];} }else{$resN8a=mysql_fetch_assoc($sN8a); $Nrv8=$resN8a['NRV'];}
$sN9a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-09-01' AND Tdate<='".$fy5."-09-31'", $con); 
$rowN9a=mysql_num_rows($sN9a); if($rowN9a==0){$sN9b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-09-01' AND '".$fy5."-09-31'<=Tdate", $con); $rowN9b=mysql_num_rows($sN9b);if($rowN9b==0){ $sN9c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-09-01' AND PStatus='A'", $con); $rowN9c=mysql_num_rows($sN9c); if($rowN9c==0){ $sN9d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN9d=mysql_num_rows($sN9d); if($rowN9d==0){$Nrv9=0;}else{$resN9d=mysql_fetch_assoc($sN9d); $Nrv9=$resN9d['NRV'];} }else{$resN9c=mysql_fetch_assoc($sN9c); $Nrv9=$resN9c['NRV'];}	}else{$resN9b=mysql_fetch_assoc($sN9b); $Nrv9=$resN9b['NRV'];} }else{$resN9a=mysql_fetch_assoc($sN9a); $Nrv9=$resN9a['NRV'];}
$sN10a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-10-01' AND Tdate<='".$fy5."-10-31'", $con); 
$rowN10a=mysql_num_rows($sN10a); if($rowN10a==0){$sN10b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-10-01' AND '".$fy5."-10-31'<=Tdate", $con); $rowN10b=mysql_num_rows($sN10b);if($rowN10b==0){ $sN10c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-10-01' AND PStatus='A'", $con); $rowN10c=mysql_num_rows($sN10c); if($rowN10c==0){ $sN10d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN10d=mysql_num_rows($sN10d); if($rowN10d==0){$Nrv10=0;}else{$resN10d=mysql_fetch_assoc($sN10d); $Nrv10=$resN10d['NRV'];} }else{$resN10c=mysql_fetch_assoc($sN10c); $Nrv10=$resN10c['NRV'];}	}else{$resN10b=mysql_fetch_assoc($sN10b); $Nrv10=$resN10b['NRV'];} }else{$resN10a=mysql_fetch_assoc($sN10a); $Nrv10=$resN10a['NRV'];}
$sN11a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-11-01' AND Tdate<='".$fy5."-11-31'", $con); 
$rowN11a=mysql_num_rows($sN11a); if($rowN11a==0){$sN11b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-11-01' AND '".$fy5."-11-31'<=Tdate", $con); $rowN11b=mysql_num_rows($sN11b);if($rowN11b==0){ $sN11c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-11-01' AND PStatus='A'", $con); $rowN11c=mysql_num_rows($sN11c); if($rowN11c==0){ $sN11d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN11d=mysql_num_rows($sN11d); if($rowN11d==0){$Nrv11=0;}else{$resN11d=mysql_fetch_assoc($sN11d); $Nrv11=$resN11d['NRV'];} }else{$resN11c=mysql_fetch_assoc($sN11c); $Nrv11=$resN11c['NRV'];}	}else{$resN11b=mysql_fetch_assoc($sN11b); $Nrv11=$resN11b['NRV'];} }else{$resN11a=mysql_fetch_assoc($sN11a); $Nrv11=$resN11a['NRV'];}
$sN12a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-12-01' AND Tdate<='".$fy5."-12-31'", $con); 
$rowN12a=mysql_num_rows($sN12a); if($rowN12a==0){$sN12b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-12-01' AND '".$fy5."-12-31'<=Tdate", $con); $rowN12b=mysql_num_rows($sN12b);if($rowN12b==0){ $sN12c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$fy5."-12-01' AND PStatus='A'", $con); $rowN12c=mysql_num_rows($sN12c); if($rowN12c==0){ $sN12d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN12d=mysql_num_rows($sN12d); if($rowN12d==0){$Nrv12=0;}else{$resN12d=mysql_fetch_assoc($sN12d); $Nrv12=$resN12d['NRV'];} }else{$resN12c=mysql_fetch_assoc($sN12c); $Nrv12=$resN12c['NRV'];}	}else{$resN12b=mysql_fetch_assoc($sN12b); $Nrv12=$resN12b['NRV'];} }else{$resN12a=mysql_fetch_assoc($sN12a); $Nrv12=$resN12a['NRV'];}
$sN1a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty5."-01-01' AND Tdate<='".$ty5."-01-31'", $con); 
$rowN1a=mysql_num_rows($sN1a); if($rowN1a==0){$sN1b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty5."-01-01' AND '".$ty5."-01-31'<=Tdate", $con); $rowN1b=mysql_num_rows($sN1b);if($rowN1b==0){ $sN1c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty5."-01-01' AND PStatus='A'", $con); $rowN1c=mysql_num_rows($sN1c); if($rowN1c==0){ $sN1d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN1d=mysql_num_rows($sN1d); if($rowN1d==0){$Nrv1=0;}else{$resN1d=mysql_fetch_assoc($sN1d); $Nrv1=$resN1d['NRV'];} }else{$resN1c=mysql_fetch_assoc($sN1c); $Nrv1=$resN1c['NRV'];}	}else{$resN1b=mysql_fetch_assoc($sN1b); $Nrv1=$resN1b['NRV'];} }else{$resN1a=mysql_fetch_assoc($sN1a); $Nrv1=$resN1a['NRV'];}
$sN2a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty5."-02-01' AND Tdate<='".$ty5."-02-31'", $con); 
$rowN2a=mysql_num_rows($sN2a); if($rowN2a==0){$sN2b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty5."-02-01' AND '".$ty5."-02-31'<=Tdate", $con); $rowN2b=mysql_num_rows($sN2b);if($rowN2b==0){ $sN2c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty5."-02-01' AND PStatus='A'", $con); $rowN2c=mysql_num_rows($sN2c); if($rowN2c==0){ $sN2d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN2d=mysql_num_rows($sN2d); if($rowN2d==0){$Nrv2=0;}else{$resN2d=mysql_fetch_assoc($sN2d); $Nrv2=$resN2d['NRV'];} }else{$resN2c=mysql_fetch_assoc($sN2c); $Nrv2=$resN2c['NRV'];}	}else{$resN2b=mysql_fetch_assoc($sN2b); $Nrv2=$resN2b['NRV'];} }else{$resN2a=mysql_fetch_assoc($sN2a); $Nrv2=$resN2a['NRV'];}
$sN3a=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty5."-03-01' AND Tdate<='".$ty5."-03-31'", $con); 
$rowN3a=mysql_num_rows($sN3a); if($rowN3a==0){$sN3b=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty5."-03-01' AND '".$ty5."-03-31'<=Tdate", $con); $rowN3b=mysql_num_rows($sN3b);if($rowN3b==0){ $sN3c=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate>='".$ty5."-03-01' AND PStatus='A'", $con); $rowN3c=mysql_num_rows($sN3c); if($rowN3c==0){ $sN3d=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rowN3d=mysql_num_rows($sN3d); if($rowN3d==0){$Nrv3=0;}else{$resN3d=mysql_fetch_assoc($sN3d); $Nrv3=$resN3d['NRV'];} }else{$resN3c=mysql_fetch_assoc($sN3c); $Nrv3=$resN3c['NRV'];}	}else{$resN3b=mysql_fetch_assoc($sN3b); $Nrv3=$resN3b['NRV'];} }else{$resN3a=mysql_fetch_assoc($sN3a); $Nrv3=$resN3a['NRV'];}

$Net4=$res5['M1_Ach']*$Nrv4; $Net5=$res5['M2_Ach']*$Nrv5; $Net6=$res5['M3_Ach']*$Nrv6; $Net7=$res5['M4_Ach']*$Nrv7; $Net8=$res5['M5_Ach']*$Nrv8; 
$Net9=$res5['M6_Ach']*$Nrv9; $Net10=$res5['M7_Ach']*$Nrv10; $Net11=$res5['M8_Ach']*$Nrv11; $Net12=$res5['M9_Ach']*$Nrv12; $Net1=$res5['M10_Ach']*$Nrv1; 
$Net2=$res5['M11_Ach']*$Nrv2; $Net3=$res5['M12_Ach']*$Nrv3; $NetNRV_5=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_5=$NetNRV_5/100000;

?>


	 <td style="width:50px;" align="center"><b><?php echo $yeT; ?></b></td><td style="width:50px;" align="center"><b><?php echo $yeft; ?></b></td> 
	 <td align="right" width="80"><?php if($res5['M1_Ach']!=''){echo $res5['M1_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res5['M2_Ach']!=''){echo $res5['M2_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res5['M3_Ach']!=''){echo $res5['M3_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res5['M4_Ach']!=''){echo $res5['M4_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res5['M5_Ach']!=''){echo $res5['M5_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res5['M6_Ach']!=''){echo $res5['M6_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res5['M7_Ach']!=''){echo $res5['M7_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res5['M8_Ach']!=''){echo $res5['M8_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res5['M9_Ach']!=''){echo $res5['M9_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res5['M10_Ach']!=''){echo $res5['M10_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res5['M11_Ach']!=''){echo $res5['M11_Ach'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res5['M12_Ach']!=''){echo $res5['M12_Ach'];} ?>&nbsp;</td><td align="right" width="80"><b><?php if($res5Tot!=''){echo $res5Tot;} ?></b>&nbsp;</td><td align="right" width="80"><b><?php if($LakhNRV_5!=''){echo round($LakhNRV_5,4);} ?></b>&nbsp;
	 <input type="hidden" id="<?php echo 'E'.$Sn; ?>" value="<?php if($LakhNRV_5>0){echo round($LakhNRV_5,4);}else{echo 0;} ?>" />
	 <?php if($LakhNRV_5>0){$valE=$LakhNRV_5;}else{$valE=0;} echo '<script>FunETotal('.$valE.');</script>'; ?>
	 </td> 
<?php } ?>	   	   
  </tr> 
<?php } $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActSn" value="'.$ActSn.'" />'; ?> 	  	  
</table>	       
<?php } ?>
    </td>
   </tr> 
<tr>
 <td id="TDResultId" style="width:3000px;">
  <span id="ResultTDSpan"></span>
  <span id="AddMonthResult"></span>
  <span id="SubSpanMsg"></span>
 </td>
</tr>   	
  </table>
 </td>
</tr>
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
