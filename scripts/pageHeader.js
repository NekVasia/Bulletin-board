(function (app) {
    app.pageHeader = {
        draw: function () {
            let header = document.querySelector('header');

            let container = document.createElement('div');
            container.className = 'header__container';

            let title = document.createElement('h1');
            title.className = 'h1';
            title.textContent = 'МояОбъява.RU';

            container.append(title);

            header.append(container);
        }
    }
})(AdsBoard);