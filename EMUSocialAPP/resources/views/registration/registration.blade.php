<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>


    {{-- Default Styles for app --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Styles for registration page --}}
    <link rel="stylesheet" href="{{ asset('assets/css/registration.css') }}">
</head>

<body>

    <div class="container">
        <form class="registration-form">
            <div id="step-1" class="personal-information-step step show">
                <div class="step-image">
                    <img src="">
                </div>
                <div class="step-content">
                    <div class="step-count">
                        Step 1 of 3
                    </div>
                    <div class="step-header">
                        <h2 class="step-title">Personal Information</h2>
                        <p class="step-description">Enter your personal details to show them of an your profile</p>
                    </div>
                    <div class="step-form">
                        <div class="step-row">
                            <div class="step-label">
                                <label>First Name</label>
                                <input type="text" class="step-input">
                                <p class="error-message">Firstname field is required*</p>
                            </div>
                            <div class="step-label">
                                <label>Last Name</label>
                                <input type="text" class="step-input">
                                <p class="error-message">Lastname field is required*</p>
                            </div>
                        </div>
                        <div class="step-row">
                            <div class="step-label">
                                <label>Email</label>
                                <input type="text" class="step-input">
                                <p class="error-message">Email field is required*</p>
                            </div>
                            <div class="step-label">
                                <label>Country</label>
                                <select>
                                    <option>Cyprus (CY)</option>
                                </select>
                                <p class="error-message">Lastname field is required*</p>
                            </div>
                        </div>
                        <div class="step-row">
                            <div class="step-label">
                                <label>Password</label>
                                <input type="password" class="step-input">
                                <p class="error-message">Password field is required*</p>
                            </div>
                            <div class="step-label">
                                <label>Date of birth</label>
                                <input type="date" class="step-input">
                                <p class="error-message">DOB field is required*</p>
                            </div>
                        </div>
                        <div class="step-row">
                            <div class="step-label">
                                <div class="label">Gender</div>
                                <label>
                                    <div class="gender-logo female">
                                        <img src="">
                                        <input type="radio" name="gender" value="female">
                                    </div>

                                </label>
                                <label>
                                    <div class="gender-logo male">
                                        <img src="">
                                        <input type="radio" name="gender" value="male">
                                    </div>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="step-2" class="personal-information-step step">
                <div class="step-image">
                    <img src="">
                </div>
                <div class="step-content">
                    <div class="step-count">
                        Step 2 of 3
                    </div>
                    <div class="step-header">
                        <h2 class="step-title">Account Information</h2>
                        <p class="step-description">Enter your personal details to show them of an your profile</p>
                    </div>
                    <div class="step-form">
                        <div class="step-row">
                            <div class="step-label">
                                <label>First Name</label>
                                <input type="text" class="step-input">
                                <p class="error-message">Firstname field is required*</p>
                            </div>
                            <div class="step-label">
                                <label>Last Name</label>
                                <input type="text" class="step-input">
                                <p class="error-message">Lastname field is required*</p>
                            </div>
                        </div>
                        <div class="step-row">
                            <div class="step-label">
                                <label>Email</label>
                                <input type="text" class="step-input">
                                <p class="error-message">Email field is required*</p>
                            </div>
                            <div class="step-label">
                                <label>Country</label>
                                <select>
                                    <option>Cyprus (CY)</option>
                                </select>
                                <p class="error-message">Lastname field is required*</p>
                            </div>
                        </div>
                        <div class="step-row">
                            <div class="step-label">
                                <label>Password</label>
                                <input type="password" class="step-input">
                                <p class="error-message">Password field is required*</p>
                            </div>
                            <div class="step-label">
                                <label>Date of birth</label>
                                <input type="date" class="step-input">
                                <p class="error-message">DOB field is required*</p>
                            </div>
                        </div>
                        <div class="step-row">
                            <div class="step-label">
                                <div class="label">Gender</div>
                                <label>
                                    <div class="gender-logo female">
                                        <img src="">
                                        <input type="radio" name="gender" value="female">
                                    </div>

                                </label>
                                <label>
                                    <div class="gender-logo male">
                                        <img src="">
                                        <input type="radio" name="gender" value="male">
                                    </div>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="step-3" class="personal-information-step step">
                <div class="step-image">
                    <img src="">
                </div>
                <div class="step-content">
                    <div class="step-count">
                        Step 3 of 3
                    </div>
                    <div class="step-header">
                        <h2 class="step-title">Create your profile</h2>
                        <p class="step-description">Enter your personal details to show them of an your profile</p>
                    </div>
                    <div class="step-form">
                        <div class="step-row">
                            <div class="step-label">
                                <label>First Name</label>
                                <input type="text" class="step-input">
                                <p class="error-message">Firstname field is required*</p>
                            </div>
                            <div class="step-label">
                                <label>Last Name</label>
                                <input type="text" class="step-input">
                                <p class="error-message">Lastname field is required*</p>
                            </div>
                        </div>
                        <div class="step-row">
                            <div class="step-label">
                                <label>Email</label>
                                <input type="text" class="step-input">
                                <p class="error-message">Email field is required*</p>
                            </div>
                            <div class="step-label">
                                <label>Country</label>
                                <select>
                                    <option>Cyprus (CY)</option>
                                </select>
                                <p class="error-message">Lastname field is required*</p>
                            </div>
                        </div>
                        <div class="step-row">
                            <div class="step-label">
                                <label>Password</label>
                                <input type="password" class="step-input">
                                <p class="error-message">Password field is required*</p>
                            </div>
                            <div class="step-label">
                                <label>Date of birth</label>
                                <input type="date" class="step-input">
                                <p class="error-message">DOB field is required*</p>
                            </div>
                        </div>
                        <div class="step-row">
                            <div class="step-label">
                                <div class="label">Gender</div>
                                <label>
                                    <div class="gender-logo female">
                                        <img src="">
                                        <input type="radio" name="gender" value="female">
                                    </div>

                                </label>
                                <label>
                                    <div class="gender-logo male">
                                        <img src="">
                                        <input type="radio" name="gender" value="male">
                                    </div>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <button id="back-btn" type="button" class="back-btn steps-btns">Back</button>
        <button id="next-btn" type="button" class="next-btn steps-btns">Continue</button>
    </div>

</body>

<script>
    //Object for holding all the input data in each steps (for submitting at the end)
    let inputs = {}


    const STEPS = [
        document.querySelector("#step-1"), document.querySelector("#step-2"), document.querySelector("#step-3")
    ];

    const STEPS_COUNT = STEPS.length - 1
    let currentStep = 0;

    const nextButton = document.querySelector("#next-btn");
    const backButton = document.querySelector("#back-btn");


    const showBtn = (btn) => {
        btn.disabled = false;
        btn.classList.add("show")
    }

    const hideBtn = (btn) => {
        btn.disabled = true;
        btn.classList.remove("show")
    }

    //Hide and disable back button as default (on first step)
    hideBtn(backButton)

    const hideAllSteps = () => STEPS.forEach(element => element.classList.remove("show"));

    const setCurrentStep = (currentStep) => {
        hideAllSteps();
        STEPS[currentStep].classList.add("show")
    }

    const goNextStep = () => {
        currentStep++;
        if (currentStep > 0) showBtn(backButton)
        if (currentStep == STEPS_COUNT) hideBtn(nextButton)
        setCurrentStep(currentStep)
    }

    const goPreviousStep = () => {
        currentStep--;
        if (currentStep === 0) hideBtn(backButton)
        if (currentStep <= STEPS_COUNT) showBtn(nextButton)
        setCurrentStep(currentStep)
    }

    //Event listeners
    nextButton.addEventListener("click", goNextStep)
    backButton.addEventListener("click", goPreviousStep)
</script>




</html>
