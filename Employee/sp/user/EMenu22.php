<script language="javascript" type="text/javascript"> 
stuHover = function(){ var cssRule; var newSelector;
 for (var i = 0; i < document.styleSheets.length; i++) for (var x = 0; x < document.styleSheets[i].rules.length ; x++)
 { cssRule = document.styleSheets[i].rules[x]; 
   if (cssRule.selectorText.indexOf("LI:hover") != -1) { newSelector = cssRule.selectorText.replace(/LI:hover/gi, "LI.iehover");
	                                                     document.styleSheets[i].addRule(newSelector , cssRule.style.cssText); } }
 var getElm = document.getElementById("nav").getElementsByTagName("LI");
 for (var i=0; i<getElm.length; i++) { getElm[i].onmouseover=function() { this.className+=" iehover"; }
   getElm[i].onmouseout=function() { this.className=this.className.replace(new RegExp(" iehover\\b"), ""); } }
} if (window.attachEvent) window.attachEvent("onload", stuHover);
</script>
<?php if(($UserType=='S' OR $UserType=='A' OR $UserType=='U') AND $Sts=='A') { ?>
<span class="preload1"></span><span class="preload2"></span>
<ul id="nav">
<li class="top"><a href="Index.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerI&tt=valuased&desgn=Trern&main=FTrue%False" class="top_link"><span>HOME</span></a></li>
<?php /************************************************************************ MASTERS ***********************************************************/ ?> 					
					
<?php if($resSp['Master']=='Y'){ ?>					
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">MASTERS</span></a> 
 <ul class="sub">  
  <?php if($resSp['CMaster']=='Y'){ ?> 
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Crop Mast</b></li>
  <li><a href="SalesSeedsItem.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%F1&tt=valuased&desgn=Trern&main=FTrue%False">Crop Name</a></li>
  <li><a href="SalesSeedsProduct.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Product Name</a></li>	
  <li><a href="SalesSeedsSize.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Packing Size</a></li>
  <li><a href="SalesSeedsUnit.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Packing Unit/Type</a></li>
  <li><a href="SalesSeedsPacking.php?ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Product Packing</a></li>
  <?php } if($resSp['SMaster']=='Y'){ ?>	    
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Sales Mast</b></li>
  <li><a href="SalesTeam.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Sales Team</a></li>
  <li><a href="SHeadQuater.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Head Quarter</a></li>
  <li><a href="ArrengeHq.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&nw=234&erney=1122344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Arrange HQ</a></li>
  <li><a href="SHeadZone.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Zone</a></li>
  <li><a href="SHeadZoneState.php?act=441&ee=421&d=true2&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Zone-State</a></li>
  <li><a href="SalesDistriName.php?ac=4441&ee=4421&der=t3&ccc=false&d=dreefoultVlue&u=UsuuerIo&trht=FTF%%FT&tt=valuased&desgn=Trern&c=1&s=0&hq=0">Distributors Details</a></li>
  <?php /*
  <li><a href="SalesDealerName.php?ac=4441&ee=4421&der=t3&c=false&d=dreefoultValue&u=UsuuerIo&trht=FTF%%FT&tt=valuased&desgn=Trern&main=FTrue%False">Distributors Details</a></li> */ ?>
  <li><a href="ArrengeDealer.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&nw=234&erney=1122344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Arrange Distributors</a></li>
  <li><a href="AssignHqTeam.php?ac=4441&ee=4421&der=t3&c=false&d=drtValue&u=UsuuerIo&trht=FTF%%FT1&tt=valuased&desgn=Trern&main=FTrue%False&c=0&s=0">Assign HQ Territory</a></li>
  <?php } if($resSp['PMaster']=='Y'){ ?>  
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Production Mast</b></li>
  <li><a href="SalesSeedsSeason.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Season</a></li>	
  <li><a href="SalesSeedsAreaLoc.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Area/ Location</a></li>
  <li><a href="SalesSeedsFarmer.php?ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False">Farmer Details</a></li>
  <li><a href="ProductActivity.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False">Activity</a></li>
  <li><a href="ProArea.php?grp=0&ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False&c=1">Product Area</a></li>
  <li><a href="ProdStockLoc.php?grp=0&ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False&c=1">Stock Location</a></li>
  <?php } if($resSp['UMaster']=='Y'){ ?>
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">User Mast</b></li>
  <li><a href="UserMaster.php?ern1=r114&ernS=eewwqq&c=1&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&ta=1&tb=1">User</a></li>
  <li><a href="SEbillSt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=1&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&ta=1&tb=1">User State</a></li>
  <?php } ?>
 </ul>
</li>

<?php /************************************************************************ IMPORTS ***********************************************************/ ?>   	
<?php } if($resSp['Import']=='Y'){ ?>  	
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">IMPORT</span></a>
 <ul class="sub">  
  <li><a href="SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">One By One</a></li>
  <li><a href="SetPlanO.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">All Year</a></li>
  <li><a href="Set2Plan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Sales Overall</a></li>
  <li><a href="Set2YPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&y2=<?php echo $YearId; ?>&y3=<?php echo $YearId; ?>&yAchQ=<?php echo $YearId; ?>">Sales Year Wise</a></li>	
 </ul>
</li> 
  
<?php /************************************************************************ LOGISTICS ***********************************************************/ ?>  
<?php } if($resSp['Logistic']=='Y'){ ?> 
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">LOGISTICS</span></a>
 <ul class="sub"> 
  <?php if($resSp['LogAchi']=='Y'){ ?> 
  <li><a href="Achive.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Achivement</a></li>
  <?php } if($resSp['LogTest']=='Y'){ ?>
  <li><a href="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=1&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&ta=0&tb=1&tc=0">Testing</a></li>
  <?php } ?> 
 </ul>
</li>
<?php /************************************************************************ PRODUCTION ***********************************************************/ ?>  
<?php } if($resSp['Production']=='Y'){ ?> 
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">PRODUCTION</span></a>  <?php //Prod<sup>t</sup> ?> 
 <ul class="sub">  
  <li><a href="ProdMActivity.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Month Activity</a></li>
  <li><a href="ProdAllot.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Allotment</a></li>
  <li><a href="ProReq.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Requirement</a></li> 
  <li><a href="ProReqNew.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0">Production Target</a></li>
  <?php if($resSp['ProdStock']=='Y'){ ?>
  <li><a href="#" class="fly">Stock</a>
  <ul>
   <li><a href="SalesProdStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&stcloc=0">Actual</a></li>
   <li><a href="SalesProdEstbStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&c=1">Estimate (Before-Plan)</a></li>
   <li><a href="SalesProdEstaStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&c=1">Estimate (After-Plan)</a></li>
  </ul>
  </li>
  <?php } ?>
  <li><a href="ProdPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=0&q=<?php echo $qtr; ?>&ii=0&c=1">Production Plan</a></li>
 </ul>
</li>	
   
<?php /************************************************************************ Reports ***********************************************************/ ?>
<?php } if($resSp['Reports']=='Y'){ ?> 
<li class="top"><a href="#" id="privacy" class="top_link"><span class="down">REPORTS</span></a>
 <ul class="sub">  
  <?php if($resSp['ProdRep']=='Y'){ ?>
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Prod<sup>n</sup> Reports</b></li>
  <li><a href="RptProdDtl.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Product Details</a></li>
  <li><a href="RptProdAreaDtl.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Product Area</a></li>	
  <li><a href="RptFarmerDtl.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Farmer Details</a></li>
  
  <?php } if($resSp['SalesRep']=='Y'){ ?>
  <li><b style="color:#8000FF; font-size:14px;font-family:Times New Roman;font-weight:bold;">Sales Reports</b></li>
  <li><a href="SalesDealerR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Distributors List</a></li>
  <li><a href="#" class="fly">Sales Plan</a>
  <ul>
  <?php /* <li><a href="SalesPlanRemp.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0">Employee Wise</a></li> */ ?>
   <li><a href="SalesPlanR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Dealer Wise</a></li>
   <li><a href="SalesPlanRhq.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Head Quarter Wise</a></li>
   <li><a href="SalesPlanRst.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">State Wise</a></li>
   <li><a href="SalesPlanRstMlt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=2&q=<?php echo $qtr; ?>&ii=0&<?php for($no=1; $no<=35; $no++){ echo '&s'.$no.'=0'; } ?>&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Multi State Wise</a></li>
   <li><a href="SalesPlanRzone.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&z=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Zone Wise</a></li>
   <li><a href="SalesPlanRco.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y=<?php echo $YearId; ?>&ci=<?php echo $CompanyId; ?>&c=0&s=0&hq=0&dil=0&grp=1&q=<?php echo $qtr; ?>&ii=0&Qq1=1&Qq2=1&Qq3=1&Qq4=1">Country Wise</a></li>
   <?php } ?>
  </ul>
  </li>
 </ul>
</li>
<?php } ?>
</ul>
<?php } ?>
