<!-- 
include 'dbconn.php';
$db = new dbconn();
$conn = $db->startConnection();

// Merr trajnerët
$stmt = $conn->prepare("SELECT * FROM coaches ORDER BY created_at DESC");
$stmt->execute();
$coaches = $stmt->fetchAll(PDO::FETCH_ASSOC); -->


<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blog</title>
    <link rel="stylesheet" href="service.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</head>
<body>
   <div class="header-container">
   <h1 class="header-title">Meet the Coach</h1>
   <div class="slide-container swiper">
      <div class="slide-content">
         <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
               <div class="image-content">
                  <span class="overlay"></span>
                  <div class="card-image">
                     <img src="https://media.istockphoto.com/id/1040501222/photo/portrait-of-a-personal-trainer-in-the-gym.jpg?s=612x612&w=0&k=20&c=Xdmp8LM2OCBkwtbWELRkYoQlsT9OZECtq--7gE5BPLg=" class="card-img" alt="">
                  </div>
               </div>
               <div class="card-content">
                  <h2 class="name">David Dell </h2>
                  <p class="description">I love to help others transform through fitness ! I love working with beginners and those who have failed in the past because i was once a beginner</p>
                  <button class="button">View More</button>
               </div>
            </div>

           
            <div class="card swiper-slide">
               <div class="image-content">
                  <span class="overlay"></span>
                  <div class="card-image">
                     <img src="https://www.shutterstock.com/image-photo/female-gym-instructor-half-length-260nw-101551159.jpg" alt="" class="card-img">
                  </div>
               </div>
               <div class="card-content">
                  <h2 class="name">Maria Alice </h2>
                  <p class="description">Strength is born from the resilience of recovery. In the journey of ACL rehab, each step forward is a testament to your determination, and every setback is an opportunity for a stronger comeback.</p>
                  <button class="button">View More</button>
               </div>
            </div>
         
            <div class="card swiper-slide">
               <div class="image-content">
                  <span class="overlay"></span>
                  <div class="card-image">
                     <img src="https://www.julienutrition.com/wp-content/uploads/2023/02/Personal-Trainer-Strength-Conditioning-and-Fitness-Coach-JM-Nutrition.jpg" alt="" class="card-img">
                  </div>
               </div>
               <div class="card-content">
                  <h2 class="name">Nick Mitchell </h2>
                  <p class="description">Ready to transform your fitness journey into a success story? Let's collaborate and unleash the athlete within you!</p>
                  <button class="button">View More</button>
               </div>
            </div>
           
            <div class="card swiper-slide">
               <div class="image-content">
                  <span class="overlay"></span>
                  <div class="card-image">
                     <img src="https://img.freepik.com/premium-photo/fitness-trainer-male-hd-8k-wallpaper-stock-photographic-image_890746-61839.jpg" alt="" class="card-img">
                  </div>
               </div>
               <div class="card-content">
                  <h2 class="name">John Doe </h2>
                  <p class="description">Transform your excuses into reasons, your dreams into plans, and your goals into accomplishments.</p>
                  <button class="button">View More</button>
               </div>
            </div>
            
              <div class="card swiper-slide">
               <div class="image-content">
                  <span class="overlay"></span>
                  <div class="card-image">
                     <img src="https://t3.ftcdn.net/jpg/05/62/09/28/360_F_562092860_mWJBNRqTg4rarfoJaSdkaLlfy1dkrP33.jpg" alt="" class="card-img">
                  </div>
               </div>
               <div class="card-content">
                  <h2 class="name">Emily Davis</h2>
                  <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, ratione.</p>
                  <button class="button">View More</button>
               </div> 
            </div>
         </div>
      </div>
         <div class="swiper-button-next swiper-navBtn"></div>
         <div class="swiper-button-prev swiper-natBtn"></div>
         <div class="swiper-pagination"> </div>
   </div>
   </div> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js">  </script>
   <script>
      const swiper = new Swiper(".slide-content" ,{
         slidesPerView: 3,
         spaceBetween: 25,
         loop:true,
         centerSlide:'true',
         fade:'true',
         grabCursor:'true',
         pagination:{
            el:".swiper-pagination",
            clickable:true,
            dynamicBullets:true,
         },
         navigation: {
            nextEl: ".swiper-button-next",   
            prevEl: ".swiper-button-prev",
         },
         breakpoints:{
            0:{
               slidesPerView:1,
            },
            520:{
               slidesPerView:2,
            },
            950:{
               slidesPerView:3,
            },
         },
      });
   </script>
</body>
</html> -->

<?php
include 'dbconn.php';
$db = new dbconn();
$conn = $db->startConnection();

// Merr trajnerët nga databaza
$stmt = $conn->prepare("SELECT * FROM coaches ORDER BY id DESC");
$stmt->execute();
$coaches = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blog</title>
   <link rel="stylesheet" href="service.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
<body>
   <div class="header-container">
      <h1 class="header-title">Meet the Coach</h1>

      <div class="slide-container swiper">
         <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">

               <!-- Trajnerët statikë -->
               <div class="card swiper-slide">
                  <div class="image-content">
                     <span class="overlay"></span>
                     <div class="card-image">
                        <img src="uploads/valdrini.jpg" class="card-img" alt="">
                     </div>
                  </div>
                  <div class="card-content">
                     <h2 class="name">Valdrin Rashiti</h2>
                     <p class="description">I love to help others transform through fitness! I love working with beginners and those who have failed in the past because I was once a beginner.</p>
                     <button class="button">View More</button>
                  </div>
               </div>

               <div class="card swiper-slide">
                  <div class="image-content">
                     <span class="overlay"></span>
                     <div class="card-image">
                        <img src="uploads/Marigona.jpg" alt="" class="card-img">
                     </div>
                  </div>
                  <div class="card-content">
                     <h2 class="name">Marigona Shaqiri</h2>
                     <p class="description">Strength is born from the resilience of recovery. Every step forward is a testament to your determination.</p>
                     <button class="button">View More</button>
                  </div>
               </div>

               <div class="card swiper-slide">
                  <div class="image-content">
                     <span class="overlay"></span> 
                     <div class="card-image">
                        <img src="uploads/lisi.jpg" class="card-img" alt="">
                     </div>
                  </div>
                  <div class="card-content">
                     <h2 class="name">Lis Osmani</h2>
                     <p class="description">Ready to transform your fitness journey into a success story? Let's collaborate and unleash the athlete within you!</p>
                     <button class="button">View More</button>
                  </div>
               </div>

               <!-- Trajnerët nga databaza -->
               <?php foreach ($coaches as $coach): ?>
                  <div class="card swiper-slide">
                     <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                           <img src="uploads/<?= htmlspecialchars($coach['image']) ?>" class="card-img" alt="Coach Image">
                        </div>
                     </div>
                     <div class="card-content">
                        <h2 class="name"><?= htmlspecialchars($coach['name']) ?></h2>
                        <p class="description"><?= htmlspecialchars($coach['description']) ?></p>
                        <button class="button">View More</button>
                     </div>
                  </div>
               <?php endforeach; ?>

            </div>
         </div>
         <div class="swiper-button-next swiper-navBtn"></div>
         <div class="swiper-button-prev swiper-natBtn"></div>
         <div class="swiper-pagination"></div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
   <script>
      const swiper = new Swiper(".slide-content", {
         slidesPerView: 3,
         spaceBetween: 25,
         loop: true,
         centerSlide: true,
         grabCursor: true,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
         },
         navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
         },
         breakpoints: {
            0: {
               slidesPerView: 1,
            },
            520: {
               slidesPerView: 2,
            },
            950: {
               slidesPerView: 3,
            },
         },
      });
   </script>
</body>
</html>
