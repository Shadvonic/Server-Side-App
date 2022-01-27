
<?php 



//ALLquries 

	
		//Form Queries 	

			$query3 = 'SELECT DISTINCT Category FROM orders';
		    $statement3 = $db->prepare($query3);
		    $statement3 ->execute();
		    $category_name = $statement3->fetchALL();
		    $statement3->closeCursor();

		    $allCategory = array("Category" => 'All');
			array_unshift($category_name, $allCategory);


			
			$query4 = 'SELECT DISTINCT Segment FROM orders';
		    $statement4 = $db->prepare($query4);
		    $statement4->execute();
		    $segment_name = $statement4->fetchAll();
		    $statement4->closeCursor();
		    $allSegment = array("Segment" => 'All');
			array_unshift($segment_name, $allSegment);

			$query5 = 'SELECT DISTINCT State FROM orders';
		    $statement5= $db->prepare($query5);
		    $statement5 ->execute();
		    $state_name = $statement5->fetchAll();
		    $statement5->closeCursor();
		    $allState = array("State" => 'All');
			array_unshift($state_name, $allState);


			//selected state
				
			$query = 'SELECT State, Order_ID, Sales, Quantity, Discount, Profit
						FROM orders 
							WHERE Category = :category_select
								 AND Segment = :segment_select 
								 	AND State = :state_select 
								 		ORDER BY State ASC' ;
			$statement = $db->prepare($query);
		    $statement->bindValue(':category_select', $category_select);
		    $statement->bindValue(':segment_select', $segment_select);
		    $statement->bindValue(':state_select', $state_select);
		    $statement->execute();
		   	$selection = $statement->fetchAll();
		    $statement->closeCursor();


            //all  categories 
			$query6 = 'SELECT DISTINCT Category FROM orders';
		    $statement6 = $db->prepare($query6);
		    $statement6 ->execute();
		    $groupedCategories = $statement6->fetchAll();
		    $statement6->closeCursor();

		   	//all segments 
		    $query7 = 'SELECT DISTINCT Segment FROM orders';
		    $statement7 = $db->prepare($query7);
		    $statement7 ->execute();
		    $groupedSegments = $statement7->fetchAll();
		    $statement7->closeCursor();


		   	//math
		   	$flag = 0;
            $totalSales = 0;
            $previousOrder = '';
            $currentOrder = '';
            $totalProfit = 0;
            $profitRatio = 0;






           //dataset 
           Function selectedDataSet($category_select, $segment_select, $state_select) {
           	global $db; 
           	$queryDataSet = 'SELECT State, Order_ID, Sales, Quantity, Discount, Profit
						FROM orders 
							WHERE Category = :category_select
								 AND Segment = :segment_select 
								 	AND State = :state_select 
								 		ORDER BY State, Order_ID ASC' ;
			$statement2 = $db->prepare($queryDataSet);
			$statement2->bindValue(':category_select', $category_select);
		    $statement2->bindValue(':segment_select', $segment_select);
		    $statement2->bindValue(':state_select', $state_select);
		    $statement2->execute();
		   	$dataSet = $statement2->fetchAll();
		    $statement2->closeCursor();

		     return $dataSet;


           }


           Function allDataSet() {
           	  
           	global $db;
		    $queryDataSet = 'SELECT State, Order_ID, Sales, Quantity, Discount, Profit FROM orders ORDER BY State, Order_ID';
		    $statement2 = $db->prepare($queryDataSet);
		    $statement2 ->execute();
		    $dataSet = $statement2->fetchAll();
		    $statement2->closeCursor();

		    return $dataSet;
           }


            Function allCategoryDataSet($segment_select,$state_select) {
           	  
           	global $db;
		    $queryDataSet = 'SELECT State, Order_ID, Sales, Quantity, Discount, Profit
		    					 FROM orders 
		    					 	WHERE Segment = :segment_select
		    					 		AND State = :state_select
		    					 			ORDER BY State, Order_ID';
		    $statement2 = $db->prepare($queryDataSet);
	 		$statement2->bindValue(':segment_select', $segment_select);
		    $statement2->bindValue(':state_select', $state_select);
		    $statement2 ->execute();
		    $dataSet = $statement2->fetchAll();
		    $statement2->closeCursor();

		    return $dataSet;


           }

           Function allSegemntDataSet($category_select, $state_select) {
           	  
           	global $db;
		    $queryDataSet = 'SELECT State, Order_ID, Sales, Quantity, Discount, Profit
		    					 FROM orders 
		    					 	WHERE Category = :category_select
		    					 		AND State = :state_select
		    					 			ORDER BY State, Order_ID';
		    $statement2 = $db->prepare($queryDataSet);
		    $statement2->bindValue(':category_select', $category_select);
		    $statement2->bindValue(':state_select', $state_select);
		    $statement2 ->execute();
		    $dataSet = $statement2->fetchAll();
		    $statement2->closeCursor();

		    return $dataSet;


           }

           Function allStateDataSet($category_select, $segment_select) {

           	global $db;
		    $queryDataSet = 'SELECT State, Order_ID, Sales, Quantity, Discount, Profit
		    					 FROM orders 
		    					 	WHERE Category = :category_select
		    					 		AND Segment = :segment_select
		    					 			ORDER BY State, Order_ID';
		    $statement2 = $db->prepare($queryDataSet);
	 		$statement2->bindValue(':category_select', $category_select);
		    $statement2->bindValue(':segment_select', $segment_select);
		    $statement2 ->execute();
		    $dataSet = $statement2->fetchAll();
		    $statement2->closeCursor();

		    return $dataSet;

           }



           
            Function allCategorySegmentDataSet($state_select) {
           	  
           	global $db;
		    $queryDataSet = 'SELECT State, Order_ID, Sales, Quantity, Discount, Profit
		    					 FROM orders 
		    					 	WHERE State = :state_select
		    					 		ORDER BY State, Order_ID';
		    $statement2 = $db->prepare($queryDataSet);
	 		$statement2->bindValue(':state_select', $state_select);
		    $statement2 ->execute();
		    $dataSet = $statement2->fetchAll();
		    $statement2->closeCursor();

		    return $dataSet;


           }

           Function allCategoryStateDataSet($segment_select) {
           	  
           	global $db;
		    $queryDataSet = 'SELECT State, Order_ID, Sales, Quantity, Discount, Profit
		    					 FROM orders 
		    					 	WHERE Segment = :segment_select
		    					 		ORDER BY State, Order_ID';
		    $statement2 = $db->prepare($queryDataSet);
	 		$statement2->bindValue(':segment_select', $segment_select);
		    $statement2 ->execute();
		    $dataSet = $statement2->fetchAll();
		    $statement2->closeCursor();

		    return $dataSet;


           }

          
           Function allSegmentStateDataSet($category_select) {

           	global $db;
		    $queryDataSet = 'SELECT State, Order_ID, Sales, Quantity, Discount, Profit
		    					 FROM orders 
		    					 	WHERE Category = :category_select
		    					 		ORDER BY State, Order_ID';
		    $statement2 = $db->prepare($queryDataSet);
	 		$statement2->bindValue(':category_select', $category_select);
		    $statement2 ->execute();
		    $dataSet = $statement2->fetchAll();
		    $statement2->closeCursor();

		    return $dataSet;


           }


		


?>


	



