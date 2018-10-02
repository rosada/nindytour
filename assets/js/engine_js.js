var $ = jQuery;

var global_engine = (function() {
	'use strict';

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

	function forget_password(){
		$.validator.methods.email = function( value, element ) {
			return this.optional( element ) || /[a-zA-Z0-9.]+@[a-z]+\.[a-z]+/.test( value );
		};
		$('#form-forget-password').validate({
			rules: {
				email: {
					required: true,
					email: true,
					remote: urlForJs + "/check_email.php?item=password&is_exist=true",
				},
			},
			messages: {
				email: {
					required: 'Please input email address.',
					email: 'Please input valid email.',
					remote: 'Your email is not exist in our system.',
				},
			},
		})

		$('form#form-forget-password').on('submit', function() {
			// alert($('#form-login').validate());
		})
	}

	function login(){
		$.validator.methods.email = function( value, element ) {
			return this.optional( element ) || /[a-zA-Z0-9.]+@[a-z]+\.[a-z]+/.test( value );
		};
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
			// alert($('#form-login').validate());
		})
	}

	function register(){
		$.validator.methods.email = function( value, element ) {
			return this.optional( element ) || /[a-zA-Z0-9.]+@[a-z]+\.[a-z]+/.test( value );
		};
		$.validator.addMethod("usernamevalid", function( value, element ) {
			var regex = new RegExp("^[a-zA-Z0-9_.]+$");
			var key = value;

			if (!regex.test(key)) {
			   return false;
			}
			return true;
		}, "Please use only letter, number, underscore and dot.");
		$('#form-register').validate({
			rules: {
				username: {
					required: true,
					usernamevalid: true,
					minlength: 8,
					maxlength: 32,
					remote: urlForJs + "/check_email.php?item=username&is_exist=false",
				},
				email: {
					required: true,
					email: true,
					remote: urlForJs + "/check_email.php?item=password&is_exist=false",
				},
				password: {
					required: true,
					minlength: 8,
					maxlength: 32,
				},
				repassword: {
					required: true,
					equalTo: "#password",
				},
			},
			messages: {
				username: {
					remote: 'This username has already taken',
				},
				email: {
					remote: 'This username has already taken.',
				}
			}
		})

		$('form#form-register').on('submit', function() {
		})
	}

	var global_engine = {
		init: function() {
			login();
			forget_password();
			register();
		}
	};

	return global_engine;
}());

jQuery(document).ready(function($) {
	global_engine.init();
});