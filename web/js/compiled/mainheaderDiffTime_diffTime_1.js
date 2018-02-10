
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
