const usersLiId = 'users-li';
const postsLiId = 'posts-li';

const usersTableAreaId = '#usersTable';
const postsTableAreaId = '#postsTable';

const userNameFieldId = '#userModal #user-name';
const userEmailFieldId = '#userModal #user-email';
const userPasswordFieldId = '#userModal #user-password';

const currentUsersPageSelector = '#users-current-page span';
const usersPrevPageSelector = '#users-prev-page';
const usersNextPageSelector = '#users-next-page';

let state = {
    usersPage: {
        indexUri: '/api/users',
        page: 1,
        sortField: 'id',
        sortDirection: 'ASC',
        lastPage: 1,
    },
    postsPage: {
        indexUri: '/api/posts',
        page: 1,
        sortField: 'id',
        sortDirection: 'ASC',
        lastPage: 1,
    }
};
