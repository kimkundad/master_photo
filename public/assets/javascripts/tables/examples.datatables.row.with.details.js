/*
Name: 			Tables / Advanced - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	1.4.1
*/

(function( $ ) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#datatable-details');

		// format function for row details
		var fnFormatDetails = function( datatable, tr ) {
			var data = datatable.fnGetData( tr );
			var data1;
			if(data[9] == 0){
				data1 = "No";
			}
			if(data[9] == 1){
				data1 = "Yes";
			}

			return [
				'<table class="table mb-none">',
					'<tr class="b-top-none">',
						'<td><label class="mb-none">Password Phillip:</label></td>',
						'<td>' + data[8] + '</td>',
					'</tr>',
					'<tr>',
						'<td><label class="mb-none">Saving Plan:</label></td>',
						'<td>' + data1+ '</td>',
					'</tr>',
					'<tr>',
						'<td><label class="mb-none">รายละเอียด Savig Plan:</label></td>',
						'<td>' + data[10] + '</td>',
					'</tr>',
					'<tr>',
						'<td><label class="mb-none">ใบเปิดบัญชีที่เซ็นแล้ว:</label></td>',
						'<td>' + data[11] + '</td>',
					'</tr>',
				'</div>'
			].join('');
		};

		// insert the expand/collapse column
		var th = document.createElement( 'th' );
		var td = document.createElement( 'td' );
		td.innerHTML = '<i data-toggle class="fa fa-plus-square-o text-primary h5 m-none" style="cursor: pointer;"></i>';
		td.className = "text-center";

		$table
			.find( 'thead tr' ).each(function() {
				this.insertBefore( th, this.childNodes[0] );
			});

		$table
			.find( 'tbody tr' ).each(function() {
				this.insertBefore(  td.cloneNode( true ), this.childNodes[0] );
			});

		// initialize
		var datatable = $table.dataTable({
			aoColumnDefs: [{
				bSortable: false,
				aTargets: [ 0 ]
			}],
			aaSorting: [
				[1, 'asc']
			]
		});

		// add a listener
		$table.on('click', 'i[data-toggle]', function() {
			var $this = $(this),
				tr = $(this).closest( 'tr' ).get(0);

			if ( datatable.fnIsOpen(tr) ) {
				$this.removeClass( 'fa-minus-square-o' ).addClass( 'fa-plus-square-o' );
				datatable.fnClose( tr );
			} else {
				$this.removeClass( 'fa-plus-square-o' ).addClass( 'fa-minus-square-o' );
				datatable.fnOpen( tr, fnFormatDetails( datatable, tr), 'details' );
			}
		});
	};

	$(function() {
		datatableInit();
	});

}).apply( this, [ jQuery ]);