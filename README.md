# ComicsScraper
Scraping the URLs of web comics so we can show them on one page instead of going to a bunch of websites every day

First version of this script was writtern around 2003-2004, maybe even earlier.

No structure, no logic.. just line after line of reading HTML from URLs and parsing it until I find the comic URL and just printing it.
You can see the latest iteration of it in file old.php.

So I thought it's time for some refactoring :)

I know I could've made the more generic Scraper and for example Page classes, and just extend them for ComicScraper and Comic.. for now I'd just like to make it work.
