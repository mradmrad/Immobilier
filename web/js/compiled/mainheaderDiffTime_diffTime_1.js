
function diffTime(start){

    var now = moment();

 if (now.diff(start, 'months') >= 2) {
           return "Rouge"+now.diff(start, 'months');
    }

    else if (now.diff(start, 'months') >= 1) {
		
        return "Orangé"+now.diff(start, 'months');
    }
   
    else {
        return "Vert"+now.diff(start, 'months') ;

    }

}

function remindersDiff(start){

    var now = moment();
    if (now.diff(start, 'days') == 0) {
        return 1;
    }

    else if (now.diff(start, 'days') >= -7 && now.diff(start, 'days')<= -1 ) {

        return 2;
    }

    else {
        return 3 ;

    }

}