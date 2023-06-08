<!-- 
Checkboxes will be checked if the logged in user has the permissions
-->
<main class="home">
    <h2>Edit <?=$user->firstname?>'s permissions</h2>

	<form action="" method="POST">
       	
        <?php foreach ($permissions as $permissionname => $value): ?>
            <div>
                <input name="permissions[]" type="checkbox" value="<?=$value?>" <?php if ($user->haspermission($value)) echo 'checked'; ?> />
                <label><?=ucwords(strtolower(str_replace('_', ' ', $permissionname) ))?></label>
            </div>
        <?php endforeach; ?>
            
        <input type="submit" name="submituser" value="Submit" />

	</form>





</main>

