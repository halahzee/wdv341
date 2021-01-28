<?php

$arr = array(
'fruit_1' => 'orange',
"fruit_3" => 'apple',
"fruit_3" => 'banana',

);



if(true){
    ob_start(); 
    
    
    foreach($arr as $fruit_key  => $fruit_name) {

      ?>
      <h1>
      <?php echo "Key: key, Fruit Name: $fruit_name"?>;
      
      
      </h1>

      <?php
    }
    
    
    
    ?>  
       <h2>This is TRUE</h2>

    <?php

  }  else { ob_start(); ?>
        <h2>This is FALSE</h2>
            <?php

    }

$response = ob_get_clean();

?>