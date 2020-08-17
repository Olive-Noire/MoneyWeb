<!DOCTYPE html>
<html>

    <head>

        <meta charset="UTF-8">
        <title>MoneyWeb</title>

        <link rel="stylesheet" href = "../CSS/interfaces/interfaceProfiles.css">
        <link rel = "icon" href = "../Media/Images/icon.ico">

        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <script type = "text/javascript" src = "../Scripts/JS/ProfilesManagement.js"></script>

    </head>


    <body>

        <span id = "Choix">Choississez Un Profile 👩🧑 : </span>

        </br>
        </br>

        <div id = "ProfileMenu"></div>


        <button onclick="NouveauProfile()",action = " 
        <?php 

            include_once "../Data/utilisateurs/AddUser.php";

            if (isset($_POST["name"]) && isset($_POST["money"]) && !isset($_POST["function"])) {
                
                AddUser($_POST["name"],intval($_POST["money"]),intval($_POST['auto']),intval($_POST['speed']),intval($_POST['plus']),intval($_POST['prixspeed']),intval($_POST['prixauto']),intval($_POST['prix']));
            }

        ?> ">Nouveau Profile</button>


        <button onclick="DeleteProfile()", action = "
        
        <?php
        
            include_once '../Data/utilisateurs/RemoveUser.php';
            
            if (isset($_POST['name']) && $_POST['function'] == "delete" ) RemoveUser($_POST['name']);

            if (isset($_POST['function']) && isset($_POST['name']) && $_POST['function'] = "selectUser") {

                file_put_contents("../Scripts/user.json", json_encode(array("name" => $_POST['name'])));

            };
        
        ?>
    
    
    ">Supprimer Profile</button>
    
    </body>


    <script type = "text/javascript" src = "../Scripts/JS/lister.js"></script>

</html>