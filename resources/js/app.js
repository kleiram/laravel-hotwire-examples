import "./bootstrap";
import StepperController from "./controllers/stepper-controller";
import {renderStreamMessage} from "@hotwired/turbo";

window.Stimulus.register("stepper", StepperController);
window.Stimulus.start();

window.Echo.channel('products').listen('.updated', (event) => {
    console.log(event.actions);
    if (Array.isArray(event.actions)) {
        event.actions
            .filter((action) => typeof action === "string")
            .forEach((action) => renderStreamMessage(action));
    }
});
