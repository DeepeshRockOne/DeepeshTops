<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leap Year</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
      <div class="container mt-3 col-md-6" >
        <h2>FIND THE LEAP YEAR PROGRAM FROM 1901 TO 2016</h2>
        <?php 
          $start_year=1901;
          $end_year=2016;

          for ($year = $start_year; $year <= $end_year; $year++) {
              if ($year % 4 == 0) {
                  echo $year . " is a leap year.<br>";
              } else {
                  echo $year . " is not a leap year.<br>";
              }
          }
      ?>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>