<!DOCTYPE html>
<html lang="en">

<body>

   <?php include_once "nav.php"?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/slide-1.jpg" alt="" >
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-3.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">Jewelry Store</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>Lets
                            <strong>Start our adventure here!</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Our
                        <strong>Story</strong>
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="img/intro-pic.jpg" alt="">
                    <hr class="visible-xs">
<p>Jewelry is a personal ornament, such as a ring, bracelet, necklace or any other item made from jewels, precious metals or any other material. The word jewelry is derived from the Latin word &quotJocale&quot means plaything. In present scenario the word Jewelry is used to describe any piece of precious metal or gemstone used to adorn oneself. Jewelry has fascinated, thrilled and impressed the world for thousands of years and played an important role in growth of human civilization. Jewelry is one of the oldest forms of body adornment and was in use before the clothing came into existence.</p>
<p>In primitive times, jewelry was created from natural materials, such as bone, animal teeth, shell, wood, and carved stone. But after the discovery and extraction of minerals and metals, jewelry is usually created by setting sparkling gemstones into precious metals. These minerals and metals are extracted in a rough state and usually require some treatment before their use in jewelry. Gemstones are cut and polished to exhibit their sparkle whereas alloys are mixed in metals to make them strong and colorful.</p>
<p>Jewelry is made to adorn nearly for every body part from head to toe and since ancient times, it is used for various different reasons and purposes in different cultures and periods.
Jewelry has been used for following reasons and purposes:</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
<b>Artistic and Fashionable Purpose</b><p>From the very beginning, jewelry has been primarily used as an artistic and fashionable item. In almost all the cultures, jewelry is used as an ornament to enhance and exhibit beauty of human body.</p>
<b>Functional Use</b><p> Many jewelry items, such as pins and buckles, invented as purely functional or practical items, but evolved into decorative jewelry items as their functional or practical requirement diminished.</p>
<b>Symbolism</b><p>Jewelry is often used as status symbol and considered as one of the most influential ways to display wealth. Jewelry is also used to exhibit culture and feelings. For example, in many cultures, married people wear a jewelry item such as wedding ring, necklace etc.</p>
                </div>
            </div>
        </div>

  

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Jstore Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
