
<script>
	$(document).ready(function() {
		
		//var data = $.load( "" );
		
		var myUrl = 'https://www.rockauto.com/catalog/catalogapi.php';

		var proxy = 'https://cors-anywhere.herokuapp.com/';

		var finalURL = proxy + myUrl;

		$.get(finalURL, function( data ) {
			console.log(data);
		});
    });

</script>
