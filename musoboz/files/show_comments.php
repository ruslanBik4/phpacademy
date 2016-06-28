<?php
    
function getImagePath($textFile) {
    
/*
  $posGb = strpos($textFile, 'gb/') + 3;  
    
  $id = substr($textFile, $posGb, strpos($textFile, '.')-1-$posGb );
*/
  $id = pathinfo($textFile)['filename'];
    
  $arrFiles = glob( "img/$id/*.jpg");
   
    return count($arrFiles) > 0 ? ";<img src='{$arrFiles[0]}'>" : ';' .$id; 
}    
    
  include_once 'func_print.php';
   
 $arrFiles = glob( 'gb/*.txt');
 
 $text ='';
 
 foreach($arrFiles as $key => $value) {
     if($value == FILE_COUNT)
         continue;

    $text .= getCommentFromFile($value) . getImagePath($value). PHP_EOL;
 }
    
?>
 
  <table border="1">
     <thead>
      <tr>
          <td>Date</td><td>Name</td> <td>Comment</td>
      </tr>
     </thead>
     <tbody>
     <?=PrintTable($text)?>

     </tbody>
 </table>
