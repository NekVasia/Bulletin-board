(function (app) {
    app.pageProduct = {
        draw: function (productData) {
            let main = document.querySelector('main');

            let section = document.createElement('section');
            section.className = 'product';

            let block1 = document.createElement('div');
            block1.className = 'product__block1';
            let image = document.createElement('div');
            image.className = 'product__image';
            let imageElement = document.createElement("img");
            imageElement.className = "product__image-fit";
            imageElement.alt = "Фотка товара";
            imageElement.src  = 'Image/Site/noProductPictures.png';
            let buttonPhone = app.Create.buttonElement('product__phone', 'Показать телефон', goToPhone);

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
            let name = document.createElement('div');
            name.className = 'product__name';

            if (productData.image) {
                imageElement.src = productData.image;
            }
            title.innerText = productData.title;
            about.innerText = productData.about;
            name.innerText = "Продавец: " + productData.name;
            sum.innerText = productData.sum + " ₽";
            section.id = productData.product_id;

            image.append(imageElement);

            block1.append(image);
            block1.append(buttonPhone);

            cell__content.append(title);
            cell__content.append(about);

            cell.append(cell__content);
            cell.append(sum);

            block2.append(cell);
            block2.append(name);

            section.append(block1);
            section.append(block2);

            main.append(section);
        }
    }
})(AdsBoard);
