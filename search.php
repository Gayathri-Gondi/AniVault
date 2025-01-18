<?php
// Include your functions if needed (assuming functions.php is included in this file)
include 'functions.php';

// Get the current year and season dynamically (optional)
$currentSeason = 'WINTER'; // Or calculate based on the current date
$currentYear = date('Y');

// Check if there is a search query passed through the URL (e.g., ?searchQuery=Naruto)
$animeSearchName = isset($_GET['searchQuery']) ? $_GET['searchQuery'] : ''; // Get the search query

// If a search query is provided, build the query string to pass to AniList
if (!empty($animeSearchName)) {
    // Create a GraphQL query with the search term
    $queryString = '
    {
        Page {
            media(
                search: "' . $animeSearchName . '", isAdult: false
            ) { 
                id
                title {
                    romaji
                    english
                    native
                }
                coverImage {
                    extraLarge
                }
                format
                bannerImage
                averageScore
                favourites
                trending
                seasonYear
            }
        }
    }';
    // Fetch data from AniList using the above query string
    $response = fetchAniListData($queryString);

    // Check if data is returned and process it
    if (isset($response['data']['Page']['media']) && is_array($response['data']['Page']['media'])) {
        $animeList = $response['data']['Page']['media'];
    } else {
        $animeList = [];
    }
} else {
    // If no search query is provided, set animeList as an empty array
    $animeList = [];
} ?>

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
            <a href="index.php"> <img class="logoimg" src="logo.png" alt="Logo"> <!-- Logo image --></a>
        </div>
        <!-- Right Container for Navigation Links -->
        <div class="rightcontainer">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="search.php">Search</a>
            <a class="nav-link" href="login.php">Login</a>
            <a class="nav-link subtn" href="signup.php">Sign Up</a>
        </div>
    </nav>

    <div class="search-box">
        <input type="text" id="searchQuery" placeholder="Search for an anime..." />
        <button onclick="searchAnime()">Search</button>
    </div>

    <!-- Display Results -->
    <div id="animeResults">
        <?php if (!empty($animeList)): ?>
            <div style="padding-left: 15px;">Search Results for: <?= htmlspecialchars($animeSearchName) ?></div>
            <?php

            searchdisplay($animeList);
            ?>
        <?php elseif ($_GET['searchQuery']): ?>
            <p>No results found for: <?= htmlspecialchars($animeSearchName) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <?php
        if (isset($_GET['value']) && !empty($_GET['value'])) {
            $popularQ = $_GET['value'];
            $popularData = fetchAniListData($popularQ);
            if (isset($popularData['data']['Page']['media']) && is_array($popularData['data']['Page']['media'])) {
                $animeList = $popularData['data']['Page']['media'];
                $Anime = array_slice($animeList, 0);
                searchdisplay($Anime);
            } else {
                echo "<p>No anime data available.</p>";
            }
        }
        ?>
    </div>

    <script>
        // Function to send the search query to the PHP backend via AJAX
        function searchAnime() {
            const Aname = document.getElementById("searchQuery").value;

            if (Aname.trim() !== "") {
                // Send AJAX request to the current page with the search query
                $.ajax({
                    url: window.location.href, // Current page URL
                    type: 'GET',
                    data: { searchQuery: Aname }, // Send the search query as a GET parameter
                    success: function (response) {
                        // Reload the page with the new search query
                        window.location.href = window.location.pathname + '?searchQuery=' + Aname;
                    },
                    error: function (error) {
                        console.error("Error:", error);
                    }
                });
            } else {
                alert("Please enter a search query.");
            }
        }
    </script>

    <script src="common.js"></script>
    <script>
        $(".item").on("click", function () {
            const animeId = $(this).data("id"); // Get the anime ID from the data attribute
            window.location.href = "details.php?id=" + animeId;
        });


        // Echo PHP variable directly to JavaScript console
        console.log(<?php echo json_encode($queryString); ?>);

        console.log(<?php echo json_encode($popularData); ?>);
    </script>

</body>

</html>