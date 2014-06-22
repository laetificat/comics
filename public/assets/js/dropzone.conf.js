// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
var previewNode = document.querySelector("#template");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);

// Set up variables for global use
var comic_number = 0;
var comic_page = 0;

var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
  url: "/upload", // Set the url
  thumbnailWidth: 80,
  thumbnailHeight: 120,
  parallelUploads: 1,
  previewTemplate: previewTemplate,
  autoQueue: false, // Make sure the files aren't queued until manually added
  previewsContainer: "#previews", // Define the container to display the previews
  clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
});

myDropzone.on("addedfile", function(file) {
  // Hookup the start button
  file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  // Add default option box for each preview.
  var defaultRadioButton = Dropzone.createElement('<div class="comic_cover_container"><input type="radio" id="comic_cover_'+comic_number+'" name="comic_cover" value="'+file.name+'" /> Comic cover</div>');
  file.previewElement.appendChild(defaultRadioButton);
  comic_number++;
});

myDropzone.on("sending", function(file, xhr, formData) {
  // And disable the start button
  file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  // Additional data
  var comic_name = document.getElementById("comic_name").value;
  var comic_cover = "";

  for (i = 0; i < comic_number; i++) {
    if(document.getElementById("comic_cover_"+i).checked) {
      var comic_cover = document.getElementById("comic_cover_"+i).value;
    }
    else {
      //
    }
  }

  formData.append('comic_cover', comic_cover);
  formData.append('comic_name', comic_name);
  formData.append('comic_page', comic_page);
  console.log(comic_page);
  comic_page++;
  document.getElementById("comic_name").disabled = true;
  for (i = 0; i < comic_number; i++) {
    document.getElementById("comic_cover_"+i).disabled = true;
  }
});

// When the queue is completed
myDropzone.on("queuecomplete", function(complete) {
  comic_number = 0;
});

myDropzone.on("error", function(file, errorMessage, xhr) {
  // console.log(errorMessage);
});

// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function() {
  myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
};
document.querySelector("#actions .cancel").onclick = function() {
  myDropzone.removeAllFiles(true);
  document.getElementById("comic_name").disabled = false;
  comic_number = 0;
  comic_page = 0;
};
