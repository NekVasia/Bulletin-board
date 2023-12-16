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
            let cell = document.createElement('div');
            cell.className = 'product__cell';
            let title = document.createElement('div');
            title.className = 'product__title';
            title.className = 'product__about';
            let sum = document.createElement('div');
            sum.className = 'product__sum';
            let name = document.createElement('div');
            name.className = 'product__name';

            block1.append(image);
            block1.append(phone);

            cell.append(title);
            cell.append(sum);

            block2.append(cell);
            block2.append(name);

            section.append(block1);
            section.append(block2);

            document.body.append(section);
        }
    }
})(AdsBoard);
