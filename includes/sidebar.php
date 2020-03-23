<!-- Sidebar  -->
<button class="btn float-right mr-1 d-block d-sm-none hamburger" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
<nav class="d-none d-sm-block col-12 col-sm-2" id="sidebar">
    <button class="btn float-right mr-1 d-block d-sm-none hamburger text-dark" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
    <div class="sidebar-header">
        <h4>Student Profile</h4>
    </div>

    <ul class="list-unstyled components">
        <li class="<?= ($nav_active == "index") ? "bg-primary active" : ""; ?>">
            <a href="/studentprofile/index.php">Add New Student</a>
        </li>

        <li class="<?= ($nav_active == "list") ? "bg-primary" : ""; ?>">
            <a href="/studentprofile/list.php">Student List</a>
        </li>
    </ul>  
</nav>
