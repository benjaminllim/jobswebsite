<main class="home">

    <h2>Enquiries</h2>
        
        <table>
            <thead>
            <tr>
            <th style="width: 10%">First Name</th>
            <th style="width: 10%">Last Name</th>
            <th style="width: 10%">E-mail</th>
            <th style="width: 10%">Telephone number</th>
            <th style="width: 15%">View Details</th>
            <th style="width: 15%">Complete?</th>
            <?php if ($user->haspermission(\Ijdb\Entity\User::DELETE_ENQUIRIES)): ?>
                <th style="width: 8%">Delete Enquiry</th>
            <?php endif;?>
        
            </tr>

	
		    <?php foreach($enquiries as $enquiry) { ?>
			

                <tr>
                <td><?=$enquiry->firstname?></td>
                <td><?=$enquiry->lastname?></td>
                <td><?=$enquiry->email?></td>
                <td><?=$enquiry->telephone?></td>
                <td><a href="/enquiry/details?id=<?=$enquiry->id?>">View details</a></td>
                <form method="POST" action="/enquiry/complete">
                    <td><input type="checkbox" name="complete" value="enquirycomplete" style="height: 20px" style="bottom: 0px"></td>
			    </form>
                <?php if ($user->haspermission(\Ijdb\Entity\User::DELETE_ENQUIRIES)): ?>
                    <form method="post" action="/enquiry/delete">
                        <input type="hidden" name="id" value="<?=$enquiry->id?>" />
                        <td><input type="submit" name="submit" value="Delete" /></td>
                    </form><?php endif;?>
                </td>
                </tr>
         <?php } ?>
        
            </thead>
        </table>
	
    
</main>