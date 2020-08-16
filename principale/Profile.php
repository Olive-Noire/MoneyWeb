RefreshProfiles();

//Ajouter un Profile

var profileName;

function NouveauProfile(name) {

    if (name == null) profileName = prompt("Choississez le nom du Profile");
    if (name != null) profileName = name;

    //Verification des types de noms non valide
    if (profileName != "" && profileName != " " && profileName.length <= 10) {


        //Verification de l'existence
        var exist = false;
        var Profiles = document.getElementsByClassName("profile");

        for (let i = 0;i < Profiles.length;i++) if (profileName == Profiles[i].textContent) exist = true;

        if (!exist) {

            var nouveauProfile = document.createElement("div");
            nouveauProfile.setAttribute("class","profile")
            nouveauProfile.textContent = profileName;
            nouveauProfile.setAttribute("id",nouveauProfile.textContent)

            if (document.getElementById("ProfileMenu") != null) document.getElementById("ProfileMenu").appendChild(nouveauProfile);
            if (name == null) alert("Profile Creer avec Succes !✅");

                console.log("creation du fichier !"); 
                $.ajax({

                    type: "POST",
                    url: './Profile.php',
                    data: {name:profileName,money:0,auto:0,speed:1,plus:1,prixspeed:65,prixauto:40,prix:25}

                });
                RefreshProfiles();

            } else {

            alert("Ce nom De Profile existe Déjà ! ❌⛔");

            }


        } else {

            alert("⚠ Ce n'est pas un nom de Profile Valide ! ⚠\nVeuillez reessayer");

        }

    }

function GetName() {

    return profileName;

}


//Supprimer un Profile

function DeleteProfile(name) {

    var deletedProfile;
    if (name == null) deletedProfile = document.getElementById(prompt("Choississez le nom du Profile a supprimer"));

    if (name != null) {
        
        deletedProfile = document.getElementById(name);

        if (deletedProfile != null) deletedProfile.parentNode.removeChild(deletedProfile);

    }

    //Verification de l'existence
    if (deletedProfile != null && name == null){
        
        //Confirmation
        if (confirm("Etes Vous sûr ? De vouloir supprimer ce Profile : " + deletedProfile.textContent + " ?\nCette Action est Iréversible 💥‼")) {

            document.location = "./Profile.php"
            deletedProfile.parentNode.removeChild(deletedProfile);
            alert("Profile Supprimmer avec Succes !✅");

            console.log("suppression du fichier !"); 
                $.ajax({

                    type: "POST",
                    url: './Profile.php',
                    data: {name:profileName,function: "delete"}

            })


        } else {

            alert("Suppresion Annulé ✔");

        }

    } else {

        if (name == null) alert("⚠ Ce Profile n'existe pas ! ⚠\nVeuillez reessayer");

    }

}

Array.prototype.removeDuplicates = function () {
    return this.filter(function (item, index, self) {
        return self.indexOf(item) == index;
    });
};

function RefreshProfiles() {

    $.getJSON("../Data/Utilisateurs/Users.json", function(users) {

        for(let i = 0;i < users.length;i++) {

            users.removeDuplicates();

            if (document.getElementById("ProfileMenu") != null) var profiles = document.getElementsByClassName("profile");
            $.getJSON("../Data/Utilisateurs/" + users[i].name + ".json", function(user) {

                if (document.getElementById(user.name) == null) NouveauDiv(user.name);
                var fileName = location.href.split("/").slice(-1);
                console.log(fileName[0])
                if (!fileName[0].startsWith("MoneyWeb")) {    
                profiles[i].addEventListener("click", function() {
                    $.ajax({

                        type: "POST",
                        url: './Profile.php',
                        data: {name:user.name,function: "selectUser"}
    
                    });
                document.location = "./MoneyWeb.php";

                });

            }


            });

        }


    });
}

function insertParam(key, value) {
    key = encodeURIComponent(key);
    value = encodeURIComponent(value);

    // kvp looks like ['key1=value1', 'key2=value2', ...]
    var kvp = document.location.search.substr(1).split('&');
    let i=0;

    for(; i<kvp.length; i++){
        if (kvp[i].startsWith(key + '=')) {
            let pair = kvp[i].split('=');
            pair[1] = value;
            kvp[i] = pair.join('=');
            break;
        }
    }

    if(i >= kvp.length){
        kvp[kvp.length] = [key,value].join('=');
    }

    // can return this or...
    let params = kvp.join('&');

    // reload page with new params
    var fileName = location.href.split("/").slice(-1);
    if (fileName[0].endsWith(".html")) document.location.search = params;
}

function NouveauDiv(name) {

    if (name == null) profileName = prompt("Choississez le nom du Profile");
    if (name != null) profileName = name;

    //Verification des types de noms non valide
    if (profileName != "" && profileName != " " && profileName.length <= 10) {


        //Verification de l'existence
        var exist = false;
        var Profiles = document.getElementsByClassName("profile");

        for (let i = 0;i < Profiles.length;i++) if (profileName == Profiles[i].textContent) exist = true;

        if (!exist) {

            var nouveauProfile = document.createElement("div");
            nouveauProfile.setAttribute("class","profile")
            nouveauProfile.textContent = profileName;
            nouveauProfile.setAttribute("id",nouveauProfile.textContent)

            if (document.getElementById("ProfileMenu") != null) document.getElementById("ProfileMenu").appendChild(nouveauProfile);

            } else {

            alert("Ce nom De Profile existe Déjà ! ❌⛔");

            }


        } else {

            alert("⚠ Ce n'est pas un nom de Profile Valide ! ⚠\nVeuillez reessayer");

        }

    }

RefreshProfiles();
