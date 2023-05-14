import { comment } from "postcss";

document.querySelector('#comment-form').addEventListener('submit', function(e) {
    e.preventDefault();

    let commentText = e.target.elements.comment.value;

    fetch('/comment', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            body: commentText,
            post_id: e.target.elements.post_id.value,
            user_id: e.target.elements.user_id.value
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        let commentsContainer = document.querySelector('#comments-container');
        let commentElement = document.createElement('div');
        commentElement.className = 'card p-2';
        let commentSubtitle = document.createElement('h6');
        commentSubtitle.className = 'card-subtitle mb-2 text-muted';
        commentSubtitle.innerHTML = 'Written on ' + data.comment_created_at + ' by <a href="/users/' + data.comment_user_id + '">' + data.comment_user + '</a>';
        commentElement.appendChild(commentSubtitle);
        let commentBody = document.createElement('p');
        commentBody.className = 'card-text';
        commentBody.innerText = data.comment_body;
        commentElement.appendChild(commentBody);
        commentsContainer.appendChild(commentElement);
    })
    .catch(error => {
        console.log(error);
    })
});