# ComicsScraper

Just a little something to help me follow dozen or so web comics, without having to visit every one of their websites every day.

Custom scraping functions grab the URL of latest comics and then I show them all on one page.

First version of this script was writtern around 2003-2004, maybe even earlier.

There was no structure, it was just line after line of reading HTML from URLs and parsing it until I find the comic URL and just printing it. You can see the latest iteration of it in file old.php.

So I thought it's time for some refactoring :)

There are generic Scraper and Page classes in src/scraper dir that can be user with any kind of page/content.

And then there is the Comic class in src/comics dir, that extends Page class with some extra properties and custom scraping methods.