<?php

function getSeasonsAndYears()
{
    $month = date('n'); // Numeric representation of a month (1 to 12)
    $currentYear = date('Y'); // Current year

    // Define an array for seasons
    $seasons = ['WINTER', 'SPRING', 'SUMMER', 'FALL'];

    // Determine the current season index
    if ($month >= 3 && $month <= 5) {
        $currentSeasonIndex = 1; // SPRING
    } elseif ($month >= 6 && $month <= 8) {
        $currentSeasonIndex = 2; // SUMMER
    } elseif ($month >= 9 && $month <= 11) {
        $currentSeasonIndex = 3; // FALL
    } else {
        $currentSeasonIndex = 0; // WINTER
    }

    // Get current, previous, and next seasons
    $currentSeason = $seasons[$currentSeasonIndex];
    $previousSeason = $seasons[($currentSeasonIndex - 1 + 4) % 4];
    $nextSeason = $seasons[($currentSeasonIndex + 1) % 4];

    // Determine the year for each season
    $previousYear = $currentYear;
    $nextYear = $currentYear;

    if ($currentSeasonIndex === 0) { // If current is WINTER
        $previousYear--; // Previous season is FALL of the previous year
    } elseif ($currentSeasonIndex === 1) { // If current is SPRING
        $previousYear--; // Previous season is WINTER of the previous year
    }

    if ($currentSeasonIndex === 3) { // If current is FALL
        $nextYear++; // Next season is WINTER of the next year
    }

    // Return seasons and years separately
    return [
        'currentSeason' => $currentSeason,
        'currentYear' => $currentYear,
        'previousSeason' => $previousSeason,
        'previousYear' => $previousYear,
        'nextSeason' => $nextSeason,
        'nextYear' => $nextYear,
    ];
}

// Example usage
$seasonsData = getSeasonsAndYears();

$currentSeason = $seasonsData['currentSeason'];
$currentYear = $seasonsData['currentYear'];
$previousSeason = $seasonsData['previousSeason'];
$previousYear = $seasonsData['previousYear'];
$nextSeason = $seasonsData['nextSeason'];
$nextYear = $seasonsData['nextYear'];

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
                extraLarge
            }
            format
            bannerImage
            averageScore
            favourites
            seasonYear
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
                extraLarge
            }
            format
            bannerImage
            averageScore
            favourites
            seasonYear
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
                extraLarge
            }
            format
            bannerImage
            averageScore
            favourites
            seasonYear
        }
    }
}';

// Recently completed anime query
$recentlyCompletedQuery = '
{
  Page {
    media(sort: POPULARITY_DESC, season:  ' . $previousSeason . ', seasonYear: ' . intval($previousYear) . ', status: FINISHED) {
      id
      title {
        romaji
      }
      coverImage {
        extraLarge
      }
            format
      bannerImage
      averageScore
      favourites
      episodes
      description
      seasonYear
      startDate {
        year
        month
        day
      }
      endDate {
        year
        month
        day
      }
    }
  }
}';

$trendingnow = '
{
    Page {
        media(status: RELEASING, sort: [TRENDING_DESC], type: ANIME) { 
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
            seasonYear
            averageScore
            favourites
            trending
        }
    }
}';

$upcominganime = '
{
    Page {
        media(season:  ' . $nextSeason . ', seasonYear: ' . intval($nextYear) . ',  sort: [TRENDING_DESC], type: ANIME) { 
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

$popseasonnow = '
{
    Page {
        media(season:  ' . $currentSeason . ', seasonYear: ' . intval($currentYear) . ',  sort: [TRENDING_DESC], type: ANIME) { 
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
