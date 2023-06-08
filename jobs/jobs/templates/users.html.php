<main class="home">

    <h2>All users</h2>
        
        <table>
            <thead>
            <tr>
            <th style="width: 10%">First Name</th>
            <th style="width: 10%">Last Name</th>
            <th style="width: 30%">E-mail</th>
            <?php if ($useredit->haspermission(\Ijdb\Entity\User::EDIT_USERS_ACCESS)): ?>
                <th style="width: 5%">Edit User</th>
            <?php endif;?>
            <?php if ($useredit->haspermission(\Ijdb\Entity\User::DELETE_USERS)): ?>
                <th style="width: 8%">Delete User</th>
            <?php endif;?>
        
            </tr>

	
		    <?php foreach($users as $user) { ?>
			

                <tr>
                <td><?=$user->firstname?></td>
                <td><?=$user->lastname?></td>
                <td><?=$user->email?></td>
                <?php if ($useredit->haspermission(\Ijdb\Entity\User::EDIT_USERS_ACCESS)): ?>
                    <td><a style="float: right" href="/user/edit?id=<?=$user->id?>">Edit</a></td>
                <?php endif;?>
                <td>
                <?php if ($useredit->haspermission(\Ijdb\Entity\User::DELETE_USERS)): ?>
                    <form method="post" action="/user/delete">
                        <input type="hidden" name="id" value="<?=$user->id?>" />
                        <input type="submit" name="submit" value="Delete" />
                    </form><?php endif;?>
                </td>
                </tr>
         <?php } ?>
        
            </thead>
        </table>
	
    
</main>