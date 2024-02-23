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

            let cell1 = createInputCell('email', ' Логин', 'E-mail');
            let cell2 = createInputCell('phone', ' Телефон', 'Телефон');
            let cell3 = createInputCell('name', ' Имя пользователя', 'ФИО');
            let cell4 = createInputCell('password', ' Пароль', 'Пароль');
            let cell5 = createInputCell('password_repeat', ' Подтверждение пароля', 'Подтверждение пароля');

            let buttonContainer = document.createElement('div');
            buttonContainer.className = 'section__container__button';

            let buttonRegistration = createButtonElement('section__button p__button', 'Зарегистрироваться', registration);
            let buttonLogin = createButtonElement('section__button p__button', 'Войти', goToLogin);

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

    function createInputCell(inputId, inputPlaceholder, pText) {
        let cell = document.createElement('div');
        cell.className = 'section__container__cell';

        let input = document.createElement('input');
        input.className = 'section__input';
        input.id = inputId;
        input.placeholder = inputPlaceholder;

        let p = document.createElement('p');
        p.className = 'p__input';
        p.textContent = pText;

        cell.append(input);
        cell.append(p);

        return cell;
    }

    function createButtonElement(buttonClass, buttonText, buttonOnclick) {
        let button = document.createElement('button');

        button.className = buttonClass;
        button.textContent = buttonText;
        button.onclick = buttonOnclick;

        return button;
    }

    function goToLogin() {
        document.querySelector(".main").innerHTML = "";
        app.pageLogin.draw();
    }
})(AdsBoard);
