/* Display popup */
document.addEventListener("click", function (event) {
    const popupOverlay = document.querySelector('.popup-overlay');

    if (event.target === popupOverlay) {
        popupOverlay.style.display = "none";
    }
});

// Define variable "currentId" to assign value
let currentUserId;

const openPopupButtons = document.querySelectorAll('.open-popup-button');
const popupOverlay = document.querySelector('.popup-overlay');
openPopupButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        const userId = this.getAttribute('data-id');
        const userName = document.querySelector('.name[data-id="' + userId + '"]').textContent;
        const role = document.querySelector('.role[data-id="' + userId + '"]').textContent;

        const popupUserName = document.querySelector('input[name="username"]');
        const popupNewPassword = document.querySelector('input[name="new-password"]');
        const popupRole = document.querySelector('#role');
        const popupUserId = document.querySelector('input[name="userid"]');

        currentUserId = userId; // Assign the value of userId to currentUserId

        popupUserId.value = currentUserId;
        popupUserName.value = userName;
        popupNewPassword.value = '';
        popupRole.value = role;

        popupOverlay.style.display = "block";
    });
});

/* Save button click event */
const saveButton = document.querySelector('.save-button');
const editUserForm = document.getElementById('edit-user-form');

saveButton.addEventListener('click', function (event) {
    event.preventDefault();

    const formData = new FormData(editUserForm);
    formData.append('_method', 'POST');

    const currentUserId = document.querySelector('input[name="userid"]').value;
    console.log(currentUserId)
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/manage/update-user/' + currentUserId, true);
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
    xhr.onload = function () {
        if (xhr.status === 200) {
            popupOverlay.style.display = 'none';
            location.reload();
        } else {
            console.error('Failed to update user');
        }
    };
    xhr.onerror = function () {
        console.error('An error occurred');
    };
    xhr.send(formData);
});