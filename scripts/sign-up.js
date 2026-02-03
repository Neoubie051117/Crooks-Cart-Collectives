document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('signupForm');
  const clearButton = document.getElementById('clearForm');
  const submitButton = document.querySelector('.submit-btn');

  const emailField = document.getElementById('email');
  const usernameField = document.getElementById('username');
  const passwordField = document.getElementById('password');
  const confirmPasswordField = document.getElementById('confirmPassword');

  const imageFormalPictureUpload = document.getElementById('imageFormalPictureUpload');
  const imageResidencyProofUpload = document.getElementById('imageResidencyProofUpload');
  const imageFormalPicturePreview = document.getElementById('imageFormalPicturePreview');
  const imageResidencyProofPreview = document.getElementById('imageResidencyProofPreview');

  const modal = document.getElementById('notifierModal');
  const modalMessage = document.getElementById('notifierMessage');
  const modalClose = document.getElementById('notifierCloseBtn');

  function showNotifier(message) {
    modalMessage.textContent = message;
    modal.classList.remove('hidden');
  }

  modalClose.addEventListener('click', () => {
    modal.classList.add('hidden');
  });

  function setupImagePreview(input, preview) {
    input.addEventListener('change', () => {
      const file = input.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = () => preview.src = reader.result;
      reader.readAsDataURL(file);
    });
  }

  setupImagePreview(imageFormalPictureUpload, imageFormalPicturePreview);
  setupImagePreview(imageResidencyProofUpload, imageResidencyProofPreview);

  function isEmailValid(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function highlightField(field, highlight = true) {
    field.style.borderColor = highlight ? 'red' : '';
    field.style.boxShadow = highlight ? '0 0 5px red' : '';
  }

  function resetHighlights() {
    form.querySelectorAll('input, select').forEach(field => highlightField(field, false));
  }

  clearButton.addEventListener('click', () => {
    form.reset();
    form.classList.remove('submitted');
    imageFormalPicturePreview.src = '/Barangay-System/assets/Formal-Picture.png';
    imageResidencyProofPreview.src = '/Barangay-System/assets/Valid-id-icon.png';
    resetHighlights();
  });

  submitButton.addEventListener('click', (e) => {
    e.preventDefault();
    form.classList.add('submitted');
    resetHighlights();

    const requiredFields = form.querySelectorAll('input[required], select[required]');
    let isValid = true;
    let message = '';
    let missing = [];

    requiredFields.forEach(field => {
      if (!field.value.trim()) {
        highlightField(field);
        if (!['password', 'confirmPassword'].includes(field.id)) {
          missing.push(field.name || field.id);
        }
        isValid = false;
      }
    });

    if (imageFormalPictureUpload.files.length === 0) {
      highlightField(imageFormalPictureUpload);
      missing.push('Formal Picture');
      isValid = false;
    }

    if (imageResidencyProofUpload.files.length === 0) {
      highlightField(imageResidencyProofUpload);
      missing.push('Proof of Residency');
      isValid = false;
    }

    if (emailField.value && !isEmailValid(emailField.value)) {
      highlightField(emailField);
      message = 'Please enter a valid email address.';
      isValid = false;
    }

    const password = passwordField.value.trim();
    const confirmPassword = confirmPasswordField.value.trim();

    if (!password && !confirmPassword) {
      highlightField(passwordField);
      highlightField(confirmPasswordField);
      message = 'Password and Confirm Password are required.';
      isValid = false;
    } else if (!password) {
      highlightField(passwordField);
      message = 'Please enter your password.';
      isValid = false;
    } else if (!confirmPassword) {
      highlightField(confirmPasswordField);
      message = 'Please confirm your password.';
      isValid = false;
    } else if (password !== confirmPassword) {
      highlightField(passwordField);
      highlightField(confirmPasswordField);
      message = 'Passwords do not match.';
      isValid = false;
    }

    if (!isValid) {
      if (message) {
        showNotifier(message);
      } else if (missing.length === 1) {
        showNotifier(`Missing: ${formatFieldName(missing[0])}`);
      } else {
        showNotifier(`Please complete all required fields.`);
      }
      return;
    }

    const formData = new FormData(form);

    fetch('/Barangay-System/database/sign-up-handler.php', {
  method: 'POST',
  body: formData
})
  .then(res => res.json())
  .then(response => {
    if (response.status === 'success') {
      showNotifier('Registration successful. Present proof at barangay.');
      setTimeout(() => window.location.href = './sign-in.php', 2000);
    } else if (response.message === 'duplicate-email duplicate-username') {
      highlightField(emailField);
      highlightField(usernameField);
      showNotifier('Email and Username already exist.');
    } else if (response.message === 'duplicate-email') {
      highlightField(emailField);
      showNotifier('Email already exists.');
    } else if (response.message === 'duplicate-username') {
      highlightField(usernameField);
      showNotifier('Username already exists.');
    } else {
      showNotifier('Something went wrong. Try again later.');
    }
  })
  .catch(error => {
    console.error('Fetch error:', error);
    showNotifier('Something went wrong. Please check your internet or try again later.');
  });
  });

  function formatFieldName(fieldId) {
    return fieldId.replace(/([A-Z])/g, ' $1').replace(/^\w/, c => c.toUpperCase()).trim();
  }
}); 
