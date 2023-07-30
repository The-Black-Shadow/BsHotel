<?php
   include 'php/connection.php';
   include 'php/user.php';
   $useremail=$_SESSION['email'];

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM booking WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $useremail);

// Execute the query
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Fetch the data from the result set (since we expect a single row, no need for a loop)
    $row = $result->fetch_assoc();

    // Now you can access the data using $row['column_name']
    $name = $row['name'];
    $address = $row['email'];
    $check_in = $row['check_in'];
    $check_out = $row['check_out'];
    $adults = $row['adults'];
    $children = $row['children'];
    $rooms = $row['rooms'];
    $room_type = $row['room_type'];

    // Do something with the data...
} else {
    // No matching rows found
    echo "No data found for the user: " . $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Profile Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    main {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
    }

    img {
      max-width: 150px;
      border-radius: 50%;
      display: block;
      margin: 0 auto 20px;
    }

    h1 {
      text-align: center;
    }

    p {
      text-align: center;
    }

    .info-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .info-item span {
      font-weight: bold;
    }

    .edit-profile-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #007bff;
      text-decoration: none;
    }

    /* Additional styles for the form section */
    .edit-profile-form {
      display: none;
      margin-top: 20px;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
    }

    .edit-profile-form.show {
      display: block;
    }

    .edit-profile-form input {
      display: block;
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .edit-profile-form button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .edit-profile-form button:hover {
      background-color: #0056b3;
    }

    .edit-profile-form p {
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <header>
    <h1>My Profile Page</h1>
  </header>
  <main>
    <h1><?php echo $_SESSION['name'] ?></h1>

    <div class="info-item">
      <span>Email:</span>
      <span><?php echo $_SESSION['email'] ?></span>
    </div>

    <div class="info-item">
      <span>Location:</span>
      <span><?php echo $_SESSION['address'] ?></span>
    </div>
    <h3 style="text-align: center;">Booking status</h3>
    <p>Check_in: <?php echo $check_in; ?></p>
    <p>Check out: <?php echo $check_out; ?></p>
    <p>Adults: <?php echo $adults; ?></p>
    <p>Children: <?php echo $children; ?></p>
    <p>Rooms: <?php echo $rooms; ?></p>
    <p>Room Type: <?php echo $room_type; ?></p>

    <!-- Edit Profile link -->
    <a href="#" class="edit-profile-link">Edit Profile</a>

    <!-- Edit Profile form section -->
    <div class="edit-profile-form">
      <form>
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="location" placeholder="Location">
        <!-- Add more input fields as needed -->

        <button type="submit">Save Changes</button>
      </form>
    </div>
  </main>

  <script>
    // JavaScript to handle the toggle functionality
    document.addEventListener("DOMContentLoaded", function () {
      const editProfileLink = document.querySelector(".edit-profile-link");
      const editProfileForm = document.querySelector(".edit-profile-form");

      editProfileLink.addEventListener("click", function (event) {
        event.preventDefault();
        editProfileForm.classList.toggle("show");
      });
    });
  </script>
</body>
</html>
