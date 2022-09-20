import _ from "lodash";
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import * as Turbo from "@hotwired/turbo";
window.Turbo = Turbo;

import { Application } from "@hotwired/stimulus";
window.Stimulus = new Application();
window.Stimulus.debug = true;
