<?php session_start();
require_once('../AdminUser/config/config.php');
if(isset($_POST['HQid']) && $_POST['HQid']!="")
{ $HQid = $_POST['HQid']; $EmpId = $_POST['EmpId']; $YI = $_POST['YI']; $CI = $_POST['CI']; ?>	 
<table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
	<div class="thead">
	<thead>
	 <tr bgcolor="#7a6189" style="height:25px;">
	  <td class="th" style="width:3%;"><b>Sn</b></td>
	  <td class="th" style="width:4%;"><b>EC</b></td>
	  <td class="th" style="width:20%;"><b>Name</b></td>
	  <td class="th" style="width:10%;"><b>Department</b></td>
	 
	  <td class="th" style="width:20%;"><b>Designation</b></td>
	  <td class="th" style="width:4%;"><b>Grade</b></td>
	  
	  <td class="th" style="width:10%;"><b>Head Quater</b></td>
	  <!--<td class="th" style="width:10%;"><b>State</b></td>-->
	  <td class="th" style="width:15%;"><b>Appraiser</b></td>
	  <?php if(($_SESSION['Dept']==6 AND $_SESSION['Grade']>=68) OR $EmpId==35 OR $EmpId==778 OR $EmpId==362 OR $EmpId==52 OR $EmpId==359 OR $EmpId==263 OR $EmpId==6 OR $EmpId==51 OR $EmpId==195 OR $EmpId==52 OR $EmpId==142 OR $EmpId==109 OR $EmpId==110 OR $EmpId==28 OR $EmpId==68 OR $EmpId==7 OR $EmpId==89 OR $EmpId==224 OR $EmpId==601 OR $EmpId==65 OR $EmpId==321 OR $EmpId==719 OR $EmpId==461 OR $EmpId==223 OR $EmpId==759){?>
	  <td class="th" style="width:5%;"><b>Appraisal<br>Letter</b></td>
	  <?php } ?>
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="th" style="width:4%;"><b>KRA</b></td>
<?php }if($_SESSION['rEHform']=='Y'){ ?><td class="th" style="width:4%;"><b>History</b></td>
<?php }if($_SESSION['rEPform']=='Y'){ ?><td class="th" style="width:4%;"><b>Form</b></td><?php } ?>
     </tr>
	</thead>
	</div>
<?php if($HQid=='All'){ $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YI." AND p.Reviewer_EmployeeID=".$EmpId, $con); }
else{ $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND g.HqId=".$HQid." AND p.AssessmentYear=".$YI." AND p.Reviewer_EmployeeID=".$EmpId, $con); }

$sno=1; while($res=mysql_fetch_array($sql)){ ?>
   
     <div class="tbody">
	 <tbody> 		
	  <tr style="height:22px;background-color:#FFFFFF;">
	   <td class="tdc"><?php echo $sno; ?></td>
	   <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?></td>
       <td class="tdl">&nbsp;<?php echo strtoupper($res['DepartmentCode']);?></td>
      
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['DesigName']);?></td>					
	   <td class="tdc"><?php echo $res['GradeValue'];?></td>
	   
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['HqName']);?></td>				
	   <?php /*?><td class="tdl">&nbsp;<?php echo strtoupper($res['StateName']);?></td><?php */?>
<?php $sql6=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'],$con);  
      $res6=mysql_fetch_assoc($sql6); ?>					
	   <td class="tdl">&nbsp;<?php echo $res6['Fname'].' '.$res6['Sname'].' '.$res6['Lname']; ?></td>	

<?php if(($_SESSION['Dept']==6 AND $_SESSION['Grade']>=68) OR $EmpId==35 OR $EmpId==778 OR $EmpId==362 OR $EmpId==52 OR $EmpId==359 OR $EmpId==263 OR $EmpId==6 OR $EmpId==51 OR $EmpId==195 OR $EmpId==52 OR $EmpId==142 OR $EmpId==109 OR $EmpId==110 OR $EmpId==28 OR $EmpId==68 OR $EmpId==7 OR $EmpId==89 OR $EmpId==224 OR $EmpId==601 OR $EmpId==65 OR $EmpId==321 OR $EmpId==719 OR $EmpId==461 OR $EmpId==223 OR $EmpId==759){?>
<!-------------------------------------->
<!-------------------------------------->
<script type="text/javascript" language="javascript">
function LetterAllPdf(P,E,Y,C,R,G,D)
{window.open("pmsletter/VeiwAppAllPdf.php?action=All&test=true&rightform=false&cc=102&prp=55&rtr=%true%&ff=ok&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D+"&nn=1","AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
</script>
<?php $SqlP=mysql_query("select Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,HR_CurrDesigId,HR_CurrGradeId from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND EmployeeID=".$res['EmployeeID']." AND EmpPmsId=".$res['EmpPmsId'], $con); $ResP=mysql_fetch_assoc($SqlP);
$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['Hod_EmpDesignation'],$con); 
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$res['CompanyId'],$con);
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$res['CompanyId'],$con); $sqlDe=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['HR_CurrDesigId'], $con);
$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['HR_CurrGradeId']." AND CompanyId=".$res['CompanyId'],$con); $resD=mysql_fetch_assoc($sqlD); $resG=mysql_fetch_assoc($sqlG); $resGrade=mysql_fetch_assoc($sqlGrade);
$resDe=mysql_fetch_assoc($sqlDe); $resGr=mysql_fetch_assoc($sqlGr);

if($ResP['Hod_TotalFinalRating']>0){$EmpRating=$ResP['Hod_TotalFinalRating']; } else{$EmpRating=$ResP['Reviewer_TotalFinalRating']; }if($resG['GradeValue']==''){$EmpGrade=$resGr['GradeValue'];} else{$EmpGrade=$resG['GradeValue'];} if($resD['DesigId']==''){$Desig=$resDe['DesigId'];}else {$Desig=$resD['DesigId']; } ?>
<td class="tdc" style="text-align:center;"><a href="#" onClick="LetterAllPdf(<?php echo $res['EmpPmsId'].','.$res['EmployeeID'].','.$_SESSION['PmsYId'].','.$res['CompanyId'].','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><img src="images/AppLet.png" style="width:80px;height:20px;" border="0"/></a></td>
<!-------------------------------------->
<!-------------------------------------->	   
<?php } ?>
	   	
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="tdc"><a href="#" onClick="EmpKRA(<?php echo $CI.', '.$_SESSION['PmsYId'].','.$res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEHform']=='Y'){ ?><td class="tdc"><a href="javascript:ReadHistory(<?php echo $res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEPform']=='Y'){ ?><td class="tdc"><?php if($res['Appraiser_PmsStatus']==2){?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId'].','.$CI; ?>)">Click</a> <?php } ?></td>
<?php } ?>			
	   </tr>
	  </tbody>
	  </div>
<?php $sno++;} ?>		
</table>
	 	
<?php } ?>





<?php if(isset($_POST['Deptid']) && $_POST['Deptid']!="")
{ $Deptid = $_POST['Deptid']; $EmpId = $_POST['EmpId']; $YI = $_POST['YI']; $CI = $_POST['CI']; ?>	 
<table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
	<div class="thead">
	<thead>
	 <tr bgcolor="#7a6189" style="height:25px;">
	  <td class="th" style="width:3%;"><b>Sn</b></td>
	  <td class="th" style="width:4%;"><b>EC</b></td>
	  <td class="th" style="width:20%;"><b>Name</b></td>
	  <td class="th" style="width:10%;"><b>Department</b></td>
	  
	  <td class="th" style="width:20%;"><b>Designation</b></td>
	  <td class="th" style="width:4%;"><b>Grade</b></td>
	  
	  <td class="th" style="width:10%;"><b>Head Quater</b></td>
	  <!--<td class="th" style="width:10%;"><b>State</b></td>-->
	  <td class="th" style="width:15%;"><b>Appraiser</b></td>
	  <?php if(($_SESSION['Dept']==6 AND $_SESSION['Grade']>=68) OR $EmpId==35 OR $EmpId==778 OR $EmpId==362 OR $EmpId==52 OR $EmpId==359 OR $EmpId==263 OR $EmpId==6 OR $EmpId==51 OR $EmpId==195 OR $EmpId==52 OR $EmpId==142 OR $EmpId==109 OR $EmpId==110 OR $EmpId==28 OR $EmpId==68 OR $EmpId==7 OR $EmpId==89 OR $EmpId==224 OR $EmpId==601 OR $EmpId==65 OR $EmpId==321 OR $EmpId==719 OR $EmpId==461 OR $EmpId==223 OR $EmpId==759){?>
	  <td class="th" style="width:5%;"><b>Appraisal<br>Letter</b></td>
	  <?php } ?>
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="th" style="width:4%;"><b>KRA</b></td>
<?php }if($_SESSION['rEHform']=='Y'){ ?><td class="th" style="width:4%;"><b>History</b></td>
<?php }if($_SESSION['rEPform']=='Y'){ ?><td class="th" style="width:4%;"><b>Form</b></td><?php } ?>
     </tr>
	</thead>
	</div>
<?php if($Deptid=='All'){ $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$YI." AND p.Reviewer_EmployeeID=".$EmpId, $con); }
else{ $sql=mysql_query("select e.EmployeeID, e.CompanyId, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Emp_PmsStatus, Appraiser_EmployeeID, Appraiser_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND g.DepartmentId=".$Deptid." AND p.AssessmentYear=".$YI." AND p.Reviewer_EmployeeID=".$EmpId, $con); }

$sno=1; while($res=mysql_fetch_array($sql)){ ?>
   
     <div class="tbody">
	 <tbody> 		
	  <tr style="height:22px;background-color:#FFFFFF;">
	   <td class="tdc"><?php echo $sno; ?></td>
	   <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?></td>
       <td class="tdl">&nbsp;<?php echo strtoupper($res['DepartmentCode']);?></td>
       
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['DesigName']);?></td>					
	   <td class="tdc"><?php echo $res['GradeValue'];?></td>
	  
	   <td class="tdl">&nbsp;<?php echo strtoupper($res['HqName']);?></td>				
	   <?php /*?><td class="tdl">&nbsp;<?php echo strtoupper($res['StateName']);?></td><?php */?>
<?php $sql6=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'],$con);  
      $res6=mysql_fetch_assoc($sql6); ?>					
	   <td class="tdl">&nbsp;<?php echo $res6['Fname'].' '.$res6['Sname'].' '.$res6['Lname']; ?></td>	

<?php if(($_SESSION['Dept']==6 AND $_SESSION['Grade']>=68) OR $EmpId==35 OR $EmpId==778 OR $EmpId==362 OR $EmpId==52 OR $EmpId==359 OR $EmpId==263 OR $EmpId==6 OR $EmpId==51 OR $EmpId==195 OR $EmpId==52 OR $EmpId==142 OR $EmpId==109 OR $EmpId==110 OR $EmpId==28 OR $EmpId==68 OR $EmpId==7 OR $EmpId==89 OR $EmpId==224 OR $EmpId==601 OR $EmpId==65 OR $EmpId==321 OR $EmpId==719 OR $EmpId==461 OR $EmpId==223 OR $EmpId==759){?>
<!-------------------------------------->
<!-------------------------------------->
<script type="text/javascript" language="javascript">
function LetterAllPdf(P,E,Y,C,R,G,D)
{window.open("pmsletter/VeiwAppAllPdf.php?action=All&test=true&rightform=false&cc=102&prp=55&rtr=%true%&ff=ok&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D+"&nn=1","AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
</script>
<?php $SqlP=mysql_query("select Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,HR_CurrDesigId,HR_CurrGradeId from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND EmployeeID=".$res['EmployeeID']." AND EmpPmsId=".$res['EmpPmsId'], $con); $ResP=mysql_fetch_assoc($SqlP);
$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['Hod_EmpDesignation'],$con); 
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$res['CompanyId'],$con);
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$res['CompanyId'],$con); $sqlDe=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['HR_CurrDesigId'], $con);
$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['HR_CurrGradeId']." AND CompanyId=".$res['CompanyId'],$con); $resD=mysql_fetch_assoc($sqlD); $resG=mysql_fetch_assoc($sqlG); $resGrade=mysql_fetch_assoc($sqlGrade);
$resDe=mysql_fetch_assoc($sqlDe); $resGr=mysql_fetch_assoc($sqlGr);

if($ResP['Hod_TotalFinalRating']>0){$EmpRating=$ResP['Hod_TotalFinalRating']; } else{$EmpRating=$ResP['Reviewer_TotalFinalRating']; }if($resG['GradeValue']==''){$EmpGrade=$resGr['GradeValue'];} else{$EmpGrade=$resG['GradeValue'];} if($resD['DesigId']==''){$Desig=$resDe['DesigId'];}else {$Desig=$resD['DesigId']; } ?>
<td class="tdc" style="text-align:center;"><a href="#" onClick="LetterAllPdf(<?php echo $res['EmpPmsId'].','.$res['EmployeeID'].','.$_SESSION['PmsYId'].','.$res['CompanyId'].','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><img src="images/AppLet.png" style="width:80px;height:20px;" border="0"/></a></td>
<!-------------------------------------->
<!-------------------------------------->	   
<?php } ?>
	   	
<?php if($_SESSION['rEKform']=='Y'){ ?><td class="tdc"><a href="#" onClick="EmpKRA(<?php echo $CI.', '.$_SESSION['PmsYId'].','.$res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEHform']=='Y'){ ?><td class="tdc"><a href="javascript:ReadHistory(<?php echo $res['EmployeeID']; ?>)">Click</a></td>
<?php } if($_SESSION['rEPform']=='Y'){ ?><td class="tdc"><?php if($res['Appraiser_PmsStatus']==2){?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId'].','.$CI; ?>)">Click</a> <?php } ?></td>
<?php } ?>			
	   </tr>
	  </tbody>
	  </div>
<?php $sno++;} ?>		
</table>
	 	
<?php } ?>
