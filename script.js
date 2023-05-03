let slideIndex = 1;
showSlides(slideIndex);

function prevSlide() {
  showSlides((slideIndex -= 1));
}

function nextSlide() {
  showSlides((slideIndex += 1));
}

function showSlides(n) {
  let slides = document.querySelectorAll(".slide");

  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.transform = `translateX(-${(slideIndex - 1) * 100}%)`;
  }
}

document.querySelector(".prev").addEventListener("click", () => {
  prevSlide();
});

document.querySelector(".next").addEventListener("click", () => {
  nextSlide();
});
// Get references to the form and input fields
const loginForm = document.getElementById("login-form");
const signupForm = document.getElementById("signup-form");
const loginEmail = document.getElementById("login-email");
const loginPassword = document.getElementById("login-password");
const signupName = document.getElementById("signup-name");
const signupEmail = document.getElementById("signup-email");
const signupPassword = document.getElementById("signup-password");

// Add event listeners to the login and signup forms
loginForm.addEventListener("submit", (e) => {
  e.preventDefault(); // Prevent the form from submitting
  const email = loginEmail.value;
  const password = loginPassword.value;
  // Call your login function here, passing in the email and password values
});

signupForm.addEventListener("submit", (e) => {
  e.preventDefault(); // Prevent the form from submitting
  const name = signupName.value;
  const email = signupEmail.value;
  const password = signupPassword.value;
  // Call your signup function here, passing in the name, email, and password values
});
const searchForm = document.querySelector("#search-form");
const searchInput = document.querySelector("#search-input");
const cardsContainer = document.querySelector(".cards-container");

searchForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const query = searchInput.value;
  fetch(`search_lawyers.php?query=${query}`)
    .then((response) => response.json())
    .then((lawyers) => {
      cardsContainer.innerHTML = "";
      lawyers.forEach((lawyer) => {
        const card = `
          <div class="card">
            <img src="${lawyer.image}" alt="${lawyer.name}" />
            <div class="card-content">
              <h3>${lawyer.name}</h3>
              <p>${lawyer.description}</p>
              <a href="profile_screen.php?id=${lawyer.id}"><button>View Profile</button></a>
            </div>
          </div>
        `;
        cardsContainer.insertAdjacentHTML("beforeend", card);
      });
    })
    .catch((error) => console.error(error));
});
