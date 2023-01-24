async function getUserByID(id) {
    const userApiResponse = await fetch(
        `http://127.0.0.1:8000/api/admin/accounts/${id}`
    );

    const data = await userApiResponse.json();
    let user = data.user;

    if (user.userType == "staff") {
        const { staff } = await getStaffByUserID(id);
        user = {...user, ...staff };
    } else if (user.userType == "student") {
        const { student } = await getStudentByUserID(id);
        user = {...user, ...student };
    }

    openEditModal(id, user);
}

async function getStudentByUserID(userID) {
    const studentAPIResponse = await fetch(
        `http://127.0.0.1:8000/api/admin/students/${userID}`
    );
    const data = await studentAPIResponse.json();
    return data;
}

async function getStaffByUserID(userID) {
    const staffAPIResponse = await fetch(
        `http://127.0.0.1:8000/api/admin/staffs/${userID}`
    );
    const data = await staffAPIResponse.json();
    return data;
}

function openEditModal(id, user) {
    const editUserModal = document.querySelector("#edit-user-modal");
    const currentUserEditBtn = document.getElementById(`user-edit-btn-${id}`);
    currentUserEditBtn.setAttribute("data-target", "#edit-user-modal");
    currentUserEditBtn.setAttribute("data-toggle", "modal");
    const modalContent = editUserModal.querySelector("#modal-content-details");
    modalContent.innerHTML = "";
    const registrationDate = new Date(user.registeredAt).toLocaleDateString();

    let userType = user.userType;

    const content = `  <div id="modal-content-${
        user._id
    }" class="modal-content">
<div class="modal-header">
    <div id="user-profile-image" class="profile-image-container"><img
            src="${user.profileImage}"
            alt="" class="profile-image">
    </div>
    <div class="user-detail">
        <div id="user-status" class="user-status ${
            user.isActive ? "active" : "pending"
        }">${
        user.isActive
            ? `<span><i class="fa fa-circle" aria-hidden="true"></i>
        Active</span>`
            : `<span><i class="fa fa-circle" aria-hidden="true"></i>
        Pending</span>`
    }</div>
        <h2 id="user-fullname" class="full-name">${user.firstname} ${
        user.lastname
    }</h2>
        <div class="registration-details">
            <div class="registration-detail-label">Registration Date</div>
            <div id="user-register-date" class="registration-date">${registrationDate}</div>
        </div>
        <div class="edit-actions">
            <button class="remove-btn">Remove</button>
            <button id="edit-${user._id}" class="edit-btn">Edit</button>
        </div>
    </div>
    <div class="close-btn">
        <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<div class="main-content">
<form action="">
<div class="edit-modal-row">
    <div class="edit-modal-col">
        <div class="col-title">Personal Information</div>
        <div class="double-col">
         <div class="edit-content">
                <label for="" class="edit-input-label">Firstname</label>
                <input id="edit-firstname" type="text" value="${
                    user.firstname
                }" disabled class="edit-input">
            </div>
            <div class="edit-content">
            <label for="" class="edit-input-label">Lastname</label>
            <input id="edit-lastname"  type="text" value="${
                user.lastname
            }" disabled class="edit-input">
        </div>
            <div class="edit-content">
                <label for="" class="edit-input-label">Date Of Birth</label>
                <input id="edit-dob"  type="date" value="${moment(
                    user.dob
                ).format("YYYY-MM-DD")}" disabled class="edit-input">
            </div>
            <div class="edit-content">
                <label for="" class="edit-input-label">Email Address</label>
                <input id="edit-email"  type="email" value="${
                    user.email
                }" disabled class="edit-input">
            </div>
            <div class="edit-content">
                <label for="" class="edit-input-label">Country</label>
                <select id="edit-country"  class="edit-input" disabled>
                    <option ${
                        user.country == "cyprus" ? "selected" : "   "
                    } value="turkey">Turkey</option>
                    <option value="cyprus" ${
                        user.country == "cyprus" ? "selected" : "   "
                    }>Cyprus</option>
                </select>
            </div>
            <div class="edit-content">
                <label for="" class="edit-input-label">Gender</label>
                <select id="edit-gender"  class="edit-input" disabled>
                <option ${
                    user.gender == "male" ? "selected" : "   "
                } value="turkey">Male</option>
                <option value="cyprus" ${
                    user.gender == "female" ? "selected" : "   "
                }>Female</option>
                </select>

            </div>
        </div>
    </div>
    <div class="edit-modal-col">
        <div class="col-title">Academic Information</div>
       
            <div class="edit-content">
                <label for="" class="edit-input-label">Academic Career</label>
                <select id="edit-userType" disabled>
                    <option value="staff" ${
                        user.userType == "staff" ? "selected" : ""
                    }>Staff</option>
                    <option value="student" ${
                        user.userType == "student" ? "selected" : ""
                    }>Student</option>
                </select>
            </div>
            <div id="stateful-user-type"></div>
      
    </div>
    <div class="edit-modal-col">
        <div class="col-title">Adminstrative Information</div>
        <div class="double-col">
            <div class="edit-content">
                <label for="" class="edit-input-label ">Activated By</label>
               <p class="perma-data">${
                   user.isActive && user.activatedById
                       ? user.activatedById.firstname +
                         " " +
                         user.activatedById.lastname
                       : "-"
               }  </p>
            </div>
            <div class="edit-content">
                <label for="" class="edit-input-label ">Updated By</label>
                <p  class="perma-data">${
                    user.editedById
                        ? user.editedById.firstname +
                          " " +
                          user.editedById.lastname
                        : "-"
                }  </p>
            </div>

        </div>
        <div class="double-col">
            <div class="edit-content">
                <label for="" class="edit-input-label ">Activation Date</label>
                <p  class="perma-data">${
                    user.isActive && user.activatedAt
                        ? moment(user.activatedAt).format("YYYY-MM-DD")
                        : "-"
                }  </p>
            </div>
            <div class="edit-content">
                <label for="" class="edit-input-label ">Account Status</label>
                <p class="perma-data">${
                    user.isActive ? "Active" : "Pending"
                }</p>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" id="activation" class="activation-btn ${
        user.isActive ? "deactivate" : "activate"
    }">${user.isActive ? "DeActivate" : "Activate"}</button>
   <div> <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
   <button type="button" id="update-btn" class="btn btn-save-changes">Save
       Changes</button></div>
</div>
</form>
</div>
</div>`;
    modalContent.insertAdjacentHTML("beforeend", content);
    const statefulUserType = document.querySelector("#stateful-user-type");
    getAssociatedUserTypeFields(user, userType, statefulUserType);
    const currentUserEditModalContent = document.getElementById(
        `modal-content-${user._id}`
    );
    const editUserBtn = currentUserEditModalContent.querySelector(
        `#edit-${user._id}`
    );

    editUserBtn.addEventListener("click", toggleEditFields);
    const enableFormFields = (formElementTypes) => {
        return formElementTypes.forEach((elementType) => {
            const allInputs =
                currentUserEditModalContent.querySelectorAll(elementType);
            return allInputs.forEach((input) => {
                if (!input.disabled) {
                    input.setAttribute("disabled", true);
                } else {
                    input.removeAttribute("disabled");
                }
            });
        });
    };

    const selectionType = document.querySelector("#edit-userType");
    selectionType.addEventListener("change", function (e) {
        const selectedValue =
            e.target[e.target.options.selectedIndex].innerText.toLowerCase();
        userType = selectedValue;
        getAssociatedUserTypeFields(
            user,
            userType,
            statefulUserType,
            selectedValue
        );
    });

    function toggleEditFields() {
        enableFormFields(["input", "select"]);
    }

    const toggleActivationButton = document.querySelector("#activation");
    toggleActivationButton.addEventListener("click", function () {
        console.log(this);
        if (
            this.innerText == "Activate" &&
            this.classList.contains("activate")
        ) {
            this.innerText = "DeActivate";
            this.classList.remove("activate");
            this.classList.add("deactivate");
        } else if (
            this.innerText == "DeActivate" &&
            this.classList.contains("deactivate")
        ) {
            this.classList.remove("deactivate");
            this.classList.add("activate");
            this.innerText = "Activate";
        }
        const URL = `http://localhost:8000/api/admin/toggle-activation-user/${id}`;
        return $.ajax({
            url: URL,
            cache: false,
            contentType: false,
            crossDomain: true,
            processData: false,
            xhrFields: {
                withCredentials: true,
            },
            data: {},
            type: "POST",
            success: async function (response) {
                Swal.fire({
                    position: "top-center",
                    icon: "success",
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                }).then(async () => {
                    await getUserByID(id);
                    $(document).on(
                        "hide.bs.modal",
                        "#edit-user-modal",
                        function () {
                            return (window.location = `http://127.0.0.1:8000/admin/accounts`);
                        }
                    );
                });
            },
            error: function (error) {
                if (
                    error.responseJSON &&
                    error.responseJSON.errors &&
                    error.responseJSON.errors.error
                ) {
                    return Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        html: error.responseJSON.errors.error.map(
                            (errorMessage) =>
                                `<p style="font-weight:bold;">${errorMessage}</p>`
                        ),
                    });
                }

                console.log(error);
            },
        });
    });

    submitUpdateForm(id);
}

function submitUpdateForm(userId) {
    const updateBtn = document.getElementById("update-btn");
    updateBtn.addEventListener("click", function () {
        //GET FIELDS
        const firstname = document.querySelector("#edit-firstname");
        const lastname = document.querySelector("#edit-lastname");
        const email = document.querySelector("#edit-email");
        const country = document.querySelector("#edit-country");
        const dob = document.querySelector("#edit-dob");
        const gender = document.querySelector("#edit-gender");
        const userType = document.querySelector("#edit-userType");

        let formData = new FormData();
        if (firstname.value != "")
            formData.append("firstname", firstname.value);
        if (lastname.value != "") formData.append("lastname", lastname.value);
        if (email.value != "") formData.append("email", email.value);
        if (dob.value != "") formData.append("dob", dob.value);
        if (gender.value != "") formData.append("gender", gender.value);
        if (country.value != "") formData.append("country", country.value);
        if (userType.value != "") formData.append("userType", userType.value);

        if (userType.value == "staff") {
            //Staff
            const retirementDate = document.querySelector(
                "#edit-retirementDate"
            );
            const staffType = document.querySelector("#edit-staffType");
            const retirementStatus = document.querySelector(
                "#edit-retirementStatus"
            );

            if (retirementDate.value != "")
                formData.append("retirementDate", retirementDate.value);
            // formData.retirementDate = retirementDate.value;
            if (staffType.value != "")
                formData.append("staffType", staffType.value);
            if (retirementStatus.value != "")
                formData.append(
                    "isRetired",
                    retirementStatus.value == "notRetired" ? false : true
                );
        } else if (userType.value == "student") {
            //Student
            const graduationDate = document.querySelector("#edit-graduateDate");
            const graduationStatus = document.querySelector(
                "#edit-graduationStatus"
            );
            const degreeType = document.querySelector("#edit-degreeType");
            const studentNo = document.querySelector("#edit-studentNumber");

            if (graduationDate.value != "")
                formData.append("graduationDate", graduationDate.value);
            if (studentNo.value != "")
                formData.append("studentNumber", studentNo.value);
            if (degreeType.value != "")
                formData.append("degreeType", degreeType.value);
            if (graduationStatus.value != "")
                formData.append(
                    "isGraduated",
                    graduationStatus.value == "notGraduated" ? false : true
                );
        }

        const URL = `http://localhost:8000/api/admin/update-user/${userId}`;
        return $.ajax({
            url: URL,
            cache: false,
            contentType: false,
            crossDomain: true,
            processData: false,
            xhrFields: {
                withCredentials: true,
            },
            data: formData,
            type: "POST",
            success: async function (response) {
                Swal.fire({
                    position: "top-center",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500,
                }).then(async () => {
                    await getUserByID(userId);
                    $(document).on(
                        "hide.bs.modal",
                        "#edit-user-modal",
                        function () {
                            return (window.location = `http://127.0.0.1:8000/admin/accounts`);
                        }
                    );
                });
            },
            error: function (error) {
                if (
                    error.responseJSON &&
                    error.responseJSON.errors &&
                    error.responseJSON.errors.error
                ) {
                    console.log(error);
                    return Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        html: error.responseJSON.errors.error.map(
                            (errorMessage) =>
                                `<p style="font-weight:bold;">${errorMessage}</p>`
                        ),
                    });
                }

                console.log(error);
            },
        });
    });
}

function getAssociatedUserTypeFields(user, userType, statefulUserType) {
    statefulUserType.innerHTML = "";
    const disableFormFields = () => {
        return ["input", "select"].forEach((elementType) => {
            const allInputs = document.querySelectorAll(elementType);
            return allInputs.forEach((input) => {
                input.setAttribute("disabled", true);
            });
        });
    };

    if (userType == "student") {
        const studentInputFields = `
        <div class="edit-content">
                <label for="" class="edit-input-label">Graduate Date</label>
                <input id="edit-graduateDate" type="date" value=${moment(
                    user.graduationDate
                ).format("YYYY-MM-DD")} ${
            userType == user.userType ? "disabled" : ""
        } class="edit-input">
            </div>
            <div class="edit-content">
                <label for="" class="edit-input-label">Graduation Status</label>
                <select id="edit-graduationStatus" ${
                    userType == user.userType ? "disabled" : ""
                }>
                    <option value="graduated" ${
                        user.isGraduated ? "selected" : ""
                    }>Graduated</option>
                    <option value="notGraduated" ${
                        !user.isGraduated ? "selected" : ""
                    }>Not Graduated</option>
                </select>
            </div>
            <div class="edit-content">
                <label for="" class="edit-input-label">Academic Degree</label>
               <select id="edit-degreeType" ${
                   userType == user.userType ? "disabled" : ""
               }>
               <option value="masters" ${
                   user.degreeType == "masters" ? "selected" : ""
               }>Masters</option>
            <option value="doctorate" ${
                user.degreeType == "doctorate" ? "selected" : ""
            }>Doctorate</option>
            <option value="associate" ${
                user.degreeType == "associate" ? "selected" : ""
            }>Associate</option>
              
               <option value="bachelor" ${
                   user.degreeType == "bachelor" ? "selected" : ""
               }>Bachelor</option>
               </select>
            </div>
            <div class="edit-content">
            <label for="" class="edit-input-label">Student No</label>
            <input id="edit-studentNumber" type="text" value=${
                user.studentNumber ? parseInt(user.studentNumber, 10) : ""
            } disabled class="edit-input">
        </div>
    `;
        statefulUserType.insertAdjacentHTML("beforeend", studentInputFields);
        disableFormFields();
    } else if (userType == "staff") {
        const staffInputFields = `
        <div class="edit-content">
                    <label for="" class="edit-input-label">Retirement Date</label>
                    <input id="edit-retirementDate" type="date" ${
                        userType == user.userType ? "disabled" : ""
                    } value=${moment(user.retirementDate).format(
            "YYYY-MM-DD"
        )} />
                </div>
        <div class="edit-content">
            <label for="" class="edit-input-label">Retirement Status</label>
            <select id="edit-retirementStatus" ${
                userType == user.userType ? "disabled" : ""
            }>
            <option value="retired" ${
                user.isRetired ? "selected" : ""
            }>Retired</option>
            <option value="notRetired" ${
                !user.isRetired ? "selected" : ""
            }>Not Retired</option>
        </select>
        </div>
        <div class="edit-content">
            <label for="" class="edit-input-label">Staff Type</label>
            <select id="edit-staffType" ${
                userType == user.userType ? "disabled" : ""
            }>
            <option value="servant" ${
                user.staffType == "servant" ? "selected" : ""
            }>Servant</option>
            <option value="notRetired" ${
                user.staffType == "instructor" ? "selected" : ""
            }>Instructor</option>
        </select>
        </div>
    `;
        statefulUserType.insertAdjacentHTML("beforeend", staffInputFields);
        disableFormFields();
    }
}