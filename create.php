<?php

session_start();
if(!isset($_SESSION['login'])) {
    header("location: login");
    exit;
}
include "db.php";

$datetime = date("Y-m-d H:i:s");
if(isset($_POST['city_bk'])) { $city_bk = $_POST['city_bk']; } else { $city_bk = " "; }
$contract = $_POST['contract'];
$abonent_name = $_POST['abonent_name'];
if(isset($_POST['phone'])) { $phone = $_POST['phone']; } else { $phone = " "; }
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
if(isset($_POST['second_name'])) { $second_name = $_POST['second_name']; } else { $second_name = " "; }
$birth_date = $_POST['birth_date'];
$zip_code = $_POST['zip_code'];
$country = $_POST['country'];
$region = $_POST['region'];
$district = $_POST['district'];
$city = $_POST['city'];
$street = $_POST['street'];
$dtc = $_POST['dtc'];
$submit = $_POST['submit'];

if (isset($submit)) {
    $query = "INSERT INTO `employee` (city_bk, contract, abonent_name, phone, last_name, first_name, second_name, birth_date, zip_code, country, region, district, city, street, dtc) VALUES ('$city_bk', '$contract', '$abonent_name', '$phone', '$last_name', '$first_name', '$second_name', '$birth_date', '$zip_code', '$country', '$region', '$district', '$city', '$street', '$dtc')";
    mysqli_query($db, $query);
}

include 'header.php';
?>

<div class="container">
    <h3>Добавление нового сотрудника</h3>
    <form method="post" class="mb-5">
        <div class="form-group row">
            <label for="city_bk" class="col-sm-2 col-form-label">Город БК</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="city_bk" name="city_bk">
            </div>
        </div>
        <div class="form-group row">
            <label for="contract" class="col-sm-2 col-form-label">№ договора*</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="contract" name="contract" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="abonent_name" class="col-sm-2 col-form-label">Наименование абонента*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="abonent_name" name="abonent_name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Номер телефона</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="phone" name="phone">
            </div>
        </div>
        <div class="form-group row">
            <label for="last_name" class="col-sm-2 col-form-label">Фамилия*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="first_name" class="col-sm-2 col-form-label">Имя*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="second_name" class="col-sm-2 col-form-label">Отчество (при наличии)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="second_name" name="second_name">
            </div>
        </div>
        <div class="form-group row">
            <label for="birth_date" class="col-sm-2 col-form-label">Дата рождения*</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="birth_date" name="birth_date" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="zip_code" class="col-sm-2 col-form-label">Почтовый индекс*</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="zip_code" name="zip_code" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="country" class="col-sm-2 col-form-label">Страна*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="region" class="col-sm-2 col-form-label">Область*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="region" name="region" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="district" class="col-sm-2 col-form-label">Район, муниципальный округ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="district" name="district">
            </div>
        </div>
        <div class="form-group row">
            <label for="city" class="col-sm-2 col-form-label">Город*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="street" class="col-sm-2 col-form-label">Улица*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="street" name="street" required>
            </div>
        </div>
        <input type="text" class="form-control" id="dtc" name="dtc" value="<?= $datetime ?>" hidden>
        <div class="form-group row">
            <div class="col-sm-12">
                <input type="submit" class="form-control" id="submit" name="submit" required>
            </div>
        </div>
    </form>
</div>

<?php
include 'footer.php';
?>
