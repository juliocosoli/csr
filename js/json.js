const API_URL = 'https://jsonplaceholder.typicode.com';

// const xhr = new XMLHttpRequest();

// function onRequestHandler(){
//     if (this.readyState=== 4 && this.status===200){
//         // 0 = UNSET
//         // 1 = OPENED
//         // 2 = HEADERS_RECEIVED
//         // 3 = LOADING
//         // 4 = DONE
//         const data = JSON.parse(this.response);
//         const HTMLResponse = document.querySelector('#app');
        
//         const tpl = data.map(user => `<li>${user.name} @ ${user.email}</li>`);
//         HTMLResponse.innerHTML = `<ul>${tpl}</ul>`;
//     }
// }
// xhr.addEventListener('load',onRequestHandler);
// xhr.open('GET',`${API_URL}/users`);
// xhr.send();

const HTMLResponse = document.querySelector('#app');
const ul = document.createElement('ul');
const h2 = document.createElement('h2');
h2.appendChild(document.createTextNode('Patinadoras anotadas'));
ul.appendChild(h2);
ul.classList.add('list-group');

fetch(`${API_URL}/users`)
    .then((response)=> response.json())
    .then((users)=>{
        users.forEach(user=> {
            let elem = document.createElement('li');
            //elem.classList.add('list-group-item disabled');
            elem.appendChild(document.createTextNode(`${user.name} @ ${user.email}`));
            elem.classList.add('list-group-item', 'disabled');
            ul.appendChild(elem);
        })

        // const tpl = users.map((user) => `<li>${user.name} @ ${user.email}</li>`);
        // HTMLResponse.innerHTML = `<ul>${tpl}</ul>`;
    });

    HTMLResponse.appendChild(ul)


