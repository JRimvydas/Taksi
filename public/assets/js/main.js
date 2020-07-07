import {createTable} from './createTable.js';

fetch('/api/get.php')
    .then(res => res.json())
    .then(data => createTable(data))
    .then( e => {
        const form = document.getElementById('comment_form');
        form.addEventListener('submit', e=>{
            e.preventDefault();
            console.log('veiks');
        })
    }

    );



