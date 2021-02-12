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

function onUsersPageItemClick() {
    if ($(this).hasClass('disabled')) {
        return;
    }

    const liId = $(this).attr('id');
    let page = $(currentUsersPageSelector).html();

    if (liId === 'users-prev-page' && page > 1) {
        page--;
    }

    if (liId === 'users-next-page' && page < state.usersPage.lastPage) {
        page++;
    }

    renderUsers(page);
    $(currentUsersPageSelector).html(page);
}
