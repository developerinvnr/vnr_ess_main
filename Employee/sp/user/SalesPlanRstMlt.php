<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:12px;width:65px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:12px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:12px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Th60{text-align:center;width:60px;font-weight:bold;font-size:12px;} .Th80{text-align:center;width:80px;font-weight:bold;font-size:12px;}
.Th40{text-align:center;width:40px;font-weight:bold;font-size:12px;} .Tr60{text-align:center;width:60px;font-weight:bold;font-size:12px;}
.Th50{text-align:center;width:50px;font-weight:bold;font-size:12px;} .Td60{text-align:right;width:60px;font-size:12px;} 
.ChkImg{width:20px;hieght:20px;}
.inner_table { height:300px;overflow-y:auto;width:auto; }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function FunChkSubmit()
{ 
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var Coutry=document.getElementById("Coutry").value; 
  var ci=document.getElementById("ComId").value; var ii=document.getElementById("ItemV").value; 
  var no=document.getElementById("no").value; var bp=document.getElementById('BPrtyCheck').value; 

if(document.getElementById("Chk_1").checked==true){var s1=document.getElementById("s1").value;}else{var s1=0;}
if(document.getElementById("Chk_2").checked==true){var s2=document.getElementById("s2").value;}else{var s2=0;}
if(document.getElementById("Chk_3").checked==true){var s3=document.getElementById("s3").value;}else{var s3=0;}
if(document.getElementById("Chk_4").checked==true){var s4=document.getElementById("s4").value;}else{var s4=0;}
if(document.getElementById("Chk_5").checked==true){var s5=document.getElementById("s5").value;}else{var s5=0;}
if(document.getElementById("Chk_6").checked==true){var s6=document.getElementById("s6").value;}else{var s6=0;}
if(document.getElementById("Chk_7").checked==true){var s7=document.getElementById("s7").value;}else{var s7=0;}
if(document.getElementById("Chk_8").checked==true){var s8=document.getElementById("s8").value;}else{var s8=0;}
if(document.getElementById("Chk_9").checked==true){var s9=document.getElementById("s9").value;}else{var s9=0;}
if(document.getElementById("Chk_10").checked==true){var s10=document.getElementById("s10").value;}else{var s10=0;}if(document.getElementById("Chk_11").checked==true){var s11=document.getElementById("s11").value;}else{var s11=0;}if(document.getElementById("Chk_12").checked==true){var s12=document.getElementById("s12").value;}else{var s12=0;}if(document.getElementById("Chk_13").checked==true){var s13=document.getElementById("s13").value;}else{var s13=0;}if(document.getElementById("Chk_14").checked==true){var s14=document.getElementById("s14").value;}else{var s14=0;}if(document.getElementById("Chk_15").checked==true){var s15=document.getElementById("s15").value;}else{var s15=0;}if(document.getElementById("Chk_16").checked==true){var s16=document.getElementById("s16").value;}else{var s16=0;}if(document.getElementById("Chk_17").checked==true){var s17=document.getElementById("s17").value;}else{var s17=0;}if(document.getElementById("Chk_18").checked==true){var s18=document.getElementById("s18").value;}else{var s18=0;}if(document.getElementById("Chk_19").checked==true){var s19=document.getElementById("s19").value;}else{var s19=0;}if(document.getElementById("Chk_20").checked==true){var s20=document.getElementById("s20").value;}else{var s20=0;}if(document.getElementById("Chk_21").checked==true){var s21=document.getElementById("s21").value;}else{var s21=0;}if(document.getElementById("Chk_22").checked==true){var s22=document.getElementById("s22").value;}else{var s22=0;}if(document.getElementById("Chk_23").checked==true){var s23=document.getElementById("s23").value;}else{var s23=0;}if(document.getElementById("Chk_24").checked==true){var s24=document.getElementById("s24").value;}else{var s24=0;}if(document.getElementById("Chk_25").checked==true){var s25=document.getElementById("s25").value;}else{var s25=0;}if(document.getElementById("Chk_26").checked==true){var s26=document.getElementById("s26").value;}else{var s26=0;}if(document.getElementById("Chk_27").checked==true){var s27=document.getElementById("s27").value;}else{var s27=0;}if(document.getElementById("Chk_28").checked==true){var s28=document.getElementById("s28").value;}else{var s28=0;}if(document.getElementById("Chk_29").checked==true){var s29=document.getElementById("s29").value;}else{var s29=0;}if(document.getElementById("Chk_30").checked==true){var s30=document.getElementById("s30").value;}else{var s30=0;}if(document.getElementById("Chk_31").checked==true){var s31=document.getElementById("s31").value;}else{var s31=0;}if(document.getElementById("Chk_32").checked==true){var s32=document.getElementById("s32").value;}else{var s32=0;}if(document.getElementById("Chk_33").checked==true){var s33=document.getElementById("s33").value;}else{var s33=0;}if(document.getElementById("Chk_34").checked==true){var s34=document.getElementById("s34").value;}else{var s34=0;}if(document.getElementById("Chk_35").checked==true){var s35=document.getElementById("s35").value;}else{var s35=0;}if(document.getElementById("Chk_36").checked==true){var s36=document.getElementById("s36").value;}else{var s36=0;}if(document.getElementById("Chk_37").checked==true){var s37=document.getElementById("s37").value;}else{var s37=0;}if(document.getElementById("Chk_38").checked==true){var s38=document.getElementById("s38").value;}else{var s38=0;} 

  window.location="SalesPlanRstMlt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&grp="+CropGrp+"&ii="+ii+"&s1="+s1+"&s2="+s2+"&s3="+s3+"&s4="+s4+"&s5="+s5+"&s6="+s6+"&s7="+s7+"&s8="+s8+"&s9="+s9+"&s10="+s10+"&s11="+s11+"&s12="+s12+"&s13="+s13+"&s14="+s14+"&s15="+s15+"&s16="+s16+"&s17="+s17+"&s18="+s18+"&s19="+s19+"&s20="+s20+"&s21="+s21+"&s22="+s22+"&s23="+s23+"&s24="+s24+"&s25="+s25+"&s26="+s26+"&s27="+s27+"&s28="+s28+"&s29="+s29+"&s30="+s30+"&s31="+s31+"&s32="+s32+"&s33="+s33+"&s34="+s34+"&s35="+s35+"&s36="+s36+"&s37="+s37+"&s38="+s38+"&act=Multi&bp="+bp; 
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
<?php //**********************************************************************************?>
<?php //*****************START*****START*****START******START******START****************************?>
<?php //*******************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />		  
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />	
<input type="hidden" name="Coutry" id="Coutry" value="<?php echo $_REQUEST['c']; ?>" />	 
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" style="width:1100px;" valign="top">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:200px;" class="heading" align="center"><u>Reports:&nbsp;Multi State</u></td>
		<td>
		<table border="0">
		<tr>
		<td style="font-size:11px;height:18px;width:60px;color:#E6E6E6;" align="right"><b>Year :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
       </td>
	   <td style="font-size:11px;height:18px;width:60px;color:#E6E6E6;" align="right"><b>Crop :</b></td>
	    <td>
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
<?php if($_REQUEST['grp']==1){ ?><option value="1" selected>Vegetable Crop</option><option value="2">Field Crop</option><option value="3">All Crop</option>
<?php }elseif($_REQUEST['grp']==2){ ?><option value="2" selected>Field Crop</option><option value="1">Vegetable Crop</option><option value="3">All Crop</option>
<?php }elseif($_REQUEST['grp']==3){ ?><option value="3" selected>All Crop</option><option value="1">Vegetable Crop</option><option value="2">Field Crop</option><?php } ?>
        </select>
		</td>
		<td style="font-size:11px; height:18px;width:60px;color:#E6E6E6;" align="right"><b>Name :</b></td>
	     <td>
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
         <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo ucwords(strtolower($resI['ItemName'])); ?></option>
		 <?php }else{ ?><option value="0" selected>Select</option><?php } ?>
<?php if($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by GroupId ASC,ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?>
	     </select>	  
		 </td>
		 
		 <td style="font-size:11px;height:18px;width:170px;color:#E6E6E6; text-align:center;">
		 <select style="font-size:12px;width:150px;height:20px;background-color:#DDFFBB;" name="BPrtyCheck" id="BPrtyCheck">
           <option value="0" <?php if($_REQUEST['bp']=='0'){echo 'selected';}?>>All Dealer</option>
		  <option value="1" <?php if($_REQUEST['bp']=='1'){echo 'selected';}?>>Bulk Dealer</option>
		  <option value="2" <?php if($_REQUEST['bp']=='2'){echo 'selected';}?>>Without Bulk Dealer</option>
	     </select>
	     </td>
		 
		 <td align="center" style="width:100px;"><input type="button" value="Click" style="width:80px;" onClick="FunChkSubmit()" /></td>
		 <?php /*
<td style="font-size:11px; height:18px;width:80px;width:200px;" align="center"><a href="#" onClick="PrintSpRst()" style="color:#FFC6AA;"><b>PRINT</b></a>&nbsp;&nbsp;
<a href="#" onClick="ExportStPlan(<?php echo $_REQUEST['y'].', '.$_REQUEST['grp'].', '.$_REQUEST['ii'].', '.$_REQUEST['s']; ?>)" style="color:#FFFF80;"><b>Export Excel</b></a>	 
        </td>
		*/ ?>
		 
		</tr>
		</table>
		</td> 
	  </tr>
	  <tr>
	   <td colspan="12">
	   <table>
<tr>
 <td>
  <table border="0" cellpadding="0" cellspacing="4" cellpadding="0"> 
   <tr>  
<?php $sqls=mysql_query("select StateId,StateCode from hrm_state order by StateName ASC", $con); $no=0; while($ress=mysql_fetch_array($sqls)){ $no=$no+1; ?>		
    <td align="center" style="height:25px;background-color:#AD6DB6;font-family:Times New Roman;font-size:14px;color:#FFFFFF;font-weight:bold; width:80px;" id="TD_<?php echo $no; ?>"><input type="checkbox" id="Chk_<?php echo $no; ?>" <?php if($_REQUEST['s'.$no]>0){echo 'checked';} ?> />&nbsp;<?php echo $ress['StateCode']; ?>
	<input type="hidden" id="s<?php echo $no; ?>" value="<?php echo $ress['StateId']; ?>" /></td>
<?php if($no%16==0) { ?></tr><tr> <?php } } ?>
  <td align="center"><input type="hidden" id="no" value="<?php echo $no; ?>" /></td>   	
  </table>
 </td>
 
</tr> 
	   
	   </table>
	   </td>
	  </tr>
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
<?php 

if($_REQUEST['bp']==0){ $subQ="1=1"; }
elseif($_REQUEST['bp']==1){ $subQ="d.BulkParty='Y'"; }
elseif($_REQUEST['bp']==2){ $subQ="d.BulkParty='N'"; }

$MultiState="hq.StateId=".$_REQUEST['s1']." OR hq.StateId=".$_REQUEST['s2']." OR hq.StateId=".$_REQUEST['s3']." OR hq.StateId=".$_REQUEST['s4']." OR hq.StateId=".$_REQUEST['s5']." OR hq.StateId=".$_REQUEST['s6']." OR hq.StateId=".$_REQUEST['s7']." OR hq.StateId=".$_REQUEST['s8']." OR hq.StateId=".$_REQUEST['s9']." OR hq.StateId=".$_REQUEST['s10']." OR hq.StateId=".$_REQUEST['s11']." OR hq.StateId=".$_REQUEST['s12']." OR hq.StateId=".$_REQUEST['s13']." OR hq.StateId=".$_REQUEST['s14']." OR hq.StateId=".$_REQUEST['s15']." OR hq.StateId=".$_REQUEST['s16']." OR hq.StateId=".$_REQUEST['s17']." OR hq.StateId=".$_REQUEST['s18']." OR hq.StateId=".$_REQUEST['s19']." OR hq.StateId=".$_REQUEST['s20']." OR hq.StateId=".$_REQUEST['s21']." OR hq.StateId=".$_REQUEST['s22']." OR hq.StateId=".$_REQUEST['s23']." OR hq.StateId=".$_REQUEST['s24']." OR hq.StateId=".$_REQUEST['s25']." OR hq.StateId=".$_REQUEST['s26']." OR hq.StateId=".$_REQUEST['s27']." OR hq.StateId=".$_REQUEST['s28']." OR hq.StateId=".$_REQUEST['s29']." OR hq.StateId=".$_REQUEST['s30']." OR hq.StateId=".$_REQUEST['s31']." OR hq.StateId=".$_REQUEST['s32']." OR hq.StateId=".$_REQUEST['s33']." OR hq.StateId=".$_REQUEST['s34']." OR hq.StateId=".$_REQUEST['s35']." OR hq.StateId=".$_REQUEST['s36']." OR hq.StateId=".$_REQUEST['s37']." OR hq.StateId=".$_REQUEST['s38']."";

if($_REQUEST['act']=='Multi'){ 
$BeforeYId2=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1; 	
$sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId2, $con); $resY1=mysql_fetch_assoc($sqlY1); 
$sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con); $resY2=mysql_fetch_assoc($sqlY2); 
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$sqlY4=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); $resY4=mysql_fetch_assoc($sqlY4);
$y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); $y1T='<font color="#A60053">Ach.</font>';
$y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); $y2T='<font color="#A60053">Ach.</font>';
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Tgt.</font>';
$y4=date("y",strtotime($resY4['FromDate'])).'-'.date("y",strtotime($resY4['ToDate'])); $y4T='<font color="#A60053">Proj.</font>';
$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; $my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';
$fy1=date("Y",strtotime($resY1['FromDate'])); $ty1=date("Y",strtotime($resY1['ToDate'])); 
$fy2=date("Y",strtotime($resY2['FromDate'])); $ty2=date("Y",strtotime($resY2['ToDate'])); 
$fy3=date("Y",strtotime($resY3['FromDate'])); $ty3=date("Y",strtotime($resY3['ToDate'])); 
$fy4=date("Y",strtotime($resY4['FromDate'])); $ty4=date("Y",strtotime($resY4['ToDate'])); 
$fy5=date("Y",strtotime($resY3['FromDate'])); $ty5=date("Y",strtotime($resY3['ToDate']));
?>	  
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:12px;width:1251px;vertical-align:top;">

<?php ///////////////////////////////////////////////////////////?>
<tr style="height:22px;background-color:#D5F1D1;">
 <td colspan="5" align="center" style="font-size:12px;font-weight:bold;background-color:#FFFF80;">Multi State Wise</td>
  <td class="Th60">APR</td><td class="Th60">MAY</td><td class="Th60">JUN</td><td class="Th60" bgcolor="#FAD25A">Q1</td>
 <td class="Th60">JUL</td><td class="Th60">AUG</td><td class="Th60">SEP</td><td class="Th60" bgcolor="#FAD25A">Q2</td>
 <td class="Th60">OCT</td><td class="Th60">NOV</td><td class="Th60">DEC</td><td class="Th60" bgcolor="#FAD25A">Q3</td>
 <td class="Th60">JAN</td><td class="Th60">FEB</td><td class="Th60">MAR</td><td class="Th60" bgcolor="#FAD25A">Q4</td>
 <td class="Th60"><b>Total KG</b></td>
 <td class="Th60"><b>Total Value</b></td>
 <td style="width:18px;" rowspan="8"></td>
 </tr>

<?php for($i=1; $i<=5; $i++){ ?>
  <tr bgcolor="#EEEEEE" style="height:22px;"> 
   <?php if($i==1){ ?>
     <td rowspan="5" colspan="3" bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="right" style="font-size:20px;">
	 <b><?php if($i==1){ ?>Overall Reports: <?php } ?></b>&nbsp;
	 </td>	 
   <?php } ?>
   	 	   
<?php /* 1 */ if($i==1){
if($_REQUEST['ii']>0){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId2." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$BeforeYId2." AND sp.ItemId=".$_REQUEST['ii']." AND (".$MultiState.")", $con); } 
else
{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId2." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where si.GroupId=".$_REQUEST['grp']." AND sd.YearId=".$BeforeYId2." AND (".$MultiState.")", $con); } if($_REQUEST['grp']==3){ $sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId2." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$BeforeYId2." AND (".$MultiState.")", $con); }
}

$res1=mysql_fetch_assoc($sqlP1d); 
$res1Tot=$res1['sM1']+$res1['sM2']+$res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12'];
$TotQ1=$res1['sM1']+$res1['sM2']+$res1['sM3']; $TotQ2=$res1['sM4']+$res1['sM5']+$res1['sM6'];
$TotQ3=$res1['sM7']+$res1['sM8']+$res1['sM9']; $TotQ4=$res1['sM10']+$res1['sM11']+$res1['sM12'];
 
 ?>
	<td class="Th40"><b><?php echo $y1T; ?></b></td><td class="Th40"><b><?php echo $y1; ?></b></td>
     <td class="Td60"><?php if($res1['sM1']!=0){echo floatval($res1['sM1']);} ?></td><td class="Td60"><?php if($res1['sM2']!=0){echo floatval($res1['sM2']);} ?></td>
  <td class="Td60"><?php if($res1['sM3']!=0){echo floatval($res1['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ1!=0){echo floatval($TotQ1);} ?></td>
  <td class="Td60"><?php if($res1['sM4']!=0){echo floatval($res1['sM4']);} ?></td><td class="Td60"><?php if($res1['sM5']!=0){echo floatval($res1['sM5']);} ?></td>
  <td class="Td60"><?php if($res1['sM6']!=0){echo floatval($res1['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ2!=0){echo floatval($TotQ2);} ?></td>
  <td class="Td60"><?php if($res1['sM7']!=0){echo floatval($res1['sM7']);} ?></td><td class="Td60"><?php if($res1['sM8']!=0){echo floatval($res1['sM8']);} ?></td>
  <td class="Td60"><?php if($res1['sM9']!=0){echo floatval($res1['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ3!=0){echo floatval($TotQ3);} ?></td>
  <td class="Td60"><?php if($res1['sM10']!=0){echo floatval($res1['sM10']);} ?></td><td class="Td60"><?php if($res1['sM11']!=0){echo floatval($res1['sM11']);} ?></td>
  <td class="Td60"><?php if($res1['sM12']!=0){echo floatval($res1['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ4!=0){echo floatval($TotQ4);} ?></td>
  <td class="Td60"><b><?php if($res1Tot!=0){echo floatval($res1Tot);} ?></b></td> 
	 <td class="Td60"><input type="text" id="TotVal_A" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td> 
	 
<?php } /* 2 */ if($i==2){ 
if($_REQUEST['ii']>0){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where sd.YearId=".$BeforeYId." AND sp.ItemId=".$_REQUEST['ii']." AND (".$MultiState.")", $con); }
else
{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND si.GroupId=".$_REQUEST['grp']." AND sd.YearId=".$BeforeYId." AND (".$MultiState.")", $con); } if($_REQUEST['grp']==3){ $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$BeforeYId." AND (".$MultiState.")", $con); }
}


$res2=mysql_fetch_assoc($sqlP2d);
$res2Tot=$res2['sM1']+$res2['sM2']+$res2['sM3']+$res2['sM4']+$res2['sM5']+$res2['sM6']+$res2['sM7']+$res2['sM8']+$res2['sM9']+$res2['sM10']+$res2['sM11']+$res2['sM12']; 
$Tot2Q1=$res2['sM1']+$res2['sM2']+$res2['sM3']; $Tot2Q2=$res2['sM4']+$res2['sM5']+$res2['sM6'];
$Tot2Q3=$res2['sM7']+$res2['sM8']+$res2['sM9']; $Tot2Q4=$res2['sM10']+$res2['sM11']+$res2['sM12'];
 ?>
      <td class="Th40"><b><?php echo $y2T; ?></b></td><td class="Th40"><b><?php echo $y2; ?></b></td>
 <td class="Td60"><?php if($res2['sM1']!=0){echo floatval($res2['sM1']);} ?></td><td class="Td60"><?php if($res2['sM2']!=0){echo floatval($res2['sM2']);} ?></td>
  <td class="Td60"><?php if($res2['sM3']!=0){echo floatval($res2['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q1!=0){echo floatval($Tot2Q1);} ?></td>
  <td class="Td60"><?php if($res2['sM4']!=0){echo floatval($res2['sM4']);} ?></td><td class="Td60"><?php if($res2['sM5']!=0){echo floatval($res2['sM5']);} ?></td>
  <td class="Td60"><?php if($res2['sM6']!=0){echo floatval($res2['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q2!=0){echo floatval($Tot2Q2);} ?></td>
  <td class="Td60"><?php if($res2['sM7']!=0){echo floatval($res2['sM7']);} ?></td><td class="Td60"><?php if($res2['sM8']!=0){echo floatval($res2['sM8']);} ?></td>
  <td class="Td60"><?php if($res2['sM9']!=0){echo floatval($res2['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q3!=0){echo floatval($Tot2Q3);} ?></td>
  <td class="Td60"><?php if($res2['sM10']!=0){echo floatval($res2['sM10']);} ?></td><td class="Td60"><?php if($res2['sM11']!=0){echo floatval($res2['sM11']);} ?></td>
  <td class="Td60"><?php if($res2['sM12']!=0){echo floatval($res2['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q4!=0){echo floatval($Tot2Q4);} ?></td>
  <td class="Td60"><b><?php if($res2Tot!=0){echo floatval($res2Tot);} ?></b></td> 
	 <td class="Td60"><input type="text" id="TotVal_B" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td>
	   
<?php } /* 3 */ if($i==3){ 
if($_REQUEST['ii']>0){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$_REQUEST['y']." AND sp.ItemId=".$_REQUEST['ii']." AND (".$MultiState.")", $con); }
else
{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where si.GroupId=".$_REQUEST['grp']." AND sd.YearId=".$_REQUEST['y']." AND (".$MultiState.")", $con); } if($_REQUEST['grp']==3){ $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$_REQUEST['y']." AND (".$MultiState.")", $con); }
}
 
$res3=mysql_fetch_assoc($sqlP3d); 
$res3Tot=$res3['sM1']+$res3['sM2']+$res3['sM3']+$res3['sM4']+$res3['sM5']+$res3['sM6']+$res3['sM7']+$res3['sM8']+$res3['sM9']+$res3['sM10']+$res3['sM11']+$res3['sM12']; 
$Tot3Q1=$res3['sM1']+$res3['sM2']+$res3['sM3']; $Tot3Q2=$res3['sM4']+$res3['sM5']+$res3['sM6'];
$Tot3Q3=$res3['sM7']+$res3['sM8']+$res3['sM9']; $Tot3Q4=$res3['sM10']+$res3['sM11']+$res3['sM12'];
 ?>
	 <td class="Th40"><b><?php echo $y3T; ?></b></td><td class="Th40"><b><?php echo $y3; ?></b></td> 
 <td class="Td60"><?php if($res3['sM1']!=0){echo floatval($res3['sM1']);} ?></td><td class="Td60"><?php if($res3['sM2']!=0){echo floatval($res3['sM2']);} ?></td>
  <td class="Td60"><?php if($res3['sM3']!=0){echo floatval($res3['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q1!=0){echo floatval($Tot3Q1);} ?></td>
  <td class="Td60"><?php if($res3['sM4']!=0){echo floatval($res3['sM4']);} ?></td><td class="Td60"><?php if($res3['sM5']!=0){echo floatval($res3['sM5']);} ?></td>
  <td class="Td60"><?php if($res3['sM6']!=0){echo floatval($res3['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q2!=0){echo floatval($Tot3Q2);} ?></td>
  <td class="Td60"><?php if($res3['sM7']!=0){echo floatval($res3['sM7']);} ?></td><td class="Td60"><?php if($res3['sM8']!=0){echo floatval($res3['sM8']);} ?></td>
  <td class="Td60"><?php if($res3['sM9']!=0){echo floatval($res3['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q3!=0){echo floatval($Tot3Q3);} ?></td>
  <td class="Td60"><?php if($res3['sM10']!=0){echo floatval($res3['sM10']);} ?></td><td class="Td60"><?php if($res3['sM11']!=0){echo floatval($res3['sM11']);} ?></td>
  <td class="Td60"><?php if($res3['sM12']!=0){echo floatval($res3['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q4!=0){echo floatval($Tot3Q4);} ?></td>	 
  <td class="Td60"><b><?php if($res3Tot!=0){echo floatval($res3Tot);} ?></b></td>
	 <td class="Td60"><input type="text" id="TotVal_C" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td>
	     
<?php } /* 4 */  if($i==4){ 
if($_REQUEST['ii']>0){ $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$AfterYId." AND sp.ItemId=".$_REQUEST['ii']." AND (".$MultiState.")", $con); }
else
{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where si.GroupId=".$_REQUEST['grp']." AND sd.YearId=".$AfterYId." AND (".$MultiState.")", $con); } if($_REQUEST['grp']==3){ $sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$AfterYId." AND (".$MultiState.")", $con); }
}
 
$res4=mysql_fetch_assoc($sqlP4d); 
$res4Tot=$res4['sM1']+$res4['sM2']+$res4['sM3']+$res4['sM4']+$res4['sM5']+$res4['sM6']+$res4['sM7']+$res4['sM8']+$res4['sM9']+$res4['sM10']+$res4['sM11']+$res4['sM12']; 
$Tot4Q1=$res4['sM1']+$res4['sM2']+$res4['sM3']; $Tot4Q2=$res4['sM4']+$res4['sM5']+$res4['sM6'];
$Tot4Q3=$res4['sM7']+$res4['sM8']+$res4['sM9']; $Tot4Q4=$res4['sM10']+$res4['sM11']+$res4['sM12'];
 ?>
	 <td class="Th40"><b><?php echo $y4T; ?></b></td><td class="Th40"><b><?php echo $y4; ?></b></td> 
 <td class="Td60"><?php if($res4['sM1']!=0){echo floatval($res4['sM1']);} ?></td><td class="Td60"><?php if($res4['sM2']!=0){echo floatval($res4['sM2']);} ?></td>
  <td class="Td60"><?php if($res4['sM3']!=0){echo floatval($res4['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q1!=0){echo floatval($Tot4Q1);} ?></td>
  <td class="Td60"><?php if($res4['sM4']!=0){echo floatval($res4['sM4']);} ?></td><td class="Td60"><?php if($res4['sM5']!=0){echo floatval($res4['sM5']);} ?></td>
  <td class="Td60"><?php if($res4['sM6']!=0){echo floatval($res4['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q2!=0){echo floatval($Tot4Q2);} ?></td>
  <td class="Td60"><?php if($res4['sM7']!=0){echo floatval($res4['sM7']);} ?></td><td class="Td60"><?php if($res4['sM8']!=0){echo floatval($res4['sM8']);} ?></td>
  <td class="Td60"><?php if($res4['sM9']!=0){echo floatval($res4['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q3!=0){echo floatval($Tot4Q3);} ?></td>
  <td class="Td60"><?php if($res4['sM10']!=0){echo floatval($res4['sM10']);} ?></td><td class="Td60"><?php if($res4['sM11']!=0){echo floatval($res4['sM11']);} ?></td>
  <td class="Td60"><?php if($res4['sM12']!=0){echo floatval($res4['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q4!=0){echo floatval($Tot4Q4);} ?></td>	 
  <td class="Td60"><b><?php if($res4Tot!=0){echo floatval($res4Tot);} ?></b></td>
	 <td class="Td60"><input type="text" id="TotVal_D" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td>
	 
<?php } /* 5 */  $sqlYe=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resYe=mysql_fetch_assoc($sqlYe);
        $yeft=date("y",strtotime($resYe['FromDate'])).'-'.date("y",strtotime($resYe['ToDate'])); $yeT='<font color="#A60053">YTD</font>'; 
	    if($i==5){ 
if($_REQUEST['ii']>0){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$_REQUEST['y']." AND sp.ItemId=".$_REQUEST['ii']." AND (".$MultiState.")", $con); }
else
{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where si.GroupId=".$_REQUEST['grp']." AND sd.YearId=".$_REQUEST['y']." AND (".$MultiState.")", $con); } if($_REQUEST['grp']==3){ $sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$_REQUEST['y']." AND (".$MultiState.")", $con); }
}		
 
 $res5=mysql_fetch_assoc($sqlP5d);  
 $res5Tot=$res5['sM1']+$res5['sM2']+$res5['sM3']+$res5['sM4']+$res5['sM5']+$res5['sM6']+$res5['sM7']+$res5['sM8']+$res5['sM9']+$res5['sM10']+$res5['sM11']+$res5['sM12'];
 $Tot5Q1=$res5['sM1']+$res5['sM2']+$res5['sM3']; $Tot5Q2=$res5['sM4']+$res5['sM5']+$res5['sM6'];
 $Tot5Q3=$res5['sM7']+$res5['sM8']+$res5['sM9']; $Tot5Q4=$res5['sM10']+$res5['sM11']+$res5['sM12']; 
 
 ?>
	  <td class="Th40"><b><?php echo $yeT; ?></b></td><td class="Th40"><b><?php echo $yeft; ?></b></td> 
  <td class="Td60"><?php if($res5['sM1']!=0){echo floatval($res5['sM1']);} ?></td><td class="Td60"><?php if($res5['sM2']!=0){echo floatval($res5['sM2']);} ?></td>
  <td class="Td60"><?php if($res5['sM3']!=0){echo floatval($res5['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q1!=0){echo floatval($Tot5Q1);} ?></td>
  <td class="Td60"><?php if($res5['sM4']!=0){echo floatval($res5['sM4']);} ?></td><td class="Td60"><?php if($res5['sM5']!=0){echo floatval($res5['sM5']);} ?></td>
  <td class="Td60"><?php if($res5['sM6']!=0){echo floatval($res5['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q2!=0){echo floatval($Tot5Q2);} ?></td>
  <td class="Td60"><?php if($res5['sM7']!=0){echo floatval($res5['sM7']);} ?></td><td class="Td60"><?php if($res5['sM8']!=0){echo floatval($res5['sM8']);} ?></td>
  <td class="Td60"><?php if($res5['sM9']!=0){echo floatval($res5['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q3!=0){echo floatval($Tot5Q3);} ?></td>
  <td class="Td60"><?php if($res5['sM10']!=0){echo floatval($res5['sM10']);} ?></td><td class="Td60"><?php if($res5['sM11']!=0){echo floatval($res5['sM11']);} ?></td>
  <td class="Td60"><?php if($res5['sM12']!=0){echo floatval($res5['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q4!=0){echo floatval($Tot5Q4);} ?></td>	 
  <td class="Td60"><b><?php if($res5Tot!=0){echo floatval($res5Tot);} ?></b></td>
	 <td class="Td60"><input type="text" id="TotVal_E" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td>
<?php } ?>	   	   
  </tr>
<?php } ?>   

<?php ////////////////////////////////////////////////////////// ?>

  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="5" style="font-size:12px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php //echo 'State - '.strtoupper($resS['StateName']); ?></b></td>
    <td class="Th60" rowspan="2">APR</td><td class="Th60" rowspan="2">MAY</td><td class="Th60" rowspan="2">JUN</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q1</td>
  <td class="Th60" rowspan="2">JUL</td><td class="Th60" rowspan="2">AUG</td><td class="Th60" rowspan="2">SEP</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q2</td>
  <td class="Th60" rowspan="2">OCT</td><td class="Th60" rowspan="2">NOV</td><td class="Th60" rowspan="2">DEC</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q3</td>
  <td class="Th60" rowspan="2">JAN</td><td class="Th60" rowspan="2">FEB</td><td class="Th60" rowspan="2">MAR</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q4</td>
  <td class="Th60" rowspan="2"><b>TOTAL<br><font color="#E67300">Kg</font></b></td>
  <td class="Th60" rowspan="2"><b>VALUE<br><font color="#E67300">Lakh</font></b></td>	  
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">  
   <td align="center" style="width:50px;font-size:11px;"><b>CROP</b></td>
   <td align="center" style="width:100px;font-size:11px;"><b>VARIETY</b></td>
   <td align="center" class="Th40"><b>TYPE</b></td>
   <td colspan="2" align="center" style="width:80px;font-size:11px;"><b>YEAR</b></td>
  </tr>	
  <tr>
  <td colspan="30">
 <div class="inner_table" style="width:1250px;">
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px; vertical-align:top;">		
  
  <?php if($_REQUEST['ii']>0){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.ItemId=".$_REQUEST['ii']." order by si.ItemName ASC, st.TypeName ASC, sp.ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=".$_REQUEST['grp']." order by si.ItemName ASC, st.TypeName ASC, sp.ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId order by si.GroupId ASC, si.ItemName ASC, st.TypeName ASC, sp.ProductName ASC", $con); }
	  } $Sn=1; while($res=mysql_fetch_array($sql)){ for($i=1; $i<=5; $i++){?>
  <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" style="width:50px;font-size:11px;">&nbsp;<?php if($i==1){echo $res['ItemCode'];} ?></td>	 
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" style="width:100px;font-size:11px;">&nbsp;<?php if($i==1){echo $res['ProductName'];} ?></td>
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="center" style="width:50px;font-size:11px;">&nbsp;<?php if($i==1){echo substr_replace($res['TypeName'],'',2);}?></td>	  
<?php /* 1 */ if($i==1){$sqlP1d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details_".$BeforeYId2." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$BeforeYId2." AND sd.ProductId=".$res['ProductId']." AND (".$MultiState.")", $con); $res1=mysql_fetch_assoc($sqlP1d); 
$res1Tot=$res1['tm1']+$res1['tm2']+$res1['tm3']+$res1['tm4']+$res1['tm5']+$res1['tm6']+$res1['tm7']+$res1['tm8']+$res1['tm9']+$res1['tm10']+$res1['tm11']+$res1['tm12'];
$res1Tot1=$res1['tm1']+$res1['tm2']+$res1['tm3']; $res1Tot2=$res1['tm4']+$res1['tm5']+$res1['tm6'];
$res1Tot3=$res1['tm7']+$res1['tm8']+$res1['tm9']; $res1Tot4=$res1['tm10']+$res1['tm11']+$res1['tm12']; 
 ?>

<?php 
include("Nrv1.php");

$Net4=$res1['tm1']*$Nrv4; $Net5=$res1['tm2']*$Nrv5; $Net6=$res1['tm3']*$Nrv6; $Net7=$res1['tm4']*$Nrv7; $Net8=$res1['tm5']*$Nrv8; 
$Net9=$res1['tm6']*$Nrv9; $Net10=$res1['tm7']*$Nrv10; $Net11=$res1['tm8']*$Nrv11; $Net12=$res1['tm9']*$Nrv12; $Net1=$res1['tm10']*$Nrv1; 
$Net2=$res1['tm11']*$Nrv2; $Net3=$res1['tm12']*$Nrv3; $NetNRV_1=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_1=$NetNRV_1/100000;
?>
<td class="Th40"><b><?php echo $y1T; ?></b></td><td class="Th40"><b><?php echo $y1; ?></b></td>
  <td class="Td60"><?php if($res1['tm1']!=0){echo floatval($res1['tm1']);} ?></td>
  <td class="Td60"><?php if($res1['tm2']!=0){echo floatval($res1['tm2']);} ?></td>
  <td class="Td60"><?php if($res1['tm3']!=0){echo floatval($res1['tm3']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot1!=0){echo floatval($res1Tot1);} ?></td>
  <td class="Td60"><?php if($res1['tm4']!=0){echo floatval($res1['tm4']);} ?></td>
  <td class="Td60"><?php if($res1['tm5']!=0){echo floatval($res1['tm5']);} ?></td>
  <td class="Td60"><?php if($res1['tm6']!=0){echo floatval($res1['tm6']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot2!=0){echo floatval($res1Tot2);} ?></td>
  <td class="Td60"><?php if($res1['tm7']!=0){echo floatval($res1['tm7']);} ?></td>
  <td class="Td60"><?php if($res1['tm8']!=0){echo floatval($res1['tm8']);} ?></td>
  <td class="Td60"><?php if($res1['tm9']!=0){echo floatval($res1['tm9']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot3!=0){echo floatval($res1Tot3);} ?></td>
  <td class="Td60"><?php if($res1['tm10']!=0){echo floatval($res1['tm10']);} ?></td>
  <td class="Td60"><?php if($res1['tm11']!=0){echo floatval($res1['tm11']);} ?></td>
  <td class="Td60"><?php if($res1['tm12']!=0){echo floatval($res1['tm12']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot4!=0){echo floatval($res1Tot4);} ?></td>
  <td class="Td60"><b><?php if($res1Tot!=0){echo floatval($res1Tot);} ?></b></td>

  <td class="Td60"><input type="text" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_1!=0){echo round($LakhNRV_1,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'A'.$Sn; ?>" value="<?php if($LakhNRV_1>0){echo round($LakhNRV_1,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_1>0){$valA=$LakhNRV_1;}else{$valA=0;} echo '<script>FunATotal('.$valA.');</script>'; ?>
  </td>  
	 
<?php } /* 2 */ if($i==2){ $sqlP2d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$BeforeYId." AND sd.ProductId=".$res['ProductId']." AND (".$MultiState.")", $con); $res2=mysql_fetch_assoc($sqlP2d); 
$res2Tot=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']+$res2['tm10']+$res2['tm11']+$res2['tm12'];
$res2Tot1=$res2['tm1']+$res2['tm2']+$res2['tm3']; $res2Tot2=$res2['tm4']+$res2['tm5']+$res2['tm6'];
 $res2Tot3=$res2['tm7']+$res2['tm8']+$res2['tm9']; $res2Tot4=$res2['tm10']+$res2['tm11']+$res2['tm12']; 
 ?>

<?php 
include("Nrv2.php");

$Net4=$res2['tm1']*$Nrv4; $Net5=$res2['tm2']*$Nrv5; $Net6=$res2['tm3']*$Nrv6; $Net7=$res2['tm4']*$Nrv7; $Net8=$res2['tm5']*$Nrv8; 
$Net9=$res2['tm6']*$Nrv9; $Net10=$res2['tm7']*$Nrv10; $Net11=$res2['tm8']*$Nrv11; $Net12=$res2['tm9']*$Nrv12; $Net1=$res2['tm10']*$Nrv1; 
$Net2=$res2['tm11']*$Nrv2; $Net3=$res2['tm12']*$Nrv3; $NetNRV_2=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_2=$NetNRV_2/100000;
?>
<td class="Th40"><b><?php echo $y2T; ?></b></td><td class="Th40"><b><?php echo $y2; ?></b></td>
  <td class="Td60"><?php if($res2['tm1']!=0){echo floatval($res2['tm1']);} ?></td>
  <td class="Td60"><?php if($res2['tm2']!=0){echo floatval($res2['tm2']);} ?></td>
  <td class="Td60"><?php if($res2['tm3']!=0){echo floatval($res2['tm3']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot1!=0){echo floatval($res2Tot1);} ?></td>
  <td class="Td60"><?php if($res2['tm4']!=0){echo floatval($res2['tm4']);} ?></td>
  <td class="Td60"><?php if($res2['tm5']!=0){echo floatval($res2['tm5']);} ?></td>
  <td class="Td60"><?php if($res2['tm6']!=0){echo floatval($res2['tm6']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot2!=0){echo floatval($res2Tot2);} ?></td>
  <td class="Td60"><?php if($res2['tm7']!=0){echo floatval($res2['tm7']);} ?></td>
  <td class="Td60"><?php if($res2['tm8']!=0){echo floatval($res2['tm8']);} ?></td>
  <td class="Td60"><?php if($res2['tm9']!=0){echo floatval($res2['tm9']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot3!=0){echo floatval($res2Tot3);} ?></td>
  <td class="Td60"><?php if($res2['tm10']!=0){echo floatval($res2['tm10']);} ?></td>
  <td class="Td60"><?php if($res2['tm11']!=0){echo floatval($res2['tm11']);} ?></td>
  <td class="Td60"><?php if($res2['tm12']!=0){echo floatval($res2['tm12']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot4!=0){echo floatval($res2Tot4);} ?></td>
  <td class="Td60"><b><?php if($res2Tot!=0){echo floatval($res2Tot);} ?></b></td>

  <td class="Td60"><input type="text" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_2!=0){echo round($LakhNRV_2,4);} ?>" readonly />
  <input type="hidden" id="id="<?php echo 'B'.$Sn; ?>"" value="<?php if($LakhNRV_2>0){echo round($LakhNRV_2,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_2>0){$valB=$LakhNRV_2;}else{$valB=0;} echo '<script>FunBTotal('.$valB.');</script>'; ?>
  </td>  	   
<?php } /* 3 */ if($i==3){ $sqlP3d=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId']." AND (".$MultiState.")", $con); $res3=mysql_fetch_assoc($sqlP3d); 
$res3Tot=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']+$res3['tm10']+$res3['tm11']+$res3['tm12']; 
$res3Tot1=$res3['tm1']+$res3['tm2']+$res3['tm3']; $res3Tot2=$res3['tm4']+$res3['tm5']+$res3['tm6'];
$res3Tot3=$res3['tm7']+$res3['tm8']+$res3['tm9']; $res3Tot4=$res3['tm10']+$res3['tm11']+$res3['tm12'];
 ?>

<?php 
include("Nrv3.php");

$Net4=$res3['tm1']*$Nrv4; $Net5=$res3['tm2']*$Nrv5; $Net6=$res3['tm3']*$Nrv6; $Net7=$res3['tm4']*$Nrv7; $Net8=$res3['tm5']*$Nrv8; 
$Net9=$res3['tm6']*$Nrv9; $Net10=$res3['tm7']*$Nrv10; $Net11=$res3['tm8']*$Nrv11; $Net12=$res3['tm9']*$Nrv12; $Net1=$res3['tm10']*$Nrv1; 
$Net2=$res3['tm11']*$Nrv2; $Net3=$res3['tm12']*$Nrv3; $NetNRV_3=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_3=$NetNRV_3/100000;
?>

<td class="Th40"><b><?php echo $y3T; ?></b></td><td class="Th40"><b><?php echo $y3; ?></b></td>
  <td class="Td60"><?php if($res3['tm1']!=0){echo floatval($res3['tm1']);} ?></td>
  <td class="Td60"><?php if($res3['tm2']!=0){echo floatval($res3['tm2']);} ?></td>
  <td class="Td60"><?php if($res3['tm3']!=0){echo floatval($res3['tm3']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot1!=0){echo floatval($res3Tot1);} ?></td>
  <td class="Td60"><?php if($res3['tm4']!=0){echo floatval($res3['tm4']);} ?></td>
  <td class="Td60"><?php if($res3['tm5']!=0){echo floatval($res3['tm5']);} ?></td>
  <td class="Td60"><?php if($res3['tm6']!=0){echo floatval($res3['tm6']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot2!=0){echo floatval($res3Tot2);} ?></td>
  <td class="Td60"><?php if($res3['tm7']!=0){echo floatval($res3['tm7']);} ?></td>
  <td class="Td60"><?php if($res3['tm8']!=0){echo floatval($res3['tm8']);} ?></td>
  <td class="Td60"><?php if($res3['tm9']!=0){echo floatval($res3['tm9']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot3!=0){echo floatval($res3Tot3);} ?></td>
  <td class="Td60"><?php if($res3['tm10']!=0){echo floatval($res3['tm10']);} ?></td>
  <td class="Td60"><?php if($res3['tm11']!=0){echo floatval($res3['tm11']);} ?></td>
  <td class="Td60"><?php if($res3['tm12']!=0){echo floatval($res3['tm12']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot4!=0){echo floatval($res3Tot4);} ?></td>
  <td class="Td60"><b><?php if($res3Tot!=0){echo floatval($res3Tot);} ?></b></td>  
  
  <td class="Td60"><input type="text" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_3!=0){echo round($LakhNRV_3,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'C'.$Sn; ?>" value="<?php if($LakhNRV_3>0){echo round($LakhNRV_3,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_3>0){$valC=$LakhNRV_3;}else{$valC=0;} echo '<script>FunCTotal('.$valC.');</script>'; ?>
  </td> 
	     
<?php } /* 4 */  if($i==4){ $sqlP4d=mysql_query("select SUM(M1_Proj) as tm1,SUM(M2_Proj) as tm2,SUM(M3_Proj) as tm3,SUM(M4_Proj) as tm4,SUM(M5_Proj) as tm5,SUM(M6_Proj) as tm6,SUM(M7_Proj) as tm7,SUM(M8_Proj) as tm8,SUM(M9_Proj) as tm9,SUM(M10_Proj) as tm10,SUM(M11_Proj) as tm11,SUM(M12_Proj) as tm12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$AfterYId." AND sd.ProductId=".$res['ProductId']." AND (".$MultiState.")", $con); $res4=mysql_fetch_assoc($sqlP4d); 
$res4Tot=$res4['tm1']+$res4['tm2']+$res4['tm3']+$res4['tm4']+$res4['tm5']+$res4['tm6']+$res4['tm7']+$res4['tm8']+$res4['tm9']+$res4['tm10']+$res4['tm11']+$res4['tm12']; 
$res4Tot1=$res4['tm1']+$res4['tm2']+$res4['tm3']; $res4Tot2=$res4['tm4']+$res4['tm5']+$res4['tm6'];
$res4Tot3=$res4['tm7']+$res4['tm8']+$res4['tm9']; $res4Tot4=$res4['tm10']+$res4['tm11']+$res4['tm12'];
 ?>

<?php 
include("Nrv4.php");

$Net4=$res4['tm1']*$Nrv4; $Net5=$res4['tm2']*$Nrv5; $Net6=$res4['tm3']*$Nrv6; $Net7=$res4['tm4']*$Nrv7; $Net8=$res4['tm5']*$Nrv8; 
$Net9=$res4['tm6']*$Nrv9; $Net10=$res4['tm7']*$Nrv10; $Net11=$res4['tm8']*$Nrv11; $Net12=$res4['tm9']*$Nrv12; $Net1=$res4['tm10']*$Nrv1; 
$Net2=$res4['tm11']*$Nrv2; $Net3=$res4['tm12']*$Nrv3; $NetNRV_4=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_4=$NetNRV_4/100000;

?>

	<td class="Th40"><b><?php echo $y4T; ?></b></td><td class="Th40"><b><?php echo $y4; ?></b></td>
  <td class="Td60"><?php if($res4['tm1']!=0){echo floatval($res4['tm1']);} ?></td>
  <td class="Td60"><?php if($res4['tm2']!=0){echo floatval($res4['tm2']);} ?></td>
  <td class="Td60"><?php if($res4['tm3']!=0){echo floatval($res4['tm3']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot1!=0){echo floatval($res4Tot1);} ?></td>
  <td class="Td60"><?php if($res4['tm4']!=0){echo floatval($res4['tm4']);} ?></td>
  <td class="Td60"><?php if($res4['tm5']!=0){echo floatval($res4['tm5']);} ?></td>
  <td class="Td60"><?php if($res4['tm6']!=0){echo floatval($res4['tm6']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot2!=0){echo floatval($res4Tot2);} ?></td>
  <td class="Td60"><?php if($res4['tm7']!=0){echo floatval($res4['tm7']);} ?></td>
  <td class="Td60"><?php if($res4['tm8']!=0){echo floatval($res4['tm8']);} ?></td>
  <td class="Td60"><?php if($res4['tm9']!=0){echo floatval($res4['tm9']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot3!=0){echo floatval($res4Tot3);} ?></td>
  <td class="Td60"><?php if($res4['tm10']!=0){echo floatval($res4['tm10']);} ?></td>
  <td class="Td60"><?php if($res4['tm11']!=0){echo floatval($res4['tm11']);} ?></td>
  <td class="Td60"><?php if($res4['tm12']!=0){echo floatval($res4['tm12']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot4!=0){echo floatval($res4Tot4);} ?></td>
  <td class="Td60"><b><?php if($res4Tot!=0){echo floatval($res4Tot);} ?></b></td>
  
  <td class="Td60"><input type="text" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_4!=0){echo round($LakhNRV_4,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'D'.$Sn; ?>" value="<?php if($LakhNRV_4>0){echo round($LakhNRV_4,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_4>0){$valD=$LakhNRV_4;}else{$valD=0;} echo '<script>FunDTotal('.$valD.');</script>'; ?>
  </td> 

<?php } /* 5 */  $sqlYe=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resYe=mysql_fetch_assoc($sqlYe);
        $yeft=date("y",strtotime($resYe['FromDate'])).'-'.date("y",strtotime($resYe['ToDate'])); $yeT='<font color="#A60053">YTD</font>'; 
	    if($i==5){ $sqlP5d=mysql_query("select SUM(M1_Ach) as tM1,SUM(M2_Ach) as tM2,SUM(M3_Ach) as tM3,SUM(M4_Ach) as tM4,SUM(M5_Ach) as tM5,SUM(M6_Ach) as tM6,SUM(M7_Ach) as tM7,SUM(M8_Ach) as tM8,SUM(M9_Ach) as tM9,SUM(M10_Ach) as tM10,SUM(M11_Ach) as tM11,SUM(M12_Ach) as tM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where ".$subQ." AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId']." AND (".$MultiState.")", $con); $res5=mysql_fetch_assoc($sqlP5d);  
$res5Tot=$res5['tM1']+$res5['tM2']+$res5['tM3']+$res5['tM4']+$res5['tM5']+$res5['tM6']+$res5['tM7']+$res5['tM8']+$res5['tM9']+$res5['tM10']+$res5['tM11']+$res5['tM12'];
$res5Tot1=$res5['tM1']+$res5['tM2']+$res5['tM3']; $res5Tot2=$res5['tM4']+$res5['tM5']+$res5['tM6'];
 $res5Tot3=$res5['tM7']+$res5['tM8']+$res5['tM9']; $res5Tot4=$res5['tM10']+$res5['tM11']+$res5['tM12'];
 ?>

<?php 
include("Nrv5.php");

$Net4=$res5['tM1']*$Nrv4; $Net5=$res5['tM2']*$Nrv5; $Net6=$res5['tM3']*$Nrv6; $Net7=$res5['tM4']*$Nrv7; $Net8=$res5['tM5']*$Nrv8; 
$Net9=$res5['tM6']*$Nrv9; $Net10=$res5['tM7']*$Nrv10; $Net11=$res5['tM8']*$Nrv11; $Net12=$res5['tM9']*$Nrv12; $Net1=$res5['tM10']*$Nrv1; 
$Net2=$res5['tM11']*$Nrv2; $Net3=$res5['tM12']*$Nrv3; $NetNRV_5=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_5=$NetNRV_5/100000;

?>
<td class="Th40"><b><?php echo $yeT; ?></b></td><td class="Th40"><b><?php echo $yeft; ?></b></td>
  <td class="Td60"><?php if($res5['tM1']!=0){echo floatval($res5['tM1']);} ?></td>
  <td class="Td60"><?php if($res5['tM2']!=0){echo floatval($res5['tM2']);} ?></td>
  <td class="Td60"><?php if($res5['tM3']!=0){echo floatval($res5['tM3']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot1!=0){echo floatval($res5Tot1);} ?></td>
  <td class="Td60"><?php if($res5['tM4']!=0){echo floatval($res5['tM4']);} ?></td>
  <td class="Td60"><?php if($res5['tM5']!=0){echo floatval($res5['tM5']);} ?></td>
  <td class="Td60"><?php if($res5['tM6']!=0){echo floatval($res5['tM6']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot2!=0){echo floatval($res5Tot2);} ?></td>
  <td class="Td60"><?php if($res5['tM7']!=0){echo floatval($res5['tM7']);} ?></td>
  <td class="Td60"><?php if($res5['tM8']!=0){echo floatval($res5['tM8']);} ?></td>
  <td class="Td60"><?php if($res5['tM9']!=0){echo floatval($res5['tM9']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot3!=0){echo floatval($res5Tot3);} ?></td>
  <td class="Td60"><?php if($res5['tM10']!=0){echo floatval($res5['tM10']);} ?></td>
  <td class="Td60"><?php if($res5['tM11']!=0){echo floatval($res5['tM11']);} ?></td>
  <td class="Td60"><?php if($res5['tM12']!=0){echo floatval($res5['tM12']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot4!=0){echo floatval($res5Tot4);} ?></td>
  <td class="Td60"><b><?php if($res5Tot!=0){echo floatval($res5Tot);} ?></b></td>
  
  <td class="Td60"><input type="text" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_5!=0){echo round($LakhNRV_5,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'E'.$Sn; ?>" value="<?php if($LakhNRV_5!=0){echo round($LakhNRV_5,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_5!=0){$valE=$LakhNRV_5;}else{$valE=0;} echo '<script>FunETotal('.$valE.');</script>'; ?>
  </td> 

<?php }  ?>	   	      	      	   	   	   


  </tr> 
<?php } $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActSn" value="'.$ActSn.'" />'; ?> 
</table>
</div>
</td>
</tr> 		  	  
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
		
<?php //*************************************************************************** ?>
<?php //******************END*****END*****END******END******END*********************** ?>
<?php //********************************************************************* ?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
