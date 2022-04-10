function validar(){
var senha1 = getElementById('senha');
var senha2 = getElementById('confere?_senha');
    if (senha1 == '' || senha1.lenght <= 5);{
        alert('Preencha uma senha com no mínimo 6 caracteres');
        getElementById('sewnha').focus();
        return false;
    }

}