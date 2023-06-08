<!-- 
Main base template for each page
Navigation bar will display certain things depending on user permissions or logged in
-->
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title><?=$title?></title>
		
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Office Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: Closed</p>
			</aside>
			<h1>Jo's Jobs</h1>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<?php if (!$loggedin): ?>
				<li>Jobs
					<ul>
					<?php foreach($categories as $category) {?>
						<li><a href="/categorynav?id=<?=$category->id; ?>"><?=$category->name?></a></li>
					<?php } ?>
					
					</ul>
				</li>	
			<?php endif; ?>
			<?php if ($loggedin): ?>
				<?php if ($user->haspermission(\Ijdb\Entity\User::EDIT_USERS_ACCESS) || $user->haspermission(\Ijdb\Entity\User::FULL_ADMIN_ACCESS)): ?>
					<li>Admin
				<?php else: ?>
					<li>User
				<?php endif; ?>	
				<ul>
					<li><a href="/jobs">View Jobs</a></li>	
					<li><a href="/archive/jobs">View archived jobs</a></li>
					<?php if ($user->haspermission(\Ijdb\Entity\User::VIEW_CATEGORIES)): ?>
						<li><a href="/categories">View Categories</a></li>
					<?php endif; ?>	
					<?php if ($user->haspermission(\Ijdb\Entity\User::ADD_CATEGORIES) || $user->haspermission(\Ijdb\Entity\User::EDIT_CATEGORIES)): ?>
						<li><a href="/category/edit">Add/Edit Category</a></li>	
					<?php endif; ?>		
					<?php if ($user->haspermission(\Ijdb\Entity\User::EDIT_USERS_ACCESS) || $user->haspermission(\Ijdb\Entity\User::FULL_ADMIN_ACCESS)): ?>
						<li><a href="/users/manage">Manage User Accounts</a></li>
					<?php endif; ?>					
				</ul>
			</li>	
			<?php endif; ?>
			<?php if ($loggedin): ?>
			<?php if ($user->haspermission(\Ijdb\Entity\User::VIEW_ENQUIRIES)): ?>
				<li><a href="/enquiries">Enquiries</a></li>
			
			<?php endif; ?>
			<?php else: ?>
				<li><a href="/enquiry/add">Enquiries</a></li>
			<?php endif; ?>
            <li><a href="/faq">FAQs</a></li>
			<li><a href="/about">About Us</a></li>
			<?php if ($loggedin): ?>
				<li><a href="/logout">Log out</a></li>
				<li><a href="">You are logged in as <?=$user->email?></a></li>
			<?php else: ?>
				<li><a href="/login">Log in</a></li>
				<li><a href="/register">Register</a></li>
			<?php endif; ?>
		</ul>

    </nav>
    <img src="/images/randombanner.php"/>
    
  <?=$output?>

  <footer>
		&copy; Jo's Jobs 2020
	</footer>
</body>
</html>
