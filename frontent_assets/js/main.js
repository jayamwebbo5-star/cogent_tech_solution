const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("active");
      }
    });
  },
  {
    threshold: 0.5,
  }
);

// Select all elements with the reveal-text class
const targets = document.querySelectorAll(".reveal-text");

targets.forEach((target) => {
  observer.observe(target);
});

const swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  // Responsive breakpoints
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
    },
  },
});

const benifitswiper = new Swiper(".benifits-swiper", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 3000, // Time between slides in ms (3000 = 3 seconds)
    disableOnInteraction: false, // Keeps autoplay running after user interaction
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 3, // Corrected to 5 if you want 5 in a row on large screens
    },
  },
});

const educationSwiper = new Swiper(".education-swiper", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".education-swiper-next",
    prevEl: ".education-swiper-prev",
  },
  breakpoints: {
    768: { slidesPerView: 2 },
    992: { slidesPerView: 3 },
    1200: { slidesPerView: 3 },
  },
});

document.querySelectorAll(".marquee-image").forEach((image) => {
  image.addEventListener("click", function () {
    const src = this.getAttribute("src");
    document.querySelector(".main-image").setAttribute("src", src);
  });
});

function playPodcast(button) {
  // Get parent container (card-footer)
  const container = button.closest(".card-footer");

  // Find elements within this podcast block
  const duration = container.querySelector(".podcast-duration");
  const audio = container.querySelector(".audio-player");

  // Hide button and duration
  button.style.display = "none";
  duration.style.display = "none";

  // Show and play audio
  audio.style.display = "block";
  audio.play();
}

function toggleNav() {
  const nav = document.getElementById("navbarNav");
  nav.classList.toggle("active");
}

// Wait for window load
window.addEventListener("load", function () {
  // Add small delay for smooth transition
  setTimeout(function () {
    document.body.classList.add("loaded");

    // Remove loader from DOM after animation completes
    setTimeout(function () {
      document.querySelector(".center-loader").remove();
    }, 500);
  }, 300);
});

// Fallback in case load event doesn't fire
setTimeout(function () {
  document.body.classList.add("loaded");
  document.querySelector(".center-loader").remove();
}, 5000); // Remove after 5 seconds max



// JavaScript for podcast video toggle functionality
// This script allows users to play/pause podcast videos and ensures only one video plays at a
let currentlyPlaying = null;

function toggleVideo(cardNumber) {
  const placeholder = document.getElementById(`placeholder-${cardNumber}`);
  const video = document.getElementById(`video-${cardNumber}`);
  const status = document.getElementById(`status-${cardNumber}`);
  const card = placeholder.closest(".podcast-card");

  // If another video is playing, stop it
  if (currentlyPlaying && currentlyPlaying !== cardNumber) {
    const currentPlaceholder = document.getElementById(
      `placeholder-${currentlyPlaying}`
    );
    const currentVideo = document.getElementById(`video-${currentlyPlaying}`);
    const currentStatus = document.getElementById(`status-${currentlyPlaying}`);
    const currentCard = currentPlaceholder.closest(".podcast-card");

    currentPlaceholder.style.display = "flex";
    currentVideo.classList.remove("active");
    currentStatus.classList.remove("show");
    currentCard.classList.remove("playing");
  }

  // Toggle current video
  if (placeholder.style.display === "none") {
    // Stop video
    placeholder.style.display = "flex";
    video.classList.remove("active");
    status.classList.remove("show");
    card.classList.remove("playing");
    currentlyPlaying = null;
  } else {
    // Play video
    placeholder.style.display = "none";
    video.classList.add("active");
    status.classList.add("show");
    card.classList.add("playing");
    currentlyPlaying = cardNumber;
  }
}

// Control button functionality
document.addEventListener("DOMContentLoaded", function () {
  const controlButtons = document.querySelectorAll(".control-btn");

  controlButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
      e.stopPropagation(); // Prevent card click

      const icon = this.querySelector("i");

      if (icon.classList.contains("fa-play")) {
        icon.classList.remove("fa-play");
        icon.classList.add("fa-pause");
      } else if (icon.classList.contains("fa-pause")) {
        icon.classList.remove("fa-pause");
        icon.classList.add("fa-play");
      } else if (icon.classList.contains("fa-download")) {
        alert("Download started!");
      } else if (icon.classList.contains("fa-share")) {
        alert("Share options opened!");
      }
    });
  });
});
