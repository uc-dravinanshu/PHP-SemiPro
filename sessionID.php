<?php
  session_start();
  if(isset($_POST['key']) && $_POST['key'] ==   "ansChange") {
    $_SESSION['attempted'][$_POST['content_id']] = $_POST['ansId'];
    echo "Attempted";
   }
 
   if(isset($_POST['key']) && $_POST['key']=="check-box") {
      // $temp = "Not Attempted";
         $flag = false;
      foreach($_POST['ans_id'] as $answers) {
         if($_SESSION['attempted'][$_POST['content_id']] == $answers['id']) { 
           $flag = true;
          echo $_SESSION['attempted'][$_POST['content_id']];
          break;
         } 
         if(!$flag){
            echo $_SESSION['attempted'][$_POST['content_id']];
         }
      }
   }
?>