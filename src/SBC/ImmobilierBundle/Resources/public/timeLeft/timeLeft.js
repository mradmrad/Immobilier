function timeLeft(start){

    var now = moment();



    if (now.diff(start, 'years') > 0) {
        return "Le " + start.getFullYear() + "/" + start.getMonth()  + "/" + start.getDay();
    }

    else if (now.diff(start, 'months') >= 2) {
           return "Le " + start.getFullYear() + "/" + start.getMonth()  + "/" + start.getDay();
    }

    else if (now.diff(start, 'months') > 0) {
		
        return "Il y a " + now.diff(start, 'months') + " mois";
    }
    else if (now.diff(start, 'days') > 0) {
        return "Il y a " + now.diff(start, 'days') + " jour(s)";
    }
    else if (now.diff(start, 'hours') > 0) {
        return "Il y a " + now.diff(start, 'hours') + " heure(s)";
    }
    else if (now.diff(start, 'minutes') > 0) {
        return "Il y a " + now.diff(start, 'minutes') + " minute(s)";
    }
    else if (now.diff(start, 'seconds') > 40) {
        return "Il y a " + now.diff(start, 'seconds') + " seconde(s)";
    }
    else {
        return "Maintenant";

    }

}
