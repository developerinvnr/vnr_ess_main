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
.InputB{font-size:12px;width:40px;text-align:right;border:0px;background-color:#D9D9FF;} 
.Input{font-size:12px;width:40px;text-align:right;border:0px;background-color:#EEE;}
.Inputt{font-size:12px;font-family:Times New Roman;border:0px;background-color:#FFF; color:#000000;}
.Inputi{font-size:12px;width:40px;text-align:right;border:0px;background-color:#EEE;}
.TInput{font-size:12px;width:40px;text-align:right;border:0px;background-color:#FFFFA6;}
.InputBc{font-size:12px;width:50px;text-align:right;border:0px;font-weight:bold;background-color:#62B0FF;} 
.Inputc{font-size:12px;width:50px;text-align:right;border:0px;background-color:#62B0FF;}
.Trh60{text-align:center;width:40px;font-size:12px;font-weight:bold;}
.Revised{width:60px;font-weight:bold;background-color:#D7FFAE;text-align:right;}
.Revisedt{width:60px;font-weight:bold;background-color:#FFFFA6;text-align:right;}
.outerbox .innerbox { /* width:100%; */   /*DEFINES TABLES WIDTH */ width:1250px; }       
.innerbox{display:block;float:left; /*DEFINES TABLES HEIGHT*/ /*height:200px;*/ overflow-x:auto;overflow-y:auto; }
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function ChangeHq(hq,v,no)
{ window.location="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh=1&myt='+document.getElementById("myt").value+'&no='+no; 
}

function ChangeTeam(hq,v,gv)
{ window.location="SalesaEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh='+document.getElementById("myh").value+'&myt=1&no='+document.getElementById("no").value; 
}

function ChangePerMi(hq,v)
{ window.location="SalesaEntryPerMi.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh='+document.getElementById("myh").value+'&myt=1&no='+document.getElementById("no").value; 
}

function ChangeItem(ii,v)
{  
  if(ii==0 && v=='vc'){alert("please select vegitable crop item"); return false;}
  else if(ii==0 && v=='fc'){alert("please select field crop item"); return false;}
  else if(ii>0 && v=='vc'){window.location="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ii="+ii+"&vc=1&fc=0&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+'&no='+document.getElementById("no").value; }
  else if(ii>0 && v=='fc'){window.location="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ii="+ii+"&vc=0&fc=1&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+'&no='+document.getElementById("no").value; }
  else if(ii=='All_2' && v=='fc'){window.location="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ii="+ii+"&vc=0&fc=1&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+'&no='+document.getElementById("no").value; }
}

function ClickAllProd(ii,v)
{
 if(v=='ac'){window.location="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ac=1&vc=0&fc=0&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+"&ii="+ii+'&no='+document.getElementById("no").value; }
}

function ChangeYear(v)
{  
  window.location="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+'&no='+document.getElementById("no").value; 
}

function ChangeQtr(v)
{  
  window.location="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+v+"&q="+v+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+'&no='+document.getElementById("no").value;
}

function editD(sn,q,d)
{ document.getElementById(d+"EditBtn_"+sn).style.display='none'; 
  document.getElementById(d+"SaveBtn_"+sn).style.display='block';
  document.getElementById("TD"+d+"_"+sn).style.background='#FFFF00';
  for(var i=1; i<=12; i++)
  {
   document.getElementById(d+'M'+i+'_Be'+sn).style.background='#FFFFFF';
   document.getElementById(d+'M'+i+'_Ce'+sn).style.background='#FFFFFF';
  }
}

function saveD(sn,yi,di,q)
{    
  if(document.getElementById(di+'M1_Be'+sn).value==''){var n1B=0;}else{var n1B=parseFloat(document.getElementById(di+'M1_Be'+sn).value);} if(document.getElementById(di+'M2_Be'+sn).value==''){var n2B=0;}else{var n2B=parseFloat(document.getElementById(di+'M2_Be'+sn).value);} if(document.getElementById(di+'M3_Be'+sn).value==''){var n3B=0;}else{var n3B=parseFloat(document.getElementById(di+'M3_Be'+sn).value);} if(document.getElementById(di+'M4_Be'+sn).value==''){var n4B=0;}else{var n4B=parseFloat(document.getElementById(di+'M4_Be'+sn).value);} if(document.getElementById(di+'M5_Be'+sn).value==''){var n5B=0;}else{var n5B=parseFloat(document.getElementById(di+'M5_Be'+sn).value);} if(document.getElementById(di+'M6_Be'+sn).value==''){var n6B=0;}else{var n6B=parseFloat(document.getElementById(di+'M6_Be'+sn).value);} if(document.getElementById(di+'M7_Be'+sn).value==''){var n7B=0;}else{var n7B=parseFloat(document.getElementById(di+'M7_Be'+sn).value);} if(document.getElementById(di+'M8_Be'+sn).value==''){var n8B=0;}else{var n8B=parseFloat(document.getElementById(di+'M8_Be'+sn).value);} if(document.getElementById(di+'M9_Be'+sn).value==''){var n9B=0;}else{var n9B=parseFloat(document.getElementById(di+'M9_Be'+sn).value);} if(document.getElementById(di+'M10_Be'+sn).value==''){var n10B=0;}else{var n10B=parseFloat(document.getElementById(di+'M10_Be'+sn).value);} if(document.getElementById(di+'M11_Be'+sn).value==''){var n11B=0;}else{var n11B=parseFloat(document.getElementById(di+'M11_Be'+sn).value);} if(document.getElementById(di+'M12_Be'+sn).value==''){var n12B=0;}else{var n12B=parseFloat(document.getElementById(di+'M12_Be'+sn).value);}
  
  if(document.getElementById(di+'M1_Ce'+sn).value==''){var n1C=0;}else{var n1C=parseFloat(document.getElementById(di+'M1_Ce'+sn).value);} if(document.getElementById(di+'M2_Ce'+sn).value==''){var n2C=0;}else{var n2C=parseFloat(document.getElementById(di+'M2_Ce'+sn).value);} if(document.getElementById(di+'M3_Ce'+sn).value==''){var n3C=0;}else{var n3C=parseFloat(document.getElementById(di+'M3_Ce'+sn).value);} if(document.getElementById(di+'M4_Ce'+sn).value==''){var n4C=0;}else{var n4C=parseFloat(document.getElementById(di+'M4_Ce'+sn).value);} if(document.getElementById(di+'M5_Ce'+sn).value==''){var n5C=0;}else{var n5C=parseFloat(document.getElementById(di+'M5_Ce'+sn).value);} if(document.getElementById(di+'M6_Ce'+sn).value==''){var n6C=0;}else{var n6C=parseFloat(document.getElementById(di+'M6_Ce'+sn).value);} if(document.getElementById(di+'M7_Ce'+sn).value==''){var n7C=0;}else{var n7C=parseFloat(document.getElementById(di+'M7_Ce'+sn).value);} if(document.getElementById(di+'M8_Ce'+sn).value==''){var n8C=0;}else{var n8C=parseFloat(document.getElementById(di+'M8_Ce'+sn).value);} if(document.getElementById(di+'M9_Ce'+sn).value==''){var n9C=0;}else{var n9C=parseFloat(document.getElementById(di+'M9_Ce'+sn).value);} if(document.getElementById(di+'M10_Ce'+sn).value==''){var n10C=0;}else{var n10C=parseFloat(document.getElementById(di+'M10_Ce'+sn).value);} if(document.getElementById(di+'M11_Ce'+sn).value==''){var n11C=0;}else{var n11C=parseFloat(document.getElementById(di+'M11_Ce'+sn).value);} if(document.getElementById(di+'M12_Ce'+sn).value==''){var n12C=0;}else{var n12C=parseFloat(document.getElementById(di+'M12_Ce'+sn).value);} 
    
  var TotB=document.getElementById("TotBValueM").value=Math.round((n1B+n2B+n3B+n4B+n5B+n6B+n7B+n8B+n9B+n10B+n11B+n12B)*100)/100; var TotC=document.getElementById("TotCValueM").value=Math.round((n1C+n2C+n3C+n4C+n5C+n6C+n7C+n8C+n9C+n10C+n11C+n12C)*100)/100; document.getElementById("Sno").value=sn; document.getElementById("DealerId").value=di; 
  
  var url = 'SlctSalesProdDeal.php';  var pars = 'Action=AddMonth&p='+document.getElementById(di+'P_'+sn).value+'&e='+document.getElementById('EmpId').value+'&m1B='+n1B+'&m2B='+n2B+'&m3B='+n3B+'&m4B='+n4B+'&m5B='+n5B+'&m6B='+n6B+'&m7B='+n7B+'&m8B='+n8B+'&m9B='+n9B+'&m10B='+n10B+'&m11B='+n11B+'&m12B='+n12B+'&m1C='+n1C+'&m2C='+n2C+'&m3C='+n3C+'&m4C='+n4C+'&m5C='+n5C+'&m6C='+n6C+'&m7C='+n7C+'&m8C='+n8C+'&m9C='+n9C+'&m10C='+n10C+'&m11C='+n11C+'&m12C='+n12C+'&TotB='+TotB+'&TotC='+TotC+'&yi='+yi+'&di='+di+'&sn='+sn+'&hi='+document.getElementById('hq').value+'&TerId='+document.getElementById('TerId').value+'&q='+q+'&ii='+document.getElementById('ii').value+'&Reporting='+document.getElementById('Reporting').value; 
 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_AddMonth });  
}

function show_AddMonth(originalRequest)
{ document.getElementById('AddMonthResult').innerHTML = originalRequest.responseText; 
  var Sno=document.getElementById('Sno').value; var di=document.getElementById('DealerId').value; 
  var q=document.getElementById('q').value; var ii=document.getElementById('ii').value;
  //var TotalA=document.getElementById(di+'TotP1d_'+Sno).value=document.getElementById('TotAValueM').value; 
  var TotalB=document.getElementById(di+'TotP2d_'+Sno).value=document.getElementById('TotBValueM').value;   
  var TotalC=document.getElementById(di+'TotP3d_'+Sno).value=document.getElementById('TotCValueM').value; 
  
  for(var i=1; i<=12; i++)
  {
   document.getElementById(di+'M'+i+'_Be'+Sno).style.background='#B6FF6C';
   document.getElementById(di+'M'+i+'_Ce'+Sno).style.background='#B6FF6C';
  }
  
	if(ii!='All_1' && ii!='All_2')
    { 
	 
	 document.getElementById(di+'M1_BeT').value=document.getElementById("Tot21").value; document.getElementById(di+'M2_BeT').value=document.getElementById("Tot22").value; document.getElementById(di+'M3_BeT').value=document.getElementById("Tot23").value; document.getElementById(di+'M4_BeT').value=document.getElementById("Tot24").value; document.getElementById(di+'M5_BeT').value=document.getElementById("Tot25").value; document.getElementById(di+'M6_BeT').value=document.getElementById("Tot26").value; document.getElementById(di+'M7_BeT').value=document.getElementById("Tot27").value; document.getElementById(di+'M8_BeT').value=document.getElementById("Tot28").value; document.getElementById(di+'M9_BeT').value=document.getElementById("Tot29").value; document.getElementById(di+'M10_BeT').value=document.getElementById("Tot210").value; document.getElementById(di+'M11_BeT').value=document.getElementById("Tot211").value; document.getElementById(di+'M12_BeT').value=document.getElementById("Tot212").value; 
	 	 
     document.getElementById(di+'M1_CeT').value=document.getElementById("Tot31").value; document.getElementById(di+'M2_CeT').value=document.getElementById("Tot32").value; document.getElementById(di+'M3_CeT').value=document.getElementById("Tot33").value; document.getElementById(di+'M4_CeT').value=document.getElementById("Tot34").value; document.getElementById(di+'M5_CeT').value=document.getElementById("Tot35").value; document.getElementById(di+'M6_CeT').value=document.getElementById("Tot36").value; document.getElementById(di+'M7_CeT').value=document.getElementById("Tot37").value; document.getElementById(di+'M8_CeT').value=document.getElementById("Tot38").value; document.getElementById(di+'M9_CeT').value=document.getElementById("Tot39").value; document.getElementById(di+'M10_CeT').value=document.getElementById("Tot310").value; document.getElementById(di+'M11_CeT').value=document.getElementById("Tot311").value; document.getElementById(di+'M12_CeT').value=document.getElementById("Tot312").value;
	 
	 document.getElementById(di+'TotM_BeT').value=document.getElementById("TTot2").value;  
	 document.getElementById(di+'TotM_CeT').value=document.getElementById("TTot3").value;
	 /* SalesEntry_Hide.php */
	 
	 }	
  document.getElementById(di+"EditBtn_"+Sno).style.display='block'; 
  document.getElementById(di+"SaveBtn_"+Sno).style.display='none'; 
  document.getElementById("TD"+di+"_"+Sno).style.background='#FFFFFF';
}


function ClickFSL1(e,y)
{
  var ActSn=document.getElementById("ActualSn").value;
  if(ActSn>0)
  {
   for(var i=1; i<=ActSn; i++)
   { 
     var va1=parseFloat(document.getElementById("TotP2_"+i).value); 
     var va2=parseFloat(document.getElementById("STotP2_"+i).value);
	 var vb1=parseFloat(document.getElementById("TotP3_"+i).value); 
	 var vb2=parseFloat(document.getElementById("STotP3_"+i).value);  
	 if(va1<va2){alert("Please check product value, your product value equal or more then from reporting values"); return false;}
	 if(vb1<vb2){alert("Please check product value, your product value equal or more then from reporting values"); return false;}
   }
  } 
  var win = window.open("SbOpenaFile.php?CheckAct=Fsb1&y="+y+"&e="+e,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=620,height=300");
  var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+y+"&q="+document.getElementById("q").value+"&ii=0&vc=0&fc=0&ac=1&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh=1&myt='+document.getElementById("myt").value; } }, 1000);
}

function FunChk(sn)
{ 
 if(document.getElementById("FChk"+sn).checked==true)
 { document.getElementById("Tr"+sn).style.background='#FFAAFF';
   for(var i=1; i<=12; i++)
   {
	document.getElementById("M"+i+"_D"+sn).style.background='#FFAAFF';
	document.getElementById("M"+i+"_A"+sn).style.background='#FFAAFF';
	document.getElementById("M"+i+"_B"+sn).style.background='#FFAAFF';
	document.getElementById("M"+i+"_C"+sn).style.background='#FFAAFF';
   }
  }
  else
  { document.getElementById("Tr"+sn).style.background='#EEEEEE';
    for(var i=1; i<=12; i++)
	{
	document.getElementById("M"+i+"_D"+sn).style.background='#EEEEEE';
	document.getElementById("M"+i+"_A"+sn).style.background='#EEEEEE';
	document.getElementById("M"+i+"_B"+sn).style.background='#EEEEEE';
	document.getElementById("M"+i+"_C"+sn).style.background='#EEEEEE';
	}
  }  
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
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //******************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
				 <td colspan="2" width="100%" valign="top">
				  <table border="0">
<?php //*************************** Start ****************************************** ?>		
<?php $SpP=mysql_query("select GradeId,DepartmentId,HqId,RepEmployeeID from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSpP=mysql_fetch_assoc($SpP); ?>		
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="act" value="<?php echo $_REQUEST['act']; ?>" /><input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" /><input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" /><input type="hidden" name="vc" id="vc" value="<?php echo $_REQUEST['vc']; ?>" /><input type="hidden" name="fc" id="fc" value="<?php echo $_REQUEST['fc']; ?>" /><input type="hidden" id="di" value="<?php echo $_REQUEST['di']; ?>" /><input type="hidden" id="gi" value="<?php echo $_REQUEST['gi']; ?>" /><input type="hidden" id="cc" value="<?php echo $_REQUEST['cc']; ?>" /><input type="hidden" id="ActThought" value="0" /><input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="EHq" value="<?php echo $_REQUEST['EHq']; ?>" /> <input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="TotBValueM" value="" /><input type="hidden" id="TotCValueM" value="" /><input type="hidden" id="DealerId" value="" /><input type="hidden" id="Sno" value="" /><input type="hidden" id="SelTerr" value="<?php echo $_REQUEST['SelTerr']; ?>" /><input type="hidden" id="myh" value="<?php echo $_REQUEST['myh']; ?>" /><input type="hidden" id="Reporting" value="<?php echo $resSpP['RepEmployeeID']; ?>" /><input type="hidden" id="myt" value="<?php echo $_REQUEST['myt']; ?>" /><input type="hidden" id="HqV" value="<?php echo $_REQUEST['hq']; ?>" />
<?php $SpP=mysql_query("select Fname,Sname,Lname,GradeId,DepartmentId,HqId,Gender,DR,Married from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$EmployeeId, $con);  $resSpP=mysql_fetch_assoc($SpP); $SpPDept=$resSpP['DepartmentId']; $SpGradeP=$resSpP['GradeId']; 
if($resSpP['DR']=='Y'){$Me='Dr.';} elseif($resSpP['Gender']=='M'){$Me='Mr.';} elseif($resSpP['Gender']=='F' AND $resSpP['Married']=='Y'){$Me='Mrs.';} elseif($resSpP['Gender']=='F' AND $resSpP['Married']=='N'){$Me='Miss.';} 
$SpEGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$resSpP['GradeId']." AND CompanyId=".$CompanyId, $con); $resSpEGr=mysql_fetch_assoc($SpEGr);
$sqlCPerMi=mysql_query("select EditPerMi from hrm_sales_reporting_level where EmployeeID=".$EmployeeId,$con); $resCPerMi=mysql_fetch_assoc($sqlCPerMi); $sHq2=mysql_query("select HqId from hrm_sales_hq_temp where EmployeeID=".$EmployeeId." AND HqId!=".$resSpP['HqId'], $con); $rowHq2=mysql_num_rows($sHq2);
      echo '<input type="hidden" id="Rowhq2" value="'.$rowHq2.'" />';
      if($rowHq2==1){$resHq2=mysql_fetch_assoc($sHq2); echo '<input type="hidden" id="h1q" value="'.$resHq2['HqId'].'" />';}
?><input type="hidden" id="no" value="<?php echo $_REQUEST['no']; ?>" />
<tr>
 <td colspan="5"> 	 
  <table border="0">
  <tr>
   <td>
     <table border="0">
	  <tr>
	   <td>
	    <table border="0">
		 <tr>	
		 <td>
		 <table>
		  <tr>
<td align="center"><img src="images/PlannerA.png" border="0" style="height:40px;width:150px;"/></td>
<td>&nbsp;</td>
<?php $sHq=mysql_query("select hrm_sales_hq_temp.HqId,HqName from hrm_sales_hq_temp INNER JOIN hrm_headquater ON hrm_sales_hq_temp.HqId=hrm_headquater.HqId where hrm_sales_hq_temp.EmployeeID=".$EmployeeId." AND hrm_sales_hq_temp.HqTEmpStatus='A' order by HqName ASC", $con); $rowHq=mysql_num_rows($sHq); if($rowHq>0){ ?>
<td align="center" valign="bottom">
<?php $sn=1; while($resHq=mysql_fetch_assoc($sHq)){ ?>
<a href="#" onClick="ChangeHq(<?php echo $resHq['HqId'].', '.$_REQUEST['y'].','.$sn; ?>)" style="text-decoration:none;">
 <font style="color:<?php if($_REQUEST['no']==$sn){echo '#fff';}else{echo '#FF8000';} ?>;font-family:Times New Roman;font-size:16px;font-weight:bold;">
 <u><?php echo $resHq['HqName']; ?></u>
 </font>&nbsp;&nbsp;
</a>
<?php $sn++; } ?>
</td>
<?php } ?>

<?php if($_REQUEST['act']>0){ ?>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangeTeam(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>,'<?php echo $resSpEGr['GradeValue']; ?>')"><img src="images/Myteam.png" border="0" style="height:30px;width:130px;"  /></a>
</td>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangePerMi(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>)"><img src="images/Permission.png" border="0" style="height:30px;width:130px;"  /></a>
</td>
<?php } ?> 		  
		  </tr>
		 </table>
		 </td>
		 </tr>
		 <tr>	
		 <td>
		 <table>
		  <tr>
<td>&nbsp;</td>		
<input type="hidden" id="TerId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="HqV" value=<?php echo $_REQUEST['hq']; ?> />
<input type="hidden" id="CheckEntry" value="O" />
<?php  $sqlL=mysql_query("select R1,R2,R3,R4,R5 from hrm_sales_reporting_level where EmployeeID=".$EmployeeId, $con); 
$resL=mysql_fetch_assoc($sqlL);
echo '<input type="hidden" id="L1" value="'.$resL['R1'].'" />'; 
echo '<input type="hidden" id="L2" value="'.$resL['R2'].'" />'; 
echo '<input type="hidden" id="L3" value="'.$resL['R3'].'" />'; 
echo '<input type="hidden" id="L4" value="'.$resL['R4'].'" />'; 
echo '<input type="hidden" id="L5" value="'.$resL['R5'].'" />';

$Ymin1=$_REQUEST['y']-1; $Ymin2=$_REQUEST['y']-2;
$sUpy=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$YearId, $con); 
$sYmin1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin1, $con); 
$sYmin2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin2, $con); 
$rUpy=mysql_fetch_assoc($sUpy); $rYmin1=mysql_fetch_assoc($sYmin1); $rYmin2=mysql_fetch_assoc($sYmin2);
$FUpy=date("Y",strtotime($rUpy['FromDate'])); $TUpy=date("Y",strtotime($rUpy['ToDate']));
$FYmin1=date("Y",strtotime($rYmin1['FromDate'])); $TYmin1=date("Y",strtotime($rYmin1['ToDate']));
$FYmin2=date("Y",strtotime($rYmin2['FromDate'])); $TYmin2=date("Y",strtotime($rYmin2['ToDate']));
if($_REQUEST['hq']>0){
?>

	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;color:#FFFFC6;" valign="bottom">Year :</b><select style="font-family:Times New Roman;font-size:14px;width:90px;background-color:#E4E0FC;height:23px;font-weight:bold;" id="YearV" onChange="ChangeYear(this.value)">
<?php $sqlye=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resye=mysql_fetch_assoc($sqlye); $FFromDate=date("Y",strtotime($resye['FromDate'])); $TToDate=date("Y",strtotime($resye['ToDate'])); ?><option value="<?php echo $resye['YearId']; ?>" selected><?php echo $FFromDate.'-'.$TToDate; ?></option>
<?php if($_REQUEST['y']==$YearId){?><option value="<?php echo $Ymin1; ?>"><?php echo $FYmin1.'-'.$TYmin1; ?></option>
<option value="<?php echo $Ymin2; ?>"><?php echo $FYmin2.'-'.$TYmin2; ?></option><?php } elseif($_REQUEST['y']!=$YearId) { ?><option value="<?php echo $YearId; ?>"><?php echo $FUpy.'-'.$TUpy; ?></option><?php if($_REQUEST['y']!=$Ymin1){?><option value="<?php echo $Ymin1; ?>"><?php echo $FYmin1.'-'.$TYmin1; ?></option><?php } ?><?php if($_REQUEST['y']!=$Ymin2){?><option value="<?php echo $Ymin2; ?>"><?php echo $FYmin2.'-'.$TYmin2; ?></option><?php } } ?>
</select>		
	</td>
	<input type="hidden" id="QtrV" value="0" />
	<?php /*
	<td style="color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;" valign="bottom">Quarter :</b><select style="font-family:Times New Roman;font-size:14px;width:80px;background-color:#E4E0FC;height:23px;font-weight:bold;" id="QtrV" onChange="ChangeQtr(this.value)"><option value="<?php echo $_REQUEST['q']; ?>" selected><?php echo 'Qtr-0'.$_REQUEST['q']; ?></option> 
<?php if($_REQUEST['q']==1){ ?>
   <option value="2">Qtr-02</option><option value="3">Qtr-03</option><option value="4">Qtr-04</option>
<?php } elseif($_REQUEST['q']==2){ ?>
   <option value="3">Qtr-03</option><option value="4">Qtr-04</option><option value="1">Qtr-01</option>
<?php } elseif($_REQUEST['q']==3){ ?>
   <option value="4">Qtr-04</option><option value="1">Qtr-01</option><option value="2">Qtr-02</option>
<?php } elseif($_REQUEST['q']==4){ ?>
   <option value="1">Qtr-01</option><option value="2">Qtr-02</option><option value="3">Qtr-03</option>
<?php } ?></select>  
    </td>
	<td>&nbsp;</td>
	*/ ?>
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;color:#FFFFC6;" valign="bottom">VC :</b><select style="font-family:Times New Roman;font-size:14px;width:140px;background-color:#C4FFC4;height:23px;font-weight:bold;" id="ItemV" onChange="ChangeItem(this.value,'vc')"><?php if($_REQUEST['vc']!=0){$sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI);?>	
    <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option><?php }else{ ?><option value="0" selected>SELECT</option><?php } ?><?php $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con); while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } /* ?><option value="All_1"> --- All ---</option><?php */ ?></select><input type="hidden" id="ValueItem" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="ValueName" value="<?php if($_REQUEST['vc']>0){echo 'vc';}elseif($_REQUEST['fc']>0){echo 'fc';} ?>" />	
    </td>
	<td>&nbsp;</td>
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;color:#FFFFC6;" valign="bottom">FC :</b><select style="font-family:Times New Roman;font-size:14px;width:140px;background-color:#C4FFC4;height:23px;font-weight:bold;" id="ItemV2" onChange="ChangeItem(this.value,'fc')"><?php if($_REQUEST['fc']!=0 AND $_REQUEST['ii']!='All_2'){$sqlIf=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resIf=mysql_fetch_assoc($sqlIf);?><option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resIf['ItemName']); ?></option><?php } elseif($_REQUEST['fc']!=0 AND $_REQUEST['ii']=='All_2'){?><option value="<?php echo $_REQUEST['ii']; ?>" selected>--- All ---</option><?php } else{ ?><option value="0" selected>SELECT</option><?php } ?><?php $sqlItemf=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con); while($resItemf=mysql_fetch_assoc($sqlItemf)){ ?> 
 <option value="<?php echo $resItemf['ItemId']; ?>"><?php echo $resItemf['ItemName']; ?></option><?php } ?><option value="All_2"> --- All ---</option></select>
   </td>
   <?php /*
   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;" valign="bottom">&nbsp;<a href="#" onClick="ClickAllProd(0,'ac')" style="color:#FFFF80">Over All-Crop/All-Dealer</a></td> */ ?>
 <?php } ?> 		  
		  </tr>
		 </table>
		 </td>
       </tr>
 </table>
	   </td>
	  </tr>
<tr><td><span id="DealerHqSpan"></span></td></tr>
  </table>
 </td>
</tr>
<?php /***************************************** Main Page Open **************************************/ ?>
<?php $sqlCoc=mysql_query("select * from hrm_sales_planshow where PlanshowId=1",$con); 
      $resCoc=mysql_fetch_assoc($sqlCoc); $EntP=$resCoc['EntryPlan']; $RslP=$resCoc['ResultPlan']; ?>
<?php if($_REQUEST['hq']>0){ //if($_REQUEST['act']==0){ 
$sqlSt=mysql_query("select StateId from hrm_headquater where HqId=".$_REQUEST['hq'], $con); 
$resSt=mysql_fetch_assoc($sqlSt);
?>

<tr>
 <td>
<?php $sql = mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'], $con); 
      $res=mysql_fetch_array($sql); 
	  $Before2YId=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1;
	  $sqlY0=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Before2YId, $con); 
	  $sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con); 
	  $sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); 
	  $sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); 
	  $resY0=mysql_fetch_assoc($sqlY0);  $resY1=mysql_fetch_assoc($sqlY1);  $resY2=mysql_fetch_assoc($sqlY2); 
	  $resY3=mysql_fetch_assoc($sqlY3);
	  $y0=date("y",strtotime($resY0['FromDate'])).'-'.date("y",strtotime($resY0['ToDate'])); 
	  $y0T='<font color="#A60053">Ach.</font>'; 
	  $y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); 
	  $y1T='<font color="#A60053">Ach.</font>';
	  $y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); 
	  $y2T='<font color="#A60053">Tgt.</font>';
	  $y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); 
	  $y3T='<font color="#A60053">Proj.</font>';
	  if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ $ItemN='All Crop'; }
	  else{ $sqlItem = mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); 
	  $resItem=mysql_fetch_assoc($sqlItem); $ItemN=$resItem['ItemName']; 
	  $sqlSubEmp = mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusA=1", $con); $rowSubEmp=mysql_num_rows($sqlSubEmp); }    

$sqlRpt=mysql_query("select g.EmployeeID from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where g.DepartmentId=6 AND e.EmpStatus='A' AND g.RepEmployeeID=".$EmployeeId,$con); $rowRpt=mysql_num_rows($sqlRpt); ?>	 
      <input type="hidden" name="rowSubEmp" id="rowSubEmp" value="<?php echo $rowSubEmp; ?>" />
	  <input type="hidden" name="VDealer" id="VDealer" value="<?php echo strtoupper($res['DealerName']); ?>" readonly/>
	  <input type="hidden" name="DealerId" id="DealerId" value="<?php echo $_POST['DealIdE']; ?>" />
	  <input type="hidden" name="DealerCity" id="DealerCity" value="<?php echo $res['DealerCity']; ?>" />
	  <input type="hidden" name="ni" id="ni" value="<?php echo $_POST['ni']; ?>" />
<div class="outerbox">
<div class="innerbox">	  
<table class="bluetable" border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){echo '1300px';}else{echo '1200px';}?>;">	
  <tr>
  <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){echo 3;}else{echo 2;}?>" align="center" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>">  <font color="#D7EBFF">Crop:</font>&nbsp;<?php echo $ItemN; ?>
  </td>
  <td colspan="60" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>">
   &nbsp;<font color="#D7EBFF">Head Quarter:&nbsp;</font><?php echo $res['HqName']; ?>&nbsp;&nbsp;&nbsp;
   <?php /* &nbsp;<font color="#D7EBFF">Quarter:&nbsp;</font><?php echo '0'.$_REQUEST['q']; ?>&nbsp;&nbsp;&nbsp;*/ ?>
   &nbsp;<font color="#D7EBFF">Year:&nbsp;</font><?php echo $FFromDate.'-'.$TToDate; //$fromdate.'-'.$todate; ?>
   &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="javascript:window.location='SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $_REQUEST['act']; ?>&hq=<?php echo $_REQUEST['hq']; ?>&y=<?php echo $_REQUEST['y']; ?>&q=<?php echo $_REQUEST['q']; ?>&ii=<?php echo $_REQUEST['ii']; ?>&vc=<?php echo $_REQUEST['vc']; ?>&fc=<?php echo $_REQUEST['fc']; ?>&cc=<?php echo $_REQUEST['cc']; ?>&di=<?php echo $_REQUEST['di']; ?>&gi=<?php echo $_REQUEST['gi']; ?>&EHq=<?php echo $_REQUEST['EHq']; ?>&myh=<?php echo $_REQUEST['myh']; ?>&myt=<?php echo $_REQUEST['myt']; ?>&no=<?php echo $_REQUEST['no']; ?>'" style="color:#FFFFFF;font-size:12px;">Refresh</a>   
   &nbsp;&nbsp;&nbsp;
   <?php if($_REQUEST['ac']==1)
   { 
   $sqlSb=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusA=1", $con); $rowSb=mysql_num_rows($sqlSb); ?><input type="button" style="font-family:Times New Roman;width:100px;height:25px;font-weight:bold;" value="Final Submit" onClick="ClickFSL1(<?php echo $EmployeeId.', '.$_REQUEST['y']; ?>)" <?php if($rowSb>0){echo 'disabled';}else{echo '';}?>/>
<?php } ?>
   </td>
  </tr>
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){echo 3;}else{echo 2;}?>" align="center" style="font-size:16px;color:#FFFFFF;background-color:#183E83;">
<b><?php echo "ALL DEALER"; ?></b> </td><td colspan="5" align="center"><b>APRIL</b></td><td colspan="4" align="center"><b>MAY</b></td><td colspan="4" align="center"><b>JUNE</b></td><td colspan="4" align="center"><b>JULY</b></td><td colspan="4" align="center"><b>AUGUST</b></td><td colspan="4" align="center"><b>SEPTEMBER</b></td><td colspan="4" align="center"><b>OCTOBER</b></td><td colspan="4" align="center"><b>NOVEMBER</b></td><td colspan="4" align="center"><b>DECEMBER</b></td><td colspan="4" align="center"><b>JANUARY</b></td><td colspan="4" align="center"><b>FEBRUARY</b></td><td colspan="4" align="center"><b>MARCH</b></td>
<td colspan="4" align="center" style="background-color:#D9D9FF;"><b>TOTAL</b></td>
<td colspan="2" align="center" style="background-color:#D7FFAE;"><b>REVISED</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ ?>   
    <td align="center" style="width:100px;font-size:12px;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="width:120px;font-size:12px;"><b>VARIETY</b></td>
	<td align="center" style="width:30px;font-size:12px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td></td>
	<?php for($i=1;$i<=13;$i++){?>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td>
	<td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<?php if($RslP=='Y'){ ?><td class="Trh60"><?php echo $y1T.'<br>'.$y2; ?></td><?php } ?>
	<?php if($EntP=='Y'){ ?><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><?php } ?>
	<?php } ?>
	<td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
   </tr>	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ii']!=0){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} 
	  elseif($_REQUEST['ii']==0 AND $_REQUEST['ac']==1){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where (si.GroupId=1 OR si.GroupId=2) order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} 
	  
 $Sn=1; while($res=mysql_fetch_array($sql)){ 
 $sqlP0=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND d.HqId=".$_REQUEST['hq']." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$Before2YId, $con); $resP0=mysql_fetch_assoc($sqlP0);
 $sqlP1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND d.HqId=".$_REQUEST['hq']." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$BeforeYId, $con); $resP1=mysql_fetch_assoc($sqlP1);
 $sqlP2=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND d.HqId=".$_REQUEST['hq']." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 
 $resP2=mysql_fetch_assoc($sqlP2);
 $sqlP2ch=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND d.HqId=".$_REQUEST['hq']." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); $resP2ch=mysql_fetch_assoc($sqlP2ch);
 $sqlP3=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND d.HqId=".$_REQUEST['hq']." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); $resP3=mysql_fetch_assoc($sqlP3); 
    
$sChk=mysql_query("select * from hrm_sales_arrange_prod where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND StateId=".$resSt['StateId'], $con); $rowChkP=mysql_fetch_assoc($sChk);
if($RslP=='Y'){ $a1=$resP2ch['sM1']; $a2=$resP2ch['sM2']; $a3=$resP2ch['sM3']; $a4=$resP2ch['sM4']; $a5=$resP2ch['sM5']; $a6=$resP2ch['sM6']; $a7=$resP2ch['sM7']; $a8=$resP2ch['sM8']; $a9=$resP2ch['sM9']; $a10=$resP2ch['sM10']; $a11=$resP2ch['sM11']; $a12=$resP2ch['sM12']; } 
if($EntP=='Y'){ $a1=$resP3['sM1']; $a2=$resP3['sM2']; $a3=$resP3['sM3']; $a4=$resP3['sM4']; $a5=$resP3['sM5']; $a6=$resP3['sM6']; $a7=$resP3['sM7']; $a8=$resP3['sM8']; $a9=$resP3['sM9']; $a10=$resP3['sM10']; $a11=$resP3['sM11']; $a12=$resP3['sM12']; } 	  

if($rowChkP>0 OR $resP0['sM1']!=0 OR $resP0['sM2']!=0 OR $resP0['sM3']!=0 OR $resP0['sM4']!=0 OR $resP0['sM5']!=0 OR $resP0['sM6']!=0 OR $resP0['sM7']!=0 OR $resP0['sM8']!=0 OR $resP0['sM9']!=0 OR $resP0['sM10']!=0 OR $resP0['sM11']!=0 OR $resP0['sM12']!=0 OR $resP1['sM1']!=0 OR $resP1['sM2']!=0 OR $resP1['sM3']!=0 OR $resP1['sM4']!=0 OR $resP1['sM5']!=0 OR $resP1['sM6']!=0 OR $resP1['sM7']!=0 OR $resP1['sM8']!=0 OR $resP1['sM9']!=0 OR $resP1['sM10']!=0 OR $resP1['sM11']!=0 OR $resP1['sM12']!=0 OR $resP2['sM1']!=0 OR $resP2['sM2']!=0 OR $resP2['sM3']!=0 OR $resP2['sM4']!=0 OR $resP2['sM5']!=0 OR $resP2['sM6']!=0 OR $resP2['sM7']!=0 OR $resP2['sM8']!=0 OR $resP2['sM9']!=0 OR $resP2['sM10']!=0 OR $resP2['sM11']!=0 OR $resP2['sM12']!=0 OR $a1!=0 OR $a2!=0 OR $a3!=0 OR $a4!=0 OR $a5!=0 OR $a6!=0 OR $a7!=0 OR $a8!=0 OR $a9!=0 OR $a10!=0 OR $a11!=0 OR $a12!=0){
 
?>	  
   <tr bgcolor="#EEEEEE" style="height:22px;" id="Tr<?php echo $Sn; ?>">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ ?>	  
<td bgcolor="#FFFFFF"><input class="Inputt" style="width:100px;" value="<?php echo $res['ItemName']; ?>" /></td>
<?php } ?>		 
<td bgcolor="#FFFFFF"><input class="Inputt" style="width:120px;" value="<?php echo $res['ProductName']; ?>" /><input type="hidden" id="P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
<td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>
<td align="center" class="Trh60"><input type="checkbox" id="FChk<?php echo $Sn; ?>" onClick="FunChk(<?php echo $Sn; ?>)" /></td> 	
<td><input class="Input" id="M1_D<?php echo $Sn; ?>" value="<?php if($resP0['sM1']!='' AND $resP0['sM1']!=0){echo floatval($resP0['sM1']);}?>" readonly/></td>
<td><input class="Input" id="M1_A<?php echo $Sn; ?>" value="<?php if($resP1['sM1']!='' AND $resP1['sM1']!=0){echo floatval($resP1['sM1']);}?>" readonly/></td>
<td><input class="Input" id="M1_B<?php echo $Sn; ?>" value="<?php if($resP2['sM1']!='' AND $resP2['sM1']!=0){echo floatval($resP2['sM1']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" id="M1_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM1']!=0){echo floatval($resP2ch['sM1']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M1_C<?php echo $Sn; ?>" value="<?php if($resP3['sM1']!='' AND $resP3['sM1']!=0){echo floatval($resP3['sM1']);}?>" readonly/></td><?php } ?>	  

<td><input class="Input" id="M2_D<?php echo $Sn; ?>" value="<?php if($resP0['sM2']!='' AND $resP0['sM2']!=0){echo floatval($resP0['sM2']);}?>" readonly/></td>
<td><input class="Input" id="M2_A<?php echo $Sn; ?>" value="<?php if($resP1['sM2']!='' AND $resP1['sM2']!=0){echo floatval($resP1['sM2']);}?>" readonly/></td>
<td><input class="Input" id="M2_B<?php echo $Sn; ?>" value="<?php if($resP2['sM2']!='' AND $resP2['sM2']!=0){echo floatval($resP2['sM2']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" id="M2_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM2']!=0){echo floatval($resP2ch['sM2']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M2_C<?php echo $Sn; ?>" value="<?php if($resP3['sM2']!='' AND $resP3['sM2']!=0){echo floatval($resP3['sM2']);}?>" readonly/></td><?php } ?>	  

<td><input class="Input" id="M3_D<?php echo $Sn; ?>" value="<?php if($resP0['sM3']!='' AND $resP0['sM3']!=0){echo floatval($resP0['sM3']);}?>" readonly/></td>
<td><input class="Input" id="M3_A<?php echo $Sn; ?>" value="<?php if($resP1['sM3']!='' AND $resP1['sM3']!=0){echo floatval($resP1['sM3']);}?>" readonly/></td>
<td><input class="Input" id="M3_B<?php echo $Sn; ?>" value="<?php if($resP2['sM3']!='' AND $resP2['sM3']!=0){echo floatval($resP2['sM3']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" id="M3_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM3']!=0){echo floatval($resP2ch['sM3']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M3_C<?php echo $Sn; ?>" value="<?php if($resP3['sM3']!='' AND $resP3['sM3']!=0){echo floatval($resP3['sM3']);}?>" readonly/></td><?php } ?>	  

<td><input class="Input" id="M4_D<?php echo $Sn; ?>" value="<?php if($resP0['sM4']!='' AND $resP0['sM4']!=0){echo floatval($resP0['sM4']);}?>" readonly/></td>
<td><input class="Input" id="M4_A<?php echo $Sn; ?>" value="<?php if($resP1['sM4']!='' AND $resP1['sM4']!=0){echo floatval($resP1['sM4']);}?>" readonly/></td>
<td><input class="Input" id="M4_B<?php echo $Sn; ?>" value="<?php if($resP2['sM4']!='' AND $resP2['sM4']!=0){echo floatval($resP2['sM4']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" id="M4_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM4']!=0){echo floatval($resP2ch['sM4']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M4_C<?php echo $Sn; ?>" value="<?php if($resP3['sM4']!='' AND $resP3['sM4']!=0){echo floatval($resP3['sM4']);}?>" readonly/></td><?php } ?>	  

<td><input class="Input" id="M5_D<?php echo $Sn; ?>" value="<?php if($resP0['sM5']!='' AND $resP0['sM5']!=0){echo floatval($resP0['sM5']);}?>" readonly/></td>
<td><input class="Input" id="M5_A<?php echo $Sn; ?>" value="<?php if($resP1['sM5']!='' AND $resP1['sM5']!=0){echo floatval($resP1['sM5']);}?>" readonly/></td>
<td><input class="Input" id="M5_B<?php echo $Sn; ?>" value="<?php if($resP2['sM5']!='' AND $resP2['sM5']!=0){echo floatval($resP2['sM5']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" id="M5_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM5']!=0){echo floatval($resP2ch['sM5']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M5_C<?php echo $Sn; ?>" value="<?php if($resP3['sM5']!='' AND $resP3['sM5']!=0){echo floatval($resP3['sM5']);}?>" readonly/></td><?php } ?>	  

<td><input class="Input" id="M6_D<?php echo $Sn; ?>" value="<?php if($resP0['sM6']!='' AND $resP0['sM6']!=0){echo floatval($resP0['sM6']);}?>" readonly/></td>
<td><input class="Input" id="M6_A<?php echo $Sn; ?>" value="<?php if($resP1['sM6']!='' AND $resP1['sM6']!=0){echo floatval($resP1['sM6']);}?>" readonly/></td>
<td><input class="Input" id="M6_B<?php echo $Sn; ?>" value="<?php if($resP2['sM6']!='' AND $resP2['sM6']!=0){echo floatval($resP2['sM6']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" id="M6_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM6']!=0){echo floatval($resP2ch['sM6']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M6_C<?php echo $Sn; ?>" value="<?php if($resP3['sM6']!='' AND $resP3['sM6']!=0){echo floatval($resP3['sM6']);}?>" readonly/></td><?php } ?>	  

<td><input class="Input" id="M7_D<?php echo $Sn; ?>" value="<?php if($resP0['sM7']!='' AND $resP0['sM7']!=0){echo floatval($resP0['sM7']);}?>" readonly/></td>
<td><input class="Input" id="M7_A<?php echo $Sn; ?>" value="<?php if($resP1['sM7']!='' AND $resP1['sM7']!=0){echo floatval($resP1['sM7']);}?>" readonly/></td>
<td><input class="Input" id="M7_B<?php echo $Sn; ?>" value="<?php if($resP2['sM7']!='' AND $resP2['sM7']!=0){echo floatval($resP2['sM7']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" id="M7_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM7']!=0){echo floatval($resP2ch['sM7']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M7_C<?php echo $Sn; ?>" value="<?php if($resP3['sM7']!='' AND $resP3['sM7']!=0){echo floatval($resP3['sM7']);}?>" readonly/></td><?php } ?>	  

<td><input class="Input" id="M8_D<?php echo $Sn; ?>" value="<?php if($resP0['sM8']!='' AND $resP0['sM8']!=0){echo floatval($resP0['sM8']);}?>" readonly/></td>
<td><input class="Input" id="M8_A<?php echo $Sn; ?>" value="<?php if($resP1['sM8']!='' AND $resP1['sM8']!=0){echo floatval($resP1['sM8']);}?>" readonly/></td>
<td><input class="Input" id="M8_B<?php echo $Sn; ?>" value="<?php if($resP2['sM8']!='' AND $resP2['sM8']!=0){echo floatval($resP2['sM8']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" id="M8_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM8']!=0){echo floatval($resP2ch['sM8']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M8_C<?php echo $Sn; ?>" value="<?php if($resP3['sM8']!='' AND $resP3['sM8']!=0){echo floatval($resP3['sM8']);}?>" readonly/></td><?php } ?>	  

<td><input class="Input" id="M9_D<?php echo $Sn; ?>" value="<?php if($resP0['sM9']!='' AND $resP0['sM9']!=0){echo floatval($resP0['sM9']);}?>" readonly/></td>
<td><input class="Input" id="M9_A<?php echo $Sn; ?>" value="<?php if($resP1['sM9']!='' AND $resP1['sM9']!=0){echo floatval($resP1['sM9']);}?>" readonly/></td>
<td><input class="Input" id="M9_B<?php echo $Sn; ?>" value="<?php if($resP2['sM9']!='' AND $resP2['sM9']!=0){echo floatval($resP2['sM9']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input"  id="M9_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM9']!=0){echo floatval($resP2ch['sM9']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M9_C<?php echo $Sn; ?>" value="<?php if($resP3['sM9']!='' AND $resP3['sM9']!=0){echo floatval($resP3['sM9']);}?>" readonly/></td><?php } ?>	  

<td><input class="Input" id="M10_D<?php echo $Sn; ?>" value="<?php if($resP0['sM10']!='' AND $resP0['sM10']!=0){echo floatval($resP0['sM10']);}?>" readonly/></td>
<td><input class="Input" id="M10_A<?php echo $Sn; ?>" value="<?php if($resP1['sM10']!='' AND $resP1['sM10']!=0){echo floatval($resP1['sM10']);}?>" readonly/></td>
<td><input class="Input" id="M10_B<?php echo $Sn; ?>" value="<?php if($resP2['sM10']!='' AND $resP2['sM10']!=0){echo floatval($resP2['sM10']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input"  id="M10_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM10']!=0){echo floatval($resP2ch['sM10']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M10_C<?php echo $Sn; ?>" value="<?php if($resP3['sM10']!='' AND $resP3['sM10']!=0){echo floatval($resP3['sM10']);}?>" readonly/></td><?php } ?>	  

<td><input class="Input" id="M11_D<?php echo $Sn; ?>" value="<?php if($resP0['sM11']!='' AND $resP0['sM11']!=0){echo floatval($resP0['sM11']);}?>" readonly/></td>
<td><input class="Input" id="M11_A<?php echo $Sn; ?>" value="<?php if($resP1['sM11']!='' AND $resP1['sM11']!=0){echo floatval($resP1['sM11']);}?>" readonly/></td>
<td><input class="Input" id="M11_B<?php echo $Sn; ?>" value="<?php if($resP2['sM11']!='' AND $resP2['sM11']!=0){echo floatval($resP2['sM11']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input"  id="M11_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM11']!=0){echo floatval($resP2ch['sM11']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M11_C<?php echo $Sn; ?>" value="<?php if($resP3['sM11']!='' AND $resP3['sM11']!=0){echo floatval($resP3['sM11']);}?>" readonly/></td><?php } ?>	  

<td><input class="Input" id="M12_D<?php echo $Sn; ?>" value="<?php if($resP0['sM12']!='' AND $resP0['sM12']!=0){echo floatval($resP0['sM12']);}?>" readonly/></td>
<td><input class="Input" id="M12_A<?php echo $Sn; ?>" value="<?php if($resP1['sM12']!='' AND $resP1['sM12']!=0){echo floatval($resP1['sM12']);}?>" readonly/></td>
<td><input class="Input" id="M12_B<?php echo $Sn; ?>" value="<?php if($resP2['sM12']!='' AND $resP2['sM12']!=0){echo floatval($resP2['sM12']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input"  id="M12_C<?php echo $Sn; ?>" value="<?php if($resP2ch['sM12']!=0){echo floatval($resP2ch['sM12']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M12_C<?php echo $Sn; ?>" value="<?php if($resP3['sM12']!='' AND $resP3['sM12']!=0){echo floatval($resP3['sM12']);}?>" readonly/></td><?php } ?>	  

<?php $TotP0=$resP0['sM1']+$resP0['sM2']+$resP0['sM3']+$resP0['sM4']+$resP0['sM5']+$resP0['sM6']+$resP0['sM7']+$resP0['sM8']+$resP0['sM9']+$resP0['sM10']+$resP0['sM11']+$resP0['sM12']; 
$TotP1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']+$resP1['sM4']+$resP1['sM5']+$resP1['sM6']+$resP1['sM7']+$resP1['sM8']+$resP1['sM9']+$resP1['sM10']+$resP1['sM11']+$resP1['sM12']; 
$TotP2=$resP2['sM1']+$resP2['sM2']+$resP2['sM3']+$resP2['sM4']+$resP2['sM5']+$resP2['sM6']+$resP2['sM7']+$resP2['sM8']+$resP2['sM9']+$resP2['sM10']+$resP2['sM11']+$resP2['sM12']; 
$TotP2ch=$resP2ch['sM1']+$resP2ch['sM2']+$resP2ch['sM3']+$resP2ch['sM4']+$resP2ch['sM5']+$resP2ch['sM6']+$resP2ch['sM7']+$resP2ch['sM8']+$resP2ch['sM9']+$resP2ch['sM10']+$resP2ch['sM11']+$resP2ch['sM12']; 
$TotP3=$resP3['sM1']+$resP3['sM2']+$resP3['sM3']+$resP3['sM4']+$resP3['sM5']+$resP3['sM6']+$resP3['sM7']+$resP3['sM8']+$resP3['sM9']+$resP3['sM10']+$resP3['sM11']+$resP3['sM12'];
?>	
<td><input class="InputB" id="TotP0_<?php echo $Sn; ?>" value="<?php if($TotP0!=0 AND $TotP0!=''){echo floatval($TotP0);}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="TotP1_<?php echo $Sn; ?>" value="<?php if($TotP1!=0 AND $TotP1!=''){echo floatval($TotP1);}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="TotP2_<?php echo $Sn; ?>" value="<?php if($TotP2!=0 AND $TotP2!=''){echo floatval($TotP2);}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="InputB" value="<?php if($TotP2ch!=0){echo floatval($TotP2ch);}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="InputB" id="TotP3_<?php echo $Sn; ?>" value="<?php if($TotP3!=0 AND $TotP3!=''){echo floatval($TotP3);}else{echo '';} ?>" readonly/></td><?php } ?>	  

<?php 
if($rowRpt>0)
{
$SsqlP0=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_terr where TerrEmpID=".$EmployeeId." AND TerrHqID=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$Before2YId, $con); 
$SsqlP1=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_terr where TerrEmpID=".$EmployeeId." AND TerrHqID=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$BeforeYId, $con); 
$SsqlP2=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_terr where TerrEmpID=".$EmployeeId." AND TerrHqID=".$_REQUEST['hq']." AND  ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);
$SsqlP3=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_terr where TerrEmpID=".$EmployeeId." AND TerrHqID=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
}
else
{
$SsqlP0=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_area where AreaEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$Before2YId, $con); 
$SsqlP1=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_area where AreaEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$BeforeYId, $con); 
$SsqlP2=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_area where AreaEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);
$SsqlP3=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_area where AreaEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con);
}

$SresP0=mysql_fetch_assoc($SsqlP0); $SresP1=mysql_fetch_assoc($SsqlP1); 
$SresP2=mysql_fetch_assoc($SsqlP2); $SresP3=mysql_fetch_assoc($SsqlP3); 
$STotP0=$SresP0['Q1']+$SresP0['Q2']+$SresP0['Q3']+$SresP0['Q4']; 
$STotP1=$SresP1['Q1']+$SresP1['Q2']+$SresP1['Q3']+$SresP1['Q4']; 
$STotP2=$SresP2['Q1']+$SresP2['Q2']+$SresP2['Q3']+$SresP2['Q4']; 
$STotP3=$SresP3['Q1']+$SresP3['Q2']+$SresP3['Q3']+$SresP3['Q4']; 
?>

<td class="Revised"><?php if($STotP2!=0 AND $STotP2!=''){echo floatval($STotP2);}else{echo '';} ?><input type="hidden" id="STotP2_<?php echo $Sn; ?>" value="<?php if($STotP2!=0 AND $STotP2!=''){echo $STotP2;}else{echo '';} ?>" /></td>
<td class="Revised"><?php if($STotP3!=0 AND $STotP3!=''){echo floatval($STotP3);}else{echo '';} ?><input type="hidden" id="STotP3_<?php echo $Sn; ?>" value="<?php if($STotP3!=0 AND $STotP3!=''){echo $STotP3;}else{echo '';} ?>" /></td>	 
	</tr>	
<?php } $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActualSn" value="'.$ActSn.'" />'; ?> 

<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ac']!=1){ 
$sqlP0t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND d.HqId=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$Before2YId, $con);
$resP0t=mysql_fetch_assoc($sqlP0t); 
$sqlP1t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND d.HqId=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$BeforeYId, $con); 
$resP1t=mysql_fetch_assoc($sqlP1t);
$sqlP2t=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND d.HqId=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); $resP2t=mysql_fetch_assoc($sqlP2t);
$sqlP2tch=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND d.HqId=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); 
$resP2tch=mysql_fetch_assoc($sqlP2tch);
$sqlP3t=mysql_query("select SUM(M1_Proj) as tsM1,SUM(M2_Proj) as tsM2,SUM(M3_Proj) as tsM3,SUM(M4_Proj) as tsM4,SUM(M5_Proj) as tsM5,SUM(M6_Proj) as tsM6,SUM(M7_Proj) as tsM7,SUM(M8_Proj) as tsM8,SUM(M9_Proj) as tsM9,SUM(M10_Proj) as tsM10,SUM(M11_Proj) as tsM11,SUM(M12_Proj) as tsM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND d.HqId=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); $resP3t=mysql_fetch_assoc($sqlP3t);
?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	 <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
	 <td><input class="TInput" id="TotP1_TD" value="<?php if($resP0t['tsM1']!=0){echo floatval($resP0t['tsM1']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP1_TA" value="<?php if($resP1t['tsM1']!=0){echo floatval($resP1t['tsM1']);} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP1_TB" value="<?php if($resP2t['tsM1']!=0){echo floatval($resP2t['tsM1']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM1']!=0){echo floatval($resP2tch['tsM1']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP1_TC" value="<?php if($resP3t['tsM1']!=0){echo floatval($resP3t['tsM1']);} ?>" readonly/></td><?php } ?>	  
	 
	 <td><input class="TInput" id="TotP2_TD" value="<?php if($resP0t['tsM2']!=0){echo floatval($resP0t['tsM2']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TA" value="<?php if($resP1t['tsM2']!=0){echo floatval($resP1t['tsM2']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TB" value="<?php if($resP2t['tsM2']!=0){echo floatval($resP2t['tsM2']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM2']!=0){echo floatval($resP2tch['tsM2']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP2_TC" value="<?php if($resP3t['tsM2']!=0){echo floatval($resP3t['tsM2']);} ?>" readonly/></td><?php } ?>	  
	 
	 <td><input class="TInput" id="TotP3_TD" value="<?php if($resP0t['tsM3']!=0){echo floatval($resP0t['tsM3']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP3_TA" value="<?php if($resP1t['tsM3']!=0){echo floatval($resP1t['tsM3']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP3_TB" value="<?php if($resP2t['tsM3']!=0){echo floatval($resP2t['tsM3']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM3']!=0){echo floatval($resP2tch['tsM3']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP3_TC" value="<?php if($resP3t['tsM3']!=0){echo floatval($resP3t['tsM3']);} ?>" readonly/></td><?php } ?>
	 	
	 <td><input class="TInput" id="TotP4_TD" value="<?php if($resP0t['tsM4']!=0){echo floatval($resP0t['tsM4']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP4_TA" value="<?php if($resP1t['tsM4']!=0){echo floatval($resP1t['tsM4']);} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP4_TB" value="<?php if($resP2t['tsM4']!=0){echo floatval($resP2t['tsM4']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM4']!=0){echo floatval($resP2tch['tsM4']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP4_TC" value="<?php if($resP3t['tsM4']!=0){echo floatval($resP3t['tsM4']);} ?>" readonly/></td><?php } ?>
	
	 <td><input class="TInput" id="TotP5_TD" value="<?php if($resP0t['tsM5']!=0){echo floatval($resP0t['tsM5']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP5_TA" value="<?php if($resP1t['tsM5']!=0){echo floatval($resP1t['tsM5']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP5_TB" value="<?php if($resP2t['tsM5']!=0){echo floatval($resP2t['tsM5']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM5']!=0){echo floatval($resP2tch['tsM5']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP5_TC" value="<?php if($resP3t['tsM5']!=0){echo floatval($resP3t['tsM5']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP6_TD" value="<?php if($resP0t['tsM6']!=0){echo floatval($resP0t['tsM6']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP6_TA" value="<?php if($resP1t['tsM6']!=0){echo floatval($resP1t['tsM6']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP6_TB" value="<?php if($resP2t['tsM6']!=0){echo floatval($resP2t['tsM6']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM6']!=0){echo floatval($resP2tch['tsM6']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP6_TC" value="<?php if($resP3t['tsM6']!=0){echo floatval($resP3t['tsM6']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP7_TD" value="<?php if($resP0t['tsM7']!=0){echo floatval($resP0t['tsM7']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP7_TA" value="<?php if($resP1t['tsM7']!=0){echo floatval($resP1t['tsM7']);} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP7_TB" value="<?php if($resP2t['tsM7']!=0){echo floatval($resP2t['tsM7']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM7']!=0){echo floatval($resP2tch['tsM7']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP7_TC" value="<?php if($resP3t['tsM7']!=0){echo floatval($resP3t['tsM7']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP8_TD" value="<?php if($resP0t['tsM8']!=0){echo floatval($resP0t['tsM8']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP8_TA" value="<?php if($resP1t['tsM8']!=0){echo floatval($resP1t['tsM8']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP8_TB" value="<?php if($resP2t['tsM8']!=0){echo floatval($resP2t['tsM8']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM8']!=0){echo floatval($resP2tch['tsM8']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP8_TC" value="<?php if($resP3t['tsM8']!=0){echo floatval($resP3t['tsM8']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP9_TD" value="<?php if($resP0t['tsM9']!=0){echo floatval($resP0t['tsM9']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP9_TA" value="<?php if($resP1t['tsM9']!=0){echo floatval($resP1t['tsM9']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP9_TB" value="<?php if($resP2t['tsM9']!=0){echo floatval($resP2t['tsM9']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM9']!=0){echo floatval($resP2tch['tsM9']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP9_TC" value="<?php if($resP3t['tsM9']!=0){echo floatval($resP3t['tsM9']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP10_TD" value="<?php if($resP0t['tsM10']!=0){echo floatval($resP0t['tsM10']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP10_TA" value="<?php if($resP1t['tsM10']!=0){echo floatval($resP1t['tsM10']);} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP10_TB" value="<?php if($resP2t['tsM10']!=0){echo floatval($resP2t['tsM10']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM10']!=0){echo floatval($resP2tch['tsM10']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP10_TC" value="<?php if($resP3t['tsM10']!=0){echo floatval($resP3t['tsM10']);} ?>" readonly/></td><?php } ?>
	
	 <td><input class="TInput" id="TotP11_TD" value="<?php if($resP0t['tsM11']!=0){echo floatval($resP0t['tsM11']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP11_TA" value="<?php if($resP1t['tsM11']!=0){echo floatval($resP1t['tsM11']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP11_TB" value="<?php if($resP2t['tsM11']!=0){echo floatval($resP2t['tsM11']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM11']!=0){echo floatval($resP2tch['tsM11']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP11_TC" value="<?php if($resP3t['tsM11']!=0){echo floatval($resP3t['tsM11']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP12_TD" value="<?php if($resP0t['tsM12']!=0){echo floatval($resP0t['tsM12']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP12_TA" value="<?php if($resP1t['tsM12']!=0){echo floatval($resP1t['tsM12']);} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP12_TB" value="<?php if($resP2t['tsM12']!=0){echo floatval($resP2t['tsM12']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tch['tsM12']!=0){echo floatval($resP2tch['tsM12']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP12_TC" value="<?php if($resP3t['tsM12']!=0){echo floatval($resP3t['tsM12']);} ?>" readonly/></td><?php } ?>
	 	
<?php 
$TotP0t=$resP0t['tsM1']+$resP0t['tsM2']+$resP0t['tsM3']+$resP0t['tsM4']+$resP0t['tsM5']+$resP0t['tsM6']+$resP0t['tsM7']+$resP0t['tsM8']+$resP0t['tsM9']+$resP0t['tsM10']+$resP0t['tsM11']+$resP0t['tsM12']; 
$TotP1t=$resP1t['tsM1']+$resP1t['tsM2']+$resP1t['tsM3']+$resP1t['tsM4']+$resP1t['tsM5']+$resP1t['tsM6']+$resP1t['tsM7']+$resP1t['tsM8']+$resP1t['tsM9']+$resP1t['tsM10']+$resP1t['tsM11']+$resP1t['tsM12']; 
$TotP2t=$resP2t['tsM1']+$resP2t['tsM2']+$resP2t['tsM3']+$resP2t['tsM4']+$resP2t['tsM5']+$resP2t['tsM6']+$resP2t['tsM7']+$resP2t['tsM8']+$resP2t['tsM9']+$resP2t['tsM10']+$resP2t['tsM11']+$resP2t['tsM12']; 
$TotP2tch=$resP2tch['tsM1']+$resP2tch['tsM2']+$resP2tch['tsM3']+$resP2tch['tsM4']+$resP2tch['tsM5']+$resP2tch['tsM6']+$resP2tch['tsM7']+$resP2tch['tsM8']+$resP2tch['tsM9']+$resP2tch['tsM10']+$resP2tch['tsM11']+$resP2tch['tsM12']; 
$TotP3t=$resP3t['tsM1']+$resP3t['tsM2']+$resP3t['tsM3']+$resP3t['tsM4']+$resP3t['tsM5']+$resP3t['tsM6']+$resP3t['tsM7']+$resP3t['tsM8']+$resP3t['tsM9']+$resP3t['tsM10']+$resP3t['tsM11']+$resP3t['tsM12'];
?>		
      <td><input class="TInput" id="TotM_DeT" value="<?php if($TotP0t!=0 AND $TotP0t!=''){echo floatval($TotP0t);}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="TotM_AeT" value="<?php if($TotP1t!=0 AND $TotP1t!=''){echo floatval($TotP1t);}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="TotM_BeT" value="<?php if($TotP2t!=0 AND $TotP2t!=''){echo floatval($TotP2t);}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TotP2tch!=0){echo floatval($TotP2tch);}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotM_CeT" value="<?php if($TotP3t!=0 AND $TotP3t!=''){echo floatval($TotP3t);}else{echo '';} ?>" readonly/></td><?php } ?>	  
	  
<?php

if($rowRpt>0)
{
$TSsqlP0=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrEmpID=".$EmployeeId." AND TerrHqID=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$Before2YId, $con); 
$TSsqlP1=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrEmpID=".$EmployeeId." AND TerrHqID=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$BeforeYId, $con); 
$TSsqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrEmpID=".$EmployeeId." AND TerrHqID=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$_REQUEST['y'], $con); 
$TSsqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrEmpID=".$EmployeeId." AND TerrHqID=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$AfterYId, $con);
}
else
{
$TSsqlP0=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sda.AreaEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$Before2YId, $con); 
$TSsqlP1=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sda.AreaEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$BeforeYId, $con); 
$TSsqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sda.AreaEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$_REQUEST['y'], $con); 
$TSsqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sda.AreaEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$AfterYId, $con);
}

$TSresP0=mysql_fetch_assoc($TSsqlP0); $TSresP1=mysql_fetch_assoc($TSsqlP1); 
$TSresP2=mysql_fetch_assoc($TSsqlP2); $TSresP3=mysql_fetch_assoc($TSsqlP3); 
$TSTotP0=$TSresP0['Qa']+$TSresP0['Qb']+$TSresP0['Qc']+$TSresP0['Qd']; 
$TSTotP1=$TSresP1['Qa']+$TSresP1['Qb']+$TSresP1['Qc']+$TSresP1['Qd']; 
$TSTotP2=$TSresP2['Qa']+$TSresP2['Qb']+$TSresP2['Qc']+$TSresP2['Qd']; 
$TSTotP3=$TSresP3['Qa']+$TSresP3['Qb']+$TSresP3['Qc']+$TSresP3['Qd']; 
?>	
	<td class="Revisedt"><?php if($TSTotP2!=0 AND $TSTotP2!=''){echo floatval($TSTotP2);}else{echo '';} ?>&nbsp;</td>
	<td class="Revisedt"><?php if($TSTotP3!=0 AND $TSTotP3!=''){echo floatval($TSTotP3);}else{echo '';} ?>&nbsp;</td>		  
   </tr>	
<?php } ?>  
<?php /********************** Overall Total Close ****************************/ ?>
</table>	 
</div>
</div>    
 </td>
</tr>
<?php if($_REQUEST['ac']!=1) { ?>
<tr>
<td>
 <table border="0" cellpadding="0" cellspacing="4" cellpadding="0">
<?php $sqlDeal = mysql_query("select * from hrm_sales_dealer where HqId=".$_REQUEST['hq']." order by DealerId ASC", $con); $resDealRow=mysql_num_rows($sqlDeal);  
      $DealRow=$resDealRow+1; echo '<input type="hidden" id="DealRows" value="'.$DealRow.'" />'; $counter=1; ?>   
<?php while($resDeal=mysql_fetch_array($sqlDeal)){ /*********** Open Dealer **********/ ?>		
<tr style="background-color:#CBD7F3;">
 <table border="0"> 
  <tr>
   <td>
<div class="outerbox">
<div class="innerbox">	  
<table class="bluetable" border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ echo '1250px';}else{echo '1250px';}?>;">
  <tr>
  <td colspan="60" style="font-size:16px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php echo ucfirst(strtolower($resDeal['DealerName'])).'-<font color="#D7EBFF">'.$resDeal['DealerCity'].'</font>'; ?></b></td>
  </tr>	
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){echo 4;}else{echo 3;}?>" style="font-size:16px;color:#FFFF00;">&nbsp;</td><td colspan="4" align="center"><b>APRIL</b></td><td colspan="4" align="center"><b>MAY</b></td><td colspan="4" align="center"><b>JUNE</b></td><td colspan="4" align="center"><b>JULY</b></td><td colspan="4" align="center"><b>AUGUST</b></td><td colspan="4" align="center"><b>SEPTEMBER</b></td><td colspan="4" align="center"><b>OCTOBER</b></td><td colspan="4" align="center"><b>NOVEMBER</b></td><td colspan="4" align="center"><b>DECEMBER</b></td><td colspan="4" align="center"><b>JANUARY</b></td><td colspan="4" align="center"><b>FEBRUARY</b></td><td colspan="4" align="center"><b>MARCH</b></td>
<td colspan="4" align="center"><b>TOTAL</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>   
    <td align="center" style="width:100px;font-size:12px;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="width:120px;font-size:12px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;font-size:12px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:50px;font-size:12px;"><b>&nbsp;EDIT&nbsp;</b></td>
    <?php for($i=1;$i<=13;$i++){?>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td>
	<td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<?php if($RslP=='Y'){ ?><td class="Trh60"><?php echo $y1T.'<br>'.$y2; ?></td><?php } ?>
	<?php if($EntP=='Y'){ ?><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><?php } ?>
	<?php } ?>
  </tr>	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
 $Sn=1; while($res=mysql_fetch_array($sql)){ 

$sqlP0d=mysql_query("select * from hrm_sales_sal_details_".$Before2YId." where YearId=".$Before2YId." AND ProductId=".$res['ProductId']." AND DealerId=".$resDeal['DealerId'], $con); $resP0d=mysql_fetch_assoc($sqlP0d);

$sqlP1d=mysql_query("select * from hrm_sales_sal_details_".$BeforeYId." where YearId=".$BeforeYId." AND ProductId=".$res['ProductId']." AND DealerId=".$resDeal['DealerId'], $con); $resP1d=mysql_fetch_assoc($sqlP1d);

$sqlP2d=mysql_query("select * from hrm_sales_sal_details_".$_REQUEST['y']." where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId']." AND DealerId=".$resDeal['DealerId'], $con); $resP2d=mysql_fetch_assoc($sqlP2d);

$sqlP3d=mysql_query("select * from hrm_sales_sal_details_".$AfterYId." where YearId=".$AfterYId." AND ProductId=".$res['ProductId']." AND DealerId=".$resDeal['DealerId'], $con);  $resP3d=mysql_fetch_assoc($sqlP3d); $DeId=$resDeal['DealerId'];

$sChk=mysql_query("select * from hrm_sales_arrange_prod where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND StateId=".$resSt['StateId'], $con); $rowChkP=mysql_fetch_assoc($sChk);

if($RslP=='Y'){ $a1d=$resP2d['M1_Ach']; $a2d=$resP2d['M2_Ach']; $a3d=$resP2d['M3_Ach']; $a4d=$resP2d['M4_Ach']; $a5d=$resP2d['M5_Ach']; $a6d=$resP2d['M6_Ach']; $a7d=$resP2d['M7_Ach']; $a8d=$resP2d['M8_Ach']; $a9d=$resP2d['M9_Ach']; $a10d=$resP2d['M10_Ach']; $a11d=$resP2d['M11_Ach']; $a12d=$resP2d['M12_Ach']; } 
if($EntP=='Y'){ $a1d=$resP3d['M1_Proj']; $a2d=$resP3d['M2_Proj']; $a3d=$resP3d['M3_Proj']; $a4d=$resP3d['M4_Proj']; $a5d=$resP3d['M5_Proj']; $a6d=$resP3d['M6_Proj']; $a7d=$resP3d['M7_Proj']; $a8d=$resP3d['M8_Proj']; $a9d=$resP3d['M9_Proj']; $a10d=$resP3d['M10_Proj']; $a11d=$resP3d['M11_Proj']; $a12d=$resP3d['M12_Proj']; }

if($rowChkP>0 OR $resP0d['M1_Ach']!=0 OR $resP0d['M2_Ach']!=0 OR $resP0d['M3_Ach']!=0 OR $resP0d['M4_Ach']!=0 OR $resP0d['M5_Ach']!=0 OR $resP0d['M6_Ach']!=0 OR $resP0d['M7_Ach']!=0 OR $resP0d['M8_Ach']!=0 OR $resP0d['M9_Ach']!=0 OR $resP0d['M10_Ach']!=0 OR $resP0d['M11_Ach']!=0 OR $resP0d['M12_Ach']!=0 OR $resP1d['M1_Ach']!=0 OR $resP1d['M2_Ach']!=0 OR $resP1d['M3_Ach']!=0 OR $resP1d['M4_Ach']!=0 OR $resP1d['M5_Ach']!=0 OR $resP1d['M6_Ach']!=0 OR $resP1d['M7_Ach']!=0 OR $resP1d['M8_Ach']!=0 OR $resP1d['M9_Ach']!=0 OR $resP1d['M10_Ach']!=0 OR $resP1d['M11_Ach']!=0 OR $resP1d['M12_Ach']!=0 OR $resP2d['M1']!=0 OR $resP2d['M2']!=0 OR $resP2d['M3']!=0 OR $resP2d['M4']!=0 OR $resP2d['M5']!=0 OR $resP2d['M6']!=0 OR $resP2d['M7']!=0 OR $resP2d['M8']!=0 OR $resP2d['M9']!=0 OR $resP2d['M10']!=0 OR $resP2d['M11']!=0 OR $resP2d['M12']!=0 OR $a1d!=0 OR $a2d!=0 OR $a3d!=0 OR $a4d!=0 OR $a5d!=0 OR $a6d!=0 OR $a7d!=0 OR $a8d!=0 OR $a9d!=0 OR $a10d!=0 OR $a11d!=0 OR $a12d!=0) {
?>	  
   <tr bgcolor="#EEEEEE" style="height:22px;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>	  
     <td bgcolor="#FFFFFF"><input class="Inputt" style="width:100px;" value="<?php echo $res['ItemName']; ?>" /></td>
<?php } ?>		 
	 <td bgcolor="#FFFFFF"><input class="Inputt" style="width:120px;" value="<?php echo $res['ProductName']; ?>" /><input type="hidden" id="<?php echo $DeId; ?>P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>
	 <td align="center" valign="middle" bgcolor="#FFFFFF" id="TD<?php echo $resDeal['DealerId'].'_'.$Sn; ?>">
	   <?php if($resCPerMi['EditPerMi']=='Y' AND $EntP=='Y'){ ?>
<img src="images/edit.png" border="0" alt="Edit" id="<?php echo $resDeal['DealerId']; ?>EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn.', '.$_REQUEST['q'].', '.$resDeal['DealerId']; ?>)" style="display:block;">
<img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="<?php echo $resDeal['DealerId']; ?>SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', '.$resDeal['DealerId'].', '.$_REQUEST['q']; ?>)" style="display:none;">
	   <?php } else {echo '&nbsp;';}?>
	</td>	
<td><input class="Input" id="<?php echo $DeId; ?>M1_De<?php echo $Sn; ?>" value="<?php if($resP0d['M1_Ach']!='' AND $resP0d['M1_Ach']!=0){echo floatval($resP0d['M1_Ach']);} ?>" readonly/></td>					
<td><input class="Input" id="<?php echo $DeId; ?>M1_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M1_Ach']!='' AND $resP1d['M1_Ach']!=0){echo floatval($resP1d['M1_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M1_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M1']!='' AND $resP2d['M1']!=0){echo floatval($resP2d['M1']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M1_Ach']!=0){echo floatval($resP2d['M1_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M1_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M1_Proj']!='' AND $resP3d['M1_Proj']!=0){echo floatval($resP3d['M1_Proj']);} ?>"/></td><?php } ?>	  


<td><input class="Input" id="<?php echo $DeId; ?>M2_De<?php echo $Sn; ?>" value="<?php if($resP0d['M2_Ach']!='' AND $resP0d['M2_Ach']!=0){echo floatval($resP0d['M2_Ach']);} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $DeId; ?>M2_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M2_Ach']!='' AND $resP1d['M2_Ach']!=0){echo floatval($resP1d['M2_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M2_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M2']!='' AND $resP2d['M2']!=0){echo floatval($resP2d['M2']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M2_Ach']!=0){echo floatval($resP2d['M2_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M2_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M2_Proj']!='' AND $resP3d['M2_Proj']!=0){echo floatval($resP3d['M2_Proj']);} ?>"/></td><?php } ?>	  


<td><input class="Input" id="<?php echo $DeId; ?>M3_De<?php echo $Sn; ?>" value="<?php if($resP0d['M3_Ach']!='' AND $resP0d['M3_Ach']!=0){echo floatval($resP0d['M3_Ach']);} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $DeId; ?>M3_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M3_Ach']!='' AND $resP1d['M3_Ach']!=0){echo floatval($resP1d['M3_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M3_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M3']!='' AND $resP2d['M3']!=0){echo floatval($resP2d['M3']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M3_Ach']!=0){echo floatval($resP2d['M3_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M3_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M3_Proj']!='' AND $resP3d['M3_Proj']!=0){echo floatval($resP3d['M3_Proj']);} ?>"/></td><?php } ?>	  

<td><input class="Input" id="<?php echo $DeId; ?>M4_De<?php echo $Sn; ?>" value="<?php if($resP0d['M4_Ach']!='' AND $resP0d['M4_Ach']!=0){echo floatval($resP0d['M4_Ach']);} ?>" readonly/></td>	
<td><input class="Input" id="<?php echo $DeId; ?>M4_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M4_Ach']!='' AND $resP1d['M4_Ach']!=0){echo floatval($resP1d['M4_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M4_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M4']!='' AND $resP2d['M4']!=0){echo floatval($resP2d['M4']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M4_Ach']!=0){echo floatval($resP2d['M4_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M4_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M4_Proj']!='' AND $resP3d['M4_Proj']!=0){echo floatval($resP3d['M4_Proj']);} ?>"/></td><?php } ?>	  


<td><input class="Input" id="<?php echo $DeId; ?>M5_De<?php echo $Sn; ?>" value="<?php if($resP0d['M5_Ach']!='' AND $resP0d['M5_Ach']!=0){echo floatval($resP0d['M5_Ach']);} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $DeId; ?>M5_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M5_Ach']!='' AND $resP1d['M5_Ach']!=0){echo floatval($resP1d['M5_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M5_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M5']!='' AND $resP2d['M5']!=0){echo floatval($resP2d['M5']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M5_Ach']!=0){echo floatval($resP2d['M5_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M5_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M5_Proj']!='' AND $resP3d['M5_Proj']!=0){echo floatval($resP3d['M5_Proj']);} ?>"/></td><?php } ?>	  


<td><input class="Input" id="<?php echo $DeId; ?>M6_De<?php echo $Sn; ?>" value="<?php if($resP0d['M6_Ach']!='' AND $resP0d['M6_Ach']!=0){echo floatval($resP0d['M6_Ach']);} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $DeId; ?>M6_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M6_Ach']!='' AND $resP1d['M6_Ach']!=0){echo floatval($resP1d['M6_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M6_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M6']!='' AND $resP2d['M6']!=0){echo floatval($resP2d['M6']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M6_Ach']!=0){echo floatval($resP2d['M6_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M6_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M6_Proj']!='' AND $resP3d['M6_Proj']!=0){echo floatval($resP3d['M6_Proj']);} ?>"/></td><?php } ?>	  


<td><input class="Input" id="<?php echo $DeId; ?>M7_De<?php echo $Sn; ?>" value="<?php if($resP0d['M7_Ach']!='' AND $resP0d['M7_Ach']!=0){echo floatval($resP0d['M7_Ach']);} ?>" readonly/></td> 
<td><input class="Input" id="<?php echo $DeId; ?>M7_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M7_Ach']!='' AND $resP1d['M7_Ach']!=0){echo floatval($resP1d['M7_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M7_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M7']!='' AND $resP2d['M7']!=0){echo floatval($resP2d['M7']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M7_Ach']!=0){echo floatval($resP2d['M7_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M7_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M7_Proj']!='' AND $resP3d['M7_Proj']!=0){echo floatval($resP3d['M7_Proj']);} ?>"/></td><?php } ?>	  


<td><input class="Input" id="<?php echo $DeId; ?>M8_De<?php echo $Sn; ?>" value="<?php if($resP0d['M8_Ach']!='' AND $resP0d['M8_Ach']!=0){echo floatval($resP0d['M8_Ach']);} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $DeId; ?>M8_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M8_Ach']!='' AND $resP1d['M8_Ach']!=0){echo floatval($resP1d['M8_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M8_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M8']!='' AND $resP2d['M8']!=0){echo floatval($resP2d['M8']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M8_Ach']!=0){echo floatval($resP2d['M8_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M8_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M8_Proj']!='' AND $resP3d['M8_Proj']!=0){echo floatval($resP3d['M8_Proj']);} ?>"/></td><?php } ?>	  


<td><input class="Input" id="<?php echo $DeId; ?>M9_De<?php echo $Sn; ?>" value="<?php if($resP0d['M9_Ach']!='' AND $resP0d['M9_Ach']!=0){echo floatval($resP0d['M9_Ach']);} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $DeId; ?>M9_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M9_Ach']!='' AND $resP1d['M9_Ach']!=0){echo floatval($resP1d['M9_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M9_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M9']!='' AND $resP2d['M9']!=0){echo floatval($resP2d['M9']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M9_Ach']!=0){echo floatval($resP2d['M9_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M9_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M9_Proj']!='' AND $resP3d['M9_Proj']!=0){echo floatval($resP3d['M9_Proj']);} ?>"/></td><?php } ?>	  

	 
<td><input class="Input" id="<?php echo $DeId; ?>M10_De<?php echo $Sn; ?>" value="<?php if($resP0d['M10_Ach']!='' AND $resP0d['M10_Ach']!=0){echo floatval($resP0d['M10_Ach']);} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $DeId; ?>M10_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M10_Ach']!='' AND $resP1d['M10_Ach']!=0){echo floatval($resP1d['M10_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M10_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M10']!='' AND $resP2d['M10']!=0){echo floatval($resP2d['M10']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M10_Ach']!=0){echo floatval($resP2d['M10_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M10_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M10_Proj']!='' AND $resP3d['M10_Proj']!=0){echo floatval($resP3d['M10_Proj']);} ?>"/></td><?php } ?>	  


<td><input class="Input" id="<?php echo $DeId; ?>M11_De<?php echo $Sn; ?>" value="<?php if($resP0d['M11_Ach']!='' AND $resP0d['M11_Ach']!=0){echo floatval($resP0d['M11_Ach']);} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $DeId; ?>M11_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M11_Ach']!='' AND $resP1d['M11_Ach']!=0){echo floatval($resP1d['M11_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M11_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M11']!='' AND $resP2d['M11']!=0){echo floatval($resP2d['M11']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M11_Ach']!=0){echo floatval($resP2d['M11_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M11_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M11_Proj']!='' AND $resP3d['M11_Proj']!=0){echo floatval($resP3d['M11_Proj']);} ?>"/></td><?php } ?>	  


<td><input class="Input" id="<?php echo $DeId; ?>M12_De<?php echo $Sn; ?>" value="<?php if($resP0d['M12_Ach']!='' AND $resP0d['M12_Ach']!=0){echo floatval($resP0d['M12_Ach']);} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $DeId; ?>M12_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M12_Ach']!='' AND $resP1d['M12_Ach']!=0){echo floatval($resP1d['M12_Ach']);} ?>" readonly/></td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M12_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M12']!='' AND $resP2d['M12']!=0){echo floatval($resP2d['M12']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:60px;" value="<?php if($resP2d['M12_Ach']!=0){echo floatval($resP2d['M12_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Inputi" id="<?php echo $DeId; ?>M12_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M12_Proj']!='' AND $resP3d['M12_Proj']!=0){echo floatval($resP3d['M12_Proj']);} ?>"/></td><?php } ?>	  
 
<?php 
$TotP0d=$resP0d['M1_Ach']+$resP0d['M2_Ach']+$resP0d['M3_Ach']+$resP0d['M4_Ach']+$resP0d['M5_Ach']+$resP0d['M6_Ach']+$resP0d['M7_Ach']+$resP0d['M8_Ach']+$resP0d['M9_Ach']+$resP0d['M10_Ach']+$resP0d['M11_Ach']+$resP0d['M12_Ach']; 
$TotP1d=$resP1d['M1_Ach']+$resP1d['M2_Ach']+$resP1d['M3_Ach']+$resP1d['M4_Ach']+$resP1d['M5_Ach']+$resP1d['M6_Ach']+$resP1d['M7_Ach']+$resP1d['M8_Ach']+$resP1d['M9_Ach']+$resP1d['M10_Ach']+$resP1d['M11_Ach']+$resP1d['M12_Ach']; 
$TotP2d=$resP2d['M1']+$resP2d['M2']+$resP2d['M3']+$resP2d['M4']+$resP2d['M5']+$resP2d['M6']+$resP2d['M7']+$resP2d['M8']+$resP2d['M9']+$resP2d['M10']+$resP2d['M11']+$resP2d['M12']; 
$TotP2dch=$resP2d['M1_Ach']+$resP2d['M2_Ach']+$resP2d['M3_Ach']+$resP2d['M4_Ach']+$resP2d['M5_Ach']+$resP2d['M6_Ach']+$resP2d['M7_Ach']+$resP2d['M8_Ach']+$resP2d['M9_Ach']+$resP2d['M10_Ach']+$resP2d['M11_Ach']+$resP2d['M12_Ach']; 
$TotP3d=$resP3d['M1_Proj']+$resP3d['M2_Proj']+$resP3d['M3_Proj']+$resP3d['M4_Proj']+$resP3d['M5_Proj']+$resP3d['M6_Proj']+$resP3d['M7_Proj']+$resP3d['M8_Proj']+$resP3d['M9_Proj']+$resP3d['M10_Proj']+$resP3d['M11_Proj']+$resP3d['M12_Proj'];
?>	 
<td><input class="InputB" id="<?php echo $DeId; ?>TotP0d_<?php echo $Sn; ?>" value="<?php if($TotP0d!=0 AND $TotP0d!=''){echo floatval($TotP0d);}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="<?php echo $DeId; ?>TotP1d_<?php echo $Sn; ?>" value="<?php if($TotP1d!=0 AND $TotP1d!=''){echo floatval($TotP1d);}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="<?php echo $DeId; ?>TotP2d_<?php echo $Sn; ?>" value="<?php if($TotP2d!=0 AND $TotP2d!=''){echo floatval($TotP2d);}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="InputBc" value="<?php if($TotP2dch!=0){echo floatval($TotP2dch);}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="InputB" id="<?php echo $DeId; ?>TotP3d_<?php echo $Sn; ?>" value="<?php if($TotP3d!=0 AND $TotP3d!=''){echo floatval($TotP3d);}else{echo '';} ?>" readonly/></td><?php } ?>	  
	
  </tr>	
<?php } $Sn++; }  ?>     
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){ 
$sqlP0td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId where sd.DealerId=".$resDeal['DealerId']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$Before2YId, $con);
$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId where sd.DealerId=".$resDeal['DealerId']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$BeforeYId, $con); 
$sqlP2td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId where sd.DealerId=".$resDeal['DealerId']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con);

$sqlP2tdch=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId where sd.DealerId=".$resDeal['DealerId']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con);

$sqlP3td=mysql_query("select SUM(M1_Proj) as tsM1,SUM(M2_Proj) as tsM2,SUM(M3_Proj) as tsM3,SUM(M4_Proj) as tsM4,SUM(M5_Proj) as tsM5,SUM(M6_Proj) as tsM6,SUM(M7_Proj) as tsM7,SUM(M8_Proj) as tsM8,SUM(M9_Proj) as tsM9,SUM(M10_Proj) as tsM10,SUM(M10_Proj) as tsM10,SUM(M11_Proj) as tsM11,SUM(M12_Proj) as tsM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId where sd.DealerId=".$resDeal['DealerId']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); 
$resP0td=mysql_fetch_assoc($sqlP0td); $resP1td=mysql_fetch_assoc($sqlP1td); $resP2td=mysql_fetch_assoc($sqlP2td); 
$resP2tdch=mysql_fetch_assoc($sqlP2tdch); $resP3td=mysql_fetch_assoc($sqlP3td);
?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	  <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
     <td><input class="TInput" id="<?php echo $DeId; ?>M1_DeT" value="<?php if($resP0td['tsM1']!=0){echo floatval($resP0td['tsM1']);} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $DeId; ?>M1_AeT" value="<?php if($resP1td['tsM1']!=0){echo floatval($resP1td['tsM1']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M1_BeT" value="<?php if($resP2td['tsM1']!=0){echo floatval($resP2td['tsM1']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM1']!=0){echo floatval($resP2tdch['tsM1']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M1_CeT" value="<?php if($resP3td['tsM1']!=0){echo floatval($resP3td['tsM1']);} ?>" readonly/></td><?php } ?>	  
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M2_DeT" value="<?php if($resP0td['tsM2']!=0){echo floatval($resP0td['tsM2']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M2_AeT" value="<?php if($resP1td['tsM2']!=0){echo floatval($resP1td['tsM2']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M2_BeT" value="<?php if($resP2td['tsM2']!=0){echo floatval($resP2td['tsM2']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM2']!=0){echo floatval($resP2tdch['tsM2']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M2_CeT" value="<?php if($resP3td['tsM2']!=0){echo floatval($resP3td['tsM2']);} ?>" readonly/></td><?php } ?>	  	 
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M3_DeT" value="<?php if($resP0td['tsM3']!=0){echo floatval($resP0td['tsM3']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M3_AeT" value="<?php if($resP1td['tsM3']!=0){echo floatval($resP1td['tsM3']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M3_BeT" value="<?php if($resP2td['tsM3']!=0){echo floatval($resP2td['tsM3']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM3']!=0){echo floatval($resP2tdch['tsM3']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M3_CeT" value="<?php if($resP3td['tsM3']!=0){echo floatval($resP3td['tsM3']);} ?>" readonly/></td><?php } ?>	  	 
	 				
     <td><input class="TInput" id="<?php echo $DeId; ?>M4_DeT" value="<?php if($resP0td['tsM4']!=0){echo floatval($resP0td['tsM4']);} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $DeId; ?>M4_AeT" value="<?php if($resP1td['tsM4']!=0){echo floatval($resP1td['tsM4']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M4_BeT" value="<?php if($resP2td['tsM4']!=0){echo floatval($resP2td['tsM4']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM4']!=0){echo floatval($resP2tdch['tsM4']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M4_CeT" value="<?php if($resP3td['tsM4']!=0){echo floatval($resP3td['tsM4']);} ?>" readonly/></td><?php } ?>	 
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M5_DeT" value="<?php if($resP0td['tsM5']!=0){echo floatval($resP0td['tsM5']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M5_AeT" value="<?php if($resP1td['tsM5']!=0){echo floatval($resP1td['tsM5']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M5_BeT" value="<?php if($resP2td['tsM5']!=0){echo floatval($resP2td['tsM5']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM5']!=0){echo floatval($resP2tdch['tsM5']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M5_CeT" value="<?php if($resP3td['tsM5']!=0){echo floatval($resP3td['tsM5']);} ?>" readonly/></td><?php } ?>	 
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M6_DeT" value="<?php if($resP0td['tsM6']!=0){echo floatval($resP0td['tsM6']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M6_AeT" value="<?php if($resP1td['tsM6']!=0){echo floatval($resP1td['tsM6']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M6_BeT" value="<?php if($resP2td['tsM6']!=0){echo floatval($resP2td['tsM6']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM6']!=0){echo floatval($resP2tdch['tsM6']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M6_CeT" value="<?php if($resP3td['tsM6']!=0){echo floatval($resP3td['tsM6']);} ?>" readonly/></td><?php } ?>	 
	 	
     <td><input class="TInput" id="<?php echo $DeId; ?>M7_DeT" value="<?php if($resP0td['tsM7']!=0){echo floatval($resP0td['tsM7']);} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $DeId; ?>M7_AeT" value="<?php if($resP1td['tsM7']!=0){echo floatval($resP1td['tsM7']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M7_BeT" value="<?php if($resP2td['tsM7']!=0){echo floatval($resP2td['tsM7']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM7']!=0){echo floatval($resP2tdch['tsM7']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M7_CeT" value="<?php if($resP3td['tsM7']!=0){echo floatval($resP3td['tsM7']);} ?>" readonly/></td><?php } ?>	 
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M8_DeT" value="<?php if($resP0td['tsM8']!=0){echo floatval($resP0td['tsM8']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M8_AeT" value="<?php if($resP1td['tsM8']!=0){echo floatval($resP1td['tsM8']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M8_BeT" value="<?php if($resP2td['tsM8']!=0){echo floatval($resP2td['tsM8']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM8']!=0){echo floatval($resP2tdch['tsM8']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M8_CeT" value="<?php if($resP3td['tsM8']!=0){echo floatval($resP3td['tsM8']);} ?>" readonly/></td><?php } ?>	 
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M9_DeT" value="<?php if($resP0td['tsM9']!=0){echo floatval($resP0td['tsM9']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M9_AeT" value="<?php if($resP1td['tsM9']!=0){echo floatval($resP1td['tsM9']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M9_BeT" value="<?php if($resP2td['tsM9']!=0){echo floatval($resP2td['tsM9']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM9']!=0){echo floatval($resP2tdch['tsM9']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M9_CeT" value="<?php if($resP3td['tsM9']!=0){echo floatval($resP3td['tsM9']);} ?>" readonly/></td><?php } ?>	 
	 
     <td><input class="TInput" id="<?php echo $DeId; ?>M10_DeT" value="<?php if($resP0td['tsM10']!=0){echo floatval($resP0td['tsM10']);} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $DeId; ?>M10_AeT" value="<?php if($resP1td['tsM10']!=0){echo floatval($resP1td['tsM10']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M10_BeT" value="<?php if($resP2td['tsM10']!=0){echo floatval($resP2td['tsM10']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM10']!=0){echo floatval($resP2tdch['tsM10']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M10_CeT" value="<?php if($resP3td['tsM10']!=0){echo floatval($resP3td['tsM10']);} ?>" readonly/></td><?php } ?>	 
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M11_DeT" value="<?php if($resP0td['tsM11']!=0){echo floatval($resP0td['tsM11']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M11_AeT" value="<?php if($resP1td['tsM11']!=0){echo floatval($resP1td['tsM11']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M11_BeT" value="<?php if($resP2td['tsM11']!=0){echo floatval($resP2td['tsM11']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM11']!=0){echo floatval($resP2tdch['tsM11']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M11_CeT" value="<?php if($resP3td['tsM11']!=0){echo floatval($resP3td['tsM11']);} ?>" readonly/></td><?php } ?>	 
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M12_DeT" value="<?php if($resP0td['tsM12']!=0){echo floatval($resP0td['tsM12']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M12_AeT" value="<?php if($resP1td['tsM12']!=0){echo floatval($resP1td['tsM12']);} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M12_BeT" value="<?php if($resP2td['tsM12']!=0){echo floatval($resP2td['tsM12']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2tdch['tsM12']!=0){echo floatval($resP2tdch['tsM12']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M12_CeT" value="<?php if($resP3td['tsM12']!=0){echo floatval($resP3td['tsM12']);} ?>" readonly/></td><?php } ?>	 
	
<?php 
$TotP0td=$resP0td['tsM1']+$resP0td['tsM2']+$resP0td['tsM3']+$resP0td['tsM4']+$resP0td['tsM5']+$resP0td['tsM6']+$resP0td['tsM7']+$resP0td['tsM8']+$resP0td['tsM9']+$resP0td['tsM10']+$resP0td['tsM11']+$resP0td['tsM12']; 
$TotP1td=$resP1td['tsM1']+$resP1td['tsM2']+$resP1td['tsM3']+$resP1td['tsM4']+$resP1td['tsM5']+$resP1td['tsM6']+$resP1td['tsM7']+$resP1td['tsM8']+$resP1td['tsM9']+$resP1td['tsM10']+$resP1td['tsM11']+$resP1td['tsM12']; 
$TotP2td=$resP2td['tsM1']+$resP2td['tsM2']+$resP2td['tsM3']+$resP2td['tsM4']+$resP2td['tsM5']+$resP2td['tsM6']+$resP2td['tsM7']+$resP2td['tsM8']+$resP2td['tsM9']+$resP2td['tsM10']+$resP2td['tsM11']+$resP2td['tsM12']; 
$TotP2tdch=$resP2tdch['tsM1']+$resP2tdch['tsM2']+$resP2tdch['tsM3']+$resP2tdch['tsM4']+$resP2tdch['tsM5']+$resP2tdch['tsM6']+$resP2tdch['tsM7']+$resP2tdch['tsM8']+$resP2tdch['tsM9']+$resP2tdch['tsM10']+$resP2tdch['tsM11']+$resP2tdch['tsM12']; 
$TotP3td=$resP3td['tsM1']+$resP3td['tsM2']+$resP3td['tsM3']+$resP3td['tsM4']+$resP3td['tsM5']+$resP3td['tsM6']+$resP3td['tsM7']+$resP3td['tsM8']+$resP3td['tsM9']+$resP3td['tsM10']+$resP3td['tsM11']+$resP3td['tsM12'];
?>
      <td><input class="TInput" id="<?php echo $DeId; ?>TotM_DeT" value="<?php if($TotP0td!=0 AND $TotP0td!=''){echo floatval($TotP0td);}else{echo '';} ?>" readonly/></td>
      <td><input class="TInput" id="<?php echo $DeId; ?>TotM_AeT" value="<?php if($TotP1td!=0 AND $TotP1td!=''){echo floatval($TotP1td);}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $DeId; ?>TotM_BeT" value="<?php if($TotP2td!=0 AND $TotP2td!=''){echo floatval($TotP2td);}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TotP2tdch!=0){echo floatval($TotP2tdch);}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>TotM_CeT" value="<?php if($TotP3td!=0 AND $TotP3td!=''){echo floatval($TotP3td);}else{echo '';} ?>" readonly/></td><?php } ?>	  
  </tr>	
<?php } ?>  
</table>
</div>
</div>	       
   </td>  
  </tr>
 </table>
</tr>
<?php } /*********** Close Dealer **********/ ?>   	
  </table>
</td>

</tr>
<tr><td>&nbsp;</td></tr>
<?php } ?>
<?php } ?>
<?php /***************************************** Main Page Close **************************************/ ?>    
	 </table>
   </td>
  </tr>
<?php //********************************* Close ************************************************* ?>
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

