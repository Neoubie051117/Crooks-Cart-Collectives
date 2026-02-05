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

  let isModalOpen = false;
  let isSubmitting = false;

  function showNotifier(message) {
    if (isModalOpen) return;
    modalMessage.textContent = message;
    modal.classList.remove('hidden');
    isModalOpen = true;
  }

  function closeNotifier() {
    modal.classList.add('hidden');
    isModalOpen = false;
  }

  modalClose.addEventListener('click', closeNotifier);

  function setupImagePreview(input, preview) {
    input.addEventListener('change', () => {
      const file = input.files[0];
      if (!file) return;
      
      // Validate file size (max 5MB)
      const maxSize = 5 * 1024 * 1024; // 5MB
      if (file.size > maxSize) {
        showNotifier('File size too large. Maximum size is 5MB.');
        input.value = ''; // Clear the file input
        return;
      }
      
      // Validate file type
      const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
      if (!validTypes.includes(file.type)) {
        showNotifier('Invalid file type. Please upload JPG, PNG, or GIF images only.');
        input.value = ''; // Clear the file input
        return;
      }
      
      const reader = new FileReader();
      reader.onload = () => {
        preview.src = reader.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    });
  }

  setupImagePreview(imageFormalPictureUpload, imageFormalPicturePreview);
  setupImagePreview(imageResidencyProofUpload, imageResidencyProofPreview);

  function isEmailValid(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function isPasswordValid(password) {
    // At least 8 characters, with at least one uppercase, one lowercase, and one number
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test(password);
  }

  function highlightField(field, highlight = true, message = '') {
    field.style.borderColor = highlight ? '#e74c3c' : '';
    field.style.boxShadow = highlight ? '0 0 0 2px rgba(231, 76, 60, 0.2)' : '';
    
    // Remove existing error message
    const existingError = field.parentNode.querySelector('.field-error');
    if (existingError) {
      existingError.remove();
    }
    
    // Add error message if provided
    if (highlight && message) {
      const errorDiv = document.createElement('div');
      errorDiv.className = 'field-error';
      errorDiv.textContent = message;
      errorDiv.style.color = '#e74c3c';
      errorDiv.style.fontSize = '12px';
      errorDiv.style.marginTop = '4px';
      field.parentNode.appendChild(errorDiv);
    }
  }

  function resetHighlights() {
    form.querySelectorAll('input, select').forEach(field => {
      highlightField(field, false);
      const error = field.parentNode.querySelector('.field-error');
      if (error) error.remove();
    });
  }

  clearButton.addEventListener('click', () => {
    form.reset();
    form.classList.remove('submitted');
    resetHighlights();
    
    // Reset to default images using correct relative paths
    const currentPath = window.location.pathname;
    let prefix = "";
      
    if (currentPath.includes('/pages/sign-up.php')) {
        prefix = "../";
    }
    
    imageFormalPicturePreview.src = prefix + 'assets/Formal-Picture.png';
    imageResidencyProofPreview.src = prefix + 'assets/Valid-id-icon.png';
  });

  function validateForm() {
    let isValid = true;
    let errorMessage = '';
    resetHighlights();

    // Validate required fields
    const requiredFields = form.querySelectorAll('input[required], select[required]');
    requiredFields.forEach(field => {
      if (!field.value.trim()) {
        highlightField(field, true, 'This field is required');
        isValid = false;
      }
    });

    // Validate image uploads
    if (imageFormalPictureUpload.files.length === 0) {
      highlightField(imageFormalPictureUpload, true, 'Formal picture is required');
      isValid = false;
    }

    if (imageResidencyProofUpload.files.length === 0) {
      highlightField(imageResidencyProofUpload, true, 'Proof of residency is required');
      isValid = false;
    }

    // Validate email
    if (emailField.value && !isEmailValid(emailField.value)) {
      highlightField(emailField, true, 'Please enter a valid email address');
      isValid = false;
    }

    // Validate password
    const password = passwordField.value.trim();
    const confirmPassword = confirmPasswordField.value.trim();

    if (password && !isPasswordValid(password)) {
      highlightField(passwordField, true, 'Password must be at least 8 characters with uppercase, lowercase, and number');
      isValid = false;
    }

    if (password && confirmPassword && password !== confirmPassword) {
      highlightField(passwordField, true, 'Passwords do not match');
      highlightField(confirmPasswordField, true, 'Passwords do not match');
      isValid = false;
    }

    // Validate contact number (Philippines format)
    const contactField = document.getElementById('contact');
    if (contactField.value) {
      const contactRegex = /^(09|\+639)\d{9}$/;
      const cleanContact = contactField.value.replace(/\s+/g, '');
      if (!contactRegex.test(cleanContact)) {
        highlightField(contactField, true, 'Please enter a valid Philippine mobile number (09XXXXXXXXX or +639XXXXXXXXX)');
        isValid = false;
      }
    }

    return isValid;
  }

  function formatFieldName(fieldId) {
    return fieldId.replace(/([A-Z])/g, ' $1').replace(/^\w/, c => c.toUpperCase()).trim();
  }

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    
    if (isSubmitting) return;
    
    form.classList.add('submitted');
    
    if (!validateForm()) {
      showNotifier('Please fix the errors in the form before submitting.');
      return;
    }
    
    isSubmitting = true;
    submitButton.disabled = true;
    submitButton.textContent = 'Submitting...';
    
    const formData = new FormData(form);
    
    // Determine the correct path for the API endpoint
    const currentPath = window.location.pathname;
    let apiUrl = 'database/sign-up-handler.php';
    
    if (currentPath.includes('/pages/')) {
      apiUrl = '../database/sign-up-handler.php';
    }
    
    fetch(apiUrl, {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then(response => {
      if (response.status === 'success') {
        showNotifier('Registration successful! Please present your proof at the barangay office for verification.');
        
        // Redirect to sign-in page after 3 seconds
        setTimeout(() => {
          const redirectPath = currentPath.includes('/pages/') ? './sign-in.php' : 'pages/sign-in.php';
          window.location.href = redirectPath;
        }, 3000);
        
      } else if (response.message === 'duplicate-email duplicate-username') {
        highlightField(emailField, true, 'Email already registered');
        highlightField(usernameField, true, 'Username already taken');
        showNotifier('Both email and username are already registered.');
        
      } else if (response.message === 'duplicate-email') {
        highlightField(emailField, true, 'Email already registered');
        showNotifier('This email address is already registered.');
        
      } else if (response.message === 'duplicate-username') {
        highlightField(usernameField, true, 'Username already taken');
        showNotifier('This username is already taken.');
        
      } else {
        showNotifier(response.message || 'Something went wrong. Please try again later.');
      }
    })
    .catch(error => {
      console.error('Fetch error:', error);
      showNotifier('Network error. Please check your internet connection and try again.');
    })
    .finally(() => {
      isSubmitting = false;
      submitButton.disabled = false;
      submitButton.textContent = 'Submit';
    });
  });

  // Add input validation on blur for better UX
  emailField.addEventListener('blur', () => {
    if (emailField.value && !isEmailValid(emailField.value)) {
      highlightField(emailField, true, 'Please enter a valid email address');
    }
  });

  passwordField.addEventListener('blur', () => {
    if (passwordField.value && !isPasswordValid(passwordField.value)) {
      highlightField(passwordField, true, 'Password must be at least 8 characters with uppercase, lowercase, and number');
    }
  });

  confirmPasswordField.addEventListener('blur', () => {
    if (passwordField.value && confirmPasswordField.value && passwordField.value !== confirmPasswordField.value) {
      highlightField(confirmPasswordField, true, 'Passwords do not match');
    }
  });

  // Clear error on focus
  form.querySelectorAll('input, select').forEach(field => {
    field.addEventListener('focus', () => {
      highlightField(field, false);
    });
  });
});