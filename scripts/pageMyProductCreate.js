(function (app) {
    app.pageMyProductCreate = { //Для добавления кнопки "Добавить"
        draw: function () {
            let main = document.querySelector('main');

            let createDiv = document.createElement('div');
            createDiv.className = 'product__create__button';

            let buttonCreate = app.Create.buttonElement('button', 'Добавить', goToCreateProduct);

            createDiv.append(buttonCreate);

            main.append(createDiv);
        }
    }
})(AdsBoard);