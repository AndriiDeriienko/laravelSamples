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

        <nav id="users-table-pagination">
            <ul class="pagination justify-content-center">
                <li id="users-prev-page" class="page-item disabled">
                    <span class="page-link pointer"> << </span>
                </li>
                <li id="users-current-page" class="page-item">
                    <span class="page-link pointer">${state.usersPage.page}</span>
                </li>
                <li id="users-next-page" class="page-item">
                    <span class="page-link pointer"> >> </span>
                </li>
            </ul>
        </nav>
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
