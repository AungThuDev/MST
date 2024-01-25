function resetOtherElements(clickedElement) {
  const allQuestions = document.querySelectorAll('.question');

  allQuestions.forEach((element) => {
    if (element !== clickedElement) {
      const icon = element.querySelector('i');
      const question = element.querySelector('p');

      icon.classList.remove('fa-xmark');
      icon.classList.add('fa-plus');

      element.style.backgroundColor = "#ffffff";
      question.style.color = '#000000';
    }
  });
}

function clickQuestion(event) {
  const clickedElement = event.currentTarget;
  const icon = clickedElement.querySelector('i');
  const question = clickedElement.querySelector('p');
  const div = clickedElement.querySelector('.question');
  
  if (icon.classList.contains('fa-plus')) {
    resetOtherElements(clickedElement);

    icon.classList.remove('fa-plus');
    icon.classList.add('fa-xmark');

    div.style.backgroundColor = "#36348e";
    question.style.color = '#ffffff';
  } else {
    icon.classList.remove('fa-xmark');
    icon.classList.add('fa-plus');

    div.style.backgroundColor = "#ffffff";
    question.style.color = '#000000';
  }
}

window.addEventListener('scroll', function() {
  var element = document.querySelector('header');
  var scrollPosition = window.scrollY;

  const addressBar  = this.document.getElementById('address-bar');
  const navBar = this.document.getElementById('nav-bar');

  if (scrollPosition > 500) {
    
    addressBar.classList.add('d-none');
    addressBar.classList.remove('d-md-flex');
   
    navBar.style.backgroundColor = '#010035';
  } else {
    addressBar.classList.add('d-md-flex');
    addressBar.classList.remove('d-none');
   
    navBar.style.backgroundColor = '';
  }
});

function navigateToPage(url) {
    window.location.href = url;
}

