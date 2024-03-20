const container = document.querySelector(".container"); // Select the container element
const seats = document.querySelectorAll(".row .seat:not(.sold)"); // Select all the seats that are not sold
const count = document.getElementById("count"); // Select the count element
const total = document.getElementById("total"); // Select the total element
const movieSelect = document.getElementById("movie"); // Select the movie selection dropdown

populateUI(); // Call the function to populate the UI with saved data

let ticketPrice = +movieSelect.value; // Get the initial ticket price from the movie selection dropdown

// Function to set movie data in local storage
function setMovieData(movieIndex, moviePrice) {
  localStorage.setItem("selectedMovieIndex", movieIndex); // Save the selected movie index
  localStorage.setItem("selectedMoviePrice", moviePrice); // Save the selected movie price
}

// Function to update the selected seat count and total price
function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll(".row .seat.selected"); // Select all the selected seats

  const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat)); // Map the selected seats to their indices

  localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex)); // Save the selected seats indices in local storage

  const selectedSeatsCount = selectedSeats.length; // Get the count of selected seats

  count.innerText = selectedSeatsCount; // Update the selected seat count in the UI
  total.innerText = selectedSeatsCount * ticketPrice; // Update the total price in the UI

  setMovieData(movieSelect.selectedIndex, movieSelect.value); // Save the selected movie data in local storage
}

// Function to populate the UI with saved data from local storage
function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats")); // Get the selected seats from local storage

  if (selectedSeats !== null && selectedSeats.length > 0) {
    seats.forEach((seat, index) => {
      if (selectedSeats.indexOf(index) > -1) {
        seat.classList.add("selected"); // Add the "selected" class to the seats that were previously selected
      }
    });
  }

  const selectedMovieIndex = localStorage.getItem("selectedMovieIndex"); // Get the selected movie index from local storage

  if (selectedMovieIndex !== null) {
    movieSelect.selectedIndex = selectedMovieIndex; // Set the selected movie in the movie selection dropdown
  }
}

movieSelect.addEventListener("change", (e) => {
  ticketPrice = +e.target.value; // Update the ticket price based on the selected movie
  setMovieData(e.target.selectedIndex, e.target.value); // Save the selected movie data in local storage
  updateSelectedCount(); // Update the selected seat count and total price
});

container.addEventListener("click", (e) => {
  if (e.target.classList.contains("seat") && !e.target.classList.contains("sold")) {
    e.target.classList.toggle("selected"); // Toggle the "selected" class on the clicked seat

    updateSelectedCount(); // Update the selected seat count and total price
  }
});

updateSelectedCount(); // Call the function to update the selected seat count and total price
