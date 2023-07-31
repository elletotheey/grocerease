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
?>

<!DOCTYPE php>
<php lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <title>GrocerEase</title>

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/grocerease.css" />

    <!-- Product List CSS -->
    <link rel="stylesheet" href="assets/css/product-list.css">
    
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />

    <script src="https://kit.fontawesome.com/f12c21ab53.js" crossorigin="anonymous"></script>
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
          <a href="grocerease.php">
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
          <a href="product-list.php" class="active">
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
          <span class="dashboard">Products</span> 
        </div>

        <div class="relative h-50 max-w-650 w-full my-20 m-10 ">
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

      <!-- Home Content -->
      <div class="table-container-1"> 
        <h1 class="title-1">Product List</h1>
        <table>
          <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Product Amount</th>
                <th>Product Price</th>
                <th>Manufacturer</th>
                <th>Manufactured Date</th>
                <th>Expiration Date</th>
                <th>Actions</th>
            </tr>
          </thead>
          <tbody>
              <?php 
                $queryTwo = "SELECT * FROM manage_product WHERE expiDate >= DATE_ADD(CURDATE(), INTERVAL 2 WEEK)";

                if(isset($_GET['search'])) {
                  $search = $_GET['search'];

                  $queryTwo = "SELECT * FROM manage_product WHERE (prodID LIKE '%$search%' OR prodName LIKE '%$search%' OR prodCate LIKE '%$search%') AND expiDate >= DATE_ADD(CURDATE(), INTERVAL 2 WEEK)";
                }

                if ($result = mysqli_query($conn, $queryTwo)) {
                  if (mysqli_num_rows($result) > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                        <td><?php echo $row['prodID']; ?></td>
                        <td><?php echo $row['prodName']; ?></td>
                        <td><?php echo $row['prodCate']; ?></td>
                        <td><?php echo $row['prodQuan']; ?></td>
                        <td>₱<?php echo $row['prodPrice']; ?></td>
                        <td><?php echo $row['manufact']; ?></td>
                        <td><?php echo $row['manuDate']; ?></td>
                        <td><?php echo $row['expiDate']; ?></td>
                        <td>
                          <div class="action-buttons">
                            <a href='product-list-edit.php?id=<?php echo $row['prodID']; ?>'  class='fa-solid fa-pen-to-square fs-5 me-3'></a>
                            <a href='product-list-delete.php?id=<?php echo $row['prodID']; ?>' class="delete-btn"><i class='fas fa-trash-alt fs-5'></i></a>
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

    <!-- JAVASCRIPT -->
    <script src="https://kit.fontawesome.com/81d73e8e4d.js" crossorigin="anonymous"></script>
    <script src="assets/js/grocerease.js"></script>
    <script src="assets/js/settings.js"></script>
  </body>
</php>