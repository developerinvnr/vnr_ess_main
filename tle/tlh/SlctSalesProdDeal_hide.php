<?php

$TsqlP2td=mysql_query("select SUM(M1) as tsM1, SUM(M2) as tsM2, SUM(M3) as tsM3, SUM(M4) as tsM4, SUM(M5) as tsM5, SUM(M6) as tsM6, SUM(M7) as tsM7, SUM(M8) as tsM8, SUM(M9) as tsM9, SUM(M10) as tsM10, SUM(M11) as tsM11, SUM(M12) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_POST['hi']." AND hrm_sales_sal_details.ItemId=".$_POST['ii']." AND hrm_sales_sal_details.YearId=".$_POST['yi'], $con); $TsqlP3td=mysql_query("select SUM(M1_Proj) as tsM1, SUM(M2_Proj) as tsM2, SUM(M3_Proj) as tsM3, SUM(M4_Proj) as tsM4, SUM(M5_Proj) as tsM5, SUM(M6_Proj) as tsM6, SUM(M7_Proj) as tsM7, SUM(M8_Proj) as tsM8, SUM(M9_Proj) as tsM9, SUM(M10_Proj) as tsM10, SUM(M11_Proj) as tsM11, SUM(M12_Proj) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_POST['hi']." AND hrm_sales_sal_details.ItemId=".$_POST['ii']." AND hrm_sales_sal_details.YearId=".$AfterYId, $con); 
	$TresP2td=mysql_fetch_assoc($TsqlP2td); $TresP3td=mysql_fetch_assoc($TsqlP3td);
	
	$TotAT=$TresP2td['tsM1']+$TresP2td['tsM2']+$TresP2td['tsM3']+$TresP2td['tsM4']+$TresP2td['tsM5']+$TresP2td['tsM6']+$TresP2td['tsM7']+$TresP2td['tsM8']+$TresP2td['tsM9']+$TresP2td['tsM10']+$TresP2td['tsM11']+$TresP2td['tsM12']; 
	$TotBT=$TresP3td['tsM1']+$TresP3td['tsM2']+$TresP3td['tsM3']+$TresP3td['tsM4']+$TresP3td['tsM5']+$TresP3td['tsM6']+$TresP3td['tsM7']+$TresP3td['tsM8']+$TresP3td['tsM9']+$TresP3td['tsM10']+$TresP3td['tsM11']+$TresP3td['tsM12'];
	echo '<input type="hidden" id="TTot2T" value="'.floatval($TotAT).'" />';  
	echo '<input type="hidden" id="TTot3T" value="'.floatval($TotBT).'" />';
	
	echo '<input type="hidden" id="Tot21T" value="'.floatval($TresP2td['tsM1']).'" /><input type="hidden" id="Tot22T" value="'.floatval($TresP2td['tsM2']).'" /><input type="hidden" id="Tot23T" value="'.floatval($TresP2td['tsM3']).'" /><input type="hidden" id="Tot24T" value="'.floatval($TresP2td['tsM4']).'" /><input type="hidden" id="Tot25T" value="'.floatval($TresP2td['tsM5']).'" /><input type="hidden" id="Tot26T" value="'.floatval($TresP2td['tsM6']).'" /><input type="hidden" id="Tot27T" value="'.floatval($TresP2td['tsM7']).'" /><input type="hidden" id="Tot28T" value="'.floatval($TresP2td['tsM8']).'" /><input type="hidden" id="Tot29T" value="'.floatval($TresP2td['tsM9']).'" /><input type="hidden" id="Tot210T" value="'.floatval($TresP2td['tsM10']).'" /><input type="hidden" id="Tot211T" value="'.floatval($TresP2td['tsM11']).'" /><input type="hidden" id="Tot212T" value="'.floatval($TresP2td['tsM12']).'" />';
	
	echo '<input type="hidden" id="Tot31T" value="'.floatval($TresP3td['tsM1']).'" /><input type="hidden" id="Tot32T" value="'.floatval($TresP3td['tsM2']).'" /><input type="hidden" id="Tot33T" value="'.floatval($TresP3td['tsM3']).'" /><input type="hidden" id="Tot34T" value="'.floatval($TresP3td['tsM4']).'" /><input type="hidden" id="Tot35T" value="'.floatval($TresP3td['tsM5']).'" /><input type="hidden" id="Tot36T" value="'.floatval($TresP3td['tsM6']).'" /><input type="hidden" id="Tot37T" value="'.floatval($TresP3td['tsM7']).'" /><input type="hidden" id="Tot38T" value="'.floatval($TresP3td['tsM8']).'" /><input type="hidden" id="Tot39T" value="'.floatval($TresP3td['tsM9']).'" /><input type="hidden" id="Tot310T" value="'.floatval($TresP3td['tsM10']).'" /><input type="hidden" id="Tot311T" value="'.floatval($TresP3td['tsM11']).'" /><input type="hidden" id="Tot312T" value="'.floatval($TresP3td['tsM12']).'" />';
	
	
	$PsqlP2=mysql_query("select SUM(M1) as sM1, SUM(M2) as sM2, SUM(M3) as sM3, SUM(M4) as sM4, SUM(M5) as sM5, SUM(M6) as sM6, SUM(M7) as sM7, SUM(M8) as sM8, SUM(M9) as sM9, SUM(M10) as sM10, SUM(M11) as sM11, SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_POST['hi']." AND hrm_sales_sal_details.ProductId=".$_POST['p']." AND hrm_sales_sal_details.YearId=".$_POST['yi'], $con); 
	$PsqlP3=mysql_query("select SUM(M1_Proj) as sM1, SUM(M2_Proj) as sM2, SUM(M3_Proj) as sM3, SUM(M4_Proj) as sM4, SUM(M5_Proj) as sM5, SUM(M6_Proj) as sM6, SUM(M7_Proj) as sM7, SUM(M8_Proj) as sM8, SUM(M9_Proj) as sM9, SUM(M10_Proj) as sM10, SUM(M11_Proj) as sM11, SUM(M12_Proj) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_POST['hi']." AND hrm_sales_sal_details.ProductId=".$_POST['p']." AND hrm_sales_sal_details.YearId=".$AfterYId, $con); 
	$PresP2=mysql_fetch_assoc($PsqlP2); $PresP3=mysql_fetch_assoc($PsqlP3); 
	   
	$TotAP=$PresP2['sM1']+$PresP2['sM2']+$PresP2['sM3']+$PresP2['sM4']+$PresP2['sM5']+$PresP2['sM6']+$PresP2['sM7']+$PresP2['sM8']+$PresP2['sM9']+$PresP2['sM10']+$PresP2['sM11']+$PresP2['sM12']; 
	$TotBP=$PresP3['sM1']+$PresP3['sM2']+$PresP3['sM3']+$PresP3['sM4']+$PresP3['sM5']+$PresP3['sM6']+$PresP3['sM7']+$PresP3['sM8']+$PresP3['sM9']+$PresP3['sM10']+$PresP3['sM11']+$PresP3['sM12'];
	echo '<input type="hidden" id="PTot2P" value="'.floatval($TotAP).'" />';  
	echo '<input type="hidden" id="PTot3P" value="'.floatval($TotBP).'" />';
	
	echo '<input type="hidden" id="Tot21P" value="'.floatval($PresP2['sM1']).'" /><input type="hidden" id="Tot22P" value="'.floatval($PresP2['sM2']).'" /><input type="hidden" id="Tot23P" value="'.floatval($PresP2['sM3']).'" /><input type="hidden" id="Tot24P" value="'.floatval($PresP2['sM4']).'" /><input type="hidden" id="Tot25P" value="'.floatval($PresP2['sM5']).'" /><input type="hidden" id="Tot26P" value="'.floatval($PresP2['sM6']).'" /><input type="hidden" id="Tot27P" value="'.floatval($PresP2['sM7']).'" /><input type="hidden" id="Tot28P" value="'.floatval($PresP2['sM8']).'" /><input type="hidden" id="Tot29P" value="'.floatval($PresP2['sM9']).'" /><input type="hidden" id="Tot210P" value="'.floatval($PresP2['sM10']).'" /><input type="hidden" id="Tot211P" value="'.floatval($PresP2['sM11']).'" /><input type="hidden" id="Tot212P" value="'.floatval($PresP2['sM12']).'" />';

    echo '<input type="hidden" id="Tot31P" value="'.floatval($PresP3['sM1']).'" /><input type="hidden" id="Tot32P" value="'.floatval($PresP3['sM2']).'" /><input type="hidden" id="Tot33P" value="'.floatval($PresP3['sM3']).'" /><input type="hidden" id="Tot34P" value="'.floatval($PresP3['sM4']).'" /><input type="hidden" id="Tot35P" value="'.floatval($PresP3['sM5']).'" /><input type="hidden" id="Tot36P" value="'.floatval($PresP3['sM6']).'" /><input type="hidden" id="Tot37P" value="'.floatval($PresP3['sM7']).'" /><input type="hidden" id="Tot38P" value="'.floatval($PresP3['sM8']).'" /><input type="hidden" id="Tot39P" value="'.floatval($PresP3['sM9']).'" /><input type="hidden" id="Tot310P" value="'.floatval($PresP3['sM10']).'" /><input type="hidden" id="Tot311P" value="'.floatval($PresP3['sM11']).'" /><input type="hidden" id="Tot312P" value="'.floatval($PresP3['sM12']).'" />';
	
?>