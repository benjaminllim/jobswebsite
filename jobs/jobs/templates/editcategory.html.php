<main class="sidebar">
	<section class="left">
		<ul>
			<li><a href="/jobs">Jobs</a></li>
			<li><a href="/categories">Categories</a></li>

		</ul>
	</section>

	<section class="right">

				<h2>Add/Edit Category</h2>

				<form action="" method="POST">

					<input type="hidden" name="id" value="<?=$category->id ?? ''?>" />
					<label>Name</label>
					<input type="text" id="name" name="category[name]" value="<?=$category->name ?? ''?>" />


					<input type="submit" name="submit" value="Save Category" />

				</form>




	</section>
</main>

