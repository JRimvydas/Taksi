import {addComment} from "./addComment.js";
import {createCommentForm} from "./createCommentForm.js";

export function createAddForm(dt) {
    const handler = e => {
        e.preventDefault();
        addComment(e.target, dt);
    }
    const form = createCommentForm({}, 'Pridėti', handler);
}