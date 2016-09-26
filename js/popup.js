$(function() {

	$('.btn-login').on('click', function() {
		eModal.ajax({
			url: '/user/login/',
			title: 'Авторизация',
			buttons: [
			    {text: 'Войти', style: 'info', close: false, click: function() {
			    	//console.log('Ok click');
			    	$('#popup-form').ajaxSubmit({
			    		target: '.modal-body',
			    	});
			    }},
			    {text: 'Отмена', style: 'danger', close: true},
			]
		});
		return false;
	});

	$('.btn-register').on('click', function() {
		eModal.ajax({
			url: '/user/register/',
			title: 'Регистрация',
			buttons: [
			    {text: 'Регистрация', style: 'info', close: false, click: function() {
			    	$('#popup-form').ajaxSubmit({
			    		target: '.modal-body',
			    	});
			    }},
			    {text: 'Отмена', style: 'danger', close: true},
			]
		});
		return false;
	});


	$('.edit-ship').on('click', function() {
    	//console.log('Edit click');
		var id = $(this).data('ship_id');
		eModal.ajax({
			url: '/administration/popup/ship-edit/' + (id?id+'/':''),
			title: id?'Изменить корабль':'Добавить корабль',
			buttons: [
			    {text: 'Сохранить', style: 'info', close: false, click: function() {
			    	$('#popup-form').ajaxSubmit({
			    		target: '.modal-body',
			    	});
			    }},
			    {text: 'Отмена', style: 'danger', close: true},
			]
		});
		return false;
	});


	$('.edit-ship-classes').on('click', function() {
    	//console.log('Edit click');
		var id = $(this).data('ship_id');
		eModal.ajax({
			url: '/administration/popup/ship-classes-edit/' + (id?id+'/':''),
			title: 'Классы корабля',
			buttons: [
			    {text: 'Сохранить', style: 'info', close: false, click: function() {
			    	$('#popup-form').ajaxSubmit({
			    		target: '.modal-body',
			    	});
			    }},
			    {text: 'Закрыть', style: 'danger', close: false, click: function() {
					eModal.close();
					window.location.href = window.location.pathname;
			    }},
			]
		});
		return false;
	});

	$('.edit-class').on('click', function() {
    	//console.log('Edit click');
		var id = $(this).data('class_id');
		eModal.ajax({
			url: '/administration/popup/class-edit/' + (id?id+'/':''),
			title: id?'Изменить класс кораблей':'Добавить класс кораблей',
			buttons: [
			    {text: 'Сохранить', style: 'info', close: false, click: function() {
			    	$('#popup-form').ajaxSubmit({
			    		target: '.modal-body',
			    	});
			    }},
			    {text: 'Отмена', style: 'danger', close: true},
			]
		});
		return false;
	});

	$('.edit-class-ships').on('click', function() {
    	//console.log('Edit click');
		var id = $(this).data('class_id');
		eModal.ajax({
			url: '/administration/popup/ship-classes-edit/' + (id?id+'/':''),
			title: 'Классы корабля',
			buttons: [
			    {text: 'Сохранить', style: 'info', close: false, click: function() {
			    	$('#popup-form').ajaxSubmit({
			    		target: '.modal-body',
			    	});
			    }},
			    {text: 'Закрыть', style: 'danger', close: false, click: function() {
					eModal.close();
					window.location.href = window.location.pathname;
			    }},
			]
		});
		return false;
	});



});