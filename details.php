<?php
// Check if 'id' is passed via GET and sanitize it
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $animeId = (int) $_GET['id']; // Cast to integer to avoid potential issues like XSS
} else {
    // Redirect or handle the case when no anime ID is passed
    echo "Anime ID is missing!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Details</title>
    <!-- Include CSS styles (either internal or external) -->
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <!-- The Modal Structure -->
    <div id="animeModal" class="modal">
        <div class="modal-content">
            <div style="display: flex; float: right;">
                <a class="love" style="color:#aa4465; padding-right:10px">
                    <i class="fa-regular fa-heart"></i>
                </a>
                <span class="close">&times;</span>
            </div>
            <div class="anime-details">
                <div>
                    <img id="animeImage" src="" alt="" style="width: 200px; float: left; margin-right: 20px;">
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
                    <p class="manstxt" id="animeDescription"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle the Modal and AJAX -->
    <script>
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
                    $('#animeDescription').html(anime.description || 'No description available.');

                    // Show the modal
                    $('#animeModal').css('display', 'block');
                },
                error: function (error) {
                    console.error('Error fetching anime details:', error);
                }
            });
        }

        // Close the modal when the user clicks on the close button
        $('.close').on('click', function () {
            $('#animeModal').css('display', 'none');
        });

        // Close the modal if the user clicks outside of the modal content
        $(window).on('click', function (event) {
            if (event.target === document.getElementById('animeModal')) {
                $('#animeModal').css('display', 'none');
            }
        });

        // Call the function to show the modal on page load
        $(document).ready(function () {
            // The showModal function will be triggered with the animeId
            showModal(<?php echo $animeId; ?>); // Inject the animeId from PHP to JavaScript
        });
    </script>

</body>

</html>