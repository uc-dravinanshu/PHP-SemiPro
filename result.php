<?php
    require_once("smarty/libs/Smarty.class.php");
    $smarty = new Smarty;

    $smarty->display("result.tpl");
  
?>
<script>
    //for click go to dashboard.
    $("#dashboard").on('click', function(){
      window.location.replace("index.php");
    });
</script>