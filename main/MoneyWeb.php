<html>

    <head>
        
        <meta charset="UTF-8">
        <title>MoneyWeb</title>
        <link rel = "icon" href = "../Media/Images/icon.ico">

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type = "text/javascript" src = "../Scripts/JS/ProfilesManagement.js"></script>
    
    
    </head>

    <body align="center"  bgcolor="purple">



        <br>

        <button>+ 1</button>
        <button>Recommencer</button>

        <font color="white" size="6">
        <p></p>
        </font>

        <br>

        <button>Ouvrir Le Magasin</button>

        <font color="red" size="6">
        <p></p>
        </font>

        <font color="green" size="6">
        <p></p>
        </font>

        <font color="yellow" size="6">
        <p></p>
        </font>

        <button disabled>+1 (15 €)</button>
        <button disabled>Auto x1 (15 €)</button>

        <br>
        <br>

        <button disabled>SpeedAuto x1 (65 €)</button>

        <script>

            let money = 0;
            let username;
            let PlusAuto = 0;
            let Speed = 1;
            let Plus = 1;
            let PrixSpeed = 0;
            let PrixAuto = 0;
            let Prix = 0;
            
            $.getJSON("../Scripts/user.json", function(userSelected) {

                $.getJSON("../Data/Utilisateurs/" + userSelected.name + ".json", function(user) {

                    insertParam("name",user.name);
                    money = user.Money;
                    money = user.Money;
                    username = user.name;
                    PlusAuto = user.PlusAuto;
                    Speed = user.Speed;
                    Plus = user.Plus
                    PrixSpeed = user.PrixSpeed;
                    PrixAuto = user.PrixAuto;
                    Prix = user.Prix;
                    money = user.Money;

                    moneyTXT[0].textContent = "Argent : " + money;
                    moneyTXT[2].textContent = "Auto : " + PlusAuto;
                    moneyTXT[3].textContent = "Speed : " + Speed;
                    Buttons[5].innerHTML = "SpeedAuto x" + (Speed + 1) + "(" + PrixSpeed + " €)";
                    Buttons[0].innerHTML = "+" + Plus;
                    Buttons[3].innerHTML = "+1 (" + Prix + " €)";
                    Buttons[4].innerHTML = "Auto x" + (PlusAuto + 1) + "(" + PrixAuto + " €)";


                });

            });


            let Magasin = false;

            const Buttons = document.querySelectorAll("button");
            const moneyTXT = document.querySelectorAll("p")

            Buttons[4].innerHTML = "Auto x" + (PlusAuto + 1) + "(" + PrixAuto + " €)";


            Buttons[0].addEventListener("click", function() {

                money += Plus;

                moneyTXT[0].textContent = "Argent : " + money;

                console.log(money)



            })



            Buttons[1].addEventListener("click", function() {

                money = 0;
                Plus = 1;
                Prix = 15;
                Speed = 0;
                PrixSpeed = 65;
                PrixAuto = 40;
                PlusAuto = 0;

                Buttons[0].innerHTML = "+" + Plus;

                Buttons[3].innerHTML = "+1 (" + Prix + " €)";
                Buttons[4].innerHTML = "Auto x" + (PlusAuto + 1) + "(" + PrixAuto + " €)";
                moneyTXT[0].textContent = "Argent : " + money;

                console.log(money)

                if (Magasin == true) {
                    
                    Magasin = false;

                    Buttons[3].disabled = true;

                    Buttons[2].innerHTML = "Ouvrir Le Magasin";
                    moneyTXT[1].textContent = "FERMER !";
                    

                }



            })

            Buttons[2].addEventListener("click", function() {

                console.log(Magasin);

                if (Magasin == false) {
                    
                    Magasin = true;

                    Buttons[2].innerHTML = "Ouvrir Le Magasin";
                    Buttons[3].disabled = false;
                    Buttons[4].disabled = false;
                    Buttons[5].disabled = false;
                    moneyTXT[1].textContent = "OUVERT !";

                    Buttons[2].innerHTML = "Fermer Le Magasin";

                } else if (Magasin == true) {
                    
                    Magasin = false;

                    Buttons[3].disabled = true;
                    Buttons[4].disabled = true;
                    Buttons[5].disabled = true;

                    Buttons[2].innerHTML = "Ouvrir Le Magasin";
                    moneyTXT[1].textContent = "FERMER !";
                    

                }
                


                console.log(Magasin);
                console.log(Buttons)



            })

            Buttons[3].addEventListener("click", function() {

                console.log(Prix)

                if (money < Prix) moneyTXT[1].textContent = "Vous n'avez pas assez il vous faut " + Prix + " € vous en avez que " + money + " il vous manque donc " + (Prix - money) + "!";


                if (money > (Prix - 1)) {

                console.log("CLICK")
                console.log(Plus)

                money -= Prix;

                Prix += (15 * Plus);

                Plus++;

                moneyTXT[0].textContent = "Argent : " + money;

                Buttons[0].innerHTML = "+" + Plus;

                Buttons[3].innerHTML = "+1 (" + Prix + " €)";
                Buttons[4].innerHTML = "Auto x" + (PlusAuto + 1) + "(" + PrixAuto + " €)";

                }



            })

            Buttons[4].addEventListener("click", function() {


                if (money < PrixAuto) moneyTXT[1].textContent = "Vous n'avez pas assez il vous faut " + PrixAuto + " € vous en avez que " + money + " il vous manque donc " + (PrixAuto - money) + "!";


                if (money > (PrixAuto - 1)) {


                    money -= PrixAuto;

                    PrixAuto += (15 * PlusAuto);

                PlusAuto++;



                moneyTXT[2].textContent = "Auto : " + PlusAuto;

                Buttons[4].innerHTML = "Auto x" + (PlusAuto + 1) + "(" + PrixAuto + " €)";

            }



            })

            Buttons[5].addEventListener("click", function() {


                if (money < PrixSpeed) moneyTXT[1].textContent = "Vous n'avez pas assez il vous faut " + PrixSpeed + " € vous en avez que " + money + " il vous manque donc " + (PrixSpeed - money) + "!";


                if (money > (PrixSpeed - 1)) {


                    money -= PrixSpeed;

                    Prix += (40 * Speed);

                    Speed++;



                    moneyTXT[3].textContent = "Speed : " + Speed;

                    Buttons[5].innerHTML = "SpeedAuto x" + (Speed + 1) + "(" + PrixSpeed + " €)";

                }



            })

            setInterval(function() {
                          
                money += PlusAuto;

                moneyTXT[0].textContent = "Argent : " + money;

            }, (1000 / Speed))

            function Save() {

                $.ajax({

                    type: "POST",
                    url: './MoneyWeb.php',
                    data: {function: "save",name: username,usermoney: money,userauto: PlusAuto,userspeed:Speed,userplus:Plus,userprixspeed:PrixSpeed,userprixauto:PrixAuto,userprix:Prix}

                });

                console.log("le fichier de " + username + " a bien était sauvegarder (" + money + ")");
                return "\"" + username + "\": \"" +  money + "\"";

            }


        </script>



    </br>
    </br>

    <button onclick="Save()",action = "
    
    <?php

        include_once "../Data/utilisateurs/RemoveUser.php";
        include "../Data/utilisateurs/AddUser.php";

        if (isset($_POST["name"]) && isset($_POST["usermoney"])) 
        {
            RemoveUser($_POST["name"]);   
            AddUser($_POST["name"],intval($_POST["usermoney"]),intval($_POST["userauto"]),intval($_POST["userspeed"]),intval($_POST["userplus"]),intval($_POST["userprixspeed"]),intval($_POST["userprixauto"]),intval($_POST["userprix"]),);

        }
    
    ?>
    
    ">Sauvegarder</button>

    <a href="./Profile.php">
        <button>Revenir aux profiles</button>
    </a>

    </body>




</html>
