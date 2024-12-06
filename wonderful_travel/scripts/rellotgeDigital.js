function rellotge(){
	let ara = new Date();

	let string;

	let diesSetmana = ["Diumenge", "Dilluns", "Dimarts", "Dimecres", "Dijous", "Divendres", "Dissabte"];

	let dia, mes, any;
	let ampm;

	let diaSetmana;

	dia = ara.getDate();
	mes = ara.getMonth() + 1;
	any = ara.getFullYear();

	let hores, minuts, segons;

	hores = ara.getHours();
	minuts = ara.getMinutes();
	segons = ara.getSeconds();

	if(hores < 10) hores = "0" + hores;
	if(minuts < 10) minuts = "0" + minuts;
	if(segons < 10) segons = "0" + segons;

	if(hores < 12) ampm = "AM";
	else ampm = "PM";

	diaSetmana = ara.getDay();
	let setmana;

	switch (diaSetmana) {
		case 0:
			setmana = diesSetmana[0];
			break;
		case 1:
			setmana = diesSetmana[1];
			break;
		case 2:
			setmana = diesSetmana[2];
			break;
		case 3:
			setmana = diesSetmana[3];
			break;
		case 4:
			setmana = diesSetmana[4];
			break;
		case 5:
			setmana = diesSetmana[5];
			break;
		case 6:
			setmana = diesSetmana[6];
			break;
		default:
			break;
	}

	string = dia + "/" + mes + "/" + any + "<br>" + setmana + "<br>" + hores + ":" + minuts + ":" + segons + " " + ampm;

	document.getElementById("reloj-container").innerHTML = string;
}

setInterval(rellotge, 1000);