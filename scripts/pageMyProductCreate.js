(function (app) {
    app.pageMyProductCreate = { //Для добавления кнопки "Добавить"
        draw: function () {
            let main = document.querySelector('main');

            let createDiv = document.createElement('div');
            createDiv.className = 'product__create__button';

            let buttonCreate = document.createElement('button');
            buttonCreate.className = 'button';
            buttonCreate.textContent = 'Добавить';
            buttonCreate.addEventListener('click', goToCreateProduct);

            createDiv.append(buttonCreate);

            main.append(createDiv);
        }
    }

    function goToCreateProduct() {
        document.querySelector("main").innerHTML = "";
        app.pageCreateProduct.draw();
    }
})(AdsBoard);