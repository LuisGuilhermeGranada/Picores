function validacao() {
    var input = document.getElementById("matricula");
    var aviso = document.getElementById("aviso");

    var valorinput = input.value.trim();
    var tamanho = valorinput.length;

    if ((tamanho >= 8 && tamanho <= 11) || tamanho === 0) {
        aviso.textContent = "Precisa ser um número de 7 ou 12 dígitos";
    } else {
        aviso.textContent = "";
    }
}
