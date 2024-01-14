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

//Регистрация пользователя
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

    fetch("../src/user.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(userRegistration),
    })

        .then(response => response.json())
        .then(result => {
            console.log(result);
        })
        .catch(error => {
            console.log(error);
        });
}

const login = () => { //Функция для регистрации
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    fetch(`../src/user.php?email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })

        .then(response => response.json())
        .then(result => {
            console.log(result);
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
    fetch('../src/product.php', {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(productData => {
            console.log(productData);
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

const getMyProduct = (user_id) => {
    fetch('../src/product.php?user_id=${user_id}', {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(productData => {
            console.log(productData);
            productData.forEach((item) => AdsBoard.pageMyProduct.draw(item));
        })
        .catch(error => {
            alert("Ошибка");
            console.error("Ошибка:", error);
        });
}


// const showPhone = () => {
//     document.querySelector(".product__phone").innerHTML ="";
//     productData.forEach((item) => AdsBoard.pageProduct.draw(item));
// }

const createProduct = () => { //Функция для добавления нового продукта
    const title = document.getElementById('title').value;
    const about = document.getElementById('about').value;
    const sum = document.getElementById('sum').value;
    //const image = document.getElementById('image').value;

    const dataCreateProduct = {
        title: title,
        about: about,
        sum: sum
        //image: image
    };

    fetch("../src/product.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(dataCreateProduct),
    })

        .then(response => response.json())
        .then(result => {
            alert("Вы успешно добавили продукт");
            console.log(result);
        })
        .catch(error => {
            console.log(error);
        });
}