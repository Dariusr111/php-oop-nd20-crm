<?php

class Customers{
    public $id;
    public $name;
    public $surname;
    public $phone;
    public $email;
    public $address;
    public $position;
    public $company_id;

    private $company;
    private $conversation;

    /**
     * @param $id
     * @param $name
     * @param $surname
     * @param $phone
     * @param $email
     * @param $address
     * @param $position
     * @param $company_id
     */
    public function __construct($name, $surname, $phone, $email, $address, $position, $company_id, $id=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->position = $position;
        $this->company_id = $company_id;
    }


    public static function getCustomers(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM customers");
        $stm->execute([]);
        $customers=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $customers[]=new Customers($c['name'],$c['surname'],$c['phone'],$c['email'],$c['address'],$c['position'],$c['company_id'], $c['id']);
        }
        return $customers;
    }

    public function getCompany() {
        if ($this->company==null){
            $this->company= Companies::getCompany($this->company_id);
        }

        return  $this->company;
    }

    public static function getCustomer($id=null){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM customers WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $customer=new Customers($c['name'],$c['surname'],$c['phone'],$c['email'],$c['address'],$c['position'],$c['company_id'],$c['id']);
        return $customer;
    }

// jei nėra id - kuria, jei yra - atnaujina.
    public function save(){
        $pdo=DB::getPDO();
        if ($this->id==null){
            $stm=$pdo->prepare("INSERT INTO customers(name, surname, phone, email, address, position, company_id) VALUES (?,?,?,?,?,?,?)");
            $stm->execute([$this->name, $this->surname, $this->phone, $this->email, $this->address, $this->position, $this->company_id]);
            $this->id=$pdo->lastInsertId();
        }else{
            $stm=$pdo->prepare("UPDATE customers SET name=?, surname=?, phone=?, email=?, address=?, position=?, company_id=? WHERE id=?");
            $stm->execute([$this->name, $this->surname, $this->phone, $this->email, $this->address, $this->position, $this->company_id, $this->id]);
        }
    }
// Kliento trynimo f-ja
    public function deleteCustomer(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("DELETE FROM customers WHERE id=?");
        $stm->execute([ $this->id ]);
    }



    public static function getThisCompany($id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM companies WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $company=new Companies($c['name'],$c['address'],$c['vat_code'],$c['company_name'],$c['phone'],$c['email'],$id);
        return $company;
    }

    public static function getConversations($id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM contact_information WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $conversation=new Contact_information($c['customer_id'],$c['date'],$c['conversation'],$id);
        return $conversation;
    }

//    public static function getConversations



}