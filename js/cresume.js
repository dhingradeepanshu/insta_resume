var next = document.querySelector('.next');
var next1 = document.querySelector('.next1');
var next2 = document.querySelector('.next2')
var next3 = document.querySelector('.next3')
var card = document.querySelector('.card');
var one = document.querySelector('#cardRight1');
var two = document.querySelector('#cardRight2');
var three = document.querySelector('#cardRight3');
var progressBar = document.querySelector('.progressBar');
var color = document.querySelector('.color')
var stats = document.querySelector('.stats');
var input = document.querySelector("#phone");




next.addEventListener('click', () => {
  card.style.animation = '1s swoopOutone forwards';
  one.style.animation = '1s swoopIn forwards';
  stats.textContent = "33%";
  color.style.animation = '1s progress33 forwards';
})

next1.addEventListener('click', () => {
  one.style.animation = '1s swoopOut forwards';
  two.style.animation = '1s swoopIn forwards';
  stats.textContent = '66%';
  color.style.animation = '1s progress66 forwards';
})

next2.addEventListener('click', () => {
  two.style.animation = '1s swoopOut forwards';
  three.style.animation = '1s swoopIn forwards';
  stats.textContent = '100%';
  color.style.animation = '1s progress100 forwards';

})
