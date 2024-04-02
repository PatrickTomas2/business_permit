
        // Function to save checkbox state in local storage
        function saveCheckboxState() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach((checkbox) => {
                localStorage.setItem(checkbox.id, checkbox.checked);
            });
        }

        // Function to load checkbox state from local storage
        function loadCheckboxState() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach((checkbox) => {
                const checked = localStorage.getItem(checkbox.id) === 'true';
                checkbox.checked = checked;
            });
        }

        // Save checkbox state when any checkbox is clicked
        function attachCheckboxEventListeners() {
            document.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
                checkbox.addEventListener('change', () => {
                    saveCheckboxState();
                });
            });
        }

        // Clear all checkboxes
        function clearCheckboxes() {
            document.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
                checkbox.checked = false;
            });
            // Save state after clearing
            saveCheckboxState();
        }

        // Load checkbox state when the page is loaded
        loadCheckboxState();

        // Attach event listeners for checkboxes
        attachCheckboxEventListeners();

        // Attach event listener for clear button
        document.getElementById('clearButton').addEventListener('click', () => {
            clearCheckboxes();
        });
   