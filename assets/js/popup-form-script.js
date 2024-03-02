/* 
 * File: popup-form-script.js
 * Author: Singa
 * Description: Default features for a child theme, form popup script.
 * @NameSpace: FractalPopup
 */

// Handling click events for pop-up modals
const FractalPopup = {
    modalPopupContent: null,
    modalTriggerBtns: null,
    modalCloseBtn: null,
    pageOverflow: document.querySelector('body'),
    isInitialized: false,

    // Initialization method
    init: function() {
        this.modalPopupContent = document.querySelector('.modal-popup-content');
        this.modalTriggerBtns = document.querySelectorAll('.modal-trigger-btn');
        this.modalCloseBtn = document.querySelector('.modal-close-btn');
        this.addEventListeners(); // Add event listeners
        this.isInitialized = true; // Set the initialization flag
    },

    // Method to add event listeners
    addEventListeners: function() {
        
        Array.from(this.modalTriggerBtns).forEach(btn => {
            btn.addEventListener('click', this.openModal.bind(this));
        });

        if (this.modalCloseBtn) {
            this.modalCloseBtn.addEventListener('click', this.closeModal.bind(this));
        }

        // Add click event listener to the window for outside click detection
        window.addEventListener('click', this.outsideClick.bind(this));
    },

    // Method to open the modal
    openModal: function() {
        if (this.modalPopupContent) {
            this.modalPopupContent.style.display = 'block'; 
            this.pageOverflow.style.overflow = 'hidden'; 
        }
    },

    // Method to close the modal
    closeModal: function() {
        if (this.modalPopupContent) {
            this.modalPopupContent.style.display = 'none'; 
            this.pageOverflow.style.overflow = 'auto'; 
        }
    },

    // Method to handle outside click events
    outsideClick: function(e) {
        if (!this.modalPopupContent.contains(e.target)) {
            this.closeModal();
        }
    }
};

// Initialization is triggered by the DOMContentLoaded event to ensure all DOM elements are loaded
function loadScript() {
    document.addEventListener('DOMContentLoaded', function() {
        FractalPopup.init(); 
    });
}

loadScript(); // Trigger the script loading