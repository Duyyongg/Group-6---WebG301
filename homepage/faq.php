<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="webside icon" type="png" href="/img/baner-icon/07D132B4-BB34-4BD8-8F26-5EC38035539E.png" >
    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Css  style -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!--link này dùng cho trang index.php-->
    <link rel="stylesheet" href="css/head-footer.css">
    <!--link này dùng chung cho header , footer-->
    <!-- <link rel="stylesheet" href="css/menu.css"> link này dùng cho trang menu.php -->
    <!-- <link rel="stylesheet" href="css/location.css"> link này dùng cho trang location.php -->
    <link rel="stylesheet" href="css/faq.css"> <!-- link này dùng cho trang careting.php-->

    <title>Shrek Juice</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navone">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Coolercleanse</a>
                    </li>
                    <li class="nav-item line">
                        <a class="nav-link" href="#">Blend it yourself</a>
                    </li>
                </ul>
            </div>
            <a class="navbar-brand" href="index.php"><img
                    src="./img/Logo/Logo.png" alt=""></a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search juice generation"
                    aria-label="Search">
                <button class="btn " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="shopping-cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            </form>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg bg-secondary navtwo">
        <div class="container-fluid tog">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <a href="shopping-cart.php"><i class="fa-solid fa-cart-shopping show-mobile"></i></a>
            <div class="collapse navbar-collapse menu" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="menu.php" aria-current="page">menu</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>


    <!-- Careting -->
    <div class="box">
        <p class="heading">FAQs</p>
        <div class="faqs">
            <details>
                <summary>Is my juice made dresh to order?</summary>
                <p class="text">Yes! When you step up to the counter and place your order, we make your drink right
                    there, on the spot. We recommend drinking it soon after purchasing to get the maximum amount of
                    nutrients, which tend to break down slightly once exposed to air.</p>
            </details>
            <details>
                <summary>What's the difference between fresh squeezed and cold pressed juuices?</summary>
                <p class="text">Your order is made right there on the spot using centrifugal juicers which use spinning
                    blades to extract juice from fruits and vegetables. But you can also pick up our bottled juices on
                    sale in our store refrigerators. These bottled cold pressed juices are made with a hydraulic press
                    at our USDA Certified Organic production facility. This method uses high pressure to extract the
                    juice, which preserves the highest nutritional content possible and delivers pulp-free juices that
                    are superb for detoxification programs. At Juice Generation we offer both made-to-order centrifugal
                    juices and cold pressed bottled versions because it's a question of taste and convenience!</p>
            </details>
            <details>
                <summary>Is your produce organic?</summary>
                <p class="text">Much of it is. Availability of organic produce varies seasonally, so we often select
                    locally grown, pesticide-free produce rather than certified-organic produce shipped from far away.
                    Year-round and unequivocally, our cold pressed juices and production facility are USDA certified
                    organic.</p>
            </details>
            <details>
                <summary>What is HPP?</summary>
                <p class="text">We use High Pressure Processing (HPP) for our bottled juices and shots to destroy
                    potentially harmful bacteria while keeping all of the nutrients. HPP is a method of preserving the
                    juice using extremely high pressure.</p>
            </details>
            <details>
                <summary>Are your juices kosher?</summary>
                <p class="text">Our cold pressed juices are certified kosher when sealed and bearing the OU symbol.</p>
            </details>
            <details>
                <summary>Do you have gluten-free offerings?</summary>
                <p class="text">Yes! All of our juices and smoothies are gluten-free. We also offer a range of
                    gluten-free snacks and baked goods.</p>
            </details>
            <details>
                <summary>Are your Smoothie Bowls gluten-free?</summary>
                <p class="text">Although the ingredients in our hemp granola do not include wheat or any
                    gluten-containing products, the granola is not certified gluten-free as it is not produced in a
                    gluten-free facility. The granola contains rolled oats and as this can sometimes bring gluten
                    cross-contamination, those with serious gluten intolerances should avoid this product. The granola
                    is certified organic.</p>
            </details>
            <details>
                <summary>Are Your juices and smoothies vegan?</summary>
                <p class="text">Most of our menu is vegan. That said, we do use whey protein in Gym & Juice® and Protein
                    Knockout® smoothies. Honey is also used throughout the Juice Farmacy® menu. If you'd like a
                    plant-based substitute let us know – we're happy to make the swap.</p>
            </details>
            <details>
                <summary>What type of plant milk do you use?</summary>
                <p class="text">Our smoothies and bowls have the option of unsweetened almond milk, unsweetened oat milk
                    or unsweetened coconut milk. They are all non-dairy and vegan. Our plant milks do not contain
                    carrageenan.</p>
            </details>
            <details>
                <summary>What sweeteners do you offer?</summary>
                <p class="text">You can choose to sweeten any smoothie with organic dates or organic agave nectar—a
                    plant-derived sweetener with a light, caramel taste that is made from the same succulent used to
                    make tequila. But if you don’t want any added sweetener, let us know and we can leave it out.</p>
            </details>
            <details>
                <summary>What is wheatgrass?</summary>
                <p class="text">This alkalizing, nutrient-rich grass is a powerful detoxifier and an excellent source of
                    iron, calcium, magnesium, amino acids, and chlorophyll. While it is part of the wheat family,
                    wheatgrass is gluten-free. Try it in our Wheatgrass Rx®, or in The Professional®</p>
            </details>
        </div>
    </div>





    <!-- footer -->
    <div class="container-fluid footer">
        <div class="container mt-3">
            <div class="row">
                <div class="col-sm-4 p-3 logo ">
                    <a href="index.php">
                        <img src="./img/Logo/Logo.png" alt="">
                    </a>
                </div>
                <div class="col-sm-8 p-3 link-info">
                    <ul class="nav justify-content-center">
                        <li class="nav-item Rewards">
                            <a class="nav-link " href="#">Rewards</a>
                        </li>
                       
                        <li class="nav-item faq">
                            <a class="nav-link" href="faq.php">faq</a>
                        </li>
                        <li class="nav-item contact">
                            <a class="nav-link " href="contact.php">contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-3 green-footer">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col p-3 ">2024 Juice Generation, All Rights Reserved</div>
                    <div class="col p-3 ">
                        <label for="">NEWSLETTER :</label>
                        <input class="mail" type="email" placeholder="Enter your email address ">
                    </div>
                    <div class="col p-3 ">
                        <ul class="nav">
                            <li class="nav-item first">
                                <a href="">Privacy Policy</a>
                            </li>
                            <li class="nav-item ">
                                <a href="">Terms of Use</a>
                            </li>
                            <li class="nav-item ">
                                <a href="">Accessibility</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>