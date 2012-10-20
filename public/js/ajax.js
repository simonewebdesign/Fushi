/* Questa pagina gestisce le richieste AJAX,
le modifiche visive ed alcune funzionalità aggiuntive,
tutte relative alle richieste AJAX. */

/* mouse events (in chronological order):
	mousedown
	mouseup
	click
*/

$(document).ready( function() {

	$('a.action').on('click', function() {
	
		// cleaning up old requests' styles... TODO
		$('#response').removeClass();	
	
		// ajax link has been clicked.
		// first of all, the "delete".
		if ( $(this).hasClass('delete') ) {
		// clicked on a.action delete
			if ( !confirm('Sei sicuro di voler CANCELLARE?') ) {
				return false
			} else {
				$(this).parent().parent().remove() // delete row only visually
				//$('#response').addClass('delete'); // TODO this doesnt work because of cleaning
			}
		}
		
		
		$.ajax ({
			// executing ajax request...
			type:	'POST',
			url:	 ROOT + 'ajax.php',
			context: $(this), // document.body,
			data:	'url=' + $(this).attr('href'),
			success: function( data ) {

				$('#response')
				.html( data + '<div id="response-close">x</div>' )
				.show('slow')
				// TODO possible enchancement: change bg of selected row

				// modifiche funzionali e grafiche true/false
				if ( $(this).hasClass('true') || $(this).hasClass('false') ) {

					/* begin modifiche funzionali true/false */
					// clicked on "a.action true/false", with success.
					// recupero l'ultimo carattere dell'attributo href.
					var href = $(this).attr('href')
					var lastchar = href.substr( href.length-1 ) // last char

					// se 0 diventa 1, se 1 diventa 0
					if ( lastchar > 0 ) { // lastchar=1 or higher
						lastchar = 0
					} else {
						lastchar = 1
					}
					$(this).attr('href', href.substr(0, href.length-1) + lastchar)
					/* end modifiche funzionali true/false */

					/* begin modifiche grafiche true/false */
					if ( $(this).hasClass('true') ) {
						// clicked on a.action true
						$(this).removeClass('true')
							   .addClass('false')
							   .text('No')
						$('#response').addClass('negative')
					} else
					if ( $(this).hasClass('false') ) {
						// clicked on a.action false
						$(this).removeClass('false')
							   .addClass('true')
							   .text('Sì')
						$('#response').addClass('positive')
					}
					/* end modifiche grafiche true/false */

					/* setTimeout(fadeOut()): non si potrebbe usare perché se l'utente clicca create o altro, #response scompare ugualmente.
                    ma io ho preferito usarlo lo stesso mettendo solo 3 secondi di tempo.
					setTimeout( function() {
						$('#response').fadeOut()
					}, 3000); // <-- time in milliseconds
					// end modifiche grafiche true/false
					*/
				}

			} // end success
		}) // end ajax

		/* ... ADD MORE HERE (on a.action click) ... */


		return false
	}) // end a.action click event
})


/* Using Event Bubbling

Adding scope to a behavior-binding function is often a very elegant solution to the problem of binding event handlers after an AJAX load. We can often avoid the issue entirely, however, by exploiting event bubbling. We can bind the handler not to the elements that are loaded, but to a common ancestor element (in this case, #ajax-response).

Reference: http://docs.jquery.com/Tutorials:AJAX_and_Events

This part binds the events in order to be fired after an AJAX request.
*/
$('#response').on('click', function(event) {

   if ( $(event.target).is('a.action.add.attribute') ) {

			/* begin cloning object */
			var newParam = $('p.parameters.last')
				.removeClass('last')
				.clone()
				.appendTo('#parameters-container')
				.addClass('last')

			nextNumber = parseInt(newParam.attr('title'))+1

			newParam.attr('title', nextNumber)

			newParamName =  'parameter_name_' + nextNumber // $('p.parameters.last select.name').attr('name').substr(0,14) + '
			newParamValue = 'parameter_value_' + nextNumber
			$('p.parameters.last select.name').attr('name', newParamName)
			$('p.parameters.last select.value').attr('name', newParamValue)
			/* end cloning object */

			// hiding the a.action.add.attribute if parameters >= 20
			if ( nextNumber >= 20 ) {
				$(event.target).hide()
			}

		return false
   }

   if ( $(event.target).is('a.action.add.image') ) {

		//alert('add image clicked')
		return false
   }

   if ( $(event.target).is('textarea') ) {
		// just loading TinyMCE after AJAX...
		tinyMCE.execCommand('mceAddControl', false, 'description');  // description is the textarea's id attr.
		return false
   }

   if ( $(event.target).is('#response-close') ) {
		$(this).fadeOut()
   }

})

$('#response').on('change', function(event) {

	if ( $(event.target).is('select.name') ) {

		var parameterNameId = $(event.target).val()

		$.ajax ({
			// executing ajax request...
			type:	'POST',
			url:	 ROOT + 'ajax.php',
			context: $(event.target),
			data:	'template_name=backoffice&object=parameter_values&action=get&parameter_name_id=' + parameterNameId,
			success: function( data ) {

				$(this).next().html(data)
			}
		})
	}

})


$('#response').on('dblclick', function(event) {

	if ( $(event.target).is('div.backoffice-image img') ) {


		var imageName = $(event.target).attr('title');

		if ( !confirm('ATTENZIONE: sei sicuro di voler ELIMINARE l\'immagine?\nQuesta operazione è IRREVERSIBILE!') ) {
			return false
		} else {

			$.ajax ({
				// executing ajax request...
				type:	'POST',
				url:	 ROOT + 'ajax.php',
				context: $(event.target),
				data:	'template_name=backoffice&object=images&action=delete&image_name=' + imageName,
				success: function( data ) {

					$('<p style="color:red">' + data + '</p>').appendTo( $(event.target).parent() ) // show response
					$(event.target).remove() // delete row only visually
				}
			})
		}
	}

})