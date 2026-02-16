const urlParams = new URLSearchParams(window.location.search);
const file = urlParams.get('file');
const pdfPath = '../doc/PDF_LIT/' + file;
console.log("Chargement PDF depuis : ", pdfPath);

let pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    canvas = document.getElementById('pdf-render'),
    ctx = canvas.getContext('2d');

const maxPage = 10;

pdfjsLib.getDocument(pdfPath).promise.then(function(pdfDoc_) {
  pdfDoc = pdfDoc_;
  document.getElementById('page_count').textContent = Math.min(maxPage, pdfDoc.numPages);
  renderPage(pageNum);
});

function renderPage(num) {
  pageRendering = true;
  pdfDoc.getPage(num).then(function(page) {
    const viewport = page.getViewport({ scale: 1.5 });

    canvas.height = viewport.height;
    canvas.width = viewport.width;

    const renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };

    // Render PDF page into canvas
    page.render(renderContext).promise.then(function () {
      pageRendering = false;
    });

    // ✅ Render text layer (for selectable text)
    page.getTextContent().then(function(textContent) {
      const textLayerDiv = document.getElementById('text-layer');
      textLayerDiv.innerHTML = '';  // Reset previous
      textLayerDiv.style.height = viewport.height + 'px';
      textLayerDiv.style.width = viewport.width + 'px';

      pdfjsLib.renderTextLayer({
        textContent: textContent,
        container: textLayerDiv,
        viewport: viewport,
        textDivs: []
      });
    });

    document.getElementById('page_num').textContent = num;
  });
}


function prevPage() {
  if (pageNum <= 1) return;
  pageNum--;
  renderPage(pageNum);
}

function nextPage() {
  if (pageNum >= Math.min(maxPage, pdfDoc.numPages)) return;
  pageNum++;
  renderPage(pageNum);
}
