/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function crearClave(origen, destino) {
    var clave = $("#" + origen).val().toLowerCase();
    do {
        clave = clave.replace(' ', '-');
    } while (clave.indexOf(' ') >= 0);

    $("#" + destino).val(clave);
}