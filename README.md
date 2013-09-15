## Sample Use In A Controller Action ##

    $googleUser = $this->get('aw_google_plus')->getUserFromSession();
    // $googleUser is of type AW\Bundle\GooglePlusBundle\Entity\User

    if (!$googleUser) {
        return $this->redirect($this->generateUrl(
            'aw_google_plus_auth',
            array('continue' => $this->generateUrl('page_to_continue_to'))
        ));
    }
    return $this->redirect($this->generateUrl('page_to_continue_to'));

## Install ##

* If you use Git, run `git submodule add git@github.com:amyboyd/symfony2-google-plus-oauth-bundle.git path/to/bundles/AW/Bundle/GooglePlusBundle`

* If you don't use Git, download the source and put it into your bundles
  directory.

* Visit https://code.google.com/apis/console?api=plus to generate your
  client ID, client secret, and to register your redirect URI.

* Enable AWGooglePlusBundle in your `app/AppKernel.php`

* Add to your app/config/routing.yml:

    `aw_google_plus: {
        resource: "@AWGooglePlusBundle/Resources/config/routing.yml"
        prefix:   / }`

* Copy the contents of `Resources/config/parameters.yml.sample` to your own `app/config/parameters.yml`

* Review `app/console doctrine:schema:update --dump-sql`

* Run `app/console doctrine:schema:update --force` if the above was OK.
