let AdsBoard = {};

function getCookie(name) { //Функция проверки куки
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

document.addEventListener("DOMContentLoaded", function () {
    if (getCookie("PHPSESSID")) {
        getProduct();
    } else {
        AdsBoard.pageHeader.draw();
        AdsBoard.pageLogin.draw();
    }
})

const registration = () => { //Функция для регистрации
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const name = document.getElementById('name').value;
    const password = document.getElementById('password').value;
    const password_repeat = document.getElementById('password_repeat').value;

    if (password !== password_repeat) { //Проверка на соответствие паролей
        alert("Пароли не совпадают");
        return;
    }

    const userRegistration = {
        email: email,
        phone: phone,
        name: name,
        password: password
    };

    fetch("../src/userRegistration.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(userRegistration),
    })
        .then(response => response.json())
        .then(result => {
            if(result.code) {
                login();
            } else {
                alert(result.message);
            }
        })
        .catch(error => {
            console.log(error);
        });
}

const login = () => { //Функция для авторизации
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    fetch(`../src/userLogin.php?email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(result => {
            if(result.code) {
                getProduct();
            } else {
                alert(result.message);
            }
        })
        .catch(error => {
            console.log(error);
        });
}



const getProduct = () => {
    fetch(`../src/productShow.php`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(productData => {
            if (document.querySelector(".main")) {
                document.querySelector(".main").innerHTML = "";
            }
            productData.forEach((item) => AdsBoard.pageProduct.draw(item));
            if (document.querySelector(".header")) {
                document.querySelector(".header").innerHTML = "";
            }
            AdsBoard.pageHeaderAfterLogin.draw();
        })
        .catch(error => {
            alert("Ошибка");
            console.error("Ошибка:", error);
        });
}

const getMyProduct = () => {
    fetch(`../src/productShowMy.php`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(productDataMy => {
            if(productDataMy.code) {
                document.querySelector('main').innerHTML = "";
                AdsBoard.pageMyProductCreate.draw();
                AdsBoard.pageMyProductEmpty.draw();
            } else {
                document.querySelector("main").innerHTML = "";
                AdsBoard.pageMyProductCreate.draw();
                productDataMy.forEach((item) => AdsBoard.pageMyProduct.draw(item));
            }
        })
        .catch(error => {
            alert("Ошибка");
            console.error("Ошибка:", error);
        });
}

function goToCreateProduct() {
    document.querySelector("main").innerHTML = "";
    AdsBoard.pageCreateProduct.draw();
}

const createProduct = () => { //Функция для добавления нового продукта
    const title = document.getElementById('title').value;
    const about = document.getElementById('about').value;
    const sum = document.getElementById('sum').value;
    const image = document.querySelector('#image').files[0];

    const formData = new FormData();
    formData.append('title', title);
    formData.append('about', about);
    formData.append('sum', sum);
    formData.append('image', image);

    fetch(`../src/productCreate.php`, {
        method: "POST",
        body: formData,
    })
        .then(response => response.json())
        .then(result => {
            location.reload();
        })
        .catch(error => {
            console.log(error);
        });
}

const goToChangeProduct = (event) => {
    const section = event.target.closest('.product');
    const productId = section.id;
    const title = section.querySelector('.product__title').textContent;
    const about = section.querySelector('.product__about').textContent;
    const sum = section.querySelector('.product__sum').textContent.slice(0,-2);
    const image = section.querySelector('.product__image-fit').src;

    const previewData = {
        productId: productId,
        title: title,
        about: about,
        sum: sum,
        image: image
    };

    document.querySelector("main").innerHTML = "";
    AdsBoard.pageChangeProduct.draw(previewData);
}

const changeProduct = () => { //Функция для редактирования товара
    const productId = document.querySelector('.product__create').id;
    const title = document.getElementById('title').value;
    const about = document.getElementById('about').value;
    const sum = document.getElementById('sum').value;
    const image = document.querySelector('#image').files[0];

    const formData = new FormData();
    formData.append('productId', productId);
    formData.append('title', title);
    formData.append('about', about);
    formData.append('sum', sum);
    formData.append('image', image);

    fetch(`../src/productChange.php`, {
        method: "POST",
        body: formData,
    })
        .then(response => response.json())
        .then(result => {
            console.log(result);
            location.reload();
        })
        .catch(error => {
            console.log(error);
        });
}

const deleteProduct = (event) => {
    let section = event.target.closest('.product');
    let productId = section.id;

    fetch(`../src/productDelete.php?productId=${encodeURIComponent(productId)}`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(result => {
            if(result.code) {
                location.reload();
            }
        })
}

const goToPhone = (event) =>{
    const section = event.target.closest('.product');
    const productId = section.id;

    fetch(`../src/productPhone.php?productId=${encodeURIComponent(productId)}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(phoneData => {
            phoneData.forEach((item) => AdsBoard.pageProductPhone.draw(item));
        })
        .catch(error => {
            console.error("Ошибка:", error);
        });
}
