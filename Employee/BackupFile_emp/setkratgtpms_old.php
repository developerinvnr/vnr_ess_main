<?php session_start();
require_once('../AdminUser/config/config.php');
if($_REQUEST['n']==1){ $fn='KRAId'; $sqlk=mysql_query("select KRA,KRA_Description from hrm_pms_kra where KRAId=".$_REQUEST['kid'],$con); }elseif($_REQUEST['n']==2){ $fn='KRASubId'; $sqlk=mysql_query("select KRA,KRA_Description from hrm_pms_krasub where KRASubId=".$_REQUEST['kid'],$con); } $resk=mysql_fetch_assoc($sqlk);

if($_REQUEST['prd']=='Monthly')
{ $countrow=12; $tit='Month'; $num=12; $tgt=round(($_REQUEST['tgt']/12),2); $wgt=round(($_REQUEST['wgt']/12),2); }
elseif($_REQUEST['prd']=='Quarter')
{ $countrow=4; $tit='Quarter'; $num=4; $tgt=round($_REQUEST['tgt']/4); $wgt=round(($_REQUEST['wgt']/4),2); }
elseif($_REQUEST['prd']=='1/2 Annual')
{ $countrow=2; $tit='Year'; $num=2; $tgt=round($_REQUEST['tgt']/2); $wgt=round(($_REQUEST['wgt']/2),2); } 

if(isset($_POST['subsave']))
{
 for($i=1; $i<=$_POST['TotRow']; $i++)
 {
   $sqlchk=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_POST['Idd']." AND NtgtN=".$_POST['NtgtN'.$i],$con); $row=mysql_num_rows($sqlchk);
   if($row>0)
   { 
    $upIn=mysql_query("update hrm_pms_kra_tgtdefin set Remark='".$_POST['Remark'.$i]."', Ldate='".$_POST['ld'.$i]."', Wgt='".$_POST['wgt'.$i]."', Tgt='".$_POST['tgt'.$i]."' where ".$fn."=".$_POST['Idd']." AND NtgtN=".$_POST['NtgtN'.$i]);
   }
   else
   {
    $upIn=mysql_query("insert into hrm_pms_kra_tgtdefin(".$fn.", Tital, Ldate, Wgt, Tgt, NtgtN, Remark) values(".$_POST['Idd'].", '".$_POST['tit'.$i]."', '".$_POST['ld'.$i]."', '".$_POST['wgt'.$i]."', '".$_POST['tgt'.$i]."', ".$_POST['NtgtN'.$i].", '".$_POST['Remark'.$i]."')",$con);
   } 
 }
 if($upIn){echo '<script>alert("Data save successfully");</script>';}
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Target Define</title>
<style>.h{font-size:16px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFF;}
.t{font-size:12px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFFFFF;}
.d{font-size:12px;font-family:Georgia;color:#000000;}
</style>
<script type="text/javascript" src="js/Prototype.js"></script><?php /* Ajax */ ?>
<script type="text/javascript" language="javascript">
function EditTgtDef()
{
 document.getElementById("subedit").style.display='none'; document.getElementById("subsave").style.display='block';
 for(var i=1; i<=document.getElementById("numr").value; i++)
 { document.getElementById("Remark"+i).readOnly=false; document.getElementById("Remark"+i).style.background='#FFF';
   document.getElementById("TDD"+i).style.background='#FFF'; }
}

function ValidatCmt(TgtForm)
{
 for(var i=1; i<=document.getElementById("numr").value; i++)
 { 
  if(document.getElementById("Remark"+i).value==''){alert("please enter comment for row "+i+"."); return false;}
 }
}

function FunEdit(i)
{
 document.getElementById("edit_"+i).style.display='none'; document.getElementById("save_"+i).style.display='block';
 document.getElementById("Ach"+i).readOnly=false; document.getElementById("Ach"+i).style.background='#FFF';
 document.getElementById("Cmnt"+i).readOnly=false; document.getElementById("Cmnt"+i).style.background='#FFF';
 document.getElementById("TD1"+i).style.background='#FFF'; document.getElementById("TD2"+i).style.background='#FFF';
}

function FunSave(i,id)
{
 var ach=document.getElementById("Ach"+i).value; var cmnt=document.getElementById("Cmnt"+i).value;
 var LogScr=document.getElementById("LogScr"+i).value; var Scor=document.getElementById("Scor"+i).value; 
 var fn=document.getElementById("fn").value; var kid=document.getElementById("kid").value;
 
 if(ach==''){ alert("please insert self rating"); return false;} 
 else if(cmnt==''){ alert("please type remark"); return false;}
 else
 {
  var cmt=cmnt.replace(/[`~!@#$^&*_|+\-=???;:'"<>\{\}\[\]\\\/]/gi, ''); 
  var url = 'setkratgtactpms.php'; var pars = 'ach='+ach+'&cmnt='+cmt+'&id='+id+'&i='+i+'&fn='+fn+'&kid='+kid+'&scor='+Scor+'&logscr='+LogScr;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result });
 }
}
function show_result(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; 
  var i=document.getElementById('ir').value; var rst=document.getElementById('rst').value;
  if(rst==1)
  {
   alert("Data save/update successfully!"); 
   //document.getElementById("totAch").value=document.getElementById("tAch").value;
   document.getElementById("edit_"+i).style.display='block'; document.getElementById("save_"+i).style.display='none'; 
   document.getElementById("Ach"+i).readOnly=true; document.getElementById("Ach"+i).style.background='#D5FFAA';
   document.getElementById("Cmnt"+i).readOnly=true; document.getElementById("Cmnt"+i).style.background='#D5FFAA';
   document.getElementById("TD1"+i).style.background='#D5FFAA'; document.getElementById("TD2"+i).style.background='#D5FFAA';
   document.getElementById("lockk_"+i).style.display='block';
  }
}

function FunLk(i,id)
{
  var agree=confirm("Are you sure?");
  if(agree)
  {
   var url = 'setkratgtactpms.php'; var pars = 'lockk=OkLock&id='+id+'&i='+i;
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result2 });
  }
  else{return false;}
}
function show_result2(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; 
  var i2=document.getElementById('ir2').value; var rst2=document.getElementById('rst2').value;
  if(rst2==1)
  {
   alert("Achivement submit successfully!"); 
   document.getElementById("edit_"+i2).style.display='none'; 
   document.getElementById("lockk_"+i2).style.display='none'; document.getElementById("ok_"+i2).style.display='block';
  }
}

function FunEnterAch(v,i) //LogScr Scor
{ 
 var lgc=document.getElementById("lgc").value; var wgt=document.getElementById("wgt"+i).value; 
 var ach=parseFloat(v); var tgt=parseFloat(document.getElementById("tgt"+i).value); 
 var EAch=document.getElementById("AchScore"+i).value=ach;
 
 if(lgc=='Logic1')
 { 
  //var Per50=Math.round((tgt/2)*100)/100; var Per150=Math.round((tgt+Per50)*100)/100;
  var Per50=Math.round(((tgt*20)/100)*100)/100; var Per150=Math.round((tgt+Per50)*100)/100;
  if(ach<=Per150){var EScore=document.getElementById("LogScr"+i).value=ach;}
  else{var EScore=document.getElementById("LogScr"+i).value=Per150;} 
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic2')
 {
  if(ach<=tgt){var EScore=document.getElementById("LogScr"+i).value=ach;}
  else{var EScore=document.getElementById("LogScr"+i).value=tgt;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic3')
 {
  if(ach==tgt){var EScore=document.getElementById("LogScr"+i).value=ach;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic4')
 {
  if(ach>=tgt){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic5')
 {
   var Per30=Math.round(((tgt*30)/100)*100)/100; var Per70=Math.round((tgt-Per30)*100)/100;
   if(ach>=Per70 && ach<tgt){var EScore=document.getElementById("LogScr"+i).value=ach;}
   else if(ach>=tgt){var EScore=document.getElementById("LogScr"+i).value=tgt;}
   else{var EScore=document.getElementById("LogScr"+i).value=0;}
   var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
  
 //var EScore=document.getElementById("Scor"+i).value=Math.round(((ach/tgt)*wgt)*100)/100; 
 //var Score=document.getElementById("KraScore"+i).value=Math.round((EScore)*100)/100;
  
 var num=document.getElementById("numr").value;
 if(num==2)
 {
  var a1= parseFloat(document.getElementById("Ach"+1).value); var a2= parseFloat(document.getElementById("Ach"+2).value); var s1= parseFloat(document.getElementById("LogScr"+1).value); var s2= parseFloat(document.getElementById("LogScr"+2).value);  var t1= parseFloat(document.getElementById("Scor"+1).value); var t2= parseFloat(document.getElementById("Scor"+2).value); 
  document.getElementById("totAch").value=Math.round((a1+a2)*100)/100; 
  document.getElementById("TotLogScr").value=Math.round((s1+s2)*100)/100;
  document.getElementById("TotScore").value=Math.round((t1+t2)*100)/100;
 }
 else if(num==4)
 {
  var a1= parseFloat(document.getElementById("Ach"+1).value); var a2= parseFloat(document.getElementById("Ach"+2).value); var a3= parseFloat(document.getElementById("Ach"+3).value); var a4= parseFloat(document.getElementById("Ach"+4).value); var s1= parseFloat(document.getElementById("LogScr"+1).value); var s2= parseFloat(document.getElementById("LogScr"+2).value); var s3= parseFloat(document.getElementById("LogScr"+3).value); var s4= parseFloat(document.getElementById("LogScr"+4).value); var t1= parseFloat(document.getElementById("Scor"+1).value); var t2= parseFloat(document.getElementById("Scor"+2).value); var t3= parseFloat(document.getElementById("Scor"+3).value); var t4= parseFloat(document.getElementById("Scor"+4).value);
  document.getElementById("totAch").value=Math.round((a1+a2+a3+a4)*100)/100; 
  document.getElementById("TotLogScr").value=Math.round((s1+s2+s3+s4)*100)/100;
  document.getElementById("TotScore").value=Math.round((t1+t2+t3+t4)*100)/100;
 }
 else if(num==12)
 {
  var a1= parseFloat(document.getElementById("Ach"+1).value); var a2= parseFloat(document.getElementById("Ach"+2).value); var a3= parseFloat(document.getElementById("Ach"+3).value); var a4= parseFloat(document.getElementById("Ach"+4).value); var a5= parseFloat(document.getElementById("Ach"+5).value); var a6= parseFloat(document.getElementById("Ach"+6).value); var a7= parseFloat(document.getElementById("Ach"+7).value); var a8= parseFloat(document.getElementById("Ach"+8).value); var a9= parseFloat(document.getElementById("Ach"+9).value); var a10= parseFloat(document.getElementById("Ach"+10).value); var a11= parseFloat(document.getElementById("Ach"+11).value); var a12= parseFloat(document.getElementById("Ach"+12).value); var s1= parseFloat(document.getElementById("LogScr"+1).value); var s2= parseFloat(document.getElementById("LogScr"+2).value); var s3= parseFloat(document.getElementById("LogScr"+3).value); var s4= parseFloat(document.getElementById("LogScr"+4).value); var s5= parseFloat(document.getElementById("LogScr"+5).value); var s6= parseFloat(document.getElementById("LogScr"+6).value); var s7= parseFloat(document.getElementById("LogScr"+7).value); var s8= parseFloat(document.getElementById("LogScr"+8).value); var s9= parseFloat(document.getElementById("LogScr"+9).value); var s10= parseFloat(document.getElementById("LogScr"+10).value); var s11= parseFloat(document.getElementById("LogScr"+11).value); var s12= parseFloat(document.getElementById("LogScr"+12).value); var t1= parseFloat(document.getElementById("Scor"+1).value); var t2= parseFloat(document.getElementById("Scor"+2).value); var t3= parseFloat(document.getElementById("Scor"+3).value); var t4= parseFloat(document.getElementById("Scor"+4).value); var t5= parseFloat(document.getElementById("Scor"+5).value); var t6= parseFloat(document.getElementById("Scor"+6).value); var t7= parseFloat(document.getElementById("Scor"+7).value); var t8= parseFloat(document.getElementById("Scor"+7).value); var t9= parseFloat(document.getElementById("Scor"+9).value); var t10= parseFloat(document.getElementById("Scor"+10).value); var t11= parseFloat(document.getElementById("Scor"+11).value); var t12= parseFloat(document.getElementById("Scor"+12).value);
  document.getElementById("totAch").value=Math.round((a1+a2+a3+a4+a5+a6+a7+a8+a9+a10+a11+a12)*100)/100;
  document.getElementById("TotLogScr").value=Math.round((s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12)*100)/100;
  document.getElementById("TotScore").value=Math.round((t1+t2+t3+t4+t5+t6+t7+t8+t9+t10+t11+t12)*100)/100;
 }
 
 
 

}

function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
  return false; return true;
}

</script>
</head>
<body bgcolor="#6C6C00">
<span id="ResultSpan"></span>
<?php for($i=1; $i<=12; $i++){ ?>
<input type="hidden" id="AchScore<?php echo $i; ?>" value="0" />
<input type="hidden" id="KraScore<?php echo $i; ?>" value="0" />
<?php } ?>
<center>
<table style="width:100%;">
 <tr>
  <td style="width:100%;" valign="top">
   <table align="center" border="0" cellspacing="1">
    <tr><td colspan="10" class="h"><u>Define Target</u></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td colspan="10"><font color="#9BFFFF">Logic:</font>&nbsp;<font color="#FFFFFF"><?php echo $_REQUEST['lgc']; ?></font>&nbsp;,&nbsp;<font color="#9BFFFF">KRA:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['KRA']; ?></font></td></tr><tr><td colspan="10"><font color="#9BFFFF">Description:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['KRA_Description']; ?></td></font></tr>	
    <tr style="background-color:#CC9900;height:25px;">
	 <td rowspan="2" class="t" style="width:40px;">Sn</td>
	 <td rowspan="2" class="t" style="width:80px;"><?php echo $tit; ?></td>
	 <td rowspan="2" class="t" style="width:60px;">Weigh<br>tage</td>
	 <td rowspan="2" class="t" style="width:60px;">Target</td>
	 <td rowspan="2" class="t" style="width:300px;">Comment</td>
	 <td colspan="3" class="t" style="width:60px;">Achivement</td>
	 <td rowspan="2" class="t" style="width:50px;">Edit</td>
	 <td rowspan="2" class="t" style="width:50px;">Submit</td>
	</tr>
	<tr style="background-color:#9FCFFF;height:25px;">
	 
	 <td class="t" style="width:60px;color:#000000;">Self Rating</td>
	 <td class="t" style="width:300px;color:#000000;">Remark</td>
	 <!--<td class="t" style="width:60px;color:#000000;">Allow Logic</td>-->
	 <td class="t" style="width:60px;color:#000000;">Score</td>
	</tr>
<form name="TgtForm" method="post" onSubmit="return ValidatCmt(this)">	
<input type="hidden" name="numr" id="numr" value="<?php echo $num; ?>"/>
<input type="hidden" name="fn" id="fn" value="<?php echo $fn; ?>"/>
<input type="hidden" name="kid" id="kid" value="<?php echo $_REQUEST['kid']; ?>"/>
<input type="hidden" name="lgc" id="lgc" value="<?php echo $_REQUEST['lgc']; ?>"/>
<input type="hidden" name="wgt" id="wgt" value="<?php echo $_REQUEST['wgt']; ?>"/>

<?php 
 $sql=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid'],$con); $row=mysql_num_rows($sql); 
 if($countrow!=$row){ $del=mysql_query("delete from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid'],$con); }
?>

	<?php for($i=1; $i<=$num; $i++){ ?>
	<tr style="background-color:#FFFFFF;height:24px;">
	 <td class="d" align="center"><?php echo $i; ?></td>
	 <td class="d" align="center">
	  <?php 
	    if($_REQUEST['prd']=='Monthly'){ if($i==1){$t='January'; $ld=date("Y-02-28"); }elseif($i==2){$t='February'; $ld=date("Y-02-28"); }elseif($i==3){$t='March'; $ld=date("Y-03-31"); }elseif($i==4){$t='April';$ld=date("Y-04-30"); }elseif($i==5){$t='May'; $ld=date("Y-05-31"); }elseif($i==6){$t='June'; $ld=date("Y-06-30"); }elseif($i==7){$t='July'; $ld=date("Y-07-31"); }elseif($i==8){$t='August'; $ld=date("Y-08-31"); }elseif($i==9){$t='September'; $ld=date("Y-09-30"); }elseif($i==10){$t='October'; $ld=date("Y-10-31"); }elseif($i==11){$t='November'; $ld=date("Y-11-30"); }elseif($i==12){$t='December'; $ld=date("Y-12-31"); } }	
        elseif($_REQUEST['prd']=='Quarter'){ if($i==1){$t='Quarter 1'; $ld=date("Y-03-31"); }elseif($i==2){$t='Quarter 2'; $ld=date("Y-06-30"); }elseif($i==3){$t='Quarter 3'; $ld=date("Y-09-30"); }elseif($i==4){$t='Quarter 4'; $ld=date("Y-12-31"); } }
        elseif($_REQUEST['prd']=='1/2 Annual'){ if($i==1){$t='Half Year 1'; $ld=date("Y-06-30"); }elseif($i==2){$t='Half Year 2'; $ld=date("Y-12-31"); } }
		
		echo $t; ?><input type="hidden" name="tit<?php echo $i; ?>" value="<?php echo $t; ?>"/>
	 </td>
	 <td class="d" align="center"><?php echo $wgt; ?></td>
	 <td class="d" align="center"><?php echo $tgt; ?>
	 <input type="hidden" id="wgt<?php echo $i; ?>" name="wgt<?php echo $i; ?>" value="<?php echo $wgt; ?>"/>
	 <input type="hidden" id="tgt<?php echo $i; ?>" name="tgt<?php echo $i; ?>" value="<?php echo $tgt; ?>"/>
	 <input type="hidden" id="NtgtN<?php echo $i; ?>" name="NtgtN<?php echo $i; ?>" value="<?php echo $i; ?>"/>
	 </td>
	 
<?php $sql=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid']." AND Tital='".$t."' AND NtgtN='".$i."'",$con); $row=mysql_num_rows($sql); $res=mysql_fetch_assoc($sql); ?>  

	 <td class="d" bgcolor="#FFFFC6" id="TDD<?php echo $i; ?>" valign="top"><textarea type="text" name="Remark<?php echo $i; ?>" id="Remark<?php echo $i; ?>" class="d" rows="2" style="width:300px;border:hidden;background-color:#FFFFC6;"><?php echo $res['Remark']; ?></textarea>
	 
	 <input type="hidden" name="ld<?php echo $i; ?>" value="<?php if($row>0 AND $res['Ldate']!='0000-00-00' AND $res['Ldate']!='1970-01-01'){ echo $res['Ldate']; }else{ echo $ld; } ?>"/>
	 </td>
	 
	 <td class="d" bgcolor="#D5FFAA" id="TD1<?php echo $i; ?>"><input type="text" name="Ach<?php echo $i; ?>" id="Ach<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" onKeyUp="FunEnterAch(this.value,<?php echo $i; ?>)" onChange="FunEnterAch(this.value,<?php echo $i; ?>)" value="<?php if($res['Cmnt']!=''){ echo floatval($res['Ach']); }else{echo 0;} ?>" maxlength="4" onKeyPress="return isNumberKey(event)" readonly/></td>
	 <td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>" valign="top"><textarea type="text" name="Cmnt<?php echo $i; ?>" id="Cmnt<?php echo $i; ?>" class="d" rows="2" style="width:300px;border:hidden;background-color:#D5FFAA;"><?php echo $res['Cmnt']; ?></textarea>
	 
	 <input type="hidden" name="LogScr<?php echo $i; ?>" id="LogScr<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['LogScr']!=''){ echo $res['LogScr'];}else{echo 0;} ?>" readonly/>
	 </td>
	 <?php /*?><td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>"><input type="text" name="LogScr<?php echo $i; ?>" id="LogScr<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['LogScr']!=''){ echo $res['LogScr'];}else{echo 0;} ?>" readonly/></td><?php */?>
	 
	 
	 <td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>"><input type="text" name="Scor<?php echo $i; ?>" id="Scor<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['Scor']!=''){ echo $res['Scor'];}else{echo 0;} ?>" readonly/></td>
	 
	 
	 <td align="center">
	 <?php $Nxt10Day=date("Y-m-d",strtotime('+10 day', strtotime(date("2019-01-30"))));  //$res['Ldate'] ?>
	 <?php if($res['Tital']!='' AND $res['Tgt']!==''){ ?>
	 
	 <?php //if($res['lockk']==0 AND date("Y-m-d")<=$Nxt10Day){echo 'block';}else{echo 'none';} ?>
	  <span style="cursor:pointer"><img src="images/edit.png" border="0" id="edit_<?php echo $i; ?>" style="display:block;" onClick="FunEdit(<?php echo $i; ?>)"/></span>
	  <span style="cursor:pointer"><img src="images/Floppy-Small-icon.png" border="0" id="save_<?php echo $i; ?>" style="display:none;" onClick="FunSave(<?php echo $i.','.$res['TgtDefId']; ?>)"/></span>
	  <img src="images/lock.png" border="0" style="display:<?php if($res['lockk']==0 AND date("Y-m-d")>$Nxt10Day){echo 'block';}else{echo 'none';} ?>;" />
	 <?php } ?> 
	 </td>
	 <td align="center">
	 <img src="images/ok.png" border="0" id="ok_<?php echo $i; ?>" style="display:<?php if($res['Ach']!='' AND $res['Cmnt']!=='' AND $res['lockk']==1){echo 'block';}else{echo 'none';} ?>;"/>
	 <span style="cursor:pointer"><img src="images/sub.png" border="0" id="lockk_<?php echo $i; ?>" style="display:<?php if($res['Ach']!='' AND $res['Cmnt']!=='' AND $res['lockk']==0 AND date("Y-m-d")<=$Nxt10Day){echo 'block';}else{echo 'none';} ?>;" onClick="FunLk(<?php echo $i.','.$res['TgtDefId']; ?>)"/></span>
	 </td>
	</tr>
    <?php } ?>
	<tr style="height:24px;">
	 <td class="d" colspan="2" align="right" bgcolor="#FFFFFF"><b>Total:&nbsp;</b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php echo $_REQUEST['wgt']; ?></b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php echo $_REQUEST['tgt']; ?></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>
<?php $sqlt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid'],$con); $rest=mysql_fetch_assoc($sqlt); ?>	 
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><input type="text" id="totAch" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tAch']>0){echo floatval($rest['tAch']);} ?>" readonly/></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF">
	 <input type="hidden" id="TotLogScr" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tLogScr']>0){echo floatval($rest['tLogScr']);} ?>" readonly/>
	 </td>	 
	 <?php /*?><td class="d" align="center" bgcolor="#FFFFFF"><b><input type="text" id="TotLogScr" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tLogScr']>0){echo floatval($rest['tLogScr']);} ?>" readonly/></b></td><?php */?>	 	 
	  <td class="d" align="center" bgcolor="#FFFFFF"><b><input type="text" id="TotScore" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tScor']>0){echo floatval($rest['tScor']);} ?>" readonly/></b></td>
	 <td colspan="2" class="d" align="right" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
<?php /*?>	 <td class="d" colspan="5" align="right" bgcolor="#CC9900">
	  <input type="hidden" name="TotRow" value="<?php echo $num; ?>" />
	  <input type="hidden" name="Idd" value="<?php echo $_REQUEST['kid']; ?>" />
<?php if((date("Y-m-d")>=$_REQUEST['DateJoining'] AND date("Y-m-d")<=$_REQUEST['After31DayDoJ']) OR ($_REQUEST['CuDate']<$_REQUEST['EmpFromDate'] OR $_REQUEST['CuDate']>$_REQUEST['EmpToDate']) OR (($_REQUEST['CuDate']>=$_REQUEST['EmpFromDate'] AND $_REQUEST['CuDate']<=$_REQUEST['EmpToDate'] AND $_REQUEST['EmpDateStatus']=='A') OR ($_REQUEST['CuDate']>=$_REQUEST['AppFromDate'] AND $_REQUEST['CuDate']<=$_REQUEST['AppToDate'] AND $_REQUEST['AppDateStatus']=='A' AND $_REQUEST['EmpStatus']=='P' AND $_REQUEST['AppStatus']=='R') OR ($_REQUEST['CuDate']>=$_REQUEST['RevFromDate'] AND $_REQUEST['CuDate']<=$_REQUEST['RevToDate'] AND $_REQUEST['RevDateStatus']=='A' AND $_REQUEST['EmpStatus']=='P' AND $_REQUEST['AppStatus']=='R' AND $_REQUEST['RevStatus']=='R') OR ($_REQUEST['CuDate']>=$_REQUEST['HodFromDate'] AND $_REQUEST['CuDate']<=$_REQUEST['HodToDate'] AND $_REQUEST['HodDateStatus']=='A' AND $_REQUEST['EmpStatus']=='P' AND $_REQUEST['AppStatus']=='R' AND $_REQUEST['RevStatus']=='R' AND $_REQUEST['HODStatus']=='R') OR $_REQUEST['ExtraAllowKRA']==1)){
      if($_REQUEST['row']>0) { ?>
	  <input type="button" name="subedit" id="subedit" style="width:80px;height:25px;" value="edit" <?php if($_REQUEST['row2']>0){echo 'disabled';} ?> onClick="EditTgtDef()"/>	  
	  <input type="submit" name="subsave" id="subsave" style="width:80px;height:25px;display:none;" value="save" />
	  <?php } } ?>
	 </td><?php */?>
	 <td colspan="10" style="color:#FFFFFF;" align="right">
	 &nbsp;&nbsp;&nbsp;<img src="images/edit.png" border="0"/>&nbsp;:Edit
	 &nbsp;&nbsp;&nbsp;<img src="images/Floppy-Small-icon.png" border="0"/>&nbsp;:Save
	 &nbsp;&nbsp;&nbsp;<img src="images/sub.png" border="0"/>&nbsp;:Submit
	 &nbsp;&nbsp;&nbsp;<img src="images/ok.png" border="0"/>&nbsp;:Submitted
	 &nbsp;&nbsp;&nbsp;<img src="images/lock.png" border="0"/>&nbsp;:Lock
	 
	 </td>
	</tr>
</form>	
   </table>
  </td>
 </tr>
 <tr><td style="height:20px;">&nbsp;</td></tr>
 <?php /*?><tr>
  <td style="font-size:18px;color:#FFA275;">
   <?php 
    echo '&nbsp;&nbsp;&nbsp;<font color="#9BFFFF"><u>Note</u>:</font><br>';
	echo '&nbsp;&nbsp;&nbsp;';
    if($_REQUEST['prd']=='Monthly'){ echo 'Please fill achivement before every last day of month'; }
    elseif($_REQUEST['prd']=='Quarter'){ echo 'Please fill achivement before every last day of quarter'; }
    elseif($_REQUEST['prd']=='1/2 Annual'){ echo 'Please fill achivement before every last day of half year'; }
	echo '&nbsp;';
	echo '<u>becouse</u>, <u>if date is over</u>, system auto lock your achivement.';
   ?>
  
 </tr><?php */?>
</table>
</center>
</body>
</html>
