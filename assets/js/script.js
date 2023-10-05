// car slideshow
const carImages = document.querySelectorAll('.carousel img');
    const carInfo = document.getElementById('carInfo');
    let currentCarIndex = 0;

    function displayCarInfo(index) {
        const carNames = ["Ferrari Italia 458", "Porsche 911 GT", "Bugatti"];
        carInfo.textContent = `Car: ${carNames[index]}`;
    }

    function showNextCar() {
        carImages[currentCarIndex].classList.remove('block');
        currentCarIndex = (currentCarIndex + 1) % carImages.length;
        carImages[currentCarIndex].classList.add('block');
        displayCarInfo(currentCarIndex);
    }

    // Initial setup
    displayCarInfo(currentCarIndex);
    carImages[currentCarIndex].classList.add('block');

    // Automatically advance the slideshow every few seconds
    setInterval(showNextCar, 5000);
// end of car slideshow