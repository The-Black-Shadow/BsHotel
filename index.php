<?php
   include 'php/connection.php';
   include 'php/user.php';
   session_start();
   if(isset($_SESSION['acc_type']) && $_SESSION['acc_type'] == 'user'){
      header("Location: bsonline.php");
      exit();
    }
  
    
    if(isset($_SESSION['acc_type']) && $_SESSION['acc_type'] == 'admin'){
      header("Location: admin.php");
      exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BS Online Booking</title>
   <!--Bootstrap-->
   <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- swiper css cdn link -->
   <link rel="stylesheet" href="css/swiper-bundle.min.css" />
    <!-- custom css link -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

   <!-- header -->

   <header class="header">

      <a href="#" class="logo"> <i class="fas fa-hotel"></i> BS Online Booking</a>

      <nav class="navbar">
         <a href="#home">home</a>
         <a href="#about">about</a>
         <a href="#room">Hotel</a>
         <a href="travelling.html">Travelling</a>
         <a href="parlour.html">Parlour</a>
         <a href="#gallery">gallery</a>
         <a href="#review">review</a>
         <a href="#faq">faq</a>
         <a href="signup/index.php" class="btn"> Account</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </header>

   <!-- end -->

   <!-- home -->

   <section class="home" id="home">

      <div class="swiper home-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide" style="background: url(images/home-slide1.jpg) no-repeat;">
               <div class="content">
                  <h3>it's where dreams come true</h3>
                  <a href="#" class="btn"> visit our offer</a>
               </div>
            </div>

            <div class="swiper-slide slide" style="background: url(images/home-slide2.jpg) no-repeat;">
               <div class="content">
                  <h3>it's where dreams come true</h3>
                  <a href="#" class="btn"> visit our offer</a>
               </div>
            </div>

            <div class="swiper-slide slide" style="background: url(images/home-slide3.jpg) no-repeat;">
               <div class="content">
                  <h3>it's where dreams come true</h3>
                  <a href="#" class="btn"> visit our offer</a>
               </div>
            </div>

            <div class="swiper-slide slide" style="background: url(images/home-slide4.jpg) no-repeat;">
               <div class="content">
                  <h3>it's where dreams come true</h3>
                  <a href="#" class="btn"> visit our offer</a>
               </div>
            </div>

         </div>

         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>

      </div>

   </section>

   <!-- end -->


   <!-- about -->

   <section class="about" id="about">

      <div class="row">

         <div class="image">
            <img src="images/about.jpg" alt="">
         </div>

         <div class="content">
            <h3>about us</h3>
            <p>Our online booking platform is designed to provide a seamless and convenient experience for users looking to make reservations and bookings. With a user-friendly interface and a wide range of options, we aim to cater to diverse needs and preferences.Our platform offers a comprehensive selection of services, including hotel accommodations, flights, car rentals, event tickets, and more. Users can easily browse through various listings, compare prices, and make secure bookings with just a few clicks.</p>
            <p>With our online booking platform, we aim to simplify the process of planning and organizing travel or events, making it effortless and efficient. Whether you're a frequent traveler or an occasional explorer, we are committed to making your booking experience convenient, reliable, and hassle-free.</p>
         </div>

      </div>

   </section>

   <!-- end -->

   <!-- room -->

   <section class="room" id="room">

      <h1 class="heading">our room</h1>

      <div class="swiper room-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <div class="image">
                  <span class="price">$15.99/night</span>
                  <img src="images/room-1.jpg" alt="">
               </div>
               <div class="content">
                  <h3>exclusive room</h3>
                  <p>Our hotel rooms feature top-notch facilities including luxurious bedding, high-speed internet, flat-screen TVs, minibars, and 24-hour room service, ensuring a comfortable and convenient stay for our guests..</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="image">
                  <span class="price">$15.99/night</span>
                  <img src="images/room-2.jpg" alt="">
               </div>
               <div class="content">
                  <h3>exclusive room</h3>
                  <p>Our hotel rooms feature top-notch facilities including luxurious bedding, high-speed internet, flat-screen TVs, minibars, and 24-hour room service, ensuring a comfortable and convenient stay for our guests..</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="image">
                  <span class="price">$25.99/night</span>
                  <img src="images/room-3.jpg" alt="">
               </div>
               <div class="content">
                  <h3>exclusive room</h3>
                  <p>Our hotel rooms feature top-notch facilities including luxurious bedding, high-speed internet, flat-screen TVs, minibars, and 24-hour room service, ensuring a comfortable and convenient stay for our guests..</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="image">
                  <span class="price">$35.99/night</span>
                  <img src="images/room-4.jpg" alt="">
               </div>
               <div class="content">
                  <h3>exclusive room</h3>
                  <p>Our hotel rooms feature top-notch facilities including luxurious bedding, high-speed internet, flat-screen TVs, minibars, and 24-hour room service, ensuring a comfortable and convenient stay for our guests..</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                  </div>
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="image">
                  <span class="price">$15.99/night</span>
                  <img src="images/room-5.jpg" alt="">
               </div>
               <div class="content">
                  <h3>exclusive room</h3>
                  <p>Our hotel rooms feature top-notch facilities including luxurious bedding, high-speed internet, flat-screen TVs, minibars, and 24-hour room service, ensuring a comfortable and convenient stay for our guests..</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i></i>
                  </div>
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="image">
                  <span class="price">$15.99/night</span>
                  <img src="images/room-6.jpg" alt="">
               </div>
               <div class="content">
                  <h3>exclusive room</h3>
                  <p>Our hotel rooms feature top-notch facilities including luxurious bedding, high-speed internet, flat-screen TVs, minibars, and 24-hour room service, ensuring a comfortable and convenient stay for our guests..</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>

   <!-- end -->

   <!-- services -->

   <section class="services">

      <div class="box-container">

         <div class="box">
            <img src="images/service1.png" alt="">
            <h3>swimming pool</h3>
         </div>

         <div class="box">
            <img src="images/service2.png" alt="">
            <h3>food & drink</h3>
         </div>

         <div class="box">
            <img src="images/service3.png" alt="">
            <h3>restaurant</h3>
         </div>

         <div class="box">
            <img src="images/service4.png" alt="">
            <h3>fitness</h3>
         </div>

         <div class="box">
            <img src="images/service5.png" alt="">
            <h3>beauty spa</h3>
         </div>

         <div class="box">
            <img src="images/service6.png" alt="">
            <h3>resort beach</h3>
         </div>

      </div>

   </section>

   <!-- end -->

   <!-- gallery -->

   <section class="gallery" id="gallery">

      <h1 class="heading">our gallery</h1>

      <div class="swiper gallery-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <img src="images/gallery1.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/gallery2.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/gallery3.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/gallery4.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/gallery5.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/gallery6.jpg" alt="">
               <div class="icon">
                  <i class="fas fa-magnifying-glass-plus"></i>
               </div>
            </div>

         </div>

      </div>

   </section>

   <!-- end -->

   <!-- review -->

   <section class="review" style="background-image: url('images/review.jpg');" id="review">

      <div class="swiper review-slider">
         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <h2 class="heading">client's review</h2>
               <i class="fas fa-quote-right"></i>
               <p>An absolutely outstanding experience! From the moment we arrived, we were treated like royalty. The staff went above and beyond to ensure our every need was met. The rooms were exquisitely decorated, spacious, and impeccably clean. The dining options were divine, with a wide range of delectable dishes. Truly a five-star experience that exceeded our expectations. Highly recommended!</p>
               <div class="user">
                  <img src="images/pic-1.png" alt="">
                  <div class="user-info">
                     <h3>john deo</h3>
                     <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                     </div>
                  </div>
               </div>
            </div>

            <div class="swiper-slide slide">
               <h2 class="heading">client's review</h2>
               <i class="fas fa-quote-right"></i>
               <p>We had a fantastic stay at this 3-star hotel! The staff were incredibly friendly and attentive, making us feel right at home. The rooms were clean, comfortable, and well-equipped with all the necessary amenities. The hotel's location was convenient, with easy access to nearby attractions and restaurants. Overall, it was a great value for the price and we would highly recommend it!</p>
               <div class="user">
                  <img src="images/pic-2.png" alt="">
                  <div class="user-info">
                     <h3>john deo</h3>
                     <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i></i>
                     </div>
                  </div>
               </div>
            </div>

            <div class="swiper-slide slide">
               <h2 class="heading">client's review</h2>
               <i class="fas fa-quote-right"></i>
               <p>An exceptional experience! From the moment we arrived, the staff went above and beyond to ensure our comfort. The rooms were beautifully appointed, spacious, and immaculately clean. The hotel's amenities were top-notch, and the dining options were exquisite. The attention to detail and the level of service truly exceeded our expectations. We highly recommend this 4.5-star gem for an unforgettable stay!</p>
               <div class="user">
                  <img src="images/pic-3.png" alt="">
                  <div class="user-info">
                     <h3>john deo</h3>
                     <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                     </div>
                  </div>
               </div>
            </div>

            <div class="swiper-slide slide">
               <h2 class="heading">client's review</h2>
               <i class="fas fa-quote-right"></i>
               <p>Absolutely loved my stay at this hotel! The rooms were immaculate, beautifully designed, and equipped with all the necessary amenities. The staff was incredibly friendly and attentive, making me feel truly valued as a guest. The location was perfect, with easy access to attractions and dining options. Highly recommend this hotel for an exceptional experience!</p>
               <div class="user">
                  <img src="images/pic-4.png" alt="">
                  <div class="user-info">
                     <h3>john deo</h3>
                     <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                     </div>
                  </div>
               </div>
            </div>

            <div class="swiper-slide slide">
               <h2 class="heading">client's review</h2>
               <i class="fas fa-quote-right"></i>
               <p>Outstanding service, impeccable rooms, and breathtaking views. Our stay was nothing short of perfection. Highly recommended!</p>
               <div class="user">
                  <img src="images/pic-5.png" alt="">
                  <div class="user-info">
                     <h3>john deo</h3>
                     <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                     </div>
                  </div>
               </div>
            </div>

            <div class="swiper-slide slide">
               <h2 class="heading">client's review</h2>
               <i class="fas fa-quote-right"></i>
               <p>Amazing experience, impeccable service, highly recommended for a memorable stay!</p>
               <div class="user">
                  <img src="images/pic-6.png" alt="">
                  <div class="user-info">
                     <h3>john deo</h3>
                     <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                     </div>
                  </div>
               </div>
            </div>

         </div>
         <div class="swiper-pagination"></div>
      </div>

   </section>

   <!-- end -->

   <!-- faq -->

   <section class="faqs" id="faq">

      <h1 class="heading">frequently asked questions</h1>

      <div class="row">

         <div class="image">
            <img src="images/FAQs.gif" alt="">
         </div>

         <div class="content">

            <div class="box active">
               <h3>what are payment methods?</h3>
               <p>We accept Visa, MasterCard, Paypal , bKash, Nagad, Rocket.</p>
            </div>

            <div class="box">
               <h3>do you have top-roof resturent?</h3>
               <p>Yes, we have amaging top-roof resturent.</p>
            </div>

            <div class="box">
               <h3>do you have any refund policy?</h3>
               <p>yes, if you want to cancel the booking, contact us before 24 hours.</p>
            </div>

            <div class="box">
               <h3>what types of room do you have?</h3>
               <p>We have ac, non-ac and lauxary room.</p>
            </div>

            <div class="box">
               <h3>what types of security do you have?</h3>
               <p>We have cc camera and security guard everywhere.</p>
            </div>

         </div>

      </div>

   </section>

   <!-- end -->


   <!-- footer -->

   <section class="footer">

      <div class="box-container">

         <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +880-1709061463 </a>
            <a href="#"> <i class="fas fa-phone"></i> +880-1521778357</a>
            <a href="#"> <i class="fas fa-envelope"></i> mehedihasan.cse18@gmail.com</a>
            <a href="#"> <i class="fas fa-map"></i> PSTU, Barishal, Bangladesh</a>
         </div>

         <div class="box">
            <h3>quick links</h3>
            <a href="#home"><i class="fas fa-arrow-right"></i>home</a>
            <a href="#about"><i class="fas fa-arrow-right"></i>about</a>
            <a href="#room"><i class="fas fa-arrow-right"></i>room</a>
            <a href="#gallery"><i class="fas fa-arrow-right"></i>gallery</a>
            
         </div>

         <div class="box">
            <h3>extra links</h3><a href="#review"><i class="fas fa-arrow-right"></i>review</a>
            <a href="#faq"><i class="fas fa-arrow-right"></i>faq</a>
            <a href="#reservation"><i class="fas fa-arrow-right"></i>reservation</a>
            <a href="#"> <i class="fas fa-arrow-right"></i> refund policy</a>
         </div>

      </div>

      <div class="share">
         <a href="#" class="fab fa-facebook-f"></a>
         <a href="#" class="fab fa-instagram"></a>
         <a href="#" class="fab fa-twitter"></a>
         <a href="#" class="fab fa-pinterest"></a>
      </div>

      <div class="credit">&copy; copyright @ 2023 by <span>mehedi hasan</span></div>

   </section>

   <!-- end -->


<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

   <script src="js/script.js"></script>

</body>
</html>