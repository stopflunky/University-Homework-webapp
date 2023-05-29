
header = document.querySelector('#header');
form = document.querySelector('form');

form.remove();



const div = document.createElement('div');
div.classList.add('options');



const articoli = document.createElement('a');
const div_articoli = document.createElement('div');
articoli.href = "raccolta.php";
articoli.textContent = "Articoli";
articoli.classList.add('linkLoggato');



const crea = document.createElement('a');
const div_crea= document.createElement('div');
crea.href = "create.php";
crea.textContent = "Crea";
crea.classList.add('linkLoggato');



const profilo = document.createElement('a');
const div_profilo= document.createElement('div');
profilo.href="profilo.php";
profilo.textContent = "Profilo";
profilo.classList.add('linkLoggato');



const logout = document.createElement('a');
const div_logout = document.createElement('div');
logout.href="logout.php";
logout.textContent = "Logout";
logout.classList.add('linkLoggato');



div_articoli.appendChild(articoli);
div_crea.appendChild(crea);
div_profilo.appendChild(profilo);
div_logout.appendChild(logout);




div.appendChild(div_articoli);
div.appendChild(div_crea);
div.appendChild(div_profilo);
div.appendChild(div_logout);

header.appendChild(div);





