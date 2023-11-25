<?php
  session_start();
  if (isset($_GET['pro_id'], $_GET['price'])) {
    $proid = $_GET['pro_id'];
      $price = $_GET['price'];
    
    if (!empty($_SESSION['cart'])) {
      
    $acol = array_column($_SESSION['cart'], 'pro_id');
    
    if (in_array($proid, $acol)) {
      
      $_SESSION['cart'][$proid]['qty'] += 1;
      $_SESSION['cart'][$proid]['price'] += $price;
    } else {
      
      $item = [
        'pro_id' => $_GET['pro_id'],
        'price' => $_GET['price'],
        'qty' => 1
      ];
      $_SESSION['cart'][$proid]= $item;
    }
  } else {
    
    $item = [
      'pro_id' => $_GET['pro_id'],
      'price' => $_GET['price'],
      'qty' => 1
    ];
    $_SESSION['cart'][$proid]= $item;
  }

}

// Check if the payment was successful
if (isset($_SESSION['last_transaction_reference']) && $_SESSION['last_transaction_reference']) {
  // Clear the cart
  clear_cart();

  // Unset the session variable holding the last transaction reference
  unset($_SESSION['last_transaction_reference']);
}

// Function to clear the cart (you need to implement this)
function clear_cart() {
  // Unset the cart session variable
  unset($_SESSION['cart']);
}
//   echo "Session ID: " . session_id() . "<br>";
// print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café pour la Royauté</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="css/tooplate-wave-cafe.css">
<!--
Tooplate 2121 Wave Cafe
https://www.tooplate.com/view/2121-wave-cafe
-->
</head>
<body>
  <div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->
      <div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <i class="fas fa-coffee fa-3x tm-site-logo"></i>
            <h1 class="tm-site-name">Café pour la Royauté</h1>
          </div>
          <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
              <li class="tm-page-nav-item">
                <a href="#menu" class="tm-page-link active">
                  <i class="fas fa-mug-hot tm-page-link-icon"></i>
                  <span>Menu</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#about" class="tm-page-link">
                  <i class="fas fa-users tm-page-link-icon"></i>
                  <span>About Us</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#special" class="tm-page-link">
                  <i class="fas fa-glass-martini tm-page-link-icon"></i>
                  <span>Special Items</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#contact" class="tm-page-link">
                  <i class="fas fa-comments tm-page-link-icon"></i>
                  <span>Contact</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="cart.php" class="tm-btn-primary">
                  <i class="fas fa-shopping-cart tm-page-link-icon"></i>
                  <span>Cart</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>        
      </div>
      <div class="tm-right">
        <main class="tm-main">
          <div id="menu" class="tm-page-content">
            <!-- Menu Page -->
            <nav class="tm-black-bg tm-drinks-nav">
              <ul>
                <li>
                  <a href="#" class="tm-tab-link active" data-id="cold">Iced Coffee</a>
                </li>
                <li>
                  <a href="#" class="tm-tab-link" data-id="hot">Hot Coffee</a>
                </li>
                <li>
                  <a href="#" class="tm-tab-link" data-id="juice">Fruit Juice</a>
                </li>
                <li>
                  <a href="#" class="tm-tab-link" data-id="pastry">Pastries</a>
                </li>
              </ul>
            </nav>
            <div id="cold" class="tm-tab-content">
              <div class="tm-list">
              <div class="tm-list-item">          
                  <img src="img/iced-americano.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Iced Americano<span class="tm-list-item-price">#4000</span></h3>
                    <p class="tm-list-item-description">Traditional Iced Americano is made by pouring cold water, over ice followed by shots of espresso. With manual pour over, the coffee drains directly onto the cold water and ice, so it chills during brewing.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" product-name="Iced Americano" product-price="4000">Add to Cart</button> -->
                    <a href="index.php?pro_id=Iced Americano&price=4000" class="tm-btn-primary tm-align-right">Add to Cart</a>
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/iced-cappuccino.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Iced Cappuccino<span class="tm-list-item-price">#4050</span></h3>
                    <p class="tm-list-item-description">A coffee drink with espresso, milk, ice, and optional sweetener.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Iced Cappuccino" data-product-price="4050">Add to Cart</button> -->
                    <a href="index.php?pro_id=Iced Cappuccino&price=4050" class="tm-btn-primary tm-align-right">Add to Cart</a>
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/iced-espresso.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Iced Espresso<span class="tm-list-item-price">#7000</span></h3>
                    <p class="tm-list-item-description">Espresso served over ice, often with milk</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Iced Espresso" data-product-price="7000">Add to Cart</button> -->
                    <a href="index.php?pro_id=Iced Espresso&price=7000" class="tm-btn-primary tm-align-right">Add to Cart</a>
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/iced-latte.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Iced Latte<span class="tm-list-item-price">#6000</span></h3>
                    <p class="tm-list-item-description">An iced latte is a chilled coffee beverage that's made by mixing espresso with chilled milk, simple syrup, and ice cubes.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Iced Latte" data-product-price="6000">Add to Cart</button> -->
                    <a href="index.php?pro_id=Iced Latte&price=6000" class="tm-btn-primary tm-align-right">Add to Cart</a>
                  </div>
                </div> 
                                       
              </div>
            </div> 

            <div id="hot" class="tm-tab-content">
              <div class="tm-list">
              
                <div class="tm-list-item">          
                  <img src="img/hot-americano.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Hot Americano<span class="tm-list-item-price">#4000</span></h3>
                    <p class="tm-list-item-description">Espresso poured over hot water.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Hot Americano" data-product-price="4000">Add to Cart</button>  -->
                    <a href="index.php?pro_id=Hot Americano&price=4000" class="tm-btn-primary tm-align-right">Add to Cart</a>            
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/hot-cappuccino.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Hot Cappuccino<span class="tm-list-item-price">#4050</span></h3>
                    <p class="tm-list-item-description">A classic espresso drink offering frothy, bold deliciousness, we combine espresso with steamed milk, then top it with a thick layer of milk foam.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Hot Cappuccino" data-product-price="4050">Add to Cart</button> -->
                    <a href="index.php?pro_id=Hot Cappuccino&price=4050" class="tm-btn-primary tm-align-right">Add to Cart</a>                 
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/hot-espresso.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Hot Espresso<span class="tm-list-item-price">#7000</span></h3>
                    <p class="tm-list-item-description">Made with a shot (or more!) of espresso and topped with steamed milk and foam, the latte is sweet, rich, and a perfect pick-me-up in the morning.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Hot espresso" data-product-price="7000">Add to Cart</button> -->
                    <a href="index.php?pro_id=Hot Espresso&7000" class="tm-btn-primary tm-align-right">Add to Cart</a>            
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/hot-latte.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Hot Latte<span class="tm-list-item-price">#6000</span></h3>
                    <p class="tm-list-item-description">Made with steamed, frothy milk, blended with our rich, freshly ground and brewed espresso.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Hot Latte" data-product-price="6000">Add to Cart</button> -->
                    <a href="index.php?pro_id=Hot Latte&price=6000" class="tm-btn-primary tm-align-right">Add to Cart</a>          
                  </div>
                </div>
                         
              </div>
            </div>

            <div id="juice" class="tm-tab-content">
              <div class="tm-list">
                <div class="tm-list-item">          
                  <img src="img/smoothie-1.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Strawberry Smoothie<span class="tm-list-item-price">#2500</span></h3>
                    <p class="tm-list-item-description">Frozen strawberries, frozen bananas, yogurt, and a liquid such as almond milk or orange juice.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right"
                    data-product-name="Strawberry Smoothie" data-product-price="2500">Add to Cart</button> -->
                    <a href="index.php?pro_id=Strawberry Smoothie&price=2500" class="tm-btn-primary tm-align-right">Add to Cart</a>    
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/smoothie-2.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Red Berry Smoothie<span class="tm-list-item-price">#3500</span></h3>
                    <p class="tm-list-item-description">Frozen berries, frozen bananas, yogurt, and a liquid such as almond milk or orange juice.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Red Berry Smoothie" data-product-price="3500">Add to Cart</button> -->
                    <a href="index.php?pro_id=Red Berry Smoothie&price=3500" class="tm-btn-primary tm-align-right">Add to Cart</a>               
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/smoothie-3.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Pineapple Smoothie<span class="tm-list-item-price">#1500</span></h3>
                    <p class="tm-list-item-description" id="product-price">Tropical combination of pineapple, banana, pineapple juice and Greek yogurt, all blended together until creamy.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Pineapple Smoothie" data-product-price="1500">Add to Cart</button> -->
                    <a href="index.php?pro_id=Pineapple Smoothie&price=1500" class="tm-btn-primary tm-align-right">Add to Cart</a>
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/smoothie-4.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Spinach Smoothie<span class="tm-list-item-price">#2000</span></h3>
                    <p class="tm-list-item-description">This easy smoothie gets its vibrant green colour from avocado, cucumber, spinach and kale. Blitz with pineapple and coconut water.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Spinach Smoothie" data-product-price="2000">Add to Cart</button>  -->
                    <a href="index.php?pro_id=Spinach Smoothie&price2000" class="tm-btn-primary tm-align-right">Add to Cart</a>        
                  </div>
                </div>              
              </div>
            </div>
            
            <div id="pastry" class="tm-tab-content">
              <div class="tm-list">
              
                <div class="tm-list-item">          
                  <img src="img/aleksanterinleivos.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Alexandertorte<span class="tm-list-item-price">#3000</span></h3>
                    <p class="tm-list-item-description">Consisting of pastry strips filled with raspberry preserves or raspberry jam.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Alexandertorte" data-product-price="3000">Add to Cart</button> -->
                    <a href="index.php?pro_id=Alexandertorte&price=3000" class="tm-btn-primary tm-align-right">Add to Cart</a>        
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/special-02.jpg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Croissant<span class="tm-list-item-price">#2500</span></h3>
                    <p class="tm-list-item-description">A buttery, flaky, viennoiserie pastry. The dough is layered with butter, rolled and folded several times in succession, then rolled into a thin sheet.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Croissant" data-product-price="2500">Add to Cart</button> -->
                    <a href="index.php?pro_id=Croissant&price=2500" class="tm-btn-primary tm-align-right">Add to Cart</a>         
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/strudel.jpeg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Apple Strudel<span class="tm-list-item-price">#2500</span></h3>
                    <p class="tm-list-item-description">An oblong strudel pastry jacket with an apple filling inside.The filling is made of grated cooking apples.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Apple Strudel" data-product-price="2500">Add to Cart</button> -->
                    <a href="index.php?pro_id=Apple Strudel&price=2500" class="tm-btn-primary tm-align-right">Add to Cart</a>            
                  </div>
                </div>
                <div class="tm-list-item">          
                  <img src="img/doughnut.jpeg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Doughnuts<span class="tm-list-item-price">#1000</span></h3>
                    <p class="tm-list-item-description">Deep fried flour dough with various toppings and flavors.</p>
                    <!-- <button name="add-to-cart" class="tm-btn-primary tm-align-right" data-product-name="Doughnuts" data-product-price="1000">Add to Cart</button> -->
                    <a href="index.php?pro_id=Doughnuts&price=1000" class="tm-btn-primary tm-align-right">Add to Cart</a>   
                  </div>
                </div>
                         
              </div>
            </div>
            <!-- end Menu Page -->
          </div>

          <!-- About Us Page -->
          <div id="about" class="tm-page-content">
            <div class="tm-black-bg tm-mb-20 tm-about-box-1">              
              <h2 class="tm-text-primary tm-about-header">About Café pour la Royauté</h2>
              <div class="tm-list-item tm-list-item-2">                
                <img src="img/about-1.png" alt="Image" class="tm-list-item-img tm-list-item-img-big">
                <div class="tm-list-item-text-2">
                  <p>Wave Cafe is a one-page video background HTML CSS template from Tooplate. You can use this for your business websites.</p>
                  <p>You can also use this for your client websites which you get paid for your website services. Please tell your friends about us.</p>
                </div>                
              </div>
            </div>
            <div class="tm-black-bg tm-mb-20 tm-about-box-2">              
              <div class="tm-list-item tm-list-item-2">                
                <div class="tm-list-item-text-2">
                  <h2 class="tm-text-primary">How we began</h2>
                  <p>If you wish to support us, please contact Tooplate. Thank you. Duis bibendum erat nec ipsum consectetur sodales.</p>                  
                </div>                
                <img src="img/about-2.png" alt="Image" class="tm-list-item-img tm-list-item-img-big tm-img-right">                
              </div>
              <p>Donec non urna elit. Quisque ut magna in dui mattis iaculis eu finibus metus. Suspendisse vel mi a lacus finibus vehicula vel ut diam. Nam pellentesque, mi quis ullamcorper.</p>
            </div>
          </div>
          <!-- end About Us Page -->

          <!-- Special Items Page -->
          <div id="special" class="tm-page-content">
            <div class="tm-special-items">
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-01.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Special One</h2>
                  <p class="tm-special-item-text">Here is a short text description for the first special item. You are not allowed to redistribute this template ZIP file.</p>  
                </div>
              </div>
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-02.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Second Item</h2>
                  <p class="tm-special-item-text">You are allowed to download, modify and use this template for your commercial or non-commercial websites.</p>  
                </div>
              </div>
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-03.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Third Special Item</h2>
                  <p class="tm-special-item-text">Pellentesque in ultrices mi, quis mollis nulla. Quisque sed commodo est, quis tincidunt nunc.</p>  
                </div>
              </div>
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-04.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Special Item Fourth</h2>
                  <p class="tm-special-item-text">Vivamus finibus nulla sed metus sagittis, sed ultrices magna aliquam. Mauris fermentum.</p>  
                </div>
              </div>      
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-05.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Sixth Sense</h2>
                  <p class="tm-special-item-text">Here is a short text description for sixth item. This text is four lines.</p>  
                </div>
              </div>
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-06.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Seventh Item</h2>
                  <p class="tm-special-item-text">Curabitur eget erat sit amet sapien aliquet vulputate quis sed arcu.</p>  
                </div>
              </div>                      
            </div>            
          </div>
          <!-- end Special Items Page -->

          <!-- Contact Page -->
          <div id="contact" class="tm-page-content">
            <div class="tm-black-bg tm-contact-text-container">
              <h2 class="tm-text-primary">Contact Wave</h2>
              <p>Wave Cafe Template has a video background. You can use this layout for your websites. Please contact Tooplate's Facebook page. Tell your friends about our website.</p>
            </div>
            <div class="tm-black-bg tm-contact-form-container tm-align-right">
              <form action="" method="POST" id="contact-form">
                <div class="tm-form-group">
                  <input type="text" name="name" class="tm-form-control" placeholder="Name" required="" />
                </div>
                <div class="tm-form-group">
                  <input type="email" name="email" class="tm-form-control" placeholder="Email" required="" />
                </div>        
                <div class="tm-form-group tm-mb-30">
                  <textarea rows="6" name="message" class="tm-form-control" placeholder="Message" required=""></textarea>
                </div>        
                <div>
                  <button type="submit" class="tm-btn-primary tm-align-right">
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
          <!-- end Contact Page -->
        </main>
      </div>    
    </div>

    <footer class="tm-site-footer">
      <p class="tm-black-bg tm-footer-text">Copyright 2023 Café pour la Royauté
      </p>
    </footer>
  </div>
    
  <!-- Background video -->
  <div class="tm-video-wrapper">
      <i id="tm-video-control-button" class="fas fa-pause"></i>
      <video autoplay muted loop id="tm-video">
          <source src="video/wave-cafe-video-bg.mp4" type="video/mp4">
      </video>
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>    
  <script>

    function setVideoSize() {
      const vidWidth = 1920;
      const vidHeight = 1080;
      const windowWidth = window.innerWidth;
      const windowHeight = window.innerHeight;
      const tempVidWidth = windowHeight * vidWidth / vidHeight;
      const tempVidHeight = windowWidth * vidHeight / vidWidth;
      const newVidWidth = tempVidWidth > windowWidth ? tempVidWidth : windowWidth;
      const newVidHeight = tempVidHeight > windowHeight ? tempVidHeight : windowHeight;
      const tmVideo = $('#tm-video');

      tmVideo.css('width', newVidWidth);
      tmVideo.css('height', newVidHeight);
    }

    function openTab(evt, id) {
      $('.tm-tab-content').hide();
      $('#' + id).show();
      $('.tm-tab-link').removeClass('active');
      $(evt.currentTarget).addClass('active');
    }    

    function initPage() {
      let pageId = location.hash;

      if(pageId) {
        highlightMenu($(`.tm-page-link[href^="${pageId}"]`)); 
        showPage($(pageId));
      }
      else {
        pageId = $('.tm-page-link.active').attr('href');
        showPage($(pageId));
      }
    }

    function highlightMenu(menuItem) {
      $('.tm-page-link').removeClass('active');
      menuItem.addClass('active');
    }

    function showPage(page) {
      $('.tm-page-content').hide();
      page.show();
    }

    $(document).ready(function(){

      /***************** Pages *****************/

      initPage();

      $('.tm-page-link').click(function(event) {
        
        if(window.innerWidth > 991) {
          event.preventDefault();
        }

        highlightMenu($(event.currentTarget));
        showPage($(event.currentTarget.hash));
      });

      
      /***************** Tabs *******************/

      $('.tm-tab-link').on('click', e => {
        e.preventDefault(); 
        openTab(e, $(e.target).data('id'));
      });

      $('.tm-tab-link.active').click(); // Open default tab


      /************** Video background *********/

      setVideoSize();

      // Set video background size based on window size
      let timeout;
      window.onresize = function(){
        clearTimeout(timeout);
        timeout = setTimeout(setVideoSize, 100);
      };

      // Play/Pause button for video background      
      const btn = $("#tm-video-control-button");

      btn.on("click", function(e) {
        const video = document.getElementById("tm-video");
        $(this).removeClass();

        if (video.paused) {
          video.play();
          $(this).addClass("fas fa-pause");
        } else {
          video.pause();
          $(this).addClass("fas fa-play");
        }
      });
    });
  </script>
</body>
</html>