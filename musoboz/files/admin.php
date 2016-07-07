<?php
    
function GetImages( $dir = 'img/' ) {
    
    $text = '';
    $not_include = array( '.', '..', );
    
    $arrFiles = glob( $dir . '*');
    foreach($arrFiles as $key => $value) {
        if (is_dir($value)) {
           $text .= '<div > Сообщение №' . pathinfo($value)['filename'] . ' картинки: <br>' . GetImages( $value . '/' ) . '<div>';
        }
        elseif ( in_array($value, $not_include) )
           continue;
        else {
            $text .= "<img src='$value' style='max-width:120;float:left;' /> " . ($_SESSION['login-user'] == 'admin' ? "<form action='del_image.php' mehtod='post'> <input type='hidden' name='image' value='$value'><button onclick='alert(\"Удаляю\");'> Удалить! </button></form>" : 'Обращайтесь к админу');
        }
    }
    
    
    return $text;

}    

function Secret() {
    
    iF ($_COOKIE['login'] && $_REQUEST['login'] == $_COOKIE['login'])
        return true;
        
    $arrLogin = file('pswd');
    
    $result = false;
    
    foreach($arrLogin as $stroka) {
        
        $arrStroka = explode(';', $stroka);
        
        $result = ($_REQUEST['login'] == trim($arrStroka[0]) ) && ($_REQUEST['unlogin'] == trim($arrStroka[1]) );
        
        if ($result)
            break;
        
    }
    
    return $result;
}

//print_r($_SERVER);

   iF (!isset($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_USER'] != 'admin') || $_SERVER['PHP_AUTH_PW'] != '12345') {
         header('WWW-Authenticate: Basic realm="SHOW task"');
          header('HTTP/1.0 401 Unauthorized');
         exit(-1);
    }              
         

 header('Cache-Control: public, max-age=3600');

 include 'views/main.html';

 if ( !Secret() ) {
  header('Content-Type: text/html; charset=cp1251');
  header('Cache-Control: public, must-revalidate');
     $textErrorMessage = 'Not login & password ';
     $showLoginForm = 'block';
     $showGallery = 'none';
     include('views/login.html');
}
 else {
     setcookie('login', $_REQUEST['login'], time()+600);
     $showLoginForm = 'none';
     $showGallery = 'block';
     
    $loginName = $_COOKIE['login'] ? : $_REQUEST['login'];
 
    $textImages = GetImages();


    include('views/gallery.html');
 }