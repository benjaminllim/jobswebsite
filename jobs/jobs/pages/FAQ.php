<main class="sidebar">
<section class="left">
		<ul><?php foreach($categories as $category) {?>
		<li><a href="/category?id=<?=$category['id'];?>"><?=$category['name'];?></a></li>
		<?php } ?>

		</ul>
	</section>

	<section class="right">

	<h1>Human Resources Jobs</h1>

	<ul class="listing"><?php foreach($jobs as $job) {?>
	
	<li>
	<div class="details">
	<h2><?=$job['title'];?></h2>
	<h3><?=$job['salary'];?></h3>
	<p><?=nl2br($job['description']);?></p>

	<a class="more" href="/apply?id=<?=$job['id'];?>">Apply for this job</a>

	</div>
	</li>


<?php } ?>

</ul>

</section>
</main>