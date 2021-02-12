function switchActiveMenuItem() {
    const li = $(this);

    if (!li.hasClass('active')) {
        const id = li.attr('id');
        let deactivateId;

        if (id === usersLiId) {
            deactivateId = postsLiId;
            renderUsers();
        } else {
            deactivateId = usersLiId;
            renderPosts();
        }

        $('#' + deactivateId).removeClass('active');
        $('#' + id).addClass('active');
    }
}

function applyListeners() {
    $('button.add-user-button').click(onAddUserClick);
    $('button.edit-user-button').click(onEditUserClick);
    $('#users-table-pagination li.page-item').click(onUsersPageItemClick);
}

$(document).ready(function () {
    $('li.nav-item').click(switchActiveMenuItem);

    renderUsers();
});
