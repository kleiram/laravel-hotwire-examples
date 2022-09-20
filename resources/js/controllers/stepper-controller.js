import { Controller } from "@hotwired/stimulus";
import debounce from 'https://cdn.skypack.dev/lodash.debounce';

function clamp(value, minimum, maximum) {
    return Math.min(Math.max(value, minimum), maximum);
}

export default class StepperController extends Controller {
    static targets = ["form", "input", "increment", "decrement"];

    static values = {
        value: { type: Number, default: 0 },
        minimum: { type: Number, default: Number.MIN_SAFE_INTEGER },
        maximum: { type: Number, default: Number.MAX_SAFE_INTEGER },
    };

    initialize() {
        this.submit = debounce(this.submit.bind(this), 200);
    }

    valueValueChanged(value) {
        this.inputTargets
            .filter((target) => (
                target instanceof HTMLInputElement
                && target !== document.activeElement
                && target.value !== `${this.valueValue}`
            ))
            .forEach((target) => {
                target.value = `${this.valueValue}`;
                target.dispatchEvent(new Event('change'));
            });

        this.decrementTargets
            .filter((target) => target instanceof HTMLButtonElement)
            .forEach((target) => (target.disabled = this.valueValue <= this.minimumValue));

        this.incrementTargets
            .filter((target) => target instanceof HTMLButtonElement)
            .forEach((target) => (target.disabled = this.valueValue >= this.maximumValue));
    }

    submit() {
        const everyInputValid = this.inputTargets
            .filter((target) => target instanceof HTMLInputElement)
            .every((target) => (
                target.value >= this.minimumValue && target.value <= this.maximumValue
            ));

        if (
            this.hasFormTarget
            && this.formTarget instanceof HTMLFormElement
            && this.valueValue >= this.minimumValue
            && this.valueValue <= this.maximumValue
            && everyInputValid
        ) {
            this.formTarget.requestSubmit();
        }
    }

    increment() {
        this.valueValue = clamp(this.valueValue + 1, this.minimumValue, this.maximumValue);
    }

    decrement() {
        this.valueValue = clamp(this.valueValue - 1, this.minimumValue, this.maximumValue);
    }

    update(event) {
        if (event?.target?.value && !isNaN(parseInt(event.target.value))) {
            this.valueValue = clamp(parseInt(event.target.value), this.minimumValue, this.maximumValue);
        } else if (event?.params?.value && !isNaN(parseInt(event.params.value))) {
            this.valueValue = clamp(parseInt(event.params.value), this.minimumValue, this.maximumValue);
        }
    }

    inputTargetConnected(target) {
        console.log(':inputTargetConnected');
        if (target instanceof HTMLInputElement && target.value && !isNaN(parseInt(target.value))) {
            this.valueValue = clamp(parseInt(target.value), this.minimumValue, this.maximumValue);
        }
    }
}
