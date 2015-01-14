<?php
	require_once("config.shortcut.php");
?>
<div class="row-fluid">
	<div class="span12">
		<h3><?php
			if (isset($_GET["desc"]))
			{
				echo "Product Type: ".ucfirst($_GET["desc"]);
			}
		?></h3>
	</div>
	<div class="span2">
		<div class="row">
			<div class="span12"></div>
			<div class="span12"><h4>Filter</h4></div>
			<div class="span12" style="padding: 10px 0px 0px 0px;">
				<div class="span5">
					Per Page
				</div>
				<div class="span7">
					<select class="span12">
						<option>9</option>
						<option>12</option>
						<option>15</option>
						<option>30</option>
					</select>
				</div>
			</div>
			<div class="span12" style="padding: 10px 0px 0px 0px;">
				<div class="span5">
					Gender
				</div>
				<div class="span7">
					<select class="span12">
						<option>Female</option>
						<option>Male</option>
					</select>
				</div>
			</div>
			<div class="span12" style="padding: 10px 0px 0px 0px;">
				Prices
				<select class="span12">
					<option>Any</option>
					<option>0 - 9.99</option>
					<option>10 - 24.99</option>
					<option>25 - 49.99</option>
					<option>50 - 99.99</option>
					<option>100 - 250</option>
					<option>250+</option>
				</select>
			</div>
			<div class="span12" style="padding: 10px 0px 0px 0px;">
				Sort By
				<select class="span12">
					<option>Popular</option>
					<option>Cheapest</option>
					<option>Expensive</option>
				</select>
			</div>
			<div class="span12" style="text-align: right;padding: 10px 0px 0px 0px;">
				<button type="button" class="btn btn-primary" style="width: 90px;">Filter</button>
			</div>
		</div>
	</div>
	<div class="span9">
		<div id="searchResultsPanel"><?php
			require_once("search.results.php");
		?></div>
	</div>
</div>
<br />