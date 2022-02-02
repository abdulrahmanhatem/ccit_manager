	/*  Wizard */
	jQuery(function ($) {
		"use strict";
		//$('form#wrapped').attr('action', 'quotation.php');
		$("#wizard_container").wizard({
			stepsWrapper: "#wrapped",
			submit: ".submit",
			beforeSelect: function (event, state) {
				if ($('input#website').val().length != 0) {
					return false;
				}
				if (!state.isMovingForward)
					return true;
				var inputs = $(this).wizard('state').step.find(':input');
				return !inputs.length || !!inputs.valid();
			}
		}).validate({
			errorPlacement: function (error, element) {
				if (element.is(':radio') || element.is(':checkbox')) {
					error.insertBefore(element.next());
				} else {
					error.insertAfter(element);
				}
			}
		});
		//  progress bar
		$("#progressbar").progressbar();
		$("#wizard_container").wizard({
			afterSelect: function (event, state) {
				$("#progressbar").progressbar("value", state.percentComplete);
				$("#location").text("(" + state.stepsComplete + "/" + state.stepsPossible + ")");
			}
		});
		// Validate select
		$('#wrapped').validate({
			ignore: [],
			rules: {
				select: {
					required: true
				}
			},
			errorPlacement: function (error, element) {
				if (element.is('select:hidden')) {
					error.insertAfter(element.next('.nice-select'));
				} else {
					error.insertAfter(element);
				}
			}
		});

		var features_values =[];
		$(document).on('change', '#features_list .checkbox', function() {
			if(this.checked) {
				$(this).addClass('checked');
				features_values.push($(this).attr('data'));
			}else{
				$(this).removeClass('checked')
				const index = features_values.indexOf($(this).attr('data'));
				if (index > -1) {
					features_values.splice(index, 1);
				}
			}
			$("#features").text(features_values.join(", "));
		});

		// setInterval(function(){
		// 	var budget_range = $('#amount');
		// 		console.log(budget_range)
		// }, 1000)

		var budget_range = $('#amount').val();
			$('#budget').text(budget_range);

		
		$(document).on('click', '#slider-range', function() {
				var budget_range = $('#amount').val();
				$('#budget').text(budget_range);
		});


		
	});

/* File upload validate size and file type - For details: https://github.com/snyderp/jquery.validate.file*/
	/*	$("form#wrapped")
			.validate({
				rules: {
					fileupload: {
						fileType: {
							types: ["jpg", "jpeg", "gif", "png", "pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"]
						},
						maxFileSize: {
							"unit": "KB",
							"size": 150
						},
						minFileSize: {
							"unit": "KB",
							"size": "2"
						}
					}
				}
			});*/
// Summary 

function getVals(formControl, controlType) {
	switch (controlType) {

		// case 'features':
		// 	// Get name for set of checkboxes
		// 	var checkboxName = $(formControl).attr('name');

		// 	// Get all checked checkboxes
		// 	var value = [];
		// 	// $("input[name*='" + checkboxName + "']").each(function () {
		// 	// 	// Get all checked checboxes in an array
		// 	// 	if (jQuery(this).is(":checked")) {
		// 	// 		value.push($(this).val());
		// 	// 	}
		// 	// });
		// 	// $("#features").text(value.join(", "));
		// 	$("#features").text("Hellooooooooo");
		// 	console.log(value);
		// 	break;

		case 'additional_message':
			// Get the value for a textarea
			var value = $(formControl).val();
			$("#additional_message").text(value);
			break;

		case 'project_link':
			// Get the value for a textarea
			var value = $(formControl).val();
			$("#project_link").text(value);
			break;
            
         case 'fileupload':
			// Get the value for a textarea
			var value = $(formControl).val();
			$("#fileupload").text(value);
			break;
        
        // case 'budget':
		// 	// Get the value for a textarea
		// 	var value = $(formControl).val();
		// 	$("#budget").text(value);
		// 	break;


	}
}

