<?php
/* GLOBAL Variables*/
$ingredients = array();
$finalIngNames;
$finalIngAmm;
$sessID;
/* START Session */
if(!session_id()) {
    session_start();
}
/* Connect to Database */
$db = mysqli_connect("localhost", "root", "", "yourdailygreen");

function answer($session)
{
    echo $session;
}

function doMagic($array)
{
  global $ingredients;
  global $finalIngNames;
  global $finalIngAmm;
  global $sessID;
  //0-14
  $gender = $array[0];
  $age  = $array[1];
  $tired1  = $array[2];
  $tired2  = $array[3];
  $tired3  = $array[4];
  $concentrate  = $array[5];
  $health1  = $array[6];
  $health2  = $array[7];
  $health3  = $array[8];
  $fit1  = $array[9];
  $fit2  = $array[10];
  $wLoss  = $array[11];
  $life1  = $array[12];
  $life2  = $array[13];
  $life3 = $array[14];
  // Get session_id
  getSession();
  // gender + age if male
  mapGender($gender, $age);
  // tiredness
  mapTired($tired1, $tired2, $tired3);
  // concentrate
  mapContentrate($concentrate);
  // health1
  mapHealth1($health1);
  // health 2
  mapHealth2($health2, $health3);
  // fitness
  mapFit($fit1, $fit2);
  // wLoss
  mapWLoss($wLoss);
  // life1
  mapLife1($life1);
  // life3
  mapLife3($life2, $life3);
  // calculateFill
  calculateFill();
  // finalize
  finalize();
  // send to database
  dbCommunication();
  //var_dump($ingredients);
  //echo($finalIngNames);
  //echo($finalIngAmm);
  //echo($sessID);
}

/*--------- FUNCTIONS --------------*/

// Get session to store later
function getSession(){
  global $sessID;
  $sessID = session_id();
}

// Communicate with Server
function dbCommunication(){
  global $ingredients;
  global $finalIngNames;
  global $finalIngAmm;
  global $sessID;

  // FinalIngAmm in Einzelvariablen packen
  $macaAmm = $finalIngAmm[0];
  $amlaAmm = $finalIngAmm[1];
  $guaranaAmm = $finalIngAmm[2];
  $brahmiAmm = $finalIngAmm[3];
  $lucumaAmm = $finalIngAmm[4];
  $baobabAmm = $finalIngAmm[5];
  $spirulinaAmm = $finalIngAmm[6];
  $aroniaAmm = $finalIngAmm[7];
  $moringaAmm = $finalIngAmm[8];
  $gerstengrasAmm = $finalIngAmm[9];

  $checkSum = calculateCheckSum($macaAmm, $amlaAmm, $guaranaAmm, $brahmiAmm, $lucumaAmm, $baobabAmm, $spirulinaAmm, $aroniaAmm, $moringaAmm, $gerstengrasAmm);

  // Call DB and check for Checksum in mix-product-table
    // If checksum exists check if ammounts match
      // If ammounts match
        //get product-id
        //actualize DateTime
      // else create new product
        // wp insert post (post type product) with superfoods in comment-field?!
        // remember product-id
        // insert mix into DB with product-id + DateTime
    // Else create new product
        // wp insert post (post type product)
        // remember product-id
        // insert mix into DB with product-id + Datetime
    // open product with set id from posts
    // call cleanup-task

  // cleanup-task if number of products in DB is equal to 500
    // then check for datetime + 3 days
      // if found
        // get product-ids
        // delete products with resembling ids




  // SQL Queries absetzen
  /*mysqli_query($db, "INSERT INTO wp_handlemix (text) VALUES('$json')");
  $query = "";
	$owndesc_result = $db->query($query);
*/
};

// Map gender to ingredient- Array[0] - Maca - Amla
function mapGender($uGenderVal, $uAgeVal){
  global $ingredients;
  if($uGenderVal == "option1"){
    $ingredients[] = [
      "name" => "Maca",
      "ammount" => 3
    ];
    $ingredients[] = [
      "name" => "Amla",
      "ammount" => 0
    ];
    // age check for males
    mapAge($uAgeVal);
  }else{
    $ingredients[] = [
      "name" => "Maca",
      "ammount" => 0
    ];
    $ingredients[] = [
      "name" => "Amla",
      "ammount" => 3
    ];
  }
}

// Map age to ingredient
function mapAge($userAgeVal){
  global $ingredients;
  if($userAgeVal == "option2"){
    $ingredients[0]["ammount"] = 5;
  }
}

// Map tiredness to ingredient- Array[1] - Guarana
function mapTired($uTiredVal1, $uTiredVal2, $uTiredVal3){
  global $ingredients;
  if($uTiredVal1 == "3"){
      $ingredients[] = [
      "name" => "Guarana",
      "ammount" => 2.5
    ];
  }else if($uTiredVal1 == "4"){
      $ingredients[] = [
      "name" => "Guarana",
      "ammount" => 3.5
    ];
  }else if($uTiredVal1 == "5"){
      $ingredients[] = [
      "name" => "Guarana",
      "ammount" => 5
    ];
  }else{
      $ingredients[] = [
      "name" => "Guarana",
      "ammount" => 0
    ];
  }
  // sensitivity
  if($ingredients[1]["ammount"] == 3.5){
    if($uTiredVal3 == "4"){
      $ingredients[1]["ammount"] = 3;
    }else if($uTiredVal3 == "5"){
      $ingredients[1]["ammount"] = 2.5;
    }
  }
  if($ingredients[1]["ammount"] == 5){
    if($uTiredVal3 == "3"){
      $ingredients[1]["ammount"] = 4;
    }else if($uTiredVal3 == "4"){
      $ingredients[1]["ammount"] = 3.5;
    }else if($uTiredVal3 == "5"){
      $ingredients[1]["ammount"] = 2.5;
    }
  }
}

// Map concentration - Brahmi - 0 0.5 0.75 1 - Array[2]
function mapContentrate($uConcentrateVal){
  global $ingredients;
  if($uConcentrateVal == "3"){
    $ingredients[] = [
      "name" => "Brahmi",
      "ammount" => 0.5
    ];
  }else if($uConcentrateVal == "4"){
    $ingredients[] = [
      "name" => "Brahmi",
      "ammount" => 0.75
    ];
  }else if($uConcentrateVal == "5"){
    $ingredients[] = [
      "name" => "Brahmi",
      "ammount" => 1
    ];
  }else{
    $ingredients[] = [
      "name" => "Brahmi",
      "ammount" => 0
    ];
  }
}

// Map Health1 - Lucuma - 0 1 1.5 2 - Array[3]
function mapHealth1($uHealth1Val){
  global $ingredients;
  if($uHealth1Val == "3"){
    $ingredients[] = [
      "name" => "Lucuma",
      "ammount" => 1
    ];
  }else if($uHealth1Val == "4"){
    $ingredients[] = [
      "name" => "Lucuma",
      "ammount" => 1.5
    ];
  }else if($uHealth1Val == "5"){
    $ingredients[] = [
      "name" => "Lucuma",
      "ammount" => 2
    ];
  }else{
    $ingredients[] = [
      "name" => "Lucuma",
      "ammount" => 0
    ];
  }
}

// Map Health2 - Baobab - 0 1 1.5 2 - Array[4] - +Dummy
function mapHealth2($uHealth2Val, $uHealth3Val){
  global $ingredients;
  if($uHealth2Val == "3"){
    $ingredients[] = [
      "name" => "Baobab",
      "ammount" => 1
    ];
  }else if($uHealth2Val == "4"){
    $ingredients[] = [
      "name" => "Baobab",
      "ammount" => 1.5
    ];
  }else if($uHealth2Val == "5"){
    $ingredients[] = [
      "name" => "Baobab",
      "ammount" => 2
    ];
  }else{
    $ingredients[] = [
      "name" => "Baobab",
      "ammount" => 0
    ];
  }
}

// Map Fit1 - Dummy + Fit2 - Spirulina - 0 1 1.5 2 - Array[5]
function mapFit($uFit1Val, $uFit2Val){
  global $ingredients;
  if($uFit2Val == "3"){
    $ingredients[] = [
      "name" => "Spirulina",
      "ammount" => 1
    ];
  }else if($uFit2Val == "4"){
    $ingredients[] = [
      "name" => "Spirulina",
      "ammount" => 1.5
    ];
  }else if($uFit2Val == "5"){
    $ingredients[] = [
      "name" => "Spirulina",
      "ammount" => 2
    ];
  }else{
    $ingredients[] = [
      "name" => "Spirulina",
      "ammount" => 0
    ];
  }
}

// Map wLoss - Aronia - immer 1 - Array[6]
function mapWLoss($uWLossVal){
  global $ingredients;
  $ingredients[] = [
    "name" => "Aronia",
    "ammount" => 1
  ];
}

// Map Life1 - Brahmi - 0 0.5 0.75 1 - Array[2]
function mapLife1($uLife1Val){
  global $ingredients;
  if($uLife1Val == "3"){
    $ingredients[3]["ammount"] = $ingredients[3]["ammount"] + 0.5;
  }else if($uLife1Val == "4"){
      $ingredients[3]["ammount"] = $ingredients[3]["ammount"] + 0.75;
  }else if($uLife1Val == "5"){
      $ingredients[3]["ammount"] = $ingredients[3]["ammount"] + 1;
  }
}

// Map Life3 - Moringa - 0 1 1.5 2 - Array[7]
function mapLife3($uLife2Val, $uLife3Val){
  global $ingredients;
  if($uLife3Val == "3"){
    $ingredients[] = [
      "name" => "Moringa",
      "ammount" => 0.5
    ];
  }else if($uLife3Val == "4"){
    $ingredients[] = [
      "name" => "Moringa",
      "ammount" => 0.75
    ];
  }else if($uLife3Val == "5"){
    $ingredients[] = [
      "name" => "Moringa",
      "ammount" => 1
    ];
  }else{
    $ingredients[] = [
      "name" => "Moringa",
      "ammount" => 0
    ];
  }
}

// Sum of ingredients ammounts
function sumUpAmmounts($ingArr){
  $ammountSum = 0;
  $arrlength = count($ingArr);
  for ($i = 0; $i < $arrlength; $i++){
    $ammountSum = $ammountSum + $ingArr[$i]["ammount"];
  }
  return $ammountSum;
}

// Add Filler (55% Gerstengras - Array[8], 15% Baobab, 15% Aronia, 15% Brahmi)
function addFill($bar, $bao, $aro, $brah){
  global $ingredients;
    $ingredients[] = [
    "name" => "Gerstengras",
    "ammount" => $bar
  ];
  $ingredients[5]["ammount"] = $ingredients[5]["ammount"] + $bao;
  $ingredients[7]["ammount"] = $ingredients[7]["ammount"] + $aro;
  $ingredients[3]["ammount"] = $ingredients[3]["ammount"] + $brah;
}

// 20gr - sum of ingredients --> Filler in grams
function calculateFill(){
  global $ingredients;
  $mixture = sumUpAmmounts($ingredients);
  $fill = 20 - $mixture;
  if($fill > 0){
    $barleyGr = $fill * 0.55;
    $baobabGr = $fill * 0.15;
    $aroniaGr = $fill * 0.15;
    $brahmiGr = $fill * 0.15;
    addFill($barleyGr, $baobabGr, $aroniaGr, $brahmiGr);
  }
}

// Ammounts * 28 fuer Fullmenge 560gr, to two decimals, to json
function finalize(){
  global $ingredients;
  global $finalIngNames;
  global $finalIngAmm;
  $ingNameArray;
  $ingAmmountArray;
  $ingLenght = count($ingredients);
  for($i = 0; $i < $ingLenght; $i++){
     $ingredients[$i]["ammount"] = $ingredients[$i]["ammount"] * 28;
     // To display only first two decimal positions
     $ingredients[$i]["ammount"] = round($ingredients[$i]["ammount"], 2);
     $ingNameArray[$i] = $ingredients[$i]["name"];
     $ingAmmountArray[$i] = $ingredients[$i]["ammount"];
   }
   $finalIngNames = implode(";", $ingNameArray);
   $finalIngAmm = implode(";", $ingAmmountArray);
   /*$handlemix_json = JSON.stringify($finalIngNames);
   $specmix_json = JSON.stringify($finalIngAmm);*/

   // Send values an php?!
   /*HttpObject = new XMLHttpRequest();
   HttpObject.open("get", 'http://localhost/yourdailygreen/erstelle-deinen-mix/?json='+json);
   HttpObject.send(null);*/
}

// Calculate mix checkSum
function calculateCheckSum($ma, $am, $gu, $br, $lu, $ba, $sp, $ar, $mo, $ge){
  $calCheckSum = ($ma*2)+($am*4)+($gu*8)+($br*16)+($lu*32)+($ba*64)+($sp*128)+($ar*256)+($mo*512)+($ge*1024);
  return $calCheckSum;
}

// per Argument in 'a' entscheiden welche Funktion aufgerufen werden soll
switch ($_POST['a'])
{
    case 'answer':
        doAnything("session_id"); //sollte kein String sein, nur zum TEST so
        break;

    case 'callDoMagic':
        doMagic($_POST['b']);
        break;

    default:
        break;
}
 ?>
