
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <link rel="stylesheet" href="index.css">

        <title>Home</title>
        
        <link rel="icon" href="images/apple.jpg" type="image/jpg">

        <?php
           $path = __DIR__;
           require_once("includes/external_file_links.php"); 
           
           $isSignedIn = isset($_SESSION['isSignedIn']) && $_SESSION['isSignedIn'];

        ?>       

        <noscript><h3 style="text-align:center">Your browser does not support JavaScript!<br>Enable JavaScript in your browser.</h3></noscript> 

        <style>
        #about-section {
            padding: 20px; /* Add some spacing around the content */
            background-color: #f8f8f8; /* Set a light background color */
            border-radius: 10px; /* Add rounded corners to the div */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow for depth */
            max-width: 800px; /* Limit the maximum width of the content for readability */
            margin: 0 auto; /* Center the div horizontally */
        }

        h2 {
            font-size: 40px;
            font-weight: bold;
            color: #0e0f0e;
            text-transform: uppercase;
            margin: 0;
            text-decoration: underline;
            text-align: center;
        }

        p {
            font-size: 18px; /* Increase the font size for better readability */
            line-height: 1.5; /* Add some line spacing for better legibility */
            color: black; /* Set the paragraph text color */
            font-family: 'Roboto', sans-serif;
        }

        /* Style the first paragraph differently to make it stand out */
        p:first-child {
            font-size: 18px; /* Larger font size for the first paragraph */
            font-weight: bold; /* Make it bold for emphasis */
            color: #000; /* Set a darker color for the first paragraph */
        }
</style>

        
    </head>
    <body style="background-color:rgb(26, 255, 26)"> 
    
        <!--Validate Input-->
        <?php
            include 'header/navbar.php';
        ?>
        <main>
            <div class="container mt-5 mb-5" style="background-color: rgb(4,38,84); border-radius: 25px;">
                <div class="intro mt-5 mb-5 text-center">                                
                    <h1 class="text-white">APPLE MAPPER</h1>
                    <p class="text-white">Apple Farm Moi University</p>
                    <button class="btn btn-primary"><a href="#about-section" class="text-white text-decoration-none">Learn More</a></button>            
                </div>
                <div class="achievements text-center text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="work mb-4">
                                <i class="fas fa-atom"></i>
                                <p class="work-heading">Projects</p>
                                <p class="work-text">
                                    <b style="color: aqua;">We ensure these projects are successful:</b>
                                    <br>
                                    - Planting Seedlings: Record the locations where you've planted apple seedlings, helping you keep a comprehensive record of your orchard's growth.
                                    <br>
                                    - Grafted Apples: Monitor the progress of grafted apple trees, ensuring their health and productivity.
                                    <br>
                                    - Disease Tracking: Apple tree images are used to track healthy apples.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="work mb-4">
                                <i class="fas fa-skiing"></i>
                                <p class="work-heading">Community</p>
                                <p class="work-text">
                                    <b style="color: aqua;">We maintain a close relation with the community with an aim to:</b>
                                    <br>
                                    - Connect with fellow farmers to share insights and experiences.
                                    <br>
                                    - Organize community events and activities related to apple farming.
                                    <br>
                                    - Stay updated on important news and developments in the apple farming industry.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div id="about-section">
                    <h2>About Us</h2>

                    <p>Welcome to our Apple Farming Project! Our journey into the world of apple farming began in the year 2020 when we embarked on an ambitious endeavor to cultivate apples on a sprawling 80-acre piece of land. Nestled in the picturesque surroundings of Moi University, our farm has since become a hub of innovation, sustainability, and agricultural excellence.</p>
                    <p>Our commitment to apple farming goes beyond mere cultivation; it's a dedication to quality, sustainability, and community. We believe that apples not only provide a delicious and nutritious source of food but also serve as a symbol of growth and abundance.</p>
                    <p>Over the years, we have meticulously cared for our apple trees, nurturing them from tender seedlings into thriving orchards. Our practices include careful planting, grafting, and continuous monitoring to ensure the health and vitality of our apple trees. We employ cutting-edge technology and scientific expertise to optimize every aspect of our farming process, from soil management to pest control.</p>
                    <p>But our story is not just about apples; it's also about community. We are proud to be part of the vibrant Moi University community, where we collaborate with fellow farmers, researchers, and enthusiasts. Through knowledge sharing and community engagement, we have built a network of individuals who are equally passionate about sustainable agriculture and the bountiful harvests it can yield.</p>
                    <p>Our apple farming journey has been a rewarding one, marked by challenges and triumphs alike. We invite you to join us on this exciting adventure as we continue to explore new horizons in apple farming. Whether you are a fellow farmer, an apple enthusiast, or simply curious about the art of cultivating this beloved fruit, our project is open to all.</p>
                    <p>Thank you for being a part of our story. Together, we aim to make our apple farm not just a place of cultivation but a symbol of growth, innovation, and a greener, healthier future.</p>
            </div>              
            

            <div class="d-flex justify-content-center mt-4 about-me mt-5 mb-5">
                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <img src="images/logo.jpg" alt="me" class="img-fluid">
                    </div>
                    
                    <div class="col-md-6">
                        <img src="images/apples.jpg" alt="me" class="img-fluid">
                    </div>
                </div>
            </div>

        </main>

        <footer class="footer bg-dark text-white py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copy text-center">&copy; 2023 Developer</div>
                    </div>
                    <div class="col-md-6">
                        <div class="bottom-links">
                            <div class="row">
                                <div class="col-md-5 col-12">
                                    <span style="color: rgb(26, 255, 26); text-decoration: underline;">Quick Links</span>
                                    <a href="#" class="text-white d-block text-decoration-none">Home</a>
                                    <a href="#about-section" class="text-white d-block text-decoration-none">About</a>
                                </div>
                                
                                <div class="col-md-5 col-12" id="contact">
                                    <span style="color: rgb(26, 255, 26); text-decoration: underline;">Contact</span>
                                    <a href="tel:0110987678" class="text-white d-block text-decoration-none">0110987678</a>
                                    <a href="mailto:applemapper@gmail.com" class="text-white d-block text-decoration-none">applemapper@gmail.com</a>
                                </div>
                                <br/>
                                <div class="col-md-2 col-12">
                                    <span style="color: rgb(26, 255, 26); text-decoration: underline;">Socials</span>
                                    <a href="https://www.facebook.com" class="text-white d-block text-decoration-none"><i class="fab fa-facebook"></i></a>
                                    <a href="https://www.x.com" class="text-white d-block text-decoration-none"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.instagram.com" class="text-white d-block text-decoration-none"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
     
       
    </body>
</html>