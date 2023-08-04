import { panda } from 'https://pandatown.fr/lib/pandalib.php';

document.querySelector('.create').addEventListener('click', (e) => {
    e.preventDefault();
    document.querySelector('#login').style.display = 'none';
    document.querySelector('#register').style.display = 'block';
});

document.querySelector('.npassword').addEventListener('input', (e) => {
    let dd = document.querySelector('.npassword');
    let regularExpression  = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,150}$/;
    if(dd.value.match(regularExpression)) {
        document.querySelector('.ncpassword').disabled = false;
        document.querySelector('.tooltip').style.display = '';
        dd.style.backgroundColor = '';
    }else{
        dd.style.backgroundColor = 'red';
        document.querySelector('.ncpassword').disabled = true;
        let rect = dd.getBoundingClientRect();
        let x = rect.x;//+rect.width/2;
        let y = rect.y+rect.height+8;
        // console.log(x,y)
        document.querySelector('.tooltip').style.top = y + 'px';
        document.querySelector('.tooltip').style.left = x + 'px';
        document.querySelector('.tooltip').style.display = 'block';
        document.querySelector('.tooltip').innerHTML = 'Le mot de passe doit contenir au moins <br> 7 caractères et au moins <br> avec majuscules, minuscules, chiffres et caractères spéciaux';
    }
});

document.querySelector('.ncpassword').addEventListener('input', (e) => {
    let dd = document.querySelector('.ncpassword');
    if(dd.value != document.querySelector('.npassword').value) {
        dd.style.backgroundColor = 'red';
        document.querySelector('.tooltip').innerHTML = 'Le mot de passe ne correspond pas';
        var rect = dd.getBoundingClientRect();
        let x = rect.x;//+rect.width/2;
        let y = rect.y+rect.height+8;
        // console.log(x,y)
        document.querySelector('.tooltip').style.top = y + 'px';
        document.querySelector('.tooltip').style.left = x + 'px';
        document.querySelector('.tooltip').style.display = 'block';
          // possition en dessous de l'élément password
    }else{
        dd.style.backgroundColor = '';
        document.querySelector('.tooltip').style.display = '';
        document.querySelector('.createaccount').disabled = false;
    }
});

document.querySelector('#modal .close').addEventListener('click', () => {
    document.querySelector('#modal').style.display = '';
});