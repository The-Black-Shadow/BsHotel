<!DOCTYPE html>
<html>
<head>
  <title>My Profile</title>
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
  </style>
</head>
<body>
  <header>
    <h1>My Profile Page</h1>
  </header>
  <main>
    <img src="profile-picture.jpg" alt="Profile Picture">
    <h1>John Doe</h1>
    <p>Web Developer</p>

    <div class="info-item">
      <span>Email:</span>
      <span>john.doe@example.com</span>
    </div>

    <div class="info-item">
      <span>Location:</span>
      <span>New York, USA</span>
    </div>

    <div class="info-item">
      <span>Age:</span>
      <span>30</span>
    </div>

    <!-- Add more information as needed -->

    <a href="#" class="edit-profile-link">Edit Profile</a>
  </main>
</body>
</html>
