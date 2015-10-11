$(document).ready(function(){
        $.ajax({
			crossDomain:true,
		url: 'http://appliweb.16mb.com/testbdd.php',
		type: 'GET',
			/*username: 'raimondi1u',
			password: 'mangak@s',*/
			/*headers: {
				Authorization: library.basicHeader('raimondi1u', 'mangak@s')
			},*/
		success: function(data) {
			//called when successful
			$("#result").html(data);
		},
		error: function(e) {
			$("#result").html("errrrrrrrrrrrreur " +e);
		}
		});
});