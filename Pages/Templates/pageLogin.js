(function (app) {
    app.pageLogin = {
        draw: function () {
            let main = document.querySelector('main');

            let section = document.createElement('section');
            section.className = 'section';

            let container = document.createElement('div');
            container.className = 'section__container';

            let title = document.createElement('h2');
            title.className = 'section__container_title h2';
            title.textContent = 'Вход';

            let cell1 = app.Create.divInput('email', ' Логин', 'E-mail');
            let cell2 = app.Create.divInput('password', ' Пароль', 'Пароль');

            let buttonContainer = document.createElement('div');
            buttonContainer.className = 'section__container__button';

            let buttonLogin = app.Create.buttonElement('section__button p__button', 'Войти', login);
            let buttonRegistration = app.Create.buttonElement('section__button p__button', 'Зарегистрироваться', goToRegister);

            buttonContainer.append(buttonLogin);
            buttonContainer.append(buttonRegistration);

            container.append(title);
            container.append(cell1);
            container.append(cell2);
            container.append(buttonContainer);

            section.append(container);

            main.append(section);
        }
    }

    function goToRegister() {
        document.querySelector(".main").innerHTML = "";
        app.pageRegistration.draw();
    }

})(AdsBoard);
