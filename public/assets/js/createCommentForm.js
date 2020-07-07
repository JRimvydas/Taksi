import {createNode} from "./createNode.js";


export function createCommentForm(data, buttonName, handler) {
    const divas = document.getElementById('app');
    const form = createNode('form', {
        class: 'create_form',
        submit: handler
    })
    divas.prepend(form);
    const labelComment = createNode('label', {for: 'comment'}, 'Komentaras');
    form.append(labelComment);
    const inputComment = createNode('textarea', {
        name: 'comment',
        type: 'textarea',
        value: data.comment ?? '',
        placeholder: 'Komentaras'
    })
    form.append(inputComment);

    const addButton = createNode('button', {
        name: 'action',
        class: 'button',
    }, buttonName)
    form.append(addButton);
}
