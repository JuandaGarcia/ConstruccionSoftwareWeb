var tiempo = new Date();

var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")

console.log(tiempo.getDay())

document.write('<p>' + '<strong>'+ diasSemana[tiempo.getDay()] + '</strong>' +' ' + tiempo.getDate() + ' de ' + meses[tiempo.getMonth()] + '</p>')