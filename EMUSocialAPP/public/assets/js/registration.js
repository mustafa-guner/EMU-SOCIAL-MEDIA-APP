const VALIDATIONS = {
    Array: {
        isArray: (array) => Array.isArray(array),
        isObjectsOfArray: (array) =>
            VALIDATIONS.Array.isArray(array) &&
            array.every((value) => typeof value == "object"),
    },
    Inputs: {
        validateInputs: (inputs) => {
            return inputs.map((currentInput) => {
                //Condition checks

                const isInputMissing = !currentInput.input || currentInput.input.value == "";
                const isEmailValid = VALIDATIONS.Inputs.isEmailValid(
                    currentInput.input.value
                );

                const isCurrentInputEmail =
                    currentInput.label.toLowerCase() == "email" ||
                    VALIDATIONS.Inputs.isInputType(currentInput.input, "email");

                const isCurrentInputRadioInput =
                    VALIDATIONS.Array.isArray(currentInput.input) &&
                    currentInput.input.every((input) =>
                        VALIDATIONS.Inputs.isInputType(input, "radio")
                    );

                //VALIDATION CHECK FOR RADIO INPUTS
                if (
                    isCurrentInputRadioInput &&
                    !VALIDATIONS.Inputs.areRadioInputsChecked(
                        currentInput.input
                    )
                ) {
                    return (currentInput = {
                        ...currentInput,
                        errorMessage: `${currentInput.label} field is required*`,
                    });
                }

                //VALIDATION CHECK FOR MISSING INPUTS
                if (isInputMissing) {
                    return {
                        ...currentInput,
                        errorMessage: `${currentInput.label} field is required*`,
                    };
                    //VALIDATION CHECK FOR INVALID EMAIL ADDRESSSES
                } else if (!isInputMissing &&
                    isCurrentInputEmail &&
                    !isEmailValid
                ) {
                    return {
                        ...currentInput,
                        errorMessage: "Email is not valid*",
                    };
                }
                return currentInput;
            });
        },
        isInputType: (input, expectedInputType) => {
            return input && input.type == expectedInputType;
        },
        areRadioInputsChecked: (radioInputs) => {
            return radioInputs.some(
                (radioInput) =>
                VALIDATIONS.Inputs.isInputType(radioInput, "radio") &&
                radioInput.checked == true
            );
        },

        getValueFromInput: ({ input }) => {
            return VALIDATIONS.Array.isArray(input) ?
                input.find((i) => i.checked == true) :
                input;
        },
        getValidatedFormData: (validatedInputs) => {
            return validatedInputs
                .map((validatedInput) => {
                    const input =
                        VALIDATIONS.Inputs.getValueFromInput(validatedInput);

                    const isCurrentValidatedInputIsPassword =
                        validatedInput.label.toLowerCase() === "password" ||
                        VALIDATIONS.Inputs.isInputType(
                            validatedInput,
                            "password"
                        );
                    //Skip the password saving because of security issues
                    if (isCurrentValidatedInputIsPassword) return;

                    const validFormat = {};
                    validFormat[validatedInput.label.toLowerCase()] =
                        input.value;
                    return validFormat;
                }) //reduce is used for converting partial object [{firstname:"x"},{lastname:"x"}] to merged object [{firstname:"x",lastname:"x"}]
                .reduce(function(acc, x) {
                    for (var key in x) acc[key] = x[key];
                    return acc;
                }, {});
        },
        areInputsValid: (inputs) =>
            !VALIDATIONS.Inputs.validateInputs(inputs).some(
                (input) =>
                Object.keys(input).includes("errorMessage") &&
                input.errorMessage
            ),
        isEmailValid: (email) => {
            return /^[a-z0-9][a-z0-9-_\.]+@([a-z]|[a-z0-9]?[a-z0-9-]+[a-z0-9])\.[a-z0-9]{2,10}(?:\.[a-z]{2,10})?$/.test(
                email
            );
        },

        isFileValid: (currentInput) => {
            if (currentInput.input.files[0]) {
                const VALID_FILE_EXTENSIONS = ["png", "jpg", "jpeg", "jfif"];

                const isFilenameValid =
                    VALID_FILE_EXTENSIONS.indexOf(
                        currentInput.input.files[0].name.split(".").pop()
                    ) > -1;
                return isFilenameValid;
            }
            return false;
        },
    },
};

class FormSteps {
    constructor(steps) {
        //Default starts from 0
        this.currentStepNumber = 1;
        this.steps = steps;
        //Calculated properties
        this.getStepsLength();
        this.getCurrentStep();
    }

    getCurrentStep() {
        return (this.currentStep = this.steps[this.currentStepNumber - 1]);
    }
    getCurrentStepTitle() {
        return this.currentStep.stepTitle;
    }
    setCurrentStep(updatedStep) {
        return (this.currentStep = updatedStep);
    }
    setCurrentStepByTitle(stepTitle) {
        const currentStep = this.getInputsByStepTitle(stepTitle);
        const currentStepNumber = this.getStepNumberByTitle(stepTitle);

        this.currentStepNumber = currentStepNumber + 1;

        return currentStep;
    }
    getStepsLength() {
        return (this.stepsLength = this.steps.length - 1);
    }

    getInputsByStepTitle(stepTitle) {
        return this.steps.find((step) => step.stepTitle == stepTitle);
    }
    getStepNumberByTitle(title) {
        return this.steps.findIndex((step) => step.stepTitle == title);
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
        return steps.forEach(({ selector }) => {
            selector.classList.remove("show");
        });
    }
    static showStep(step) {
        return step.classList.add("show");
    }

    static addStepCountNumberToStep(step) {
        const { id, size, currentStepNumber } = step;
        const stepCounter = document.querySelector(`#${id} .step-count`);
        return (stepCounter.innerHTML = `Step ${currentStepNumber} of ${size}`);
    }

    static disableCheckedClassFromRadioInputs(otherInputs) {
        return otherInputs.forEach((radioInput) =>
            radioInput.parentElement.classList.remove("checked")
        );
    }

    static addCheckedClassToRadioInput(radioInput) {
        radioInput.parentElement.classList.add("checked");
    }

    static addActiveClassToRadioInputOnClick() {
        const self = this;
        document
            .querySelectorAll('input[name="gender"]')
            .forEach(function(input, idx, otherInputs) {
                input.addEventListener("click", function() {
                    self.disableCheckedClassFromRadioInputs(otherInputs);
                    self.addCheckedClassToRadioInput(input);
                });
            });

        document
            .querySelectorAll('input[name="career"]')
            .forEach(function(input, idx, otherInputs) {
                input.addEventListener("click", function() {
                    self.disableCheckedClassFromRadioInputs(otherInputs);
                    self.addCheckedClassToRadioInput(input);
                });
            });
    }

    static removeAllErrorMessages(errorClass) {
        return document
            .querySelectorAll(`.${errorClass}`)
            .forEach((error) => error.remove());
    }
}

class RegistrationFormWithSteps {
    constructor(steps) {
        //FormSteps
        if (steps) this.subscribe(steps);

        this.nextBtn = document.querySelector("#next-btn");
        this.backBtn = document.querySelector("#back-btn");
        this.submitBtn = document.querySelector("#submit-btn");
        this.registrationForm = document.querySelector("#registration-form");
    }

    /* BASIC COMMANDS OF THE REGISTRATION F ORM */

    goNext() {
        const currentStep = this.FormSteps.getCurrentStep();
        const currentStepTitle = this.FormSteps.getCurrentStepTitle();

        const { stepTitle, inputs } = currentStep;

        let associatedInputs = inputs;

        if (stepTitle === "academicInformation") {
            const selectedUserType = currentStep.userType.find(
                (type) => type.selected === true
            );

            associatedInputs = [
                ...inputs,
                ...selectedUserType.assoicatedInputs,
            ];
        }

        //validate all the inputs
        const inputsToValidate =
            VALIDATIONS.Inputs.validateInputs(associatedInputs);

        const isThereAnyError = !VALIDATIONS.Inputs.areInputsValid(inputsToValidate);

        //Toggles errorMessages because of errors
        if (isThereAnyError) return this.toggleErrorMessages(inputsToValidate);

        //Removes all the error messages from UI after successfull continue event
        this.toggleErrorMessages(inputsToValidate);

        //get validated inputs and make it array of key value pair objects
        const validatedInputs =
            VALIDATIONS.Inputs.getValidatedFormData(inputsToValidate);

        //Save validated inputs to localstorage by their stepTitles
        LocalRepository.createRepository(currentStepTitle, validatedInputs);
        //Go next step
        this.FormSteps.goNextStep();

        //Switch to another step
        this.switchStep();
    }

    goBack() {
        this.FormSteps.goPreviousStep();
        this.switchStep();
    }

    printErrorMessage(parentElement, currentInput) {
        const errorMessage = `<p id='${currentInput.label}-error' class="error-message">${currentInput.errorMessage}</p>`;
        parentElement.insertAdjacentHTML("beforeend", errorMessage);
    }

    removeErrorMessage(errorDiv) {
        errorDiv.remove();
    }

    handleRadioInputErrors(radioInput) {
        const input = radioInput.input[0];
        /*
            EXAMPLE:
            <div class='step-label'> (PARENT)
                <label> (PARENT)
                    <div class=radio-logo> (PARENT)
                        <input type=radio> (INPUT)
                    </div>
                </label>
                {ERROR GOES HERE AFTER THIS FUNCTION}
            </div>
             */
        const parentElement =
            input.parentElement.parentElement.parentElement.parentElement;
        const lastChild =
            parentElement.children[parentElement.children.length - 1];
        const isErrorDiv = lastChild.classList.contains("error-message");

        if (!isErrorDiv) {
            this.printErrorMessage(parentElement, radioInput);
        }
    }

    //TODO: REFACTOR THIS FUNCTION LATER.
    toggleErrorMessages(inputsToValidate) {
        const self = this;

        inputsToValidate.map((invalidInput) => {
            const input = VALIDATIONS.Inputs.getValueFromInput(invalidInput);

            if (
                VALIDATIONS.Array.isArray(invalidInput.input) &&
                !VALIDATIONS.Inputs.areRadioInputsChecked(invalidInput.input)
            ) {
                self.handleRadioInputErrors(invalidInput);
            } else if (
                VALIDATIONS.Array.isArray(invalidInput.input) &&
                VALIDATIONS.Inputs.areRadioInputsChecked(invalidInput.input)
            ) {
                const parentElement =
                    invalidInput.input[0].parentElement.parentElement
                    .parentElement.parentElement;

                const lastChild =
                    parentElement.children[parentElement.children.length - 1];
                const isErrorDiv =
                    lastChild.classList.contains("error-message");
                if (isErrorDiv) self.removeErrorMessage(lastChild);
            } else {
                const parentElement = input.parentElement;

                const lastChild =
                    parentElement.children[parentElement.children.length - 1];

                //Conditions
                const isInputEmpty = input.value == "";

                const isErrorDiv =
                    lastChild.classList.contains("error-message");

                const isInputEmail =
                    invalidInput.label.toLowerCase() == "email" ||
                    VALIDATIONS.Inputs.isInputType(invalidInput, "email");

                const isEmailValid = VALIDATIONS.Inputs.isEmailValid(
                    invalidInput.input.value
                );

                if (!isErrorDiv && invalidInput.errorMessage && isInputEmpty)
                    self.printErrorMessage(parentElement, invalidInput);
                else if (isErrorDiv && !isInputEmpty)
                    self.removeErrorMessage(lastChild);

                if (isErrorDiv && isInputEmail && !isEmailValid) {
                    self.removeErrorMessage(lastChild);
                    self.printErrorMessage(parentElement, invalidInput);
                } else if (!isErrorDiv &&
                    isInputEmail &&
                    !isEmailValid &&
                    !isInputEmpty
                ) {
                    self.printErrorMessage(parentElement, invalidInput);
                }
            }
        });
    }

    switchStep() {
        const currentStep = this.FormSteps.getCurrentStep();
        const currentStepNumber = this.FormSteps.currentStepNumber;
        const stepsSize = this.FormSteps.steps.length;
        const { hideSteps, showStep, addStepCountNumberToStep } =
        RegistrationFormUIEvent;

        hideSteps(this.FormSteps.steps);
        showStep(currentStep.selector);

        addStepCountNumberToStep({
            id: currentStep.selector.id,
            size: stepsSize,
            currentStepNumber: currentStepNumber,
        });

        this.toggleStepButtonViews(
            this.FormSteps.currentStepNumber,
            this.FormSteps.stepsLength
        );
    }

    toggleStepButtonViews(currentStepNumber, stepsLength) {
        if (currentStepNumber == stepsLength + 1) {
            RegistrationFormUIEvent.hideBtn(this.nextBtn);
            RegistrationFormUIEvent.showBtn(this.submitBtn);
        } else {
            RegistrationFormUIEvent.hideBtn(this.submitBtn);
            if (currentStepNumber > 1)
                RegistrationFormUIEvent.showBtn(this.backBtn);
            if (currentStepNumber <= stepsLength)
                RegistrationFormUIEvent.showBtn(this.nextBtn);
            if (currentStepNumber == 1)
                RegistrationFormUIEvent.hideBtn(this.backBtn);
        }
    }

    fetchFromLocalStorageOnLoad() {
        const personalInformation = LocalRepository.getValueFromRepositoryByID(
            "personalInformation"
        );
        const academicInformation = LocalRepository.getValueFromRepositoryByID(
            "academicInformation"
        );
        return [{...personalInformation }, {...academicInformation }];
    }

    loadData(inputs, data) {
        return inputs.map((input) => {
            const isCurrentInputFile = VALIDATIONS.Inputs.isInputType(
                input.input,
                "file"
            );
            const isCurrentInputArray = VALIDATIONS.Array.isArray(input.input);
            const isCurrentInputUndefined = !data[input.label.toLowerCase()];

            if (isCurrentInputUndefined) return;

            if (isCurrentInputFile) return;

            if (isCurrentInputArray) {
                const isCurrentInputRadioType = (input) =>
                    VALIDATIONS.Inputs.isInputType(input, "radio");
                return input.input.map((radioInput) => {
                    if (
                        isCurrentInputRadioType(radioInput) &&
                        radioInput.value == data[input.label.toLowerCase()]
                    ) {
                        radioInput.checked = true;

                        RegistrationFormUIEvent.addCheckedClassToRadioInput(
                            radioInput
                        );
                    }
                });
            }

            return (input.input.value = data[input.label.toLowerCase()]);
        });
    }

    loadDataIntoInputs(associatedStep, data) {
        if (data.academiccareer === "staff") {
            const staffInputs = document.querySelector("#staff-status");
            const studentInputs = document.querySelector("#student-status");

            const assoicatedUserType = associatedStep.userType.find((type) => {
                return type.type === "staff";
            });

            if (!staffInputs.classList.contains("activated")) {
                staffInputs.classList.add("activated");
                studentInputs.classList.remove("activated");
            }

            return this.loadData(
                [
                    ...associatedStep.inputs,
                    ...assoicatedUserType.assoicatedInputs,
                ],
                data
            );
        }
        if (data.academiccareer === "student") {
            const assoicatedUserType = associatedStep.userType.find(
                (userType) => userType.type == data.academiccareer
            );

            return this.loadData(
                [
                    ...associatedStep.inputs,
                    ...assoicatedUserType.assoicatedInputs,
                ],
                data
            );
        }
        return this.loadData(associatedStep.inputs, data);
    }

    loadFormDataIntoInput(data) {
        switch (data.type) {
            case "personalInformation":
                const personalInformationStep =
                    this.FormSteps.getInputsByStepTitle(data.type);
                this.loadDataIntoInputs(personalInformationStep, data);
                break;
            case "academicInformation":
                const academicInformationStep =
                    this.FormSteps.getInputsByStepTitle(data.type);

                this.loadDataIntoInputs(academicInformationStep, data);
                break;
        }
    }

    findMissingSteps() {
        return this.FormSteps.steps.filter((step) => {
            return (!step.isLastStep &&
                step.inputs.some((input) => {
                    const { isInputType, areRadioInputsChecked } =
                    VALIDATIONS.Inputs;
                    const { isArray } = VALIDATIONS.Array;
                    const checkInputFileEmpty =
                        isInputType(input.input, "file") &&
                        input.input.files[0] == undefined;
                    const areRadiosNotChecked =
                        isArray(input.input) &&
                        input.input.some((i) => isInputType(i, "radio")) &&
                        !areRadioInputsChecked(input.input);

                    return (
                        checkInputFileEmpty ||
                        areRadiosNotChecked ||
                        input.input.value == ""
                    );
                })
            );
        });
    }

    createYourProfile(e) {
        e.preventDefault();
        const { hideSteps, showStep } = RegistrationFormUIEvent;

        const missingSteps = this.findMissingSteps();

        if (missingSteps.length > 0) {
            const currentStep = this.FormSteps.setCurrentStepByTitle(
                missingSteps[0].stepTitle
            );
            hideSteps(this.FormSteps.steps);
            showStep(currentStep.selector);
            const inputsToValidate = VALIDATIONS.Inputs.validateInputs(
                currentStep.inputs
            );

            this.toggleErrorMessages(inputsToValidate);
        } else {
            console.log(
                "PROFILE CREATION REQUEST HAS BEEN SEND TO ADMINSTRATIVE"
            );
            //Remove all the error messages from registration form
            RegistrationFormUIEvent.removeAllErrorMessages("error-message");

            //Clear local storage before send the data to server side
            this.FormSteps.steps.map((step) =>
                LocalRepository.removeRepositoryByID(step.stepTitle)
            );
        }
    }

    runOnLoad() {
        let [personalInformationFormData, ademicInformationFormData] =
        this.fetchFromLocalStorageOnLoad();
        const currentStep = this.FormSteps.getCurrentStep();
        const currentStepNumber = this.FormSteps.currentStepNumber;
        const stepsSize = this.FormSteps.steps.length;

        RegistrationFormUIEvent.addStepCountNumberToStep({
            size: stepsSize,
            currentStepNumber: currentStepNumber,
            id: currentStep.selector.id,
        });

        const isThereAnyPersonalInformationFormData =
            Object.keys(personalInformationFormData).length > 0;
        const isThereAnyAcademicInformationFormData =
            Object.keys(ademicInformationFormData).length > 0;

        if (isThereAnyPersonalInformationFormData) {
            personalInformationFormData = {
                ...personalInformationFormData,
                type: "personalInformation",
            };
            this.loadFormDataIntoInput(personalInformationFormData);
        }

        if (isThereAnyAcademicInformationFormData) {
            ademicInformationFormData = {
                ...ademicInformationFormData,
                type: "academicInformation",
            };
            this.loadFormDataIntoInput(ademicInformationFormData);
        } else {
            const studentInput = document.querySelector("#student");
            RegistrationFormUIEvent.addCheckedClassToRadioInput(studentInput);
            studentInput.checked = true;
        }
    }

    selectUserTypeOnClick(input) {
        const self = this;
        input.addEventListener("click", function(e) {
            let currentStep = self.FormSteps.getCurrentStep();
            const staffInputs = document.querySelector("#staff-status");
            const studentInputs = document.querySelector("#student-status");
            if (input.id == "staff") {
                const updatedUserType = currentStep.userType.map((type) => {
                    if (type.type == "staff")
                        return (type = {...type, selected: true });
                    if (type.type === "student")
                        return (type = {...type, selected: false });
                });

                if (!staffInputs.classList.contains("activated")) {
                    staffInputs.classList.add("activated");
                    studentInputs.classList.remove("activated");
                    document
                        .querySelectorAll(".error-message")
                        .forEach((error) => error.remove());
                }
                currentStep.userType = [...updatedUserType];
                self.FormSteps.setCurrentStep(currentStep);
            } else if (input.id === "student") {
                const updatedUserType = currentStep.userType.map((type) => {
                    if (type.type == "student")
                        return (type = {...type, selected: true });
                    if (type.type === "staff")
                        return (type = {...type, selected: false });
                });

                if (!studentInputs.classList.contains("activated")) {
                    studentInputs.classList.add("activated");
                    staffInputs.classList.remove("activated");
                    document
                        .querySelectorAll(".error-message")
                        .forEach((error) => error.remove());
                }
                currentStep.userType = [...updatedUserType];
                self.FormSteps.setCurrentStep(currentStep);
            }
        });
    }

    toggleUserType() {
        const userTypes = document.querySelectorAll("input[name='career']");
        userTypes.forEach(this.selectUserTypeOnClick.bind(this));
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
        this.registrationForm.addEventListener(
            "submit",
            this.createYourProfile.bind(this)
        );
        this.toggleUserType();
        RegistrationFormUIEvent.addActiveClassToRadioInputOnClick();
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
        stepTitle: "personalInformation",
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
                input: Array.from(
                    document.querySelectorAll("input[name='gender']")
                ),
            },
        ],
    },
    {
        stepTitle: "academicInformation",
        selector: document.querySelector("#step-2"),
        isLastStep: false,
        userType: [{
                selected: false,
                type: "staff",
                assoicatedInputs: [{
                        label: "AcademicStatus",
                        input: document.querySelector(
                            "select[name='staff-status']"
                        ),
                    },
                    {
                        label: "RetirementDate",
                        input: document.querySelector(
                            "input[name='retirement-date']"
                        ),
                    },

                    {
                        label: "StaffType",
                        input: document.querySelector(
                            "select[name='staff-type']"
                        ),
                    },
                ],
            },
            {
                selected: true,
                type: "student",
                assoicatedInputs: [{
                        label: "AcademicStatus",
                        input: document.querySelector(
                            "select[name='student-status']"
                        ),
                    },
                    {
                        label: "GraduationDate",
                        input: document.querySelector(
                            "input[name='graduate-date']"
                        ),
                    },

                    {
                        label: "StudentNumber",
                        input: document.querySelector(
                            "input[name='student-number']"
                        ),
                    },
                    {
                        label: "AcademicDegree",
                        input: document.querySelector(
                            "select[name='academic-degree']"
                        ),
                    },
                ],
            },
        ],
        inputs: [{
                label: "AcademicCareer",
                input: Array.from(
                    document.querySelectorAll("input[name='career']")
                ),
            },
            {
                label: "ProfileImage",
                input: document.querySelector("input[name='profile-image']"),
            },
        ],
    },

    {
        stepTitle: "lastStep",
        selector: document.querySelector("#lastStep"),
        isLastStep: true,
    },
];

const registrationForm = new RegistrationFormWithSteps();
registrationForm.subscribe(STEPS);