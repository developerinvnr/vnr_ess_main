Your performance for the assessment period <b><?php echo $Ass2Year; ?></b> has been rated as <?php if($ResE['DepartmentId']==2 AND $resG['GradeValue']!='L1' AND $resG['GradeValue']!='L2' AND $resG['GradeValue']!='L3' AND $resG['GradeValue']!='L4' AND $resG['GradeValue']!='L5' AND $resG['GradeValue']!='MG'){ ?>"<b>2.5</b>". The given rating is based on Individual performance, Group performance and Departmental performance.<?php }else{ ?><b>"<?php echo $ResR['RatingName']; ?>"</b> with "<b>Rating-2.5</b>".<?php } ?><?php /*?><b>"<?php echo $ResR['RatingName']; ?>"</b> with "<b>Rating-2.5</b>".<?php */?> <p> 

           We would like to extend you necessary support so that you can improve your performance You are required to work out a systematic performance development plan in consultation with your manager and show improving results. <p><?php $ProGrossAnnual=$ResPMS['HR_ProIncSalary']*12-$resS['Previous_GrossSalaryPM']*12; ?>

<?php 
//$FD1->2016, $FD2->2017              
//Old if($ResE['DateJoining']>=$FD1.'-10-01' AND $ResE['DateJoining']<=$FD2.'-03-31')  	
//New if($ResE['DateJoining']>=$FD2.'-01-01' AND $ResE['DateJoining']<=$FD2.'-06-30')
//Next if($ResE['DateJoining']>=$FD2.'-01-01' AND $ResE['DateJoining']<=$FD2.'-06-30')

//Old if($ResE['DateJoining']>=$FD1.'-04-01' AND $ResE['DateJoining']<=$FD1.'-09-30')  	
//New if($ResE['DateJoining']>=$FD1.'-04-01' AND $ResE['DateJoining']<=$FD1.'-12-31')
//Next New if($ResE['DateJoining']>=$FD1.'-07-01' AND $ResE['DateJoining']<=$FD1.'-12-31')

//Next Year (DOJ on or after 1st July 
?>
           Based on your performance, there is an increase in your Gross Annual Salary by <b>Rs. <?php echo $ProGrossAnnual; ?>/- </b>i.e. by <b><?php echo $ResPMS['HR_Percent_ProIncSalary']; ?> % </b>.<?php if($_REQUEST['C']==1 AND $ResE['DateJoining']>=$FD2.'-01-01' AND $ResE['DateJoining']<=$FD2.'-06-30') { ?> As your service is less than a year in the assessment cycle <?php echo $AssYear; ?>, your increment % is calculated on pro-rata basis as per the duration served during this period against the actual increment of <b><?php echo $ResPMS['HR_Percent_IncNetMonthalySalary']; ?> % </b> as per your performance rating.<p><?php } ?><?php if($_REQUEST['C']==1 AND $ResE['DateJoining']>=$FD1.'-04-01' AND $ResE['DateJoining']<=$FD1.'-09-30') { ?> As your assessment tenure is more than a year (DOJ on or after 1st April <?php echo $FD1; ?>), your increment % is calculated on pro-rata basis for the duration served since your joining against the actual annual increment for assessment cycle<?php //echo $AssYear; ?> that is <b><?php echo $resMaxMin['IncDistriFrom']; ?> %</b> as per your performance rating.<p><?php } ?>

		   <?php if($ResPMS['HR_ProCorrSalary']>0) { ?>Taking into consideration the industry salary benchmark, we are providing salary correction of <b>Rs. <?php echo $ResPMS['HR_ProCorrSalary']*12; ?>/- </b> per annum i.e. by <b><?php echo $ResPMS['HR_Percent_ProCorrSalary']; ?> % </b>. <?php } ?><p>

           Your Gross Annual Salary is therefore being revised from <b>Rs. <?php echo $resS['Previous_GrossSalaryPM']*12; ?> /- </b> to <b>Rs. <?php echo $ResPMS['HR_GrossMonthlySalary']*12; ?> /- </b> i.e. by <b><?php echo $ResPMS['HR_Percent_IncNetMonthalySalary']; ?> % </b> with effect from <?php echo $SeteD; ?>. <p>
		 <?php if($ResE['DateJoining']<='2016-03-31' AND date("Y")=='2018'){ ?>The appraisal cycle shall henceforth be from Jan 1st to Dec 31st. The period of Oct-Dec 16 will be treated as months with increment and the arrears of salary due i.e. <b>Rs. <?php echo $ResPMS['HR_IncNetMonthalySalary']*3; ?>/-</b>, is being paid herewith.<?php }elseif($ResE['DateJoining']>='2016-04-01' AND $ResE['DateJoining']<='2016-12-31' AND date("Y")=='2018'){ ?>The appraisal cycle shall henceforth be from Jan 1st to Dec 31st. The period of Oct-Dec 16 will be treated as months with increment and the arrears of salary due i.e. <b>Rs. <?php echo $ResPMS['Extra3Month']; ?>/-</b>, is being paid herewith.<?php } ?><p>

		   Please find your revised remuneration in Annexure A as an enclosure with this letter along with your Entitlements in Annexure-B. <p>				   

		      

           <?php if($ResPMS['HR_CurrDesigId']!=$_REQUEST['D'] OR $resGr2['GradeValue']!=$_REQUEST['G']) { ?>

		   We also wish to inform you that to appreciate your exceptional performance and having belief in your competencies to handle higher responsibility & to meet the up-coming challenges, we hereby promote you <?php if($ResPMS['HR_CurrDesigId']!=$_REQUEST['D']) { echo 'as <b>'.$resD['DesigName'].'</b>'; } if($ResPMS['HR_CurrDesigId']!=$_REQUEST['D'] AND $resGr2['GradeValue']!=$_REQUEST['G']) { echo ', '; } if($resGr2['GradeValue']!=$_REQUEST['G']) {?>to Grade <?php echo '<b>'.$resG['GradeValue'].'</b>'; } if($ResPMS['HR_CurrDesigId']!=$_REQUEST['D'] OR $resGr2['GradeValue']!=$_REQUEST['G']) { ?> w.e.f <?php echo $SeteD; ?>. <?php } } ?> <p> 

           We take this opportunity to compliment you and your family for your dedication and commitment to the organization. <p>