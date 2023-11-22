<?php

// navbar.php

if (isset($_SESSION['user_id'])) {
    // User is logged in
    $navbarLink = '<a href="useraccount.php" class="nav-link-end">My Account</a>';
} else {
    // User is not logged in
    $navbarLink = '<a href="login-pg.php" class="nav-link-end">Sign-up/Login</a>';
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!--navigation bar-->
<nav id="nav-bar">
    <ul> 
        <li class="dropdown">
            <a class="dropdown-link" href="index.php">KittyComeHome</a>
            <ul class="dropdown-content">
                <li><a href="resources.php">Resources</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="faq.php">FAQ</a></li>
            </ul>
        </li>
        <?php echo $navbarLink; ?>
        <div class="vl"></div>
        <li><a href="favorites.php" class="nav-link">Favorites</a></li>
        <li><a href="listCat.php" class="nav-link">List a cat</a></li>
        <li><a href="adopt.php" class="nav-link">Adopt</a></li>
        <li><a href="foster.php" class="nav-link">Foster</a></li>
    </ul>
</nav>