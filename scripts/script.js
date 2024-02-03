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
    fetch(`../src/product.php`, {
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


const getMyProduct = () => {
    fetch(`../src/productMy.php`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(productDataMy => {
            if(productDataMy.code) {
                alert(productDataMy.message);
                // Надо сделать <div> с надписью;
            } else {
                console.log(productDataMy);
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


// const showPhone = () => {
//     document.querySelector(".product__phone").innerHTML ="";
//     productData.forEach((item) => AdsBoard.pageProduct.draw(item));
// }

const createProduct = () => { //Функция для добавления нового продукта
    const title = document.getElementById('title').value;
    const about = document.getElementById('about').value;
    const sum = document.getElementById('sum').value;
    const image = document.querySelector("#image").files[0];

    const dataCreateProduct = {
        title: title,
        about: about,
        sum: sum,
        image: image
    };

    fetch(`../src/product.php`, {
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

function upload() {
    let data = new FormData();
    data.append("image", document.querySelector("#image").files[0]);

    fetch(`../src/upload.php`, {
        method: "POST",
        body: data,
    }).then(r => {
        console.log(data);
    })
}


const deleteProduct = () => {
    fetch(`../src/product.php`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(result => {
            console.log(result);
        })
        .catch(error => {
            alert("Ошибка");
            console.error("Ошибка:", error);
        });
}




function goToPhone(){
    // document.querySelector(".product__phone").remove();

    //Для удаления именно той секции
    // let buttons = document.querySelectorAll('.product__phone');
    // buttons.forEach(function(button) {
    //     button.addEventListener('click', function() {
    //         let section = button.closest('section');
    //         button.id = section.id;
    //         button.remove();
    //     });
    // });

    let button = document.querySelector('.product__phone');
    let section = button.closest('section');
    let productId = section.id;

    console.log(productId);

    fetch(`../src/phone.php?productId=${encodeURIComponent(productId)}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(phoneData => {
            console.log(phoneData);
            phoneData.forEach((item) => AdsBoard.pageProductPhone.draw(item));
        })
        .catch(error => {
            //alert("Ошибка");
            console.error("Ошибка:", error);
        });
}


