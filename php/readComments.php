<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
error_reporting(E_ERROR | E_PARSE);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sunwintours";


$conn = mysql_connect($servername, $username, $password, $dbname);

class UserSC{
    var $ID;
    var $Name;
    var $Email;
    var $Image;
    var $Comment;
    
    function setID($id){
         $this->ID = $id;
      }
    
    function setName($name){
        $this->Name = $name;
    }
    
    function setMail($mail){
        
        $this->Email = $mail;
    }
    
    
    function setImage($image){
        $this->Image = $image;
    }
    
    function setComment($comment){
        $this->Comment = $comment;
    }
      
}



if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$sql = "select * from usercomments";
mysql_select_db('sunwintours');
$retval = mysql_query( $sql, $conn );

if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
//echo "Hello";
$dataArray=array();


   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
       $Elements = new UserSC;
       $Elements->setID($row['id']);
       $Elements->setName($row['username']);
       $Elements->setMail($row['useremail']);
       $Elements->setImage($row['profileimg']);
       $Elements->setComment($row['usercomment']);
       array_push($dataArray,$Elements);
      
   }

    echo json_encode($dataArray);
    //echo $dataArray;

   mysqli_close($conn);




?>