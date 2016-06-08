<?php

function ShowAllImage( $path ) {
  global $arrImages;
    
    $pathImage = opendir($path);
    
    $text = '';
    
    while ( $file = readdir($pathImage) ) {
        
        if ( $file == '..' || $file == '.' )
            continue;
        elseif (filetype($path . '/' . $file) == 'dir')
            $text .= $file  . '><br>' . ShowAllImage( $path . '/' . $file );
        else {
            
            $fullName = trim("$path/$file");
            
            $isChecked = in_array($fullName, $arrImages) ? 'checked' : '';
            foreach($arrImages as $value)
              if ($fullName == trim($value) )
                $isChecked = 'checked';
                
            $text .= "<div> $file <input type='checkbox' $isChecked  form='fSavePerm' name='images[]' value='$fullName'/><br> <img src='$fullName' width='300' /> </div>";
            
        }
    }
    
    return $text;
}
    session_start();

    if ( !isset($_SESSION['login']) ) {
         echo 'not login';
         exit(-1);
    }         
         
    include_once 'const.php';
    
    $arrImages = file('true_image.txt') ? : array();
    
    print_r($arrImages);
        
    echo $_SESSION['login'] . '<br>';
?>
  <form method="post" action="save_permission.php" id="fSavePerm">
      <button value="submit"> Сохранить изменения! </button>
  </form>
<?php    
     echo ShowAllImage( 'img' );
     
        
