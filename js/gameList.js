function showImage(fileName) {
    var modal = document.querySelector("#modal");
    var img = modal.querySelector("img");
    img.src = "GamePhotos/" + fileName;
    modal.style.display = "block";
  }
  
  document.querySelector("#modal").onclick = function() {
    this.style.display = "none";
  }