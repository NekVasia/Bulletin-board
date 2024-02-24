(function (app) {
    app.pageMyProductEmpty = { //Для добавления кнопки "Добавить"
        draw: function () {
            let main = document.querySelector('main');

            let createDiv = document.createElement('div');
            createDiv.className = '***';
            createDiv.innerText = "У вас нет созданных товаров";

            main.append(createDiv);
        }
    }
})(AdsBoard);