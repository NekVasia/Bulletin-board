(function (app) {
    app.pageHeader = {
        draw: function () {
            let header = document.createElement('header');
            header.className = 'header';

            let container = document.createElement('div');
            container.className = 'header__container';

            let title = document.createElement('h1');
            title.className = 'h1';
            title.textContent = 'МояОбъява.RU';

            container.append(title);

            header.append(container);

            document.body.append(header);
        }
    }
})(AdsBoard);