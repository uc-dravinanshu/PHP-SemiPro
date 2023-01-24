<?php
  session_start();
  require_once("./smarty/libs/Smarty.class.php");
  $smarty = new Smarty;

  $data = file_get_contents('my-question.json');
  //session create.
  $_SESSION['attempted'] = array();
  $array = json_decode($data, true);

  foreach($array as $row) {
  $_SESSION['attempted'][$row['content_id']] = "Not Attempted";
   $snippet = $row['snippet'];           
  }
   
  // echo "<pre>";
  // print_r($_SESSION['attempted']);
  // echo "</pre>";
   
  $perPage = 1;
  $total_question = count($array);
  $totalPages = ceil($total_question/$perPage);
  $content_id = $row['content_id'];
  // echo $content_id;
  //echo $totalPages;
  $smarty->assign('totalpage',$totalPages);
  $smarty->assign('data',$array);
  $smarty->assign('session',$_SESSION['attempted']);
  $smarty->display('test.tpl');
?>
<script>
    //close the exam.
    $(document).ready(function(){
        $('#yes-cancel').click(function(){
            window.location.replace("result.php");
        });
    });
      
    //timer
    var testTime = 30;
    function startTimer(duration, display) {
    var timer = duration;
    setInterval(function() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.text(minutes + ":" + seconds);
        if (timer <= 0) {
            $('#countTimer').modal('show');
            window.location.replace("result.php");
        } else {
            timer--;
        }
    }, 1000);
    }
    //set time
    $(function() {
    var minutes = 60 * testTime; // set timer 
      display = $('#countTimer');
      startTimer(minutes, display);    
    });
 
    
  
  var data = [];
  // console.log(data);
  var index = 0;
  var perpage = 1;
  // var current_id = JSON.parse(data[index].content_id);
  var totalPage = '<?php echo $totalPages; ?>';  
    
    // function content_id() {
    //   let cID = JSON.parse(data[index].content_id);
    //   // console.log(cID);
    //   $('#Cid').html(cID);
    // }
   
  function question() {
    let obj = JSON.parse(data[index].content_text);
    let abc = obj.question;
    // let objId = JSON.parse(data[index].content_id);
    //  console.log(objId);
      // console.log(abc);
      $("#question").html(abc);   
      // $('#question').html(objId);   
  }
   
  function answers() {
    let obj = JSON.parse(data[index].content_text);
    let ans = obj.answers;
    //   console.log(ans);
    //   alert(ans);
    // let a = ans[0]['answer'];
    // let b = ans[1]['answer'];
    // let c = ans[2]['answer'];
    // let d = ans[3]['answer'];
    //  console.log(a); 
    //  console.log(b); 
    //  console.log(c); 
    //  console.log(d);

      let format = ''; 
      $.each(ans, function(key, value){
          // if(value.is_correct == 1){  ...}// for checking correct.
          format += '<div class="form-check">';
          format += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
          format += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
          format += '</div>';  
      });
      $("#answer").html(format);
  }
  
  $.ajax({
    url: 'my-question.json',
    type: 'get',
    dataType: 'json',
    success: function(json) {
      data = json;
      question();
      answers();   
      // content_id();
   }
  });  
  
  $('#next').on('click', function(){
   if(index < data.length - 1) {
     index = index;
     index += perpage; 
     question();
     answers();
    //  content_id();
     $("#current_question").html(index+1);
     let ans_id = JSON.parse(data[index].content_text);
     let answers_id = ans_id.answers;
     console.log(answers_id);
     let get_id = '';

     $.each(answers_id, function(key, value){
         get_id = value.id;
     });
     console.log(get_id); 
      let cont_id = JSON.parse(data[index].content_id);
       $.ajax({
         url: "sessionID.php",
         type: "POST",
         data: {
          key: "check-box",
          content_id: cont_id,
          ans_id : answers_id
         },
         success: function(data) {
            if(data != "Not Attempted") {
               $("#"+data).attr('checked','checked');
            }
         }
       })
    }
  });
 
  //previous.
  $('#previous').on('click', function(){
    // console.log('Prev');
     if(index > 0) {
      // console.log("hello G");
       index = index;
       index -=perpage;
       question();
       answers();
      //  content_id();
       $("#current_question").html(index+1);
       let ans_id = JSON.parse(data[index].content_text);
       let answers_id = ans_id.answers;
       console.log(answers_id);
       let get_id = '';

        $.each(answers_id, function(key, value){
         get_id = value.id;
        });
        console.log(get_id); 
        let cont_id = JSON.parse(data[index].content_id);
       $.ajax({
         url: "sessionID.php",
         type: "POST",
         data: {
          key: "check-box",
          content_id: cont_id,
          ans_id : answers_id
         },
         success: function(data) {
            if(data != "Not Attempted") {
               $("#"+data).attr('checked','checked');
            }
         }
       });
     }
  });
 
  //attemp unattempt in list-item.
  $(document).on('change', ".abc", function(){
      //  console.log(JSON.parse(data[index].content_id));
       let content_id = JSON.parse(data[index].content_id);
      $.ajax({
           url: "sessionID.php",
           type: "POST",
           data: {
            key: "ansChange",
            content_id: JSON.parse(data[index].content_id),
            ansId: $(this).attr('id'),
            ans: "checked"
           },
           success: function(data){
              // console.log(content_id);
              $('.questionList').children('#'+content_id).html(data).attr('class','badge text-bg-success');
           }    
      });

  });

  



  //list and display question matchs.
  $(document).ready(function(){
    $('.questionList').on('click',function(){
        let id = $(this).attr('id');
        // console.log(id);

       let abc=id;
        console.log(abc);
        
       switch(abc) {
          case  "120855": 
          index = 0;
          console.log("id one clicked");
          let obj1 = JSON.parse(data[index].content_text);
          let question1 = obj1.question;
           
          let obj2 = JSON.parse(data[index].content_text);
          let ans1 = obj2.answers;
          let format1 = ''; 
          $.each(ans1, function(key, value){
              // if(value.is_correct == 1){ ...} for checking correct or not.
              format1 += '<div class="form-check">';
              format1 += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
              format1 += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
              format1 += '</div>';        
          });
          $("#question").html(question1);
          $('#answer').html(format1);
          console.log(question1);
          console.log(format1);
          break;

          case "12086":
          index = 1;
          console.log("id two clicked");
          let obj3 = JSON.parse(data[index].content_text);
          let question2 = obj3.question;
           
          let obj4 = JSON.parse(data[index].content_text);
          let ans2 = obj4.answers;
          let format2 = ''; 
          $.each(ans2, function(key, value){
              // if(value.is_correct == 1){ ...} for checking correct or not.
              format2 += '<div class="form-check">';
              format2 += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
              format2 += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
              format2 += '</div>';        
          });
          $("#question").html(question2);
          $('#answer').html(format2);
          console.log(question2);
          console.log(format2);
          break;

          case  "12089": 
          index = 2;
          console.log("id three clicked");
          let obj5 = JSON.parse(data[index].content_text);
          let question3 = obj5.question;
           
          let obj6 = JSON.parse(data[index].content_text);
          let ans3 = obj6.answers;
          let format3 = ''; 
          $.each(ans3, function(key, value){
              // if(value.is_correct == 1){ ...} for checking correct or not.
              format3 += '<div class="form-check">';
              format3 += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
              format3 += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
              format3 += '</div>';        
          });
          $("#question").html(question3);
          $('#answer').html(format3);
          console.log(question3);
          console.log(format3);
           break;

          case "120900":
          index = 3;
          console.log("id four clicked");
          let obj7 = JSON.parse(data[index].content_text);
          let question4 = obj7.question;
           
          let obj8 = JSON.parse(data[index].content_text);
          let ans4 = obj8.answers;
          let format4 = ''; 
          $.each(ans4, function(key, value){
              // if(value.is_correct == 1){ ...} for checking correct or not.
              format4 += '<div class="form-check">';
              format4 += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
              format4 += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
              format4 += '</div>';        
          });
          $("#question").html(question4);
          $('#answer').html(format4);
          console.log(question4);
          console.log(format4);
           break;



          case  "120933": 
          index = 4;
          console.log("id five clicked");
          let obj9 = JSON.parse(data[index].content_text);
          let question5 = obj9.question;
           
          let obj10 = JSON.parse(data[index].content_text);
          let ans5 = obj10.answers;
          let format5 = ''; 
          $.each(ans5, function(key, value){
              // if(value.is_correct == 1){ ...} for checking correct or not.
              format5 += '<div class="form-check">';
              format5 += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
              format5 += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
              format5 += '</div>';       
          });
          $("#question").html(question5);
          $('#answer').html(format5);
          console.log(question5);
          console.log(format5);
           break;

           case "120939":
            index = 5;
          console.log("id six clicked");
          let obj11 = JSON.parse(data[index].content_text);
          let question6 = obj11.question;
           
          let obj12 = JSON.parse(data[index].content_text);
          let ans6 = obj12.answers;
          let format6 = ''; 
          $.each(ans6, function(key, value){
              // if(value.is_correct == 1){ ...} for checking correct or not.
              format6 += '<div class="form-check">';
              format6 += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
              format6 += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
              format6 += '</div>';       
          });
          $("#question").html(question6);
          $('#answer').html(format6);
          console.log(question6);
          console.log(format6);
           break;

           case  "120945": 
            index = 6;
          console.log("id seven clicked");
          let obj13 = JSON.parse(data[index].content_text);
          let question7 = obj13.question;
           
          let obj14 = JSON.parse(data[index].content_text);
          let ans7 = obj14.answers;
          let format7 = ''; 
          $.each(ans7, function(key, value){
              // if(value.is_correct == 1){ ...} for checking correct or not.
              format7 += '<div class="form-check">';
              format7 += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
              format7 += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
              format7 += '</div>';       
          });
          $("#question").html(question7);
          $('#answer').html(format7);
          console.log(question7);
          console.log(format7);
           break;

           case "120963":
            index = 7;
          console.log("id eigth clicked");
          let obj15 = JSON.parse(data[index].content_text);
          let question8 = obj15.question;
           
          let obj16 = JSON.parse(data[index].content_text);
          let ans8 = obj16.answers;
          let format8 = ''; 
          $.each(ans8, function(key, value){
              // if(value.is_correct == 1){ ...} for checking correct or not.
              format8 += '<div class="form-check">';
              format8 += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
              format8 += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
              format8 += '</div>';        
          });
          $("#question").html(question8);
          $('#answer').html(format8);
          console.log(question8);
          console.log(format8);
           break;


           case  "120983": 
            index = 8;
          console.log("id nine clicked");
          let obj17 = JSON.parse(data[index].content_text);
          let question9 = obj17.question;
           
          let obj18 = JSON.parse(data[index].content_text);
          let ans9 = obj18.answers;
          let format9 = ''; 
          $.each(ans9, function(key, value){
              // if(value.is_correct == 1){ ...} for checking correct or not.
              format9 += '<div class="form-check">';
              format9 += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
              format9 += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
              format9 += '</div>';       
          });
          $("#question").html(question9);
          $('#answer').html(format9);
          console.log(question9);
          console.log(format9);
           break;

           case "120984":
            index = 9;
          console.log("id ten clicked");
          let obj19 = JSON.parse(data[index].content_text);
          let question10 = obj19.question;
           
          let obj20 = JSON.parse(data[index].content_text);
          let ans10 = obj20.answers;
          let format10 = ''; 
          $.each(ans10, function(key, value){
              // if(value.is_correct == 1){ ...} for checking correct or not.
              format10 += '<div class="form-check">';
              format10 += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
              format10 += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
              format10 += '</div>';        
          });
          $("#question").html(question10);
          $('#answer').html(format10);
          console.log(question10);
          console.log(format10);
           break;

           case "120985":
            index = 10;
          console.log("id eleven clicked");
          let obj21 = JSON.parse(data[index].content_text);
          let question11 = obj21.question;
           
          let obj22 = JSON.parse(data[index].content_text);
          let ans11 = obj22.answers;
          let format11 = ''; 
          $.each(ans11, function(key, value){
              // if(value.is_correct == 1){ ...} for checking correct or not.
              format11 += '<div class="form-check">';
              format11 += '<input type="radio" name="ans" id="'+ value.id +'" class="form-check-input abc">';
              format11 += '<label class="form-check-label" for="'+ value.id +'"> '+value.answer +' </label> <br/>';  
              format11 += '</div>';        
          });
          $("#question").html(question11);
          $('#answer').html(format11);
          console.log(question11);
          console.log(format11);
           break;
            
          default:
            console.log("wrong choose");
       }

    });

  }); 
  

  //list display.
  // $(document).ready(function(){
  //  $(".questionList").on('click',function(){
  //     let id = $(this).attr('id');
  //     console.log(id);

  //     // let data =[];
  //     let index = 0;
  //     for(index=0; index<=10; index++) {
  //       let obj = JSON.parse(data[index].content_text);
  //       let que = obj.question;

  //       let obj1 = JSON.parse(data[index].content_text);
  //       let ans = obj1.answers;
  //       let format = ''; 
  //       $.each(ans, function(key, value){
  //           // if(value.is_correct == 1){ ...} for checking correct or not.
  //           format += '<input type="radio" name="ans" id="'+ value.id +'">';
  //           format += '<label for="'+ value.id +'"> '+value.answer +' </label> <br/>';       
  //       });
  //       console.log(que);
  //       console.log(format);
  //     }
      
  //   });
  // });

  //
  // $(document).ready(function(){
  //   $(".questionList").on('click', function(){
  //      let ids = $(this).attr('id');
  //      console.log(ids);
        
  //       let index = 1;
  //       function question() {
  //         let obj = JSON.parse(data[index].content_text);
  //         let abc = obj.question; 
  //         console.log(abc);
  //        }

  //        function answers() {
  //           let obj = JSON.parse(data[index].content_text);
  //           let ans = obj.answers;
  //             let format = ''; 
  //             $.each(ans, function(key, value){
  //                 // if(value.is_correct == 1){ ...} for checking correct or not.
  //                 format += '<input type="radio" name="ans" id="'+ value.id +'">';
  //                 format += '<label for="'+ value.id +'"> '+value.answer +' </label> <br/>';       
  //             });
  //             // $("#answer").html(format);
  //             console.log(format);
  //         }

  //         $.ajax({
  //           url: 'my-question.json',
  //           type: 'get',
  //           dataType: 'json',
  //           success: function(json) {
  //             data = json;
  //             question();
  //             answers();
  //         }
  //         }); 

  //         switch(ids) {

  //           case "120855":
  //             question();
  //             answers();
  //             break;
             
  //         }


  //   });
  // });


  </script>