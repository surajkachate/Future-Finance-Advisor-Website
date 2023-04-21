<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Contact Us Page Design using Html CSS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="contact.css">
</head>

<body>
    <section id="section-wrapper">
        <div class="box-wrapper">
            <div class="info-wrap">
                <h2 class="info-title">Contact Information</h2>
                <h3 class="info-sub-title">Fill up the form and our Team will get back to you within 24 hours</h3>
                <ul class="info-details">
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span>Phone:</span> <a href="tel:+ 91-9096054080">+ 91-9096054080</a>
                    </li>
                    <li>
                        <i class="fas fa-paper-plane"></i>
                        <span>Email:</span> <a href="contact@phoenixfinserve.com">contact@phoenixfinserve.com</a>

                                            <a href="phoenixstockbroker@gmail.com">phoenixstockbroker@gmail.com</a>
                    </li>
                    <li>
                        <i class="fas fa-globe"></i>
                        <span>Website:</span> <a href="#">www.phoenixfinserve.com</a>
                        
                                              <a href="#">www.sureshotstocks.blogspot.com</a>
                                
                    </li>
                </ul>
                <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
            <div class="form-wrap">
                <form action="insert.php" method="POST">
                    <h2 class="form-title">Send us a message</h2>
                    <div class="form-fields">
                        <div class="form-group">
                            <input type="text" class="fname" name="FName" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="lname" name="LName" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="email" name="Email" placeholder="Mail">
                        </div>
                        <div class="form-group">
                            <input type="text" class="phone" name="Mobile" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" name="Message" placeholder="Write your message"></textarea>
                        </div>
                    </div>
                    <input type="submit" name="submit" id="submit" value="Send Message" class="submit-button">
                </form>
            </div>
        </div>
    </section>
</body>

</html>