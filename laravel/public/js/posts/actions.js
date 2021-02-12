function renderPosts(page = 1) {
    const query = new URLSearchParams({
        page: page,
        sort_field: state.postsPage.sortField,
        sort_direction: state.postsPage.sortDirection,
    });

    $.ajax({
        url: state.postsPage.indexUri + '?' + query.toString(),
        method: 'GET',
        success: function (response) {
            state.postsPage.lastPage = response.lastPage;
            let tableHtml = generatePostsTableHeader();

            response.models.forEach(function (post) {
                tableHtml += generatePostsTableRecord(post);
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
