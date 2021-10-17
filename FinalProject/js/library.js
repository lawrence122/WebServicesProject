/**
 * This function sets the specific book details in the modal
 */
function viewDetailsSetUp() {
    $('.bookDetails').on('click', function (event) {
        var button = $(event.target);
        var image = button.data('image');
        var title = button.data('title');
        var author = button.data('author');
        var description = button.data('desc');
        var price = button.data('price');

        $('#modal-image').attr('src', image);
        $('#modal-title').html(title);
        $('#modal-author').html(author);
        $('#modal-desc').html(description);
        $('#modal-price').html("$" + price);
    });
}

/**
 * This function sets the name of the user who will money added to their balance
 */
function addBalanceSetUp() {
    $('.addBalance').on('click', function (event) {
        var button = $(event.target);
        var recipient = button.data('action');

        console.log(recipient);

        $('#addBalanceForm').attr('action', recipient);
        console.log($('#addBalanceForm'));
    });
}

/**
 * This function sets the specific book details in the modal
 */
function editUserSetUp() {
    $('.editUser').on('click', function (event) {
        var button = $(event.target);
        var username = button.data('username');
        var recipient = button.data('action');
        var first = button.data('first');
        var last = button.data('last');

        $('#editUserForm').attr('action', recipient);
        $('#editUserModalTitle').text('Edit ' + username);
        $('#modal-first').val(first);
        $('#modal-last').val(last);
    });
}

/**
 * This function sets the username of the user who will be deleted
 */
function deleteUserSetUp() {
    $('.deleteUser').on('click', function (event) {
        var button = $(event.target);
        var recipient = button.data('action');

        console.log(recipient);

        $('#deleteUserForm').attr('action', recipient);
    });
}

function registerSetUp() {
    $('.register').on('click', function (event) {
        var button = $(event.target);
        var recipient = button.data('action');

        console.log(recipient);

        $('#deleteUserForm').attr('action', recipient);
    });
}

$(document).ready(function () {
    registerSetUp()
    viewDetailsSetUp();
    addBalanceSetUp();
    editUserSetUp();
    deleteUserSetUp();
});