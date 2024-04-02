$(document).ready(function () {
    switchActiveBusiness(business_name);
})

function switchActiveBusiness(business_name) {

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
