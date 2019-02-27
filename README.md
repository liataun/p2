# Project 2
+ By: Brian Twitchell
+ Production URL: (http://p2.twitchell.com)
Project 2 for CSciE15 - Form use and validation in PHP

## Outside resources
* [Bootstrap](https://getbootstrap.com/docs/4.3/getting-started/introduction/)
* [Bootstrap Forms](https://getbootstrap.com/docs/4.0/components/forms/)
* [Bootstrap Spacing](https://getbootstrap.com/docs/4.0/utilities/spacing/)
* [Bootstrap Colors](https://getbootstrap.com/docs/4.0/utilities/colors/)
* Hacker, D. (2004). *A Pocket Style Manual Fourth Edition.* Boston: Bedford.
* [w3schools html syntax](https://www.w3schools.com/html/html_form_input_types.asp)
* [w3schools length guidance](https://www.w3schools.com/html/html5_syntax.asp)
* [aria-labelledby for multiple nodes](https://www.w3.org/WAI/GL/wiki/Using_aria-labelledby_to_concatenate_a_label_from_several_text_nodes)
* [Was forgetful and needed a reminder](https://www.sitepoint.com/community/t/how-to-make-h1-h2-etc-as-links/3004)

## 3 Unique inputs
1. Select input to indicate type of author entry
2. Text input to indicate author name
3. Checkbox to indicate desire for in-text style citation

## Class
`Form.php` Sadly that's it so far. Was hoping to do more, but haven't figured out what to refactor yet.

## Code style divergences
* Using a number of divs in order to try out Bootstrap input styling.
* Not adding additional styling to the h1 element in header despite having a link, as it currently does not need attention and does stand out. Without other links consistency does not exist to establish user understanding. I wanted to add it to help train myself for when we have more than one page, theoretically, in a future project in the class.

## Notes for instructor
* I liked the way bootstrap's warnings look in your lecture/notes, so I am trying to make use of it for my project. However, I have never used this framework myself. I have attempted to restrict my use of the Bootstrap documentation to looking up class names to get approximately the styling I am thinking of.
* I included a number of unnecessary features to practice site construction concepts including a `p` element that should never show, but will conditionally appear on the page.
* I was uncertain as to how best to construct the citation and maintain italics for the title. Per our discussion on Slack, I have moved it to the display file, but I'm having trouble getting the code and resulting HTML as clean as I would like it to be.