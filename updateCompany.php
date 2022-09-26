<?php

include_once "DB.php";
include_once "Companies.php";
include_once "Customers.php";
include_once "Contact_information.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;




$updateCompany=Companies::getCompany($_GET['id']);

if (isset($_POST['action']) && $_POST['action']=='update') {
    $updateCompany->name=$_POST['name'];
    $updateCompany->address=$_POST['address'];
    $updateCompany->vat_code=$_POST['vat_code'];
    $updateCompany->company_name=$_POST['company_name'];
    $updateCompany->phone=$_POST['phone'];
    $updateCompany->email=$_POST['email'];
    $updateCompany->save();

    header("location:index.php");
    die();
}

$blade2=new BladeOne();

echo $blade2->run("updateCompany", ["updateCompany"=>$updateCompany]);



