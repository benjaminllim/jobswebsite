<?php 
require '../LoadTemplate.php';
require '../Database.php';
require '../Functions.php';

$title = 'Jos Jobs - IT Jobs';

//$output = loadTemplate('../templates/home.html.php', []);
$output = require  '../templates/it.html.php';
require  '../templates/layout.html.php';



<select form="sortcategory" name="sortdrop"> 
<?php foreach($jobs as $job) {?>
    <option value="<?=$job->location?>"><?=$job->location?></option>
<?php } ?>      
</select>
<input type="submit" name="sortlocation" value="Sort"/>
</form>

<main class="sidebar">
<section class="left">
		<ul><?php foreach($categories as $category) {?>
		<li><a href="/category?id=<?=$category->id?>"><?=$category->name?></a></li>
		
		<?php } ?>

		</ul>
		
	</section>
	
<section class="right">

	<h1>IT Jobs</h1>


	<ul class="listing">
	<label for="sortby">Sort IT jobs by location</label>
		<form action="/category/sort" method="POST" name="sortform" id="sortcategory">
        	<select form="sort" name="sortdrop" style="width: 10%"> 
			
					<option value="Northampton">Location</option>     
			</select>
			
			<input type="submit" name="sortlocation" value="Sort" style="width: 10%"/>
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