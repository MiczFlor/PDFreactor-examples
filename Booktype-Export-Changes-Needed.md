# HTML for PDFreactor themes

## Language for hyphenation

### Include in `<html lang="de">`

## Frontmatter

### Wrap pages in tags
* `<section id="frontmatter-half-title">`
* `<section id="frontmatter-dedication">`
* `<section id="frontmatter-title-page">`
* `<section id="frontmatter-collophon">`
* `<section class="mpdf_toc">`

### Generate HTML for table of contents

The table of contents need to have the chapter titles linked with relative links to the IDs of the 
chapters and subheadings inside the chapter. It could look like this (indentation just for clarity):

```
<section class="mpdf_toc">
  <div class="toc-title">Inhalt</div>    
  <div class="mpdf_toc_level_0"><a href="#part1">###Frontmatter</a></div>
    <div class="mpdf_toc_level_1"><a href="#ch1-1">Foreword</a></div>
    <div class="mpdf_toc_level_1"><a href="#ch2-1">Preface</a></div>
    <div class="mpdf_toc_level_1"><a href="#ch3-1">Acknowledgements</a></div>
    <div class="mpdf_toc_level_1"><a href="#ch4-1">Abbreviations</a></div>
  <div class="mpdf_toc_level_0"><a href="#part2">###Mainmatter</a></div>
    <div class="mpdf_toc_level_1"><a href="#ch5-1">Introduction and Executive Summary</a></div>
      <div class="mpdf_toc_level_2"><a href="#ch5-11">Heading level 1</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch5-111">Sub-heading level two 1.1</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch5-121">make headline here</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch5-122">Sub-heading level three 1.2</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch5-123">Sub-heading level three 1.3</a></div>
      <div class="mpdf_toc_level_2"><a href="#ch5-13">Heading level 2</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch5-131">Sub-heading level two 2.1</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch5-132">Sub-heading level three 2.2</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch5-133">Sub-heading level three 2.3</a></div>
    <div class="mpdf_toc_level_1"><a href="#ch6-1">Long Article in Mainmatter</a></div>
      <div class="mpdf_toc_level_2"><a href="#ch6-11">Heading level 1</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch6-111">Sub-heading level two 1.1</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch6-112">Sub-heading level three 1.2</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch6-113">Sub-heading level three 1.3</a></div>
      <div class="mpdf_toc_level_2"><a href="#ch6-12">Heading level 2</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch6-121">Sub-heading level two 2.1</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch6-122">Sub-heading level three 2.2</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch6-123">Sub-heading level three 2.3</a></div>
    <div class="mpdf_toc_level_1"><a href="#ch7-1">References</a></div>
    <div class="mpdf_toc_level_1"><a href="#ch8-1">Example code for Booktype features</a></div>
    <div class="mpdf_toc_level_1"><a href="#ch8-2">Heading H1</a></div>
      <div class="mpdf_toc_level_2"><a href="#ch8-21">Subheading H2</a></div>
        <div class="mpdf_toc_level_3"><a href="#ch8-211">Subsubheading H3</a></div>
  <div class="mpdf_toc_level_0"><a href="#part3">###Backmatter</a></div>
</section>
```

## Mainmatter

### Wrap chapters in tags
* `<div data-type="chapter" class="chapter mainmatter">`

### Add unique ID to chapter titles and sections (parts)
* `<h1 class="body-h1" id="rellinkch1">`

These unique IDs need to match the IDs in the table of contents HTML (see above).

We will also need to include unique IDs to the h1, h2, h3, h4 and h5 inside each chapter. 
In case we need them in the table of contents. 

The ID does not need to make sense to the world, it just needs to be an ID.
But best might be that we have some kind of counter running, possibly a counter
for each level, resulting in an ID for the first `h3` tag in chapter 2 which is 
a child of the second `h2` inside the third `h1`:

* `id="ch2-321"`
  * `ch2` = chapter 2
  * `-` = only for readability
  * `3` = third `h1`
  * `2` = second `h2`
  * `1` = first `h1`
  
If there are no `h1` used inside the chapter, the first `h2` would then look like this:
* `id="ch2-01"`
  
The chapter title is also an `h1`, therefore the chapter title of chapter number 5 is:
* `id="ch5-1"`

Book sections (or parts, as they are sometimes called) also need unique IDs. Just count them.
* `id="part1"`

# Would be good to do

## Standardise classes

### Parapgraph in chapter
* default in Booktype: `p.body` and `p.body-first`
* BoD mpdf print CSS: `p.normal` and `p.normal-first`
