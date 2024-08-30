import './bootstrap';

import Alpine from 'alpinejs';
import {document} from "postcss";

window.Alpine = Alpine;

Alpine.start();

window.editButtons = function(document ,hexColor, newHref) {
    var buttons = document.querySelectorAll('.colored-button');

    buttons.forEach(button => {
        // Set the background color
        button.style.backgroundColor = hexColor;

        // Check if newHref is an absolute URL or a relative URL
        if (newHref.startsWith('http://') || newHref.startsWith('https://')) {
            button.href = newHref;
        } else {
            //If relative prepend https
            button.href = 'https://' + newHref;
        }
    });
};

window.onPageLoad = function (document){
    var buttons = document.querySelectorAll('.colored-button');
    if (buttons.length > 0){
        buttons.forEach(button => {
            button.addEventListener('click', function () {
                if (button.href === '#' || button.href === 'https://#') {
                    // Change the location to the settings page if href is not set
                    window.location = window.location.origin + '/settings';
                }
            });
        });
    }
    var resetButton = document.querySelector('#reset-button');
    if (resetButton !== null) {
        resetButton.addEventListener('click', function () {
            var color = document.querySelector('#color');
            var hyperlink = document.querySelector('#hyperlink');

            color.setAttribute('value', '#111111');
            hyperlink.setAttribute('value', '#');
        });
    }
}

