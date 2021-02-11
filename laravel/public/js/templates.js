function generateUsersTableHeader() {
    return `
        <table class="table">
            <thead class="primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
    `;
}

function generateUsersTableFooter() {
    return `
            </tbody>
        </table>

        <button
            type="button"
            data-toggle="modal"
            data-target="#userModal"
            class="btn btn-dark add-user-button"
        >Add User</button>
    `;
}

function generateUsersTableRecord(user) {
    return `
        <tr>
            <th style="width: 5%;" scope="row">${user.id}</th>
            <td style="width: 20%;">${user.name}</td>
            <td style="width: 25%;">${user.email}</td>
            <td style="width: 20%;">${user.created_at}</td>
            <td style="width: 20%;">${user.updated_at}</td>
            <td style="width: 10%;">
                <div class="row">
                    <button
                        data-user-id="${user.id}"
                        data-user-name="${user.name}"
                        data-user-email="${user.email}"
                        data-toggle="modal"
                        data-target="#userModal"
                        class="btn btn-info edit-user-button"
                    >Edit</button>&nbsp;&nbsp;
                    <button data-user-id="${user.id}" class="btn btn-danger delete-user-button">Delete</button>
                </div>
            </td>
        </tr>
    `;
}

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
