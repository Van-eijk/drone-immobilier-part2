
let serviceSlide = document.getElementsByClassName("serviceslide");
let etape = 0; // permet de savoir quelle image afficher

let stepOn = document.getElementsByClassName("step"); //Permet de signaler l'etape active

let nombreImage = serviceSlide.length; // On récupère le nombre d'image qui est égale à la taille du tableau


// La fonction suivante permet de désactiver toutes les images
function enleverActiveImage() {
    for (let i = 0; i < nombreImage; i++) {
        serviceSlide[i].classList.remove('active');
        stepOn[i].style.opacity = 0.4; // On regle l'opacité de tous les steps


        //stepOn[i].classList.remove('active'); // On desactive tous les niveaux d'indicateurs
    }
}


let suivant = document.querySelector('.suivant');  // On recupère le bouton suivant
let precedent = document.querySelector('.precedent'); // On recupère le bouton precedent


// la fonction suivante permet de passer de l'image actuelle à l'image suivante
suivant.addEventListener('click', function () {
    //alert("bjr");
    etape++; // On incremente le numero de l'etape
    if (etape >= nombreImage) {
        // Si l'etape est superieur ou egale au nombre total d'images, on ramene l'etape à zero pour éviter d'afficher une image qui n'existe pas
        etape = 0;
    }
    enleverActiveImage(); // On désactive toutes les images
    serviceSlide[etape].classList.add('active'); // On active uniquement l'image correspondant à l'etape actuelle
    stepOn[etape].style.opacity = 1; // On active uniquement le niveau d'indicateur correspondant à l'image affichée
});


// la fonction suivante nous permet de passer de l'image actuelle à l'image precedente

precedent.addEventListener('click', function () {

    etape--;  // On décremente l'etape
    if (etape < 0) {
        // Si l'etape est inferieur à 0, on ramene l'etape au numéro correspondant à la derniere image
        etape = nombreImage - 1; // l'etape est egale à la taille du tableau moins 1
    }
    enleverActiveImage(); // On désactive toutes les images

    serviceSlide[etape].classList.add('active'); // On active uniquement l'image correspondant à l'etape actuelle
    stepOn[etape].style.opacity = 1; // On active uniquement le niveau d'indicateur correspondant à l'image affichée
});

// la fonction suivante nous permet de defiler les images automatiquement

setInterval(function () {
    etape++;
    if (etape >= nombreImage) {
        etape = 0;
    }
    enleverActiveImage();
    serviceSlide[etape].classList.add('active');
    stepOn[etape].style.opacity = 1;
}, 4000);

