<!-- this is step 1 -->
<div class="step1">
	<p class="lead">Woah this is really important and you need to click this button</p>
	<input type="button" id="step1_button" value="Next!"/>
</div>

<!-- this is step 2 -->
<div class="step2" style="display:none">
	<p class>Now register please, thanks.</p>
	<div id="htmlcontent"></div>
</div>

<!-- this is step 3 -->
<div class="step3" style="display:none">
	<p class="lead">Nice work! Now click this button</p>
	<input type="button" id="step3_button" value="Next!"/>
</div>

<!-- this is step 4 -->
<div class="step4" style="display:none">
	<p class="lead">WooHoo! All done!</p>
</div>
<!--<script src=”http://code.jquery.com/jquery-1.9.1.min.js”></script>-->


<script>
	$(function() {
	  
	
	
	  
	  //make the popup a global variable
	  var popup
	  
	  //Step 1 complete move to step 2
	  $("#step1_button").click(function(){
		  $(".step1").slideUp()
		  popup = window.open("https://accounts.shopify.com/store-create", "myWindow", 'width=800,height=600');
		  $(".step2").slideDown()
		  
		  $.getJSON('https://api.allorigins.win/get?url=' + encodeURIComponent('https://accounts.shopify.com/store-create'), function (data) {
			  alert(data.contents)
					  $('#htmlcontent').html(data.contents);
                  });
		
	  })
	  
	  //here is the magic we need to watch the iframe to see what is happening on it.
		var seconds = 1;
		setInterval(function() 
		{
			if(seconds % 2){
				console.log("tick")
			} else {
				console.log("tock")
			}
			
			if (!localStorage.getItem('windowName')) { 
				// first visit
				self.window.name = (new Date()).getTime(); 
				localStorage.setItem('windowName', self.window.name);   
			} 

			if (localStorage.getItem('windowName') && localStorage.getItem('windowName') !== self.window.name) { 
				// i know you, but it's a different window
				console.log('new window');
				// do stuff, unbind, delete, ... whatever you need to do
				self.window.name = (new Date()).getTime(); 
			}
			
			seconds++ 
			
			console.log(popup.href)
			
			
		}, 1000);
	  
	  //Step 3 complete move to step 4
	  $("#step3_button").click(function(){
		  $(".step3").slideUp()
		  $(".step4").slideDown()
	  })
	  
	});
</script>


