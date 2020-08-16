<?php 

    function CreateUser($name, $money,$auto,$speed,$plus,$prixspeed,$prixauto,$prix) {

        $UserAdd = json_encode(array(

            'name' => $name, 
            'Money' => $money,
            'PlusAuto' => $auto,
            'Speed' => $speed,
            'Plus' => $plus,
            'PrixSpeed' => $prixspeed,
            'PrixAuto' => $prixauto,
            'Prix' => $prix
        
        ));
        
        return $UserAdd;

    }

    function AddUser($name, $money,$auto,$speed,$plus,$prixspeed,$prixauto,$prix) {
        
        file_put_contents('../Data/Utilisateurs/' . $name . '.json', CreateUser($name, $money,$auto,$speed,$plus,$prixspeed,$prixauto,$prix));

            
        $additionalArray = array(
        'name' => $name,
        );
            

        
        //open or read json data
        $data_results = file_get_contents('../Data/Utilisateurs/Users.json');
        $tempArray = json_decode($data_results);
        
        //append additional json to json file
        $tempArray[] = $additionalArray ;
        $tempArray.array_unique($name);
        $tempArray.array_unique("name");
        $jsonData = json_encode($tempArray);

        for ($i = 0;$i < $jsonData.sizeof();$i++) {
            
            $jsonData.array_unique('name');

        }
        
        file_put_contents('../Data/Utilisateurs/Users.json', $jsonData);   
        
    
    }

?>