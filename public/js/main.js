var stringplace = "";
$('#tool').keyup(function() {
			var val = $(this).val();
			var array = val.split(" ");
			
		  var url = 'http://localhost:8000/tools/'+array[array.length - 1];

  			$.get(url, function (data) {
    			var json = $.parseJSON(data);
    			if (json != "") {
    				var thehtml = '';
    				for (var i = 0; i < json.length; i++) {
    					var thehtml = "<option class='tech'>"+json[i]['name']+" "+json[i]['version']+"</option>";
    				};
    				
    				$('#result').html(thehtml);
    				$('.tech').click(function () {
    					stringplace += $(this).html()+' ';
						$('#tool').val(stringplace)
					})
    			}else{
    				$('#result').html('');
    			}
    			
  			});
  
})

