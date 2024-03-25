const divInput = document.getElementById('createTweetBox__inputBox__tweetInput');
const tweetContent = document.getElementById('tweetContent');
const optionBtn = document.querySelectorAll('.tweet__header__more');

divInput.addEventListener('focus', function() {
  if (this.textContent === 'Quoi de neuf ?!') {
      this.textContent = '';
      this.classList.remove('placeholder');
  }
});

divInput.addEventListener('blur', function() {
  if (this.textContent === '') {
      this.textContent = 'Quoi de neuf ?!';
      this.classList.add('placeholder');
  }
});

divInput.addEventListener('input', function() {
  tweetContent.value = this.textContent;
});

optionBtn.forEach((btn) => {
  btn.addEventListener('click', () => {
    document.querySelector(`.tweet__header__more__options[data-id="${btn.getAttribute('data-id')}"]`).classList.toggle('visible');
  });
});