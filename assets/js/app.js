  // pageready
(function(funcName, baseObj) {
    // The public function name defaults to window.docReady
    // but you can pass in your own object and own function name and those will be used
    // if you want to put them in a different namespace
    funcName = funcName || "docReady";
    baseObj = baseObj || window;
    var readyList = [];
    var readyFired = false;
    var readyEventHandlersInstalled = false;

    // call this when the document is ready
    // this function protects itself against being called more than once
    function ready() {
        if (!readyFired) {
            // this must be set to true before we start calling callbacks
            readyFired = true;
            for (var i = 0; i < readyList.length; i++) {
                // if a callback here happens to add new ready handlers,
                // the docReady() function will see that it already fired
                // and will schedule the callback to run right after
                // this event loop finishes so all handlers will still execute
                // in order and no new ones will be added to the readyList
                // while we are processing the list
                readyList[i].fn.call(window, readyList[i].ctx);
            }
            // allow any closures held by these functions to free
            readyList = [];
        }
    }

    function readyStateChange() {
        if ( document.readyState === "complete" ) {
            ready();
        }
    }

    // This is the one public interface
    // docReady(fn, context);
    // the context argument is optional - if present, it will be passed
    // as an argument to the callback
    baseObj[funcName] = function(callback, context) {
        // if ready has already fired, then just schedule the callback
        // to fire asynchronously, but right away
        if (readyFired) {
            setTimeout(function() {callback(context);}, 1);
            return;
        } else {
            // add the function and context to the list
            readyList.push({fn: callback, ctx: context});
        }
        // if document already ready to go, schedule the ready function to run
        if (document.readyState === "complete") {
            setTimeout(ready, 1);
        } else if (!readyEventHandlersInstalled) {
            // otherwise if we don't have event handlers installed, install them
            if (document.addEventListener) {
                // first choice is DOMContentLoaded event
                document.addEventListener("DOMContentLoaded", ready, false);
                // backup is window load event
                window.addEventListener("load", ready, false);
            } else {
                // must be IE
                document.attachEvent("onreadystatechange", readyStateChange);
                window.attachEvent("onload", ready);
            }
            readyEventHandlersInstalled = true;
        }
    }
})("docReady", window);

  ///////////////////////////////////////
 //// kaikki vaikka docreadyn sisään////
///////////////////////////////////////
docReady(function() {

//fadeout/in
var open_modals = document.getElementsByClassName('open-modal');
var close_modals = document.getElementsByClassName('close-modal');
var open_modal = null;

console.log("open_modals määrä on " + open_modals.length);
console.log("close_modals määrä on " + close_modals.length);
for(var i = 0; i < open_modals.length; i++){
	// napsautustapahtuman käsittely
	open_modals[i].addEventListener('click', function(evt){
		// estä linkin vakiotapahtuma
		evt.preventDefault();
		// sulje mahdollisesti avoinna oleva modal
		var modal = this.getAttribute('data-target');
		var element = document.getElementById(modal);
		//if lause ettei divi välky kun spammii nappulaa
		if (element.style.opacity == 0){
		try {
			open_modal.style.opacity = 0;
			open_modal.style.display = 'none';
		} catch (e) {}
		// console.log(this.getAttribute('data-target'));
		element.style.opacity = 0;
		element.style.display = 'block';
		FadeIn(element);
		open_modal = element;
		}
	});
}
var FadeIn = function(element){
	var op = element.style.opacity;
	element.style.opacity = Number(op) + 0.05;
	if(op < 1) {
		window.requestAnimationFrame(function(){
			FadeIn(element);
		});
	} else {
		element.style.opacity = 1;
	}
}
//5. ******** Modaalien, ponnahdusikkunoiden sulkeminen
//5.a) ****** Sivua ladattaessa tapahtumankäsittelijät
for(var i = 0; i < close_modals.length; i++){
	close_modals[i].addEventListener('click', function(evt){
		// estä linkin vakiotapahtuma
		evt.preventDefault();
		var element = this.parentNode;
		fadeOut(element);
	});
}

//5.b) funktio ikkunan sulkemiseen feidatusti
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


});

var toggle_hidden = document.getElementsByClassName('toggle-hidden');
for (var i = 0; i < toggle_hidden.length; i++) {
   toggle_hidden[i].addEventListener('click', function(evt) {
      evt.preventDefault();
      var target = this.getAttribute('data-target');
      var element = document.getElementById(target);

      if (element.style.display == 'none') {
         element.style.display = 'block';
      } else {
         element.style.display = 'none';
      }
   });
}

var delete_forms = document.getElementsByClassName("delete-form");
function confirmDelete() {
  if (confirm("Oletko varma että haluat poistaa valitun?")) {
     for (var i = 0; i < delete_forms.length; i++) {
       delete_forms[i].submit();
     }
  }
  return false;
}

for (var i = 0; i < delete_forms.length; i++) {
   delete_forms[i].addEventListener('submit', function(evt) {
      evt.preventDefault();
      confirmDelete();
   });
}

var modify_forms = document.getElementsByClassName("uutisen-muokkaus");
function confirmModify() {
  if (confirm("Oletko varma että haluat muokata artikkelia?")) {
     for (var i = 0; i < modify_forms.length; i++) {
       modify_forms[i].submit();
     }
  }
  return false;
}

for (var i = 0; i < modify_forms.length; i++) {
   modify_forms[i].addEventListener('submit', function(evt) {
      evt.preventDefault();
      confirmModify();
   });
}
