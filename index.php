<?php
require 'vendor/autoload.php';
$router = new AltoRouter();
$router->setBasePath('/SMS');
// map homepage
//echo "here";
$router->map( 'POST', '/login/', function() {
  
    	require_once 'connect.php';
       // echo json_encode($_POST);
        $uname = $_POST['user_name'];
        $umail = $_POST['email'];
        $upass = $_POST['password'];

        if($user->login($uname,$umail,$upass))
        {
           // $user->redirect('home.php');
             $logged="Logged in";
             echo json_encode($logged);
        }
        else
        {
            $error = "Wrong Details !";
            echo json_encode($error);
        }
    
});


$router->map( 'GET', '/logout/', function( ) {
 require_once 'connect.php';
  if($user->logout())
        {
           // $user->redirect('home.php');
             $Loggedout="Loggedout";
             echo json_encode($Loggedout);
        }
        else
        {
            $error = "Sorry could not logout!";
            echo json_encode($error);
        }
});

$router->map('POST' ,'/sendMail/',function(){
    require_once 'connect.php';
    $umail = $_POST['email'];
    if($user->sendMail($umail)){
        $success = "Mail sent!!";
        echo json_encode($success);
    }
    else{
        $failure = "Mail not sent!";
        echo json_encode($failure);
    }
});  

$router->map( 'POST', '/forgotPass/', function( ) {
 require_once 'connect.php';
   
        //$umail = $_POST['email'];
        $newpass = $_POST['new_password'];
        $uname = $_POST['user_name'];

        if($user->forgot_password($uname,$newpass))
        {
          
               $success = "Password changed !";
            echo json_encode($success);
             
        }
        else
        {
            $error = "failed to reset !";
            echo json_encode($error);
        }
});


$router->map( 'POST', '/resetPassword/', function( ) {
  		require_once 'connect.php';
        $uname = $_POST['user_name'];
        $umail = $_POST['email'];
        $upass = $_POST['password'];
        $newpass = $_POST['new_password'];
        if($user->reset_password($uname,$umail,$upass,$newpass))
        {
           // $user->redirect('home.php');
             $logged="Changed";
             echo json_encode($logged);
        }
        else
        {
            $error = "Wrong Details !";
            echo json_encode($error);
        }
  
});

$router->map('GET' ,'/checkLogin/',function( ){
    require_once 'connect.php';
    if($user->is_loggedin()){
        $success = "Session logged in";
        echo json_encode($success);
        echo json_encode($_SESSION['user_session']);
    }
    else{
         $failure = "Session ended!!";
        echo json_encode($failure);
    }
});




$router->map('GET','/loginCheck/',function( ){
    require_once 'connect.php';
    if($news->check_login()){
        echo json_encode($_SESSION['user_session']);
    }
    else{
        $failure = "Error in session!!";
        echo json_encode($failure);
    }
});

$router->map('POST','/insertFeed/',function( ){
    require_once 'connect.php';
    $title = $_POST['title'];
    $description = $_POST['description'];
   
    if($news->insert_feed($title,$description)){
        $insert = "Inserted!!";
        echo json_encode($insert);
    }
    else{
        $failure = "Error in insertion!!";
        echo json_encode($failure);
    }
});

$router->map('GET','/showFeed/',function( ){
   require_once 'connect.php';
   if($news->show_feed()){
       $success = "Success";
       echo json_encode($success);
   }    
    else{
        $failure = "Error in fetching!!";
        echo json_encode($failure);
    }
});

$router->map('POST','/editFeed/',function( ){
    require_once 'connect.php';
    $title = $_POST['title'];
    $description = $_POST['description'];
    if($news->edit_feed($title,$description)){
        $success = "Updated!";
        echo json_encode($success);
    }
    else{
         $failure = "Error in updating!!";
        echo json_encode($failure);
    }
});




/*$match = $router->match();
if($match) {
  require $match['target'];
}
else {
  header("HTTP/1.0 404 Not Found");
  require '404.html';
}*/
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>