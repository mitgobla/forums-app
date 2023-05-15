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
        if (data.message === 'Comment created successfully') {
            console.log(data);
            document.querySelector('#comment-alert')?.remove();
            let alertElement = document.createElement('div');
            alertElement.className = 'alert alert-success';
            alertElement.id = 'comment-alert';
            alertElement.innerText = data.message;
            document.querySelector('#comment-form').prepend(alertElement);

            let commentsContainer = document.querySelector('#comments-container');

            let commentHTML = data.comment_template;
            // convert the string to a DOM element
            let commentElement = document.createRange().createContextualFragment(commentHTML);
            // add the comment to the list
            commentsContainer.insertBefore(commentElement, commentsContainer.firstChild);
            // clear the comment field
            e.target.elements.comment.value = '';
        } else {
            // show a bootstrap alert with the error
            // delete the previous alert if it exists
            console.log(data)
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

