<?php 
require_once('AdminUser/config/config.php');


if($_REQUEST['action'] == 'Details')
{
  //Employee Employee
  if($_REQUEST['val']=='Employee')
  {

      
    $sqle=mysql_query("select e.EmployeeID, EmpCode, EmpStatus, Fname, Sname, Lname, CompanyId, GradeId, DepartmentId, DesigId, PositionCode, PosSeq, PosVR, g.RepEmployeeID, DateJoining, DateOfSepration, MobileNo_Vnr as Contact, EmailId_Vnr as Email, Gender, Married,DR,HqId,Tot_CTC,
CASE
WHEN DR ='Y' THEN 'Dr.'
WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
ELSE 'Mr.'
END as Title

from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on e.EmployeeID=p.EmployeeID
    inner join hrm_employee_ctc c on c.EmployeeID = e.EmployeeID
    where (EmpStatus='A' OR EmpStatus='D') AND c.Status='A' AND g.GradeId !=0 AND g.DepartmentId !=0 order by CompanyId ASC, e.EmployeeID ASC",$con);
    while($rese=mysql_fetch_assoc($sqle))
    { 
      $Emplist[]=$rese;
    }
	echo json_encode(array( "employee_list" => $Emplist) ); 
  }
  
  
  //Employee Reporting
  if($_REQUEST['val']=='Reporting')
  {
    $sqle=mysql_query("select * from hrm_employee_reporting r inner join hrm_employee e on r.EmployeeID=e.EmployeeID where (EmpStatus='A' OR EmpStatus='D')",$con);
    while($rese=mysql_fetch_assoc($sqle))
    { 
      $Emplist[]=$rese;
    }
	echo json_encode(array( "reporting_list" => $Emplist) ); 
  }
  
  
  //Company Company
  if($_REQUEST['val']=='Company')
  {
    $sqlc=mysql_query("select CompanyId, CompanyName, AdminOffice_Address as address, AdminOffice as Location, PhoneNo1 as Phone, Status from hrm_company_basic where Status='A' order by CompanyId ASC",$con);
    while($resc=mysql_fetch_assoc($sqlc))
    { 
      $Comlist[]=$resc;
    }
	echo json_encode(array( "company_list" => $Comlist) ); 
  }
  
  //Department Department
  if($_REQUEST['val']=='Department')
  {
    $sqld=mysql_query("select DepartmentId, DepartmentName, DepartmentCode,ShortCode, CompanyId, DeptStatus,FunName from hrm_department where (DeptStatus='A' OR DeptStatus='D') order by CompanyId ASC,DepartmentId ASC",$con);
    while($resd=mysql_fetch_assoc($sqld))
    { 
      $Deptlist[]=$resd;
    }
	echo json_encode(array( "department_list" => $Deptlist) ); 
  }
  
  //Grade Grade
  if($_REQUEST['val']=='Grade')
  {
    $sqlg=mysql_query("select GradeId, GradeValue, CompanyId, GradeStatus from hrm_grade where (GradeStatus='A' OR GradeStatus='D') order by CompanyId ASC,GradeId ASC",$con);
    while($resg=mysql_fetch_assoc($sqlg))
    { 
      $Gradelist[]=$resg;
    }
	echo json_encode(array( "grade_list" => $Gradelist) ); 
  }
  
  
  //Designation Designation
  if($_REQUEST['val']=='Designation')
  {
    $sqlde=mysql_query("select DesigId, DesigName, DesigCode, Desig_ShortCode, CompanyId, DesigStatus from hrm_designation where DesigStatus='A' order by CompanyId ASC,DesigId ASC",$con);
    while($resde=mysql_fetch_assoc($sqlde))
    { 
      $Desiglist[]=$resde;
    }
	echo json_encode(array( "Designation_list" => $Desiglist) ); 
  }
  
  //Country Country
  if($_REQUEST['val']=='Country')
  {
    $sqlcn=mysql_query("select CountryId, CountryName as Country, CountryStatus as Status from hrm_country where CountryStatus='A' order by CountryId ASC,CountryName ASC",$con);
    while($rescn=mysql_fetch_assoc($sqlcn))
    { 
      $Countrylist[]=$rescn;
    }
	echo json_encode(array( "Country_list" => $Countrylist) ); 
  }
  
  
  //State State
  if($_REQUEST['val']=='State')
  {
    $sqls=mysql_query("select StateId, StateName as State, StateCode, CountryId, StateStatus as Status from hrm_state where StateStatus='A' order by StateId ASC,StateName ASC",$con);
    while($ress=mysql_fetch_assoc($sqls))
    { 
      $Statelist[]=$ress;
    }
	echo json_encode(array( "State_list" => $Statelist) ); 
  }
  
  //Headquarter Headquarter
  if($_REQUEST['val']=='Headquarter')
  {
    $sqlhq=mysql_query("select HqId, HqName, StateId,CompanyId from hrm_headquater where HQStatus='A' order by HqId ASC,HqName ASC",$con);
    while($reshq=mysql_fetch_assoc($sqlhq))
    { 
      $Hqlist[]=$reshq;
    }
	echo json_encode(array( "Headquarter_list" => $Hqlist) ); 
  }
  
  
  //Department - Designation
  if($_REQUEST['val']=='DeptDesig')
  {
    $sqldd=mysql_query("select DepartmentId, DesigId, CompanyId from hrm_deptgradedesig where DepartmentId!=0 AND DGDStatus='A' order by DepartmentId ASC,DesigId ASC",$con);
    while($resdd=mysql_fetch_assoc($sqldd))
    { 
      $DDlist[]=$resdd;
    }
	echo json_encode(array( "Department_Designation_list" => $DDlist) ); 
  }
  
  //Position Code
  if($_REQUEST['val']=='getPositionCode'){
      $sqlpos = mysql_query("select e.EmployeeID, EmpCode, CompanyId, DepartmentId,DesigId,GradeId,PosVR, PosSeq, PositionCode 
from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on e.EmployeeID=p.EmployeeID
    inner join hrm_employee_ctc c on c.EmployeeID = e.EmployeeID
    where (EmpStatus='A' OR EmpStatus='D') AND c.Status='A' AND g.DepartmentId !=0 AND g.GradeId !=0 order by CompanyId ASC, EmpCode ASC",$con);
    
    while($respos = mysql_fetch_assoc($sqlpos)){
        $PosList[] = $respos;
      
    }
      echo json_encode(array("PositionCode_List"=>$PosList));
  }
  
  
  //Demo Employee Employee
  if($_REQUEST['val']=='DemoEmployee')
  {
    $sqle=mysql_query("select * from hrm_employee_demo order by CompanyId ASC, EmpCode ASC",$con);
    while($rese=mysql_fetch_assoc($sqle))
    { 
      $DemoEmplist[]=$rese;
    }
	echo json_encode(array( "demo_employee_list" => $DemoEmplist) ); 
  }
  
  
    //Department Vertical
  if($_REQUEST['val']=='Vertical')
  {
    $sqlv=mysql_query("select VerticalId, VerticalName, ComId, DeptId from hrm_department_vertical",$con);
    while($resv=mysql_fetch_assoc($sqlv))
    { 
      $VerticalList[]=$resv;
    }
	echo json_encode(array( "vertical_list" => $VerticalList) ); 
  }
  
      //Master Eligibility
  if($_REQUEST['val']=='elg')
  {
    $sqle=mysql_query("select * from hrm_master_eligibility",$con);
    while($rese=mysql_fetch_assoc($sqle))
    { 
      $ElgList[]=$rese;
    }
	echo json_encode(array( "eligibility_list" => $ElgList) ); 
  }
}
else
{
 echo json_encode(array("msg" => "Parameter missing!") );
}


?>




