<?php 
require_once('config/config.php');
if(isset($_POST['HQid']) && $_POST['HQid']!=""){ 
	$HQid = $_POST['HQid']; $CompanyId = $_POST['ComId']; $DeptId = $_POST['DeptId']; $YId = $_POST['YId'];?>
	 <table border="1">
	  <tr bgcolor="#7a6189">
		 <td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
		 <td align="center" style="color:#FFFFFF;" class="All_200"><b>HOD</b></td>
		 <td align="center" style="color:#FFFFFF;" class="All_200"><b>Reviewer</b></td>
		 <td align="center" style="color:#FFFFFF;" class="All_200"><b>Appraiser</b></td>
		 <td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpCode</b></td>
		 <td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
		 <td align="center" style="color:#FFFFFF;" class="All_150"><b>Designation</b></td>
		 <td align="center" style="color:#FFFFFF;" class="All_150"><b>HeadQuater</b></td>		
	  </tr>
<?php if($HQid!='All') {$sqlDP = mysql_query("SELECT hrm_employee.*,hrm_employee_general.*,Reviewer_EmployeeID,HOD_EmployeeID,ReviewerType,Appraiser_EmployeeID,AppraiserType FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID WHERE EmpStatus='A' AND EmpType='E' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$DeptId." AND hrm_employee_pms.AssessmentYear=".$YId." AND HqId=".$HQid, $con) or die(mysql_error()); }
      if($HQid=='All') {$sqlDP = mysql_query("SELECT hrm_employee.*,hrm_employee_general.*,Reviewer_EmployeeID,HOD_EmployeeID,ReviewerType,Appraiser_EmployeeID,AppraiserType FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID WHERE EmpStatus='A' AND EmpType='E' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$DeptId, $con) or die(mysql_error()); }
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { ?>	
		<tr bgcolor="#FFFFFF"> 
		<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
		
<?php //************************************************************ HOD ************************************************************* ?>
		
		<td align="center" style="color:#FFFFFF;" class="All_200">
		<input type="hidden" style="color:#000000; " name="EmpID_<?php echo $Sno; ?>" value="<?php echo $resDP['EmployeeID']; ?>"/>
		<span id="TypeSpan"></span>
		<input type="hidden" name="RevType_<?php echo $Sno; ?>" id="RevType_<?php echo $Sno; ?>" value="<?php echo $resDP['ReviewerType']; ?>" />
		<select <?php if($resDP['HOD_EmployeeID']==0) {echo 'style="background-color:#FFFFFF;"'; } if($resDP['HOD_EmployeeID']!=0) {echo 'style="background-color:#FFE8DD;"'; } ?> name="SelIncReviewer_<?php echo $Sno; ?>" id="SelIncReviewer_<?php echo $Sno; ?>" class="All_190" disabled>
<?php if($resDP['HOD_EmployeeID']!=0){
	  $sqlRI = mysql_query("SELECT hrm_employee.*,DesigId,DesigId2,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resDP['HOD_EmployeeID'], $con); $resRI=mysql_fetch_assoc($sqlRI); 
      if($resRI['Gender']=='M'){$M='Mr.';} elseif($resRI['Gender']=='F' AND $resRI['Married']=='Y'){$M='Mrs.';} elseif($resRI['Gender']=='F' AND $resRI['Married']=='N'){$M='Miss.';} 
	  $Name=$resRI['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$resRI['Fname'].' '.$resRI['Sname'].' '.$resRI['Lname'];   
      $sqlDes=mysql_query("select DesigCode from hrm_designation where DesigId=".$resRI['DesigId']." OR DesigId=".$resRI['DesigId2'], $con); 
	  $resDes=mysql_fetch_assoc($sqlDes); $Position=$resDes['DesigCode'];  
	  echo '<option value='.$resDP['HOD_EmployeeID'].' selected>'.$Name.'&nbsp;&nbsp;-&nbsp;&nbsp;('.$Position.')</option><option value="0"></option>'; } 
	  elseif($resDP['HOD_EmployeeID']==0) { echo '<option value="0">Select HOD</option><option value="0">&nbsp;</option>'; }
		
		
      $sqlRevI=mysql_query("select * from hrm_pms_reviewer where DepartmentId=".$DPid." Order By ReviewerId ASC", $con); 
	  while($resRevI=mysql_fetch_array($sqlRevI)) {              
      $sqlEI=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DesigId2,Gender,Married from hrm_pms_reviewer INNER JOIN hrm_employee ON hrm_pms_reviewer.EmployeeID_UserId=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_pms_reviewer.EmployeeID_UserId=".$resRevI['EmployeeID_UserId'], $con); 
	  $resEI=mysql_fetch_assoc($sqlEI);
	  if($resEI['Gender']=='M'){$M='Mr.';} elseif($resEI['Gender']=='F' AND $resEI['Married']=='Y'){$M='Mrs.';} elseif($resEI['Gender']=='F' AND $resEI['Married']=='N'){$M='Miss.';} 
	  $Name=$resEI['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$resEI['Fname'].' '.$resEI['Sname'].' '.$resEI['Lname']; 
	  $sqlDe=mysql_query("select DesigCode from hrm_designation where DesigId=".$resEI['DesigId']." OR DesigId=".$resEI['DesigId2'], $con); $resDe=mysql_fetch_assoc($sqlDe);
	  $Position=$resDe['DesigCode'];  ?> 
<option style="background-color:#FFFFFF;" value="<?php echo $resRevI['EmployeeID_UserId']; ?>"><?php echo $Name.'&nbsp;&nbsp;-&nbsp;&nbsp;('.$Position.')'; ?></option>
<?php }?></select>
  		</td>
		
<?php //************************************************************ Reviewer ************************************************************* ?>
		
		<td align="center" style="color:#FFFFFF;" class="All_200">
		<select <?php if($resDP['Reviewer_EmployeeID']==0) {echo 'style="background-color:#FFFFFF;"'; } if($resDP['Reviewer_EmployeeID']!=0) {echo 'style="background-color:#FFE8DD;"'; } ?> name="SelReviewer_<?php echo $Sno; ?>" id="SelReviewer_<?php echo $Sno; ?>" class="All_190" disabled >
<?php if($resDP['Reviewer_EmployeeID']!=0){
	  $sqlR = mysql_query("SELECT hrm_employee.*,DesigId,DesigId2,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resDP['Reviewer_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); 
      if($resR['Gender']=='M'){$M='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$M='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$M='Miss.';} 
	  $Name=$resR['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'];   
      $sqlDes=mysql_query("select DesigCode from hrm_designation where DesigId=".$resR['DesigId']." OR DesigId=".$resR['DesigId2'], $con); 
	  $resDes=mysql_fetch_assoc($sqlDes); $Position=$resDes['DesigCode'];  
	  echo '<option value='.$resDP['Reviewer_EmployeeID'].' selected>'.$Name.'&nbsp;&nbsp;-&nbsp;&nbsp;('.$Position.')</option><option value="0"></option>'; }   
	  elseif($resDP['Reviewer_EmployeeID']==0) { echo '<option value="0">Select Reviewer</option><option value="0">&nbsp;</option>'; }	
		
      $sqlRev=mysql_query("select * from hrm_pms_reviewer where DepartmentId=".$DeptId." Order By ReviewerId ASC", $con); while($resRev=mysql_fetch_array($sqlRev)) {            
      $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DesigId2,Gender,Married from hrm_pms_reviewer INNER JOIN hrm_employee ON hrm_pms_reviewer.EmployeeID_UserId=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_pms_reviewer.EmployeeID_UserId=".$resRev['EmployeeID_UserId'], $con); 
	  $resE=mysql_fetch_assoc($sqlE);
	  if($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';} 
	  $Name=$resE['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  $sqlDe=mysql_query("select DesigCode from hrm_designation where DesigId=".$resE['DesigId']." OR DesigId=".$resE['DesigId2'], $con); $resDe=mysql_fetch_assoc($sqlDe);
	  $Position=$resDe['DesigCode'];  ?>
<option style="background-color:#FFFFFF;" value="<?php echo $resRev['EmployeeID_UserId']; ?>"><?php echo $Name.'&nbsp;&nbsp;-&nbsp;&nbsp;('.$Position.')'; ?></option>
<?php }?></select>	   		  
  		</td>

		
<?php //************************************************************ Appraiser ************************************************************* ?>
	
		<td align="center" style="color:#FFFFFF;" class="All_200">
		<select <?php if($resDP['Appraiser_EmployeeID']==0) {echo 'style="background-color:#FFFFFF;"'; } if($resDP['Appraiser_EmployeeID']!=0) {echo 'style="background-color:#FFE8DD;"'; } ?> name="SelAppraiser_<?php echo $Sno; ?>" id="SelAppraiser_<?php echo $Sno; ?>" class="All_190" disabled>
<?php if($resDP['Appraiser_EmployeeID']!=0){$sqlR = mysql_query("SELECT hrm_employee.*,DesigId,DesigId2,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resDP['Appraiser_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); 
      if($resR['Gender']=='M'){$M='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$M='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$M='Miss.';} 
	  $Name=$resR['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; 
      $sqlDes=mysql_query("select DesigCode from hrm_designation where DesigId=".$resR['DesigId']." OR DesigId=".$resR['DesigId2'], $con); 
	  $resDes=mysql_fetch_assoc($sqlDes); $Position=$resDes['DesigCode'];  
	  echo '<option value='.$resDP['Appraiser_EmployeeID'].' selected>'.$Name.'&nbsp;&nbsp;-&nbsp;&nbsp;('.$Position.')</option><option value="0"></option>';} 
	  if($resDP['Appraiser_EmployeeID']==0) { echo '<option value="0">Select Appraiser</option><option value="0">&nbsp;</option>'; }

      $sqlRev=mysql_query("select * from hrm_pms_appraiser where DepartmentId=".$DeptId." Order By AppraiserId ASC", $con); $no=1; while($resApp=mysql_fetch_array($sqlRev)) { 
             
      $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DesigId2,Gender,Married from hrm_pms_appraiser INNER JOIN hrm_employee ON hrm_pms_appraiser.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_pms_appraiser.EmployeeID=".$resApp['EmployeeID'], $con); 
	  $resE=mysql_fetch_assoc($sqlE);
	  if($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';} 
	  $NameApp=$resE['EmpCode'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  $sqlDe=mysql_query("select DesigCode from hrm_designation where DesigId=".$resE['DesigId']." OR DesigId=".$resE['DesigId2'], $con); $resDe=mysql_fetch_assoc($sqlDe);
	  $PositionApp=$resDe['DesigCode'];  ?> 
      <option style="background-color:#FFFFFF;" value="<?php echo $resApp['EmployeeID']; ?>"><?php echo $NameApp.'&nbsp;&nbsp;-&nbsp;&nbsp;('.$PositionApp.')'; ?></option>
<?php $no++; } ?></select>
		</td>
		<td align="center" style="" class="All_80">&nbsp;<?php echo $resDP['EmpCode']; ?></td>
		<td style="" class="All_200">&nbsp;<?php echo $resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; ?></td>
		<td style="" class="All_150">&nbsp;
		<?php $sqlDesig = mysql_query("SELECT DesigCode FROM hrm_designation WHERE DesigId=".$resDP['DesigId'], $con) or die(mysql_error()); 
		      $resDesig = mysql_fetch_assoc($sqlDesig); echo $resDesig['DesigCode'];?>
		</td>
		<td style="" class="All_150">&nbsp;
		<?php $sqlHQ = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$resDP['HqId'], $con) or die(mysql_error()); 
		      $resHQ = mysql_fetch_assoc($sqlHQ); echo $resHQ['HqName'];?>
		</td>
		</tr>
		<?php $Sno++; } $NO=$Sno-1;?>
	</table>
	<input type="hidden" name="Sn"  id="Sn" value="<?php echo $NO; ?>" />
<?php } ?>
