<style>
    .logo {
        position: absolute;
        top: 0;
        left: 20px;
        margin-top: -20px; 
        width: 180px; /* Adjust the width as needed */
        height: auto;  /* Maintain aspect ratio */
    }

    .navbar {
        background-color: #045174; /* Change to the desired background color */
        height: 65px;
        display: flex;
        justify-content: space-between; /* Align items horizontally */
        align-items: center; /* Align items vertically */
        padding: 0 20px; /* Add padding to the navbar */
    }

    .navbar-brand {
        margin-right: auto; /* Push the brand/logo to the left */
    }

    .nav-items {
        display: flex;
        justify-content: center;
        flex-grow: 1; /* Allow the items to grow and take up space */
         font-family: "Poppins", sans-serif;
    }

    .nav-items a {
        margin: 0 10px; /* Add space between the links */
        text-decoration: none;
        color: #f8dcbf;
    }

    .dropdown {
        position: absolute;
        top: 0;
        right: 80px;
        margin-top: 21px; /* Adjust the distance from the right edge */
        font-weight: bold;
    }

    .dropdown-menu {
        left: 50% !important;
        transform: translateX(-50%);
    }

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

<nav class="navbar">
    <div class="navbar-brand">
        <img src="logo.png" alt="Logo" class="logo">
    </div>
    <div class="nav-items">
        <a href="adminpage.php?page=home">Home</a>
        <a href="adminpage.php?page=users">Users</a>
        <a href="adminpage.php?page=courses">Course List</a>
        <a href="adminpage.php?page=subjects">Subject List</a>
        <a href="adminpage.php?page=faculty">Faculty List</a>
        <a href="adminpage.php?page=schedule">Schedule</a>
    </div>
    <div class="dropdown">
        <a href="#" class="text-white dropdown-toggle" id="account_settings" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user_name'] ?></a>
        <div class="dropdown-menu" aria-labelledby="account_settings">
            <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i
                    class="fa fa-cog"></i> Manage Account</a>
            <a class="dropdown-item" href="ajax.php?action=logout"><i
                    class="fa fa-power-off"></i> Logout</a>
        </div>
    </div>
</nav>

<script>
    $('#manage_my_account').click(function () {
        uni_modal("Manage Account", "manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
    })
    $('.nav_collapse').click(function(){
        console.log($(this).attr('href'))
        $($(this).attr('href')).collapse()
    })
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
