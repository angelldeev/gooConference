(function() {
    "use strict"


    let regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function() {
        //console.log('Listo')
        var map = L.map('map').setView([14.624448, -90.50271], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([14.624448, -90.50271]).addTo(map)
    .bindPopup('gooConference.<br> ven por tus reservaciones.')
    .openPopup();

        // Campos datos

        let nombre = document.getElementById('nombre');
        let apellido = document.getElementById('apellido');
        let email = document.getElementById('email');

        // Campos de pases

        let pase_dia = document.getElementById('pase_dia');
        let pase_2d = document.getElementById('pase_2d');
        let pase_semana = document.getElementById('pase_semana');

        // Botones

        let calcular = document.getElementById('calcular');
        let errorDiv = document.getElementById('error')
        let botonRegistro = document.getElementById('btn-registro');
        let product_list = document.getElementById('lista-productos')

        // Extras 

        let camisas = document.getElementById('camisa_evento');
        let etiquetas = document.getElementById('etiqueta_evento');
        let total = document.getElementById('suma-total');

        calcular.addEventListener('click', calcularTotal);
        pase_dia.addEventListener('blur', mostrarOP);
        pase_2d.addEventListener('blur', mostrarOP);
        pase_semana.addEventListener('blur', mostrarOP);

        nombre.addEventListener('blur', validarCampos);
        apellido.addEventListener('blur', validarCampos);
        email.addEventListener('blur', validarCampos);
        email.addEventListener('blur', validarCorreo);

        function validarCorreo(event) {
            if (this.value.indexOf("@") < -1) {
                errorDiv.style.display = `none`;
                this.style.border = `none`;
            } else {
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = `Este correo no es valido`;
                this.style.border = '1px solid red';
                errorDiv.style.border = `1px solid red`;
            }
        }

        function validarCampos(event) {
            if (this.value == '') {
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = `Este campo es obligatorio`;
                this.style.border = '1px solid red';
                errorDiv.style.border = `1px solid red`;
            } else {
                errorDiv.style.display = `none`;
                this.style.border = `none`;
            }
        }

        function calcularTotal(event) {
            event.preventDefault();
            //console.log('Has hecho click');
            if (regalo.value === '') {
                alert('Debes elegir un regalo');
                regalo.focus();
            } else {
                let boletosDia = parseInt(pase_dia.value, 10) || 0;
                let boletos3D = parseInt(pase_2d.value, 10) || 0;
                let boletosSem = parseInt(pase_semana.value, 10) || 0;
                let cantCamisas = parseInt(camisas.value, 10) || 0;
                let cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

                let totalPago = (boletosDia * 30) + (boletos3D * 45) + (boletosSem * 50) + ((cantCamisas * 10) * 0.93) + (cantEtiquetas * 2)
                let listadoProduc = [];


                if (boletosDia >= 1) {
                    listadoProduc.push(`${boletosDia} Pase por dia`);
                }
                if (boletos3D >= 1) {
                    listadoProduc.push(`${boletos3D} pase por 3 dias.`);
                }
                if (boletosSem >= 1) {
                    listadoProduc.push(`${boletosSem} pase por toda la semana.`);
                }
                if (cantCamisas >= 1) {
                    listadoProduc.push(`${cantCamisas} camisas`);
                }
                if (cantEtiquetas >= 1) {
                    listadoProduc.push(`${cantEtiquetas} etiquetas`);
                }



                product_list.innerHTML = '';

                for (let i = 0; i < listadoProduc.length; i++) {
                    product_list.innerHTML += listadoProduc[i] + '<br/>';

                }
                total.innerHTML = "$" + totalPago.toFixed(2);
            }
        }

        function mostrarOP(event) {
            event.preventDefault();

            let boletosDia = parseInt(pase_dia.value, 10) || 0,
                boletos2D = parseInt(pase_2d.value, 10) || 0,
                boletosSem = parseInt(pase_semana.value, 10) || 0;

            let diasSelect = [];

            if (boletosDia > 0) {
                diasSelect.push('viernes');
            }
            if (boletos2D > 0) {
                diasSelect.push('viernes', 'sabado');
            }
            if (boletosSem > 0) {
                diasSelect.push('viernes', 'sabado', 'domingo');
            }

            for (let i = 0; i < diasSelect.length; i++) {
                document.getElementById(diasSelect[i]).style.display = 'block';

            }
        }

    }); // DOM CONTENT LOADED
})();