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
        // if successfull, add the comment to the list
        if (data.success) {
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
        } else {
            // show a bootstrap alert with the error
            // delete the previous alert if it exists
            document.querySelector('#comment-alert')?.remove();
            let alertElement = document.createElement('div');
            alertElement.className = 'alert alert-danger';
            alertElement.id = 'comment-alert';
            alertElement.innerText = data.message;
            document.querySelector('#comment-form').prepend(alertElement);
        }
    })
    .catch(error => {
        // show a bootstrap alert with the error
        let alertElement = document.createElement('div');
        alertElement.className = 'alert alert-danger';
        alertElement.innerText = error.message;
        document.querySelector('#comment-form').prepend(alertElement);
    })
});