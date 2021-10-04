
function HeureCheckEJS()
    {
    krucial = new Date;
    heure = krucial.getHours();
    min = krucial.getMinutes();
    sec = krucial.getSeconds();
    jour = krucial.getDate();
    mois = krucial.getMonth()+1;
    annee = krucial.getFullYear();
    var aujourdhui = new Date(); 
    var annee = aujourdhui.getFullYear(); // retourne le millésime
    var mois =aujourdhui.getMonth()+1; // date.getMonth retourne un entier entre 0 et 11 donc il faut ajouter 1
    var jour = aujourdhui.getDate(); // retourne le jour (1à 31)
    var joursemaine = aujourdhui.getDay() ; // retourne un entier compris entre 0 et 6 (0 pour dimanche)
    var tab_jour=new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    var tab_moi=new Array(" ", "Jan", "Fev", "Mar", "Avr", "Mai", "juin", "juil", "Août", "Sep", "Oct", "Nov", "Dec");

    if (sec < 10)
        sec0 = "0";
    else
        sec0 = "";
    if (min < 10)
        min0 = "0";
    else
        min0 = "";
    if (heure < 10)
        heure0 = "0";
    else
        heure0 = "";
    DinaHeure = tab_jour[joursemaine] + '  ' + jour + '  ' + tab_moi[mois] + ' ' + annee +"       "+ heure0 + heure + ":" + min0 + min + ":" + sec0 + sec ;
    which = DinaHeure
    if (document.getElementById){
        document.getElementById("ejs_heure").innerHTML=which;
    }
    setTimeout("HeureCheckEJS()", 1000)
    }
window.onload = HeureCheckEJS;
