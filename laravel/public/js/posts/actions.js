function renderPosts(lastId) {
    const query = new URLSearchParams({
        last_displayed_id: lastId,
        sort_field: state.postsPage.sortField,
        sort_direction: state.postsPage.sortDirection,
    });

    $.ajax({
        url: state.postsPage.indexUri + '?' + query.toString(),
        method: 'GET',
        success: function (response) {
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
