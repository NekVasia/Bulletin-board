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

            let list = document.createElement('button');
            list.className = 'header__burger__item h1';
            list.textContent = 'Лента';
            list.addEventListener("click", goToProduct);

            let myList = document.createElement('button');
            myList.className = 'header__burger__item h1';
            myList.textContent = 'Мои объявления';
            myList.addEventListener("click", goToMyProduct);

            let exit = document.createElement('button');
            exit.className = 'header__burger__item h1';
            exit.textContent = 'Выход';
            exit.addEventListener("click", goToExit);

            logo.append(title);

            burger.append(list);
            burger.append(myList);
            burger.append(exit);

            container.append(logo);
            container.append(burger);

            header.append(container);
        }
    }

    function goToProduct() {
        document.querySelector("main").innerHTML = "";
        getProduct();
    }
    function goToMyProduct() {
        document.querySelector("main").innerHTML = "";
        app.pageMyProductCreate.draw();
        getMyProduct();
    }
    function goToExit() {
        document.cookie = "PHPSESSID=;"
        document.querySelector("main").innerHTML = "";
        document.querySelector("header").innerHTML = "";
        app.pageHeader.draw();
        app.pageLogin.draw();
    }
})(AdsBoard);