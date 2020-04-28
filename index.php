<?php

require( dirname( __FILE__ ) . '/db.php');
session_start();
if(!isset($_SESSION['login'])) {
    header("location: login");
    exit;
}
include 'header.php';
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <h2>Таблица записей</h2>
    </div>

    <div class="row">
        <table class="table table-responsive table-list-search text-center">
            <thead>
            <tr>
                <th scope="col">Город БК</th>
                <th scope="col">№ договора</th>
                <th scope="col">Абонент</th>
                <th scope="col">Телефон</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Имя</th>
                <th scope="col">Отчество</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Индекс</th>
                <th scope="col">Страна</th>
                <th scope="col">Область</th>
                <th scope="col">Район</th>
                <th scope="col">Город</th>
                <th scope="col">Улица</th>
                <th scope="col">Просмотр</th>
                <th scope="col">Редактирование</th>
            </tr>
            </thead>
            <tbody>
            <?
            $query = mysqli_query($db ,"SELECT * FROM employee");
            while($row = mysqli_fetch_array($query))
            {
                ?>
                <tr>
                    <td><?= $row['city_bk'] ?></td>
                    <td><?= $row['contract'] ?></td>
                    <td><?= $row['abonent_name'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['second_name'] ?></td>
                    <td><?= $row['birth_date'] ?></td>
                    <td><?= $row['zip_code'] ?></td>
                    <td><?= $row['country'] ?></td>
                    <td><?= $row['region'] ?></td>
                    <td><?= $row['district'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['street'] ?></td>
                    <td>
                        <a href="show.php?contract=<?=$row['contract']?>" class='btn btn-outline-success'>Просмотр</a>
                    </td>
                    <td>
                        <a href="update.php?contract=<?=$row['contract']?>" class='btn btn-primary'>Редактировать</a>
                    </td>
                </tr>
                <?
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include 'footer.php';
?>