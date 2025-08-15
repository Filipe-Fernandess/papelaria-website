const confirm_password = document.getElementById("confirm_password");
const password = document.getElementById("password");
const validacao = document.getElementById("msg-senha");

function validatePasswords() {
    if (confirm_password.value === "" && password.value === "") {
        confirm_password.classList.remove("input-error", "input-success");
        password.classList.remove("input-error", "input-success");
        confirm_password.setCustomValidity("");
        validacao.textContent = "";
        return;
    } if (confirm_password.value !== password.value) {
        confirm_password.classList.add("input-error");
        password.classList.add("input-error");
        confirm_password.classList.remove("input-success");
        password.classList.remove("input-success");
        confirm_password.setCustomValidity('As senhas não coincidem');
        validacao.textContent = "As senhas precisam ser iguais!";
        validacao.style.color = "red";
    } else {
        confirm_password.classList.remove("input-error");
        password.classList.remove("input-error");
        confirm_password.classList.add("input-success");
        password.classList.add("input-success");
        confirm_password.setCustomValidity("");
        validacao.textContent = "Senhas corretas!";
        validacao.style.color = "green";
    }
}

confirm_password.addEventListener("blur", validatePasswords);
password.addEventListener("blur", validatePasswords);
confirm_password.addEventListener("input", validatePasswords);
password.addEventListener("input", validatePasswords);
