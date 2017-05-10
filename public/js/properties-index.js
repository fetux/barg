//var HOST = "http://barg.fetux.net";
//var HOST = "http://r7000544.ferozo.com/public";
//var HOST = "http://barg.local";

$.fn.cargarPropiedades = function(container,ipp,filters,page){

    $(container + ' *').remove();
    $('#notfound').addClass('hidden');

	chevrons = $('.chevrons');
	chevrons.find('*').remove();

    ipp = (ipp == undefined) ? '' : '/'+ipp;
    filters = (filters == undefined) ? '' : '/'+filters;
    page = (page == undefined) ? '' : '?page='+page;

    $.getJSON('/properties.json'+ipp+filters+page,function(response){

		if ($(response.data).length > 0)
		{
			$(response.data).each(function(property){

				property = response.data[property];

				console.log(property);

				$(container).append('<div class="col-property col-xs-12 col-md-4"> </div>');

				innerHTML = '<div class="ribbon"> </div>';
				innerHTML += '<div class="panel panel-default"> </div>';

				col = $(container + ' .col-property').last();

				col.append(innerHTML);

				if (property.estado.nombre != "Disponible") {
					ribbon = col.find('.ribbon');

					switch(property.estado.nombre){

						case "Reservado": ribbon.append('<img src="/img/ribbon-reservado.png">'); break;
						case "Alquilado": ribbon.append('<img src="/img/ribbon-alquilado.png">'); break;
						case "Vendido": ribbon.append('<img src="/img/ribbon-vendido.png">'); break;
					}
				}



				innerHTML = '<div class="panel-heading text-center"><h3 class="panel-title">'+ property.ref.toUpperCase() +'</h3></div>';
				innerHTML += '<a href="/propiedad/'+ property.id +'" class="mouse-velo-trigger"> </a>';
				innerHTML += '<div class="panel-body panel-body-velo"> </div>';
				innerHTML += '<div class="panel-body collage"> </div>';

				col.find('.panel').append(innerHTML);

				veloHTML = '<ul class="list-group"> </ul>';
				veloHTML += '<p class="text-justify">'+ property.descripcion.substr(0,180) +'...</p>';

				col.find('.panel .panel-body-velo').append(veloHTML);

				ul = col.find('.panel .panel-body-velo ul');

				if(property.mostrar_precio == 1){
					var moneda = (property.moneda == 1) ? 'US$' : '$';
					ul.append('<li class="list-group-item"><span class="badge">'+ moneda + ' ' + property.precio +'</span>Precio</li>');
				}
				else{
					ul.append('<li class="list-group-item"><span class="badge">Consulte</span>Precio</li>');
				}


				ul.append('<li class="list-group-item"><span class="badge">'+ property.superficie +' m2</span>Superficie</li>');
				ul.append('<li class="list-group-item"><span class="badge">'+ property.ambientes +'</span>Ambientes</li>');
				(property.cochera == 1) ? cochera = 'Si' : cochera = 'No';
				(property.amueblado == 1) ? amueblado = 'Si' : amueblado = 'No';
				ul.append('<li class="list-group-item"><span class="badge">'+ cochera +'</span>Cochera</li>');
				ul.append('<li class="list-group-item"><span class="badge">'+ amueblado +'</span>Amueblado</li>');

				collageHTML = '	<div class="row">';
				collageHTML += '	<div class="col-xs-12 text-center">';
				collageHTML += '		<img class="img-responsive col-xs-6" src="'+property.images[0].thumb_url+'">';
				collageHTML += '		<img class="img-responsive col-xs-6" src="'+property.images[1].thumb_url+'">';
				collageHTML += '	</div>';
				collageHTML += '</div>';
				collageHTML += '<div class="row">';
				collageHTML += '	<div class="col-xs-12 text-center">';
				collageHTML += '		<img class="img-responsive col-xs-12" src="'+property.images[2].thumb2_url+'">';
				collageHTML += '	</div>';
				collageHTML += '</div>';

				collage = col.find('.panel .collage');

				collage.append(collageHTML);

			});

			$('.mouse-velo-trigger').hover(function(){

				//$(this).next().css({'height':$('.panel-body.collage').css('height')});
				//$(this).next().css({'width':$('.panel-body.collage').css('width')});
				$(this).next().css({'height':$(this).siblings('.panel-body.collage').css('height')});
				$(this).next().css({'width':$(this).siblings('.panel-body.collage').css('width')});
				$(this).next().slideToggle();

				});

			var paginator;
			paginator = '<nav>';
			paginator += 	'<ul class="pagination">';



			if (response.prev_page_url != null){
				paginator +=		'<li>';
				paginator += 			'<a href="'+response.prev_page_url+'">';
				paginator += 				'<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Anterior</span>';
				paginator += 			'</a>';
				paginator += 		'</li>';

			}


			for(i=1;i<=response.last_page;i++){

				var is_active = (response.current_page == i) ? 'class="active"' : '';
				paginator += 		'<li '+ is_active +'>';
				paginator += 			'<a href="#" data-page="'+i+'">'+i+'</a>';
				paginator += 		'</li>';


			}

			if (response.next_page_url != null){
				paginator +=		'<li>';
				paginator += 			'<a href="'+response.next_page_url+'">';
				paginator += 				'<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Siguiente</span>';
				paginator += 			'</a>';
				paginator += 		'</li>';

			}

			paginator += 	'</ul>';
			paginator += '</nav>';

			//console.log(paginator);


			chevrons.append(paginator);

			//if (response.prev_page_url != null) chevrons.append('<a href="'+response.prev_page_url+'"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Anterior</span></a>');
			//if (response.next_page_url != null) chevrons.append('<a href="'+response.next_page_url+'"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Siguiente</span></a>');


			chevrons.find('a').click(function(e){
				e.preventDefault();
				ipp = (ipp == '') ? undefined : ipp.substr(1);
				filters = (filters == '') ? undefined : filters.substr(1);
				if ($(this).data('page') == undefined) {
					url_page = $(this).attr('href');
					page = url_page.substr(url_page.indexOf("/?page=") + 7,2);
				} else {
					page = $(this).data('page');
				}


				$.fn.cargarPropiedades(container,ipp,filters,page);
			});
		}
		else
		{
			$('#notfound').removeClass('hidden');

			$("#button-filters").fadeOut();

		}
	});

};

$(document).ready(function () {


	$('.casa').offset({ top: $('footer').offset().top - $('.casa').height() + $('#push').height()});
	$('.casa').css({'right':'30px','z-index':'-3'});

	//$.fn.cargarPropiedades('#oportunidades',3);
	$.fn.cargarPropiedades('#properties',3);


	$('.tab-pane a').click(function(e){

		filters = $('#filters');

		if ($(this).parent().attr('id') == 'operacion')
			filters.data('value',$(this).data('value'));
		else
			filters.data('value',filters.data('value') + '-' + $(this).data('value'));

		$.fn.cargarPropiedades('#properties',3,filters.data('value'));

		if ($(this).parent().attr('id') == 'ambientes') filters.data('value','');

		console.log(filters.data('value'));

	});

	$('#reset').click(function(e){
		e.preventDefault();
		//$('a[href="#operacion"]').tab('show');
		//$('#button-filters').fadeIn();
		window.location = "/";
	});


	var codes = {
	  "tornado" : "tornado",
	  "tropical storm" : "tormenta tropical",
	  "hurricane" : "huracan",
	  "severe thunderstorms": "tormentas severas",
	  "cloudy" : "nublado",
	  "mostly cloudy" : "mayormente nublado",
	  "partly cloudy" : "parcialmente nublado",
	  "clear" : "despejado",
	  "fair" : "estable",
	  "rain shower": "llovizna"
	};

	$.simpleWeather({
	    location: 'Mar del Plata, AR',
	    woeid: '466863',
	    unit: 'c',
	    success: function(weather) {
	      html = '<h2><i class="icon-'+weather.code+'"></i> <span>'+weather.temp+'&deg;'+weather.units.temp+'</span></h2>';
	      html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
	      html += '<li class="currently">'+codes[weather.currently.toLowerCase()]+'</li>';
	      //html += '<li class="currently">'+weather.currently+'</li>';
	      //html += '<li>'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>';
	      html += '</ul>';

	  	/*
	  	  for(var i=0;i<weather.forecast.length;i++) {
	        html += '<p>'+weather.forecast[i].day+': '+weather.forecast[i].high+'</p>';
	      }
	  	*/
	      $("#weather").html(html);
	    },
	    error: function(error) {
	      $("#weather").html('<p>'+error+'</p>');
	    }
	  });



	// Load exchange rates data via AJAX:
    $.getJSON(
    	// NB: using Open Exchange Rates here, but you can use any source!
        'https://openexchangerates.org/api/latest.json?app_id=bc6000424cdf470c930e80c7e9ce602c',
        function(data) {
            // Check money.js has finished loading:
            if ( typeof fx !== "undefined" && fx.rates ) {
                fx.rates = data.rates;
                fx.base = data.base;

                $('#currency').html('<h2 style="font-size:20px"> Cotización Dolar </br>US$ 1.00  = $ '+ Math.floor(fx.rates.ARS * 100) / 100+'</h2>');


            } else {
                // If not, apply to fxSetup global:
                var fxSetup = {
                    rates : data.rates,
                    base : data.base
                };
            }
        }
    );



});
