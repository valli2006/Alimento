// <?php
// session_start();
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
//     header("location: user_login.php");
//     exit;
// }
// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
//     $login_status = true;
// }
// include 'partials/_dbconnect.php';
// $uid = $_SESSION['user_id'];
// $feedback = false;


// if ($_SERVER["REQUEST_METHOD"] === "POST") {

//     $r_id = $_POST['r_id'];
//     $order_id = $_POST['order_id'];
//     $rating = $_POST['rating'];

//     $sql = "UPDATE `orders` SET `rating` = '$rating' WHERE `r_id` = '$r_id' AND `order_id` = '$order_id'";
//     $result = mysqli_query($conn, $sql);

//     $sql = "SELECT * FROM `orders` WHERE `r_id` = '$r_id' AND `rating` != '0'";
//     $result = mysqli_query($conn, $sql);
//     $num = mysqli_num_rows($result);

//     $sql = "SELECT SUM(rating) AS 'sum_value' FROM `orders` WHERE `r_id` = '$r_id' AND `rating` != '0'";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_assoc($result);
//     $sum = $row['sum_value'];

//     $new_rating = $sum / $num;

//     $sql = "UPDATE `restaurant` SET `r_rating` = '$new_rating' WHERE `r_id` = '$r_id'";
//     $result = mysqli_query($conn, $sql);
// }

// // Fetch orders
// $sql = "SELECT * FROM `orders` WHERE `user_id` = '$uid'";
// $result = mysqli_query($conn, $sql);
// $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

// ?>

// <!DOCTYPE html>
// <html lang="en">

// <head>
//     <meta charset="UTF-8" />
//     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
//     <!-- <link rel="stylesheet" href="main.css"> -->
//     <!-- Google fonts -->
//     <link rel="preconnect" href="https://fonts.googleapis.com" />
//     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
//     <link
//         href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
//         rel="stylesheet" />
//     <!-- Bootstrap icons  -->
//     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
//     <!-- <link rel="stylesheet" href="main.css"> -->
//     <link rel="stylesheet" href="output.css">
//     <!-- <link rel="stylesheet" href="new_track_order.css"> -->
//     <title>Order Information</title>

// </head>

// <body class="bg-[#F0EAEA]">
//     <div class="gtranslate_wrapper"></div>
//     <script>window.gtranslateSettings = { "default_language": "en", "detect_browser_language": true, "wrapper_selector": ".gtranslate_wrapper" }</script>
//     <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

//     <nav
//         class="hidden  lg:flex sm:max-w-xl md:max-w-2xl lg:max-w-5xl xl:max-w-7xl w-full items-center justify-between max-w-7xl mx-auto font-poppins py-4">
//         <a href="index.php"><img src="./images/logo/logo.webp" alt="logo" class="w-36"></a>
//         <div class="flex sm:gap-1 md:gap-2">
//             <a href="home.php"
//                 class="hover:bg-gray-200 transition-all ease-in-out duration-100 active:bg-gray-300 focus:bg-gray-300 rounded-full hover:text-black py-2 px-4">Restaurants</a>
//             <a href="new_track_order.php"
//                 class="hover:bg-gray-200 transition-all ease-in-out duration-100 active:bg-gray-300 focus:bg-gray-300 rounded-full hover:text-black py-2 px-4">Orders</a>
//             <a href="#"
//                 class="hover:bg-gray-200 transition-all ease-in-out duration-100 active:bg-gray-300 focus:bg-gray-300 rounded-full hover:text-black py-2 px-4">Contact</a>
//             <?php if ($login_status == true) {
//                 echo '<a href="profile.php" class="hover:bg-gray-200 transition-all ease-in-out duration-100 active:bg-gray-300 focus:bg-gray-300 rounded-full hover:text-black py-2 px-4">Account</a>';
//             } ?>
//         </div>
//         <div class="flex">

//             <div class="mx-3">
//                 <?php if ($login_status == true) {
//                     echo '<a href="user_logout.php" class="bg-red-500 hover:bg-red-600 transition-all ease-in-out duration-75 cursor-pointer w-max px-6 py-2 text-white rounded-full">Logout</a>';
//                 } else {
//                     echo '<a href="user_login.php" class="bg-gray-900 hover:bg-gray-800 focus:border-white cursor-pointer w-max transition-all ease-in-out duration-75 px-6 py-2 text-white rounded-full">Login</a>';
//                 } ?>
//             </div>

//     </nav>

//     <!-- nav for small device  -->
//     <div class="flex items-center justify-between max-w-7xl mx-auto font-poppins bg-white py-3 px-5 lg:hidden">
//         <a href="index.php"><img src="./images/logo/logo.webp" alt="logo" class="w-36 "></a>
//         <i class="bi bi-list menu select-none text-3xl"></i>
//     </div>
//     <div class="bg-gray-200 w-full top-5 font-poppins overflow-hidden px-5 py-3 hidden lg:hidden mb-5" id="nav-items">
//         <div class="flex flex-col gap-4">
//             <a href="#"
//                 class="hover:bg-white focus:bg-white transition-all ease-in-out duration-100 py-2 px-3 rounded-md hover:text-black">Restaurants</a>
//             <a href="new_track_order.php"
//                 class="hover:bg-white focus:bg-white transition-all ease-in-out duration-100 py-2 px-3 rounded-md hover:text-black">Orders</a>
//             <a href="#"
//                 class="hover:bg-white focus:bg-white transition-all ease-in-out duration-100 py-2 px-3 rounded-md hover:text-black">Contact</a>
//             <?php if ($login_status == true) {
//                 echo '<a href="profile.php" class="hover:bg-white focus:bg-white transition-all ease-in-out duration-100 py-2 px-3 rounded-md hover:text-black">Account</a>';
//             } ?>
//             <div>
//                 <h2 class="text-base text-gray-400 mt-3">User actions</h2>
//                 <div class="h-[1px] bg-gray-300 w-full"></div>
//             </div>
//             <?php if ($login_status == true) {
//                 echo '<a href="user_logout.php" class="bg-red-500 hover:bg-red-600 transition-all ease-in-out duration-75 cursor-pointer w-max px-6 py-2 text-white rounded-full">Logout</a>';
//             } else {
//                 echo '<a href="user_login.php" class="bg-gray-900 hover:bg-gray-800 focus:border-white cursor-pointer w-max transition-all ease-in-out duration-75 px-6 py-2 text-white rounded-full">Login</a>';
//             }
//             ?>
//         </div>
//     </div>


//     <div class="space py-12"></div>
//     <!-- Orders section  -->
//     <section class="main max-w-[425px] sm:max-w-[1200px] mx-auto p-3 sm:p-5 lg:p-0">
//         <h2 class="title w-full mx-auto font-bold text-2xl sm:text-4xl">Your Orders</h2>
//         <div class="orders-table-container overflow-x-scroll md:overflow-hidden w-full mx-auto my-5 bg-white p-5 rounded-2xl shadow-md">
//             <table class="orders-table w-full border-collapse">
//                 <thead>
//                     <tr class="border-b border-[#ddd]">
//                         <th class="rounded-l-[10px] bg-[#f1f1f1] p-3 text-lg font-semibold">ItemName</th>
//                         <th class=" bg-[#f1f1f1] p-3 text-lg font-semibold">Order no</th>
//                         <th class=" bg-[#f1f1f1] p-3 text-lg font-semibold">Customer</th>
//                         <th class=" bg-[#f1f1f1] p-3 text-lg font-semibold">Date</th>
//                         <th class=" bg-[#f1f1f1] p-3 text-lg font-semibold">Total</th>

//                         <th class=" bg-[#f1f1f1] p-3 text-lg font-semibold">Payment Status</th>

//                         <th class=" bg-[#f1f1f1] p-3 text-lg font-semibold">Update order</th>
//                         <th class="rounded-r-[10px] bg-[#f1f1f1] p-3 text-lg font-semibold">Feedback</th>
//                     </tr>
//                 </thead>
//                 <tbody>
//                     <?php
//                     foreach ($orders as $order) {
//                         $item = $order['order'];
//                         $order_no = $order['order_id'];
//                         $username = $order['name'];
//                         $date = $order['dt'];
//                         // convert date to string
//                         $date = date('M d', strtotime($order['dt']));
//                         $amount = $order['amount'];

//                         $payment = $order['payment'];
//                         $payment == "SUCCESS" ? $payment = "Completed" : $payment = "failed";

//                         echo ' <tr class="border-b border-[#ddd]">
//                                 <td class="order-item py-4 px-3 text-base flex items-center max-w-[250px] break-words box-border text-left">
//                             ' . $item . '
//                                     </td>
//                                     <td class=" py-4 px-3 text-base">#' . $order_no . '</td>
//                                     <td class=" py-4 px-3 text-base">' . $username . '</td>
//                                     <td class=" py-4 px-3 text-base">' . $date . '</td>
//                                     <td class=" py-4 px-3 text-base">₹' . $amount . '</td>
                                   
//                                     <td class=" py-4 px-3 text-base"><span class="' . $payment == "Completed" ? "bg-[#66dd666e] p-[10px] rounded-md text-[#084208]" : "p-[10px] rounded-md bg-[#ebe85d6e] text-[#5e5c00]" . '">' . $payment . '</span></td>
                                   
//                                     <td class=" py-4 px-3 text-base">Delivered</td>
//                                     <td class=" py-4 px-3 text-base">Feedback recieved</td>
//                                 </tr>            
//                         ';
//                     }
//                     ?>
//                 </tbody>
//             </table>
//         </div>
//     </section>
//     <script src="./darkMode.js"></script>
//     <script>
//         window.embeddedChatbotConfig = {
//             chatbotId: "gvEIQuZ1QCpui9UuF1UWX",
//             domain: "www.chatbase.co"
//         }
//     </script>
//     <script src="https://www.chatbase.co/embed.min.js" chatbotId="gvEIQuZ1QCpui9UuF1UWX" domain="www.chatbase.co" defer>
//     </script>
//     <script>
//         const menu = document.querySelector(".menu");
//         const navitems = document.getElementById("nav-items");

//         menu.addEventListener("click", () => {
//             navitems.classList.toggle("hidden")
//         })
//     </script>
// </body>

// </html>
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: user_login.php");
    exit;
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $login_status = true;
}
include 'partials/_dbconnect.php';
$uid = $_SESSION['user_id'];

// Handle feedback (rating)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['rating'])) {
    $r_id = $_POST['r_id'];
    $order_id = $_POST['order_id'];
    $rating = $_POST['rating'];

    // Update order rating
    $sql = "UPDATE `orders` SET `rating` = '$rating' WHERE `r_id` = '$r_id' AND `order_id` = '$order_id'";
    mysqli_query($conn, $sql);

    // Recalculate restaurant rating
    $sql = "SELECT COUNT(*) AS total, SUM(rating) AS sum_rating 
            FROM `orders` WHERE `r_id` = '$r_id' AND `rating` > 0";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['total'] > 0) {
        $new_rating = $row['sum_rating'] / $row['total'];
        $sql = "UPDATE `restaurant` SET `r_rating` = '$new_rating' WHERE `r_id` = '$r_id'";
        mysqli_query($conn, $sql);
    }
}

// Fetch all user orders
$sql = "SELECT * FROM `orders` WHERE `user_id` = '$uid'";
$result = mysqli_query($conn, $sql);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Orders</title>
  <link rel="stylesheet" href="output.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-[#F0EAEA] font-poppins">
  <!-- Navbar -->
  <nav class="hidden lg:flex w-full items-center justify-between max-w-7xl mx-auto py-4">
    <a href="index.php"><img src="./images/logo/logo.webp" alt="logo" class="w-36"></a>
    <div class="flex gap-2">
      <a href="home.php" class="hover:bg-gray-200 rounded-full py-2 px-4">Restaurants</a>
      <a href="new_track_order.php" class="hover:bg-gray-200 rounded-full py-2 px-4">Orders</a>
      <a href="#" class="hover:bg-gray-200 rounded-full py-2 px-4">Contact</a>
      <?php if ($login_status): ?>
        <a href="profile.php" class="hover:bg-gray-200 rounded-full py-2 px-4">Account</a>
      <?php endif; ?>
    </div>
    <div class="mx-3">
      <?php if ($login_status): ?>
        <a href="user_logout.php" class="bg-red-500 hover:bg-red-600 px-6 py-2 text-white rounded-full">Logout</a>
      <?php else: ?>
        <a href="user_login.php" class="bg-gray-900 hover:bg-gray-800 px-6 py-2 text-white rounded-full">Login</a>
      <?php endif; ?>
    </div>
  </nav>

  <div class="py-12"></div>

  <!-- Orders Section -->
  <section class="main max-w-[425px] sm:max-w-[1200px] mx-auto p-3 sm:p-5 lg:p-0">
    <h2 class="font-bold text-2xl sm:text-4xl">Your Orders</h2>
    <div class="overflow-x-auto w-full mx-auto my-5 bg-white p-5 rounded-2xl shadow-md">
      <table class="w-full border-collapse text-left">
        <thead>
          <tr class="border-b border-[#ddd]">
            <th class="p-3 bg-[#f1f1f1]">Item</th>
            <th class="p-3 bg-[#f1f1f1]">Order #</th>
            <th class="p-3 bg-[#f1f1f1]">Customer</th>
            <th class="p-3 bg-[#f1f1f1]">Date</th>
            <th class="p-3 bg-[#f1f1f1]">Total</th>
            <th class="p-3 bg-[#f1f1f1]">Payment</th>
            <th class="p-3 bg-[#f1f1f1]">Status</th>
            <th class="p-3 bg-[#f1f1f1]">Feedback</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orders as $order): ?>
            <?php
              $item = $order['order'];
              $order_no = $order['order_id'];
              $username = $order['name'];
              $date = date('M d', strtotime($order['dt']));
              $amount = $order['amount'];
              $payment_status = ($order['payment'] == "SUCCESS") ? "Completed" : "Failed";
              $rating = $order['rating'];
            ?>
            <tr class="border-b border-[#ddd]">
              <td class="py-4 px-3"><?= htmlspecialchars($item) ?></td>
              <td class="py-4 px-3">#<?= $order_no ?></td>
              <td class="py-4 px-3"><?= htmlspecialchars($username) ?></td>
              <td class="py-4 px-3"><?= $date ?></td>
              <td class="py-4 px-3">₹<?= $amount ?></td>
              <td class="py-4 px-3">
                <span class="<?php echo ($payment_status == "Completed") 
                  ? "bg-green-200 text-green-800 px-3 py-1 rounded-md" 
                  : "bg-yellow-200 text-yellow-800 px-3 py-1 rounded-md"; ?>">
                  <?= $payment_status ?>
                </span>
              </td>
              <td class="py-4 px-3">Delivered</td>
              <td class="py-4 px-3">
                <?php if ($rating > 0): ?>
                  ⭐ <?= $rating ?>/5
                <?php else: ?>
                  <form action="new_track_order.php" method="POST" class="flex items-center gap-2">
                    <input type="hidden" name="r_id" value="<?= $order['r_id'] ?>">
                    <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                    <select name="rating" class="border rounded-md p-1 text-sm">
                      <option value="1">⭐1</option>
                      <option value="2">⭐2</option>
                      <option value="3">⭐3</option>
                      <option value="4">⭐4</option>
                      <option value="5">⭐5</option>
                    </select>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm">
                      Submit
                    </button>
                  </form>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
</body>
</html>

































    


    
