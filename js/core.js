function getCurrentDate(){
    return formatDate(new Date());
}

function getCurrentTime(){
	return formatTime(new Date());
}

function formatTime(time){
	var horas=time.getHours();
	var minutos=time.getMinutes();
	
	if(horas<10){
		horas="0"+horas;
	}
	if(minutos<10){
		minutos="0"+minutos;
	}
	
	return horas+":"+minutos;
}

function formatDate(date){
    var dia=date.getDate();
    var mes=date.getMonth()+1;
    if(dia<10){
        dia="0"+dia;
    }
    if(mes<10){
        mes="0"+mes;
    }
    return ""+dia+"/"+mes+"/"+date.getFullYear();
}

function daysInMonth(month,year) {
    return new Date(year, month, 0).getDate();
}