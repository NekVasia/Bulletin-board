(function (app) {
    app.pageCreateProduct = {
        draw: function () {
            let main = document.querySelector('main');

            let section = document.createElement('section');
            section.className = 'product__create';

            let block1 = document.createElement('div');
            block1.className = 'section__input__create';
            let p1 = document.createElement('p');
            p1.className = 'p__input';
            p1.textContent = 'Название:';
            let input1 = document.createElement('input');
            input1.className = 'input__create';
            input1.id = 'title';

            let block2 = document.createElement('div');
            block2.className = 'section__input__create';
            let p2 = document.createElement('p');
            p2.className = 'p__input';
            p2.textContent = 'Описание:';
            let input2 = document.createElement('input');
            input2.className = 'input__create__about';
            input2.id = 'about';

            let block3 = document.createElement('div');
            block3.className = 'section__input__create';
            let p3 = document.createElement('p');
            p3.className = 'p__input';
            p3.textContent = 'Цена:';
            let input3 = document.createElement('input');
            input3.className = 'input__create';
            input3.id = 'sum';

            let block4 = document.createElement('div');
            block4.className = 'section__picture';
            let img = document.createElement('div');
            img.className = 'product__image';
            let button = document.createElement('input');
            button.type = 'file';
            button.id = 'image';
            button.className = 'button';
            button.textContent = 'Загрузить фото';
            //button.addEventListener("click", upload);

            // let block4 = document.createElement('div');
            // block4.className = 'section__picture';
            // let img = document.createElement('input');
            // img.className = 'product__image';
            // img.type = 'file';
            // img.id = 'image';
            // let button = document.createElement('button');
            // button.className = 'button';
            // button.textContent = 'Загрузить фото';
            // button.addEventListener("click", upload);

            let block5 = document.createElement('div');
            block5.className = 'section__save';
            let buttonSave = document.createElement('button');
            buttonSave.className = 'button__save';
            buttonSave.textContent = 'Сохранить';
            buttonSave.onclick = createProduct;
            //buttonSave.addEventListener("click", goToSave);

            block1.append(p1);
            block1.append(input1);
            block2.append(p2);
            block2.append(input2);
            block3.append(p3);
            block3.append(input3);
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

    // function goToLoad() {
    //     document.querySelector(".main").remove();
    //     app.pageRegistration.draw();
    // }
    //
    // function goToSave() {
    //     document.querySelector(".main").innerHTML = "";
    //     app.pageRegistration.draw();
    // }
})(AdsBoard);
