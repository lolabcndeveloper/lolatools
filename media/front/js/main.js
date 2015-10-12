// CONFIGURATION //
//var base_url = window.location.origin;
var base_url = window.location.origin+'/tools';
// "http://stackoverflow.com"

var host = window.location.host;
// stackoverflow.com

var pathArray = window.location.pathname.split( '/' );
// ["", "questions", "21246818", "how-to-get-the-base-url-in-javascript"]



// UTILITIES //
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}






$(document).ready(function(){
    var idBody = 		$( 'body' ).attr( 'id' ); //id de la seccion
    //var url = 'http://lola.internet-link.com/incubator/lola/tools/';

    $( '.fileNice' ).nicefileinput({
        //label : 'Examinar' // Spanish label
    }); //@todo stilizar file inputs ... solo deberiamos cargarlo en las secciones que toca..

    $( '.dateStyle' ).datepicker({
        inline: true,
        firstDay: 1,
        showWeek: true,
        showOtherMonths: true,
        weekHeader: 'W',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        dayNamesMin: ['D', 'L', 'M', 'X', 'J', 'V', 'S'],
        showOn: "button",
        //buttonImage: url+"media/front/img/ui/calendar.png",
        buttonImage: "/incubator/lola/tools/media/front/img/ui/calendar.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        regional: "es",
        dateFormat: "yy-mm-dd"
    });
    //mostrar una fecha concreta en el calendario .datepicker( "setDate", "10/12/2012" );

    if ( idBody == 'home' ) { //poner el video de fondo en la primera pantalla al cargar

    }
    else {

    }

    $( '#search .button' ).on( 'click', function(){
        formSearch();
    });

    $( '#createMini .button' ).on( 'click', function(){
        formCreate();
    });

    $( '#addCountriesButton' ).on( 'click', function(){
        formAddCountries();
    });
    $( '#cancelCountriesButton' ).on( 'click', function(){
        formAddCountriesClose();
    });

    $('#createProjectButton').on('click', function() {
        validateProject();
    });

    $('#createCountriesButton').on('click', function() {
        validateRight();
    });
    $('#selectCountries').on('change', function() {
        var right_id = $(this).val();
        if (right_id != 0) {
            getRight(right_id);
        }
        else {
            formAddCountriesClose();
        }
    });
    $('#selectCountries').val('');

    /*
     $('.updateContainer a.buttonSmall').on('click', function(){
     alert('click');
     });

     $('.updateContainer input').on('change', function(){
     var $button = $(this).next();
     $button.removeClass('hide');
     });
     */

}); //ready



//formulario buscar
function formSearch() {
    window.location="?idBody=searchResult";
}

//formulario Crear
function formCreate() {
    //window.location="?idBody=createForm";
    var client = $('#clientCreate').val();
    var media = $('#mediaCreate').val();
    var name = $('#nameCreate').val();
    //window.location = './project/create/?client='+client+'&media='+media+'&name='+name;
    window.location = base_url+'/project/create/?client='+client+'&media='+media+'&name='+name;
}

//add un pais o grupos de paises, ocultamos el boton y mostramos los form
function formAddCountries() {
    $('#addCountriesButton').hide();
    $('#formCountry').resetForm();
    $('.countriesFormContainer').show();
    $('#createCountriesButton').html('Create');
    $('#formCountry [name="right_id"]').val('');
}
function formAddCountriesClose() {
    $('#addCountriesButton').show();
    $('.countriesFormContainer').hide();
    $('#formCountry').resetForm();
    $('#selectCountries').val('');
}


function validateProject() {

    var validator = $("#formProject").validate({
        errorElement: "div",
        rules: {
            client: {
                required: true,
                minlength: 2
                //regex_name:       /[0-9]/
            },
            name: {
                required: true,
                minlength: 2
                //regex_apellido:    /[0-9]/
            },
            media: {
                required: true,
                minlength: 2
                //regex_apellido:    /[0-9]/
            },
            client_owner: {
                required: true,
                email: true
            },
            production_owner: {
                required: true,
                email: true
            },
            account_owner: {
                required: true,
                email: true
            }
        }

    });

    if (validator.form()) {
        saveProject();
    }
    else {
        //alert('se ha producido un error');
    }


}

function saveProject() {

    //$("form#create").ajaxForm();
    $('#formProject').ajaxForm({
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            if (data.status == 'ok') {
                alert('Se ha guardado correctamente');
            }
            else {
                if (data.type == 'login') {
                    window.location.href = "./front/login";
                }
                else {
                    alert('Ha habido un error');
                }

            }
        }
        /*,
        complete: function(xhr) {
            //var data = JSON.parse(xhr.responseText);
            if (data.status == 'ok') {
                alert('Se ha guardado correctamente');
            }
            else {
                alert('Ha habido un error');
            }
        }
        */
    });

    $("#formProject").submit();

}

function validateRight() {

    var validator = $("#formCountry").validate({
        errorElement: "div",
        rules: {
            countries: {
                required: true,
                minlength: 2
                //regex_name:       /[0-9]/
            },
            description: {
                required: true,
                minlength: 2
                //regex_name:       /[0-9]/
            }
        }
    });

    if (validator.form()) {
        saveRight();
    }
    else {
        //alert('se ha producido un error');
    }
}
function saveRight() {

    $('#formCountry').ajaxForm({
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            if (data.status == 'ok') {
                alert('Se ha guardado correctamente');

                //Updating form
                var right_id = $('#formCountry input[name="right_id"]').val();
                if (right_id == '') {
                    var value = data.data;
                    var country = $('#formCountry input[name="countries"]').val();
                    $('#selectCountries').append('<option value="'+value+'">'+country+'</option>');
                    $('#createCountriesButton').html('Update');
                    $('#formCountry input[name="right_id"]').val(value);
                }
            }
            else {
                alert('Ha habido un error');
            }
        }
        /*,
         complete: function(xhr) {
         //var data = JSON.parse(xhr.responseText);
         if (data.status == 'ok') {
         alert('Se ha guardado correctamente');
         }
         else {
         alert('Ha habido un error');
         }
         }
         */
    });

    $("#formCountry").submit();

}

function getRight(right_id) {
    $.ajax({
        //url: '../../../right',
        url: base_url+'/right',
        type: 'POST',
        dataType: 'json',
        data: 'id=' + right_id,
        success: function(data, status, xhr) {
            //alert('Se han obtenido los datos');

            if (data.status == 'ok') {
                //console.log(data.data);
                displayRight(data.data);
            }
            else {
                alert('Ha habido un error');
            }

        }
    });
}

function displayRight(right) {

    //alert('displayRight:'+right);
    $('#formCountry').resetForm();
    $('#createCountriesButton').html('Update');

    /*
    //$.map(right, function(val, key) {
    for (key in right) {
        var val = right[key];
        console.log(val+' '+key);
        $('#formCountry input[name="'+key+'"]').val(val);
    };
    */

    $('#formCountry [name="right_id"]').val(right.id);
    $('#formCountry [name="countries"]').val(right.countries);
    $('#formCountry [name="description"]').val(right.description);

    $('#formCountry [name="production_email"]').val(right.production_email);
    $('#formCountry [name="production_from"]').val(right.production_from);
    $('#formCountry [name="production_to"]').val(right.production_to);
    if (right.production_budget != null && right.production_budget != '') {
        $('#formCountry #budgetProductionHouse .createContainer').addClass('hide');
        $('#formCountry #budgetProductionHouse .fileContainer').removeClass('hide');
        $('#formCountry #budgetProductionHouse .viewContainer a').attr('href', right.production_budget);
    }
    if (right.production_contract != null && right.production_contract != '') {
        $('#formCountry #contractProductionHouse .createContainer').addClass('hide');
        $('#formCountry #contractProductionHouse .fileContainer').removeClass('hide');
        $('#formCountry #contractProductionHouse .viewContainer a').attr('href', right.production_contract);
    }

    $('#formCountry [name="contract_email"]').val(right.contract_email);
    $('#formCountry [name="contract_from"]').val(right.contract_from);
    $('#formCountry [name="contract_to"]').val(right.contract_to);
    if (right.contract_budget != null && right.contract_budget != '') {
        $('#formCountry #budgetContractHouse .createContainer').addClass('hide');
        $('#formCountry #budgetContractHouse .fileContainer').removeClass('hide');
        $('#formCountry #budgetContractHouse .viewContainer a').attr('href', right.contract_budget);
    }
    if (right.contract_contract != null && right.contract_contract != '') {
        $('#formCountry #contractContractHouse .createContainer').addClass('hide');
        $('#formCountry #contractContractHouse .fileContainer').removeClass('hide');
        $('#formCountry #contractContractHouse .viewContainer a').attr('href', right.contract_contract);
    }

    $('#formCountry [name="music_email"]').val(right.music_email);
    $('#formCountry [name="music_from"]').val(right.music_from);
    $('#formCountry [name="music_to"]').val(right.music_to);
    if (right.contract_budget != null && right.contract_budget != '') {
        $('#formCountry #budgetMusicHouse .createContainer').addClass('hide');
        $('#formCountry #budgetMusicHouse .fileContainer').removeClass('hide');
        $('#formCountry #budgetMusicHouse .viewContainer a').attr('href', right.music_budget);
    }
    if (right.contract_contract != null && right.contract_contract != '') {
        $('#formCountry #contractMusicHouse .createContainer').addClass('hide');
        $('#formCountry #contractMusicHouse .fileContainer').removeClass('hide');
        $('#formCountry #contractMusicHouse .viewContainer a').attr('href', right.music_contract);
    }

    $('#formCountry [name="others_email"]').val(right.others_email);
    $('#formCountry [name="others_from"]').val(right.others_from);
    $('#formCountry [name="others_to"]').val(right.others_to);
    if (right.contract_budget != null && right.contract_budget != '') {
        $('#formCountry #budgetOthersHouse .createContainer').addClass('hide');
        $('#formCountry #budgetOthersHouse .fileContainer').removeClass('hide');
        $('#formCountry #budgetOthersHouse .viewContainer a').attr('href', right.others_budget);
    }
    if (right.contract_contract != null && right.contract_contract != '') {
        $('#formCountry #contractOthersHouse .createContainer').addClass('hide');
        $('#formCountry #contractOthersHouse .fileContainer').removeClass('hide');
        $('#formCountry #contractOthersHouse .viewContainer a').attr('href', right.others_contract);
    }

    $( '#addCountriesButton' ).hide();
    $( '.countriesFormContainer' ).show();
}

