<?php 
/*

echo $_POST["user_name"];

echo "<br/>". $_POST["user_email"];

echo "<br/>". $_POST["user_comment"];

echo "<br/>". $_FILES['profile_image']['name'];
*/

error_reporting(E_ERROR | E_PARSE);




move_uploaded_file($_FILES['profile_image']['tmp_name'],"user_images/".$_FILES['profile_image']['name'].$_POST["username1"]);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sunwintours";

$username1 = mysql_real_escape_string($_POST["user_name1"]);
//$username1=mysql_real_escape_string($username1);
$useremail = mysql_real_escape_string($_POST["user_email"]);

$img = mysql_real_escape_string($_FILES['profile_image']['name'].$_POST["username1"]);
$usercomment = mysql_real_escape_string($_POST['user_comment']);

echo $username1;
echo "<br>".$useremail;
echo "<br>".$img;
echo "<br>".$usercomment."<br>";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "insert into usercomments(username,useremail,profileimg,usercomment) values('$username1','$useremail','$img','$usercomment')";

if (mysqli_query($conn,$sql)) {
    
header("Location: ../#TripAdvice");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);


?>