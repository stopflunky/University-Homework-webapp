

function onClickEventArticles(event){

	event.preventDefault();

	const title = event.currentTarget.textContent;
	window.location.href = "article.php?q="+encodeURIComponent(title); 
}



function onResponse(response){

		if(!response.ok){
		return null;
	} else{
		console.log('json ricevuto');
		return response.json();
	}
}


function cambiaImmaggineProfilo(event){

	const image = event.currentTarget.querySelector('img').src;
	fetch('changeImg.php?q='+ encodeURIComponent(image)); 
	document.querySelector('#profile-img').src = image;

}


function onJsonImages(json){


	const divImg = document.querySelector('#selectProfileImage');

	const container = document.createElement('div');
	container.classList.add('divImages');


	for (let i = 0; i < json.length; i++) {
		div = document.createElement('div');
		div.classList.add('divImage');
		img = document.createElement('img');
		img.src= json[i];
		div.appendChild(img);
		container.appendChild(div);


		div.addEventListener('click', cambiaImmaggineProfilo);
	}

	divImg.appendChild(container);
	flg2 = 1;
}



function elimina(event){

	const article = event.currentTarget.parentNode.querySelector('a');
	const div = event.currentTarget.parentNode;
	
	fetch("elimina.php?q="+encodeURIComponent(article.textContent));
	div.remove();
}



function onJsonArticle(json){
	

	mainDiv = document.querySelector('#articoliProfilo');
		
	for (let i = 0; i < json['length']; i++) {
		
		let items = json[i];

		let div = document.createElement('div');
		let a = document.createElement('a');
		a.href ="article.php";
		a.textContent = items['titolo'];
		div.classList.add('info');
		div.appendChild(a);
		btnElimina = document.createElement('button');
		btnElimina.textContent = "Elimina";
		btnElimina.addEventListener('click', elimina);
		a.addEventListener('click', onClickEventArticles);
		div.appendChild(a);
		div.appendChild(btnElimina);

		mainDiv.appendChild(div);
	}
	
	
	return true;
	
}




async function showFiles(event){
	
	event.preventDefault();


		
	div = document.querySelector('#articoliProfilo');
	if (flg === 0){

		const tmp = await fetch("giveMeArticlesByUser.php").then(onResponse).then(onJsonArticle);
		div.classList.remove("hidden");
		document.querySelector('#arrow').classList.add('hidden');
		flg = 1;

	}else if(flg === 1){
		
		document.querySelector('#arrow').classList.remove('hidden');
		div.innerHTML = '';
		flg = 0;

	}

}




function onJsonData(json){

	
	const div = document.querySelector('#personal_information');

	
	if(json['picprofile'] === null){
		document.querySelector('#profile-img').src = "logo.jpg";
	} else{
		document.querySelector('#profile-img').src = json['picprofile'];
	}



	divNome = document.querySelector('#divNome');
	divCognome = document.querySelector('#divCognome');
	divUsername = document.querySelector('#divUsername');
	divEmail = document.querySelector('#divEmail');
	divBtnArticoli = document.querySelector('#divBtnArticoli');


	spanNome = document.querySelector('#spanNome');
	pNome = document.createElement('span');
	pNome.textContent = json['name'];

	
	divNome.appendChild(pNome);


	spanCognome = document.querySelector('#spanCognome');
	pCognome = document.createElement('span');
	pCognome.textContent = json['surname'];

	divCognome.appendChild(pCognome);




	spanUsername = document.querySelector('#spanUsername');
	pUsername = document.createElement('span');
	pUsername.textContent = json['username'];	

	divUsername.appendChild(pUsername);



	spanEmail = document.querySelector('#spanEmail');
	pEmail = document.createElement('span');
	pEmail.textContent = json['email'];

	divEmail.appendChild(pEmail);



	btnArticoli = document.querySelector('#btn');
	btnArticoli.addEventListener('click', showFiles);


}




function compariAMeImmagine(event){
	
	
	event.preventDefault();

	const form = document.querySelector('#formForSelectingImage');

	if (flg2 === 1){
		
		document.querySelector('.divImages').remove();
		flg2 = 0;
	}

	fetch('returnMeImages.php?q='+encodeURIComponent(document.querySelector('#search').value)).then(onResponse).then(onJsonImages);


	
	form.reset();
}



function selectImage(event){
	
	

	const form = document.querySelector('#formForSelectingImage');
	const div = document.querySelector('#selectProfileImage'); 
	const button = document.querySelector('#formForSelectingImage button');

	
	if(imgSelezionata === 0){

		div.classList.remove('hidden');
		
		button.addEventListener('click', compariAMeImmagine);
		imgSelezionata = 1;

	} else if(imgSelezionata === 1){
		
		if (flg2 === 1) {
			document.querySelector('.divImages').remove();
			flg2 = 0;
		}
		div.classList.add('hidden');
		imgSelezionata = 0;
	}

	
}









let flg = 0;
let imgSelezionata = 0;
let flg2 = 0;
fetch("giveMeDataProfile.php").then(onResponse).then(onJsonData);


const image = document.querySelector("#profile-img");

image.addEventListener('click', selectImage);