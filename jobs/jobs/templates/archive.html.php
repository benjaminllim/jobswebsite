<main class="sidebar">
	<section class="left">
		<ul>
			<li><a href="/jobs">Jobs</a></li>
			<li><a href="/categories">Categories</a></li>

		</ul>
		</section>	

	<section class="right">

		<h2>Archived Jobs</h2>
	
		<table>
		<thead>
		<tr>
		<th>Title</th>
		<th style="width: 15%">Salary</th>
		<th style="width: 5%">&nbsp;</th>
		<th style="width: 15%">Category</th>
		<th style="width: 15%">Location</th>
		<th style="width: 5%">&nbsp;</th>
		</tr>

	
		<?php foreach($archives as $archive) { ?>
			

			<tr>
			<td><?=$archive->title?></td>
			<td><?=$archive->salary?></td>
			<td><?=$archive->closingdate?></td>
			<input type="hidden" name="id" value="<?=$archive->categoryid?>" />
			<td><?=$archive->categoryid?></td>
			<td><?=$archive->location?></td>
			<td><a style="float: right" href="/editjob?id=<?=$archive->id?>">Edit</a></td>
			<td><a style="float: right" href="/applicants?id=<?=$archive->id?>">View applicants</a></td>
			<td><form method="post" action="/job/delete">
			<input type="hidden" name="id" value="<?=$archive->id?>" />
			<input type="submit" name="submit" value="Delete" />
			</form></td>
			</tr>
		<?php } ?>

		</thead>
		</table>

	

	

	</section>
</main>
