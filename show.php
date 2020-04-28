<?php

session_start();
if(!isset($_SESSION['login'])) {
    header("location: login");
    exit;
}
include "db.php";

$get_contract = $_GET['contract'];

if (isset($get_contract)) {
    $query = "SELECT * FROM employee WHERE contract='$get_contract'";
    $result = mysqli_query($db, $query);
}

include 'header.php';
?>

<div class="container">
    <div class="row">
        <a href="/"><- Назад</a>
    </div>
    <h3>Карточка договора № <?= $get_contract ?></h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
            <?php while($row = mysqli_fetch_array($result)) { ?>
                <dt class="col-sm-3 border-right pb-3">Город БК: </dt>
                <dd class="col-sm-9"><?= $row['city_bk'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">№ договора: </dt>
                <dd class="col-sm-9"><?= $row['contract'] ?></dd>

                <dt class="col-sm-3 border-right">Наименование абонента: </dt>
                <dd class="col-sm-9"><?= $row['abonent_name'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">№ телефона: </dt>
                <dd class="col-sm-9"><?= $row['phone'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Фамилия: </dt>
                <dd class="col-sm-9"><?= $row['last_name'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Имя: </dt>
                <dd class="col-sm-9"><?= $row['first_name'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Отчество: </dt>
                <dd class="col-sm-9"><?= $row['second_name'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Дата рождения: </dt>
                <dd class="col-sm-9"><?= $row['birth_date'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Почтовый индекс: </dt>
                <dd class="col-sm-9"><?= $row['zip_code'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Страна: </dt>
                <dd class="col-sm-9"><?= $row['country'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Область: </dt>
                <dd class="col-sm-9"><?= $row['region'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Район, муниципальный округ: </dt>
                <dd class="col-sm-9"><?= $row['district'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Город: </dt>
                <dd class="col-sm-9"><?= $row['city'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Улица: </dt>
                <dd class="col-sm-9"><?= $row['street'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Дата создания записи: </dt>
                <dd class="col-sm-9"><?= $row['dtc'] ?></dd>

                <dt class="col-sm-3 border-right pb-3">Дата редактирования записи: </dt>
                <dd class="col-sm-9"><?= $row['dtu'] ?></dd>
            </div>
        </div>
        <div class="card-footer">
            <a href="update.php?contract=<?=$row['contract']?>" class='btn btn-primary'>Редактировать</a>
        </div>
        <?php } ?>
    </div>
    <div class="row">
        <a href="/"><- Назад</a>
    </div>
</div>

<?php
include 'footer.php';
?>
