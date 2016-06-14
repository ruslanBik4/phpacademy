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
 $news_date = '21/04/2016';

 $title_news = 'Скоро концерты Машины Врем ени в Киеве';

 $news_body = <<<body
   $news_date Легендарная группа Машина Времени скоро посетить город Киев 
                и окрестности с юбилейными концертами и 
                большими пьянками 
                для всех любителей музыки

body;

?>
 <table>
     <tr>
         <td><?=$news_date.PHP_EOL?></td> <td><?=$title_news.PHP_EOL?></td <td><?=$news_body.PHP_EOL?></td>
     </tr>
<?php

 $news_date = '21/05/2016';

$title_news = 'Скоро концерты Машины Врем ени в Киеве';

$news_body = <<<body
   $news_date Легендарная группа DDT скоро посетить город Киев 
                и окрестности с юбилейными концертами и 
                молебнами
                для всех любителей музыки

body;

 unset($current_year);

 $bPayable = true;


 $strPayable = !($bPayable === false) ? 'платный' : 'бесплатный';


 $secret = 'news_body';

?>
         <tr>
             <td><?=$news_date?></td>
             <td><?=$title_news?></td>
             <td><?=$$secret?></td>
         </tr>
         <?php

?>
     <tr>
         <td> <?=$strPayable?> сайт</td>
         <td><?php echo STR_FOOTER; ?></td>
         <td> <?=isset($current_year) ? $current_year : 'неизвестный год'?></td>
     </tr>
 </table>
