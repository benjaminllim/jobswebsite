<main class="sidebar">
	<section class="left">
		<ul><?php foreach($categories as $category) {?>
		<li><a href="/category?id=<?=$category->id?>"><?=$category->name?></a></li>
		
			<?php } ?>

		</ul>
		
	</section>
	
	<section class="right">
	
	<h1><?=$categoryname->name?> Jobs</h1>
	
	<p>Sort jobs by location</p>
	<ul class="listing">
	
	
	
		
	<form action="/jobs/location/sort" method="POST" name="sortform" style="float: right">

		<select name="location" style="float: right"> 
		<?php foreach($locations as $location) { ?>
				<option value="<?=$location->location?>"><?=$location->location?></option>     
				
			<?php } ?>
		</select>
		
		<input type="submit" name="sortlocation" value="Sort Location"/>
	</form>
		
		<?php foreach($jobs as $job) {?>
	
		<li>
		<div class="details">
			<h2><?=$job->title?></h2>
			<h3><?=$job->salary?></h3>
			<h3><?=$job->location?></h3>
			<p><?=nl2br($job->description)?></p>

			<a class="more" href="/apply?id=<?=$job->id?>">Apply for this job</a>

		</div>
		</li>


		<?php } ?>
	</ul>


	</section>
</main>