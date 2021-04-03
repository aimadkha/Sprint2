// start responsive navbar  
const nav = document.querySelector('.navbar');
const toggle = document.querySelector('.header__toggle');
toggle.addEventListener('click', function(){
    nav.classList.toggle('active');
})

// end responsive navbar

// start dropdown menu
const drop_nav = document.querySelector('#nav__drop');
const drop_content = document.querySelector('.navbar__content');
drop_nav.addEventListener('click', function () {
    drop_content.classList.toggle('navbar__drop--active');
})
// end drop down men


