const select = document.querySelector('#ade');
const father = document.querySelector('.father');
const mother = document.querySelector('.mother');
select.value='none';
select.addEventListener('click',()=>{
    
    if (select.value == 'none') {
        father.style.display = 'none'
        mother.style.display = 'none'
    }
    else if (select.value == 'father') {
        father.style.display = 'block'
        mother.style.display = 'none'
    }
    else if (select.value == 'mother') {
        father.style.display = 'none'
        mother.style.display = 'block'
    }
    else if (select.value == 'Both') {
        father.style.display = 'block';
        mother.style.display = 'block';
    }
})