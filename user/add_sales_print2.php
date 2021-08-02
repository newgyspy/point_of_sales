<?php
session_start(); // Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
	include_once "db.php"; 
	error_reporting (E_ALL ^ E_NOTICE);
	if(isset($_GET['sid']))
	{
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sales Print</title>
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
<style type="text/css">
<!--
.style1 {font-size: 10px}
-->
</style>
</head>

<body>
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top">
	
	<table width="595"  cellspacing="0" cellpadding="0" id="bordertable"  border="1">
      <tr>
	<td> <center><img src="logos/cat.jpg" width="200" height="62" border="0"><strong>Guardian Pharmacy</strong><img src="logos/komatsu.jpg" width="200" height="62" border="0"></center></td>
        
		

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="67%" align="left" valign="top">&nbsp;&nbsp;&nbsp;Date: <?php
			  $sid=$_GET['sid'];
			$line = $db->queryUniqueObject("SELECT * FROM stock_sales WHERE transactionid='$sid' ");
			
			$mysqldate=$line->date;

 		$phpdate = strtotime( $mysqldate );

 		$phpdate = date("d/m/Y",$phpdate);
		echo $phpdate;
			  ?> 
                &nbsp;&nbsp;&nbsp;Receipt No: <?php echo $sid;
				
				 ?> </strong><br /></td>

                  
              </div></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            
              <?php 
				echo $line->customer_id;
				$cname=$line->customer_id;
				
				$line2 = $db->queryUniqueObject("SELECT * FROM customer_details WHERE customer_name='$cname' ");
				
				echo $line2->customer_address;
				?>
				
            
          </table>
      </tr>
        <td><table width="100%" border="2" cellspacing="0" cellpadding="0">
          <tr>
            <td width="12%" align="center" bgcolor="#CCCCCC"><strong>No.</strong></td>
            <td width="22%" bgcolor="#CCCCCC"><strong>Stock</strong></td>
            <td width="18%" bgcolor="#CCCCCC"><strong>Quantity</strong></td>
            <td width="19%" bgcolor="#CCCCCC"><strong>Rate</strong></td>
            <td width="11%" bgcolor="#CCCCCC">&nbsp;</td>
            <td width="18%" bgcolor="#CCCCCC"><strong>Total</strong></td>
          </tr>
		  
          <tr>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <?php
		  $i=1;
		 $db->query("SELECT * FROM stock_sales where transactionid='$sid'");
while ($line3 = $db->fetchNextObject()) {
?>
          <tr>
            <td align="center"><?php echo $i."."; ?></td>
            <td><?php echo $line3->stock_name; ?></td>
            <td><?php echo $line3->quantity; ?></td>
            <td><?php echo $line3->selling_price; ?></td>
            <td>&nbsp;</td>
            <td><?php echo $line3->amount 	; ?></td>
          </tr>
		  
		  <?php
	$i++;	
	$subtotal=$line3->subtotal;  
	$payment=$line3->payment;
	$balance=$line3->balance;
	$date=$line->due;	    
}
		  ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
          </tr>
        </table></td>
      
	  <tr>
	  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="82%" align="right" bgcolor="#CCCCCC"><strong>SubTotal:&nbsp;&nbsp;</strong></td>
          <td width="18%" bgcolor="#CCCCCC"><?php echo $subtotal; ?>&nbsp;</td>
        </tr>
      </table>	  </td>
	  </tr>
      <tr>
        <td align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="33%" align="left" valign="top"><br />
              <strong>&nbsp;&nbsp;Paid Amount :&nbsp;&nbsp;<?php echo $payment; ?><br />
              &nbsp;&nbsp;Balance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo $balance; ?><br />
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <?php if($balance == 0) {
			  $mysqldate=$ldue;

 		$phpdate = strtotime( $mysqldate );

 		$phpdate = date("d/m/Y",$phpdate);}
		//echo $phpdate;?> <br />
              </strong> </td>
            <td width="67%" align="right"><br />
              <br />
              <br />
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#CCCCCC">Thank you for Business with our show motors. </td>
      </tr>
    </table></td>
  </tr>
</table>


</body>
</html>
<?php
}
else "Error in processing printing the sales receipt";
}
?>