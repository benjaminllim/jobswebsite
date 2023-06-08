<main class="sidebar">

    <section class="left">
		<ul><?php foreach($categories as $category) {?>
		<li><a href="/category?id=<?=$category->id?>"><?=$category->name?></a></li>
		
		<?php } ?>

		</ul>
    </section>
    <section class="right"> 
        
        <h2>Jobs by Location</h2>
        
        <table>
		<thead>
		<tr>
		<th style="width: 30%">Title</th>
		<th style="width: 30%">Salary</th>
		<th style="width: 30%">Location</th>
	
		</tr>

	
		<?php foreach($jobs as $job) { ?>
			

			<tr>
			<td><?=$job->title?></td>
			<td><?=$job->salary?></td>
			<td><?=$job->location?></td>
		
			</tr>
        <?php } ?>
        
        </thead>
        </table>
	
    </section>
</main>

	


