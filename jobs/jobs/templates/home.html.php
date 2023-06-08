<main class="home">
	<p>Welcome to Jo's Jobs, we're a recruitment agency based in Northampton. We offer a range of different office jobs. Get in touch if you'd like to list a job with us.</a></p>

		<h2>Select the type of job you are looking for:</h2>
		<ul><?php foreach($categories as $category) {?>
					<li><a href="/categorynav?id=<?=$category->id; ?>"><?=$category->name?></a></li>
		<?php } ?>

				</ul>
		<h1>10 Jobs ending soonest</h1>
		<ul class="listing">
			<?php foreach($jobs as $job) {?>
				</li>
					<div class="details">
						<h4>Job Title:</h4><h2><?=$job->title?></h2>
						<h5>Salary:</h5><h3><?=$job->salary?></h3>
						<h5>Location:</h5><h3><?=$job->location?></h3>
						<h5>Closing date:</h5><h3><?=$job->closingdate?></h3>
					<div>
				</li>
			<?php } ?>
		</ul>
</main>

