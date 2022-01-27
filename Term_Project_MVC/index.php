 <?php 
 
	include ('View/Header.php');
	require('database.php');


	//segments  dropdown default value
			$segment_select = filter_input(INPUT_GET, 'segment_select'); 
				if($segment_select == NULL || $segment_select == FALSE) {

					$segment_select  = 'Home Office';
			}
	//categories drowndown default value 
			$category_select = filter_input(INPUT_GET, 'category_select'); 
				if ($category_select == NULL || $category_select == FALSE ) {
					$category_select = 'Furniture';

				}	

	//states dropdown default value 
			$state_select = filter_input(INPUT_GET, 'state_select'); 
				if ($state_select == NULL || $state_select == FALSE) {
					$state_select = 'Alabama';
				}
				
	require('Model/model.php');

	
if ($category_select == 'All' && $segment_select == 'All' && $state_select == 'All') {

	$dataSet = allDataSet();

} elseif ($category_select == 'All' && $segment_select != 'All' && $state_select != 'All') {

	$dataSet = allCategoryDataSet($segment_select,$state_select);

} elseif ($category_select != 'All' && $segment_select == 'All' && $state_select != 'All') {

	$dataSet = allSegemntDataSet($category_select, $state_select);

} elseif ($category_select != 'All' && $segment_select != 'All' && $state_select == 'All') {

	$dataSet = allStateDataSet($category_select, $segment_select);

} elseif ($category_select == 'All' && $segment_select == 'All' && $state_select != 'All') {

	$dataSet = allCategorySegmentDataSet($state_select);

} elseif ($category_select == 'All' && $segment_select != 'All' && $state_select == 'All') {

	$dataSet = allCategoryStateDataSet($segment_select);

} elseif ($category_select != 'All' && $segment_select == 'All' && $state_select == 'All') {

	$dataSet = allSegmentStateDataSet($category_select);

} else {

	$dataSet = selectedDataSet($category_select, $segment_select, $state_select);

}	


	include('View/View.php');


?> 