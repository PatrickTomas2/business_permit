$(document).ready(function (){

})

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
    // alert(business_name);
    var recommendation = $('#recommendation').val();
    if (toggledIds.length < 20) {
        alert('Required all');
        return false;
    }
    $.post('insert-fire-checklist.php', 
    { 
        toggledIds: JSON.stringify(toggledIds),
        business_name : business_name,
        recommendation : recommendation,
    }, function (data, status) {
        // Handle the response from the server if needed
        alert(data);
        window.location.href = 'fire_home.php';
    });
}

