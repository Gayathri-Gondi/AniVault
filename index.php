<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the query file to fetch data
include 'queries.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AniVault Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link to external CSS stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/lmcss.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- jQuery (required for Owl Carousel) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="nav">
        <!-- Left Container for Logo -->
        <div class="leftcontainer">
            <img class="logoimg" src="logo.png" alt="Logo"> <!-- Logo image -->
        </div>
        <!-- Right Container for Navigation Links -->
        <div class="rightcontainer">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="search.php">Search</a>
            <a class="nav-link" href="login.php">Login</a>
            <a class="nav-link subtn" href="signup.php">Sign Up</a>
        </div>
    </nav>

    <!-- Main Carousel Section -->
    <div class="carousel">
        <div class="carousel-container">
            <div class="carousel-item active">Container 1</div>
            <div class="carousel-item">Container 2</div>
            <div class="carousel-item">Container 3</div>
            <div class="carousel-item">Container 4</div>
            <div class="carousel-item">Container 5</div>
        </div>
    </div>

    <!-- Trending Now Section -->
    <div>
        <div class="headtext">TRENDING NOW</div>
        <div class="main-content">
            <div class="owl-carousel owl-theme" id="cl1">
                <div class="item">
                    <div class="item-content">1</div>
                    <div class="item-title">Title 1</div>
                </div>
                <div class="item">
                    <div class="item-content">2</div>
                    <div class="item-title">Title 2</div>
                </div>
                <div class="item">
                    <div class="item-content">3</div>
                    <div class="item-title">Title 3</div>
                </div>
                <div class="item">
                    <div class="item-content">4</div>
                    <div class="item-title">Title 4</div>
                </div>
            </div>
            <div class="owl-theme">
                <div class="owl-controls">
                    <div class="custom-nav owl-nav" id="cn1"></div> <!-- Navigation for the first carousel -->
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Anime Section -->
    <div>
        <div class="headtext">UPCOMING ANIME</div>
        <div class="main-content">
            <div class="owl-carousel owl-theme" id="cl2">
                <div class="item">
                    <div class="item-content">5</div>
                    <div class="item-title">Title 5</div>
                </div>
                <div class="item">
                    <div class="item-content">6</div>
                    <div class="item-title">Title 6</div>
                </div>
                <div class="item">
                    <div class="item-content">7</div>
                    <div class="item-title">Title 7</div>
                </div>
                <div class="item">
                    <div class="item-content">8</div>
                    <div class="item-title">Title 8</div>
                </div>
            </div>
            <div class="owl-theme">
                <div class="owl-controls">
                    <div class="custom-nav owl-nav" id="cn2"></div> <!-- Navigation for the second carousel -->
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Content Section (currently empty) -->
    <div class="mixcon">
        <div class="mixcont">
            <div class="totcont">
                <div class="cont">
                    <div class="animeclass">
                        <div class="headtext">ALL TIME TOP</div>
                    </div>
                    <div class="animedata">
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                    </div>
                    <div class="viewmore">
                        <a href="#" class="view-more-link">View More...</a>
                    </div>
                </div>
                <div class="cont">
                    <div class="animeclass">
                        <div class="headtext">MOST FAVOURITE</div>
                    </div>
                    <div class="animedata">
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                    </div>
                    <div class="viewmore">
                        <a href="#" class="view-more-link">View More...</a>
                    </div>
                </div>
                <div class="cont">
                    <div class="animeclass">
                        <div class="headtext">RECENTLY COMPLETED</div>
                    </div>
                    <div class="animedata">
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                    </div>
                    <div class="viewmore">
                        <a href="#" class="view-more-link">View More...</a>
                    </div>
                </div>
                <div class="cont">
                    <div class="animeclass">
                        <div class="headtext">ADMINS PICK</div>
                    </div>
                    <div class="animedata">
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                        <div class="animecont">
                            <div class="animeimg"></div>
                            <div class="animeinfo" style="align-content: center;">
                                <div class="animetitle"> One piece</div>
                                <div class="viewstxt">10,000</div>
                                <div class="likestxt">793</div>
                            </div>
                        </div>
                    </div>
                    <div class="viewmore">
                        <a href="#" class="view-more-link">View More...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="top">
            <div class="flogoimg"></div>
        </div>
        <div class="hline"></div>
        <div class="bottom">
            <div class="wbtitle">
                AniVault
            </div>
            <div class="vline"></div>
            <div class="wbtitle">
                <i class="fa-regular fa-copyright"></i>
                Gayathri Gondi
            </div>
        </div>
    </div>

    <script>
        // Carousel for the first set of containers (manual sliding)
        let currentIndex = 0;
        const items = document.querySelectorAll('.carousel-item');
        const totalItems = items.length;
        const carouselContainer = document.querySelector('.carousel-container');

        // Move the carousel to the specified index
        function moveToIndex(index) {
            carouselContainer.style.transform = `translateX(-${index * 100}%)`;
        }

        // Automatic slide function
        function autoSlide() {
            currentIndex = (currentIndex + 1) % totalItems;
            moveToIndex(currentIndex);
        }

        // Set interval for automatic sliding every 3 seconds
        setInterval(autoSlide, 3000);
    </script>

    <script>
        // Initialize the first carousel
        $(document).ready(function () {
            $('#cl1').owlCarousel({
                stagePadding: 50,
                loop: true,
                margin: 10,
                nav: true,
                dots: false, // Disable dots
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                navContainer: '#cn1', // Custom navigation container for the first carousel
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    750: {
                        items: 3
                    },
                    900: {
                        items: 3.5
                    },
                    1000: {
                        items: 4
                    },
                    1200: {
                        items: 4.5
                    },
                    1400: {
                        items: 6
                    }
                }
            });
        });

        // Initialize the second carousel
        $(document).ready(function () {
            $('#cl2').owlCarousel({
                stagePadding: 50,
                loop: true,
                margin: 10,
                nav: true,
                dots: false, // Disable dots
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                navContainer: '#cn2', // Custom navigation container for the second carousel
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    750: {
                        items: 3
                    },
                    900: {
                        items: 3.5
                    },
                    1000: {
                        items: 4
                    },
                    1200: {
                        items: 4.5
                    },
                    1400: {
                        items: 6
                    }
                }
            });
        });
    </script>
</body>

</html>