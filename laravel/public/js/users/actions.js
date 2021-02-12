function renderUsers(page = 1) {
    state.usersPage.page = page;

    const query = new URLSearchParams({
        page: page,
        sort_field: state.usersPage.sortField,
        sort_direction: state.usersPage.sortDirection,
    });

    $.ajax({
        url: state.usersPage.indexUri + '?' + query.toString(),
        method: 'GET',
        success: function (response) {
            state.usersPage.lastPage = response.lastPage;
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
