function renderUsers(lastId) {
    const query = new URLSearchParams({
        last_displayed_id: lastId,
        sort_field: state.usersPage.sortField,
        sort_direction: state.usersPage.sortDirection,
    });

    $.ajax({
        url: state.usersPage.indexUri + '?' + query.toString(),
        method: 'GET',
        success: function (response) {
            let tableHtml = generateUsersTableHeader();

            response.models.forEach(function (user) {
                tableHtml += generateUsersTableRecord(user);
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
