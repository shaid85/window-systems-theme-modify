// click fixes on calc header

document.addEventListener("DOMContentLoaded", function () {
  const headers = document.querySelectorAll("[data-calc-header]");

  headers.forEach((header) => {
    header.addEventListener("click", (e) => {
      // Prevent toggle if clicking on input or button
      if (
        e.target.closest("input") ||
        e.target.closest("button") ||
        e.target.closest(".no-toggle")
      ) {
        return;
      }

      const index = header.getAttribute("data-calc-header");
      const content = document.querySelector(`[data-calc-value="${index}"]`);
      if (content) {
        content.classList.toggle("hidden");
      }
    });
  });
});


// increment and decremnt functionality
document.addEventListener("DOMContentLoaded", () => {
  // Function to handle the increment and decrement functionality
  const handleIncrementDecrement = () => {
    // Select all elements with data-onlick-handler attribute
    const buttons = document.querySelectorAll("[data-onlick-handler]");

    buttons.forEach(button => {
      button.addEventListener("click", (ev) => {
        console.log(ev)
        // Find the closest input element within the clicked button's container
        const counterInput = ev.target.closest(".calculator").querySelector("input[type='number']");

        // If the input is not found, return

        if (!counterInput) return;
        console.log(ev.target.getAttribute("data-onlick-handler"))
        let currentValue = Number(counterInput.value) || 0; 
        // Check the handler type (increment or decrement)
        if (ev.target.getAttribute("data-onlick-handler") === "increment") {
          currentValue++;  // Increase value on "+" click
          console.log("increment")
        } else if (ev.target.getAttribute("data-onlick-handler") === "decrement" && currentValue > 0) {
          currentValue--;  // Decrease value on "-" click if > 0
        }

        // Update the input field value
        counterInput.value = currentValue;

        // Trigger the 'input' event to trigger visibility toggling
        const inputEvent = new Event('input');
        counterInput.dispatchEvent(inputEvent);  // Trigger the input event
      });
    });
  };

  // Function to handle visibility of the form based on counter value
  const handleCounterChange = (ev) => {
    const counterInput = ev.target;
    const currentNum = Number(counterInput.value);

    // Get the parent calculator container
    const calculatorContainer = counterInput.closest(".calculator");

    // Get the form container related to this calculator
    const formContainer = calculatorContainer.querySelector(".calc-multistep-form");

    // Show or hide the form based on the counter value
    if (currentNum > 0) {
      formContainer.classList.remove("hidden");  // Show form
    } else {
      formContainer.classList.add("hidden");  // Hide form
    }
  };

  // Initialize the increment and decrement buttons
  handleIncrementDecrement();

  // Listen for input changes in the counter fields
  const mainCounters = document.querySelectorAll("input[data-main-counter]");
  
  mainCounters.forEach((mainCounter) => {
    mainCounter.addEventListener("input", (ev) => {
      handleCounterChange(ev);  // Handle input event
    });

    // Initial visibility check on page load
    handleCounterChange({ target: mainCounter });
  });
});


