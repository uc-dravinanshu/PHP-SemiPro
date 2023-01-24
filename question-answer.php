<?php
//   session_start();
//   //create a function for remove special characters.
//   function clean($string) {
//     $string = preg_replace('/[^A-Za-z0-9\-]/',' ', $string); // Removes special chars.
//     return preg_replace('/-+/', '-', $string); // Removes special chars.
//     }

//   //create an array attempt name session.
//   $_SESSION['attempt'] = array();

//   $file = file_get_contents("my-question.json"); 
//   $array = json_decode($file);
  
//     //print_r($array);
//     //print_r(gettype($array));
//    foreach($array as $row) {
//    //print_r($row['timestamp']);
//     $timestamp = $row->timestamp."<br/>";
//     $content_guid =  $row->content_guid."<br/>";
//     $content_id =  $row->content_id."<br/>";
//     $snippet =  $row->snippet."<br/>";
//     clean($row->content_text."<br/>");
    

//         $array2 = json_decode($row->content_text,true);
//         // print_r((gettype($array2)));
//         $questions =  $array2['question']."<br/>";
//         // echo $questions;
//         $ans = $array2['answers'];
//         foreach($ans as $answers) {
//         // print_r ($answers); 
//             $ans_id = $answers['id']."<br/>"; 
//             $ans_is_correct = $answers['is_correct']."<br/>";
//             $ans_ans= $answers['answer']."<br/>";
//         }           
//    }

//    //now create a pagination.
//    if(!isset($_GET['page'])) {
//       $page_number = 1;
//    } else {
//       $page_number = $_GET['page'];
//    }
  
//    //set the page limit and initial pages.
//     $limit = 1;
//     $initial_page = ($page_number -1) * $limit; 

//    // total number of questions of returns == 11 
//    $total_question = count($array);
//     //echo $total_question;

//    //total pages,
//    $total_pages = ceil($total_question / $limit);
// //    echo $total_pages;

//    //$final = array_splice((array)$questions, $initial_page, $limit);
//    //print_r($final);



//counting ke liye.
// if(isset($_POST['key']) && $_POST['key'] == "total_question"){ 
//     //extract the all key if set.
//      extract($_POST);
//     $data = file_get_contents("my-question.json");
//     $data = json_decode($data, true);
//     $count = 0;
//     foreach($data as $row) {
//         $count++;
//     }
//     echo $count;
// }

//next.
?>