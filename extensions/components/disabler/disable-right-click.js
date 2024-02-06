// disable-right-click.js
document.addEventListener("contextmenu", function(e) {
  e.preventDefault();
});

document.addEventListener("copy", function(e) {
  e.preventDefault();
});

document.addEventListener("keydown", function(e) {
  if (e.key === "F12") {
    e.preventDefault();
  }
});

document.addEventListener("keydown", function(e) {
  if (e.code === "F12") {
    e.preventDefault();
  }
});