(function (app) {
    app.pageLogin = {
        draw: function () {
            let main = document.createElement('main');
            main.className = 'main';

            let section = document.createElement('section');
            section.className = 'section';

            let container = document.createElement('div');
            container.className = 'section__container';

            let title = document.createElement('h2');
            title.className = 'section__container_title h2';
            title.textContent = 'Вход';

            let cell1 = document.createElement('div');
            cell1.className = 'section__container__cell';
            let input1 = document.createElement('input');
            input1.className = 'section__input';
            input1.id = 'email';
            let p1 = document.createElement('p');
            p1.className = 'p__input';
            p1.textContent = 'E-mail';

            let cell2 = document.createElement('div');
            cell2.className = 'section__container__cell';
            let input2 = document.createElement('input');
            input2.className = 'section__input';
            input2.id = 'password';
            let p2 = document.createElement('p');
            p2.className = 'p__input';
            p2.textContent = 'Пароль';

            let buttonContainer = document.createElement('div');
            buttonContainer.className = 'section__container__button';

            let buttonLogin = document.createElement('button');
            buttonLogin.onclick = login;
            buttonLogin.className = 'section__button p__button';
            buttonLogin.textContent = 'Вход';

            //buttonLogin.addEventListener("click", getProduct); //Потом удалить!

            let buttonRegistration = document.createElement('button');
            buttonRegistration.className = 'section__button p__button';
            buttonRegistration.textContent = 'Зарегистрироваться';

            buttonRegistration.addEventListener("click", goToRegister);

            cell1.append(input1);
            cell1.append(p1);

            cell2.append(input2);
            cell2.append(p2);

            buttonContainer.append(buttonLogin);
            buttonContainer.append(buttonRegistration);

            container.append(title);
            container.append(cell1);
            container.append(cell2);
            container.append(buttonContainer);

            section.append(container);

            main.append(section);

            document.body.append(main);
        }
    }

    function goToRegister() {
        document.querySelector(".main").remove();
        app.pageRegistration.draw();
    }

})(AdsBoard);
