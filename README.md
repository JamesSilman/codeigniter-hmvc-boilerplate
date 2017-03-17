# codeigniter-hmvc-boilerplate
An example of the codeigniter framework using the HMVC methodology.

## What the heck is this?
This is a very basic implementation of HMVC using the *codeigniter* framework and *wiredesignz* modular extension.
You can find the *codeigniter* framework here: https://codeigniter.com/
You can find the *wiredesignz* modular extension here: https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc

## Examples
coming soon...

## Changes
Below is a list of changes that have been made to the *codeigniter* framework to enable you to use HMVC.

### application/core/config.php
Updated the below configuration, this changes your site from this: http://localhost/index.php?home, to this: http://localhost/home

	$config['index_page'] = 'index.php';

to

	$config['index_page'] = '';


Added the below code to the *config.php* file to allow you to reference modules (see examples).

    $config['modules_locations'] = array(
        APPPATH.'modules/' => '../modules/',
    );

### application/config/autoload.php
Updated the *autoload.php* file to autoload sessions as require by the *wiredesignz* HMVC modular extension.

	$autoload['libraries'] = array();

to:

	$autoload['libraries'] = array('session');

### /.htaccess
Based upon the *config.php* changes above, the *.htaccess* file within the root was changed from:

	<IfModule authz_core_module>
	    Require all denied
	</IfModule>
	<IfModule !authz_core_module>
	    Deny from all
	</IfModule>

to:

	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(.*)$ index.php/$1 [L]

### application/core
When you download the *wiredesignz* HMVC modular extension for the *codeigniter* framework you will find a *core* folder which contains two files: *My_Loader.php* & *My_Router.php*. Both of these files have been added to the *core* folder within the *application* folder of the *codeigniter* framework.

### application/third_party
When you download the *wiredesignz* HMVC modular extension for the *codeigniter* framework you will find a *third_party* folder which contains an additional folder name *MX*. This *MX* folder has been copied to the *thid_party* folder within the *application* folder of the *codeigniter* framework.

### application/third_party/MX/loader.php
Swapped out line 300 as shown below. You can find more info about this change here: http://stackoverflow.com/questions/41557760/codeigniter-hmvc-object-to-array-error

#### original
    return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));

#### new
		if (method_exists($this, '_ci_object_to_array'))
		{
		        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
		} else {
		        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_prepare_view_vars($vars), '_ci_return' => $return));
		}
