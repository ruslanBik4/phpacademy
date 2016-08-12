<form action="get_query.php" method="post">
    <input name="host" value="<?=$_post['host']?>" />
    <input name="login" value="<?=$_post['login']?>" />
    <input name="password" value="<?=$_post['password']?>" />
    <input name="databaseName" value="<?=$_post['databaseName']?>" />
    
    <select name="monthName">
        <option value="0" selected> не выбран</option>
        <option value="1"> Январь</option>
        <option value="2"> Февраль</option>
        <option value="3"> Март</option>
        <option value="4"> Апрель</option>
        <option value="5"> Май</option>
        <option value="6"> Июнь</option>
        <option value="7"> Июльт</option>
        <option value="8"> Авгус</option>
        <option value="9"> Сентябрь</option>
        <option value="10"> Октябрь</option>
        <option value="11"> Ноябрь</option>
        <option value="12"> Декабрь</option>
    </select>

    <input type=number name="year" />    
    <input name="customerName" />    
    <input type="submit" />
</form>
<?php
    
    $connection = mysqli_connect( $_post['host'], $_post['login'], $_post['password'], $_post['databaseName'] );
    
    if (isset($_POST['monthName']) && ($_POST['monthName'] > 0) && ($_POST['monthName'] <13)) {
        $monthWhere = "MONTH(cus.date_reg) = {$_POST['monthName']} AND ";
    }
    else
        $monthWhere = '';
        
    if (isset($_POST['YEAR']) && ($_POST['YEAR'] > 0) ) {
        $yearWhere = " YEAR(cus.date_reg) = {$_POST['YEAR']}  AND ";
    }
    else
        $yearWhere = '';
        
    if (isset($_POST['customerName']) && ($_POST['customerName'] > '') ) {
        $nameWhere = "cus.name LIKE '%{$_POST['customerName']}%' AND ";
    }
    
    $sql = "SELECT cus.name, check_date, tovar.name, tovar.price, tovar_check.count, tovar.price * tovar_check.count, 
(select category.name FROM category WHERE categoru.id = tovar.parent_id)
FROM  customers cus join check on (check.id_customers = cus.id) join tovar_check on(tovar_check.id_check=check.id)
       join tovar on (tovar.id= tovar_check.id_tovar)
where $monthWhere $yearWhere $nameWhere
 (SELECT SUM( tovar_stat.count_tovar.count) FROM tovar_check  tovar_stat W
HERE tovar_stat.tovar_check.check_id = check.id) BETWEEN 2 AND 9";

    if (!$resultQuery = mysqli_query($connection, $sql))
        die( mysqli_error($connection) );
    
    echo 'Имя покаупателя  | Дата покупки  | Куплено товаров (шт.)';
    
    while ( $row = mysqli_fetch_array($resultQuery) ) {
        
        echo $row['name'] . ' | ' . $row['check_date'] . ' | ' . $row['count'] . '<br>';
    }
    
    
    
    
    
    
    