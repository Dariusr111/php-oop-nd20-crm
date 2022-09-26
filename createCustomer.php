<?php
include_once "DB.php";
include_once "Companies.php";
include_once "Customers.php";
include_once "Contact_information.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;

$createCustomer=Customers::getCustomers();

$companies=Companies::getCompanies();

$blade3=new BladeOne();

echo $blade3->run("createCustomer", ["createCustomer"=>$createCustomer, "companies"=>$companies]);

if (isset($_POST['action']) && $_POST['action']=='insert') {
    $createCustomer = new Customers(
        $_POST['name'],
        $_POST['surname'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['address'],
        $_POST['position'],
        $_POST['company_id']);

    $createCustomer->save();

    $conversation = new Contact_information( $createCustomer->id, $_POST['date'], $_POST['conversation']);
    $conversation->createConversation();

    header("location:index.php");
    die();
}

