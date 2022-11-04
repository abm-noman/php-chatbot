<?php
// Connecting to Database

$conn = mysqli_connect("localhost", "root", "", "chatbot" ) or die("Database Error");

//Getting User Message through ajax
$getMsg = mysqli_real_escape_string($conn, $_POST['text']);

//Checking User query to Database Query
$check_data = "SELECT replies FROM bot WHERE queries LIKE '%$getMsg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// If user query matches Database Queries, We will show Replies Otherwise else statement
if(mysqli_num_rows($run_query) > 0){
    //Fetching reply from Database
    $fetch_data = mysqli_fetch_assoc($run_query);
    $reply = $fetch_data['replies'];
    echo $reply;
}else{
    echo "Sorry! I can't get you.";
}


?>