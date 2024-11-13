<?php
// Include the query file to fetch data
include 'functions.php';
$year = date('Y');
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
           <?php
$ThisData = fetchAniListData($popseasonnow);

if (isset($ThisData['data']['Page']['media']) && is_array($ThisData['data']['Page']['media'])) {
    $animeList = $ThisData['data']['Page']['media'];

    // Filter anime list to only include entries with a non-null bannerImage
    $filteredAnimeList = array_filter($animeList, function($anime) {
        return !empty($anime['bannerImage']); // Check if bannerImage is not empty
    });

    // If there are any anime with a valid bannerImage, slice the array
    if (!empty($filteredAnimeList)) {
        $Anime = array_slice($filteredAnimeList, 0, 5); // Adjust the number as needed
        indexcarozdisplay($Anime);
    } else {
        echo "<p>No anime with banner images available.</p>";
    }
} else {
    echo "<p>No anime data available.</p>";
}
?>


        </div>
    </div>


    <!-- Trending Now Section -->
    <div>
        <div class="headtext">TRENDING NOW</div>
        <div class="main-content">
            <div class="owl-carousel owl-theme" id="cl1">
                <?php
                $TrendinData = fetchAniListData($trendingnow);
                if (isset($TrendinData['data']['Page']['media']) && is_array($TrendinData['data']['Page']['media'])) {
                    $animeList = $TrendinData['data']['Page']['media'];
                    $Anime = array_slice($animeList, 0, 10);
                    indexhorizdisplay($Anime);
                } else {
                    echo "<p>No anime data available.</p>";
                }
                ?>
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
                <?php
                $UpcominData = fetchAniListData($upcominganime);
                if (isset($UpcominData['data']['Page']['media']) && is_array($UpcominData['data']['Page']['media'])) {
                    $animeList = $UpcominData['data']['Page']['media'];
                    $Anime = array_slice($animeList, 0, 10);
                    indexhorizdisplay($Anime);
                } else {
                    echo "<p>No anime data available.</p>";
                }
                ?>
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
                    <?php
                    $popularData = fetchAniListData($popularQuery);
                    if (isset($popularData['data']['Page']['media']) && is_array($popularData['data']['Page']['media'])) {
                        $animeList = $popularData['data']['Page']['media'];
                        $Anime = array_slice($animeList, 0, 5);
                        indexdisplay($Anime);
                    } else {
                        echo "<p>No anime data available.</p>";
                    }
                    ?>
                    <div class="viewmore">
                        <a href="#" class="view-more-link">View More...</a>
                    </div>
                </div>
                <div class="cont">
                    <div class="animeclass">
                        <div class="headtext">MOST FAVOURITE</div>
                    </div>
                    <?php
                    $favoritesData = fetchAniListData($favoritesQuery);
                    if (isset($favoritesData['data']['Page']['media']) && is_array($favoritesData['data']['Page']['media'])) {
                        $animeList = $favoritesData['data']['Page']['media'];
                        $Anime = array_slice($animeList, 0, 5);
                        indexdisplay($Anime);
                    } else {
                        echo "<p>No anime data available.</p>";
                    }
                    ?>
                    <div class="viewmore">
                        <a href="#" class="view-more-link">View More...</a>
                    </div>
                </div>
                <div class="cont">
                    <div class="animeclass">
                        <div class="headtext">RECENTLY COMPLETED</div>
                    </div>
                    <?php
                    $recentlyCompletedData = fetchAniListData($recentlyCompletedQuery);
                    if (isset($recentlyCompletedData['data']['Page']['media']) && is_array($recentlyCompletedData['data']['Page']['media'])) {
                        $animeList = $recentlyCompletedData['data']['Page']['media'];
                        $Anime = array_slice($animeList, 0, 5);
                        indexdisplay($Anime);
                    } else {
                        echo "<p>No anime data available.</p>";
                    }
                    ?>
                    <div class="viewmore">
                        <a href="#" class="view-more-link">View More...</a>
                    </div>
                </div>
                <div class="cont">
                    <div class="animeclass">
                        <div class="headtext">ADMINS PICK</div>
                    </div>
                    <div class="animedata">
                        <?php
                        $idquery = getanimeid(21);
                        $adminpick = fetchAniListData($idquery);
                        if (isset($adminpick['data']['Page']['media']) && is_array($adminpick['data']['Page']['media'])) {
                            $animeList = $adminpick['data']['Page']['media'];
                            $Anime = array_slice($animeList, 0, 5);
                            indexdisplay($Anime);
                        } else {
                            echo "<p>No anime data available.</p>";
                        }
                        ?>
                        <?php
                        $idquery = getanimeid(114960);
                        $adminpick = fetchAniListData($idquery);
                        if (isset($adminpick['data']['Page']['media']) && is_array($adminpick['data']['Page']['media'])) {
                            $animeList = $adminpick['data']['Page']['media'];
                            $Anime = array_slice($animeList, 0, 5);
                            indexdisplay($Anime);
                        } else {
                            echo "<p>No anime data available.</p>";
                        }
                        ?>
                        <?php
                        $idquery = getanimeid(6702);
                        $adminpick = fetchAniListData($idquery);
                        if (isset($adminpick['data']['Page']['media']) && is_array($adminpick['data']['Page']['media'])) {
                            $animeList = $adminpick['data']['Page']['media'];
                            $Anime = array_slice($animeList, 0, 5);
                            indexdisplay($Anime);
                        } else {
                            echo "<p>No anime data available.</p>";
                        }
                        ?>
                        <?php
                        $idquery = getanimeid(86355);
                        $adminpick = fetchAniListData($idquery);
                        if (isset($adminpick['data']['Page']['media']) && is_array($adminpick['data']['Page']['media'])) {
                            $animeList = $adminpick['data']['Page']['media'];
                            $Anime = array_slice($animeList, 0, 5);
                            indexdisplay($Anime);
                        } else {
                            echo "<p>No anime data available.</p>";
                        }
                        ?>
                        <?php
                        $idquery = getanimeid(118586);
                        $adminpick = fetchAniListData($idquery);
                        if (isset($adminpick['data']['Page']['media']) && is_array($adminpick['data']['Page']['media'])) {
                            $animeList = $adminpick['data']['Page']['media'];
                            $Anime = array_slice($animeList, 0, 5);
                            indexdisplay($Anime);
                        } else {
                            echo "<p>No anime data available.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="animeModal" class="modal">
        <div class="modal-content">
            <div style="display: flex; float: right;">
                <a class="love" style="color:#aa4465; padding-right:10px"><i class="fa-regular fa-heart"></i></a>
                <span class="close">&times;</span>
            </div>
            <div class="anime-details">
                <div>
                    <img id="animeImage" src="" alt="" style="width: 200px; float: left; margin-right: 20px;">
                    <!-- Move the description div here -->
                    <div style="clear: both; padding-top: 10px;">
                        <p class="modtext">English Title: <span class="manstxt" id="animeEnglishTitle"></span></p>
                        <p class="modtext">Native Title: <span class="manstxt" id="animeNativeTitle"></span></p>
                        <p class="modtext">Average Score: <span class="manstxt" id="animeScore"></span></p>
                        <p class="modtext">Favourites: <span class="manstxt" id="animeFavourites"></span></p>
                    </div>
                </div>
                <div>
                    <h1 class="modtext" id="animeTitle"></h1>
                    <p class="modtext">Description: </p>
                    <p class="manstxt" id="animeDescription"></p> <!-- Description Element -->
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

// Clone the first and last items for seamless scrolling
const firstClone = items[0].cloneNode(true);
const lastClone = items[totalItems - 1].cloneNode(true);

carouselContainer.appendChild(firstClone); // Append first item to the end
carouselContainer.insertBefore(lastClone, items[0]); // Insert last item at the beginning

// Update the item count after cloning
const updatedTotalItems = totalItems + 2;

// Move the carousel to the specified index
function moveToIndex(index) {
    carouselContainer.style.transform = `translateX(-${index * 100}%)`;
}

// Automatic slide function
function autoSlide() {
    currentIndex++;
    moveToIndex(currentIndex);

    // Reset to the first item when reaching the last clone
    if (currentIndex >= updatedTotalItems - 1) {
        setTimeout(() => {
            currentIndex = 1; // Move to the first real item
            carouselContainer.style.transition = 'none'; // Disable transition for instant jump
            moveToIndex(currentIndex);
        }, 500); // Delay slightly to allow the transition to complete
    }

    // Reset transition property after the jump
    carouselContainer.style.transition = 'transform 0.5s ease-in-out';
}

// Set interval for automatic sliding every 3 seconds
setInterval(autoSlide, 3000);

// Optional: Allow manual control (e.g., by clicking)
document.querySelectorAll('.carousel-title').forEach((title, index) => {
    title.addEventListener('click', () => {
        currentIndex = index + 1; // Adjust for clones
        moveToIndex(currentIndex);
    });
});

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

    <script>
        $(document).ready(function () {
            // Function to show modal
            function showModal(animeId) {
                $.ajax({
                    url: 'https://graphql.anilist.co',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        query: `
                    {
                        Media(id: ${animeId}) {
                            id
                            title {
                                romaji
                                english
                                native
                            }
                            coverImage {
                                extraLarge
                            }
                            averageScore
                            favourites
                            description
                        }
                    }`
                    }),
                    success: function (response) {
                        const anime = response.data.Media;
                        // Populate the modal with data
                        $('#animeTitle').text(anime.title.romaji);
                        $('#animeEnglishTitle').text(anime.title.english || 'N/A');
                        $('#animeNativeTitle').text(anime.title.native || 'N/A');
                        $('#animeScore').text(anime.averageScore || 'N/A');
                        $('#animeFavourites').text(anime.favourites || 'N/A');
                        $('#animeImage').attr('src', anime.coverImage.extraLarge || 'default.jpg');

                        // Display the description as it is
                        $('#animeDescription').html(anime.description || 'No description available.');

                        // Show the modal
                        $('#animeModal').css('display', 'block');
                    },
                    error: function (error) {
                        console.error('Error fetching anime details:', error);
                    }
                });
            }

            // When the user clicks on an anime item
            $('.animecont').on('click', function () {
                const animeId = $(this).data('id'); // Get the ID from data attribute
                showModal(animeId);
            });

            $('.item').on('click', function () {
                const animeId = $(this).data('id'); // Get the ID from data attribute
                showModal(animeId);
            });

            $('.carousel-item').on('click', function () {
                const animeId = $(this).data('id'); // Get the ID from data attribute
                showModal(animeId);
            });

            // When the user clicks on <span> (x), close the modal
            $('.close').on('click', function () {
                $('#animeModal').css('display', 'none');
            });

            // When the user clicks anywhere outside of the modal, close it
            $(window).on('click', function (event) {
                if (event.target.id === 'animeModal') {
                    $('#animeModal').css('display', 'none');
                }
            });
        });
    </script>

</body>

</html>