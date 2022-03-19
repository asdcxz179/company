$('form[name=update_password]').submit(function(){
	if($(this).parsley().isValid()){
		var update_password_ajax	=	'/Admin/Password/';
		var id 	 =	$(this).find('input[name=id]').val();
		var form =	$(this);
		var data =  form.serialize();
		$.ajax({
			url:update_password_ajax+id,
			type:'PUT',
			dataType:'JSON',
			data:data,
			beforeSend:function(){
				$('.modal').modal('hide');
				$('.page-load').show();
			},
			complete:function(){
				form[0].reset();
				$('.page-load').hide();
			},
			success:function(result){
				ResultHandle(result);
			},
			error:function(){

			}
		});
	}
	return false;
});

var	datatable_option 	= 	{
								searching 	: false,
								ordering 	: false,
								pagingType	: "full_numbers",
								oLanguage 	: {
												"sProcessing":js_lang.processing,
												"sLengthMenu":js_lang.display+" _MENU_ "+js_lang.item+js_lang.result,
											 	"sZeroRecords":js_lang.no_data,
											 	"sInfo":js_lang.display+js_lang.no+" _START_ "+js_lang.to+" _END_ "+js_lang.item+js_lang.result+"，"+js_lang.total+" _TOTAL_ "+js_lang.item,
											 	"sInfoEmpty":js_lang.display+js_lang.no+" 0 "+js_lang.to+" 0 "+js_lang.item+js_lang.result+"，"+js_lang.total+" 0 "+js_lang.item,
											 	"sInfoFiltered":"("+js_lang.from+" _MAX_ "+js_lang.item+js_lang.result+js_lang.filter+")",
											 	"oPaginate":{
											 		"sFirst":js_lang.first_page,
													"sPrevious":js_lang.previous_page,
													"sNext":js_lang.next_page,
													"sLast":js_lang.last_page
												}
											}
							};
