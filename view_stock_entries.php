<?php
error_reporting(0);
//Sob_start();

session_start(); // Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
	include_once "db.php"; 
	
	//error_reporting (E_ALL ^ E_NOTICE);


?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Welcome to Stock Management System !</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<script src="js/jquery.min.js" type="text/javascript"></script>
		
		<script type='text/javascript' src='lib/jquery.bgiframe.min.js'></script>
<script type='text/javascript' src='lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='lib/thickbox-compressed.js'></script>
<script type='text/javascript' src='jquery.autocomplete.js'></script>
<script type='text/javascript' src='localdata.js'></script>

<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="lib/thickbox.css" />

<script>	
		
		function callAutoComplete(idname)
	{
	
	$("#"+idname).autocomplete("stock.php", {
		width: 160,
		autoFill: true,
		//mustMatch: true,
		selectFirst: false
	});
	
	
	
	}
	
	
	function checkDublicateName()
	{	var k=0;
				for (i=0;i<=400;i=i+5)
					{
					if($("#0"+i).length>0)
					{		$k=0;
							 for (j=0;j<=400;j=j+5)
							{
							if($("#0"+j).length>0 && $("#0"+i).val()==$("#0"+j).val())
							{
							 $k++;
							 
							}
							}
						if($k>1)
					{
					alert("Dublicate stock Entry. please remove new and add stock in existing one !");
					
					}
				 	 
					}
					}
					
					
					
					
					
	}

	function callAutoAsignValue(idname)
	{
			
			 var name1 = parseInt(idname,10);
			 
			var quantity1 = name1+1;
			
			 var rate1 =  quantity1+1;
			 var avail1 = rate1+1;
			 var total1 = avail1+1;
			
			 if(parseInt(idname)>0)
			 {
			 quantity1="00"+quantity1;
			 rate1="000"+rate1;
			 avail1="0000"+avail1;
			 total1="00000"+total1;
			 
			 }
			 else
			 {
			  quantity1="00";
			  rate1="000";
			  avail1="0000";
			  total1="00000";
			  
			 }
			 
				 $.post('check_sales_details.php', {stock_name: $("#"+idname).val() },
				function(data){
								
								$("#"+rate1).val(data.rate);
								$("#"+avail1).val(data.availstock);
								$("#"+quantity1).focus();
							}, 'json');
							
						checkDublicateName();	
							
	}
	
	
	function callQKeyUp(Qidname)
	{		
	
			
			 
			 var quantity = parseInt(Qidname,10);
			 var rate =  quantity+1;
			 var avail = rate+1;
			 var total = avail+1;
			 var rowcount = parseInt((total+1)/5);
			 if(rowcount==0)
			 rowcount=1;
			
			 if(parseInt(Qidname)>0)
			 {
			 quantity="00"+quantity;
			 rate="000"+rate;
			 avail="0000"+avail;
			 total="00000"+total
			 }
			 else
			 {
			  quantity="00";
			  rate="000";
			  avail="0000";
			  total="00000";
			  
			  
			 }
			var result= parseFloat($("#"+quantity).val()) * parseFloat( $("#"+rate).val() );
			result=result.toFixed(2);
			$("#"+total).val(result);
			if(parseFloat($("#"+quantity).val()) > parseFloat($("#"+avail).val()))
			$("#"+quantity).val(parseFloat($("#"+avail).val()));
			
			updateSubtotal();
			
	}
	function balanceCalc()
	{		if(parseFloat($("#payment").val()) > parseFloat($("#subtotal").val()))
			$("#payment").val(parseFloat($("#subtotal").val()));
			
			var result= parseFloat($("#subtotal").val()) - parseFloat( $("#payment").val() );
			result=result.toFixed(2);
			$("#balance").val(result);
			
	}
	function updateSubtotal()
	{					
					var temp=0;
					for (i=4;i<=400;i=i+5)
					{
					if($("#00000"+i).length>0)
					{
					 temp=parseFloat(temp)+parseFloat($("#00000"+i).val());
				 	 
					}
					}
				
			
			var subtotal=parseFloat(temp);
			
			if($("#00000").length>0)
			{
			var firstrowvalue=$("#00000").val();
			
			subtotal=parseFloat(subtotal)+parseFloat(firstrowvalue);
			}
			subtotal=subtotal.toFixed(2);
			$("#subtotal").val(subtotal);
			
			
	}
	
	function callRKeyUp(Ridname)
	{
			var rate = parseInt(Ridname,10);
			 var quantity =  rate-1;
			 var avail = rate+1;
			 var total = avail+1;
			 
			 if(parseInt(Ridname)>0)
			 {
			 quantity="00"+quantity;
			 rate="000"+rate;
			 avail="0000"+avail;
			 total="00000"+total
			 
			 }
			 else
			 {
			  quantity="00";
			  rate="000";
			  avail="0000";
			  total="00000";
			  
			 }
			
			var result= parseFloat($("#"+quantity).val()) * parseFloat( $("#"+rate).val() );
			result=result.toFixed(2);
			$("#"+total).val(result);
			if(parseFloat($("#"+quantity).val()) > parseFloat($("#"+avail).val()))
			$("#"+quantity).val(parseFloat($("#"+avail).val()));
			
			updateSubtotal();
	
	}
		
		
		$(document).ready(function() {
			// SUCCESS AJAX CALL, replace "success: false," by:     success : function() { callSuccessFunction() }, 
			 $("#billnumber").focus();
			
			/*$("#"+quantity).keyup(function (e) {
			
			$("#"+total).val( parseInt( $("#"+qunatity).val()) * parseInt( $("#"+rate).val() ));
			if(parseInt($("#"+quantity).val()) > parseInt($("#"+avail).val()))
			$("#"+quantity).val(parseInt($("#"+avail).val()));
			
			});
			
			$("#"+rate).keyup(function (e) {
			
			$("#"+total).val( parseInt($("#"+quantity).val()) * parseInt($("#"+rate).val()) );
			if(parseInt($("#"+quantity).val()) > parseInt($("#"+avail).val()))
			$("#"+quatity).val(parseInt($("#"+avail).val()));
			
			});
				*/
			
			 $("#customer").blur(function()
			{
			
				 $.post('check_customer_details.php', {stock_name1: $(this).val() },
				function(data){
				
								$("#address").val(data.address);
								$("#contact1").val(data.contact1);
								$("#contact2").val(data.contact2);
								if(data.address!=undefined)
								$("#0").focus();
								
							}, 'json');
							
							
					

			
			});
			$("#form1").validationEngine(),
			
			jQuery(document).bind('keydown', 'Ctrl+s',function() {
		  $('#form1').submit();
		  return false;
			});
			
			jQuery(document).bind('keydown', 'Ctrl+r',function() {
		  $('#form1').reset();
		  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+a',function() {
			window.location = "add_stock_sales.php";
		  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+0',function() {
			window.location = "admin.php";
		  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+1',function() {
			window.location = "add_purchase.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+2',function() {
			window.location = "add_stock_sales.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+3',function() {
			window.location = "add_stock_details.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+4',function() {
			window.location = "add_category.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+5',function() {
			window.location = "add_supplier_details.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+6',function() {
			window.location = "add_customer_details.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+7',function() {
			window.location = "view_stock_entries.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+8',function() {
			window.location = "view_stock_sales.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+9',function() {
			window.location = "view_stock_details.php";
			  return false;
			});
			
			jQuery(document).bind('keyup', 'Ctrl+down',function() {
			$('#plus').click();
			  return false;
			});
			//$.validationEngine.loadValidation("#date")
			//alert($("#formID").validationEngine({returnIsValid:true}))
			//$.validationEngine.buildPrompt("#date","This is an example","error")	 		 // Exterior prompt build example								 // input prompt close example
			//$.validationEngine.closePrompt(".formError",true) 							// CLOSE ALL OPEN PROMPTS
		});
	</script>



	
<script type="text/javascript">
$().ready(function() {

	function log(event, data, formatted) {
		$("<li>").html( !data ? "No match!" : "Selected: " + formatted).appendTo("#result");
	}
	
	function formatItem(row) {
		return row[0] + " (<strong>id: " + row[1] + "</strong>)";
	}
	function formatResult(row) {
		return row[0].replace(/(<.+?>)/gi, '');
	}
	


	$("#singleBirdRemote").autocomplete("category.php", {
		width: 160,
		autoFill: true,
		selectFirst: false
	});
	$("#supplier").autocomplete("supplier1.php", {
		width: 160,
		autoFill: true,
		selectFirst: false
	});
	$("#uom").autocomplete("uom.php", {
		width: 160,
		autoFill: true,
		selectFirst: false
	});


	$("#clear").click(function() {
		$(":input").unautocomplete();
	});
});


</script>

<script LANGUAGE="JavaScript">
<!--
// Nannette Thacker http://www.shiningstar.net
function confirmSubmit()
{
var agree=confirm("Are you sure you wish to Delete this Entry?");
if (agree)
	return true ;
else
	return false ;
}

function confirmDeleteSubmit()
{
var agree=confirm("Are you sure you wish to Delete Seletec Record?");
if (agree)
	
document.deletefiles.submit();
else
	return false ;
}


function checkAll()
{

	var field=document.forms.deletefiles;
for (i = 0; i < field.length; i++)
	field[i].checked = true ;
}

function uncheckAll()
{
	var field=document.forms.deletefiles;
for (i = 0; i < field.length; i++)
	field[i].checked = false ;
}
// -->
</script>


		<script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
		 <script src="js/jquery.hotkeys-0.7.9.js"></script>
		<!-- AJAX SUCCESS TEST FONCTION	
			<script>function callSuccessFunction(){alert("success executed")}
					function callFailFunction(){alert("fail executed")}
			</script>
		-->
		
		<script>	
		
		
		
		
		
		$(document).ready(function() {
			// SUCCESS AJAX CALL, replace "success: false," by:     success : function() { callSuccessFunction() }, 
			 $("#name").focus();
			$("#form1").validationEngine(),
			
			jQuery(document).bind('keydown', 'Ctrl+s',function() {
		  $('#form1').submit();
		  return false;
			});
			
			jQuery(document).bind('keydown', 'Ctrl+r',function() {
		  $('#form1').reset();
		  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+a',function() {
			window.location = "addstock.php";
		  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+0',function() {
			window.location = "admin.php";
		  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+1',function() {
			window.location = "add_purchase.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+2',function() {
			window.location = "add_stock_sales.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+3',function() {
			window.location = "add_stock_details.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+4',function() {
			window.location = "add_category.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+5',function() {
			window.location = "add_supplier_details.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+6',function() {
			window.location = "add_customer_details.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+7',function() {
			window.location = "view_stock_entries.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+8',function() {
			window.location = "view_stock_sales.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+9',function() {
			window.location = "view_stock_details.php";
			  return false;
			});
			//$.validationEngine.loadValidation("#date")
			//alert($("#formID").validationEngine({returnIsValid:true}))
			//$.validationEngine.buildPrompt("#date","This is an example","error")	 		 // Exterior prompt build example								 // input prompt close example
			//$.validationEngine.closePrompt(".formError",true) 							// CLOSE ALL OPEN PROMPTS
		});
	</script>	
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}

*{
padding: 0px;
margin: 0px;
}
#vertmenu {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 100%;
width: 160px;
padding: 0px;
margin: 0px;
}

#vertmenu h1 {
display: block;
background-color:#FF9900;
font-size: 90%;
padding: 3px 0 5px 3px;
border: 1px solid #000000;
color: #333333;
margin: 0px;
width:159px;
}

#vertmenu ul {
list-style: none;
margin: 0px;
padding: 0px;
border: none;
}
#vertmenu ul li {
margin: 0px;
padding: 0px;
}
#vertmenu ul li a {
font-size: 80%;
display: block;
border-bottom: 1px dashed #C39C4E;
padding: 5px 0px 2px 4px;
text-decoration: none;
color: #666666;
width:160px;
}

#vertmenu ul li a:hover, #vertmenu ul li a:focus {
color: #000000;
background-color: #eeeeee;
}
.style1 {color: #000000}
div.pagination {

	padding: 3px;

	margin: 3px;

}



div.pagination a {

	padding: 2px 5px 2px 5px;

	margin: 2px;

	border: 1px solid #AAAADD;

	

	text-decoration: none; /* no underline */

	color: #000099;

}

div.pagination a:hover, div.pagination a:active {

	border: 1px solid #000099;



	color: #000;

}

div.pagination span.current {

	padding: 2px 5px 2px 5px;

	margin: 2px;

		border: 1px solid #000099;

		

		font-weight: bold;

		background-color: #000099;

		color: #FFF;

	}

	div.pagination span.disabled {

		padding: 2px 5px 2px 5px;

		margin: 2px;

		border: 1px solid #EEE;

	

		color: #DDD;

	}

	
-->
</style>
</head>

<body onload="setTimeout('startCountDown()',2000);" onmousemove="resetTimer();">

<form name="counter"><input type="text" size="5" name="timer" disabled="disabled" /></form> 


<script type="text/javascript"> 
<!--   
 // edit startSeconds as you see fit 
 // simple timer example provided by Thomas

 var startSeconds = 700;
 var milisec = 0;
 var seconds=startSeconds;
 var countdownrunning = false
 var idle = false;
 document.counter.timer.value=startSeconds;

function CountDown()
{ 
    if(idle == true)
    {

        if (milisec<=0)
        { 
            milisec=9 
            seconds-=1 
        } 
        if (seconds<=-1)
        { 
            document.location='logout.php';
            milisec=0 
            seconds+=1 
            return;
        } 
        else 
        milisec-=1; 
        document.counter.timer.value=seconds;
        setTimeout("CountDown()",100);
    }
    else
    {
        return;
    } 
}
function startCountDown()
{
   document.counter.timer.value=startSeconds;
   seconds = startSeconds;
   milisec = 0

   document.counter.timer.style.display = 'block';
   idle = true;
   CountDown();
   document.getElementById("alert").innerHTML = 'You are idle. you will be logged out after ' + startSeconds + ' seconds.';
   countdownrunning = false;   
}

function resetTimer()
{ 
    document.counter.timer.style.display = 'none';
    idle = false;    
    document.getElementById("alert").innerHTML = '';


    if(!countdownrunning)
        setTimeout('startCountDown()',2000);

    countdownrunning = true;

}

--> 
</script>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
		<table width="960" border="0" cellpadding="0" cellspacing="0" bgcolor="yellow">
        <tr>
            <td height="115" align="left" valign="top"><img src="images/head.png" width="960" height="90"></td>
          </tr>
          <tr>
            <td height="90" align="left" valign="top"><img src="images/topbanner.jpg" width="960" height="160"></td>
          </tr>
          <tr>
            <td height="800" align="left" valign="top"><table width="960" border="0" cellpadding="0" cellspacing="0" bgcolor="yellow">
              <tr>
                <td width="130" align="left" valign="top">
				
				<br>

				<strong>Welcome <font color="#3399FF"><?php echo $_SESSION['username']; ?> !</font></strong><br> <br>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><a href="admin.php"><img src="images/home.png" width="130" height="99" border="0"></a></td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    </tr>
  <tr>
    <td align="center"><a href="add_purchase.php"><img src="images/purchase.png" width="130" height="124" border="0"></a></td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    </tr>
  <tr>
    <td align="center"><a href="add_stock_sales.php"><img src="images/sales.png" width="146" height="111" border="0"></a></td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    </tr>
  <tr>
    <td align="center"><a href="report.php"><img src="images/reports.png" width="131" height="142" border="0"></a></td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    </tr>
</table>


	
				
				
				</td> <td height="500" align="center" valign="top">
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="add_stock_details.php"><img src="images/addstockdetails.png" width="67" height="62" border="0"></a></td>
    <td><a href="add_supplier_details.php"><img src="images/supplier.png" width="67" height="54" border="0"></a></td>
    <td><a href="add_customer_details.php"><img src="images/customer.png" width="67" height="54" border="0"></a></td>
    <td><a href="add_category.php"><img src="images/categories.png" width="67" height="54" border="0"></a></td>
    <td><a href="view_stock_sales.php"><img src="images/vsales.png" width="67" height="54" border="0"></a></td>
    <td><a href="view_stock_entries.php"><img src="images/vpurchase.png" width="67" height="54" border="0"></a></td>
    <td><a href="view_stock_details.php"><img src="images/stockdetails.png" width="67" height="54" border="0"></a></td>
    <td><a href="view_stock_availability.php"><img src="images/savail.png" width="67" height="54" border="0"></a></td>
     <td align="left" valign="top"><a href="view_customer_details.php"><img src="images/customers.png" width="94" height="22" border="0"></a><br>      <a href="view_supplier_details.php"><img src="images/suppliers.png" width="94" height="22" border="0"></a><br>
      <a href="view_payments.php"><img src="images/payments.png" width="94" height="22" border="0"></a></td>
    <td align="left" valign="top"><a href="view_stock_sales_payments.php"><img src="images/outstanding.png" width="94" height="22" border="0"></a><br>      <a href="view_stock_entries_payments.php"><img src="images/pendings.png" width="94" height="22" border="0"></a><br>
      <a href="logout.php"><img src="images/logout.png" width="94" height="22" border="0"></a></td>
  </tr>
</table>
<br>
<br>
		
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><form action="" method="post" name="search" >
<input name="searchtxt" type="text" class="validate[required,length[0,100]] text-input" id="0"   style="width:100px;" onFocus="callAutoComplete(this.id)"  onBlur="callAutoAsignValue(this.id)" autocomplete="on" > 
&nbsp;&nbsp;<input name="Search" type="submit" value="Search">
</form></td>
    <td><form action="" method="get" name="page">
Page per Record<input name="limit" type="text"  style="margin-left:5px;" value="<?php if(isset($_GET['limit'])) echo $_GET['limit']; else echo "10"; ?>" size="3" maxlength="5">
<input name="go" type="submit" value="Go"><!-- 
<input type="button" name="selectall" value="SelectAll" onClick="checkAll()"  style="margin-left:5px;"/>
<input type="button" name="unselectall" value="DeSelectAll" onClick="uncheckAll()" style="margin-left:5px;" />
<input name="dsubmit" type="button" value="Delete Selected" style="margin-left:5px;" onclick="return confirmDeleteSubmit()"/> --></form></td>
  </tr>
</table>
				<?php 



$SQL = "SELECT DISTINCT(stock_id) FROM  stock_entries where type='entry'";

if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
{

$SQL = "SELECT DISTINCT(stock_id) FROM  stock_entries WHERE stock_name LIKE '%".$_POST['searchtxt']."%' OR stock_supplier_name LIKE '%".$_POST['searchtxt']."%' OR stock_id LIKE '%".$_POST['searchtxt']."%' OR date LIKE '%".$_POST['searchtxt']."%' OR type LIKE '%".$_POST['searchtxt']."%' AND type='entry'";


}

	$tbl_name="stock_entries";		//your table name

	// How many adjacent pages should be shown on each side?

	$adjacents = 3;

	

	/* 

	   First get total number of rows in data table. 

	   If you have a WHERE clause in your query, make sure you mirror it here.

	*/

	$query = "SELECT COUNT(*) as num FROM $tbl_name where type='entry'";
if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
{

$query = "SELECT COUNT(*) as num FROM stock_entries WHERE stock_name LIKE '%".$_POST['searchtxt']."%' OR stock_supplier_name LIKE '%".$_POST['searchtxt']."%' OR stock_id LIKE '%".$_POST['searchtxt']."%' OR date LIKE '%".$_POST['searchtxt']."%' OR type LIKE '%".$_POST['searchtxt']."%' and where type='entry'";




}
	$total_pages = mysql_fetch_array(mysql_query($query));

	$total_pages = $total_pages[num];

	

	/* Setup vars for query. */

	$targetpage = "view_stock_entries.php"; 	//your file name  (the name of this file)

	$limit = 5000; 								//how many items to show per page
	if(isset($_GET['limit']))
	$limit=$_GET['limit'];
	
	$page = $_GET['page'];

	if($page) 

		$start = ($page - 1) * $limit; 			//first item to display on this page

	else

		$start = 0;								//if no page var is given, set start to 0

	

	/* Get data. */

	$sql = "SELECT DISTINCT(stock_id) FROM stock_entries where type='entry' ORDER BY date desc LIMIT $start, $limit  ";
	
	if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
{

$sql = "SELECT DISTINCT(stock_id) FROM stock_entries WHERE stock_name LIKE '%".$_POST['searchtxt']."%' OR stock_supplier_name LIKE '%".$_POST['searchtxt']."%' OR stock_id LIKE '%".$_POST['searchtxt']."%' OR date LIKE '%".$_POST['searchtxt']."%' OR type LIKE '%".$_POST['searchtxt']."%' and type='entry' ORDER BY date desc LIMIT $start, $limit";




}

	$result = mysql_query($sql);

	

	/* Setup page vars for display. */

	if ($page == 0) $page = 1;					//if no page var is given, default to 1.

	$prev = $page - 1;							//previous page is page - 1

	$next = $page + 1;							//next page is page + 1

	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.

	$lpm1 = $lastpage - 1;						//last page minus 1

	

	/* 

		Now we apply our rules and draw the pagination object. 

		We're actually saving the code to a variable in case we want to draw it more than once.

	*/

	$pagination = "";

	if($lastpage > 1)

	{	

		$pagination .= "<div class=\"pagination\">";

		//previous button

		if ($page > 1) 

			$pagination.= "<a href=\"$targetpage?page=$prev&limit=$limit\">� previous</a>";

		else

			$pagination.= "<span class=\"disabled\">� previous</span>";	

		

		//pages	

		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up

		{	

			for ($counter = 1; $counter <= $lastpage; $counter++)

			{

				if ($counter == $page)

					$pagination.= "<span class=\"current\">$counter</span>";

				else

					$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

			}

		}

		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some

		{

			//close to beginning; only hide later pages

			if($page < 1 + ($adjacents * 2))		

			{

				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">$lastpage</a>";		

			}

			//in middle; hide some front and some back

			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

			{

				$pagination.= "<a href=\"$targetpage?page=1&limit=$limit\">1</a>";

				$pagination.= "<a href=\"$targetpage?page=2&limit=$limit\">2</a>";

				$pagination.= "...";

				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">$lastpage</a>";		

			}

			//close to end; only hide early pages

			else

			{

				$pagination.= "<a href=\"$targetpage?page=1&limit=$limit\">1</a>";

				$pagination.= "<a href=\"$targetpage?page=2&limit=$limit\">2</a>";

				$pagination.= "...";

				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

				}

			}

		}

		

		//next button

		if ($page < $counter - 1) 

			$pagination.= "<a href=\"$targetpage?page=$next&limit=$limit\">next �</a>";

		else

			$pagination.= "<span class=\"disabled\">next �</span>";

		$pagination.= "</div>\n";		

	}


?>
<?php if(isset($_GET['msg'])) echo "Record ID:[ ".$_GET['id']." ] <center>".$_GET['msg']."</center>"; 
					
					if(isset($_GET['cmsg'])) echo "<center>".$_GET['cmsg']."</center>";
					?>


      
	 <form name="deletefiles" action="deleteselected.php" method="post">
	 <input name="table" type="hidden" value="stock_entries">
	 <input name="return" type="hidden" value="view_stock_entries.php">


      <table width="700" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td bgcolor="#0099FF"><div align="center"><strong><span class="style1">View Stock Entries </span></strong></div></td>

      </tr>

      <tr>

        <td>&nbsp;</td>

      </tr>

      <tr>

        <td align="center"><table width="100%"  border="2" cellspacing="0" cellpadding="0">

          <tr>

            <td width="100"><strong>Stock ID </strong></td>
	    <td width="100"><strong>Stock name </strong></td>
	    <td width="100"><strong>Quantity </strong></td>
			<td width="100"><strong>Supplier </strong></td>
<td width="100"><strong>BuyingRate </strong></td>
<td width="100"><strong>Total Cost </strong></td>
<td width="100"><strong>Selling Price </strong></td>
<td width="100"><strong>Expirely date </strong></td>
<td width="100"><strong>Batchno </strong></td>

            <td width="100"><strong>Date</strong></td>

            <td width="100"><strong>Closing Stock</strong></td>
			   <td width="100"><strong>View/Edit</strong></td> 
            <td width="100"><strong>Delete</strong></td>
           <!--  <td width="100"><strong>Select</strong></td> -->
          </tr>

		  

		  

		  <?php

	 

								while($row = mysql_fetch_array($result))

		{

		

		 

			$entryid=$row['stock_id'];
			$line = $db->queryUniqueObject("SELECT * FROM stock_entries WHERE stock_id='$entryid' order by stock_name asc ");
			
			$mysqldate=$line->date;
			$mysqlname=$line->stock_name;
			$mysqlquantity=$line->quantity;

 		$phpdate = strtotime( $mysqldate );

 		$phpdate = date("d/m/Y",$phpdate);

										 ?>

  											<tr>



       	<td width="100"><?php echo $line->stock_id; ?></td>
	<td width="100"><?php echo $line->stock_name; ?></td>
	<td width="100"><?php echo $line->quantity; ?></td>
			<td width="100"><?php echo $line->stock_supplier_name; ?></td>

	<td width="100"><?php echo $line->company_price; ?></td>
<td width="100"><?php echo $line->total; ?></td>
<td width="100"><?php echo $line->selling_price; ?></td>

<td width="100"><?php echo $line->due; ?></td>

<td width="100"><?php echo $line->bacth; ?></td>

        <td width="100"><?php echo $phpdate; ?></td>

        <td width="100"><?php echo $line->closing_stock; ?></td>

				<td width="100"> <a href="edit_purchase.php?id=<?php echo $entryid;?>"><img src="images/edit-icon.png" border="0" alt="Edit"></a></td>
	
							<td width="100"><a onclick="return confirmSubmit()"
 href="stock_entry_delete.php?id=<?php echo $entryid; ?>&table=stock_entries&return=view_stock_entries.php"><img src="images/delete.png" border="0" alt="delete"></a></td>
 
<!-- <td width="100">&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="<?php // echo $row['id']; ?>" name="checklist[]" /></td>
 -->								  </tr> 


						

											 

											 

										

                                             

                                             <?php

												

											 

									  }

							  			

		              

						  

	

 



?>

		  

		  

		  

		  

		  

        </table></td>

      </tr>

      <tr>

        <td>&nbsp;</td>

      </tr>

      <tr>

        <td align="center">&nbsp;</td>

      </tr>

      <tr>

        <td align="center"><div style="margin-left:20px;"><?php echo $pagination; ?></div></td>

      </tr>

      <tr>

        <td align="center">&nbsp;</td>

      </tr>

      <tr>

        <td>&nbsp;</td>

      </tr>

      <tr>

        <td align="center">&nbsp; </td>

      </tr>

      <tr>

        <td>&nbsp;</td>

      </tr>

    </table>

	

	</form>

	

	</td>

  </tr>

</table>

</td>
              </tr>
            </table>
			
		</td>
          </tr>
          <tr>
            <td height="30" align="center" bgcolor="yellow"><span class="style1"><a href="http://www.K.I.biz">Code Software Investiments</a></span></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
<?php
}
?>