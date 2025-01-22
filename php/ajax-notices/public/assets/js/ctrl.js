var option = document.getElementsByClassName('option');

var section = document.getElementsByTagName('section');

for(let i=0; i < option.length; i++) {
    option[i].addEventListener('click', function() {

        show(i); 

    });

    section[i].style.display = 'none';
}

section[0].style.display = 'block';

function show(item) {    
    for(let i=0; i < option.length; i++) {    
        section[i].style.display = 'none';
        option[i].classList.remove('active');
    }

    section[item].style.display = 'block';
    option[item].classList.add('active');
}