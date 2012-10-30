## Sample Use In A Controller Action ##

    @todo

## Install ##

* If you use Git, run `git submodule add https://bitbucket.org/addictionworldwide/google-plus-bundle-for-symfony2.git path/to/bundles/AW/Bundle/GooglePlusBundle`

* If you don't use Git, download the source and put it into your bundles
  directory.

* Enable AWGooglePlusBundle in your `app/AppKernel.php`

* Copy the contents of `Resources/config/parameters.yml.sample` to your own `app/config/parameters.yml`

* Review `app/console doctrine:schema:update --dump-sql`

* Run `app/console doctrine:schema:update --force` if the above was OK.
