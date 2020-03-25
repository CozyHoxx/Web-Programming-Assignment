const organizerSignUpButton = document.getElementById('organizer-signUp');
const participantSignUpButton = document.getElementById('participant-signup');
const container = document.getElementById('container');

organizerSignUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

participantSignUpButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});