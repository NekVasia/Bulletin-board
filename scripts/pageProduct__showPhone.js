(function (app) {
    app.pageProduct__showPhone = {
        draw: function (productData) {
            let phone = document.createElement('div');
            phone.className = 'product__phone';

            phone.innerText = "productData.phone";

            document.body.append(phone);
        }
    }
})(AdsBoard);
