var $ = jQuery;

var global_engine = (function() {
	'use strict';

	// function add_lyric() {
	// 	if($('.add button.add_lyric').length){
	// 		$('.add button.add_lyric')
	// 		.on('click', function(event){
	// 			// event.preventDefault();
	// 			$('#add_lyric').validate({
	// 				rules: {
	// 					title: {
	// 						required: true,
	// 					},
	// 					singer: {
	// 						required: true,
	// 					},
	// 					lyric: {
	// 						required: true,
	// 					}
	// 				},
	// 				messages: {
	// 					title: {
	// 						required: 'Please input song title.'
	// 					},
	// 					singer: {
	// 						required: 'Please input singer.'
	// 					},
	// 					lyric: {
	// 						required: 'Please type lyric.'
	// 					}
	// 				},
	// 				submitHandler: function(form){
	// 					// $('form input[type=submit]').attr('disabled', 'disabled');
	// 					// form.submit();\
	// 					var title  = $.trim($('.add input[name="title"]').val());
	// 					var singer = $.trim($('.add input[name="singer"]').val());
	// 					var lyric  = $.trim($('.add textarea[name="lyric"]').val());
	// 					// return false;
	// 					// var formData = new FormData($("#add_lyric")[0]);
	// 					$.ajax({
	// 						url: '/lirik/function.php',
	// 						type: 'POST',
	// 						dataType: 'json',
	// 						data: {
	// 							action: 'add-lyric',
	// 							title: title,
	// 							singer: singer,
	// 							lyric: lyric,
	// 						},
	// 						beforeSend: function(){
	// 							console.log('beforeSend');
	// 							$('button.add_lyric').addClass('disabled');
	// 						}
	// 					})
	// 					.done(function(response){
	// 						console.log(response);
	// 						console.log('success');
	// 						$('button.add_lyric').removeClass('disabled');
	// 						$('<div class="alert alert-success" role="alert">New data added</div>').insertAfter($('.add textarea[name="lyric"]'));
	// 						delete_alert();
	// 						reset_this_form();
	// 					})
	// 					.fail(function(){
	// 						console.log('fail');return false;
	// 					})
	// 					.always(function(){
	// 						console.log('always');return false;
	// 					})
	// 				},

	// 			})

	// 		})
	// 	}
	// }
	// function edit_lyric() {
	// 	if($('.edit button.edit_lyric').length){
	// 		$('.edit button.edit_lyric')
	// 		.on('click', function(event){
	// 			// event.preventDefault();
	// 			$('#edit_lyric').validate({
	// 				rules: {
	// 					title: {
	// 						required: true,
	// 					},
	// 					singer: {
	// 						required: true,
	// 					},
	// 					lyric: {
	// 						required: true,
	// 					}
	// 				},
	// 				messages: {
	// 					title: {
	// 						required: 'Please input song title.'
	// 					},
	// 					singer: {
	// 						required: 'Please input singer.'
	// 					},
	// 					lyric: {
	// 						required: 'Please type lyric.'
	// 					}
	// 				},
	// 				submitHandler: function(form){
	// 					// $('form input[type=submit]').attr('disabled', 'disabled');
	// 					// form.submit();\
	// 					var id  = $.trim($('.edit input[name="id"]').val());
	// 					var title  = $.trim($('.edit input[name="title"]').val());
	// 					var singer = $.trim($('.edit input[name="singer"]').val());
	// 					var lyric  = $.trim($('.edit textarea[name="lyric"]').val());
	// 					// return false;
	// 					// var formData = new FormData($("#edit_lyric")[0]);
	// 					$.ajax({
	// 						url: '/lirik/function.php',
	// 						type: 'POST',
	// 						dataType: 'json',
	// 						data: {
	// 							action: 'edit-lyric',
	// 							id: id,
	// 							title: title,
	// 							singer: singer,
	// 							lyric: lyric,
	// 						},
	// 						beforeSend: function(){
	// 							console.log('beforeSend');
	// 							$('button.edit_lyric').addClass('disabled');
	// 						}
	// 					})
	// 					.done(function(response){
	// 						console.log(response);
	// 						console.log('success');
	// 						$('button.edit_lyric').removeClass('disabled');
	// 						$('<div class="alert alert-success" role="alert">Lyric successfully edited</div>').insertAfter($('.edit textarea[name="lyric"]'));
	// 						delete_alert();
	// 						reset_this_form();
	// 					})
	// 					.fail(function(){
	// 						console.log('fail');return false;
	// 					})
	// 					.always(function(){
	// 						console.log('always');return false;
	// 					})
	// 				},

	// 			})

	// 		})
	// 	}
	// }

	// function delete_alert(){
	// 	if($('.alert').length){
	// 		setTimeout(function(){
	// 			$('.alert').fadeOut('slow', function() {
	// 				$('.alert').remove();
	// 			});
	// 		}, 2000);
	// 	}
	// }

	// function reset_this_form(){
	// 	setTimeout(function(){
	// 		$('form input').val('');
	// 		$('form textarea').val('');
	// 	}, 2000);
	// }

	// function initTinyMCE(){
	// 	if($('textarea.tinymce').length){
	// 		tinymce.init({
	//         selector:"textarea",
	//         height: 200,
	//         // width: 600,
	//         menubar: false,
	//         plugins: [
	//           'advlist autolink lists link image charmap print preview anchor',
	//           'searchreplace visualblocks code fullscreen',
	//           'insertdatetime media table contextmenu paste code'
	//         ],
	//         toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist',
	//         setup: function(ed) {
	//         	// var textarea = $('#companyProfile');
	//         	// var data_old = textarea.attr('data-old');
	//          //    ed.on('keyup', function(e) {
	//          //    	var data_new = ed.getContent();
	//          //        // console.log('old data ' + data_old);
	//          //        // console.log('new data ' + data_new);
	//          //        if ( data_old != data_new){
	//          //        	textarea.addClass('changed');
	//          //        }else{
	//          //        	textarea.removeClass('changed');
	//          //        }
	//          //        if(data_new == ''){
	//          //        	textarea.text('This company has no profile.');
	//          //        	tinyMCE.activeEditor.setContent('This company has no profile.');
	//          //        }

	//          //    });
	//         }
	//     });
	// 	}
	// }

	function login(){
		$('#form-login').validate({
			rules: {
				username: {
					required: true,
				},
				password: {
					required: true,
				},
			},
			messages: {
				username: {
					required: 'Please input username.'
				},
				password: {
					required: 'Please input password.'
				},
			},
		})

		$('form#form-login').on('submit', function() {
			alert($('#form-login').validate());
		})
	}

	function register(){
		$('#form-register').validate({
			rules: {
				nama: {
					required: true,
				},
				password: {
					required: true,
				},
			},
			messages: {
				username: {
					required: 'Please input username.'
				},
				singer: {
					required: 'Please input password.'
				},
			},
		})

		$('form#form-login').on('submit', function() {
			alert($('#form-login').validate());
		})
	}

	var global_engine = {
		init: function() {
			login();
			// add_lyric();
			// edit_lyric();
			// initTinyMCE();
		}
	};

	return global_engine;
}());

jQuery(document).ready(function($) {
	global_engine.init();
});