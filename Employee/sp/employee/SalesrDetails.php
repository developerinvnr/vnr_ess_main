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
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:12px;width:65px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:12px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:12px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Trh60{text-align:center;width:60px;font-weight:bold;font-size:12px;}
.Trh50{text-align:center;width:60px;font-weight:bold;font-size:12px;}
.inner_table { height:400px;overflow-y:auto;width:auto; }
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function ChangeAR(v)
{
   var y=document.getElementById("YearV").value; var crp=document.getElementById("CropV").value;
   if(crp==0){alert("Please Select Crop Value"); return false; }
   else{ var act=document.getElementById("act").value; var q=document.getElementById("q").value; var cc=document.getElementById("cc").value;  
   var di=document.getElementById("di").value; var gi=document.getElementById("gi").value; 
   var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ItemV").value; var fc=document.getElementById("fc").value; 
   var vc=document.getElementById("vc").value; var myh=document.getElementById("myh").value; var myt=document.getElementById("myh").value;
   var hq=document.getElementById("hq").value;
   window.location="SalesrDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+'&mainv='+v+'&crop='+crp+'&findV=ZZ'; } 
}

/*function ChangeCrop(v)
{
   var y=document.getElementById("YearV").value; var crp=document.getElementById("CropV").value;
   if(crp==0){alert("Please Select Crop Value"); return false; }
   else{ var act=document.getElementById("act").value; var q=document.getElementById("q").value; var cc=document.getElementById("cc").value;  
   var di=document.getElementById("di").value; var gi=document.getElementById("gi").value; 
   var EHq=document.getElementById("EHq").value; var ii=0; var fc=document.getElementById("fc").value; 
   var vc=document.getElementById("vc").value; var myh=document.getElementById("myh").value; var myt=document.getElementById("myh").value;
   var hq=document.getElementById("hq").value;
   window.location="SalesrDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+'&mainv='+v+'&crop='+crp+'&findV=ZZ'; } 
}*/

function ClickFSL1(e,y)
{
    var ActSn=document.getElementById("ActualSn").value; 
	if(ActSn>0)
	{
	  for(var i=1; i<=ActSn; i++)
	  { var va1=parseFloat(document.getElementById("TotP2_"+i).value); var va2=parseFloat(document.getElementById("STotP2_"+i).value);
	    var vb1=parseFloat(document.getElementById("TotP3_"+i).value); var vb2=parseFloat(document.getElementById("STotP3_"+i).value);  
	    if(va1<va2 || va1>va2 || vb1<vb2 || vb1>vb2){ var pn=document.getElementById("PN_"+i).value; alert("Please check "+pn+" total value, your "+pn+" total value should be there equal from revised values"); return false;	}
	  }
	}
	
   var y=document.getElementById("YearV").value; var crp=document.getElementById("CropV").value;
   var act=document.getElementById("act").value; var q=document.getElementById("q").value; var cc=document.getElementById("cc").value;  
   var di=document.getElementById("di").value; var gi=document.getElementById("gi").value; 
   var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ItemV").value; var fc=document.getElementById("fc").value; 
   var vc=document.getElementById("vc").value; var myh=document.getElementById("myh").value; var myt=document.getElementById("myh").value;
   var hq=document.getElementById("hq").value;
   var win = window.open("SbOpenFile.php?CheckAct=Fsb1&y="+y+"&e="+e,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=620,height=200");
   var timer = setInterval( function() { if(win.closed) { clearInterval(timer); window.location="SalesrDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+'&mainv='+v+'&crop='+crp+'&findV=ZZ'; } }, 1000);
}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#FFAAFF'; document.getElementById("tD1"+sn).style.background='#FFAAFF'; document.getElementById("tD2"+sn).style.background='#FFAAFF'; document.getElementById("tD3"+sn).style.background='#FFAAFF'; document.getElementById("tD4"+sn).style.background='#FFAAFF'; document.getElementById("tD5"+sn).style.background='#FFAAFF'; document.getElementById("tD6"+sn).style.background='#FFAAFF'; document.getElementById("tD7"+sn).style.background='#FFAAFF'; document.getElementById("tD8"+sn).style.background='#FFAAFF'; document.getElementById("tD9"+sn).style.background='#FFAAFF'; document.getElementById("tD10"+sn).style.background='#FFAAFF'; document.getElementById("tD11"+sn).style.background='#FFAAFF'; document.getElementById("tD12"+sn).style.background='#FFAAFF'; document.getElementById("tD13"+sn).style.background='#FFAAFF'; document.getElementById("tD14"+sn).style.background='#FFAAFF'; document.getElementById("tD15"+sn).style.background='#FFAAFF'; document.getElementById("tD16"+sn).style.background='#FFAAFF'; document.getElementById("tD17"+sn).style.background='#FFAAFF'; document.getElementById("tD18"+sn).style.background='#FFAAFF'; document.getElementById("tD19"+sn).style.background='#FFAAFF'; document.getElementById("tD20"+sn).style.background='#FFAAFF'; document.getElementById("tD21"+sn).style.background='#FFAAFF'; document.getElementById("tD22"+sn).style.background='#FFAAFF'; document.getElementById("tD23"+sn).style.background='#FFAAFF'; document.getElementById("tD24"+sn).style.background='#FFAAFF'; document.getElementById("tD25"+sn).style.background='#FFAAFF'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; document.getElementById("tD1"+sn).style.background='#FFFFFF'; document.getElementById("tD2"+sn).style.background='#FFFFFF'; document.getElementById("tD3"+sn).style.background='#FFFFFF'; document.getElementById("tD4"+sn).style.background='#FFFFFF'; document.getElementById("tD5"+sn).style.background='#FFFFFF'; document.getElementById("tD6"+sn).style.background='#FFFFFF'; document.getElementById("tD7"+sn).style.background='#FFFFFF'; document.getElementById("tD8"+sn).style.background='#FFFFFF'; document.getElementById("tD9"+sn).style.background='#FFFFFF'; document.getElementById("tD10"+sn).style.background='#FFFFFF'; document.getElementById("tD11"+sn).style.background='#FFFFFF'; document.getElementById("tD12"+sn).style.background='#FFFFFF'; document.getElementById("tD13"+sn).style.background='#FFFFFF'; document.getElementById("tD14"+sn).style.background='#FFFFFF'; document.getElementById("tD15"+sn).style.background='#FFFFFF'; document.getElementById("tD16"+sn).style.background='#FFFFFF'; document.getElementById("tD17"+sn).style.background='#FFFFFF'; document.getElementById("tD18"+sn).style.background='#FFFFFF'; document.getElementById("tD19"+sn).style.background='#FFFFFF'; document.getElementById("tD20"+sn).style.background='#FFFFFF'; document.getElementById("tD21"+sn).style.background='#FFFFFF'; document.getElementById("tD22"+sn).style.background='#FFFFFF'; document.getElementById("tD23"+sn).style.background='#FFFFFF'; document.getElementById("tD24"+sn).style.background='#FFFFFF'; document.getElementById("tD25"+sn).style.background='#FFFFFF'; }
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
  <table width="100%" style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" style="width:100%;">
	     <table border="0" style="width:100%;height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top" style="width:100%;">  
		   
<?php //************************************************************************************************** ?>	   
		     <table border="0" id="Activity" style="width:100%;">
			  <tr style="width:100%;">
			     <td id="Anni" valign="top" style="width:5px;"></td>
				 <td colspan="2" valign="top" style="width:100%;">
				  <table border="0" style="width:100%;">
<?php //*************************************** Start ********************************************** ?>		
<?php 
$SpP=mysql_query("select GradeId,DepartmentId,HqId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSpP=mysql_fetch_assoc($SpP); 
$SpEG=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeId=".$resSpP['GradeId'], $con); $resSpEG=mysql_fetch_assoc($SpEG);
?>		
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="act" value="<?php echo $_REQUEST['act']; ?>" /><input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
<input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" />
<input type="hidden" name="vc" id="vc" value="<?php echo $_REQUEST['vc']; ?>" /><input type="hidden" name="fc" id="fc" value="<?php echo $_REQUEST['fc']; ?>" />
<input type="hidden" id="di" value="<?php echo $_REQUEST['di']; ?>" /><input type="hidden" id="gi" value="<?php echo $_REQUEST['gi']; ?>" />
<input type="hidden" id="cc" value="<?php echo $_REQUEST['cc']; ?>" /><input type="hidden" id="ActThought" value="0" />
<input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="EHq" value="<?php echo $_REQUEST['EHq']; ?>" /> 
<input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="TotBValueM" value="" /><input type="hidden" id="TotCValueM" value="" />
<input type="hidden" id="MainSelTerrId" value="" /><input type="hidden" id="Sno" value="" /><input type="hidden" id="myh" value="<?php echo $_REQUEST['myh']; ?>" />
<input type="hidden" id="myt" value="<?php echo $_REQUEST['myt']; ?>" /><input type="hidden" id="HqV" value="<?php echo $_REQUEST['hq']; ?>" />
<input type="hidden" id="sgi" value="" />
<tr>
 <td colspan="5"> 	 
  <table border="0">
  <tr>
   <td>
    <table>
	<tr>
	 <td style="font-family:Times New Roman;font-size:20px;color:#FFFF80;">&nbsp;&nbsp;<b>My Sales Plan Details:</b></td>
     <td>&nbsp;</td>
<?php
$Ymin1=$_REQUEST['y']-1; $Ymin2=$_REQUEST['y']-2;
$sUpy=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$YearId, $con); $rUpy=mysql_fetch_assoc($sUpy);
$sYmin1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin1, $con); $rYmin1=mysql_fetch_assoc($sYmin1);
$sYmin2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin2, $con); $rYmin2=mysql_fetch_assoc($sYmin2);
$FUpy=date("Y",strtotime($rUpy['FromDate'])); $TUpy=date("Y",strtotime($rUpy['ToDate']));
$FYmin1=date("Y",strtotime($rYmin1['FromDate'])); $TYmin1=date("Y",strtotime($rYmin1['ToDate']));
$FYmin2=date("Y",strtotime($rYmin2['FromDate'])); $TYmin2=date("Y",strtotime($rYmin2['ToDate'])); 
?>			 
  <td>
    <select style="font-family:Georgia;font-size:14px;width:px;background-color:#E4E0FC;height:23px;width:150px;" id="YearV" onChange="ChangeYear(this.value)">
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); ?>	
<option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo 'Year-'.$fromdate.'-'.$todate; ?></option>
<?php if($_REQUEST['y']==$YearId){?><option value="<?php echo $Ymin1; ?>"><?php echo 'Year-'.$FYmin1.'-'.$TYmin1; ?></option>
<option value="<?php echo $Ymin2; ?>"><?php echo 'Year-'.$FYmin2.'-'.$TYmin2; ?></option>
<?php } elseif($_REQUEST['y']!=$YearId) { ?><option value="<?php echo $YearId; ?>"><?php echo 'Year-'.$FUpy.'-'.$TUpy; ?></option>
<?php if($_REQUEST['y']!=$Ymin1){?><option value="<?php echo $Ymin1; ?>"><?php echo 'Year-'.$FYmin1.'-'.$TYmin1; ?></option><?php } ?>
<?php if($_REQUEST['y']!=$Ymin2){?><option value="<?php echo $Ymin2; ?>"><?php echo 'Year-'.$FYmin2.'-'.$TYmin2; ?></option><?php } } ?>
</select>
   </td>
   <td></td>
    <td>
     <select style="font-family:Georgia;font-size:14px;width:px;background-color:#E4E0FC;height:23px;width:150px;" id="CropV" onChange="ChangeCrop(<?php echo $EmployeeId; ?>)">
     <option value="0" <?php if($_REQUEST['crop']==0){ echo 'selected'; } ?>>Select Crop</option>
	 <?php if($_SESSION['Vertical']==14 OR $_SESSION['Vertical']==16 OR $_SESSION['Hqv']>0){ ?>
<option value="1" <?php if($_REQUEST['crop']==1){ echo 'selected'; } ?>>Vegetable Crop</option>
<?php } if($_SESSION['Vertical']==15 OR $_SESSION['Vertical']==16 OR $_SESSION['Hqf']>0){ ?>
<option value="2" <?php if($_REQUEST['crop']==2){ echo 'selected'; }?>>Field Crop</option>
<?php } if($_SESSION['Vertical']==16 OR ($_SESSION['Hqv']>0 AND $_SESSION['Hqf']>0)){ ?>
<option value="3" <?php if($_REQUEST['crop']==3){ echo 'selected'; } ?>>ALL Crop</option>
<?php } ?>
	 </select>
   </td>
   <td></td>
	<td>
     <select id="ItemV" id="ItemV" style="font-family:Georgia;font-size:14px;width:px;background-color:#E4E0FC;height:23px;width:140px;" <?php /*?>onChange="ChangeAR(<?php echo $EmployeeId; ?>)"<?php */?> <?php //if($_REQUEST['crop']==0){echo 'disabled';} ?>>
	 <?php if($_REQUEST['ii']>0){ $sqlI1=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI1=mysql_fetch_assoc($sqlI1); ?>
	 <option value="<?php echo $_REQUEST['ii']; ?>"><?php echo strtoupper($resI1['ItemName']); ?></option>
	 <?php } else { ?><option value="0">Select Item</option><?php } ?>
	 
	 <?php if($_REQUEST['crop']>0){?>
     <?php if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem where GroupId=".$_REQUEST['crop']." order by ItemName ASC", $con); } elseif($_REQUEST['crop']==3){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); }
	 while($rI=mysql_fetch_assoc($sI)){ ?><option value="<?php echo $rI['ItemId']; ?>"><?php echo strtoupper($rI['ItemName']); ?></option><?php } ?>
	 <?php } ?>	
	 </select>
   </td>
   <td>
    <input type="button" style="font-family:Georgia;font-size:14px;background-color:#E4E0FC;height:23px;width:100px;" onClick="ChangeAR(<?php echo $EmployeeId; ?>)" value="Click">
   </td>
   <td></td>
	</tr>
	</table>
   </td>
  </tr>
   <td>
     <table border="0">  
<tr><td><span id="DealerHqSpan"></span></td></tr>
  </table>
 </td>
</tr>
<?php /***************************************** Main Page Open **************************************/ ?>
<?php $sqlCoc=mysql_query("select * from hrm_sales_planshow where PlanshowId=1",$con); $resCoc=mysql_fetch_assoc($sqlCoc); 
      $EntP=$resCoc['EntryPlan']; $RslP=$resCoc['ResultPlan']; ?>
<?php if($_REQUEST['findV']=='TT' OR $_REQUEST['findV']=='AR' OR $_REQUEST['findV']=='ZZ'){ ?>
<tr>
 <td style="width:100%;">
<?php  $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,CostCenter,HqId,Gender,Married,DR,GradeId,DesigId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmployeeID=".$_REQUEST['mainv'], $con); 
$resE=mysql_fetch_assoc($sqlE); if($resE['DR']=='Y'){$ME='Dr.';} elseif($resE['Gender']=='M'){$ME='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$ME='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$ME='Miss.';} $NameE=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
$sqlDesigE=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDesigE=mysql_fetch_assoc($sqlDesigE);
$sqlHqE = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$resE['HqId'], $con) or die(mysql_error()); $resHqE = mysql_fetch_assoc($sqlHqE); 
$sqlStE=mysql_query("select StateName from hrm_state where StateId=".$resE['CostCenter'], $con); $resStE=mysql_fetch_assoc($sqlStE); 

      $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1;
	  $sqlY1=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$BeforeYId, $con); $resY1=mysql_fetch_assoc($sqlY1); 
	  $sqlY2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resY2=mysql_fetch_assoc($sqlY2); 
	  $sqlY3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$AfterYId, $con); $resY3=mysql_fetch_assoc($sqlY3); 
	  $y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); $y1T='<font color="#A60053">Ach.</font>';
	  $y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); $y2T='<font color="#A60053">Tgt.</font>';
	  $y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Proj.</font>';
	  if($_REQUEST['crop']==1){ $ItemN='Vegetable Crop'; }elseif($_REQUEST['crop']==2){ $ItemN='Field Crop'; }elseif($_REQUEST['crop']==3){ $ItemN='All Crop'; } ?>	 
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:100%;">	
  <tr>
  <td colspan="3" align="center" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;">  
  <font color="#D7EBFF">Crop:</font>&nbsp;<?php echo $ItemN; ?></td>
  <td colspan="26" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD">
   &nbsp;<font color="#D7EBFF">Name:&nbsp;</font><?php echo $NameE; /* ?>&nbsp;&nbsp;&nbsp;<font color="#D7EBFF">Desig:&nbsp;</font><?php echo $resDesigE['DesigName']; ?>&nbsp;&nbsp;&nbsp;<font color="#D7EBFF">HQ:&nbsp;</font><?php echo $resHqE['HqName']; */ ?>&nbsp;
   &nbsp;<font color="#D7EBFF">Year:&nbsp;</font><?php echo $fromdate.'-'.$todate; ?>&nbsp;&nbsp;&nbsp;<?php if($_REQUEST['crop']==3){ ?>
 <?php $sqlSb=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusA=1", $con); $rowSb=mysql_num_rows($sqlSb); ?><input type="button" style="font-family:Times New Roman;width:100px;height:25px;font-weight:bold;" value="Final Submit" onClick="ClickFSL1(<?php echo $EmployeeId.', '.$_REQUEST['y']; ?>)" <?php if($RslP=='Y'){echo 'disabled';}else{echo '';}?>/><?php } //$rowSb>0 OR  ?>
   </td>
  </tr>
  <tr style="background-color:#D5F1D1;color:#000000;">
 <?php /*   <td align="center" style="width:50px;" rowspan="3"><b>&nbsp;</b></td>*/ ?>
    <td align="center" style="width:80px;" rowspan="3"><b>CROP</b></td>
	<td align="center" style="width:150px;" rowspan="3"><b>VARIETY</b></td>
	<td align="center" style="width:50px;" rowspan="3"><b>&nbsp;TYPE&nbsp;</b></td>
    <td colspan="4" align="center"><b>Quarter 1</b></td>
	<td colspan="4" align="center"><b>Quarter 2</b></td>
    <td colspan="4" align="center"><b>Quarter 3</b></td>
	<td colspan="4" align="center"><b>Quarter 4</b></td>
    <td colspan="4" align="center" style="background-color:#D9D9FF;"><b>TOTAL</b></td>
	<td colspan="2" rowspan="2" align="center" style="background-color:#D9D9FF;"><b>&nbsp;REVISED&nbsp;</b></td>
  </tr>	
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="2" align="center"><b>Actual</b></td>
	<td colspan="2" align="center"><b>Suggested</b></td>
    <td colspan="2" align="center"><b>Actual</b></td>
	<td colspan="2" align="center"><b>Suggested</b></td>
	<td colspan="2" align="center"><b>Actual</b></td>
	<td colspan="2" align="center"><b>Suggested</b></td>
	<td colspan="2" align="center"><b>Actual</b></td>
	<td colspan="2" align="center"><b>Suggested</b></td>
	<td colspan="2" align="center"><b>Actual</b></td>
	<td colspan="2" align="center"><b>Suggested</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php /*	<td class="Trh50"><?php echo $y1T.'<br>'.$y1; ?></td> */ ?>
	<td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
    <td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
<?php /*	<td class="Trh50"><?php echo $y1T.'<br>'.$y1; ?></td> */ ?>
	<td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
    <td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
<?php /*	<td class="Trh50"><?php echo $y1T.'<br>'.$y1; ?></td> */ ?>
	<td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
    <td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
<?php /*	<td class="Trh50"><?php echo $y1T.'<br>'.$y1; ?></td> */ ?>
	<td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
    <td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
<?php /*	<td class="Trh50"><?php echo $y1T.'<br>'.$y1; ?></td> */ ?>
	<td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
    <td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
    <td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
</tr>
<?php /*Total OPEN ************************************/ ?>

<?php
if($_SESSION['Vertical']==16 || ($_SESSION['Hqv']>0 && $_SESSION['Hqf']>0))
{ 
  $Gjoin='(d.Terr_vc=g.EmployeeID OR d.Terr_fc=g.EmployeeID)';
  $Ijoin='(d.Terr_vc=rl.EmployeeID OR d.Terr_fc=rl.EmployeeID)';
  $Wcond='d.Terr_vc='.$_REQUEST['mainv'].' OR d.Terr_fc='.$_REQUEST['mainv'];
  $Swjoin='(Terr_vc='.$_REQUEST['mainv'].' OR d.Terr_fc='.$_REQUEST['mainv'].')';
}
elseif($_SESSION['Vertical']==14 || $_SESSION['Hqv']>0)
{ 
  $Gjoin='d.Terr_vc=g.EmployeeID'; $Ijoin='d.Terr_vc=rl.EmployeeID'; $Wcond='d.Terr_vc='.$_REQUEST['mainv']; 
  $Swjoin='Terr_vc='.$_REQUEST['mainv'];
}
elseif($_SESSION['Vertical']==15 || $_SESSION['Hqf']>0)
{
 $Gjoin='d.Terr_fc=g.EmployeeID'; $Ijoin='d.Terr_fc=rl.EmployeeID'; $Wcond='d.Terr_fc='.$_REQUEST['mainv']; 
 $Swjoin='d.Terr_fc='.$_REQUEST['mainv'];
}
?>

<?php 
if($_REQUEST['findV']=='ZZ'){

if($_REQUEST['ii']>0)
{
 $sqlP2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sqlP3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  
$sqlP2ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sqlP3ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND YearId=".$AfterYId, $con);  
$sqlP2tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_area.ProductId=hrm_sales_seedsproduct.ProductId where AreaRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sqlP3tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_area.ProductId=hrm_sales_seedsproduct.ProductId where AreaRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  
$sqlP2tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_region.ProductId=hrm_sales_seedsproduct.ProductId where RegionRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sqlP3tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_region.ProductId=hrm_sales_seedsproduct.ProductId where RegionRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  
$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId where ZoneRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId where ZoneRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  

$sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Ijoin." where DealerSts='A' AND (".$Wcond." OR rl.R1=".$_REQUEST['mainv']." OR rl.R2=".$_REQUEST['mainv']." OR rl.R3=".$_REQUEST['mainv']." OR rl.R4=".$_REQUEST['mainv']." OR rl.R5=".$_REQUEST['mainv'].") AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND sd.YearId=".$_REQUEST['y'], $con);
 
$sqlBt=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Ijoin." where DealerSts='A' AND (".$Wcond." OR rl.R1=".$_REQUEST['mainv']." OR rl.R2=".$_REQUEST['mainv']." OR rl.R3=".$_REQUEST['mainv']." OR rl.R4=".$_REQUEST['mainv']." OR rl.R5=".$_REQUEST['mainv'].") AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND sd.YearId=".$AfterYId, $con); 

if($resSpEG['GradeValue']=='L1' OR $resSpEG['GradeValue']=='L2'){
$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId where ZoneEmpID=".$EmployeeId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId where ZoneEmpID=".$EmployeeId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con); 
} elseif($resSpEG['GradeValue']=='L3' OR $resSpEG['GradeValue']=='l4'){
$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_gm.ProductId=hrm_sales_seedsproduct.ProductId where GmEmpID=".$EmployeeId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_gm.ProductId=hrm_sales_seedsproduct.ProductId where GmEmpID=".$EmployeeId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con); }

}
else 
{
 if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2)
 { 
 $sqlP2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sqlP3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  
$sqlP2ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sqlP3ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  
$sqlP2tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_area.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sqlP3tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_area.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  
$sqlP2tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_region.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where RegionRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sqlP3tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_region.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where RegionRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  
$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where ZoneRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where ZoneRepEmpID=".$_REQUEST['mainv']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  
 
   $sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Ijoin." where DealerSts='A' AND (".$Wcond." OR rl.R1=".$_REQUEST['mainv']." OR rl.R2=".$_REQUEST['mainv']." OR rl.R3=".$_REQUEST['mainv']." OR rl.R4=".$_REQUEST['mainv']." OR rl.R5=".$_REQUEST['mainv'].") AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND sd.YearId=".$_REQUEST['y'], $con); 
   
   $sqlBt=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Ijoin." where DealerSts='A' AND (".$Wcond." OR rl.R1=".$_REQUEST['mainv']." OR rl.R2=".$_REQUEST['mainv']." OR rl.R3=".$_REQUEST['mainv']." OR rl.R4=".$_REQUEST['mainv']." OR rl.R5=".$_REQUEST['mainv'].") AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND sd.YearId=".$AfterYId, $con); 
   
 if($resSpEG['GradeValue']=='L1' OR $resSpEG['GradeValue']=='L2'){
$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where ZoneEmpID=".$EmployeeId." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where ZoneEmpID=".$EmployeeId." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con); 
} elseif($resSpEG['GradeValue']=='L3' OR $resSpEG['GradeValue']=='l4'){
$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_gm.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where GmEmpID=".$EmployeeId." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_gm.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where GmEmpID=".$EmployeeId." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con); }
 
   
 }
 elseif($_REQUEST['crop']==3)
 { 
   $sqlP2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
   $sqlP3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  
   $sqlP2ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
   $sqlP3ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  
   $sqlP2tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_area.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
   $sqlP3tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_area.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where AreaRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con); 
   
   $sqlP2tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_region.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where RegionRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
   $sqlP3tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_region.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where RegionRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);  
   $sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where ZoneRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
   $sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where ZoneRepEmpID=".$_REQUEST['mainv']." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con);   
   
   $sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Ijoin." where DealerSts='A' AND (".$Wcond." OR rl.R1=".$_REQUEST['mainv']." OR rl.R2=".$_REQUEST['mainv']." OR rl.R3=".$_REQUEST['mainv']." OR rl.R4=".$_REQUEST['mainv']." OR rl.R5=".$_REQUEST['mainv'].") AND (si.GroupId=1 OR si.GroupId=2) AND sp.ProductSts='A' AND sd.YearId=".$_REQUEST['y'], $con); 
   $sqlBt=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Ijoin." where DealerSts='A' AND (".$Wcond." OR rl.R1=".$_REQUEST['mainv']." OR rl.R2=".$_REQUEST['mainv']." OR rl.R3=".$_REQUEST['mainv']." OR rl.R4=".$_REQUEST['mainv']." OR rl.R5=".$_REQUEST['mainv'].") AND sp.ProductSts='A' AND (si.GroupId=1 OR si.GroupId=2) AND sd.YearId=".$AfterYId, $con); 
   
  if($resSpEG['GradeValue']=='L1' OR $resSpEG['GradeValue']=='L2'){
$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where ZoneEmpID=".$EmployeeId." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_zone.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where ZoneEmpID=".$EmployeeId." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con); 
} elseif($resSpEG['GradeValue']=='L3' OR $resSpEG['GradeValue']=='l4'){
$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_gm.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where GmEmpID=".$EmployeeId." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_gm.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where GmEmpID=".$EmployeeId." AND (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) AND hrm_sales_seedsproduct.ProductSts='A' AND YearId=".$AfterYId, $con); }
   
  }
}

$resP2t=mysql_fetch_assoc($sqlP2t); $resP3t=mysql_fetch_assoc($sqlP3t); $resP2ta=mysql_fetch_assoc($sqlP2ta); 
$resP3ta=mysql_fetch_assoc($sqlP3ta); $resP2tb=mysql_fetch_assoc($sqlP2tb); $resP3tb=mysql_fetch_assoc($sqlP3tb); $resP2tc=mysql_fetch_assoc($sqlP2tc); 
$resP3tc=mysql_fetch_assoc($sqlP3tc); $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td);
$resAt=mysql_fetch_assoc($sqlAt); $resBt=mysql_fetch_assoc($sqlBt);
//$TotPp1=$resP1t['sM1']+$resP1t['sM2']+$resP1t['sM3']; $TotPp2=$resP1t['sM4']+$resP1t['sM5']+$resP1t['sM6'];
//$TotPp3=$resP1t['sM7']+$resP1t['sM8']+$resP1t['sM9']; $TotPp4=$resP1t['sM10']+$resP1t['sM11']+$resP1t['sM12'];

$TotP2ta=$resP2t['Qa']+$resP2ta['Qa']+$resP2tb['Qa']+$resP2tc['Qa']+$resP2td['Qa']; $TotP2tb=$resP2t['Qb']+$resP2ta['Qb']+$resP2tb['Qb']+$resP2tc['Qb']+$resP2td['Qb']; 
$TotP2tc=$resP2t['Qc']+$resP2ta['Qc']+$resP2tb['Qc']+$resP2tc['Qc']+$resP2td['Qc']; $TotP2td=$resP2t['Qd']+$resP2ta['Qd']+$resP2tb['Qd']+$resP2tc['Qd']+$resP2td['Qd'];
$TotP3ta=$resP3t['Qa']+$resP3ta['Qa']+$resP3tb['Qa']+$resP3tc['Qa']+$resP3td['Qa']; $TotP3tb=$resP3t['Qb']+$resP3ta['Qb']+$resP3tb['Qb']+$resP3tc['Qb']+$resP3td['Qb'];
$TotP3tc=$resP3t['Qc']+$resP3ta['Qc']+$resP3tb['Qc']+$resP3tc['Qc']+$resP3td['Qc']; $TotP3td=$resP3t['Qd']+$resP3ta['Qd']+$resP3tb['Qd']+$resP3tc['Qd']+$resP3td['Qd'];

$Pa1t=$resAt['sM1']+$resAt['sM2']+$resAt['sM3']; $Pa2t=$resAt['sM4']+$resAt['sM5']+$resAt['sM6']; 
$Pa3t=$resAt['sM7']+$resAt['sM8']+$resAt['sM9']; $Pa4t=$resAt['sM10']+$resAt['sM11']+$resAt['sM12']; $TotAt=$Pa1t+$Pa2t+$Pa3t+$Pa4t;
$Pb1t=$resBt['sM1']+$resBt['sM2']+$resBt['sM3']; $Pb2t=$resBt['sM4']+$resBt['sM5']+$resBt['sM6']; 
$Pb3t=$resBt['sM7']+$resBt['sM8']+$resBt['sM9']; $Pb4t=$resBt['sM10']+$resBt['sM11']+$resBt['sM12']; $TotBt=$Pb1t+$Pb2t+$Pb3t+$Pb4t;

$rRevAt=mysql_fetch_assoc($sRevAt); $rRevBt=mysql_fetch_assoc($sRevBt);
$TRevAt=$rRevAt['Qa']+$rRevAt['Qb']+$rRevAt['Qc']+$rRevAt['Qd']; $TRevBt=$rRevBt['Qa']+$rRevBt['Qb']+$rRevBt['Qc']+$rRevBt['Qd'];

}

?>
   <tr style="font-size:12px;color:#000000;background-color:#FFCEB7;height:24px;">
	 <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
<?php /*	 <td align="right"><?php if($TotPp1!='' AND $TotPp1!=0){echo floatval($TotPp1);}else{echo '&nbsp;';} ?></td> */ ?> 	
<td align="right"><?php if($Pa1t!='' AND $Pa1t!=0){echo floatval($Pa1t);}else{echo '&nbsp;';} ?></td>
<td align="right"><?php if($Pb1t!='' AND $Pb1t!=0){echo floatval($Pb1t);}else{echo '&nbsp;';} ?></td>
	 <td align="right"><?php if($TotP2ta!=''){echo floatval($TotP2ta);}else{echo '&nbsp;';} ?></td>
	 <td align="right"><?php if($TotP3ta!=''){echo floatval($TotP3ta);}else{echo '&nbsp;';} ?></td>
<?php /*	 <td align="right"><?php if($TotPp2!=''){echo floatval($TotPp2);}else{echo '&nbsp;';} ?></td> */ ?> 
<td align="right"><?php if($Pa2t!='' AND $Pa2t!=0){echo floatval($Pa2t);}else{echo '&nbsp;';} ?></td>
<td align="right"><?php if($Pb2t!='' AND $Pb2t!=0){echo floatval($Pb2t);}else{echo '&nbsp;';} ?></td> 
	 <td align="right"><?php if($TotP2tb!=''){echo floatval($TotP2tb);}else{echo '&nbsp;';} ?></td>
	 <td align="right"><?php if($TotP3tb!=''){echo floatval($TotP3tb);}else{echo '&nbsp;';} ?></td>
<?php /*	 <td align="right"><?php if($TotPp3!=''){echo floatval($TotPp3);}else{echo '&nbsp;';} ?></td> */ ?> 
<td align="right"><?php if($Pa3t!='' AND $Pa3t!=0){echo floatval($Pa3t);}else{echo '&nbsp;';} ?></td>
<td align="right"><?php if($Pb3t!='' AND $Pb3t!=0){echo floatval($Pb3t);}else{echo '&nbsp;';} ?></td> 
	 <td align="right"><?php if($TotP2tc!=''){echo floatval($TotP2tc);}else{echo '&nbsp;';} ?></td>	 
	 <td align="right"><?php if($TotP3tc!=''){echo floatval($TotP3tc);}else{echo '&nbsp;';} ?></td>	
<?php /*	 <td align="right"><?php if($TotPp4!=''){echo floatval($TotPp4);}else{echo '&nbsp;';} ?></td> */ ?> 
<td align="right"><?php if($Pa4t!='' AND $Pa4t!=0){echo floatval($Pa4t);}else{echo '&nbsp;';} ?></td>
<td align="right"><?php if($Pb4t!='' AND $Pb4t!=0){echo floatval($Pb4t);}else{echo '&nbsp;';} ?></td> 		
	 <td align="right"><?php if($TotP2td!=''){echo floatval($TotP2td);}else{echo '&nbsp;';} ?></td>	 
	 <td align="right"><?php if($TotP3td!=''){echo floatval($TotP3td);}else{echo '&nbsp;';} ?></td>
<?php //$TotP1t=$TotPp1+$TotPp2+$TotPp3+$TotPp4; 
      $TotP2t=$TotP2ta+$TotP2tb+$TotP2tc+$TotP2td; $TotP3t=$TotP3ta+$TotP3tb+$TotP3tc+$TotP3td; ?>
<?php /*<td align="right"><?php if($TotP1t!=0 AND $TotP1t!=''){echo floatval($TotP1t);}else{echo '';} ?></td> */ ?>  
<td align="right"><?php if($TotAt!='' AND $TotAt!=0){echo floatval($TotAt);}else{echo '&nbsp;';} ?></td>
<td align="right"><?php if($TotBt!='' AND $TotBt!=0){echo floatval($TotBt);}else{echo '&nbsp;';} ?></td> 
	  <td align="right"><?php if($TotP2t!=0 AND $TotP2t!=''){echo floatval($TotP2t);}else{echo '&nbsp;';} ?></td>	  
	  <td align="right"><?php if($TotP3t!=0 AND $TotP3t!=''){echo floatval($TotP3t);}else{echo '&nbsp;';} ?></td>
	  
	  <td align="right"><?php if($TRevAt!=0 AND $TRevAt!=''){echo floatval($TRevAt);}else{echo '&nbsp;';} ?></td>	  
	  <td align="right"><?php if($TRevBt!=0 AND $TRevBt!=''){echo floatval($TRevBt);}else{echo '&nbsp;';} ?></td>
   </tr>	 
<?php /*Total Close **********************************/ ?>	
<?php 
if($_REQUEST['ii']>0){ $sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_seedsproduct.ProductSts='A' order by ItemName ASC, ProductName ASC, TypeName ASC", $con);}
else {
if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['crop']." AND hrm_sales_seedsproduct.ProductSts='A' order by ItemName ASC, ProductName ASC, TypeName ASC", $con); }
elseif($_REQUEST['crop']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsproduct.ProductSts='A' order by ItemName ASC, ProductName ASC, TypeName ASC", $con); } 
}

$Sn=1; while($res=mysql_fetch_array($sql)){

if($_REQUEST['findV']=='ZZ'){ 

$sqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$sqlP2a=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3a=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con);  
$sqlP2b=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3b=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$sqlP2c=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region where RegionRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3c=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region where RegionRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$sqlP2d=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone where ZoneRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3d=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone where ZoneRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 

$resP2=mysql_fetch_assoc($sqlP2); $resP3=mysql_fetch_assoc($sqlP3); $resP2a=mysql_fetch_assoc($sqlP2a); 
$resP3a=mysql_fetch_assoc($sqlP3a); $resP2b=mysql_fetch_assoc($sqlP2b); $resP3b=mysql_fetch_assoc($sqlP3b); $resP2c=mysql_fetch_assoc($sqlP2c); $resP3c=mysql_fetch_assoc($sqlP3c);
$resP2d=mysql_fetch_assoc($sqlP2d); $resP3d=mysql_fetch_assoc($sqlP3d);

//$Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']; $Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6'];
//$Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']; $Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12'];
$TotP2a=$resP2['Qa']+$resP2a['Qa']+$resP2b['Qa']+$resP2c['Qa']+$resP2d['Qa']; $TotP2b=$resP2['Qb']+$resP2a['Qb']+$resP2b['Qb']+$resP2c['Qb']+$resP2d['Qb']; 
$TotP2c=$resP2['Qc']+$resP2a['Qc']+$resP2b['Qc']+$resP2c['Qc']+$resP2d['Qc']; $TotP2d=$resP2['Qd']+$resP2a['Qd']+$resP2b['Qd']+$resP2c['Qd']+$resP2d['Qd'];
$TotP3a=$resP3['Qa']+$resP3a['Qa']+$resP3b['Qa']+$resP3c['Qa']+$resP3d['Qa']; $TotP3b=$resP3['Qb']+$resP3a['Qb']+$resP3b['Qb']+$resP3c['Qb']+$resP3d['Qb']; 
$TotP3c=$resP3['Qc']+$resP3a['Qc']+$resP3b['Qc']+$resP3c['Qc']+$resP3d['Qc']; $TotP3d=$resP3['Qd']+$resP3a['Qd']+$resP3b['Qd']+$resP3c['Qd']+$resP3d['Qd'];


$sqlA=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Ijoin." where DealerSts='A' AND (".$Wcond." OR rl.R1=".$_REQUEST['mainv']." OR rl.R2=".$_REQUEST['mainv']." OR rl.R3=".$_REQUEST['mainv']." OR rl.R4=".$_REQUEST['mainv']." OR rl.R5=".$_REQUEST['mainv'].") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); $resA=mysql_fetch_assoc($sqlA);

$sqlB=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Ijoin." where DealerSts='A' AND (".$Wcond." OR rl.R1=".$_REQUEST['mainv']." OR rl.R2=".$_REQUEST['mainv']." OR rl.R3=".$_REQUEST['mainv']." OR rl.R4=".$_REQUEST['mainv']." OR rl.R5=".$_REQUEST['mainv'].") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); $resB=mysql_fetch_assoc($sqlB);
$Pa1=$resA['sM1']+$resA['sM2']+$resA['sM3']; $Pa2=$resA['sM4']+$resA['sM5']+$resA['sM6']; 
$Pa3=$resA['sM7']+$resA['sM8']+$resA['sM9']; $Pa4=$resA['sM10']+$resA['sM11']+$resA['sM12']; $TotA=$Pa1+$Pa2+$Pa3+$Pa4;
$Pb1=$resB['sM1']+$resB['sM2']+$resB['sM3']; $Pb2=$resB['sM4']+$resB['sM5']+$resB['sM6']; 
$Pb3=$resB['sM7']+$resB['sM8']+$resB['sM9']; $Pb4=$resB['sM10']+$resB['sM11']+$resB['sM12']; $TotB=$Pb1+$Pb2+$Pb3+$Pb4;

if($resSpEG['GradeValue']=='L1' OR $resSpEG['GradeValue']=='L2'){
$sRevA=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_zone where ZoneEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sRevB=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_zone where ZoneEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
} elseif($resSpEG['GradeValue']=='L3' OR $resSpEG['GradeValue']=='l4'){
$sRevA=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_gm where GmEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sRevB=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_gm where GmEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); }
$rRevA=mysql_fetch_assoc($sRevA); $rRevB=mysql_fetch_assoc($sRevB);
}
  $TRevA=$rRevA['Q1']+$rRevA['Q2']+$rRevA['Q3']+$rRevA['Q4']; $TRevB=$rRevB['Q1']+$rRevB['Q2']+$rRevB['Q3']+$rRevB['Q4']; 
if($TotP2a!=0 OR $TotP2b!=0 OR $TotP2c!=0 OR $TotP2d!=0 OR $TotP3a!=0 OR $TotP3b!=0 OR $TotP3c!=0 OR $TotP3d!=0 OR Pa1!=0 OR $Pa2!=0 OR $Pa3!=0 OR $Pa4!=0 OR $Pb1!=0 OR $Pb2!=0 OR $Pb3!=0 OR $Pb4!=0 OR $TRevA!=0 OR $TRevB!=0){
//$Pp1!=0 OR $Pp2!=0 OR $Pp3!=0 OR $Pp4!=0 OR 
?>	

   <tr bgcolor="#EEEEEE" style="height:22px;font-size:12px;" id="TR<?php echo $Sn; ?>">  
<?php /*  <td align="center" style="width:30px;font-size:12px;"><input type="checkbox" id="Chk<?php echo $Sn; ?>" onClick="FucChk(<?php echo $Sn; ?>)" /></td> */ ?>
     <td bgcolor="#FFFFFF" style="font-size:12px;"><?php echo $res['ItemCode']; ?></td>		 
	 <td bgcolor="#FFFFFF" style="font-size:12px;"><?php echo $res['ProductName']; ?><input type="hidden" id="P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>			 							 					
<?php /*<td align="right" bgcolor="#B3D9FF" id="tD1<?php echo $Sn; ?>"><?php if($Pp1!='' AND $Pp1!=0){echo floatval($Pp1);}else{echo '&nbsp;';} ?></td> */ ?>
<td align="right" bgcolor="#FFFF9B" id="tD2<?php echo $Sn; ?>"><?php if($Pa1!='' AND $Pa1!=0){echo floatval($Pa1);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#FFFF9B" id="tD3<?php echo $Sn; ?>"><?php if($Pb1!='' AND $Pb1!=0){echo floatval($Pb1);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95" id="tD4<?php echo $Sn; ?>"><?php if($TotP2a!='' AND $TotP2a!=0){echo floatval($TotP2a);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95" id="tD5<?php echo $Sn; ?>"><?php if($TotP3a!='' AND $TotP3a!=0){echo floatval($TotP3a);}else{echo '&nbsp;';} ?></td>

<?php /*<td align="right" bgcolor="#B3D9FF" id="tD6<?php echo $Sn; ?>"><?php if($Pp2!='' AND $Pp2!=0){echo floatval($Pp2);}else{echo '&nbsp;';} ?></td> */ ?>
<td align="right" bgcolor="#FFFF9B" id="tD7<?php echo $Sn; ?>"><?php if($Pa2!='' AND $Pa2!=0){echo floatval($Pa2);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#FFFF9B" id="tD8<?php echo $Sn; ?>"><?php if($Pb2!='' AND $Pb2!=0){echo floatval($Pb2);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95" id="tD9<?php echo $Sn; ?>"><?php if($TotP2b!='' AND $TotP2b!=0){echo floatval($TotP2b);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95" id="tD10<?php echo $Sn; ?>"><?php if($TotP3b!='' AND $TotP3b!=0){echo floatval($TotP3b);}else{echo '&nbsp;';} ?></td>

<?php /*<td align="right" bgcolor="#B3D9FF" id="tD11<?php echo $Sn; ?>"><?php if($Pp3!='' AND $Pp3!=0){echo floatval($Pp3);}else{echo '&nbsp;';} ?></td> */ ?>
<td align="right" bgcolor="#FFFF9B" id="tD12<?php echo $Sn; ?>"><?php if($Pa3!='' AND $Pa3!=0){echo floatval($Pa3);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#FFFF9B" id="tD13<?php echo $Sn; ?>"><?php if($Pb3!='' AND $Pb3!=0){echo floatval($Pb3);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95" id="tD14<?php echo $Sn; ?>"><?php if($TotP2c!='' AND $TotP2c!=0){echo floatval($TotP2c);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95" id="tD15<?php echo $Sn; ?>"><?php if($TotP3c!='' AND $TotP3c!=0){echo floatval($TotP3c);}else{echo '&nbsp;';} ?></td>

<?php /*<td align="right" bgcolor="#B3D9FF" id="tD16<?php echo $Sn; ?>"><?php if($Pp4!='' AND $Pp4!=0){echo floatval($Pp4);}else{echo '&nbsp;';} ?></td> */ ?>
<td align="right" bgcolor="#FFFF9B" id="tD17<?php echo $Sn; ?>"><?php if($Pa4!='' AND $Pa4!=0){echo floatval($Pa4);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#FFFF9B" id="tD18<?php echo $Sn; ?>"><?php if($Pb4!='' AND $Pb4!=0){echo floatval($Pb4);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95" id="tD19<?php echo $Sn; ?>"><?php if($TotP2d!='' AND $TotP2d!=0){echo floatval($TotP2d);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95" id="tD20<?php echo $Sn; ?>"><?php if($TotP3d!='' AND $TotP3d!=0){echo floatval($TotP3d);}else{echo '&nbsp;';} ?></td>

<?php $TotP1=$Pp1+$Pp2+$Pp3+$Pp4; $TotP2=$TotP2a+$TotP2b+$TotP2c+$TotP2d; $TotP3=$TotP3a+$TotP3b+$TotP3c+$TotP3d; ?> 
<?php /*<td align="right" bgcolor="#B3D9FF" id="tD21<?php echo $Sn; ?>"><?php if($TotP1!=0 AND $TotP1!=''){echo floatval($TotP1);}else{echo '&nbsp;';} ?></td> */ ?>
<td align="right" bgcolor="#FFFF9B" id="tD22<?php echo $Sn; ?>"><?php if($TotA!='' AND $TotA!=0){echo floatval($TotA);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#FFFF9B" id="tD23<?php echo $Sn; ?>"><?php if($TotB!='' AND $TotB!=0){echo floatval($TotB);}else{echo '&nbsp;';} ?></td>

<td align="right" bgcolor="#CAFF95" id="tD24<?php echo $Sn; ?>"><?php if($TotP2!=0 AND $TotP2!=''){echo floatval($TotP2);}else{echo '&nbsp;';} ?>
<input type="hidden" id="TotP2_<?php echo $Sn; ?>" value="<?php if($TotP2!=0){echo floatval($TotP2);}else{echo 0;} ?>"/></td>
<td align="right" bgcolor="#CAFF95" id="tD25<?php echo $Sn; ?>"><?php if($TotP3!=0 AND $TotP3!=''){echo floatval($TotP3);}else{echo '&nbsp;';} ?>
<input type="hidden" id="TotP3_<?php echo $Sn; ?>" value="<?php if($TotP3!=0){echo floatval($TotP3);}else{echo 0;} ?>"/></td> 

<td align="right" bgcolor="#BFFFBF" id="tD24<?php echo $Sn; ?>"><?php if($TRevA!=0 AND $TRevA!=''){echo floatval($TRevA);}else{echo '&nbsp;';} ?>
<input type="hidden" id="STotP2_<?php echo $Sn; ?>" value="<?php if($TRevA!=0){echo floatval($TRevA);}else{echo 0;} ?>" /></td>
<td align="right" bgcolor="#BFFFBF" id="tD25<?php echo $Sn; ?>"><?php if($TRevB!=0 AND $TRevB!=''){echo floatval($TRevB);}else{echo '&nbsp;';} ?>
<input type="hidden" id="STotP3_<?php echo $Sn; ?>" value="<?php if($TRevB!=0){echo floatval($TRevB);}else{echo 0;} ?>" />
<input type="hidden" id="PN_<?php echo $Sn; ?>" value="<?php echo $res['ProductName']; ?>" /></td>
	</tr>	
<?php } else { ?> 
<input type="hidden" id="TotP2_<?php echo $Sn; ?>" value="0"/>
<input type="hidden" id="TotP3_<?php echo $Sn; ?>" value="0"/>
<input type="hidden" id="STotP2_<?php echo $Sn; ?>" value="0" />
<input type="hidden" id="STotP3_<?php echo $Sn; ?>" value="0" />
<input type="hidden" id="PN_<?php echo $Sn; ?>" value="<?php echo 'empty'; ?>" />
<?php } $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActualSn" value="'.$ActSn.'" />'; ?>    

<?php /********************** Overall Total Close ****************************/ ?>
</table>	     
 </td>
</tr>
  </table>
</td>

</tr>
<tr><td>&nbsp;</td></tr>
<?php } ?>
<?php /***************************************** Main Page Close **************************************/ ?>   
	 </table>
   </td>
  </tr>
<?php //*************************************************************** Close ******************************************************************************** ?>
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
           </td>
			  </tr>
	        </table>
			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		   
		  </tr>
		</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

