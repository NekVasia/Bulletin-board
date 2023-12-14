(function (app) {
    app.pageProduct = {
        draw: function () {
            let section = document.createElement('section');
            section.className = 'product';

            let block1 = document.createElement('div');
            block1.className = 'product__block';
            let image = document.createElement('div');
            image.className = 'product__image';
            let phone = document.createElement('div');
            phone.className = 'product__phone';

            let block2 = document.createElement('div');
            block2.className = 'product__block';
            let title = document.createElement('div');
            title.className = 'product__title';
            let about = document.createElement('div');
            about.className = 'product__about';
            let name = document.createElement('div');
            name.className = 'product__name';

            let block3 = document.createElement('div');
            block3.className = 'product__block';
            let sum = document.createElement('div');
            sum.className = 'product__sum';

            block1.append(image);
            block1.append(phone);

            block2.append(title);
            block2.append(about);
            block2.append(name);

            block3.append(sum);

            section.append(block1);
            section.append(block2);
            section.append(block3);

            document.body.appendChild(section);
        }
    }
})(AdsBoard);
