<?php
// navbar.php

session_start();

if (isset($_SESSION['user_id'])) {
    // User is logged in
    $navbarLink = '<a href="useraccount.php">My Account</a>';
} else {
    // User is not logged in
    $navbarLink = '<a href="login.php" class="nav-link-end">Sign-up/Login</a>';
}
?>

<!--navigation bar-->
<nav id="nav-bar">
    <ul> 
        <li class="dropdown">
            <a class="dropdown-link" href="index.php">KittyComeHome</a>
            <ul class="dropdown-content">
                <li><a href="resources.html">Resources</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="faq.html">FAQ</a></li>
            </ul>
        </li>
        <?php echo $navbarLink; ?>
        <div class="vl"></div>
        <li><a href="favorites.html" class="nav-link">Favorites</a></li>
        <li><a href="listCat.html" class="nav-link">List a cat</a></li>
        <li><a href="adopt.html" class="nav-link">Adopt</a></li>
        <li><a href="foster.php" class="nav-link">Foster</a></li>
    </ul>
</nav>