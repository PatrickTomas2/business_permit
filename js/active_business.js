$(document).ready(function () {
    switchActiveBusiness(business_name);
})

function switchActiveBusiness(business_name) {
    Swal.fire({
        icon: 'warning',
        title: 'Change active business?',
        text: 'By changing active business the input and information displayed will belong to the active business and will be redirected to the checklist page.',
        showCancelButton: true,
        confirmButtonText: 'YES',
        cancelButtonText: 'NO',
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('switch_active_business.php', {
                business_name: business_name
            }, function(response) {
                if (response.success) {
                    // alert('Active business switched to ' + business_name);
                    
                    window.location.href = 'owner_home.php';
                } else {
                    alert('Failed to switch active business');
                }
            }, 'json');
        }
    });
    

   
}
