<?php
class USER
{
    private $db;

    function __construct($conn)
    {
      $this->db = $conn;
    }

    public function login($uname,$umail,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:uname OR email=:umail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
              echo json_encode("user present");
             //if(password_verify($upass,password_hash($userRow['password'],PASSWORD_DEFAULT )))
            
              if(md5($upass)==$userRow['password'])
             {
                $_SESSION['user_session'] = $userRow['user_id'];
                /*$stmt = $this->db->prepare("UPDATE users SET status=1 WHERE user_name=:uname");
                $stmt->bindparam(":uname", $uname);
                $stmt->execute();*/
                //echo json_encode(password_hash($userRow['password'],PASSWORD_DEFAULT ));
                return true;
             }
             else
             {
                return false;
             }
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }

   public function redirect($url)
   {
       header("Location: $url");
   }

   public function logout()
   {
     try {
         /* $stmt1 = "UPDATE users SET status=0 WHERE user_name ='$username'";
          $this->db->exec($stmt1);*/
          session_destroy();
          unset($_SESSION['user_session']);
          return true;

     } catch (PDOException $e) {
       echo $e->getMessage();
       return false;
     }

   }
    
    public function sendMail($umail){
            $stmt = $this->db->prepare("SELECT * FROM users WHERE  email=:umail LIMIT 1");
           $stmt->bindparam(':umail',$umail);
           $stmt->execute();
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
                require_once "vendor/autoload.php";
                require_once "vendor/phpmailer/phpmailer/class.phpmailer.php";

                //PHPMailer Object
                $mail = new PHPMailer;

                //From email address and name
                $mail->From = "aditi.vasekar2009@gmail.com"; 
                $mail->FromName = "Aditi Vasekar";

                //To address and name
                $mail->addAddress("aditi.vasekar2009@gmail.com", "Aditi Vasekar");
                $mail->addAddress("aditi.vasekar2009@gmail.com"); //Recipient name is optional

                //Address to which recipient will reply
                $mail->addReplyTo($umail, "Reply");

                //CC and BCC
                

                //Send HTML or Plain Text email
                $mail->isHTML(true);

                $mail->Subject = "Subject Text";
                $mail->Body = "<i>Mail body in HTML</i>";
                $mail->AltBody = "This is the plain text version of the email content";

                if(!$mail->send()) 
                {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                    return false;
                } 
                else 
                {
                    echo "Message has been sent successfully";
                    return true;
                }
        }
        else
       {
           echo json_encode("Falied to send mail!!");
            return false;
       }
       
    }
    
   public function forgot_password($uname,$newpass)
   {
           $stmt = $this->db->prepare("SELECT * FROM users WHERE  user_name=:uname LIMIT 1");
           $stmt->bindparam(':uname',$uname);
           $stmt->execute();
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
                if($uname == $userRow['user_name']){
                        $hashed_new_pass = md5($newpass);
                        $stmt2 = $this->db->prepare("UPDATE users SET password=:new_password WHERE user_name=:uname");
                        $stmt2->bindparam(":uname", $uname);
                        $stmt2->bindparam(":new_password",$hashed_new_pass);
                        $stmt2->execute();
                         return true;
                        }
                    else{
                        return false;
                    }    
                    
                    
              
          }
       else
       {
           echo json_encode("Falied to change password!!");
       }
       
       
   }
  public function change_password($uname,$umail,$upass,$newpass){
     try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:uname OR email=:umail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
              //echo json_encode("user present");
             //if(password_verify($upass,password_hash($userRow['password'],PASSWORD_DEFAULT )))
            
              if(md5($upass)==$userRow['password'])
             {
                $hashed_new_pass=md5($newpass);
                //$_SESSION['user_session'] = $userRow['user_id'];
                $stmt = $this->db->prepare("UPDATE users SET password=:new_password WHERE user_name=:uname OR email=:umail");
                $stmt->bindparam(":uname", $uname);
                $stmt->bindparam(":umail", $umail);
                $stmt->bindparam(":new_password",$hashed_new_pass );
                $stmt->execute();
                //echo json_encode(password_hash($userRow['password'],PASSWORD_DEFAULT ));
                return true;
             }
             else
             {
                return false;
             }
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
  }


 

  

}
?>
