<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    }

    // Set an empty array for selected promos if it's not set
    if (!isset($_SESSION['selectedPromos'])) {
        $_SESSION['selectedPromos'] = [];
    }

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['prodPromo'])) {
        // Store the selected value in a session variable
        $_SESSION['selectedPromos'][$_POST['prodID']] = $_POST['prodPromo'];

        // Update the database with the selected promo for the specific product
        $selectedValue = mysqli_real_escape_string($conn, $_POST['prodPromo']);
        $prodID = mysqli_real_escape_string($conn, $_POST['prodID']);

        $updateQuery = "UPDATE manage_product SET prodPromo='$selectedValue' WHERE prodID='$prodID'";
        mysqli_query($conn, $updateQuery);
    }

?>

<!DOCTYPE php>
<!-- Group 3 | Project -->
<php lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <title>GrocerEase</title>
    <link rel="stylesheet" href="assets/css/grocerease.css" />
    <link rel="stylesheet" href="assets/css/product-list.css">
    <!-- Boxicons CDN Link -->
    <link
    href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
    rel="stylesheet"
    />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

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
            <a href="soon-to-expire.php" class="active">
                <i class="bx bx-purchase-tag"></i>
                <span class="links_name">Soon to Expire</span>
            </a>
            </li>
            <li>
            <a href="expired-product.php" >
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
                <span class="dashboard">Soon to Expire</span>    
            </div>
            
          
            <!-- Search bar -->
            <div class="relative h-50 max-w-650 w-[800]">
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="search" name="search" class="block w-full p-3 pl-3.5 text-xl text-gray-900 border border-gray-300 rounded-lg bg-[#f5f6fa] outline-none" placeholder="Search..." required>
                <button type="submit" class="text-white absolute bg-blue-700 top-1 right-1 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-3 "><i class="bx bx-search text-white text-2xl"></i></button>
            </form>
            </div>
  
            <!-- Notifications -->
            <div class="three-box">
                <div class="notifications">
                    <div class="notification-icon">
                        <i class="bx bx-bell"></i>
                        <span class="notification-count">3</span>
                        <div class="notification-dropdown">
                            <ul class="notification-list">
                                <li>
                                    <span class="notification-title">Expiring Soon</span>
                                    <span class="notification-time">10 mins ago</span>
                                </li>
                                <li>
                                    <span class="notification-title">New Expired Product</span>
                                    <span class="notification-time">1 hr ago</span>
                                </li>
                                <li>
                                    <span class="notification-title">New Product Added</span>
                                    <span class="notification-time">1 day ago</span>
                                </li>
                            </ul>
                            <a href="notification.php">
                                <button class="check-notifications">Check all Notifications</button>
                            </a>
                        </div>
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

        <div class="table-container-1">
            <h1 class="title-1">Soon To Expire List</h1>
            <table>
                    <thead>
                        <tr>
                            <th>Product<br>ID</th>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Product Price</th>
                            <th>Amount</th>
                            <th>Manufacturer</th>
                            <th>Manufactured<br>Date</th>
                            <th>Expiration Date</th>
                            <th>Select Promo</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $queryTwo = "SELECT * FROM manage_product WHERE expiDate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 2 WEEK)";
                            $resultTwo = mysqli_query($conn, $queryTwo);
                            
                            if(isset($_GET['search'])) {
                                $search = $_GET['search'];
              
                                $queryTwo = "SELECT * FROM manage_product WHERE (prodID LIKE '%$search%' OR prodName LIKE '%$search%' OR prodCate LIKE '%$search%') AND expiDate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 2 WEEK)";
                            }

                            if ($result = mysqli_query($conn, $queryTwo)) {
                                if (mysqli_num_rows($result) > 0) {
                                    $count = 1;
                                    while ($rowTwo = mysqli_fetch_assoc($result)) { 
                                        $prodID = $rowTwo['prodID'];
                                        $selectedValue = isset($_SESSION['selectedPromos'][$prodID]) ? $_SESSION['selectedPromos'][$prodID] : "";
                                        ?> 
                                        <tr>
                                            <td><?php echo $rowTwo['prodID']; ?></td>
                                            <td><?php echo $rowTwo['prodName']; ?></td>
                                            <td><?php echo $rowTwo['prodCate']; ?></td>
                                            <td><?php echo $rowTwo['prodQuan']; ?></td>
                                            <td data-price="<?php echo $rowTwo['prodPrice']; ?>">₱<?php echo $rowTwo['prodPrice']; ?></td>
                                            <td><?php echo $rowTwo['manufact']; ?></td>
                                            <td><?php echo $rowTwo['manuDate']; ?></td>
                                            <td><?php echo $rowTwo['expiDate']; ?></td>
                                            <td class="box">
                                                <select name="prodPromo" class="rounded p-2 bg-[#695cfe]" onchange="updatePrice(this)">
                                                    <option value="" disabled <?php echo ($selectedValue == "") ? "selected" : ""; ?>>Select Promo</option>
                                                    <option value="Buy 1 Take 1" <?php echo ($selectedValue == "Buy 1 Take 1") ? "selected" : ""; ?>>Buy 1 Take 1</option>
                                                    <option value="50%" <?php echo ($selectedValue == "50%") ? "selected" : ""; ?>>50% Sale</option>
                                                    <option value="20%" <?php echo ($selectedValue == "20%") ? "selected" : ""; ?>>20% Sale</option>
                                                    <option value="5%" <?php echo ($selectedValue == "5%") ? "selected" : ""; ?>>5% Sale</option>
                                                </select>
                                                <input type="hidden" class="prodID" value="<?php echo $rowTwo['prodID']; ?>">
                                            </td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href='soon-to-expire-delete.php?id=<?php echo $row['prodID']; ?>' class="delete-btn"><i class='fas fa-trash-alt fs-5'></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="9">** No records were found **</td>
                                    </tr>
                                <?php
                                }
                                # Free result set
                                mysqli_free_result($result);
                            } else {
                                echo "Error executing the query: " . mysqli_error($conn);
                            }
                    
                            # Close connection
                            mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/81d73e8e4d.js" crossorigin="anonymous"></script>
    <script src="assets/js/grocerease.js"></script>
    <script src="assets/js/promo_update.js"></script>
    <script type="module" src="assets/js/expired-product.mjs"></script>
    <script src="assets/js/settings.js"></script>
</body>
</php>