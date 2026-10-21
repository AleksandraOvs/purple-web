document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('input[name="page_title"]').forEach(function (field) {
        field.value = document.title;
    });
});

document.addEventListener('wpcf7mailsent', function (event) {
    const form = event.target;

    if (!form || !form.matches('form.wpcf7-form')) {
        return;
    }

    // Скрываем форму
    form.classList.add('is-submitted');

    // Находим или создаём сообщение
    let message = form.parentElement.querySelector('.form-success-message');

    if (!message) {
        message = document.createElement('div');
        message.className = 'form-success-message';

        message.innerHTML = `
        <h3>Спасибо! Ваша заявка успешно отправлена.</h3>
        <p>В ближайшее время мы с вами свяжемся :)</p>
    `;

        form.insertAdjacentElement('afterend', message);
    }
});