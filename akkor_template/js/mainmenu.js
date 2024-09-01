const OPEN_CLASS = "open";
const mOpenButton = document.querySelector(".burger");
const mCloseButton = document.querySelector(".close");
const mSearchButton = document.querySelector(".msearch");
const mMenu = document.querySelector(".mainmenu");
const searchForm = document.querySelector("#search");

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

document.addEventListener("click", (e) => {
  const inForm = e.composedPath().includes(mMenu);
  const ifOpenBtn = e.composedPath().includes(mOpenButton);
  if (!inForm && !ifOpenBtn && mMenu.classList.contains(OPEN_CLASS)) {
    mMenu.classList.remove(OPEN_CLASS);
  }
});
