<?php
require 'vendor/autoload.php';
$router = new AltoRouter();
$router->setBasePath('/SMS');
// map homepage
//echo "here";
$router->map( 'POST', '/login/', function() {
  
    	require_once 'connect.php';
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


$router->map( 'POST', '/changePassword/', function( ) {
  		require_once 'connect.php';
        $uname = $_POST['user_name'];
        $umail = $_POST['email'];
        $upass = $_POST['password'];
        $newpass = $_POST['new_password'];
        if($user->change_password($uname,$umail,$upass,$newpass))
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