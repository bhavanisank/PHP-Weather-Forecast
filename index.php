<?php
$weather = "";

if (isset($_GET['city'])) {
    $city = str_replace(' ', '', $_GET['city']);
    $url = "http://www.weather-forecast.com/locations/" . $city . "/forecasts/latest";
    $file_headers = @get_headers($url);

    if ($file_headers && $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        echo '<div class="alert alert-danger" role="alert">This city is not found</div>';
    } else {
        $forecastpage = @file_get_contents($url); // Use @ to suppress warning
        if ($forecastpage) {
            $pageArray = explode('(1&ndash;3 days)</div><p class="b-forecast__table-description-content"><span class="phrase">', $forecastpage);
            if (isset($pageArray[1])) {
                $secondpageArray = explode('</span></p></td><td class="b-forecast__table-description-cell--js" colspan="9">', $pageArray[1]);
                $weather = $secondpageArray[0];
            } else {
                echo '<div class="alert alert-danger" role="alert">Weather information not found</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Failed to fetch weather data</div>';
        }
    }
}
?>

<!-- Rest of your HTML code -->


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Weather Scrapper</title>
    <style type="text/css">

html {
  background: url(background.jpg) no-repeat center center fixed;
  background-size: cover;
  height: 100%;
  overflow: hidden;
}
#weather{


  margin-top: 15px;
}
body{

    background:none;
}
input{
    margin:20px 0;
}
.container{
    text-align:center;
    margin-top: 100px;
    width:450px;
}
    </style>
  </head>
  <body>
    <div class="container">
     <h1>What's the weather?</h1>
     <form>
        <fieldset class="form-group">
          <label for="city">Enter the name of the city.</label>
          <input type="text" class="form-control" name="city"  id="city"  placeholder="Eg.London,tokyo"  >
</fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="weather"><?php   
               if($weather){

                  echo  '<div class="alert alert-success" role="alert">
                        '.$weather.'
                </div>';
               }
        
        ?></div>
     
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>