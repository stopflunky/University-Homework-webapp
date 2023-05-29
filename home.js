
function onClickEvent(event){
	
	event.preventDefault();

	const title = event.currentTarget.textContent;
	window.location.href = "article.php?q="+encodeURIComponent(title); 

}




function onJsonData(json){
	

	
	for(let i = 0; i < json['length']; i++){
		
		let items = json[i];

		let div = document.createElement('div');
		let a = document.createElement('a');
		a.href ="article.php";
		a.textContent = items['titolo'];
		div.appendChild(a);
		content.appendChild(div);
		a.addEventListener('click', onClickEvent);

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



fetch("articoli.php").then(onResponse).then(onJsonData);


const content = document.querySelector('.content');
