=== RONIN47 ===
Contributors: xogumdotemail
Tags: users id, xss, floc, json, spam
Donate link: https://xogum.email
Stable tag: 2.4
Tested up to: 6.0
Requires at least: 5.0
Requires PHP: 7.4.0
License: GPLv3
License URI: https://opensource.org/licenses/GPL-3.0

This security plugin is designed for Google AMP Technology.


=== Description ===

RONIN47 helps to secure your WordPress website when using Google AMP Technology.

Among other things, RONIN47 checks if you are not in the admin area and whether someone is trying to access the author name via the “?author” parameter and if so, it will redirect to another webpage.
Hackers can find your username in WordPress by appending the query /?author=1 as in example.com/?author=1 which will immediately redirect to your author webpage like example.com/author/catherine

If hackers cannot find your username, they will not Brute-Force your Login page trying to guess your password and that means less load on your server.

RONIN47 also blocks WordPress JSON REST Endpoints. When you visit example.com/wp-json/wp/v2/users/1 you will see your username in plain sight. This happens because WordPress exposes certain REST APIs by default and this allows anyone to enumerate the users via JSON.
After activating this plugin, your website will return the following message (if you visit the same link again): {"code":"rest_no_route","message":"No route was found matching the URL and request method.","data":{"status":404}}

Whenever you try to log in, you will not see any errors that may indicate the wrong password or the wrong username. You will see instead the following message: "Something is wrong! Are you a legit user?".

RONIN47 hides Core Update Notices from all users except Admin and also removes the WordPress.org logo and links on the top left corner of the Admin dashboard.

For security reasons, RONIN47 is able to show Users ID with an extra column on Users Admin dashboard (users.php).

RONIN47 prevents many XSS code injections with a soft approach and also disables FLoC web tracking on your website, when your visitors browse it using Google Chrome.
When using Google Chrome, your browser will most probably track the websites that you visit and all the data is collected through the Federated Learning of Cohorts, FLoC.

Greatly reduces comments' spam by blocking No-Referrer Requests and this anti-spam method does not require any changes to be made to the .htaccess file, which means that it will work in both Ngynx and Apache servers.



=== Installation ===


AUTOMATIC INSTALLATION (Direct Method)

Automatic installation is the easiest option as WordPress handles the file transfers itself, you do not even need to leave your web browser.

1. To do an automatic install, login to your WordPress administration panel or dashboard, navigate to the "Plugins" submenu and click "Add New".
2. In the search field, you must type “RONIN47” and click "Search Plugins".

WordPress will open a page with several plugins that are related to each other through common "tags". Once you have found our plugin, you can view details about it such as the release date, rating, screenshots and description.

3. You can install it by clicking "Install Now".
4. Then, you will see the option to "Activate" and you have to click on it...


AUTOMATIC INSTALLATION (Download)

1. Upload the ZIP file or ronin47.zip into your WordPress plugins' page after downloading it from https://wordpress.org/plugin/ronin47
2. Activate the plugin!


MANUAL INSTALLATION (Download & Transfer FTP)

The manual installation method involves downloading the plugin and uploading it to your webserver via an FTP application. If you are a beginner, we dare to suggest you the use of a FileZilla.org Client since it is quite easy and intuitive to use.

1. Download the ronin47.zip file to your computer and unzip it...
2. Yes, unzip it. Mouse over the zip file, right click and choose "Extract All". Better to point the folder directory to your desktop (easier to find).
3. Using an FTP program (maybe even your hosting control panel) upload the unzipped plugin folder to your WordPress installation’s wp-content/plugins/ronin47
4. Activate RONIN47 from the "Plugins" submenu within the WordPress administration panel.


=== Screenshots ===


To decrease your server load and weight of this plugin (we mean the total number of KBytes uploaded to WordPress.org) , we kindly ask you to visit https://xogum.email to see all available screenshots.


=== Support ===


Please, use the WordPress.org forums for community support at https://wordpress.org/support/plugin/ronin47 and if you spot a bug or if you have a suggestion to improve the code functionality, you can contact us at admin@xogum.email


=== Frequently Asked Questions ===


What if something does not work?


RONIN47 should work with all well coded WordPress plugins and standard themes. However, not all plugins and themes are well coded and this includes some of the most popular, unfortunately.

Even the best programmers make mistakes, it does not matter how good you are when coding software.

If something does not work properly, first you must deactivate ALL other plugins and switch to one of the core standard themes, e.g. "twentytwenty".

But if the problem persists, please leave a post in the support forum: https://wordpress.org/support/plugin/ronin47 since we look there regularly and aim to resolve any doubts or problems.


Why do I get a fatal error when uploading RONIN47 to my website?


That error is due to the fact that since WordPress v5.2 there is a built-in core feature that detects when a plugin or theme causes a fatal error on your website and the detection system is correct, in this case.

That fatal error results from your website still not running on PHP 8.0 (according to all of our tests) and you must double-check your PHP version with your hosting provider on cPanel, Plesk, Cloudways, VestaCP, ISPconfig, OviPanel or any other GUI (online graphical interface) used by your server.

If you do not know what are those names above, please contact your hosting provider for help and if their staff is not very cooperative, you can also eMail us asking for help. We will do our best to help you.


Where can I get more information on how to use this RONIN47 plugin?


Please, visit https://xogum.email to obtain detailed information on how to use RONIN47 and its full capabilities.


Does the number of plugins slow down your WordPress website?


Yes. The strongest argument against this idea is that "as long as the plugins are well coded, they will not slow down the website". Wishful thinking, nothing else.

Obviously, any plugin must be well coded to avoid slowing down your website but the fact is that WordPress CMS runs on PHP and if we compare it with Node.js, we can imagine that PHP runs on a one way avenue and Node.js runs on a two-way avenue, to say the least. PHP (despite its amazing speed) will have to go through each plugin, each readme.txt file, each license.txt file, each line of code, etc., to get its job done. So, it does not matter how well things are coded, the more plugins you have, the bigger is the probability of slowing down. RONIN47 is being developed to deliver a pack of features that include the functions of several plugins on the market, in order to keep your website safe and fast using AMP technology.


Is WordPress secure and safe to use?


Well, why do you need a security plugin right from the beginning, after the initial installation? Many plugins on the repository (despite its need and brilliant concept) are no longer maintained and updated on a regular basis and that is something that creates security vulnerabilities.


To be sure that our plugin is totally safe and does not harm your website, we suggest that (after downloading it from WordPress.org) you scan it first using https://www.virustotal.com where you can even join that vibrant security community.


=== Changelog ===


2.0 A new security plugin for Google AMP Technology, RONIN47, is launched on WordPress.org on June 2022

2.1 Recoding to make plugin compatible with different types of servers. All tests were successful.

2.2 Added capability to show Users ID with an extra column on Users Admin dashboard. Removal of WordPress.org logo and links on top left corner of Admin dashboard.

2.3 Added code to prevent XSS attacks, which will neutralise many Cross-Site Scripting attemps (XSS code injections) and also disables FLoC web tracking on your website by Google Chrome.

2.4 Added PHP code to reduce comments spam by blocking No-Referrer Requests. This anti-spam method does not require any changes to be made to the .htaccess file.
