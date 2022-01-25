"use strict";
var KTDatatablesAdvancedColumnVisibility = function() {

	var init = function() {
		var table = $('#kt_datatable');

		// begin first table
		table.DataTable({
			responsive: true,
			columnDefs: [
				{
					// hide columns by index number
					targets: [0],
					visible: false,
				},
			],
		});
	};

	return {
		//main function to initiate the module
		init: function() {
			init();
		}
	};

}();

jQuery(document).ready(function() {
	KTDatatablesAdvancedColumnVisibility.init();
});
