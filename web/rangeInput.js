function getVals() {
  // Get slider values
  var parent = this.parentNode;
  var slides = parent.getElementsByTagName("input");
  var slide1 = parseFloat(slides[0].value);
  var slide2 = parseFloat(slides[1].value);
  // Neither slider will clip the other, so make sure we determine which is larger
  if (slide1 > slide2) {
    var tmp = slide2;
    slide2 = slide1;
    slide1 = tmp;
  }

  var displayElement = parent.getElementsByClassName("rangeValues")[0];
  var displayElementTwo = parent.getElementsByClassName("rangeValuesTwo")[0];
  if (displayElement) {
    displayElement.innerText = "Edad " + slide1 + " - " + slide2;
  }
  if (displayElementTwo) {
    displayElementTwo.innerText = "Edad " + slide1 + " - " + slide2;
  }
}

window.onload = function () {
  // Initialize Sliders
  var sliderSections = document.getElementsByClassName("range-slider");
  var sliderSectionsTwo = document.getElementsByClassName("range-slider-two");

  for (var x = 0; x < sliderSections.length; x++) {
    var sliders = sliderSections[x].getElementsByTagName("input");
    for (var y = 0; y < sliders.length; y++) {
      if (sliders[y].type === "range") {
        sliders[y].oninput = getVals;
        // Manually trigger event first time to display values
        sliders[y].oninput();
      }
    }
  }
  for (var x = 0; x < sliderSectionsTwo.length; x++) {
    var slidersTwo = sliderSectionsTwo[x].getElementsByTagName("input");
    for (var y = 0; y < slidersTwo.length; y++) {
      if (slidersTwo[y].type === "range") {
        slidersTwo[y].oninput = getVals;
        // Manually trigger event first time to display values
        slidersTwo[y].oninput();
      }
    }
  }
};
