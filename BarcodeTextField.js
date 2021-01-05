import React from "react";
import ReactDOM from "react-dom";
import Quagga from "quagga"; // ES6



var _scannerIsRunning = false;

//API abfrage
function getAPIdata(barcode) {
    const proxyurl = "https://cors-anywhere.herokuapp.com/"; // Use a proxy to avoid CORS error
    const api_key = "fmpj23pu8g0u19edw824cp26ckxcim";
    const url = proxyurl + "https://api.barcodelookup.com/v2/products?barcode=" + barcode + "&formatted=y&key=" + api_key;
    fetch(url)
            .then(response => response.json())
            .then((data) => {

document.getElementById("ProductName").innerHTML = (data.products[0].product_name);
document.getElementById("Kategorie").innerHTML = (data.products[0].category);
document.getElementById("Images").innerHTML = '<img src="' + (data.products[0].images) + '">';

            })
            .catch(err => {
                throw err
            });
}

document.addEventListener('DOMContentLoaded', function () {
let submit = document.querySelector('#submit_barcode');
submit.addEventListener('click', function(){
  let barcode_input = document.querySelector('#text-input').value;
  getAPIdata(barcode_input);
})
}, false);

class BarcodeTextField extends React.Component {
  constructor(props) {
    super(props);
    // This binding is necessary to make `this` work in the callback
    this.handleClick = this.handleClick.bind(this);
    this.handleFileSelect = this.handleFileSelect.bind(this);
  }

  handleClick() {
    if (_scannerIsRunning) {
      Quagga.stop();
    } else {
      this.startScanner();
    }
  }

//Diese Methode initialisiert die Bibliothek für eine bestimmte Konfigurationskonfiguration (siehe unten) und ruft den Rückruf (err) auf,
//wenn Quagga seine Bootstrapping-Phase abgeschlossen hat. Der Initialisierungsprozess fordert auch den Kamerazugriff an, wenn die Echtzeiterkennung konfiguriert ist.
//Im Fehlerfall wird der Parameter err gesetzt und enthält Informationen zur Ursache. Eine mögliche Ursache kann sein, dass inputStream.type auf LiveStream eingestellt ist, der Browser diese API jedoch nicht unterstützt oder einfach,
//wenn der Benutzer die Berechtigung zur Verwendung der Kamera verweigert.

  startScanner() {
    Quagga.init(
      {
        inputStream: {
          name: "Live",
          type: "LiveStream",
          target: document.querySelector("#scanner-container"),
          constraints: {
            width: 480,
            height: 320,
            facingMode: "environment"
          }
        },
        decoder: {
          readers: [
            "code_128_reader",
            "ean_reader",
            "ean_8_reader",
            "code_39_reader",
            "code_39_vin_reader",
            "codabar_reader",
            "upc_reader",
            "upc_e_reader",
            "i2of5_reader"
          ],
          debug: {
            showCanvas: true,
            showPatches: true,
            showFoundPatches: true,
            showSkeleton: true,
            showLabels: true,
            showPatchLabels: true,
            showRemainingPatchLabels: true,
            boxFromPatches: {
              showTransformed: true,
              showTransformedBox: true,
              showBB: true
            }
          }
        }
      },
      function(err) {
        if (err) {
          alert("You need a camera to scan barcodes.");
          console.log(err);
          document.querySelector("#scanner-container").innerHTML = "";

          return;
        }

        console.log("Initialization finished. Ready to start");


      //  Wenn die Bibliothek initialisiert wird, startet die Methode start () den Videostream und beginnt, die Bilder zu lokalisieren und zu dekodieren.
        Quagga.start();

        // Set flag to is running
        //_scannerIsRunning = true;
      }
    );

    Quagga.onProcessed(function(result) {
      var drawingCtx = Quagga.canvas.ctx.overlay,
        drawingCanvas = Quagga.canvas.dom.overlay;

      if (result) {
        if (result.boxes) {
          drawingCtx.clearRect(
            0,
            0,
            parseInt(drawingCanvas.getAttribute("width")),
            parseInt(drawingCanvas.getAttribute("height"))
          );
          result.boxes
            .filter(function(box) {
              return box !== result.box;
            })
            .forEach(function(box) {
              Quagga.ImageDebug.drawPath(box, { x: 0, y: 1 }, drawingCtx, {
                color: "green",
                lineWidth: 2
              });
            });
        }

        if (result.box) {
          Quagga.ImageDebug.drawPath(result.box, { x: 0, y: 1 }, drawingCtx, {
            color: "#00F",
            lineWidth: 2
          });
        }

        if (result.codeResult && result.codeResult.code) {
          Quagga.ImageDebug.drawPath(
            result.line,
            { x: "x", y: "y" },
            drawingCtx,
            { color: "red", lineWidth: 3 }
          );
        }
      }
    });

//Registriert eine Rückruffunktion (Daten), die ausgelöst wird, wenn ein Barcode-Muster erfolgreich gefunden und decodiert wurde.
//Das übergebene Datenobjekt enthält Informationen über den Decodierungsprozess, einschließlich des erkannten Codes, der durch Aufrufen von data.codeResult.code abgerufen werden kann.
    Quagga.onDetected(function(result) {
      Quagga.stop();
      document.querySelector("#text-input").value = result.codeResult.code;
      document.querySelector("#scanner-container").innerHTML = "";
      console.log(
        "Barcode detected and processed : [" + result.codeResult.code + "]",
        result
      );
    });
  }

  handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    var tmpImgURL = URL.createObjectURL(files[0]);

//
    Quagga.decodeSingle(
      {
        src: tmpImgURL,
        numOfWorkers: 0, // Needs to be 0 when used within node
        locate: true,
        inputStream: {
          size: 800 // restrict input-size to be 800px in width (long-side)
        },
        decoder: {
          readers: [
            "code_128_reader",
            "ean_reader",
            "ean_8_reader",
            "code_39_reader",
            "code_39_vin_reader",
            "codabar_reader",
            "upc_reader",
            "upc_e_reader",
            "i2of5_reader"
          ]
        }
      },
      function(result) {
        console.log(result);
        if (result) {
          if (result.codeResult != null) {
            document.querySelector("#text-input").value =
              result.codeResult.code;
              //fügt result in API ein
              getAPIdata(result.codeResult.code);
            console.log("result", result.codeResult.code);
          } else {
            alert("not detected");
            document.querySelector("#text-input").value = "";
          }
        } else {
          alert("not detected");
          document.querySelector("#text-input").value = "";
        }
      }
    );
  }

  componentDidMount() {
    document
      .querySelector("#inputId")
      .addEventListener("change", this.handleFileSelect, false);
  }





}


export default BarcodeTextField;
