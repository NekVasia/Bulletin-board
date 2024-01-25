(function (app) {
    app.pageProductPhone = {
        draw: function (phoneData) {
            let main = document.querySelector('main');
            let block1 = document.querySelector('.product__block');
            let section = document.querySelector('section');

            let phone = document.createElement('div');
            phone.className = 'product__phone';
            phone.innerText = phoneData.phone;
            block1.append(phone);
            section.append(block1);
            main.append(section);
        }
    }
})(AdsBoard);