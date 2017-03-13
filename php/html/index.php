<?php

require "/var/www/html/group16/pa6_z7o0l26s9k9/server.php";
  
    session_save_path("/var/www/html/group16/pa2_z7o0l26s9k9/php/sessions/");
    session_start();
   $con = mysql_connect("localhost", "group16", "wangxiaofei");
   if (!$con) {
       echo "Could not connect";
       die(' error'.mysql_error());
   } 
   $temp = mysql_select_db("group16", $con);

   // Include the Smarty Templating Engine
   define('SMARTY_DIR', __DIR__ . '/Smarty-3.1.14/libs/');
   require_once(SMARTY_DIR . 'Smarty.class.php');
   $smarty = new Smarty();

   $smarty->setTemplateDir(__DIR__ . '/templates/templates/');
   $smarty->setCompileDir(__DIR__ . '/templates/templates_c/');
   $smarty->setConfigDir(__DIR__ . '/templates/configs/');
   $smarty->setCacheDir(__DIR__ . '/templates/cache/');

   // Notice how you can set variables here in the PHP that will get carried into the template files
   $smarty->assign('title', "EECS485");


   // Setup the Routing Framework
   require_once __DIR__ . '/vendor/autoload.php';
   $klein = new \Klein\Klein();


   /* Define routes here */


   $klein->respond('GET', '/rgrnke/pa2', function ($request, $response, $service) use ($smarty) {

    if ((isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 < time()) || !isset($_SESSION['lastactivity'])) {
      $smarty->assign('log',false);
      $log = false;
      session_destroy();
    } else {
      $smarty->assign('username', $_SESSION['username']);
      $smarty->assign('log',true);
      $_SESSION['lastactivity'] = time();
      $log = true;
      $username = $_SESSION['username'];
    }

    $query = "select username from User";
    $result = mysql_query($query);
    if (!$result) {
         echo "Mysql error: " . mysql_error();
         exit;
    } 

    $usernum = mysql_num_rows($result);
    $smarty->assign('usernum', $usernum);
    for ($i = 0; $i < $usernum; ++$i){
        $users[$i] = mysql_result($result, $i, "username");    
        $temp_name = $users[$i];
        $smarty->assign('users'.$i, $users[$i]);  
        if ($log) {
          if ($username == $users[$i]) {
            $album_query = "select * from Album A where A.username = '$username'";
          } else {
            $album_query = "select * from Album A where (A.access = 'public' and A.username = '$temp_name')
                      union
                      select * from Album A where A.albumid in (select albumid from AlbumAccess where username = '$username') 
                      and A.username = '$temp_name'";            
          }


        } else {
          $album_query = "select * from Album A where A.access = 'public' and A.username = '$temp_name'";
        }

        // echo $album_query . "\n";
        $album_result = mysql_query($album_query);
        if (!$album_result) {
             echo "Mysql error: " . mysql_error();
             exit;
        }  

        $albumnum[$i] = mysql_num_rows($album_result);
        $smarty->assign('albumnum'.$i, $albumnum[$i]); 
        for ($j=0; $j < $albumnum[$i]; $j++) {
            $album[$i][$j] = mysql_result($album_result, $j, "title");
            $albumid[$i][$j] = mysql_result($album_result, $j, "albumid");
            $smarty->assign('album'.$i.$j, $album[$i][$j]);
            $smarty->assign('albumid'.$i.$j, $albumid[$i][$j]);
        }
    }   

    $smarty->assign('album', $album);  
  
    $smarty->display('index.tpl');

   });

   $klein->respond('GET', '/rgrnke/pa2/', function ($request, $response, $service) use ($smarty) {
        echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";
   });

   $klein->respond('POST', '/rgrnke/pa2', function ($request, $response, $service) use ($smarty) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!$username){
      echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";
      exit;
    }

    $query = "select * from User where username = '$username'";
    $result = mysql_query($query);
      $num = mysql_num_rows($result);
    if($num == 0){
      echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2/wrongPassword" . "\";</script>";
      exit;
    }
    $existPassword = mysql_result($result,0,"password");
     $active = mysql_result($result,0,"active");

    if($password != $existPassword || $active == 'false'){
      echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2/wrongPassword" . "\";</script>";
      exit;
    } 
//define sessions
    $_SESSION['username'] = $username;
    $_SESSION['lastactivity'] = time();

    echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";

   });

  $klein->respond('GET', '/rgrnke/pa2/wrongPassword', function ($request, $response, $service) use ($smarty) {
    echo "you input the wrong password";
    echo "<br>";
    echo "Click <a href = '/rgrnke/pa2'>Here</a> to go back to home page";
   });

 $klein->respond('GET', '/rgrnke/pa2/login\?[:url]?', function ($request, $response, $service) use ($smarty) {
  $url = $_GET['url'];
  $standardUrl = str_replace("_", "/", $url);
  $smarty->assign('url',$standardUrl);
  $smarty->display('login.tpl');
});

 $klein->respond('POST', '/rgrnke/pa2/login', function ($request, $response, $service) use ($smarty) {
  $url = $_POST['url'];
  $changeurl = str_replace("/", "_", $url);
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "select * from User where username = '$username'";
  $result = mysql_query($query);
  $getPassword = mysql_result($result, 0 , 'password');
  $active = mysql_result($result,0,'active');
  if($password != $getPassword || $active == 'false'){
      echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2/login?url=$changeurl" . "\";</script>";
  }
  $_SESSION['username'] = $username;
  $_SESSION['lastactivity'] = time();
  echo "<script>window.location.href=" . "\"" . "$url" . "\";</script>";
});

  $klein->respond('POST', '/rgrnke/pa2/logout', function ($request, $response, $service) use ($smarty) {
  session_destroy();
  echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";
   });

    

  $klein->respond('GET', '/rgrnke/pa2/user',function ($request, $response, $service) use ($smarty){

    if ((isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 < time()) || !isset($_SESSION['lastactivity'])) {
      $smarty->assign('log',false);
      session_destroy();
      $smarty->display('user.tpl');
    } else {
      $smarty->assign('username', $_SESSION['username']);
      $smarty->assign('log',true);
      $_SESSION['lastactivity'] = time();
      echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2/user/edit" . "\";</script>";
    }
});

$klein->respond('POST', '/rgrnke/pa2/user',function ($request, $response, $service) use ($smarty){
  
  $username =$_POST['username'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $retypepassword = $_POST['password_retype'];
  if($password != $retypepassword){
    echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";
    exit;
  }

  $query  = "INSERT INTO User (username, firstname, lastname, email, password, active)
    VALUES ('$username', '$firstname', '$lastname', '$email', '$password', 'false')";
    $result = mysql_query($query);
  echo $query;
  $message = "You have signed up at online album! Click here to activate your account.    ". "http://eecs485-02.eecs.umich.edu:5616/rgrnke/pa2/confirm?username=$username";

  // In case any of our lines are larger than 70 characters, we should use wordwrap()
  $message = wordwrap($message, 70, "\r\n");
  // Send
  mail($email, 'My Subject', $message);
  
  echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";
});

 $klein->respond('GET', '/rgrnke/pa2/confirm\?[:username]?',function ($request, $response, $service) use ($smarty){
  $username = $_GET['username'];
  echo $username;
  $query = "UPDATE User set active = 'true' where username = '$username'";
  $result = mysql_query($query);
  $_SESSION['username'] = $username;
  $_SESSION['lastactivity'] = time();
  echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>"; 
});

 $klein->respond('GET', '/rgrnke/pa2/forget',function ($request, $response, $service) use ($smarty){

  $smarty->display('forget.tpl');
});

 $klein->respond('POST', '/rgrnke/pa2/forget',function ($request, $response, $service) use ($smarty){
   $username = $_POST['username'];
  $query = "select * from User where username = '$username'";
  $result = mysql_query($query);
  $password = mysql_result($result, 0, "password");
  $email = mysql_result($result, 0, "email");
  $message = "your password is ".$password;
  $subject = "forget password";
  mail($email,$subject, $message);
  echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";
  
});

$klein->respond('GET', '/rgrnke/pa2/user/edit',function ($request, $response, $service) use ($smarty){

  if ((isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 < time()) || !isset($_SESSION['lastactivity'])) {
    $smarty->assign('log',false);
    session_destroy();
  } else {
    $smarty->assign('username',$_SESSION['username']);
    $smarty->assign('log',true);
    $_SESSION['lastactivity'] = time();
  }
    $username = $_SESSION['username'];
  $query = "SELECT * from User where username = '$username'";
  $result = mysql_query($query);
  $smarty->assign('firstname', mysql_result($result,0,"firstname"));
  $smarty->assign('lastname', mysql_result($result,0,"lastname"));
  $smarty->assign('email', mysql_result($result,0,"email"));
  $smarty->assign('password', mysql_result($result,0,"password"));

  
  $smarty->display('useredit.tpl');
});

$klein->respond('POST', '/rgrnke/pa2/user/edit',function ($request, $response, $service) use ($smarty){

    if ((isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 < time()) || !isset($_SESSION['lastactivity'])) {
        echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";
        exit;
    } else {
      $_SESSION['lastactivity'] = time();
  
    $username =$_POST['username'];
     $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypepassword = $_POST['password_retype'];
    if($password != $retypepassword){
      echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2/user/edit" . "\";</script>";
      exit;
    }

    $username = $_SESSION['username'];

    $query  = "Delete from User where username = '$username'";
      $result = mysql_query($query);
    echo $query;
  $query  = "INSERT INTO User (username, firstname, lastname, email, password)
VALUES ('$username', '$firstname', '$lastname', '$email', '$password')";
    $result = mysql_query($query);
    echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2/user/edit" . "\";</script>";
}
});

$klein->respond('POST', '/rgrnke/pa2/user/delete',function ($request, $response, $service) use ($smarty){

  if ((isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 < time()) || !isset($_SESSION['lastactivity'])) {
           echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";
      exit;
    }
  $username = $_SESSION['username'];

  $query = "select * from Album where username = '$username'";
  $result1 = mysql_query($query); 

  $num1 = mysql_num_rows($result1);
  echo "total amount of album is".$num1;

  for ($j = 0; $j < $num1; ++$j){
  
      $albumid = mysql_result($result1, $j, "albumid");        
      $query = "select * from Contain where albumid = $albumid";
  echo $query;
      $result = mysql_query($query);
      if (!$result) {
        echo "Mysql error: " . mysql_error();
        exit;
      }
      $num = mysql_num_rows($result);

      for ($i = 0; $i < $num; ++$i){
        $my_picid[$i] = mysql_result($result, $i, "picid");         
      }   

      $query = "delete from Contain where albumid = $albumid";
      $result = mysql_query($query);
      if (!$result) {
        echo "Mysql error: " . mysql_error();
        exit;
      }
  $query = "delete from AlbumAccess where albumid = $albumid";
  $result = mysql_query($query);

      for ($i = 0; $i < $num; ++$i){
         $inner_query = "select * from Photo where picid = '" . $my_picid[$i] . "'";
         $inner_result = mysql_query($inner_query);
         if (!$inner_result) {
            echo "Mysql error: " . mysql_error();
            exit;
         }   

         $format = mysql_result($inner_result, 0, "format");
         $inner_query = "delete from Photo where picid = '" . $my_picid[$i] . "'";
         $inner_result = mysql_query($inner_query);
         if (!$inner_result) {
            echo "Mysql error: " . mysql_error();
            exit;
         }       
         unlink("./static/pictures/".$my_picid[$i].".".$format);
      } 

  $query = "delete from Album where albumid = $albumid";
      $result = mysql_query($query);
  echo $query;
      if (!$result) {
         echo "Mysql error: " . mysql_error();
          exit;
      }       
  }  

  $query  = "Delete from User where username = '$username'";
  $result = mysql_query($query);

  $query = "Delete from AlbumAccess where username = '$username'";
  $result = mysql_query($query);
  echo $query;

   session_destroy();
   echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";
  
});




   $klein->respond('GET', '/rgrnke/pa2/pic\?[:id]?', function ($request, $response, $service) use ($smarty) {

      $picid = $_GET['id'];
      $query = "select * from Contain where picid = '$picid'";
      $result = mysql_query($query);
      $albumid = mysql_result($result, 0, 'albumid');
      $query = "select * from Album where albumid = $albumid";
      $result = mysql_query($query);
      $ownerName = mysql_result($result,0,'username');
      $access = mysql_result($result,0,'access');
      //have not test private
      if($access != "public"){
        if (isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 < time()) {
               $smarty->assign('log',false);
        } else if(isset($_SESSION['lastactivity'])){
                $username = $_SESSION['username'];
                $query = "select * from AlbumAccess where albumid = $albumid and username = '$username'";
                $result = mysql_query($query);
                $num = mysql_num_rows($result);
                if($num != 0 || $username == $ownerName){
                  $smarty->assign('username',$_SESSION['username']);
                  $smarty->assign('log',true);
                  $_SESSION['lastactivity'] = time();
                }else{
                  $smarty->assign('username',$_SESSION['username']);
                  $smarty->assign('log',false);
                  $_SESSION['lastactivity'] = time();
                }
        }else{
          $smarty->assign('log',false);
        }
      }else{
          $smarty->assign('log',true);
          if (isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 >= time()){
          $smarty->assign('username',$_SESSION['username']);
              $_SESSION['lastactivity'] = time();
        }   
           
      }
     // Notice how you can set variables here in the PHP that will get carried into the template files
     $query = "select url from Photo where picid='$picid'";
     $result = mysql_query($query);
     if (!$result) {
         echo "Mysql error: " . mysql_error();
         exit;
     }


     $smarty->assign('picid', $picid);
     $smarty->assign('url', mysql_result($result, $i, "url"));

      // get the prev and the next picture
     $query = "select * from Contain where picid = '$picid'";
     $result = mysql_query($query);
     $sequenceNum = mysql_result($result, 0, "sequencenum");
     $caption = mysql_result($result, 0, "caption");
     $albumid = mysql_result($result, 0 , "albumid");
  
     $query = "select * from Contain where albumid = '$albumid' and sequencenum > $sequenceNum order by sequencenum";
     $result = mysql_query($query);
     $next = mysql_result($result, 0, "picid");
  
     $query = "select * from Contain where albumid = '$albumid' and sequencenum < $sequenceNum order by sequencenum desc";
     $result = mysql_query($query);
     $prev = mysql_result($result, 0, "picid");

     $smarty->assign('next',$next);
     $smarty->assign('prev',$prev);
     $smarty->assign('caption', $caption);
     $smarty->assign('albumid',$albumid);
      
     $query = "select * from Album where albumid=$albumid";
     $result = mysql_query($query);
     if (!$result) {
         echo "Mysql error: " . mysql_error();
         exit;
     }
     $smarty->assign('title', mysql_result($result, 0, "title"));

     $smarty->display('pic.tpl');
   });

   $klein->respond('GET', '/rgrnke/pa2/album\?[:id]?', function ($request, $response, $service) use ($smarty) { 

      $albumid = $_GET['id'];;
      $query = "select * from Album where albumid = $albumid";
      $result = mysql_query($query);
      $ownerName = mysql_result($result,0,'username');
      $access = mysql_result($result,0,'access');
      if($access != 'public'){
        if ((isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 < time()) || !isset($_SESSION['lastactivity'])) {
            $smarty->assign('log',false);
        }else{
          $username = $_SESSION['username'];
          $query = "select * from AlbumAccess where albumid = $albumid and username = '$username'";
          $result = mysql_query($query);
          $num = mysql_num_rows($result);
          if($num == 0 && $username != $ownerName){
            $smarty->assign('log',false);
          }else{
            $smarty->assign('log',true);
            $smarty->assign('username', $_SESSION['username']);
          }
        }
      } else {
        $smarty->assign('log',true);
        if(isset($_SESSION['lastactivity'])){
          $smarty->assign('username', $_SESSION['username']);
          $_SESSION['lastactivity'] = time();
        }
      }

     $albumid = $_GET['id'];
     $query = "select * from Photo P, Contain C where C.albumid=$albumid and P.picid=C.picid  order by C.sequencenum";
     $result = mysql_query($query);
     if (!$result) {
         echo "Mysql error: " . mysql_error();
         exit;
     }
     $num = mysql_num_rows($result);
     $smarty->assign('num', $num);
     for ($i = 0; $i < $num; ++$i){
         $picid = mysql_result($result, $i, "picid");
         $smarty->assign('url'.$i, mysql_result($result, $i, "url"));
         $smarty->assign('picid'.$i, $picid);
         $smarty->assign('date'.$i, mysql_result($result, $i, "date"));  
         $inner_query = "select * from Contain C where C.picid = '$picid' and C.albumid=$albumid";
         $inner_result = mysql_query($inner_query);
         if (!$inner_result) {
             echo "Mysql error: " . $inner_query;
             exit;
         }    
         $smarty->assign('caption'.$i, mysql_result($inner_result, 0, "caption"));        
     }
     $smarty->assign('albumid', $albumid);

     $query = "select * from Album where albumid=$albumid";
     $result = mysql_query($query);
     if (!$result) {
         echo "Mysql error: " . mysql_error();
         exit;
     }
     $smarty->assign('title', mysql_result($result, 0, "title"));
     $smarty->assign('access',mysql_result($result, 0,"access"));
     $smarty->display('album.tpl');
   });


   $klein->respond('GET', '/rgrnke/pa2/album/edit\?[:id]?', function ($request, $response, $service) use ($smarty) {

      $albumid = $_GET['id'];;
      $query = "select * from Album where albumid = $albumid";
      $result = mysql_query($query);
      $ownerName = mysql_result($result,0,'username');
      $access = mysql_result($result,0,'access');

      if ((isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 < time()) || !isset($_SESSION['lastactivity'])) {
          $smarty->assign('log',false);
      }else{
        $username = $_SESSION['username'];
        if($username != $ownerName){
          $smarty->assign('log',false);
        }else{
          $smarty->assign('log',true);
          $smarty->assign('username', $username);
        }
      }

     $albumid = $_GET['id'];
     $query = "select * from Photo P, Contain C where C.albumid=$albumid and P.picid=C.picid order by C.sequencenum";
     $result = mysql_query($query);
     if (!$result) {
         echo "Mysql error: " . mysql_error();
         exit;
     }
     $num = mysql_num_rows($result);
     $smarty->assign('num', $num);
     for ($i = 0; $i < $num; ++$i){
         $picid = mysql_result($result, $i, "picid");
         $smarty->assign('url'.$i, mysql_result($result, $i, "url"));
         $smarty->assign('picid'.$i, $picid);
         $smarty->assign('date'.$i, mysql_result($result, $i, "date"));  
         $inner_query = "select * from Contain C where C.picid = '$picid' and C.albumid=$albumid";
         $inner_result = mysql_query($inner_query);
         if (!$inner_result) {
             echo "Mysql error: " . $inner_query;
             exit;
         }    
         $smarty->assign('caption'.$i, mysql_result($inner_result, 0, "caption"));        
     }
     $smarty->assign('albumid', $albumid);

     $query = "select * from Album where albumid=$albumid";
     $result = mysql_query($query);
     if (!$result) {
         echo "Mysql error: " . mysql_error();
         exit;
     }
     $smarty->assign('title', mysql_result($result, 0, "title"));
     $smarty->assign('access',mysql_result($result,0,"access"));

     //give all user list
     $query = "select * from User";
     $result = mysql_query($query);
     if (!$result) {
         echo "Mysql error: " . mysql_error();
         exit;
     }
     $usernum = mysql_num_rows($result);
     $smarty->assign('usernum', $usernum);
     for ($i = 0; $i < $usernum; ++$i){
         $smarty->assign('userlist'.$i, mysql_result($result, $i, "username"));
     }

     //give accessed user list
     $query = "select * from AlbumAccess where albumid = $albumid";
     $result = mysql_query($query);
     if (!$result) {
         echo "Mysql error: " . mysql_error();
         exit;
     }
     $accessnum = mysql_num_rows($result);
     $smarty->assign('accessnum', $accessnum);
     for ($i = 0; $i < $accessnum; ++$i){
         //echo mysql_result($result, $i, "username");
         $smarty->assign('accessed'.$i, mysql_result($result, $i, "username"));
     }

     $smarty->display('albumedit.tpl');
   });

    $klein->respond('POST', '/rgrnke/pa2/album/edit', function ($request, $response, $service) use ($smarty) {

    if ($_SESSION['lastactivity'] + 5 *60 < time()) {
        echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";
        exit;
    } else {
      $_SESSION['lastactivity'] = time();
    }

      $albumid = $_POST['albumid'];
      $query = "select * from Album where albumid=$albumid";
      $result = mysql_query($query);
      if (!$result) {
        echo $query;
        echo "Mysql error: " . mysql_error();
        exit;
      }
      $smarty->assign('username', mysql_result($result, 0, "username"));
      $smarty->assign('title', mysql_result($result, 0, "title"));

      $op = $_POST['op'];
      if($op == 'delete'){

        $query = "select * from Contain where picid = "."'".$_POST['picid']."'";
        $result = mysql_query($query);
        $albumid = mysql_result($result, 0, "albumid");

        $date = getdate();
        $standardDate = $date[year]."-".$date[mon]."-".$date[mday];
        $query = "UPDATE Album set lastupdated = '$standardDate' where albumid = " . "\"" . $albumid . "\"";
        $result = mysql_query($query);

        //delete from the database;
        $query = "DELETE from Contain where picid = "."'".$_POST['picid']."'";
        $result = mysql_query($query);

        $query = "select format from Photo where picid ="."'".$_POST['picid']."'";
        $result = mysql_query($query);
        $format = mysql_result($result, 0, "format");

        $query = "DELETE from Photo where picid ="."'".$_POST['picid']."'";
        $result = mysql_query($query);

        echo $format;

        //delete the file from server
        unlink("./static/pictures/".$_POST['picid'].".".$format);
        echo "./static/pictures/".$_POST['picid'].".".$format;

      } else if($op == 'add'){

        $query = "SELECT count from Counter where counterName = 'PhotoCount'";
        $result = mysql_query($query);
        if (!$result) {
               echo "Mysql error: " . mysql_error();
               exit;
        } 

        $count = mysql_result($result, 0, "count");
        $count = $count +1;

        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < 2000000)
        && in_array($extension, $allowedExts)) {
          if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
          } else {
            echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
            if (file_exists("./static/pictures/" . $_FILES["file"]["name"])) {
              echo $_FILES["file"]["name"] . " already exists. ";
            } else {
              move_uploaded_file($_FILES["file"]["tmp_name"],
              "./static/pictures/" . "$count"."."."$extension");
              echo "Stored in: " . "/static/pictures/" . "$count"."$extension";
            }
          }
        } else {
          echo "Invalid file";
        }
        //refresh the counter
        $query = "UPDATE Counter set count = $count where counterName = 'PhotoCount'";
        $result = mysql_query($query);


        //store it into the database
        $date = getdate();
        $standardDate = $date[year]."-".$date[mon]."-".$date[mday];
        $name = $count.".".$extension;
        $query = "INSERT into Photo (picid, url, format, date) Values('$count', 
            'http://eecs485-02.eecs.umich.edu:5616/static/pictures/$name', '$extension', '$standardDate')";
        $result = mysql_query($query);
        echo $query;

        //store the info in Contain
        $query = "INSERT INTO Contain (albumid, picid, caption, sequencenum)
           VALUES (" . "\"" . $_POST['albumid'] . "\"" . ", '$count', 'no description', $count);";

        $result = mysql_query($query);

        $date = getdate();
        $standardDate = $date[year]."-".$date[mon]."-".$date[mday];
        $query = "UPDATE Album set lastupdated = '$standardDate' where albumid = " . "\"" . $_POST['albumid'] . "\"";
        $result = mysql_query($query);
      } else if ($op == 'editname') {
        $albumid = $_POST['albumid'];
        $name = $_POST['name'];
        $query = "UPDATE Album set title = '$name' where albumid = $albumid";
        echo $query;
        $result = mysql_query($query);
        if (!$result) {
               echo "Mysql error: " . mysql_error();
               exit;
        }         
      } else if ($op == 'editaccess') {
        $albumid = $_POST['albumid'];
        $access = $_POST['access'];
        if ($access == 'public') {
          $query = "DELETE from AlbumAccess where albumid = $albumid";
          $result = mysql_query($query);
          if (!$result) {
                 echo "Mysql error: " . mysql_error();
                 exit;
          }   
          $query = "UPDATE Album set access = 'public' where albumid = $albumid";
          $result = mysql_query($query);
          if (!$result) {
                 echo "Mysql error: " . mysql_error();
                 exit;
          }            
        } else if ($access == 'private') {
          $query = "UPDATE Album set access = 'private' where albumid = $albumid";
          $result = mysql_query($query);
          if (!$result) {
                 echo "Mysql error: " . mysql_error();
                 exit;
          }            
        }        
      } else if ($op == 'adduser') {
        $albumid = $_POST['albumid'];
        $user = $_POST['username'];
        $query = "INSERT INTO AlbumAccess VALUES ($albumid, '$user')";
        $result = mysql_query($query);

        if (!$result) {
               echo "Mysql error: " . mysql_error();
               exit;
        }                       
      } else if ($op == 'deleteuser') {
        $albumid = $_POST['albumid'];
        $user = $_POST['username'];  
        $query = "DELETE FROM AlbumAccess WHERE albumid = $albumid and username = '$user'";
                echo $query;
        $result = mysql_query($query);

        if (!$result) {
               echo "Mysql error: " . mysql_error();
               exit;
        }        
      }
      echo "<script>window.location.href=" . "\"" . $_SERVER['HTTP_REFERER'] . "\";</script>";
    });

   $klein->respond('GET', '/rgrnke/pa2/albums\?[:username]?', function ($request, $response, $service) use ($smarty) {
      if ((isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 < time()) || !isset($_SESSION['lastactivity'])) {
        $smarty->assign('log',false);
      } else {
        $smarty->assign('username', $_SESSION['username']);
        $smarty->assign('log',true);
        $_SESSION['lastactivity'] = time();
      }

     $username = $_GET['username'];
     $query = "select * from Album where username='$username' or access = 'public' 
                union 
                select * from Album A where A.albumid in (select albumid from AlbumAccess where username = '$username')";
     $result = mysql_query($query);
     if (!$result) {
         echo "Mysql error: " . mysql_error();
         exit;
     }
     $num = mysql_num_rows($result);
     $smarty->assign('num', $num);
     for ($i = 0; $i < $num; ++$i){
         $smarty->assign('title'.$i, mysql_result($result, $i, "title"));
         $smarty->assign('albumid'.$i, mysql_result($result, $i, "albumid"));
         $smarty->assign('created'.$i, mysql_result($result, $i, "created"));
         $smarty->assign('lastupdated'.$i, mysql_result($result, $i, "lastupdated"));
         $smarty->assign('users'.$i, mysql_result($result, $i, "username"));
     }
    
     $smarty->display('albums.tpl');
   });

   $klein->respond('GET', '/rgrnke/pa2/albums/edit\?[:username]?', function ($request, $response, $service) use ($smarty) {
      if ((isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 < time()) || !isset($_SESSION['lastactivity'])) {
          $smarty->assign('log',false);
    $smarty->assign('ownername', $username);
      } else {
    $username = $_GET['username'];
    $nowuser = $_SESSION['username'];
    if($username != $nowuser){
      $smarty->assign('log',false);
      $smarty->assign('ownername', $username);
    }else{
      $smarty->assign('log',true);
            $smarty->assign('username', $_SESSION['username']);
            $_SESSION['lastactivity'] = time();
    }
      }

     $username = $_GET['username'];
  $smarty->assign('ownername', $username);
     $query = "select * from Album where username = '$username'";
     $result = mysql_query($query);
     if (!$result) {
         echo "Mysql error: " . mysql_error();
         exit;
     }
     $num = mysql_num_rows($result);
     $smarty->assign('num', $num);
     for ($i = 0; $i < $num; ++$i){
         $smarty->assign('title'.$i, mysql_result($result, $i, "title"));
         $smarty->assign('albumid'.$i, mysql_result($result, $i, "albumid"));
      $smarty->assign('access'.$i, mysql_result($result, $i, "access"));
     }  
     // echo "<script>window.location.href=window.location.href;</script>";      
     $smarty->display('albumsedit.tpl');
   });

   $klein->respond('POST', '/rgrnke/pa2/albums/edit', function ($request, $response, $service) use ($smarty) {

      if ((isset($_SESSION['lastactivity']) && $_SESSION['lastactivity'] + 5*60 < time()) || !isset($_SESSION['lastactivity'])) {
          $smarty->assign('log',false);
          echo "<script>window.location.href=" . "\"" . "/rgrnke/pa2" . "\";</script>";
          exit;
      } else {
        $smarty->assign('log',true);
        $smarty->assign('username', $_SESSION['username']);
        $_SESSION['lastactivity'] = time();
      }
        if ($_POST['op'] == 'add') {
            $query = "SELECT count from Counter where counterName = 'AlbumCount'";
            $result = mysql_query($query);
            if (!$result) {
                   echo "Mysql error: " . mysql_error();
                   exit;
            } 

            $count = mysql_result($result, 0, "count");
            $count = $count +1;
            $date = getdate();
            $standardDate = $date[year]."-".$date[mon]."-".$date[mday];
             echo "insert into Album (albumid, title, created, lastupdated, username, access) values (" . $count . 
                ", " . "'" . $_POST['title']. "'" . ", '$standardDate', " . "'$standardDate', " . "'" . 
                $_POST['username'] . "'" . ", '" . $_POST['title']. "');";
             $query = "insert into Album (albumid, title, created, lastupdated, username, access) values (" . $count . 
                ", " . "'" . $_POST['title']. "'" . ", '$standardDate', " . "'$standardDate', " . "'" . 
                $_POST['username'] . "'" . ", '" . $_POST['access']. "');";
             $result = mysql_query($query);
             if (!$result) {
                 echo "Mysql error: " . mysql_error();
                 exit;
             }
            $query = "UPDATE Counter set count = $count where counterName = 'AlbumCount'";
            $result = mysql_query($query);
             if (!$result) {
                 echo "Mysql error: " . mysql_error();
                 exit;
             }
        } else if ($_POST['op'] == 'delete') {
            $username = $_GET['username'];
            $query = "select * from Contain where albumid = " . $_POST['albumid'];
            $result = mysql_query($query);
            if (!$result) {
                echo "Mysql error: " . mysql_error();
                exit;
            }
            $num = mysql_num_rows($result);

            for ($i = 0; $i < $num; ++$i){
               $my_picid[$i] = mysql_result($result, $i, "picid");         
            }   

            $query = "delete from Contain where albumid = " . $_POST['albumid'];
            $result = mysql_query($query);
            if (!$result) {
                echo "Mysql error: " . mysql_error();
                exit;
            }

            for ($i = 0; $i < $num; ++$i){
               $inner_query = "select * from Photo where picid = '" . $my_picid[$i] . "'";
               $inner_result = mysql_query($inner_query);
               if (!$inner_result) {
                   echo "Mysql error: " . mysql_error();
                   exit;
               }   

               $format = mysql_result($inner_result, 0, "format");
               $inner_query = "delete from Photo where picid = '" . $my_picid[$i] . "'";
               $inner_result = mysql_query($inner_query);
               if (!$inner_result) {
                   echo "Mysql error: " . mysql_error();
                   exit;
               }       
               unlink("./static/pictures/".$my_picid[$i].".".$format);   
            }              
                  
            $query = "delete from Album where albumid = " . $_POST['albumid'];
            $result = mysql_query($query);
            if (!$result) {
                echo "Mysql error: " . mysql_error();
                exit;
            }        
        }
        echo "<script>window.location.href=" . "\"" . $_SERVER['HTTP_REFERER'] . "\";</script>";  
   });

   $klein->respond('GET', '/search', function ($request, $response, $service) use ($smarty) {
     $smarty->assign('flag', 0);
     $smarty->display('search.tpl');
   });

   $klein->respond('GET', '/search\?[:q]?', function ($request, $response, $service) use ($smarty) {

     $query = $_GET['q'];
     $w = $_GET['w'];
     $smarty->assign('query', $query);
     $smarty->assign('w', $w);
	
     $query = $w . ' ' . $query;
     $myResults = queryIndex(6016, "localhost", $query);
     $num = count($myResults);
     
     $smarty->assign('totalnum',$num);

     if ($num > 10) {
        $num = 10;
     }

     $smarty->assign('num',$num);

     for ($i = 0; $i < $num; ++$i){
        $smarty->assign('articleid'.$i, $myResults[$i]["id"]);

    	$query = "select * from Article where articleid = '".$myResults[$i]["id"]."'";
        $result = mysql_query($query);
        $articletitle = mysql_result($result,0,"title");
        $imgurl = mysql_result($result,0,"imgurl");
        $smarty->assign('articletitle'.$i, $articletitle);
        $smarty->assign('imgurl'.$i, $imgurl);

        $query = "select * from Category where articleid = '".$myResults[$i]["id"]."'";
        $result = mysql_query($query);
        $categorynum = mysql_num_rows($result);
        $category = '|';
        for ($j = 0; $j < $categorynum; ++$j) {
	  $category = $category.mysql_result($result, $j, "category")." | ";
        }
        $smarty->assign('category'.$i, $category);

        $query = "select * from Infobox where articleid = '".$myResults[$i]["id"]."'";
        $result = mysql_query($query);
        $infonum = mysql_num_rows($result);
        $info = '';
        if ($infonum == 0) {
	  $info = "no extra info<br>";
        }
        else {
        for ($j = 0; $j < $infonum; ++$j) {
	  $info = "<b><i>".$info.mysql_result($result, $j, "infotitle")."</i></b><br>".mysql_result($result, $j, "info")."<br><br>";
        }
        }

        $smarty->assign('info'.$i, $info);
     }
     $smarty->assign('flag', 1);
     
     $smarty->display('search.tpl');
   });

   $klein->respond('GET', '/search/picture\?[:id]?', function ($request, $response, $service) use ($smarty) {
      $id = $_GET['id'];
     $query = "select * from Contain where picid = $id";
    $result = mysql_query($query);
    if (!$result) {
           echo "Mysql error: " . mysql_error();
           exit;
    }
  $smarty->assign('id',$id);
  $query = mysql_result($result, 0 , 'caption');
     $myResults = queryIndex(6016, "localhost", $query);

       $num = count($myResults); 
       $smarty->assign('num',$num);
       $smarty->assign('caption', $query);


     for ($i = 0; $i < $num; ++$i){
         $smarty->assign('photos'.$i, $myResults[$i]["id"]);
     }
     $smarty->display('searchPic.tpl');
   });

   $klein->dispatch();
   mysql_close();
?>
