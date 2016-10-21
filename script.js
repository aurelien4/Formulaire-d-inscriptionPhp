//récuperation du formulaire
var form = document.getElementById('formula');
//création d'un EventListener
form.addEventListener('keyup', disable);

function disable(){
	var inputPass = document.getElementsByClassName('pass');
	var alert = document.getElementById('alertpass');	
		if(inputPass[0].value != inputPass[1].value){
			alert.innerText = 'pass non valide';
			alert.style.color = 'red';
		}else{
			
			alert.innerText = 'Valide';
			alert.style.color = 'green';
		}
		//je débloque le bouton en cas d'utilisation du formulaire et bloque coté html pour les champs obligatoire
	var button = document.getElementById('button');
	var input = document.getElementsByClassName('input');
		if(input.all != ""){
			button.disabled = false;
		}		
}

