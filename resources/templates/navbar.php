<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        
        <a class="navbar-brand" href="index.php">Generic Band Website</a>

        <button 
            class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a> </li>
                <li class="nav-item"><a class="nav-link" href="shop.php#merch">Merch</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php#tickets">Tickets</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">    
                    <a
                        class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" title="account"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        >
                        <img src="images/icons/account.png" class="d-inline-block align-text-center icon icon-med" alt="Account">
                        <?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ""; ?>
                    </a>
        
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><span class="dropdown-item-text text-muted">Account</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <?php
                            if ($_SESSION["loggedin"]) {
                                echo <<< HTML
                                <li><a class="dropdown-item active" href="profile.php#my-profile">Profile</a></li>
                                <li><a class="dropdown-item" href="profile.php#my-orders">My Orders</a></li>
                                <li><a class="dropdown-item" href="profile.php#my-tickets#">My Tickets</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                HTML;
                            } else {
                                echo <<< HTML
                                <li><a href="login.php" class="dropdown-item" role="button">Log in</a></li>
                                <li><a href="signup.php" class="dropdown-item" role="button">Sign up</a></li>
                                HTML;
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>


    </div>
</nav>

<script>
    $(document).ready(function() {
        $('a.active').removeClass('active');
        $('a[href="' + location.pathname + '"]').closest('a').addClass('active'); 
    });
</script>

