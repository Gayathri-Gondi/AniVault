<?php
// Include the query file to fetch data
include 'queries.php';

function fetchAniListData($query)
{
    $url = "https://graphql.anilist.co";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['query' => $query]));
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        return null;
    }
    $data = json_decode($response, true);
    curl_close($ch);
    return $data;
}

function indexdisplay($animeList)
{
    echo '
<div class="animedata">';
    foreach ($animeList as $anime) {
        $title = $anime['title']['romaji'] ?? 'Unknown Title';
        $coverImage = $anime['coverImage']['extraLarge'] ?? 'default.jpg';
        $averageScore = $anime['averageScore'] ?? 'N/A';
        //$episodes = $anime['episodes'] ?? $anime['nextAiringEpisode']['episodes'] ?? 0;
        $year = $anime['seasonYear'];
        $type = $anime['format'];
        $id = $anime['id'] ?? 0;

        echo '<div class="animecont" data-id="' . intval($id) . '">
        <img class="animeimg" src="' . htmlspecialchars($coverImage) . '" alt="' . htmlspecialchars($title) . '">
        <div class="animeinfo" style="align-content: center;">
            <div class="animetitle">' . htmlspecialchars($title) . '</div>
            <div class="tptxt"> ' . htmlspecialchars($year) . '  <span class="dot"></span>  ' . htmlspecialchars($type) . '</div>
        </div>
    </div>';
    }
    echo '</div>';
}

function getanimeid($animeid)
{
    $getbyid = '
{
Page {
        media(id: ' . intval($animeid) . ') {
            id
            title {
                romaji
            }
            coverImage {
                extraLarge
            }
            format
            seasonYear
            averageScore
            favourites
        }
    }
}';

    return $getbyid;
}

function indexhorizdisplay($animeList)
{
    foreach ($animeList as $anime) {
        $title = $anime['title']['romaji'] ?? 'Unknown Title';
        $coverImage = $anime['coverImage']['extraLarge'] ?? 'default.jpg';
        $averageScore = $anime['averageScore'] ?? 'N/A';
        $favourites = $anime['favourites'] ?? 0;
        $id = $anime['id'] ?? 0;

        echo '<div class="item" data-id="' . intval($id) . '">
                    <img class="item-content" src="' . htmlspecialchars($coverImage) . '">
                    <div class="item-title">' . htmlspecialchars($title) . '</div>
              </div>';
    }
}

function indexcarozdisplay($animeList)
{
    foreach ($animeList as $anime) {
        $title = $anime['title']['romaji'] ?? 'Unknown Title';
        $coverImage = $anime['coverImage']['extraLarge'] ?? 'default.jpg';
        $bannerImage = $anime['bannerImage'] ?? null; // Removed extra quote
        $averageScore = $anime['averageScore'] ?? 'N/A';
        $favourites = $anime['favourites'] ?? 0;
        $id = $anime['id'] ?? 0;
        if (!$bannerImage) {
            continue; // Skip to the next iteration
        }

        $activeClass = ($index === 0) ? 'active' : '';
        echo '
        <div class="carousel-item"  data-id="' . intval($id) . '">
                <img class="carousel-img" src="' . htmlspecialchars($bannerImage) . '">
                <h2 class="carousel-title">' . htmlspecialchars($title) . '</h2>
            </div>    
        ';
    }
}

function searchdisplay($animeList)
{
    echo '
<div class="searchdata">';
    foreach ($animeList as $anime) {
        $title = $anime['title']['romaji'] ?? 'Unknown Title';
        $coverImage = $anime['coverImage']['extraLarge'] ?? 'default.jpg';
        $averageScore = $anime['averageScore'] ?? 'N/A';
        $year = $anime['seasonYear'];
        $type = $anime['format'];
        $id = $anime['id'] ?? 0;

        echo '<div class="searchcont item" data-id="' . intval($id) . '">
        <img class="animeimg" src="' . htmlspecialchars($coverImage) . '" alt="' . htmlspecialchars($title) . '">
        <div class="animeinfo" style="align-content: center;">
            <div class="animetitle">' . htmlspecialchars($title) . '</div>
            <div class="tptxt"> ' . htmlspecialchars($year) . '  <span class="dot"></span>  ' . htmlspecialchars($type) . '</div>
        </div>
    </div>';
    }
    echo '</div>';
}

function getAnimeByName($Aname)
{
    $getbyname = '
{
Page {
query Media($search: String, $format: MediaFormat) {
  media(search: ' . intval($Aname) . ') {
            id
            title {
                romaji
            }
            coverImage {
                extraLarge
            }
            format
            seasonYear
            averageScore
            favourites
        }
    }
}
}';

    return $getbyname;
}