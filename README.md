## ECOMMERCE PROJECT

# How To Run

1. Clone this project here [https://danielcoker@bitbucket.org/danielcoker/ecom-app.git]

2. Run the command `php artisan serve`

[Note] The repo does not contain the `vendor` folder, so you might want to copy that from your local machine.

## What's Included

I have setup the basic stuffs. First things first, the Multi Authenticaton for the users and the admins.
You can check them here:

1. User login - [http://localhost:8000/login]
2. Admin login - [http://localhost:8000/admin/logn]

It supports the two user types logging in at the same time.

The project is basically divided into two parts:

1. **Store** -- The store is going to serve as the front end of the app.
2. **Admin** -- This the adminstrative area of the app. The Backend.

##Workflow

This is the workflow I'm proposing.
I'll create the controllers, models and migrations and also integrate them with the `html` template I have with me here. When I'm done I'll commit the changes so you can also view the controllers, adjust them appropiately, and make integrate them with your own `html` template you have with you.

I'll be writing the controllers bit by bit, as I am doing them, I'll also commit them so we can move at the same pace. So when I'm done with a controller, or two controllers that depend on each other, I'll commit and notify you so you can also integrate it in your side there.

I am starting with the admin part first, and we'll work our way up like that till the front end.

I'll commit the admin area front end as soon as I seperate them into layouts.

I'll commit regularly, and always keep you posted!

Friday 23rd looks impossible :-D
...but we'll keep working. 

##UPDATE

**Shopping Cart**

Shopping cart dependencies

Run this command `composer require "darryldecode/cart:~4.0"`

1. Open config/app.php and add this line to your Service Providers Array. NOTE: If you are using laravel 5.5 or above, this will be automatically added by its auto discovery.
    `Darryldecode\Cart\CartServiceProvider::class`
2. Open config/app.php and add this line to your Aliases
    `'Cart' => Darryldecode\Cart\Facades\CartFacade::class`
3. Optional configuration file (useful if you plan to have full control)
    `php artisan vendor:publish --provider="Darryldecode\Cart\CartServiceProvider" --tag="config"`

Added view, controllers, and routes to make the cart funcitonality work.

**Customer Registration**

Added customer registraton functionality. Created new views, controller, migration, and routes.
For this to work you need to run this command first.

`composer require doctrine/dbal`

This dependency is for the database migrations. I have to rename some columns, it won't work without `doctrine/dbal`.

**Login and Reset Password**

Added views and logic for reset password.

**Store Categories, Subcategories, Search, Product Details**

Display products in the categories, subcategories and search pages.

Also displayed the product details in the product detail page.

**Store Front Layout**

I've added the store front UI, sectioned them into layouts. Ready to start development on the store front end now

Also added categories from the database to the Mega menu in the header.

**Login View and Authentication**

I've added the login view, and locked down all the admin controllers. So authentication and password reset are all working fine now. In this update I also fixed a bug in the admin login page - validation error message. To fix this error, I edited the `AdminLoginController.php` file. So when you're setting this up in your side there, you can take note.

Products added are now for each admin, so each admin can see only products the admin added.

`Date added` column is also added to the products table.

**Products and Images**

Added product controller, model, migrations and routes. Also images is also added.

**Sizes**

I've added the sizes controller, model, migration, and routes.
You can find the views for the sizes here: `Resources > Views > Admin > subcategories`

This feature gives the abiliy to add product sizes to the store. Example `XL`, `L`, `41`, `42`.

**Sub Categories**

I've added the subcategories controller, model, migration, and routes.
You can find the views for the subcategories here: `Resources > Views > Admin > subcategories`

**Categories**

I've added the categories controller, model, migration, and routes.
You can find the views for the categories here: `Resources > Views > Admin > categories`

**Admin UI**
I've added views for the admin dashboard, just the basic stuffs. I'll start building from here.
Kindly notice the folder structure.

##Dependencies

**Laravel Collective**

For the forms to work, you have to install laravel collective.

1. Add this line to your `composer.json` file "laravelcollective/html": "^5.4.0" under `require`.

2. Run `composer update`

3. Add this line of code to `providers` in your `config/app.php` file. `Collective\Html\HtmlServiceProvider::class,`.

4. Also add these lines of code to `aliases` in your `config/app.php` file. `'Form' => Collective\Html\FormFacade::class,` and `'Html' => Collective\Html\HtmlFacade::class,`


Check [https://laravelcollective.com/docs/5.2/html#installation] for more details on Laravel Collective installation.

**Image Intervention Package**

This package is for image upload.

1. Run `composer require intervention/image` to install.

2. Add this line of code to `providers` in  you `config/app.php` file `Intervention\Image\ImageServiceProvider::class`

3. Also add this line of code to `aliases` in your `config/app.php` file `'Image' => Intervention\Image\Facades\Image::class`

Check [http://image.intervention.io/getting_started/installation] for more details on Image Intervention package.