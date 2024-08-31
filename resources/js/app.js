import './bootstrap';

import Alpine from 'alpinejs';
import {document} from "postcss";

window.Alpine = Alpine;

Alpine.start();

window.onPageLoad = function (document){
    let resetButtons = document.querySelectorAll('.reset-btn');
    if (resetButtons.length > 0) {
        resetButtons.forEach(resetButton => {
            resetButton.addEventListener('click', function () {
                let buttonId = resetButton.id.split('-')[2];
                let title = document.querySelector('#title-' + buttonId);
                let color = document.querySelector('#color-' + buttonId);
                let hyperlink = document.querySelector('#hyperlink-' + buttonId);

                title.setAttribute('value', 'Default button');
                color.setAttribute('value', '#111111');
                hyperlink.setAttribute('value', '#');
            });
        })
    }
}

