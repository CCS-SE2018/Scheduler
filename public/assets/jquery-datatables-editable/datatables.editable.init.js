(function( $ ) {
	$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
		});

	var pageURL = $(location).attr("href");
	var arr = pageURL.split('/');
	var page = arr[arr.length-1];
	var urlString = window.location;
	$('a[href="' + page + '"]').addClass("active");

	// console.log(page);
	'use strict';

	var EditableTable = {

		options: {
			addButton: '#addToTable',
			table: '#datatable-editable',
			dialog: {
				wrapper: '#dialog',
				cancelButton: '#dialogCancel',
				confirmButton: '#dialogConfirm',
			}
		},

		initialize: function() {
			this
				.setVars()
				.build()
				.events();
		},

		setVars: function() {
			this.$table				= $( this.options.table );
			this.$addButton			= $( this.options.addButton );

			// dialog
			this.dialog				= {};
			this.dialog.$wrapper	= $( this.options.dialog.wrapper );
			this.dialog.$cancel		= $( this.options.dialog.cancelButton );
			this.dialog.$confirm	= $( this.options.dialog.confirmButton );

			return this;
		},

		build: function() {
			this.datatable = this.$table.DataTable({
				//aoColumns: tablecol  //reference fix: https://stackoverflow.com/questions/37602081/adding-table-data-to-editable-datatables-removes-filters
				columnDefs: [
					{ targets: -1, orderable: false }
				]
			});

			window.dt = this.datatable;

			return this;
		},

		events: function() {
			var _self = this;

			this.$table
				.on('change', 'select[name="collegename"]', function( e ) {
					e.preventDefault();

					var str = $('select[name="collegename"]').val();
					var optionVal = str.split('-');
					var x = $(this).closest( 'tr' ).find('input')[0];
					$(x).val(optionVal[1]);
				})
				.on('click', 'a.save-row', function( e ) {
					e.preventDefault();

					if(page=='degrees'){
						if($('select[name="collegename"]').val() == ''){
							alert('Please select college.');
							_self.rowEdit($(this).closest( 'tr' ));
						}
						else{
							var id = $(this).attr('data-rel');
							_self.rowSave( $(this).closest( 'tr' ),id);
						}
					}
					else{
						var id = $(this).attr('data-rel');
						_self.rowSave( $(this).closest( 'tr' ), id);
					}
				})
				.on('click', 'a.cancel-row', function( e ) {
					e.preventDefault();

					_self.rowCancel( $(this).closest( 'tr' ) );
				})
				.on('click', 'a.edit-row', function( e ) {
					e.preventDefault();

					_self.rowEdit( $(this).closest( 'tr' ) );
				})
				.on( 'click', 'a.remove-row', function( e ) {
					e.preventDefault();

					var $row = $(this).closest( 'tr' );

					//get user id
					var id = $(this).attr('data-rel');

					$.magnificPopup.open({
						items: {
							src: _self.options.dialog.wrapper,
							type: 'inline'
						},
						preloader: false,
						modal: true,
						callbacks: {
							change: function() {
								_self.dialog.$confirm.on( 'click', function( e ) {
									e.preventDefault();

									_self.rowRemove( $row, id );
									$.magnificPopup.close();
								});
							},
							close: function() {
								_self.dialog.$confirm.off( 'click' );
							}
						}
					});
				});

			this.$addButton.on( 'click', function(e) {
				e.preventDefault();

				_self.rowAdd();
			});

			this.dialog.$cancel.on( 'click', function( e ) {
				e.preventDefault();
				$.magnificPopup.close();
			});

			return this;
		},

		// ==========================================================================================
		// ROW FUNCTIONS
		// ==========================================================================================
		rowAdd: function() {
			this.$addButton.attr({ 'disabled': 'disabled' });

			var actions,
				data,
				$row,
				colstoAdd;

			actions = [
				'<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>',
				'<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>',
				'<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>',
				'<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>'
			].join(' ');


			var numCols = this.datatable.columns().nodes().length;
			var rowData = [];
			for(var i = 0; i < numCols - 1; i++){ rowData.push(''); }
			rowData.push(actions);
			data = this.datatable.row.add(rowData);


			$row = this.datatable.row( data[0] ).nodes().to$();
			$row
				.addClass( 'adding' )
				.find( 'td:last' )
				.addClass( 'actions' );

			this.rowEdit( $row );

			this.datatable.order([0,'asc']).draw(); // always show fields
		},

		rowCancel: function( $row ) {
			var _self = this,
				$actions,
				i,
				data;

			if ( $row.hasClass('adding') ) {
				this.rowRemove( $row );
			} else {

				data = this.datatable.row( $row.get(0) ).data();
				this.datatable.row( $row.get(0) ).data( data );

				$actions = $row.find('td.actions');
				if ( $actions.get(0) ) {
					this.rowSetActionsDefault( $row );
				}

				this.datatable.draw();
			}
		},

		rowEdit: function( $row ) {
			var _self = this,
				data;
			var options = '';
			var optionsCollege = '';
			var optionsQuestion = '';
			var tables = new Array();

			tables[0] = ["userType","name","username","password","email"];
			tables[1] = ["collegeCode","collegeName","collegeAboutInfo","collegeDean","collegeEmail","collegePhoneNumber"];
			tables[2] = ["degreeCode","degreeDesc","degreeJobs"];
			tables[3] = ["questionText"];
			tables[4] = ["college_id","question_id","answer"];



			data = this.datatable.row( $row.get(0) ).data();
			$row.children( 'td' ).each(function( i ) {
				var $this = $( this );

				if ( $this.hasClass('actions') ) {
					_self.rowSetActionsEditing( $row );
				} else {
					$this.html('<form enctype="multipart/form-data">');
					$this.html('<input type="hidden" name="_token" value="{{ csrf_token() }}">');
					if(page=='rooms'){
						$this.html( '<input type="text" id="rooms" placeholder="Enter room." class="form-control input-block value="'+data[0]+'">'+data[0]);
					}
					else if(page=='teachers'){
						if(i==0){
								if(i==0){
									if(data[0] == '')
										$this.html('<img class="avatar" src="../img/uploads/default.jpg">');
									else
										$this.html(data[i]);
								}
						}
						else
							$this.html( '<input type="text" id="rooms" placeholder="Enter name." class="form-control input-block value="'+data[i]+'">'+data[i]);
					}
					else if(page=='questions'){
						var text = data[i].replace(/[^a-zA-Z ]/g, "")
							$this.html( '<input id="'+tables[3][0]+'"type="text" class="form-control input-block" value="' + text + '"/>' );
					}
					else if(page=='degrees' || page=='answers'){
						if(i==0){
							var text = data[0]+"-"+data[1];
							var sel = '';
							$.ajax({
								url: '/getObject',
								type: 'get',
								dataType: 'json',
								data: {'page':page},
								success:function(data){
									var i;
									var j = Object.values(data);
									if(page=='degrees'){
										for(i = 0;i < Object.keys(data).length;i++){
											if(text == j[i]['collegeName']+'-'+j[i]['collegeCode'])
												sel = 'selected';
											else
												sel = '';
											options += '<option value="'+j[i]['id']+'-'+j[i]['collegeCode']+'" '+sel+'>'+j[i]['collegeName']+'-'+j[i]['collegeCode']+'</option>';
										}
									}
									else{
										for(i = 0;i < Object.keys(data[1]).length;i++)
											optionsQuestion += '<option value="'+j[1][i]['id']+'-'+j[1][i]['questionText']+'">'+j[1][i]['questionText']+'</option>';
										for(i = 0;i < Object.keys(data[0]).length;i++)
											optionsCollege += '<option value="'+j[0][i]['id']+'-'+j[0][i]['collegeCode']+'">'+j[0][i]['collegeName']+'-'+j[0][i]['collegeCode']+'</option>';
										}
								},
								async:false
							});
							if(page=='degrees')
								$this.html('<select name="collegename" class="form-control input-block"><option value="">Select College</option>'+options+'</select>');
							else
								$this.html('<select name="collegename" class="form-control input-block"><option value="">Select College</option>'+optionsCollege+'</select>');
						}
						else if(i==1){
							if(page=='degrees')
								$this.html( '<input type="text" readonly class="form-control input-block" value="' + data[i] + '"/>' );
							else
								$this.html('<select name="questionname" class="form-control input-block"><option value="">Select Question</option>'+optionsQuestion+'</select>');
						}
						else if(i==2){
							if(page=='answers')
								$this.html('<select name="questionname" class="form-control input-block"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>');
							else
								$this.html( '<input type="text" class="form-control input-block" value="' + data[i] + '"/>' );
						}

						else if(i==4){
							var text = data[4].replace(/(<([^>]+)>)/ig,"");
							$this.html( '<textarea class="form-control input-block value="'+ text +'">'+ text +'</textarea>' );
						}
						else
							$this.html( '<input type="text" class="form-control input-block" value="' + data[i] + '"/>' );
					}

				}
			});
		},

		rowSave: function( $row, objID ) {
			var _self     = this,
				$actions,
				values    = [];

			var hasAdding = $row.hasClass( 'adding' );

			//Add user
			if(hasAdding){
					$row.addClass( 'adding' );
					_self.rowSetActionsEditing( $row );
				values = $row.find('td').map(function() {
					var $this = $(this);

					if ( $this.hasClass('actions') ) {
						_self.rowSetActionsDefault( $row );
						return _self.datatable.cell( this ).data();
					}else{
						return $.trim( $this.find('.input-block').val() );
					}
				});
				var invalid = false;
				var alertmsg = '';
				$.ajax({
					url:'/admin/add',
					postType:'json',
					type:'post',
					data:{'userID':objID,'page':page,'values':values.toArray(),'avatar':'default.jpg'},
					success:function(data){
						// console.log('Been here!');
						// return false;
					},
					async:false
				});

				if(invalid){

					alert(alertmsg);

					if ( $row.hasClass( 'adding' ) ) {
						$row.addClass( 'adding' );
						_self.rowSetActionsEditing( $row );

						if(page=='degrees')
							$row.find('input')[1].select();
						else if(page=='users.php')
							$row.find('input')[2].select();
					}
				}else{
					this.datatable.row( $row.get(0) ).data( values );

					$actions = $row.find('td.actions');

					if ( $actions.get(0) ) {
						this.rowSetActionsDefault( $row );
					}
					this.datatable.draw();

					location.reload();

				}
			}
			else{
				//Update user
				values = $row.find('td').map(function() {
					var $this = $(this);

					if ( $this.hasClass('actions') ) {
						_self.rowSetActionsDefault( $row );
						return _self.datatable.cell( this ).data();
					}else{
						return $.trim( $this.find('.input-block').val() );
					}
				});
				var invalid = false;
				var alertmsg = '';
				$.ajax({
					url:'/admin/edit',
					postType:'json',
					type:'post',
					data:{'ID':objID,'page':page,'values':values.toArray()},
					success:function(data){
						// console.log(data);
						// var j = $.parseJSON(data);
						//
						// if(j.notice == "Success!"){
						// 	invalid = false;
						// }else{
						// 	invalid=true;
						// 	alertmsg = j.notice+' '+ j.msg;
						// }
					},
					async:false
				});
				// console.log(invalid);
				// if(invalid){
				//
				// 	// alert(alertmsg);
				//
				// 	if ( $row.hasClass( 'adding' ) ) {
				// 		$row.addClass( 'adding' );
				// 		_self.rowSetActionsEditing( $row );
				//
				// 		//highlight username value
				// 		$row.find('input')[2].select();
				// 	}
				// }else{

					this.datatable.row( $row.get(0) ).data( values );

					$actions = $row.find('td.actions');

					if ( $actions.get(0) ) {
						this.rowSetActionsDefault( $row );
					}
					this.datatable.draw();

					location.reload();

				// }
			}
		},

		rowRemove: function( $row, id ) {
			if ( $row.hasClass('adding') ) {
				this.$addButton.removeAttr( 'disabled' );
			}

			//ajax call
			$.ajax({
				url:'/admin/delete',
				postType:'json',
				type:'post',
				data:{'id':id,'page':page},
				success:function(data){

					location.reload();
				},
				async:false
			});

			this.datatable.row( $row.get(0) ).remove().draw();
		},

		rowSetActionsEditing: function( $row ) {
			$row.find( '.on-editing' ).removeClass( 'hidden' );
			$row.find( '.on-default' ).addClass( 'hidden' );
		},

		rowSetActionsDefault: function( $row ) {
			$row.find( '.on-editing' ).addClass( 'hidden' );
			$row.find( '.on-default' ).removeClass( 'hidden' );
		}

	};


	$(function() {
		EditableTable.initialize();
	});


}).apply( this, [ jQuery ]);
