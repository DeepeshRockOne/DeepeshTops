<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("button").click(function(){
    $("div").animate({
      left: '250px',
      opacity: '0.5',
      height: '150px',
      width: '150px'
    });
  });
});
</script> 
</head>
<body>

<button>Click Here To Start Animation</button>
<br><br>
<div style="background:#98bf21;height:100px;width:100px;position:absolute;"></div>

</body>
</html>