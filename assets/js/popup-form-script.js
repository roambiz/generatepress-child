/* 
 * File: popup-form-script.js
 * Author: Singa
 * Description: Default features for a child theme, form popup script.
 */

// Handling click events for pop-up modals
const PopupFormScript = {
    modalPopupContent: null,
    modalTriggerBtns: null,
    modalCloseBtn: null,
    pageOverFlow: document.querySelector('body'),

    init: function() {
        // Updating elements references in init to ensure they are accessed after DOM is fully loaded
        this.modalPopupContent = document.querySelector('.modal-popup-content');
        this.modalTriggerBtns = document.querySelectorAll('.modal-trigger-btn');
        this.modalCloseBtn = document.querySelector('.modal-close-btn');
        this.addEventListeners();
    },

    addEventListeners: function() {
        if (this.modalTriggerBtns.length > 0) {
            for (let i = 0; i < this.modalTriggerBtns.length; i++) {
                this.modalTriggerBtns[i].addEventListener('click', this.openModal.bind(this));
            }
        }

        if (this.modalCloseBtn) {
            this.modalCloseBtn.addEventListener('click', this.closeModal.bind(this));
        }

        window.addEventListener('click', this.outsideClick.bind(this));
    },

    openModal: function() {
        if (this.modalPopupContent) {
            this.modalPopupContent.style.display = 'block';
            this.pageOverFlow.style.overflow = 'hidden';
        }
    },

    closeModal: function() {
        if (this.modalPopupContent) {
            this.modalPopupContent.style.display = 'none';
            this.pageOverFlow.style.overflow = 'auto';
        }
    },

    outsideClick: function(e) {
        if (e.target === this.modalPopupContent) {
            this.closeModal();
        }
    }
};

// Initialization is triggered by the DOMContentLoaded event to ensure all DOM elements are loaded
document.addEventListener('DOMContentLoaded', function() {
    PopupFormScript.init();
});

