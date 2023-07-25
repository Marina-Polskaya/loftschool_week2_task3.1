<?php

function task1(int $amount) //создаёт указанное количество пользователей
{
    if ($amount == 0) {
        return trigger_error('Передано неверное количество пользователей');
    } else {
        for ($i = 0; $i < $amount; $i++) {
            $user[$i] = [
                'id' => $i,
                'name' => NAMES[array_rand(NAMES)],
                'age' => mt_rand(18, 45)
            ];
        }
        return $user;
    }
}

function task2(array $users) : void //Преобразует массив в json и сохраняет в файл users.json
{
    $usersJson = json_encode($users);
    file_put_contents('./src/users.json', $usersJson);
}

function task3(string $fileName) //Открывает файл users.json и преобразовывает данные из него обратно ассоциативный массив РНР
{
    if (!file_exists($fileName)) {
        return trigger_error('Файл не существует');
    }
    $users = json_decode(file_get_contents($fileName), true);
    return $users;
}

function task4(array $users) : array //Считает количество пользователей с каждым именем в массиве
{
    $resultArr = array_count_values(array_column($users, 'name'));
    return $resultArr;
}

function task5(array $users) //Считает средний возраст пользователей (округляет до целого)
{
    $resultArr = array_column($users, 'age');
    $averAge = array_sum($resultArr) / count($resultArr);
    return round($averAge, 0);
}