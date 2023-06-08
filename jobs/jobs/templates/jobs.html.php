<main class="sidebar">
	<section class="left">
		<ul>
			<li><a href="/jobs">Jobs</a></li>
			<li><a href="/categories">Categories</a></li>

		</ul>
		</section>	

	<section class="right">

		<h2>Jobs</h2>
		<?php foreach($jobs as $job) { ?>
		<input type="hidden" name="id" value="<?=$job->categoryid?>" />
		<?php } ?>
		<?php if ($user->haspermission(\Ijdb\Entity\User::ADD_JOBS)): ?>
			<a class="new" href="/job/edit" style="float: center">Add new job</a>
		<?php endif;?>
		<label style="float: left">Sort jobs by category</label>
		<form action="/jobs/sort/category" method="POST" name="sortjobs" style="float: left">
        	<select name="category"> 
				<?php foreach($categories as $category) { ?>
					<option value="<?=$category->id?>"><?=$category->name?></option>     
					
				<?php } ?>
			</select>
			<input type="submit"  name="sortcategory" value="Sort" style="float: left"/>
		</form>
	
		<table>
		<thead>
		<tr>
		<th>Title</th>
		<th style="width: 15%">Salary</th>
		<th style="width: 15%">Closing Date</th>
		<th style="width: 15%">Category</th>
		<th style="width: 15%">Location</th>
		<?php if ($user->haspermission(\Ijdb\Entity\User::EDIT_JOBS) || $user->haspermission(\Ijdb\Entity\User::ADD_JOBS)): ?>
			<th style="width: 15%">Edit job</th>
		<?php endif;?>
		<th style="width: 15%">View Applicants for job</th>
		<th style="width: 15%">Archive</th>
		
		</tr>

	
		<?php foreach($jobs as $job) { ?>
			

			<tr>
			<td><?=$job->title?></td>
			<td><?=$job->salary?></td>
			<td><?=$job->closingdate?></td>
			<input type="hidden" name="id" value="<?=$job->categoryid?>" />
			<td><?=$job->getcategoryname()->name?></td>
			
			<td><?=$job->location?></td>
			<?php if ($user->haspermission(\Ijdb\Entity\User::EDIT_JOBS)): ?>
				<td><a style="float: right" href="/job/edit?id=<?=$job->id?>">Edit</a></td>
			<?php endif;?>
			<td><a style="float: right" href="/applicants?id=<?=$job->id?>">View applicants</a></td>
			<td><form method="POST" action="/job/archive">
  			<input type="checkbox" name="archive" value="archive" style="height: 20px" style="bottom: 0px">
			</form>
			<?php if ($user->haspermission(\Ijdb\Entity\User::EDIT_JOBS)): ?>
				<form method="post" action="/job/delete">
				<input type="hidden" name="id" value="<?=$job->id?>" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>
			<?php endif;?>
			</tr>
		<?php } ?>

		</thead>
		</table>

		

	

	</section>
</main>
