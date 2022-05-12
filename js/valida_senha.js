function validar() {
    var senha = f_cad.senha.value;
    var repetesenha = f_cad.repetesenha.value;

    if (senha == "" || senha.length <= 7) {
        alert('Preencha uma Senha com no mínimo 8 Caracteres!');
        f_cad.senha.focus();
        return false;
    }

    if (senha != repetesenha) {
        alert('As Senhas digitadas não Conferem!');
        f_cad.senha.focus();
        return false;
    }
}