<?php
// see if we got some vars with the URL, then launch PDFreactor via PHP wrapper
if(
  isset($_GET['dir'])
  && file_exists(urldecode($_GET['dir']))
  && trim($_GET['dir']) != ""
  ) {
  // looking good so far, dir exists
  $dir = urldecode($_GET['dir']);
  // now check if we have the HTML and CSS file, if not => error
  if(
    file_exists($dir."/pdfreactor-body.html")
    && file_exists($dir."/pdfreactor-style.css")
//    && file_exists($dir."/bod_mpdf-UNIVERSAL.css")
    ) {
    $create = array(
      'html' => $dir.'/pdfreactor-body.html', 
      'filename' => $dir.'/pdfreactor-raw.pdf', 
      'css' => $dir.'/pdfreactor-style.css',
//      'css' => $dir.'/bod_mpdf-UNIVERSAL.css',
    );
    // now load php wrapper
    include("lib/include.php");
  } else {
    // throw error
    print "<html>\n<head><title>PDFreactor sample files</title></head>\n<body>\n";
    print "<h1>PDFreactor files not found in directory '".$dir."'</h1>\n";
    print "\n</body>\n</html>";
  }
} else {
  // no parameters, then list available examples
  $dirs = array_filter(glob('samples/*'), 'is_dir');
  
  print "<html>\n<head><title>PDFreactor sample files</title></head>\n<body>\n";
  print "<h1>Select PDFreactor sample for rendering</h1>\n";
  print "<ul>\n";
  foreach($dirs as $dir) {
    // only list directories, where we have the needed HTML and CSS files
    if(
      file_exists($dir."/pdfreactor-body.html")
      && file_exists($dir."/pdfreactor-style.css")
      ) {
      print "\n  <li><a href='?dir=".urlencode($dir)."' target='_blank'>".$dir."</a></li>";
    }
  }
  print "</ul>\n";
  print "\nDelete page 2: <pre>pdftk pdfreactor-body.pdf cat 1 3-end output pdfreactor.pdf</pre>";
  print "\Create PDFreactor PDF: <pre>/home/micz/Software/PDFreactor_8_1_8613_1/bin/pdfreactor.py -i body-pdfreactor.html -o pdfreactor.pdf</pre>";
  print "\Create PrinceXML PDF: <pre>prince -s pdfreactor-style.css pdfreactor-body.html --pdf-profile=PDF/X-3:2003 -o princexml.pdf</pre>";
  print "\n</body>\n</html>";
}

$create = array('html' => '', 'css' => '');
$create = array('html' => 'samples/table-of-contents/toc-simple.html', 'css' => 'samples/table-of-contents/toc-simple.css');
$create = array('html' => 'samples/table-of-contents/toc-simple-figurestablesboxes.html', 'css' => 'samples/table-of-contents/toc-simple-figurestablesboxes.css');
//$create = array('html' => 'samples/official-textbook/textbook.html', 'css' => 'samples/official-textbook/textbook.css');
$create = array('html' => 'samples/bod_belletristik1/bod_belletristik1-pdfreactor-body.html', 'css' => 'samples/bod_belletristik1/bod_belletristik1-pdfreactor-style.css');
//$create = array('html' => 'samples/bod_article1/bod_article1-pdfreactor-body.html', 'css' => 'samples/bod_article1/bod_article1-pdfreactor-body.css');
$create = array('html' => 'samples/omnibook_theme_academic/pdfreactor-body.html', 'css' => 'samples/omnibook_theme_academic/pdfreactor-style.css');

//include("lib/include.php");
?>