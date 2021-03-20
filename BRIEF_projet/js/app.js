let navbarUl = document.querySelector('.navbar__ul');
let dropdown = document.querySelector('.navbar__down')
dropdown.addEventListener("click", () => {
    navbarUl.classList.add("navbar__down--active");
  });