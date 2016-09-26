$(function() {
	$('#btnRemove').on('click', function() {
		//console.log('1111');
		$('#confirmDialog_registration').modal();
		return false;
	});
	$('#confirmDialog_registration').on('hidden.bs.modal', function() {
		//console.log($('#confirmDialog_registration').data('modal-result'));
		if ($('#confirmDialog_registration').data('modal-result') == 'true') {
			//console.log('Ok Toggle');
			$('input[name=removeFromTourney]').val('true');
			$('#tourney-registration').submit();
		}
	});

	$('#add-time').on('click', function() {
		var clone = $('.wdSceleton').clone(true);
		$(clone).removeClass('hidden');
		$(clone).removeClass('wdSceleton');
		var id = new Date();
		var id = id.getTime();
		$(clone).find('input, select').each(function() {
			var name = $(this).attr('name');
			name = name.replace('[__id__]', '[__'+id+']');
			$(this).attr('name', name);
		});
		$(clone).insertBefore($(this));
	});

	$('.remove-time').on('click', function() {
		$(this).parent().remove();
	});
});