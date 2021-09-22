<?php
session_start();
  if(isset($_POST["vercode"])){
  if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code try again');</script>" ;
    } 
  else{
   
    header("Location: success.php");
    die();
  }}

 header('Refresh:180;URL= timeout.php');
?>
<?php include('header.php'); ?>
  <h3 style="color:red" align="center">
 Complete the form in : <span id='timer'></span>
 </h3>
    <form action="" method="post" style="width: 60%; border-style: dashed; padding: 5%; margin: 1%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" class="mx-auto">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" required="required">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" required="required">
        </div>
        <div class="form-group">
            <label for="about">About Yourself</label>
            <textarea class="form-control" id="about" rows="3"></textarea>
        </div>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" required="required"><br>


        <div class="form-group">
            <input type="text" name="vercode" class="form-control" placeholder="Enter the verification code given below" required="required">
        </div>
        <div class="form-group small clearfix">
            <label class="checkbox-inline">Verification Code:</label>
            <img src="captcha.php">
        </div>
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Submit">
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

<?php include('footer.php'); ?>