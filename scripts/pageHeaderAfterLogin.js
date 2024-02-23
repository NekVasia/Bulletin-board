(function (app) {
    app.pageHeaderAfterLogin = {
        draw: function () {
            let header = document.querySelector('header');

            let container = document.createElement('div');
            container.className = 'header__container';

            let logo = document.createElement('div');
            logo.className = 'header__logo';
            let title = document.createElement('h1');
            title.className = 'h1';
            title.textContent = 'МояОбъява.RU';

            let burger = document.createElement('div');
            burger.className = 'header__burger';

            let list = createButtonElement('header__burger__item h1', 'Лента', goToProduct);
            let myList = createButtonElement('header__burger__item h1', 'Мои объявления', getMyProduct);
            let exit = createButtonElement('header__burger__item h1', 'Выход', goToExit);

            logo.append(title);

            burger.append(list);
            burger.append(myList);
            burger.append(exit);

            container.append(logo);
            container.append(burger);

            header.append(container);
        }
    }

    function createButtonElement(buttonClass, buttonText, buttonOnclick) {
        let button = document.createElement('button');

        button.className = buttonClass;
        button.textContent = buttonText;
        button.onclick = buttonOnclick;

        return button;
    }

    function goToProduct() {
        document.querySelector("main").innerHTML = "";
        getProduct();
    }

    function goToExit() {
        document.cookie = "PHPSESSID=;"
        document.querySelector("main").innerHTML = "";
        document.querySelector("header").innerHTML = "";
        app.pageHeader.draw();
        app.pageLogin.draw();
    }
})(AdsBoard);