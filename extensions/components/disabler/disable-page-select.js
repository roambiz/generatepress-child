// disable-page-select.js
const elements = [document.documentElement, document.body];
const styleValue = "none";

elements.forEach(element => {
  ['webkitTouchCallout', 'khtmlUserSelect', 'mozUserSelect', 'msUserSelect', 'userSelect'].forEach(property => {
    element.style[property] = styleValue;
  });
});
