(function (app) {
    app.pageCreateProduct = {
        draw: function () {
            let main = document.querySelector('main');

            let section = document.createElement('section');
            section.className = 'product__create';

            let block1 = app.Create.DivBlock('section__input__create', 'Название:', 'input__create', 'title')
            //let block1 = createDivBlock('section__input__create', 'Название:', 'input__create', 'title');
            let block2 = createDivBlock('section__input__create', 'Описание:', 'input__create__about', 'about');
            let block3 = createDivBlock('section__input__create', 'Цена:', 'input__create', 'sum');

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
            //let buttonSave = createButtonElement('button__save', 'Сохранить', createProduct);

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

    function createDivBlock(blockClass, pText, inputClass, inputId) {
        let block = document.createElement('div');
        block.className = blockClass;

        let p = document.createElement('p');
        p.className = 'p__input';
        p.textContent = pText;

        let input = document.createElement('input');
        input.className = inputClass;
        input.id = inputId;

        block.append(input);
        block.append(p);

        return block;
    }

    function createButtonElement(buttonClass, buttonText, buttonOnclick) {
        let button = document.createElement('button');

        button.className = buttonClass;
        button.textContent = buttonText;
        button.onclick = buttonOnclick;

        return button;
    }

})(AdsBoard);
