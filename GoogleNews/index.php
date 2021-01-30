<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Google News API</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    //GOOGLE NEWS API 
    $url = "https://newsapi.org/v2/top-headlines?sources=google-news&apiKey=cf783e9c3cad4676983427661ff0868f";
    $response = file_get_contents($url);
    $newsData = json_decode($response);
    ?>
    <div class="jumbotron">
        <h1>Google NEWS API</h1>
    </div>

    <div class="container">
        <div class='row row-cols-5'>
            <?php
            foreach ($newsData->articles as $news) {
            ?>
                <div class="card" style="width: 25rem;">
                    <?php
                    //Si el autor es desconocido
                    if ($news->author != "") {
                    ?>
                        <div class="card-header">
                            <?php echo $news->author ?>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="card-header">
                            Unknown author
                        </div>
                    <?php
                    }
                    ?>
                    <img src="<?php echo $news->urlToImage ?>" alt="News thumbnail" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $news->title ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $news->description ?></h6>
                        <p class="card-text"><?php echo $news->content ?></p>
                        <div class="card-header">
                            <?php echo $news->publishedAt ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>