<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:22px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.inner_table { height:400px;overflow-y:auto;width:auto; } 
</style>
<Script type="text/javascript" language="javascript">
function ClickGrp(CropGrp)
{  var ii=0; var ci=document.getElementById("ComId").value; 
   window.location="VProCode.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function ChangeII(ii)
{ var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value; 
  window.location="VProCode.php?ac=2441&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function product(id)
{ var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value; var ItemV=document.getElementById("ItemV").value
  window.location="VProCode.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ItemV+"&id="+id 
}

function FunSavePCode(pi)
{ var v=document.getElementById("ProdnCode_"+pi).value; var url = 'VProCodeAct.php'; var pars = 'act=AddProdCode&pi='+pi+'&v='+v;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_ProdCodeV }); }

function show_ProdCodeV(originalRequest)
{ document.getElementById('SpanCodeV').innerHTML = originalRequest.responseText; var pi=document.getElementById("pi").value;
  document.getElementById("ProdnCode_"+pi).style.background='#B0FB4D'; }



//ProdnCode
</Script> 
</head>
<body class="body">
<span id="SpanCodeV"></span>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />	
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" align="center"  width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block;width:100%">             
     <table border="0" width="1100">
	 <tr>
	  <td>
	    <table border="0">
		 <tr>
		   <td class="heading">&nbsp;Product Details</td> 
	  <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:60px;color:#E6E6E6;" align="right"><b>Crop :</b></td>
	    <td>
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
<?php if($_REQUEST['grp']==0){ ?><option value="0" selected>SELECT CROP</option><option value="1">VEGETABLE CROP</option>
                                 <option value="2">FIELD CROP</option><option value="3">All CROP</option>		 
<?php }elseif($_REQUEST['grp']==1){ ?><option value="1" selected>VEGETABLE CROP</option><option value="2">FIELD CROP</option><option value="3">All CROP</option>
<?php }elseif($_REQUEST['grp']==2){ ?><option value="2" selected>FIELD CROP</option><option value="1">VEGETABLE CROP</option><option value="3">All CROP</option>
<?php }elseif($_REQUEST['grp']==3){ ?><option value="3" selected>All CROP</option><option value="1">VEGETABLE CROP</option><option value="2">FIELD CROP</option><?php } ?>
        </select>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:50px;color:#E6E6E6;" align="right"><b>Item :</b></td>
	     <td>
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
<option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option>
<?php }  else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php if($_REQUEST['grp']==0){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?>
	     </select>	  
		 </td>
		 <td>&nbsp;</td>
		 </tr>
		</table>
      </td>
	  
	 </tr>
	 <tr>
	 <td align="left">
<?php if($_REQUEST['ii']>0 OR $_REQUEST['grp']>0){ ?>	 
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;vertical-align:top;">	
   <tr style="background-color:#D5F1D1;color:#000000;height:22px;">  
    <td align="center" style="width:200px;"><b>CROP</b></td>
	<td align="center" style="width:200px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:100px;"><b>Prod<sup>n</sup> Code</b></td>
  </tr>
 <?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ProdnCode,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ProdnCode,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} 
	    if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ProdnCode,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }
	  }   
	  $Sn=1; while($res=mysql_fetch_array($sql)){ ?>  
   <tr bgcolor="#FFFFFF" style="height:22px;">  
     <td>&nbsp;<?php echo $res['ItemName']; ?></td>	 
     <td>&nbsp;<?php echo $res['ProductName']; ?></td>
     <td align="center">&nbsp;<?php echo substr_replace($res['TypeName'],'',2);?></td> 
	 <td><input id="ProdnCode_<?php echo $res['ProductId']; ?>" style="font-family:Times New Roman;font-size:14px;height:22px;width:100px;text-align:center;background-color:<?php if($res['ProdnCode']!=''){echo '#B0FB4D';} ?>;" value="<?php echo strtoupper($res['ProdnCode']);?>" onChange="FunSavePCode(<?php echo $res['ProductId']; ?>)"/></td> 
  </tr>	
<?php }?>  	  
</table>	
<?php } ?>   	       
	 </td>
    </tr>
  </table>  
</td>
</tr>
<tr><td><span id="AjaxSpanId"></span></td></tr>
</table>
	  </td>
	</tr>
	
  </table>
 </td>
</tr>
</table>
</body>
</html>
