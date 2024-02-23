<?php
try{
     $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."",USER, PASS);
    } catch(PDOException $e){
     echo "Error: " . $e->getMessage();






}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

//---------------------------------------------------
//get All Records
function getAllPets($conx){
    try{
        $sql ="SELECT * FROM pets WHERE id = :id";
        $stm = $conx->prepare($sql);
        $stm->execute();
        return $stm->fetchALL();
    }

    catch (PDOException $e){
        echo "Error: " . $e->getMessage();
}
}



//---------------------------------------------
//Add Pet
function addPet($conx, $data){
    try {
        $sql ="INSERT INTO pets (name, photo, kind, weight, 
                                        age, breed, location)
                VALUES(:name, :photo, :kind, :weight, 
                                    :age, :breed, :location)";
        $smt= $conx -> prepare($sql);
        if($smt->execute($data)){
            $_SESSION['msg']= 'The Pet: ' . $data['name'] . ' was added successfully';
            return true;
        }else{
            return false;
        }


    }  catch (PDOException $e){
        echo "Error: " . $e->getMessage();
}
}



//---------------------------------------------------
//GET RECORDS

function getPet($conx){
    try{
        $sql ="SELECT * FROM pets WHERE id = :id";
        $stm = $conx->prepare($sql);
        $stm->execute();
        return $stm->fetch();
    }

    catch (PDOException $e){
        echo "Error: " . $e->getMessage();
}
}
