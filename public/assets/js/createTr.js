import {createNode} from "./createNode.js";

export function createTr(dt) {
    const tr = createNode('tr',{})
    const nameTd = createNode('td', {}, `${dt['name']}`)
    const commentTd = createNode('td', {}, `${dt['comment']}`)
    const dateTd = createNode('td', {}, `${dt['date']}`)
    tr.append(nameTd, commentTd, dateTd);
    return tr;
}