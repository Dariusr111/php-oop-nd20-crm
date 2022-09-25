<!-- 1. Sukurkite DB su trimis lentelėmis (jos pateiktos paveiksle)
2. Sukurkite tris klases Customer, Company ir Conversation (kiekviena klasė atitiks po vieną lentelę).
3. Sukurkime klasėms metodus, kad galėtumėme pridėti naujus įrašus, atnaujinti įrašus ir ištrinti įrašus.
4. Klasėje Customer sukurkite statinį metodą : static public function getCustomers() kuris gražintų visus pirkėjus
5. Klasėje Customer sukurkite metodus: getCompany ir getConversations kurių pirmasis gražintų objektą, to kliento įmonę,
o antrasis gražintų masyvą su objektais (pokalbių istoriją). Todėl turi eiti padaryti tokį veiksmą
$imonė->getComany()->name  (turėtų gražinti įmonės pavadinimą).-->


<?php
include_once "DB.php";
include_once "Companies.php";
include_once "Customers.php";
include_once "Contact_information.php";

//Trinam kompaniją
//$company=Companies::getCompany(5);
//$company->delete();

// Atnaujinam kompaniją
//$company=Companies::getCompany(3);
//$company->name='Akropolis';
//$company->save();

//Pridedam naują kompaniją
//$company=new Companies("IKI2", "Taikos pr.", "333", "Co", "+3702123344","kazkoks@gmail.com");
//$company->save();


//Trinam klientą
//$customer=Customer::getCustomer(1);
//$customer->delete();

// Atnaujinam klientą
//$customer=Companies::getCompany(3);
//$customer->name='Akropolis';
//$customer->save();

//Pridedam naują klientą
//$customer=new Customers("Viltė", "Paulauskienė", "+3702123344", "kazkoks@gmail.com", "Tilžės g. 1-15","Buhalterė","1");
//$customer->save();


//Trinam kontakto info
//$contact=Contact_information::getContact_info(1);
//$contact->delete();

// Atnaujinam kontakto info
//$contact=Contact_information::getContact_info(1);
//$contact->conversation='Apie kažką..';
//$contact->save();

//Pridedam naują kontakto info
//$contact=new Contact_information("1", "2022-03-15", "Apie kažką..");
//$contact->save();

// Atspauzdinam klientus
//$customers=Customers::getCustomers();
//print_r ($customers);

//Atspauzdinam kompaniją
//$company=Customers::getThisCompany(1);
//print_r ($company);

//Atspauzdinam kontakto informaciją
//$conversation=Customers::getConversations(1);
//print_r ($conversation);

//Atspauzdinam sudurtinę informaciją
$company=Customers::getThisCompany(1);
echo $company->name;




















