<?php

function ShowAllImage( $path ) {
  global $checkImages, $cokieBool;
    
    $pathImage = opendir($path);
    $text = '';
        
    while ( $file = readdir($pathImage) ) {
        
        if ( $file == '..' || $file == '.' )
            continue;
        elseif (filetype($path . '/' . $file) == 'dir')
            $text .= $file  . '><br>' . ShowAllImage( $path . '/' . $file );
        else {
            
            $fullName = trim("$path/$file");
            
            $isChecked = mb_stripos( $checkImages, $filename) !== false ? 'checked' : '';
             
            if ($isChecked)   {
                 $cokieBool .= setcookie( $fullName, $isChecked );                     
                
            }
            $text .= "<div> $file <input type='checkbox' $isChecked  form='fSavePerm' name='images[]' value='$fullName'/><br> <img src='$fullName' width='300' /> </div>";
            
        }
    }
    
    return $text;
}

    session_start();

    if ( isset($_SESSION['login']) ) {
             
            $checkImages = file_get_contents('true_image.txt');       
            
            $cokieBool = '';     
                
            $text = $_SESSION['login'] . '<br>'. ShowAllImage( 'img' );
        ?>
          <form method="post" action="save_permission.php" id="fSavePerm" target="ifResult">
              <button value="submit"> Сохранить изменения! </button>
          </form>
          <iframe name='ifResult'>
          </iframe>
        <?php    
             echo $text;
     }
     else {
          echo 'not login';
                 exit(-1);

  }
     
        
