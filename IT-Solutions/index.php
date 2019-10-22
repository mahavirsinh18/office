<?php

if(isset($_REQUEST['q']) && $_REQUEST['q'])
{
	//print_r($_REQUEST['q']);
	

	/*print "<pre>";
	print_r($data);*/

	$offset = 0;
	$limit = 100;
	$total = 115;

	$start = $prev = $next = "";
	if(isset($arr['result']['_links']['start']))
		$start = $domain.$arr['result']['_links']['start'];
	if(isset($arr['result']['_links']['prev']))
		$prev = $domain.$arr['result']['_links']['prev'];
	if(isset($arr['result']['_links']['next']))
		$next = $domain.$arr['result']['_links']['next'];

	if(isset($_REQUEST['offset']) && $_REQUEST['offset'] != ""){
		$offset = $_REQUEST['offset'];
	}

	if($limit>$total)
		$start = "";

	// $offset = $offset + $limit;

	/*print_r($offset);
	print_r($limit); die();*/
	$data = file_get_contents('https://data.gov.sg/api/action/datastore_search?resource_id=bdb377b8-096f-4f86-9c4f-85bad80ef93c&offset='.$offset.'&limit='.$limit.'&q='.urlencode($_REQUEST['q']));

	if($offset>$total)
		$next = "";

	if($data)
	{
		$arr = json_decode($data,true);
		$data = $arr['result']['records'];
		/*print_r($arr);
		die();*/
	}
	else
	{

	}

	?> 
	<?php
		$first_array = array();
		$second_array = array();
		
		foreach($data as $row){

			if($row['entity_name'] == $_REQUEST['q']){
				$first_array[] = $row;
	  		}
	  		else
	  		{
	  			$second_array[] = $row;
	  		}
		} 
	// print_r($first_array); 
	// echo "<br>";
	// print_r($second_array); die();
	?>

	<?php
		if($first_array)
		{
	?>
	<table class="table table-bordered">
		<h3>Exact match</h3>
		<thead>
			<tr>
				<th>Entity Name</th>
				<th>UEN Number</th>
				<th>Entity Type</th>
				<th>Issue Date</th>
				<th>UEN Status</th>
				<th>Street Name</th>
				<th>Postal Code</th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach($first_array as $row)
			{
			 ?>
				<tr>
					<td><?php echo $row['entity_name']; ?></td>
					<td><?php echo $row['uen']; ?></td>
					<td><?php echo $row['entity_type']; ?></td>
					<td><?php echo $row['uen_issue_date']; ?></td>
					<td><?php echo $row['uen_status']; ?></td>
					<td><?php echo $row['reg_street_name']; ?></td>
					<td><?php echo $row['reg_postal_code']; ?></td>
				</tr>
			<?php 
			} 
			?></tbody></table>
		<?php	
		}

		if($second_array)
		{
	?>
	<table class="table table-bordered">
		<h3>Similar match</h3>
		<thead>
			<tr>
				<th>Entity Name</th>
				<th>UEN Number</th>
				<th>Entity Type</th>
				<th>Issue Date</th>
				<th>UEN Status</th>
				<th>Street Name</th>
				<th>Postal Code</th>
			</tr>
		</thead>
		<?php
			foreach($second_array as $row)
			{
			 ?>
				<tbody>
					<tr>
						<td><?php echo $row['entity_name']; ?></td>
						<td><?php echo $row['uen']; ?></td>
						<td><?php echo $row['entity_type']; ?></td>
						<td><?php echo $row['uen_issue_date']; ?></td>
						<td><?php echo $row['uen_status']; ?></td>
						<td><?php echo $row['reg_street_name']; ?></td>
						<td><?php echo $row['reg_postal_code']; ?></td>
					</tr>
				</tbody>
			<?php 
			} 
			?></table>
			<a class="pagination-link btn btn-outline-info" href="javascript:void(0)" data-offset="<?php echo $offset - 100; ?>">Previous</a>
			<a class="pagination-link btn btn-outline-info" href="javascript:void(0)" data-offset="<?php echo $offset + $limit; ?>">Next</a>
		<?php	
		}

	die;		 
}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<form class="form-horizontal" action="" method="">
		<div class="form-group">
			<br>
			<input type="hidden" name="offset" id="offset" value="0">
			<input type="text" name="search" class="form-control search w-25">
		</div>
		<button type="button" class="btn btn-outline-info" name="searchbtn" id="searchbtn">Search</button>
	</form>
	<br><br>
	<div id="results"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$('body').on('click','#searchbtn',function(e){
		var search=$('.search').val();
		q=search;
		$.ajax({
			url: 'index.php',
			data: {q:search,offset:0},
			method: "POST",
			success: function(data){
				// $('#results').html('');
				$('#results').html(data);
		  	}
		});
	});

	$('body').on('click','.pagination-link',function(e){
		var search=$('.search').val();
		offset=$(this).attr('data-offset');
		q=search;
		$.ajax({
			url: 'index.php',
			data: {q:search,offset:offset},
			method: "POST",
			success: function(data){
				// $('#results').html('');
				$('#results').html(data);
		  	}
		});
	});
</script>

</body>
</html>