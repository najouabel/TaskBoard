document.addEventListener("DOMContentLoaded", function() {
    // Clone the first form fieldset and add a button to remove it
    var formFieldset = document.querySelector(".form-fieldset").cloneNode(true);
    var removeBtn = document.createElement("button");
    removeBtn.classList.add("remove-fieldset", "btn", "btn-danger");
    removeBtn.innerHTML = "Remove";
    formFieldset.appendChild(removeBtn);

    // Add click event listener to the "Add More" button
    var addMoreBtn = document.querySelector(".add-more");
    addMoreBtn.addEventListener("click", function() {
      // Append the cloned form fieldset to the form
      var form = document.querySelector(".form-fieldset");
      form.appendChild(formFieldset.cloneNode(true));
    });

    // Add click event listener to the "Remove" buttons
    document.addEventListener("click", function(event) {
        if (event.target.classList.contains("remove-fieldset")) {
            // Remove the parent fieldset when the "Remove" button is clicked
            event.target.parentNode.remove();
        }
    });
});