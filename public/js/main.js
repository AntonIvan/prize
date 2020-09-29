$(document).ready(function(){
    $('.collapsible').collapsible();

    $('#register_button').click( function () {
       name = $('#reg_name').val();
       pass = $('#reg_pass').val();
        if(name === "" || pass === "") {
            alert("Заполните все поля");
            return false;
        }
        $.ajax({
            type: 'POST',
            cache: false,
            data: { name: name, pass : pass},
            url: '/api/register',
            success: function (data) {
                alert("Успешная регистрация");
                location.reload();
            },
            error: function (data) {
                alert("Произошла ошибка");
            }
        });
    });

    $('#signin_button').click( function () {
        name = $('#sign_name').val();
        pass = $('#pass').val();
        if(name === "" || pass === "") {
            alert("Заполните все поля");
            return false;
        }
        $.ajax({
            type: 'POST',
            cache: false,
            data: { name: name, pass : pass},
            url: '/api/auth',
            success: function (data) {
                alert("Успешная авторизация");
                location.reload();
            },
            error: function (data) {
                alert("Произошла ошибка");
            }
        });
    });

    $('#logout').click( function () {
        $.ajax({
            type: 'POST',
            cache: false,
            url: '/api/logout',
            success: function (data) {
                location.reload();
            }
        });
    });

    $('#prize_button').click( function () {
        id = $('#user_id').val();
        $.ajax({
            type: 'POST',
            cache: false,
            data: {id: id},
            url: '/api/prize',
            success: function (data) {
                alert("Получен приз");
                location.reload();
            },
            error: function (data) {
                alert("Произошла ошибка");
            }
        });
    });

    $('#refuse_prize').click( function () {
        id = $('#user_id').val();
        $.ajax({
            type: 'POST',
            cache: false,
            data: {id: id},
            url: '/api/deleteprize',
            success: function (data) {
                alert("Вы отказались от приза");
                location.reload();
            },
            error: function (data) {
                alert("Произошла ошибка");
            }
        });
    });

    $('#get_prize').click( function () {
        id = $('#user_id').val();
        $.ajax({
            type: 'POST',
            cache: false,
            data: {id: id},
            url: '/api/getprize',
            success: function (data) {
                alert("Вы получили приз");
                location.reload();
            },
            error: function (data) {
                alert("Произошла ошибка");
            }
        });
    });

    $('#transfer_points').click( function () {
        transfer('points');
    });

    $('#transfer_money').click( function () {
        transfer('money');
    });

    $('#transfer_things').click( function () {
        transfer('things');
    });


    function transfer(transfer) {
        id = $('#user_id').val();
        $.ajax({
            type: 'POST',
            cache: false,
            data: {id: id, transfer: transfer},
            url: '/api/transfer',
            success: function (data) {
                alert(data);
                location.reload();
            },
            error: function (data) {
                alert("Произошла ошибка");
            }
        });
    }

    $('#transfer_money_points').click( function () {
        id = $('#user_id').val();
        $.ajax({
            type: 'POST',
            cache: false,
            data: {id: id},
            url: '/api/transfermoney',
            success: function (data) {
                alert(data);
                location.reload();
            },
            error: function (data) {
                alert("Произошла ошибка");
            }
        });
    });
});
