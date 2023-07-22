
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <style>
    .container{
        border:2px solid  black;
    }
    </style>
  <body>

    

<div class="container mt-3">
  <h2 class="text-center"> STUDENT SUBJECT MARKS</h2>
  <form action="" method="post">
    <div class="mb-3 mt-3">
      <label>ENTER MATHS MARKS:</label>
      <input type="number" class="form-control"  placeholder="Enter MATHS MARKS" name="maths">
    </div>
    <div class="mb-3">
      <label>ENTER THE Chemistry MARKS:</label>
      <input type="number" class="form-control"  placeholder="Enter Chemistry marks" name="physic" require>
    </div>
    <div class="mb-3 mt-3">
      <label>ENTER Computer Marks:</label>
      <input type="number" class="form-control"  placeholder="Enter COMUTER MARKS" name="computer"require>
    </div>
    <div class="mb-3">
      <label>ENTER THE biology Marks:</label>
      <input type="number" class="form-control"  placeholder="Enter BIOLOGY marks" name="biology" require>
    </div>
    <div class="mb-3 mt-3">
      <label>ENTER Physic MARKS:</label>
      <input type="number" class="form-control"  placeholder="Enter PHYSIC MARKS" name="physic" require>
    </div>
    
    
    <button type="submit"  name="submit"class="btn btn-primary my-3">Submit</button>
  </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>

<?php
if(isset($_POST['submit']))
{

  $maths=$_POST['maths'];
  $physic=$_POST['physic'];
  $computer=$_POST['computer'];
  $biology=$_POST['biology'];
  $physic=$_POST['physic'];
  $precision =4;
  $total=($maths+$physic+$computer+$biology+$physic);
  $per=($total/500.0)*100;
  $avg= $total/5.0 ; $precision;
  echo"the total number of five subject marks=".$total."";
  echo"</br>";
  
  echo"the avergae  number of five subject marks=".$avg."";
  echo"</br>";
  if($per>=75)
  {
    echo "first class";
  }else if($per>=60)
  {
    echo"second class";
  }
  else if($per>50)
  {
    echo"third class";
  }
  else if($per>40)
  {
    echo"fail";
  }

}
?>


