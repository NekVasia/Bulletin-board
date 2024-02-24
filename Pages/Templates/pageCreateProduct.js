(function (app) {
    app.pageCreateProduct = {
        draw: function () {
            let main = document.querySelector('main');

            let section = document.createElement('section');
            section.className = 'product__create';

            let block1 = app.Create.divBlock('section__input__create', 'Название:', 'input__create', 'title');
            let block2 = app.Create.divBlock('section__input__create', 'Описание:', 'input__create__about', 'about');
            let block3 = app.Create.divBlock('section__input__create', 'Цена:', 'input__create', 'sum');

            let block4 = document.createElement('div');
            block4.className = 'section__picture';

            let img = document.createElement('img');
            img.className = 'product__image';

            let button = document.createElement('input');
            button.type = 'file';
            button.id = 'image';
            button.className = 'button';
            button.textContent = 'Загрузить фото';

            button.addEventListener('change', function (event) {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.onload = function () {
                    img.src = reader.result;
                };
                reader.readAsDataURL(file);
            });

            let block5 = document.createElement('div');
            block5.className = 'section__save';

            let buttonSave = app.Create.buttonElement('button__save', 'Сохранить', createProduct);

            block4.append(img);
            block4.append(button);
            block5.append(buttonSave);

            section.append(block1);
            section.append(block2);
            section.append(block3);
            section.append(block4);
            section.append(block5);

            main.append(section);
        }
    }
})(AdsBoard);
