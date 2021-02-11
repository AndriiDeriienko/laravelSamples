const usersLiId = 'users-li';
const postsLiId = 'posts-li';

const usersTableAreaId = 'usersTable';
const postsTableAreaId = 'postsTable';

let state = {
    usersPage: {
        lastId: 0,
        sortField: 'id',
        sortDirection: 'ASC'
    },
    postsPage: {
        lastId: 0,
        sortField: 'id',
        sortDirection: 'ASC'
    }
};

function switchActiveMenuItem() {
    const li = $(this);

    if (!li.hasClass('active')) {
        const id = li.attr('id');
        let deactivateId = usersLiId;

        if (id === usersLiId) {
            deactivateId = postsLiId;
        }

        $('#' + deactivateId).removeClass('active');
        $('#' + id).addClass('active');
    }
}

function renderUsers() {
    const query = '?last_displayed_id=' + state.usersPage.lastId
        + '&sort_field=' + state.usersPage.sortField
        + '&sort_direction=' + state.usersPage.sortDirection;

    $.ajax({
        url: '/api/users' + query,
        method: 'GET',
        success: function (users) {
            const selector = '#' + usersTableAreaId;
            let tableHtml = generateUsersTableHeader();

            for (let user of users) {
                tableHtml += generateUsersTableRecord(user);
            }

            tableHtml += generateUsersTableFooter();
            $(selector).html(tableHtml);
            $(selector).show();
        },
        error: function () {
            alert('Something went wrong.')
        }
    })
}

function generateUsersTableHeader() {
    return `
        <table class="table">
            <thead class="primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
    `;
}

function generateUsersTableRecord(user) {
    return `
        <tr>
            <th scope="row">${user.id}</th>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>${user.created_at}</td>
            <td>${user.updated_at}</td>
            <td>
                <div class="row">
                    <button data-user-id="${user.id}" class="btn btn-info edit-user-button">Edit</button>&nbsp;&nbsp;
                    <button data-user-id="${user.id}" class="btn btn-danger delete-user-button">Delete</button>
                </div>
            </td>
        </tr>
    `;
}

function generateUsersTableFooter() {
    return `
            </tbody>
        </table>

        <button type="button" data-toggle="modal" data-target="#userModal" class="btn btn-dark add-user-button" id="add-user">Add User</button>
    `;
}

function renderPosts() {
    const query = '?last_displayed_id=' + state.postsPage.lastId
        + '&sort_field=' + state.postsPage.sortField
        + '&sort_direction=' + state.postsPage.sortDirection;

    $.ajax({
        url: '/api/posts' + query,
        method: 'GET',
        success: function (posts) {
            const selector = '#' + postsTableAreaId;
            let tableHtml = generatePostsTableHeader();

            for (let post of posts) {
                tableHtml += generatePostsTableRecord(post);
            }

            tableHtml += generatePostsTableFooter();
            $(selector).html(tableHtml);
            $(selector).show();
        },
        error: function () {
            alert('Something went wrong.')
        }
    })
}

function generatePostsTableHeader() {
    return `
        <table class="table">
            <thead class="primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">UserId</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
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

function generatePostsTableFooter() {
    return `
            </tbody>
        </table>

        <button type="button" data-toggle="modal" data-target="#postModal"
        class="btn btn-dark add-post-button" id="add-post">Add Post</button>
    `;
}

$(document).ready(function () {
    $('li.nav-item').click(switchActiveMenuItem);
    renderUsers();
    renderPosts();
});
