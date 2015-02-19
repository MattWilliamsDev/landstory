# landstoryla.com

<!-- MarkdownTOC -->

- Project Data
	- Things to Watch For
- Using Project Data
	- Categories
	- Projects
	- Formatting Functions
	- Sidenav
	- Staff Bios

<!-- /MarkdownTOC -->


# Project Data
All project data is stored inside `/our_projects/data/all-project-data.php` in a JSON-formatted string.

## Things to Watch For
 - If copying & pasting from Word or other program, beware of "smart apostrophes" ( ’ )
 - Since the data is in string format, you must delimit ( \ ) all single and double quotes within the data.  This usually occurs in the storyline or list items. 
```php
 Examples:

 $projects = json_decode('{
 	"project_name": {
 		"storyline": "Landstory\'s plan..."
 	}
 	, "another_project": {
 		"storyline": "As they say, \"It\'s all in the hips\"!"
 	}
 }');
```
 - Remove extra line breaks from copied text.  These are the spots in the text where the wraps to the next line.
 - You will know immediately if an update was incorrectly formatted, as no project data will show `for any project`.  `It is best to **test all upates on [dev.landstoryla.com](//dev.landstoryla.com)**`, then push to [landstoryla.com](//landstoryla.com) after verification.

# Using Project Data
To use the project data functions, ```require_once( '/our_projects/data/project-data.php' );```

## Categories
To call all project info `grouped by category`: 
`**NOTE:** PHP array notation will not work with PHP object notation`
```php
 $categories = getCategories();
 $category_name = 'site_design';

 // CORRECT:
 $site_design = $categories->$category_name; // Same as $categories->site_design

 // INCORRECT:
 $site_design = $categories[ $category_name ]; // Invalid
```

## Projects
To call all project info `as a list of projects`:
`**NOTE:** PHP array notation will not work with PHP object notation`
```php
 $projects = getProjects();
 $white_river = $projects->white_river;
```

## Formatting Functions
|      Function      |        Description          | Alias/Shorthand | Returns |
| ------------------ | --------------------------- | --------------- | ------- |
|              upper | Convert string to uppercase |               d |  string |
|             format | Format string w/spaces      |               u |  string |
| formatCategoryName | Format category names       |                 |  string |

## Sidenav
`/our_projects/sidenav.php` utilizes the `getCategory` function to get all projects grouped by category.  It then loops through the categories and displays all projects listed for each one.

## Staff Bios
### Easy Install
`**NOTE:** This method requires Node.JS and Bower to install everything properly.`
In order to run staff bios, switch to the `/js/lib/staff-stories` directory on the command line, then run `bower install`.

### Difficult Install
Manually include the files listed inside `/js/lib/staff-stories/index.html`, as well as any included scripts listed inside the RequireJS config file `(/js/lib/staff-stories/common/js/require-config.js)`