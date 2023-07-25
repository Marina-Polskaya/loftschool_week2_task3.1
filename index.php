<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Task 3.1</title>
    </head>
    <body>
        <?php
        ini_set('display_errors', 'on');
        error_reporting(E_ALL | E_NOTICE);
        
        define('NAMES', ['Анна', 'Александр', 'Иван', 'София', 'Мария']);

        require_once 'src/functions.php';
        
        $howManyUsers = 50;
        $users = task1($howManyUsers); //создание пользователей
        
        $usersJson = task2($users); //Преобразует массив в json и сохраняет в файл users.json
        $usersFromJsonFile = task3('./src/users.json'); //Открывает файл users.json и преобразовывает данные из него обратно ассоциативный массив РНР
        echo '<pre>';
        var_dump ($usersFromJsonFile);
        echo '</pre><br />';
        
        $usersNamesArr = task4($usersFromJsonFile); //Считает количество пользователей с каждым именем в массиве
        foreach($usersNamesArr as $name => $amount) {
            echo 'Имя '.$name.' встречается '.$amount.' раз.<br />';
        }
        echo '<br />';
        
        echo 'Средний возраст пользователей: '.task5($usersFromJsonFile).'.<br />'; //Считает средний возраст пользователей (округляет до целого)
        ?>
    </body>
</html>
