(function (app) {
    app.pageMyProductCreate = { //Для добавления кнопки "Добавить"
        draw: function () {
            let main = document.querySelector('main');

            let createDiv = document.createElement('div');
            createDiv.className = 'product__create__button';

            let buttonCreate = createButtonElement('button', 'Добавить', goToCreateProduct);

            createDiv.append(buttonCreate);

            main.append(createDiv);
        }
    }

    function createButtonElement(buttonClass, buttonText, buttonOnclick) {
        let button = document.createElement('button');

        button.className = buttonClass;
        button.textContent = buttonText;
        button.onclick = buttonOnclick;

        return button;
    }

})(AdsBoard);