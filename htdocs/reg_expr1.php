<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>
    <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      Enter the US Phone no.<input type="text" name="number" />
      <input type="submit" name="submit" />
      <input type="reset" name="reset" />
    </form>
    <?php
      if(isset($_POST['submit'])){
        $number=$_POST['number'];
        $pattern='/[1-9][0-9]{9}/';
        if(!preg_match($pattern,$number)){
          echo '<b>Note:</b>Please enter 10 digit Phone no.';
        }
        else{
          
        /*$str1=substr($number,0,3);
        $str='('.$str1.')';
        $pattern='/^[0-9]{3}/';
        $new=preg_replace($pattern,$str1,$number);
        */
        //echo $number;
        $str1=substr($number,0,3);
        $str='('.$str1.')';
        $str2=substr($number,3);

        $str1.='-';
        $str3=substr($str2,0,3);
        $str4=substr($str2,3);
        $str1.=$str3;
        $str1.='-'.$str4;
        $pattern='/^[0-9]{3}/';
        $new=preg_replace($pattern,$str,$str1);
        echo $new;
        }
        //$str2=substr($number,3,3);
        //$str3=

      }
    ?>
  </body>
</html>
