<?php

/*************************************************************/
// PDF REACTOPR . CSS
// read template file and add page measurements on top

// Include PDFreactor class
require_once("PDFreactor.class.php");

// The content to render
$content = implode(file($create['html']));

date_default_timezone_set('CET');

// Create new PDFreactor instance
$pdfReactor = new PDFreactor();

$config = array(
    // Specify the input document
    "document"=> $content,
    // Set a base URL for images, style sheets, links
    "baseURL"=> "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"],
    // Set an appropriate log level
    "logLevel"=> LogLevel::DEBUG,
    // Set the title of the created PDF
    "title"=> "Book samples from PDFreactor PHP API",
    // Sets the author of the created PDF
    "author"=> "Booktype GmbH",
    // Enables links in the PDF document.
    "addLinks"=> true,
    // Enables bookmarks in the PDF document.
    "addBookmarks"=> true,
    // Set some viewer preferences
    "viewerPreferences"=> array(
        ViewerPreferences::FIT_WINDOW,
        ViewerPreferences::PAGE_MODE_USE_THUMBS
    ),
    // Add user style sheets
    "userStyleSheets"=> array(
        array( 'uri'=> $create['css'] )
    )
);

// Render document and save result to $result 
$result = null;
try {
    $result = $pdfReactor->convertAsBinary($config);
    header("Content-Type: application/pdf");
    echo $result;
} catch (Exception $e) {
    echo "<h1>An Error Has Occurred</h1>";
    echo "<h2>".$e->getMessage()."</h2>";
}
?>