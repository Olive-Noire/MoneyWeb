<?php 

    function RemoveUser($name) {
        
        // read json file
        $data = file_get_contents('../Data/Utilisateurs/Users.json');

        // decode json to associative array
        $json_arr = json_decode($data, true);

        // get array index to delete
        $arr_index = array();
        foreach ($json_arr as $key => $value)
        {
            if (isset($name) && $value['name'] == $name)
            {
                $arr_index[] = $key;
            }
        }

        // delete data
        foreach ($arr_index as $i)
        {
            unset($json_arr[$i]);
        }

        // rebase array
        $json_arr = array_values($json_arr);

        // encode array to json and save to file
        file_put_contents('../Data/Utilisateurs/Users.json', json_encode($json_arr));  
        @unlink('../Data/Utilisateurs/' . $name . '.json');
    
    }


?>