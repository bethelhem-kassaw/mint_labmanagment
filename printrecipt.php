<?php
	session_start();
   include('database/db.php');
    if(!isset($_SESSION['username'])) header('Location:login.php');
	

        # code...
        
      
        $sql="SELECT *
        FROM borrow
        INNER JOIN member ON borrow.member_id =member.id
        INNER JOIN item ON borrow.item_id = item.id
                        INNER JOIN room ON borrow.room_assigned = room.id
                        GROUP BY borrow.member_id, borrow.item_id, borrow.room_assigned";
      
        $result=mysqli_query($conn,$sql);
      
        
?>
<html>
<style>body{font-size:18px}h4{margin:0 0 5px;padding:0}</style>
<body>
	<table style="width:100%" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td><img src="logo.jfif" class="img-responsive" /></td>
				<td style="text-align:center; font-size:13pt; font-family:'Times New Roman'">
					<p style="margin:0;padding:0;">TECH CENTER</p>
					<p style="margin:0;padding:0;font-weight:bold;">MINISTRY OF INNOVATION AND TECHNOLOGY</p>
					<!-- <p style="margin:0;padding:0;">Talisay City, Negros Occidental</p> -->
				</td>
				<td><img src="logo.jfif" class="img-responsive" style="visibility: hidden" /></td>
			</tr>
			<tr>
				<td></td>
				<td style="text-align:center; font-weight:bold; padding:30px 0; font-size:18pt; font-family:'Bookman Old Style'; text-transform: uppercase;">Borrowing Proof Receipt</td>
				<td></td>
			</tr>
			<tr>
            <?php $row = mysqli_fetch_array($result);?>
				<td colspan="3" style="font-size:16pt;">Name: <?php echo $row['m_fname']; ?> <?php echo $row['m_lname']; ?></td>
            
			</tr>
			<tr>
            <?php $row = mysqli_fetch_array($result);?>
				<td colspan="3" style="font-size:16pt;">Room: <?php echo $row['rm_name']; ?></td>
            
			</tr>
			<tr>
				<td colspan="3">
					<table style="width:100%; border:1px solid #000; border-bottom: none;" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th style="padding:5px; font-size:14pt; font-family:'Calibri'; border-bottom:1px solid #000;">Category</th>
								<th style="padding:5px; font-size:14pt; font-family:'Calibri'; border-bottom:1px solid #000; border-left:1px solid #000;">Brand</th>
							</tr>
						</thead>
						<tbody>
                        <?php $row = mysqli_fetch_assoc($result);?>
							
							<tr>
								<td style="padding:5px; font-size:14pt; font-family:'Calibri'; border-bottom:1px solid #000; text-align:center;">
                                <?php echo $row['i_catagory']; ?>
                            </td>
								<td style="padding:5px; font-size:14pt; font-family:'Calibri'; border-bottom:1px solid #000; border-left:1px solid #000; text-align:center;">
                                <?php echo $row['i_brand']; ?>
                            </td>
							</tr>

						
						



						<br/>
						
						<br/>
									
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>

						<br/>
						<br/>
						<br/>
						<br/>
						<br/>

		
</body>
						<br/>
						<br/>
		<?php 

		

		echo "<p> ____________________</p>"; 
		echo "<p> Borrower's Signature </p>"; 


		?>


					<div class="row no-print">
                         <div class="col-xs-12">
                             <button class="btn btn-success pull-righ" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                             <!-- <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                             <button class="btn btn-primary pull-right mr-5" style="margin-right:6px"><i class="fa fa-download"></i> Generate PDF</button> -->
                         </div>
                     </div>

		<!-- <div id="divToPrint" style="display:none;">
		<div style="width:200px;height:300px;background-color:teal;">
			<?php echo $html;?>
	</div>
	</div>
	<div>
		<input type="button" value="print" onClick="PrintDiv();"/>
	</div> -->
	<!-- <script type="text/javascript">
	function PrintDiv(){
		var divToPrint=document.getElementById('divToPrint');
		var popupWin = window.open('','_blank','width=300,height=300');
		popupWin.document.open();
		popupWin.document.write('<html><body onload="window.print()">'+
		divToPrint.innerHTML + '</html>');
		popupWin.document.close();
		
	}
</script> -->
</html>