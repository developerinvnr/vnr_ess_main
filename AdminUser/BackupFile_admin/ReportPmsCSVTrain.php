<?php
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['Y']==1){$Y=2012;}elseif($_REQUEST['Y']==2){$Y=2013;}elseif($_REQUEST['Y']==3){$Y=2014;}elseif($_REQUEST['Y']==4){$Y=2015;}elseif($_REQUEST['Y']==5){$Y=2016;}elseif($_REQUEST['Y']==6){$Y=2017;}elseif($_REQUEST['Y']==7){$Y=2018;}elseif($_REQUEST['Y']==8){$Y=2019;}elseif($_REQUEST['Y']==9){$Y=2020;}

if($_REQUEST['action']='ExportTrain') 
{
if($_REQUEST['value']=='All') {$DeptV='All_Employee';}
  else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
        $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
$csv_output .= '"SNo",'; 
$csv_output .= '"EC",'; 
$csv_output .= '"Name",';
$csv_output .= '"Appraiser SoftSkill",';
$csv_output .= '"Appraiser TechnincalSkill",';
$csv_output .= '"Reviewer SoftSkill",';
$csv_output .= '"Reviewer TechnincalSkill",';
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );

if($_REQUEST['value']=='All') { $result = mysql_query("SELECT EmpCode, Fname, Sname, Lname, Appraiser_SoftSkill_1, Appraiser_SoftSkill_2, Appraiser_TechSkill_1, Appraiser_TechSkill_2, Reviewer_SoftSkill_1, Reviewer_SoftSkill_2, Reviewer_TechSkill_1, Reviewer_TechSkill_2 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$_REQUEST['C']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['Y']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' order by hrm_employee_pms.EmployeeID ASC", $con) or die(mysql_error()); } else {$result = mysql_query("SELECT EmpCode, Fname, Sname, Lname, Appraiser_SoftSkill_1, Appraiser_SoftSkill_2, Appraiser_TechSkill_1, Appraiser_TechSkill_2, Reviewer_SoftSkill_1, Reviewer_SoftSkill_2, Reviewer_TechSkill_1, Reviewer_TechSkill_2 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$_REQUEST['C']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['Y']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." order by hrm_employee_pms.EmployeeID ASC", $con) or die(mysql_error());} $Sno=1; while($res = mysql_fetch_array($result))
{
$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Appraiser_SoftSkill_1'].', '.$res['Appraiser_SoftSkill_2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Appraiser_TechSkill_1'].', '.$res['Appraiser_TechSkill_2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Reviewer_SoftSkill_1'].', '.$res['Reviewer_SoftSkill_2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Reviewer_TechSkill_1'].', '.$res['Reviewer_TechSkill_2']).'",';
$csv_output .= "\n";
$Sno++;}
# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Emp_PMS_Training_".$PRD."-".$DeptV.".csv");
echo $csv_output;
exit;
}
?>