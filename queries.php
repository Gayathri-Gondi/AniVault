<?php
function fetchAniListData($query)
{
  // Set the URL for the AniList GraphQL endpoint
  $url = "https://graphql.anilist.co";

  // Initialize cURL session
  $ch = curl_init($url);

  // Set options
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
  ]);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['query' => $query]));

  // Execute the request
  $response = curl_exec($ch);

  // Check for cURL errors
  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    return null;
  }

  // Decode the JSON response
  $data = json_decode($response, true);

  // Close the cURL session
  curl_close($ch);

  return $data;
}

// Function to display anime data
function displayAnime($animeList)
{
  foreach ($animeList as $anime) {
    // Accessing properties; adjust as per your API response structure
    $title = $anime['title']['romaji'] ?? 'Unknown Title';
    $coverImage = $anime['coverImage']['large'] ?? 'default.jpg'; // Use a default image if none available
    $averageScore = $anime['averageScore'] ?? 'N/A';

    echo '<div class="anime-cont">';
    echo '<img src="' . htmlspecialchars($coverImage) . '" alt="' . htmlspecialchars($title) . '">';
    echo '<h2>' . htmlspecialchars($title) . '</h2>';
    echo '<p>Score: ' . htmlspecialchars($averageScore) . '</p>';
    echo '</div>';
  }
}


// Define queries for different categories
$popularQuery = '
{
  Page {
    media(sort: POPULARITY_DESC) {
      id
      title {
        romaji
      }
      coverImage {
        medium
      }
      averageScore
    }
  }
}';

$topRatedQuery = '
{
  Page {
    media(sort: SCORE_DESC) {
      id
      title {
        romaji
      }
      coverImage {
        medium
      }
      averageScore
    }
  }
}';

$favoritesQuery = '
{
  Page {
    media(sort: FAVOURITES_DESC) {
      id
      title {
        romaji
      }
      coverImage {
        medium
      }
      averageScore
    }
  }
}';

// Fetch and display different categories
echo "<h1>Popular Anime</h1>";
$popularData = fetchAniListData($popularQuery);

// Check if the response has the media and is an array
if (isset($popularData['data']['Page']['media']) && is_array($popularData['data']['Page']['media'])) {
  // Get the media array
  $animeList = $popularData['data']['Page']['media'];

  // Limit the display to top 5
  $topAnime = array_slice($animeList, 0, 5);

  // Call displayAnime with the top 5 anime
  displayAnime($topAnime);

  // Link to view more
  echo '<div><a href="view_more.php">View More...</a></div>';
} else {
  echo "<p>No anime data available.</p>";
}


echo "<h1>Top Rated Anime</h1>";
$topRatedData = fetchAniListData($topRatedQuery);
if ($topRatedData) {
  displayAnime($topRatedData['data']['Page']['media']);
}

echo "<h1>Most Favorite Anime</h1>";
$favoritesData = fetchAniListData($favoritesQuery);
if ($favoritesData) {
  displayAnime($favoritesData['data']['Page']['media']);
}
