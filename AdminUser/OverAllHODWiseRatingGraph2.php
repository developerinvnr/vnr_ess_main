<?php session_start();
include('config/config.php');
include('AdminMenuSession.php');
if($_REQUEST['EmpId']) 
{$SE=mysql_query("select Fname,Sname,Lname,Gender,Married,DR from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$_REQUEST['EmpId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $resDP=mysql_fetch_assoc($SE);  if($resDP['DR']=='Y'){$MS='Dr.';} elseif($resDP['Gender']=='M'){$MS='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$MS='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; }

if($_REQUEST['action']=='LinGraph')
{
//Employee 
$SqlE1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=1 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE1=mysql_num_rows($SqlE1); 
$SqlE2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE2=mysql_num_rows($SqlE2); 
$SqlE25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE25=mysql_num_rows($SqlE25); 
$SqlE27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE27=mysql_num_rows($SqlE27); 
$SqlE29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE29=mysql_num_rows($SqlE29); 
$SqlE3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE3=mysql_num_rows($SqlE3); 
$SqlE32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE32=mysql_num_rows($SqlE32); 
$SqlE34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE34=mysql_num_rows($SqlE34); 
$SqlE35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE35=mysql_num_rows($SqlE35); 
$SqlE37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE37=mysql_num_rows($SqlE37); 
$SqlE39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE39=mysql_num_rows($SqlE39); 
$SqlE4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE4=mysql_num_rows($SqlE4); 
$SqlE42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE42=mysql_num_rows($SqlE42); 
$SqlE44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE44=mysql_num_rows($SqlE44); 
$SqlE45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE45=mysql_num_rows($SqlE45); 
$SqlE47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE47=mysql_num_rows($SqlE47); 
$SqlE49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE49=mysql_num_rows($SqlE49); 
$SqlE5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowE5=mysql_num_rows($SqlE5); 


//Appraiser
$SqlA1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=1 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA1=mysql_num_rows($SqlA1); 
$SqlA2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA2=mysql_num_rows($SqlA2); 
$SqlA25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA25=mysql_num_rows($SqlA25); 
$SqlA27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA27=mysql_num_rows($SqlA27); 
$SqlA29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA29=mysql_num_rows($SqlA29); 
$SqlA3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA3=mysql_num_rows($SqlA3); 
$SqlA32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA32=mysql_num_rows($SqlA32); 
$SqlA34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA34=mysql_num_rows($SqlA34); 
$SqlA35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA35=mysql_num_rows($SqlA35); 
$SqlA37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA37=mysql_num_rows($SqlA37); 
$SqlA39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA39=mysql_num_rows($SqlA39); 
$SqlA4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA4=mysql_num_rows($SqlA4); 
$SqlA42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA42=mysql_num_rows($SqlA42); 
$SqlA44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA44=mysql_num_rows($SqlA44); 
$SqlA45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA45=mysql_num_rows($SqlA45); 
$SqlA47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA47=mysql_num_rows($SqlA47); 
$SqlA49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA49=mysql_num_rows($SqlA49); 
$SqlA5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowA5=mysql_num_rows($SqlA5); 


//Reviewer
$SqlR1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=1 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR1=mysql_num_rows($SqlR1); 
$SqlR2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR2=mysql_num_rows($SqlR2); 
$SqlR25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR25=mysql_num_rows($SqlR25); 
$SqlR27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR27=mysql_num_rows($SqlR27); 
$SqlR29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR29=mysql_num_rows($SqlR29); 
$SqlR3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR3=mysql_num_rows($SqlR3); 
$SqlR32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR32=mysql_num_rows($SqlR32); 
$SqlR34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR34=mysql_num_rows($SqlR34); 
$SqlR35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR35=mysql_num_rows($SqlR35); 
$SqlR37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR37=mysql_num_rows($SqlR37); 
$SqlR39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR39=mysql_num_rows($SqlR39); 
$SqlR4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR4=mysql_num_rows($SqlR4); 
$SqlR42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR42=mysql_num_rows($SqlR42); 
$SqlR44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR44=mysql_num_rows($SqlR44); 
$SqlR45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR45=mysql_num_rows($SqlR45); 
$SqlR47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR47=mysql_num_rows($SqlR47); 
$SqlR49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR49=mysql_num_rows($SqlR49); 
$SqlR5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowR5=mysql_num_rows($SqlR5); 

//HOD
$SqlH1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=1 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH1=mysql_num_rows($SqlH1); 
$SqlH2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH2=mysql_num_rows($SqlH2); 
$SqlH25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH25=mysql_num_rows($SqlH25); 
$SqlH27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH27=mysql_num_rows($SqlH27); 
$SqlH29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH29=mysql_num_rows($SqlH29); 
$SqlH3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH3=mysql_num_rows($SqlH3); 
$SqlH32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH32=mysql_num_rows($SqlH32); 
$SqlH34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH34=mysql_num_rows($SqlH34); 
$SqlH35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH35=mysql_num_rows($SqlH35); 
$SqlH37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH37=mysql_num_rows($SqlH37); 
$SqlH39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH39=mysql_num_rows($SqlH39); 
$SqlH4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH4=mysql_num_rows($SqlH4); 
$SqlH42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.2 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH42=mysql_num_rows($SqlH42); 
$SqlH44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.4 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH44=mysql_num_rows($SqlH44); 
$SqlH45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH45=mysql_num_rows($SqlH45); 
$SqlH47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.7 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH47=mysql_num_rows($SqlH47); 
$SqlH49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.9 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH49=mysql_num_rows($SqlH49); 
$SqlH5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=5 AND HOD_EmployeeID=".$_REQUEST['EmpId'], $con); $RowH5=mysql_num_rows($SqlH5);
 
$vE1=number_format($RowE1, 0, '.', '');  $vE2=number_format($RowE2, 0, '.', ''); $vE25=number_format($RowE25, 0, '.', '');  $vE27=number_format($RowE27, 0, '.', ''); 
$vE29=number_format($RowE29, 0, '.', ''); $vE3=number_format($RowE3, 0, '.', ''); $vE32=number_format($RowE32, 0, '.', ''); $vE34=number_format($RowE34, 0, '.', '');
$vE35=number_format($RowE35, 0, '.', ''); $vE37=number_format($RowE37, 0, '.', ''); $vE39=number_format($RowE39, 0, '.', ''); $vE4=number_format($RowE4, 0, '.', '');
$vE42=number_format($RowE42, 0, '.', ''); $vE44=number_format($RowE44, 0, '.', ''); $vE45=number_format($RowE45, 0, '.', ''); $vE47=number_format($RowE47, 0, '.', '');
$vE49=number_format($RowE49, 0, '.', ''); $vE5=number_format($RowE5, 0, '.', ''); 

$vA1=number_format($RowA1, 0, '.', '');  $vA2=number_format($RowA2, 0, '.', ''); $vA25=number_format($RowA25, 0, '.', '');  $vA27=number_format($RowA27, 0, '.', ''); 
$vA29=number_format($RowA29, 0, '.', ''); $vA3=number_format($RowA3, 0, '.', ''); $vA32=number_format($RowA32, 0, '.', ''); $vA34=number_format($RowA34, 0, '.', '');
$vA35=number_format($RowA35, 0, '.', ''); $vA37=number_format($RowA37, 0, '.', ''); $vA39=number_format($RowA39, 0, '.', ''); $vA4=number_format($RowA4, 0, '.', '');
$vA42=number_format($RowA42, 0, '.', ''); $vA44=number_format($RowA44, 0, '.', ''); $vA45=number_format($RowA45, 0, '.', ''); $vA47=number_format($RowA47, 0, '.', '');
$vA49=number_format($RowA49, 0, '.', ''); $vA5=number_format($RowA5, 0, '.', ''); 

$vR1=number_format($RowR1, 0, '.', '');  $vR2=number_format($RowR2, 0, '.', ''); $vR25=number_format($RowR25, 0, '.', '');  $vR27=number_format($RowR27, 0, '.', ''); 
$vR29=number_format($RowR29, 0, '.', ''); $vR3=number_format($RowR3, 0, '.', ''); $vR32=number_format($RowR32, 0, '.', ''); $vR34=number_format($RowR34, 0, '.', '');
$vR35=number_format($RowR35, 0, '.', ''); $vR37=number_format($RowR37, 0, '.', ''); $vR39=number_format($RowR39, 0, '.', ''); $vR4=number_format($RowR4, 0, '.', '');
$vR42=number_format($RowR42, 0, '.', ''); $vR44=number_format($RowR44, 0, '.', ''); $vR45=number_format($RowR45, 0, '.', ''); $vR47=number_format($RowR47, 0, '.', '');
$vR49=number_format($RowR49, 0, '.', ''); $vR5=number_format($RowR5, 0, '.', ''); 

$vH1=number_format($RowH1, 0, '.', '');  $vH2=number_format($RowH2, 0, '.', ''); $vH25=number_format($RowH25, 0, '.', '');  $vH27=number_format($RowH27, 0, '.', ''); 
$vH29=number_format($RowH29, 0, '.', ''); $vH3=number_format($RowH3, 0, '.', ''); $vH32=number_format($RowH32, 0, '.', ''); $vH34=number_format($RowH34, 0, '.', '');
$vH35=number_format($RowH35, 0, '.', ''); $vH37=number_format($RowH37, 0, '.', ''); $vH39=number_format($RowH39, 0, '.', ''); $vH4=number_format($RowH4, 0, '.', '');
$vH42=number_format($RowH42, 0, '.', ''); $vH44=number_format($RowH44, 0, '.', ''); $vH45=number_format($RowH45, 0, '.', ''); $vH47=number_format($RowH47, 0, '.', '');
$vH49=number_format($RowH49, 0, '.', ''); $vH5=number_format($RowH5, 0, '.', ''); 

$vE1=number_format($RowE1, 0, '.', '');  $vE2=number_format($RowE2, 0, '.', ''); $vE25=number_format($RowE25, 0, '.', '');  $vE27=number_format($RowE27, 0, '.', ''); 
$vE29=number_format($RowE29, 0, '.', ''); $vE3=number_format($RowE3, 0, '.', ''); $vE32=number_format($RowE32, 0, '.', ''); $vE34=number_format($RowE34, 0, '.', '');
$vE35=number_format($RowE35, 0, '.', ''); $vE37=number_format($RowE37, 0, '.', ''); $vE39=number_format($RowE39, 0, '.', ''); $vE4=number_format($RowE4, 0, '.', '');
$vE42=number_format($RowE42, 0, '.', ''); $vE44=number_format($RowE44, 0, '.', ''); $vE45=number_format($RowE45, 0, '.', ''); $vE47=number_format($RowE47, 0, '.', '');
$vE49=number_format($RowE49, 0, '.', ''); $vE5=number_format($RowE5, 0, '.', ''); 


if($vE1==0){$E1='';}else{$E1=$vE1;} if($vE2==0){$E2='';}else{$E2=$vE2;} if($vE25==0){$E25='';}else{$E25=$vE25;} if($vE27==0){$E27='';}else{$E27=$vE27;}
if($vE29==0){$E29='';}else{$E29=$vE29;} if($vE3==0){$E3='';}else{$E3=$vE3;} if($vE32==0){$E32='';}else{$E32=$vE32;} if($vE34==0){$E34='';}else{$E34=$vE34;}
if($vE35==0){$E35='';}else{$E35=$vE35;} if($vE37==0){$E37='';}else{$E37=$vE37;} if($vE39==0){$E39='';}else{$E39=$vE39;} if($vE4==0){$E4='';}else{$E4=$vE4;}
if($vE42==0){$E42='';}else{$E42=$vE42;} if($vE44==0){$E44='';}else{$E44=$vE44;} if($vE45==0){$E45='';}else{$E45=$vE45;} if($vE47==0){$E47='';}else{$E47=$vE47;}
if($vE49==0){$E49='';}else{$E49=$vE49;} if($vE5==0){$E5='';}else{$E5=$vE5;}

if($vA1==0){$A1='';}else{$A1=$vA1;} if($vA2==0){$A2='';}else{$A2=$vA2;} if($vA25==0){$A25='';}else{$A25=$vA25;} if($vA27==0){$A27='';}else{$A27=$vA27;}
if($vA29==0){$A29='';}else{$A29=$vA29;} if($vA3==0){$A3='';}else{$A3=$vA3;} if($vA32==0){$A32='';}else{$A32=$vA32;} if($vA34==0){$A34='';}else{$A34=$vA34;}
if($vA35==0){$A35='';}else{$A35=$vA35;} if($vA37==0){$A37='';}else{$A37=$vA37;} if($vA39==0){$A39='';}else{$A39=$vA39;} if($vA4==0){$A4='';}else{$A4=$vA4;}
if($vA42==0){$A42='';}else{$A42=$vA42;} if($vA44==0){$A44='';}else{$A44=$vA44;} if($vA45==0){$A45='';}else{$A45=$vA45;} if($vA47==0){$A47='';}else{$A47=$vA47;}
if($vA49==0){$A49='';}else{$A49=$vA49;} if($vA5==0){$A5='';}else{$A5=$vA5;}

if($vR1==0){$R1='';}else{$R1=$vR1;} if($vR2==0){$R2='';}else{$R2=$vR2;} if($vR25==0){$R25='';}else{$R25=$vR25;} if($vR27==0){$R27='';}else{$R27=$vR27;}
if($vR29==0){$R29='';}else{$R29=$vR29;} if($vR3==0){$R3='';}else{$R3=$vR3;} if($vR32==0){$R32='';}else{$R32=$vR32;} if($vR34==0){$R34='';}else{$R34=$vR34;}
if($vR35==0){$R35='';}else{$R35=$vR35;} if($vR37==0){$R37='';}else{$R37=$vR37;} if($vR39==0){$R39='';}else{$R39=$vR39;} if($vR4==0){$R4='';}else{$R4=$vR4;}
if($vR42==0){$R42='';}else{$R42=$vR42;} if($vR44==0){$R44='';}else{$R44=$vR44;} if($vR45==0){$R45='';}else{$R45=$vR45;} if($vR47==0){$R47='';}else{$R47=$vR47;}
if($vR49==0){$R49='';}else{$R49=$vR49;} if($vR5==0){$R5='';}else{$R5=$vR5;}

if($vH1==0){$H1='';}else{$H1=$vH1;} if($vH2==0){$H2='';}else{$H2=$vH2;} if($vH25==0){$H25='';}else{$H25=$vH25;} if($vH27==0){$H27='';}else{$H27=$vH27;}
if($vH29==0){$H29='';}else{$H29=$vH29;} if($vH3==0){$H3='';}else{$H3=$vH3;} if($vH32==0){$H32='';}else{$H32=$vH32;} if($vH34==0){$H34='';}else{$H34=$vH34;}
if($vH35==0){$H35='';}else{$H35=$vH35;} if($vH37==0){$H37='';}else{$H37=$vH37;} if($vH39==0){$H39='';}else{$H39=$vH39;} if($vH4==0){$H4='';}else{$H4=$vH4;}
if($vH42==0){$H42='';}else{$H42=$vH42;} if($vH44==0){$H44='';}else{$H44=$vH44;} if($vH45==0){$H45='';}else{$H45=$vH45;} if($vH47==0){$H47='';}else{$H47=$vH47;}
if($vH49==0){$H49='';}else{$H49=$vH49;} if($vH5==0){$H5='';}else{$H5=$vH5;}

include('Graph/phplot.php');
$plot = new PHPlot(700,250);
//Set titles
$plot->SetTitle("OVERALL RATING LINEAR GRAPH".$Name);
$plot->SetXTitle('Rating');
$plot->SetYTitle('Employee');

//Define some data
$example_data = array(

	 array('1',$E1,$A1,$R1,$H1),
     array('2',$E2,$A2,$R2,$H2),
     array('2.5',$E25,$A25,$R25,$H25),
     array('2.7',$E27,$A27,$R27,$H27),
     array('2.9',$E29,$A29,$R29,$H29),
     array('3',$E3,$A3,$R3,$H3),
     array('3.2',$E32,$A32,$R32,$H32),
	 array('3.4',$E34,$A34,$R34,$H34),
     array('3.5',$E35,$A35,$R35,$H35),
     array('3.7',$E37,$A37,$R37,$H37),
     array('3.9',$E39,$A39,$R39,$H39),
	 array('4.0',$E4,$A4,$R4,$H4),
     array('4.2',$E42,$A42,$R42,$H42),
     array('4.4',$E44,$A44,$R44,$H44),
     array('4.5',$E45,$A45,$R45,$H45),
	 array('4.7',$E47,$A47,$R47,$H47),
     array('4.9',$E49,$A49,$R49,$H9),
     array('5',$E5,$A5,$R5,$H5)
	 
);
$plot->SetDataValues($example_data);
//Turn off X axis ticks and labels because they get in the way:
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');
//Draw it
$plot->DrawGraph();

}


?>

