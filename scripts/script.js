let AdsBoard = {};

document.addEventListener("DOMContentLoaded", function () {
    AdsBoard.pageHeader.draw();
    AdsBoard.pageLogin.draw();
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
            alert("Вы успешно зарегистрировались");
            console.log(result);
        })
        .catch(error => {
            //alert("Ошибка регистрации");
            console.log(error);
        });
}

const login = () => { //Функция для регистрации
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    fetch(`../src/user.php?email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`,{
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })

        .then(response => response.json())
        .then(result => {
            //alert("Вы успешно вошли");
            console.log(result);
            getProduct();
            // document.querySelector(".main").remove();
            // AdsBoard.pageProduct.draw();
            // document.querySelector(".header").remove();
            // AdsBoard.pageHeaderAfterLogin.draw();
        })
        .catch(error => {
            alert("Ошибка авторизации");
            console.log(error);
        });
}

function getProduct() {
    fetch('../src/product.php', {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(productData => {
            console.log(productData);

            document.querySelector(".main").remove();
            productData.forEach((item) => AdsBoard.pageProduct.draw(item));

            document.querySelector(".header").remove();
            AdsBoard.pageHeaderAfterLogin.draw();
        })
        .catch(error => {
            console.error("Ошибка:", error);
        });
}
