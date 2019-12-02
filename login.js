$(document).ready(function(){
    $(function(){
        $(".btn-primary").click(function(){
            const username = document.getElementById('exampleInputEmail1').value;
            const password = document.getElementById('exampleInputPassword1').value;
            if (username !== '' && password !== '') {
                $.ajax({
                    type: 'POST',
                    url:'http://localhost:8080/app/api/login.php',
                    data: {username: username, pwd: password},
                    complete: function (response) {
                        const res = response.responseText.split(/\r?\n/);
                        const result = res[res.length - 1];
                        if (result === 'error') {
                            alert('Wrong password!');
                        } else {
                            console.log('logged in');
                            window.location.href = "index.php"
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