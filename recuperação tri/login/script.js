// JavaScript Document

const inputs = document.querySelectorAll('.input');
const button = document.querySelector('.login_button');

const takeValue = () => {
const [nome, usuario, senha] = inputs;
	if(nome.value && usuario.value && senha.value != "") {
	var link = 'function/ctrl/ctrl_usuario.php?acao=salvar&id=0&nome='+nome.value+'&usuario='+usuario.value+'&senha='+senha.value;
	var a = document.getElementById("link");
	a.setAttribute("href" , link);}
}

const handleFocus = ({ target }) => {
	const span = target.previousElementSibling;
	span.classList.add('span-active');
}

const handleFocusout = ({ target }) => {
	
	if (target.value == ''){
	
	const span = target.previousElementSibling;
	span.classList.remove('span-active');
	}	
}

const handleChange = () => {
	const [nome, usuario, senha] = inputs;
	
	if(nome.value && usuario.value && senha.value != "") {	
		button.removeAttribute('disabled');
	} else {
		button.setAttribute('disabled', '');
	}
}

inputs.forEach((input) => input.addEventListener('focus', handleFocus));
inputs.forEach((input) => input.addEventListener('focusout', handleFocusout));
inputs.forEach((input) => input.addEventListener('input', handleChange));
inputs.forEach((input) => input.addEventListener('input', takeValue));