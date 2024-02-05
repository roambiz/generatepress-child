// disable-page-select.js
const elements = [document.documentElement, document.body];

elements.forEach(element => {
  element.style.webkitTouchCallout = "none";
  element.style.khtmlUserSelect = "none";
  element.style.mozUserSelect = "none";
  element.style.msUserSelect = "none";
  element.style.userSelect = "none";
});