/* -------------------------- Carousel -------------------------- */

/* Déclaration des variables */
let imgArray = [
  "https://i.goopics.net/a6bizj.png",
  "https://i.goopics.net/3egh2v.png",
  "https://i.goopics.net/zhe9zk.png",
  "https://i.goopics.net/h1bbbi.png",
  "https://i.goopics.net/wb3uxh.png",
  "https://i.goopics.net/lxasv9.png"
];
let counter = 1;
let interval = "";
let navigatorId = 1;
let container = document.querySelector(".container");
let slider = container.querySelector(".slider");
let navigator = document.querySelectorAll(".navigator");

/* Parcours du tableau des images pour le carousel */
for (let n = 0; n < imgArray.length; n++) {
  let img = document.createElement("img");
  img.src = imgArray[n];
  slider.appendChild(img);
}

/*Déclaraition de nouvelles variable en fonction du tableau d'image*/
let slides = slider.querySelectorAll("img");
let dotDiv = document.querySelector(".dot");
let containerWidth = container.clientWidth;
let slideWidth = slides[0].clientWidth;
let dots = "";
let firstClone = `<img src = "${slides[0].src}" id='firstClone'>`;
let lastClone = `<img src = "${slides[slides.length - 1].src}" id='lastClone'>`;

/**/
slider.innerHTML = lastClone + slider.innerHTML + firstClone;
slides = slider.querySelectorAll("img");
slides.forEach((slides1) => {
  slides1.draggable = false;
});
navigator.forEach((navigator1) => {
  navigator1.onclick = () => {
    if (navigator1.id == 1 && counter + 1 < slides.length) {
      counter++;
    } else if (navigator1.id == 0 && counter > 0) {
      counter--;
    }
    slider.style.transition = "transform 0.4s ease-in-out";
    navigatorId = navigator1.id;
    navigator1.disabled = true;
    increament();
  };
});
slider.addEventListener("transitionend", transitionEnd);

/*Fonction pour faire revenir à la première image quand on arrive à la fin*/
function transitionEnd() {
  if (slides[counter].id == "lastClone") {
    slider.style.transition = "none";
    counter = slides.length - 2;
    increament();
  } else if (slides[counter].id == "firstClone") {
    slider.style.transition = "none";
    counter = slides.length - counter;
    increament();
  }
  dots.forEach((dot1) => {
    dot1.classList.remove("clicked");
  });
  dots[counter - 1].classList.add("clicked");
  navigator[navigatorId].disabled = false;
}

/*Fonction pour la vitesse de défilement*/
function increament() {
  slider.style.transform = `translateX(${
    (containerWidth - slideWidth) * 0.5 - slideWidth * counter
  }px)`;
  clearInterval(interval);
  interval = setInterval(() => {
    navigator[1].click();
  }, 6000);
}
increament();
window.addEventListener("resize", () => {
  increament();
});

/*Gérer les images en fonction des cliques sur les dots*/
for (let i = 1; i <= slides.length - 2; i++) {
  let dot = document.createElement("span");
  dot.id = "dot" + i;
  dot.setAttribute("onclick", `dotClick(${i})`);
  dotDiv.appendChild(dot);
}
dots = dotDiv.querySelectorAll("span");
dots[0].classList.add("clicked");
function dotClick(c) {
  counter = c;
  slider.style.transition = "transform 0.4s ease-in-out";
  increament(counter);
  dots.forEach((dot1) => {
    dot1.classList.remove("clicked");
  });
  dots[c - 1].classList.add("clicked");
}
window.oncontextmenu = (e) => {
  e.preventDefault();
};
window.onkeyup = (e) => {
  if (e.keyCode == 37) navigator[0].click();
  else if (e.keyCode == 39) navigator[1].click();
};


/* -------------------------- Carousel -------------------------- */


