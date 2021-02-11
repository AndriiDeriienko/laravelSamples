const usersLiId = 'users-li';
const postsLiId = 'posts-li';

const usersTableAreaId = '#usersTable';
const postsTableAreaId = '#postsTable';

const userNameFieldId = '#userModal #name';
const userEmailFieldId = '#userModal #email';
const userPasswordFieldId = '#userModal #password';

const currentUsersPageSelector = '#users-current-page span';

let state = {
    usersPage: {
        indexUri: '/api/users',
        lastId: 0,
        sortField: 'id',
        sortDirection: 'ASC'
    },
    postsPage: {
        indexUri: '/api/posts',
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
            renderUsers(0);
        } else {
            renderPosts(0);
        }

        $('#' + deactivateId).removeClass('active');
        $('#' + id).addClass('active');
    }
}

function renderUsers(lastId) {
    const query = new URLSearchParams({
        last_displayed_id: lastId,
        sort_field: state.usersPage.sortField,
        sort_direction: state.usersPage.sortDirection,
    });

    $.ajax({
        url: state.usersPage.indexUri + '?' + query.toString(),
        method: 'GET',
        success: function (users) {
            let tableHtml = generateUsersTableHeader();

            users.forEach(function (user, key) {
                tableHtml += generateUsersTableRecord(user);

                if (key === (users.length - 1)) {
                    state.usersPage.lastId = user.id;
                }
            });

            tableHtml += generateUsersTableFooter();
            $(usersTableAreaId).html(tableHtml);
            $(postsTableAreaId).hide();
            $(usersTableAreaId).show();
            applyListeners();
        },
        error: function () {
            alert('Something went wrong.')
        }
    })
}

function renderPosts(lastId) {
    const query = new URLSearchParams({
        last_displayed_id: lastId,
        sort_field: state.postsPage.sortField,
        sort_direction: state.postsPage.sortDirection,
    });

    $.ajax({
        url: state.postsPage.indexUri + '?' + query.toString(),
        method: 'GET',
        success: function (posts) {
            let tableHtml = generatePostsTableHeader();

            posts.forEach(function (post, key) {
                tableHtml += generatePostsTableRecord(post);

                if (key === (posts.length - 1)) {
                    state.postsPage.lastId = post.id;
                }
            });

            tableHtml += generatePostsTableFooter();
            $(postsTableAreaId).html(tableHtml);
            $(usersTableAreaId).hide();
            $(postsTableAreaId).show();
            applyListeners();
        },
        error: function () {
            alert('Something went wrong.')
        }
    })
}

function onAddUserClick() {
    $('button.create-user-button').show();
    $('button.save-user-changes-button').hide();
    $('#user-model-title').html('Create User');
    $(userNameFieldId).val('Enter name');
    $(userEmailFieldId).val('Enter email');
    $(userPasswordFieldId).val('Enter password');
    $(userNameFieldId).val('');
    $(userEmailFieldId).val('');
    $(userPasswordFieldId).val('');
}

function onEditUserClick() {
    $('button.create-user-button').hide();
    $('button.save-user-changes-button').show();
    $('#user-model-title').html('Edit User');
    $(userNameFieldId).val($(this).data('user-name'));
    $(userEmailFieldId).val($(this).data('user-email'));
    $(userPasswordFieldId).val('Enter password');
    $(userPasswordFieldId).val('');
}

function applyListeners() {
    $('button.add-user-button').click(onAddUserClick);
    $('button.edit-user-button').click(onEditUserClick);

    $('#users-table-pagination li.page-item').click(function () {
        const liId = $(this).attr('id');
        let page = $(currentUsersPageSelector).html();

        if (liId === 'users-prev-page') {
            page--;
        }

        if (liId === 'users-next-page') {
            page++;
        }

        $(currentUsersPageSelector).html(page);
    });
}

$(document).ready(function () {
    $('li.nav-item').click(switchActiveMenuItem);
    renderUsers(0);
});
