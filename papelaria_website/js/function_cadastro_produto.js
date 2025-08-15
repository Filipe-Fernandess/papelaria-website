const descricao = document.getElementById("descricao");
const contador = document.getElementById("contador-descricao");

descricao.addEventListener('input', function() {
    contador.textContent = `${descricao.value.length}/500`;
});