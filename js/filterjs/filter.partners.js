(function ( $ ) {
	jQuery(document).ready(function($) {

		initSliders();

		var FJS = FilterJS(partners, '#partners', {
			template: '#partner-template',
			search: {ele: '#searchbox'},
			callbacks: {
				afterFilter: function(result){
					$('#total_partners').text(result.length);
				}
			}
		});

		FJS.addCriteria({field: 'platform',   ele: '#platform_list input:checkbox'});
		FJS.addCriteria({field: 'specialism', ele: '#specialism_criteria input:checkbox'});
		FJS.addCriteria({field: 'activity',   ele: '#activity_criteria input:checkbox'});
		FJS.addCriteria({field: 'provincie',  ele: '#provincie_list input:checkbox'});

		window.FJS = FJS;

	});

	function initSliders(){

		$('#platform_list :checkbox').prop('checked', true);
		$('#all_platform').on('click', function(){
			$('#platform_list :checkbox').prop('checked', $(this).is(':checked'));
		});

		$('#specialism_criteria :checkbox').prop('checked', true);
		$('#all_specialism').on('click', function(){
			$('#specialism_criteria :checkbox').prop('checked', $(this).is(':checked'));
		});

		$('#activity_criteria :checkbox').prop('checked', true);
		$('#all_activity').on('click', function(){
			$('#activity_criteria :checkbox').prop('checked', $(this).is(':checked'));
		});

		$('#provincie_list :checkbox').prop('checked', true);
		$('#provincie_all').on('click', function(){
			$('#provincie_list :checkbox').prop('checked', $(this).is(':checked'));
		});
	}
}( jQuery ));