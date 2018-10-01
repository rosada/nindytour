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
					remote: urlForJs + "/check_email.php",
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
		$.validator.addMethod("namevalid", function( value, element ) {
			var regex = new RegExp("^[a-zA-Z. ]+$");
			var key = value;

			if (!regex.test(key)) {
			   return false;
			}
			return true;
		}, "Please use only letter, dot and space.");
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
			forget_password();
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