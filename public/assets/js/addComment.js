
import {createTr} from "./createTr.js";

export function addComment(e, parent) {
    const form = new FormData(e);
    fetch('/api/addComment.php', {
        method: 'POST',
        body: form
    }).then(response => response.json())
        .then(data => {
            if (data) {
                e.style.display = "none";
                const table = createTr(data);
                parent.append(table);
            }
        });
}