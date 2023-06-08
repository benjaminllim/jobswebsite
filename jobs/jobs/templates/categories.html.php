<main class="sidebar">
	<section class="left">
		<ul>
			<li><a href="/jobs">Jobs</a></li>
			<li><a href="/categories">Categories</a></li>

		</ul>
	</section>

	<section class="right">

	<h2>Categories</h2>
		<?php if ($user->haspermission(\Ijdb\Entity\User::ADD_CATEGORIES)): ?>
			<a class="new" href="/category/edit">Add new category</a>
		<?php endif;?>
		<table>
		<thead>
		<tr>
		<th>Name</th>
		<?php if ($user->haspermission(\Ijdb\Entity\User::EDIT_CATEGORIES) || $user->haspermission(\Ijdb\Entity\User::ADD_CATEGORIES)): ?>
			<th style="width: 15%">Edit Category</th>
		<?php endif;?>
		<?php if ($user->haspermission(\Ijdb\Entity\User::DELETE_CATEGORIES)):?>
			<th style="width: 15%">Delete Category</th>
		<?php endif;?></td>
		</tr>
				<tr><?php foreach ($categories as $category) { ?>
				<td><?=$category->name?></td>
				<?php if ($user->haspermission(\Ijdb\Entity\User::EDIT_CATEGORIES)): ?>
					<td><a style="float: right" href="/category/edit?id=<?=$category->id?>">Edit</a></td>
				<?php endif;?>
				<?php if ($user->haspermission(\Ijdb\Entity\User::DELETE_CATEGORIES)):?>
					<td><form method="post" action="/category/delete">
					<input type="hidden" name="id" value="<?=$category->id?>" />
					<input type="submit" name="submit" value="Delete" />
				</form><?php endif;?></td>
				</tr>
			<?php } ?>

		</thead>
		</table>

		

	

	</section>
</main>