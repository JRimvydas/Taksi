import {createNode} from "./createNode.js";
import {createTr} from "./createTr.js";

export function createTable(dt) {
    const divas = document.getElementById('app');
    const table = createNode('table', {class: 'comments'});
    divas.append(table);
    const nameTh = createNode('th',{}, 'Vardas');
    const thComment = createNode('th',{}, 'Komentaras');
    const thDate = createNode('th',{}, 'Data');
    table.append(nameTh, thComment, thDate);
    dt.forEach(data => {
        const tr = createTr(data);
        table.append(tr);
    })
}