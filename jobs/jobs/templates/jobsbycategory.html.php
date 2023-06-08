<main class="sidebar">
	<section class="left">
		<ul>
			<li><a href="/jobs">Jobs</a></li>
			<li><a href="/categories">Categories</a></li>

		</ul>
	</section>

	<section class="right">

    <h2>Sorted jobs by selected category</h2>
    
    <table>
		<thead>
		<tr>
		<th>Title</th>
		<th style="width: 15%">Salary</th>
		<th style="width: 15%">Closing Date</th>
		<th style="width: 15%">Category</th>
		<th style="width: 15%">Location</th>
		</tr>

	
		<?php foreach($jobs as $job) { ?>
			

			<tr>
			<td><?=$job->title?></td>
			<td><?=$job->salary?></td>
			<td><?=$job->closingdate?></td>
			<td><?=$job->categoryid?></td>
			<td><?=$job->location?></td>
			
			</tr>
		<?php } ?>

		</thead>
    </table>

		

	

	</section>
</main>