<?php
/**
 * Created by PhpStorm.
 * User: rus
 * Date: 14.06.16
 * Time: 19:15
 * учебный пример для основ PHP
 */

 const STR_TITLE = 'Новость от Музобоза',
       STR_FOOTER = 'copyright ';

 $current_year = date('Y');


 $arrNews = array(
     [
         'date' => '21/04/2016',
         'title'=> 'Скоро концерты Машины Времени в Киеве',
         'memo' => 'Легендарная группа Машина Времени скоро посетить город Киев 
                и окрестности с юбилейными концертами и 
                большими пьянками 
                для всех любителей музыки',
         'cost' => 120,
         'permission' => '18+',
         'isActual' => false
     ],

     [
         'date' => '21/05/2016',
         'title'=> 'Скоро концерты DDT ени в Киеве',
         'memo' => 'Легендарная группа DDT скоро посетить город Киев 
                и окрестности с юбилейными концертами и 
                молебнами
                для всех любителей музыки',
         'cost' => 100,
         'permission' => '41+',
         'isActual' => false
     ],
     [
         'date' => '18.06.2016',
         'title'=> 'Скоро концерты Руки вверх! в Киеве',
         'memo' => 'Приезд группы руки ВВерх! 
     отменяется',
         'cost' => 0,
         'permission' => '12+',
         'isActual' => true

     ],
     [
         'date' =>  '18.06.2016',
         'title'=> 'Концерт группы "Океан Эльзы"',
         'memo' => ':Ltv-c!',
         'cost' => 200,
         'permission' => '0+',
         'isActual' => true
     ],

 );

 $summa = 0;
?>
<table>
<?php
foreach ($arrNews as $i => $arrSingleNews)
 {
     if ($i == 0) {
       echo '<tr">';

     $key = array_keys( $arrSingleNews );
     $keyI = 0;

         do
        {
            echo "<td style='border-bottom:1px solid red;'><b>$key[$keyI]</b></td>";

            $keyI++;

        }
         while ( $key[$keyI] != 'isActual');

         echo '</tr>';
     }

     $summa += $arrSingleNews['cost'];
 ?>
     <tr>
         <?php
             foreach($arrSingleNews as $key => $value)
             {
               switch ($key) {
                   case 'date':
                       echo "<td><i>$value</i></td>";
                       break;
                   case 'title':
                       echo "<td><b>$value</b></td>";
                       break;
                   case 'memo':
                       echo "<td>$value</td>";
                       break;
                   case 'cost':
                       echo "<td>$value</td>";
                       break;
                   case 'permission':
                       echo "<td>$value</td>";
                       break;
                   default:

               }
             }
         ?>
     </tr>
<?php
}

 $bPayable = true;


 $strPayable = !($bPayable === false) ? 'платный' : 'бесплатный';


 $secret = 'news_bodys';

?>
     <tr>
         <td> <?=$summa?> сайт</td>
         <td><?php echo STR_FOOTER; ?></td>
         <td> <?=isset($current_year) ? $current_year : 'неизвестный год'?></td>
     </tr>
    </table>
