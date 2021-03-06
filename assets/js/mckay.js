var nombre, rut, mail, sexo, fecnac, fono, region, ciudad, sueno,mayor;

nombre	= localStorage.getItem("nombre");
rut	  	= localStorage.getItem("rut");
mail  	= localStorage.getItem("mail");
fecnac	= localStorage.getItem("fecnac");
fono  	= localStorage.getItem("fono");
region 	= localStorage.getItem("region");
sueno 	= localStorage.getItem("sueno");
mayor 	= localStorage.getItem("mayor");

$('#nombre').val(nombre);
$('#rut').val(rut);
$('#email').val(mail);
$('#fecha').val(fecnac);
$('#telefono').val(fono);
$('#region').val(region);

$('.item').each(function(){
	if($(this).data("sueno")==sueno){
		$(this).addClass('checked');
	}
});

if(mayor==1){
	$('#inlineRadio1').prop('checked', true);
}



$(function() {

	$('.slider_categoria').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    dots: true,
	    autoplay: false,
	    video: false,
	    lazyLoad:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        768:{
	            items:1
	        },
	        1200:{
	            items:1
	        }
	    }
	});
	$('.slider_productos').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    dots: false,
	    autoplay: false,
	    video: false,
	    lazyLoad:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        768:{
	            items:1
	        },
	        1200:{
	            items:1
	        }
	    }
	});


$('#form_codigo')
    .formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        }
    })
    .on('err.field.fv', function(e, data) {
            data.element
                .data('fv.messages')
                .find('.help-block[data-fv-for="' + data.field + '"]').hide();
    })
    .on('success.form.fv', function(e) {
		e.preventDefault();
	    if ($('#leido').is(':checked')) {
				codigo 	= $('#codigo').val();
				hora 	= $('#hora').val();
				$('#codigo2').val(codigo);
				$('#hora2').val(hora);

				$('.box_ganador').addClass('hide');
				$('#ingreso_datos').removeClass('hide');
				$('html, body').animate({  scrollTop: $("#ingreso_datos").offset().top }, 1000);

		}else{
			alert('Debes leer y aceptar los Términos y Condiciones');
		}
    })
    .find('[name="hora"]').mask('99:99');

$('#form_codigo_xs')
    .formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        }
    })
    .on('err.field.fv', function(e, data) {
            data.element
                .data('fv.messages')
                .find('.help-block[data-fv-for="' + data.field + '"]').hide();
    })
    .on('success.form.fv', function(e) {
		e.preventDefault();
	    if ($('#leido').is(':checked')) {
				codigo 	= $('#codigo').val();
				hora 	= $('#hora').val();
				$('#codigo2').val(codigo);
				$('#hora2').val(hora);

				$('.box_ganador').addClass('hide');
				$('#ingreso_datos').removeClass('hide');
				$('html, body').animate({  scrollTop: $("#ingreso_datos").offset().top }, 1000);

		}else{
			alert('Debes leer y aceptar los Términos y Condiciones');
		}
    })
    .find('[name="hora"]').mask('99:99');


    $('#leido').change(function () {
	    if ($('#leido').is(':checked')) {
			$('#btnOK').prop('disabled', false);
			$('#btnOK').removeClass('disabled');
			$('#btnOK').css({'opacity':'1'});
		}else{
			$('#btnOK').prop('disabled', true);
			$('#btnOK').addClass('disabled');
			$('#btnOK').css({'opacity':'0.5'});
		}
	});


$('.item').on('click',function(){
	sueno = '';
	if(!$(this).hasClass('checked')){
		$('.item').removeClass('checked');
		$(this).addClass('checked');
		sueno = $(this).data('sueno');
	}else{
		$('.item').removeClass('checked');
	}
	$('#sueno').val(sueno);
});

$('#form_datos')
    .formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            rut: {
                validators: {
                    id: {
                        country: 'CL',
                        message: 'Rut Invalido'
                    }
                }
            }
        }
    })
    .on('err.field.fv', function(e, data) {
            data.element
                .data('fv.messages')
                .find('.help-block[data-fv-for="' + data.field + '"]').hide();
    })
    .on('success.form.fv', function(e) {
		e.preventDefault();
	    if($('input[name=mayor]:checked').val()==1){
		    $("#form_datos button").html('<i class="fa fa fa-spinner fa-spin"></i>');

		    mayor	= 1;
			nombre	= $('#nombre').val();
			rut		= $('#rut').val();
			mail	= $('#email').val();
			fecnac	= $('#fecha').val();
			fono	= $('#telefono').val();
			region	= $('#region').val();
			codigo2 = $('#codigo2').val();
			hora2 	= $('#hora2').val();

		    localStorage.setItem("mayor",mayor);
		    localStorage.setItem("nombre",nombre);
		    localStorage.setItem("rut",rut);
		    localStorage.setItem("mail",mail);
		    localStorage.setItem("fecnac",fecnac);
		    localStorage.setItem("fono",fono);
		    localStorage.setItem("region",region);
		    localStorage.setItem("sueno",sueno);
			$.ajax({
			    type: "POST",
			    url: "ajax/validacodigo1.php",
			    data: {'codigo':codigo2,'hora':hora2},
			    success: function(msg) {
			    	console.log(msg);
			    	if(msg=='1'){
						$.ajax({
						    type: "POST",
						    url: "ajax/graba.php",
						    data: $("#form_datos").serialize(),
						    success: function(msg) {
						    	console.log(msg);
						    	if(msg=='error'){
						        	alert("ha ocurrido un error");
									$('#btnEnviar').prop('disabled', false);
									$('#btnEnviar').removeClass('disabled');
						    	}else if(msg=='error1'){
						        	alert("No puede ingresar más de 10 veces un mismo código");
						        	location.reload();
						    	}else if(msg=='error2'){
						        	alert("Debes ser mayor de edad para participar");
						    	}else if(msg=='error3'){
						        	alert("Fecha de nacimiento invalida");
						    	}else if(msg=='Ganaste'){
									$('#modal_instawin').modal('show');
						    	}else{
									$('#modal_mensaje').modal('show');
						    	}
								$("#form_datos button").html('enviar');
						    },
						    error: function(xhr, status, error) {
								//alert(status);
							}
						});
			    	}else{
			        	alert("El código ingresado no es válido.");
						$('#codigo2').val("");
						$('#hora2').val("");
						$('.box_ganador').removeClass('hide');
						$('#ingreso_datos').addClass('hide');
						$('html, body').animate({  scrollTop: $("#franja_participa").offset().top }, 1000);
						$('#form_codigo').data('formValidation').resetForm();
						$('#form_datos').data('formValidation').resetForm();
						$('#form_codigo')[0].reset();
						$("#form_datos button").html('enviar');
			    	}
			    },
			    error: function(xhr, status, error) {
					//alert(status);
				}



			});
		}else{
			alert('Debes ser mayor de edad para poder participar');
		}

    })
    .find('[name="rut"]').mask('99999999-A');

});

$('#modal_instawin').on('hidden.bs.modal', function () {
	$('#modal_mensaje').modal('show');
})



    $('input[name=mayor]').change(function () {
	    if ($('input[name=mayor]:checked').val()==1){
			$('#btnEnviar').prop('disabled', false);
			$('#btnEnviar').css({'opacity':'1'});
		}else{
			$('#btnEnviar').prop('disabled', true);
			$('#btnEnviar').css({'opacity':'0.5'});
			alert('Debes ser mayor de edad para poder participar');
		}
	});

$('#modal_mensaje').on('hidden.bs.modal', function () {
	$('#codigo2').val("");
	$('#hora2').val("");

	$('.box_ganador').removeClass('hide');
	$('#ingreso_datos').addClass('hide');
	$('html, body').animate({  scrollTop: $("#franja_participa").offset().top }, 1000);
	$('#form_codigo').data('formValidation').resetForm();
	$('#form_datos').data('formValidation').resetForm();
	$('#form_codigo')[0].reset();
});


$('#preguntas-desk li').on('click', function(){
	$('.content_faq li').removeClass('active');
	$(this).addClass('active');
	faq = $(this).data('id');
	$('.answer_faq').addClass('hide');
	$('#'+faq).removeClass('hide');
});



$('#preguntas-mob li').on('click', function(){
	$('.content_faq li').removeClass('active');
	$(this).addClass('active');
	faq = $(this).data('id');
	$('.answer_faq').addClass('hide');
	$('#'+faq).removeClass('hide');

	$('html, body').animate({
	    scrollTop: $('#'+faq).offset().top
	}, 1000);

});

$('#btn-volver').on('click', function(){

	$('html, body').animate({
	    scrollTop: $('#preguntas-mob').offset().top
	}, 1000);

});



$('#main_contact')
    .formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        }
    })
    .on('err.field.fv', function(e, data) {
            data.element
                .data('fv.messages')
                .find('.help-block[data-fv-for="' + data.field + '"]').hide();
    })
    .on('success.form.fv', function(e) {
		e.preventDefault();

		$("#main_contact button").html('<i class="fa fa fa-spinner fa-spin"></i>');
		$.ajax({
		    type: "POST",
		    url: "ajax/enviar.php",
		    data: $("#main_contact").serialize(),
		    success: function(msg) {
		    	console.log(msg);
		    	if(msg=='ok'){
		        	alert("Enviado");
					$('#main_contact').data('formValidation').resetForm();
					$('#main_contact')[0].reset();
		    	}else{
		        	alert("ha ocurrido un error");
					$('#main_contact button').prop('disabled', false);
					$('#main_contact button').removeClass('disabled');
		    	}
				$("#main_contact button").html('enviar');
		    },
		    error: function(xhr, status, error) {
				//alert(status);
			}
		});

    });

$('#header1 .btnnuevomenu').on('click', function(){
	$('#header2').removeClass('hide');
});

$('#header2 .btnnuevomenu').on('click', function(){
	$('#header2').addClass('hide');
});


$('#flechabaja').on('click', function(){
	$('html, body').animate({  scrollTop: $("#franja_mobile").offset().top }, 1000);
});

$('#flechabaja2').on('click', function(){
	$('html, body').animate({  scrollTop: $("#franja_participa").offset().top }, 1000);
});


var porcentaje = $('#grafico-interior').data('porcentaje');
function barra(){
	$('#grafico-interior').css({'width': porcentaje+'%'});
}
setTimeout(barra, 1000);

// var container_width = 25 * $(".container-inner ul li").length;
//    $(".container-inner").css("width", container_width);

var ancho = 380;

$('section.box-fila .box-personas ul li').each(function(i, obj) {
   console.log($(this).width());
   ancho = ancho + $(this).width() + 20;
	console.log(ancho);
});
var ancho_caja = $('section.box-fila .box-personas .container-outer').width();
 $('section.box-fila .box-personas .container-inner').width(ancho+'px');
 //$('section.box-fila .box-personas .container-inner').css('transition','all ease-in-out 0.2s');
// $('section.box-fila .box-personas .container-outer').css('overflow','hidden');

$('input[type=range]').val('0');
$('input[type=range]').on('change input', function() {
	var value 		= $(this).val();
	console.log(value);
	var percent = value / 10;
	console.log(percent);
	mover = (ancho - ancho_caja)*percent;
	console.log(mover);
	$('.container-inner').css('margin-left', "-"+mover + "px");
})


$('.container-inner ul li a').on('mouseover',function(){
	pos = $(this).data('posicion');
	val = $('input[type=range]').val();
	console.log('pos: '+pos+' val: '+val);
	if(val==0 && pos>6){
		factor 	= (pos - 7) + 1;
	}else if(val==1 && pos>14){
		factor 	= (pos - 15) + 1;
	}else if(val==2 && pos>23){
		factor 	= (pos - 24) + 1;
	}else if(val==3 && pos>32){
		factor 	= (pos - 33) + 1;
	}else if(val==4 && pos>41){
		factor 	= (pos - 42) + 1;
	}else if(val==5 && pos>49){
		factor 	= (pos - 50) + 1;
	}else if(val==6 && pos>58){
		factor 	= (pos - 59) + 1;
	}else if(val==7 && pos>67){
		factor 	= (pos - 68) + 1;
	}else if(val==8 && pos>76){
		factor 	= (pos - 77) + 1;
	}else if(val==9 && pos>84){
		factor 	= (pos - 85) + 1;
	}else if(val==10 && pos>93){
		factor 	= (pos - 94) + 1;		
	}else{
		factor = 0;
	}
	left 	= 50 * factor;
	izq 	= '-'+left+'px';
	$(this).find('.lugar').css({'left':izq} );
});

$('.container-inner ul li a').on('mouseleave',function(){
	$('section.box-fila .box-personas ul li a .lugar').css({'left':'auto'} );	
});



$('#busca-nombre')
    .formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            rut: {
                validators: {
                    id: {
                        country: 'CL',
                        message: 'Rut Invalido'
                    }
                }
            }
        }
    })
    .on('err.field.fv', function(e, data) {
            data.element
                .data('fv.messages')
                .find('.help-block[data-fv-for="' + data.field + '"]').hide();
    })
    .on('success.form.fv', function(e) {
		e.preventDefault();
		    $("#busca-nombre button").html('<i class="fa fa fa-spinner fa-spin"></i>');
			elrut = $('#elrut').val();
			
			$.post('index.php?rut='+elrut, function(data){
				pines = $(data).find(".container-inner");
				$('.container-outer').html( $(pines).hide().fadeIn(1000));
				$("#busca-nombre button").html('<i class="fa fa-search" aria-hidden="true"></i>');
			
    })
    .find('[name="rut"]').mask('99999999-A');

});



$('#busca-nombre2')
    .formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            rut: {
                validators: {
                    id: {
                        country: 'CL',
                        message: 'Rut Invalido'
                    }
                }
            }
        }
    })
    .on('err.field.fv', function(e, data) {
            data.element
                .data('fv.messages')
                .find('.help-block[data-fv-for="' + data.field + '"]').hide();
    })
    .on('success.form.fv', function(e) {
		e.preventDefault();
		    $("#busca-nombre2 button").html('<i class="fa fa fa-spinner fa-spin"></i>');
			elrut = $('#elrut').val();
			
			$.post('index.php?rut='+elrut, function(data){
				pines = $(data).find(".container-inner");
				$('.container-outer').html( $(pines).hide().fadeIn(1000));
				$("#busca-nombre2 button").html('<i class="fa fa-search" aria-hidden="true"></i>');
			
    })
    .find('[name="rut"]').mask('99999999-A');

});

