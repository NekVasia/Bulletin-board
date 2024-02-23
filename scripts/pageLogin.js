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

            let cell1 = createInputCell('email', ' Логин', 'E-mail');
            let cell2 = createInputCell('password', ' Пароль', 'Пароль');

            let buttonContainer = document.createElement('div');
            buttonContainer.className = 'section__container__button';

            let buttonLogin = createButtonElement('section__button p__button', 'Войти', login);
            let buttonRegistration = createButtonElement('section__button p__button', 'Зарегистрироваться', goToRegister);

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

    function goToRegister() {
        document.querySelector(".main").innerHTML = "";
        app.pageRegistration.draw();
    }

})(AdsBoard);
