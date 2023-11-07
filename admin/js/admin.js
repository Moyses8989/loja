function validateLogin() {
    let user = document.getElementById("username")
    let pass = document.getElementById("password")

    if (user.value == "") {
        emptyInputAlert(user)
        return false
    } else if (pass.value == '') {
        emptyInputAlert(pass)
        return false
    } else {
        document.formLogin.submit()
    }
}

function validateFormBook() {
    let name = document.getElementById("name")
    let price = document.getElementById("price")

    if (name.value == "") {
        emptyInputAlert(name)
        return false
    } else if (price.value == "") {
        emptyInputAlert(price)
        return false
    } else {
       document.book.submit()
    }
}

function emptyInputAlert(campo) {
    alert("Campo " + campo.name + " está vazio")
    campo.focus()
}