import {createTable} from './createTable.js';

fetch('/api/get.php')
    .then(res => res.json())
    .then(data => createTable(data)
    );


