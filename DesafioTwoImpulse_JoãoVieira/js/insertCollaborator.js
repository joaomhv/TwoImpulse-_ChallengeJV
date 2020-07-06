//Submit através do JS
$(document).on('click', '#botaoInserir', function(){
    if($(this).val() == 'add'){
        inserir();
    }
    else{
        editar();
    }
});


$(function(){
    //Validacao do form (atraves do disable botao)
    if($('#botaoInserir').val() == 'add'){
        $('#botaoInserir').attr('disabled',true);
    }
    if($('#botaoInserir').val() != 'add'){
        $('#botaoInserir').attr('disabled',false);
    }
    $('input#name, input#address, input#birthdate').keyup(function(){
        $('input#name, input#address').each(function() {
            if ($(this).val() != '' && $('select#status').children("option:selected").val() != '' && $('select#position').children("option:selected").val() != '') {
                $('input#birthdate').on('change', function(){
                    console.log($(this));
                    if($(this).val() != '' && $('select#status').children("option:selected").val() != '' && $('select#position').children("option:selected").val() != ''){
                        console.log('all inputs filled');
                        console.log($('input#birthdate').val());
                        $('#botaoInserir').attr('disabled',false);
                    }
                    else{
                        console.log('theres an empty input');
                        console.log($('input#birthdate').val());
                        $('#botaoInserir').attr('disabled',true);
                        return false;
                    }
                });
                
                if($('input#birthdate').val() != '' && $('select#status').children("option:selected").val() != '' && $('select#position').children("option:selected").val() != ''){
                    console.log('all inputs filled');
                    console.log($('input#birthdate').val());
                    $('#botaoInserir').attr('disabled',false);
                }
                if($('select#status').children("option:selected").val() != '' && $('select#position').children("option:selected").val() != ''){
                    console.log(111111);
                    $('#botaoInserir').attr('disabled',false);
                }
            }
            else{
                console.log('theres an empty input');
                console.log($('input#birthdate').val());
                $('#botaoInserir').attr('disabled',true);
                return false;
            }
        });

        if($('input#birthdate').val() != '' && $('input#name').val() != '' && $('input#address').val() != '' && $('select#status').children("option:selected").val() != '' && $('select#position').children("option:selected").val() != ''){
            console.log('all inputs filled');
            console.log($('input#birthdate').val());
            $('#botaoInserir').attr('disabled',false);
        }
        else{
            console.log('theres an empty input');
            console.log($('input#birthdate').val());
            $('#botaoInserir').attr('disabled',true);
            return false;
        }
    });

    $('input#birthdate').on('change', function(){
        console.log($(this));
        if($('input#birthdate').val() != '' && $('input#name').val() != '' && $('input#address').val() != '' && $('select#status').children("option:selected").val() != '' && $('select#position').children("option:selected").val() != ''){
            console.log('all inputs filled');
            console.log($('input#birthdate').val());
            $('#botaoInserir').attr('disabled',false);
        }
        else{
            console.log('theres an empty input');
            console.log($('input#birthdate').val());
            $('#botaoInserir').attr('disabled',true);
            return false;
        }
    });

    $('select#status, select#position').on('change', function(){
        // console.log($(this));
        if($('input#birthdate').val() != '' && $('input#name').val() != '' && $('input#address').val() != '' && $('select#status').children("option:selected").val() != '' && $('select#position').children("option:selected").val() != ''){
            console.log('all inputs filled');
            console.log($('input#birthdate').val());
            $('#botaoInserir').attr('disabled',false);
        }
        else{
            console.log('theres an empty input');
            console.log($('input#birthdate').val());
            $('#botaoInserir').attr('disabled',true);
            return false;
        }
    });

});

//Envio dos dados para INSERT
function inserir() {
   
    var name = $('#name').val();
    var birthdate = $('#birthdate').val();
    var address = $('#address').val();
    var status = $('#status').val();
    var position = $('#position').val();
    var op = 1;

    console.log(name + " | " + birthdate + " | " + address + " | " + status  + " | " + position);


    $.ajax({
        type: "POST",
        url: "php/op.php",
        data: { name : name, birthdate : birthdate, address : address, status : status, position : position, op : op},
        success: function( result ) {

            console.log(name + " | " + birthdate + " | " + address + " | " + status  + " | " + position);
            var res = JSON.parse(result);
           
            if(res['val'] == 1){
                console.log("Registo efetuado com sucesso");

                sweetInsert();
                document.getElementById('formulario').reset();
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 1500);
            }
            else{
                console.log("res['msg']");
            }          
        }
    });
}

//Envio dos dados para UPDATE
function editar() {
   
    var name = $('#name').val();
    var birthdate = $('#birthdate').val();
    var address = $('#address').val();
    var status = $('#status').val();
    var position = $('#position').val();
    var empolyeeId = $('#botaoInserir').val();
    var op = 4;

    console.log(empolyeeId + " | " + name + " | " + birthdate + " | " + address + " | " + status  + " | " + position);

    $.ajax({
        type: "POST",
        url: "php/op.php",
        data: { empolyeeId : empolyeeId, name : name, birthdate : birthdate, address : address, status : status, position : position, op : op},
        success: function( result ) {

            console.log(name + " | " + birthdate + " | " + address + " | " + status  + " | " + position);
            var res = JSON.parse(result);
           
            if(res['val'] == 1){
                console.log("Registo efetuado com sucesso");

                sweetUpdate();
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 1500);
            }
            else{
                console.log("res['msg']");
            }          
        }
    });
}

function sweetInsert(){
    swal({
        className: "swal-text",
        text: 'Successfully Registered',
        icon: 'success',
        timer: 1500,
        buttons: false,
    });
}

function sweetUpdate(){
    swal({
        className: "swal-text",
        text: 'Successfully Edited',
        icon: 'success',
        timer: 1500,
        buttons: false,
    });
}


