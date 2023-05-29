

function onJsonResponse(json){
	console.log(json);
}



function onResponse(response){
	console.log('risponsa avvenuta');
	return response.json();
}	




function inviaDati(event){
	event.preventDefault();

	const title = document.querySelector('#articleTitle');
	const content = document.querySelector('#articleContent');

	const formData = new FormData();
	formData.append("titolo", title.value);
	formData.append("contenuto", content.value);

	console.log("aaaaaaaaaaa");
	fetch('insertInTo.php', {
		method: "POST",
		body: formData
	})

	document.querySelector('#formArticle').reset();

}






const btn = document.querySelector('#send');


btn.addEventListener('click', inviaDati);