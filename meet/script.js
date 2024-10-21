"use strict"

document.addEventListener("DOMContentLoaded", function(){
	const form = document.getElementById('form');
	form.addEventListener("submit", formSend);


	async function formSend(e) {
		e.preventDefault();
		const form = e.currentTarget;
		const formData = new FormData(form);
    const response = await fetch('send-tg.php',{
      method: 'POST',
      body: formData
    });

    if (response.ok) {
      form.reset();
      form.addClass('form--sended');
    } else {
			 alert('Не удалось отправить данные :(');
		}
	}
});
