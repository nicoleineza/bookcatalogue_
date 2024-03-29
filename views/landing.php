<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bookcatalogue_/css/landing.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />">
    <title>Landing Page</title>
</head>
<body>
    <nav>
        <div class="nav_logo"><a href="">GRINGOTTS</a> </div>
        <ul class="nav_links">
            <li class="link"><a href="landing.php">Home</a> </li>
            <li class="link"><a href="id=About Us">About us</a></li>
            <li class="link"> <a href="discover.php">Discover</a></li>
            <li class="link"><a href="signup.php" class="nav_btn">Register</a> </li>
        </ul>
    </nav>
    <section class="container">
        <div class="content_container">
            <h1>
                Dive into worlds unknown<br> 
               <span id="heading_1"> Embark on epic adventures,</span><br>
               <span id="heading_2"> And explore the depths of imagination with us</span>
               
            </h1>
            <p>
                Whether you're a seasoned bibliophile or just starting your literary journey, we've got a tale for you. 
                Get lost in stories that linger long after the final page.Join our bookish family today!
            </p>
            <form >
                <input type="text" placeholder="Enter Email">
                <button type submit id="btn" >Join </button>
            </form>
        </div>
        <div id="img_container">
            <img src="/bookcatalogue_/assets/images/ioann-mark-kuznietsov-F_cHIM0Kcy4-unsplash.jpg" alt="A book lying open on a desk" id="img" height="300px" width="150px" >
            <!-- Updated ID for the second image -->
            <img src="/bookcatalogue_/assets/images/pexels-yaroslav-shuraev-5084674.jpg" alt="header" id="img2" height="350px"  width="200px"/>
            <div id="image_content">
                <ul>
                    <li>Get 30 points for reading today's top book</li>
                    <li>Discover great reads</li>
                </ul>
            </div>
        </div>
    </section>
    <section id="AboutUs">
      <div id="header"><h1 id="h1"><a href="#"></a>ABOUT US</h1></div>
      <p id="about-text">
        At BookShelf, we believe in the transformative power of literature.📚✨ Our passion lies in connecting readers with the perfect books to ignite their imagination.<br> 
        Expand their horizons, and delve into new worlds.
      </p>    
        <div id="about_container">
            <div id="Mission" class="about_section">
                <h2 id="mis">Mission<i id="globe" class="fa-solid fa-globe"></i></h2>
                <hr>
                <p>🌟 To inspire a love for reading in everyone, from seasoned bookworms to those just beginning their literary journey.
                    Whether it's finding solace in the comfort of a familiar tale or venturing into uncharted literary territories, we're here to guide you on your reading journey.
                </p>
            </div>
            <div id="Vision" class="about_section">
                <h2 id="vis">What We Offer<i id="bound" class="fa-solid fa-hands-bound"></i></h2>
                <hr>
                <p>📖 Our team of dedicated book enthusiasts handpick each title, ensuring a diverse and captivating collection for every taste.
                    🤝 Community Engagement: Join our vibrant community of readers to discuss, recommend, and share the magic of storytelling
                </p>
            </div>
            <div id="Achievements" class="about_section">
                <h2 id="achi">Why BookShelf <i id="check" class="fa-solid fa-check"></i></h2>
                <hr>
                <p>
                     Let us be your guide in discovering your next favorite read, tailored just for you.

                    🌿 Sustainable Reading: We're committed to promoting eco-friendly practices, from our packaging to our partnerships with sustainable publishers.
                </p>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer_container">
            <div class="footer_logo">
                <a href="#">GRINGOTTS</a>
            </div>
            <div class="footer_links">
                <ul>
                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                </ul>
            </div>
            </div>
            <div id="footer_social">
                
        </div>
        <div class="footer_bottom">
            <p>&copy; 2024 BookShelf. All rights reserved.</p>
        </div>
    </footer>
    
    
</body>
</html>
