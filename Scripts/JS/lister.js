let AppLocation = document.querySelectorAll("script");
for (let i = 0; i < AppLocation.length ;i++) {
    let file = AppLocation[i].src.split("/");
    console.log("le Fichier : " + file[(file.length - 1)] + " à bien était chargé");
}

console.log("\nTout les fichiers on était chargé !");