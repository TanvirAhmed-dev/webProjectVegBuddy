//========================================================================
// Drag and drop image handling
//========================================================================

//var fileDrag = document.getElementById("file-drag");
var fileSelect = document.getElementById("file-upload");

// Add event listeners
// fileDrag.addEventListener("dragover", fileDragHover, false);
// fileDrag.addEventListener("dragleave", fileDragHover, false);
// fileDrag.addEventListener("drop", fileSelectHandler, false);
fileSelect.addEventListener("change", fileSelectHandler);

// function fileDragHover(e) {
//     // prevent default behaviour
//     e.preventDefault();
//     e.stopPropagation();

//     fileDrag.className = e.type === "dragover" ? "upload-box dragover" : "upload-box";
// }

function fileSelectHandler(e) {
    // handle file selecting
    var files = e.target.files // || e.dataTransfer.files;
    previewFile(files[0]);
    // fileDragHover(e);
    // for (var i = 0, f; (f = files[i]); i++) {
    //     previewFile(f);
    // }
}

//========================================================================
// Web page elements for functions to use
//========================================================================

var imagePreview = document.getElementById("image-preview");
var imageDisplay = document.getElementById("image-display");
var uploadCaption = document.getElementById("upload-caption");
var predResult = document.getElementById("pred-result");
var model = undefined;

//========================================================================
// Main button events
//========================================================================


async function initialize() {
    model = await tf.loadLayersModel('model/model.json');   
    // console.log(model)
}

// 59line || !imagePreview.src.startsWith("blob")

initialize();

async function predict() {
    // action for the submit button
    //console.log(imagePreview.src)
    if (!imagePreview.src ) {
        window.alert("Please select an image before submit.");
        return;
    }

    var tensorImg = tf.browser.fromPixels(imagePreview).resizeNearestNeighbor([224, 224]).toFloat().div(255.0).expandDims();
    // tensorImg.print()
    prediction = await model.predict(tensorImg).data();

    // console.log(prediction)

    var idx_to_label = {
        0: "Bean",
        1: "Bitter_Gourd",
        2: "Bottle_Gourd",
        3: "Capsicum",
        4: "Carrot",
        5: "Cauliflower",
        6: "Potato",
        7: "Pumpkin",
        8: "Radish"
    }

    var maxx_idx = 0
    var maxx = 0

    for(var i=0; i<prediction.length; i++){
        if(prediction[i]>maxx){
            maxx = prediction[i]
            maxx_idx = i
        }
    }

    // console.log(maxx_idx)

    predResult.innerHTML = "The name of the vegetable is " + idx_to_label[maxx_idx];
    show(predResult)

}

function clearImage() {
    // reset selected files
    fileSelect.value = "";

    // remove image sources and hide them
    imagePreview.src = "";
    // imageDisplay.src = "";
    predResult.innerHTML = "";

    hide(imagePreview);
    // hide(imageDisplay);
    hide(predResult);
    show(uploadCaption);

}

function previewFile(file) {

    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = function(){
        imagePreview.src = URL.createObjectURL(file);

        show(imagePreview);
        hide(uploadCaption);

        // reset
        predResult.innerHTML = "";

        // displayImage(reader.result, "image-display");
    };
}

//========================================================================
// Helper functions
//========================================================================

// function displayImage(image, id) {
//     // display image on given id <img> element
//     var display = document.getElementById(id);
//     display.src = image;
//     show(display);
// }

function hide(el) {
    // hide an element
    el.classList.add("hidden");
}

function show(el) {
    // show an element
    el.classList.remove("hidden");
}
