<?php
    session_start(); // Start the session

    // Check if the SESSION_EMAIL variable is not set (user is not logged in)
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php"); // Redirect the user to the index.php page
        die(); // Terminate further script execution
    }

    include 'config.php'; // Include the config.php file which contains database connection details

    // Query the database to fetch user data based on the SESSION_EMAIL value
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    // Check if any rows are returned from the query
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query); // Fetch the first row from the result set
        
    }
?>

<!DOCTYPE php>
<!-- Group 3 | Project -->
<php lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>GrocerEase</title>

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/grocerease.css" />
    
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    
    <!-- Responsive Web Design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
  </head>

  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="logo-details">
        <img src="assets/images/favicon.png" alt="Logo" />
        <span class="logo_name">GrocerEase</span>
      </div>

      <ul class="nav-links">
        <!-- Dashboard -->
        <li>
          <a href="grocerease.php" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>

        <!-- Users -->
        <li>
          <a href="user-setting.php">
            <i class="bx bx-user"></i>
            <span class="links_name">Users</span>
          </a>
        </li>

        <!-- Product List -->
        <li>
          <a href="product-list.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Product List</span>
          </a>
        </li>

        <!-- Manage Product -->
        <li>
          <a href="manage.php">
            <i class="bx bx-receipt"></i>
            <span class="links_name">Manage Product</span>
          </a>
        </li>

        <!-- Soon to Expire -->
        <li>
          <a href="soon-to-expire.php">
            <i class="bx bx-purchase-tag"></i>
            <span class="links_name">Soon to Expire</span>
          </a>
        </li>

        <!-- Expired Product -->
        <li>
          <a href="expired-product.php">
            <i class="bx bxs-purchase-tag"></i>
            <span class="links_name">Expired Product</span>
          </a>
        </li>

        <!-- Help and Support -->
        <li>
          <a href="help-support.php">
            <i class="bx bx-phone"></i>
            <span class="links_name">Help and Support</span>
          </a>
        </li>

        <!-- Setting -->
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

    <!-- Home Section -->
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
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
      
      <!-- Home Content -->
      <div class="home-content">
        <!-- Overview -->
        <div class="overview-boxes">
          <!-- Total Products -->
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Product No.</div>
              <div class="number">616</div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>

          <!-- Total Sales -->
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Sales</div>
              <div class="number">₱38,876</div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>

          <!-- Total Profit -->
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Profit</div>
              <div class="number">₱12,876</div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>

          <!-- Total Loss -->
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Loss</div>
              <div class="number">₱1,086</div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>

        <!-- Expiring Soon Overview -->
        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Ongoing Sales!</div>
            <div class="sales-details">
              <ul class="details">
                <li class="topic">Product Name</li>
                <li><a href="#">Mango</a></li>
                <li><a href="#">Sardines</a></li>
                <li><a href="#">Milk</a></li>
                <li><a href="#">Ice cream</a></li>
                <li><a href="#">Chicken</a></li>
                <li><a href="#">Bread</a></li>
                <li><a href="#">Ham</a></li>
                <li><a href="#">Apple</a></li>
                <li><a href="#">Orange Juice</a></li>
              </ul>
              <ul class="details">
                <li class="topic">Product Category</li>
                <li><a href="#">Fruit</a></li>
                <li><a href="#">Canned Goods</a></li>
                <li><a href="#">Dairy</a></li>
                <li><a href="#">Frozen Foods</a></li>
                <li><a href="#">Meat and Poultry</a></li>
                <li><a href="#">Bakery</a></li>
                <li><a href="#">Frozen Foods</a></li>
                <li><a href="#">Fruits</a></li>
                <li><a href="#">Beverages</a></li>
              </ul>
              <ul class="details">
                <li class="topic">Promo</li>
                <li><a href="#">Buy1 Take1</a></li>
                <li><a href="#">Buy1 Take1</a></li>
                <li><a href="#">Buy1 Take1</a></li>
                <li><a href="#">50% Sale</a></li>
                <li><a href="#">50% Sale</a></li>
                <li><a href="#">50% Sale</a></li>
                <li><a href="#">20% Sale</a></li>
                <li><a href="#">20% Sale</a></li>
                <li><a href="#">5% Sale</a></li>
              </ul>
            </div>

            <!-- See All Button for Expiring Soon -->
            <div class="button">
              <a href="soon-to-expire.php">See All</a>
            </div>
          </div>

          <!-- Top Seling Product Today -->
          <div class="top-sales box">
            <div class="title">Today's Top Sales!</div>
              <div class="top-sales-details">
                <ul class="details">
                  <li class="topic">Product Name</li>
                  <li><a href="#">Rice</a></li>
                  <li><a href="#">Beef</a></li>
                  <li><a href="#">Pork</a></li>
                  <li><a href="#">Egg</a></li>
                  <li><a href="#">Banana</a></li>
                  <li><a href="#">Onion</a></li>
                  <li><a href="#">Garlic</a></li>
                  <li><a href="#">V-cut Orange</a></li>
                  <li><a href="#">Piattos Blue</a></li>
                </ul>
                <ul class="details">
                  <li class="topic">Product Category</li>
                  <li><a href="#">Grains</a></li>
                  <li><a href="#">Meat and Poultry</a></li>
                  <li><a href="#">Meat and Poultry</a></li>
                  <li><a href="#">Meat and Poultry</a></li>
                  <li><a href="#">Fruits</a></li>
                  <li><a href="#">Vegetables</a></li>
                  <li><a href="#">Vegetables</a></li>
                  <li><a href="#">Snacks and Chips</a></li>
                  <li><a href="#">Snacks and Chips</a></li>
                </ul>
                <ul class="details">
                  <li class="topic">Price</li>
                  <li><a href="#">₱1107</a></li>
                  <li><a href="#">₱678</a></li>
                  <li><a href="#">₱567</a></li>
                  <li><a href="#">₱456</a></li>
                  <li><a href="#">₱345</a></li>
                  <li><a href="#">₱234</a></li>
                  <li><a href="#">₱123</a></li>
                  <li><a href="#">₱110</a></li>
                  <li><a href="#">₱106</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- JAVASCRIPT -->
    <script src="https://kit.fontawesome.com/81d73e8e4d.js" crossorigin="anonymous"></script>
    <script src="assets/js/grocerease.js"></script>
    <script src="assets/js/settings.js"></script>
  </body>
</php>