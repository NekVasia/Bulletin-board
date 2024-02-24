(function (app) {
    app.pageRegistration = {
        draw: function () {
            let main = document.querySelector('main');

            let section = document.createElement('section');
            section.className = 'section';

            let container = document.createElement('div');
            container.className = 'section__container';

            let title = document.createElement('h2');
            title.className = 'section__container_title h2';
            title.textContent = 'Регистрация';

            let cell1 = app.Create.divInput('email', ' Логин', 'E-mail');
            let cell2 = app.Create.divInput('phone', ' Телефон', 'Телефон');
            let cell3 = app.Create.divInput('name', ' Имя пользователя', 'ФИО');
            let cell4 = app.Create.divInput('password', ' Пароль', 'Пароль');
            let cell5 = app.Create.divInput('password_repeat', ' Подтверждение пароля', 'Подтверждение пароля');

            let buttonContainer = document.createElement('div');
            buttonContainer.className = 'section__container__button';

            let buttonRegistration = app.Create.buttonElement('section__button p__button', 'Зарегистрироваться', registration);
            let buttonLogin = app.Create.buttonElement('section__button p__button', 'Войти', goToLogin);

            buttonContainer.append(buttonRegistration);
            buttonContainer.append(buttonLogin);

            container.append(title);
            container.append(cell1);
            container.append(cell2);
            container.append(cell3);
            container.append(cell4);
            container.append(cell5);
            container.append(buttonContainer);

            section.append(container);

            main.append(section);
        }
    }

    function goToLogin() {
        document.querySelector(".main").innerHTML = "";
        app.pageLogin.draw();
    }
})(AdsBoard);
