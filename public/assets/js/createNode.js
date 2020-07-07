export function createNode(nodeName, attributes, ...children) {
    const node = document.createElement(nodeName);

    for (let attribute in attributes) {
        if (typeof attributes[attribute] === 'function' ){
            node.addEventListener(attribute, attributes[attribute]);
        } else {
            node.setAttribute(attribute, attributes[attribute]);
        }

    }
    children.forEach((child) => {
        const textNode = document.createTextNode(child);
        node.append(textNode);
    });

    return node;
}
