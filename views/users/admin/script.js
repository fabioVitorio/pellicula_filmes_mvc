// --------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------ FUNÇÃO SCROLL HEADER ----------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------------------

// função para adicionar cor ao header ao scrollar a pág
window.addEventListener('scroll', function(){
    var menu = document.querySelector('#menu');
    menu.classList.toggle('sticky', window.scrollY > 0);
})

// --------------------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------- SCRIP BARRA LATERAL ---------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------------------

var theToggle = document.getElementById('toggle');

function hasClass(elem, className) {
  return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
}

function addClass(elem, className) {
    if (!hasClass(elem, className)) {
      elem.className += ' ' + className;
    }
}

function removeClass(elem, className) {
  var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ') + ' ';
  if (hasClass(elem, className)) {
        while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
            newClass = newClass.replace(' ' + className + ' ', ' ');
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    }
}

function toggleClass(elem, className) {
  var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, " " ) + ' ';
    if (hasClass(elem, className)) {
        while (newClass.indexOf(" " + className + " ") >= 0 ) {
            newClass = newClass.replace( " " + className + " " , " " );
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    } else {
        elem.className += ' ' + className;
    }
}

theToggle.onclick = function() {
  toggleClass(this, 'on');
  return false;
}

// --------------------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------- SCRIP PARA MUDAR IMAGENS DO ASIDE ------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------------------
let slide = document.getElementById("carousel");
let imagens = [
              "url(img/astronaut.jpg)", 
              "url(img/after.jpg)", 
              "url(img/joker.jpg)", 
              "url(img/capitainM.jpg)", 
              "url(img/pixels.jpg)",
              "url(img/ice.jpg)"
              ];
let i = 0;

function slideShow(){
  slide.style.backgroundImage = imagens[i];

  if (i < imagens.length - 1){
    i++;
  }else {
    i = 0;
  }
  setTimeout(slideShow, 3000);
}
slideShow();


// --------------------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------- SCRIP PARA POP-UP DE LOGOUT ------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------------------
function menuToggle(){
  const toggleMenu = document.querySelector('.menuUser');
  toggleMenu.classList.toggle('active')
}