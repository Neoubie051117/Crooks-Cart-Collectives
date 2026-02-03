document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('notifierModal');
  const modalMessage = document.getElementById('notifierMessage');
  const modalClose = document.getElementById('notifierCloseBtn');
  const form = document.getElementById('loginForm');

  let isModalOpen = false;

  function showNotifier(message) {
    if (isModalOpen) return;
    modalMessage.textContent = message;
    modal.classList.remove('hidden');
    isModalOpen = true;
  }

  modalClose.addEventListener('click', (e) => {
    e.preventDefault(); // important: prevent default form behavior
    modal.classList.add('hidden');
    isModalOpen = false;
    usernameOrEmail.blur();
loginPassword.blur();

  });

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    if (form.dataset.submitting) return;
    form.dataset.submitting = "true";

    const usernameOrEmail = document.getElementById('usernameOrEmail');
    const loginPassword = document.getElementById('loginPassword');

    if (!usernameOrEmail.value.trim() || !loginPassword.value) {
      showNotifier('All fields are required');
      delete form.dataset.submitting;
      return;
    }

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
          usernameOrEmail: usernameOrEmail.value.trim(),
          loginPassword: loginPassword.value
        })
      });

      const responseText = await response.text();
      let data;

      try {
        data = JSON.parse(responseText);
      } catch (err) {
        throw new Error('Unexpected response from server');
      }

      if (response.ok && data.status === 'success') {
        window.location.href = data.redirectPath;
      } else {
        showNotifier(data.message || 'Login failed');
      }

    } catch (error) {
      console.error('Login error:', error);
      showNotifier(error.message || 'Unexpected error');
    } finally {
      delete form.dataset.submitting;
    }
  });
});
