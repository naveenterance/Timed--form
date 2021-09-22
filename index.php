<?php
session_start();
  if(isset($_POST["vercode"])){
  if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code try again');</script>" ;
    } 
  else{
    echo "<script>alert('Details submitted !');</script>" ;
  }}
?>
<!DOCTYPE html>
<html>

<head>
    <?php header('Refresh:180;URL= http://localhost/aelum/timeout.php'); ?>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
  <h3 style="color:#FF0000" align="center">
 Complete the form in : <span id='timer'></span>
 </h3>
    <form action="" method="post" style="width: 60%; border-style: dashed; padding: 5%; margin: 1%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" class="mx-auto">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" required="required">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" required="required">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">About Yourself</label>
            <textarea class="form-control" id="about" rows="3"></textarea>
        </div>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" required="required">

        <div class="form-group">
            <input type="text" name="vercode" class="form-control" placeholder="Verfication Code" required="required">
        </div>
        <div class="form-group small clearfix">
            <label class="checkbox-inline">Verification Code</label>
            <img src="/captcha.php">
        </div>
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="submit">
    </form>
    
<script >

var c = 180;
var t;
timedCount();

function timedCount() {


    var minutes = parseInt(c / 60) % 60;
    var seconds = c % 60;

    var result = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);


    $('#timer').html(result);

    c = c - 1;
    t = setTimeout(function() {
            timedCount()
        },
        1000);
} 
</script>
</body>

</html>