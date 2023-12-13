(function (app) {
    app.pageRegistration = {
        draw: function () {
            let section = document.createElement('section');
            section.className = 'section';

            let container = document.createElement('div');
            container.className = 'section__container';

            let title = document.createElement('h2');
            title.className = 'section__container_title h2';
            title.textContent = 'Регистрация';

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
            input2.id = 'phone';
            let p2 = document.createElement('p');
            p2.className = 'p__input';
            p2.textContent = 'Телефон';

            let cell3 = document.createElement('div');
            cell3.className = 'section__container__cell';
            let input3 = document.createElement('input');
            input3.className = 'section__input';
            input3.id = 'name';
            let p3 = document.createElement('p');
            p3.className = 'p__input';
            p3.textContent = 'ФИО';

            let cell4 = document.createElement('div');
            cell4.className = 'section__container__cell';
            let input4 = document.createElement('input');
            input4.className = 'section__input';
            input4.id = 'password';
            let p4 = document.createElement('p');
            p4.className = 'p__input';
            p4.textContent = 'Пароль';

            let cell5 = document.createElement('div');
            cell5.className = 'section__container__cell';
            let input5 = document.createElement('input');
            input5.className = 'section__input';
            input5.id = 'password_repeat';
            let p5 = document.createElement('p');
            p5.className = 'p__input';
            p5.textContent = 'Подтверждение пароля';

            let buttonContainer = document.createElement('div');
            buttonContainer.className = 'section__container__button';

            let buttonRegistration = document.createElement('button');
            buttonRegistration.onclick = registration;
            buttonRegistration.className = 'section__button p__button';
            buttonRegistration.textContent = 'Зарегистрироваться';

            let buttonLogin = document.createElement('button');
            buttonLogin.className = 'section__button p__button';
            buttonLogin.textContent = 'Войти';

            buttonLogin.addEventListener("click", goToLogin);

            cell1.appendChild(input1);
            cell1.appendChild(p1);

            cell2.appendChild(input2);
            cell2.appendChild(p2);

            cell3.appendChild(input3);
            cell3.appendChild(p3);

            cell4.appendChild(input4);
            cell4.appendChild(p4);

            cell5.appendChild(input5);
            cell5.appendChild(p5);

            buttonContainer.appendChild(buttonRegistration);
            buttonContainer.appendChild(buttonLogin);

            container.appendChild(title);
            container.appendChild(cell1);
            container.appendChild(cell2);
            container.appendChild(cell3);
            container.appendChild(cell4);
            container.appendChild(cell5);
            container.appendChild(buttonContainer);

            section.appendChild(container);

            document.body.appendChild(section);
        }
    }
    function goToLogin() {
        document.querySelector(".section").remove();
        app.pageLogin.draw();
    }
})(AdsBoard);
