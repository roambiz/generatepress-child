/* 
 * File: popup-form-script.js
 * Author: Singa
 * Description: Default features for a child theme, form popup script.
 */

// Handling click events for pop-up modals
const PopupFormScript = {
    modalPopupContent: document.querySelector('.modal-popup-content'),
    modalTriggerBtns: document.querySelectorAll('.modal-trigger-btn'),  //[modal-trigger-btn] is the class name used for the trigger button.
    modalCloseBtn: document.querySelector('.modal-close-btn'),
    pageOverFlow: document.querySelector('body'),
  
    init: function() {
      this.addEventListeners();
    },
  
    addEventListeners: function() {
      for (let i = 0; i < this.modalTriggerBtns.length; i++) {
        this.modalTriggerBtns[i].addEventListener('click', this.openModal.bind(this));
      }
  
      this.modalCloseBtn.addEventListener('click', this.closeModal.bind(this));
      window.addEventListener('click', this.outsideClick.bind(this));
    },
  
    openModal: function() {
      this.modalPopupContent.style.display = 'block';
      this.pageOverFlow.style.overflow = 'hidden';
    },
  
    closeModal: function() {
      this.modalPopupContent.style.display = 'none';
      this.pageOverFlow.style.overflow = 'auto';
    },
  
    outsideClick: function(e) {
      if (e.target == this.modalPopupContent) {
        this.modalPopupContent.style.display = 'none';
        this.pageOverFlow.style.overflow = 'auto';
      }
    }
  };
  
  // Script initialization
  PopupFormScript.init();
// Extend functionality below; avoid unnecessary whitespace.