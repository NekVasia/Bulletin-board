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

    const userData = {
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
        body: JSON.stringify(userData),
    })

        .then(response => response.json())
        .then(response => {
            console.log(response);
        })
        // .catch(error => {
        //     console.log(error);
        // });
}

