<?php
include_once "DB.php";
include_once "Companies.php";
include_once "Customers.php";
include_once "Contact_information.php";
include_once "lib/BladeOne.php";

use eftec\bladeone\BladeOne;


$companies=Companies::getCompanies();
$conversation=Contact_information::getConversation($_GET['id']);

$updateCustomers=Customers::getCustomer($_GET['id']);

if (isset($_POST['action']) && $_POST['action']=='update') {
    $updateCustomers->name=$_POST['name'];
    $updateCustomers->surname=$_POST['surname'];
    $updateCustomers->phone=$_POST['phone'];
    $updateCustomers->email=$_POST['email'];
    $updateCustomers->surname=$_POST['address'];
    $updateCustomers->position=$_POST['position'];
    $updateCustomers->company_id=$_POST['company_id'];
    $updateCustomers->updateCustomer();
    $conversation->customer_id=$_POST['id'];
    $conversation->date=$_POST['date'];
    $conversation->conversation=$_POST['conversation'];
    $conversation->updateConversation();
    header("location:index.php");
    die();
}

$blade3=new BladeOne();

echo $blade3->run("updateCustomers", ["updateCustomers"=>$updateCustomers, "companies"=>$companies, "conversation"=>$conversation]);
