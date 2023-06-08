<main class="sidebar">
	<section class="left">
		<ul>
			<li><a href="/jobs">Jobs</a></li>
			<li><a href="/categories">Categories</a></li>

		</ul>
	</section>

	<section class="right">

				<h2>Add a new job</h2>

				<form id="addjob" action="/job/add" method="POST"></form>

					<input type="hidden" form="addjob" name="id" value="<?=$job->id ?? ''?>" />
					<label>Title</label>
					<input type="text" name="job[title]" form="addjob" value="<?=$job->title ?? ''?>" />
                    <label>Description</label>
					<textarea name="job[description]" form="addjob" value="<?=$job->description ?? ''?>" ></textarea>
                    <label>Salary</label>
					<input type="text" name="job[salary]" form="addjob" placeholder="£xxx - £xxx" value="<?=$job->salary ?? ''?>" />
                    <label>Closing date</label>
					<input type="date" name="job[closingdate]" form="addjob" value="<?=$job->closingdate ?? ''?>" />
                    <label>Category</label>
                    <select name="categories"> 
                        <?php foreach($categories as $category) { ?>
                            <option value="<?=$category->id?>"><?=$category->name?></option>  
                        <?php } ?>
                    </select>
                    <label>Location</label>
                    <input type="text" name="job[location]" form="addjob" value="<?=$job->location ?? ''?>" />

                    <input type="submit" name="submit" form="addjob" value="Add" />  
                    
                   
	        	
                <form action="/job/add" method="POST">




	</section>
</main>

