<?php

class Admin{
    public $id;
    public $email;
    public $password;
    public $type;

    /**
     * @param $id
     * @param $email
     * @param $password
     * @param $type
     */
    public function __construct($id, $email, $password, $type)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->type = $type;
    }

    // Metodas, kuris grąžina masyvą su meniu punktais: Įmonės, Darbuotojai, Pokalbiai
    public function getNavigation(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM companies");
        $stm->execute([ $this->id ]);
    }


    // Metodas, kuris grąžina informaciją apie prisijungusį vartotoją
    public static function getUser($id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM users WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $user=new Admin($c['email'],$c['password'],$c['type'], $id);
        return $user;
    }

    // Metodas, kada prisijungiama prie sistemos ir grąžinamas vartotojo objektas (SuperAdmin arba User)
    public static function login($id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM users WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $user=new Admin($c['email'],$c['password'], $id);
        return $user;
    }



}




