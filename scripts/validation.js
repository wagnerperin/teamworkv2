const validateRegisterForm = () => {
    if(document.getElementById('passwordInput').value !== document.getElementById('passwordRepeatedInput').value){
        alert('Senhas não conferem');
    }
};