$(document).ready(function (){

})

function checkAll() {
    var isChecked = $('#check-all').prop('checked');
    $('input[type="checkbox"][id^="yes"]').prop('checked', isChecked);

    if (isChecked) {
        toggledIds = [];
        $('input[type="checkbox"][id^="yes"]').each(function () {
            var checkboxId = $(this).attr('id');
            toggledIds.push(checkboxId);
        });
    } else {
        toggledIds = [];
    }

    console.log("Toggled IDs:", toggledIds);
}

var toggledIds = [];

function toggleCheckbox(checkboxId) {
    console.log("Checkbox ID:", checkboxId);
    var checkbox = document.getElementById(checkboxId);
    var otherCheckboxId = checkboxId.includes('yes') ? checkboxId.replace('yes', 'no') : checkboxId.replace('no', 'yes');
    var otherCheckbox = document.getElementById(otherCheckboxId);

    if (checkbox.checked) {
        otherCheckbox.disabled = true;
        toggledIds.push(checkboxId);
    } else {
        otherCheckbox.disabled = false;
        var index = toggledIds.indexOf(checkboxId);
        if (index !== -1) {
            toggledIds.splice(index, 1);
        }
    }

    console.log("Toggled IDs:", toggledIds);
}


function saveToggledIds(business_name) {
    //alert(business_name);
    var recommendation = $('#recommendation').val();
    if (toggledIds.length < 15) {
        alert('Required all');
        return false;
    }
    $.post('insert-sanitary-checklist.php', 
    { 
        toggledIds: JSON.stringify(toggledIds),
        business_name : business_name,
        recommendation : recommendation,
    }, function (data, status) {
        // Handle the response from the server if needed
        alert(data);
        window.location.href = 'sanitary_home.php';
    });
}

