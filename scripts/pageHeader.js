(function (app) {
    app.pageHeader = {
        draw: function () {
            let main = document.createElement('main');
            main.className = 'main';

            let header = document.createElement('header');
            header.className = 'header';

            let container = document.createElement('div');
            container.className = 'header__container';

            let title = document.createElement('h1');
            title.className = 'h1';
            title.textContent = 'МояОбъява.RU';

            container.append(title);

            header.append(container);

            main.append(header);

            document.body.append(main);
        }
    }
})(AdsBoard);