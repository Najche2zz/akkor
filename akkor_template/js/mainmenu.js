const OPEN_CLASS = "open";
const OPEN_SUBMENU_CLASS = "show";
const mOpenButton = document.querySelector(".burger");
const mCloseButton = document.querySelector(".close");
const mSearchButton = document.querySelector(".msearch");
const mMenu = document.querySelector(".mainmenu");
const searchForm = document.querySelector("#search");
const menuLinks = document.querySelectorAll(".menu li");

menuLinks.forEach((link) => {
  if (link.children.length > 1) {
    const submenu = link.children[1];
    if (!submenu && !submenu.classList.contains("submenu")) return;

    link.addEventListener("mouseover", (e) => {
      if (!submenu.classList.contains(OPEN_SUBMENU_CLASS))
        submenu.classList.add(OPEN_SUBMENU_CLASS);
    });

    link.addEventListener("mouseleave", (e) => {
      if (submenu.classList.contains(OPEN_SUBMENU_CLASS))
        submenu.classList.remove(OPEN_SUBMENU_CLASS);
    });
  }
});

mOpenButton.addEventListener("click", () => {
  if (!mMenu.classList.contains(OPEN_CLASS)) {
    mMenu.classList.add(OPEN_CLASS);
  }
});

mSearchButton.addEventListener("click", () => {
  if (!mMenu.classList.contains(OPEN_CLASS)) {
    mMenu.classList.add(OPEN_CLASS);
  }
  searchForm.focus();
});

mCloseButton.addEventListener("click", () => {
  if (mMenu.classList.contains(OPEN_CLASS)) {
    mMenu.classList.remove(OPEN_CLASS);
  }
});

window.addEventListener("resize", () => {
  if (window.innerWidth < 900) {
    console.log(window.innerWidth);
  }
});

document.addEventListener("click", (e) => {
  const inForm = e.composedPath().includes(mMenu);
  const ifOpenBtn = e.composedPath().includes(mOpenButton);
  if (!inForm && !ifOpenBtn && mMenu.classList.contains(OPEN_CLASS)) {
    mMenu.classList.remove(OPEN_CLASS);
  }
});
