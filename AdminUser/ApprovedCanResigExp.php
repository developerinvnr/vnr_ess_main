<?php 
require_once('config/config.php');

if($_REQUEST['action']='export') 
{ 
  
 $xls_filename = 'Approved_Resignation.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 echo "Sn\tEmpCode\tName\tDepartment\tGarde\tDesignation\tTermination\tResignation Date\tRelieving Date\tType of Exit\tEmp Apply\tRep Approved\tRep Approval Deviation\tHOD Approved\tHOD Approval Deviation\tHR Approved\tHR Approval Deviation\tEmp Clearance Date\tRep\Departmental Clearance Date\tRep\Department Clearance Deviation\tLogistic Clearance Date\tLogistic Clearance Deviation \tIT Clearance Date\tIT Clearance Deviation\tHR Clearance Date\tHR Clearance Deviation\tAccount Clearance Date\tAccount Clearance Deviation\tTotal Deviation";
 print("\n");
if($_REQUEST['value'] == 'All'){
    $sql=mysql_query("select EmpSepId,EmpCode,Fname,Sname,Lname,GradeValue,DesigName,DepartmentName,Emp_ResignationDate,HR_RelievingDate, HR_RelievingDate3, HR_RelievingDate2,s.TerMination,s.TypeOfExit from hrm_employee_separation s 
INNER JOIN hrm_employee e ON s.EmployeeID=e.EmployeeID 
INNER JOIN hrm_employee_general g on s.EmployeeID=g.EmployeeID 
inner join hrm_grade gr on g.GradeId=gr.GradeId 
inner join hrm_department d on g.DepartmentId=d.DepartmentId 
inner join hrm_designation de on g.DesigId=de.DesigId 
where s.ResignationStatus=4 
order by s.Emp_ResignationDate DESC", $con);
}else{
$sql=mysql_query("select EmpSepId,EmpCode,Fname,Sname,Lname,GradeValue,DesigName,DepartmentName,Emp_ResignationDate,HR_RelievingDate, HR_RelievingDate3, HR_RelievingDate2,s.TerMination,s.TypeOfExit from hrm_employee_separation s 
INNER JOIN hrm_employee e ON s.EmployeeID=e.EmployeeID 
INNER JOIN hrm_employee_general g on s.EmployeeID=g.EmployeeID 
inner join hrm_grade gr on g.GradeId=gr.GradeId 
inner join hrm_department d on g.DepartmentId=d.DepartmentId 
inner join hrm_designation de on g.DesigId=de.DesigId 
where s.ResignationStatus=4 
AND g.DepartmentId=".$_REQUEST['value']." 
order by s.Emp_ResignationDate DESC", $con); 
} 
$row=mysql_num_rows($sql);
 if($row>0) 
 { 
  $no=1; 
  while($res=mysql_fetch_array($sql))
  {
   
   $HRev3=' '; $HRev2=' '; $HRev=' ';      
      
   $schema_insert = "";
   $schema_insert .= $no.$sep;	
   $schema_insert .= $res['EmpCode'].$sep;	
   $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
   $schema_insert .= $res['DepartmentName'].$sep;	
   $schema_insert .= $res['GradeValue'].$sep;
   $schema_insert .= $res['DesigName'].$sep;	
   
   if($res['TerMination']=='Y'){
       $schema_insert .= 'Yes'.$sep;	
   }else{
       $schema_insert .= 'No'.$sep;
   }

   $schema_insert .= $res['Emp_ResignationDate'].$sep;	
   
   if($res['HR_RelievingDate3']!='' AND $res['HR_RelievingDate3']!='0000-00-00' AND $res['HR_RelievingDate3']!='1970-01-01')
   { $HRev3=$res['HR_RelievingDate3'].', '; } 
   if($res['HR_RelievingDate2']!='' AND $res['HR_RelievingDate2']!='0000-00-00' AND $res['HR_RelievingDate2']!='1970-01-01')
   { $HRev2=$res['HR_RelievingDate2'].', '; } 
   if($res['HR_RelievingDate']!='' AND $res['HR_RelievingDate']!='0000-00-00' AND $res['HR_RelievingDate']!='1970-01-01')
   { $HRev=$res['HR_RelievingDate']; }
   
   $schema_insert .= $HRev3.' '.$HRev2.' '.$HRev.$sep;	

    if($res['TypeOfExit']=='D'){
       $schema_insert .= 'Desired by Company'.$sep;	
   }else{
       $schema_insert .= 'Voluntary by Employee'.$sep;
   }
   
   $sqlSE=mysql_query("select *,DATE(Emp_SaveDate)AS Emp_SaveDate from hrm_employee_separation where EmpSepId=".$res['EmpSepId'], $con); 
   $resSE=mysql_fetch_assoc($sqlSE);
   $schema_insert .= $resSE['Emp_SaveDate'].$sep;
   
   if($resSE['Rep_SaveDate'] =='1970-01-01' || $resSE['Rep_SaveDate'] == '0000-00-00'){
        $schema_insert .= ''.$sep;  
        $schema_insert .= ''.$sep;  
   }else{
      $schema_insert .= $resSE['Rep_SaveDate'].$sep;  
     
      $emp_earlier = new DateTime($resSE['Emp_SaveDate']); 
      $rep_later = new DateTime($resSE['Rep_SaveDate']); 
      $rep_deviation = $rep_later->diff($emp_earlier)->format("%a"); 
      if($rep_deviation <= 3){
          $schema_insert .='0'.$sep;
      }else{
          $rep_diff = $rep_deviation - 3;
          $schema_insert .= $rep_diff.$sep;
      }
      
   }
   
   
   
   
   if($resSE['Hod_SaveDate'] =='1970-01-01' || $resSE['Hod_SaveDate'] == '0000-00-00'){
        $schema_insert .= ''.$sep;  
        $schema_insert .= ''.$sep;  
   }else{
     $schema_insert .= $resSE['Hod_SaveDate'].$sep;  
     
     $emp_earlier = new DateTime($resSE['Emp_SaveDate']); 
     $hod_later = new DateTime($resSE['Hod_SaveDate']);
     $hod_deviation = $hod_later->diff($emp_earlier)->format("%a");
     if($hod_deviation <= 6){
          $schema_insert .='0'.$sep;
      }else{
          $hod_diff = $hod_deviation - 6;
          $schema_insert .= $hod_diff.$sep;
      }
   }
   
  
   if($resSE['HR_SaveDate'] =='1970-01-01' || $resSE['HR_SaveDate'] == '0000-00-00'){
        $schema_insert .= ''.$sep;  
        $schema_insert .= ''.$sep;  
   }else{
      $schema_insert .= $resSE['HR_SaveDate'].$sep;  
     
    
     if($resSE['Rep_SaveDate'] !='1970-01-01' && $resSE['Rep_SaveDate'] != '0000-00-00'){
      $earlier1 = new DateTime($resSE['Rep_SaveDate']);
     }elseif($resSE['Hod_SaveDate'] !='1970-01-01' && $resSE['Hod_SaveDate'] != '0000-00-00'){
       $earlier1 = new DateTime($resSE['Hod_SaveDate']);
     }
     
     $later1 = new DateTime($resSE['HR_SaveDate']);
     $hr_deviation = $later1->diff($earlier1)->format("%a");
     if($hr_deviation <= 3){
         $schema_insert .= '0'.$sep;
     }else{
         $hr_diff = $hr_deviation - 3;
         $schema_insert .= $hr_diff.$sep;
     }
    
   }
   

   
$ne=mysql_query("select FormSubmitDate from hrm_employee_separation_exitint where EmpSepId=".$res['EmpSepId'],$con);
$nr=mysql_query("select NocSubmitDate from hrm_employee_separation_nocrep where EmpSepId=".$res['EmpSepId'],$con);   
$ni=mysql_query("select NocSubmitDate from hrm_employee_separation_nocit where EmpSepId=".$res['EmpSepId'],$con);  
$nh=mysql_query("select NocSubmitDate from hrm_employee_separation_nochr where EmpSepId=".$res['EmpSepId'],$con);
$na=mysql_query("select NocSubmAccDate from hrm_employee_separation_nocacc where EmpSepId=".$res['EmpSepId'],$con);
$logistic=mysql_query("SELECT Logistic_Noc_Submit_Date FROM `hrm_employee_separation_nocrep` EmpSepId=".$res['EmpSepId'],$con); 
$rowe=mysql_num_rows($ne); $rowr=mysql_num_rows($nr); $rowi=mysql_num_rows($ni);
$rowh=mysql_num_rows($nh); $rowa=mysql_num_rows($na);
$rese=mysql_fetch_assoc($ne); $resr=mysql_fetch_assoc($nr); $resi=mysql_fetch_assoc($ni);
$resh=mysql_fetch_assoc($nh); $resa=mysql_fetch_assoc($na);   
$resLogistic = mysql_fetch_assoc($logistic);
$rowLog = mysql_num_rows($resLogistic);
   
 
  if($rese['FormSubmitDate'] =='1970-01-01' || $rese['FormSubmitDate'] == '0000-00-00'){
        $schema_insert .= ''.$sep;  
  }else{
     $schema_insert .= $rese['FormSubmitDate'].$sep;  
  }
   
   //===============Reporting Clearance=====================//
  if($resr['NocSubmitDate'] =='1970-01-01' || $resr['NocSubmitDate'] == '0000-00-00'){
        $schema_insert .= ''.$sep;  
        $schema_insert .= ''.$sep;  
  }else{
      $schema_insert .= $resr['NocSubmitDate'].$sep;  
     
     if($rowr >0 && $resSE['HR_SaveDate'] != '0000-00-00') {
      $HR_SaveDate = new DateTime($resSE['HR_SaveDate']); 
      $Rep_Clear = new DateTime($resr['NocSubmitDate']); 
      $deviation = $Rep_Clear->diff($HR_SaveDate)->format("%a"); 
      if($deviation <= 3){
          $schema_insert .='0'.$sep;
      }else{
          $Difference = $deviation - 3;
          $schema_insert .= $Difference.$sep;
      }
     }else{
          $schema_insert .= ''.$sep;  
     }
  }

   //===============Logistic Clearance=====================//
    if($resLogistic['Logistic_Noc_Submit_Date'] =='1970-01-01' || $resLogistic['Logistic_Noc_Submit_Date'] == '0000-00-00'){
        $schema_insert .= ''.$sep;  
        $schema_insert .= ''.$sep;    
  }else{
     $schema_insert .= $resLogistic['Logistic_Noc_Submit_Date'].$sep;  
     
     if($rowLog > 0 && $resSE['HR_SaveDate'] != '0000-00-00'){
      $HR_SaveDate = new DateTime($resSE['HR_SaveDate']); 
      $log_clear = new DateTime($resLogistic['Logistic_Noc_Submit_Date']); 
      $Ldeviation = $log_clear->diff($HR_SaveDate)->format("%a"); 
      if($Ldeviation <= 3){
          $schema_insert .='0'.$sep;
      }else{
          $DifferenceL = $Ldeviation - 3;
          $schema_insert .= $DifferenceL.$sep;
      }
     }else{
          $schema_insert .= ''.$sep;  
     }
  }
   
//===============IT Clearance=====================//
    if($resi['NocSubmitDate'] =='1970-01-01' || $resi['NocSubmitDate'] == '0000-00-00'){
        $schema_insert .= ''.$sep;  
        $schema_insert .= ''.$sep;  
  }else{
     $schema_insert .= $resi['NocSubmitDate'].$sep;  
     if($rowi > 0 && $resSE['HR_SaveDate'] != '0000-00-00'){
      $HR_SaveDate = new DateTime($resSE['HR_SaveDate']); 
      $it_clear = new DateTime($resi['NocSubmitDate']); 
      $It_deviation = $it_clear->diff($HR_SaveDate)->format("%a"); 
      if($It_deviation <= 3){
          $schema_insert .='0'.$sep;
      }else{
          $IT_Difference = $It_deviation - 3;
          $schema_insert .= $IT_Difference.$sep;
      }
     }else{
          $schema_insert .= ''.$sep;  
     }
  }

   //===============HR Clearance=====================//
  if($resh['NocSubmitDate'] =='1970-01-01' || $resh['NocSubmitDate'] == '0000-00-00'){
        $schema_insert .= ''.$sep;  
        $schema_insert .= ''.$sep;  
  }else{
     $schema_insert .= $resh['NocSubmitDate'].$sep;  
     if($rowh > 0 && $resSE['HR_SaveDate'] != '0000-00-00'){
      $HR_SaveDate = new DateTime($resSE['HR_SaveDate']); 
      $HR_Clear = new DateTime($resh['NocSubmitDate']); 
      $HR_deviation = $HR_Clear->diff($HR_SaveDate)->format("%a"); 
      if($HR_deviation <= 3){
          $schema_insert .='0'.$sep;
      }else{
          $HR_Difference = $HR_deviation - 3;
          $schema_insert .= $HR_Difference.$sep;
      }
     }else{
          $schema_insert .= ''.$sep;  
     }
  }
   
//===============Account Clearance=====================//
    if($resa['NocSubmAccDate'] =='1970-01-01' || $resa['NocSubmAccDate'] == '0000-00-00'){
        $schema_insert .= ''.$sep;  
        $schema_insert .= ''.$sep;  
    }else{
         $schema_insert .= $resa['NocSubmAccDate'].$sep;  
        if($rowa > 0 && $resh['NocSubmitDate']!='0000-00-00' && $resh['NocSubmitDate']!='1970-00-00'){
              $HR_Clear = new DateTime($resh['NocSubmitDate']); 
              $Acc_Clear = new DateTime($resa['NocSubmAccDate']);
              $Acc_deviation = $Acc_Clear->diff($HR_Clear)->format("%a"); 
              if($Acc_deviation <= 3){
                  $schema_insert .='0'.$sep;
              }else{
                  $Acc_Difference = $Acc_deviation - 3;
                  $schema_insert .= $Acc_Difference.$sep;
              }
        }else{
             $schema_insert .= ''.$sep; 
        }
    }
   
   //=========================Total Deviation =================
   if($resa['NocSubmAccDate'] =='1970-01-01' || $resa['NocSubmAccDate'] == '0000-00-00'){
        $schema_insert .= ''.$sep;  
    }else{
        if($rowa > 0){
    if($res['HR_RelievingDate']!='' AND $res['HR_RelievingDate']!='0000-00-00' AND $res['HR_RelievingDate']!='1970-01-01')
   { $reliving_date=$res['HR_RelievingDate']; }
   
    if($res['HR_RelievingDate2']!='' AND $res['HR_RelievingDate2']!='0000-00-00' AND $res['HR_RelievingDate2']!='1970-01-01')
   { $reliving_date=$res['HR_RelievingDate2'].', '; } 
   
            if($res['HR_RelievingDate3']!='' AND $res['HR_RelievingDate3']!='0000-00-00' AND $res['HR_RelievingDate3']!='1970-01-01')
   { $reliving_date=$res['HR_RelievingDate3'].', '; } 
  
   
            
            $reliving_date = new DateTime();
            $Acc_Clear = new DateTime($resa['NocSubmAccDate']);
            $total = $Acc_Clear->diff($reliving_date)->format("%a");
            $schema_insert .= $total.$sep;
        }
    }

   
 
   
   $schema_insert = str_replace($sep."$", "", $schema_insert);
   $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
   $schema_insert .= "\t";
   print(trim($schema_insert)); print "\n"; 
   $no++;
  }
 }//if($row>0)
 
}
