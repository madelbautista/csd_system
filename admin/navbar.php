
<style>
nav#sidebar {
    background-color: #200E3A;
}

.sidebar-list {
    background-color: #200E3A; /* Set the background color for the entire sidebar-list with transparency */
}

.sidebar-list a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: white; 
    background-color: #200E3A;
    border-bottom: 1px solid #ccc;
}


.sidebar-list a:hover {
    background-color: #555;
}

.icon-field {
    margin-right: 10px;
}

.active {
    background-color: black;
}



</style>

<nav id="sidebar" class='mx-lt-5' >
		
		<div class="sidebar-list">
				<a href="adminpage.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="adminpage.php?page=courses" class="nav-item nav-courses"><span class='icon-field'><i class="fa fa-list"></i></span> Course List</a>
				<a href="adminpage.php?page=subjects" class="nav-item nav-subjects"><span class='icon-field'><i class="fa fa-book"></i></span> Subject List</a>
				<a href="adminpage.php?page=faculty" class="nav-item nav-faculty"><span class='icon-field'><i class="fa fa-user-tie"></i></span> Faculty List</a>
				<a href="adminpage.php?page=schedule" class="nav-item nav-schedule"><span class='icon-field'><i class="fa fa-calendar-day"></i></span> Schedule</a>
				<?php if($_SESSION['user_id'] == 1): ?>
				<a href="adminpage.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
