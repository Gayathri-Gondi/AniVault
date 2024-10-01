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

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="nav">
        <!-- Left Container for Logo -->
        <div class="leftcontainer">
            <img class="logoimg" src="logo.png" alt="Logo" href="index.php"> <!-- Use src for image -->
        </div>
        <!-- Right Container for Navigation Links -->
        <div class="rightcontainer">
            <a class="nav-link" href="index.php">Home</a> <!-- Home link -->
            <a class="nav-link" href="search.php">Search</a> <!-- Search link -->
            <a class="nav-link" href="login.php">Login</a> <!-- Login link -->
            <a class="nav-link subtn" href="signup.php">Sign Up</a> <!-- Sign Up link -->
        </div>
    </nav>

    <div class="carousel">
        <div class="carousel-container">
            <div class="carousel-item active">Container 1</div>
            <div class="carousel-item">Container 2</div>
            <div class="carousel-item">Container 3</div>
            <div class="carousel-item">Container 4</div>
            <div class="carousel-item">Container 5</div>
        </div>
    </div>

    <div>
        <H1>Trending Now</H1>
    </div>

    <script>

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

        // Set interval for automatic sliding
        setInterval(autoSlide, 3000); // Change slides every 3 seconds
    </script>

</body>

</html>