# qed42-assignment
Custom module for qed42 assignment.

# Assumption:-
	* Drush is installed & available.

NOTE:- Created a new content type "Articles" with this custom module which would be available on installing this custom module.

============================================================================================================================
# Task Description:-
============================================================================================================================
You need to get all the feed data stored in Drupal to display the current top posts.
● Feed source: http://feeds.feedburner.com/ndtvnews-top-stories.xml

Expectations from the tasks:
● Perform this activity in Drupal 8 or Drupal 9
● Using one of the two approaches
○ Migrations module
○ Custom Drush 9 command
● Field mapping (add fields as required in Article Content type)
○ guid => text field
○ title => title of Node
○ link => link field
○ updatedAt => changed
○ pubDate => created
○ StoryImage => File field
● Code passes PHPCS standards
○ https://www.drupal.org/docs/8/modules/code-review-module/installing-coder-sniffer
○ https://www.drupal.org/docs/8/modules/code-review-module/php-codesniffer-command-line-usage
Bonus points
● Use taxonomy term fields for source and category
● Delete the job posts which are not available in the current feed

============================================================================================================================

============================================================================================================================
# Steps:-
============================================================================================================================

# Install the custom module "qed42".

# Installation will create the required fields in the new "Articles" content type, a migration group "Qed42 Migration Assignment Group" & a migration "Migrate articles from external XML source in articles content type" to migrate posts from the external xml source.

# To execute the migration from terminal run the following command:-
	drush mim qed42_migration_articles --update --sync

	--update:- will update the posts if it already exists
	--sync:- will delete the posts which are not available in the current feed

# To check the posts migrated visit the path "/current-top-posts" or click the menu "Current Top Posts" in the main navigation menu.

# Source & Category fields in the article content type are Taxonomy referenced fields of Vocabularies Sources & Categories respectively.

# Source & Category field data in the article content type are extracted from the link element in the feed source since the source & category elements were not available in the provided feed source. (http://feeds.feedburner.com/ndtvnews-top-stories.xml)

# Source & Category field data is extracted by custom migrate process plugins "extract_article_source" & "extract_article_category" respectively.

============================================================================================================================