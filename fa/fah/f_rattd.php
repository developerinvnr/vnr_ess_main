<?php session_start();
if($_SESSION['login'] = true){require_once('../../Employee/sp/user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
$EmployeeId=$_SESSION['ID'];
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $rbm=$_REQUEST['rbm']; $abm=$_REQUEST['abm'];
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.cell {color:#000;font-family:Times New Roman;font-size:14px;font-weight:bold;}
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:12px;background-color:#97FFFF;}
.htf2{font-family:Georgia;color:#FF80FF;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Georgia;font-size:12px;height:20px;color:#fff;}
.tdf2{font-family:Georgia;font-size:12px;height:20px;color:#000000;}
.InputSel {font-family:Georgia;font-size:12px;text-align:left; }
.InputSelAtt {font-family:Times New Roman;font-size:12px;text-align:left; }
.InputType {font-family:Georgia;font-size:12px;text-align:left; height:20px; border:hidden; }
.InputType2 {font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton {background-image:url(images/save.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">
function FunRef(m,y,s,hq,rbm,abm){ window.location="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&rbm=0&abm=0"; }

function funrbm(rbm,m,y)
{ var sts=''; window.location="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s=0&hq=0&dis=0&sts="+sts+"&rbm="+rbm+"&abm=0"; }

function funabm(abm,m,y)
{ var sts=''; window.location="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s=0&hq=0&dis=0&sts="+sts+"&rbm=0&abm="+abm; }

function funmonth(m,y,s,hq,rbm,abm)
{ window.location="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&rbm=0&abm=0"; }
function funyear(y,m,s,hq,rbm,abm)
{ window.location="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&rbm=0&abm=0";}
function funstate(s,m,y,rbm,abm)
{ window.location="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq=0&dis=0&rbm=0&abm=0"; }
function funhq(hq,m,y,s,rbm,abm)
{ window.location="f_rattd.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&rbm=0&abm=0"; }

function funExport(s,hq,m,y,rbm,abm)
{ var win = window.open("f_attexports.php?hq="+hq+"&s="+s+"&m="+m+"&y="+y+"&rbm="+rbm+"&abm="+abm,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); }

function funDetail(id)
{ var win = window.open("f_details.php?id="+id,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=750,height=500");}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; document.getElementById("mode"+sn).style.background='#9BEF47';  document.getElementById("hq"+sn).style.background='#9BEF47'; document.getElementById("state"+sn).style.background='#9BEF47'; 
 }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; document.getElementById("mode"+sn).style.background='#FFFFFF'; document.getElementById("hq"+sn).style.background='#FFFFFF'; document.getElementById("state"+sn).style.background='#FFFFFF'; }
}

</Script>
</head>
<body class="body">
<span id="AttMsgSpan"></span>
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
	  <td valign="top" width="100%" id="MainWindow">
<!DOCTYPE html>
<html>
<?php //***************START*****START*****START******START******START***************************?>
<?php if($m==1){$Month='JANUARY';}elseif($m==2){$Month='FEBRUARY';}elseif($m==3){$Month='MARCH';}elseif($m==4){$Month='APRIL';}elseif($m==5){$Month='MAY';}elseif($m==6){$Month='JUNE';}elseif($m==7){$Month='JULY';}elseif($m==8){$Month='AUGUST';}elseif($m==9){$Month='SEPTEMBER';}elseif($m==10){$Month='OCTOBER';}elseif($m==11){$Month='NOVEMBER';}elseif($m==12){$Month='DECEMBER';} 
  if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31; } 
  elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30; }
  elseif($m==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040 OR $Y==2044 OR $Y==2048 OR $Y==2052 OR $Y==2056 OR $Y==2060){$day=29;}else{$day=28;} } 
?>
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr>
 <td valign="top" style="width:100%;">
 <table border="0" style="width:100%;">
 <tr>
<td style="width:100%;">
 <table border="0" style="width:100%;">
  <td style="width:100%;" valign="top">
<?php $tot=(35*$day)+500; ?>  
   <table style="width:<?php echo $tot; ?>px;" border="0" cellpadding="0" cellspacing="1">
    <tr>
    
<?php 
if($_SESSION['s1']==99 || $_SESSION['s2']==99 || $_SESSION['s3']==99){ $state='1=1'; $state2='1=1'; }
else
{ $state='(StateId='.$_SESSION['s1'].' OR StateId='.$_SESSION['s2'].' OR StateId='.$_SESSION['s3'].')'; 
  $state2='(g.CostCenter='.$_SESSION['s1'].' OR g.CostCenter='.$_SESSION['s2'].' OR g.CostCenter='.$_SESSION['s3'].')'; }
?>    
    
	 <td colspan="35">
	  <table>
	   <tr>
	    <td colspan="2" class="htf2" style="width:250px;" align="left"><u>FA Attendance</u></td>
		<td>&nbsp;</td>
		<td class="tdf">&nbsp;RBM/ZBM/ZTM/ZSC</td>
	    <td class="tdf" align="center">:</td>
		<td><select style="width:150px;" class="InputSel" id="rbm" name="rbm" onChange="funrbm(this.value,<?php echo $m.','.$y; ?>)"><?php if($_REQUEST['rbm']>0){ $sb=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['rbm'],$con); $rb=mysql_fetch_assoc($sb); ?><option value='<?php echo $_REQUEST['rbm'];?>' selected><?php echo ucwords(strtolower($rb['Fname'].' '.$rb['Sname'].' '.$rb['Lname']));?></option><?php }else{?><option value="0">Select</option><?php } ?><?php $sb2=mysql_query("select e.EmployeeID,Fname,Sname,Lname,DesigCode from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND (g.DesigId=65 OR g.DesigId=66 OR g.DesigId=358 OR g.DesigId=375) AND ".$state2."",$con); while($rb2=mysql_fetch_assoc($sb2)){ ?><option value="<?php echo $rb2['EmployeeID']; ?>"><?php echo ucwords(strtolower($rb2['Fname'].' '.$rb2['Sname'].' '.$rb2['Lname'].' - '.$rb2['DesigCode'])); ?></option><?php } ?></select></td>
		<td class="tdf">&nbsp;ABM/ATM/ASC</td>
	    <td class="tdf" align="center">:</td>
		<td><select style="width:150px;" class="InputSel" id="abm" name="abm" onChange="funabm(this.value,<?php echo $m.','.$y; ?>)"><?php if($_REQUEST['abm']>0){ $sa=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['abm'],$con); $ra=mysql_fetch_assoc($sa); ?><option value='<?php echo $_REQUEST['abm'];?>' selected><?php echo ucwords(strtolower($ra['Fname'].' '.$ra['Sname'].' '.$ra['Lname']));?></option><?php }else{?><option value="0">Select</option><?php } ?><?php $sa2=mysql_query("select e.EmployeeID,Fname,Sname,Lname,DesigCode from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND (g.DesigId=67 OR g.DesigId=414 OR g.DesigId=415 OR g.DesigId=212) AND ".$state2."",$con); while($ra2=mysql_fetch_assoc($sa2)){ ?><option value="<?php echo $ra2['EmployeeID']; ?>"><?php echo ucwords(strtolower($ra2['Fname'].' '.$ra2['Sname'].' '.$ra2['Lname'].' - '.$ra2['DesigCode'])); ?></option><?php } ?></select></td>
		<td class="tdf">&nbsp;Month</td>
	    <td class="tdf" align="center">:</td>
		<td><select style="width:100px;" class="InputSel" id="month" name="month" onChange="funmonth(this.value,<?php echo $y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$rbm.','.$abm; ?>)"><option value="<?php echo $m; ?>" selected="selected"><?php echo $Month; ?></option><?php for($i=1;$i<=12;$i++){ if($i!=$m){ ?>
		   <option value="<?php echo $i; ?>"><?php if($i==1){echo 'JANUARY';}elseif($i==2){echo 'FEBRUARY';}elseif($i==3){echo 'MARCH';}elseif($i==4){echo 'APRIL';}elseif($i==5){echo 'MAY';}elseif($i==6){echo 'JUNE';}elseif($i==7){echo 'JULY';}elseif($i==8){echo 'AUGUST';}elseif($i==9){echo 'SEPTEMBER';}elseif($i==10){echo 'OCTOBER';}elseif($i==11){echo 'NOVEMBER';}elseif($i==12){echo 'DECEMBER';} ?></option><?php }} ?></select></td>
		 
		<td class="tdf">&nbsp;Year</td>
	    <td class="tdf" align="center">:</td>
		<td><select style="width:100px;" class="InputSel" id="year" name="year" onChange="funyear(this.value,<?php echo $m.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$rbm.','.$abm; ?>)"><option value="<?php echo $y; ?>" selected="selected"><?php echo $y; ?></option><?php for($j=2015;$j<=date("Y");$j++){ if($j!=$y){ ?>
		   <option value="<?php echo $j; ?>"><?php echo $j; ?></option><?php }} ?></select></td>   
		
	    <td class="tdf">&nbsp;State</td>
	    <td class="tdf" align="center">:</td>
		<td><select style="width:100px;" class="InputSel" id="state" name="state" onChange="funstate(this.value,<?php echo $m.','.$y.','.$rbm.','.$abm; ?>)">
<?php if($_REQUEST['s']>0){ $ss=mysql_query("select StateName from hrm_state where StateId=".$_REQUEST['s'],$con); $rs=mysql_fetch_assoc($ss); ?><option value='<?php echo $_REQUEST['s'];?>' selected><?php echo ucfirst(strtolower($rs['StateName']));?></option><?php } if($_REQUEST['s']=='All'){ ?><option value="All" selected>All</option><?php } ?><?php $sqls=mysql_query("select StateId,StateName from hrm_state where ".$state." group by StateName order by StateName ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ ?><option value="<?php echo $ress['StateId']; ?>"><?php echo ucfirst(strtolower($ress['StateName'])); ?></option><?php } ?><!--<option value="All">All</option>--></select></td>
	 <td class="tdf">&nbsp;HeadQuarter</td>
	 <td class="tdf" style="width:10px;" align="center">:</td>
	 <td style="width:100px;"><select style="width:100px;" class="InputSel" id="hq" name="hq" onChange="funhq(this.value,<?php echo $m.','.$y.','.$_REQUEST['s'].','.$rbm.','.$abm; ?>)"><?php if($_REQUEST['hq']>0){ $shq=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'],$con); $rhq=mysql_fetch_assoc($shq); ?><option value='<?php echo $_REQUEST['hq'];?>' selected><?php echo ucfirst(strtolower($rhq['HqName']));?></option><?php } if($_REQUEST['s']>0){ ?><option value="0">select</option><?php $sqlhq=mysql_query("select * from hrm_headquater hq inner join hrm_sales_dealer d on (hq.HqId=d.Hq_vc OR hq.HqId=d.Hq_fc) where StateId=".$_REQUEST['s']." group by HqName order by HqName asc",$con); while($reshq=mysql_fetch_assoc($sqlhq)){ ?><option value="<?php echo $reshq['HqId']; ?>"><?php echo ucfirst(strtolower($reshq['HqName'])); ?></option><?php } } else { ?><option value="0">Select</option><?php $sqlhq2=mysql_query("select * from hrm_headquater hq inner join hrm_sales_dealer d on (hq.HqId=d.Hq_vc OR hq.HqId=d.Hq_fc) where ".$state." group by HqName order by HqName asc",$con); while($reshq2=mysql_fetch_assoc($sqlhq2)){ ?><option value="<?php echo $reshq2['HqId']; ?>"><?php echo ucfirst(strtolower($reshq2['HqName'])); ?></option><?php } } ?></select></td>
	 
	 <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px;width:80px;"><span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$rbm.','.$abm; ?>)"><u>refresh</u></span></td>
	 
	 <td class="tdf" style="width:100px;" align="center"><?php if($_REQUEST['hq']>0 OR $_REQUEST['s']>0 OR $_REQUEST['s']=='All' OR $_REQUEST['rbm']>0 OR $_REQUEST['abm']>0){ ?><span style="cursor:pointer;color:#FFFFFF;" onClick="funExport('<?php echo $_REQUEST['s']; ?>',<?php echo $_REQUEST['hq'].','.$_REQUEST['m'].','.$_REQUEST['y'].','.$rbm.','.$abm; ?>)"><u>Export</u></span><?php } ?></td>

	   </tr>
	  </table>
	 </td>
	</tr>

	<tr>
	  <td rowspan="2" style="width:50px;" class="htf">&nbsp;</td>
      <td rowspan="2" style="width:30px;" class="htf">&nbsp;Sn&nbsp;</td>
      <td rowspan="2" style="width:200px;" class="htf">Name</td>
	  <td rowspan="2" style="width:150px;" class="htf">Mode</td>
	  <td rowspan="2" style="width:90px;" class="htf">FA Hq</td>
	  <td rowspan="2" style="width:90px;" class="htf">State</td>
	  <td rowspan="2" style="width:100px;" class="htf">Month</td>
	  <td rowspan="2" style="width:50px;" class="htf">Year</td>
	  <td colspan="2" class="htf">Total</td>
	  <td colspan="<?php echo $day; ?>" class="htf"></td>
	</tr>
	<tr>
	 <td class="htf" width="40">P</td>
     <td class="htf" width="40">A</td>
	 <?php for($i=1; $i<=$day; $i++) { ?> 
      <td align="center" class="cell" bgcolor="<?php if(date("w",strtotime(date($y.'-'.$m.'-'.$i)))==0) {echo '#6B983A';}else{echo '#97FFFF';}?>" width="35"><?php echo $i; ?></td>
	  <?php } $Ci=$i-1; echo '<input type="hidden" id="ColNo" value="'.$Ci.'" />'; ?>
	</tr>
	
<?php 
if($_REQUEST['rbm']>0 OR $_REQUEST['abm']>0 OR $_REQUEST['s']=='All' OR $_REQUEST['s']>0 OR $_REQUEST['hq']>0)
{


if($_REQUEST['rbm']>0 OR $_REQUEST['abm']>0)  ///1111111111111///
{  

 if($_REQUEST['rbm']>0){$ri=$_REQUEST['rbm'];}else{$ri=$_REQUEST['abm'];}
 $sqlee=mysql_query("select * from fa_notaccemp where RepEmpId=".$ri,$con); $rowee=mysql_num_rows($sqlee);
 if($rowee>0)
 {
  $sql=mysql_query("select * from fa_notaccemp nf inner join hrm_sales_reporting_level rl on (nf.EmpId=rl.EmployeeID OR nf.EmpId=rl.R1 OR nf.EmpId=rl.R2 OR nf.EmpId=rl.R3 OR nf.EmpId=rl.R4) inner join fa_details fd on rl.EmployeeID=fd.Reporting where (nf.RepEmpId=".$ri." OR rl.EmployeeID=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);
 }
 else
 {
  $sql=mysql_query("select * from fa_details fd inner join hrm_sales_reporting_level rl on fd.Reporting=rl.EmployeeID where (fd.Reporting=".$ri." OR rl.R1=".$ri." OR rl.R2=".$ri." OR rl.R3=".$ri." OR rl.R4=".$ri." OR rl.R5=".$ri.") AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);
 }	
 
} 
elseif($_REQUEST['s']=='All'){ $sql=mysql_query("select * from fa_details where ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); } elseif($_REQUEST['hq']>0){ $sql=mysql_query("select * from fa_details where HqId=".$_REQUEST['hq']." AND ((FaStatus='A' AND (LWD='0000-00-00' OR LWD='1970-01-01')) OR (FaStatus='D' AND LWD>='".date($y."-".$m."-01")."')) AND DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con); }elseif($_REQUEST['s']>0){ $sql=mysql_query("select * from fa_details f inner join hrm_headquater hq on f.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." AND ((FaStatus='A' AND (f.LWD='0000-00-00' OR f.LWD='1970-01-01')) OR (FaStatus='D' AND f.LWD>='".date($y."-".$m."-01")."')) AND f.DOJ<='".date($y."-".$m."-31")."' order by FaId ASC",$con);}


      $sn=1; while($res=mysql_fetch_array($sql)){ $hq=mysql_query("select HqName,StateName from hrm_headquater hq inner join hrm_state st on hq.StateId=st.StateId where hq.HqId=".$res['HqId'],$con); $rhq=mysql_fetch_assoc($hq);?>	
    <tr bgcolor="#FFFFFF" id="TR<?php echo $sn; ?>">
      <td align="center" class="tdf2" style="width:50px;"><input type="checkbox" id="Chk<?php echo $sn; ?>" onClick="FucChk(<?php echo $sn; ?>)" /></td>
	  <td class="tdf2" align="center"><?php echo $sn; ?></td>
	  <td class="tdf2">&nbsp;<span style="cursor:pointer;color:#0079F2;" onClick="funDetail(<?php echo $res['FaId']; ?>)"><u><?php echo $res['FaName']; ?></u></span></td>
	  <td class="tdf2"><input class="InputType" style="width:150px;" id="mode<?php echo $sn; ?>" value="<?php if($res['Mode']==1){echo 'Direct(Sales Executive)';}elseif($res['Mode']==2){echo 'Teamlease';}elseif($res['Mode']==3){echo 'Distributor';}?>" readonly/></td>
	  <td class="tdf2"><input class="InputType" style="width:90px;" id="hq<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($res['OtherHq'])); ?>"/></td>
	  <td class="tdf2"><input class="InputType" style="width:90px;" id="state<?php echo $sn; ?>" value="<?php echo ucfirst(strtolower($rhq['StateName'])); ?>"/></td>
	 <td class="tdf2" align="center"><?php echo $Month; ?></td>
	 <td class="tdf2" align="center"><?php echo $_REQUEST['y']; ?></td>

<?php $p=mysql_query("select count(Attv)as P from fa_attd where Attv='P' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $rp=mysql_fetch_assoc($p); 
$a=mysql_query("select count(Attv)as A from fa_attd where Attv='A' AND FaId=".$res['FaId']." AND (Attd between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$day)."')",$con); $ra=mysql_fetch_assoc($a); ?>	  
<td class="tdf2" align="center" style="background-color:#FFD1A4;"><?php if($rp['P']>0){echo $rp['P'];} ?></td>
<td class="tdf2" align="center" style="background-color:#FFD1A4;"><?php if($ra['A']>0){echo $ra['A'];} ?></td>
	  
	 <?php for($i=1; $i<=$day; $i++){ $sqlF=mysql_query("select * from fa_attd where FaId=".$res['FaId']." AND Attd='".date($y."-".$m."-".$i)."'", $con); $resF=mysql_fetch_array($sqlF); ?>
    <td align="center" class="tdf2" valign="middle" width="35" bgcolor="<?php if(date("w",strtotime(date($y.'-'.$m.'-'.$i)))==0) {echo '#6B983A';}?>"><?php if($resF['Attv']==''){ echo ''; } else {echo $resF['Attv'];} ?></td>
<?php } ?>
	</tr>
<?php $sn++; } 

} //if($_REQUEST['rbm']>0 OR $_REQUEST['abm']>0 OR $_REQUEST['s']=='All' OR $_REQUEST['s']>0 OR $_REQUEST['hq']>0)
?> 
   </table>
  </td>
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