<header class="navbar">
    <div class="container-fluid navbar-fixed-top bg-info">
        <div class="navbar-brand text-primary">
            BMcB
        </div>
        <a class="btn navbar-btn btn-primary" href="index.php">
            Home
        </a>
        <div class="navbar-right">
            <div class="navbar-text totalBooks text-primary">
                <p>Books: <?php echo (empty($_SESSION)) ? "0": $_SESSION["cart"]["totalBooks"];?></p>
            </div>
            <div class="navbar-text totalPrice text-primary">
                <p>£<?php echo (empty($_SESSION)) ? "0.00": $_SESSION["cart"]["totalPrice"];?></p>
            </div>
        </div>
        <a class="navbar-right" href="cartPage.php">
            <img src="images/trolley.svg" class="trolley"/>
        </a>
    </div>
</header>
