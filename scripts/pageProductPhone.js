(function (app) {
    app.pageProductPhone = {
        draw: function (phoneData) {
            let main = document.querySelector('main');
            let section = document.querySelector('section');
            let block = document.querySelector('.product__block1');

            let phone = document.createElement('div');
            phone.className = 'product__phone';
            phone.innerText = phoneData.phone;

            block.append(phone);
            section.append(block);
            main.append(section);
        }
    }
})(AdsBoard);