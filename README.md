# PDFreactor files for testing

This repo contains a number of examples, illustrating how PDFreactor can be used in 
Booktype. To be more precise: information on what a new export script needs to be
capable of, to create the HTML and CSS which is needed by PDFreactor.

Booktype is currently creating PDF files with mpdf. Orphans, widows and hyphenation
are not managed well by mpdf, which is why we add the option to create PDFs using
the proprietary PDFreactor solution. 

(Other proprietary export renderers can be added, like PrinceXML. We decided to
go with PDFreactor, because their support of baseline-grid is making it that bit
more attractive. The open source version vivliostyle is impressive, but does not 
support hyphenation... yet. For details, see the great site `www.print-css.rocks`)

## Structure

* `samples/` contains the folders with relevant HTML, CSS files
* `samples/Fonts/` contains all fonts used anywhere in the CSS samples
* `lib/` contains the PDF wrapper for PDreactor 

## Install

* You need to have PDFreactor Web Service installed. See www.pdfreactor.com
* Open `pdfreactorwebservice-start.sh` and change the path to match your dir structure
* Start the PDFreactor Web Service by typing `./pdfreactorwebservice-start.sh`
* Open the file `index.php` and change the relative paths to match the HTML and CSS file you want to use for PDF rendering.
* Make sure this repo is available through your browser on localhost.
* Open the URL in a browser (e.g. `http://localhost/pdfreactorexamples/`).
