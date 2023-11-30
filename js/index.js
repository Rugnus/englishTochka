const moreBtn = document.querySelector(".header__button--red");
const cardSection = document.querySelector(".content");

const consultBtn = document.querySelector("#consult");
const formSection = document.querySelector(".content__action");


function scrollTo(element) {
    window.scroll({
      behavior: 'smooth',
      left: 0,
      top: element.offsetTop
    });
    console.log("button pressed");
  }
  
moreBtn.addEventListener('click', () => {
  scrollTo(cardSection);
});

consultBtn.addEventListener('click', () => {
    scrollTo(formSection);
})
