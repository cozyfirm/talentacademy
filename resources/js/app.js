import './bootstrap';

import 'jquery-ui/dist/jquery-ui';
$('.datepicker').datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'dd.mm.yy',
});

// import { Notify } from './style/layout/notify.ts';
// import { Validator } from "./style/layout/validator.ts";

/* Import Admin JavaScript data */
import './admin/layout/menu.js'

/* Authentication data */
import "./public-part/auth/auth.js";

// notify();
