<?php session_start();
require_once('../AdminUser/config/config.php');
$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$_REQUEST['c']." AND Process='KRA'", $con); $resSY=mysql_fetch_array($sqlSY); $spms = mysql_query("select UnLckKRA from hrm_employee_pms where EmployeeID=".$_REQUEST['e']." AND AssessmentYear=".$resSY['CurrY'],$con); $rpms=mysql_fetch_assoc($spms); 

if($_REQUEST['n']==1){ $fn='KRAId'; $sqlk=mysql_query("select KRA,KRA_Description from hrm_pms_kra where KRAId=".$_REQUEST['kid'],$con); }elseif($_REQUEST['n']==2){ $fn='KRASubId'; $sqlk=mysql_query("select KRA,KRA_Description from hrm_pms_krasub where KRASubId=".$_REQUEST['kid'],$con); } $resk=mysql_fetch_assoc($sqlk);


$sqlDept=mysql_query("select DepartmentId,DateJoining from hrm_employee_general where EmployeeID=".$_REQUEST['e'],$con);
$resDept=mysql_fetch_assoc($sqlDept); 
$DojY=date("Y",strtotime($resDept['DateJoining'])); $DojM=date("m",strtotime($resDept['DateJoining']));
if($DojY<date("Y")){$Mnt_cal=12; $Qtr_cal=4; $Hlf_cal=2;}
else
{ //echo 'aa='.$DojM;
 if($DojM==01 OR $DojM==1){$Mnt_cal=12; $Qtr_cal=4; $Hlf_cal=2;}
 elseif($DojM==02 OR $DojM==2){$Mnt_cal=11; $Qtr_cal=4; $Hlf_cal=2;}
 elseif($DojM==03 OR $DojM==3){$Mnt_cal=10; $Qtr_cal=4; $Hlf_cal=2;}
 elseif($DojM==04 OR $DojM==4){$Mnt_cal=9; $Qtr_cal=3; $Hlf_cal=2;}
 elseif($DojM==05 OR $DojM==5){$Mnt_cal=8; $Qtr_cal=3; $Hlf_cal=2;}
 elseif($DojM==06 OR $DojM==6){$Mnt_cal=7; $Qtr_cal=3; $Hlf_cal=2;}
 elseif($DojM==07 OR $DojM==7){$Mnt_cal=6; $Qtr_cal=2; $Hlf_cal=1;}
 elseif($DojM==08 OR $DojM==8){$Mnt_cal=5; $Qtr_cal=2; $Hlf_cal=1;}
 elseif($DojM==09 OR $DojM==9){$Mnt_cal=4; $Qtr_cal=2; $Hlf_cal=1;}
 elseif($DojM==10){$Mnt_cal=3; $Qtr_cal=1; $Hlf_cal=1;}
 elseif($DojM==11){$Mnt_cal=2; $Qtr_cal=1; $Hlf_cal=1;}
 elseif($DojM==12){$Mnt_cal=1; $Qtr_cal=1; $Hlf_cal=1;}
}

//echo $resDept['DateJoining'].'-'.$DojM.'-'.$Mnt_cal.'-'.$Qtr_cal.'-'.$Hlf_cal;

if($_REQUEST['prd']=='Monthly')
{ $countrow=12; $tit='Month'; $num=12; 
  $tgt=round(($_REQUEST['tgt']/$Mnt_cal),2); $wgt=round(($_REQUEST['wgt']/$Mnt_cal),2); }
elseif($_REQUEST['prd']=='Quarter')
{ $countrow=4; $tit='Quarter'; $num=4; 
  $tgt=round($_REQUEST['tgt']/$Qtr_cal); $wgt=round(($_REQUEST['wgt']/$Qtr_cal),2); }
elseif($_REQUEST['prd']=='1/2 Annual')
{ $countrow=2; $tit='Year'; $num=2; 
  $tgt=round($_REQUEST['tgt']/$Hlf_cal); $wgt=round(($_REQUEST['wgt']/$Hlf_cal),2); } 

if(isset($_POST['subsave']))
{
 for($i=1; $i<=$_POST['TotRow']; $i++)
 {
   if($_POST['wgt'.$i]!='' AND $_POST['tgt'.$i]!='' AND $_POST['Remark'.$i]!='')
   {
   
    $sqlchk=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_POST['Idd']." AND NtgtN=".$_POST['NtgtN'.$i],$con); $row=mysql_num_rows($sqlchk);
    if($row>0)
    { 
     $upIn=mysql_query("update hrm_pms_kra_tgtdefin set Remark='".addslashes($_POST['Remark'.$i])."', Ldate='".$_POST['ld'.$i]."', Wgt='".$_POST['wgt'.$i]."', Tgt='".$_POST['tgt'.$i]."' where ".$fn."=".$_POST['Idd']." AND NtgtN=".$_POST['NtgtN'.$i]);
    }
    else
    {
     $upIn=mysql_query("insert into hrm_pms_kra_tgtdefin(".$fn.", Tital, Ldate, Wgt, Tgt, NtgtN, Remark) values(".$_POST['Idd'].", '".$_POST['tit'.$i]."', '".$_POST['ld'.$i]."', '".$_POST['wgt'.$i]."', '".$_POST['tgt'.$i]."', ".$_POST['NtgtN'.$i].", '".addslashes($_POST['Remark'.$i])."')",$con);
    }
	
   } //if($_POST['wgt'.$i]!='' AND $_POST['tgt'.$i]!='' AND $_POST['Remark'.$i]!='')	 
 }
 if($upIn){echo '<script>alert("Data save successfully");</script>';}
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="windows-1252">
<title>Target Define</title>
<style>.h{font-size:16px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFF;}
.t{font-size:12px;font-family:Georgia;text-align:center;font-weight:bold;color:#FFFFFF;}
.d{font-size:12px;font-family:Georgia;color:#000000;}
.blink_me { animation: blinker 1s linear infinite; }
@keyframes blinker {  50% { opacity: 0; } }
.msg_g{ font-family:Times New Roman;font-size:18px;font-weight:bold;color:#006600;}
.msg_r{ font-family:Times New Roman;font-size:20px;font-weight:bold;color:#FFC1C1;}
.msg_y{ font-family:Times New Roman;font-size:18px;font-weight:bold;color:#FFFF79;}
.msg_b{ font-family:Times New Roman;font-size:18px;font-weight:bold;color:#0075EA;}
</style>
<script type="text/javascript" src="js/Prototype.js"></script><?php /* Ajax */ ?>
<script type="text/javascript" language="javascript">
function EditTgtDef()
{
 document.getElementById("subedit").style.display='none'; 
 document.getElementById("subsave").style.display='block';
 for(var i=1; i<=document.getElementById("numr").value; i++)
 { 
  if(document.getElementById("wgt"+i).value==''){document.getElementById("wgt"+i).value=0;}
  if(document.getElementById("tgt"+i).value==''){document.getElementById("tgt"+i).value=0;}
  
  if(document.getElementById("ChkEdit"+i).value==1 && document.getElementById("ChkRead"+i).value==1)
  { //document.getElementById("ChkEdit"+i).value==1 && 
   document.getElementById("TDw"+i).style.background='#FFF';
   document.getElementById("wgt"+i).readOnly=false; 
   document.getElementById("wgt"+i).style.background='#FFF';
   document.getElementById("TDt"+i).style.background='#FFF'; 
   document.getElementById("tgt"+i).readOnly=false; 
   document.getElementById("tgt"+i).style.background='#FFF';
   document.getElementById("TDD"+i).style.background='#FFF';
   document.getElementById("Remark"+i).readOnly=false; 
   document.getElementById("Remark"+i).style.background='#FFF';
  }
  
 }
}

function ValidatCmt(TgtForm)
{
 for(var i=1; i<=document.getElementById("numr").value; i++)
 {
  if(document.getElementById("wgt"+i).value!='' && document.getElementById("wgt"+i).value!=0 && document.getElementById("tgt"+i).value!='' && document.getElementById("tgt"+i).value!=0 && document.getElementById("Remark"+i).value=='')
  { alert("please enter activity performed for row "+i+"."); return false;} 
 }
 
  var twgt=parseFloat(document.getElementById("twgt").value); var ttgt=parseFloat(document.getElementById("ttgt").value); 
  var num=document.getElementById("numr").value;
  var WgtMin=twgt-1; var WgtMax=twgt+1; var TgtMin=ttgt-1; var TgtMax=ttgt+1; 
 
 if(num==2)
 {
  var a1= parseFloat(document.getElementById("wgt"+1).value); var a2= parseFloat(document.getElementById("wgt"+2).value); 
  var s1= parseFloat(document.getElementById("tgt"+1).value); var s2= parseFloat(document.getElementById("tgt"+2).value); 
  var wgt=Math.round(a1+a2); var tgt=Math.round(s1+s2);
  if(wgt<WgtMin || wgt>WgtMax){alert("Error! distributed weightage not equal to total weightage"); return false;}
  if(tgt<TgtMin || tgt>TgtMax){alert("Error! distributed target not equal to total target"); return false;}
 }
 else if(num==4)
 {
  var a1= parseFloat(document.getElementById("wgt"+1).value); var a2= parseFloat(document.getElementById("wgt"+2).value); 
  var a3= parseFloat(document.getElementById("wgt"+3).value); var a4= parseFloat(document.getElementById("wgt"+4).value);
  var s1= parseFloat(document.getElementById("tgt"+1).value); var s2= parseFloat(document.getElementById("tgt"+2).value); 
  var s3= parseFloat(document.getElementById("tgt"+3).value); var s4= parseFloat(document.getElementById("tgt"+4).value); 
  var wgt=Math.round(a1+a2+a3+a4); var tgt=Math.round(s1+s2+s3+s4); //alert(tgt+">"+TgtMin+"-"+TgtMax);
  if(wgt<WgtMin || wgt>WgtMax){alert("Error! distributed weightage not equal to total weightage"); return false;}
  if(tgt<TgtMin || tgt>TgtMax){alert("Error! distributed target not equal to total target"); return false;}
 }
 else if(num==12)
 {
  var a1= parseFloat(document.getElementById("wgt"+1).value); var a2= parseFloat(document.getElementById("wgt"+2).value); 
  var a3= parseFloat(document.getElementById("wgt"+3).value); var a4= parseFloat(document.getElementById("wgt"+4).value); 
  var a5= parseFloat(document.getElementById("wgt"+5).value); var a6= parseFloat(document.getElementById("wgt"+6).value); 
  var a7= parseFloat(document.getElementById("wgt"+7).value); var a8= parseFloat(document.getElementById("wgt"+8).value); 
  var a9= parseFloat(document.getElementById("wgt"+9).value); var a10= parseFloat(document.getElementById("wgt"+10).value); 
  var a11= parseFloat(document.getElementById("wgt"+11).value); var a12= parseFloat(document.getElementById("wgt"+12).value);  var s1= parseFloat(document.getElementById("tgt"+1).value); var s2= parseFloat(document.getElementById("tgt"+2).value); 
  var s3= parseFloat(document.getElementById("tgt"+3).value); var s4= parseFloat(document.getElementById("tgt"+4).value); 
  var s5= parseFloat(document.getElementById("tgt"+5).value); var s6= parseFloat(document.getElementById("tgt"+6).value); 
  var s7= parseFloat(document.getElementById("tgt"+7).value); var s8= parseFloat(document.getElementById("tgt"+8).value); 
  var s9= parseFloat(document.getElementById("tgt"+9).value); var s10= parseFloat(document.getElementById("tgt"+10).value); 
  var s11= parseFloat(document.getElementById("tgt"+11).value); var s12= parseFloat(document.getElementById("tgt"+12).value);
  var wgt=Math.round(a1+a2+a3+a4+a5+a6+a7+a8+a9+a10+a11+a12);
  var tgt=Math.round(s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12); //alert(tgt);
  if(wgt<WgtMin || wgt>WgtMax){alert("Error! distributed weightage not equal to total weightage"); return false;}
  if(tgt<TgtMin || tgt>TgtMax){alert("Error! distributed target not equal to total target"); return false;}
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
  var Perid=document.getElementById("Perid").value;
  var agree=confirm("The Avhievement has to be as per the "+Perid+" target and not annual target!");
  if(agree)
  {     
  var cmt=cmnt.replace(/[`~!@#$^&*_|+\-=��?;:'"<>\{\}\[\]\\\/]/gi, ''); 
  var url = 'setkratgtact.php'; var pars = 'ach='+ach+'&cmnt='+cmt+'&id='+id+'&i='+i+'&fn='+fn+'&kid='+kid+'&scor='+Scor+'&logscr='+LogScr;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result });
  }
 }
}
function show_result(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; 
  var i=document.getElementById('ir').value; var rst=document.getElementById('rst').value;
  if(rst==1)
  {
   alert("Data saved successfully!"); 
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
  var agree=confirm("Do you want to submit?");
  if(agree)
  {
   var url = 'setkratgtact.php'; var pars = 'lockk=OkLock&id='+id+'&i='+i;
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result2 });
  }
  else{return false;}
}
function show_result2(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; 
  var i2=document.getElementById('ir2').value; var rst2=document.getElementById('rst2').value;
  if(rst2==1)
  {
   alert("Achivement submitted successfully!"); 
   document.getElementById("edit_"+i2).style.display='none'; 
   document.getElementById("lockk_"+i2).style.display='none'; document.getElementById("ok_"+i2).style.display='block';
  }
}

function FunEnterAch(v,i) //LogScr Scor
{ 
 var lgc=document.getElementById("lgc").value; var wgt=document.getElementById("wgt"+i).value; 
 var tgt=parseFloat(document.getElementById("tgt"+i).value);
 var ach=Math.round(((tgt*v)/100)*100)/100;  //var ach=parseFloat(v);
 var EAch=document.getElementById("AchScore"+i).value=ach;
 
 if(lgc=='Logic1')
 { 
  //var Per50=Math.round((tgt/2)*100)/100; 
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
 else if(lgc=='Logic6')
 {
  if(tgt==8.33){ach=ach*12;}else if(tgt==25){ach=ach*4;}else if(tgt==50){ach=ach*2;}else{ach=ach;}
  var Per150=Math.round(((tgt*150)/100)*100)/100; var Per125=Math.round(((tgt*125)/100)*100)/100;
  var Per100=Math.round(((tgt*100)/100)*100)/100; var Per85=Math.round(((tgt*85)/100)*100)/100;
  var Per75=Math.round(((tgt*75)/100)*100)/100; var PerAct=Math.round(((tgt*ach)/100)*100)/100; 
  var ScoAct=Math.round((tgt-PerAct)*100)/100;
  
  if(ach<=10){var EScore=document.getElementById("LogScr"+i).value=Per150;}
  else if(ach>10 && ach<=15){var EScore=document.getElementById("LogScr"+i).value=Per125;}
  else if(ach>15 && ach<=20){var EScore=document.getElementById("LogScr"+i).value=Per100;}
  else if(ach>20 && ach<=25){var EScore=document.getElementById("LogScr"+i).value=Per75;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  
  //else if(ach>20 && ach<=25){var EScore=document.getElementById("LogScr"+i).value=Per85;}
  //else if(ach>25 && ach<=30){var EScore=document.getElementById("LogScr"+i).value=Per75;}
  //else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic7')
 { 
  if(tgt==8.33){ach=ach*12;}else if(tgt==25){ach=ach*4;}else if(tgt==50){ach=ach*2;}else{ach=ach;}
  var Per150=Math.round(((tgt*150)/100)*100)/100; var Per100=Math.round(((tgt*100)/100)*100)/100;
  var Per90=Math.round(((tgt*90)/100)*100)/100; var Per75=Math.round(((tgt*75)/100)*100)/100;
  var PerAct=Math.round(((tgt*ach)/100)*100)/100; var ScoAct=Math.round((tgt-PerAct)*100)/100;
  
  if(ach==0){var EScore=document.getElementById("LogScr"+i).value=Per150;}
  else if(ach>0 && ach<=2){var EScore=document.getElementById("LogScr"+i).value=Per100;}
  else if(ach>2 && ach<=5){var EScore=document.getElementById("LogScr"+i).value=Per90;}
  else if(ach>5 && ach<=10){var EScore=document.getElementById("LogScr"+i).value=Per75;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;} 
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic8a')
 {
  var Percent=((ach/tgt)*115)/100; 
  var MScore=document.getElementById("Scor"+i).value=Math.round((Percent*wgt)*100)/100;
 }
 else if(lgc=='Logic8b')
 {
  var Percent=((ach/tgt)*100)/100; 
  var MScore=document.getElementById("Scor"+i).value=Math.round((Percent*wgt)*100)/100;
 }
 else if(lgc=='Logic8c')
 {
  var Percent=((ach/tgt)*90)/100; 
  var MScore=document.getElementById("Scor"+i).value=Math.round((Percent*wgt)*100)/100;
 }
 else if(lgc=='Logic8d')
 {
  var Percent=((ach/tgt)*65)/100; 
  var MScore=document.getElementById("Scor"+i).value=Math.round((Percent*wgt)*100)/100;
 }
 else if(lgc=='Logic8e')
 {
  var Percent=((ach/tgt)*(-100))/100; 
  var MScore=document.getElementById("Scor"+i).value=Math.round((Percent*wgt)*100)/100;
 }
 else if(lgc=='Logic9')
 {
  var Per10=Math.round(((tgt*10)/100)*100)/100; var Per90=Math.round((tgt-Per10)*100)/100;
  if(ach<Per90){var EScore=document.getElementById("LogScr"+i).value=ach;}
  else if(ach>=Per90){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic10')
 {
 var Per1=Math.round(((tgt*1)/100)*100)/100; var Per2=Math.round(((tgt*2)/100)*100)/100; 
 var Per3=Math.round(((tgt*3)/100)*100)/100; var Per5=Math.round(((tgt*5)/100)*100)/100; 
 var Per6=Math.round(((tgt*6)/100)*100)/100; var Per7=Math.round(((tgt*7)/100)*100)/100; 
 var Per10=Math.round(((tgt*10)/100)*100)/100; var Per20=Math.round(((tgt*20)/100)*100)/100;
 var Per90=Math.round((tgt-Per10)*100)/100; var Per91=Math.round((Per90+Per1)*100)/100;
 var Per93=Math.round((Per90+Per3)*100)/100; var Per94=Math.round((tgt-Per6)*100)/100;
 var Per97=Math.round((tgt-Per3)*100)/100; var Per98=Math.round((tgt-Per2)*100)/100;
 var Per98=Math.round((tgt-Per2)*100)/100; var Per105=Math.round((tgt+Per5)*100)/100;
 var Per110=Math.round((tgt+Per10)*100)/100; var Per120=Math.round((tgt+Per20)*100)/100;
  
  if(ach<Per90){var EScore=document.getElementById("LogScr"+i).value=0;}
  else if(ach==Per90){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else if(ach>Per90 && ach<=Per93){var EScore=document.getElementById("LogScr"+i).value=Per105;}
  else if(ach>Per93 && ach<=Per97){var EScore=document.getElementById("LogScr"+i).value=Per110;}
  else if(ach>Per97){var EScore=document.getElementById("LogScr"+i).value=Per120;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic11')
 { 
  var EScore=document.getElementById("LogScr"+i).value=ach; 
  var MScore=document.getElementById("Scor"+i).value=Math.round(((tgt/EScore)*wgt)*100)/100;
 }
 else if(lgc=='Logic12')
 {
  var Per10=Math.round(((tgt*10)/100)*100)/100; var Per90=Math.round((tgt-Per10)*100)/100;
  if(ach<Per90){var EScore=document.getElementById("LogScr"+i).value=0;}
  else if(ach>=Per90){var EScore=document.getElementById("LogScr"+i).value=ach;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic13a')
 {
  var Per30=Math.round(((tgt*30)/100)*100)/100; var Per130=Math.round((tgt+Per30)*100)/100;
  var Per21=Math.round(((tgt*21)/100)*100)/100; var Per121=Math.round((tgt+Per21)*100)/100;
  var Per20=Math.round(((tgt*20)/100)*100)/100; var Per120=Math.round((tgt+Per20)*100)/100;
  var Per11=Math.round(((tgt*11)/100)*100)/100; var Per111=Math.round((tgt+Per11)*100)/100;
  var Per10=Math.round(((tgt*10)/100)*100)/100; var Per110=Math.round((tgt+Per10)*100)/100;
  var Per9=Math.round(((tgt*9)/100)*100)/100;   var Per91=Math.round((tgt-Per9)*100)/100;
  var Per19=Math.round(((tgt*19)/100)*100)/100; var Per81=Math.round((tgt-Per19)*100)/100;
  var Per80=Math.round((tgt-Per20)*100)/100; var Per90=Math.round((tgt-Per10)*100)/100;
  var Per70=Math.round((tgt-Per30)*100)/100;  
  if(ach<=Per80){var EScore=document.getElementById("LogScr"+i).value=Per80;}
  else if(ach>=Per81 && ach<=Per90){var EScore=document.getElementById("LogScr"+i).value=Per90;}
  else if(ach>=Per91 && ach<=Per110){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else if(ach>=Per111 && ach<=Per120){var EScore=document.getElementById("LogScr"+i).value=Per80;}
  else if(ach>=Per121){var EScore=document.getElementById("LogScr"+i).value=Per70;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;  
 }
 else if(lgc=='Logic13b')
 {
  var Per40=Math.round(((tgt*40)/100)*100)/100; var Per140=Math.round((tgt+Per40)*100)/100;
  var Per31=Math.round(((tgt*31)/100)*100)/100; var Per131=Math.round((tgt+Per31)*100)/100;
  var Per30=Math.round(((tgt*30)/100)*100)/100; var Per130=Math.round((tgt+Per30)*100)/100;
  var Per21=Math.round(((tgt*21)/100)*100)/100; var Per121=Math.round((tgt+Per21)*100)/100;
  var Per20=Math.round(((tgt*20)/100)*100)/100; var Per120=Math.round((tgt+Per20)*100)/100;
  var Per19=Math.round(((tgt*19)/100)*100)/100; var Per81=Math.round((tgt-Per19)*100)/100;
  var Per70=Math.round((tgt-Per30)*100)/100; var Per80=Math.round((tgt-Per20)*100)/100;
  var Per29=Math.round(((tgt*29)/100)*100)/100; var Per71=Math.round((tgt-Per29)*100)/100;
  var Per10=Math.round(((tgt*10)/100)*100)/100; var Per90=Math.round((tgt-Per10)*100)/100;  
  if(ach<=Per70){var EScore=document.getElementById("LogScr"+i).value=Per70;}
  else if(ach>=Per71 && ach<=Per80){var EScore=document.getElementById("LogScr"+i).value=Per90;}
  else if(ach>=Per81 && ach<=Per120){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else if(ach>=Per121 && ach<=Per130){var EScore=document.getElementById("LogScr"+i).value=Per80;}
  else if(ach>=Per131){var EScore=document.getElementById("LogScr"+i).value=Per70;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic14a')
 {
  var Per9=Math.round(((tgt*9)/100)*100)/100; var Per91=Math.round((tgt-Per9)*100)/100;
  var Per10=Math.round(((tgt*10)/100)*100)/100; var Per90=Math.round((tgt-Per10)*100)/100;
  var Per14=Math.round(((tgt*14)/100)*100)/100; var Per86=Math.round((tgt-Per14)*100)/100;
  var Per15=Math.round(((tgt*15)/100)*100)/100; var Per85=Math.round((tgt-Per15)*100)/100;
  var Per19=Math.round(((tgt*19)/100)*100)/100; var Per81=Math.round((tgt-Per19)*100)/100;
  var Per20=Math.round(((tgt*20)/100)*100)/100; var Per80=Math.round((tgt-Per20)*100)/100;
  var Per24=Math.round(((tgt*24)/100)*100)/100; var Per76=Math.round((tgt-Per24)*100)/100;
  var Per25=Math.round(((tgt*25)/100)*100)/100; var Per75=Math.round((tgt-Per25)*100)/100;
  var Per110=Math.round((tgt+Per10)*100)/100;  
  if(ach<=Per75){var EScore=document.getElementById("LogScr"+i).value=0;}
  else if(ach>=Per76 && ach<=Per80){var EScore=document.getElementById("LogScr"+i).value=Per80;}
  else if(ach>=Per81 && ach<=Per85){var EScore=document.getElementById("LogScr"+i).value=Per90;}
  else if(ach>=Per86 && ach<=Per90){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else if(ach>=Per91){var EScore=document.getElementById("LogScr"+i).value=Per110;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic14b')
 {
  var Per4=Math.round(((tgt*4)/100)*100)/100; var Per96=Math.round((tgt-Per4)*100)/100;
  var Per5=Math.round(((tgt*5)/100)*100)/100; var Per95=Math.round((tgt-Per5)*100)/100;
  var Per9=Math.round(((tgt*9)/100)*100)/100; var Per91=Math.round((tgt-Per9)*100)/100;
  var Per10=Math.round(((tgt*10)/100)*100)/100; var Per90=Math.round((tgt-Per10)*100)/100;
  var Per14=Math.round(((tgt*14)/100)*100)/100; var Per86=Math.round((tgt-Per14)*100)/100;
  var Per15=Math.round(((tgt*15)/100)*100)/100; var Per85=Math.round((tgt-Per15)*100)/100;
  var Per19=Math.round(((tgt*19)/100)*100)/100; var Per81=Math.round((tgt-Per19)*100)/100;
  var Per20=Math.round(((tgt*20)/100)*100)/100; var Per80=Math.round((tgt-Per20)*100)/100;
  var Per110=Math.round((tgt+Per10)*100)/100;
  var Per40=Math.round(((tgt*40)/100)*100)/100; var Per60=Math.round((tgt-Per40)*100)/100;  
  if(ach<=Per80){var EScore=document.getElementById("LogScr"+i).value=0;}
  else if(ach>=Per81 && ach<=Per85){var EScore=document.getElementById("LogScr"+i).value=Per60;}
  else if(ach>=Per86 && ach<=Per90){var EScore=document.getElementById("LogScr"+i).value=Per90;}
  else if(ach>=Per91 && ach<=Per95){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else if(ach>=Per96){var EScore=document.getElementById("LogScr"+i).value=Per110;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic15a')
 {
  var Per1=Math.round(((tgt*1)/100)*100)/100; var Per99=Math.round((tgt-Per1)*100)/100;
  var Per2=Math.round(((tgt*2)/100)*100)/100; var Per98=Math.round((tgt-Per2)*100)/100;
  var Per3=Math.round(((tgt*3)/100)*100)/100; var Per97=Math.round((tgt-Per3)*100)/100;
  var Per4=Math.round(((tgt*4)/100)*100)/100; var Per96=Math.round((tgt-Per4)*100)/100;
  var Per5=Math.round(((tgt*5)/100)*100)/100; var Per95=Math.round((tgt-Per5)*100)/100;
  var Per50=Math.round(((tgt*50)/100)*100)/100; var Per50=Math.round((tgt-Per50)*100)/100;
  var Per40=Math.round(((tgt*40)/100)*100)/100; var Per60=Math.round((tgt-Per40)*100)/100;
  var Per10=Math.round(((tgt*10)/100)*100)/100; var Per90=Math.round((tgt-Per10)*100)/100;  
  if(ach<Per96){var EScore=document.getElementById("LogScr"+i).value=0;}
  else if(ach>=Per96 && ach<Per97){var EScore=document.getElementById("LogScr"+i).value=Per50;}
  else if(ach>=Per97 && ach<Per98){var EScore=document.getElementById("LogScr"+i).value=Per60;}
  else if(ach>=Per98 && ach<Per99){var EScore=document.getElementById("LogScr"+i).value=Per90;}
  else if(ach>=Per99){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic15b')
 {
  var Per05=Math.round(((tgt*0.5)/100)*100)/100; var Per995=Math.round((tgt-Per05)*100)/100;
  var Per1=Math.round(((tgt*1)/100)*100)/100; var Per99=Math.round((tgt-Per1)*100)/100;
  var Per2=Math.round(((tgt*2)/100)*100)/100; var Per98=Math.round((tgt-Per2)*100)/100;
  var Per3=Math.round(((tgt*3)/100)*100)/100; var Per97=Math.round((tgt-Per3)*100)/100;
  var Per30=Math.round(((tgt*30)/100)*100)/100; var Per70=Math.round((tgt-Per30)*100)/100;
  var Per10=Math.round(((tgt*10)/100)*100)/100; var Per90=Math.round((tgt-Per10)*100)/100;
  var Per110=Math.round((tgt+Per10)*100)/100;  
  if(ach<Per97){var EScore=document.getElementById("LogScr"+i).value=0;}
  else if(ach>=Per97 && ach<Per98){var EScore=document.getElementById("LogScr"+i).value=Per70;}
  else if(ach>=Per98 && ach<Per99){var EScore=document.getElementById("LogScr"+i).value=Per90;}
  else if(ach>=Per99 && ach<Per995){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else if(ach>=Per995){var EScore=document.getElementById("LogScr"+i).value=Per110;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100; 
 }
 else if(lgc=='Logic15c')
 {
  var Per1=Math.round(((tgt*1)/100)*100)/100; var Per99=Math.round((tgt-Per1)*100)/100;
  var Per2=Math.round(((tgt*2)/100)*100)/100; var Per98=Math.round((tgt-Per2)*100)/100;
  var Per3=Math.round(((tgt*3)/100)*100)/100; var Per97=Math.round((tgt-Per3)*100)/100;
  var Per4=Math.round(((tgt*4)/100)*100)/100; var Per96=Math.round((tgt-Per4)*100)/100;
  var Per40=Math.round(((tgt*40)/100)*100)/100; var Per60=Math.round((tgt-Per40)*100)/100;
  var Per20=Math.round(((tgt*20)/100)*100)/100; var Per80=Math.round((tgt-Per20)*100)/100;
  var Per10=Math.round(((tgt*10)/100)*100)/100; var Per110=Math.round((tgt+Per10)*100)/100;  
  if(ach<Per96){var EScore=document.getElementById("LogScr"+i).value=0;}
  else if(ach>=Per96 && ach<Per97){var EScore=document.getElementById("LogScr"+i).value=Per60;}
  else if(ach>=Per97 && ach<Per98){var EScore=document.getElementById("LogScr"+i).value=Per80;}
  else if(ach>=Per98 && ach<Per99){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else if(ach>=Per99){var EScore=document.getElementById("LogScr"+i).value=Per110;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100; 
 }
 else if(lgc=='Logic16')
 {
  var Per10=Math.round(((tgt*10)/100)*100)/100; var Per90=Math.round((tgt-Per10)*100)/100;
  var Per6=Math.round(((tgt*6)/100)*100)/100; var Per94=Math.round((tgt-Per6)*100)/100;
  var Per5=Math.round(((tgt*5)/100)*100)/100; var Per95=Math.round((tgt-Per5)*100)/100;
  var Per1=Math.round(((tgt*1)/100)*100)/100; var Per99=Math.round((tgt-Per1)*100)/100;
  var Per105=Math.round((tgt+Per5)*100)/100;  var Per106=Math.round((tgt+Per6)*100)/100;
  var Per110=Math.round((tgt+Per10)*100)/100; var Per111=Math.round((tgt+Per10+Per1)*100)/100;
  var Per115=Math.round((tgt+Per10+Per5)*100)/100;  
  if(ach>=Per90 && ach<=Per94){var EScore=document.getElementById("LogScr"+i).value=Per110;}
  else if(ach>=Per95 && ach<=Per99){var EScore=document.getElementById("LogScr"+i).value=Per105;}
  else if(ach>=tgt && ach<=Per105){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else if(ach>=Per106 && ach<=Per110){var EScore=document.getElementById("LogScr"+i).value=Per95;}
  else if(ach>=Per111){var EScore=document.getElementById("LogScr"+i).value=Per90;}
  else{var EScore=document.getElementById("LogScr"+i).value=0;}
  var MScore=document.getElementById("Scor"+i).value=Math.round(((EScore/tgt)*wgt)*100)/100;
 }
 else if(lgc=='Logic17')
 {
  var Per15=Math.round(((tgt*15)/100)*100)/100; var Per16=Math.round(((tgt*16)/100)*100)/100;
  var Per22=Math.round(((tgt*22)/100)*100)/100; var Per23=Math.round(((tgt*23)/100)*100)/100;
  var Per29=Math.round(((tgt*29)/100)*100)/100; var Per30=Math.round(((tgt*30)/100)*100)/100;
  var Per36=Math.round(((tgt*36)/100)*100)/100; var Per37=Math.round(((tgt*37)/100)*100)/100;
  var Per42=Math.round(((tgt*42)/100)*100)/100; var Per50=Math.round(((tgt*50)/100)*100)/100;
  var Per75=Math.round(((tgt*75)/100)*100)/100; var Per80=Math.round(((tgt*80)/100)*100)/100;
  var Per90=Math.round(((tgt*90)/100)*100)/100;
  if(ach<=Per15){var EScore=document.getElementById("LogScr"+i).value=tgt;}
  else if(ach>=Per16 && ach<=Per22){var EScore=document.getElementById("LogScr"+i).value=Per90;}
  else if(ach>=Per23 && ach<=Per29){var EScore=document.getElementById("LogScr"+i).value=Per80;}
  else if(ach>=Per30 && ach<=Per36){var EScore=document.getElementById("LogScr"+i).value=Per75;}
  else if(ach>=Per37 && ach<=Per42){var EScore=document.getElementById("LogScr"+i).value=Per50;}  
  else if(ach>Per42){var EScore=document.getElementById("LogScr"+i).value=0;}
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

//function FUnSaveK()
//{ document.getElementById('subIdOnes').click(); }

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
	<tr><td colspan="10" style="font-size:18px;font-family:Times New Roman;" align="center"><font color="#fff"><u>Note</u>:&nbsp;</font><font class="msg_r"><span class="blink_me">Please ensure that the achievement is calculated against the <b>"Target Value"</b> only</span></font></td></tr>

	<tr><td>&nbsp;</td></tr>
	<tr><td colspan="10"><font color="#9BFFFF">Logic:</font>&nbsp;<font color="#FFFFFF"><?php echo $_REQUEST['lgc']; ?></font>&nbsp;,&nbsp;<font color="#9BFFFF">KRA:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['KRA']; ?></font></td></tr><tr><td colspan="10"><font color="#9BFFFF">Description:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['KRA_Description']; ?></td></font></tr>	
    <tr style="background-color:#CC9900;height:25px;">
	 <td rowspan="2" class="t" style="width:40px;">Sn</td>
	 <td rowspan="2" class="t" style="width:80px;"><?php echo $tit; ?></td>
	 <td rowspan="2" class="t" style="width:60px;">Weigh<br>tage</td>
	 <td rowspan="2" class="t" style="width:60px;">Target <?php if($_REQUEST['lgc']=='Logic6' OR $_REQUEST['lgc']=='Logic7'){echo '<p><font color="#FFFF00">Sales Return</font>'; } ?></td>
	 <td rowspan="2" class="t" style="width:300px;">Activity Performed</td>
	 <td colspan="3" class="t" style="width:60px;"><?php if($_REQUEST['lgc']!='Logic6' AND $_REQUEST['lgc']!='Logic7'){ ?>Employee Achivement Deatis<?php }else{ ?>Employee Sales Return Details<?php } ?></td>
	 <td rowspan="2" class="t" style="width:50px;">Edit</td>
	 <td rowspan="2" class="t" style="width:50px;">Submit</td>
	</tr>
	<tr style="background-color:#9FCFFF;height:25px;">
	 
	 <td class="t" style="width:60px;color:#000000;"><?php if($_REQUEST['lgc']!='Logic6' AND $_REQUEST['lgc']!='Logic7'){ ?>Self Rating<?php }elseif($_REQUEST['lgc']=='Logic6'){ ?>FC<br>(in %)<?php }elseif($_REQUEST['lgc']=='Logic7'){ ?>VC<br>(in %)<?php } ?></td>
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
<input type="hidden" name="Perid" id="Perid" value="<?php echo $_REQUEST['prd']; ?>"/>

<?php 
 $sql=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid'],$con); 
 $row=mysql_num_rows($sql); if($countrow!=$row){ $del=mysql_query("delete from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid'],$con); }
?>

	<?php for($i=1; $i<=$num; $i++){ ?>
	<tr style="background-color:#FFFFFF;height:24px;">
	 <td class="d" align="center"><?php echo $i; ?></td>
	 <td class="d" align="center">
	  <?php 
	  if($_REQUEST['prd']=='Monthly')
	  { 
	   if($i==1){$t='January'; $ld=date("Y-01-31"); $lm=2; if($Mnt_cal==12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==2){$t='February'; $ld=date("Y-02-28"); $lm=2; if($Mnt_cal==11 OR $Mnt_cal==12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==3){$t='March'; $ld=date("Y-03-31"); $lm=3; if($Mnt_cal>=10 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==4){$t='April';$ld=date("Y-04-30"); $lm=4; if($Mnt_cal>=9 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==5){$t='May'; $ld=date("Y-05-31"); $lm=5; if($Mnt_cal>=8 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==6){$t='June'; $ld=date("Y-06-30"); $lm=6; if($Mnt_cal>=7 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==7){$t='July'; $ld=date("Y-07-31"); $lm=7; if($Mnt_cal>=6 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==8){$t='August'; $ld=date("Y-08-31"); $lm=8; if($Mnt_cal>=5 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==9){$t='September'; $ld=date("Y-09-30"); $lm=9; if($Mnt_cal>=4 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==10){$t='October'; $ld=date("Y-10-31"); $lm=10; if($Mnt_cal>=3 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==11){$t='November'; $ld=date("Y-11-30"); $lm=11; if($Mnt_cal>=2 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==12){$t='December'; $ld=date("Y-12-31"); $lm=12; if($Mnt_cal>=1 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} } 
	  }	
      elseif($_REQUEST['prd']=='Quarter')
	  { 
		 
	   if($resDept['DepartmentId']==6)
	   {
		if($i==1){$t='Quarter 1'; $ld=date("Y-03-31"); $lm=2; if($Mnt_cal>=10 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
		elseif($i==2){$t='Quarter 2'; $ld=date("Y-09-30"); $lm=7; if($Mnt_cal>=7 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
		elseif($i==3){$t='Quarter 3'; $ld=date("Y-09-30"); $lm=7; if($Mnt_cal>=4 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
		elseif($i==4){$t='Quarter 4'; $ld=date("Y-12-31"); $lm=10; if($Mnt_cal>=1 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   }
	   else
	   {
		if($i==1){$t='Quarter 1'; $ld=date("Y-03-31"); $lm=2; if($Mnt_cal>=10 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
		elseif($i==2){$t='Quarter 2'; $ld=date("Y-06-30"); $lm=4; if($Mnt_cal>=7 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
		elseif($i==3){$t='Quarter 3'; $ld=date("Y-09-30"); $lm=7; if($Mnt_cal>=4 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
		elseif($i==4){$t='Quarter 4'; $ld=date("Y-12-31"); $lm=10; if($Mnt_cal>=1 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   }
		  
	  }
      elseif($_REQUEST['prd']=='1/2 Annual')
	  { 
	   if($i==1){$t='Half Year 1'; $ld=date("Y-06-30"); $lm=2; if($Mnt_cal>=7 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} }
	   elseif($i==2){$t='Half Year 2'; $ld=date("Y-12-31"); $lm=7; if($Mnt_cal>=1 AND $Mnt_cal<=12){$PerM=1;}else{$PerM=0;} } 
	  }
		
		echo $t; ?><input type="hidden" name="tit<?php echo $i; ?>" value="<?php echo $t; ?>"/>
		<input type="hidden" id="ChkEdit<?php echo $i; ?>" value="<?php if(date("m")<$lm){echo 1;}else{echo 0;} ?>" />
		<input type="hidden" id="ChkRead<?php echo $i; ?>" value="<?php echo $PerM; ?>" />
		
	<?php if($PerM==1)
	      { 
		   $sqlchk=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid']." AND NtgtN=".$i,$con); $rrow=mysql_num_rows($sqlchk); if($rrow==0){ $upIn=mysql_query("insert into hrm_pms_kra_tgtdefin(".$fn.", EmployeeID, Tital, Ldate, Wgt, Tgt, NtgtN, Remark) values(".$_REQUEST['kid'].", ".$_REQUEST['e'].", '".$t."', '".$ld."', '".$wgt."', '".$tgt."', ".$i.", '".$resk['KRA']."')",$con); } 
		  }
		  else
		  {
		   $sqlchk=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid']." AND NtgtN=".$i,$con); $rrow=mysql_num_rows($sqlchk); if($rrow==0){ $upIn=mysql_query("insert into hrm_pms_kra_tgtdefin(".$fn.", EmployeeID, Tital, Ldate, Wgt, Tgt, NtgtN, Remark) values(".$_REQUEST['kid'].", ".$_REQUEST['e'].", '".$t."', '".$ld."', 0, 0, ".$i.", '')",$con); }
		  } ?>	
			
	 </td>

<?php $sql=mysql_query("select * from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid']." AND Tital='".$t."' AND NtgtN='".$i."'",$con); $row=mysql_num_rows($sql); $res=mysql_fetch_assoc($sql); ?>		

	 <td align="center" bgcolor="#FFFFC6" id="TDw<?php echo $i; ?>"><input type="text" class="d" style="width:60px;height:40px;border:hidden;text-align:center;background-color:#FFFFC6;" id="wgt<?php echo $i; ?>" name="wgt<?php echo $i; ?>" value="<?php if($row>0){echo floatval($res['Wgt']);}elseif($PerM==1){echo floatval($wgt);} ?>" readonly/>
	 </td>
	 
	 <td align="center" bgcolor="#FFFFC6" id="TDt<?php echo $i; ?>"><input type="text" class="d" style="width:60px;height:40px;border:hidden;text-align:center;background-color:#FFFFC6;" value="
<?php if($_REQUEST['lgc']!='Logic6' AND $_REQUEST['lgc']!='Logic7'){ if($row>0){echo 100;}elseif($PerM==1){echo floatval($tgt);} }else{ echo '0%'; } //floatval($res['Tgt']) ?>" readonly />

<input type="hidden" id="tgt<?php echo $i;?>" name="tgt<?php echo $i; ?>" value="
<?php if($row>0){echo floatval($res['Tgt']);}elseif($PerM==1){echo floatval($tgt);} ?>" readonly />
<?php //if($row>0){echo floatval($res['Tgt']);}elseif($PerM==1){echo floatval($tgt);} ?>

<input type="hidden" id="NtgtN<?php echo $i; ?>" name="NtgtN<?php echo $i; ?>" value="<?php echo $i; ?>"/></td> 
 
	 <td class="d" bgcolor="#FFFFC6" id="TDD<?php echo $i; ?>" valign="top"><textarea type="text" name="Remark<?php echo $i; ?>" id="Remark<?php echo $i; ?>" class="d" rows="2" style="width:300px;border:hidden;background-color:#FFFFC6;" readonly><?php if($row>0){echo $res['Remark'];}elseif($PerM==1){echo $resk['KRA'];}?></textarea>
	 
	 <input type="hidden" name="ld<?php echo $i; ?>" value="<?php if($row>0 AND $res['Ldate']!='0000-00-00' AND $res['Ldate']!='1970-01-01'){ echo $res['Ldate']; }else{ echo $ld; } ?>"/>
	 </td>
	 
	 <td class="d" bgcolor="#D5FFAA" id="TD1<?php echo $i; ?>"><input type="text" name="Ach<?php echo $i; ?>" id="Ach<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" onKeyUp="FunEnterAch(this.value,<?php echo $i; ?>)" onChange="FunEnterAch(this.value,<?php echo $i; ?>)" value="<?php if($res['Cmnt']!='' || $res['Ach']>0){ echo floatval($res['Ach']); }else{echo '';} ?>" maxlength="4" onKeyPress="return isNumberKey(event)" readonly/></td>
	 <td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>" valign="top"><textarea type="text" name="Cmnt<?php echo $i; ?>" id="Cmnt<?php echo $i; ?>" class="d" rows="2" style="width:300px;border:hidden;background-color:#D5FFAA;"><?php echo $res['Cmnt']; ?></textarea>
	 
	 <input type="hidden" name="LogScr<?php echo $i; ?>" id="LogScr<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['LogScr']!=''){ echo $res['LogScr'];}else{echo 0;} ?>" readonly/>
	 </td>
	 
	 <?php /*?><td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>"><input type="text" name="LogScr<?php echo $i; ?>" id="LogScr<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['LogScr']!=''){ echo $res['LogScr'];}else{echo 0;} ?>" readonly/></td><?php */?>
	 
	 <td class="d" bgcolor="#D5FFAA" id="TD2<?php echo $i; ?>"><input type="text" name="Scor<?php echo $i; ?>" id="Scor<?php echo $i; ?>" class="d" style="width:60px;border:hidden;background-color:#D5FFAA;text-align:center;" value="<?php if($res['Scor']!=''){ echo $res['Scor'];}else{echo 0;} ?>" readonly/></td>
	 
	 
	 <td align="center">
	 <?php $mchk=date("m",strtotime($res['Ldate'])); 
	 if($mchk==1){$LDate=date("Y-02-28");}
	 elseif($resDept['DepartmentId']==6 && $res['Tital']=='Half Year 1' && $res['Ldate']==date('Y-06-30'))
{$LDate=date("Y-09-30");}
elseif($resDept['DepartmentId']==6 && ($res['Tital']=='Quarter 1' || $res['Tital']=='Quarter 2') && ($res['Ldate']==date('Y-03-31') || $res['Ldate']==date('Y-06-30')))
{$LDate=date("Y-09-30");}
else{$LDate=$res['Ldate'];} //echo '-'.$LDate;
	 
	 /*elseif($resDept['DepartmentId']==6 && $res['Tital']=='Half Year 1' && $res['Ldate']=='2020-06-30'){$LDate=date("2020-07-31");}
	 else{$LDate=$res['Ldate'];} */
	 
	 ?>
	 <?php $Nxt10Day=date("Y-m-d",strtotime('+7 day', strtotime(date($LDate)))); //date("2020-05-01") //$LDate
	       $Nxt14Day=date("Y-m-d",strtotime('+14 day', strtotime($LDate))); 
	       ?>
	 <?php if($res['Tital']!='' AND $res['Tgt']!==''){ //AND $_REQUEST['prd']=='Monthly' ?>
	  <span style="cursor:pointer;">
	 
	  <img src="images/edit.png" border="0" id="edit_<?php echo $i; ?>" style="display:<?php if(($PerM==1 AND $res['lockk']==0 AND date("Y-m-d")<=$Nxt10Day) OR ($PerM==1 AND $res['lockk']==2 AND date("Y-m-d")<=$Nxt14Day) OR ($PerM==1 AND $res['lockk']==0 AND $rpms['UnLckKRA']==1) OR ($PerM==1 AND $res['lockk']==0 AND $res['Applockk']==0 AND $res['AppRevert']=='Y' AND date("Y-m-d")<=$Nxt14Day)){echo 'block';}else{echo 'none';} ?>" onClick="FunEdit(<?php echo $i; ?>)" />
	  
	  </span>
	  <span style="cursor:pointer"><img src="images/Floppy-Small-icon.png" border="0" id="save_<?php echo $i; ?>" style="display:none;" onClick="FunSave(<?php echo $i.','.$res['TgtDefId']; ?>)"/></span>
	  <img src="images/lock.png" border="0" style="display:<?php if($PerM==0 OR ($res['lockk']==0 AND date("Y-m-d"))>$Nxt10Day){echo 'block';}else{echo 'none';} ?>;" />
	 <?php } ?> 
	 </td>
	 <td align="center">
	 <img src="images/ok.png" border="0" id="ok_<?php echo $i; ?>" style="display:<?php if($res['Ach']!='' AND $res['Cmnt']!=='' AND $res['lockk']==1 AND $PerM==1){echo 'block';}else{echo 'none';} ?>;"/>
	 <span style="cursor:pointer"><img src="images/sub.png" border="0" id="lockk_<?php echo $i; ?>" style="display:<?php if($res['Ach']!='' AND $res['Cmnt']!=='' AND $res['lockk']==0 AND date("Y-m-d")<=$Nxt10Day){echo 'block';}else{echo 'none';} ?>;" onClick="FunLk(<?php echo $i.','.$res['TgtDefId']; ?>)"/></span>
	 </td>
	</tr>
    <?php } ?>
	<tr style="height:24px;">
	 <td class="d" colspan="2" align="right" bgcolor="#FFFFFF"><b>Total:&nbsp;</b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php echo $_REQUEST['wgt']; ?></b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php //if($_REQUEST['lgc']!='Logic6' AND $_REQUEST['lgc']!='Logic7'){ echo $_REQUEST['tgt']; }else{ echo '%0'; } ?><?php //echo $_REQUEST['tgt']; ?></b>
     <input type="hidden" id="twgt" name="twgt" value="<?php echo $_REQUEST['wgt']; ?>"/>
	 <input type="hidden" id="ttgt" name="ttgt" value="<?php echo $_REQUEST['tgt']; ?>"/></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>
<?php $sqlt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor from hrm_pms_kra_tgtdefin where ".$fn."=".$_REQUEST['kid'],$con); $rest=mysql_fetch_assoc($sqlt); ?>	 
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><input type="hidden" id="totAch" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tAch']>0){echo floatval($rest['tAch']);} ?>" readonly/></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF">
	 
	 <input type="hidden" id="TotLogScr" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tLogScr']>0){echo floatval($rest['tLogScr']);} ?>" readonly/>
	 </td>	
	  
	 <?php /*?><td class="d" align="center" bgcolor="#FFFFFF"><b><input type="text" id="TotLogScr" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tLogScr']>0){echo floatval($rest['tLogScr']);} ?>" readonly/></b></td><?php */?>
	 	 	 
	  <td class="d" align="center" bgcolor="#FFFFFF"><b><input type="hidden" id="TotScore" style="width:50px;font-weight:bold; text-align:center;background-color:#FFFFFF;border:hidden;" value="<?php if($rest['tScor']>0){echo floatval($rest['tScor']);} ?>" readonly/></b></td>
	 <td colspan="2" class="d" align="right" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
	 <td class="d" colspan="5" align="right" bgcolor="#CC9900">
	  <input type="hidden" name="TotRow" value="<?php echo $num; ?>" />
	  <input type="hidden" name="Idd" value="<?php echo $_REQUEST['kid']; ?>" />
<?php if((date("Y-m-d")>=$_REQUEST['DateJoining'] AND date("Y-m-d")<=$_REQUEST['After31DayDoJ']) OR ($_REQUEST['CuDate']<$_REQUEST['EmpFromDate'] OR $_REQUEST['CuDate']>$_REQUEST['EmpToDate']) OR (($_REQUEST['CuDate']>=$_REQUEST['EmpFromDate'] AND $_REQUEST['CuDate']<=$_REQUEST['EmpToDate'] AND $_REQUEST['EmpDateStatus']=='A') OR ($_REQUEST['CuDate']>=$_REQUEST['AppFromDate'] AND $_REQUEST['CuDate']<=$_REQUEST['AppToDate'] AND $_REQUEST['AppDateStatus']=='A' AND $_REQUEST['EmpStatus']=='P' AND $_REQUEST['AppStatus']=='R') OR ($_REQUEST['CuDate']>=$_REQUEST['RevFromDate'] AND $_REQUEST['CuDate']<=$_REQUEST['RevToDate'] AND $_REQUEST['RevDateStatus']=='A' AND $_REQUEST['EmpStatus']=='P' AND $_REQUEST['AppStatus']=='R' AND $_REQUEST['RevStatus']=='R') OR ($_REQUEST['CuDate']>=$_REQUEST['HodFromDate'] AND $_REQUEST['CuDate']<=$_REQUEST['HodToDate'] AND $_REQUEST['HodDateStatus']=='A' AND $_REQUEST['EmpStatus']=='P' AND $_REQUEST['AppStatus']=='R' AND $_REQUEST['RevStatus']=='R' AND $_REQUEST['HODStatus']=='R') OR $_REQUEST['ExtraAllowKRA']==1)){
      if($_REQUEST['row']>0) { ?>
	  <input type="button" name="subedit" id="subedit" style="width:80px;height:25px;" value="edit" <?php //if($_REQUEST['row2']>0){echo 'disabled';} ?> onClick="EditTgtDef()"/>	  
	<input type="submit" name="subsave" id="subsave" style="width:80px;height:25px;display:none;" value="save" />
	<input type="submit" name="subOnes" id="subIdOnes" style="width:80px;height:25px;display:none;"/>
	  <?php } } ?>
	 </td>
	 <td colspan="5" style="color:#FFFFFF;" align="right">
	 &nbsp;&nbsp;&nbsp;<img src="images/edit.png" border="0"/>&nbsp;:Edit
	 &nbsp;&nbsp;&nbsp;<img src="images/Floppy-Small-icon.png" border="0"/>&nbsp;:Save
	 &nbsp;&nbsp;&nbsp;<img src="images/sub.png" border="0"/>&nbsp;:Submit
	 &nbsp;&nbsp;&nbsp;<img src="images/ok.png" border="0"/>&nbsp;:Submitted
	 &nbsp;&nbsp;&nbsp;<img src="images/lock.png" border="0"/>&nbsp;:Locked
	 
	 </td>
	</tr>
</form>	
   </table>
  </td>
 </tr>
 <tr><td style="height:20px;">&nbsp;</td></tr>
 <tr>
  <td style="font-size:18px;color:#FFA275;">
   <?php 
    echo '&nbsp;&nbsp;&nbsp;<font color="#9BFFFF"><u>Note</u>:</font><br>';
	echo '&nbsp;&nbsp;&nbsp;';
    echo ' The achivement is required to be entered on the last day or within few days beyand which the KRA will set auto locked.';
   ?>
  
 </tr>
</table>
</center>
</body>
</html>
