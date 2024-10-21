//alert("fichier externe chambre");


let caSpecifique = document.getElementsByClassName("caSpecifique"); // On récupère la liste des caracteristiques specifiques

let caractChambre = document.getElementById("caractChambre");
let caractTerrain = document.getElementById("caractTerrain");
let caractMagasin = document.getElementById("caractMagasin");
let caractImmeuble = document.getElementById("caractImmeuble");
let caractMaison = document.getElementById("caractMaison");




function showMaison(){
    document.getElementById("choixCat").style.display = "none";

    for(let i = 0 ; i < caSpecifique.length ; i++){
        caSpecifique[i].style.display = "none" ;
        //caSpecifique[i].remove();
    }

    if(document.getElementById("catMaison").checked == true){
        caractMaison.style.display = "block";

    }

}


function showChambre(){
    document.getElementById("choixCat").style.display = "none";

    for(let i = 0 ; i < caSpecifique.length ; i++){
        caSpecifique[i].style.display = "none" ;
        //caSpecifique[i].remove();
    }

    if(document.getElementById("catChambre").checked == true){
       caractChambre.style.display = "block";

    }

}


// fonction pour afficher les caracteristiques du terrain

function showTerrain(){

    document.getElementById("choixCat").style.display = "none";

    for(let i = 0 ; i < caSpecifique.length ; i++){
        caSpecifique[i].style.display = "none" ;
        //caSpecifique[i].remove();
    }

    if(document.getElementById("catTerrain").checked == true){
       caractTerrain.style.display = "block";

    }

}


// fonction pour afficher les caracteristiques du Magasin

function showMagasin(){

    document.getElementById("choixCat").style.display = "none";

    for(let i = 0 ; i < caSpecifique.length ; i++){
        caSpecifique[i].style.display = "none" ;
        //caSpecifique[i].remove();
    }

    if(document.getElementById("catMagasin").checked == true){
        caractMagasin.style.display = "block";

    }

}

// fonction pour afficher les caracteristiques de l'immeuble

function showImmeuble(){

    document.getElementById("choixCat").style.display = "none";

    for(let i = 0 ; i < caSpecifique.length ; i++){
        caSpecifique[i].style.display = "none" ;
        //caSpecifique[i].remove();
    }

    if(document.getElementById("catImmeuble").checked == true){
        caractImmeuble.style.display = "block";

    }

}


