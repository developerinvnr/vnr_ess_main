<?php session_start();
require_once('../AdminUser/config/config.php'); 
if($_POST['ach']!='' && $_POST['cmnt']!='' && $_POST['id']!='')
{
 $up=mysql_query("update hrm_pms_kra_tgtdefin set Ach='".$_POST['ach']."', Cmnt='".$_POST['cmnt']."', LogScr='".$_POST['logscr']."', Scor='".$_POST['scor']."' where TgtDefId=".$_POST['id'],$con);
 if($up)
 { 
  //$sqlt=mysql_query("select SUM(Ach) as tAch from hrm_pms_kra_tgtdefin where ".$_POST['fn']."=".$_POST['kid'],$con); 
  //$rest=mysql_fetch_assoc($sqlt);
  echo '<input type="hidden" id="ir" value="'.$_POST['i'].'" /><input type="hidden" id="rst" value="1"/>'; 
  echo '<input type="hidden" id="tAch" value="'.floatval($rest['tAch']).'" />'; 
 }
 else{ echo '<input type="hidden" id="ir" value="'.$_POST['i'].'" /><input type="hidden" id="rst" value="0"/>'; }
}


if($_POST['lockk']!='' && $_POST['lockk']=='OkLock' && $_POST['id']!='')
{ 
 $up=mysql_query("update hrm_pms_kra_tgtdefin set lockk=1 where TgtDefId=".$_POST['id'],$con);
 if($up){ echo '<input type="hidden" id="ir2" value="'.$_POST['i'].'" /><input type="hidden" id="rst2" value="1"/>'; }
 else{ echo '<input type="hidden" id="ir2" value="'.$_POST['i'].'" /><input type="hidden" id="rst2" value="0"/>'; }
}


if($_POST['tact']=='tgtact' && $_POST['kid']!='' && $_POST['sn']!='')
{
  $sqlt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor from hrm_pms_kra_tgtdefin where KRAId=".$_POST['kid'],$con); $rest=mysql_fetch_assoc($sqlt);
  echo '<input type="hidden" id="tAch" value="'.floatval($rest['tAch']).'" />';
  echo '<input type="hidden" id="tLogScr" value="'.floatval($rest['tLogScr']).'" />';
  echo '<input type="hidden" id="tScor" value="'.floatval($rest['tScor']).'" />';  
} 

if($_POST['tact']=='subtgtact' && $_POST['kid']!='' && $_POST['sn']!='' && $_POST['sn2']!='')
{
  $sqlt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor from hrm_pms_kra_tgtdefin where KRASubId=".$_POST['kid'],$con); $rest=mysql_fetch_assoc($sqlt);
  echo '<input type="hidden" id="tAch" value="'.floatval($rest['tAch']).'" />';
  echo '<input type="hidden" id="tLogScr" value="'.floatval($rest['tLogScr']).'" />';
  echo '<input type="hidden" id="tScor" value="'.floatval($rest['tScor']).'" />';
}
?>