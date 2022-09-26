<?php

class Contact_information
{
    public $id;
    public $customer_id;
    public $date;
    public $conversation;

    /**
     * @param $id
     * @param $customer_id
     * @param $date
     * @param $conversation
     */
    public function __construct($customer_id, $date, $conversation, $id=null)
    {
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->date = $date;
        $this->conversation = $conversation;
    }

    public static function getContact_info($id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM contact_information WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $contact=new Contact_information($c['customer_id'],$c['date'],$c['conversation'],$id);
        return $contact;
    }

// jei nėra id - kuria, jei yra - atnaujina.
    public function save(){
        $pdo=DB::getPDO();
        if ($this->id==null){
            $stm=$pdo->prepare("INSERT INTO contact_information(customer_id, date, conversation) VALUES (?,?,?)");
            $stm->execute([$this->customer_id, $this->date, $this->conversation]);
            $this->id=$pdo->lastInsertId();
        }else{
            $stm=$pdo->prepare("UPDATE contact_information SET customer_id=?, date=?, conversation=? WHERE id=?");
            $stm->execute([$this->customer_id, $this->date, $this->conversation, $this->id]);
        }
    }
// Trynimo f-ja
    public function delete(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("DELETE FROM contact_information WHERE id=?");
        $stm->execute([ $this->id ]);
    }
//---------------------------------------------------
    public function getCustomers() {
        if ($this->customer==null){
            $this->customer=Customer::getCustomers();
        }
        return $this->customer;
    }

    public static function getConversation($customer_id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM contact_information WHERE customer_id=?");
        $stm->execute([$customer_id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $conversation=new Contact_information($c['id'],$c['customer_id'],$c['date'],$c['conversation']);
        return $conversation;

    }
    public static function getConversations(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM contact_information");
        $stm->execute();
        $conversation=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $conversation[]=new Contact_information($c['customer_id'],$c['date'],$c['conversation'],$c['id']);
        }
        return $conversation;
    }

    public function createConversation(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("INSERT INTO contact_information (customer_id, conversation) VALUES (?,?)");
        $stm->execute([ $this->customer_id, $_POST['conversation'] ]);
    }

    public function updateConversation()
    {
        $pdo = DB::getPDO();
        $stm = $pdo->prepare("UPDATE contact_information SET customer_id=?, date=?, conversation=? WHERE id=?");
        $stm->execute([$this->customer_id, $this->date, $this->conversation, $this->id]);

    }




}