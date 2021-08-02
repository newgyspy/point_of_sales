   <?php
   error_reporting(0);
   ?>
   <?php
session_start(); // Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
	include_once "db.php"; 
	error_reporting (E_ALL ^ E_NOTICE);

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Welcome to Stock Management System !</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META Http-Equiv="Cache-Control" Content="no-cache">
<META Http-Equiv="Pragma" Content="no-cache">
<META Http-Equiv="Expires" Content="0"> 
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="jquery.date_input.js"></script>
<link rel="stylesheet" href="date_input.css" type="text/css">
<script type="text/javascript">$(function() {
  $("#datefield").date_input();
   $("#due").date_input();
});</script>

<script type='text/javascript' src='lib/jquery.bgiframe.min.js'></script>
<script type='text/javascript' src='lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='lib/thickbox-compressed.js'></script>
<script type='text/javascript' src='jquery.autocomplete.js'></script>

<script type='text/javascript' src='localdata.js'></script>

<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="lib/thickbox.css" />
	
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
	
	


	
	
	$("#supplier").autocomplete("supplier1.php", {
		width: 160,
		autoFill: true,
		selectFirst: false
	});
	

	
});


</script>

		<script type="text/javascript" src="lib/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript" src="jquery-dynamic-form.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){	
				$("#duplicate").dynamicForm("#plus", "#minus", {limit:50, createColor: 'yellow',removeColor: 'red'});
				
			});
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
				for (i=0;i<=400;i=i+6)
					{
					if($("#0"+i).length>0)
					{		$k=0;
							 for (j=0;j<=400;j=j+6)
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
			 var brate1 =  quantity1+1;
			 var srate1 =  brate1+1;
			 var avail1 = srate1+1;
			 var total1 = avail1+1;
			
			 if(parseInt(idname)>0)
			 {
			 quantity1="00"+quantity1;
			 brate1="000"+brate1;
			 srate1="0000"+srate1;
			 avail1="00000"+avail1;
			 total1="000000"+total1;
			 
			 }
			 else
			 {
			  quantity1="00";
			  brate1="000";
			  srate1="0000";
			  avail1="00000";
			  total1="000000";
			  
			 }
			 
				
		$.post('check_stock_details.php', {stock_name: $("#"+idname).val() },
				function(data){
				
								// if(data=='no') //if username not avaiable
		 						// {
								//  $("#category").focus();
								// }
															
								$("#"+brate1).val(data.buyingrate);
								$("#"+srate1).val(data.sellingprice);
								$("#"+avail1).val(data.available);
								$("#quantity").focus();
							}, 'json');
							
							
						checkDublicateName();	
							
	}
	
	
	function callQKeyUp(Qidname)
	{		
	
			
			 
			 var quantity = parseInt(Qidname,10);
			 var brate =  quantity+1;
			 var srate =  brate+1;
			 var avail = srate+1;
			 var total = avail+1;
			 var rowcount = parseInt((total+1)/5);
			 if(rowcount==0)
			 rowcount=1;
			
			 if(parseInt(Qidname)>0)
			 {
			 quantity="00"+quantity;
			 brate="000"+brate;
			 srate="0000"+srate;
			 avail="00000"+avail;
			 total="000000"+total
			 }
			 else
			 {
			  quantity="00";
			  brate="000";
			  srate="0000";
			  avail="00000";
			  total="000000";
			  
			  
			 }
			var result= parseFloat($("#"+quantity).val()) * parseFloat( $("#"+brate).val() );
			result=result.toFixed(2);
			$("#"+total).val(result);
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
					for (i=5;i<=400;i=i+6)
					{
					if($("#000000"+i).length>0)
					{
					 temp=parseFloat(temp)+parseFloat($("#000000"+i).val());
				 	 
					}
					}
				
			
			var subtotal=parseFloat(temp);
			
			if($("#000000").length>0)
			{
			var firstrowvalue=$("#000000").val();
			
			subtotal=parseFloat(subtotal)+parseFloat(firstrowvalue);
			}
			subtotal=subtotal.toFixed(2);
			$("#subtotal").val(subtotal);
			
			
	}
	
	function callRKeyUp(Ridname)
	{
			 var brate = parseInt(Ridname,10);
			 var quantity =  brate-1;
			 var srate =  brate+1;
			 var avail = srate+1;
			 var total = avail+1;
			 
			 
			 callQKeyUp(brate-1)
			 /*
			 if(parseInt(Ridname)>0)
			 {
			 quantity="00"+quantity;
			 brate="000"+brate;
			 srate="0000"+srate;
			 avail="00000"+avail;
			 total="000000"+total
			 
			 }
			 else
			 {
			  quantity="00";
			  brate="000";
			  srate="0000";
			  avail="00000";
			  total="000000";
			  
			 }
			
			var result= parseFloat($("#"+quantity).val()) * parseFloat( $("#"+brate).val() );
			result=result.toFixed(2);
			$("#"+total).val(result);
			
			updateSubtotal();
	*/
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
			
			 $("#supplier").blur(function()
			{
			 
							
			 $.post('check_supplier_details.php', {stock_name1: $(this).val() },
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
			window.location = "add_purchase.php";
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
        <td><table width="960" border="0" cellpadding="0" cellspacing="0" bgcolor="yellow">
        <tr>
            <td height="115" align="left" valign="top"><img src="images/head.png" width="960" height="90"></td>
          </tr>
          <tr>
            <td height="90" align="left" valign="top"><img src="images/topbanner.jpg" width="960" height="160"></td>
          </tr>
          <tr>
            <td height="500" align="left" valign="top"><table width="960" border="0" cellpadding="0" cellspacing="0" bgcolor="yellow">
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
				<?php
				
					if(isset($_POST['Submit']))

            {	
			
			$branch=mysql_real_escape_string($_POST['branch']);
			$branch1=mysql_real_escape_string($_POST['branch1']);
			
			$quantityt=$_POST['quantity'];
			
			
			$buyingprice=$_POST['buyingprice'];
			$sellingprice=$_POST['sellingprice'];
			$total=$_POST['total'];
			$subtotal=mysql_real_escape_string($_POST['subtotal']);
			$date=mysql_real_escape_string($_POST['date']);
			
			
			$namet=$_POST['name'];
			$quantityt=$_POST['quantity'];
                        
                        
			$ratet=$_POST['[rate'];
			$totalt=$_POST['total'];
			$subtotal=mysql_real_escape_string($_POST['subtotal']);
                        
                        
                        $due =$_POST['due'];
			
			$username=$_SESSION['username'];
			
			$i=0;
			$j=1;
			
			
			
			$start =$_POST['date'];
$end =$_POST['due'];
$diff = (strtotime($end)- strtotime($start))/24/3600; 

			  foreach($namet as $name1)
			   {
				
			   
			$quantity=$_POST['quantity'][$i];
			$rate=$_POST['rate'][$i];
			$total=$_POST['total'][$i];
			
			
			$selected_date=$_POST['date'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );
			$username = $_SESSION['username'];
			
			
			$count = $db->queryUniqueValue("SELECT count(*) FROM stock_avail WHERE name='$name1' and quantity >=$quantity");
			
			if($count == 1)
			{
			
			 
			  
			$db->query("insert into  stock_transfer(branch,branch2,name,quantity,buyingprice,sellingprice,total,subtotal,date) values('$branch','$branch1','$name1','$quantity','$buyingprice','$sellingprice','$total','$subtotal','$date')");
			
			$j++;
			
			}
			else 
			{
				echo "<br><font color=green size=+1 >There is no enough stock deliver for $name1! Please add stock !</font>" ;
			}
			
			
			
			
			
			
			
			
			$i++;
			}
			echo "<div style='background-color:yellow;'><br><font color=green size=+1 >New Stock Transfer Added ! Invoice ID [ $autoid ]</font></div> ";
			//echo "<script>window.open('add_invoice_print.php?sid=$autoid','myNewWinsr','width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no');</script>";
			
				}
				
			
				?>
				
				<br>
<br>

				
				<form name="salesform" method="post" id="form1" action="" onSubmit="updateSubtotal()" >
                  
                  <p align="center"><strong>Add New Stock Transfer </strong> - Add New ( Control +A)</p>
				 
                  <table width="800"  border="0" cellspacing="0" cellpadding="0"  id="dynamictable">
                    <tr>
                      <td width="61">&nbsp;</td>
                      <td width="110">&nbsp;</td>
                      <td width="15">&nbsp;</td>
                      <td width="76">&nbsp;</td>
                      <td width="171">&nbsp;</td>
                      <td width="74">&nbsp;</td>
                      <td width="111">&nbsp;</td>
                      <td width="77">&nbsp;</td>
                      <td width="105">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="61">&nbsp;</td>
                      <td width="110">&nbsp;</td>
                      <td width="15">&nbsp;</td>
                      <td width="76">&nbsp;</td>
                      <td width="171">&nbsp;</td>
                      <td width="74">&nbsp;</td>
                      <td width="111">&nbsp;</td>
                      <td width="77">&nbsp;</td>
                      <td width="105">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="61">&nbsp;</td>
					  <td width="110">&nbsp;</td>
					  <td>&nbsp;</td>
					  <td><div align="left"><strong>ID</strong>
                              <?php
					  $max = $db->maxOfAll("id","stock_sales");
					  $max=$max+1;
					  $autoid="PR".$max."";
					  ?>
                      </div></td>
					  <td><input name="id" type="text" id="id" readonly="" value="<?php echo $autoid; ?>" style="width:50px;"></td>
					  <td><div align="left"><strong>Date</strong></div></td>
					  <td><input type="text" id="datefield" name="date" class="date_input" value="<?php echo date('d-m-Y');?>" style="width:70px;"></td>
					  <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      
                      
                      <td width="77">From </td>
						<td width="400"><select name="branch"
                        
                         style="width:250px;">
                         
                          <option>
                        - Select Branch-
                         </option>
                         
                         <option>
                         Munyonyo
                         </option>
                         
                         <option>
                         Kitintale
                         </option>
                         
                         <option>
                         Kansanga
                         </option>
                         
                         <option>
                         
                         Kabalagala
                         </option>
                         
                         <option>
                         Bunga
                         </option>
                         </select>
                         </td>
                      
                      
                    
		    
		    
		    <td width="77">TO</td>
						<td width="400"><select name="branch1"
                        
                         style="width:250px;">
                         
                          <option>
                        - Select Branch-
                         </option>
                         
                         <option>
                         Munyonyo
                         </option>
                         
                         <option>
                         Kitintale
                         </option>
                         
                         <option>
                         Kansanga
                         </option>
                         
                         <option>
                         
                         Kabalagala
                         </option>
                         
                         <option>
                         Bunga
                         </option>
                         </select>
                         </td>
                      
                      
                   </tr>
		    
		    
		    
		    
		    
                    <tr>
                      <td width="61">&nbsp;</td>
                      <td width="110">&nbsp;</td>
                      <td width="15"><div align="left"></div></td>
                      <td width="76">&nbsp;</td>
                      <td width="171"><div align="left"></div></td>
                      <td width="74">&nbsp;</td>
                      <td width="111"><div align="left"></div></td>
                      <td width="77">&nbsp;</td>
                      <td width="105">&nbsp;</td>
                    </tr>
                    <tr>
		
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><div align="left"></div></td>
                      <td>&nbsp;</td>
                      <td><div align="left"></div></td>
                      <td>&nbsp;</td>
                      <td><div align="left"></div></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                   </table>
                  <br>

					<table width="800" border="0" cellspacing="0" cellpadding="0"  id="duplicate" style="margin-left:20px;">
  						<tr>
                        
                        
                        
                      <td ><div align="center"><strong>Name</strong></div></td>
                      <td ><input name="name[]" type="text" class="validate[required,length[0,100]] text-input" id="0"   style="width:100px;" onFocus="callAutoComplete(this.id)"  onBlur="callAutoAsignValue(this.id)" autocomplete="off"></td>
                      <td><div align="left"><strong>Qty</strong></div></td>
                      <td><input name="quantity[]" type="text" id="00"   class="validate[required,custom[onlyFloat],lengthCheck[6]] text-input"  style="width:50px;" onKeyUp="callQKeyUp(this.id)"></td>
                      <td><div align="left"><strong>Buy Rate:</strong></div></td>
                      <td><input name="buyingprice[]" type="text" id="000"  class="validate[required,custom[onlyFloat],lengthCheck[6]] text-input"  style="width:50px;" onKeyUp="callRKeyUp(this.id)"  ></td>
					  <td>Sales Rate </td>
					  <td><input name="sellingprice[]" type="text" id="0000"  class="validate[optional,custom[onlyFloat],lengthCheck[6]] text-input"  style="width:50px;"  ></td>
					  <td>Avail Qty</td>
						<td><input name="avail[]" type="text" id="00000" readonly="" value="" style="width:50px;" ></td>
                      <td><div align="left"><strong>Total:</strong></div></td>
                      <td><input name="total" type="text" id="000000" readonly="" value="" style="width:100px;text-align:right;" >  </td>
                   <td width="50"><p><span><a id="minus" href=""  >[-]</a> <a id="plus" href="">[+]</a></span></p></td>
                   
                    </tr>
					  <tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					  </tr>
					  </table>
					  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  id="duplicate" style="margin-left:20px;">
					  <tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td width="103">&nbsp;</td>
						<td width="140">&nbsp;</td>
						<td width="5">&nbsp;</td>
						<td width="5">&nbsp;</td>
						<td width="5">&nbsp;</td>
						<td width="13">&nbsp;</td>
					  </tr>
                
						<td>&nbsp;</td>
						<td><div align="center"><strong>Sub Total </strong></div></td>
						<td><input name="subtotal" id="subtotal" type="text" readonly="" style="width:100px; text-align:right; color:#333333; font-weight:bold; font-size:16px;"><img src="images/refresh.png" alt="Refresh" align="absmiddle" onClick="updateSubtotal()"></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					  </tr>
                    
						<td width="77">Due Date </td>
						<td width="195"><input type="text" id="due" name="due" class="date_input" value="<?php echo date('d-m-Y');?>" style="width:70px;"></td>
						<td width="77">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					  </tr>
					  <tr>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td><div align="center">
                            <input type="button" name="Reset" value="Reset">
                        </div></td>
					    <td><input type="submit" name="Submit" value="Save"  ></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    </tr>
					</table>
				
                </form>
				<br>
<br>
<br>

				
  
  </td>
              </tr>
            </table>		</td>
          </tr>
          <tr>
		  
            <td height="30" align="center" bgcolor="yellow">
			
</div><span class="style1"></span></td>
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