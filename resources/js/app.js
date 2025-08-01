import './bootstrap';

// import 'jquery-ui/dist/jquery-ui';
// $('.datepicker').datepicker({
//     changeMonth: true,
//     changeYear: true,
//     dateFormat: 'dd.mm.yy',
// });

// import { Notify } from './style/layout/notify.ts';
// import { Validator } from "./style/layout/validator.ts";

/* Import Admin JavaScript data */
import './admin/layout/menu.js';
import './admin/layout/filters.js';

/* Authentication data */
import "./public-part/auth/auth.js";

// notify();

import "./public-part/core/menu.js";
import "./public-part/core/grid-slider.js";
import "./public-part/core/snippets-grid.js";
import "./public-part/app/locations/locations-slider.js";

/* Counter */
import "./public-part/app/programs/counter.js";
import "./public-part/app/programs/sessions.js";
import "./public-part/app/programs/offline-sessions.js";
import "./public-part/app/programs/programs.js";
/* Contact -us */
import "./public-part/app/contact-us/send-us-a-message.js";

import "./public-part/app/archive/gallery.js";

/* Import Submit script */
import "./style/submit.js";

/* Profile scripts */
import "./public-part/app/profile/profile-image.js";
import "./public-part/app/profile/scholarship.js";
import "./public-part/app/profile/inbox.js";
import "./public-part/app/profile/my-notes.js";

/* How to apply slider */
import "./public-part/app/homepage/how-to-apply-slider.js";

/* FAQ */
import "./public-part/app/homepage/faq.js";
import "./public-part/app/blog/blog.js";
import "./public-part/app/lecturers/lecturers.js";

/* Mobile menu */
import "./public-part/core/menu.js";

/* MQTT SCRIPTS */
// window.mqtt = "./mqtt/mqtt.js";


/* Chat scripts */
// import "./public-part/chat/chat.js";

/* Import push notifications */

import "./public-part/notifications/push-not.js";
import "./public-part/notifications/online-status.js";
// import "./public-part/chat/chat.js";


$('.select2').select2({
    placeholder: 'Select or add options',
    tags: true // Enable adding new options
});
$('.single-select2').select2({
    placeholder: "Odaberite", // Optional placeholder
    language: {
        noResults: function () {
            return "Nema pronađenih rezultata";
        }
    },
    escapeMarkup: function (markup) {
        return markup; // Allow custom HTML (if needed)
    }
});


$(document).on('click', '.preview__image_wrapper', function(e){
    // if the click target isn't inside the image container or a nav button…
    if ( $(e.target).closest('.main-image, .archive_gallery__navigation-button').length === 0 ) {
        $(this).addClass('d-none');
    }
});
