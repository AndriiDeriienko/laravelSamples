function generatePostsTableHeader() {
    return `
        <table class="table">
            <thead class="primary">
            <tr>
                <th style="width: 5%;" scope="col">Id</th>
                <th style="width: 5%;" scope="col">UserId</th>
                <th style="width: 10%;" scope="col">Title</th>
                <th style="width: 50%;" scope="col">Content</th>
                <th style="width: 10%;" scope="col">Created At</th>
                <th style="width: 10%;" scope="col">Updated At</th>
                <th style="width: 10%;" scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
    `;
}

function generatePostsTableFooter() {
    return `
            </tbody>
        </table>

        <button
            type="button"
            data-toggle="modal"
            data-target="#postModal"
            class="btn btn-dark add-post-button"
            id="add-post"
        >Add Post</button>
    `;
}

function generatePostsTableRecord(post) {
    return `
        <tr>
            <th scope="row">${post.id}</th>
            <td>${post.user_id}</td>
            <td>${post.title}</td>
            <td>${post.content}</td>
            <td>${post.created_at}</td>
            <td>${post.updated_at}</td>
            <td>
                <div class="row">
                    <button data-post-id="${post.id}" class="btn btn-info edit-post-button">Edit</button>&nbsp;&nbsp;
                    <button data-post-id="${post.id}" class="btn btn-danger delete-post-button">Delete</button>
                </div>
            </td>
        </tr>
    `;
}
