<?php
session_start(); // Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
if(isset($_GET['from_sales_purchase_date']) && isset($_GET['to_sales_purchase_date']) && $_GET['from_sales_purchase_date']!='' && $_GET['to_sales_purchase_date']!='' )
{
	include_once "db.php"; 
	error_reporting (E_ALL ^ E_NOTICE);
			$selected_date=$_GET['from_sales_purchase_date'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );
$fromdate=$mysqldate;
			$selected_date=$_GET['to_sales_purchase_date'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );

$todate=$mysqldate;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Purchase Report</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style type="text/css" media="print">
.hide{display:none}
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
}
</script>
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
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
      <table width="595" border="0" cellspacing="0" cellpadding="0">
       
        
	<tr>
  <td> <center><strong>NILE COFFEE FARMERS ASSOCIATION - KAYUNGA</strong></center></td>
		
        <tr>
          <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><table width="300" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="150"><strong>Total Purchase</strong></td>
                  <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(subtotal) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate' ");?></td>
                </tr>
                <tr>
                  <td><strong>Paid Amount</strong></td>
                  <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(payment) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate' ");?></td>
                </tr>
                <tr>
                  <td width="150"><strong>Pending Payment </strong></td>
                  <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(balance) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate' ");?></td>
                </tr>
              </table></td>
              <td align="right">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="45"><strong>From</strong></td>
                <td width="393">&nbsp;<?php echo $_GET['from_sales_purchase_date']; ?></td>
                <td width="41"><strong>To</strong></td>
                <td width="116">&nbsp;<?php echo $_GET['to_sales_purchase_date']; ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table width="100%"  border="2" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10%"><strong>Date</strong></td>
                <td width="14%"><strong>Supplier<br>
                </strong></td>
                <td width="14%"><strong>Stock</strong></td>
                <td width="11%"><strong>Quantity</strong></td>
                <td width="8%"><strong>Rate</strong></td>
                <td width="11%"><strong>Opening<br>
                Stock</strong></td>
                <td width="11%"><strong>Closing<br>
                  Stock</strong></td>
                <td width="11%"><strong>Total</strong></td>
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
			  </tr>
			  <?php 
			  $result = $db->query("SELECT * FROM stock_entries where type='entry' AND date BETWEEN '$fromdate' AND '$todate' ");
while ($line = $db->fetchNextObject($result)) {
?>
			
				<tr>
                <td><?php  $mysqldate=$line->date;
 		$phpdate = strtotime( $mysqldate );
 		$phpdate = date("d/m/Y",$phpdate);
		echo $phpdate; ?></td>
                <td><?php echo $line->stock_supplier_name; ?></td>
                <td><?php echo $line->payment;  ?></td>
                <td><?php echo $line->stock_name;  ?></td>
                <td><?php echo $line->company_price;  ?></td>
                <td><?php echo $line->opening_stock; ?></td>
                <td><?php echo $line->closing_stock; ?></td>
			    <td><?php echo $line->total;  ?></td>
			  </tr>
			  	

<?php
}
			  ?>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
<?php
}
else
echo "Please from and to date to process report";
}
?>