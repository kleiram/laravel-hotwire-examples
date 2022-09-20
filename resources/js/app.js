import "./bootstrap";
import StepperController from "./controllers/stepper-controller";

window.Stimulus.register("stepper", StepperController);
window.Stimulus.start();
