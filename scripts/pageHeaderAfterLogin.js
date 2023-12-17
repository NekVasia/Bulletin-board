(function (app) {
    app.pageHeaderAfterLogin = {
        draw: function () {
            let header = document.createElement('header');
            header.className = 'header';

            let container = document.createElement('div');
            container.className = 'header__container';

            let logo = document.createElement('div');
            logo.className = 'header__logo';
            let title = document.createElement('h1');
            title.className = 'h1';
            title.textContent = 'МояОбъява.RU';

            let burger = document.createElement('div');
            burger.className = 'header__burger';
            let list = document.createElement('h1');
            list.className = 'header__burger__item h1';
            list.textContent = 'Лента';
            let myList = document.createElement('h1');
            myList.className = 'header__burger__item h1';
            myList.textContent = 'Мои объявления';
            let exit = document.createElement('h1');
            exit.className = 'header__burger__item h1';
            exit.textContent = 'Выход';

            logo.append(title);

            burger.append(list);
            burger.append(myList);
            burger.append(exit);

            container.append(logo);
            container.append(burger);

            header.append(container);

            document.body.append(header);
        }
    }
})(AdsBoard);