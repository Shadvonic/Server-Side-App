

<!DOCTYPE html>
<html>
	<head>
		<title>Term Project</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>


	<main>
		<body>

			
				<div class="row"> 
						<div class="column left">
							<h2>Totals </h2>
							<hr class="line">
							<p style="color:black; font-size: 14px;"><?php echo $category_select; ?></p>
							<p style="color:black; font-size: 14px;"><?php echo $segment_select; ?><p>
							<p style="color:black; font-size: 14px;"><?php echo $state_select; ?><p>
							<hr class="line">

						

							
							<!-- sales calulation -->
							<?php 
								foreach($dataSet as $selected) : $currentOrder = $selected['Sales']
							 ?>

							 <?php if ($previousOrder != $currentOrder AND $flag != 0) : ?>

						

							<?php else: $flag = 1; ?>
        					<?php endif ?>


							<?php 
				                $totalSales +=($selected[2]);
				            ?>
				            
				            <?php $previousOrder = $currentOrder; endforeach ?>

				            <h3>Sales Total<h3>
				            <h5>$<?php echo number_format($totalSales,2); ?></h5>
				            <hr class="line">

						

							<!-- profit calulation -->
				            <?php 
								foreach($dataSet as $selected) : $currentOrder = $selected['Profit']
							 ?>

							 <?php if ($previousOrder != $currentOrder AND $flag != 0) : ?>

						

							<?php else: $flag = 1; ?>
        					<?php endif ?>


							<?php 
				                $totalProfit +=($selected[5]);
				            ?>
				            
				            <?php $previousOrder = $currentOrder; endforeach ?>
							<h3>Profit Total</h3>
							<h5>$<?php echo number_format($totalProfit,2); ?></h5>
							<hr class="line">
							

							<?php 
								
								$profitRatio  = ($totalProfit / $totalSales)
								
							?>

							<h3>Profit Ratio</h3>
							<h5><?php echo sprintf("%.2f%%", $profitRatio * 100); ?><h5>
							
						</div>

					<div class="column middle" >
						<h2> The Category: <?php echo $category_select, " - $segment_select"  ?></h2>
							<table width="100%">
								<tr>
									<th>State</th>
									<th>Order ID</th>
									<th>Sales: USD</th>
									<th>Quanitiy</th>
									<th>Discount</th>
									<th>Profit: USD</th>
								</tr>

								<?php 
										$flag1 = 0;
										$limit = count($dataSet);					
								?>
								<!-- display data from query -->
							<?php for ($i = 0; $i < $limit; $i++) {
							 //foreach($dataSet as $selected) : ?>
							<td colspan="6" style="background-color: lightgrey; ">
									<?php
										if ($i != 0 && $dataSet[$i]['State'] != $dataSet[$i-1]['State'])
										{
											$flag1 = 0;
										}
										
										foreach($state_name as $states)
										{							
											if($dataSet[$i]['State'] == $states['State'] && $flag1 < 1)
											{
												echo $states['State']; 
												$flag1++;
											}
											elseif ($flag1 > 0)
											{
												break;
											}							
										}
									?> 
							</td>

									<tr> 
											<td> &nbsp; </td>
											<td> <?php echo $selected['Order_ID'];   ?></td>
											<td><?php  echo number_format($selected['Sales'],2);?></td>
											<td><?php  echo $selected['Quantity'];   ?></td>
											<td><?php  echo $selected['Discount'];  ?></td>
											<td><?php  echo number_format($selected['Profit'],2);    ?></td>
													
									</tr>
								
								
						 	<?php } //endforeach; ?>

						


						</table>
					</div>

			
					<div class="column right">
						<form action="." method="GET">
							<h2>Categories</h2>

							<!-- category dropdown -->
							<select name="category_select">
								
								<?php foreach ($category_name as $categories) :  ?>
									<option value="<?php echo $categories['Category']; ?>"

								<?php 
									//make sticky 
									if($categories['Category'] == $category_select) : echo 'selected = selected';
								endif ?>>
										<?php echo $categories['Category']; ?>

									</option>
							<?php endforeach; ?> 
						
							</select>


							<br>

							<h2>Segments</h2>

							<!-- segment dropdown menu -->
							<select name="segment_select">
								
								<?php foreach ($segment_name as $segments) : ?>
									<option value="<?php echo $segments['Segment']; ?>"

								<?php
									//make sticky
									if($segments['Segment'] == $segment_select) : echo 'selected = selected';
									endif 
								?>>
										<?php echo $segments['Segment']; ?>
									</option>
								 <?php endforeach; ?>  
							</select>

							<br>

							<h2>States</h2>



							<!-- state dropdown menu -->
							<select name="state_select">

								
								<?php foreach($state_name as $states) : ?>

								<option value="<?php echo $states['State']; ?>"

								<?php 
									//make skicky 
									if($states['State'] == $state_select) : echo 'selected = selected';
            						endif 
            					?>>  
									<?php echo $states['State']; ?>
								</option>
							   <?php endforeach; ?>  
							</select>

							<br><br>
							 <input type = 'submit' name = 'submit' value = 'Submit'>
						</form>
					</div>
			
			</div>
			<p class= "last_paragraph">

			</p>
		</body>
	</main>
</html>

