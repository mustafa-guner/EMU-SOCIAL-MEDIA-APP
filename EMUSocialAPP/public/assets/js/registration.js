class FormSteps {
    constructor(steps) {
        //Default starts from 0
        this.currentStepNumber = 1;
        this.steps = steps;
        //Calculated properties
        this.getStepsLength();
        this.getCurrentStep();
        this.getCurrentStatus();
    }

    getCurrentStep() {
        return (this.currentStep = this.steps[this.currentStepNumber - 1]);
    }
    getStepsLength() {
        return (this.stepsLength = this.steps.length - 1);
    }
    getCurrentStatus() {
        const currentStep = this.getCurrentStep();

        return (this.status = currentStep.inputs.every(
            ({ input }) => input.value !== ""
        ));
    }
    incrementStepNumber() {
        return this.currentStepNumber <= this.stepsLength ?
            this.currentStepNumber++
            :
            this.currentStepNumber;
    }
    decrementStepNumber() {
        return this.currentStepNumber > 1 ?
            this.currentStepNumber--
            :
            this.currentStepNumber;
    }

    goNextStep() {
        this.incrementStepNumber();
        return this.getCurrentStep();
    }
    goPreviousStep() {
        this.decrementStepNumber();
        return this.getCurrentStep();
    }
}
const VALIDATIONS = {
    Array: {
        isArray: (array) => Array.isArray(array),
        isObjectsOfArray: (array) =>
            VALIDATIONS.Array.isArray(array) &&
            array.every((value) => typeof value == "object"),
    },
};

class RegistrationFormUIEvent {
    static hideBtn(button) {
        button.disabled = true;
        button.classList.remove("show");
    }
    static showBtn(button) {
        button.disabled = false;
        button.classList.add("show");
    }

    static hideSteps(steps) {
        return steps.forEach(({ selector }) =>
            selector.classList.remove("show")
        );
    }
    static showStep(selector) {
        return selector.classList.add("show");
    }
}

class RegistrationFormWithSteps {
    constructor(steps) {
        //FormSteps
        if (steps) this.subscribe(steps);
        this.LocalRepository = new LocalRepository();
        this.nextBtn = document.querySelector("#next-btn");
        this.backBtn = document.querySelector("#back-btn");
    }

    /* BASIC COMMANDS OF THE REGISTRATION FORM */

    goNext() {
        this.FormSteps.goNextStep();
        this.switchStep();
    }

    goBack() {
        this.FormSteps.goPreviousStep();
        this.switchStep();
    }

    switchStep() {
        const currentStep = this.FormSteps.getCurrentStep();
        const { hideSteps, showStep } = RegistrationFormUIEvent;

        hideSteps(this.FormSteps.steps);
        showStep(currentStep.selector);

        this.toggleStepButtonViews(
            this.FormSteps.currentStepNumber,
            this.FormSteps.stepsLength
        );
    }

    toggleStepButtonViews(currentStepNumber, stepsLength) {
        console.log(currentStepNumber, stepsLength);
        if (currentStepNumber > 1)
            RegistrationFormUIEvent.showBtn(this.backBtn);
        if (currentStepNumber <= stepsLength)
            RegistrationFormUIEvent.showBtn(this.nextBtn);
        if (currentStepNumber == stepsLength + 1)
            RegistrationFormUIEvent.hideBtn(this.nextBtn);
        if (currentStepNumber == 1)
            RegistrationFormUIEvent.hideBtn(this.backBtn);
    }

    runOnLoad() {
        console.log("Running On Load");
    }

    /* START COMMANDS OF THE REGISTRATION FORM */

    init() {
        //Event Listeners
        document.addEventListener(
            "DOMContentLoaded",
            this.runOnLoad.bind(this)
        );
        this.nextBtn.addEventListener("click", this.goNext.bind(this));
        this.backBtn.addEventListener("click", this.goBack.bind(this));
    }

    isSubscribedStepsAreValid(array) {
        const keysRequiredForStep = ["selector", "inputs", "isLastStep"];
        const keysRequiredForInputs = ["label", "input"];

        return (
            VALIDATIONS.Array.isObjectsOfArray(array) &&
            array.some(
                (obj) =>
                keysRequiredForStep.some((key) =>
                    Object.keys(obj).includes(key)
                ) &&
                VALIDATIONS.Array.isObjectsOfArray(obj["inputs"]) &&
                keysRequiredForInputs.some((k) =>
                    obj["inputs"].some((item) =>
                        Object.keys(item).includes(k)
                    )
                )
            )
        );
    }

    subscribe(steps) {
        try {
            if (this.isSubscribedStepsAreValid(steps)) {
                this.FormSteps = new FormSteps(steps);
                return this.init();
            } else
                throw new Error(
                    "Steps format should be Array of Objects.Expected Object format should include 'selector' ,'isLastStep' & 'inputs'.\n\nisLastStep represents a boolean value which shows if the current object is the last step of the given steps.\nselector is a DOM object.\ninputs is an array of object which include label and input keys. \nLabel is a string format which represents the input type.\ninput is a FORM element(select,input,etc.).\n\n"
                );
        } catch (error) {
            console.error(error);
        }
    }
}

const STEPS = [{
        selector: document.querySelector("#step-1"),
        isLastStep: false,
        inputs: [{
                label: "Firstname",
                input: document.querySelector("input[name='firstname']"),
            },
            {
                label: "Lastname",
                input: document.querySelector("input[name='lastname']"),
            },
            {
                label: "Email",
                input: document.querySelector("input[name='email']"),
            },
            {
                label: "Country",
                input: document.querySelector("select[name='country']"),
            },
            {
                label: "Password",
                input: document.querySelector("input[name='password']"),
            },
            {
                label: "Dob",
                input: document.querySelector("input[name='dob']"),
            },
            {
                label: "Gender",
                input: document.querySelector("input[name='gender']:checked"),
            },
        ],
    },
    {
        selector: document.querySelector("#step-2"),
        isLastStep: false,
        inputs: [{
                label: "Academic Career",
                input: document.querySelector("input[name='career']"),
            },
            {
                label: "Profile Image",
                input: document.querySelector("input[name='profile-image']"),
            },
            {
                label: "Academic Status",
                input: document.querySelector("select[name='academic-status']"),
            },
            {
                label: "Graduation Date",
                input: document.querySelector("input[name='graduate-date']"),
            },

            {
                label: "Student Number",
                input: document.querySelector("input[name='student-number']"),
            },
            {
                label: "Academic Degree",
                input: document.querySelector("select[name='academic-degree']"),
            },
        ],
    },
    {
        selector: document.querySelector("#step-3"),
        isLastStep: true,
    },
];

const registrationForm = new RegistrationFormWithSteps();
registrationForm.subscribe(STEPS);