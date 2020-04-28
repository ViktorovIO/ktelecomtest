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

$city_bk = $_POST['city_bk'];
$contract = $_POST['contract'];
$abonent_name = $_POST['abonent_name'];
$phone = $_POST['phone'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$second_name = $_POST['second_name'];
$birth_date = $_POST['birth_date'];
$zip_code = $_POST['zip_code'];
$country = $_POST['country'];
$region = $_POST['region'];
$district = $_POST['district'];
$city = $_POST['city'];
$street = $_POST['street'];
$submit = $_POST['submit'];

if (isset($submit)) {
    $update_query = "UPDATE employee SET city_bk='$city_bk', contract='$contract', abonent_name='$abonent_name', phone='$phone', last_name='$last_name', first_name='$first_name', second_name='$second_name', birth_date='$birth_date', zip_code='$zip_code', country='$country', region='$region', district='$district', city='$city', street='$street' WHERE contract='$get_contract'";
    mysqli_query($db, $update_query);
}

include 'header.php';
?>

<div class="container">
    <div class="row">
        <a href="/"><- Назад</a>
    </div>
    <h3>Редактирование записи договора <?= $get_contract ?>:</h3>
    <form method="post" class="mb-5">
        <?php while($row = mysqli_fetch_array($result)) { ?>
        <div class="form-group row">
            <label for="city_bk" class="col-sm-2 col-form-label">Город БК</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="city_bk" name="city_bk" value="<?= $row['city_bk'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="contract" class="col-sm-2 col-form-label">№ договора*</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="contract" name="contract" value="<?= $row['contract'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="abonent_name" class="col-sm-2 col-form-label">Наименование абонента*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="abonent_name" name="abonent_name" value="<?= $row['abonent_name'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Номер телефона</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="phone" name="phone" value="<?= $row['phone'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="last_name" class="col-sm-2 col-form-label">Фамилия*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $row['last_name'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="first_name" class="col-sm-2 col-form-label">Имя*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $row['first_name'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="second_name" class="col-sm-2 col-form-label">Отчество (при наличии)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="second_name" name="second_name" value="<?= $row['second_name'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="birth_date" class="col-sm-2 col-form-label">Дата рождения*</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $row['birth_date'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="zip_code" class="col-sm-2 col-form-label">Почтовый индекс*</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="zip_code" name="zip_code" value="<?= $row['zip_code'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="country" class="col-sm-2 col-form-label">Страна*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="country" name="country" value="<?= $row['country'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="region" class="col-sm-2 col-form-label">Область*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="region" name="region" value="<?= $row['region'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="district" class="col-sm-2 col-form-label">Район, муниципальный округ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="district" name="district" value="<?= $row['district'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="city" class="col-sm-2 col-form-label">Город*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="city" name="city" value="<?= $row['city'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="street" class="col-sm-2 col-form-label">Улица*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="street" name="street" value="<?= $row['street'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <input type="submit" class="form-control" id="submit" name="submit" required>
            </div>
        </div>
        <?php } ?>
    </form>
    <div class="row">
        <a href="/"><- Назад</a>
    </div>
</div>

<?php
include 'footer.php';
?>

