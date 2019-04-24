jQuery(document).ready(function(){

	$('.button-collapse').sideNav();

	$('.collapsible').collapsible();

	$('select').material_select();

	$('.modal-trigger').click(function (e){
		$('.modal').openModal()
	});


	var checkBox1 = $("th.containerCheck input.check");
	var checkBoxAll = $("td.containerCheck input.check");
	var buttonSelect = $(".btn-selection")
	checkBox1.on('change', function(event) {
		if(checkBox1.is(':checked'))
		{
			checkBoxAll.prop('checked' , true);
			buttonSelect.prop("disabled", false);
		}else {
			buttonSelect.prop("disabled", true);
			checkBoxAll.prop('checked' , false);
		}
	});

	if (checkBoxAll.length < 1) {
		checkBox1.css({
			display : "none"
		});
		buttonSelect.css({
			display : "none"
		});
	}

	checkBoxAll.on('change', function(event) {

		if (checkBoxAll.is(':checked')) {
			buttonSelect.prop("disabled", false);
		}else {
			buttonSelect.prop("disabled", true);
		}
		if ($("td.containerCheck input.check:checked").length === checkBoxAll.length) {
			checkBox1.prop('checked' , true);
		}else {
			checkBox1.prop('checked' , false);
		}
	});


	var modalConfirmation = $(".text-modal1");
	var buttonSend = $(".btn-send");
	var allButton = $(".modal-trigger");
	var buttonModify = "button-modify-user";
	var buttonValidate = "button-validate-user";
	var buttonDelete = "button-delete-user";
	var modifySelection = "button-modify-selection";
	var validateSelection = "button-validate-selection";
	var deleteSelection = "button-delete-selection";
	allButton.on('click', function(event) {
		switch (true) {
			case $(this).hasClass(buttonModify):
				buttonSend.attr('name', 'modifyOne');
				buttonSend.attr('value', $(this).val());
				modalConfirmation.html("Êtes vous sur de vouloir modifier cet utilisateur?");
			break;

			case $(this).hasClass(buttonValidate):
				buttonSend.attr('name', 'modifyOne');
				buttonSend.attr('value', $(this).val());
				modalConfirmation.html("Êtes vous sur de vouloir valider cet utilisateur? Un email de confirmation lui sera envoyé.");
			break;

			case $(this).hasClass(buttonDelete):
				buttonSend.attr('name', 'deleteOne');
				buttonSend.attr('value', $(this).val());
				modalConfirmation.html("Êtes vous sur de vouloir supprimer cet utilisateur?");
			break;

			case $(this).hasClass(modifySelection):
				buttonSend.attr('name', 'modifyAll');
				modalConfirmation.html("Êtes vous sur de vouloir modifier cette sélection?");
			break;

			case $(this).hasClass(validateSelection):
				buttonSend.attr('name', 'modifyAll');
				modalConfirmation.html("Êtes vous sur de vouloir valider cette sélection? Des emails de confirmation seront envoyés aux utilisateurs sélectionnés.");
			break;

			case $(this).hasClass(deleteSelection):
				buttonSend.attr('name', 'deleteAll');
				modalConfirmation.html("Êtes vous sur de vouloir supprimer cette sélection?");
			break;

			default:
				break;
		}
	});
});
