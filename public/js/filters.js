function isEmpty(obj) {
    if (typeof obj == 'undefined' || obj === null || obj === '') return true;
    if (typeof obj == 'number' && isNaN(obj)) return true;
    if (obj instanceof Date && isNaN(Number(obj))) return true;
    return false;
}

$(document).ready( function() {
	$('#filters ').on('change', function() {
		
		var type_id = isEmpty(document.getElementById('type_id').value) ? 0 : document.getElementById('type_id').value
		var location_id = isEmpty(document.getElementById('location_id').value) ? 0 : document.getElementById('location_id').value
		var contract_id = isEmpty(document.getElementById('contract_id').value) ? 0 : document.getElementById('contract_id').value

		var min_price = isEmpty(document.getElementById('min_price').value) ? 0 : document.getElementById('min_price').value
		var max_price = isEmpty(document.getElementById('max_price').value) ? 0 : document.getElementById('max_price').value		
		
		var url = ROOT + 'filters/' + type_id + '/' + location_id + '/' + contract_id + '/' + min_price + '/' + max_price
		
		document.location.href = url
	})
})