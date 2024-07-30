$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#userForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '/users',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('User added successfully!');
                $('#userForm')[0].reset();
                loadUsers();
            },
            error: function(response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    let errorString = '';
                    $.each(errors, function(key, value) {
                        errorString += value + '\n';
                    });
                    alert(errorString);
                }
            }
        });
    });

    function loadUsers() {
        $.ajax({
            type: 'GET',
            url: '/users',
            success: function(response) {
                let users = response;
                let usersTableBody = $('#usersTableBody');
                usersTableBody.empty();
                // console.log('users:', users)
                $.each(users, function(index, user) {
                    let profileImage = user.profile_image ? '<img src="/images/' + user
                        .profile_image + '" height="50" width="50">' : 'N/A';
                    usersTableBody.append('<tr><td>' + user.name + '</td><td>' + user
                        .email + '</td><td>' + user.phone + '</td><td>' + user
                        .description + '</td><td>' + user?.role?.name + '</td><td>' +
                        profileImage + '</td></tr>');
                });
            }
        });
    }

    loadUsers();
});
