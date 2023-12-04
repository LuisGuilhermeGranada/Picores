// Função de validação chamada quando o valor do campo de matrícula é alterado
function validacao() {
    // Obtém o elemento de entrada de matrícula e o elemento de aviso
    var input = document.getElementById("matricula");
    var aviso = document.getElementById("aviso");
    
    // Obtém o valor do campo de entrada de matrícula e remove espaços em branco no início e no final
    var valorinput = input.value.trim();
    // Calcula o tamanho do valor da matrícula
    var tamanho = valorinput.length;
    
    // Verifica se o tamanho da matrícula está entre 8 e 11 caracteres, ou é 0 (campo vazio)
    if ((tamanho >= 8 && tamanho <= 11) || tamanho === 0) {
        // Define o conteúdo do elemento de aviso para indicar os requisitos da matrícula
        aviso.textContent = "Precisa ser um número de 7 ou 12 dígitos";
    } else {
        // Se o tamanho não estiver dentro dos limites, limpa o conteúdo do elemento de aviso
        aviso.textContent = "";
    }
}