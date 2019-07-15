<?php
$apiKey = '6fb62772f7d746de8a1aa10ff291697c';

//utility function
function sendRequest($url)
{
    $client = curl_init($url);
    //set option 'RETURNTRANSFER' to store response in variable, set true to return as string
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    //parse response, set true to return as array
    return json_decode($response, true);
}

function getArticles($url)
{
    $result = sendRequest($url);

    echo '<div class="album py-5 bg-light">
        <div class="container">
            <div class="row">';

    foreach ($result['articles'] as $article) {
        echo '
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="' . $article['urlToImage'] . '" class="card-img-top" alt="img missing">
                        <div class="card-body">
                            <h5 class="card-title">' . $article['title'] . '</h5>
                            <p class="card-text"> ' . $article['content'] . '</p>
                            <a href="' . $article['url'] . '" class="btn btn-primary" target="_blank">View article</a>
                        </div>
                    </div>
                </div>';
    }
    echo '</div>
                </div>';
}

function getSources($url)
{
    $result = sendRequest($url);

    echo '<div class="album py-5 bg-light">
        <div class="container">
            <div class="row">';

    foreach ($result['sources'] as $source) {
        echo '
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">' . $source['name'] . '</h5>
                            <p class="card-text"> ' . $source['description'] . '</p>
                            <a href="' . $source['url'] . '" class="btn btn-primary" target="_blank">View source</a>
                        </div>
                    </div>
                </div>';
    }
    echo '</div>
                </div>';
}

$function = $_GET['function'];

switch ($function) {
    case ('getTopNews'):
        $url = "https://newsapi.org/v2/top-headlines?country=" . $_GET['country'] . "&category=" . $_GET['category'] . "&apiKey=" . $GLOBALS['apiKey'];
        getArticles($url);
        break;
    case ('searchByTopic'):
        $url = "https://newsapi.org/v2/everything?q=" . $_GET['topic'] . "&pageSize=100&apiKey=" . $GLOBALS['apiKey'];
        getArticles($url);
        break;
    case ('getSources'):
        if($_GET['country'] == 'all' && $_GET['category'] == 'all'){
            $url = "https://newsapi.org/v2/sources?apiKey=" . $GLOBALS['apiKey'];
        }else if($_GET['country'] == 'all' && $_GET['category'] != 'all'){
            $url = "https://newsapi.org/v2/sources?category=" . $_GET['category'] . "&apiKey=" . $GLOBALS['apiKey'];
        }else if($_GET['country'] != 'all' && $_GET['category'] == 'all'){
            $url = "https://newsapi.org/v2/sources?country=" . $_GET['country'] . "&apiKey=" . $GLOBALS['apiKey'];
        }else{
            $url = "https://newsapi.org/v2/sources?country=" . $_GET['country'] . "&category=" . $_GET['category'] . "&apiKey=" . $GLOBALS['apiKey'];
        }
        getSources($url);
        break;
}
