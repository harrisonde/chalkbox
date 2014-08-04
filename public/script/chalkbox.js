/*
*	Chalkbox
*	@package Chalkbox
*	Description: Chalkbox makes tracking time really simple. Manage your projects like a web artisan - not an accountant.
*	Version: 1.00
*	Author: Harrison DeStefano
*	Author URI: http://www.harrisondestefano.com
*/

CHALKBOX = {
	// let's get this party started!
	init:function(){	
		CHALKBOX.navigation.tabs();
		CHALKBOX.navigation.interaction();
		
	},
	/* 
	*	Series of methods to communicate with a server in the background, without interfering 	
	*	with the current page state. Ajax ( Asynchronous JavaScript and XML ) is leveraged to 
	*   asynchronously send and retrieve data from the server. This method will a. make client
	*	-side request for a data without any arguments or b. make client-side request for data
	*	with arguments. The server logic.php will evaluate and return appropriate data.
	*/
	communicate: {
		get: function(resource){
			CHALKBOX.communicate.send('get', resource);
		},
		send: function(method, resource){
			var ajaxObject, fileLocation;
			fileLocation = window.location.origin+'/note/'+resource+'/edit';	
			console.log(fileLocation);
			switch(method){
				case 'get':
					ajaxObject = {
						type: 'get',
						url: fileLocation, 				
						success: function(response) {
							var appendLocation = $('.tab-content.is-open');
							if(appendLocation.children('.note-detail').length > 0)
							{
								$('.note-detail').text(response[0].content);
							}
							else
							{
								appendLocation.append('<p class="note-detail">'+response[0].content+'</p>')
							}
						},
						error:function (xhr, ajaxOptions, thrownError){   
					       return thrownError;
					    } 
					}
				break;
				case 'post':
					ajaxObject = {
						type: 'post',
						url: fileLocation, 				
						data: formdata,
						success: function(response) {
							$('input#password').val(response);
						},
						error:function (xhr, ajaxOptions, thrownError){   
					       return thrownError;
					    } 
					}
				break;
			}
			jQuery.ajax(ajaxObject);	
		}
	},
	
	// all things to do with moving around the ui
	navigation: {
		// navigation based click events captured from the ui
		interaction: function(){
			$('.accordion-tabs-minimal').on('click', 'li > a', function(event) {
				if (!$(this).hasClass('is-active')) {
					event.preventDefault();
					var accordionTabs = $(this).closest('.accordion-tabs-minimal')
					accordionTabs.find('.is-open').removeClass('is-open').hide();
					$(this).next().toggleClass('is-open').toggle();
					accordionTabs.find('.is-active').removeClass('is-active');
					$(this).addClass('is-active');
				}
				else {
					event.preventDefault();
				}
			});
		},
		tabs: function(){
			$('.accordion-tabs-minimal').each(function(index) {
				$(this).children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
			});			
		}
		
	}
}