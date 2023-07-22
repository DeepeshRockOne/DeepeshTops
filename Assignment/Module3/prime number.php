<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 <style>
    .container{
      border:2px solid black;

    }
    </style>
</head>
  

  <body>
    
<div class="container mt-3 col-md-6" >
  <h2 class="text-center">Armstorng or not Program</h2>
<hr>
  <form action=""method="post">
  <div class="mb-3 mt-3">
      <label for="number">ENTER NUMBER 1:</label>
      <input type="number" class="form-control" name="num" placeholder="Enter  THE NUMBER" >
    </div>
    
    
    <button type="submit"  name="submit"class="btn btn-primary">Submit</button>
  </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
<?php
if(isset($_POST['submit']))
{
    $num=$_POST['num'];
    $a=$num;
    $sum=0;
    while($a!=0){
          $rem=$a%10;
          $sum=$sum+($rem+$rem=$rem);
          $a=$a/10;
    }
    if($num==$sum){
        echo"yes $num is AMSTORNG NUMBER";
    }else{
        echo" $num is not AMSTORNG NUMBER";
    }
}

?>
       <!-- AMSTORNG number is yes or not -->
       
