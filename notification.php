<!DOCTYPE php>
<!-- Group 3 | Project -->
<php lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>GrocerEase</title>
    <link rel="stylesheet" href="assets/css/grocerease.css">
    <link rel="stylesheet" href="assets/css/notification.css">
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="assets/images/favicon.png" alt="Logo" />
            <span class="logo_name">GrocerEase</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="grocerease.php">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="user-setting.php  ">
                    <i class="bx bx-user"></i>
                    <span class="links_name">Users</span>
                </a>
            </li>
            <li>
                <a href="product-list.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Product List</span>
                </a>
            </li>
            <li>
                <a href="manage.php">
                    <i class="bx bx-receipt"></i>
                    <span class="links_name">Manage Product</span>
                </a>
            </li>
            <li>
                <a href="soon-to-expire.php">
                    <i class="bx bx-purchase-tag"></i>
                    <span class="links_name">Soon to Expire</span>
                </a>
            </li>
            <li>
                <a href="expired-product.php">
                <i class="bx bxs-purchase-tag"></i>
                <span class="links_name">Expired Product</span>
                </a>
            </li>
            <li>
                <a href="help-support.php">
                    <i class="bx bx-phone"></i>
                    <span class="links_name">Help and Support</span>
                </a>
            </li>
            <li>
                <a href="settings.php">
                    <i class="bx bx-cog"></i>
                    <span class="links_name">Settings</span>
                </a>
            </li>
            <!-- Log out -->
            <li class="log_out">
                <a href="#">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Logout Confirmation Popup -->
    <div id="logout-popup" class="popup">
        <div class="popup-content">
            <h3>Logout Confirmation</h3>
            <p>Are you sure you want to logout?</p>
            <div class="popup-buttons">
            <a href='logout.php'>Yes</a>
            <button id="cancel-logout">No</button>
            </div>
        </div>
    </div>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Notifications</span>
            </div>

            <div class="search-box">
                <input type="text" placeholder="Search..." />
                <i class="bx bx-search searchBoxButton"></i>
                <i class='bx bx-x cancelBoxButton'></i>
            </div>

            <!-- Notifications -->
            <div class="three-box">
                <div class="notifications">
                    <div class="notification-icon">
                        <i class="bx bx-bell"></i>
                    </div>
                </div>

                <!-- Dark/Light Mode Toggle -->
                <div id="dark-mode-icon" title="Toggle Dark/Light Mode">
                    <i class="fa-solid fa-moon"></i>
                </div>

                <!-- User-Profile -->
                <div class="profile-details">
                    <img id="user-profile-icon" src="assets/images/default-icon.png" alt="User Profile Icon">
                    <div class="names">
                    <span id="user-name" class="user_name"><?php echo $row['name']; ?></span>
                    <span class="admin_name">Admin</span>
                    </div>
                </div>
            </div>
        </nav>

        <div class="home-content">
            <div class="notification-card">
                <h2 class="notification-title">Earlier</h2>
                <div class="table-container">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="notification-container">
                    <button type="button" class="notification-button" id="deleteAllButton">
                            Delete All Notifications</i>
                        </button>
                </div>
            </div>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/81d73e8e4d.js" crossorigin="anonymous"></script>
    <script src="assets/js/grocerease.js"></script>
    <script type="module" src="assets/js/notification.mjs"></script>
    <script src="assets/js/settings.js"></script>
</body>

</php>