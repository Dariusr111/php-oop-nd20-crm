<?php
include_once "DB.php";
include_once "Companies.php";
include_once "Customers.php";
include_once "Contact_information.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;


$createCompany=Companies::getCompanies();
$blade2=new BladeOne();
echo $blade2->run("createCompany", ["createCompany"=>$createCompany]);



if (isset($_POST['action']) && $_POST['action']=='insert') {
    $createCompany = new Companies(
        $_POST['name'],
        $_POST['address'],
        $_POST['vat_code'],
        $_POST['company_name'],
        $_POST['phone'],
        $_POST['email']);

    $createCompany->create();
    header("location:index.php");
    die();
}