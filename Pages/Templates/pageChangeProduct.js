(function (app) {
    app.pageChangeProduct = {
        draw: function (previewData) {
            let main = document.querySelector('main');

            let section = document.createElement('section');
            section.className = 'product__create';

            //Исправить превью
            let block1 = createDivBlock('section__input__create', 'Название:', 'input__create', 'title', previewData.title);
            let block2 = createDivBlock('section__input__create', 'Описание:', 'input__create__about', 'about', previewData.about);
            let block3 = createDivBlock('section__input__create', 'Цена:', 'input__create', 'sum', previewData.sum);

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

            let buttonSave = app.Create.buttonElement('button__save', 'Изменить', changeProduct);

            section.id = previewData.productId;
            img.src = previewData.image;

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

    function createDivBlock(blockClass, pText, inputClass, inputId, previewData) {
        let block = document.createElement('div');
        block.className = blockClass;

        let p = document.createElement('p');
        p.className = 'p__input';
        p.textContent = pText;

        let input = document.createElement('input');
        input.className = inputClass;
        input.id = inputId;
        input.value = previewData.item;

        block.append(p);
        block.append(input);

        return block;
    }
})(AdsBoard);
