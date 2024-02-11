(function (app) {
    app.pageProductPhone = {
        draw: function (phoneData) {
            let section = document.getElementById(phoneData.id);
            let block = section.querySelector('.product__block1');
            let button = section.querySelector('.product__phone');
            button.remove();

            let phone = document.createElement('div');
            phone.className = 'product__phone';
            phone.innerText = phoneData.phone;

            block.append(phone);
        }
    }
})(AdsBoard);