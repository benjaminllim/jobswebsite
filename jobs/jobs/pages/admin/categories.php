<h2>Categories</h2>
<?php foreach($categories as $category) { ?>
<blockquote>
<p>
	<?=$category['name']?> 
	<a href="/category/edit?id=<?=$category->id?>">edit</a>

	<form action="/category/delete" method="POST">
		<input type="hidden" name="id" value="<?=$category->id?>" />
		<input type="submit" value="Delete" />
	</form>

</p>
</blockquote>
<?php } ?>





<?php if ($loggedin): ?>
			<li>Categories
			<ul>
				<li><a href="/categories"></a>All Categories</li>
				<li><a href="/categories"></a>Add Category</li>					
				</ul>
			</li>	
			<?php endif; ?>