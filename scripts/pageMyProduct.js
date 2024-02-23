(function (app) {
    app.pageMyProduct = {
        draw: function (productDataMy) {
            let main = document.querySelector('main');

            let section = document.createElement('section');
            section.className = 'product';

            let block1 = document.createElement('div');
            block1.className = 'product__block1';
            let image = document.createElement('div');
            image.className = 'product__image';
            image.src  = 'images/noProductPictures.png';
            let imageElement = document.createElement("img");
            imageElement.className = "product__image-fit";
            imageElement.alt = "Фотка товара";

            let block2 = document.createElement('div');
            block2.className = 'product__block product__block__grow';
            let cell = document.createElement('div');
            cell.className = 'product__cell';
            let cell__content = document.createElement('div');
            cell__content.className = 'product__cell__description';
            let title = document.createElement('div');
            title.className = 'product__title';
            let about = document.createElement('div');
            about.className = 'product__about';
            let sum = document.createElement('div');
            sum.className = 'product__sum';

            let buttonDiv = document.createElement('div');
            buttonDiv.className = 'product__button';

            let buttonChange = app.Create.buttonElement('button', 'Изменить', goToChangeProduct);
            let buttonDelete = app.Create.buttonElement('button', 'Удалить', deleteProduct);

            if (productDataMy.image) {
                imageElement.src = productDataMy.image;
            } else {
                imageElement.src = 'images/noProductPictures.png';
            }

            title.innerText = productDataMy.title;
            about.innerText = productDataMy.about;
            sum.innerText = productDataMy.sum + " ₽";
            section.id = productDataMy.product_id;

            image.append(imageElement);

            block1.append(image);

            cell__content.append(title);
            cell__content.append(about);

            cell.append(cell__content);
            cell.append(sum);

            buttonDiv.append(buttonChange);
            buttonDiv.append(buttonDelete);

            block2.append(cell);
            block2.append(buttonDiv);

            section.append(block1);
            section.append(block2);

            main.append(section);
        }
    }
})(AdsBoard);
