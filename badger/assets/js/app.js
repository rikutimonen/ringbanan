// valitse modalien avausnapit
var open_modals = document.getElementsByClassName('open-modal');
// valitse modalien sulkemisnapit
var close_modals = document.getElementsByClassName('close-modal');
// avoinna oleva modal
var open_modal = null;
// valitse napit, joilla lis√§t√§√§n ostoskoriin
var cart_buttons = document.getElementsByClassName('koriin');
// XHR objekti sivun osien p√§ivityst√§ varten
var xhr = new XMLHttpRequest();
// m√§√§ritet√§√§n kotihakemisto
var SITE_ROOT = '/~rainekuo/web-perusteet/badger/';

// ladataan ostoskorin sis√§lt√∂
var showCart = function(){
	//xhr.open('GET', SITE_ROOT+'model/kori.html');
	xhr.open('GET', SITE_ROOT+'model/mShowCart.php');
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200 ) {
			// console.log(xhr.responseText);
			var kri = document.getElementById('kori');
			kri.innerHTML = '';
			kri.insertAdjacentHTML('afterbegin', xhr.responseText);
			document.getElementById('sCart').addEventListener('submit', updateCart);
		}
	}
	xhr.send();
}


// p√§ivit√§ ostoskorin sis√§lt√∂
var updateCart = function(evt){    //ILE SELOSTA TƒMƒ kun k‰ytˆss‰ POST!!!
	evt.preventDefault();
	var data = serialize(evt.target);
	
	//console.log(serialize(evt.target));
	//http://www.w3schools.com/ajax/ajax_xmlhttprequest_send.asp
	xhr.open('POST', SITE_ROOT+'model/mupdateCart.php');
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//xhr.setRequestHeader("Content-length", data.length);
	//xhr.setRequestHeader("Connection", "close");
   
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200 ) {
			 //kun call back aktivoitii piirr‰ korin lomake uusiksi
			//showCart();
			//ja p‰ivit‰ lkm pallukka (Lauri ;-))
			addToCart();
		}
	}
	xhr.send(data);  //Ajax POST l‰htee nyt headeriss‰
}

// lis√§√§ tuote ostoskoriin
var addToCart = function(id){
	if(!id){
	//halutaan vain p‰ivitt‰‰ tuotteiden lkm korissa (esim. sivun latautuessa)
	  xhr.open('GET', SITE_ROOT+'model/maddToCart.php');
	}else{
    //t‰nne tullaan kun tuote lis‰t‰‰n koriin
	 
	  xhr.open('GET', SITE_ROOT+'model/maddToCart.php?tID='+id);
	}
	xhr.onreadystatechange = function(){  //call-back aktivoituu kun vastaus valmis, muuten ohjelma etenee edelleen
		if(xhr.readyState == 4 && xhr.status == 200 ) {
			//console.log(xhr.responseText);
			//Kirjoitetaan palautettu teksti korin lkm pallukkaan
			document.getElementById('cart-num').innerHTML =xhr.responseText;
			showCart();
		}
	}
	xhr.send();
}

//avattaessa sivu, p‰ivit‰ tuotteiden lkm ja piirr‰ lomake tuotteille
//HUOM! T‰m‰ kutsu pit‰‰ olla addToCart() metodin m‰‰rittelyn j‰lkeen koska app.js
// ladtaa ja suoritetaan ylh‰‰lt‰ alasp‰in  (Hyv‰ Lauri)
//showCart();  Nyt addToCart() tekee t‰m‰n
addToCart();

// eventti koriin lis√§√§mist√§ varten
for (var i = 0; i < cart_buttons.length; i++){
	// console.log(cart_buttons[i]);
	cart_buttons[i].addEventListener('click', function(evt){
		evt.preventDefault();
		addToCart(this.getAttribute('data-tid'));
	});
}
//funktio emptyCart() l‰hett‰‰ ajax-kutsun memptyCart.php:lle
var emptyCart = function(){
	xhr.open('GET', SITE_ROOT+'model/memptyCart.php');
	xhr.onreadystatechange = function(){  //call-back aktivoituu kun vastaus valmis, muuten ohjelma etenee edelleen
		if(xhr.readyState == 4 && xhr.status == 200 ) {
			//?
			addToCart(); //P‰ivitet‰‰n lkm pallukka ja korin lomake
		}
	}
	xhr.send();
}
//Click event listener empty-cart elementille (painike tyhjenn‰)
document.getElementById('empty-cart').addEventListener('click', function(evt){
	evt.preventDefault();
	emptyCart();
});






// modaalien avaaminen
for(var i = 0; i < open_modals.length; i++){
	// napsautustapahtuman k√§sittely
	open_modals[i].addEventListener('click', function(evt){
		// est√§ linkin vakiotapahtuma
		evt.preventDefault();
		// sulje mahdollisesti avoinna oleva modal
		try {
			open_modal.style.opacity = 0;
			open_modal.style.display = 'none';
		} catch (e) {}
		// console.log(this.getAttribute('data-target'));
		var modal = this.getAttribute('data-target');
		var element = document.getElementById(modal);
		element.style.opacity = 0;
		element.style.display = 'block';
		fadeIn(element);
		open_modal = element;
	});
}

var fadeIn = function(element){
	var op = element.style.opacity;
	element.style.opacity = Number(op) + 0.05;
	if(op < 1) {
		window.requestAnimationFrame(function(){
			fadeIn(element);
		});
	} else {
		element.style.opacity = 1;
	}
}

// modaalien sulkeminen
for(var i = 0; i < close_modals.length; i++){
	close_modals[i].addEventListener('click', function(evt){
		// est√§ linkin vakiotapahtuma
		evt.preventDefault();
		var element = this.parentNode;
		fadeOut(element);
	});
}

var fadeOut = function(element){
	var op = element.style.opacity;
	element.style.opacity = Number(op) - 0.05;
	if(op > 0) {
		window.requestAnimationFrame(function(){
			fadeOut(element);
		});
	} else {
		element.style.opacity = 0;
		element.style.display = 'none';
	}
}