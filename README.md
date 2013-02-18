![Entrepreneurs Society](http://i.imgur.com/LXQq5eK.png)

A website which will enable users to register and network between each other in order to find people who want something done and people who have the skills to do it.

| Tasks                         | Assigned-to | Status          |
| ------------------------------|:-----------:|----------------:|
| Blogging engine               | Jake        | Not started     |
| Rich text editor              |             |                 |
| Profile editor                | Chris       | Completed       |
| Anonymous email               |             |                 |
| online indicator              |             |                 |
| admin indicator               |             |                 |
| report abuse system           |             |                 |
| create new admin system       |             |                 |
| event posting                 |             |                 |
| account verification          |             | Completed       |
| link profile with skills page | Chris       | Completed       |
| skill search                  |             |                 |
| rss for blog                  |             |                 |
| rss for events                |             |                 |


Some good things to know
----------------
- Read through the [CakePHP coding standards](http://book.cakephp.org/2.0/en/contributing/cakephp-coding-conventions.html). It will make it a lot easier for other people to understand your code if it's written in a standard way.
- Get yourself [GitHub for Windows](http://windows.github.com/) or [GitHub for Mac](http://mac.github.com/). It makes it easy to commit your changes to GitHub using a GUI rather than command line.
- If you're not sure how to implement a feature or whatever then ask someone else for advice, don't just commit it and hope for the best.
- That said, we can roll back commits so don't be afraid to commit. The only way this works is if people commit their changes as soon as they're done with them so the next person has the most up-to-date code.

To do some development...
----------------
This process needs to be followed every time you decide to do some development work.

1. Grab the latest version of the website files using GitHub for Windows/Mac. **This is essential** as other people may have made changes and if you don't have the latest files you may break something.
2. The database settings in `app/Config/database.php` may be different from the settings you need. Change them to the settings you need. Generally this will just be a `database_name` change, for best results set up the database as I have done so you don't need to change anything.
3. If the database schema has been changed you may get some Cake or SQL errors. Make sure you import the new database SQL file (in the root directory of the application) so you have the latest changes. If you make changes to the database, please upload the SQL dump (you can "export" from phpMyAdmin) so people can get the latest schema.
4. Go work some magic and wizardry on the code.
5. Commit the changes back to GitHub using GitHub for Windows/Mac. It's essential that you do this for every feature that you've completed so we can track who's done what.

And please, for the love of God
----------------
Have a read through the [CakePHP cookbook](http://book.cakephp.org/2.0/en/index.html), specifically the parts about [Routes](http://book.cakephp.org/2.0/en/development/routing.html), [Models](http://book.cakephp.org/2.0/en/models.html), [Views](http://book.cakephp.org/2.0/en/views.html) and [Controllers](http://book.cakephp.org/2.0/en/controllers.html). and do the [blog tutorial](http://book.cakephp.org/2.0/en/tutorials-and-examples/blog/blog.html). There's nothing worse than looking at someone's changes and realising it all needs to be rewritten because they didn't follow conventions or code it the way they should. The only way we'll all stay sane and finish this project on time is if you all do this.

### thx bbz <3 xoxoxo ###
