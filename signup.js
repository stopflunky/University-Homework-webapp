

function checkName(event){
	const input = event.currentTarget;
	
	if((input.value.length > 0) && /^[a-zA-Z]+$/.test(input.value)){
		input.parentNode.classList.remove('errorj');
	} else{
		input.parentNode.classList.add('errorj');
		flg = 1;
	}

}


function checkSurname(event){

	const input = event.currentTarget; 

	if(input.value.length > 0){
		input.parentNode.classList.remove('errorj');
	} else{
		input.parentNode.classList.add('errorj');
		flg = 1;
	}
}



function onJsonEmail(json){

	if(!json.exists){
		document.querySelector('email').classList.remove('erroj');
	} else {

		document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
        flg = 1;
	}	
}



function onJsonUsername(json){
	console.log(json);
	if(!json.exists){
		document.querySelector('.username').classList.remove('erroj');
	} else {


		document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('errorj');
        flg = 1;
	}
}



function onResponse(response){
	if(!response.ok){
		return null;
	} else{
		console.log('json ricevuto');
		return response.json();
	}
}




function checkUsername(event){
	const input = event.currentTarget;

	if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)){
		input.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max 15";
		input.parentNode.classList.add('errorj');
		flg = 1;

	} else {

		fetch("check_username.php?q="+ encodeURIComponent(input.value)).then(onResponse).then(onJsonUsername);
	}

}


function checkEmail(event){

	const input = event.currentTarget; 

	if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(input.value).toLowerCase())){

		document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
        flg = 1;

	} else {
		fetch("check_email.php?q=" + encodeURIComponent(String(input.value).toLowerCase())).then(onResponse).then(onJsonEmail);
	}

}



function checkPassword(event){

	const input = event.currentTarget;

	if(input.value.lenght >= 8){

		document.querySelector('.password').classList.remove('erroj');
	} else {
		document.querySelector('.password').classList.add('.erroj');
		flg = 1;
	}
}


function checkConfirmPassword(event){
	const input = event.currentTarget;

	if(input.value === document.querySelector('.password input').value){
		document.querySelector('.confirm-password').classList.remove('erroj');
	} else {
		document.querySelector('.confirm-password').classList.add('erroj');
		flg = 1;
	}
}


function checkSubmit(event){

	if(flg == 1){
		event.preventDefault();
	}
}








let flg= 0;

const form = document.querySelector('form');
document.querySelector('#submit').addEventListener('submit', checkSubmit);
document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkSurname);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.confirm-password input').addEventListener('blur', checkConfirmPassword);


