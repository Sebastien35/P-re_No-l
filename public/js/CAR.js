// Date cible (25 décembre de l'année en cours)
var targetDate = new Date("2023-12-25").getTime();

function updateCountdown() {
    // Date actuelle
    var currentDate = new Date().getTime();

    // Calcul du temps restant en millisecondes
    var timeRemaining = targetDate - currentDate;

    // Calcul des jours restants
    var daysRemaining = Math.ceil(timeRemaining / (1000 * 60 * 60 * 24));

    // Affichage du nombre de jours restants
    document.getElementById("days").innerHTML = "Il ne reste plus que " +  daysRemaining + " jours avant Noël";
}

// Mettre à jour le compte à rebours chaque seconde
setInterval(updateCountdown, 3600000);

// Appeler la fonction une fois au chargement de la page pour éviter le délai initial
updateCountdown();


