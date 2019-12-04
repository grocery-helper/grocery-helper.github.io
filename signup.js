$(document).ready(function(){
    $(function(){
        $(".btn-primary").click(function(){
            const username = document.getElementById('exampleInputEmail1').value;
            const password = document.getElementById('exampleInputPassword1').value;
            if (username !== '' && password !== '') {
                $.ajax({
                    type: 'POST',
                    url:'http://localhost:8080/grocery-helper.github.io/create_user.php',
                    data: {username: username, pwd: password},
                    complete: function (response) {
                        const res = response.responseText.split(/\r?\n/);
                        const result = res[res.length - 1];
                        if (result === 'User created successfully') {
                            console.log('user created', result);
                            window.location.href = "loginPage.php";
                        } else {
                            alert('Error, user exists already!');
                        }
                    },
                    error: function () {
                        alert('wrong password!');
                    }
                });
            } else {
                alert("You must write something!");
            }
        })
    })
})