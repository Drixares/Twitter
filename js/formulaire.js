const signBtn = document.getElementById('signupBtn');
const loginBtn = document.getElementById('loginBtn');
const closeBtn = document.querySelectorAll('.closeForm');
console.log(signBtn, loginBtn, closeBtn);

signBtn.addEventListener('click', () => {
  document.getElementById('signupForm').classList.add('active')
  document.querySelector('.container').classList.add('inactive')
})

loginBtn.addEventListener('click', () => {
  document.getElementById('loginForm').classList.add('active')
  document.querySelector('.container').classList.add('inactive')
})

closeBtn.forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelector('.formBox.active').classList.remove('active')
    document.querySelector('.container').classList.remove('inactive')
  })
})